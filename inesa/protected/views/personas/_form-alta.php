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

	
	<div class="span-11">
		

		<div class="row">
			<?php echo $form->labelEx($model,'acronimo_id').' '.CHtml::link('Otro', '#' ,array('onclick'=>'$("#vmodal_acronimo").dialog("open"); return false;')).'<br>'; ?>
			<?php echo $form->dropDownList($model,'acronimo_id', CHtml::listData(Acronimo::model()->findAll(), 'id', 'acronimo'), array('empty'=>'Seleccionar')); ?>
			<?php echo $form->error($model,'acronimo_id'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'cargo_id').' '.CHtml::link('Otro', '#' ,array('onclick'=>'$("#vmodal_cargo").dialog("open"); return false;')).'<br>'; ?>
			<?php echo $form->dropdownList($model,'cargo_id', CHtml::listData(Cargo::model()->findAll(), 'id', 'cargo'), array('empty'=>'Selecciona un Cargo')); ?>
			<?php echo $form->error($model,'cargo_id'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'nombre'); ?>
			<?php echo $form->textField($model,'nombre',array('size'=>20,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'nombre'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'apellido_pateno'); ?>
			<?php echo $form->textField($model,'apellido_pateno',array('size'=>20,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'apellido_pateno'); ?>
		</div>	

		<div class="row">
			<?php echo $form->labelEx($model,'apellido_materno'); ?>
			<?php echo $form->textField($model,'apellido_materno',array('size'=>20,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'apellido_materno'); ?>
		</div>

		
	</div>
	<div class="span-4">
		<div class="row">
			<?php 
                        echo $form->labelEx($model, 'telefono');
                        $this->widget('CMaskedTextField', array(
                        'mask' => '999-999-9999',
                        'model' => $model,
                        'attribute' => 'telefono',
                        ));
                    ?>
			<?php echo $form->error($model,'telefono'); ?>
		</div>

		<div class="row">
			<?php 
                        echo $form->labelEx($model, 'telefono_oficina');
                        $this->widget('CMaskedTextField', array(
                        'mask' => '999-999-9999 ext:9999',
                        'model' => $model,
                        'attribute' => 'telefono_oficina',
                        ));
                    ?>
			<?php echo $form->error($model,'telefono_oficina'); ?>
		</div>

		<div class="row">
			<?php 
                        echo $form->labelEx($model, 'celular');
                        $this->widget('CMaskedTextField', array(
                        'mask' => '044-999-999-9999',
                        'model' => $model,
                        'attribute' => 'celular',
                        ));
                    ?>
			<?php echo $form->error($model,'celular'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'email'); ?>
			<?php echo $form->textField($model,'email',array('size'=>20,'maxlength'=>80)); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'observaciones'); ?>
			<?php echo $form->textArea($model,'observaciones',array('rows'=>6, 'cols'=>30)); ?>
			<?php echo $form->error($model,'observaciones'); ?>
		</div>
		

		<div class="row">
			<?php #echo $form->labelEx($model,'estatus_id'); ?>
			<?php echo $form->textField($model,'estatus_id', array('value'=>'1', 'class'=>'hidden')); ?>
			<?php echo $form->error($model,'estatus_id'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Alta de una Persona' : 'Modificar Persona'); ?>
		</div>

</div>
<?php $this->endWidget(); ?>

</div><!-- form -->