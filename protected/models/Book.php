<?php

/**
 * This is the model class for table "book".
 *
 * The followings are the available columns in table 'book':
 * @property string $id
 * @property string $title
 * @property string $type_id
 * @property string $publication_date
 * @property string $value
 * @property string $price
 * @property string $notes
 * @property integer $signed
 * @property string $grade_id
 * @property integer $bagged
 * @property integer $issue_number
 *
 * The followings are the available model relations:
 * @property Type $type
 * @property Grade $grade
 * @property Person[] $people
 * @property Publisher[] $publishers
 * @property Tag[] $tags
 */
class Book extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Book the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'book';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('signed, bagged', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>256),
			array('type_id, value, price, grade_id, issue_number', 'length', 'max'=>10),
			array('publication_date, notes', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, type_id, publication_date, value, price, notes, signed, grade_id, bagged, issue_number', 'safe', 'on'=>'search'),
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
			'type' => array(self::BELONGS_TO, 'Type', 'type_id'),
			'grade' => array(self::BELONGS_TO, 'Grade', 'grade_id'),
			'people' => array(self::MANY_MANY, 'Person', 'bookillustrator(book_id, illustrator_id)'),
			'publishers' => array(self::MANY_MANY, 'Publisher', 'bookpublisher(book_id, publisher_id)'),
			'tags' => array(self::MANY_MANY, 'Tag', 'booktag(book_id, tag_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'type_id' => 'Type',
			'publication_date' => 'Publication Date',
			'value' => 'Value',
			'price' => 'Price',
			'notes' => 'Notes',
			'signed' => 'Signed',
			'grade_id' => 'Grade',
			'bagged' => 'Bagged',
            'issue_number'=>'Issue Number',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('type_id',$this->type_id,true);
		$criteria->compare('publication_date',$this->publication_date,true);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('signed',$this->signed);
		$criteria->compare('grade_id',$this->grade_id,true);
		$criteria->compare('bagged',$this->bagged);
        $criteria->compare('issue_number', $this->issue_number, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}