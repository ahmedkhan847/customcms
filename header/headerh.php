<!DOCTYPE html>
<?php session_start();?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Custom Content Mangement System</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="style/css/bootstrap.min.css">
        <link href="style/css/style.css" rel="stylesheet">
        
        
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
      <a class="navbar-brand" href="index.php">Your HOme Page</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index">Home</a></li>
        <li><a href="contact">Contact Us</a></li>
      </ul>
      <?php
      if(isset($_SESSION["username"]))
        {
     ?>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="dashboard.php"><span class="glyphicon glyphicon-user"></span> Dashboard</a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
      <?php 
        }
        else
        {?>
            <ul class="nav navbar-nav navbar-right">
            <li><a href="userreg.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
   <?php     }

      ?>
    </div>
  </div>
</nav>

            <div class="container-fluid">

      
