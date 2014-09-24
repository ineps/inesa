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
	'enableAjaxValidation'=>true,
)); ?>

    <td>	
                <?php echo $form->labelEx($model,'areas_id'); ?>
		<?php echo $form->dropDownList($model,'areas_id', CHtml::listData(Areas::model()->findAll(), 'id', 'clave')); ?>
		
    </td>
    
    <td>	
                <?php echo $form->labelEx($model,'servicios_id'); ?>
		<?php echo $form->dropDownList($model,'servicios_id', CHtml::listData(Servicios::model()->findAll(), 'id', 'servicio'), array('empty'=>'Selecciona un Servicio')); ?>
		<?php echo "<span class='rojo'>".$form->error($model,'servicios_id')."</span>"; ?>
    </td>

    <td>
                <?php echo $form->labelEx($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad'); ?>
		<?php echo "<span class='rojo'>".$form->error($model,'cantidad')."</span>"; ?>
    </td>

	
    <td>	
                <?php echo $form->labelEx($model,'preciounitario'); ?>
		<?php echo $form->textField($model,'preciounitario'); ?>
		<?php echo "<span class='rojo'>".$form->error($model,'preciounitario')."</span>"; ?>
    </td>

    <td>
		<?php echo $form->labelEx($model,'monto'); ?>
		<?php echo $form->textField($model,'monto'); ?>
		<?php echo "<span class='rojo'>".$form->error($model,'monto')."</span>"; ?>
    </td>

    <td>
		<?php echo $form->hiddenField($model,'cotizacion_id', array('value'=>$folio)); ?>		
    </td>

    <td>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'agregar' : 'Agregar'); ?>
    </td>

<?php $this->endWidget(); ?>

</div><!-- form -->