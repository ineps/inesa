<?php
/* @var $this DomicilioclienteController */
/* @var $model Domiciliocliente */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#domiciliocliente-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1 class="centrado">Administrar Sucursales</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'domiciliocliente-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
            array(
                'name'=>'empresa_id',
                'type'=>'text',
                'value'=>'$data->empresa->razon_social',
                ),
            'nombre_sucursal',
		'calle',
                array(
                    'name'=>'colonia',
                    'type'=>'text',
                    'value'=>'$data->colonia',
                    'htmlOptions'=>array('width'=>'10')
                    ),
		'municipio',
		array(
                    'name'=>'codigo_postal',
                    'type'=>'text',
                    'value'=>'$data->colonia',
                    'htmlOptions'=>array('width'=>'10')
                    ),
                array(
                    'name'=>'estados_id',
                    'type'=>'text',
                    'value'=>'$data->estados->estados',
                    'htmlOptions'=>array('width'=>'7')
                    ),
		array(
                    'name'=>'estatus_id',
                    'type'=>'text',
                    'value'=>'$data->estatus->estatus',
                    'htmlOptions'=>array('width'=>'5')
                    ),
		/*array(
			'type'=>'raw',
			'value'=>'CHtml::link("Contactos", array("","id"=>$data->id))',
			),*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}'
		),
	),
)); ?>
