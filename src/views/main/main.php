<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>ZURULLOphp - main</title>
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
			<h3>¿Que es Zurullo?</h3>
			<p>Zurullo es un micro framework para agilizar las tareas básicas a la hora de realizar una web, a la vez que mantiene tu proyecto ordenado para su óptimo crecimiento y desarrollo.</p>
			<p>Tan solo te provera de controladores y vistas, con lo que tienes que tener conocimientos de php para hacer cosas compejas con el.</p>
		</div>
		<div class="ten columns alpha">		
			<h3>Estructura básica de un proyecto Zurullo </h3>
				
			<div class="three columns alpha">
				<ul class="square">
					<li><strong>app/</strong>
						<ul>
							<li>console</li>
							<li>funciones.php</li>
						</ul>
					</li>
					<li><strong>src/</strong>
					<li><strong>app/</strong>
						<ul>
							<li>controllers/</li>
							<li>views/</li>
						</ul>
					</li>						
				</ul>
			</div>		

			<div class="five columns alpha">
				<ul class="square">
					<li><strong>vendor/</strong>
						<ul>
							<li>render/
								<ul>
									<li>render.php</li>
								</ul>
							</li>
							<li>action.php</li>
							<li>router.php</li>						
						</ul>
					</li>
					<li><strong>web/</strong>
						<ul>
							<li>index.php</li>				
						</ul>					
					</li>								
				</ul>
			</div>	
			
		</div>

		<div class="sixteen columns footer">
			<div id="nav">
				<ul>
					<li class="first current_page_item"><a href="/">Home</a></li>
					<li class=" "><a href="/controller">Controllers</a></li>
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