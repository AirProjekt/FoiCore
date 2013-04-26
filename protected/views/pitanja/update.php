<?php
/* @var $this PitanjaController */
/* @var $model Pitanja */

$this->breadcrumbs=array(
	'Pitanjas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pitanja', 'url'=>array('index')),
	array('label'=>'Create Pitanja', 'url'=>array('create')),
	array('label'=>'View Pitanja', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Pitanja', 'url'=>array('admin')),
);
?>

<h1>Update Pitanja <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>