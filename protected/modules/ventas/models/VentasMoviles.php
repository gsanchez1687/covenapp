<?php
/**
 * This is the model class for table "ventas_moviles".
 *
 * The followings are the available columns in table 'ventas_moviles':
 * @property integer $id
 * @property integer $venta_id
 * @property integer $plan_id
 * @property integer $tipo_alta
 * @property integer $operador_donante
 * @property integer $origen_equipo
 * @property string $numero_asignado
 * @property integer $iccId
 * @property integer $equipo
 * @property string $Imei
 *
 * The followings are the available model relations:
 * @property VentasAdicionalesMoviles[] $ventasAdicionalesMoviles
 * @property Dominios $operadorDonante
 * @property Dominios $equipo0
 * @property Sims $icc
 * @property Ventas $venta
 * @property Planes $plan
 */
class VentasMoviles extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ventas_moviles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('iccId, Imei','unique'),
			array('venta_id', 'required'),                       
                        array('venta_id, plan_id, tipo_alta, operador_donante, origen_equipo', 'numerical', 'integerOnly'=>true),
                        array('numero_asignado', 'length', 'max'=>20),
                        array('Imei', 'length', 'max'=>15),
                        array('equipo,iccId', 'length', 'max'=>50),
                        // The following rule is used by search().
                        // @todo Please remove those attributes that should not be searched.
                        array('id, venta_id, plan_id, tipo_alta, operador_donante, origen_equipo, numero_asignado, iccId, equipo, Imei', 'safe', 'on'=>'search'),
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
			'ventasAdicionalesMoviles' => array(self::HAS_MANY, 'VentasAdicionalesMoviles', 'venta_movil_id'),
                        'operadorDonante' => array(self::BELONGS_TO, 'Dominios', 'operador_donante'),                       
                        'icc' => array(self::BELONGS_TO, 'Sims', 'iccId'),
                        'venta' => array(self::BELONGS_TO, 'Ventas', 'venta_id'),
                        'plan' => array(self::BELONGS_TO, 'Planes', 'plan_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'venta_id' => 'Venta',
                        'plan_id' => 'Plan',
			'tipo_alta' => 'Tipo Alta',
			'operador_donante' => 'Operador Donante',
			'origen_equipo' => 'Origen Equipo',
			'numero_asignado' => 'Numero Asignado',
			'iccId' => 'Simcard',
			'equipo' => 'Equipo',
			'Imei' => 'Imei',
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
		$criteria->compare('venta_id',$this->venta_id);
                $criteria->compare('plan_id',$this->plan_id);
		$criteria->compare('tipo_alta',$this->tipo_alta);
		$criteria->compare('operador_donante',$this->operador_donante);
		$criteria->compare('origen_equipo',$this->origen_equipo);
		$criteria->compare('numero_asignado',$this->numero_asignado,true);
		$criteria->compare('iccId',$this->iccId);
		$criteria->compare('equipo',$this->equipo,true);
		$criteria->compare('Imei',$this->Imei,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VentasMoviles the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
