<?php
/* @var $this KorisnikController */
/* @var $model Korisnik */

$this->breadcrumbs=array(
	'Korisnik'=>array('index'),
	$model->ime." ".$model->prezime,
);

$this->menu=array(
	array('label'=>'List Korisnik', 'url'=>array('index')),
	array('label'=>'Create Korisnik', 'url'=>array('create')),
	array('label'=>'Update Korisnik', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Korisnik', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Korisnik', 'url'=>array('admin')),
);
?>

<h1>Podaci za korisnika: "<?php echo $model->ime." ".$model->prezime; ?>"</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ime',
		'prezime',
		'telefon',
		'kljucne_rijeci',
		'tel_ank',
		'obav_mail'
	)
)); 

    $this->widget('zii.widgets.CDetailView', array(
        
        'data'=>$modelKorisnici,
        'attributes'=>array(
            'email'
        )
    ));

?>
