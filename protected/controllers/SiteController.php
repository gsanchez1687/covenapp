<?php
class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public $modulo = 'Login';

    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    public function actionRecuperar() {

        if ($_POST['yt1'] == 'RECUPERAR'):
            $correo = trim($_POST['LoginForm']['correo']);       
            $personas = Controller::recuperar($correo);
            if($personas):             
                $sinEncriptar = Controller::generar();             
                $encriptada = md5($sinEncriptar);
                $personas->password = $encriptada;
                    if($personas->save()):
                         Controller::recupear($personas->persona->correo, $personas->persona->nombre, $personas->persona->apellido, $personas->username, $sinEncriptar);
                         Yii::app()->user->setFlash('success', "se ha enviado a su correo su nueva contraseña");  
                         $this->redirect(Yii::app()->request->baseUrl . '/site/login');
                    endif;
                
            else:   
                Yii::app()->user->setFlash('success', "correo no existe");  
                $this->redirect(Yii::app()->request->baseUrl . '/site/login');
            endif;
             

        endif;
        
        
          $this->render('/site/recuperar');
    }
    


    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        $this->render('index');
    }

    public function actionExportarexcel($id = null) {
        Yii::app()->theme = "exportar";

        $render = $this->render('exportarexcel', true);
        Yii::app()->request->sendFile('ventas.xls', $render);
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        Yii::app()->theme = 'login';
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                Controller::RegistrarLog($this->modulo, Yii::app()->user->getState('username') . ' ha iniciado sesion');
                $this->redirect(Yii::app()->request->baseUrl . '/site/index');
            }
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        Yii::app()->session->clear();
        Yii::app()->session->destroy();
        $this->redirect(Yii::app()->request->baseUrl . '/site/login');
    }

}
