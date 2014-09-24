<?php

class CotizacionController extends Controller
{
	
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
	
	public function accessRules()
	{
            return array(
                array('allow',  // allow all users to perform 'index' and 'view' actions
                    'actions'=>array('index','descuento','cancelar' ,'create', 'admin', 'admin_ot' ,'cantidad','update', 'ordentrabajo','Createmodal', 'textoadicional', 'cotizaciones', 'servicios','pdfproceso', 'vistacotizacionpdf',
                        'servicios2','costos', 'cotizar', 'vistacotizacion', 'ajaxdropempresa', 'ajaxdropempresa2', 'ajaxdropsucursal', 'ajaxdropsucursal2', 'ajaxsucursales', 
                        'prueba', 'ajaxprueba', 'ajaxcantidad', 'ajaxprueba1', 'borrarproducto', 'enviarcotizacion', 'aceptarcotizacion','rechazarcotizacion'),
                    'expression'=>'!$user->isGuest && Yii::app()->user->getState("nivel_acceso") == "Gerente"',
                ),
                array('allow',  // allow all users to perform 'index' and 'view' actions
                    'actions'=>array('index', 'create', 'admin', 'view', 'createmodal', 'cotizaciones', 'servicios', 'servicios2', 'costos', 'cotizar', 'vistacotizacion', 'ajaxdropempresa', 'ajaxdropsucursal'),
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
        
        //
        public function actionDescuento()
        {
            $model = Cotizacion::model()->find(array('condition'=>'colocarfolio='.$_POST['Cotizacion']['folio']));
            if(isset($_POST['Cotizacion']))
            {
               $model->attributes=array('descuento'=>$_POST['Cotizacion']['descuento']);
                if($model->save()) 
                {  
                    $models = Productos::model()->findAll(array('condition'=>'cotizacion_id='.$_POST['Cotizacion']['id']));
                    Global $total;
                    foreach ($models as $key)
                    {
                        $total += $key->monto;
                    }
                    $total_descuento = $total - (($model->descuento/100)*$total);
                    $subtotal = $total_descuento / 1.16;
                    $iva = $total_descuento - $subtotal;
                    $model->attributes = array('total'=>$total_descuento, 'subtotal'=>$subtotal, 'iva'=>$iva);
                    $model->save();

                    $this->redirect(array('vistacotizacion', 'id'=>$_POST['Cotizacion']['id'], 'folio'=>$_POST['Cotizacion']['folio']));
                }
            }
        }
        
        public function actionPdfproceso()
        {
            
            $model = new Productos;
            $pdf = Yii::app()->ePdf->mpdf();
            $pdf->WriteHTML($this->renderPartial('vistacotizacionpdf',array('id'=>$_GET['id'], 'folio'=>$_GET['folio']), true));
            $pdf->Output();
        }
        
           
        public function actionPrueba()
        {
            $model = new Productos;
            
            $this->render('prueba', array('model'=>$model));
            
        }
        public function actionTextoadicional()
        {
            $model = Cotizacion::model()->find(array('condition'=>'colocarfolio='.$_GET['folio']));
            if(isset($_POST['Cotizacion']['textoadicional'])){
                $model->attributes = array('textoadicional'=>$_POST['Cotizacion']['textoadicional']);
                if($model->save())
                {
                    $this->redirect(array('//cotizacion/vistacotizacion','id'=>$_GET['id'], 'folio'=>$_GET['folio']));
                }
            }
            elseif(isset($_POST['Cotizacion']['observacionesot'])){
                $model->attributes = array('observacionesot'=>$_POST['Cotizacion']['observacionesot']);
                if($model->save())
                {
                    $this->redirect(array('//cotizacion/ordentrabajo','id'=>$_GET['id'], 'folio'=>$_GET['folio']));
                }
            }
            elseif(isset($_POST['Cotizacion']['observacionestrabajo'])){
                $model->attributes = array('observacionestrabajo'=>$_POST['Cotizacion']['observacionestrabajo']);
                if($model->save())
                {
                    $this->redirect(array('//cotizacion/ordentrabajo','id'=>$_GET['id'], 'folio'=>$_GET['folio']));
                }
            }
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
            echo "<script type='text/javascript'> function muestra(str){document.getElementById('globo').style.display = 'block'; document.getElementById('globo').innerHTML = str;}</script>";
            echo "<script type='text/javascript'> function esconder(){document.getElementById('globo').style.display = 'none';}</script>";
            echo CHtml::tag('option', array('empty'=>'', 'onmouseout'=>'esconder()'), 'Seleccione Servicio', true);
            foreach ($lista as $key => $descripcion)
            {
               $valor = Servicios::model()->findByPk($key);
               echo CHtml::tag('option', array('value'=>$key, 'onmouseout'=>'esconder()','onmouseover'=>'muestra("'.$valor->observaciones.'")'), CHtml::encode($descripcion), true);
            }
        }
        
        public function actionModificarccantidad()
        {
            $model = new Cotizacion;
            
            
        }
       
        public function actionBorrarproducto()
        {
            $this->layout='//layouts/cotizacion';
            
            $model = Productos::model()->findByPk($_GET['id_eliminar']);
            if(isset($_GET['id_eliminar']))
            {
                $model_productos = new Productos;
                $model->delete();
                $model_cotizacion = Cotizacion::model()->find(array('condition'=>'colocarfolio='.$_GET['folio']));
                $models = Productos::model()->findAll(array('condition'=>'cotizacion_id='.$_GET['id']));
                    Global $total;
                    foreach ($models as $key)
                    {
                        $total += $key->monto;
                    }
                    $total_descuento = $total - (($model_cotizacion->descuento/100)*$total);
                    $subtotal = $total_descuento / 1.16;
                    $iva = $total_descuento - $subtotal;
                    $model_cotizacion->attributes = array('fecha'=>$model_cotizacion->fecha,'fechacancelacion'=>$model_cotizacion->fechacancelacion,'total'=>$total_descuento, 'subtotal'=>$subtotal, 'iva'=>$iva);
                    if($model_cotizacion->save())
                    {
                        $this->redirect(Yii::app()->homeUrl."cotizacion/vistacotizacion/".$_GET['id'].".jsp?folio=".$_GET['folio']);
                    }
            }
        }
        
        public function actionEnviarcotizacion()
        {
            $model = Cotizacion::model()->find(array('condition'=>'colocarfolio='.$_GET['folio']));
            $fecha = date('Y-m-d');
            $nueva = strtotime('+40day', strtotime($fecha));
            $f = date('Y-m-d',$nueva);
            $model->attributes =  array('estadocotizacion_id'=>'1', 'fecha'=>$fecha, 'fechacancelacion'=>$f);
            if($model->save())
            {
                $this->redirect(array('//cotizacion/vistacotizacion','id'=>$_GET['id'], 'folio'=>$model->colocarfolio)); 
            }
        }
        
        public function actionAceptarcotizacion()
        {
            $model = Cotizacion::model()->findByPk($_GET['id']);
            
            $model->attributes =  array('estadocotizacion_id'=>'2');
            if($model->save())
            {
                $this->redirect(array('//cotizacion/vistacotizacion','id'=>$_GET['id'], 'folio'=>$_GET['folio'])); 
            }
        }
        
        public function actionRechazarcotizacion()
        {
            $model = Cotizacion::model()->findByPk($_GET['id']);
            
            $model->attributes =  array('estadocotizacion_id'=>'3');
            if($model->save())
            {
                $this->redirect(array('//cotizacion/vistacotizacion','id'=>$_GET['id'], 'folio'=>$model->colocarfolio)); 
            }
        }
        
        public function actioncancelar()
        {
            
            if(isset($_GET['id']) && isset($_GET['folio']))
            {
                $model = Cotizacion::model()->find(array('condition'=>'colocarfolio = '.$_GET['folio']));
                $model->attributes = array('estadocotizacion_id'=>'5');
                if($model->save())
                {
                    $this->redirect(array('vistacotizacion', 'id'=>$_GET['id'], 'folio'=>$_GET['folio'] ));
                }
            }
        }

        public function actionOrdentrabajo()
        {
            $model_cotizacion = Cotizacion::model()->find(array('condition'=>'colocarfolio='.$_GET['folio']));
            $model_producto = Productos::model()->findAll(array('condition'=>'cotizacion_id='.$model_cotizacion->id));

            $this->render('ordentrabajo', array('model_cotizacion'=>$model_cotizacion, 'model_producto'=>$model_producto));
        }
        //*******
        public function actionCantidad()
        {
            if(isset($_POST['Productos']['cantidad']))
            {
                $model_producto = Productos::model()->find(array('condition'=>'id='.$_GET['id_producto']));
                $model_cotizacion = Cotizacion::model()->find(array('condition'=>'colocarfolio='.$_GET['folio']));
                #$model = new Productos;                
                $cantidad_monto = $model_producto->preciounitario * $_POST['Productos']['cantidad'];

                $model_producto->attributes = array('cantidad'=>$_POST['Productos']['cantidad'], 'areas_id'=>$model_producto->areas_id, 'servicios_id'=>$model_producto->servicios_id, 'preciounitario'=>$model_producto->preciounitario, 'monto'=>$cantidad_monto, 'cotizacion_id'=>$model_producto->cotizacion_id, 'estatus_id'=>$model_producto->estatus_id);
                if($model_producto->save())
                {

                    $models = Productos::model()->findAll(array('condition'=>'cotizacion_id='.$_GET['id']));
                    Global $total;
                    foreach ($models as $key)
                    {
                       $total += $key->monto;
                    }
                    $total_descuento = $total - (($model_cotizacion->descuento/100)*$total);
                    $subtotal = $total_descuento / 1.16;
                    $iva = $total_descuento - $subtotal;
                    $model_cotizacion->attributes = array('fecha'=>$model_cotizacion->fecha,'fechacancelacion'=>$model_cotizacion->fechacancelacion,'total'=>$total_descuento, 'subtotal'=>$subtotal, 'iva'=>$iva);
                
                    if($model_cotizacion->save())
                        $this->redirect(Yii::app()->homeUrl."cotizacion/vistacotizacion/".$_GET['id'].".jsp?folio=".$_GET['folio']);
                }                    
                else
                    $this->redirect(Yii::app()->homeUrl."cotizacion/vistacotizacion/".$_GET['id'].".jsp?folio=".$_GET['folio']);
            }
            else
            {
                $this->redirect(Yii::app()->homeUrl."cotizacion/vistacotizacion/".$_GET['id'].".jsp?folio=".$_GET['folio']);
            }
        }
        //******
        //Sección para la vista de cotizaciones ***************************************
        
        public function actionCotizar() //Acción para asignar Empresa, sucursal y contactos en la cotizaicón
        {
                
            $model = new Cotizacion;
            $model_productos = new Productos;
            #$mensaje_folio = "<script>alert('Folio generado ".$model->id."')</script>";
            
		if(isset($_POST['Cotizacion']))
		{
                    $model->attributes = $_POST['Cotizacion'];
                    if($model->save())
                    {                        
                        $anio = date('y');
                        Global $colocarfolios;
                        $tamaniofolio = strlen($model->folio);
                        if( $tamaniofolio == 2)
                        {
                            $colocarfolios = $anio."0".$model->folio;
                            $model->attributes = array('colocarfolio'=>$colocarfolios);
                            $model->save();
                        }
                        if( $tamaniofolio == 1)
                        {
                            $colocarfolios = $anio."00".$model->folio;
                            $model->attributes = array('colocarfolio'=>$colocarfolios);
                            $model->save();
                        }
                       
                        $this->redirect( array('//cotizacion/vistacotizacion',
                            'id'=>$model->id,
                            'folio'=>$colocarfolios,
                            'model_folio'=>$model->folio, 
                            #'mensaje_folio'=>$mensaje_folio,
                        ));
                    }
                }
                else
                {
                    $this->render('cotizar', array('model'=>$model));
                }
        }
            
        public function actionVistaCotizacion()// Llegan datos por GET Empresa, Sucursal y Contacto(s) son enviados por la acción
            {
            $this->layout='//layouts/cotizacion';
                $model = new Productos;
                $model_cotizacion = Cotizacion::model()->find(array('condition'=>'colocarfolio='.$_GET['folio']));
            
               if(isset($_POST['Productos']))
        		{                   
                    $model->attributes=$_POST['Productos'];
                    if($model->save()) 
                    {
                        $models = Productos::model()->findAll(array('condition'=>'cotizacion_id='.$_GET['id']));
                        Global $total;
                        foreach ($models as $key)
                        {
                           $total += $key->monto;
                        }
                        $total_descuento = $total - (($model_cotizacion->descuento/100)*$total);
                        $subtotal = $total_descuento / 1.16;
                        $iva = $total_descuento - $subtotal;
                        $model_cotizacion->attributes = array('fecha'=>$model_cotizacion->fecha,'fechacancelacion'=>$model_cotizacion->fechacancelacion,'total'=>$total_descuento, 'subtotal'=>$subtotal, 'iva'=>$iva);
                                        
                        if($model_cotizacion->save())
                        { 
                            $this->redirect(array('//cotizacion/vistacotizacion','id'=>$_GET['id'], 'folio'=>$_GET['folio']));                       
                        }
                        else
                        {
                             $this->redirect(array('//cotizacion/vistacotizacion','id'=>$_GET['id'], 'folio'=>$_GET['folio']));        
                        }
                    }
                    else
                    {                        
                         $this->redirect(array('//cotizacion/vistacotizacion','id'=>$_GET['id'], 'folio'=>$_GET['folio'], 'model'=>$model));
                    }
        		} 
                else 
                {                                        
                    $this->render('vistacotizacion', array('id'=>$_GET['id'], 'folio'=>$_GET['folio'], 'model'=>$model));
                }                
            }
        
        // **************************** Termina la vista de cotizaciones

	public function actionCotizaciones($id_sucursal, $nombre_empresa)
	{
            $model = new Cotizacion;
            $model_productos = new Productos;
            $Sucursal = Domiciliocliente::model()->find(array('condition'=>'id='.$id_sucursal));
            $this->render('cotizaciones',
                array('model'=>$model,
                    'id_sucursal'=>$Sucursal,
                    'nombre_empresa'=>$nombre_empresa,
                    'model_productos'=>$model_productos,
                    ));
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

	public function actionServicios()
	{
            $list=Servicios::model()->findAll("areas_id=?", array($_POST["Productos"]["areas_id"]));

            foreach ($list as $key) {
                    echo"<option value=\"{$key->id}\">{$key->servicio}</option>";
            }
	}
        
        public function actionAjaxcantidad()
        {                    
            if($_GET['id'])
            {
                $model = Productos::model()->findByPk($_GET['id']);
            
            $model->attributes =  array('estatus_id'=>'1');
            $model->save();
            }
        }

        //Función que permite refrescar el combo de selecciona sucursal en la vista cotizacion/cotizar
        public function actionAjaxdropempresa()
        {
            $sucursal = $_POST['Cotizacion']['variable'];
            $lista = Domiciliocliente::model()->findAll('empresa_id = :empresa_id', array(':empresa_id'=>$sucursal));
            $lista = CHtml::listData($lista, 'id', 'nombre_sucursal');
            
            echo CHtml::tag('option', array('empty'=>''), 'Seleccione Sucursal', true);
            foreach ($lista as $key => $descripcion)
            {
               echo CHtml::tag('option', array('value'=>$key), CHtml::encode($descripcion), true);
            }
        }
        
        public function actionAjaxdropsucursal()
        {
            $contacto = $_POST['Cotizacion']['domiciliocliente_id'];
            $lista = Domiciliopersonas::model()->findAll('domiciliocliente_id = :domiciliocliente_id', array(':domiciliocliente_id'=>$contacto));
            $lista = CHtml::listData($lista, 'id', 'nombres');
            
            echo CHtml::tag('option', array('empty'=>''), 'Seleccione Contacto', true);
            foreach ($lista as $key => $descripcion)
            {
               echo CHtml::tag('option', array('value'=>$key), CHtml::encode($descripcion), true);
            }
        }
        public function actionAjaxdropempresa2()
        {
            $sucursal = $_POST['Cotizacion']['variable2'];
            $lista = Domiciliocliente::model()->findAll('empresa_id = :empresa_id2', array(':empresa_id2'=>$sucursal));
            $lista = CHtml::listData($lista, 'id', 'nombre_sucursal');
            
            echo CHtml::tag('option', array('empty'=>''), 'Seleccione Sucursal', true);
            foreach ($lista as $key => $descripcion)
            {
               echo CHtml::tag('option', array('value'=>$key), CHtml::encode($descripcion), true);
            }
        }
        
        public function actionAjaxdropsucursal2()
        {
            $contacto = $_POST['Cotizacion']['domiciliocliente_id2'];
            $lista = Domiciliopersonas::model()->findAll('domiciliocliente_id = :domiciliocliente_id2', array(':domiciliocliente_id2'=>$contacto));
            $lista = CHtml::listData($lista, 'id', 'nombres');
            
            echo CHtml::tag('option', array('empty'=>''), 'Seleccione Contacto', true);
            foreach ($lista as $key => $descripcion)
            {
               echo CHtml::tag('option', array('value'=>$key), CHtml::encode($descripcion), true);
            }
        }
        
        
	public function actionCostos()
	{
		if(Yii::app()->request->isAjaxRequest)
            {
                $id=$_POST['servicio'];
                if($id != '')
                {
                    $data=Servicios::model()->find(array('condition'=>'areas_id='.$id));
                    echo CJSON::encode(array(
                        'precios'=>$data['precio'],
                    ));
                    Yii::app()->end();
                }
            }
	}
        
        public function actionEmpresa()
	{
		if(Yii::app()->request->isAjaxRequest)
            {
                $id=$_POST['servicio'];
                if($id != '')
                {
                    $data=Domiciliocliente::model()->find(array('condition'=>'empresa_id='.$id));
                    echo CJSON::encode(array(
                        'calle'=>$data['domicilioCompleto'],
                    ));
                    Yii::app()->end();
                }
            }
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
        $model = new Cotizacion;

        if(isset($_POST['Cotizacion']))
		{
            $model->attributes=$_POST['Cotizacion'];
            if($model->save())
            {     
               $this->render('create',array('model'=>$model,'id'=>$model->id, 'folio'=>$model->id));
                            
            }
            else
            {
                $this->render('vistacotizacion',array('model'=>$model,'id'=>$model->id, 'folio'=>$model->id));
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cotizacion']))
		{
			$model->attributes=$_POST['Cotizacion'];
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
		$dataProvider=new CActiveDataProvider('Cotizacion');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Cotizacion('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cotizacion']))
			$model->attributes=$_GET['Cotizacion'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        public function actionAdmin_ot()
	{
		$model=new Cotizacion('search2');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cotizacion']))
			$model->attributes=$_GET['Cotizacion'];

		$this->render('admin_ot',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Cotizacion the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Cotizacion::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
        /************************/
        public function actionAjaxsucursales()
        {
            if(isset($_POST['Productos']['areas_id']))
            {
                /*$sucursal = $_POST['Cotizacion']['areas_id'];
                $lista = Servicios::model()->findAll('empresa_id = :empresa_id', array(':empresa_id'=>$sucursal));
                $lista = CHtml::listData($lista, 'id', 'servicio');

                echo CHtml::tag('option', array('empty'=>''), 'Seleccione Sucursal', true);
                foreach ($lista as $key => $descripcion)
                {
                   echo CHtml::tag('option', array('value'=>$key), CHtml::encode($descripcion), true);
                }*/
                echo "<script>console.log('hola con POST');</script>";
            }
            else
            {
                echo "<script>console.log('hola sin POST');</script>";
            }
        }
        /************************/

	/**
	 * Performs the AJAX validation.
	 * @param Cotizacion $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cotizacion-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
