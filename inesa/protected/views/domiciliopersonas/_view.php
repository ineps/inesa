<?php
/* @var $this DomiciliopersonasController */
/* @var $data Domiciliopersonas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('domiciliocliente_id')); ?>:</b>
	<?php echo CHtml::encode($data->domiciliocliente_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('personas_id')); ?>:</b>
	<?php echo CHtml::encode($data->personas_id); ?>
	<br />


</div>