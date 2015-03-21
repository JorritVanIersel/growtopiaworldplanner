<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Growtopia World Planner</title>

		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:600">
		<link rel="stylesheet" type="text/css" href="build/build.css">
	</head>

	<body onselectstart="return false;">
		

		<div id="loading_screen">
			<div>
				<div>
					<div>
                    	<?php

                    			require_once('/Applications/MAMP/htdocs/sitemanagement/stats/owa_php.php');
		
								$owa = new owa_php();
								// Set the site id you want to track
								$owa->setSiteId('03d2fc9631ad8785cc273966d1b22fa4');
								// Uncomment the next line to set your page title
								$owa->setPageTitle('growtopia world planner');
								// Set other page properties
								//$owa->setProperty('foo', 'bar');
								$owa->trackPageView();
		
							// Random Image function
							function random_image($directory)
								{
									$leading = substr($directory, 0, 1);
									$trailing = substr($directory, -1, 1);

									if($leading == '/')
									{
										$directory = substr($directory, 1);
									}
									if($trailing != '/')
									{
										$directory = $directory . '/';
									}

									if(empty($directory) or !is_dir($directory))
									{
										die('Directory: ' . $directory . ' not found.');
									}

									$files = scandir($directory, 1);

									$make_array = array();

									foreach($files AS $id => $file)
									{
										$info = pathinfo($dir . $file);

										$image_extensions = array('jpg', 'jpeg', 'gif', 'png', 'ico');
										if(!in_array($info['extension'], $image_extensions))
										{
											unset($file);
										}
										else
										{
											$file = str_replace(' ', '%20', $file);
											$temp = array($id => $file);
											array_push($make_array, $temp);
										}
									}

									if(sizeof($make_array) == 0)
									{
										die('No images in ' . $directory . ' Directory');
									}

									$total = count($make_array) - 1;

									$random_image = rand(0, $total);
									return $directory . $make_array[$random_image][$random_image];
								}
								//valentines day
								if((date('m') == 2) && (date('d') == 14))
								{
								echo "<img src=" . random_image('img/splashscreens/valentines') . " />";
								}
								
								//christmas
								if((date('m') == 12) && (date('d') == 25))
								{
								echo "<img src=" . random_image('img/splashscreens/christmas') . " />";
								}
								
								//halloween
								if((date('m') == 10) && (date('d') == 31))
								{
								echo "<img src=" . random_image('img/splashscreens/halloween') . " />";
								}
								
								//all other times
								else
								{
									echo "<img src=" . random_image('img/splashscreens/normal') . " />";
								}
									
					?>
					</div>
				</div>
			</div>
		</div>

		<div id="dialog" class="dialog"></div>

		<ul id="menubar">
			<li>
				File
				<ul>
					<li data-template="import"><span class="fa fa-sign-in"></span> Load</li>
					<li data-template="export"><span class="fa fa-sign-out"></span> Save</li>
				</ul>
			</li>
			<li>
				Edit
				<ul>
					<li data-template="canvas_settings"><span class="fa fa-cog"></span> Canvas Settings</li>
				</ul>
			</li>
			<li>
				View
				<ul>
					<li data-toggle="class:nogrid:#canvas"><span class="fa fa-check-square-o"></span> Grid</li>
					<li data-toggle="fullscreen:body"><span class="fa fa-expand"></span> <span class="text">Fullscreen</span></li>
				</ul>
			</li>
			<li>
				Help
				<ul>
					<li data-template="controls"><span class="fa fa-question-circle"></span> Controls</li>
					<li data-template="about"><span class="fa fa-info-circle"></span> About</li>
				</ul>
			</li>
		</ul>
		
		<div id="toolbar" class="border-box">
			<section id="tilesets">
				<h2>Tilesets</h2>

				<div>
					<div class="loading"><img src="img/icons/loading.gif" alt="loading"></div>
					<div id="custom_select" class="border-box"><select name="tileset_select"><select></div>
					<div id="tileset"><div id="tileset_container"></div></div>

					<div class="buttons">
						<!-- <a href="#" data-template="tileset_form"><span class="fa fa-plus-sign"></span> Add tileset</a>
						<a href="#" id="tilesets_remove" class="remove"><span class="fa fa-minus-sign"></span> Remove tileset</a> -->
					</div>
				</div>
			</section>

			<section id="layers">
				<h2>Layers</h2>

				<div>
					<ul id="layerlist"></ul>
					<div class="buttons">
					</div>
				</div>
			</section>

			<hr>

			<div id="note">
				Please note that this project is under active development.
				It is advised to clear your browser cache daily with <b>CTRL + SHIFT + R</b> or <b>CTRL + F5</b> in order to provide the best functionality.
			</div>

			<div id="tools">
				<span class="fa fa-pencil active" data-tool="draw" title="Draw-Tool"></span>
				<span class="fa fa-tint" data-tool="fill" title="Fill-Tool"></span>
				<span class="fa fa-th disabled" data-tool="repeat" title="Repeat-Tool"></span>
				<span class="fa fa-eraser" data-tool="erase" title="Erase-Tool"></span>
			</div>
		</div>

		<div id="canvas_wrapper">
			<div id="canvas" oncontextmenu="return false;">
				<div id="tiles"></div>
				<div class="selection"></div>
				<div class="warning border-box"></div>
			</div>
		</div>
		
		<script type="text/javascript" src="build/build.js"></script>
		<!-- // <script type="text/javascript" data-main="../src/js/main.js" src="../src/js/libs/require.js"></script> -->
	</body>
</html>