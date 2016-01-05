<?php
include 'dbconfig.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class DbConnection
{

protected $conn = null;


function __construct()
{
	
}

function OpenCon()
{

$this->conn = new mysqli(servername, username, password, dbname) or die($conn->connect_error);

return $this->conn;

}

function CloseCon()
{

$this->conn->close();

}

}

?>