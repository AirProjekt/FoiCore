<?php
/* @var $this KlijentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Klijenti',
);

$this->menu=array(
	array('label'=>'Dodavanje novog klijenta', 'url'=>array('create')),
	array('label'=>'Manage Klijent', 'url'=>array('admin')),
);
?>

<h1>Klijenti</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
