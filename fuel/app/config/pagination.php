<?php

/**
 * Part of the Fuel framework.
 *
 * @package    Fuel
 * @version    1.8
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2016 Fuel Development Team
 * @link       http://fuelphp.com
 */
/**
 * NOTICE:
 *
 * If you need to make modifications to the default configuration, copy
 * this file to your app/config folder, and make them in there.
 *
 * This will allow you to upgrade fuel without losing your custom config.
 */
return array(
    // the active pagination template
    'active' => 'bootstrap3',
    // Twitter bootstrap 3.x template
    'bootstrap3' => array(
        'wrapper' => "<ul id=\"ajax_pagination\" class=\"pagination pull-right\">\n\t{pagination}\n\t</ul>\n",
        'first' => "\n\t\t<li>{link}</li>",
        'first-marker' => "First",
        'first-link' => "<a href=\"{uri}\">{page}</a>",
        'first-inactive' => "",
        'first-inactive-link' => "",
        'previous' => "\n\t\t<li>{link}</li>",
        'previous-marker' => "Previous",
        'previous-link' => "<a href=\"{uri}\" rel=\"prev\">{page}</a>",
        'previous-inactive' => "\n\t\t<li class=\"disabled\">{link}</li>",
        'previous-inactive-link' => "<a href=\"#\" rel=\"prev\">{page}</a>",
        'regular' => "\n\t\t<li>{link}</li>",
        'regular-link' => "<a href=\"{uri}\">{page}</a>",
        'active' => "\n\t\t<li class=\"active\">{link}</li>",
        'active-link' => "<a href=\"#\">{page} <span class=\"sr-only\"></span></a>",
        'next' => "\n\t\t<li>{link}</li>",
        'next-marker' => "Next",
        'next-link' => "<a href=\"{uri}\" rel=\"next\">{page}</a>",
        'next-inactive' => "\n\t\t<li class=\"disabled\">{link}</li>",
        'next-inactive-link' => "<a href=\"#\" rel=\"next\">{page}</a>",
        'last' => "\n\t\t<li>{link}</li>",
        'last-marker' => "Last",
        'last-link' => "<a href=\"{uri}\">{page}</a>",
        'last-inactive' => "",
        'last-inactive-link' => "",
    ),
);
