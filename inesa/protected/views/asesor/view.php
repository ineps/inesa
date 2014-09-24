<?php
/* @var $this AsesorController */
/* @var $model Asesor */

$this->breadcrumbs=array(
	'Asesors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Asesor', 'url'=>array('index')),
	array('label'=>'Create Asesor', 'url'=>array('create')),
	array('label'=>'Update Asesor', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Asesor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Asesor', 'url'=>array('admin')),
);
?>

<h1>View Asesor #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'personas_id',
		'domiciliocliente_id',
	),
)); ?>
