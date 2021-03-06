<?php
/* @var $this DomicilioclienteController */
/* @var $model Domiciliocliente */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'domiciliocliente-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>


	<div class="row">
		<?php echo $form->labelEx($model,'empresa_id'); ?>
		<?php echo $form->dropDownList($model,'empresa_id', CHtml::listData(Empresa::model()->findAll(), 'id', 'razon_social'), array('empty'=>'Selecciona una Empresa')); ?>
		<?php echo $form->error($model,'empresa_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'calle'); ?>
		<?php echo $form->textField($model,'calle',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'calle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'colonia'); ?>
		<?php echo $form->textField($model,'colonia',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'colonia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'municipio'); ?>
		<?php echo $form->textField($model,'municipio',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'municipio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigo_postal'); ?>
		<?php echo $form->textField($model,'codigo_postal',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'codigo_postal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estatus_id'); ?>
		<?php echo $form->dropDownList($model,'estatus_id',CHtml::listData(Estatus::model()->findAll(), 'id', 'estatus')); ?>
		<?php echo $form->error($model,'estatus_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Modificar Sucursal'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->