<?php

class CppanswermasterController extends Controller
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
		$model=new Cppanswermaster;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cppanswermaster']))
		{
					  
        	$model->attributes=$_POST['Cppanswermaster'];
          	if($model->validate()){
            	$catid=DataComponent::addToTextMaster($_POST['Cppanswermaster']['cppanswer']);
	          	//$catdescid=DataComponent::addToTextMaster($_POST['Cppanswermaster']['cppquestionid']);
		  		$model->cppanswertxtid=$catid;         		
				if($model->save())
					$this->redirect(array('view','id'=>$model->cppanswerid));
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
		$model->cppanswer=$model->cppanswertxt->text;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cppanswermaster']))
		{
			$model->attributes=$_POST['Cppanswermaster'];
			if($model->validate()){
            	$catid=DataComponent::addToTextMaster($_POST['Cppanswermaster']['cppanswer']);
		        //$catdescid=DataComponent::addToTextMaster($_POST['Cppanswermaster']['cppquestionid']);
		  		$model->cppanswertxtid=$catid;
				if($model->save())
					$this->redirect(array('view','id'=>$model->cppanswerid));
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
		$dataProvider=new CActiveDataProvider('Cppanswermaster');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Cppanswermaster('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cppanswermaster']))
			$model->attributes=$_GET['Cppanswermaster'];

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
		$model=Cppanswermaster::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='cppanswermaster-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
