<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="CodeIgniter GtechNY PHP">
    <meta name="author" content="Anthony T. Plummer">
    <link rel="icon" href="../../favicon.ico">

    <title>CodeIgniter For Fun & Profit</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>build/styles_core.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>build/styles.min.css" />

  </head>

  <body>
    <div id="header"><h1>GtechNY</h1></div>

    <nav class="navbar navbar-dark bg-inverse">
      <a class="navbar-brand" href="#">GtechNY</a>
      <ul class="nav navbar-nav">
        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('/'); ?>">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('users/view'); ?>">View</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('users/index'); ?>">Upload</a></li>
      </ul>
    </nav>
