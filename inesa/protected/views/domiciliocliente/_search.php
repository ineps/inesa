<?php
/* @var $this DomicilioclienteController */
/* @var $model Domiciliocliente */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	
	<div class="row">
		<?php echo $form->label($model,'empresa_id'); ?>
		<?php echo $form->dropDownList($model,'empresa_id',CHtml::listData(Empresa::model()->findAll(), 'id', 'razon_social'), array('empty'=>'Selecciona una Empresa')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'calle'); ?>
		<?php echo $form->textField($model,'calle',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'colonia'); ?>
		<?php echo $form->textField($model,'colonia',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'municipio'); ?>
		<?php echo $form->textField($model,'municipio',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codigo_postal'); ?>
		<?php echo $form->textField($model,'codigo_postal',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estados_id'); ?>
		<?php echo $form->dropDownList($model,'estados_id',CHtml::listData(Estados::model()->findAll(), 'id', 'estados'), array('empty'=>'Selecciona un Estado')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estatus_id'); ?>
		<?php echo $form->dropDownList($model,'estatus_id',CHtml::listData(Estatus::model()->findAll(), 'id', 'estatus'), array('empty'=>'Selecciona un Estatus')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Busqueda	'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->