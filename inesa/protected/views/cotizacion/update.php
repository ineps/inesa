<?php
/* @var $this CotizacionController */
/* @var $model Cotizacion */

$this->breadcrumbs=array(
	'Cotizacions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cotizacion', 'url'=>array('index')),
	array('label'=>'Create Cotizacion', 'url'=>array('create')),
	array('label'=>'View Cotizacion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Cotizacion', 'url'=>array('admin')),
);
?>

<h1>Update Cotizacion <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>