<?php
	if(isset($id_empresa))
	{
		echo "<h2 class='centrado'>".$id_empresa->razon_social.' <br>'.$id_empresa->rfc.'</h2><br>';
	}

	if(isset($_GET['ventana_personas']) && $_GET['ventana_personas'] == 1)
	{
		$ventana_personas = $_GET['ventana_personas'];
	}

	if(isset($_GET['ventana_domicilios']) && $_GET['ventana_domicilios'] == 1)
	{
		$ventana_domicilios = $_GET['ventana_domicilios'];
	}

	if(isset($_GET['ventana_asignacion']) && $_GET['ventana_asignacion'] == 1)
	{
		$ventana_asignacion = $_GET['ventana_asignacion'];
	}

?>
<style type="text/css">
.btn {
  color: #fff;
  background-color: #FF6C29;
  border-color: #FF6C29;
}
</style>
<?php 
	$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
	                'id'=>'vmodal_domicilio',
	                	'options'=>array(
	                    'title'=>'Alta de Sucursal',
	                    'autoOpen'=>$ventana_domicilios,
	                    'modal'=>'true',
	                    'width'=>'550',
	                    'height'=>'550',
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
	$this->renderPartial('//domiciliocliente/_form-alta-modal',array('model_domicilio'=>$model_domicilio, 'id_empresa'=>$id_empresa->id, ), false);

	$this->endWidget();

	?>

	<?php 
	$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
	                'id'=>'vmodal_personas',
	                	'options'=>array(
	                    'title'=>'Alta de Contácto',
	                    'autoOpen'=>$ventana_personas,
	                    'modal'=>'true',
	                    'width'=>'1000',
	                    'height'=>'600',
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
	$this->renderPartial('//personas/_form-alta-modal',array('model_personas'=>$model_personas, 'id_empresa'=>$id_empresa->id,), false);

	$this->endWidget();
	?>

	<?php 

	$model_cargo = new Cargo;

	$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
	                'id'=>'vmodal_cargo',
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

	$this->endWidget();
	?>

	<?php 
	if(isset($_GET['id_contacto']))
	{
		$this->beginWidget('zii.widgets.jui.CJuiDialog',array(

		                'id'=>'vmodal_asignacion',
		                	'options'=>array(
		                    'title'=>'Ventana Asignación',
		                    'autoOpen'=>$ventana_asignacion,
		                    'modal'=>'true',
		                    'width'=>'650',
		                    'height'=>'250',
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
		$this->renderPartial('//domiciliopersonas/_form_modal',array('domiciliopersonas'=>$domiciliopersonas, 'id_contacto'=>$_GET['id_contacto'], 'id_empresa'=>$id_empresa ), false);

		$this->endWidget();
	}
	?>

			<?php 

$model_acronimo = new Acronimo;

	$this->beginWidget('zii.widgets.jui.CJuiDialog',array(

	                'id'=>'vmodal_acronimo',
	                	'options'=>array(
	                    'title'=>'Alta de acronimo',
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

	$this->endWidget();
	?>


	<!-- Esta sección es el menu asignado para dar de alta una sucursal, contacto y asignar un contacto a una sucursal -->
	<?php
		if(Yii::app()->user->getState("nivel_acceso") == 'Gerente' || Yii::app()->user->getState("nivel_acceso") == 'Ventas' )
		{
			echo CHtml::link('Alta de Sucursal','#' ,array('onclick'=>'$("#vmodal_domicilio").dialog("open"); return true;'));
		 	echo " <span class='separador'>|</span> ".CHtml::link('Contactos Nuevo','#', array('onclick'=>'$("#vmodal_personas").dialog("open"); return false;' ));
		 	echo " <span class='separador'>|</span> ".CHtml::link('Asignar Contacto',array('domiciliopersonas/createmodal', 'id'=>$id_empresa->id));
		}

	?>
	<!-- Termina sección -->

<?php
$i=0;	
echo "<br><br>";
	echo "<dl>";
	$asesor = null;
	foreach ($domiciliobd as $key) {
		$i=$i+1;

		$asesor = Asesor::model()->findAll(array('condition'=>'domiciliocliente_id='.$key->id));
		echo "<dt> <!--Sucursal:--> </dt><dd class='grande color-gris-8 centrado'>".$key->nombre_sucursal."</dd><br />";
		echo "<dt class='limpiar'> Domicilio: </dt> <dd><span class='titulo5'> ".$key->calle.", Colonia: ".$key->colonia.", C.P. ".$key->codigo_postal.", ".$key->municipio.", ".$key->estados->estados."</span></dd>";
		echo "<br><dt>Asesor:</dt>";				
		foreach ($asesor as $valor) {
			if(isset($valor->personas_id))
			{
				if($valor->autorizado == false)
				{
					echo "<dd class='titulo5'>".$valor->personas->acronimo->acronimo." ".$valor->personas->nombre." ".$valor->personas->apellido_pateno." ".$valor->personas->apellido_materno."<br />".$valor->personas->cargo->cargo."  </dd> <br /><dd class=' centrado rojo-autorizacion'>Sin Autorización</dd>";	
				}
				else
				{
					echo "<dd class='titulo5'>".$valor->personas->acronimo->acronimo." ".$valor->personas->nombre." ".$valor->personas->apellido_pateno." ".$valor->personas->apellido_materno."<br />".$valor->personas->cargo->cargo."  </dd> <br /> <dd class=' centrado verde-autorizacion'>Autorizado</dd>";
				}							
			}
		}
		echo "<br /><dt>Contactos:</dt><ol>";

		$persona = domiciliopersonas::model()->findAll(array('condition'=>'domiciliocliente_id='.$key->id));                
		foreach ($persona as $key2) {
			echo "<span class='titulo5'> <li>".$key2->personas->acronimo->acronimo.$key2->personas->nombre." ".$key2->personas->apellido_pateno." ".$key2->personas->apellido_materno." ".CHtml::link('x',array('domiciliopersonas/borrarcontacto','id'=>$key2->id, 'id_empresa'=>$id),array('class'=>'eliminar-sucursal'))."<br />".$key2->personas->cargo->cargo."</dd><dd> <span class='color-gris'>Teléfono Particular:</span> ".$key2->personas->telefono."<span class='eliminar-sucursal'> | </span> <span class='color-gris'>Teléfono Empresa:</span> ".$key2->personas->telefono_oficina." <span class='eliminar-sucursal'> | </span> <span class='color-gris'>Celular: </span>".$key2->personas->celular."</td><td></span></li>";
		}
		echo "</ol> <hr>";

	}
	echo "</dl><br>";
?>