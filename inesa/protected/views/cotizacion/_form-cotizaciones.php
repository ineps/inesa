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

	
	

	<div class="row">
		<?php echo $form->labelEx($model,'cotz_empresa').'</span>'; ?>
		<?php echo $form->dropDownList($model,'cotz_empresa', CHtml::listData(Domiciliopersonas::model()->findAll(array('condition'=>'domiciliocliente_id='.$id_sucursal)), 'id', 'persona'), array('empty'=>'Selecciona una Persona')); ?>
		<?php echo $form->error($model,'cotz_empresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cotz_contacto'); ?>
		<?php echo $form->dropDownList($model,'cotz_empresa', CHtml::listData(Domiciliopersonas::model()->findAll(array('condition'=>'domiciliocliente_id='.$id_sucursal)), 'id', 'persona'), array('empty'=>'Selecciona una Persona')); ?>
		<?php echo $form->error($model,'cotz_contacto'); ?>
	</div>
<?php $this->renderPartial('_form-partida', array('model_productos'=>$model_productos)); ?>
	<div class="derecha row">
		<?php echo $form->labelEx($model,'subtotal'); ?>
		<?php echo $form->textField($model,'subtotal', array('disabled'=>true)); ?>
		<?php echo $form->error($model,'subtotal'); ?>
	</div>

	<div class="derecha row">
		<?php echo $form->labelEx($model,'iva'); ?>
		<?php echo $form->textField($model,'iva', array('disabled'=>true)); ?>
		<?php echo $form->error($model,'iva'); ?>
	</div>

	<div class="derecha row">
		<?php echo $form->labelEx($model,'total'); ?>
		<?php echo $form->textField($model,'total', array('disabled'=>true)); ?>
		<?php echo $form->error($model,'total'); ?>
	</div>

	<div class="derecha row">
		<?php #echo $form->labelEx($model,'estadocotizacion_id'); ?>
		<?php echo $form->textField($model,'estadocotizacion_id', array('value'=>'3', 'class'=>'hidden')); ?>
		<?php echo $form->error($model,'estadocotizacion_id'); ?>
	</div>

	<div class="centrado row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Alta Cotización' : 'Save', array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->