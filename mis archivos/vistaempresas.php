<?php
	if(isset($id_empresa)) //Si existe el id de la empresa se imprime la Razón Social y el RFC.
	{
		echo "<h2 class='centrado'>".$id_empresa->razon_social.' <br>'.$id_empresa->rfc.'</h2><br>';
	}
	echo $ventana_personas.' Hola a todos jejejej';
	
?>

<?php 
	$this->beginWidget('zii.widgets.jui.CJuiDialog',array( //Ventana modal para dar de Alta una Sucursal.
	                'id'=>'vmodal',	// La ventana modela tiene un identificador invoca vmodal y se llama de la siguiente manera #vmodal
	                	'options'=>array(
	                    'title'=>'Alta de Sucursal',
	                    'autoOpen'=>$ventana_domicilios, // El valor de la viariable ventana_domicilios, por defaul esta en false para que no se muestre, al ser invocada cambia el estado a true para ser mostrada.
	                    'modal'=>'true',
	                    'width'=>'550',
	                    'height'=>'500',
	                    'overlay'=> array(
	                    	'backgroundColor'=>'#fff', // Fondo de color blanco en ventana modal
	                    	'opacity'=>'0.2',
	                    	),
	                    'show'=>array(
		                'effect'=>'blind', // blind es el efecto con que se muestra la ventana modal
		                'duration'=>700, // Tiempo que tarda en abrir la ventana modal
				            ),
				        'hide'=>array(
				                'effect'=>'explode',
				                'duration'=>600,
				            ), 
			                ),
			   
			             ));
	$this->renderPartial('//domiciliocliente/_form-alta-modal',array('model_domicilio'=>$model_domicilio, 'id_empresa'=>$id_empresa->id, ), false);
	// En la línea de arriba se abre una ventana con el formulario que captura los datos de una sucursal, pasando los siguientes parámetros
	// model_domicilio - es un objeto que se identifica como el modelo para insertar los datos de la sucursal
	// id_empresa - es el id de la empresa en la cual me encuentro y así poder asignar la sucursal.
	$this->endWidget();
	?>

	<?php 
	$this->beginWidget('zii.widgets.jui.CJuiDialog',array( //Ventana modal para dar de Alta de las Personas.
	                'id'=>'vmodal_personas', // La ventana modela tiene un identificador llamado vmodal_personas y se invoca de la siguiente manera #vmodal_personas
	                	'options'=>array(
	                    'title'=>'Alta de Contácto',
	                    'autoOpen'=>$ventana_personas, // El valor de la viariable ventana_personas, por defaul esta en false para que no se muestre, al ser invocada cambia el estado a true para ser mostrada.
	                    'modal'=>'true',
	                    'width'=>'900', // Ancho de la ventana modal
	                    'height'=>'500',// Alto de la ventana modal
	                    'overlay'=> array(
	                    	'backgroundColor'=>'#fff', // Fondo de color blanco en ventana modal
	                    	'opacity'=>'0.2',
	                    	),
	                    'show'=>array(
		                'effect'=>'blind', // blind es el efecto con que se muestra la ventana modal
		                'duration'=>700, // Tiempo que tarda en abrir la ventana modal
				            ),
				        'hide'=>array(
				                'effect'=>'explode',
				                'duration'=>600,
				            ), 
			                ),
			   
			             ));
	$this->renderPartial('//personas/_form-alta-modal',array('model_personas'=>$model_personas, 'id_empresa'=>$id_empresa->id,), false);
	// En la línea de arriba se abre una ventana con el formulario que captura los datos de las Personas, pasando los siguientes parámetros
	// model_personas - es un objeto que se identifica como el modelo para insertar los datos de cada persona
	// id_empresa - es el id de la empresa en la cual me encuentro y así poder asignar la sucursal.
	$this->endWidget();
	?>

		<?php 

	$this->beginWidget('zii.widgets.jui.CJuiDialog',array( //Ventana modal para dar de Alta de las Personas.
	                'id'=>'vmodal_asignacion', // La ventana modela tiene un identificador llamado vmodal_personas y se invoca de la siguiente manera #vmodal_personas
	                	'options'=>array(
	                    'title'=>'Alta de Contácto',
	                    'autoOpen'=>$ventana_asignacion, // El valor de la viariable ventana_personas, por defaul esta en false para que no se muestre, al ser invocada cambia el estado a true para ser mostrada.
	                    'modal'=>'true',
	                    'width'=>'900', // Ancho de la ventana modal
	                    'height'=>'500',// Alto de la ventana modal
	                    'overlay'=> array(
	                    	'backgroundColor'=>'#fff', // Fondo de color blanco en ventana modal
	                    	'opacity'=>'0.2',
	                    	),
	                    'show'=>array(
		                'effect'=>'blind', // blind es el efecto con que se muestra la ventana modal
		                'duration'=>700, // Tiempo que tarda en abrir la ventana modal
				            ),
				        'hide'=>array(
				                'effect'=>'explode',
				                'duration'=>600,
				            ), 
			                ),
			   
			             ));
	$this->renderPartial('//domiciliopersonas/createmodal',array('id_empresa'=>$id_empresa->id,), false);
	// En la línea de arriba se abre una ventana con el formulario que captura los datos de las Personas, pasando los siguientes parámetros
	// model_personas - es un objeto que se identifica como el modelo para insertar los datos de cada persona
	// id_empresa - es el id de la empresa en la cual me encuentro y así poder asignar la sucursal.
	$this->endWidget();
	?>

		<?php 


