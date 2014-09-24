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

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>


	<div class="row">
		<?php #echo $form->labelEx($model,'estatus_id'); ?>
		<?php echo $form->textField($model_domicilio,'empresa_id', array('value'=>$id_empresa, 'class'=>'hidden')); ?>
		<?php echo $form->error($model_domicilio,'empresa_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_domicilio,'nombre_sucursal'); ?>
		<?php echo $form->textField($model_domicilio,'nombre_sucursal',array('size'=>60,'maxlength'=>150, 'required'=>'true')); ?>
		<?php echo $form->error($model_domicilio,'nombre_sucursal'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model_domicilio,'calle'); ?>
		<?php echo $form->textField($model_domicilio,'calle',array('size'=>60,'maxlength'=>150, 'required'=>'true')); ?>
		<?php echo $form->error($model_domicilio,'calle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_domicilio,'colonia'); ?>
		<?php echo $form->textField($model_domicilio,'colonia',array('size'=>60,'maxlength'=>150, 'required'=>'true')); ?>
		<?php echo $form->error($model_domicilio,'colonia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_domicilio,'municipio'); ?>
		<?php echo $form->textField($model_domicilio,'municipio',array('size'=>60,'maxlength'=>100, 'required'=>'true')); ?>
		<?php echo $form->error($model_domicilio,'municipio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_domicilio,'codigo_postal'); ?>
		<?php echo $form->textField($model_domicilio,'codigo_postal',array('size'=>45,'maxlength'=>45, 'required'=>'true')); ?>
		<?php echo $form->error($model_domicilio,'codigo_postal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_domicilio,'estados_id'); ?>
		<?php echo $form->dropDownList($model_domicilio,'estados_id', CHtml::listData(Estados::model()->findAll(), 'id', 'estados'), array('empty'=>'Selecciona un Estado', 'required'=>'true')); ?>
		<?php echo $form->error($model_domicilio,'estados_id'); ?>
	</div>

	<div class="row">
		<?php #echo $form->labelEx($model_domicilio,'estatus_id'); ?>
		<?php echo $form->textField($model_domicilio,'estatus_id', array('value'=>'1', 'class'=>'hidden')); ?>
		<?php echo $form->error($model_domicilio,'estatus_id'); ?>
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model_domicilio->isNewRecord ? 'Alta de Sucursales' : 'Save', array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->