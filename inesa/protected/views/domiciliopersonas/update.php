<?php
/* @var $this DomiciliopersonasController */
/* @var $model Domiciliopersonas */

$this->breadcrumbs=array(
	'Domiciliopersonases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Domiciliopersonas', 'url'=>array('index')),
	array('label'=>'Create Domiciliopersonas', 'url'=>array('create')),
	array('label'=>'View Domiciliopersonas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Domiciliopersonas', 'url'=>array('admin')),
);
?>

<h1>Update Domiciliopersonas <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>