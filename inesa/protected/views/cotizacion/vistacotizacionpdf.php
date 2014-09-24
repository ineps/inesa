<style type="text/css">

.color-gris-8
{
    color: #fff;
    background-color: #ccc;
    box-shadow: 0px 0px 10px #000;
}
.folio
{
    font-size: 25px;
    padding-left: 5px;
    color: red;
}
.color
{
    background-color: red;
}
.centrado
{   
    text-align: center;
}
.derecha
{
    text-align: right;
}
.centrado-inesa
{   
    text-align: center;
        font-size: 30px;
}
.centrado-inesa1
{   
    text-align: center;
        text-decoration: underline;
        font-size: 25px;
}
.centrado-inesa2
{   
    text-align: center;
        font-size: 15px;
}
.url-inesa
{   
    text-align: center;
        text-decoration: underline;
        font-size: 15px;
}
.parrafo
{
    font-size: 12px;
    text-align: justify;
}
.parrafo2
{
    font-size: 12px;
    text-align: center;
}
.tabla-td
{
    background-color: #EFEFEF;
}

.tamanio-celda{
    table-layout: fixed;
}

</style>
<?php
    $estado_folio = Cotizacion::model()->find(array('condition'=>'colocarfolio='.$folio));
    $model_productos = new Productos;
    //Ventana modal para agregar servicios
  
    
?>

