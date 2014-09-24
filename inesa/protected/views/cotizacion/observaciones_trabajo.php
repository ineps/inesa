<?php
/* @var $this CotizacionController */
/* @var $model Cotizacion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php echo CHtml::beginForm(array('cotizacion/textoadicional',  'folio'=>$_GET['folio'], 'id'=>$_GET['id']));
echo CHtml::activeTextArea($model, 'observacionestrabajo', array('cols'=>'175', 'value'=>$model->observacionestrabajo));
echo CHtml::submitButton('Enviar Observaciones de Trabajo', array('class'=>'btn'));
echo CHtml::endForm();
?>

</div><!-- form -->