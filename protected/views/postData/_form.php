<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'post-data-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'friend'); ?>
		<?php echo $form->dropDownList($model, 'friend', GxHtml::listDataEx(Friend::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'friend'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php echo $form->dropDownList($model, 'category', GxHtml::listDataEx(Category::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'category'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'post_id'); ?>
		<?php echo $form->textField($model, 'post_id', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'post_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'seen'); ?>
		<?php echo $form->checkBox($model, 'seen'); ?>
		<?php echo $form->error($model,'seen'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'from_id'); ?>
		<?php echo $form->textField($model, 'from_id', array('maxlength' => 64)); ?>
		<?php echo $form->error($model,'from_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'from_name'); ?>
		<?php echo $form->textField($model, 'from_name', array('maxlength' => 200)); ?>
		<?php echo $form->error($model,'from_name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'story'); ?>
		<?php echo $form->textArea($model, 'story'); ?>
		<?php echo $form->error($model,'story'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'link'); ?>
		<?php echo $form->textField($model, 'link', array('maxlength' => 400)); ?>
		<?php echo $form->error($model,'link'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'picture'); ?>
		<?php echo $form->textField($model, 'picture', array('maxlength' => 400)); ?>
		<?php echo $form->error($model,'picture'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'source'); ?>
		<?php echo $form->textField($model, 'source', array('maxlength' => 400)); ?>
		<?php echo $form->error($model,'source'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textArea($model, 'name'); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model, 'description'); ?>
		<?php echo $form->error($model,'description'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'message'); ?>
		<?php echo $form->textArea($model, 'message'); ?>
		<?php echo $form->error($model,'message'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'user'); ?>
		<?php echo $form->dropDownList($model, 'user', GxHtml::listDataEx(User::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'user'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->