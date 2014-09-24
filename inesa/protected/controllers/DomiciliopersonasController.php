<?php

class DomiciliopersonasController extends Controller
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

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','create', 'admin', 'update', 'Createmodal', 'ajaxdomicilioclientes', 'borrarcontacto'),
				'expression'=>'!$user->isGuest && Yii::app()->user->getState("nivel_acceso") == "Gerente"',
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index', 'create', 'admin', 'view', 'createmodal', 'ajaxdomicilioclientes'),
				'expression'=>'!$user->isGuest && Yii::app()->user->getState("nivel_acceso") == "Ventas"',
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index', 'admin', 'create', 'update'),
				'expression'=>'!$user->isGuest && Yii::app()->user->getState("persona") == "administrador"',
			),
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
        
        public function actionAjaxdomicilioclientes()
        {
            $sucursal = $_POST['Domiciliopersonas']['domiciliocliente_id'];
            $lista = Domiciliopersonas::model()->findAll('domiciliocliente_id = :domiciliocliente_id', array(':domiciliocliente_id'=>$sucursal));
            $lista = CHtml::listData($lista, 'id', 'nombres');
            
            #echo CHtml::tag('option', array('empty'=>''), 'Seleccione Contacto', true);
            foreach ($lista as $key => $descripcion)
            {
               echo CHtml::tag('option', array('value'=>$key), CHtml::encode($descripcion), true);
            }
        }
        
        public function actionBorrarcontacto()
        {                    
            $modelo =  Domiciliopersonas::model()->findByPk($_GET['id']);
            if(isset($_GET['id']))
            {   $modelo->delete(); 
                $this->redirect(Yii::app()->homeUrl."empresa/vistaempresas/".$_GET['id_empresa']);                
            }
        }
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Domiciliopersonas;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Domiciliopersonas']))
		{
			$model->attributes=$_POST['Domiciliopersonas'];
			if($model->save())
				$this->redirect(array('empresa/admin','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionCreatemodal($id)
	{
		$model=new Domiciliopersonas;
		$id_empresa = Empresa::model()->findByPk($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Domiciliopersonas']))
		{
			$model->attributes=$_POST['Domiciliopersonas'];
			if($model->save())
				$this->redirect(array('empresa/vistaempresas','id'=>$id));
		}

		$this->render('createmodal',array(
			'model'=>$model,
			'id_empresa'=>$id_empresa,
                        'id'=>$id,
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

		if(isset($_POST['Domiciliopersonas']))
		{
			$model->attributes=$_POST['Domiciliopersonas'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$dataProvider=new CActiveDataProvider('Domiciliopersonas');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Domiciliopersonas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Domiciliopersonas']))
			$model->attributes=$_GET['Domiciliopersonas'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Domiciliopersonas the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Domiciliopersonas::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Domiciliopersonas $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='domiciliopersonas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
