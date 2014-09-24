<?php
/* @var $this FormapagoController */
/* @var $model Formapago */

$this->breadcrumbs=array(
	'Formapagos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Formapago', 'url'=>array('index')),
	array('label'=>'Create Formapago', 'url'=>array('create')),
	array('label'=>'View Formapago', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Formapago', 'url'=>array('admin')),
);
?>

<h1>Update Formapago <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>