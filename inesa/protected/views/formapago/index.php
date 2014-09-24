<?php
/* @var $this FormapagoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Formapagos',
);

$this->menu=array(
	array('label'=>'Create Formapago', 'url'=>array('create')),
	array('label'=>'Manage Formapago', 'url'=>array('admin')),
);
?>

<h1>Formapagos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
