<?php
/* @var $this EmpresaController */
/* @var $model Empresa */



$this->menu=array(
	array('label'=>'Create Empresa', 'url'=>array('create')),
	array('label'=>'Update Empresa', 'url'=>array('update', 'id'=>$model->id)),
	#$array('label'=>'Delete Empresa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Empresa', 'url'=>array('admin')),
);
?>

<h1>Consulta Empresa </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		'razon_social',
		'rfc',
		array(
			'name'=>'estatus_id',
			'type'=>'text',
			'value'=>$model->estatus->estatus,
			),
))); ?>
