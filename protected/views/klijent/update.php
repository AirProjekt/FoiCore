<?php
/* @var $this KlijentController */
/* @var $model Klijent */

$this->breadcrumbs=array(
	'Klijents'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Klijent', 'url'=>array('index')),
	array('label'=>'Create Klijent', 'url'=>array('create')),
	array('label'=>'View Klijent', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Klijent', 'url'=>array('admin')),
);
?>

<h1>Update Klijent <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>