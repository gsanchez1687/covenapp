<?php

/**
 * This is the model class for table "sims".
 *
 * The followings are the available columns in table 'sims':
 * @property integer $id
 * @property string $ccid
 * @property integer $operador_id
 * @property integer $usuario_id
 * @property integer $estado_id
 * @property string $fecha
 * @property string $creado
 *
 * The followings are the available model relations:
 * @property Dominios $operador
 * @property Usuarios $usuario
 * @property Dominios $estado
 */
 Yii::import('application.modules.ventas.models.Dominios');
 Yii::import('application.modules.seguridad.models.users');
 Yii::import('application.modules.seguridad.models.Personas');
 Yii::import('application.modules.seguridad.models.Users');
 
class Sims extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
        public $archivo;
        public function tableName()
	{
		return 'sims';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(                      
			array('operador_id, usuario_id, estado_id', 'numerical', 'integerOnly'=>true),
			array('ccid', 'length', 'max'=>50),
                        array('archivo','file'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
                        array('creado','default','value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false,'on'=>'insert'),
			 array('id, ccid, operador_id, usuario_id, estado_id, fecha, creado', 'safe', 'on'=>'search'),
			array('id, ccid, operador_id, usuario_id, estado_id', 'safe', 'on'=>'transferencia'),
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
			'usuario' => array(self::BELONGS_TO, 'Users', 'usuario_id'),
			'estado' => array(self::BELONGS_TO, 'Dominios', 'estado_id'),
			'ventasMoviles' => array(self::HAS_MANY, 'VentasMoviles', 'iccId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
                        'ccid' => 'Ccid',
                        'operador_id' => 'Operador',
                        'usuario_id' => 'Usuario',
                        'estado_id' => 'Estado',
                        'fecha' => 'Fecha',
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
		$criteria->compare('t.ccid',$this->ccid,true);
		$criteria->compare('operador.tipo',$this->operador_id,true);
		$criteria->compare('usuario.username',$this->usuario_id,true);
		$criteria->compare('estado.id',$this->estado_id,true);
                $criteria->compare('fecha',$this->fecha,true);
                $criteria->compare('creado',$this->creado,true);
                
                $criteria->with = array('operador','usuario','estado');
                
                $rol = Yii::app()->user->getState('rol');
                $usuario = Yii::app()->user->id;
                
                switch ($rol):                    
                    case 1:   $criteria->condition = 't.usuario_id = '.$usuario;
                    case 2:   $criteria->condition = 't.usuario_id = '.$usuario;
                    case 3:   $criteria->condition = 't.usuario_id = '.$usuario;
                endswitch;
                
               
                
                $criteria->order = "t.id DESC"; /*AÑADIR ORDEN*/
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function transferencia()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.ccid',$this->ccid);
		$criteria->compare('operador.id',$this->operador_id,true);
		$criteria->compare('usuario.username',$this->usuario_id,true);
		$criteria->compare('estado.id',$this->estado_id,true);
                
                $criteria->with = array('operador','usuario','estado');               
                
                $criteria->order = "t.id DESC"; /*AÑADIR ORDEN*/
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sims the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function getEstados(){
            
            $operador =  Dominios::model()->findAll('activo = 1 AND parametro = "SIMS_ESTADO" ');
            return CHtml::listData($operador,'id','tipo');
        }
        
        public static function getOperador(){
            
            $operador =  Dominios::model()->findAll('activo = 1 AND parametro = "OPERADOR" ');
            return CHtml::listData($operador,'id','tipo');
        }
        
        public static function getUsuarios(){
            
            $Users = Users::model()->findAll();
            return CHtml::listData($Users,'id','username');
        }
        
        
        public static function getidoperador($nombre_operador){
            $id = '';
            switch ($nombre_operador):
                
                case 'ETB MOVIL':  $id = 1; break;
                case 'CLARO MOVIL':  $id = 2; break;
                case 'MOVISTAR MOVIL':  $id = 3; break;
                case 'AVANTEL':  $id = 4; break;
                case 'ETB FIJA':  $id = 5; break;
                case 'CLARO FIJA':  $id = 6; break;
                case 'MOVISTAR FIJA':  $id = 7; break;            
                
            endswitch;
            
            
            return $id;
            
        }
        
        
        
       
        
        
}
