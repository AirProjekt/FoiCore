<?php
/* @var $this AnketaController */
/* @var $model Anketa */

$this->breadcrumbs=array(
	'Anketas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Anketa', 'url'=>array('index')),
	array('label'=>'Manage Anketa', 'url'=>array('admin')),
);
?>

<h1>Create Anketa</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>