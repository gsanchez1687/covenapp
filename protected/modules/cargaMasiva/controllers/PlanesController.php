<?php

class PlanesController extends Controller
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
				'actions'=>array('create','update','carga'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
        
        public function actionCarga(){
          
        if (Yii::app()->authRBAC->checkAccess('planes_carga')):    
            try {            
              
                $model=new Planes;

                 if(isset($_FILES['Planes'])){
                       
                              $model->attributes=$_POST['Planes'];
                              $transaction=$model->dbConnection->beginTransaction();

                               $fname = $_FILES['Planes']['name']; 
                               $chk_ext = explode(".",$fname['file']);
                               if(strtolower(end($chk_ext)) == "csv"):
                                   $filename = $_FILES['Planes']['tmp_name'];
                                   $handle = fopen($filename['file'], "r");                            
                                     while ($data = fgetcsv($handle,500,";")):                                          
                                         $modelPlanes = new Planes;                                 
                                         $modelPlanes->nombre = $data[0];
                                         $modelPlanes->valor = $data[1];                                      
                                         $modelPlanes->operador_id = $_POST['Planes']['operador_id'];                                        
                                         $modelPlanes->fecha_vigencia = $_POST['Planes']['fecha_vigencia'];     
                                         $modelPlanes->fecha_vencimiento = $_POST['Planes']['fecha_vencimiento'];     
                                         $modelPlanes->save();

                                     endwhile;
                                     fclose($handle);
                                     $transaction->commit();
                                     Yii::app()->user->setFlash('app','Se ha importado '.$this->().' registros');                                
                              else:

                                Yii::app()->user->setFlash('app','Solo debe importar archivos con la extesion CSV');  

                               endif;

                      }
                
                } catch (Exception $e) {
                      $transaction->rollBack();
                      Yii::app()->user->setFlash('app','Error en la carga masiva. Revice el archivo .csv');  
                } 
         
            $this->render('carga',array(
			'model'=>$model,
		));
        endif;    
        }

        /**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
            if (Yii::app()->authRBAC->checkAccess('planes_crear')):   
		$model=new Planes;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Planes']))
		{
			$model->attributes=$_POST['Planes'];
                        
                        if($model->save())                              
                               $this->redirect(array('view','id'=>$model->id));                        	
		}

		$this->render('create',array(
			'model'=>$model,
		));
            endif;    
	}
        
        public function operadorAID($data){
            $valor = '';
            
            switch (strtolower($data)):
                case 'etb':         $valor = '54'; break;
                case 'mov m':       $valor = '3'; break;
                case 'movistar m':  $valor = '3'; break;
                case 'claro':       $valor = '6'; break;
                case 'claro m':     $valor = '2'; break;
                case 'claro f':     $valor = '6'; break;
                case 'ava i':       $valor = '4'; break;
                case 'avantel':     $valor = '4'; break;
                case 'etb m c':     $valor = '1'; break;
                case 'etb f n':     $valor = '5'; break;
                case 'etb m':       $valor = '1'; break;
                case 'dtv':         $valor = '8'; break; 
                default:            $valor = '56';
            endswitch;
            
            return $valor;
            
        }

        /**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
            if (Yii::app()->authRBAC->checkAccess('planes_editar')):   
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Planes']))
		{
			$model->attributes=$_POST['Planes'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
            endif;    
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
             if (Yii::app()->authRBAC->checkAccess('planes_eliminar')):   
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            endif;    
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Planes');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
            if (Yii::app()->authRBAC->checkAccess('planes_admin')):   
		$model=new Planes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Planes']))
			$model->attributes=$_GET['Planes'];

		$this->render('admin',array(
			'model'=>$model,
		));
            endif;    
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Planes the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Planes::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Planes $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='planes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
         public function cantidad(){    
           $filename = $_FILES['Planes']['tmp_name'];
           $archivo = fopen($filename['file'], "r");
            $num_lineas = 0;
            while (!feof ($archivo)) {                
                if ($linea = fgets($archivo)){                  
                   $num_lineas++;
                }
            }
            fclose ($archivo);           
            return $num_lineas;
        }
}
