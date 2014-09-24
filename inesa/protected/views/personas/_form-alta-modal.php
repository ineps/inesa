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

	

	<div class="span-15">		

		<div class="row">
                    <?php echo $form->labelEx($model_personas,'acronimo_id').' '.CHtml::link('Otro', '#' ,array('onclick'=>'$("#vmodal_acronimo").dialog("open"); return false;')).'<br>'; ?>
                    <?php echo $form->dropDownList($model_personas,'acronimo_id', CHtml::listData(Acronimo::model()->findAll(), 'id', 'acronimo'), array('empty'=>'Seleccionar','required'=>'true')); ?>
                    <?php echo $form->error($model_personas,'acronimo_id'); ?>                    
                </div>

		<div class="row">
			<?php echo $form->labelEx($model_personas,'cargo_id').' '.CHtml::link('Otro', '#' ,array('onclick'=>'$("#vmodal_cargo").dialog("open"); return false;')).'<br>'; ?>
			<?php echo $form->dropdownList($model_personas,'cargo_id', CHtml::listData(Cargo::model()->findAll(), 'id', 'cargo'), array('empty'=>'Selecciona un Cargo', 'required'=>'true')); ?>
			<?php echo $form->error($model_personas,'cargo_id'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model_personas,'nombre'); ?>
			<?php echo $form->textField($model_personas,'nombre',array('size'=>20,'maxlength'=>50, 'required'=>'true')); ?>
			<?php echo $form->error($model_personas,'nombre'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model_personas,'apellido_pateno'); ?>
			<?php echo $form->textField($model_personas,'apellido_pateno',array('size'=>20,'maxlength'=>50,'required'=>'true')); ?>
			<?php echo $form->error($model_personas,'apellido_pateno'); ?>
		</div>	

		<div class="row">
			<?php echo $form->labelEx($model_personas,'apellido_materno'); ?>
			<?php echo $form->textField($model_personas,'apellido_materno',array('size'=>20,'maxlength'=>50)); ?>
			<?php echo $form->error($model_personas,'apellido_materno'); ?>
		</div>

		
	</div>
	<div class="span-6">
		<div class="row">
                    <?php 
                        echo $form->labelEx($model_personas, 'telefono');
                        $this->widget('CMaskedTextField', array(
                        'mask' => '999-999-9999',
                        'model' => $model_personas,
                        'attribute' => 'telefono',
                        ));
                    ?>
			<?php echo $form->error($model_personas,'telefono'); ?>
		</div>

		<div class="row">
                    <?php 
                        echo $form->labelEx($model_personas, 'telefono_oficina');
                        $this->widget('CMaskedTextField', array(
                        'mask' => '999-999-9999 ext:9999',
                        'model' => $model_personas,
                        'attribute' => 'telefono_oficina',
                        ));
                    ?>
			<?php echo $form->error($model_personas,'telefono_oficina'); ?>
		</div>

		<div class="row">
                    <?php 
                        echo $form->labelEx($model_personas, 'celular');
                        $this->widget('CMaskedTextField', array(
                        'mask' => '044-999-999-9999',
                        'model' => $model_personas,
                        'attribute' => 'celular',
                        ));
                    ?>
			<?php echo $form->error($model_personas,'celular'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model_personas,'email'); ?>
			<?php echo $form->textField($model_personas,'email',array('size'=>20,'maxlength'=>80, 'required'=>'true')); ?>
			<?php echo $form->error($model_personas,'email'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model_personas,'observaciones'); ?>
			<?php echo $form->textArea($model_personas,'observaciones',array('rows'=>6, 'cols'=>30)); ?>
			<?php echo $form->error($model_personas,'observaciones'); ?>
		</div>

		<div class="row">
			<?php #echo $form->labelEx($model,'estatus_id'); ?>
			<?php echo $form->textField($model_personas,'estatus_id', array('value'=>'1', 'class'=>'hidden')); ?>
			<?php echo $form->error($model_personas,'estatus_id'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton($model_personas->isNewRecord ? 'Alta de una Persona' : 'Modificar Persona', array('class'=>'btn')); ?>
		</div>

</div>
<?php $this->endWidget(); ?>

</div><!-- form -->