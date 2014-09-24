<?php
/* @var $this PersonasController */
/* @var $model Personas */


$this->menu=array(
	#array('label'=>'List Personas', 'url'=>array('index')),
	array('label'=>'Create Personas', 'url'=>array('create')),
	array('label'=>'Update Personas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Manage Personas', 'url'=>array('admin')),
);
?>



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'domiciliocliente_id',
			'type'=>'text',
			'value'=>$model->getDomicilio(),
			),
		array(
			'name'=>'acronimo_id',
			'type'=>'text',
			'value'=>$model->acronimo->acronimo,
			),
		'nombre',
		'apellido_pateno',
		'apellido_materno',
		array(
			'name'=>'cargo_id',
			'type'=>'text',
			'value'=>$model->cargo->cargo,
			),
		'telefono',
		'telefono_oficina',
		'celular',
		'email',
		'observaciones',
		array(
			'name'=>'estatus_id',
			'type'=>'text',
			'value'=>$model->estatus->estatus,
			),
	),
)); ?>
