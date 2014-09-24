<?php
	
	class PortadaController extends Controller 
	{
		public $layout = '//layouts/portada';

		public function actionIndex()
		{
			$this->render('index');
		}
	}
?>