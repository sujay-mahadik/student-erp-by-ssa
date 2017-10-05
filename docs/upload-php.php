<?php
include_once"inc/db.php";

	$doc_name =$_POST['doc_name'];
	echo $doc_name;
	$name =$_FILES['myfile']['name'];
	$tmp_name =$_FILES['myfile']['tmp_name'];

	if($name)
	{
		$Location = "docs/$name";
		move_uploaded_file($tmp_name, $Location);
		$query="INSERT INTO docs (name,loc) VALUES ('$doc_name','$Location')";
		$result=$con->query($query);
		//header("Location:download-php.php");
	
	}
	else
	{
		echo("please select a file");
	}

?>
