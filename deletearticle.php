<?php 
//It autoloads the class
include 'class/articles.php';

$ids = $_POST['ids'];

$del = new Articles();

$result = $del->deletearticle($ids);

if($result == 'true')
{
	echo $result;
}
else
{
	echo $result;
}




?>