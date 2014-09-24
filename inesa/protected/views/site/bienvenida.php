<?php
	if(Yii::app()->user->getState("id"))
	{
	$nombreCompleto = Personas::model()->find('id='.Yii::app()->user->getState("id"));	
?>	

<h2 class="centrado">Bienvenido <?php echo "<span class='txt-negro'>".$nombreCompleto->nombre." ".$nombreCompleto->apellido_pateno." ".$nombreCompleto->apellido_materno."<br> </span>"; ?></h2>
<h2 class="centrado"> Cargo: <?php echo "<span class='txt-negro'>".$nombreCompleto->cargo->cargo." </span>";?></h2>

<?php 
} 
else
{
?>
	<h2 class="centrado">Bienvenido <?php echo "<span class='txt-negro'>".Yii::app()->user->getState("persona")."<br> </span>"; ?></h2>
	<h2 class="centrado"> Cargo: <?php echo "<span class='txt-negro'>".Yii::app()->user->getState("persona")." </span>";?></h2>
<?php } ?>
