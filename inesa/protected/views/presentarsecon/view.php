<?php
/* @var $this PresentarseconController */
/* @var $model Presentarsecon */

$this->breadcrumbs=array(
	'Presentarsecons'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Presentarsecon', 'url'=>array('index')),
	array('label'=>'Create Presentarsecon', 'url'=>array('create')),
	array('label'=>'Update Presentarsecon', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Presentarsecon', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Presentarsecon', 'url'=>array('admin')),
);
?>

<h1>View Presentarsecon #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'seccion',
		'cotizacion_id',
		'personas_id',
	),
)); ?>
