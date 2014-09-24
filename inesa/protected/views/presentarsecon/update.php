<?php
/* @var $this PresentarseconController */
/* @var $model Presentarsecon */

$this->breadcrumbs=array(
	'Presentarsecons'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Presentarsecon', 'url'=>array('index')),
	array('label'=>'Create Presentarsecon', 'url'=>array('create')),
	array('label'=>'View Presentarsecon', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Presentarsecon', 'url'=>array('admin')),
);
?>

<h1>Update Presentarsecon <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>