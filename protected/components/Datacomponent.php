<?php
class Datacomponent extends CApplicationComponent
{
    public function init()
    {
        
    }
   static public function addToTextMaster($text)
    {
        $criteria=new CDbCriteria;
		$text=str_replace('"', "'", $text);        
        $criteria->condition="text=\"$text\"";
        $thetext=Textmaster::model()->find($criteria);
        if($thetext){
        	
        }else{
    	
    	$thetext=new Textmaster;
        $thetext->text=$text;
        $thetext->save();
        }
        return $thetext->textid;
    }
    static public function dateformat($date){
    	$date=date('d-m-Y',strtotime($date));
    	return $date;
    }
/** list Start **/    
    static public function list_category(){
    	$category_model=Categorymaster::model()->findAll(array('condition'=>'isactive=1'));
    	$category_list=CHtml::listData($category_model,'catid','categorynametxt.text');
    	return $category_list;
    }
    static public function list_subcategory($categoryid){
    	$subcategory_model=Subcategorymaster::model()->findAll(array('condition'=>"isactive=1 AND catid='$categoryid'"));
    	$subcategory_list=CHtml::listData($subcategory_model,'subcatid','subcategorynametxt.text');
    	return $subcategory_list;
    }    
    static public function list_legalstatus(){
    	$legalstatus_model=Legalstatusmaster::model()->findAll(array('condition'=>'isactive=1'));
    	$legalstatus_list=CHtml::listData($legalstatus_model,'legalstatusid','legalstatustxt.text');
    	return $legalstatus_list;
    }
    static  public function list_country(){
    	$country_model=Countrymaster::model()->findAll(array('condition'=>'isactive=1'));
    	$country_list=CHtml::listData($country_model,'countryid','countryname');
    	return $country_list;    	
    }
    static public function list_legalstatusbycountry($countryid){
    	$legalstatus_model=Addressbook::model()->with('institution')->findAll(array('condition'=>"institution.isactive=1 and countryid='$countryid'"));
    	$legalstatus_list=CHtml::listData($legalstatus_model,'institution.legalstatusid','institution.legalstatus.legalstatustxt.text');
    	$legalstatus_list=array_unique($legalstatus_list);
    	return $legalstatus_list;  
    	
    }
    static public function list_institute(){
    	$institute_model=Institutionmaster::model()->findAll(array('condition'=>'isactive=1'));
    	$institute_list=CHtml::listData($institute_model,'institutionid','institutionnametxt.text');
    	return $institute_list;    	
    }
	static public function list_institutebylegalstatusid($legalstatusid){
    	$institute_model=Institutionmaster::model()->findAll(array('condition'=>"isactive=1 and legalstatusid='$legalstatusid'"));
    	$institute_list=CHtml::listData($institute_model,'institutionid','institutionnametxt.text');
    	return $institute_list;    	
    }
   	    
   	static public function cppcategorylist()
    {     
        $data=CHtml::listData(Cppcategorymaster::model()->findAll(),'cppcatid','ccpcatnametxt.text');
        return $data;
    }    
    static public function cppquestionlist()
    {              
        $data=CHtml::listData(Cppquestionmaster::model()->findAll(),'cppqid','cppquestiontxt.text');
        return $data;
    }
    static  public function model_questionsbysubcatid($id){
    	$question_model=Questionmaster::model()->findAll(array('condition'=>"isactive=1 and subcatid='$id'"));
    	return $question_model;
    }       
    
	
/** list end **/
    static public function question_calculateWeight($subcatid){
		$question_model=Questionmaster::model()->findAll(array('condition'=>"isactive=1 and subcatid='$subcatid'"));
		if($question_model){
			$questionscore_list=CHtml::listData($question_model,'questid','questionscore');
			$sumofscore=array_sum($questionscore_list);
			foreach ($question_model as $model){
				$update_model=Questionmaster::model()->findByPk($model->questid);				
				$score=$update_model->questionscore;
				$update_model->questweight=($score/$sumofscore)*100;
				$update_model->save(false);
			}
		}
    }
/** get name for request **/
    static public function getcategoryname($id){
    	$model=Categorymaster::model()->findByPk($id);
    	return $model->categorynametxt->text; 
    }
    static public function getsubcategoryname($id){
    	$model=Subcategorymaster::model()->findByPk($id);
    	$data['subcategory']['id']=$id;
    	$data['subcategory']['name']=$model->subcategorynametxt->text;    	
    	$data['category']['id']=$model->cat->catid;
    	$data['category']['name']=$model->cat->categorynametxt->text;    	
    	return $data; 
    }
    
