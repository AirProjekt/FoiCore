<?php
/* @var $this KlijentController */
/* @var $model Klijent */

$this->breadcrumbs=array(
	'Klijents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Klijent', 'url'=>array('index')),
	array('label'=>'Manage Klijent', 'url'=>array('admin')),
);
?>

<h1>Create Klijent</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>