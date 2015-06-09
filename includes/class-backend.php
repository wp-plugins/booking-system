<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/class-backend.php
* File Version            : 1.3.2
* Created / Last Modified : 26 January 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end PHP class.
*/

    if (!class_exists('DOPBSPBackEnd')){
        class DOPBSPBackEnd{
            /*
             * Constructor
             */
            function DOPBSPBackEnd(){
                global $pagenow;
                
                /*
                 * Init back end.
                 */
                add_action('init', array(&$this, 'init'));
                
                /*
                 * Add styles needed outside plugin pages.
                 */
                add_action('admin_enqueue_scripts', array(&$this, 'addWPAdminStyles'));
                
                /*
                 * Add widgets scripts.
                 */
                if ($pagenow == 'widgets.php'){
                    add_action('admin_enqueue_scripts', array(&$this, 'addWidgetScripts'));
                }
                
                /*
                 * Add styles and scripts only on plugin pages.
                 */
                
                if ($this->validPage()){
                    add_action('admin_enqueue_scripts', array(&$this, 'addStyles'));
                    add_action('admin_enqueue_scripts', array(&$this, 'addScripts'));
                } 
                else{
                    add_action('admin_enqueue_scripts', array(&$this, 'addWPAdminScripts'));
                }
            }
            
            /*
             * Add plugin's CSS files outside plugin's pages.
             */
            function addWPAdminStyles(){
                global $DOPBSP;
                
                /*
                 * Register Styles.
                 */
                wp_register_style('DOPBSP-css-backend-wp-admin', $DOPBSP->paths->url.'assets/gui/css/backend-wp-admin.css');
                wp_register_style('DOPBSP-css-backend-shortcodes', $DOPBSP->paths->url.'assets/gui/css/backend-shortcodes.css');
                
                /*
                 * Enqueue Styles.
                 */
                wp_enqueue_style('DOPBSP-css-backend-wp-admin');
                wp_enqueue_style('DOPBSP-css-backend-shortcodes');
            }
            
            /*
             * Add plugin's CSS files.
             */
            function addStyles(){
                global $DOPBSP;
                
                /*
                 * Register styles.
                 */
                wp_register_style('DOPBSP-css-dopselect', $DOPBSP->paths->url.'libraries/css/jquery.dop.Select.css');
                wp_register_style('DOPBSP-css-backend', $DOPBSP->paths->url.'assets/gui/css/backend.css');
                
                wp_register_style('DOPBSP-css-backend-addons', $DOPBSP->paths->url.'assets/gui/css/backend-addons.css');
                wp_register_style('DOPBSP-css-backend-calendar', $DOPBSP->paths->url.'assets/gui/css/jquery.dop.backend.BSPCalendar'.(DOPBSP_DEVELOPMENT_MODE ? '.alpha':'').'.css');
                wp_register_style('DOPBSP-css-backend-coupons', $DOPBSP->paths->url.'assets/gui/css/backend-coupons.css');
                wp_register_style('DOPBSP-css-backend-dashboard', $DOPBSP->paths->url.'assets/gui/css/backend-dashboard.css');
                wp_register_style('DOPBSP-css-backend-discounts', $DOPBSP->paths->url.'assets/gui/css/backend-discounts.css');
                wp_register_style('DOPBSP-css-backend-emails', $DOPBSP->paths->url.'assets/gui/css/backend-emails.css');
                wp_register_style('DOPBSP-css-backend-extras', $DOPBSP->paths->url.'assets/gui/css/backend-extras.css');
                wp_register_style('DOPBSP-css-backend-forms', $DOPBSP->paths->url.'assets/gui/css/backend-forms.css');
                wp_register_style('DOPBSP-css-backend-pro', $DOPBSP->paths->url.'assets/gui/css/backend-pro.css');
                wp_register_style('DOPBSP-css-backend-reservations', $DOPBSP->paths->url.'assets/gui/css/backend-reservations.css');
                wp_register_style('DOPBSP-css-backend-reservations-add', $DOPBSP->paths->url.'assets/gui/css/jquery.dop.backend.BSPReservationsAdd.css');
                wp_register_style('DOPBSP-css-backend-reservations-calendar', $DOPBSP->paths->url.'assets/gui/css/jquery.dop.backend.BSPReservationsCalendar.css');
                wp_register_style('DOPBSP-css-backend-settings', $DOPBSP->paths->url.'assets/gui/css/backend-settings.css');
                wp_register_style('DOPBSP-css-backend-themes', $DOPBSP->paths->url.'assets/gui/css/backend-themes.css');
                wp_register_style('DOPBSP-css-backend-tools', $DOPBSP->paths->url.'assets/gui/css/backend-tools.css');
                wp_register_style('DOPBSP-css-backend-translation', $DOPBSP->paths->url.'assets/gui/css/backend-translation.css');

                /*
                 * Enqueue styles.
                 */
                wp_enqueue_style('thickbox');
                wp_enqueue_style('DOPBSP-css-dopselect');
                wp_enqueue_style('DOPBSP-css-backend');
                wp_enqueue_style('DOPBSP-css-backend-addons');
                wp_enqueue_style('DOPBSP-css-backend-calendar');
                wp_enqueue_style('DOPBSP-css-backend-coupons');
                wp_enqueue_style('DOPBSP-css-backend-dashboard');
                wp_enqueue_style('DOPBSP-css-backend-emails');
                wp_enqueue_style('DOPBSP-css-backend-discounts');
                wp_enqueue_style('DOPBSP-css-backend-extras');
                wp_enqueue_style('DOPBSP-css-backend-forms');
                wp_enqueue_style('DOPBSP-css-backend-pro');
                wp_enqueue_style('DOPBSP-css-backend-reservations');
                wp_enqueue_style('DOPBSP-css-backend-reservations-add');
                wp_enqueue_style('DOPBSP-css-backend-reservations-calendar');
                wp_enqueue_style('DOPBSP-css-backend-settings');
                wp_enqueue_style('DOPBSP-css-backend-themes');
                wp_enqueue_style('DOPBSP-css-backend-tools');
                wp_enqueue_style('DOPBSP-css-backend-translation');
            }
            
            /*
             * Add admin JavaScript files.
             */
            function addWPAdminScripts(){
                global $DOPBSP;
                
                /*
                 * Register JavaScript.
                 */
                wp_register_script('DOPBSP-js-backend-shortcodes', $DOPBSP->paths->url.'assets/js/shortcodes/backend-shortcodes.js', array('jquery'), false, true);
                
                /*
                 * Enqueue JavaScript.
                 */
                if (!wp_script_is('jquery', 'queue')){
                    wp_enqueue_script('jquery');
                }
                
                /*
                 * Enqueue JavaScript.
                 */
                wp_enqueue_script('DOPBSP-js-backend-shortcodes');
            }
            
            /*
             * Add widget JavaScript files.
             */
            function addWidgetScripts(){
                global $DOPBSP;
                
                /*
                 * Register JavaScript.
                 */
                wp_register_script('DOPBSP-js-backend-widget', $DOPBSP->paths->url.'assets/js/widgets/backend-widgets.js', array('jquery'), false, true);
                
                /*
                 * Enqueue JavaScript.
                 */
                if (!wp_script_is('jquery', 'queue')){
                    wp_enqueue_script('jquery');
                }
                
                wp_enqueue_script('DOPBSP-js-backend-widget');
            }
            
            /*
             * Add plugin's JavaScript files.
             */
            function addScripts(){
                global $DOPBSP;
                
                /*
                 * Register JavaScript.
                 */
                
                /*
                 * Libraries.
                 */
                wp_register_script('DOP-js-prototypes', $DOPBSP->paths->url.'libraries/js/dop-prototypes.js', array('jquery'));
                wp_register_script('DOP-js-jquery-dopselect', $DOPBSP->paths->url.'libraries/js/jquery.dop.Select.js', array('jquery'));
                wp_register_script('DOPBSP-js-isotope', $DOPBSP->paths->url.'libraries/js/isotope.pkgd.min.js', array('jquery'), false, true);
                
                /*
                 * Back end.
                 */
                wp_register_script('DOPBSP-js-backend', $DOPBSP->paths->url.'assets/js/backend.js', array('jquery'), false, true);
                
                /*
                 * Addons
                 */
                wp_register_script('DOPBSP-js-backend-addons', $DOPBSP->paths->url.'assets/js/addons/backend-addons.js', array('jquery'), false, true);
                
                /*
                 * Amenities
                 */
                wp_register_script('DOPBSP-js-backend-amenities', $DOPBSP->paths->url.'assets/js/amenities/backend-amenities.js', array('jquery'), false, true);
                
                /*
                 * Calendars
                 */
                wp_register_script('DOPBSP-js-jquery-backend-calendar', $DOPBSP->paths->url.'assets/js/jquery.dop.backend.BSPCalendar'.(DOPBSP_DEVELOPMENT_MODE ? '.alpha':'').'.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-calendars', $DOPBSP->paths->url.'assets/js/calendars/backend-calendars.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-calendar', $DOPBSP->paths->url.'assets/js/calendars/backend-calendar.js', array('jquery'), false, true);
                
                /*
                 * Coupons
                 */
                wp_register_script('DOPBSP-js-backend-coupons', $DOPBSP->paths->url.'assets/js/coupons/backend-coupons.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-coupon', $DOPBSP->paths->url.'assets/js/coupons/backend-coupon.js', array('jquery'), false, true);
                
                /*
                 * Dashboard
                 */
                wp_register_script('DOPBSP-js-backend-dashboard', $DOPBSP->paths->url.'assets/js/dashboard/backend-dashboard.js', array('jquery'), false, true);
                
                /*
                 * Discounts
                 */
                wp_register_script('DOPBSP-js-backend-discounts', $DOPBSP->paths->url.'assets/js/discounts/backend-discounts.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-discount', $DOPBSP->paths->url.'assets/js/discounts/backend-discount.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-discount-items', $DOPBSP->paths->url.'assets/js/discounts/backend-discount-items.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-discount-item', $DOPBSP->paths->url.'assets/js/discounts/backend-discount-item.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-discount-item-rules', $DOPBSP->paths->url.'assets/js/discounts/backend-discount-item-rules.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-discount-item-rule', $DOPBSP->paths->url.'assets/js/discounts/backend-discount-item-rule.js', array('jquery'), false, true);
                
                /*
                 * Emails
                 */
                wp_register_script('DOPBSP-js-backend-emails', $DOPBSP->paths->url.'assets/js/emails/backend-emails.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-email', $DOPBSP->paths->url.'assets/js/emails/backend-email.js', array('jquery'), false, true);
                
                /*
                 * Events
                 */
                wp_register_script('DOPBSP-js-backend-events', $DOPBSP->paths->url.'assets/js/events/backend-events.js', array('jquery'), false, true);
                
                /*
                 * Extras
                 */
                wp_register_script('DOPBSP-js-backend-extras', $DOPBSP->paths->url.'assets/js/extras/backend-extras.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-extra', $DOPBSP->paths->url.'assets/js/extras/backend-extra.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-extra-groups', $DOPBSP->paths->url.'assets/js/extras/backend-extra-groups.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-extra-group', $DOPBSP->paths->url.'assets/js/extras/backend-extra-group.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-extra-group-items', $DOPBSP->paths->url.'assets/js/extras/backend-extra-group-items.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-extra-group-item', $DOPBSP->paths->url.'assets/js/extras/backend-extra-group-item.js', array('jquery'), false, true);
                
                /*
                 * Fees
                 */
                wp_register_script('DOPBSP-js-backend-fees', $DOPBSP->paths->url.'assets/js/fees/backend-fees.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-fee', $DOPBSP->paths->url.'assets/js/fees/backend-fee.js', array('jquery'), false, true);
                
                /*
                 * Forms
                 */
                wp_register_script('DOPBSP-js-backend-forms', $DOPBSP->paths->url.'assets/js/forms/backend-forms.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-form', $DOPBSP->paths->url.'assets/js/forms/backend-form.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-form-fields', $DOPBSP->paths->url.'assets/js/forms/backend-form-fields.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-form-field', $DOPBSP->paths->url.'assets/js/forms/backend-form-field.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-form-field-select-options', $DOPBSP->paths->url.'assets/js/forms/backend-form-field-select-options.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-form-field-select-option', $DOPBSP->paths->url.'assets/js/forms/backend-form-field-select-option.js', array('jquery'), false, true);
                
                /*
                 * Languages
                 */
                wp_register_script('DOPBSP-js-backend-languages', $DOPBSP->paths->url.'assets/js/languages/backend-languages.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-language', $DOPBSP->paths->url.'assets/js/languages/backend-language.js', array('jquery'), false, true);
                
                /*
                 * PRO
                 */
                wp_register_script('DOPBSP-js-backend-pro', $DOPBSP->paths->url.'assets/js/pro/backend-pro.js', array('jquery'), false, true);
                
                /*
                 * Reservations
                 */
                wp_register_script('DOPBSP-js-jquery-backend-reservations-add', $DOPBSP->paths->url.'assets/js/jquery.dop.backend.BSPReservationsAdd.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-jquery-backend-reservations-calendar', $DOPBSP->paths->url.'assets/js/jquery.dop.backend.BSPReservationsCalendar.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-reservations', $DOPBSP->paths->url.'assets/js/reservations/backend-reservations.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-reservations-add', $DOPBSP->paths->url.'assets/js/reservations/backend-reservations-add.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-reservations-calendar', $DOPBSP->paths->url.'assets/js/reservations/backend-reservations-calendar.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-reservations-list', $DOPBSP->paths->url.'assets/js/reservations/backend-reservations-list.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-reservation', $DOPBSP->paths->url.'assets/js/reservations/backend-reservation.js', array('jquery'), false, true);
                
                /*
                 * Reviews
                 */
                wp_register_script('DOPBSP-js-backend-reviews', $DOPBSP->paths->url.'assets/js/reviews/backend-reviews.js', array('jquery'), false, true);
                
                /*
                 * Rules
                 */
                wp_register_script('DOPBSP-js-backend-rules', $DOPBSP->paths->url.'assets/js/rules/backend-rules.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-rule', $DOPBSP->paths->url.'assets/js/rules/backend-rule.js', array('jquery'), false, true);
                
                /*
                 * Settings
                 */
                wp_register_script('DOPBSP-js-backend-settings', $DOPBSP->paths->url.'assets/js/settings/backend-settings.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-settings-calendar', $DOPBSP->paths->url.'assets/js/settings/backend-settings-calendar.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-settings-notifications', $DOPBSP->paths->url.'assets/js/settings/backend-settings-notifications.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-settings-payment-gateways', $DOPBSP->paths->url.'assets/js/settings/backend-settings-payment-gateways.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-settings-licenses', $DOPBSP->paths->url.'assets/js/settings/backend-settings-licenses.js', array('jquery'), false, true);
                
                /*
                 * Staff
                 */
                wp_register_script('DOPBSP-js-backend-staff', $DOPBSP->paths->url.'assets/js/staff/backend-staff.js', array('jquery'), false, true);
                
                /*
                 * Templates
                 */
                wp_register_script('DOPBSP-js-backend-templates', $DOPBSP->paths->url.'assets/js/templates/backend-templates.js', array('jquery'), false, true);
                
                /*
                 * Themes
                 */
                wp_register_script('DOPBSP-js-backend-themes', $DOPBSP->paths->url.'assets/js/themes/backend-themes.js', array('jquery'), false, true);
                
                /*
                 * Tools
                 */
                wp_register_script('DOPBSP-js-backend-tools', $DOPBSP->paths->url.'assets/js/tools/backend-tools.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-tools-repair-calendars-settings', $DOPBSP->paths->url.'assets/js/tools/backend-tools-repair-calendars-settings.js', array('jquery'), false, true);
                wp_register_script('DOPBSP-js-backend-tools-repair-database-text', $DOPBSP->paths->url.'assets/js/tools/backend-tools-repair-database-text.js', array('jquery'), false, true);
                
                /*
                 * Translation
                 */
                wp_register_script('DOPBSP-js-backend-translation', $DOPBSP->paths->url.'assets/js/translation/backend-translation.js', array('jquery'), false, true);
                
                /*
                 * WooCommerce
                 */
                wp_register_script('DOPBSP-js-backend-woocommerce', $DOPBSP->paths->url.'assets/js/woocommerce/backend-woocommerce.js', array('jquery'), false, true);

                /*
                 * Enqueue JavaScript.
                 */
                
                /*
                 * Libraries.
                 */
                if (!wp_script_is('jquery', 'queue')){
                    wp_enqueue_script('jquery');
                }
                
                if (!wp_script_is('jquery-effects-core', 'queue')){
                    wp_enqueue_script('jquery-effects-core');
                }
                
                if (!wp_script_is('jquery-ui-datepicker', 'queue')){
                    wp_enqueue_script('jquery-ui-datepicker');
                }
                
                if (!wp_script_is('jquery-ui-sortable', 'queue')){
                    wp_enqueue_script('jquery-ui-sortable');
                }
                
                wp_enqueue_script('DOP-js-prototypes');
                wp_enqueue_script('DOP-js-jquery-dopselect');
                wp_enqueue_script('DOPBSP-js-isotope');
                
                /*
                 * Back end.
                 */
                wp_enqueue_script('DOPBSP-js-backend');
                
                /*
                 * Addons
                 */
                wp_enqueue_script('DOPBSP-js-backend-addons');
                
                /*
                 * Addons
                 */
                wp_enqueue_script('DOPBSP-js-backend-amenities');
                
                /*
                 * Calendars
                 */
                wp_enqueue_script('DOPBSP-js-jquery-backend-calendar');
                wp_enqueue_script('DOPBSP-js-backend-calendars');
                wp_enqueue_script('DOPBSP-js-backend-calendar');
                
                /*
                 * Coupons
                 */
                wp_enqueue_script('DOPBSP-js-backend-coupons');
                wp_enqueue_script('DOPBSP-js-backend-coupon');
                
                /*
                 * Dashboard
                 */
                wp_enqueue_script('DOPBSP-js-backend-dashboard');
                
                /*
                 * Discounts
                 */
                wp_enqueue_script('DOPBSP-js-backend-discounts');
                wp_enqueue_script('DOPBSP-js-backend-discount');
                wp_enqueue_script('DOPBSP-js-backend-discount-items');
                wp_enqueue_script('DOPBSP-js-backend-discount-item');
                wp_enqueue_script('DOPBSP-js-backend-discount-item-rules');
                wp_enqueue_script('DOPBSP-js-backend-discount-item-rule');
                
                /*
                 * Emails
                 */
                wp_enqueue_script('DOPBSP-js-backend-emails');
                wp_enqueue_script('DOPBSP-js-backend-email');
                
                /*
                 * Events
                 */
                wp_enqueue_script('DOPBSP-js-backend-events');
                
                /*
                 * Extras
                 */
                wp_enqueue_script('DOPBSP-js-backend-extras');
                wp_enqueue_script('DOPBSP-js-backend-extra');
                wp_enqueue_script('DOPBSP-js-backend-extra-groups');
                wp_enqueue_script('DOPBSP-js-backend-extra-group');
                wp_enqueue_script('DOPBSP-js-backend-extra-group-items');
                wp_enqueue_script('DOPBSP-js-backend-extra-group-item');
                
                /*
                 * Fees
                 */
                wp_enqueue_script('DOPBSP-js-backend-fees');
                wp_enqueue_script('DOPBSP-js-backend-fee');
                
                /*
                 * Forms
                 */
                wp_enqueue_script('DOPBSP-js-backend-forms');
                wp_enqueue_script('DOPBSP-js-backend-form');
                wp_enqueue_script('DOPBSP-js-backend-form-fields');
                wp_enqueue_script('DOPBSP-js-backend-form-field');
                wp_enqueue_script('DOPBSP-js-backend-form-field-select-options');
                wp_enqueue_script('DOPBSP-js-backend-form-field-select-option');
                
                /*
                 * Languages
                 */
                wp_enqueue_script('DOPBSP-js-backend-languages');
                wp_enqueue_script('DOPBSP-js-backend-language');
                
                /*
                 * PRO
                 */
                wp_enqueue_script('DOPBSP-js-backend-pro');
                
                /*
                 * Reservations
                 */
                wp_enqueue_script('DOPBSP-js-jquery-backend-reservations-add');
                wp_enqueue_script('DOPBSP-js-jquery-backend-reservations-calendar');
                wp_enqueue_script('DOPBSP-js-backend-reservations');
                wp_enqueue_script('DOPBSP-js-backend-reservations-add');
                wp_enqueue_script('DOPBSP-js-backend-reservations-calendar');
                wp_enqueue_script('DOPBSP-js-backend-reservations-list');
                wp_enqueue_script('DOPBSP-js-backend-reservation');
                
                /*
                 * Reviews
                 */
                wp_enqueue_script('DOPBSP-js-backend-reviews');
                
                /*
                 * Rules
                 */
                wp_enqueue_script('DOPBSP-js-backend-rules');
                wp_enqueue_script('DOPBSP-js-backend-rule');
                
                /*
                 * Settings
                 */
                wp_enqueue_script('DOPBSP-js-backend-settings');
                wp_enqueue_script('DOPBSP-js-backend-settings-calendar');
                wp_enqueue_script('DOPBSP-js-backend-settings-notifications');
                wp_enqueue_script('DOPBSP-js-backend-settings-payment-gateways');
                wp_enqueue_script('DOPBSP-js-backend-settings-licenses');
                
                /*
                 * Staff
                 */
                wp_enqueue_script('DOPBSP-js-backend-staff');
                
                /*
                 * Templates
                 */
                wp_enqueue_script('DOPBSP-js-backend-templates');
                
                /*
                 * Themes
                 */
                wp_enqueue_script('DOPBSP-js-backend-themes');
                
                /*
                 * Tools
                 */
                wp_enqueue_script('DOPBSP-js-backend-tools');
                wp_enqueue_script('DOPBSP-js-backend-tools-repair-calendars-settings');
                wp_enqueue_script('DOPBSP-js-backend-tools-repair-database-text');
                
                /*
                 * Translation
                 */
                wp_enqueue_script('DOPBSP-js-backend-translation');
                
                /*
                 * WooCommerce
                 */
                wp_enqueue_script('DOPBSP-js-backend-woocommerce');
            }
            
            /*
             * Initialize plugin back end.
             */
            function init(){
                global $DOPBSP;
                
                $DOPBSP->classes->database->init();
                
                /*
                 * Reset database translation.
                 */
                if (DOPBSP_CONFIG_REPAIR_TRANSLATION_DATABASE){
                    $DOPBSP->classes->translation->reset();
                }
                $DOPBSP->classes->translation->set();
            }
            
            /*
             * Check if current back end page is a plugin page.
             * 
             * @get action (string): wp post action
             * @get post_type (string): wp post type
             * @get page (string): wp page type
             * 
             * @return true/false
             */
            function validPage(){
                if (isset($_GET['page'])){
                    /*
                     * Verify if current page is a plugin page.
                     */
                    if ($_GET['page'] == 'dopbsp'
                        || $_GET['page'] == 'dopbsp-addons'
                        || $_GET['page'] == 'dopbsp-amenities'
                        || $_GET['page'] == 'dopbsp-calendars'
                        || $_GET['page'] == 'dopbsp-coupons'
                        || $_GET['page'] == 'dopbsp-discounts'
                        || $_GET['page'] == 'dopbsp-emails'
                        || $_GET['page'] == 'dopbsp-events'
                        || $_GET['page'] == 'dopbsp-extras'
                        || $_GET['page'] == 'dopbsp-fees'
                        || $_GET['page'] == 'dopbsp-forms'
                        || $_GET['page'] == 'dopbsp-pro'
                        || $_GET['page'] == 'dopbsp-reservations'
                        || $_GET['page'] == 'dopbsp-reviews'
                        || $_GET['page'] == 'dopbsp-rules'
                        || $_GET['page'] == 'dopbsp-settings'
                        || $_GET['page'] == 'dopbsp-staff'
                        || $_GET['page'] == 'dopbsp-templates'
                        || $_GET['page'] == 'dopbsp-themes'
                        || $_GET['page'] == 'dopbsp-tools'
                        || $_GET['page'] == 'dopbsp-translation'){
                        return true;
                    }
                    else{
                        return false;
                    }
                }
                else if (isset($_GET['post_type'])){
                    /*
                     * Verify if current page is a custom post page.
                     */
                    return true;
                }
                else if (isset($_GET['action'])){
                    /*
                     * Verify if current page is a custom post edit page.
                     */
                    if ($_GET['action'] == 'edit') {
                        return true; 
                    } 
                    else{
                        return false;
                    }
                }
                else{
                    return false;
                }
            }
        }
    }