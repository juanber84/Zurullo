<?php
defined('SYSTEM') || die('Nothing to do here');

/**
 * @author Alvaro Carneiro <s-night-s@hotmail.com> <d3sign.night@gmail.com>
 * @version 0.5
 * @license MIT License
 * @copyright 2012 Alvaro Carneiro
 */
class RouterAction {

    /**
     * @var string The route of the action
     * @access public
     */
    public $route;

    /**
     * @var Closure|string Callback to load when the uri matches the specified route
     * @access public
     */
    public $callback;

    /**
     * @var Array Array with the arguments to pass to the action
     * @access protected
     */
    protected $args;

    protected $call_before;

    protected $call_after;

    /**
     * Constructor of a new action
     *
     * @param string $route The route to load the callback
     * @param Closure|string $callback Callback to load when the uri matches the specified route
     * @access public
     */
    public function __construct($route, $callback)
    {
        $this->route = trim($route, '/');
        $this->callback = $callback;
    }

    /**
     * Run the action
     *
     * @access public
     */
    public function run()
    {
        $this->args = Router::get_route_args($this->route);

        // if we setted a function to call before the principal action
        if ( $this->call_before )
        {
            // then call it
            call_user_func_array($this->call_before, $this->args);
        }
        // if the action returns something then catch it (used when you use "after" method)
        $result = call_user_func_array($this->callback, $this->args );

        // if we setted a function to call after the principal action then call it with the result of it
        if ( $this->call_after )
        {
            call_user_func($this->call_after, $result);
        }

    }

    /**
     * Set a callback to load before load the principal action
     *
     * @param Closure|string The callback to load before load the principal action
     * @access public
     */
    public function before($callback)
    {
        if ( is_callable($callback) )
        {
            $this->call_before = $callback;
            return $this;
        }
    }

    /**
     * Set a callback to load after load the principal action
     *
     * @param Closure|string The callback to load after load the principal action
     * @access public
     */
    public function after($callback)
    {
        if ( is_callable($callback) )
        {
            $this->call_after = $callback;
            return $this;
        }
    }
    
    /**
     * Add available extensions to the route
	 * 
	 * @access public
	 */
	public function ext()
	{
		if ( func_num_args() === 0 )
		{
			return $this;
		}
		
		// fetch the arguments (the available extensions)
		$args = func_get_args();
		
		$exts = '';
		
		// count them because we know that put it into the for isn't recommended
		$count = count($args);
		
		for ($i = 0; $i < $count; $i++)
		{
			// If the ext is null then the extension is not 
			if ( $args[$i] !== '' )
			{
				$args[$i] = '\.'.$args[$i];
			}
			
			// add new available extension. If there is only one extension available then we will not to append the "|"
			$exts .= $args[$i] . ( ($i === $count-1) ? '' : '|' );
			
		}
		
		// use the operator ?: to prevent them to by passed as an argument
		$exts = '(?:'.$exts.')';
		
		$this->route .= $exts;
		
		return $this;
	}

}

/* End of file action.php */