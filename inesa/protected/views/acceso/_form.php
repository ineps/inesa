<?php
/* @var $this AccesoController */
/* @var $model Acceso */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'acceso-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<?php
	$personas = Personas::model()->find('id='.$id);
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php 
		if(empty($personas))
		{
			
		}
		else
		{
			echo "Usuario: <br>".$personas->email."<br><br>";			
		 	echo $form->textField($model,'usuario',array('value'=>$personas->email, 'class'=>'hidden'));
		 	echo $form->error($model,'usuario');
		}
	 ?>

<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'repetir_password'); ?>
		<?php echo $form->passwordField($model,'repetir_password',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'repetir_password'); ?>
	</div>

	<?php
		if(empty($personas))
		{
			
		}
		else
		{
			echo "<div class='row'>";
			echo $form->textField($model,'personas_id', array('value'=>$personas->id, 'class'=>'hidden'));
			echo $form->error($model,'personas_id'); 
			echo "</div>";
		}
	?>
			
		
	

	<div class="row">
		<?php echo $form->labelEx($model,'nivelacceso_id'); ?>
		<?php echo $form->dropDownList($model,'nivelacceso_id',CHtml::listData(Nivelacceso::model()->findAll(), 'id', 'acceso'), array('empty'=>'Seleccionar')); ?>
		<?php echo $form->error($model,'nivelacceso_id'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Alta de Usuario' : 'Modificar Usuario'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->