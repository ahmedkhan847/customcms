<!DOCTYPE html>
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
            <!-- Custom CSS -->
   

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }



    </style>
    </head>
    <body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-md-2 sidenav">
        <button type="button" class="navbar-toggle " data-toggle="collapse" data-target="#myNavbar">
        <span class="glyphicon glyphicon-menu-down"></span>
      </button>
      <h4><a href="index">Custom CMS</a></h4>
<div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav nav-pills nav-stacked">
        <li>
                    <a href="dashboard">Dashboard</a>
                </li>
                <li>
                    <a href="articlelist">Article View</a>
                </li>
                <li>
                    <a href="articleinsert">Insert Article</a>
                </li>
                <li>
                    <a href="setting">User Setting</a>
                </li>
                <li>
                    <a href="logout">LogOut</a>
                </li>
      </ul></div>
 
    </div>

    <div class="col-md-offset-1 col-md-9">
        
 

  