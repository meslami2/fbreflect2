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
	<?php echo GxHtml::encode($data->getAttributeLabel('post_id')); ?>:
	<?php echo GxHtml::encode($data->post_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('seen')); ?>:
	<?php echo GxHtml::encode($data->seen); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('from_id')); ?>:
	<?php echo GxHtml::encode($data->from_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('from_name')); ?>:
	<?php echo GxHtml::encode($data->from_name); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('story')); ?>:
	<?php echo GxHtml::encode($data->story); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('link')); ?>:
	<?php echo GxHtml::encode($data->link); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('picture')); ?>:
	<?php echo GxHtml::encode($data->picture); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('source')); ?>:
	<?php echo GxHtml::encode($data->source); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('description')); ?>:
	<?php echo GxHtml::encode($data->description); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('message')); ?>:
	<?php echo GxHtml::encode($data->message); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('user')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->user0)); ?>
	<br />
	*/ ?>

</div>