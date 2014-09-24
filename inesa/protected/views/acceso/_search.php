<?php
/* @var $this AccesoController */
/* @var $model Acceso */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'personas_id'); ?>
		<?php echo $form->textField($model,'personas_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nivelacceso_id'); ?>
		<?php echo $form->textField($model,'nivelacceso_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->