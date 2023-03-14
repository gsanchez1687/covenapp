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
 * @property GruposVentas $grupoVenta
 * @property Usuarios $coordinador
 * @property Usuarios[] $usuarioses
 * @property Usuarios $gerente
 * @property Usuarios[] $usuarioses1
 * @property Personas $persona
 * @property Ventas[] $ventases
 * @property Ventas[] $ventases1
 * @property Ventas[] $ventases2
 * @property Ventas[] $ventases3
 * @property Ventas[] $ventases4
 */
class Usuarios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, grupo_venta_id', 'required'),
			array('rol_id, persona_id, grupo_venta_id, jefe_directo', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>50),
			array('password', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, rol_id, persona_id, username, password, grupo_venta_id, jefe_directo', 'safe', 'on'=>'search'),
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
			'logs' => array(self::HAS_MANY, 'Logs', 'user_id'),
			'sims' => array(self::HAS_MANY, 'Sims', 'usuario_id'),
			'usersRolesItems' => array(self::HAS_MANY, 'UsersRolesItems', 'user_id'),
			'rol' => array(self::BELONGS_TO, 'Roles', 'rol_id'),
			'jefeDirecto' => array(self::BELONGS_TO, 'Usuarios', 'jefe_directo'),
			'usuarioses' => array(self::HAS_MANY, 'Usuarios', 'jefe_directo'),
			'persona' => array(self::BELONGS_TO, 'Personas', 'persona_id'),
			'ventases' => array(self::HAS_MANY, 'Ventas', 'vendedor_id'),
			'ventases1' => array(self::HAS_MANY, 'Ventas', 'activador_final'),
                        'ventases2' => array(self::HAS_MANY, 'Ventas', 'vendedor_id'),
                        'ventases3' => array(self::HAS_MANY, 'Ventas', 'usuario_modificador'),
                        'ventases4' => array(self::HAS_MANY, 'Ventas', 'radicador_id'),
                        'ventases5' => array(self::HAS_MANY, 'Ventas', 'usuario_modificador'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'rol_id' => 'Rol',
			'persona_id' => 'Persona',
			'username' => 'Username',
			'password' => 'Password',
			'grupo_venta_id' => 'Grupo Venta',
			'jefe_directo' => 'Jefe Directo',
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
		$criteria->compare('rol_id',$this->rol_id);
		$criteria->compare('persona_id',$this->persona_id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('grupo_venta_id',$this->grupo_venta_id);
		$criteria->compare('jefe_directo',$this->jefe_directo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
