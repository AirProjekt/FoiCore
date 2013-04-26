<?php
/* @var $this PitanjaController */
/* @var $model Pitanja */

$this->breadcrumbs=array(
	'Pitanjas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Pitanja', 'url'=>array('index')),
	array('label'=>'Create Pitanja', 'url'=>array('create')),
	array('label'=>'Update Pitanja', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pitanja', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pitanja', 'url'=>array('admin')),
);
?>

<h1>View Pitanja #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'naziv',
		'tip',
		'anketa_id',
	),
)); ?>
