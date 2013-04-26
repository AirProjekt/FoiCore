<?php
/* @var $this OdgovoriController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Odgovoris',
);

$this->menu=array(
	array('label'=>'Create Odgovori', 'url'=>array('create')),
	array('label'=>'Manage Odgovori', 'url'=>array('admin')),
);
?>

<h1>Odgovoris</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
