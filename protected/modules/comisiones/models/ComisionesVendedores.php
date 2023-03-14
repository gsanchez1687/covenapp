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
Yii::import('application.modules.ventas.models.Ventas');
class ComisionesVendedores extends CActiveRecord
{
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
        
         public static function getVentasComisiones($Fecha_inicio = null, $Fecha_fin = null, $movil = null, $operador = null) {

        $Criteria = new CDbCriteria();
        $Criteria->alias = 'Venta';
        $Criteria->condition = 'Venta.operador_id = :operador'
                . ' AND (Venta.estado_id = 36 OR Venta.estado_id = 43 OR Venta.estado_id = 42)'
                . ' AND Venta.plataforma_id = 137'
                . ' AND Venta.fecha_activacion BETWEEN :Fecha_inicio AND :Fecha_fin'
                . ' AND Venta.fecha_legalizacion <= :Fecha_fin ';
        $Criteria->params = array(
            ':operador' => $operador,
            ':Fecha_inicio' => $Fecha_inicio,
            ':Fecha_fin' => $Fecha_fin,
        );
        $Criteria->join = 'INNER JOIN planes Plan ON (Plan.id = Venta.plan_id) INNER JOIN ventas_moviles VentaMovil ON (VentaMovil.venta_id = Venta.id)';
        $ventas = Ventas::model()->findAll($Criteria);

        return $ventas;
    }
    
     public static function IncumplimientoLegalizacion($from, $to) {
        $workingDays = [1, 2, 3, 4, 5];
        $holidayDays = ['*-01-01', '2018-08-01', '2018-03-19', '2018-03-25', '2018-03-29', '2018-03-30', '2018-04-01', '2018-05-01', '2018-05-14', '2018-06-04', '2018-06-11', '2018-07-02', '2018-07-20', '2018-08-07', '2018-08-20', '2018-10-15', '2018-11-05', '2018-11-12', '2018-12-08', '*-12-25']; # dias festivos 

        $from = new DateTime($from);
        $to = new DateTime($to);
        $to->modify('+1 day');
        $interval = new DateInterval('P1D');
        $periods = new DatePeriod($from, $interval, $to);

        $days = 0;
        foreach ($periods as $period) {
            if (!in_array($period->format('N'), $workingDays))
                continue;
            if (in_array($period->format('Y-m-d'), $holidayDays))
                continue;
            if (in_array($period->format('*-m-d'), $holidayDays))
                continue;
            $days++;
        }
        return $days;
    }
    
     public function porcentaje($cantidad, $porciento, $decimales = 0) {

        return $cantidad / $porciento;
    }

    public function PrimerPaso($cantidad = null, $porciento = null) {

        return number_format($cantidad / $porciento, 4);
    }

    public function SegundoPaso($cantidad, $porciento) {
        return $cantidad * $porciento;
    }

    public function TercerPaso($cantidad, $porciento) {
        return $cantidad * $porciento;
    }

    public function CuartoPaso($cantidad, $porciento) {
        return $cantidad / $porciento;
    }

    public function QuintoPaso($cantidad, $valor) {
        return $cantidad * $valor;
    }

    public function SextoPaso($resultado4, $resultado5) {
        return $resultado4 - $resultado5;
    }

    public function OctavoPaso($rete_fuente, $regimen_id, $resultado6) {

        if ($rete_fuente == 1):

            if ($regimen_id == 67):

                $resultado7 = $resultado6 * 11;
            elseif ($regimen_id == 66):

                $resultado7 = $resultado6 * 10;

            endif;

        else:
            $resultado7 = 0;
        endif;

        return $resultado7;
    }

    public function NovenoPaso($surcursal, $resultado6, $reteica) {


        if ($surcursal == 33):

            $valor = $resultado6 * $reteica;

        endif;

        return $valor;
    }

    public function DecimoPaso($regimen, $resultado6, $iva) {

        if ($regimen == 67):

            $valor = $resultado6 * $iva;
        else:
            $valor = 0;
        endif;

        return $valor;
    }

    public function Undecimo($resultado6, $resultado7, $resultado8, $incumplimientoLegalizacion, $resultado9) {


        $valoresta = $resultado6 - $resultado7 - $resultado8 - $incumplimientoLegalizacion;
        $valortotal = $valoresta + $resultado9;

        return $valortotal;
    }
    
    public function ComprobantePagosTotalizados($venta_id, $resultado4, $resultado5, $resultado6, $resultado7, $resultado8) {

        $Criteria = new CDbCriteria();
        $Criteria->condition = 'v.id = :venta_id';
        $Criteria->params = array(':venta_id' => $venta_id);
        $Criteria->join = 'INNER JOIN ventas v on (t.venta_id = v.id ) INNER JOIN planes plan ON (v.plan_id = plan.id) INNER JOIN usuarios u on (v.vendedor_id = u.id) INNER JOIN personas p on (u.persona_id = p.id) INNER JOIN comisiones_vendedores  on (t.venta_id = v.id)';
        $models = ComisionesVendedores::model()->findAll($Criteria);

        foreach ($models as $data):

            $ComprovantePagosTotalizados = new ComprobantesPagosTotalizadas();
            $ComprovantePagosTotalizados->total_comision = $resultado4;
            $ComprovantePagosTotalizados->comisiones_menos_fondo = $resultado6;
            $ComprovantePagosTotalizados->fondo = $resultado5;
            $ComprovantePagosTotalizados->rete_fuente = $resultado7;
            $ComprovantePagosTotalizados->reteica = $resultado8;


        endforeach;
    }
}
