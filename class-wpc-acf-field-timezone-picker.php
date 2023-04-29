<?php

/**
 * Defines the custom field type class.
 */

if (!defined('ABSPATH')) {
    exit;
}

class Wpc_Acf_Field_Timezone_Picker extends \acf_field
{
    /**
     * Controls field type visibilty in REST requests.
     *
     * @var bool
     */
    public $show_in_rest = true;

    /**
     * Environment values relating to the theme or plugin.
     *
     * @var array $env Plugin or theme context such as 'url' and 'version'.
     */
    private $env;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->name = 'timezone_picker';
        $this->label = _x('Timezone', 'noun', 'wp-catalyst');
        $this->description   = __('A dropdown list with a selection of timezones to choose from. The list of options matches what you see in the WordPress settings.', 'acf');
        $this->category = 'choice'; // basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME

        /**
         * Strings used in JavaScript code.
         *
         * Allows JS strings to be translated in PHP and loaded in JS via:
         *
         * ```js
         * const errorMessage = acf._e("FIELD_NAME", "error");
         * ```
         */
        $this->l10n = array(
            'error'    => __('Error! Please select a value.', 'wp-catalyst'),
        );

        $this->env = array(
            'url'     => site_url(str_replace(ABSPATH, '', __DIR__)), // URL to the directory.
            'version' => '1.0', // Replace this with your theme or plugin version constant.
        );

        parent::__construct();
    }

    /**
     * HTML content to show when a publisher edits the field on the edit screen.
     *
     * @param array $field The field settings and values.
     * @return void
     */
    public function render_field($field)
    {
        $fieldValue = trim($field['value']);

        if (!$fieldValue) {
            $fieldValue = get_option('timezone_string') ?: 'UTC';
        }
?>
        <select name="<?php echo esc_attr($field['name']) ?>">
            <?php echo wp_timezone_choice($fieldValue); ?>
        </select>
<?php
    }
}
