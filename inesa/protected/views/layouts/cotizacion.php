<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />
        
        <script  type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js" > </script>
        <script  type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js" > </script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo""><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php 
		$nuevo = Asesor::metodoprueba();
                
		if(Yii::app()->user->getState("nivel_acceso") == "Gerente")
		{
                 ?>
                   
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">
                          <!-- Brand and toggle get grouped for better mobile display -->
                          <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                              <span class="sr-only">Toggle navigation</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?php echo Yii::app()->user->isGuest;?>"></a>
                          </div>

                          <!-- Collect the nav links, forms, and other content for toggling -->
                          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <?php $this->widget('zii.widgets.CMenu',array(
                                'encodeLabel' => false,
                            'htmlOptions'=>array('class'=>'nav navbar-left'),
                            'items'=>array(
                                  array('label' => 'Clientes <b class="caret"></b>', 'url' => '#', 'submenuOptions' => array('class' => 'dropdown-menu'), 'items' => array(
                                  array('label' => 'Administrar Cliente', 'url'=>array('/empresa/admin'), 'visible'=>!Yii::app()->user->isGuest),
                                  array('label' => 'Administrar Sucursal', 'url'=>array('/domiciliocliente/admin'), 'visible'=>!Yii::app()->user->isGuest),    
                                  array('label' => 'Administrar Personas', 'url'=>array('/personas/admin'), 'visible'=>!Yii::app()->user->isGuest),
                                  array('label' => 'Agregar Cliente', 'url'=>array('/empresa/create'), 'visible'=>!Yii::app()->user->isGuest),
                                  array('label' => 'Agregar Sucursal', 'url'=>array('/domiciliocliente/create'), 'visible'=>!Yii::app()->user->isGuest),
                                  array('label' => 'Agregar Personas', 'url'=>array('/personas/create'), 'visible'=>!Yii::app()->user->isGuest), 
                                ),
                                  'itemOptions' => array('class' => 'dropdown'),
                                  'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
                                   ),       
                                  ),
                                )); 

                                ?>
                                <?php $this->widget('zii.widgets.CMenu',array(
                                'encodeLabel' => false,
                            'htmlOptions'=>array('class'=>'nav navbar-left'),
                            'items'=>array(
                                  array('label' => 'Cotizaciones <b class="caret"></b>', 'url' => '#', 'submenuOptions' => array('class' => 'dropdown-menu'), 'items' => array(
                                  array('label' => 'Administrar Cotizaciones', 'url' => array('/cotizacion/admin'),'visible'=>!Yii::app()->user->isGuest),
                                  array('label' => 'Crear Cotización', 'url' => array('/cotizacion/cotizar'),'visible'=>!Yii::app()->user->isGuest),
                                  #array('label' => 'Lista Usuario', 'url' => array('/usuarios/index'), 'visible'=>!Yii::app()->user->isGuest),
                                ),
                                  'itemOptions' => array('class' => 'dropdown'),
                                  'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
                                   ),       
                                  ),
                                )); 

                                ?>
                                <?php $this->widget('zii.widgets.CMenu',array(
                                'encodeLabel' => false,
                            'htmlOptions'=>array('class'=>'nav navbar-left'),
                            'items'=>array(
                                  array('label' => 'OA <b class="caret"></b>', 'url' => '#', 'submenuOptions' => array('class' => 'dropdown-menu'), 'items' => array(
                                  array('label' => 'Orden de Trabajo', 'url' => array('/cotizacion/admin_ot'),'visible'=>!Yii::app()->user->isGuest),
                                  array('label' => 'Administrar Consumibles', 'url' => array('/consumible/admin'),'visible'=>!Yii::app()->user->isGuest),
                                  #array('label' => 'Lista Consumibles', 'url' => array('/consumible/index'), 'visible'=>!Yii::app()->user->isGuest),
                                ),
                                  'itemOptions' => array('class' => 'dropdown'),
                                  'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
                                   ),       
                                  ),
                                )); 

                                ?>

                                <?php $this->widget('zii.widgets.CMenu',array(
                                'encodeLabel' => false,
                            'htmlOptions'=>array('class'=>'nav navbar-left'),
                            'items'=>array(
                                  array('label' => 'Servicios <b class="caret"></b>', 'url' => '#', 'submenuOptions' => array('class' => 'dropdown-menu'), 'items' => array(
                                  array('label' => 'Administrar Áreas', 'url' => array('/areas/admin'),'visible'=>!Yii::app()->user->isGuest),
                                  array('label' => 'Administrar Servicios', 'url' => array('/servicios/admin'),'visible'=>!Yii::app()->user->isGuest),
                                  array('label' => 'Alta Área', 'url' => array('/areas/create'),'visible'=>!Yii::app()->user->isGuest),
                                  array('label' => 'Alta Servicios', 'url' => array('/servicios/create'),'visible'=>!Yii::app()->user->isGuest),
                                ),
                                  'itemOptions' => array('class' => 'dropdown'),
                                  'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
                                   ),       
                                  ),
                                )); 

                                ?>
                                
                              <?php $this->widget('zii.widgets.CMenu',array(
                                'encodeLabel' => false,
                            'htmlOptions'=>array('class'=>'nav navbar-left'),
                            'items'=>array(
                                  array('label' => 'Autorizar '.$nuevo, 'url' => array('/asesor/activar'), 'visible'=>!Yii::app()->user->isGuest,                                
                                )))); 
                                ?>

                              <?php $this->widget('zii.widgets.CMenu',array(
                                'encodeLabel' => false,
                            'htmlOptions'=>array('class'=>'nav navbar-right'),
                            'items'=>array(
                              array('label'=>'Salir ('.Yii::app()->user->name.')',  'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                            ),
                          )); ?>
                              </li>
                            </ul>
                          </div><!-- /.navbar-collapse -->
                        </div ><!-- /.container-fluid -->
                        </nav>
                                          
                                          <?php
                                         
                                      }
                                      elseif(Yii::app()->user->getState("nivel_acceso") == "Ventas" || Yii::app()->user->getState("persona") == "administrador")
                                      {
                                       ?>
                                          <nav class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">
                          <!-- Brand and toggle get grouped for better mobile display -->
                          <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                              <span class="sr-only">Toggle navigation</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?php echo Yii::app()->user->isGuest;?>"></a>
                          </div>

                          <!-- Collect the nav links, forms, and other content for toggling -->
                          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <?php $this->widget('zii.widgets.CMenu',array(
                                'encodeLabel' => false,
                            'htmlOptions'=>array('class'=>'nav navbar-left'),
                            'items'=>array(
                                  array('label' => 'Clientes <b class="caret"></b>', 'url' => '#', 'submenuOptions' => array('class' => 'dropdown-menu'), 'items' => array(
                                  array('label' => 'Administrar Cliente', 'url'=>array('/empresa/admin'), 'visible'=>!Yii::app()->user->isGuest),
                                  array('label' => 'Administrar Sucursal', 'url'=>array('/domiciliocliente/admin'), 'visible'=>!Yii::app()->user->isGuest),    
                                  array('label' => 'Administrar Personas', 'url'=>array('/personas/admin'), 'visible'=>!Yii::app()->user->isGuest),
                                  array('label' => 'Agregar Cliente', 'url'=>array('/empresa/create'), 'visible'=>!Yii::app()->user->isGuest),
                                  array('label' => 'Agregar Sucursal', 'url'=>array('/domiciliocliente/create'), 'visible'=>!Yii::app()->user->isGuest),
                                  array('label' => 'Agregar Personas', 'url'=>array('/personas/create'), 'visible'=>!Yii::app()->user->isGuest), 
                                ),
                                  'itemOptions' => array('class' => 'dropdown'),
                                  'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
                                   ),       
                                  ),
                                )); 

                                ?>
                                <?php $this->widget('zii.widgets.CMenu',array(
                                'encodeLabel' => false,
                            'htmlOptions'=>array('class'=>'nav navbar-left'),
                            'items'=>array(
                                  array('label' => 'Cotizaciones <b class="caret"></b>', 'url' => '#', 'submenuOptions' => array('class' => 'dropdown-menu'), 'items' => array(
                                  array('label' => 'Administrar Cotizaciones', 'url' => array('/cotizacion/admin'),'visible'=>!Yii::app()->user->isGuest),
                                  array('label' => 'Crear Cotización', 'url' => array('/cotizacion/cotizar'),'visible'=>!Yii::app()->user->isGuest),
                                  #array('label' => 'Lista Usuario', 'url' => array('/usuarios/index'), 'visible'=>!Yii::app()->user->isGuest),
                                ),
                                  'itemOptions' => array('class' => 'dropdown'),
                                  'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
                                   ),       
                                  ),
                                )); 

                                ?>
                                <?php $this->widget('zii.widgets.CMenu',array(
                                'encodeLabel' => false,
                            'htmlOptions'=>array('class'=>'nav navbar-left'),
                            'items'=>array(
                                  array('label' => 'OA <b class="caret"></b>', 'url' => '#', 'submenuOptions' => array('class' => 'dropdown-menu'), 'items' => array(
                                  array('label' => 'Orden de Trabajo', 'url' => array('/cotizacion/admin_ot'),'visible'=>!Yii::app()->user->isGuest),
                                  array('label' => 'Administrar Consumibles', 'url' => array('/consumible/admin'),'visible'=>!Yii::app()->user->isGuest),
                                  #array('label' => 'Lista Consumibles', 'url' => array('/consumible/index'), 'visible'=>!Yii::app()->user->isGuest),
                                ),
                                  'itemOptions' => array('class' => 'dropdown'),
                                  'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
                                   ),       
                                  ),
                                )); 

                                ?>

                                <?php $this->widget('zii.widgets.CMenu',array(
                                'encodeLabel' => false,
                            'htmlOptions'=>array('class'=>'nav navbar-left'),
                            'items'=>array(
                                  array('label' => 'Servicios <b class="caret"></b>', 'url' => '#', 'submenuOptions' => array('class' => 'dropdown-menu'), 'items' => array(
                                  array('label' => 'Administrar Áreas', 'url' => array('/areas/admin'),'visible'=>!Yii::app()->user->isGuest),
                                  array('label' => 'Administrar Servicios', 'url' => array('/servicios/admin'),'visible'=>!Yii::app()->user->isGuest),
                                  array('label' => 'Alta Área', 'url' => array('/areas/create'),'visible'=>!Yii::app()->user->isGuest),
                                  array('label' => 'Alta Servicios', 'url' => array('/servicios/create'),'visible'=>!Yii::app()->user->isGuest),
                                ),
                                  'itemOptions' => array('class' => 'dropdown'),
                                  'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
                                   ),       
                                  ),
                                )); 

                                ?>
                                

                              <?php $this->widget('zii.widgets.CMenu',array(
                                'encodeLabel' => false,
                            'htmlOptions'=>array('class'=>'nav navbar-right'),
                            'items'=>array(
                              array('label'=>'Salir ('.Yii::app()->user->name.')',  'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                            ),
                          )); ?>
                              </li>
                            </ul>
                          </div><!-- /.navbar-collapse -->
                        </div ><!-- /.container-fluid -->
                        </nav>
                                       <?php
                                      }
                                      ?>
            
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	

	<div class="clear"></div>

	

</div><!-- page -->
<div>
    <?php echo $content; ?>
    
    <div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
    </div><!-- footer -->
</div>
</body>
</html>
