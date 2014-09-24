<?php
/* @var $this AcronimoController */
/* @var $model Acronimo */

$this->breadcrumbs=array(
	'Acronimos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Acronimo', 'url'=>array('index')),
	array('label'=>'Create Acronimo', 'url'=>array('create')),
	array('label'=>'View Acronimo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Acronimo', 'url'=>array('admin')),
);
?>

<h1>Update Acronimo <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>