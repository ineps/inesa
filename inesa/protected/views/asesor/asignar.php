<?php
/* @var $this AsesorController */
/* @var $model Asesor */


$this->menu=array(
	array('label'=>'List Asesor', 'url'=>array('index')),
	array('label'=>'Create Asesor', 'url'=>array('create')),
	array('label'=>'View Asesor', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Asesor', 'url'=>array('admin')),
);
?>

<h1>Alta  Asesor <?php echo $model->id; ?></h1>


<?php
	$asesores = Asesor::model()->findAll(array('condition'=>'personas_id IS NULL'));

	foreach ($asesores as $key) {
		if($key->domiciliocliente_id )
		{
	 		echo "<hr>";
	 		$this->renderPartial('_form-asignar', array('model'=>$model)); 			
		}
	}

 ?>