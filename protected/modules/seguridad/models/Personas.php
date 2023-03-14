<?php

/**
 * This is the model class for table "personas".
 *
 * The followings are the available columns in table 'personas':
 * @property integer $id
 * @property string $nombre
 * @property string $segundo_nombre
 * @property string $apellido
 * @property string $segundo_apellido
 * @property string $correo
 * @property string $movil
 * @property string $cedula_identidad
 * @property integer $cargo_id
 * @property integer $estado_id
 * @property string $fecha_ingreso
 * @property string $banco
 * @property integer $tipo_cuenta
 * @property string $numero_cuenta
 * @property integer $padrino_id
 * @property string $fin_padrino
 * @property integer $sucursal
 * @property string $documento
 * @property integer $legalizacion
 * @property integer $regimen_id
 * @property string $rete_fuente
 *
 * The followings are the available model relations:
 * @property Dominios $cargo
 * @property Dominios $estado
 * @property Dominios $tipoCuenta
 * @property Dominios $regimen
 * @property Personas $padrino
 * @property Personas[] $personases
 * @property Usuarios[] $usuarioses
 */
class Personas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'personas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, correo, movil, cedula_identidad, fecha_ingreso, sucursal, documento, legalizacion, regimen_id, rete_fuente', 'required'),
                        array('cargo_id, estado_id, tipo_cuenta, padrino_id, sucursal, documento, legalizacion, regimen_id', 'numerical', 'integerOnly'=>true),
			array('nombre, apellido, cedula_identidad', 'length', 'max'=>10),
                        array('segundo_nombre,movil, segundo_apellido', 'length', 'max'=>50),
                        array('correo', 'length', 'max'=>100),
                        array('banco', 'length', 'max'=>15),
                        array('numero_cuenta', 'length', 'max'=>25),                        
                        array('fin_padrino', 'default', 'setOnEmpty'=>'null'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, segundo_nombre, apellido, segundo_apellido, correo, movil, cedula_identidad, cargo_id, estado_id, fecha_ingreso, banco, tipo_cuenta, numero_cuenta, padrino_id, fin_padrino, sucursal, documento, legalizacion, regimen_id, rete_fuente', 'safe', 'on'=>'search'),
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
                        'cargo' => array(self::BELONGS_TO, 'Dominios', 'cargo_id'),
			'estado' => array(self::BELONGS_TO, 'Dominios', 'estado_id'),
                        'tipoCuenta' => array(self::BELONGS_TO, 'Dominios', 'tipo_cuenta'),
                        'regimen' => array(self::BELONGS_TO, 'Dominios', 'regimen_id'),
                        'padrino' => array(self::BELONGS_TO, 'Personas', 'padrino_id'),
                        'personases' => array(self::HAS_MANY, 'Personas', 'padrino_id'),
                        'sucursal0' => array(self::BELONGS_TO, 'Dominios', 'sucursal'),                       
                        'usuarioses' => array(self::HAS_MANY, 'Usuarios', 'persona_id'),                   
                      
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
                        'nombre' => 'Primer Nombre',
                        'segundo_nombre' => 'Segundo Nombre',
                        'apellido' => 'Primer Apellido',
                        'segundo_apellido' => 'Segundo Apellido',
                        'correo' => 'Correo',
                        'movil' => 'Movil',
                        'cedula_identidad' => 'Cedula Identidad',
                        'cargo_id' => 'Cargo',
                        'estado_id' => 'Estado',
                        'fecha_ingreso' => 'Fecha Ingreso',
                        'banco' => 'Banco',
                        'tipo_cuenta' => 'Tipo Cuenta',
                        'numero_cuenta' => 'Numero Cuenta',
                        'padrino_id' => 'Padrino',
                        'fin_padrino' => 'Fin Padrino',
                        'sucursal' => 'Sucursal',
                        'documento' => 'Documento',
                        'legalizacion' => 'Legalizacion',
                        'regimen_id' => 'Regimen',
                        'rete_fuente' => 'Rete Fuente',
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
                $criteria->compare('segundo_nombre',$this->segundo_nombre,true);
                $criteria->compare('apellido',$this->apellido,true);
                $criteria->compare('segundo_apellido',$this->segundo_apellido,true);
                $criteria->compare('correo',$this->correo,true);
                $criteria->compare('movil',$this->movil,true);
                $criteria->compare('cedula_identidad',$this->cedula_identidad,true);
                $criteria->compare('cargo_id',$this->cargo_id);
                $criteria->compare('estado_id',$this->estado_id);
                $criteria->compare('fecha_ingreso',$this->fecha_ingreso,true);
                $criteria->compare('banco',$this->banco,true);
                $criteria->compare('tipo_cuenta',$this->tipo_cuenta);
                $criteria->compare('numero_cuenta',$this->numero_cuenta,true);
                $criteria->compare('padrino_id',$this->padrino_id);
                $criteria->compare('fin_padrino',$this->fin_padrino,true);
                $criteria->compare('sucursal',$this->sucursal);
                $criteria->compare('documento',$this->documento);
                $criteria->compare('legalizacion',$this->legalizacion);
                $criteria->compare('regimen_id',$this->regimen_id);
                $criteria->compare('rete_fuente',$this->rete_fuente,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Personas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
          
}
