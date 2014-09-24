<style type="text/css">
.btn {
  color: #fff;
  background-color: #FF6C29;
  border-color: #FF6C29;
}
</style>

<?php $estado_folio = Cotizacion::model()->find(array('condition'=>'colocarfolio='.$_GET['folio']));?>
<h1 class="centrado">Orden de Trabajo</h1><hr />
<?php echo "<h3 class='centrado'>".$model_cotizacion->domiciliocliente->empresa->razon_social."</h3>";?>
<?php echo "<h3 class='centrado'>Sucursal: ".$model_cotizacion->domiciliocliente->getDomicilioBasico()."</h3>";?>
<h4>Presentarse con:</h4>

<table>
    <tr>
        <td class="centrado tabla-td">OT</td>
        <td class="centrado tabla-td">Cotización</td>
        <td class="centrado tabla-td">Tiempo de Entrega</td>
        <td class="centrado tabla-td">Tipo de Pago</td>
        <td class="centrado tabla-td">Fecha de Solicitud</td>
        <td class="centrado tabla-td">Elaborada por</td>
    </tr>
    <tr>
        <td class="centrado"><?php echo $model_cotizacion->id; ?></td>
        <td class="centrado"><?php echo $model_cotizacion->colocarfolio;  ?></td>
        <td class="centrado"><?php echo $model_cotizacion->fecha;  ?></td>
        <td class="centrado"><?php echo $model_cotizacion->formapago->formapago;  ?></td>
        <td class="centrado"><?php echo $model_cotizacion->fecha;  ?></td>
        <td class="centrado"><?php echo "Quién hace la cotización"  ?></td>
    </tr>
</table>
<br />
<h4>Observaciones:</h4>
<?php $this->renderPartial('observaciones', array('model'=>$estado_folio)); ?> 
<br />
<br />
<h4>Alcances del Trabajo:</h4>
<table>
    <tr>
        <td class="centrado tabla-td">Clave</td>
        <td class="centrado tabla-td">Descripción</td>
        <td class="centrado tabla-td">Cantidad</td>
        <td class="centrado tabla-td"></td>
    </tr>    
        <?php
            foreach($model_producto as $key)
            {
                echo "<tr>";
                echo "<td class='centrado'>".$key->areas->clave."</td>";
                echo "<td class='centrado'>".$key->areas->descripcion."</td>";
                echo "<td class='centrado'>".$key->cantidad."</td>";
                echo "<td class='centrado'>". CHtml::link('Detalles',array('controller/action'))."</td>";
                echo "</tr>";
            }
        ?>    
</table>
<br />
Fecha para realizar los estudios: <?php echo $model_cotizacion->fecha;  ?> Hora para presentarse: XXXXXX.

<h4>Observaciones de trabajo:</h4>
<?php $this->renderPartial('observaciones_trabajo', array('model'=>$estado_folio)); ?> 
<table>
    <tr>
        <td class='centrado'>Elaboró</td>
        <td class='centrado'>Recibe</td>
        <td class='centrado'>Se asegura que se llevaron las evaluaciones</td>
        <td class='centrado'>Orden asignada</td>
    </tr>
    <tr>
        <td class='centrado'></td>
        <td class='centrado'></td>
        <td class='centrado'></td>
        <td class='centrado'></td>
    </tr>
    <tr>
        <td class='centrado'>Nombre y Firma</td>
        <td class='centrado'>Nombre y Firma</td>
        <td class='centrado'>Nombre y Firma</td>
        <td class='centrado'></td>
    </tr>
    <tr>
        <td class='centrado'>Fecha: <?php echo $model_cotizacion->fecha;  ?></td>
        <td class='centrado'>Fecha: <?php echo $model_cotizacion->fecha;  ?></td>
        <td class='centrado'>Fecha: <?php echo $model_cotizacion->fecha;  ?></td>
        <td class='centrado'></td>
    </tr>
</table>