<?php
/* @var $this CotizacionController */
/* @var $model Cotizacion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php echo CHtml::beginForm(array('cotizacion/textoadicional',  'folio'=>$_GET['folio'], 'id'=>$_GET['id']));
echo CHtml::activeTextArea($model, 'observacionesot', array('cols'=>'175', 'value'=>$model->observacionesot));
echo CHtml::submitButton('Enviar Observaciones', array('class'=>'btn'));
echo CHtml::endForm();
?>

</div><!-- form -->