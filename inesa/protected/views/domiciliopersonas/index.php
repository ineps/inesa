<?php
/* @var $this DomiciliopersonasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Domiciliopersonases',
);

$this->menu=array(
	array('label'=>'Create Domiciliopersonas', 'url'=>array('create')),
	array('label'=>'Manage Domiciliopersonas', 'url'=>array('admin')),
);
?>

<h1>Domiciliopersonases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
