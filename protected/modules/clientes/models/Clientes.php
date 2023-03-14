<?php

/**
 * This is the model class for table "clientes".
 *
 * The followings are the available columns in table 'clientes':
 * @property string $id
 * @property string $nombre
 * @property string $segundo_nombre
 * @property string $apellido
 * @property string $segundo_apellido
 * @property string $fecha_expedicion
 * @property string $fijo
 * @property string $movil
 * @property string $direccion
 * @property string $email
 * @property integer $ciudad_id
 * @property string $fecha_nacimiento
 * @property integer $tipo_documento
 * @property string $numero_identidad
 * @property integer $tipo_cliente
 * @property string $creado
 *
 * The followings are the available model relations:
 * @property Dominios $tipoDocumento
 * @property Dominios $ciudad
 * @property Dominios $tipoCliente
 * @property Ventas[] $ventases
 */
 Yii::import('application.modules.ventas.models.Dominios'); 
class Clientes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'clientes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
//                      array('id, nombre, apellido, fecha_expedicion, fijo, movil, direccion, email, ciudad_id, fecha_nacimiento, tipo_documento, tipo_cliente', 'required'),
                        array('ciudad_id, tipo_documento, tipo_cliente', 'numerical', 'integerOnly'=>true),
                        array('id, numero_identidad', 'length', 'max'=>20),
                        array('fijo', 'length', 'max'=>8),
                        array('movil', 'length', 'max'=>10),
                        array('fecha_expedicion, fecha_nacimiento', 'default', 'setOnEmpty'=>'null'),
                        array('fecha_expedicion','type','type' =>'date','message' => '{attribute}: No es una fecha valida!','dateFormat' => 'yyyy-MM-dd'),
                        array('nombre, segundo_nombre, apellido, segundo_apellido, email', 'length', 'max'=>50),
                        array('email', 'email'),
                        array('direccion', 'length', 'max'=>100),
                        array('fecha_nacimiento','safe'),
                        array('creado','default','value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false,'on'=>'insert'),
                        // The following rule is used by search().
                        // @todo Please remove those attributes that should not be searched.
                        array('id, nombre, segundo_nombre, apellido, segundo_apellido, fecha_expedicion, fijo, movil, direccion, email, ciudad_id, fecha_nacimiento, tipo_documento, numero_identidad, tipo_cliente, creado', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'tipoDocumento' => array(self::BELONGS_TO, 'Dominios', 'tipo_documento'),
                        'ciudad' => array(self::BELONGS_TO, 'Dominios', 'ciudad_id'),
                        'tipoCliente' => array(self::BELONGS_TO, 'Dominios', 'tipo_cliente'),
                        'ventases' => array(self::HAS_MANY, 'Ventas', 'cliente_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'id',
			'nombre' => 'Nombre',
			'apellido' => 'Apellido',                      
			'fecha_expedicion' => 'Fecha Expedicion',
			'fijo' => 'Fijo',
			'movil' => 'Movil',
			'direccion' => 'Direccion',
			'email' => 'Email',
			'ciudad_id' => 'Ciudad',
			'fecha_nacimiento' => 'Fecha Nacimiento',
			'tipo_documento' => 'Tipo Documento',                      
			'numero_identidad' => 'Numero Identidad',
			'tipo_cliente' => 'Tipo Cliente',
                        'creado' => 'Creado',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.nombre',$this->nombre,true);
		$criteria->compare('t.apellido',$this->apellido,true);              
		$criteria->compare('t.fecha_expedicion',$this->fecha_expedicion,true);
		$criteria->compare('t.fijo',$this->fijo);
		$criteria->compare('t.movil',$this->movil,true);
		$criteria->compare('t.direccion',$this->direccion,true);
		$criteria->compare('t.email',$this->email,true);
		$criteria->compare('ciudad.id',$this->ciudad_id,true);
		$criteria->compare('t.fecha_nacimiento',$this->fecha_nacimiento,true);
		$criteria->compare('tipoDocumento.tipo',$this->tipo_documento,true);              
		$criteria->compare('t.numero_identidad',$this->numero_identidad,true);
		$criteria->compare('t.tipo_cliente',$this->tipo_cliente); 
                $criteria->compare('t.creado',$this->creado,true);
                $criteria->with = array('ciudad','tipoDocumento');
                $criteria->order = "t.creado DESC"; /*AÑADIR ORDEN*/
                
              //  $todos = Clientes::model()->count();
                
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                       // 'pagination' => array('pageSize'=>$todos),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Clientes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
        public function getSelectNombreApellidoCliente(){
            return $this->nombre.' '.$this->apellido;
        }
        
        public static function getTipoDocumento(){
            
            $planes = Dominios::model()->findAll('activo = 1 AND parametro = "TIPO_DOCUMENTO" ');
            return CHtml::listData($planes, 'id', 'tipo');    
        }
        
        public static function getCiudad(){
            $planes = Dominios::model()->findAll('activo = 1 AND parametro = "CIUDAD" ');
            return CHtml::listData($planes, 'id', 'tipo');    
        }
        
        public static function BuscarClientes($cliente_id){
            
            $model = Clientes::model()->find(array(
                'condition'=>'t.numero_identidad=:numero_identidad',
                'params'=>array(':numero_identidad'=>$cliente_id),
            ));
            
            return $model;
            
        }
        
        public static function verificarCliente($cliente_id) {

        $id = Clientes::model()->find('id = ' . trim($cliente_id));
        if (!is_null($id)):
            return trim($_POST['Ventas']['cliente_id']);
        endif;
    }
        
       
        
}
