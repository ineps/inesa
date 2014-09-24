<?php
/* @var $this AcronimoController */
/* @var $model Acronimo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'acronimo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	

	<div class="row">
		<?php echo $form->labelEx($model_acronimo,'acronimo'); ?>
		<?php echo $form->textField($model_acronimo,'acronimo',array('size'=>45,'maxlength'=>45, 'required'=>'true')); ?>
		<?php echo $form->error($model_acronimo,'acronimo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_acronimo,'significado'); ?>
		<?php echo $form->textField($model_acronimo,'significado',array('size'=>45,'maxlength'=>45, 'required'=>'true')); ?>
		<?php echo $form->error($model_acronimo,'significado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model_acronimo->isNewRecord ? 'Alta de Acronimo' : 'Modificar Acronimo'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->