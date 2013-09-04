
<?php
echo"<div class='title'><h3>Social Performance Score Results</h3></div>";
$i=1;
echo"<table class='detail-view'style='width: 70%; margin-left: 90px;'>";
echo"<tr><th style='width:20px;'>S.No</th><th>Dimensions</th><th>Scores</th></tr>";
$sumscore=0;
$sumtotalscore=0;
$catnamearray=array();
$catscorearray=array();
foreach($data as $dat){
    
    $class=($i%2==1) ? 'odd' : 'even';
    
    echo"<tr class='$class'>";
    echo"<td>$i</td>";
    echo"<td>".$dat['catname']."</td>";
    echo"<td>".$dat['score']."/".$dat['maxscore']."</td>";
    echo"</tr>";
    $i++;
    $sumscore+=$dat['score'];
    $sumtotalscore+=$dat['maxscore'];
    $catnamearray[]=$dat['catname'];
    $catscorearray[]=intval($dat['score']);
}
echo"<tr><td colspan=2>Total</td><td>".$sumscore."/".$sumtotalscore."</td></tr>";
echo"</table>";
?>
<br /><br /><br /><br />
<table class='detail-view'style='width: 70%;margin-left: 90px;'>
<tr><th colspan="2" style="text-align: center;">Echos Rating</th></tr>
<tr class="odd"><td>Advanced Level Of Social Performance</td><td >91%-100%</td></tr>
<tr class="even"><td>Very Good Social Performance </td><td>81%-90%</td></tr>
<tr class="odd"><td>Good Social Performance </td><td>71%-80%</td></tr>
<tr class="even"><td>Fair Social Performance </td><td>55%-70%</td></tr>
<tr class="odd"><td>Low Social Performance</td><td><55%</td></tr>
</table>


<?php
$catnamearray=array('Social mission', 'Outreach and access', 'Customer services', 'Human resources', 'Environment & Social practices ');
$catscorearray=array(13.8, 15.3, 22, 15, 7);

$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
   'chart'=>array(
            'renderTo'=> 'container',
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
         array('name'=>'Echos results','data' =>$catscorearray),
         
         
      ),
      'exporting' => array('enabled' => false),
      
   )
));
?>
<div id="container" style="width: 700px; height: 400px; margin: 0 auto"></div>
