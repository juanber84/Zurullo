<?php
function help(){
  	echo "                  \n";
  	echo "generate.page     \n";
  	echo "                  \n";
}

function generate_page(){
	echo "                  \n";
	echo "\033[32mÀComo quieres llamar a la pagina?        \033[37m\n";
	echo "                  \n";
	$consolagenerate_page = fopen("php://stdin", "r"); // Abrimos para leer de la consola de php 
    $read_generate_page = trim(fread($consolagenerate_page, 512)); 
	  $DescriptorFichero = fopen("src/controllers/".$read_generate_page.".php","w");
	  if($DescriptorFichero == false){
		  echo "No se ha podido crear el archivo";
	  }
	  
	$string1 = '<?php ';
	$string2 = "Router::bind('/".$read_generate_page."', function(){ ";
	$string3 = '	echo "pagina de '.$read_generate_page.'"; ';
	$string4 = '}); ';   
	fputs($DescriptorFichero,$string1. PHP_EOL); 
	fputs($DescriptorFichero,$string2. PHP_EOL); 
	fputs($DescriptorFichero,$string3. PHP_EOL); 
	fputs($DescriptorFichero,$string4. PHP_EOL); 	
	fclose($DescriptorFichero); 
  	echo "                  \n";	
	echo "\033[32mPagina generada        \033[37m\n";
  	echo "                  \n";
}


