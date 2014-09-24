<style type="text/css">
.btn {
  color: #fff;
  background-color: #FF6C29;
  border-color: #FF6C29;
}
</style>
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


	<div class="row">
		<?php echo $form->labelEx($model,'domiciliocliente_id'); ?>
		<?php echo $form->dropDownList($model,'domiciliocliente_id', CHtml::listData(Domiciliocliente::model()->findAll(array('condition'=>'empresa_id='.$id)), 'id', 'domiciliobasico'),
                            array(
                                'ajax'=>array(
                                'type'=>'POST',
                                'url'=>CController::createUrl('domiciliopersonas/ajaxdomicilioclientes'),
                                'update'=>'#'.CHtml::activeId($model, '')
                                ),
                                'prompt'=>'Seleccione Sucursal',
                                'required'=>'true'
                            )); ?>
        </div>

	<div class="row">
		<?php echo $form->labelEx($model,'personas_id'); ?>
		<?php echo $form->dropDownList($model,'personas_id', CHtml::listData(Personas::model()->findAll(), 'id', 'nombreProfesion'), array('prompt'=>'Seleccione Contacto', 'required'=>'true')); ?>
		<?php echo $form->error($model,'personas_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Asignar Contacto' : 'Modificar Contacto', array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->