$model_cargo = new Cargo;

	$this->beginWidget('zii.widgets.jui.CJuiDialog',array(

	                'id'=>'vmodalcargo',
	                	'options'=>array(
	                    'title'=>'Alta de Cargo',
	                    'autoOpen'=>false,
	                    'modal'=>'true',
	                    'width'=>'550',
	                    'height'=>'200',
	                    'overlay'=> array(
	                    	'backgroundColor'=>'#fff',
	                    	'opacity'=>'0.2',
	                    	),
	                    'show'=>array(
		                'effect'=>'blind',
		                'duration'=>700,
				            ),
				        'hide'=>array(
				                'effect'=>'explode',
				                'duration'=>600,
				            ), 
			                ),
			   
			             ));
	$this->renderPartial('//cargo/_form',array('model_cargo'=>$model_cargo ), false);
	// En la línea de arriba se abre una ventana con el formulario Cargos, pasando el siguiente parámetro
	// model_cargo - es un objeto que se identifica como el modelo para insertar Cargos.
	$this->endWidget();
	?>

			<?php 

$model_acronimo = new Acronimo;

	$this->beginWidget('zii.widgets.jui.CJuiDialog',array(

	                'id'=>'vmodal_acronimo',
	                	'options'=>array(
	                    'title'=>'Alta de Cargo',
	                    'autoOpen'=>false,
	                    'modal'=>'true',
	                    'width'=>'550',
	                    'height'=>'280',
	                    'overlay'=> array(
	                    	'backgroundColor'=>'#fff',
	                    	'opacity'=>'0.2',
	                    	),
	                    'show'=>array(
		                'effect'=>'blind',
		                'duration'=>700,
				            ),
				        'hide'=>array(
				                'effect'=>'explode',
				                'duration'=>600,
				            ), 
			                ),
			   
			             ));
	$this->renderPartial('//acronimo/_form',array('model_acronimo'=>$model_acronimo ), false);
	// En la línea de arriba se abre una ventana  modal con el formulario Acronimo.
	$this->endWidget();
	?>


	<!-- Esta sección es el menu asignado para dar de alta una sucursal, contacto y asignar un contacto a una sucursal -->
	<?php
		if($admin)
		{
			echo CHtml::link('Alta de Sucursal','#' ,array('onclick'=>'$("#vmodal").dialog("open"); return false;'));
		 	echo " <span class='separador'>|</span> ".CHtml::link('Contactos Nuevo','#', array('onclick'=>'$("#vmodal_personas").dialog("open"); return false;' ));
		 	echo " <span class='separador'>|</span> ".CHtml::link('Asignar Contacto',array('domiciliopersonas/createmodal', 'id'=>$id_empresa->id));
		}

	?>
	<!-- Termina sección -->

<?php
$i=0;	
echo "<br><br><h3>Sucursales</h3>";
	echo "<ul>";
	$asesor = null;
	foreach ($domiciliobd as $key) {
		$i=$i+1;

		$asesor = Asesor::model()->findAll(array('condition'=>'domiciliocliente_id='.$key->id)); //$asesor - es un arreglo que contiene todos las filas
		// del modelo asesor, pero solo son invocadas las de esta sucursal
		
		echo "<li> Calle ".$key->calle.", Colonia: ".$key->colonia.", C.P. ".$key->codigo_postal.", ".$key->municipio.", ".$key->estados->estados.' '.CHtml::link('Realizar cotización', array('cotizacion/cotizaciones', 'id_sucursal'=>$key->id, 'nombre_empresa'=>$id_empresa->razon_social)).'.</li>';
		echo "<br><span class='titulo5'>Asesor: </span>";	
			
		foreach ($asesor as $valor) {
			if(isset($valor->personas_id))
			{
				if($valor->autorizado == false)
				{
					echo $valor->personas->cargo->cargo.", ".$valor->personas->acronimo->acronimo." ".$valor->personas->nombre." ".$valor->personas->apellido_pateno." ".$valor->personas->apellido_materno." --- <span class='rojo'>Sin Autorización</span>";	
				}
				else
				{
					echo $valor->personas->cargo->cargo.", ".$valor->personas->acronimo->acronimo." ".$valor->personas->nombre." ".$valor->personas->apellido_pateno." ".$valor->personas->apellido_materno." --- <span class='verde'>Autorizado</span>";
				}
							
			}
			else
			{
				echo "En proceso de asignación";
			}
		}

		echo "<br><span class='titulo5'>Contactos:</span><br>";

		$persona = domiciliopersonas::model()->findAll(array('condition'=>'domiciliocliente_id='.$key->id));

		foreach ($persona as $key2) {
			echo $key2->personas->cargo->cargo.", ".$key2->personas->acronimo->acronimo." ".$key2->personas->nombre." ".$key2->personas->apellido_pateno." ".$key2->personas->apellido_materno.", Teléfono: ".$key2->personas->telefono." - ".$key2->personas->telefono_oficina." - ".$key2->personas->celular.".<br> ";
		}
		echo "<br><hr>";

	}
	echo "</ul><br>";
?>