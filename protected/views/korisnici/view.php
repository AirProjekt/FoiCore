<?php
/* @var $this KorisniciController */
/* @var $model Korisnici */

$this->breadcrumbs=array(
	'Korisnicis'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Korisnici', 'url'=>array('index')),
	array('label'=>'Create Korisnici', 'url'=>array('create')),
	array('label'=>'Update Korisnici', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Korisnici', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Korisnici', 'url'=>array('admin')),
);
?>

<h1>View Korisnici #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'email',
		'lozinka',
	),
)); ?>
