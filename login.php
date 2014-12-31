<?php
session_start();
include 'config.php';
include 'classes/curl.class.php';

$curl = new Curl();

if(!empty($_POST) && !empty($_POST['btnLogin'])){
$username = $_POST['inputUsername'];
$password = $_POST['inputPassword'];

$response = $curl->curlGetMethod('http://primetech.digisarathi.net/contructionapi.php/api/user/login/check/'.$username.'/'.$password);

if($response['message']['status'] == 'sucess'){
	$_SESSION['username'] = ucfirst($username);
	$_SESSION['user_type'] = $response['user_type'];
	$_SESSION['firstname'] = ucfirst($response['firstname']);
	$_SESSION['lastname'] = ucfirst($response['lastname']);
	$_SESSION['is_login'] = 'yes';
	header( 'Location: index.php?page_name=manage-projects' ) ;
} else {
	$_SESSION['is_login'] = 'no';
	$msg['error'] = "Username or password is invalid";
}
	
}

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Construction Management Login</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $base_url; ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<style>
	.logo-box{
		padding-bottom:25px;
	}
	.login-logo{
	margin-left:auto;
	margin-right:auto;
	display:block;
	}
	</style>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
    <body>
	
	
    <div class="container">

        <div id="loginbox" style="margin-top:10%;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
		<div class="row" >
			<div class="col-md-6">
			<br/>
				<img src="assets/img/Prime-Tech-Logo.png" class="login-logo" width="200"/>
			</div>
			<div class="col-md-6">
				<img src="assets/img/city-logo.png" class="login-logo" width="150"/>
			</div>				
		</div>
		<br/>
			<?php if(!empty($msg['error'])) { ?>
			<div class="alert alert-danger" role="alert"><?php echo $msg['error']; ?></div>
			<?php } ?>
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Construction Management Login</div>
                    </div>
					
                    <div style="padding-top:30px" class="panel-body" >
                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                          
                        <form id="loginform" method="post" class="form-horizontal" role="form">
                                   
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="inputUsername" value="" placeholder="username">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="inputPassword" placeholder="password">
                            </div>
                                    
                            <div style="margin-top:10px" class="form-group">
                                <div class="col-sm-12 controls">
                                      <input type="submit" name="btnLogin" class="btn btn-success" value="Login">
                                </div>
                            </div>

  
                            </form>     



                        </div>                     
                    </div>  
        </div> 
		</div>
        <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!--<script src="<?php echo $base_url ?>/assets/js/bootstrap.min.js"></script> -->
  </body>
</html>