    static public function cppquestionsBycppcat($catid){
    	$cppquestions_model=Cppquestionmaster::model()->findAll(array('condition'=>"isactive=1 and cppcatid=$catid"));
    	$cppquestions_list=CHtml::listData($cppquestions_model,'cppqid','cppquestiontxt.text');    	    	
    	return $cppquestions_list;
    }
    
    static public function cppanswersdetails()
    {
    	$cppanswer_model=Cppanswermaster::model()->findAll(array('condition'=>"isactive=1"));
    	$cppanswer_list=CHtml::listData($cppanswer_model,'cppanswerid','cppanswertxt.text');
    	return $cppanswer_list;
    }
    
    static public function cppanswers_auditquestions($cppcategory,$questionid,$auditid){
    	$answerscoresheet_model=Answercoresheet::model()->with('scoresheet','cppanswerscoresheets')->findAll(
    						array('condition'=>"scoresheet.auditid='$auditid' and questid='$questionid' and 
    						cppanswerscoresheets.answerscoresheetid=ansscoresheetid"    						
    						));
		$list_data=array();							
		foreach ($answerscoresheet_model as $answerscore){
			foreach ($answerscore->cppanswerscoresheets as $ans){
				$list_data[$ans['cppquestid']]=$ans['cppanswerid'];
			}
		}   									
		return $list_data;
    }
    
    static public function iscomplete_category($categoryid,$auditid){
		/** total number of questions in this category **/
    	$auditscoresheet_model=Auditscoresheet::model()->findAll(array('condition'=>"auditid='$auditid' and categoryid='$categoryid'"));
		$subcategory_model=Subcategorymaster::model()->findAll(array('condition'=>"catid='$categoryid'"));
		if (count($subcategory_model)==count($auditscoresheet_model)){    	    	
    	if(count($auditscoresheet_model)>0){
    		$result=0;
    		$resultarray=array();
    		foreach ($auditscoresheet_model as $auditmodel){
    			$auditscoresheetid=$auditmodel->scoresheetid;    			
    			$question_category_model=Questionmaster::model()->with('subcat')->findAll(array('condition'=>"t.isactive=1 and subcat.isactive=1 and t.subcatid='$auditmodel->subcatid'"));    	
    			$question_category_result=Datacomponent::iscomplete_questions($question_category_model,$auditscoresheetid);
				if($question_category_result>=0){
					$resultarray[]=$question_category_result;
				}
    		}
    		return min($resultarray);
    	}else{
    		return 0;
    	}
		}else if(count($auditscoresheet_model)>0){
			return 1;
		}
		else{
			return 0;
		}
    }
    
    static public function iscomplete_subcategory($subcategoryid,$auditid){
    	$auditscoresheet_model=Auditscoresheet::model()->find("auditid='$auditid' and subcatid='$subcategoryid'");
    	if($auditscoresheet_model){
    		$subcategory_model=Subcategorymaster::model()->findAll(array('condition'=>"catid='$auditscoresheet_model->categoryid'"));    		
    		$auditscoresheetid=$auditscoresheet_model->scoresheetid;    		
			$question_subcategory_model=Questionmaster::model()->findAll(array('condition'=>"t.isactive=1 and subcatid='$subcategoryid'"));
			$question_subcategory_result=Datacomponent::iscomplete_questions($question_subcategory_model,$auditscoresheetid);
    		return $question_subcategory_result;
    	}else{
    		return 0;
    	}	
    }

