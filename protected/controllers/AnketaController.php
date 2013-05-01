<?php

class AnketaController extends Controller
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
				'actions'=>array('index','view','formUnos'),
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
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
            
		$model=new Anketa;
                $modelPitanja;
                $modelOdgovori;
                $themesArray = $model->getThemeNames();
                if(empty($themesArray)){
                    throw new CHttpException(404,'Nije unesena niti jedna tema u sustav!');
                }
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

                if(!empty($_POST)) {
                  $flag = false;
                    foreach ($_POST as $key => $value) {
                        if(empty($value)){
                            Yii::app ()->user->setFlash ('fail', 'Ne smijete imati prazno polje');
                            $flag = true;
                        }
                    }
                    if(!$flag){
                        $idTeme;
                        foreach ($_POST as $key => $value) {
//                            $this->render('debug', array('idTeme'=>strpos($key, 'odgo')));
                            if (strpos($key, 'nazivTeme') !== false) {
                                $idTeme = $value;
//                                $this->render('debug', array('idTeme'=>$idTeme));
                            }
                            elseif (strpos($key, 'naziv_ankete') !== false) {
                                
                                $model->naziv = $value;
                                $model->tema_id = $idTeme;
                                
                                $model->klijent_id = 1;//Yii::app()->session['idKorisnika'];
                                $model->datum = new CDbExpression('NOW()');
                                $model->save(false);
//                                $this->render('debug', array('idTeme'=>$model->klijent_id));
                            }
                            elseif (strpos($key, 'pit_nas') !== false) {
//                                $this->render('debug', array('idTeme'=>$value));
                                $modelPitanja = new Pitanja;
                                $modelPitanja->naziv = $value;
                                $modelPitanja->anketa_id = $model->id;
                            }
                            elseif (strpos($key, 'pit_tip') !== false) {
//                                $this->render('debug', array('idTeme'=>$value));
                                $modelPitanja->tip = $value;
                                $modelPitanja->save();
                            }
                            elseif (strpos($key, 'odgo_') !== false) {
//                                $this->render('debug', array('idTeme'=>$value));
                                $modelOdgovori = new Odgovori;
                                $modelOdgovori->naziv = $value;
                                $modelOdgovori->pitanja_id = $modelPitanja->id;
                                $modelOdgovori->save();
                            }
                            else {
                                $this->redirect(array('view','id'=>$model->id));
                            }
                        }
                    }
                }
		$this->render('create',array(
			'model'=>$model,
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Anketa']))
		{
			$model->attributes=$_POST['Anketa'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
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
		$dataProvider=new CActiveDataProvider('Anketa');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Anketa('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Anketa']))
			$model->attributes=$_GET['Anketa'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        
        public function actionFormUnos($id) {
            
            $model = $this->loadModel($id);
            $modelOdgovori = new Odgovori;
            
            if(isset($_POST['Odgovori']))
            {
                if(!is_array($_POST['Odgovori']['pitanja_id']))
                {
                    $modelOdgovori->attributes = $_POST['Odgovori']['pitanja_id'];
                    $modelOdgovori->validate();
                }
            }
            
            //if(!isset($_POST['Pitanja[naziv]']))
            Yii::app()->user->setFlash ('poruka', 'Morate ispuniti svako pitanje!');
            
            $this->render('formUnos',array('model'=>$model,'modelOdgovori'=>$modelOdgovori));
        }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Anketa the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Anketa::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Anketa $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='anketa-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
