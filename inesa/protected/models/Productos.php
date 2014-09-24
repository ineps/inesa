<?php

/**
 * This is the model class for table "productos".
 *
 * The followings are the available columns in table 'productos':
 * @property integer $id
 * @property integer $partida
 * @property integer $areas_id
 * @property integer $servicios_id
 * @property double $cantidad
 * @property double $preciounitario
 * @property double $monto
 * @property integer $cotaizacion_id
 *
 * The followings are the available model relations:
 * @property Areas $areas
 * @property Cotizacion $cotaizacion
 * @property Servicios $servicios
 */
class Productos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'productos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('areas_id, servicios_id, estatus_id, cantidad, preciounitario, monto, cotizacion_id', 'required'),
			array('areas_id, servicios_id, cotizacion_id', 'numerical', 'integerOnly'=>true),
			array('cantidad, preciounitario, monto', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, areas_id, servicios_id, cantidad, preciounitario, monto, cotizacion_id', 'safe', 'on'=>'search'),
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
			'areas' => array(self::BELONGS_TO, 'Areas', 'areas_id'),
			'cotizacion' => array(self::BELONGS_TO, 'Cotizacion', 'cotizacion_id'),
			'servicios' => array(self::BELONGS_TO, 'Servicios', 'servicios_id'),
                        'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_id'),
		);
	}
	
	public function getMenuAreas()
	{
		return CHtml::listData(Areas::model()->findAll(), 'id', 'clave');
	}

	public function getMenuServicios()
	{
		return CHtml::listData(Servicios::model()->findAll(), 'id', 'servicio');
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'areas_id' => 'Areas',
			'servicios_id' => 'Servicios',
			'cantidad' => 'Cantidad',
			'preciounitario' => 'Precio Unitario',
			'monto' => 'Monto',
			'cotizacion_id' => 'Cotización',
                        'estatus_id' => 'Estatus',
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
		$criteria->compare('areas_id',$this->areas_id);
		$criteria->compare('servicios_id',$this->servicios_id);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('preciounitario',$this->preciounitario);
		$criteria->compare('monto',$this->monto);
		$criteria->compare('cotizacion_id',$this->cotizacion_id);
                $criteria->compare('estatus_id',$this->estatus_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Productos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
