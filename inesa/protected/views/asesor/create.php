<?php
/* @var $this AsesorController */
/* @var $model Asesor */

$this->breadcrumbs=array(
	'Asesors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Asesor', 'url'=>array('index')),
	array('label'=>'Manage Asesor', 'url'=>array('admin')),
);
?>

<h1>Create Asesor</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>