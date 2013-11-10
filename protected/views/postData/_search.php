<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'friend'); ?>
		<?php echo $form->dropDownList($model, 'friend', GxHtml::listDataEx(Friend::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'category'); ?>
		<?php echo $form->dropDownList($model, 'category', GxHtml::listDataEx(Category::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'post_id'); ?>
		<?php echo $form->textField($model, 'post_id', array('maxlength' => 100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'seen'); ?>
		<?php echo $form->dropDownList($model, 'seen', array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'from_id'); ?>
		<?php echo $form->textField($model, 'from_id', array('maxlength' => 64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'from_name'); ?>
		<?php echo $form->textField($model, 'from_name', array('maxlength' => 200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'story'); ?>
		<?php echo $form->textArea($model, 'story'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'link'); ?>
		<?php echo $form->textField($model, 'link', array('maxlength' => 400)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'picture'); ?>
		<?php echo $form->textField($model, 'picture', array('maxlength' => 400)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'source'); ?>
		<?php echo $form->textField($model, 'source', array('maxlength' => 400)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'name'); ?>
		<?php echo $form->textArea($model, 'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'description'); ?>
		<?php echo $form->textArea($model, 'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'message'); ?>
		<?php echo $form->textArea($model, 'message'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'user'); ?>
		<?php echo $form->dropDownList($model, 'user', GxHtml::listDataEx(User::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
