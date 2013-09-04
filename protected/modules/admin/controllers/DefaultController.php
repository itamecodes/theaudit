<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionSubcatlistbycatid(){
		$catid=$_REQUEST['catid'];
		$subcategory_list=Datacomponent::list_subcategory($catid);
		$ddlist="<option value='' >Select Subcategory</option>";
		echo $ddlist;
		foreach($subcategory_list as $key=>$value){
			$ddlist="<option value='$key'>$value</option>";
			echo $ddlist;
		}
	}
	public function actionLegalstatusbycountry(){
		$countryid=$_REQUEST['id'];
		$legalsatus_list=Datacomponent::list_legalstatusbycountry($countryid);
		$ddlist="<option value='' >Select Legalstatus</option>";
		echo $ddlist;
		foreach($legalsatus_list as $key=>$value){
			$ddlist="<option value='$key'>$value</option>";
			echo $ddlist;
		}
	}
	public function actionInstitutebylegalstatus(){
		$id=$_REQUEST['id'];
		$legalsatus_list=Datacomponent::list_institutebylegalstatusid($id);
		$ddlist="<option value='' >Select Institute</option>";
		echo $ddlist;
		foreach($legalsatus_list as $key=>$value){
			$ddlist="<option value='$key'>$value</option>";
			echo $ddlist;
		}		
	}
	
}