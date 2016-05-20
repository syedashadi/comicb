<?php

/**
 * This is the model class for table "record".
 *
 * The followings are the available columns in table 'record':
 * @property string $date1
 * @property integer $odo
 * @property string $total
 * @property string $mileage
 * @property integer $id
 * @property string $time
 * @property string $comments
 */
class Record extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'record';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date1, odo, total, mileage, time, comments', 'required'),
			array('odo', 'numerical', 'integerOnly'=>true),
			array('total, mileage', 'length', 'max'=>11),
			array('comments', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('date1, odo, total, mileage, id, time, comments', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'date1' => 'Date1',
			'odo' => 'Odo',
			'total' => 'Total',
			'mileage' => 'Mileage',
			'id' => 'ID',
			'time' => 'Time',
			'comments' => 'Comments',
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

		$criteria->compare('date1',$this->date1,true);
		$criteria->compare('odo',$this->odo);
		$criteria->compare('total',$this->total,true);
		$criteria->compare('mileage',$this->mileage,true);
		$criteria->compare('id',$this->id);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('comments',$this->comments,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Record the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
