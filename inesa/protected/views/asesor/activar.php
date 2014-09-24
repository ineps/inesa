<h1>Activar Asesor</h1>

<?php

$model_asesor = Asesor::model()->findAll(array('condition'=>'autorizado=false'));

if($model_asesor)
{
	foreach ($model_asesor as $key ) {
            echo "<div class='contorno'>";
            echo "EMPRESA: <span class='negrita-naranja'>".$key->domiciliocliente->empresa->razon_social."</span><br />";
            echo "SUCURSAL: <span class='negrita-naranja'>".$key->domiciliocliente->nombre_sucursal."</span><br />";
            echo "DOMICILIO: <span class='negrita-naranja'> Calle ".$key->domiciliocliente->calle.", Colonia: ".$key->domiciliocliente->colonia.", C.P. ".$key->domiciliocliente->codigo_postal.", ".$key->domiciliocliente->municipio.", ".$key->domiciliocliente->estados->estados."</span>";
            $this->renderPartial('_form-activar', array('model'=>$model, 'id'=>$key->id)); 
            echo "</div><br />";
            
        }
}
 
 ?>