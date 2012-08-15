<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    global $template;
    $assets = base_url(). "application/views/layouts/" .$template. "/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Parts Controlling System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="human resources management sistem">
	<meta name="author" content="">

	<script src="<?php echo $assets ?>js/jquery-1.7.2.min.js"></script>
	<script src="<?php echo $assets ?>js/jquery.validate.min.js"></script>
	<script src="<?php echo $assets ?>bootstrap/assets/js/bootstrap-transition.js"></script>
	<script src="<?php echo $assets ?>bootstrap/assets/js/bootstrap-alert.js"></script>
	<script src="<?php echo $assets ?>bootstrap/assets/js/bootstrap-modal.js"></script>
	<script src="<?php echo $assets ?>bootstrap/assets/js/bootstrap-dropdown.js"></script>
	<script src="<?php echo $assets ?>bootstrap/assets/js/bootstrap-scrollspy.js"></script>
	<script src="<?php echo $assets ?>bootstrap/assets/js/bootstrap-tab.js"></script>
	<script src="<?php echo $assets ?>bootstrap/assets/js/bootstrap-tooltip.js"></script>
	<script src="<?php echo $assets ?>bootstrap/assets/js/bootstrap-popover.js"></script>
	<script src="<?php echo $assets ?>bootstrap/assets/js/bootstrap-button.js"></script>
	<script src="<?php echo $assets ?>bootstrap/assets/js/bootstrap-collapse.js"></script>
	<script src="<?php echo $assets ?>bootstrap/assets/js/bootstrap-carousel.js"></script>
	<script src="<?php echo $assets ?>bootstrap/assets/js/bootstrap-typeahead.js"></script>

	<!-- Le styles -->
	<link rel="stylesheet" href="<?php echo $assets ?>bootstrap/assets/css/bootstrap.css">
	<!-- <link href="bootstrap/assets/css/bootstrap.css" rel="stylesheet"> -->
	<style type="text/css">
		body {
			padding-top:10px;
		}
	</style>
	<link href="<?php echo $assets ?>bootstrap/assets/css/bootstrap-responsive.css" rel="stylesheet">

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Le fav and touch icons -->
	<link rel="shortcut icon" href="<?php echo $assets ?>bootstrap/assets/images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="http://twitter.github.com/bootstrap/assets/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="http://twitter.github.com/bootstrap/assets/images/apple-touch-icon-114x114.png">
</head>
<body>
	<div class="container">
		<div id="header">
			<img src="<?php echo $assets ?>img/toyota.jpg" alt="" style="float:left;width:60px;height:40px;margin: 5px">
			<h3>TOYOTA MOTOR MANUFACTURING INDONESIA</h3>
			<p>SUMMMARY PART INFORMATION SYSTEM S.LOC 5009</p>
		</div>
		<div class="row-fluid">
			<?php if (!is_logged_in()): ?>
				<?php include 'menu_user.php' ?>			
			<?php else: ?>
				<?php include 'menu_admin.php' ?>
			<?php endif ?>			
			<div id="isi">
				<?php $this->load->view($view); ?>
			</div>
		</ul>
		</div><!--/row-->
	  	<hr>
		<footer>
			<p>Part Controlling System 2012 &copy; <a href="">Toyota</a></p>
		</footer>
	</div><!--/.fluid-container-->

	<!-- Le javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="<?php echo $assets ?>js/parts.	js"></script>
</body>
</html>