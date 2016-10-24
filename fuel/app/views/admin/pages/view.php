<h2>Viewing #<?php echo $page->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $page->title; ?></p>
<p>
	<strong>Slug:</strong>
	<?php echo $page->slug; ?></p>
<p>
	<strong>Image:</strong>
	<?php echo $page->image; ?></p>
<p>
	<strong>Overview:</strong>
	<?php echo $page->overview; ?></p>
<p>
	<strong>Details:</strong>
	<?php echo $page->details; ?></p>
<p>
	<strong>Position:</strong>
	<?php echo $page->position; ?></p>
<p>
	<strong>Order by:</strong>
	<?php echo $page->order_by; ?></p>
<p>
	<strong>Deleted at:</strong>
	<?php echo $page->deleted_at; ?></p>

<?php echo Html::anchor('admin/pages/edit/'.$page->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/pages', 'Back'); ?>