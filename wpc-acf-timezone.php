<?php
/*
Plugin Name: Timezone Field for Advanced Custom Fields
Plugin URI: https://github.com/WP-Catalyst/acf-timezone
Description: An Advanced Custom Fields plugin that allows you to pick from a list of Timezones.
Version: 1.0.0
Author: WP Catalyst
Author URI: https://caleb-smith.dev
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

add_action('init', function () {
    if (!function_exists('acf_register_field_type')) {
        return;
    }

    require_once __DIR__ . '/class-wpc-acf-field-timezone-picker.php';

    acf_register_field_type('Wpc_Acf_Field_Timezone_Picker');
});
