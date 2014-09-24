<?php
/* @var $this PersonasController */
/* @var $model Personas */


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#personas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1 class="centrado">Administrador de Personas</h1>

<?php 
if(Yii::app()->user->getState("nivel_acceso") == "Ventas")
{
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'personas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                    'name'=>'acronimo_id',
                    'type'=>'raw',
                    'value'=>'$data->acronimo->acronimo',
                    ),
		'nombre',
		'apellido_pateno',
		'apellido_materno',
		array(
                    'name'=>'cargo_id',
                    'type'=>'raw',
                    'value'=>'$data->cargo->cargo',
                    ),
		'telefono',
		/*'telefono_oficina',
		'celular',*/
		'email',
		/*'observaciones',*/
		array(
			'name'=>'estatus_id',
			'type'=>'raw',
			'value'=>'$data->estatus->estatus',
			),
		
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{view}'
		),
	),
)); 
}
else
{
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'personas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                    'name'=>'acronimo_id',
                    'type'=>'raw',
                    'value'=>'$data->acronimo->acronimo',
                    'htmlOptions'=>array('width'=>'10')
			),
		array(
                    'name'=>'nombre',
                    'type'=>'text',
                    'value'=>'$data->nombre',
                    'htmlOptions'=>array('width'=>'10')
                    ),
		array(
                    'name'=>'apellido_pateno',
                    'type'=>'text',
                    'value'=>'$data->apellido_pateno',
                    'htmlOptions'=>array('width'=>'10')
                    ),
                array(
                    'name'=>'apellido_materno',
                    'type'=>'text',
                    'value'=>'$data->apellido_materno',
                    'htmlOptions'=>array('width'=>'10'),
                    ),
                array(
                    'name'=>'cargo_id',
                    'type'=>'text',
                    'value'=>'$data->cargo->cargo',
                    'htmlOptions'=>array('width'=>'15')
                    ),
		array(
                    'name'=>'telefono',
                    'type'=>'text',
                    'value'=>'$data->telefono',
                    ),
		array(
                    'name'=>'telefono_oficina',
                    'type'=>'raw',
                    'value'=>'$data->telefono_oficina',
                    ),
                array(
                    'name'=>'celular',
                    'type'=>'text',
                    'value'=>'$data->celular',
                    ),
		'email',
		/*'observaciones',*/
		array(
                    'name'=>'estatus_id',
                    'type'=>'raw',
                    'value'=>'$data->estatus->estatus',
                    'htmlOptions'=>array('width'=>'10')
			),
		array(
			'type'=>'raw',
			'value'=>'CHtml::link(\'Acceso\', array("acceso/create", "id"=>$data->id))',
			),
		
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}'
		),
	),
)); 

}?>

