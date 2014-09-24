<?php
/* @var $this DomicilioclienteController */
/* @var $dataProvider CActiveDataProvider */



$this->menu=array(
	array('label'=>'Create Domiciliocliente', 'url'=>array('create')),
	array('label'=>'Manage Domiciliocliente', 'url'=>array('admin')),
);
?>

<h1><?php# echo Empresa::$model->empresa->razon_social?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
