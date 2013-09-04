<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Admintasia | Powerful backend admin user interface</title>
<?php $baseurl=Yii::app()->theme->baseUrl; ?>	
	<link href="<?php echo $baseurl."/css/reset.css"; ?>" rel="stylesheet" media="all" />
	<link href="<?php echo $baseurl."/css/general.css"; ?>" rel="stylesheet" media="all" />
	<link href="<?php echo $baseurl."/css/styles/default/ui.css"; ?>" rel="stylesheet" media="all" />
	<link href="<?php echo $baseurl."/css/forms.css"; ?>" rel="stylesheet" media="all" />
	<link href="<?php echo $baseurl."/css/form.css"; ?>" rel="stylesheet" media="all" />
	<link href="<?php echo $baseurl."/css/messages.css"; ?>" rel="stylesheet" media="all" />
    <link href="<?php echo $baseurl."/css/main.css"; ?>" rel="stylesheet" media="all" />
	
	<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>				
	<script type="text/javascript" src="<?php echo $baseurl."/js/superfish.js"; ?>"></script>
	<script type="text/javascript" src="<?php echo $baseurl."/js/jquery-ui-1.7.2.js"; ?>"></script>
	<script type="text/javascript" src="<?php echo $baseurl."/js/tooltip.js"; ?>"></script>
	<script type="text/javascript" src="<?php echo $baseurl."/js/tablesorter.js"; ?>"></script>
	<script type="text/javascript" src="<?php echo $baseurl."/js/tablesorter-pager.js"; ?>"></script>
	<script type="text/javascript" src="<?php echo $baseurl."/js/cookie.js"; ?>"></script>
	<script type="text/javascript" src="<?php echo $baseurl."/js/custom.js"; ?>"></script>
	<!--[if IE 6]>
	<link href="<?php echo $baseurl."/css/ie6.css"; ?>" rel="stylesheet" media="all" />
	
	<script src="<?php echo $baseurl."/js/pngfix.js"; ?>"></script>
	<script>
	  /* EXAMPLE */
	  DD_belatedPNG.fix('.logo, .other ul#dashboard-buttons li a');

	</script>
	<![endif]-->
	<!--[if IE 7]>
	<link href="<?php echo $baseurl."/css/ie7.css"; ?>" rel="stylesheet" media="all" />
	<![endif]-->
</head>
<body>
	<div id="header">
		<div id="top-menu">
		<?php if(!Yii::app()->user->isGuest){ ?>
			<a href="<?php echo Yii::app()->createAbsoluteUrl("admin/userdetails/view/id/".Yii::app()->user->getId());?>" title="View Profile">View Profile</a>
			| <a href="<?php echo Yii::app()->createAbsoluteUrl('site/logout'); ?>" title="Logout">Logout(<?php echo Yii::app()->user->name; ?>)</a>
		<?php }else{ ?>
			<a href="<?php echo Yii::app()->createAbsoluteUrl('site/login'); ?>" title="Login">Login</a>		
		<?php }?>			
		</div>
		<div id="sitename">
			<a href="index.php" class="logo float-left" title="Echos"></a>
            <span class="project_title">INCOFIN SOCIAL PERFORMANCE SCORE - ECHOS</span>



		</div>
<?php if(!Yii::app()->user->isGuest){ ?>		
		<ul id="navigation" class="sf-navbar">
			<li>
				<a href="index.php">Dashboard</a>
				<ul>
					<li><a href="index.php">Administration</a></li>
					<li><a href="forms.php">Forms</a></li>
					<li><a href="tables.php">Tables</a></li>
					<li><a href="msg.php">Response Messages</a></li>
				</ul>
			</li>
			<li>
				<a href="#">Users</a>
				<ul>
					<li>
						<a href="#">Menu item 1</a>
						<ul>
							<li><a href="#">Subitem 1</a></li>
							<li><a href="#">Subitem 2</a></li>
						</ul>
					</li>
					<li>
						<a href="#">Menu item 2</a>
					</li>
					<li>
						<a href="#">Menu item 3</a>
					</li>
					
					<li>
						<a href="#">Menu item 5</a>
						<ul>
							<li><a href="#">Subitem 1</a></li>
							<li><a href="#">Subitem 2</a></li>
						</ul>
					</li>
					<li>
						<a href="#">Menu item 6</a>
					</li>
					<li>
						<a href="#">Menu item 7</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#">Reports</a>
				<ul>
					<li>
						<a href="three-columns-layout.php">Three columns</a>
					</li>
					<li>
						<a href="two-column-layout.php">Two columns</a>
					</li>
					<li>
						<a href="three-column-small-layout.php">One big, two small</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#">Score Status</a>
				<ul>
					<li>
						<a href="accordion.php">Accordion</a>
					</li>
					<li>
						<a href="tabs.php">Tabs</a>
					</li>
					<li>
						<a href="overlays.php">Overlays</a>
					</li>
				</ul>
			</li>
		</ul>
		<?php } ?>
	</div>
