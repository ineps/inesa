<?php
/* @var $this AreasController */
/* @var $model Areas */



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#areas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1 class="centrado">Administrador de Áreas</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'areas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                    'name'=>'clave',
                    'type'=>'text',
                    'value'=>'$data->clave',
                    'htmlOptions'=>array('class'=>'centrado', 'width'=>'20'),
                ),
		'descripcion',
		array(
                    'class'=>'CButtonColumn',
                    'template'=>'{update}',
		),
	),
)); ?>
