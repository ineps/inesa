<?php
/* @var $this DomiciliopersonasController */
/* @var $model Domiciliopersonas */

$this->breadcrumbs=array(
	'Domiciliopersonases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Domiciliopersonas', 'url'=>array('index')),
	array('label'=>'Create Domiciliopersonas', 'url'=>array('create')),
	array('label'=>'Update Domiciliopersonas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Domiciliopersonas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Domiciliopersonas', 'url'=>array('admin')),
);
?>

<h1>View Domiciliopersonas #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'domiciliocliente_id',
		'personas_id',
	),
)); ?>
