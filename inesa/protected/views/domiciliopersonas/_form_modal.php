<?php
/* @var $this DomiciliopersonasController */
/* @var $model Domiciliopersonas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'domiciliopersonas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<div class="row">
		<?php 
			$nombre = Personas::model()->find(array('condition'=>'id='.$id_contacto));
			echo $nombre->nombreCompleto."<br /> <br />";
		?>
		<?php #echo $form->labelEx($domiciliopersonas,'personas_id', CHtml::textField(Personas::model()->find(array('condition'=>'id='.$id_contacto)), 'id', 'nombreCompleto')); ?>
		<?php echo $form->hiddenField($domiciliopersonas,'personas_id',array('value'=>$id_contacto)); ?>
		<?php #echo $form->error($domiciliopersonas,'personas_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($domiciliopersonas,'domiciliocliente_id'); ?>
		<?php echo $form->dropDownList($domiciliopersonas,'domiciliocliente_id', CHtml::listData(Domiciliocliente::model()->findAll(array('condition'=>'empresa_id='.$id_empresa->id)), 'id', 'domicilio'), array('empty'=>'Selecciona una Sucursal')); ?>
		<?php echo $form->error($domiciliopersonas,'domiciliocliente_id'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($domiciliopersonas->isNewRecord ? 'Asignar Sucursal' : 'Modificar Asignación'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->