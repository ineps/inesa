<?php
  echo CHtml::beginForm(); 
  
    echo "Descuento: ";
    echo CHtml::activeTextField($model,'descuento', array('size'=>5));
    
    echo CHtml::activeHiddenField($model,'id',array('value'=>$_GET['id']));
    echo CHtml::activeHiddenField($model,'folio', array('value'=>$_GET['folio']));
    echo CHtml::submitButton('%', array('submit'=>array('cotizacion/descuento'))); 
  
  echo CHtml::endForm(); 
?>
