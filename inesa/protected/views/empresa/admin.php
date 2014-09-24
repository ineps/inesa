<?php
/* @var $this EmpresaController */
/* @var $model Empresa */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#empresa-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1 class="centrado">Administrador de Empresas</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'empresa-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                    'name'=>'rfc',
                    'type'=>'text',
                    'value'=>'$data->rfc',
                    'htmlOptions'=>array('width'=>'15')
                    ),
            array(
                    'name'=>'razon_social',
                    'type'=>'text',
                    'value'=>'$data->razon_social',
                    ),
		array(
                    'name'=>'estatus_id',
                    'type'=>'text',
                    'value'=>'$data->estatus->estatus',
                    'htmlOptions'=>array('width'=>'5')
                    ),
		array(			
                    'type'=>'raw',
                    'filter'=>'',
                    'value'=>'CHtml::link("Consulta",array("empresa/vistaempresas", "id"=>$data->id))',
                    'htmlOptions'=>array('width'=>'6')
                    ),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}',
                        //{view}
		),
	),
)); ?>
