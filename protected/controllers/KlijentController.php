<?php

class KlijentController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
                        'modelKorisnici'=>Korisnici::model()->findByAttributes(array('id'=>$this->loadModel($id)->korisnici_id))
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Klijent;
                $modelKorisnici = new Korisnici;
//                $t1=false;
//                $t2=false;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Klijent']) && isset($_POST['Korisnici']))
		{
			$model->attributes=$_POST['Klijent'];
                        $modelKorisnici->attributes=$_POST['Korisnici'];
                        
                        $ispravno = $model->validate();
                        $ispravno = $modelKorisnici->validate() && $ispravno;
                        
                        if($ispravno)
                        {
                            $modelKorisnici->save(false);
                            $model->korisnici_id = $modelKorisnici->id;
                            $model->save(false);
                            $auth=Yii::app()->authManager;
                            $auth->assign('klijent', $model->korisnici_id);
                            Yii::app()->user->setFlash('success', "Novi klijent je uspješno dodan.");
                        }
                        
//			if($t1 && $t2)
//				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
                        'model'=>$model,
                        'modelKorisnici'=>$modelKorisnici
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
                $modelKorisnici = Korisnici::model()->findByAttributes(array('id'=>$model->korisnici_id));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Klijent']))
		{
			$model->attributes=$_POST['Klijent'];
                        $modelKorisnici->attributes=$_POST['Korisnici'];
                        
                        $ispravno = $model->validate();
                        $ispravno = $modelKorisnici->validate() && $ispravno;
                        
                        if($ispravno)
                        {
                            $model->save(false);
                            $modelKorisnici->save(false);
                            Yii::app()->user->setFlash('uspjesanUpdate', "Podaci su uspješno ažurirani.");
                        }
                        
//			if($model->save())
//				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
                        'modelKorisnici'=>$modelKorisnici,
			'model'=>$model
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
                
                $modelKorisnici = new Korisnici;
		$dataProvider=new CActiveDataProvider('Klijent');
                $this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
               
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Klijent('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Klijent']))
			$model->attributes=$_GET['Klijent'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Klijent the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Klijent::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Klijent $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='klijent-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
