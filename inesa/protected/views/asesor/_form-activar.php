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
	'enableAjaxValidation'=>false,
)); ?>

	
	<div class="row">
                <?php echo $form->textField($model,'id', array('value'=>$id, 'class'=>'hidden')); ?>
		
            
		<?php echo "<span class='negrita-naranja'>ASESOR:</span>"; ?>
		<?php echo $form->dropDownList($model,'personas_id', CHtml::listData(Personas::model()->findAll(), 'id', 'nombreProfesion'))." ".$form->checkBox($model,'autorizado', CHtml::listData(Asesor::model()->findAll(), 'id', 'autorizado'));; ?>
		<?php echo $form->error($model,'personas_id'); ?>	
	
		<?php echo $form->textField($model,'domiciliocliente_id', array('value'=>$id, "class"=>"hidden")); ?>
		<?php echo $form->error($model,'domiciliocliente_id'); ?>
	
		<?php echo $form->dropDownList($model,'autoriza', CHtml::listData(Asesor::model()->findAll(), 'id', 'autoriza'), array("class"=>"hidden")); ?>
		<?php echo $form->error($model,'autoriza'); ?>
	
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Autorizar' : 'Autorizar', array('class'=>'btn-verde')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->