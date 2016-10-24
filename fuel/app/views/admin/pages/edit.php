<h2>Editing Page</h2>
<br>

<?php echo render('admin/pages/_form'); ?>
<p>
	<?php echo Html::anchor('admin/pages/view/'.$page->id, 'View'); ?> |
	<?php echo Html::anchor('admin/pages', 'Back'); ?></p>
