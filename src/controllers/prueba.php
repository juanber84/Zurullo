<?php

/**
 * http://page.com/
 * http://page.com/home
 */
Router::bind('/prueba/([a-zA-Z]+)', function($what){

    echo $what;

});