<?php
/* @var $this AcronimoController */
/* @var $model Acronimo */

$this->breadcrumbs=array(
	'Acronimos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Acronimo', 'url'=>array('index')),
	array('label'=>'Create Acronimo', 'url'=>array('create')),
	array('label'=>'Update Acronimo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Acronimo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Acronimo', 'url'=>array('admin')),
);
?>

<h1>View Acronimo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'acronimo',
		'significado',
	),
)); ?>
