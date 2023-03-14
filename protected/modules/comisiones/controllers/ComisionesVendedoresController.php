<?php

class ComisionesVendedoresController extends Controller {

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
                'users' => array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'comision'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionComision() {

        $ComisionFechas = new Ventas();   

        if (Yii::app()->request->getPost('yt1') == 'Generar'):   
            
            
           if(Yii::app()->request->getPost('Fecha_inicio') == '' || Yii::app()->request->getPost('Fecha_fin') == ''  ):
               
                Yii::app()->user->setFlash('app', "Primero debe de seleccionar las fechas de inicio y fin");
               
           else:   
                $operador = $_POST['Ventas']['id'];
                if($operador == ''):
                     Yii::app()->user->setFlash('app', "Debe de seleccionar el operador para generar la comision");
                
            else:
                    
                    $operador = $_POST['Ventas']['id'];
                    switch ($operador):

                    case 1: $this->EtbMovil();
                        break;
                    case 2: $this->ClaroMovil();
                        break;
                    case 3: $this->MovistarMovil();
                        break;
                    case 4: $this->Avantel();
                        break;
                    case 5: $this->EtbFija();
                        break;
                    case 6: $this->ClaroFija();
                        break;
                    case 7: $this->MovistarFija();
                        break;
                    case 8: $this->Directv();
                        break;
                endswitch;
               
                endif;
                
           endif; 
          
       
        endif;
       
        
        if (isset($_POST)):
            
            if( isset( $_POST['Fecha_inicio'] ) && isset( $_POST['Fecha_fin'] ) && $_POST['Ventas']['id'] == ''  ):
                  Yii::app()->user->setFlash('app', "Se ha filtrado por fechas desde ".$_POST['Fecha_inicio'].' Hasta '.$_POST['Fecha_fin'].' para todos los operadores');
            
            elseif(  isset( $_POST['Fecha_inicio'] ) && isset( $_POST['Fecha_fin'] ) &&  isset( $_POST['Ventas']['id'] ) ):                
            
                Yii::app()->user->setFlash('app', "Se ha filtrado por fechas desde ".$_POST['Fecha_inicio'].' Hasta '.$_POST['Fecha_fin'].' para el operador '.Ventas::getOperadorDonanteNombre($_POST['Ventas']['id']));            
           
            endif;
           
            
        endif;


        $this->render('comision', array('ComisionFechas' => $ComisionFechas));
    }
    
