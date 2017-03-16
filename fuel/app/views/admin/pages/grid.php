<?php if ($pages): ?>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="grid_order_by" data-value="title">Title</th>
                <th class="grid_order_by" data-value="overview">Overview</th>
                <th class="text-right">Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Title</th>
                <th>Overview</th>
                <th class="text-right">Action</th>
            </tr>
        </tfoot>
        <tbody>
            <?php foreach ($pages as $item): ?>
                <tr>
                    <td><?php echo $item->title; ?></td>
                    <td><?php echo substr($item->overview, 0, 50); ?>...</td>
                    <td class="text-right">
                        <?php echo Html::anchor('admin/pages/edit/' . $item->id, '<i class="glyphicon glyphicon-edit"></i>'); ?>
                        <?php echo Html::anchor('admin/pages/delete/' . $item->id, '<i class="glyphicon glyphicon-trash"></i>', array('class' => "text-danger")); ?>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-4">

        </div>
        <div class="col-lg-8">
            <input type="hidden" name="current_page" id="current_page" value="<?= $pagination->current_page ?>" >
            <?= $pagination ?>

            <div class="pull-right" style="margin-right: 20px;">
                <?=
                Form::select('title_search', $pagination->per_page, $pagination->filter, array(
                    'id' => 'page_limit',
                    'onchange' => 'filterGrid()',
                    'class' => 'form-control'
                        )
                );
                ?>
            </div>
        </div>
    </div>


<?php else: ?>
    <p>No Pages.</p>
<?php endif; ?>