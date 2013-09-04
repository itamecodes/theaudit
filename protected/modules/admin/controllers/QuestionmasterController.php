<?php

class QuestionmasterController extends Controller
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
		$model=new Questionmaster;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){
			$model->subcatid=$_REQUEST['id'];
		}
		if(isset($_POST['Questionmaster']))
		{
			$model->attributes=$_POST['Questionmaster'];
			if($model->validate()){
				$model->questiontxtid=Datacomponent::addToTextMaster($model->text_question);
				if($model->isactive==0){$model->questweight=0;}
				else if($model->isactive==0){$model->questweight=100;}							
				if($model->iscpp==0){
					$model->cppcatid=NULL;
				}
				if($model->save()){
					$model->questweight=Datacomponent::question_calculateWeight($model->subcatid);
					$this->redirect(array('view','id'=>$model->questid));
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
		$model->text_question=$model->questiontxt->text;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Questionmaster']))
		{
			$model->attributes=$_POST['Questionmaster'];
			if($model->validate()){
				$model->questiontxtid=Datacomponent::addToTextMaster($model->text_question);
				if($model->isactive==0){$model->questweight=0;}
				else if($model->isactive==0){$model->questweight=100;}
				if($model->iscpp==0){
					$model->cppcatid=NULL;
				}				
				if($model->save()){
					$model->questweight=Datacomponent::question_calculateWeight($model->subcatid);												
					$this->redirect(array('view','id'=>$model->questid));
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
		Yii::app()->request->redirect(Yii::app()->createAbsoluteUrl('admin/questionmaster/admin'));
		/*$dataProvider=new CActiveDataProvider('Questionmaster');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$category_subcategory_name='';
		$model=new Questionmaster('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){
			$model->subcatid=$_REQUEST['id'];
			$category_subcategory_name=Datacomponent::getsubcategoryname($_REQUEST['id']);
		}
		if(isset($_GET['Questionmaster']))
			$model->attributes=$_GET['Questionmaster'];
		$this->render('admin',array(
			'model'=>$model,'subcategoryid'=>$model->subcatid,'catsubcatname'=>$category_subcategory_name,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Questionmaster::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='questionmaster-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
