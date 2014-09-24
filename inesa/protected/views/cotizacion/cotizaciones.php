<div>

<?php
	echo "<h2 class='centrado'>".$nombre_empresa.'<br>'.$id_sucursal->calle.', '.$id_sucursal->colonia.', C.P. '.$id_sucursal->codigo_postal.', '.$id_sucursal->municipio.'</h2>';
?>


<?php $this->renderPartial('_form-cotizaciones', array('model'=>$model, 'model_productos'=>$model_productos, 'id_sucursal'=>$id_sucursal->id)); ?>

</div>

