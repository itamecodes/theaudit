<?php

class CppquestionmasterController extends Controller
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
		$model=new Cppquestionmaster;
		if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){
			$model->cppcatid=$_REQUEST['id'];
		}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cppquestionmaster']))
		{
			$model->attributes=$_POST['Cppquestionmaster'];
			if($model->validate()){
	            $catid=DataComponent::addToTextMaster($_POST['Cppquestionmaster']['questiontext']);
	          	$catdescid=DataComponent::addToTextMaster($_POST['Cppquestionmaster']['questiondesc']);
			  	$model->cppquestiontxtid=$catid;
	          	$model->cppdecriptiontxtid=$catdescid;        
				if($model->save()){
				  	$this->redirect(array('view','id'=>$model->cppqid));
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
		$model->questiontext=$model->cppquestiontxt->text;
		$model->questiondesc=$model->cppdecriptiontxt->text;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cppquestionmaster']))
		{
		  $model->attributes=$_POST['Cppquestionmaster'];
		  if($model->validate()){
	          $catid=DataComponent::addToTextMaster($_POST['Cppquestionmaster']['questiontext']);
	          $catdescid=DataComponent::addToTextMaster($_POST['Cppquestionmaster']['questiondesc']);
			  $model->cppquestiontxtid=$catid;
	          $model->cppdecriptiontxtid=$catdescid;
				if($model->save())
					$this->redirect(array('view','id'=>$model->cppqid));
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
		Yii::app()->request->redirect(Yii::app()->createAbsoluteUrl('admin/cppquestionmaster/admin'));		
		/*$dataProvider=new CActiveDataProvider('Cppquestionmaster');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Cppquestionmaster('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cppquestionmaster']))
			$model->attributes=$_GET['Cppquestionmaster'];

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
		$model=Cppquestionmaster::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='cppquestionmaster-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
