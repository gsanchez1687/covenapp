<?php

/**
 * This is the model class for table "logs".
 *
 * The followings are the available columns in table 'logs':
 * @property integer $id
 * @property integer $usuario_id
 * @property string $modulo
 * @property string $actividad
 * @property string $pais
 * @property string $ip
 * @property string $fecha
 * @property string $dipositivo
 *
 * The followings are the available model relations:
 * @property Usuarios $usuario
 */
Yii::import('application.modules.seguridad.models.Users');
Yii::import('application.modules.seguridad.models.Personas');
class Logs extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'logs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario_id', 'numerical', 'integerOnly'=>true),
			array('actividad, pais, ip', 'length', 'max'=>45),
			array('modulo,dipositivo', 'length', 'max'=>100),
			array('fecha','default','value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false,'on'=>'insert'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, usuario_id, modulo, actividad, pais, ip, fecha, dipositivo', 'safe', 'on'=>'search'),
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
			'usuario' => array(self::BELONGS_TO, 'Users', 'usuario_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'usuario_id' => 'Usuario',
			'modulo' => 'Modulo',
			'actividad' => 'Actividad',
			'pais' => 'Pais',
			'ip' => 'Ip',
			'fecha' => 'Fecha',
			'dipositivo' => 'Dipositivo',
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
		$criteria->compare('usuario_id',$this->usuario_id);
		$criteria->compare('modulo',$this->modulo,true);
		$criteria->compare('actividad',$this->actividad,true);
		$criteria->compare('pais',$this->pais,true);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('dipositivo',$this->dipositivo,true);
                $criteria->order = "id DESC"; /*AÑADIR ORDEN*/
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Logs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
