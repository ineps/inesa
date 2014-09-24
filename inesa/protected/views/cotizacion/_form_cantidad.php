<?php
/* @var $this CotizacionController */
/* @var $model Cotizacion */
/* @var $form CActiveForm */
?>

<?php
	if(isset($_GET['cantidades']))
	{
		$valor = $_GET['cantidades'];
		$id_producto = $_GET['id_producto'];
	}
	else
	{
		$valor = '0';
		$id_producto = '0';
	}		

?>
<?php echo CHtml::beginForm(array('cotizacion/cantidad', 'id_producto'=>$id_producto, 'id'=>$_GET['id'], 'folio'=>$_GET['folio']));
echo CHtml::activeTextField($model, 'cantidad', array('value'=>$valor));
//...
echo CHtml::submitButton('Enviar Datos', array('class'=>'btn'));
echo CHtml::endForm();
?>