<?php
/* @var $this AnketaController */
/* @var $model Anketa */

$this->breadcrumbs=array(
	'Anketas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Anketa', 'url'=>array('index')),
	array('label'=>'Create Anketa', 'url'=>array('create')),
	array('label'=>'View Anketa', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Anketa', 'url'=>array('admin')),
);
?>

<h1>Update Anketa <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>