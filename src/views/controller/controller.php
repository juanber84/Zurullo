<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>ZURULLOphp - controller</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="css/style.css">  
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/skeleton.css">
	<link rel="stylesheet" href="css/layout.css">

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

</head>
<body>



	<!-- Primary Page Layout
	================================================== -->

	<!-- Delete everything in this .container and get started on your own site! -->

	<div class="container">
		<div class="sixteen columns">
			<h1 class="remove-bottom" style="margin-top: 40px">ZURULLO for php</h1>
			<h5>Version 0.1</h5>
			<hr />
		</div>

		<div class="one-third column">
			<h3>¿Que son los controladores?</h3>
			<p>Los controladores son funciones donde se sacan los datos que despues mostraremos en las vistas.</p>
			<p>Tan solo una forma de separar la lógica de tu aplicación fuera de la vista.</p>
		</div>
		<div class="ten columns alpha">		
			<h3>Controlador en Zurullo </h3>
			
			<span>Router::bind('/controller', function(){  </span> <br>
			<span>&nbsp;&nbsp;&nbsp;&nbsp;$variable = 'HOLA MUNDO...';<span><br>		
	        <span>&nbsp;&nbsp;&nbsp;&nbsp;echo render('example/example.php',array('variable'=>$variable));</span> <br>
			<span>});</span> 
			
		</div>


		<div class="sixteen columns footer">
			<div id="nav">
				<ul>
					<li class="first"><a href="/">Home</a></li>
					<li class=" current_page_item"><a href="/controller">Controllers</a></li>
					<li class="last"><a href="/view">Vistas</a></li>
				</ul>
			</div>
		</div>	
		<div class="sixteen columns footer">
			<a href="https://github.com/juanber84/zurullo">zurullo in github</a>
			&nbsp;&nbsp;
			<a target="_blank" href="zurullo.zip">download</a>	
		</div>

	</div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html>