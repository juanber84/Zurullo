<?php

/**
 * http://page.com/
 * http://page.com/home
 */
Router::bind('/, home', function(){

    echo 'You are in the home page1';

})->before(function(){

    echo 'This is before the action1<hr />';

});