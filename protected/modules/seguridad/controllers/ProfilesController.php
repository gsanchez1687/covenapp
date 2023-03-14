<?php

class ProfilesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
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
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
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
              if(Yii::app()->authRBAC->checkAccess('ver_perfil')):
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
              
               else: 
                      $log = new Logs();
                      $log->user_id = Yii::app()->user->id;
                      $log->description = "Usuario ha tratado de accesar a un lugar restringido<br/>Modulo: <b>Perfiles</b>Accion:<b>CREAR</b>.";
                      $log->ip = $_SERVER['REMOTE_ADDR'];
                      $log->date = date("Y-m-d H:i:s");                     
                      $log->language = Yii::app()->language;
                      $log->save();
               
                    throw new CHttpException(403,'Su usuario no tiene los privilegios necesarios para acceder a esta seccion, 
                    porfavor si cree que esto es un error, consulte al administrador del sistema.<br/>
                    Este evento ha sido registrado.');
             
             endif; 
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
            
                if(Yii::app()->authRBAC->checkAccess('crear_perfil')):
		$model=new Profiles;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Profiles']))
		{
			$model->attributes=$_POST['Profiles'];
			if($model->save())
                                Yii::app()->user->setFlash('success',"Datos grabados correctamente!");
				$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
                
              else: 
                  $log = new Logs();
                      $log->user_id = Yii::app()->user->id;
                      $log->description = "Usuario ha tratado de accesar a un lugar restringido<br/>Modulo: <b>Perfiles</b>Accion:<b>CREAR</b>.";
                      $log->ip = $_SERVER['REMOTE_ADDR'];
                      $log->date = date("Y-m-d H:i:s");                     
                      $log->language = Yii::app()->language;
                      $log->save();
              
                   throw new CHttpException(403,'Su usuario no tiene los privilegios necesarios para acceder a esta seccion, 
                    porfavor si cree que esto es un error, consulte al administrador del sistema.<br/>
                    Este evento ha sido registrado.');
             
             endif; 
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
            if(Yii::app()->authRBAC->checkAccess('editar_perfil')):
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Profiles']))
		{
			$model->attributes=$_POST['Profiles'];
			if($model->save())
                                 Yii::app()->user->setFlash('success',"Datos grabados correctamente!");
				$this->redirect(array('admin'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
                
                  else: 
                      $log = new Logs();
                      $log->user_id = Yii::app()->user->id;
                      $log->description = "Usuario ha tratado de accesar a un lugar restringido<br/>Modulo: <b>Perfiles</b>Accion:<b>EDITAR</b>.";
                      $log->ip = $_SERVER['REMOTE_ADDR'];
                      $log->date = date("Y-m-d H:i:s");                     
                      $log->language = Yii::app()->language;
                      $log->save();
                  
                   throw new CHttpException(403,'Su usuario no tiene los privilegios necesarios para acceder a esta seccion, 
                    porfavor si cree que esto es un error, consulte al administrador del sistema.<br/>
                    Este evento ha sido registrado.');
             
             endif; 
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
		$dataProvider=new CActiveDataProvider('Profiles');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
            if(Yii::app()->authRBAC->checkAccess('admin_perfil')):
		$model=new Profiles('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Profiles']))
			$model->attributes=$_GET['Profiles'];

		$this->render('admin',array(
			'model'=>$model,
		));
                
              else: 
                  $log = new Logs();
                      $log->user_id = Yii::app()->user->id;
                      $log->description = "Usuario ha tratado de accesar a un lugar restringido<br/>Modulo: <b>Perfiles</b>Accion:<b>ADMIN</b>.";
                      $log->ip = $_SERVER['REMOTE_ADDR'];
                      $log->date = date("Y-m-d H:i:s");                     
                      $log->language = Yii::app()->language;
                      $log->save();
              
                   throw new CHttpException(403,'Su usuario no tiene los privilegios necesarios para acceder a esta seccion, 
                    porfavor si cree que esto es un error, consulte al administrador del sistema.<br/>
                    Este evento ha sido registrado.');
             
             endif; 
	}
        
        

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Profiles the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Profiles::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Profiles $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='profiles-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
