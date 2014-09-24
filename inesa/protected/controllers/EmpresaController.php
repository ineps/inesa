<?php

class EmpresaController extends Controller
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
                            'actions'=>array('index', 'vistaempresas','create', 'admin', 'update'),
                            'expression'=>'!$user->isGuest && Yii::app()->user->getState("nivel_acceso") == "Gerente"',
                    ),
                    array('allow',  // allow all users to perform 'index' and 'view' actions
                            'actions'=>array('index', 'vistaempresas','create', 'admin'),
                            'expression'=>'!$user->isGuest && Yii::app()->user->getState("nivel_acceso") == "Ventas"',
                    ),
                    array('allow',  // allow all users to perform 'index' and 'view' actions
                            'actions'=>array('index', 'admin', 'update', 'view', 'create', 'vistaempresas'),
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
            $model=new Empresa;
            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if(isset($_POST['Empresa']))
            {
                    $model->attributes=$_POST['Empresa'];
                    if($model->save())
                            $this->redirect(array('admin','id'=>$model->id));
            }

            $this->render('create',array(
                    'model'=>$model,
            ));
	}

	public function actionVistaempresas($id)
	{

		$ventana_domicilios = false; //Variable de la venta modal para ingresar datos del domicilio de la sucursal.
		$ventana_personas = false; //Variable de la venta modal para ingresar datos de la personsa.
		$ventana_asignacion = false;
		$ventana_domicilios = false;

		$id_contacto='';

		$id_empresa = Empresa::model()->findByPk($id); //Variable que guarda los datos de la fila empresa que se selecciono.
		$domiciliobd = Domiciliocliente::model()->findAll(array('condition'=>'empresa_id='.$id.' AND estatus_id= 1'));//Arroja los resultados  que coinciden con la empresa y el id
		
		$model_domicilio = new Domiciliocliente;
		$model_asesor = new Asesor;
		$model_personas=new Personas;
		$domiciliopersonas = new Domiciliopersonas;
		$Cargos = new Cargo;
		$model_acronimo = new Acronimo;

		if(isset($_POST['Domiciliocliente']))
		{
			$model_domicilio->attributes = $_POST['Domiciliocliente'];
			if($model_domicilio->save())
			{		
				$model_asesor->personas_id = Yii::app()->user->getState('id_persona');
				$model_asesor->autoriza = Yii::app()->user->getState('id_persona');
				$model_asesor->autorizado = "0";
				$model_asesor->domiciliocliente_id = $model_domicilio->id;
				if($model_asesor->save()){
					$this->redirect(array('vistaempresas',
					'id'=>$id,
					));					
				}
			}
			else
			{
				$ventana_domicilios = true;
				$this->redirect(array('', 'ventana_domicilios'=>$ventana_domicilios, 'id'=>$id));
			}					
		}
		elseif(isset($_POST['Personas']))
		{
			$model_personas->attributes = $_POST['Personas'];
			if($model_personas->save())
			{   
				$ventana_asignacion = true;
				$this->redirect(array('vistaempresas',
				'id'=>$id,
				'id_contacto'=>$model_personas->id,
				'ventana_personas'=>$ventana_personas,
				'ventana_asignacion'=>$ventana_asignacion,
				));
			}
			else
			{
				$ventana_personas = true;
				$this->redirect(array('','ventana_personas'=>$ventana_personas, 'id'=>$id,));				
			}					
		}
		elseif(isset($_POST['Domiciliopersonas']))
		{
			$domiciliopersonas->attributes = $_POST['Domiciliopersonas'];
			if($domiciliopersonas->save())
			{
                            $this->redirect(array('vistaempresas',
                            'id'=>$id,
                            ));

			}
			else
			{
				$ventana_personas = true;
				$this->render('vistaempresas', array('ventana_personas'=>$ventana_personas,'id_empresa'=>$id_empresa, 'domiciliobd'=>$domiciliobd,'model_domicilio'=>$model_domicilio, 'model_personas'=>$model_personas,'ventana_personas'=>$ventana_personas, 'ventana_domicilios'=>$ventana_domicilios, 'admin'=>Yii::app()->user->getState("nivel_acceso")));				
			}					
		}
		elseif(isset($_POST['Cargo']))
		{
                    $Cargos->attributes = $_POST['Cargo'];
                    if($Cargos->save())
                    {
                            $ventana_personas = true;
                            $this->render('vistaempresas',array(
                            'id'=>$id,
                            'ventana_personas'=>$ventana_personas,
                            'ventana_domicilios'=>$ventana_domicilios,
                            'ventana_personas'=>$ventana_personas,'id_empresa'=>$id_empresa, 'domiciliobd'=>$domiciliobd,'model_domicilio'=>$model_domicilio, 'model_personas'=>$model_personas,'ventana_personas'=>$ventana_personas, 'ventana_domicilios'=>$ventana_domicilios, 'admin'=>Yii::app()->user->getState("nivel_acceso"),
                            ));

                    }
                    else
                    {
                            $ventana_personas = true;
                            $this->render('vistaempresas', array('ventana_personas'=>$ventana_personas,'id_empresa'=>$id_empresa, 'domiciliobd'=>$domiciliobd,'model_domicilio'=>$model_domicilio, 'model_personas'=>$model_personas,'ventana_personas'=>$ventana_personas, 'ventana_domicilios'=>$ventana_domicilios, 'admin'=>Yii::app()->user->getState("nivel_acceso")));				
                    }					
		}
		elseif(isset($_POST['Acronimo']))
		{
                    $model_acronimo->attributes = $_POST['Acronimo'];
                    if($model_acronimo->save())
                    {
                            $ventana_personas = true;
                            $this->render('vistaempresas',array(
                            'id'=>$id,
                            'ventana_personas'=>$ventana_personas,
                            'ventana_domicilios'=>$ventana_domicilios,
                            'ventana_personas'=>$ventana_personas,'id_empresa'=>$id_empresa, 'domiciliobd'=>$domiciliobd,'model_domicilio'=>$model_domicilio, 'model_personas'=>$model_personas,'ventana_personas'=>$ventana_personas, 'ventana_domicilios'=>$ventana_domicilios, 'admin'=>Yii::app()->user->getState("nivel_acceso"),
                            ));

                    }
                    else
                    {
                            $ventana_personas = true;
                            $this->render('vistaempresas', array('ventana_personas'=>$ventana_personas,'id_empresa'=>$id_empresa, 'domiciliobd'=>$domiciliobd,'model_domicilio'=>$model_domicilio, 'model_personas'=>$model_personas,'ventana_personas'=>$ventana_personas, 'ventana_domicilios'=>$ventana_domicilios, 'admin'=>Yii::app()->user->getState("nivel_acceso")));				
                    }					
		}
		else
		$this->render('vistaempresas', array('domiciliopersonas'=>$domiciliopersonas,'ventana_asignacion'=>$ventana_asignacion,'ventana_personas'=>$ventana_personas,'id_empresa'=>$id_empresa, 'domiciliobd'=>$domiciliobd, 'model_domicilio'=>$model_domicilio, 'id'=>$id, 'ventana_domicilios'=>$ventana_domicilios, 'ventana_personas'=>$ventana_personas, 'model_personas'=>$model_personas, 'admin'=>Yii::app()->user->getState("nivel_acceso")));
			
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

		if(isset($_POST['Empresa']))
		{
			$model->attributes=$_POST['Empresa'];
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
	/*public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Empresa');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}*/

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Empresa('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Empresa']))
			$model->attributes=$_GET['Empresa'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Empresa the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Empresa::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'La página que solicita no existe.');
		return $model;
	}
	/**
	 * Performs the AJAX validation.
	 * @param Empresa $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='empresa-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
