<?php
require '../vendor/render/render.php';

/**
 * http://page.com/doc
 * to read de documentation
 */
Router::bind('/demo', function(){

   echo render('demo/ejemplo.php',array(
						                'opcion1' => devuelveresultado(),
						                'opcion2' => 'patata2',
										));

});

function devuelveresultado()
{
	return 'patataasasdsa	';
}