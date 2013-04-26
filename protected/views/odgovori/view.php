<?php
/* @var $this OdgovoriController */
/* @var $model Odgovori */

$this->breadcrumbs=array(
	'Odgovoris'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Odgovori', 'url'=>array('index')),
	array('label'=>'Create Odgovori', 'url'=>array('create')),
	array('label'=>'Update Odgovori', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Odgovori', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Odgovori', 'url'=>array('admin')),
);
?>

<h1>View Odgovori #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'naziv',
		'pitanja_id',
	),
)); ?>
