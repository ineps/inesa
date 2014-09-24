<?php
/* @var $this PresentarseconController */
/* @var $model Presentarsecon */

$this->breadcrumbs=array(
	'Presentarsecons'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Presentarsecon', 'url'=>array('index')),
	array('label'=>'Manage Presentarsecon', 'url'=>array('admin')),
);
?>

<h1>Create Presentarsecon</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>