     public function Avantel() {

        try {         
            $Fecha_inicio = Yii::app()->request->getPost('Fecha_inicio');
            $Fecha_fin = Yii::app()->request->getPost('Fecha_fin');
            $operador = $_POST['Ventas']['id'];
            $movil = Yii::app()->params['movil'];


            $getEstadoVentas = Ventas::getEstadoVentas();
            $completado = $getEstadoVentas[36];
            $legalizado = $getEstadoVentas[43];
            $fueraCorte = $getEstadoVentas[42];
            
            $consultaVentasVariables = VentasVariables::model()->find();           
           
            /*Esta funcion devuelve aquellas ventas cuyas operaciones y fechas sean las apropiadas*/
            $getVentasComisionesmovil = ComisionesVendedores::getVentasComisiones($Fecha_inicio, $Fecha_fin, $movil, $operador);
            
            foreach ($getVentasComisionesmovil as $datos):

                        $incumplimientoLegalizacion = ComisionesVendedores::IncumplimientoLegalizacion($datos->fecha_activacion, $datos->fecha_legalizacion);

                        $convertir = ComisionesVendedores::PrimerPaso($datos->plan->valor, $consultaVentasVariables->iva_consumo_total);

                        $resultado1 = str_replace(',', '', $convertir);

                        $resultado2 = ComisionesVendedores::SegundoPaso($resultado1, $consultaVentasVariables->avantel_conexcel);

                        $resultado3 = ComisionesVendedores::tercerPaso($resultado1, $consultaVentasVariables->base_comision_avantel);

                        $CuartoPaso = ComisionesVendedores::CuartoPaso($resultado3, $consultaVentasVariables->comision_tradicional1);

                        $resultado4 = round($CuartoPaso, 0, PHP_ROUND_HALF_DOWN);

                        if ($datos->vendedor->persona->cargo_id = 57 || $datos->vendedor->persona->cargo_id == 59 || $datos->vendedor->persona->cargo_id == 58 || $datos->vendedor->persona->cargo_id == 57):
                            $valor = 0.05;
                            $QuintoPaso = ComisionesVendedores::QuintoPaso($resultado4, $valor);
                            $resultado5 = round($QuintoPaso, 0, PHP_ROUND_HALF_DOWN);

                        endif;

                        $resultado6 = ComisionesVendedores::SextoPaso($resultado4, $resultado5);

                        $resultado7 = ComisionesVendedores::OctavoPaso($datos->vendedor->persona->rete_fuente, $datos->vendedor->persona->regimen_id, $resultado6);

                        $resultado8 = ComisionesVendedores::NovenoPaso($datos->vendedor->persona->sucursal, $resultado6, $consultaVentasVariables->reteica);

                        $resultado9 = ComisionesVendedores::DecimoPaso($datos->vendedor->persona->regimen_id, $resultado6, $consultaVentasVariables->iva);

                        $resultado10 = ComisionesVendedores::Undecimo($resultado6, $resultado7, $resultado8, $incumplimientoLegalizacion, $resultado9);

                        $modelComisionesVendedores = new ComisionesVendedores();
                        $modelComisionesVendedores->venta_id = $datos->id;
                        $modelComisionesVendedores->revenue = $resultado1;
                        $modelComisionesVendedores->comision_conexcel = $resultado2;
                        $modelComisionesVendedores->base_comision = $resultado3;
                        $modelComisionesVendedores->comision_inicial = $resultado4;
                        $modelComisionesVendedores->fondo = $resultado5;
                        $modelComisionesVendedores->comision_menos_fondo = $resultado6;
                        $modelComisionesVendedores->rete_fuente = $resultado7;
                        $modelComisionesVendedores->reteica = $resultado8;
                        $modelComisionesVendedores->iva = $resultado9;
                        $modelComisionesVendedores->precomision = $resultado10;
                        $modelComisionesVendedores->incumplimiento_legalizacion = $incumplimientoLegalizacion;
                        $modelComisionesVendedores->liquidacion = $this->generarliquidacion($operador, '_TRADICIONAL_DEL_', $Fecha_inicio, '_A_', $Fecha_fin);
                        $modelComisionesVendedores->save();
//
                        Ventas::ComprobantePagosTotalizados($modelComisionesVendedores->venta_id, $resultado4, $resultado5, $resultado6, $resultado7, $resultado8);

                        /* CONSULTO LAS VENTAS PARA LUEGO CAMBIAR EL ESTADO A PRELIQUIDADAS */
                        $modelVentas = $this->loadModelVentas($datos->id);
                        $modelVentas->estado_id = 47;  /* preliquidada */
                        if($modelVentas->save()):
                             Yii::app()->user->setFlash('app', "Se ha  realizado con exito");
                        endif;
                       
     
            endforeach;
            
        } catch (Exception $exc) {

            Yii::app()->user->setFlash('app', "ERROR AL GENERAR LA COMISION: " . $exc);
        }
    }
    
    public function autoincrementoradicadorliquidacion($operador, $texto1, $fecha_inicio, $texto2, $fecha_fin) {


        $criterio = new CDbCriteria();
        $criterio->select = "max(liquidacion) liquidacion ";
        $models = ComisionesVendedores::model()->findAll($criterio);


        foreach ($models as $data):

            if ($data->liquidacion == null):
                $codigo = Ventas::getOperadorDonanteNombre($operador) . $texto1 . $fecha_inicio . $texto2 . $fecha_fin;

            else:
                $var = $data->liquidacion;
                $a = substr($var, strrpos($var, 'FDC') + 3);

                $b = $a + 1;

                $serial = $b;
                $serial_final = $serial;

                return $serial_final;


            endif;
        endforeach;

        return $codigo;
    }
    
    
    public function generarliquidacion($operador, $texto1, $fecha_inicio, $texto2, $fecha_fin) {

        $prefijo = 'FDC';
        $b = $this->autoincrementoradicadorliquidacion($operador, $texto1, $fecha_inicio, $texto2, $fecha_fin);
        $codigo = $prefijo . $b . Ventas::getOperadorDonanteNombre($operador) . $texto1 . $fecha_inicio . $texto2 . $fecha_fin;

        return $codigo;
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
        $model = new ComisionesVendedores;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['ComisionesVendedores'])) {
            $model->attributes = $_POST['ComisionesVendedores'];
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

        if (isset($_POST['ComisionesVendedores'])) {
            $model->attributes = $_POST['ComisionesVendedores'];
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
        $dataProvider = new CActiveDataProvider('ComisionesVendedores');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new ComisionesVendedores('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['ComisionesVendedores']))
            $model->attributes = $_GET['ComisionesVendedores'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return ComisionesVendedores the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = ComisionesVendedores::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    
     public function loadModelVentas($id) {
        $model = Ventas::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param ComisionesVendedores $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'comisiones-vendedores-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
