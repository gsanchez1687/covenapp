<?php

class UsersController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/column2';
    public $modulo = 'Usuarios';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
           // 'postOnly + delete', // we only allow deletion via POST request
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
                'actions'=>array('admin','delete','grafico','ahijados','carga','perfil'),
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }
    
    public function actionPerfil(){
        
        $id = Yii::app()->user->id;
        
        $model = $this->loadModel($id);
        $modelPersonas = $this->loadModelPersonas($id);
        $tempass = $model->password;
        
        if(isset($_POST['Users']) && isset($_POST['Personas'])): 
            
           
            
              $model->attributes = $_POST['Users'];
              $modelPersonas->attributes = $_POST['Personas'];    
              
              
             
               if($modelPersonas->save()){
                  
                     $this->Upload($model,'foto','/images/usuarios/','Users',FALSE); 


                $model->id = $modelPersonas->id;
                            
                        if ($_POST['Users']['password']) {
                            
                                if($_POST['Users']['password'] == $model->username):
                                     Yii::app()->user->setFlash('app',"La contraseña debe ser distinto al nombre de usuario");   
                                     $this->redirect('perfil');
                                endif;
                            
                                $pass = $model->password;
                                $model->password = md5($_POST['Users']['password']);
                        } else {
                                $model->password = $tempass;
                                $pass = '';
                               }
                               
                               
                               
                        
                        if($model->save()){                            
                          Controller::enviar($modelPersonas->correo,$pass,$model->username, $modelPersonas->nombre, $modelPersonas->apellido);
                          Controller::RegistrarLog($this->modulo,'Se ha editado un usuario');   
                          Yii::app()->user->setFlash('app',"Se han realizado los cambios");   
                          
                        }else{
                             Yii::app()->user->setFlash('app',"Error al editar la informacion");   
                        }
                    }
            
        endif;            
        
       $this->render('perfil', array(
                'model' => $model,
                'modelPersonas' => $modelPersonas,
            )); 
        
        
    }


    public function actionCarga() {

        $modelPersonas = new Personas();
        $modelUsuarios = new Users();
        if (isset($_POST['Users'])):
      
            $modelUsuarios->attributes = $_POST['Users'];

            $transaction = $modelUsuarios->dbConnection->beginTransaction();
            $fname = $_FILES['Users']['name'];
            $chk_ext = explode(".", $fname['file']);
            if (strtolower(end($chk_ext)) == "csv"):
                $filename = $_FILES['Users']['tmp_name'];
                $handle = fopen($filename['file'], "r");
                while ($data = fgetcsv($handle, 1000, ";")):  
               
                    $modelPersonas = new Personas();   
                    $modelUsuarios = new Users();                
                    $modelPersonas->nombre = $data[0];
                    $modelPersonas->segundo_nombre = $data[1];
                    $modelPersonas->apellido = $data[2];
                    $modelPersonas->segundo_apellido = $data[3];
                    $modelPersonas->correo = $data[4];
                    $modelPersonas->movil = $data[5];
                    $modelPersonas->cedula_identidad = $data[6];
                    $modelPersonas->cargo_id = $data[7];
                    $modelPersonas->estado_id = $data[8];
                    $modelPersonas->fecha_ingreso = $data[9];
                    $modelPersonas->banco = $data[10];
                    $modelPersonas->tipo_cuenta = $data[11];
                    $modelPersonas->numero_cuenta = $data[12];        
                    
                    $modelPersonas->padrino_id =  $_POST['Personas']['padrino_id'];
                    $modelPersonas->fin_padrino =  $_POST['Personas']['fin_padrino'];
                    
                    $modelPersonas->sucursal = $data[13];
                    $modelPersonas->documento = $data[14];
                    $modelPersonas->legalizacion = $data[15];
                    $modelPersonas->regimen_id = $data[16];
                    $modelPersonas->rete_fuente = $data[17];                    
                    $modelPersonas->save();     

                    $sinEncriptar = Controller::generar();             
                    $encriptada = md5($sinEncriptar);
                   
                    $modelUsuarios->id = $modelPersonas->id;
                    $modelUsuarios->rol_id = $_POST['Users']['rol_id'];
                    $modelUsuarios->persona_id = $modelPersonas->id;
                    $modelUsuarios->username = $data[18];
                    $modelUsuarios->password = $encriptada;
                    
                    $modelUsuarios->gerente_id =  $_POST['Users']['gerente_id'];
                    $modelUsuarios->coordinador_id =  $_POST['Users']['coordinador_id'];
                    
                    $modelUsuarios->save();
                 
                    Controller::enviar($modelPersonas->correo,$sinEncriptar,$modelUsuarios->username, $modelPersonas->nombre, $modelPersonas->apellido);                       
                   

                endwhile;
                fclose($handle);
                $transaction->commit();
                Yii::app()->user->setFlash('app', 'Se ha cargado '.$this->cantidad().' usuarios al sistema ');
            else:

                Yii::app()->user->setFlash('app', 'Solo debe importar archivos con la extesion CSV');

            endif;
        endif;
        $this->render('carga',array('modelUsuarios'=>$modelUsuarios,'modelPersonas'=>$modelPersonas));
    }
    
    public function cantidad(){    
           $filename = $_FILES['Users']['tmp_name'];
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

    public function actionGrafico($id){
        if (Yii::app()->authRBAC->checkAccess('mis_estadisticas')):
            
            $this->render('grafico',array('model'=>$id));
        
        endif;
    }

    public function actionView($id)    {
        if (Yii::app()->authRBAC->checkAccess('users_ver')):
            $this->render('view', array(
                'model' => $this->loadModel($id),
                'modelPersona' => $this->loadModelPersonas($id),
            ));
        endif;
    }

  
    public function actionCreate()    {
        if (Yii::app()->authRBAC->checkAccess('users_nuevo')):
        $model=new Users;
        $modelPersonas = new Personas;   
        try {        
                // Uncomment the following line if AJAX validation is needed
                // $this->performAjaxValidation($model);

                if(isset($_POST['Users']) && isset($_POST['Personas']) )
                {
                    $model->attributes=$_POST['Users'];                  
                    $modelPersonas->attributes=$_POST['Personas'];         
                    $transaction=$model->dbConnection->beginTransaction();                                        
                    $modelPersonas->estado_id = 11;
                   
                    
                    if($modelPersonas->save()){
                        $model->id = $modelPersonas->id;
                        
                        Controller::CreateUpload($model, 'foto','/images/usuarios/','usuarios', TRUE);


                        $sinEncriptar = Controller::generar();             
                        $encriptada = md5($sinEncriptar);
                        
                        $model->password = $encriptada;
                        $model->persona_id = $modelPersonas->id;                        
                        
                        if($model->save()){
                            
                            Controller::enviar($modelPersonas->correo,$sinEncriptar,$model->username, $modelPersonas->nombre, $modelPersonas->apellido);
                            Controller::RegistrarLog($this->modulo,'Se ha agregdo un usuario');                           
                            
                        }else{
                              Yii::app()->user->setFlash('app',"No se guardo el usuario");  
                              $this->redirect('create');
                        }
                        
                    }
                    
                    $transaction->commit();   
                    $this->redirect(array('view','id'=>$model->id));
                }        
        
        } catch (Exception $ex) {
          $transaction->rollBack();       
          Yii::app()->user->setFlash('app',"Hubo un problema al registrar: ".$ex); 
          $this->redirect('create');
        }

        $this->render('create',array(
            'model'=>$model,
            'modelPersonas'=>$modelPersonas,
        ));
        
        endif;
    }

 
    public function actionUpdate($id)
    {
        if (Yii::app()->authRBAC->checkAccess('users_editar')): 
            
        $model=$this->loadModel($id);
        $modelPersonas=$this->loadModelPersonas($id);       
        $tempass = $model->password;
        $tempFoto = $model->foto;
        $transaction = '';        
        
        try {

                if(isset($_POST['Users']) && isset($_POST['Personas'])) {            
                    
                    $model->attributes=$_POST['Users'];
                    $modelPersonas->attributes=$_POST['Personas'];
                    $transaction=$model->dbConnection->beginTransaction();                  
                    

                    if($modelPersonas->save()){
                        
                        $model->id = $modelPersonas->id;
                        
                        if(isset($_POST['Users']['foto'])):
                             Controller::Upload($model, 'foto','/images/usuarios/','Users', TRUE);
                        else:
                            $tempFoto;
                        endif;
                            
                        if ($_POST['Users']['password']) {
                                $pass = $model->password;
                                $model->password = md5($_POST['Users']['password']);
                        } else {
                                $model->password = $tempass;
                                $pass = '';
                               }      
                        
                        if($model->save()){                                                                           
                          Controller::enviar($modelPersonas->correo,$pass,$model->username, $modelPersonas->nombre, $modelPersonas->apellido);
                          Controller::RegistrarLog($this->modulo,'Se ha editado un usuario');                                               
                          
                        }
                    }
                    $transaction->commit();   
                    $this->redirect(array('view','id'=>$model->id));

                }
        
        } catch (Exception $ex) {
              $transaction->rollBack();                 
              Yii::app()->user->setFlash('app',"Hubo un problema al editar el usuario ".$ex);   

        }

        $this->render('update',array(
            'model'=>$model,
            'modelPersonas'=>$modelPersonas,
        ));
        
        endif;
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)    {
        if (Yii::app()->authRBAC->checkAccess('users_eliminar')):

            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                Controller::RegistrarLog($this->modulo, 'Se ha eliminado un usuario');
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }

        endif;
    }

  
    public function actionIndex()    {
        $dataProvider=new CActiveDataProvider('Users');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

  
    public function actionAhijados()
    {
        if (Yii::app()->authRBAC->checkAccess('users_admin')):
            $model = new Users('ahijados');
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['Users']))
                $model->attributes = $_GET['Users'];

            $this->render('ahijados', array(
                'model' => $model,
            ));
        endif;
    }
    
    public function actionAdmin()    {
        if (Yii::app()->authRBAC->checkAccess('users_admin')):
            $model = new Users('search');
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['Users']))
                $model->attributes = $_GET['Users'];

            $this->render('admin', array(
                'model' => $model,
            ));
        endif;
    }

   
    public function loadModel($id)
    {
        $model=Users::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
    
    public function loadModelPersonas($id)    {
        $model= Personas::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

   
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}