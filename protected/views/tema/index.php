<?php
/* @var $this TemaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Teme',
);

$this->menu=array(
	array('label'=>'Create Tema', 'url'=>array('create')),
	array('label'=>'Manage Tema', 'url'=>array('admin')),
);
?>

<h1>Teme</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
