<?php

class SimsController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
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
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'carga'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'transferenciasims', 'transferencia','enviarsimscard','simcardvendedores','aceptarsimcard','rechazarsimcard'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionTransferencia() {

        if (Yii::app()->authRBAC->checkAccess('sims_transferencia')):

            $usuarios = new Users;
            $model = new Sims('transferencia');
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['Sims']))
                $model->attributes = $_GET['Sims'];

            $this->render('transferencia', array(
                'model' => $model,
                'usuarios'=>$usuarios,
            ));


        endif;
    }

    public function actionCarga() {        
        $model = new Sims;
       
         if (isset($_FILES['Sims'])) {

            $model->attributes = $_POST['Sims'];
            $transaction = $model->dbConnection->beginTransaction();

            $fname = $_FILES['Sims']['name'];
            $chk_ext = explode(".", $fname['archivo']);
            if (strtolower(end($chk_ext)) == "csv"):
                $filename = $_FILES['Sims']['tmp_name'];
                $handle = fopen($filename['archivo'], "r");
                while ($data = fgetcsv($handle, 500, ";")):
                    $model = new Sims;
                    $consultausario = Users::model()->find('username = "'.$data[1].'"');   
                    if($consultausario):                        

                        $model->usuario_id = $data[1];

                        $model->estado_id = 69;
                        
                        $model->operador_id = Sims::getidoperador($data[2]);

                        $model->ccid = $data[3];

                        $fecha = strtotime($data[4]);
                        $fecha_convertida = date('Y-m-d', $fecha); 
                        $model->fecha = $fecha_convertida;                  

                        $model->save();
                    endif;

                endwhile;
                fclose($handle);
                $transaction->commit();
                Yii::app()->user->setFlash('app', 'Se ha importado ' . $this->cantidad() . ' registros');
            else:

                Yii::app()->user->setFlash('app', 'Solo debe importar archivos con la extesion CSV');

            endif;
        }

        $this->render('importarsims', array('model' => $model));
    }

    public function cantidad() {
        $filename = $_FILES['Sims']['tmp_name'];
        $archivo = fopen($filename['archivo'], "r");
        $num_lineas = 0;
        while (!feof($archivo)) {
            if ($linea = fgets($archivo)) {
                $num_lineas++;
            }
        }
        fclose($archivo);
        return $num_lineas;
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Sims;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Sims'])) {
            $model->attributes = $_POST['Sims'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Sims'])) {
            $model->attributes = $_POST['Sims'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Sims');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        if (Yii::app()->authRBAC->checkAccess('sims_admin')):
            $model = new Sims('search');
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['Sims']))
                $model->attributes = $_GET['Sims'];

            $this->render('admin', array(
                'model' => $model,
            ));

        endif;
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Sims the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Sims::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Sims $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'sims-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function ActionTransferenciasims() {

        $model = $this->loadModel($_POST['pk']);
        if ($model->estado_id == 69):

            if ($_POST['name'] === 'usuario_id'):
                $model->usuario_id = $_POST['value'];
                if ($model->save()):
                    Yii::app()->user->setFlash('app', 'Se ha enviado la sims');
                endif;
            endif;

        else:

            Yii::app()->user->setFlash('app', 'No puedes enviar sims ya usadas. Seleccione una sims Habilitada');

        endif;
    }
    
    
    public function ActionEnviarsimscard() {

        try {
            $Users_nombre = $_POST['Users_nombre'];
            $JSONSimcard = json_decode($_POST['JSONSimcard']);
            foreach ($JSONSimcard as $simcard):

                $model = $this->loadModel($simcard);
                $model->usuario_id = $Users_nombre;
                $model->estado_id = 146;
                $model->save();

            endforeach;

            header("Content-type: application/json");
            echo CJSON::encode(array('ok' => true));
        } catch (Exception $exc) {

            header("Content-type: application/json");
            echo CJSON::encode(array('ok' => false));
        }
    }
    
    
    public function actionSimcardvendedores(){
        
        if (Yii::app()->authRBAC->checkAccess('sims_vendedores')):
            $model = new Sims('search');
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['Sims']))
                $model->attributes = $_GET['Sims'];

            $this->render('simcardvendedores', array(
                'model' => $model,
            ));

        endif;
        
    }
    
    public function actionAceptarsimcard(){
        
        try {
            $JSONSimcard = json_decode($_POST['JSONSimcard']);
            foreach ($JSONSimcard as $simcard):
                $model = $this->loadModel($simcard);
                $model->estado_id = 69;
                $model->save();
            endforeach;
            
             header("Content-type: application/json");
            echo CJSON::encode(array('ok' => true));
            
        } catch (Exception $exc) {
            header("Content-type: application/json");
            echo CJSON::encode(array('ok' => false));
        }
    }
    public function actionRechazarsimcard(){
        
        try {
            $user = Yii::app()->user->id;
            $modelcoordinador = Users::model()->find('id = '.$user);
            $coordinador_id = $modelcoordinador->coordinador_id;
            $JSONSimcard = json_decode($_POST['JSONSimcard']);
            foreach ($JSONSimcard as $simcard):
                $model = $this->loadModel($simcard);
                $model->usuario_id = $coordinador_id; 
                $model->estado_id = 69;
                $model->save();
            endforeach;
            
             header("Content-type: application/json");
            echo CJSON::encode(array('ok' => true));
            
        } catch (Exception $exc) {
            header("Content-type: application/json");
            echo CJSON::encode(array('ok' => false));
        }
    }

}
