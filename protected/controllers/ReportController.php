<?php

class ReportController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex($id)
	{
	   /*for echos results*/
       $query="select catmaxscore,categoryname,(sum(result)*catmaxscore) as thescore from view_scoresheet v where auditid=$id group by categoryid ;";
       $query1="select count(distinct(categoryid)) as numbercategory from view_scoresheet where auditid=$id;";
       
       $rows = Yii::app()->db->createCommand($query)->queryAll();
       
       $row=Yii::app()->db->createCommand($query1)->queryRow();
       $numberofcategories=$row['numbercategory'];
       $maincatarray=array();
       
       foreach($rows as $rowone){
        $catarray=array();
        $categoryscore=$rowone['thescore']/$numberofcategories;
        $categoryname=$rowone['categoryname'];
        $catarray['score']=$categoryscore;
        $catarray['catname']=$categoryname;
        $catarray['maxscore']=$rowone['catmaxscore'];
        $maincatarray[]=$catarray;
       }
       /*echos results data ends*/
       
       /*for cpp results*/
       $thegreatquery="SET group_concat_max_len=1073741824";
        Yii::app()->db->createCommand($thegreatquery)->execute();
       
       $querycpp="select cppcategoryname,answerscore from view_cppauditscore where auditid=$id";
       $resultcpp = Yii::app()->db->createCommand($querycpp)->queryAll();
       
       
       
       $queryechosanswers="Select catid,catname,subcatname,group_concat(question SEPARATOR '|') as thequestions,group_concat(answer SEPARATOR '|') as theanswers
from view_echosanswers where auditid=$id group by subcatid order by catid asc,subcatid asc;";
       $resultanswers = Yii::app()->db->createCommand($queryechosanswers)->queryAll();
       
       
       $auditdetailsquery="select concat(u.firstname ,' ',u.lastname)as analystname,t.text as institution,c.countryname,tl.text as legal
 from auditmaster a
join institutionmaster i  on a.institutionid=i.institutionid  join textmaster t
on t.textid=i.institutionnametxtid  join countrymaster c on c.countryid=a.countryid
join userdetails u on u.userid=a.analystid join legalstatusmaster l on l.legalstatusid=i.legalstatusid join textmaster tl
on tl.textid=l.legalstatustxtid
where auditid=$id";
$resultauditinfo = Yii::app()->db->createCommand($auditdetailsquery)->queryRow();
       
       	$this->render('test',array('data'=>$maincatarray,'datacpp'=>$resultcpp,'dataanswers'=>$resultanswers,'auditinfo'=>$resultauditinfo));
	}
    
    
    public function actionScoreresults()
    {
        $data=Datacomponent::cppcategorylist();
       
        //print_r($data);
       $this->render('scoreresult',array('data'=>$data));
        //$dimensionamearray=Categorymaster::model()->findAll()
    }
    
    
    
    
    
    
    
    
    
    
    

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	
}