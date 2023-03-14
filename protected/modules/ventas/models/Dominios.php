<?php

/**
 * This is the model class for table "dominios".
 *
 * The followings are the available columns in table 'dominios':
 * @property integer $id
 * @property string $tipo
 * @property string $parametro
 * @property integer $activo
 *
 * The followings are the available model relations:
 * @property Clientes[] $clientes
 * @property Clientes[] $clientes1
 * @property Clientes[] $clientes2
 * @property ComisionesVentasMeses[] $comisionesVentasMeses
 * @property DatosAdicionales[] $datosAdicionales
 * @property GruposVentas[] $gruposVentases
 * @property MinutosAdicionales[] $minutosAdicionales
 * @property Notificaciones[] $notificaciones
 * @property Personas[] $personases
 * @property Personas[] $personases1
 * @property Personas[] $personases2
 * @property Personas[] $personases3
 * @property Personas[] $personases4
 * @property Planes[] $planes
 * @property Sims[] $sims
 * @property Sims[] $sims1
 * @property ValoresComisionBaseCargosBasicos[] $valoresComisionBaseCargosBasicoses
 * @property Ventas[] $ventases
 * @property Ventas[] $ventases1
 * @property Ventas[] $ventases2
 * @property Ventas[] $ventases3
 * @property Ventas[] $ventases4
 * @property Ventas[] $ventases5
 * @property Ventas[] $ventases6
 * @property Ventas[] $ventases7
 * @property Ventas[] $ventases8
 * @property VentasFijas[] $ventasFijases
 * @property VentasFijas[] $ventasFijases1
 * @property VentasMoviles[] $ventasMoviles
 * @property VentasVariables[] $ventasVariables
 */
class Dominios extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'dominios';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tipo, parametro, activo', 'required'),
            array('activo', 'numerical', 'integerOnly' => true),
            array('tipo', 'length', 'max' => 100),
            array('parametro', 'length', 'max' => 20),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, tipo, parametro, activo', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'clientes' => array(self::HAS_MANY, 'Clientes', 'tipo_documento'),
            'clientes1' => array(self::HAS_MANY, 'Clientes', 'ciudad_id'),
            'clientes2' => array(self::HAS_MANY, 'Clientes', 'tipo_cliente'),
            'comisionesVentasMeses' => array(self::HAS_MANY, 'ComisionesVentasMeses', 'operador_id'),
            'datosAdicionales' => array(self::HAS_MANY, 'DatosAdicionales', 'operador_id'),
            'gruposVentases' => array(self::HAS_MANY, 'GruposVentas', 'categoria_id'),
            'minutosAdicionales' => array(self::HAS_MANY, 'MinutosAdicionales', 'operador_id'),
            'notificaciones' => array(self::HAS_MANY, 'Notificaciones', 'estado_id'),
            'personases' => array(self::HAS_MANY, 'Personas', 'cargo_id'),
            'personases1' => array(self::HAS_MANY, 'Personas', 'estado_id'),
            'personases2' => array(self::HAS_MANY, 'Personas', 'tipo_cuenta'),
            'personases3' => array(self::HAS_MANY, 'Personas', 'regimen_id'),
            'personases4' => array(self::HAS_MANY, 'Personas', 'sucursal'),
            'planes' => array(self::HAS_MANY, 'Planes', 'operador_id'),
            'sims' => array(self::HAS_MANY, 'Sims', 'operador_id'),
            'sims1' => array(self::HAS_MANY, 'Sims', 'estado_id'),
            'valoresComisionBaseCargosBasicoses' => array(self::HAS_MANY, 'ValoresComisionBaseCargosBasicos', 'tipo_id'),
            'ventases' => array(self::HAS_MANY, 'Ventas', 'operador_id'),
            'ventases1' => array(self::HAS_MANY, 'Ventas', 'plataforma_id'),
            'ventases2' => array(self::HAS_MANY, 'Ventas', 'documento_id'),
            'ventases3' => array(self::HAS_MANY, 'Ventas', 'envio_factura_id'),
            'ventases4' => array(self::HAS_MANY, 'Ventas', 'tipo_venta_id'),
            'ventases5' => array(self::HAS_MANY, 'Ventas', 'estado_contrato_id'),
            'ventases6' => array(self::HAS_MANY, 'Ventas', 'estado_id'),
            'ventases7' => array(self::HAS_MANY, 'Ventas', 'tipo_venta'),
            'ventases8' => array(self::HAS_MANY, 'Ventas', 'estado_admin_id'),
            'ventasFijases' => array(self::HAS_MANY, 'VentasFijas', 'tipo_fija_id'),
            'ventasFijases1' => array(self::HAS_MANY, 'VentasFijas', 'canal_venta_id'),
            'ventasMoviles' => array(self::HAS_MANY, 'VentasMoviles', 'operador_donante'),
            'ventasVariables' => array(self::HAS_MANY, 'VentasVariables', 'operador_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'tipo' => 'Tipo',
            'parametro' => 'Parametro',
            'activo' => 'Activo',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('tipo', $this->tipo, true);
        $criteria->compare('parametro', $this->parametro, true);
        $criteria->compare('activo', $this->activo);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Dominios the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getSelectName() {
        return $this->tipo . ' ' . $this->id;
    }

    public function getActivo($valor = NULL) {

        if ($valor == 1) {
            $data = '<span class="label label-success">Activo</span>';
        } else {
            $data = '<span class="label label-danger">Inactivo</span>';
        }
        return $data;
    }

    public function getActivoFilter() {

        return array(0 => 'Inactivo', 1 => 'Activo');
    }

}
