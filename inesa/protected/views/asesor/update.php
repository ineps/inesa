<?php
/* @var $this AsesorController */
/* @var $model Asesor */



$this->menu=array(
	array('label'=>'List Asesor', 'url'=>array('index')),
	array('label'=>'Create Asesor', 'url'=>array('create')),
	array('label'=>'View Asesor', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Asesor', 'url'=>array('admin')),
);
?>

<h1>Update Asesor <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form-modificar', array('model'=>$model)); ?>