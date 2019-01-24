<?php 
session_start();
error_reporting(0);
include('include/host.config.php');
include('include/mysql.lib.php');
include('functions.php');
$obj=new connect;

$panel_color=$obj->getRow('tbl_meta','meta',"where `key`='panel_color'");
if($panel_color=='')
{
  $panel_color='#189279';
}
$btn_hover_color=$obj->getRow('tbl_meta','meta',"where `key`='btn_hover_color'");
if($btn_hover_color=='')
{
  $btn_hover_color='#0f5d4d';
}
?>
<!DOCTYPE html>
<html lang="en" class="fixed left-sidebar-top">
<head>
<meta charset="utf-8">
<meta name="description" content="bootstrap default admin template">
<meta name="viewport" content="width=device-width">
<title>Dynamic CSS Sample</title>
<link rel="shortcut icon" href="<?=BASEURL?>assets/favicon/favicon.png" type="image/x-icon"/> 
<link rel="stylesheet" href="<?=BASEURL?>assets/vendor/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="<?=BASEURL?>assets/vendor/font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="<?=BASEURL?>assets/vendor/animate.css/animate.css">

<script src="<?=BASEURL?>assets/vendor/pace/pace.min.js"></script>
<link href="<?=BASEURL?>assets/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />
<link rel="stylesheet" href="<?=BASEURL?>assets/vendor/toastr/toastr.min.css">
<link rel="stylesheet" href="<?=BASEURL?>assets/vendor/magnific-popup/magnific-popup.css">

<link rel="stylesheet" href="<?=BASEURL?>assets/vendor/data-table/media/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="<?=BASEURL?>assets/vendor/data-table/extensions/Responsive/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="<?=BASEURL?>assets/vendor/sweetalert/sweetalert.css">

<!-- Dynamic Css Inclusion -->
<link rel="stylesheet" href="<?=BASEURL?>assets/stylesheets/css/style.css.php" type="text/css">

<link rel="stylesheet" href="<?=BASEURL?>assets/vendor/select2/css/select2.min.css">
<link rel="stylesheet" href="<?=BASEURL?>assets/vendor/select2/css/select2-bootstrap.min.css">
<link rel="stylesheet" href="<?=BASEURL?>assets/vendor/bootstrap_date-picker/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="<?=BASEURL?>assets/vendor/bootstrap_time-picker/css/timepicker.css">
<link rel="stylesheet" href="<?=BASEURL?>assets/vendor/bootstrap_color-picker/css/bootstrap-colorpicker.min.css">

<script type="text/javascript" src="<?=BASEURL?>assets/javascripts/modernAlert.min.js"></script>
</head>
<input class="dnone" type="text" name="base" id="base" value="<?=BASEURL?>"/>
<input type="text" class="dnone" id="pcolor" value="<?=$panel_color?>"/>