<?php
/* @var $this CotizacionController */
/* @var $model Cotizacion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cotizacion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	
	<div class=" centrado row">
		Partida &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp  &nbsp 
		Areas &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp 
		Precui U. &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp 
		Cantidad &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp  &nbsp 
		Monto &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp 
			
	</div>

	<?php

		$htmlOptions=array(
			'empty'=>'Área',
			'ajax'=>array(
				"url"=>$this->createURL("servicios"),
				"type"=>"POST",
				"update"=>"#Productos_servicios_id",
				),
			);
		#CController::createUrl
	?>

		<script type="text/javascript">
    function hpiCheck()
    {
        <?php
        echo CHtml::ajax(array(
            'url'=>$this->createURL('costos'),
            'data'=>array('servicio'=>'js:$(\'#Productos_servicios_id\').val()'),
            'type'=>'POST',
            'dataType'=>'json',
            'success'=>"function(data)
            {
                $('#Productos_preciounitario').html(data.precios);
            } ",
            ))?>;
//      alert('come in');
        return false;
    }
</script>

	
		<!-- #CController::createUrl -->
	
	<div class="row">
		<?php echo "1 ";?>
		<?php echo $form->dropDownList($model_productos,'areas_id', $model_productos->getMenuAreas(), $htmlOptions); ?>	
		<?php echo $form->dropDownList($model_productos,'servicios_id', $model_productos->getMenuServicios(), array('empty'=>'Servicio','onchange'=>'{ hpiCheck(); }')); ?>						
		<?php echo $form->textField($model_productos,'cantidad'); ?>	
		<?php echo $form->textField($model_productos,'preciounitario', array('disabled'=>true)); ?>	
		<?php echo $form->textField($model_productos,'monto'); ?>	
		<?php echo $form->textField($model_productos,'cotaizacion_id', array('class'=>'hidden')); ?>
		<?php echo CHtml::submitButton($model_productos->isNewRecord ? 'Alta' : 'Save', array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->