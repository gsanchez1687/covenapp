<?php

/**
 * This is the model class for table "comisiones_ventas_meses".
 *
 * The followings are the available columns in table 'comisiones_ventas_meses':
 * @property integer $id
 * @property string $mes
 * @property integer $operador_id
 * @property integer $porcentaje
 *
 * The followings are the available model relations:
 * @property Dominios $operador
 * @property Transaccion[] $transaccions
 */
class ComisionesVentasMeses extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'comisiones_ventas_meses';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mes, operador_id, porcentaje', 'required'),
			array('operador_id, porcentaje', 'numerical', 'integerOnly'=>true),
			array('mes', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, mes, operador_id, porcentaje', 'safe', 'on'=>'search'),
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
			'operador' => array(self::BELONGS_TO, 'Dominios', 'operador_id'),
                        'transaccions' => array(self::HAS_MANY, 'Transaccion', 'mes_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'mes' => 'Mes',
			'operador_id' => 'Operador',
			'porcentaje' => 'Porcentaje',
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
		$criteria->compare('mes',$this->mes,true);
		$criteria->compare('operador_id',$this->operador_id);
		$criteria->compare('porcentaje',$this->porcentaje);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ComisionesVentasMeses the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
