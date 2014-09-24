<?php
/* @var $this ServiciosController */
/* @var $model Servicios */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'servicios-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
        <div class="row">
                <?php echo $form->labelEx($model,'areas_id'); ?>
		<?php echo $form->dropDownList($model,'areas_id', CHtml::listData(Areas::model()->findAll(), 'id', 'descripcion')); ?>
		<?php echo $form->error($model,'areas_id'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'servicio'); ?>
		<?php echo $form->textField($model,'servicio',array('size'=>45,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'servicio'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'folio'); ?>
		<?php echo $form->textField($model,'folio',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'folio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'precio'); ?>
		<?php echo $form->textField($model,'precio'); ?>
		<?php echo $form->error($model,'precio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'observaciones'); ?>
		<?php echo $form->textArea($model,'observaciones',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'observaciones'); ?>
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Alta de Servicio' : 'Modificar Servicio'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->