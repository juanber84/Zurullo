<?php 
Router::bind('/example', function(){ 
    $variable = 'HOLA MUNDO...';
    echo render('example/example.php',array('variable'=>$variable)); 	
}); 
