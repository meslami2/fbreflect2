<?php

Yii::import('application.models._base.BaseFriend');

class Friend extends BaseFriend
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}