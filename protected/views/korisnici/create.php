<?php
/* @var $this KorisniciController */
/* @var $model Korisnici */

$this->breadcrumbs=array(
	'Korisnicis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Korisnici', 'url'=>array('index')),
	array('label'=>'Manage Korisnici', 'url'=>array('admin')),
);
?>

<h1>Create Korisnici</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>