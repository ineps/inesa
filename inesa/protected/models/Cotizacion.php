<?php

/**
 * This is the model class for table "cotizacion".
 *
 * The followings are the available columns in table 'cotizacion':
 * @property integer $id
 * @property integer $folio
 * @property integer $domiciliocliente_id
 * @property integer $cotz_empresa
 * @property integer $cotz_contacto
 * @property double $subtotal
 * @property double $iva
 * @property double $total
 * @property integer $estadocotizacion_id
 * @property string $fecha
 * @property string $fechacancelacion
 * @property string $anio
 *
 * The followings are the available model relations:
 * @property Estadocotizacion $estadocotizacion
 * @property Domiciliocliente $domiciliocliente
 * @property Productos[] $productoses
 */
class Cotizacion extends CActiveRecord
{
    public $variable;
    public $variable2;
    public $check;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cotizacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
                array('fecha , fechacancelacion','required'),
                array('folio, colocarfolio, formapago_id, descuento, domiciliocliente_id, domiciliocliente_id2, cotz_contacto1,  cotz_contacto2, estadocotizacion_id', 'numerical', 'integerOnly'=>true),
                array('subtotal, colocarfolio, folio, diasentrega, iva, descuento, total', 'numerical'),
                array('anio', 'length', 'max'=>4),
                array('textoadicional',  'safe'),
                array('observacionesot',  'safe'),
                array('observacionestrabajo',  'safe'),

                // The following rule is used by search().
                // @todo Please remove those attributes that should not be searched.
                array('id, folio, domiciliocliente_id,  subtotal, iva, total, estadocotizacion_id, fecha, fechacancelacion,  anio', 'safe', 'on'=>'search'),
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
			'estadocotizacion' => array(self::BELONGS_TO, 'Estadocotizacion', 'estadocotizacion_id'),
			'domiciliocliente' => array(self::BELONGS_TO, 'Domiciliocliente', 'domiciliocliente_id'),
             'domiciliocliente2' => array(self::BELONGS_TO, 'Domiciliocliente', 'domiciliocliente_id2'),
			'productoses' => array(self::HAS_MANY, 'Productos', 'cotizacion_id'),
            'domiciliopersonas' => array(self::BELONGS_TO, 'Domiciliopersonas', 'cotz_contacto1'),
            'domiciliopersonas2' => array(self::BELONGS_TO, 'Domiciliopersonas', 'cotz_contacto2'),
            'formapago' => array(self::BELONGS_TO, 'Formapago', 'formapago_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'folio' => 'Referencia Folio',
            'colocarfolio'=>'Folio',
			'domiciliocliente_id' => 'Cliente',
			'cotz_contacto1' => 'Contacto',
            'diasentrega' => 'Días de entrega',
            'domiciliocliente_id2' => 'Cliente Asesor',
			'cotz_contacto2' => 'Contacto Asesor',
            'descuento' => 'Descuento',
			'subtotal' => 'Subtotal',
			'iva' => 'Iva',
			'total' => 'Total',
			'estadocotizacion_id' => 'Estado Cotizacion',
			'fecha' => 'Fecha',
            'fechacancelacion' => 'Fecha de Cancelacion',
            'observacionesot' => 'Observaciones',
            'observacionestrabajo'=> 'Observaciones de Trabajo',
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
		$criteria->compare('folio',$this->folio);
        $criteria->compare('colocarfolio',$this->colocarfolio);
		$criteria->compare('domiciliocliente_id',$this->domiciliocliente_id);
        $criteria->compare('domiciliocliente_id2',$this->domiciliocliente_id2);
        $criteria->compare('formapago_id',$this->formapago_id);
		$criteria->compare('cotz_contacto1',$this->cotz_contacto1);
		$criteria->compare('cotz_contacto2',$this->cotz_contacto2);
		$criteria->compare('descuento',$this->descuento);
        $criteria->compare('subtotal',$this->subtotal);
		$criteria->compare('iva',$this->iva);
		$criteria->compare('total',$this->total);
		$criteria->compare('estadocotizacion_id',$this->estadocotizacion_id);
		$criteria->compare('fecha',$this->fecha,true);
        $criteria->compare('fechacancelacion',$this->fechacancelacion, true);
		$criteria->compare('anio',$this->anio,true);
		$criteria->compare('observacionesot',$this->observacionesot,true);
		$criteria->compare('observacionestrabajo',$this->observacionestrabajo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination' => array(
                            'pageSize' => 75,
                        ),
		));
	}
        
        public function search2()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('folio',$this->folio);
                $criteria->compare('colocarfolio',$this->colocarfolio);
		$criteria->compare('domiciliocliente_id',$this->domiciliocliente_id);
                $criteria->compare('domiciliocliente_id2',$this->domiciliocliente_id2);
                $criteria->compare('formapago_id',$this->formapago_id);
		$criteria->compare('cotz_contacto1',$this->cotz_contacto1);
		$criteria->compare('cotz_contacto2',$this->cotz_contacto2);
		$criteria->compare('descuento',$this->descuento);
                $criteria->compare('subtotal',$this->subtotal);
		$criteria->compare('iva',$this->iva);
		$criteria->compare('total',$this->total);
		$criteria->compare('estadocotizacion_id',$this->estadocotizacion_id = 2);
		$criteria->compare('fecha',$this->fecha,true);
                $criteria->compare('fechacancelacion',$this->fechacancelacion, true);
		$criteria->compare('anio',$this->anio,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination' => array(
                            'pageSize' => 75,
                        ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cotizacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
