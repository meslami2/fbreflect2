<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('friend')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->friend0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('category')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->category0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('seen')); ?>:
	<?php echo GxHtml::encode($data->seen); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('not_seen')); ?>:
	<?php echo GxHtml::encode($data->not_seen); ?>
	<br />

</div>