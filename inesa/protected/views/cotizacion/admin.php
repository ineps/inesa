
<h1 class="centrado">Administrador de Cotizaciones</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cotizacion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
           # 'id',
           array(
                'name'=>'colocarfolio',
                'type'=>'raw',
                'value'=>'CHtml::link("$data->colocarfolio",array("cotizacion/vistacotizacion", 
                    "id"=>"$data->id",
                    "folio"=>"$data->colocarfolio"))',                
               'htmlOptions'=>array('class'=>'centrado', 'width'=>'20')
                ),
            array(
                'name'=>'domiciliocliente_id',
                'type'=>'raw',
                'value'=>'$data->domiciliocliente->domicilio',
                ),
            /*array(
                'name'=>'cotz_empresa',
                'type'=>'text',
                'value'=>'$data->personas_empresas->nombreCompleto',
                ),*/
            #'iva',
            array(
                'name'=>'total',
                'type'=>'text',
                'value'=>'\'$\'.number_format($data->total,2)',
                'htmlOptions'=>array('class'=>'centrado')
                ),
            array(
                'name'=>'estadocotizacion_id',
                'type'=>'raw',
                'value'=>'$data->estadocotizacion->estado',
                'htmlOptions'=>array('width'=>'10')
                ),
            /*
            'estadocotizacion_id',
            */
            
	),
)); ?>

