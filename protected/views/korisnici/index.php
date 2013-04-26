<?php
/* @var $this KorisniciController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Korisnicis',
);

$this->menu=array(
	array('label'=>'Create Korisnici', 'url'=>array('create')),
	array('label'=>'Manage Korisnici', 'url'=>array('admin')),
);
?>

<h1>Korisnicis</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
