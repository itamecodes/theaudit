<?php
class AuditprocessController extends Controller
{
	public $layout='//layouts/column2';
	
	public function actionIndex(){
		$this->render('index');
	}
	public function actionAudit($id){
		$auditmodel=$this->loadAuditModel($id);
		$this->render('auditopen',array('auditmodel'=>$auditmodel));				
	}

	public function actionPublishaudit(){
		if(isset($_REQUEST['auditid']) && $_REQUEST['auditid']!=''){
			$auditid=$_REQUEST['auditid'];
			$audit_model=Auditmaster::model()->findByPk($auditid);
			if($audit_model){
				$audit_model->status='P';
				$audit_model->save(false);
				echo "1";
			}
		}else{
			echo "0";
		}
	}
	
	public function loadAuditModel($id)
	{
		$model=Auditmaster::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function actionCppquestions(){
		if(isset($_REQUEST['questid'])){
			$questionid=$_REQUEST['questid'];
			$auditid=$_REQUEST['auditid'];
			$cppcategory=Questionmaster::model()->findByPk($questionid);
			
			if($cppcategory){
				$this->layout='contentonly';
				$this->render('cppquestions',array(
								'cppcategory'=>$cppcategory,
								'questionid'=>$questionid,
								'auditid'=>$auditid
								));
			}
		}
	}
	
	public function actionAnswerquestions(){
		if(isset($_REQUEST['auditanswer']) && isset($_REQUEST['auditid']) && $_REQUEST['auditanswer']!=''){
			$answers=$_REQUEST['auditanswer'];
			$anserarray=explode('.', $answers);			
			if(count($anserarray==3)){
				$auditid=$_REQUEST['auditid'];
				$subcategoryid=$anserarray[0];
				$questionid=$anserarray[1];
				$answerid=$anserarray[2];
				$subcat_model=Subcategorymaster::model()->findByPk($subcategoryid);
				if($subcat_model){					
					$auditscoresheet_model=$this->addaudit($auditid, $subcat_model);
					if($auditscoresheet_model){
						$answer_question_score=Answermaster::model()->findByPk($answerid);
						$answerscoresheet_model=Answercoresheet::model()->find("questid='$questionid' and scoresheetid='$auditscoresheet_model->scoresheetid'");			
						if(!$answerscoresheet_model){
							$answerscoresheet_model=new Answercoresheet();
							$answerscoresheet_model->questid=$questionid;
							$answerscoresheet_model->scoresheetid=$auditscoresheet_model->scoresheetid;
						}																				
						$answerscoresheet_model->answerid=$answerid;
						$answerscoresheet_model->answerscore=$answer_question_score->answerscore;
						$answerscoresheet_model->questmaxscore=$answer_question_score->quest->questionscore;						
						$answerscoresheet_model->save();
					}
				}
			}
			echo json_encode($anserarray);
		}		
	}
	/**    questions.cppcategoryid.cppquestion.cppanswer **/	
	public function actionAnswercppquestions(){
		if(isset($_REQUEST['auditcppanswer']) && isset($_REQUEST['auditid']) && $_REQUEST['auditcppanswer']!=''){
			$answers=$_REQUEST['auditcppanswer'];
			$anserarray=explode('.', $answers);			
			if(count($anserarray==3)){
				$auditid=$_REQUEST['auditid'];
				$questionid=$anserarray[0];
				$cppcategoryid=$anserarray[1];
				$cppquestionid=$anserarray[2];
				$cppanswerid=$anserarray[3];
				
				$question_model=Questionmaster::model()->findByPk($questionid);
				if($question_model){					
					$auditscoresheet_model=$this->addaudit($auditid, $question_model->subcat);
					if($auditscoresheet_model){
						$cpptransaction=Yii::app()->db->beginTransaction();
						try {
							$answer_question_score=Cppanswermaster::model()->findByPk($cppanswerid);
							$answerscoresheet_model=Answercoresheet::model()->find("questid='$questionid' and scoresheetid='$auditscoresheet_model->scoresheetid'");			
							if(!$answerscoresheet_model){
								$answerscoresheet_model=new Answercoresheet();
								$answerscoresheet_model->questid=$questionid;
								$answerscoresheet_model->scoresheetid=$auditscoresheet_model->scoresheetid;
							}
																							
							$answerscoresheet_model->answerid=new CDbExpression('NULL');
							$answerscoresheet_model->answerscore=$answer_question_score->score;
							$answerscoresheet_model->questmaxscore=new CDbExpression('NULL');						
							if($answerscoresheet_model->save(false))
							{							
								$cppanswerscoresheet_model=Cppanswerscoresheet::model()->find("cppquestid='$cppquestionid' and answerscoresheetid='$answerscoresheet_model->ansscoresheetid'");
								if(!$cppanswerscoresheet_model){
									$cppanswerscoresheet_model=new Cppanswerscoresheet();
									$cppanswerscoresheet_model->cppquestid=$cppquestionid;
									$cppanswerscoresheet_model->answerscoresheetid=$answerscoresheet_model->ansscoresheetid;	
								}			
								$cppanswerscoresheet_model->cppanswerid=$cppanswerid;								
								$cppanswerscoresheet_model->save();

								$cppanswermodel=Cppanswerscoresheet::model()->findAll(array('condition'=>"answerscoresheetid=$answerscoresheet_model->ansscoresheetid"));
								$cpptotal=0;
								$cppcount=0;
								foreach ($cppanswermodel as $cppans){
									$cpptotal+=$cppans->cppanswer->score;
									$cppcount++;
								}
								if($cppcount>0){
									$answerscoresheet_model->answerscore=$cpptotal/$cppcount;
									$answerscoresheet_model->save(false);
								}												
							}	
							$cpptransaction->commit();	
										
						}catch (Exception $e){
							$cpptransaction->rollBack();
							echo $e;	
						}
					}
				}															
			}
		}		
	}
	
	public function addaudit($auditid,$subcat_model){
		$auditscoresheet_model=Auditscoresheet::model()->find("auditid='$auditid' and categoryid='$subcat_model->catid' and subcatid='$subcat_model->subcatid'");
		if(!$auditscoresheet_model){	
			$auditscoresheet_model=new Auditscoresheet;
			$auditscoresheet_model->auditid=$auditid;
			$auditscoresheet_model->categoryid=$subcat_model->catid;
			$auditscoresheet_model->subcatid=$subcat_model->subcatid;						
		}
		$auditscoresheet_model->catmaxscore=$subcat_model->cat->catscore;
		$auditscoresheet_model->subcatmaxweight=$subcat_model->subcategoryweight;
		$auditscoresheet_model->subcatweightedscore=0;
		if($auditscoresheet_model->save()){
			return $auditscoresheet_model;
		}else{
			return 0;
		}
		
	}
}