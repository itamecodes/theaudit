<?php include('header.php'); ?>
	<div id="page-wrapper">
	
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	
		<div id="main-wrapper">
			<div id="main-content">
			<?php echo $content;?>			
			</div>
			<div class="clearfix"></div>
		</div>
<?php if(!Yii::app()->user->isGuest){ 	
include('sidebar.php');
} ?>

	</div>
	<div class="clearfix"></div>
<?php include('footer.php'); ?>
</body>
</html>