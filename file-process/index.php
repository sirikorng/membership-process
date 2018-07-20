<?php include('Fileprocess.php'); 
$file = new Fileprocess();
//echo $file->index();
//echo __DIR__;
if(isset($_POST['submit'])){
	//echo 'hello';
	//print_r($_POST); 
	$file->form($_POST); //exit;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Folder Name</title>
</head>
<body>
	<form action="" method="post" style="background: #ccc; width:30%; padding:20px;">
	    <div>
			<label>Old Folder Name</label>
			<input type="text" name="oldfoldername" required placeholder="New folder name" style="padding: 10px;">
		</div>
		<div>
			<label>New Folder Name</label>
			<input type="text" name="newfoldername" required placeholder="New folder name" style="padding: 10px;">
		</div>
		<div>
			<input type="submit" name="submit" value="Submit">
		</div>
	</form>
</body>
</html>