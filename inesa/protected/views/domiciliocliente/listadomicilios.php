<?php
/* @var $this DomicilioclienteController */
/* @var $model Domiciliocliente */

$this->menu=array(
	#array('label'=>'List Domiciliocliente', 'url'=>array('index')),
	array('label'=>'Create Domiciliocliente', 'url'=>array('create')),
	#array('label'=>'Update Domiciliocliente', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Manage Domiciliocliente', 'url'=>array('admin')),
);
?>



<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

