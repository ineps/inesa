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
<style type="text/css">
    .cuadro-azul
    {
        font-size: 12px;
        width: 200px;
        height: auto;
        background-color: #269abc;
        color: #fff;
        padding: 3px;
        position: absolute;
        display: none;
        margin-left: 1px;
    }
</style>
<div id='globo' class="cuadro-azul"></div>
<table>
    <tr>
        <td>    <?php echo $form->labelEx($model,'areas_id'); ?> 
        </td>
        <td>	<?php echo $form->dropDownList($model,'areas_id', CHtml::listData(Areas::model()->findAll(), 'id', 'clave'),
                        array(
                        'ajax'=>array(
                        'type'=>'POST',
                        'url'=>CController::createUrl('cotizacion/ajaxprueba'),
                        'update'=>'#'.CHtml::activeId($model, 'servicios_id'),
                        ),
                        'prompt'=>'Seleccione Área',
                        'required'=>'true'
                    )); ?>
        </td>
		<?php echo $form->error($model,'areas_id'); ?>
    </tr>
    <tr>
        <td>        <?php echo $form->labelEx($model,'servicios_id'); ?>
        </td>
        <td>            <?php echo $form->dropDownList($model,'servicios_id',CHtml::listData(Servicios::model()->findAll(array('condition'=>'id=0')), 'id', 'observaciones'),
                        array(
                            'ajax'=>array(
                        'type'=>'POST',
                        'dataType'=>'json',
                        'url'=>CController::createUrl('cotizacion/ajaxprueba1'),
                         'success'=>"function(data) {
                         $('#Productos_preciounitario').val(data.preciounitario);  
                       }"      
                        ),
                            'prompt'=>'Seleccione Servicio',                            
                            'required'=>'true'
                        )); ?>
		<?php echo $form->error($model,'servicios_id'); ?>
        </td>
    </tr>
    <tr>            
        <td>
                <?php echo $form->labelEx($model,'cantidad'); ?>
        </td>
        <td>
                <?php echo $form->textField($model,'cantidad', array('onblur'=>'prueba()', 'value'=>'0')); ?>
		<?php echo $form->error($model,'cantidad'); ?>
        </td>
    </tr>
    <tr>            
        <td>        
                <?php echo $form->labelEx($model,'preciounitario'); ?>
        </td>
        <td>
		<?php echo $form->textField($model,'preciounitario', array('onblur'=>'prueba()','onchange'=>'prueba()','value'=>'0')); ?>
		<?php echo $form->error($model,'preciounitario'); ?>
        </td>
    </tr>
    <tr>            
        <td>
                <?php echo $form->labelEx($model,'monto'); ?>
        </td>
        <td>
		<?php echo $form->textField($model,'monto', array('onblur'=>'prueba()', 'onchange'=>'prueba()','value'=>'0', 'readonly'=>'true')); ?>
		<?php echo $form->error($model,'monto'); ?>
        </td>
    </tr>
                
		<?php #echo $form->labelEx($model,'cotizacion_id'); ?>
		<?php echo $form->hiddenField($model,'cotizacion_id', array('value'=>$_GET['id'])); ?>
		<?php echo $form->error($model,'cotizacion_id'); ?>
               
        <?php echo $form->hiddenField($model,'estatus_id', array('value'=>'2')); ?>
		
</table>
        
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Agregar'); ?>
   
        
<?php $this->endWidget(); ?>

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