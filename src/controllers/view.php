<?php 
Router::bind('/view', function(){ 
	echo render('view/view.php',array());
}); 
