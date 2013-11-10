<?php

Yii::import('application.models._base.BasePostData');

class PostData extends BasePostData
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}