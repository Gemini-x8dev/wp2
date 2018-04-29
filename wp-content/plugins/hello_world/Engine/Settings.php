<?php
/*
 * The guy responsible for all cherad on wordpress
 * */
require_once dirname(__FILE__) . "/../HwInit.php";

class Settings {

    public function addSettingsPage () {

        add_options_page(
            'Bispoke',
            'Bespoke',
            'manage_options',
            HwInit::ADMIN . '/bispoke_settings.php',
            null
        );

    }

    public function addANewSetting () {
        // register a new setting for "reading" page
        register_setting('media', 'wporg_setting_name',[
            'type' => 'string',
            'description' => 'I dont know what the heck its doing..'
        ]);

        // register a new section in the "reading" page
        add_settings_section(
            'wporg_settings_section',
            'Bispoke Settings',
            [$this,'wporg_settings_section_cb'],
            'bespoke'
        );

        // register a new field in the "wporg_settings_section" section, inside the "reading" page
        add_settings_field(
            'wporg_settings_field',
            'Dull setting',
            [$this,'wporg_settings_field_cb'],
            'bespoke',
            'wporg_settings_section'
        );
    }

    /**
     * callback functions
     */

    // section content cb
    public function wporg_settings_section_cb()
    {
        echo '<p>This is a totally bispoke set of settings. I dont know how the heck they could be used.</p>';
    }

    // field content cb
    public function wporg_settings_field_cb()
    {
        // get the value of the setting we've registered with register_setting()
        $setting = get_option('wporg_setting_name');
        // output the field
        ?>
        <input type="text" name="wporg_setting_name" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
        <?php
    }
}