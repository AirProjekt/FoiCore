<?php
/* @var $this KlijentController */
/* @var $model Klijent */

$this->breadcrumbs=array(
	'Klijenti'=>array('index'),
	'Novi klijent',
);

$this->menu=array(
	array('label'=>'List Klijent', 'url'=>array('index')),
	array('label'=>'Manage Klijent', 'url'=>array('admin')),
);
?>

<h1>Novi klijent</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'modelKorisnici'=>$modelKorisnici,)); ?>