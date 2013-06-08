<?php
Router::bind('/, home', function(){

   echo render('main/main.php',array());

});