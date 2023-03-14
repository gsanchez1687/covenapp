<?php

class ClientesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        public $modulo = 'Clientes';

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
				'users'=>array('*'),
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
	 * Displays a particular modelCliente.
	 * @param integer $id the ID of the modelCliente to be displayed
	 */
	public function actionView($id)
	{
            if (Yii::app()->authRBAC->checkAccess('clientes_detalle')):
		$this->render('view',array(
			'modelCliente'=>$this->loadModel($id),
		));
            endif;
	}

	/**
	 * Creates a new modelCliente.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
            if (Yii::app()->authRBAC->checkAccess('clientes_crear')):
                    $modelCliente=new Clientes;
                try {
                    // Uncomment the following line if AJAX validation is needed
                       $this->performAjaxValidation($modelCliente);

                    if(isset($_POST['Clientes']))
                    {
                            $modelCliente->attributes=$_POST['Clientes'];
                            $transaction=$modelCliente->dbConnection->beginTransaction();
                            
                            $modelCliente->id = $_POST['Clientes']['numero_identidad'];
                            
                            if($_POST['Clientes']['tipo_documento'] == 72 ):
                                
                                $modelCliente->tipo_cliente = 71;
                            
                            elseif($_POST['Clientes']['tipo_documento'] == 32 || $_POST['Clientes']['tipo_documento'] == 31 ):
                                
                                 $modelCliente->tipo_cliente = 70;
                                
                            endif;
                            
                            if($modelCliente->save()){
                                    $transaction->commit();
                                    Yii::app()->user->setFlash('app', "Se ha guardado el cliente");
                                    Controller::RegistrarLog($this->modulo,'Se ha creado nuevo cliente');
                                   
                            }

                    }


                    } catch (Exception $ex) {
                        $transaction->rollBack();
                        Yii::app()->user->setFlash('app', "Hubo un problema al crear el cliente: ".$ex);                      
                    }  

                    $this->render('create',array(
                            'modelCliente'=>$modelCliente,
                    ));
            endif;    
	}

	/**
	 * Updates a particular modelCliente.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the modelCliente to be updated
	 */
	public function actionUpdate($id)
	{
            if (Yii::app()->authRBAC->checkAccess('clientes_editar')):
                    $modelCliente=$this->loadModel($id);
                try {
                    // Uncomment the following line if AJAX validation is needed
                    // $this->performAjaxValidation($modelCliente);

                    if(isset($_POST['Clientes']))
                    {
                            $modelCliente->attributes=$_POST['Clientes'];
                            $transaction=$modelCliente->dbConnection->beginTransaction();
                            if($modelCliente->save()){
                                $transaction->commit();
                                Yii::app()->user->setFlash('app', "Se ha agregado el cliente");
                                Controller::RegistrarLog($this->modulo,'Se ha modificado los datos del cliente ');
                                $this->redirect(array('view','id'=>$modelCliente->id));
                            }

                    }

                    } catch (Exception $ex) {
                        $transaction->rollBack();
                        Yii::app()->user->setFlash('app', "Hubo un problema al crear el cliente");
                        $this->redirect('update');
                    }

                    $this->render('update',array(
                            'modelCliente'=>$modelCliente,
                    ));
            endif;    
	}

	/**
	 * Deletes a particular modelCliente.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the modelCliente to be deleted
	 */
	public function actionDelete($id)
	{
            if (Yii::app()->authRBAC->checkAccess('clientes_eliminar')):
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                if(!isset($_GET['ajax'])){
                    Controller::RegistrarLog($this->modulo,'Se ha eliminado cliente');
                    $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
                }
            endif;    
			
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Clientes');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
            if (Yii::app()->authRBAC->checkAccess('clientes_admin')):
		$modelCliente=new Clientes('search');
		$modelCliente->unsetAttributes();  // clear any default values
		if(isset($_GET['Clientes']))
			$modelCliente->attributes=$_GET['Clientes'];

		$this->render('admin',array(
			'modelCliente'=>$modelCliente,
		));
            endif;    
	}

	/**
	 * Returns the data modelCliente based on the primary key given in the GET variable.
	 * If the data modelCliente is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the modelCliente to be loaded
	 * @return Clientes the loaded modelCliente
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$modelCliente=Clientes::model()->findByPk($id);
		if($modelCliente===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelCliente;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Clientes $modelCliente the modelCliente to be validated
	 */
	protected function performAjaxValidation($modelCliente)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='clientes-form')
		{
			echo CActiveForm::validate($modelCliente);
			Yii::app()->end();
		}
	}
}
