<?php
/*
Plugin Name: Booking System (Booking Calendar)
Version: 1.3
Plugin URI: http://www.dopdemo.net/wp/booking-system
Description: This Plugin will help you to easily create a booking/reservation system your WordPress website or blog.
Author: Dot on Paper
Author URI: http://www.dotonpaper.net

Change log:

        1.3.1 (20124-05-11)
	
            * TinyMCE shortcodes bug fixed.

        1.3 (20124-05-06)
	
            * Security fixes.
            * 3.9 compatibilities fixed.
 
        1.2.1 (2012-12-01)
	
            * Calendar "is stuck" bug fix.
  
        1.2 (2012-08-29)
	
            * Localhost bugs fixed.

        1.1 (2012-08-27)
	
            * Access-Control-Allow-Origin Buster bug fixed.
            * French Translation updated thanks to Asselin de Beauville Christophe - http://gegeek.net/
            * German Translation updated thanks to Dieter Pfenning - dieter.pfenning@winball.de
            * Polish Translation updated thanks to Kwasniewski Krzysztof - http://etechnologie.pl
            * Small fixes.

        1.0 (2012-07-28)
	
            * Initial release.
		
Installation: Upload the folder booking-system from the zip file to "wp-content/plugins/" and activate the plugin in your admin panel or upload booking-system.zip in the "Add new" section.
*/

    include_once 'views/templates.php';
    include_once 'views/currencies.php';
    include_once 'dopbs-email.php';
    include_once 'dopbs-frontend.php';
    include_once 'dopbs-backend.php';
    include_once 'dopbs-backend-forms.php';
    include_once 'dopbs-backend-reservations.php';

    if (is_admin()){// If admin is loged in admin init administration panel.
        // Get selected language
        $current_backend_language = get_option('DOPBS_backend_language');

        if ($current_backend_language == ''){
            $current_backend_language = 'en';
            add_option('DOPBS_backend_language', 'en');
        }

        // Include language file.
        include_once "translation/backend/".$current_backend_language.".php";

        if (class_exists("DOPBookingSystemBackEnd")){
            $DOPBS_pluginSeries = new DOPBookingSystemBackEnd();
        }
        
        if (class_exists("DOPBookingSystemBackEndForms")){
            $DOPBS_pluginSeries_forms = new DOPBookingSystemBackEndForms();
        }
        if (class_exists("DOPBookingSystemBackEndReservations")){
            $DOPBS_pluginSeries_reservations = new DOPBookingSystemBackEndReservations();
        }

        if (!function_exists("DOPBookingSystemBackEnd_ap")){// Initialize the admin panel.
            function DOPBookingSystemBackEnd_ap(){
                global $DOPBS_pluginSeries;
                global $DOPBS_pluginSeries_forms;
                global $DOPBS_pluginSeries_reservations;

                if (!isset($DOPBS_pluginSeries)
                    || !isset($DOPBS_pluginSeries_forms)
                    || !isset($DOPBS_pluginSeries_reservations)){
                    return;
                }

                if (function_exists('add_options_page')){
                    add_menu_page(DOPBS_TITLE, DOPBS_TITLE, 'edit_posts', 'dopbs', array(&$DOPBS_pluginSeries, 'printAdminPage'), plugins_url('assets/gui/images/dop-icon.png', __FILE__));
                    add_submenu_page('dopbs', DOPBS_TITLE_BOOKING_FORMS, DOPBS_TITLE_BOOKING_FORMS, 'edit_posts', 'dopbs-booking-forms', array(&$DOPBS_pluginSeries_forms, 'printBookingFormsPage'));
                }
            }
        }

        if (isset($DOPBS_pluginSeries)){// Init AJAX functions.
            add_action('admin_menu', 'DOPBookingSystemBackEnd_ap');

// Change Translation      
            add_action('wp_ajax_dopbs_change_translation', array(&$DOPBS_pluginSeries, 'changeTranslation'));
// Calendars admin AJAX requests.
            add_action('wp_ajax_dopbs_show_calendars', array(&$DOPBS_pluginSeries, 'showCalendars'));
            add_action('wp_ajax_dopbs_show_calendar', array(&$DOPBS_pluginSeries, 'showCalendar'));
            add_action('wp_ajax_dopbs_load_schedule', array(&$DOPBS_pluginSeries, 'loadSchedule'));
            add_action('wp_ajax_dopbs_save_schedule', array(&$DOPBS_pluginSeries, 'saveSchedule'));
            add_action('wp_ajax_dopbs_delete_schedule', array(&$DOPBS_pluginSeries, 'deleteSchedule'));
            add_action('wp_ajax_dopbs_show_calendar_settings', array(&$DOPBS_pluginSeries, 'showCalendarSettings'));
            add_action('wp_ajax_dopbs_edit_calendar', array(&$DOPBS_pluginSeries, 'editCalendar'));
// Reservations admin AJAX requests.            
            add_action('wp_ajax_dopbs_show_no_reservations', array(&$DOPBS_pluginSeries_reservations, 'showNoReservations'));
            add_action('wp_ajax_dopbs_show_reservations', array(&$DOPBS_pluginSeries_reservations, 'showReservations'));
            add_action('wp_ajax_dopbs_approve_reservation', array(&$DOPBS_pluginSeries_reservations, 'approveReservation'));
            add_action('wp_ajax_dopbs_reject_reservation', array(&$DOPBS_pluginSeries_reservations, 'rejectReservation'));
            add_action('wp_ajax_dopbs_cancel_reservation', array(&$DOPBS_pluginSeries_reservations, 'cancelReservation'));
// Forms admin AJAX requests.
            add_action('wp_ajax_dopbs_show_booking_forms', array(&$DOPBS_pluginSeries_forms, 'showBookingForms'));
            add_action('wp_ajax_dopbs_show_booking_form', array(&$DOPBS_pluginSeries_forms, 'showBookingForm'));
            add_action('wp_ajax_dopbs_edit_booking_form', array(&$DOPBS_pluginSeries_forms, 'editBookingForm'));
// Forms fields admin AJAX requests.
            add_action('wp_ajax_dopbs_show_booking_form_fields', array(&$DOPBS_pluginSeries_forms, 'showBookingFormFields'));
            add_action('wp_ajax_dopbs_add_booking_form_field', array(&$DOPBS_pluginSeries_forms, 'addBookingFormField'));
            add_action('wp_ajax_dopbs_edit_booking_form_field', array(&$DOPBS_pluginSeries_forms, 'editBookingFormField'));
            add_action('wp_ajax_dopbs_update_booking_form_field', array(&$DOPBS_pluginSeries_forms, 'updateBookingFormFields'));
            add_action('wp_ajax_dopbs_delete_booking_form_field', array(&$DOPBS_pluginSeries_forms, 'deleteBookingFormField'));
            add_action('wp_ajax_dopbs_add_booking_form_field_select_option', array(&$DOPBS_pluginSeries_forms, 'addBookingFormFieldSelectOption'));
            add_action('wp_ajax_dopbs_edit_booking_form_field_select_option', array(&$DOPBS_pluginSeries_forms, 'editBookingFormFieldSelectOption'));
            add_action('wp_ajax_dopbs_delete_booking_form_field_select_option', array(&$DOPBS_pluginSeries_forms, 'deleteBookingFormFieldSelectOption'));
        }
    }
    else{// If you view the WordPress website init the gallery.
        if (class_exists("DOPBookingSystemFrontEnd")){
            $DOPBS_pluginSeries = new DOPBookingSystemFrontEnd();
        }

        if (isset($DOPBS_pluginSeries)){// Init AJAX functions.
            add_action('wp_ajax_dopbs_load_schedule', array(&$DOPBS_pluginSeries, 'loadSchedule'));
            add_action('wp_ajax_dopbs_paypal_check', array(&$DOPBS_pluginSeries, 'paypalCheck'));
            add_action('wp_ajax_dopbs_book_request', array(&$DOPBS_pluginSeries, 'bookRequest'));
        }
    }

// Uninstall

    if (!function_exists("DOPBookingSystemUninstall")){
        function DOPBookingSystemUninstall() {
            global $wpdb;

            $tables = $wpdb->get_results('SHOW TABLES');

            foreach ($tables as $table){
                $table_name = $table->Tables_in_studios_wp;

                if (strrpos($table_name, 'dopbs_settings') !== false ||
                    strrpos($table_name, 'dopbs_calendars') !== false ||
                    strrpos($table_name, 'dopbs_days') !== false ||
                    strrpos($table_name, 'dopbs_reservations') !== false){
                    $wpdb->query("DROP TABLE IF EXISTS $table_name");
                }
            }
            
            delete_option('DOPBS_db_version');
        }
        
        register_uninstall_hook(__FILE__, 'DOPBookingSystemUninstall');
    }
    
?>