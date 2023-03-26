<?php

class MenusController extends Controller {

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
           // 'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public $modulo = 'menus';
    public $modulo_name = 'Menu';
    public $modulo_singular = 'Menu';
    public $modulo_icon = '';

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'rolesitems', 'usersitems'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete','user'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
    
    public function actionUser(){        
      
        
            $model = new Users('search');
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['Users']))
                $model->attributes = $_GET['Users'];

            $this->render('user', array(
                'model' => $model,
            ));
    
        
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
        $model = new Menus;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Menus'])) {
            $model->attributes = $_POST['Menus'];
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

        if (isset($_POST['Menus'])) {
            $model->attributes = $_POST['Menus'];
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
        $dataProvider = new CActiveDataProvider('Menus');
        $this->render('index', array('dataProvider' => $dataProvider));
        
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Menus('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Menus']))
            $model->attributes = $_GET['Menus'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Menus the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Menus::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Menus $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'menus-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionRolesitems() {
        
       // if(Yii::app()->authRBAC->checkAccess('roles_admin')){

        /* Inicio de la Transaccion */
        $transaccion_sql = Yii::app()->db->beginTransaction();

        $model = new RolesItems;

        $options = array();

        if (isset($_POST['RolesItems'])) {
            $model->attributes = $_POST['RolesItems'];
        }

        if ($model->rol_id != NULL) {

            if (isset($_POST['yt0'])) {

                RolesItems::model()->updateAll(
                        array('active' => 0), "rol_id = :rol_id", array(':rol_id' => $model->rol_id)
                );

                if (isset($_POST['Items'])) {
                    $rol = array();
                    foreach ($_POST['Items'] as $a => $b) {

                        $rol = RolesItems::model()->find(array(
                            'condition' => "item_id = :item_id AND rol_id = :rol_id",
                            'params' => array(':item_id' => $a, ':rol_id' => $model->rol_id)
                                )
                        );
                      

                        if (!empty($rol)) {
                            $rol->active = 1;
                        } else {
                            $rol = new RolesItems;
                            $rol->item_id = $a;
                            $rol->rol_id = $model->rol_id;
                            $rol->active = 1;
                        }
                        if ($rol->validate()) {
                            if ($rol->save()) {
                                
                            } else {
                                /* Defino una Variable que mas abajo genere un Rollback */
                                Yii::app()->params['rollback'] = TRUE;
                            }
                        } else {
                            /* Defino una Variable que mas abajo genere un Rollback */
                            Yii::app()->params['rollback'] = TRUE;
                        }
                    }
                }

                if (Yii::app()->params['rollback'] == FALSE) {
                    /* Hago el Commit de todas las Transacciones */
                    $transaccion_sql->commit();
                    Yii::app()->user->setFlash('success', Yii::app()->params['msjsuccess']);
                }
            }

            /* Consulta de Items */
            $sql = new CDbCriteria();

            $sql->condition = "t.active = 1 AND menu.active = 1";

            $sql->with = array('menu');

            $sql->order = "menu.position ASC, t.name ASC";

            $items = Items::model()->findAll($sql);

            foreach ($items as $item) {
                $options[$item->menu->name]['menu'] = $item->menu->name;
                $options[$item->menu->name]['menuicon'] = $item->menu->icon;
                $options[$item->menu->name]['data'][$item->id]['opcion'] = $item->id;
                $options[$item->menu->name]['data'][$item->id]['name'] = $item->name;
                $options[$item->menu->name]['data'][$item->id]['value'] = FALSE;
            }

            $sqlrol = new CDbCriteria();

            $sqlrol->condition = "t.rol_id = :rol_id AND item.active = 1 AND menu.active = 1 AND t.active = 1";

            $sqlrol->params = array(':rol_id' => intval($model->rol_id));

            $sqlrol->with = array('item' => array('with' => 'menu'));

            $sqlrol->order = "menu.position ASC, item.name ASC";

            $rolesitems = RolesItems::model()->findAll($sqlrol);

            foreach ($rolesitems as $list) {

                $options[$list->item->menu->name]['data'][$list->item->id]['value'] = TRUE;
            }
        }

        $this->render('rolesitems', array('model' => $model,'options' => $options));
        //} else{
                     
              
                   //throw new CHttpException(403,'Su usuario no tiene los privilegios necesarios para acceder a esta seccion, 
                   // porfavor si cree que esto es un error, consulte al administrador del sistema.<br/>
                    //Este evento ha sido registrado.');
             
        //}
    }

    public function actionUsersitems($id = NULL) {

//        if(Yii::app()->authRBAC->checkAccess('roles_admin')){

        $user = Users::model()->find(array('condition' => "id = :id", 'params' => array(':id' => $id)));

        if ($user !== null) {

            $sql = new CDbCriteria();

            $sql->condition = "t.active = 1 AND item.active = 1 AND menu.active = 1 AND t.rol_id = :rol_id ";

            $sql->params = array(':rol_id' => $user->rol_id);

            $sql->with = array('item' => array('with' => 'menu'));

            $sql->order = "menu.position ASC, item.name ASC";

            $items = RolesItems::model()->findAll($sql);


            $sqluseritems = new CDbCriteria();

            $sqluseritems->select = "t.id, t.user_id, t.rol_item_id, t.active, menu.name as menuname, item.name as itemname, item.id as itemid";

            $sqluseritems->condition = "t.user_id = :userid AND item.active = 1 AND menu.active = 1 AND t.active = 1";

            $sqluseritems->params = array(':userid' => $id);

            //$sqluseritems->with = array('rolItem' => array('with' => 'item'));

            $sqluseritems->join = "INNER JOIN roles_items rolItem ON (t.rol_item_id=rolItem.id) INNER JOIN items item ON (rolItem.item_id=item.id) INNER JOIN menus menu ON (item.menu_id = menu.id)";

            $sqluseritems->order = "menu.position ASC, item.name ASC"; //

            $sqluseritems->together = true;

            $itemsusers = UsersRolesItems::model()->findAll($sqluseritems);

            $options = array();

            foreach ($items as $item) {

                $options[$item->item->menu->name]['menu'] = $item->item->menu->name;
                $options[$item->item->menu->name]['menuicon'] = $item->item->menu->icon;
                $options[$item->item->menu->name]['data'][$item->item->id]['opcion'] = $item->id;
                $options[$item->item->menu->name]['data'][$item->item->id]['name'] = $item->item->name;
                $options[$item->item->menu->name]['data'][$item->item->id]['value'] = FALSE;
            }

            foreach ($itemsusers as $list) {

                $options[$list->menuname]['data'][$list->itemid]['value'] = TRUE;
            }
           

            $model = new UsersRolesItems();
            $before = $model->attributes;

            if (isset($_POST['yt0'])) {

                UsersRolesItems::model()->deleteAll("user_id = '$id'");

                if (isset($_POST['UsersRolesItems'])) {

                    foreach ($_POST['UsersRolesItems'] as $a => $b) {

                        $model = new UsersRolesItems;

                        $model->rol_item_id = $a;
                        $model->user_id = $id;
                        $model->active = 1;
                        $model->save();
                      //  print_r($model->getErrors());
                    }
                }

                $this->redirect(array('usersitems', 'id' => $id));
            }
            $this->render('usersitems', array(
                'user' => $user,
                'options' => $options,
                'model' => $model,
            ));
//         } else{
//                      
//              
//                   throw new CHttpException(403,'Su usuario no tiene los privilegios necesarios para acceder a esta seccion, 
//                    porfavor si cree que esto es un error, consulte al administrador del sistema.<br/>
//                    Este evento ha sido registrado.');
//             
//           }
     
    }}

}
