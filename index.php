<?php

require_once 'autoload.php';

AMT::init();

$VIEW = AMT::$view;
$CONTROLLER = AMT::$controller; 

$isLocal = ENV == 'local' ? true : false;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Automobile Maintenance Tracker</title>

    <!-- AMT CSS -->
    <link rel="stylesheet" href="<?php echo BASEURL ?>/css/template.css?v=<?php echo TIMESTAMP ?>" />
	<link rel="stylesheet" href="<?php echo BASEURL ?>/css/form.css?v=<?php echo TIMESTAMP ?>" />

    <!-- OTHER JS -->
	<script src="<?php echo BASEURL ?>/jquery/jquery-1.11.2.min.js?v=<?php echo TIMESTAMP ?>"></script>
	
    <!-- AMT JS -->
    <script src="<?php echo BASEURL ?>/js/AMT.js?v=<?php echo TIMESTAMP ?>"></script>
	<script src="<?php echo BASEURL ?>/js/AMT.Form.js?v=<?php echo TIMESTAMP ?>"></script>
	<script src="<?php echo BASEURL ?>/js/AMT.Form.Util.js?v=<?php echo TIMESTAMP ?>"></script>
	<script src="<?php echo BASEURL ?>/js/AMT.Form.Validate.js?v=<?php echo TIMESTAMP ?>"></script>
</head>
<body>
	<div id="app">
		
		<div class="header"><a href="<?php echo BASEURL ?>"><h1>Automobile Maintenance Tracker</h1></a></div>
		
		<div class="content">
			
			<?php if ($VIEW != 'home') : ?>
				<?php include 'controller/'.$CONTROLLER.'.php'; ?>
			<?php endif ?>
			<?php include 'view/'.$VIEW.'.php'; ?>
			<div class="clear"></div>
			
		</div>
		
		<div class="footer">
			<div id="copyright">&copy; <?php echo date('Y') ?> SandorFekete.com</div>
		</div>
		
	</div>
	
    <script>
		$(function(){
			AMT.BASEURL = '<?php echo BASEURL ?>';
			AMT.CONTROLLER = '<?php echo $CONTROLLER ?>';
			AMT.VIEW = '<?php echo $VIEW ?>';
			
			AMT.init();
		});
	</script>
</body>
</html>
