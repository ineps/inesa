<?php
	if(isset($id_empresa))
	{
		echo "<h2 class='centrado'>".$id_empresa->razon_social.' <br>'.$id_empresa->rfc.'</h2><br>';
	}
	echo " <span class='separador'>|</span> ".CHtml::link('Regresar',array('empresa/vistaempresas/', 'id'=>$id_empresa->id))."<br><br>";
?>
<h1>Asignar Contacto</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'id_empresa'=>$id_empresa)); ?>