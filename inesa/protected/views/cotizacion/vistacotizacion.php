<style type="text/css">
.btn {
  color: #fff;
  background-color: #FF6C29;
  border-color: #FF6C29;
}
.texto-adicional
{
    
}
</style>
<script type="text/javascript">
    $(document).ready(function()
        {
        $("#").click(function () {     
            $('#texto-a').toggle();
             });
        });
</script>
<?php
    $estado_folio = Cotizacion::model()->find(array('condition'=>'colocarfolio='.$folio));
    $model_productos = new Productos;
    //Ventana modal para agregar servicios
    $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
	                'id'=>'vmodal_agregar_servicio',
	                	'options'=>array(
	                    'title'=>'Agregar Servicio',
	                    'autoOpen'=>false,
	                    'modal'=>'true',
	                    'width'=>'500',
	                    'height'=>'250',
	                    'overlay'=> array(
	                    	'backgroundColor'=>'#fff',
	                    	'opacity'=>'0.2',
	                    	),
	                    'show'=>array(
		                'effect'=>'blind',
		                'duration'=>700,
				            ),
				        'hide'=>array(
				                'effect'=>'explode',
				                'duration'=>600,
				            ), 
			                ),
			             ));
	$this->renderPartial('prueba',array('model'=>$model_productos, 'folio'=>$folio ), false);
	$this->endWidget();
        //***********
    if(isset($_GET['cantidades']))
        {
             //Ventana modal para agregar servicios
    $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
                    'id'=>'vmodal_cantidad',
                        'options'=>array(
                        'title'=>$_GET['servicio'],
                        'autoOpen'=>true,
                        'modal'=>'true',
                        'width'=>'300',
                        'height'=>'200',
                        'overlay'=> array(
                            'backgroundColor'=>'#fff',
                            'opacity'=>'0.2',
                            ),
                        'show'=>array(
                        'effect'=>'blind',
                        'duration'=>700,
                            ),
                        'hide'=>array(
                                'effect'=>'explode',
                                'duration'=>600,
                            ), 
                            ),
                         ));
    $this->renderPartial('cantidad',array('model'=>$model_productos, 'id'=>$_GET['id'], 'folio'=>$_GET['folio']), false);
    $this->endWidget();
        }
        else
        {
             //Ventana modal para agregar servicios
    $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
                    'id'=>'vmodal_cantidad',
                        'options'=>array(
                        'title'=>'Modificar Cantidas',
                        'autoOpen'=>false,
                        'modal'=>'true',
                        'width'=>'300',
                        'height'=>'200',
                        'overlay'=> array(
                            'backgroundColor'=>'#fff',
                            'opacity'=>'0.2',
                            ),
                        'show'=>array(
                        'effect'=>'blind',
                        'duration'=>700,
                            ),
                        'hide'=>array(
                                'effect'=>'explode',
                                'duration'=>600,
                            ), 
                            ),
                         ));
    $this->renderPartial('_form_cantidad',array('model'=>$model_productos,'id'=>$_GET['id'],'folio'=>$_GET['folio']), false);
    $this->endWidget();
        }
        //**************
        $modelo_cotizacion = new Cotizacion;
        $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
	                'id'=>'vmodal_descuento',
	                	'options'=>array(
	                    'title'=>'Agregar Descuento',
	                    'autoOpen'=>false,
	                    'modal'=>'true',
	                    'width'=>'350',
	                    'height'=>'100',
	                    'overlay'=> array(
	                    	'backgroundColor'=>'#fff',
	                    	'opacity'=>'0.2',
	                    	),
	                    'show'=>array(
		                'effect'=>'blind',
		                'duration'=>700,
				            ),
				        'hide'=>array(
				                'effect'=>'explode',
				                'duration'=>600,
				            ), 
			                ),
			             ));
	$this->renderPartial('_form_descuento',array('model'=>$modelo_cotizacion), false);
	$this->endWidget();
    
