<?php
/* @var $this KlijentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Klijents',
);

$this->menu=array(
	array('label'=>'Create Klijent', 'url'=>array('create')),
	array('label'=>'Manage Klijent', 'url'=>array('admin')),
);
?>

<h1>Klijents</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
