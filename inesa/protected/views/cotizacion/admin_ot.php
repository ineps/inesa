

<h1 class="centrado">Administrador de Cotizaciones</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cotizacion-grid',
	'dataProvider'=>$model->search2(),
	'filter'=>$model,
	'columns'=>array(
           # 'id',
           array(
                'name'=>'colocarfolio',
                'type'=>'raw',
                'value'=>'$data->colocarfolio',                
               'htmlOptions'=>array('class'=>'centrado', 'width'=>'20')
                ),
            array(
                'name'=>'domiciliocliente_id',
                'type'=>'raw',
                'value'=>'$data->domiciliocliente->domicilio',
                ),
            array(
                
                'type'=>'raw',
                'value'=>'CHtml::link("Consulta",array("cotizacion/ordentrabajo", 
                    "id"=>"$data->id",
                    "folio"=>"$data->colocarfolio"))',                
               'htmlOptions'=>array('class'=>'centrado', 'width'=>'20')
                ),
            
	),
)); ?>