?>
<!-- Inicia Sección de Script -->
<script type="text/javascript">
function carga()
{    
    document.location.reload();
    document.location.reload();
}
</script>
<!-- Termina Sección de Script -->
<div class="cuerpo-cotizacion">
    <div class="centrado-inesa"> Cotización INESA
        <div class="centrado tamanio-30">
    <?php
        $estado_cotizacion = Cotizacion::model()->find(array('condition'=>'id='.$_GET['id']));
        if($estado_cotizacion->estadocotizacion_id == '4')
        {
            echo "<span class='label label-primary'>Borrador</span>";
        }
        elseif($estado_cotizacion->estadocotizacion_id == '1')
        {
            echo "<span class='label label-warning '>Proceso</span>";
        }
        elseif($estado_cotizacion->estadocotizacion_id == '2')
        {
            echo "<span class='label label-success '>Aceptada</span>";
        }
        elseif($estado_cotizacion->estadocotizacion_id == '3')
        {
            echo "<span class='label label-danger '>No Autorizada</span>";
        }
         elseif($estado_cotizacion->estadocotizacion_id == '5')
        {
            echo CHtml::image(Yii::app()->request->baseUrl."/images/cancelar.png");
        }
    ?>
            <br />
    </div>
    </div>    
    <div class="centrado-inesa1"> INGENIERÍA Y ESTUDIOS AMBIENTALES, S.A. DE C.V.</div> 
    <div class="centrado-inesa2"> SERVICIO INTEGRAL DE CONSULTRÍA AMBIENTAL Y VENTA DE EQUIPO</div> 
    <div class="url-inesa"> www.inesa.com.mx</div>
    <?php
        if($estado_folio->estadocotizacion_id == '4' || $estado_folio->estadocotizacion_id == '3' || $estado_folio->estadocotizacion_id == '2' || $estado_folio->estadocotizacion_id == '5')
        {   
            
        }
        else
        {
            $imagen = CHtml::image(Yii::app()->request->baseUrl.'/images/pdf.png');
            echo "<div class='derecha'>";
            echo CHtml::link($imagen, array('pdfproceso', 'folio'=>$_GET['folio'],'id'=>$estado_folio->id), array('target'=>'_blank'));
            echo ' </div>';
        }
    ?>          
   <?php
    if($estado_folio->estadocotizacion_id == '4')
    {
        echo "<div class='derecha'>".CHtml::link('Enviar', array('cotizacion/enviarcotizacion', 'id'=>$estado_folio->id,'folio'=>$estado_folio->colocarfolio), array('class'=>'links-naranja'))."</div>";
    }
    elseif($estado_folio->estadocotizacion_id == '1')
    {
        echo "<div class='derecha'>";
        echo CHtml::link('No autorizar ', array('cotizacion/rechazarcotizacion', 'id'=>$estado_folio->id, 'folio'=>$estado_folio->colocarfolio), array('class'=>'links-naranja'));
        echo " | ";
        echo CHtml::link(' Aceptar', array('cotizacion/aceptarcotizacion', 'id'=>$estado_folio->id, 'folio'=>$estado_folio->colocarfolio), array('class'=>'links-naranja'));
        echo "</div>";
    }
    ?>
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
                        echo "Creación de la cotización: ".$estado_cotizacion->fecha."<br />";
                        echo "Vigencia de la cotización: ".$estado_cotizacion->fechacancelacion;
                        if($estado_cotizacion->fechacancelacion <= $fecha_comparar)
                        {
                            $this->redirect(array('//cotizacion/cancelar/', 'id'=>$_GET['id'], 'folio'=>$_GET['folio']));
                        }
                    }
                ?>
            </p>
            
        </div>
    </div>
    <div>
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
    <div class="texto-adicional" id="texto-a">
         <?php
         if($estado_cotizacion->estadocotizacion_id == '4')
         {
             echo CHtml::beginForm(array('Cotizacion/textoadicional', 'folio'=>$folio, 'id'=>$_GET['id'])); 
            $this->widget('ext.redactorjs.Redactor', 
                    array( 
                        'lang'=>'en',
                        'value' => $estado_folio->textoadicional,
                        'editorOptions' => array(
                            ),
                        'model' => $estado_folio, 
                        'attribute' => 'textoadicional',
                        'name'=>'Texto'
                        )
                    );
            echo CHtml::submitButton($estado_folio->isNEwRecord ? 'Guardar Texto Adicional' : 'Guardar Texto Adicional', array('class'=>'btn'));
            echo CHtml::endForm(); 
         }
         
        ?> 
       
        </div> 
    <div>
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
        <?php
            if($estado_cotizacion->estadocotizacion_id == '1')
            {
                  echo "<th class='centrado tabla-td'>Autorizar</th>";  
            }
        ?>
        
        <th class="centrado tabla-td" width="70px">Partida</th>
        <th class="centrado tabla-td" width="50px">Área</th>
        <th class="centrado tabla-td" width="25px">Servicio</th>
        <th class="centrado tabla-td" width="500px">Descripción</th>
        <th class="centrado tabla-td">Cantidad</th>
        <th class="centrado tabla-td">Precio</th>
        <th class="centrado tabla-td">Total</th>
        <?php 
        if($estado_folio->estadocotizacion_id == '4')
        {
        ?>
        <th class="centrado tabla-td">Modificar</th>
        <?php
        }
        ?>
        
    </table>   
        <div id="myservicio">
    <table class="tamanio-celda" >
        <?php
        global $monto;
        
        $productos = Productos::model()->findAll(array('condition'=>'cotizacion_id='.$_GET['id']));
            $i=1;
            
            foreach ($productos as $key)
            {    $monto += $key->monto;
                echo "<tr>";  
                    if($estado_cotizacion->estadocotizacion_id == '1' && $key->estatus_id == '2')
                    {
                        echo "<td class='centrado'>".CHtml::checkBox('',false, 
                            array(
                            'ajax'=>array(
                            'type'=>'GET',
                            'url'=>CController::createUrl('cotizacion/ajaxcantidad/'.$key->id),
                            //'update'=>'#',
                            'succes'=>'js:carga()',
                            ),
                        #'onclick'=>'funcionautorizar()',
                        ))."</td>";
                    }
                    elseif($estado_cotizacion->estadocotizacion_id == '1' && $key->estatus_id == '1')
                    {
                        echo "<td class='centrado'><img class='imagen' src='".Yii::app()->request->baseUrl."/images/palomita.jpg'></td>";
                    }
                    echo "<td class='centrado' width='70px'>".$i++."</td>";
                    echo "<td class='centrado' width='50px'>".$key->areas->clave."</td>";
                    echo "<td class='centrado' width='25px'>".$key->servicios->servicio."</td>";
                    echo "<td class='centrado' width='500px'>".$key->servicios->observaciones."</td>";
                    if($estado_cotizacion->estadocotizacion_id == '1' && $key->estatus_id == '2')
                    {
                       echo "<td class='centrado'>".CHtml::link($key->cantidad,array('vistacotizacion', 'id'=>$id, 'folio'=>$folio, 'id_producto'=>$key->id ,'cantidades'=>$key->cantidad, 'servicio'=>$key->servicios->servicio) ,array('onclick'=>'$("#vmodal_cantidad").dialog("open"); return true;'))."</td>";
                        #echo .CHtml::link($key->cantidad, $key->cantidad, array('size'=>'4'));
                    }
                    else
                    {
                        echo "<td class='centrado'>".$key->cantidad."</td>";
                    }
                    echo "<td class='centrado'>$".  number_format($key->preciounitario, 2)."</td>";
                    echo "<td class='centrado'>$".  number_format($key->monto, 2)."</td>";
                    if($estado_folio->estadocotizacion_id == '4')
                    {
                        echo "<td class='centrado'>".CHtml::link('Quitar',array('cotizacion/borrarproducto','id_eliminar'=>$key->id, 'id'=>$id, 'folio'=>$folio))."</td>";
                    }
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
                    echo 'Descuento: %<input type="text" value="'.$model_cotizacion->descuento.'" readonly="true"><br/>';                    
                }
            }
            echo 'Subtotal: $<input type="text" value="'.  number_format($model_cotizacion->subtotal, 2).'" readonly="true"><br/>';
            echo 'IVA: $<input type="text" value="'.  number_format($model_cotizacion->iva, 2).'" readonly="true"><br/>';
            echo 'Total: $<input type="text" value="'.  number_format($model_cotizacion->total, 2).'" readonly="true">';
        ?>
    </div>
    <div>
        <hr>
        <h2 class="centrado">GARANTIAS</h2>
        <p>
            Escribir garantías ...
        </p>
        <h2 class="centrado">FORMA DE PAGO</h2>
        <p>
            <ol>
                <li>A la facturación se agregará el I.V.A.</li>
                <li>Forma de pago: <?php echo $estado_folio->formapago->formapago; ?></li>
                <li>tiempo de entrega del informe de resultados <?php echo $estado_folio->diasentrega; ?> días hábiles después de concluir los muestreos.</li>
                <li>Liquidación del servicio: días de entrega de resultados</li>
            </ol>
        </p>
        <h2 class="centrado">OBSERVACIONES</h2>
        <p>
            <ol>
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
            Los resultados del estudio se entregarán en un informe altamente confidencial, con interpretación de resultados.<br /><br />
            Sin más por el momento y en espera de vernos favorecidos con su confianza y aceptación, nos ponemos a sus apreciables
            órdenes para cualquier aclaración o comentario a la presente.
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