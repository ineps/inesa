<?php
/* @var $this PersonasController */
/* @var $model Personas */



$this->menu=array(
	array('label'=>'Alta de una Personas', 'url'=>array('create')),
	array('label'=>'Administrador de Personas', 'url'=>array('admin')),
);
?>

<h1>Modificar Persona </h1>

<?php $this->renderPartial('_form-modificar', array('model'=>$model)); ?>