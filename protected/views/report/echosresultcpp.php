<?php
echo "<div class='title'><h3>CPP Questionnaire results</h3></div>";
echo"<table class='detail-view' style='width: 70%;margin-left: 90px;'>";
echo"<tr><th>Client Protection Prinicples</th><th>Score/5 Points</th></tr>";
$sum=0;
$count=count($datacpp);
$catnamearray=array();
$catscorearray=array();
$i=1;
foreach($datacpp as $data){
    $class=($i%2==1) ? 'odd' : 'even';
    echo"<tr class='$class'><td>".$data['cppcategoryname']."</td><td >".$data['answerscore']."</td></tr>";
    $sum+=$data['answerscore'];
    $catnamearray[]=$data['cppcategoryname'];
    $catscorearray[]=intval($data['answerscore']);
    $i++;
}
echo"<tr><td>Total</td><td>".$sum/$count."</td>";
echo"</table>";


$catnamearray=array('Prevention of Over indebtedness', 'Transparency', 'Responsible Pricing', 'Privacy of ClientData', 'Mechanism for Complaint Resolution');
$catscorearray=array(5, 4, 3, 2, 3);


$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
   'chart'=>array(
            'renderTo'=> 'containerone',
            'polar'=> true,
            'type'=> 'line'
        ),
      'title' => array('text' => 'Budget vs spending'),
      'xAxis' => array(
         'categories' =>$catnamearray,
         'tickmarkPlacement'=>'on',
            'lineWidth'=> 0
      ),
      'yAxis' => array(
         'gridLineInterpolation'=> 'polygon',
            'lineWidth'=> 0,
            'min'=> 0
      ),
      'series' => array(
         array('name'=>'CPP results','data' =>$catscorearray),
         
         
      ),
      'exporting' => array('enabled' => false),
      
   )
));
?>
<div id="containerone" style="width: 700px; height: 400px; margin: 0 auto"></div>