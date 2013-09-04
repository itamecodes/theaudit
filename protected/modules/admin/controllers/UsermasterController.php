<?php

class UsermasterController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Usermaster;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Usermaster']))
		{
			
			$model->attributes=$_POST['Usermaster'];
			if($model->validate()){
				$model->password=sha1($model->password);
				$model->confirmpassword=sha1($model->confirmpassword);
			if($model->save()){		
				$this->userdetailsupdate($model);									
				$this->redirect(array('view','id'=>$model->userid));
			}
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);	
		$userdetails=Userdetails::model()->find("userid='$id'");
		if ($userdetails){
			$model->firstname=$userdetails->firstname;
			$model->lastname=$userdetails->lastname;
			$model->email=$userdetails->email;
			$model->phoneno=$userdetails->phoneno;
			$model->mobileno=$userdetails->mobileno;			
		}
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Usermaster']))
		{
			$model->attributes=$_POST['Usermaster'];
			if($model->validate()){
				$model->password=sha1($model->password);
				$model->confirmpassword=sha1($model->confirmpassword);
				if($model->save()){
					$this->userdetailsupdate($model);
					$this->redirect(array('view','id'=>$model->userid));
				}
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Usermaster');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Usermaster('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usermaster']))
			$model->attributes=$_GET['Usermaster'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Usermaster::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usermaster-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function userdetailsupdate($model){
		$userid=Yii::app()->user->getId();		
		$userdetails=Userdetails::model()->find("userid='$model->userid'");
		if (!$userdetails){
			$userdetails=new Userdetails;
			$userdetails->createdon=$model->lasteditedon;
			$userdetails->createdby=$userid;			
		}
		$userdetails->userid=$model->userid;
		$userdetails->firstname=$model->firstname;
		$userdetails->lastname=$model->lastname;
		$userdetails->email=$model->email;
		$userdetails->phoneno=$model->phoneno;
		$userdetails->mobileno=$model->mobileno;
		$userdetails->lasteditedon=$model->lasteditedon;
		$userdetails->lasteditedby=$userid;
		$userdetails->isactive=1;				
		$userdetails->save();
	}	
}
