<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome</h1>

	<div id="body">
	<form method="post" action="curl/voir">
		<label>Liens</label>
		<input type="text" name= "liens" id="liens"  />
		<input type="submit" value="ajouter"/>
		
	</form>
	</div>
	<ul>
	<?php foreach($liens as $lien):?>
		<li>
			<a href="<?php echo $lien->url;?>"> <?php echo $lien->title;?></a>
			<img src="<?php echo $lien->images;?>"/>
		</li>
	<?php endforeach;?>
	</ul>
</div>

</body>
</html>