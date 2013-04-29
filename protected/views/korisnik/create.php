<?php
/* @var $this KorisnikController */
/* @var $model Korisnik */

$this->breadcrumbs=array(
	'Korisnici'=>array('index'),
	'Registracija',
);

$this->menu=array(
	array('label'=>'List Korisnik', 'url'=>array('index')),
        array('label'=>'Manage Korisnik', 'url'=>array('admin'))
);
?>

<h1>Registracija</h1>

<?php echo $this->renderPartial('_form', array('modelKorisnici'=>$modelKorisnici, 'model'=>$model)); ?>