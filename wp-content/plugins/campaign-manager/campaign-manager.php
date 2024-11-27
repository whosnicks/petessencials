<?php
/*
 * Plugin Name:       Campaign Manager
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Configure campaign and choose templates.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Nick Gabe
 * Author URI:        https://nickgabe.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       campaign-manager
 * Domain Path:       /languages
 * Requires Plugins:  
 */

//  TODO: Partials and animals CPT must be a part of the plugin

//  Enqueue scripts
function enqueue_campaign_scripts()
{
    wp_enqueue_style('maincss', plugin_dir_url(__FILE__) . 'assets/css/main.css');
}
add_action('admin_enqueue_scripts', 'enqueue_campaign_scripts');

// Admin campaign menu
function campaign_menu()
{
    add_menu_page('Campaign Settings', 'Campaign Settings', 'manage_options', 'campaign-settings', 'campaign_options', 'dashicons-megaphone', 25);
}

function campaign_options()
{
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }
?>
    <form action="">
        <fieldset class="campaing_form">
            <legend>Choose your campaign</legend>
            <div class="campaign_item">
                <label for="vaccine_campaign">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSLUfNZ2KEN6iJcGH5OvJOCxsfLm2tO9Hatdw&s" alt="">
                    Vaccine Campaign
                    <input type="radio" name="campaign" id="vaccine_campaign">
                </label>
            </div>

            <div class=" campaign_item">
                <label for="adopt_campaign">

                    <img src="<?= plugin_dir_url(__FILE__) . '/assets/img/adopt_campaign.png' ?>" alt="">
                    Adopt Campaign
                    <input type="radio" name="campaign" id="adopt_campaign">
                </label>
            </div>
            </div>
        </fieldset>


    </form>
<?php
}

add_action('admin_menu', 'campaign_menu');
