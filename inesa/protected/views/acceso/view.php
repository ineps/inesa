<?php
/* @var $this AccesoController */
/* @var $model Acceso */

$this->breadcrumbs=array(
	'Accesos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Acceso', 'url'=>array('index')),
	array('label'=>'Create Acceso', 'url'=>array('create')),
	array('label'=>'Update Acceso', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Acceso', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Acceso', 'url'=>array('admin')),
);
?>

<h1>View Acceso #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'password',
		'personas_id',
		'nivelacceso_id',
	),
)); ?>
