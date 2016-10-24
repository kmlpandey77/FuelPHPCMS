<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Title', 'title', array('class'=>'control-label')); ?>

				<?php echo Form::input('title', Input::post('title', isset($page) ? $page->title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Title')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Slug', 'slug', array('class'=>'control-label')); ?>

				<?php echo Form::input('slug', Input::post('slug', isset($page) ? $page->slug : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Slug')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Image', 'image', array('class'=>'control-label')); ?>

				<?php echo Form::input('image', Input::post('image', isset($page) ? $page->image : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Image')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Overview', 'overview', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('overview', Input::post('overview', isset($page) ? $page->overview : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Overview')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Details', 'details', array('class'=>'control-label')); ?>

				<?php echo Form::input('details', Input::post('details', isset($page) ? $page->details : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Details')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Position', 'position', array('class'=>'control-label')); ?>

				<?php echo Form::input('position', Input::post('position', isset($page) ? $page->position : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Position')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Order by', 'order_by', array('class'=>'control-label')); ?>

				<?php echo Form::input('order_by', Input::post('order_by', isset($page) ? $page->order_by : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Order by')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Deleted at', 'deleted_at', array('class'=>'control-label')); ?>

				<?php echo Form::input('deleted_at', Input::post('deleted_at', isset($page) ? $page->deleted_at : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Deleted at')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>