    static public function iscomplete_questions($question_category_model,$scoresheetid){
    	$total_Questions=count($question_category_model);     	
		$normal_questions=array();
		$cpp_questions=array();
		$questionslist=array();
		
		foreach($question_category_model as $row){
			$questionslist[]=$row['questid'];
			if($row->iscpp==1 && $row->cppcatid!=''){
				$cpp_questions[$row['questid']]=$row['cppcatid'];				
			}else if($row->iscpp==0){
				$normal_questions[]=$row['questid'];
			}
		}
		
		if (count($questionslist)>0){
			$quesionslist_in="'".implode("','", $questionslist)."'";
			$answers_scoresheet_model=Answercoresheet::model()->findAll(array('condition'=>"questid IN ($quesionslist_in) AND scoresheetid='$scoresheetid'"));
			if(count($answers_scoresheet_model)>0){
				//echo count($answers_scoresheet_model)."SW";
			$answers_scoresheet_list=CHtml::listData($answers_scoresheet_model,'questid','ansscoresheetid');			
			//echo count($normal_questions)."--".count($answers_scoresheet_model)."--".count($cpp_questions)."<br/>";
			if (count($questionslist)==count($answers_scoresheet_model)){
				
				if(count($normal_questions)==count($answers_scoresheet_model) && count($cpp_questions)==0){
					return 2;
				}else if(count($cpp_questions)!=0) {
					foreach ($cpp_questions as $quest=>$cppcat){
						if(isset($answers_scoresheet_list[$quest])){
							$ansscoresheetid=$answers_scoresheet_list[$quest];
							return Datacomponent::iscomplete_cppcategory($cppcat, $ansscoresheetid);
						}else{
							return 1;
						}
					}
					return 1;
				}
			}else if(count($answers_scoresheet_model)>0){
				return 1;
			}else{
				return 0;
			}		
		}else{return 0; }
		}else {
			return 0;
		}    	
    }
    
    static  public function iscomplete_cppcategory($cppcategoryid,$ansscoresheetid){
		$cppcategory_questions_model=Cppquestionmaster::model()->findAll(array('condition'=>"isactive=1 and cppcatid='$cppcategoryid'"));
		if (count($cppcategory_questions_model)>0){
			$cppcat_questions_list=CHtml::listData($cppcategory_questions_model,'cppqid','cppqid');
			$cppquestid_in="'".implode("','",$cppcat_questions_list)."'";			
			$cppanswers_scoresheet_model=Cppanswerscoresheet::model()->findAll(array('condition'=>"answerscoresheetid='$ansscoresheetid' and cppquestid IN ($cppquestid_in)"));
		
			if(count($cppcategory_questions_model)==count($cppanswers_scoresheet_model)){
				return 2;
			}			
			else{
				return 1;
			}
		}else{
			return 0;
		}
    }
    
    static public function cppvalueByQuestion_ansscoresheetid($auditid,$subcategoryid,$questionid){
    	$auditscoresheet_model=Auditscoresheet::model()->find("auditid='$auditid' and subcatid='$subcategoryid'");
    	if($auditscoresheet_model){
    		$auditscoresheetid=$auditscoresheet_model->scoresheetid;
    		$answerscoresheet_model=Answercoresheet::model()->find("scoresheetid='$auditscoresheetid' and questid='$questionid'");
    		if($answerscoresheet_model){
    			if($answerscoresheet_model->quest->cppcatid=='' || $answerscoresheet_model->quest->cppcatid==NULL){			
    			}else{
					$result=Datacomponent::iscomplete_cppcategory($answerscoresheet_model->quest->cppcatid, $answerscoresheet_model->ansscoresheetid);
					if($result==2){
						$anstext=CHtml::listData(Cppanswermaster::model()->findAll(array('condition'=>"isactive=1")),'score','cppanswertxt.text');
						$array['value']=$answerscoresheet_model->answerscore;
						$value=round($answerscoresheet_model->answerscore);
						$array['valuetext']=$anstext[$value];
						return $array;
					}	    				
    			}
    		}  else{
    			return 0;
    		}
    	}else{
    		return 0;
    	}
    }
}
?>