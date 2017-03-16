<?php

class Pagination extends \Fuel\Core\Pagination {

    /**
     * instance configuration values
     */
    protected $config = array(
        'current_page' => null,
        'offset' => 0,
        'per_page' => 10,
        'total_pages' => 0,
        'total_items' => 0,
        'num_links' => 8,
        'uri_segment' => 3,
        'show_first' => false,
        'show_last' => false,
        'pagination_url' => null,
        'link_offset' => 0.5,
        'filter' => array('5' => 5, '10' => 10, '20' => 20, '30' => 30, '50' => 50, '100' => 100),
        'record_text' => 'Showing {start} to {end} of {total} entries',
    );

}
