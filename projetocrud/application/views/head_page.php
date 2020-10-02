<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title><?php echo $titulo; ?></title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
 <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
 <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
 <script src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.js"></script>
 <script setc="?<php echo base_url() ?>assets/js/bootstrap.js"></script>
 <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
 <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
 <div class="container-fluid">
  <div class="navbar-header">
   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
   </button>
   <a class="navbar-brand" href="<?php echo base_url(); ?>">Projeto CRUD</a>
  </div>
  <div id="navbar" class="navbar-collapse collapse">
   <ul class="nav navbar-nav navbar-right">
    <li><a href="<?php echo base_url(); ?>">Ajuda</a></li>
   </ul>
  </div>
 </div>
</nav>