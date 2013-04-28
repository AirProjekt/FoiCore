<?php
/* @var $this KlijentController */
/* @var $model Klijent */

$this->breadcrumbs=array(
	'Klijenti'=>array('index'),
	$model->naziv=>array('view','id'=>$model->id),
	'Ažuriranje podataka o klijentu',
);

$this->menu=array(
	array('label'=>'List Klijent', 'url'=>array('index')),
	array('label'=>'Create Klijent', 'url'=>array('create')),
	array('label'=>'View Klijent', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Klijent', 'url'=>array('admin')),
);
?>

<h1>Ažuriranje podataka o klijentu: "<?php echo $model->naziv; ?>"</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelKorisnici'=>$modelKorisnici)); ?>