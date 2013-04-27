<?php
/* @var $this AnketaController */
/* @var $model Anketa */

$this->breadcrumbs=array(
	'Anketas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Anketa', 'url'=>array('index')),
	array('label'=>'Manage Anketa', 'url'=>array('admin')),
);
?>

<?php Yii::app()->getClientScript()->registerCssFile( 
	    Yii::app()->request->baseUrl . '/css/anketa_unos.css');
      Yii::app()->clientScript->registerCoreScript('jquery');
      Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl.'/js/pitanja.js');
?>


<h1>Stvori novu anketu</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>