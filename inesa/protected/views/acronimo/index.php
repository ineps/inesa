<?php
/* @var $this AcronimoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Acronimos',
);

$this->menu=array(
	array('label'=>'Create Acronimo', 'url'=>array('create')),
	array('label'=>'Manage Acronimo', 'url'=>array('admin')),
);
?>

<h1>Acronimos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
