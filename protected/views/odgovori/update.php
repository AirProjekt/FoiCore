<?php
/* @var $this OdgovoriController */
/* @var $model Odgovori */

$this->breadcrumbs=array(
	'Odgovoris'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Odgovori', 'url'=>array('index')),
	array('label'=>'Create Odgovori', 'url'=>array('create')),
	array('label'=>'View Odgovori', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Odgovori', 'url'=>array('admin')),
);
?>

<h1>Update Odgovori <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>