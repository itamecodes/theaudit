<?php

class AddressbookController extends Controller
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
	public function actionCreate($id)
	{
		$model=new Addressbook;
		$model->institutionid=$id;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Addressbook']))
		{
			$model->attributes=$_POST['Addressbook'];
			if($model->validate()){
				$title_id=Datacomponent::addToTextMaster($model->text_title);
				$contactname_id=Datacomponent::addToTextMaster($model->text_contactpersonname);
				$address_id=Datacomponent::addToTextMaster($model->text_address);
				$model->titletxtid=$title_id;
				$model->contactpersonnametxtid=$contactname_id;
				$model->addresstxtid=$address_id;										
				if($model->save())
					$this->redirect(array('view','id'=>$model->addressid));
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
		$model->text_title=$model->titletxt->text;
		if(isset($model->contactpersonnametxtid)){
			$model->text_contactpersonname=$model->contactpersonnametxt->text;		
		}
		if(isset($model->addresstxtid)){
			$model->text_address=$model->addresstxt->text;
		}
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Addressbook']))
		{
			$model->attributes=$_POST['Addressbook'];
			if($model->validate()){
				$title_id=Datacomponent::addToTextMaster($model->text_title);
				$contactname_id=Datacomponent::addToTextMaster($model->text_contactpersonname);
				$address_id=Datacomponent::addToTextMaster($model->text_address);
				$model->titletxtid=$title_id;
				$model->contactpersonnametxtid=$contactname_id;
				$model->addresstxtid=$address_id;				
				if($model->save())
					$this->redirect(array('view','id'=>$model->addressid));
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
		Yii::app()->request->redirect(Yii::app()->createAbsoluteUrl('admin/addressbook/admin'));
		/*$dataProvider=new CActiveDataProvider('Addressbook');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($id)
	{
		$model=new Addressbook('search');
		$model->unsetAttributes();  // clear any default values
		$model->institutionid=$id;
		if(isset($_GET['Addressbook']))
			$model->attributes=$_GET['Addressbook'];

		$this->render('admin',array(
			'model'=>$model,'instituteid'=>$id,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Addressbook::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='addressbook-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
