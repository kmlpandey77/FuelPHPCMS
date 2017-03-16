<?php
echo Html::anchor('admin/page/create', '<i class="glyphicon glyphicon-plus"></i> Add New Page', array(
    'class' => 'btn btn-success btn-sm js-modal-call'
        )
);
?>

<?=
Form::button('filter-trigger', 'Filter', array(
    'class' => 'btn btn-primary btn-sm',
    'data-toggle' => 'collapse',
    'data-target' => '#filter',
        )
);
?>

<div id="filter" class="filter collapse">
    <hr />

    <div class="row">
        <div class="col-sm-3">
            <?=
            Form::input('title', '', array(
                'class' => 'form-control grid_search',
                'placeholder' => 'Title',
                    )
            );
            ?>
        </div>

        <div class="col-sm-3">
            <?=
            Form::input('url_title', '', array(
                'class' => 'form-control grid_search',
                'placeholder' => 'Url Title',
                    )
            );
            ?>
        </div>

    </div>

</div>
<div id="pagesDiv" class="datagrid-container">
    <div id="loadingDiv" style="text-align: center;"><span class="glyphicon glyphicon-refresh spinning"></span> Loading...</div>
    <script>initView('admin/pages/grid', 'pageLink')</script>
</div>