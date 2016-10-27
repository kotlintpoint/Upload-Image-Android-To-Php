<?php
if(isset($_REQUEST["imageupload"]))
{
		$albumid=$_REQUEST["id"];
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$image = $_POST['image'];
			$name = $_POST['name'];
			$title=$_POST['title'];
		}		
		$qry="insert into image_gallery (albumid, name, title, date, time) values ($albumid, '$name','$title',CURDATE(), CURTIME())";
		$count=mysql_query($qry) or die(mysql_query($qry)); 
		if($count>0)
		{
			$path = "uploads/$name.png";
			file_put_contents($path,base64_decode($image));
			echo "Successfully Uploaded";
		}
		else{
			echo "Fail";
		}
}
?>