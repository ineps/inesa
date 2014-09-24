<?php

class ProductosController extends Controller
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
                        'actions'=>array('index','create', 'admin', 'update', 'prueba', 'ajaxprueba', 'ajaxprueba1'),
                        'expression'=>'!$user->isGuest && Yii::app()->user->getState("nivel_acceso") == "Gerente"',
                ),
                array('allow',  // allow all users to perform 'index' and 'view' actions
                        'actions'=>array('index', 'create', 'admin', 'view'),
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
        /******************************/
        public function actionPrueba()
        {
            $model = new Productos;
            
            $this->render('prueba', array('model'=>$model));
            
        }
        
        public function actionAjaxprueba1()
        {
            $sucursal = $_POST['Productos']['servicios_id'];
            $lista = Servicios::model()->find(array('condition'=>"id=".$sucursal));
            echo CJSON::encode(array('preciounitario'=>$lista->precio));
        }
        
        public function actionajaxPrueba()
        {
            $sucursal = $_POST['Productos']['areas_id'];
            $lista = Servicios::model()->findAll('areas_id = :empresa_id', array(':empresa_id'=>$sucursal));
            $lista = CHtml::listData($lista, 'id', 'servicio');
            
            echo CHtml::tag('option', array('empty'=>''), 'Seleccione Sucursal', true);
            foreach ($lista as $key => $descripcion)
            {
               echo CHtml::tag('option', array('value'=>$key), CHtml::encode($descripcion), true);
            }
        }
        
        /********************************/
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
		$model=new Productos;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Productos']))
		{
			$model->attributes=$_POST['Productos'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Productos']))
		{
			$model->attributes=$_POST['Productos'];
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
		$dataProvider=new CActiveDataProvider('Productos');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Productos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Productos']))
			$model->attributes=$_GET['Productos'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Productos the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Productos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Productos $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='productos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
