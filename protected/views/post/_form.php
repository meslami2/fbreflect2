<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'post-form',
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
		<?php echo $form->labelEx($model,'seen'); ?>
		<?php echo $form->textField($model, 'seen', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'seen'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'not_seen'); ?>
		<?php echo $form->textField($model, 'not_seen', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'not_seen'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->