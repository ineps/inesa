<?php
/* @var $this CotizacionController */
/* @var $data Cotizacion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cotz_empresa')); ?>:</b>
	<?php echo CHtml::encode($data->cotz_empresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cotz_contacto')); ?>:</b>
	<?php echo CHtml::encode($data->cotz_contacto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subtotal')); ?>:</b>
	<?php echo CHtml::encode($data->subtotal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iva')); ?>:</b>
	<?php echo CHtml::encode($data->iva); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total')); ?>:</b>
	<?php echo CHtml::encode($data->total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estadocotizacion_id')); ?>:</b>
	<?php echo CHtml::encode($data->estadocotizacion_id); ?>
	<br />


</div>