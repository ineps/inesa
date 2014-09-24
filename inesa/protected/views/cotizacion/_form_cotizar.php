<?php
    $fecha = date('Y-m-d');
    //***** Fecha de expiracion
    $nueva = strtotime('+5day', strtotime($fecha));
    $fechacan = date('Y-m-d',$nueva);   
    
    //Fecha de expiracion *********
    $anio  = date('Y');
    $anio_simple = date('y');
    $ultimo_folio = "SELECT  MAX(folio) AS folio FROM Cotizacion WHERE anio=".$anio;
    $folio = Cotizacion::model()->findBySql($ultimo_folio);
    if(empty($folio->folio))
    {
        $nuevo_folio = 1;
        $folio_hoja = $anio_simple . $nuevo_folio;
    }
    else
    {
        $nuevo_folio = $folio->folio + 1;
        $folio_hoja = $anio_simple . $nuevo_folio;
    }
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cotizacion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <table>
        <tr>
            <td>
                <div class="row">
                    <?php echo 'Seleccionar Cliente <br />'; ?>
                    <?php echo $form->dropDownList($model,'variable', CHtml::listData(Empresa::model()->findAll(), 'id', 'razon_social'),
                        array(
                            'ajax'=>array(
                            'type'=>'POST',
                            'url'=>CController::createUrl('cotizacion/ajaxdropempresa'),
                            'update'=>'#'.CHtml::activeId($model, 'domiciliocliente_id'),
                            ),
                            'prompt'=>'Seleccione Empresa',
                            'required'=>'true',
                        )); ?>
                    <?php echo $form->error($model,'variable'); ?>
            </div>

            <div class="row">
                    <?php echo 'Selecciona una Sucursal <br />';?>
                    <?php echo $form->dropDownList($model,'domiciliocliente_id', CHtml::listData(Domiciliocliente::model()->findAll(array('condition'=>'id=0')),'id', 'empresa_id'),
                            array(
                                'ajax'=>array(
                                'type'=>'POST',
                                'url'=>CController::createUrl('cotizacion/ajaxdropsucursal'),
                                'update'=>'#'.CHtml::activeId($model, 'cotz_contacto1')
                                ),
                                    'prompt'=>'Seleccione Sucursal',
                                    
            )); ?>
                    <?php echo $form->error($model,'domiciliocliente_id'); ?>
            </div>

            <div class="row">
                    <?php echo "Contacto <br />"; ?>
                    <?php echo $form->dropDownList($model,'cotz_contacto1', CHtml::listData(Personas::model()->findAll(array('condition'=>'id=0')), 'id', 'nombreCompleto'), array('prompt'=>'Seleccione Contacto','required'=>'true',)); ?>
                    <?php echo $form->error($model,'cotz_contacto1'); ?>
            </div>
            </td>
            <td>
                <div class="row">
                <?php echo "Días de entrega <br />"?>
                <?php echo $form->numberField($model,'diasentrega', array('required'=>'true')); ?>
                <?php echo $form->error($model,'diasentrega'); ?>
            </div>
            <div class="row">
                <?php echo "Forma de Pago <br />"; ?>
                <?php echo $form->dropDownList($model,'formapago_id', CHtml::listData(Formapago::model()->findAll(), 'id', 'formapago'), array('prompt'=>'Seleccione forma de pago', 'required'=>'true')); ?>
                <?php echo $form->error($model,'formapago_id'); ?>
            </div>
            </td>
            <td>
                
            </td>
        </tr>
    </table>        
        
        <div class="row">
                    <?php echo "Facturar Asesor Externo" ?>
                    <?php echo $form->checkBox($model,'check', array('id'=>'check', 'onchange'=>'javascript:showContent()')); ?>
                    <?php echo $form->error($model,'check'); ?>
            </div>
                <div id="contacto_empresa" class="row">
        
        <div class="row">
        <?php echo 'Seleccionar Cliente <br />'; ?>
        <?php echo $form->dropDownList($model,'variable2', CHtml::listData(Empresa::model()->findAll(), 'id', 'razon_social'),
                    array(
                        'ajax'=>array(
                        'type'=>'POST',
                        'url'=>CController::createUrl('cotizacion/ajaxdropempresa2'),
                        'update'=>'#'.CHtml::activeId($model, 'domiciliocliente_id2'),
                        ),
                        'prompt'=>'Seleccione Empresa',
                    )); ?>
        
            </div>
            <div class="row">
        <?php echo 'Selecciona una Sucursal <br />';?>
        <?php echo $form->dropDownList($model,'domiciliocliente_id2', CHtml::listData(Domiciliocliente::model()->findAll(array('condition'=>'id=0')),'id', 'empresa_id'),
                        array(
                            'ajax'=>array(
                            'type'=>'POST',
                            'url'=>CController::createUrl('cotizacion/ajaxdropsucursal2'),
                            'update'=>'#'.CHtml::activeId($model, 'cotz_contacto2')
                            ),
                                'prompt'=>'Seleccione Sucursal',
                    )); ?>
                </div>
                <div class="row">
                    <?php echo "Contacto <br />"; ?>
                    <?php echo $form->dropDownList($model,'cotz_contacto2', CHtml::listData(Personas::model()->findAll(array('condition'=>'id=0')), 'id', 'nombreCompleto'), array('prompt'=>'Seleccione Contacto')); ?>
                    <?php echo $form->error($model,'cotz_contacto2'); ?>
                </div>
            </div>
        
        
        
        <div class="row">		
            <?php echo $form->hiddenField($model,'fecha', array('value'=>$fecha)); ?>
            <?php echo $form->hiddenField($model,'colocarfolio', array('value'=>$folio_hoja)); ?>
            <?php echo $form->hiddenField($model,'folio', array('value'=>$nuevo_folio)); ?>
            <?php echo $form->hiddenField($model,'anio', array('value'=>$anio)); ?>
            <?php echo $form->hiddenField($model,'fechacancelacion', array('value'=>$fechacan)); ?>
            <?php echo $form->hiddenField($model,'estadocotizacion_id', array('value'=>4)); ?>
	</div>
        
        <script type="text/javascript">
            function showContent() {
                element = document.getElementById("contacto_empresa");
                check = document.getElementById("check");
                if (check.checked) {
                    element.style.display='block';
                }
                else {
                    element.style.display='none';
                }
            }
        </script>
        
        

        
            <?php echo $form->hiddenfield($model,'iva', array('value'=>0)); ?>
            <?php echo $form->hiddenfield($model,'total', array('value'=>0)); ?>
            <?php echo $form->hiddenfield($model,'subtotal', array('value'=>0)); ?>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear cotización' : 'Save', array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->