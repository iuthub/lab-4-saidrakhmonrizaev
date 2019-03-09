<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="viewer.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div id="header">

			<h1>190M Music Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2>
		</div>

		

		<div id="listarea">
			<ul id="musiclist">
				<?php if (isset($_REQUEST["playlist"])!=1){?>
				<?php $glob1=glob("songs/*.mp3");?>
				<?php foreach($glob1 as $glob){ ?>


							
						<li class="mp3item">
							<a href="<?php echo $glob;?>"> <?php $p=explode("/",$glob); echo $p[1];?></a>
							 размер 
							 <?php echo filesize($glob);?> байт
							
						</li>
					

					<?php } ?>

				
				<?php $glob1=glob("songs/*.txt");?>
				<?php foreach($glob1 as $glob){ ?>
						
						<li class="playlistitem">
							<a href="<?php echo $glob;?>"> <?php $p=explode("/",$glob); echo $p[1];?></a>
							 размер 
							 <?php echo filesize($glob);?> байт
							
						</li>
					

					<?php } ?>	
					<?php }else {?>
						<a href="music.php">Back link</a>
						<?php //print_r($_REQUEST["playlist"]);
							$file_name=$_REQUEST["playlist"];
							$file_content=file("songs/$file_name");
							//var_dump(file("songs/$file_name"));
							 $glob1=glob("songs/*.mp3");?>
							<?php foreach($glob1 as $glob){ ?>
								
								<?php $p=explode("/",$glob); //echo $p[1];?>

								<?php if (in_array($p[1],$file_content)==1){ ?>
									<li class="mp3item">
										<a href="<?php echo $glob;?>"> <?php echo $p[1];?></a>размер 
										 <?php echo filesize($glob);?> байт
									</li>
								<?php } ?>	
							<?php } ?>
								<?php var_dump($file_content); ?>
						
					<?php }?>					
			
				

			</ul>
		</div>


				<?php// echo(isset($_REQUEST["playlist"]));


				//$playlist=$_REQUEST["playlist"]; //print_r($playlist);?>
	</body>
</html>