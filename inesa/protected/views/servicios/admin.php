<?php
/* @var $this ServiciosController */
/* @var $model Servicios */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#servicios-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1 class="centrado">Administrador de  Servicios</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'servicios-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                    'name'=>'folio',
                    'type'=>'text',
                    'value'=>'$data->folio',
                    'htmlOptions'=>array( 'width'=>'90'),
                ),
                'observaciones',
		array(
                    'name'=>'precio',
                    'type'=>'text',
                    'value'=>'\'$\'.number_format($data->precio,2)',
                    'htmlOptions'=>array('width'=>'100'),
                ),
		
		/*array(
			'name'=>'areas_id',
			'type'=>'text',
			'value'=>'$data->areas->descripcion',
			),*/
		array(
                    'class'=>'CButtonColumn',
                    'template'=>'{update}',
		),
	),
)); ?>
