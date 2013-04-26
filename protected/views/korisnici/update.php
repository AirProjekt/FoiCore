<?php
/* @var $this KorisniciController */
/* @var $model Korisnici */

$this->breadcrumbs=array(
	'Korisnicis'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Korisnici', 'url'=>array('index')),
	array('label'=>'Create Korisnici', 'url'=>array('create')),
	array('label'=>'View Korisnici', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Korisnici', 'url'=>array('admin')),
);
?>

<h1>Update Korisnici <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>