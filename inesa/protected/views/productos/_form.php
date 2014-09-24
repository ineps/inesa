<?php
/* @var $this ProductosController */
/* @var $model Productos */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'productos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <td>	
                <?php echo $form->labelEx($model,'areas_id'); ?>
		<?php echo $form->textField($model,'areas_id'); ?>
		<?php echo $form->error($model,'areas_id'); ?>
    </td>
    
    <td>	
                <?php echo $form->labelEx($model,'servicios_id'); ?>
		<?php echo $form->textField($model,'servicios_id'); ?>
		<?php echo $form->error($model,'servicios_id'); ?>
    </td>

    <td>
                <?php echo $form->labelEx($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad'); ?>
		<?php echo $form->error($model,'cantidad'); ?>
    </td>

	
    <td>	
                <?php echo $form->labelEx($model,'preciounitario'); ?>
		<?php echo $form->textField($model,'preciounitario'); ?>
		<?php echo $form->error($model,'preciounitario'); ?>
    </td>

    <td>
		<?php echo $form->labelEx($model,'monto'); ?>
		<?php echo $form->textField($model,'monto'); ?>
		<?php echo $form->error($model,'monto'); ?>
    </td>

    <td>
		<?php echo $form->labelEx($model,'cotizacion_id'); ?>
		<?php echo $form->textField($model,'cotizacion_id'); ?>
		<?php echo $form->error($model,'cotizacion_id'); ?>
    </td>

    <td>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'agregar' : 'Save'); ?>
    </td>

<?php $this->endWidget(); ?>

</div><!-- form -->