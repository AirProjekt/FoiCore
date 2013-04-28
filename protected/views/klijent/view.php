<?php
/* @var $this KlijentController */
/* @var $model Klijent */

$this->breadcrumbs=array(
	'Klijenti'=>array('index'),
	$model->ime,
);

$this->menu=array(
	array('label'=>'List Klijent', 'url'=>array('index')),
	array('label'=>'Create Klijent', 'url'=>array('create')),
	array('label'=>'Update Klijent', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Klijent', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Klijent', 'url'=>array('admin')),
);
?>

<h1>View Klijent #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'naziv',
		'adresa',
		'OIB',
		'kontakt_osoba',
		'telefon',
		'mobitel',
		'ostalo',
		'korisnici_id',
	),
)); ?>
