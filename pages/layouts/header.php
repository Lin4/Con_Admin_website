<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo !empty($title) ? $title :  ""; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $base_url; ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $base_url ?>/assets/libs/jquery-ui-1.11.0/jquery-ui.min.css" rel="stylesheet">
	<style>
	body{
		padding-top:100px;
	}
	.ui-widget-header {
    color: #000;
	}
	@media print {
    .no-print {
        display:none;
    }
}
	</style>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

  </head>
    <body onload="xz()">
	
	
    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo !empty($title) ? $title :  ""; ?></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php?page_name=manage-projects">All Projects</a></li>
			<li><a target="_blank" href="pdf/Bid_Summary_Sheet.pdf">Bid Report</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo !empty($_SESSION['firstname']) ? $_SESSION['firstname'].' '.$_SESSION['lastname'] : "error"; ?> <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="index.php?page_name=logout">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>