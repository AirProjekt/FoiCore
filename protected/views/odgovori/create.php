<?php
/* @var $this OdgovoriController */
/* @var $model Odgovori */

$this->breadcrumbs=array(
	'Odgovoris'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Odgovori', 'url'=>array('index')),
	array('label'=>'Manage Odgovori', 'url'=>array('admin')),
);
?>

<h1>Create Odgovori</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>