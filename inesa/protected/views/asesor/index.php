<?php
/* @var $this AsesorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Asesors',
);

$this->menu=array(
	array('label'=>'Create Asesor', 'url'=>array('create')),
	array('label'=>'Manage Asesor', 'url'=>array('admin')),
);
?>

<h1>Asesors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
