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

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	

	<div class="row">
		<?php echo $form->labelEx($model,'cotz_empresa'); ?>
		<?php echo $form->dropDownList($model,'cotz_empresa', CHtml::listData(Personas::model()->findAll(), 'id', 'nombreCompleto'), array('empty'=>'Selecciona una Persona')); ?>
		<?php echo $form->error($model,'cotz_empresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cotz_contacto'); ?>
		<?php echo $form->dropDownList($model,'cotz_contacto', CHtml::listData(Personas::model()->findAll(), 'id', 'nombreCompleto'), array('empty'=>'Selecciona una Persona')); ?>
		<?php echo $form->error($model,'cotz_contacto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subtotal'); ?>
		<?php echo $form->textField($model,'subtotal'); ?>
		<?php echo $form->error($model,'subtotal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iva'); ?>
		<?php echo $form->textField($model,'iva'); ?>
		<?php echo $form->error($model,'iva'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total'); ?>
		<?php echo $form->textField($model,'total'); ?>
		<?php echo $form->error($model,'total'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estadocotizacion_id'); ?>
		<?php echo $form->textField($model,'estadocotizacion_id', array('value'=>'3', 'class'=>'hidden')); ?>
		<?php echo $form->error($model,'estadocotizacion_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->