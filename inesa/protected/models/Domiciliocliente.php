<?php

/**
 * This is the model class for table "domiciliocliente".
 *
 * The followings are the available columns in table 'domiciliocliente':
 * @property integer $id
 * @property integer $empresa_id
 * @property string $calle
 * @property string $colonia
 * @property string $codigo_postal
 * @property string $municipio
 * @property integer $estados_id
 * @property integer $estatus_id
 *
 * The followings are the available model relations:
 * @property Asesor[] $asesors
 * @property Estatus $estatus
 * @property Empresa $empresa
 * @property Estados $estados
 * @property Domiciliopersonas[] $domiciliopersonases
 */
class Domiciliocliente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'domiciliocliente';
	}

	public function getDomicilio()
	{
            #return $this->empresa->razon_social.$this->calle.', '.$this->colonia.', '.$this->codigo_postal.', '.$this->municipio;
			return $this->nombre_sucursal;
	}
    
    public function getDomicilios()
	{
            return "Calle ".$this->calle.', Colonia: '.$this->colonia.', C.P. '.$this->codigo_postal.', <br />Delegación o Municipio: '.$this->municipio;
			
	}   
        public function getDomicilioBasico()
	{
            return $this->nombre_sucursal.', '.$this->calle.', '.$this->colonia.', '.$this->codigo_postal.', '.$this->municipio;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('empresa_id, calle, colonia, codigo_postal, municipio, estados_id, estatus_id', 'required'),
			array('empresa_id, estados_id, estatus_id', 'numerical', 'integerOnly'=>true),
			array('nombre_sucursal', 'length', 'max'=>200),
                        array('calle, colonia', 'length', 'max'=>150),
			array('codigo_postal', 'length', 'max'=>45),
			array('municipio', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, empresa_id, calle, colonia, codigo_postal, municipio, estados_id, estatus_id', 'safe', 'on'=>'search'),
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
			'asesors' => array(self::HAS_MANY, 'Asesor', 'domiciliocliente_id'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_id'),
			'empresa' => array(self::BELONGS_TO, 'Empresa', 'empresa_id'),
			'estados' => array(self::BELONGS_TO, 'Estados', 'estados_id'),
			'domiciliopersonases' => array(self::HAS_MANY, 'Domiciliopersonas', 'domiciliocliente_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
                        'nombre_sucursal' => 'Sucursal',
			'empresa_id' => 'Cliente',
			'calle' => 'Calle',
			'colonia' => 'Colonia',
			'codigo_postal' => 'Codigo Postal',
			'municipio' => 'Delegación o Municipio',
			'estados_id' => 'Estados',
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
                
                $criteria->with = array('estatus', 'empresa', 'estados');
                
		$criteria->compare('nombre_sucursal',$this->nombre_sucursal);
                $criteria->compare('id',$this->id);
		$criteria->compare('calle',$this->calle,true);
		$criteria->compare('colonia',$this->colonia,true);
		$criteria->compare('codigo_postal',$this->codigo_postal,true);
		$criteria->compare('municipio',$this->municipio,true);
                $criteria->addSearchCondition('estados.estados', $this->estados_id, true);
                $criteria->addSearchCondition('estatus.estatus', $this->estatus_id, true);
                $criteria->addSearchCondition('empresa.razon_social', $this->empresa_id, true);

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
	 * @return Domiciliocliente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
