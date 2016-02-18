<?php session_start();?>
<!DOCTYPE html PUBLIC "-#W3C#DTD XHTML 1.0 Transitional#EN" "http:#www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html xmlns="http:#www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Custom Content Management System</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="/blog2/style/css/bootstrap.min.css">
        <link href="/blog2/style/css/style.css" rel="stylesheet">
        
        
    </head>
    <body>
        <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="./">Your HOme Page</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="./index">Home</a></li>
        <li><a href="./contactus">Contact Us</a></li>
      </ul>
      <form class="navbar-form navbar-right" role="search" method="get" action="search.php">
        <div class="form-group">
          <input type="text" class="form-control" name="q" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
      <?php
      if(isset($_SESSION["username"]))
        {
     ?>
      <ul class="nav navbar-nav navbar-right"> 
      <li><a href="dashboard"><span class="glyphicon glyphicon-user"></span> Dashboard</a></li>
        <li><a href="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
      <?php 
        }
        else
        {?>
            <ul class="nav navbar-nav navbar-right"> 
            <li><a href="userreg"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
   <?php     }

      ?>
    </div>
  </div>
</nav>

            <div class="container-fluid">

      
