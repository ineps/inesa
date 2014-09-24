<?php
/* @var $this AccesoController */
/* @var $model Acceso */

$this->breadcrumbs=array(
	'Accesos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Acceso', 'url'=>array('index')),
	array('label'=>'Create Acceso', 'url'=>array('create')),
	array('label'=>'View Acceso', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Acceso', 'url'=>array('admin')),
);
?>

<h1>Update Acceso <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>