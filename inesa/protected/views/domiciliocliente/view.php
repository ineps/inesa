<?php
/* @var $this DomicilioclienteController */
/* @var $model Domiciliocliente */

$this->menu=array(
	array('label'=>'Administrador de Sucursales', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->empresa->razon_social; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(		
		array(
			'name'=>'empresa_id',
			'type'=>'text',
			'value'=>$model->empresa->razon_social,
			),
		'calle',
		'colonia',
		'municipio',
		'codigo_postal',
		array(
			'name'=>'estatus_id',
			'type'=>'text',
			'value'=>$model->estatus->estatus,
			),
	),
)); ?>