<!-- Termina Sección de Script -->
<div class="cuerpo-cotizacion">
    <div class="centrado-inesa"> Cotización INESA
        <div class="centrado tamanio-30">
    <?php
        $estado_cotizacion = Cotizacion::model()->find(array('condition'=>'id='.$_GET['id']));        
    ?>
            <br />
    </div>
    </div>    
    <div class="centrado-inesa1"> INGENIERÍA Y ESTUDIOS AMBIENTALES, S.A. DE C.V.</div> 
    <div class="centrado-inesa2"> SERVICIO INTEGRAL DE CONSULTRÍA AMBIENTAL Y VENTA DE EQUIPO</div> 
    <div class="url-inesa"> www.inesa.com.mx</div>
             
   
    <div class="derecha">FOLIO. <?php echo "<span class='folio'>".$_GET['folio']."</span>"; ?> <br/>     
        <div>
            
            <p>
                <?php
                
                    if($estado_cotizacion->estadocotizacion_id == '4')
                    {
                        $fecha_comparar = date('Y-m-d');
                        echo "Creación: ".$estado_cotizacion->fecha;
                        echo " <span class='folio'>|</span> ".$estado_cotizacion->fechacancelacion;
                        if($estado_cotizacion->fechacancelacion <= $fecha_comparar)
                        {
                            $this->redirect(array('//cotizacion/cancelar/', 'id'=>$_GET['id'], 'folio'=>$_GET['folio']));
                        }
                    }
                    else if($estado_cotizacion->estadocotizacion_id == '2')
                    {
                        echo "Tiempo de entrega: ".$estado_folio->diasentrega . " dias hábiles.";
                    }
                    else
                    {
                        $fecha_comparar = date('Y-m-d');
                        echo "<span class='parrafo'> Creación de la cotización: ".$estado_cotizacion->fecha."</span><br />";
                        echo "<span class='parrafo'> Vigencia de la cotización: ".$estado_cotizacion->fechacancelacion."</span>";
                        if($estado_cotizacion->fechacancelacion <= $fecha_comparar)
                        {
                            $this->redirect(array('//cotizacion/cancelar/', 'id'=>$_GET['id'], 'folio'=>$_GET['folio']));
                        }
                    }
                ?>
            </p>
            
        </div>
    </div>
    <div class="parrafo">
        <?php
            echo "Cotización para: <span class='negrita-naranja'><br />".$estado_folio->domiciliocliente->empresa->razon_social."<br /> Sucursal: ".$estado_folio->domiciliocliente->nombre_sucursal."<br />".$estado_folio->domiciliocliente->getdomicilios();
            echo "</br>";
            if($estado_folio->domiciliopersonas->personas->telefono == "" || is_null($estado_folio->domiciliopersonas->personas->telefono))
            {
            }
            else
            {
                echo "Teléfono: ".$estado_folio->domiciliopersonas->personas->telefono;
            }
            if($estado_folio->domiciliopersonas->personas->telefono_oficina == "" || is_null($estado_folio->domiciliopersonas->personas->telefono_oficina))
                {
                }
            else
            {
                echo "<br /> Teléfono de Oficina: ".$estado_folio->domiciliopersonas->personas->telefono_oficina;
            }
            if($estado_folio->domiciliopersonas->personas->celular == "" || is_null($estado_folio->domiciliopersonas->personas->celular))
            {
            }
            else
            {
                echo "<br /> Teléfono Celular: ".$estado_folio->domiciliopersonas->personas->celular;
            }
            echo "</span>";
            echo "<br /><div class='derecha'>At'n: <span class='negrita-naranja'>".$estado_folio->domiciliopersonas->personas->nombreProfesion."<br />".$estado_folio->domiciliopersonas->personas->cargo->cargo."</span></div><br />";
            
        ?>
        <div>
            
            <div>
        <?php
            
            
            if($estado_folio->domiciliocliente_id2 != "")
            {
                echo "<p>Estos servicios se realizarán a la siguiente compañía.</p>";
                echo "<span class='negrita-naranja'>".$estado_folio->domiciliocliente2->empresa->razon_social."<br /> Sucursal: ".$estado_folio->domiciliocliente2->nombre_sucursal."<br />".$estado_folio->domiciliocliente2->getdomicilios();
                echo "</br>";
                if($estado_folio->domiciliopersonas2->personas->telefono == "" || is_null($estado_folio->domiciliopersonas2->personas->telefono))
                {
                }
                else
                {
                    echo "Teléfono: ".$estado_folio->domiciliopersonas2->personas->telefono;
                }
                if($estado_folio->domiciliopersonas2->personas->telefono_oficina == "" || is_null($estado_folio->domiciliopersonas2->personas->telefono_oficina))
                    {
                    }
                else
                {
                    echo "<br /> Teléfono de Oficina: ".$estado_folio->domiciliopersonas2->personas->telefono_oficina;
                }
                if($estado_folio->domiciliopersonas2->personas->celular == "" || is_null($estado_folio->domiciliopersonas2->personas->celular))
                {
                }
                else
                {
                    echo "<br /> Teléfono Celular: ".$estado_folio->domiciliopersonas2->personas->celular;
                
                echo "</span>";
                echo "<br /><div class='derecha'>At'n: <span class='negrita-naranja'>".$estado_folio->domiciliopersonas2->personas->nombreProfesion."<br />".$estado_folio->domiciliopersonas2->personas->cargo->cargo."</span></div><br />";
                }
            }
        ?>
        
    </div> <br />
        </div>
    </div> <br />
    <div class="parrafo"> 
        INESA, S.A. DE C.V. empresa dedicada al estudio de la Contamincación Ambiental, en la áreas de 
    Ecología, Higiene Industrial y salud Ocupacional, se complace en enviar a usted la cotización para ep desarrollo
    de una serie de estudios ambientales.
    </div>
    <!--<div id="abrir">Abrir</div>-->
     
    <div class="parrafo">
        <?php
            echo $estado_folio->textoadicional;
        ?>
    </div>
    <br /><br />
    
    <div class="parrafo">ESTUDIOS A REALIZAR:</div>
    <div id="nes"></div>
    <br /> 
    <div class="centrado">
        <?php 
            if($estado_folio->estadocotizacion_id == '4')
            {
                echo CHtml::link('Agregar Servicio','#' ,array('onclick'=>'$("#vmodal_agregar_servicio").dialog("open"); return true;'));
            }
        ?>
    </div>
    <br />
    <div id="myservicio">
    <table class="tamanio-celda">
        <tr>
                
        <td class="centrado tabla-td" width="70px">Partida</td>
        <td class="centrado tabla-td" width="50px">Área</td>
        <td class="centrado tabla-td" width="100px">Servicio</td>
        <td class="centrado tabla-td" width="400px">Descripción</td>
        <td class="centrado tabla-td" width="70px">Cantidad</td>
        <td class="centrado tabla-td" width="100px">Precio</td>
        <td class="centrado tabla-td" width="100px">Total</td>
        <?php 
        if($estado_folio->estadocotizacion_id == '4')
        {
        ?>
        <th class="centrado tabla-td">Modificar</th>
        <?php
        }
        ?>
        </tr>
    </table>   
        <div id="myservicio">
    <table class="tamanio-celda parraafo" >
        <?php
        global $monto;
        
        $productos = Productos::model()->findAll(array('condition'=>'cotizacion_id='.$_GET['id']));
            $i=1;
            
            foreach ($productos as $key)
            {    $monto += $key->monto;
                echo "<tr class='parrafo'>";  
                    
                    echo "<td class='centrado parrafo2' width='70px'>".$i++."</td>";
                    echo "<td class='centrado parrafo2' width='50px'>".$key->areas->clave."</td>";
                    echo "<td class='centrado parrafo2' width='100px'>".$key->servicios->servicio."</td>";
                    echo "<td class='centrado parrafo2' width='400px'>".$key->servicios->observaciones."</td>";
                    
                        echo "<td class='centrado parrafo2' width='70px'>".$key->cantidad."</td>";
                    
                    echo "<td class='centrado parrafo2' width='100px'>$".  number_format($key->preciounitario, 2)."</td>";
                    echo "<td class='centrado parrafo2' width='100px'>$".  number_format($key->monto, 2)."</td>";
                    
                        echo "</tr>";           
            }        
        ?>
    </table>    
        </div> 
    <br/><br/><br/><br/>
    
    <div class="derecha">
        <?php 
        $model_cotizacion = Cotizacion::model()->findByPk($_GET['id']);
        
            if($estado_cotizacion->estadocotizacion_id == '4')
            {
                echo CHtml::link('Descuento :','#' ,array('onclick'=>'$("#vmodal_descuento").dialog("open"); return true;'));
                echo '%<input type="text" value="'.$model_cotizacion->descuento.'" readonly="true"><br/>';
            }
            else
            {
                if($model_cotizacion->descuento == "" || is_null($model_cotizacion->descuento))
                {
                }
                else
                {
                    echo '<span class="parrafo">Descuento: %<input type="text" value="'.$model_cotizacion->descuento.'" readonly="true"></span><br/>';                    
                }
            }
            echo '<span class="parrafo">Subtotal: $<input type="text" value="'.  number_format($model_cotizacion->subtotal, 2).'" readonly="true"></span><br/>';
            echo '<span class="parrafo">IVA: $<input type="text" value="'.  number_format($model_cotizacion->iva, 2).'" readonly="true"></span><br/>';
            echo '<span class="parrafo">Total: $<input type="text" value="'.  number_format($model_cotizacion->total, 2).'" readonly="true"></span>';
        ?>
    </div>
    <div>
        <hr>
        <h2 class="centrado">GARANTIAS</h2>
        <p cllas="parrafo">
            Escribir garantías ...
        </p>
        <h2 class="centrado">FORMA DE PAGO</h2>
        <p >
            <ol class="parrafo">
                <li>A la facturación se agregará el I.V.A.</li>
                <li>Forma de pago: <?php echo $estado_folio->formapago->formapago; ?></li>
                <li>tiempo de entrega del informe de resultados <?php echo $estado_folio->diasentrega; ?> días hábiles después de concluir los muestreos.</li>
                <li>Liquidación del servicio: días de entrega de resultados</li>
            </ol>
        </p>
        <h2 class="centrado">OBSERVACIONES</h2>
        <p >
            <ol class="parrafo">
                <li>
                    Es indespensable contar con la forma de autorización de su proyecto firmada por el responsable de su empresa incluida
                    en esta cotización o bien con la orden de compra generada por su empresa para poder realziar los trabajos
                    solicitados, estos documentos pueden ser enviados al fax: 01 (442) 213 0612 o bien al correo inesa1@prodigy.net.mx.
                </li>
                <li>
                    Los resultados se refieren a las muestras obtenidas o entregadas en nuestro laboratorio y trabajadas en las condiciones del mismo.
                </li>
                <li>
                    Las muestras se encontrarán bajo custodia del laboratorio hasta un máximo de 15 días despues de haber entregado
                    el reporte de resultados al cliente.
                </li>
                <li>
                    Favor de anexar a su orden de compra el número de referencia indicado en nuestra cotización.
                </li>
            </ol>
            <p class="parrafo">Los resultados del estudio se entregarán en un informe altamente confidencial, con interpretación de resultados.<br /><br />
            Sin más por el momento y en espera de vernos favorecidos con su confianza y aceptación, nos ponemos a sus apreciables
            órdenes para cualquier aclaración o comentario a la presente.</p>
            <br /><br />
            Atentamente,
            <br /><br /><br />            
        </p>
        <div>
            Q.F.B. Irma Retana C.<br />
                DIRECTOR GENERAL
        </div>
    </div>
    
    
</div>