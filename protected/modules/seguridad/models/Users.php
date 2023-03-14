<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property integer $id
 * @property string $foto
 * @property integer $rol_id
 * @property integer $persona_id
 * @property string $username
 * @property string $password
 * @property integer $grupo_venta_id
 * @property integer $coordinador_id
 * @property integer $gerente_id
 *
 * The followings are the available model relations:
 * @property Logs[] $logs
 * @property Sims[] $sims
 * @property UsersRolesItems[] $usersRolesItems
 * @property Roles $rol
 * @property Personas $persona
 * @property GruposVentas $grupoVenta
 * @property Usuarios $coordinador
 * @property Usuarios[] $usuarioses
 * @property Usuarios $gerente
 * @property Usuarios[] $usuarioses1
 * @property Ventas[] $ventases
 * @property Ventas[] $ventases1
 * @property Ventas[] $ventases2
 * @property Ventas[] $ventases3
 */
Yii::import('application.modules.ventas.models.Dominios');
class Users extends CActiveRecord {
    
    
    public $file;
    public $nombre;
    public $segundo_nombre;
    public $apellido;
    public $segundo_apellido;
    public $documento;
    public $numero_cuenta;
    public $correo;
    public $telefono;
    public $fecha_ingreso;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'usuarios';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        
        return array(
            array('username,rol_id', 'required'),          
            array('rol_id, persona_id, coordinador_id, gerente_id', 'numerical', 'integerOnly'=>true),
            array('username', 'length', 'max'=>50),
            array('foto, password', 'length', 'max'=>100),   
            array('foto', 'file', 
                                    'allowEmpty'=>true, 
                                    'types'=>'png, jpg, jpeg', 
                                    'on'=>'insert',//scenario
                                    'except'=>'update',
                                    'message' => 'Upload Valid Image!',  // Error message
                                    'wrongType'=>'Tipo de archivo no es correcto',
                                    'minSize'=>1024,// 1MB
                                    'maxSize'=>99024,
                                    'maxFiles'=>1,
                                    'tooLarge'=>'Es archivo es muy grande',//Error Message
                                    'tooSmall'=>'El archivo es muy pequeño',//Error Message
                                    'tooMany'=>'Estas subiendo muchos archivos',//Error Message                                
                        ),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
             array('id, foto, rol_id, persona_id, username, password, coordinador_id, gerente_id, nombre,apellido, segundo_nombre, segundo_apellido, documento, numero_cuenta,correo,telefono,fecha_ingreso', 'safe', 'on'=>'search'),
             array('id, foto, rol_id, persona_id, username, password, coordinador_id, gerente_id, nombre,apellido, segundo_nombre, segundo_apellido, documento, correo, numero_cuenta,telefono,fecha_ingreso', 'safe', 'on'=>'ahijados'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(           
            'logs' => array(self::HAS_MANY, 'Logs', 'usuario_id'),
            'sims' => array(self::HAS_MANY, 'Sims', 'usuario_id'),
            'usersRolesItems' => array(self::HAS_MANY, 'UsersRolesItems', 'user_id'),
            'rol' => array(self::BELONGS_TO, 'Roles', 'rol_id'),
            'coordinador' => array(self::BELONGS_TO, 'Users', 'coordinador_id'),
            'usuarioses' => array(self::HAS_MANY, 'Users', 'coordinador_id'),    
            'persona' => array(self::BELONGS_TO, 'Personas', 'persona_id'),
            'gerente' => array(self::BELONGS_TO, 'Users', 'gerente_id'),
            'ventases' => array(self::HAS_MANY, 'Ventas', 'activador_final'),
            'ventases1' => array(self::HAS_MANY, 'Ventas', 'vendedor_id'),
            'ventases2' => array(self::HAS_MANY, 'Ventas', 'radicador_id'),
            'ventases3' => array(self::HAS_MANY, 'Ventas', 'activador_inicial'),  
            'ventases5' => array(self::HAS_MANY, 'Ventas', 'usuario_modificador'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'foto' => 'Foto',
            'rol_id' => 'Rol',
            'persona_id' => 'Persona',
            'username' => 'Nombre de usuario',
            'password' => 'Contraseña',          
            'coordinador_id' => 'Coordinador',
            'gerente_id' => 'Gerente',
        );
    }
    
     
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('t.id',$this->id);
        $criteria->compare('t.foto',$this->foto,true);
        $criteria->compare('rol.id',$this->rol_id);
        $criteria->compare('persona.nombre',$this->nombre,true);
        $criteria->compare('persona.segundo_nombre',$this->segundo_nombre,true);
        $criteria->compare('persona.apellido',$this->apellido,true);
        $criteria->compare('persona.segundo_apellido',$this->segundo_apellido,true);
        $criteria->compare('t.username',$this->username,true);
        $criteria->compare('t.password',$this->password,true);     
        $criteria->compare('coordinador.persona_id',$this->coordinador_id);
        $criteria->compare('persona.documento', $this->documento);
        $criteria->compare('persona.numero_cuenta', $this->numero_cuenta);
        $criteria->compare('persona.correo', $this->correo);
        $criteria->compare('persona.movil', $this->telefono);
        $criteria->compare('persona.fecha_ingreso', $this->fecha_ingreso);

        $criteria->with = array('persona','rol','coordinador','gerente');
        $criteria->order = "t.id DESC";
        
        $rol = Yii::app()->user->getState('rol');
        $user_id = Yii::app()->user->id;
        
        /*Si son coordinadores pueden ver solo sus vendedores a que les pertenece*/
        switch ($rol):
            /*vendedor*/
            case 1:   $Coordinador_id = Users::model()->find('id = '.$user_id);                   
                      $criteria->addCondition('t.coordinador_id ='.$Coordinador_id->coordinador_id);    
                      break;
            /*coordinador*/      
            case 2:   $criteria->addCondition('t.coordinador_id = '.$user_id);
                      break;
            /*gerente*/      
            case 3:   $criteria->addCondition('t.gerente_id = '.$user_id); 
           
            
        endswitch;
        
       // $total = Users::model()->count();
        
        
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
          //  'pagination' => array('pageSize'=>$total),
        ));
    }
    
      public function ahijados(){
        
        $criteria = new CDbCriteria;
        $criteria->compare('t.id',$this->id);
        $criteria->compare('t.foto',$this->foto,true);
        $criteria->compare('rol.id',$this->rol_id);
        $criteria->compare('persona.nombre',$this->persona_id,true);
        $criteria->compare('t.username',$this->username,true);
        $criteria->compare('t.password',$this->password,true);    
        $criteria->compare('persona.nombre',$this->coordinador_id);
        $criteria->compare('persona.nombre',$this->gerente_id);
        
        $criteria->with = array('persona','rol','coordinador','gerente');
        $criteria->order = "t.id DESC";
        
        $criteria->addCondition('persona.padrino_id = '.Yii::app()->user->id);
        
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize'=>Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize'])),
        ));
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    function validatePassword($password) {
        return $this->hashPassword($password) === $this->password;
    }

    
    public function hashPassword($password) {
        return md5($password);
    }

    protected function generateSalt($cost = 10) {
        if (!is_numeric($cost) || $cost < 4 || $cost > 31) {
            throw new CException(Yii::t('Cost parameter must be between 4 and 31.'));
        }
        
        $rand = '';
        for ($i = 0; $i < 8; ++$i)
            $rand .= pack('S', mt_rand(0, 0xffff));
       
        $rand .= microtime();
       
        $rand = sha1($rand, true);
        
        $salt = '$2a$' . str_pad((int) $cost, 2, '0', STR_PAD_RIGHT) . '$';
       
        $salt .= strtr(substr(base64_encode($rand), 0, 22), array('+' => '.'));
        return $salt;
    }
    
   

        public function getSelectNombreApellido(){
            return $this->persona->nombre.' '.$this->persona->segundo_nombre.'  '.$this->persona->apellido.' '.$this->persona->segundo_apellido.' | '.$this->persona->cedula_identidad;
      }
      
       public function getSelectsuario(){
           return $this->persona->nombre.'  '.$this->persona->apellido;
      }
        
        
     public static function getRoles(){
         
            return CHtml::listData(Roles::model()->findAll(''), 'id', 'name');
        }
        
     public static function getGrupoVenta(){
            return CHtml::listData(GruposVentas::model()->findAll(''), 'id', 'nombre');
     }
     
     public static function getCoordinador(){
            $model = CHtml::listData(Users::model()->findAll('rol_id IN(2,10,11) '), 'id', 'SelectNombreApellido');
            
            return $model;
     }
     
     public static function getGerente(){
            return CHtml::listData(Users::model()->findAll('rol_id = 3 '), 'id', 'SelectNombreApellido');
     }
     
     public static function getCargo(){
            return CHtml::listData(Dominios::model()->findAll(' t.parametro = "CARGO" '), 'id', 'tipo');
     }
     
     public static function getPadrinos(){
            return CHtml::listData(Users::model()->findAll(), 'id', 'SelectNombreApellido');
     }
     
     public static function getSurcursal(){
            return CHtml::listData(Dominios::model()->findAll(' t.parametro = "CIUDAD" '), 'id', 'tipo');
     }
     
     public static function getTipoCuenta(){
            return CHtml::listData(Dominios::model()->findAll(' t.parametro = "TIPO_CUENTA" '), 'id', 'tipo');
     }
     
     public static function getDocumentacion(){
          return array('0'=>'NO TIENE','1'=>'SI TIENE');
     }
     
     public static function getRegimen(){
            return CHtml::listData(Dominios::model()->findAll(' t.parametro = "REGIMEN" '), 'id', 'tipo');
     }
     public static function getEstados(){
            return CHtml::listData(Dominios::model()->findAll(' t.parametro = "ESTADO_PERSONA" '), 'id', 'tipo');
     }
     
     public static function getLegalizacion(){
         
         return array(0=>'Si Tardia',1=>'No Tardia');
         
     }
     
     public static function getLegalizacionView($valor = NULL){
         $nombre = '';
         switch ($valor):
             case 0:   $nombre = 'SI TARDIA'; break;
             case 1:   $nombre = 'NO TARDIA'; break;
         endswitch;
         
         return $nombre;
         
       
       
     }     
     
     public static function getReteFuente(){
         
         return array(0=>'NO',1=>'SI');         
     }
     
     public static function getReteFuenteView($valor = NULL){
         
        if($valor == 0):
            $data = 'SI';
        else:
            $data = 'NO';
        endif;
        return $data;
     }
     
     
     public static function getSwichCargo($cargo = null ){
         
         switch (strtolower($cargo)):
             
             case 'dealer1':             $valor = 57; break;
             case 'dealer3':             $valor = 58; break;
             case 'dealer3':             $valor = 59; break;
             case 'fuerza de ventas':    $valor = 116; break;
             case 'freelance':           $valor = 117; break;
             
         endswitch;
      
         return $valor;
         
     }
     public static function getSwichEstadoPersona($estadoPersona = null ){
         
         switch (strtolower($estadoPersona)):
             
             case 'usuario activo':      $valor = 11;break; 
             case 'usuario suspendido':  $valor = 10;break; 
             case 'usuario inactivo':    $valor = 9;break;              
             
         endswitch;
         
         return $valor;
         
     }
     
     public static function getSwichTipoCuenta($tipoCuenta = null ){
         
         switch (strtolower($tipoCuenta)):
             
             case 'comun':     $valor = 67; break; 
             case 'regimen':   $valor = 66;break;  
             
         endswitch;
         
         return $valor;
         
     }
     public static function getSwichRol($rol = null ){
         
         switch (strtolower(rol)):
             
             case 'vendedor':      $valor = 1; break; 
             case 'coordinador':   $valor = 2;break;  
             case 'gerente':       $valor = 3;break;  
             case 'comisiones':    $valor  = 4;break;  
             case 'contabilidad':  $valor = 5;break;  
             case 'supernumeraria':$valor = 6;break;  
             case 'activador':     $valor = 7;break;  
             case 'superadmin':    $valor = 8;break;  
             case 'administrador': $valor = 9;break;  
             
         endswitch;
         
         return $valor;
         
     }
     
     public static function getDocumento($valor){
         $nombre = '';
         switch ($valor):
             case 0:   $nombre = '<span class="label label-danger">NO TIENE</span>';break;
             case 1:   $nombre = '<span class="label label-success">SI TIENE</span>';break;
            default :  $nombre = '<span class="label label-default">SIN ASIGNAR</span>'; break;
             
         endswitch;
         return $nombre;
     }

}
