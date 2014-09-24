<?php
/* @var $this AcronimoController */
/* @var $model Acronimo */

$this->breadcrumbs=array(
	'Acronimos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Acronimo', 'url'=>array('index')),
	array('label'=>'Manage Acronimo', 'url'=>array('admin')),
);
?>

<h1>Create Acronimo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>