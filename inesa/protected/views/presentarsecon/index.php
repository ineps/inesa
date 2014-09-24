<?php
/* @var $this PresentarseconController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Presentarsecons',
);

$this->menu=array(
	array('label'=>'Create Presentarsecon', 'url'=>array('create')),
	array('label'=>'Manage Presentarsecon', 'url'=>array('admin')),
);
?>

<h1>Presentarsecons</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
