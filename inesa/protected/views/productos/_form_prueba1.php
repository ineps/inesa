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
        'htmlOptions'=>array(
            'name'=>'formulario',
            ),
)); ?>

    <td>	
                <?php echo $form->labelEx($model,'areas_id'); ?>
		<?php echo $form->dropDownList($model,'areas_id', CHtml::listData(Areas::model()->findAll(), 'id', 'clave'),
                        array(
                        'ajax'=>array(
                        'type'=>'POST',
                        'url'=>CController::createUrl('productos/ajaxprueba'),
                        'update'=>'#'.CHtml::activeId($model, 'servicios_id'),                            
                        ),
                        'prompt'=>'Seleccione Empresa',
                    )); ?>
                        
		<?php echo $form->error($model,'areas_id'); ?>
    </td>
    <br />
    <td>	
                <?php echo $form->labelEx($model,'servicios_id'); ?>
		<?php echo $form->dropDownList($model,'servicios_id',CHtml::listData(Servicios::model()->find(), 'id', 'servicio'),
                        array(
                            'ajax'=>array(
                        'type'=>'POST',
                        'dataType'=>'json',
                        'url'=>CController::createUrl('productos/ajaxprueba1'),
                        #'update'=>'#'.CHtml::activeId($model, 'preciounitario'),
                         'success'=>"function(data) {
                         $('#Productos_preciounitario').val(data.preciounitario);  
                       }"      
                        ),
                        )); ?>
		<?php echo $form->error($model,'servicios_id'); ?>
    </td>
<br />
    <td>
                <?php echo $form->labelEx($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad', array('onblur'=>'prueba()', 'value'=>'0')); ?>
		<?php echo $form->error($model,'cantidad'); ?>
    </td>
	<br />
    <td>	
                <?php echo $form->labelEx($model,'preciounitario'); ?>
		<?php echo $form->textField($model,'preciounitario', array('onblur'=>'prueba()','value'=>'0')); ?>
		<?php echo $form->error($model,'preciounitario'); ?>
    </td>
<br />
    <td>
		<?php echo $form->labelEx($model,'monto'); ?>
		<?php echo $form->textField($model,'monto', array('value'=>'0', 'disabled'=>'true')); ?>
		<?php echo $form->error($model,'monto'); ?>
    </td>
<br />
    <td>
		<?php echo $form->labelEx($model,'cotizacion_id'); ?>
		<?php echo $form->hiddenField($model,'cotizacion_id'); ?>
		<?php echo $form->error($model,'cotizacion_id'); ?>
    </td>
<br/>
    <td>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Save'); ?>
    </td>

<?php $this->endWidget(); ?>

</div><!-- form -->

<!--Sección Javascript para operar entre textField -->

<script type="text/javascript">
        function prueba()
        {
            var cantidad=0, precio=0, monto=0;
            
            cantidad = parseInt(document.formulario.Productos_cantidad.value);
            precio = parseInt(document.formulario.Productos_preciounitario.value);
            
            monto = eval(cantidad * precio);
           
            document.formulario.Productos_monto.value = monto;
            
        }
    </script>
</script>