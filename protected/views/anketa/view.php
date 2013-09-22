<?php
/* @var $this AnketaController */
/* @var $model Anketa */

$this->breadcrumbs=array(
	'Anketas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Anketa', 'url'=>array('index')),
	array('label'=>'Create Anketa', 'url'=>array('create')),
	array('label'=>'Update Anketa', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Anketa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Anketa', 'url'=>array('admin')),
);
?>

<h1>View Anketa #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'naziv',
		'datum',
		'tema_id',
		'klijent_id',
	),
)); ?>
