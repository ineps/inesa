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
		<?php echo $form->textField($model_personas,'empresa_id', array('value'=>$id_empresa)); ?>
		<?php echo $form->error($model_personas,'empresa_id'); ?>
	</div>

	<div class="row">
		<?php echo "Sucursal <br>"; ?>
		<?php echo $form->dropDownList($model_personas,'id', CHtml::listData(Domiciliocliente::model()->findAll(array('condition'=>'empresa_id='.$id_empresa)), 'id', 'domiciliocompleto'), array('empty'=>'Selecciona un Domicilio')); ?>
		<?php echo $form->error($model_personas,'id'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model_personas->isNewRecord ? 'Asignar Contacto' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->