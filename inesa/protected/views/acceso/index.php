<?php
/* @var $this AccesoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Accesos',
);

$this->menu=array(
	array('label'=>'Create Acceso', 'url'=>array('create')),
	array('label'=>'Manage Acceso', 'url'=>array('admin')),
);
?>

<h1>Accesos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
