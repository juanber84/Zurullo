<?php
defined('SYSTEM') || die('Nothing to do here');

class RouteNotFoundException extends Exception { }

/**
 * Class to manage the routes
 *
 * @author Alvaro Carneiro <s-night-s@hotmail.com> <d3sign.night@gmail.com>
 * @version 0.5
 * @license MIT License
 * @copyright 2012 Alvaro Carneiro
 */
abstract class Router {

    /**
     * @var string The current uri
     * @access protected
     */
    protected static $uri;

	/**
	 * @var array Web url and the folder
	 * @access public
	 */
	public static $web = array(
		'base_url' => null,
		'index'    => 'index.php',
	);

	/**
	 * @var array The wildcard patterns we replace in the routes
	 * @access public
	 */
	public static $patterns = array(
		'(:any)'     => '(.+)',
		'(:alnum)'   => '([[:alnum:]]+)',
		'(:num)'     => '([[:digit:]]+)',
		'(:alpha)'   => '([[:alpha:]]+)',
		'(:segment)' => '([^/]*)',
	);

	/**
	 * @var array Set of actions
	 * @access protected
	 */
	protected static $actions = array(
		'ANY'  => array(),
		'GET'  => array(),
		'POST' => array(),
	);

    /**
     * Initialize the class to prepare the web url and folder
     *
     * @param array $config Array with the url of the page and the folder
     * @access public
     */
    public static function _init(array $config = array())
    {
    	require '../vendor/action.php';

        static::$web = array_merge(static::$web, $config);

        if(is_null(static::$web['base_url']))
        {
        	$script = $_SERVER['SCRIPT_NAME'];
        	$path = str_replace(basename($script), '', $script);
        	static::$web['base_url'] = rtrim('http://'.$_SERVER['HTTP_HOST'].$path, '/');
        }

	$uri = $_SERVER['REQUEST_URI'];

        if($subfolder = parse_url(static::$web['base_url'], PHP_URL_PATH))
        {
        	$uri = str_replace($subfolder, '', $uri);
        }

        // If we are using an index file like 'index.php', delete it from the url
        if(static::$web['index'])
        {
        	$uri = str_replace(static::$web['index'], '', $uri);
        }

        if(($uri = trim($uri, '/')) === '')
        {
        	$uri = '/';
        }
        static::$uri = $uri;
    }

    /**
     * Bind a callback to a specified route
     *
     * @param string $route The route to load the callback
     * @param Closure|string $callback Callback to load when the uri matches the specified route
     * @return RouterAction
     * @access public
     */
    public static function bind($route, $callback, $method = null)
    {
        if ( is_callable($callback) )
        {
            // change /, home, blah to (/|home|blah)
            if ( preg_match('#(.),\s?#', $route) )
            {
                $route = '(?:'.preg_replace('#(.),\s?#', '$1|', $route).')';
            }

            $route = str_replace(array_keys(static::$patterns), array_values(static::$patterns), $route);

            $action = new RouterAction($route, $callback);

            if(is_null($method))
            {
            	static::$actions['ANY'][] = $action;
            }
            else
            {
            	static::$actions[strtoupper($method)][] = $action;
            }

            return $action;
        }

        trigger_error('Argument 2 for Router::bind() must be a function', E_USER_ERROR);
    }

    /**
     * Bind a specific callback to a request that is from the "post" method
     *
     * @param string $route The route to load the callback
     * @param Closure|string $callback Callback to load when the uri matches the specified route
     * @return RouterAction
     * @access public
     */
    public static function post($route, $callback)
    {
        return static::bind($route, $callback, 'POST');
    }

    /**
     * Bind a specific callback to a request that is from the "get" method
     *
     * @param string $route The route to load the callback
     * @param Closure|string $callback Callback to load when the uri matches the specified route
     * @return RouterAction
     * @access public
     */
    public static function get($route, $callback)
    {
        return static::bind($route, $callback, 'GET');
    }

	/**
	 * Manage request
	 *
	 * @throws RouteNotFoundException If the request action not found
	 * @access public
	 */
	public static function run()
	{
		foreach(array_merge(static::$actions['ANY'], static::$actions[$_SERVER['REQUEST_METHOD']]) as $action)
		{
			if(static::matches($action->route))
			{
				return $action->run();
			}
		}

		throw new RouteNotFoundException();
	}

    /**
     * Check if the uri matches
     *
     * @param string $route The route that must match the uri
     * @return bool If the uri doesn't matches return false, else return true
     * @access public
     */
    public static function matches($route)
    {
        if ( ! preg_match('#^/?'. trim($route) . '(\?.*)?$#', static::$uri) )
        {
            return false;
        }
        return true;
    }

    /**
     * Get uri arguments to call the action
     *
     * @param string The uri to fetch arguments
     * @return array An array with the uri arguments
     * @access public
     */
    public static function get_route_args($uri)
    {
        preg_match('#^/?'. trim($uri) . '(\?.*)?$#', static::$uri, $subs);

        if ( isset($subs[0]) )
        {
            unset($subs[0]);
        }
        return array_values($subs);
    }

}

/* End of file router.php */