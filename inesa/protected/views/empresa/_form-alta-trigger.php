<?php
/* @var $this AsesorController */
/* @var $model Asesor */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'asesor-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	

	<div class="row">
		<?php echo $form->labelEx($model,'personas_id'); ?>
		<?php echo $form->textField($model,'personas_id'); ?>
		<?php echo $form->error($model,'personas_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'domiciliocliente_id'); ?>
		<?php echo $form->textField($model,'domiciliocliente_id'); ?>
		<?php echo $form->error($model,'domiciliocliente_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->