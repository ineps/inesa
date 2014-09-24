<?php

class DomicilioclienteController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/*public function getDomicilioCompleto()
        {
            return $this->calle.', '.$this->colonia.', '.$this->municipio.', '.$this->estados->estados;
        }*/

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'vistaempresas','create', 'admin', 'update'),
				'expression'=>'!$user->isGuest && Yii::app()->user->getState("nivel_acceso") == "Gerente"',
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index', 'vistaempresas','create', 'admin', 'view'),
				'expression'=>'!$user->isGuest && Yii::app()->user->getState("nivel_acceso") == "Ventas"',
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index', 'admin', 'update', 'view'),
				'expression'=>'!$user->isGuest && Yii::app()->user->getState("persona") == "administrador"',
			),
			
			/*array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'vistaempresas'),
				'users'=>array('admin'),
			),*/
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

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
		$model=new Domiciliocliente;
		$model2=new Asesor;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Domiciliocliente']))
		{
			$model->attributes=$_POST['Domiciliocliente'];
			#$model2->attributes=$_POST['Asesor'];
			if($model->save())
				$this->redirect(array('admin','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
			#'model2'=>$model2,
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Domiciliocliente']))
		{
			$model->attributes=$_POST['Domiciliocliente'];
			if($model->save())
				$this->redirect(array('admin','id'=>$model->id));
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
		$dataProvider=new CActiveDataProvider('Domiciliocliente');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionListadomicilios($id)
	{
		$dataProvider=new CActiveDataProvider('Domiciliocliente');
		$this->render('listadomicilios',array(
			'dataProvider'=>$dataProvider,
			'id'=>$id,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Domiciliocliente('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Domiciliocliente']))
			$model->attributes=$_GET['Domiciliocliente'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Domiciliocliente the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Domiciliocliente::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Domiciliocliente $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='domiciliocliente-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
