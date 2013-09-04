<div class="title" style="margin-top: 10px;">
<div class="other-box yellow-box ui-corner-all">
					<div class="cont ui-corner-all">
						<h3>ECHOS-Reports</h3>
						<div>
                            <span style="font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INSTITUTION&nbsp;:</span>&nbsp;<span><?php echo $auditinfo['institution']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span style="font-weight: bold;">LEGAL STATUS&nbsp;:&nbsp;</span>&nbsp;<span style=""><?php echo $auditinfo['legal']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span style="font-weight: bold;">COUNTRY&nbsp;:&nbsp;</span>&nbsp;<span style=""><?php echo $auditinfo['countryname']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span style="font-weight: bold;">ANALYST&nbsp;:&nbsp;</span>&nbsp;<span style=""><?php echo $auditinfo['analystname']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            
                             
                        </div>
					</div>
				</div>
</div>

<?php

$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
      'ECHOS-RESULTS'=>array('content'=>$this->renderPartial("echosresult",array("data"=>$data),TRUE)),
        'ECHOS-ANSWERS'=>array('content'=>$this->renderPartial("echosanswers",array("dataanswers"=>$dataanswers),TRUE)),
      
        'CPP-RESULTS'=>array('content'=>$this->renderPartial("echosresultcpp",array("datacpp"=>$datacpp),TRUE)),
        
        // panel 3 contains the content rendered by a partial view
        //'AjaxTab'=>array('ajax'=>$ajaxUrl),
    ),
    // additional javascript options for the tabs plugin
    'options'=>array(
        'collapsible'=>true,
    ),
));