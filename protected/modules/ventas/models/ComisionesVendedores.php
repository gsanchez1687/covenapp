<?php

/**
 * This is the model class for table "comisiones_vendedores".
 *
 * The followings are the available columns in table 'comisiones_vendedores':
 * @property integer $id
 * @property integer $venta_id
 * @property integer $comprobantes_pagos_totalizadas_id
 * @property string $revenue
 * @property string $comision_conexcel
 * @property string $base_comision
 * @property integer $comision_inicial
 * @property integer $fondo
 * @property integer $comision_menos_fondo
 * @property integer $rete_fuente
 * @property integer $reteica
 * @property integer $iva
 * @property integer $precomision
 * @property integer $incumplimiento_legalizacion
 * @property string $liquidacion
 *
 * The followings are the available model relations:
 * @property Ventas $venta
 * @property ComprobantesPagosTotalizadas $comprobantesPagosTotalizadas
 */
class ComisionesVendedores extends CActiveRecord
{
    
         public $primer_nombre_cliente;
         public $segundo_nombre_cliente;
         public $numero_identidad;
         public $primer_nombre_vendedor;
         public $segundo_nombre_vendedor;
         public $cedula_identidad_vendedor;
         public $correo_vendedor;
         public $coordinador_vendedor;
         public $gerente_vendedor;
         public $numero_asignado;
         public $plan;
         public $plan_valor;
         public $operador;
         public $total_comision;
         public $costo_banco;
         public $cartera;
         public $aplica_rete_fuente;
         public $rete_fuente;
         public $reteica;
         public $total_contable;
         public $total_egreso;
         public $total_pago;
         public $entidad_bancaria;
         public $tipo_cuenta;
         public $numero_cuenta;
         /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'comisiones_vendedores';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('venta_id', 'required'),
			array('venta_id, comprobantes_pagos_totalizadas_id, comision_inicial, fondo, comision_menos_fondo, rete_fuente, reteica, iva, precomision, incumplimiento_legalizacion', 'numerical', 'integerOnly'=>true),
			array('revenue, comision_conexcel, base_comision', 'length', 'max'=>20),
			array('liquidacion', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, venta_id, comprobantes_pagos_totalizadas_id, revenue, comision_conexcel, base_comision, comision_inicial, fondo, comision_menos_fondo, rete_fuente, reteica, iva, precomision, incumplimiento_legalizacion, liquidacion', 'safe', 'on'=>'search'),
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
			'venta' => array(self::BELONGS_TO, 'Ventas', 'venta_id'),
			'comprobantesPagosTotalizadas' => array(self::BELONGS_TO, 'ComprobantesPagosTotalizadas', 'comprobantes_pagos_totalizadas_id'),
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
			'comprobantes_pagos_totalizadas_id' => 'Comprobantes Pagos Totalizadas',
			'revenue' => 'Revenue',
			'comision_conexcel' => 'Comision Conexcel',
			'base_comision' => 'Base Comision',
			'comision_inicial' => 'Comision Inicial',
			'fondo' => 'Fondo',
			'comision_menos_fondo' => 'Comision Menos Fondo',
			'rete_fuente' => 'Rete Fuente',
			'reteica' => 'Reteica',
			'iva' => 'Iva',
			'precomision' => 'Precomision',
			'incumplimiento_legalizacion' => 'Incumplimiento Legalizacion',
			'liquidacion' => 'Liquidacion',
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
		$criteria->compare('comprobantes_pagos_totalizadas_id',$this->comprobantes_pagos_totalizadas_id);
		$criteria->compare('revenue',$this->revenue,true);
		$criteria->compare('comision_conexcel',$this->comision_conexcel,true);
		$criteria->compare('base_comision',$this->base_comision,true);
		$criteria->compare('comision_inicial',$this->comision_inicial);
		$criteria->compare('fondo',$this->fondo);
		$criteria->compare('comision_menos_fondo',$this->comision_menos_fondo);
		$criteria->compare('rete_fuente',$this->rete_fuente);
		$criteria->compare('reteica',$this->reteica);
		$criteria->compare('iva',$this->iva);
		$criteria->compare('precomision',$this->precomision);
		$criteria->compare('incumplimiento_legalizacion',$this->incumplimiento_legalizacion);
		$criteria->compare('liquidacion',$this->liquidacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ComisionesVendedores the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
