<style type=text/css>
.ui-widget {
    font-family:Arial,sans-serif;
    font-size: 1.1em;
}
</style>
<div style="width: 100%;overflow: auto;height: 350px;border-top: 1px solid #D2D2CE;;" id="scrollresults">

<?php

$catid=0;
$r=1;
foreach($dataanswers as $data){
    $newcatid=$data['catid'];
    if($newcatid!=$catid){
        $r=1;
        echo "<h3 style='margin-top: 10px;'>".$data['catname']."</h3>";
        
    }else{
        $r++;
    }
    echo "<div style='margin-top: 10px;'>";
    echo"<h4>$r.&nbsp;".$data['subcatname']."</h4>";
    $arrayques=explode("|",$data['thequestions']);
    $arrayanswers=explode("|",$data['theanswers']);
    $i=0;
    foreach($arrayques as $ques){
        $j=$i+1;
        echo "<h4 style='margin-left: 26px; margin-top: 10px;'>$r.$j.&nbsp;".$ques."</h4>";
        
        echo "<div class='answer' style='margin-left: 57px; margin-top: 7px;'>".$arrayanswers[$i]."</div></br>";
        $i++;
    }
    echo "</div>";
    $catid=$newcatid;
}
?>
</div>