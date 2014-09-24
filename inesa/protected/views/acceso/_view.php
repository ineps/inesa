<?php
/* @var $this AccesoController */
/* @var $data Acceso */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('personas_id')); ?>:</b>
	<?php echo CHtml::encode($data->personas_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nivelacceso_id')); ?>:</b>
	<?php echo CHtml::encode($data->nivelacceso_id); ?>
	<br />


</div>