<?php
/* @var $this PresentarseconController */
/* @var $data Presentarsecon */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seccion')); ?>:</b>
	<?php echo CHtml::encode($data->seccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cotizacion_id')); ?>:</b>
	<?php echo CHtml::encode($data->cotizacion_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('personas_id')); ?>:</b>
	<?php echo CHtml::encode($data->personas_id); ?>
	<br />


</div>