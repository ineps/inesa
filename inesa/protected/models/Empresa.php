<?php

/**
 * This is the model class for table "empresa".
 *
 * The followings are the available columns in table 'empresa':
 * @property integer $id
 * @property string $razon_social
 * @property string $rfc
 * @property integer $estatus_id
 *
 * The followings are the available model relations:
 * @property Domiciliocliente[] $domicilioclientes
 * @property Estatus $estatus
 */
class Empresa extends CActiveRecord
{
	public $domicilios=null;
	public $texto = "Domicilios";
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'empresa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('razon_social, rfc, estatus_id', 'required'),
			array('estatus_id', 'numerical', 'integerOnly'=>true),
			array('razon_social', 'length', 'max'=>200),
			array('rfc', 'length', 'max'=>45),
			array('razon_social', 'unique', 'message'=>'{attribute} ya existe.'),
			array('rfc', 'unique', 'message'=>'{attribute} ya existe.'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, razon_social, rfc, estatus_id', 'safe', 'on'=>'search'),
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
			'domicilioclientes' => array(self::HAS_MANY, 'Domiciliocliente', 'empresa_id'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'razon_social' => 'Cliente',
			'rfc' => 'R.F.C.',
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
		$criteria->compare('razon_social',$this->razon_social,true);
		$criteria->compare('rfc',$this->rfc,true);
		#$criteria->compare('estatus_id',$this->estatus_id);
                $criteria->with = array('estatus'); //Metodo 1 para poder filtrar datos desde la relación
                $criteria->addSearchCondition('estatus.estatus', $this->estatus_id);// Método 2 que acompaña al método 1 para filtrar datos desde la relación

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
	 * @return Empresa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
