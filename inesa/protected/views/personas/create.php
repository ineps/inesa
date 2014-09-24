<?php
/* @var $this PersonasController */
/* @var $model Personas */


$model_cargo = new Cargo;
$model_acronimo = new Acronimo;
$ventana=false;
$ventana_acronimo=false;

?>
<?php 
	$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
	                'id'=>'vmodal_cargo',
	                	'options'=>array(
	                    'title'=>'Alta de Cargo',
	                    'autoOpen'=>$ventana,
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
	$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
	                'id'=>'vmodal_acronimo',
	                	'options'=>array(
	                    'title'=>'Alta de Cargo',
	                    'autoOpen'=>$ventana_acronimo,
	                    'modal'=>'true',
	                    'width'=>'550',
	                    'height'=>'300',
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
<h1>Alta de Personas</h1>
<!-- Carga el formulario de la vista Personas y es para dar de alta a una persona que puee funjir 
	como contacto o asesor dentro delsistem -->
<?php $this->renderPartial('_form-alta', array('model'=>$model)); ?>