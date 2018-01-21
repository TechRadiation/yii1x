<?php

/**
 * TrainingBatch class.
 * TrainingBatch is the data structure for keeping
 * TrainingBatch data. It is used by the 'TrainingBatch'.
 */
class TrainingBatch extends CActiveRecord
{
	public $grade;
	public $certificate;
	private $_identity;

	public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    public function tableName()
    {
        return 'training_batch';
    }

	/**
	 * Declares the validation rules.
	 */
	

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'name'=>'Name'
		);
	}
}