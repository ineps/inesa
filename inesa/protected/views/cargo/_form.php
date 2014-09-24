<?php
/* @var $this CargoController */
/* @var $model Cargo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cargo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<div class="row">
		<?php echo $form->labelEx($model_cargo,'cargo'); ?>
		<?php echo $form->textField($model_cargo,'cargo',array('size'=>60,'maxlength'=>100, 'required'=>'true')); ?>
		<?php echo $form->error($model_cargo,'cargo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model_cargo->isNewRecord ? 'Alta de Cargo' : 'Modificar Cargo'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->