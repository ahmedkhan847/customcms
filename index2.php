<?php

include "class/DbConnection.php";
include 'class/searchelastic.php';
$db = new DbConnection();
$elastic = new searchelastic();


$conn = $db->OpenCon();
$result = $elastic->InsertData($conn);
$data = null;

$db->CloseCon();
var_dump($result);    