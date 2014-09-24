<?php
/* @var $this PersonasController */
/* @var $model Personas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'personas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	

	<div class="row">
		<?php echo "Personal <br>"; ?>
		<?php echo $form->dropDownList($model,'id', CHtml::listData(Personas::model()->findAll(), 'id', 'personas'), array('empty'=>'Selecciona una Persona')); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Alta de  Persona' : 'Modificar Persona'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->