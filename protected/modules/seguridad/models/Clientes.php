<?php

/**
 * This is the model class for table "clientes".
 *
 * The followings are the available columns in table 'clientes':
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property string $fecha_expedicion
 * @property integer $fijo
 * @property string $movil
 * @property string $direccion
 * @property string $email
 * @property integer $ciudad_id
 * @property string $fecha_nacimiento
 * @property integer $tipo_documento
 * @property integer $tipo_cliente
 *
 * The followings are the available model relations:
 * @property Dominios $tipoDocumento
 * @property Dominios $ciudad
 * @property Ventas[] $ventases
 */
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
			array('nombre, apellido, fecha_expedicion, fijo, movil, direccion, email, ciudad_id, fecha_nacimiento, tipo_documento, tipo_cliente', 'required'),
			array('fijo, ciudad_id, tipo_documento, tipo_cliente', 'numerical', 'integerOnly'=>true),
			array('nombre, apellido', 'length', 'max'=>15),
			array('movil', 'length', 'max'=>20),
			array('direccion', 'length', 'max'=>30),
			array('email', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, apellido, fecha_expedicion, fijo, movil, direccion, email, ciudad_id, fecha_nacimiento, tipo_documento, tipo_cliente', 'safe', 'on'=>'search'),
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
			'ventases' => array(self::HAS_MANY, 'Ventas', 'cliente_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
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
			'tipo_cliente' => 'Tipo Cliente',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('fecha_expedicion',$this->fecha_expedicion,true);
		$criteria->compare('fijo',$this->fijo);
		$criteria->compare('movil',$this->movil,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('ciudad_id',$this->ciudad_id);
		$criteria->compare('fecha_nacimiento',$this->fecha_nacimiento,true);
		$criteria->compare('tipo_documento',$this->tipo_documento);
		$criteria->compare('tipo_cliente',$this->tipo_cliente);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
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
}
