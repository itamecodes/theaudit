<?php

class CppcategorymasterController extends Controller
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
		$model=new Cppcategorymaster;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cppcategorymaster']))
		{
		  $model->attributes=$_POST['Cppcategorymaster'];
		  if($model->validate()){
          		$catid=DataComponent::addToTextMaster($_POST['Cppcategorymaster']['categoryname']);
          		$catdescid=DataComponent::addToTextMaster($_POST['Cppcategorymaster']['categorydesc']);
		  		$model->ccpcatnametxtid=$catid;
          		$model->cppcatdesctxtid=$catdescid;
		 		if($model->save()){
					$this->redirect(array('view','id'=>$model->cppcatid));
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
		$model->categoryname=$model->ccpcatnametxt->text;
		$model->categorydesc=$model->cppcatdesctxt->text;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cppcategorymaster']))
		{
			$model->attributes=$_POST['Cppcategorymaster'];
			if($model->validate()){
	            $catid=DataComponent::addToTextMaster($_POST['Cppcategorymaster']['categoryname']);
	            $catdescid=DataComponent::addToTextMaster($_POST['Cppcategorymaster']['categorydesc']);
		        $model->ccpcatnametxtid=$catid;
	            $model->cppcatdesctxtid=$catdescid;
				if($model->save()){
				 $this->redirect(array('view','id'=>$model->cppcatid));
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
		Yii::app()->request->redirect(Yii::app()->createAbsoluteUrl('admin/cppcategorymaster/admin'));			
		/*$dataProvider=new CActiveDataProvider('Cppcategorymaster');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Cppcategorymaster('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cppcategorymaster']))
			$model->attributes=$_GET['Cppcategorymaster'];

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
		$model=Cppcategorymaster::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='cppcategorymaster-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
