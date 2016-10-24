<h2>Listing Pages</h2>
<br>
<?php if ($pages): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Slug</th>
			<th>Image</th>
			<th>Overview</th>
			<th>Details</th>
			<th>Position</th>
			<th>Order by</th>
			<th>Deleted at</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($pages as $item): ?>		<tr>

			<td><?php echo $item->title; ?></td>
			<td><?php echo $item->slug; ?></td>
			<td><?php echo $item->image; ?></td>
			<td><?php echo $item->overview; ?></td>
			<td><?php echo $item->details; ?></td>
			<td><?php echo $item->position; ?></td>
			<td><?php echo $item->order_by; ?></td>
			<td><?php echo $item->deleted_at; ?></td>
			<td>
				<?php echo Html::anchor('admin/pages/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/pages/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/pages/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Pages.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/pages/create', 'Add new Page', array('class' => 'btn btn-success')); ?>

</p>
