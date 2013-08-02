<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 1.0
* File                    : dopbs-backend.php
* File Version            : 1.0
* Created / Last Modified : 29 July 2013
* Author                  : Dot on Paper
* Copyright               : © 2013 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System Back End Class.
*/

    if (!class_exists("DOPBookingSystemBackEnd")){
        class DOPBookingSystemBackEnd{
            private $DOPBS_AddEditCalendars;
            private $DOPBS_db_version = 1.0;

            function DOPBookingSystemBackEnd(){// Constructor.
                if (is_admin()){
                    if ($this->validPage()){
                        $this->DOPBS_AddEditCalendars = new DOPBSTemplates();
                        add_action('admin_enqueue_scripts', array(&$this, 'addStyles'));
                        add_action('admin_enqueue_scripts', array(&$this, 'addScripts'));
                    }

                    $this->addDOPBStoTinyMCE();
                    $this->init();
                }
            }
            
            function addStyles(){
                // Register Styles.
                wp_register_style('DOPBS_DOPBookingSystemStyle', plugins_url('assets/gui/css/jquery.dop.BackendBookingSystem.css', __FILE__));
                wp_register_style('DOPBS_AdminStyle', plugins_url('assets/gui/css/backend-style.css', __FILE__));

                // Enqueue Styles.
                wp_enqueue_style('thickbox');
                wp_enqueue_style('DOPBS_DOPBookingSystemStyle');
                wp_enqueue_style('DOPBS_AdminStyle');
            }
            
            function addScripts(){
                // Register JavaScript.
                wp_register_script('DOPBS_DOPBookingSystemJS', plugins_url('assets/js/jquery.dop.BackendBookingSystem.js', __FILE__), array('jquery'), false, true);
                wp_register_script('DOPBS_DOPBSJS', plugins_url('assets/js/dopbs-backend.js', __FILE__), array('jquery'), false, true);
                wp_register_script('DOPBS_DOPBSJS_FORMS', plugins_url('assets/js/dopbs-backend-forms.js', __FILE__), array('jquery'), false, true);

                // Enqueue JavaScript.
                if (!wp_script_is('jquery', 'queue')){
                    wp_enqueue_script('jquery');
                }
                //wp_enqueue_script('jqueryUI');
                wp_enqueue_script('DOPBS_DOPBookingSystemJS');
                wp_enqueue_script('DOPBS_DOPBSJS');
                wp_enqueue_script('DOPBS_DOPBSJS_FORMS');
                
                if (!wp_script_is('jquery-ui-sortable', 'queue')){
                    wp_enqueue_script('jquery-ui-sortable');
                }
            }
            
            function init(){// Admin init.
                $this->initConstants();
                $this->initTables();
            }

            function initConstants(){// Constants init.
                global $wpdb;

                // Paths
                if (!defined('DOPBS_Plugin_AbsPath')){
                    define('DOPBS_Plugin_AbsPath', ABSPATH.'wp-content/plugins/booking-system/');
                }
                if (!defined('DOPBS_Plugin_URL')){
                    define('DOPBS_Plugin_URL', WP_PLUGIN_URL.'/booking-system/');
                }
                
                // Tables
                if (!defined('DOPBS_Settings_table')){
                    define('DOPBS_Settings_table', $wpdb->prefix.'dopbs_settings');
                }
                if (!defined('DOPBS_Calendars_table')){
                    define('DOPBS_Calendars_table', $wpdb->prefix.'dopbs_calendars');
                }
                if (!defined('DOPBS_Days_table')){
                    define('DOPBS_Days_table', $wpdb->prefix.'dopbs_days');
                }
                if (!defined('DOPBS_Reservations_table')){
                    define('DOPBS_Reservations_table', $wpdb->prefix.'dopbs_reservations');
                }
                if (!defined('DOPBS_Forms_table')){
                    define('DOPBS_Forms_table', $wpdb->prefix.'dopbs_forms');
                }
                if (!defined('DOPBS_Forms_Fields_table')){
                    define('DOPBS_Forms_Fields_table', $wpdb->prefix.'dopbs_forms_fields');
                }
                if (!defined('DOPBS_Forms_Select_Options_table')){
                    define('DOPBS_Forms_Select_Options_table', $wpdb->prefix.'dopbs_forms_select_options');
                }
            }

            function validPage(){// Valid Admin Page.
                if (isset($_GET['page'])){
                    if ($_GET['page'] == 'dopbs' || $_GET['page'] == 'dopbs-booking-forms'){
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

            function initTables(){// Tables init.
                $current_db_version = get_option('DOPBS_db_version');
                
                if ($this->DOPBS_db_version != $current_db_version){
                    require_once(ABSPATH.'wp-admin/includes/upgrade.php');

                    $sql_settings = "CREATE TABLE " . DOPBS_Settings_table . " (
                                        id INT NOT NULL AUTO_INCREMENT,
                                        calendar_id INT NOT NULL,
                                        available_days VARCHAR(128) DEFAULT 'true,true,true,true,true,true,true' COLLATE utf8_unicode_ci NOT NULL,
                                        first_day INT DEFAULT 1 NOT NULL,
                                        currency INT DEFAULT 108 NOT NULL,
                                        date_type INT DEFAULT 1 NOT NULL,
                                        template VARCHAR(128) DEFAULT 'default' COLLATE utf8_unicode_ci NOT NULL,
                                        template_email VARCHAR(128) DEFAULT 'default' COLLATE utf8_unicode_ci NOT NULL,
                                        min_stay INT DEFAULT 1 NOT NULL,
                                        max_stay INT DEFAULT 0 NOT NULL,
                                        no_items_enabled VARCHAR(6) DEFAULT 'true' COLLATE utf8_unicode_ci NOT NULL,
                                        view_only VARCHAR(6) DEFAULT 'false' COLLATE utf8_unicode_ci NOT NULL,  
                                        page_url VARCHAR(128) DEFAULT '' COLLATE utf8_unicode_ci NOT NULL,
                                        notifications_email VARCHAR(128) DEFAULT '' COLLATE utf8_unicode_ci NOT NULL,                                       
                                        smtp_enabled VARCHAR(6) DEFAULT 'false' COLLATE utf8_unicode_ci NOT NULL,                                     
                                        smtp_host_name VARCHAR(128) DEFAULT '' COLLATE utf8_unicode_ci NOT NULL,
                                        smtp_host_port INT DEFAULT 25 NOT NULL,
                                        smtp_ssl VARCHAR(6) DEFAULT 'false' COLLATE utf8_unicode_ci NOT NULL,                                   
                                        smtp_user VARCHAR(128) DEFAULT '' COLLATE utf8_unicode_ci NOT NULL,                                   
                                        smtp_password VARCHAR(128) DEFAULT '' COLLATE utf8_unicode_ci NOT NULL,
                                        multiple_days_select VARCHAR(6) DEFAULT 'true' COLLATE utf8_unicode_ci NOT NULL,
                                        morning_check_out VARCHAR(6) DEFAULT 'false' COLLATE utf8_unicode_ci NOT NULL,
                                        hours_enabled VARCHAR(6) DEFAULT 'false' COLLATE utf8_unicode_ci NOT NULL,
                                        hours_definitions TEXT COLLATE utf8_unicode_ci NOT NULL,
                                        multiple_hours_select VARCHAR(6) DEFAULT 'true' COLLATE utf8_unicode_ci NOT NULL,
                                        hours_ampm VARCHAR(6) DEFAULT 'false' COLLATE utf8_unicode_ci NOT NULL,
                                        last_hour_to_total_price VARCHAR(6) DEFAULT 'true' COLLATE utf8_unicode_ci NOT NULL,
                                        hours_interval_enabled VARCHAR(6) DEFAULT 'false' COLLATE utf8_unicode_ci NOT NULL,
                                        discounts_no_days VARCHAR(256) DEFAULT '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0' COLLATE utf8_unicode_ci NOT NULL,
                                        deposit FLOAT DEFAULT 0 NOT NULL,
                                        form int DEFAULT 1 NOT NULL,
                                        instant_booking VARCHAR(6) DEFAULT 'false' COLLATE utf8_unicode_ci NOT NULL,
                                        no_people_enabled VARCHAR(6) DEFAULT 'true' COLLATE utf8_unicode_ci NOT NULL,
                                        min_no_people INT DEFAULT 1 NOT NULL,
                                        max_no_people INT DEFAULT 4 NOT NULL,
                                        no_children_enabled VARCHAR(6) DEFAULT 'true' COLLATE utf8_unicode_ci NOT NULL,
                                        min_no_children INT DEFAULT 0 NOT NULL,
                                        max_no_children INT DEFAULT 2 NOT NULL,
                                        terms_and_conditions_enabled VARCHAR(6) DEFAULT 'false' COLLATE utf8_unicode_ci NOT NULL,
                                        terms_and_conditions_link VARCHAR(128) DEFAULT '' COLLATE utf8_unicode_ci NOT NULL,
                                        payment_arrival_enabled VARCHAR(6) DEFAULT 'true' COLLATE utf8_unicode_ci NOT NULL,
                                        payment_paypal_enabled VARCHAR(6) DEFAULT 'false' COLLATE utf8_unicode_ci NOT NULL,
                                        payment_paypal_username VARCHAR(128) DEFAULT '' COLLATE utf8_unicode_ci NOT NULL,
                                        payment_paypal_password VARCHAR(128) DEFAULT '' COLLATE utf8_unicode_ci NOT NULL,
                                        payment_paypal_signature VARCHAR(128) DEFAULT '' COLLATE utf8_unicode_ci NOT NULL,
                                        payment_paypal_credit_card VARCHAR(6) DEFAULT 'false' COLLATE utf8_unicode_ci NOT NULL,
                                        payment_paypal_sandbox_enabled VARCHAR(6) DEFAULT 'false' COLLATE utf8_unicode_ci NOT NULL,
                                        max_year INT DEFAULT ".date('Y')." NOT NULL,
                                        UNIQUE KEY id (id)
                                    );";

                    $sql_calendars = "CREATE TABLE " . DOPBS_Calendars_table . " (
                                        id int NOT NULL AUTO_INCREMENT,
                                        name VARCHAR(128) DEFAULT '' COLLATE utf8_unicode_ci NOT NULL,
                                        UNIQUE KEY id (id)
                                    );";


                    $sql_days = "CREATE TABLE " . DOPBS_Days_table . " (
                                        calendar_id int NOT NULL,
                                        day VARCHAR(16) DEFAULT '' COLLATE utf8_unicode_ci NOT NULL,
                                        year INT NOT NULL,
                                        data TEXT COLLATE utf8_unicode_ci NOT NULL
                                    );";

                    $sql_reservations = "CREATE TABLE " . DOPBS_Reservations_table . " (
                                        id int NOT NULL AUTO_INCREMENT,
                                        calendar_id int NOT NULL,
                                        check_in VARCHAR(16) DEFAULT '' COLLATE utf8_unicode_ci NOT NULL,
                                        check_out VARCHAR(16) DEFAULT '' COLLATE utf8_unicode_ci NOT NULL,
                                        start_hour VARCHAR(16) DEFAULT '' COLLATE utf8_unicode_ci NOT NULL,
                                        end_hour VARCHAR(16) DEFAULT '' COLLATE utf8_unicode_ci NOT NULL,
                                        no_items int DEFAULT 1 NOT NULL,
                                        currency VARCHAR(8) DEFAULT '' COLLATE utf8_unicode_ci NOT NULL,
                                        currency_code VARCHAR(8) DEFAULT '' COLLATE utf8_unicode_ci NOT NULL,
                                        total_price int DEFAULT 0 NOT NULL,
                                        discount int DEFAULT 0 NOT NULL,
                                        price int DEFAULT 0 NOT NULL,
                                        deposit int DEFAULT 0 NOT NULL,
                                        language VARCHAR(8) DEFAULT 'en' COLLATE utf8_unicode_ci NOT NULL,
                                        email VARCHAR(128) DEFAULT '' COLLATE utf8_unicode_ci NOT NULL,
                                        no_people int DEFAULT 1 NOT NULL,
                                        no_children int DEFAULT 0 NOT NULL,
                                        payment_method int DEFAULT 0 NOT NULL, 
                                        paypal_transaction_id VARCHAR(128) DEFAULT '' COLLATE utf8_unicode_ci NOT NULL, 
                                        status VARCHAR(16) DEFAULT 'pending' COLLATE utf8_unicode_ci NOT NULL,
                                        info TEXT COLLATE utf8_unicode_ci NOT NULL,
                                        date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
                                        UNIQUE KEY id (id)
                                    );";
                    
                    $sql_forms = "CREATE TABLE " . DOPBS_Forms_table . " (
                                        id int NOT NULL AUTO_INCREMENT,
                                        name VARCHAR(128) DEFAULT '' COLLATE utf8_unicode_ci NOT NULL,
                                        UNIQUE KEY id (id)
                                    );";
                    
                    $sql_forms_fields = "CREATE TABLE " . DOPBS_Forms_Fields_table . " (
                                        id int NOT NULL AUTO_INCREMENT,
                                        form_id int NOT NULL,
                                        type VARCHAR(20) DEFAULT '' COLLATE utf8_unicode_ci NOT NULL,
                                        position int NOT NULL,
                                        multiple_select VARCHAR(6) DEFAULT 'false' COLLATE utf8_unicode_ci NOT NULL,
                                        allowed_characters TEXT COLLATE utf8_unicode_ci NOT NULL,
                                        size int DEFAULT 0 NOT NULL,
                                        is_email VARCHAR(6) DEFAULT 'false' COLLATE utf8_unicode_ci NOT NULL,
                                        required VARCHAR(6) DEFAULT 'false' COLLATE utf8_unicode_ci NOT NULL,
                                        translation TEXT COLLATE utf8_unicode_ci NOT NULL,
                                        UNIQUE KEY id (id)
                                    );";
                    
                    $sql_forms_select_options = "CREATE TABLE " . DOPBS_Forms_Select_Options_table . " (
                                        id int NOT NULL AUTO_INCREMENT,
                                        field_id int NOT NULL,
                                        translation TEXT COLLATE utf8_unicode_ci NOT NULL,
                                        UNIQUE KEY id (id)
                                    );";

                    dbDelta($sql_settings);
                    dbDelta($sql_calendars);
                    dbDelta($sql_days);
                    dbDelta($sql_reservations);
                    dbDelta($sql_forms);
                    dbDelta($sql_forms_fields);
                    dbDelta($sql_forms_select_options);

                    if ($current_db_version == ''){
                        add_option('DOPBS_db_version', $this->DOPBS_db_version);
                    }
                    else{
                        update_option('DOPBS_db_version', $this->DOPBS_db_version);
                    }
                    
                    $this->initTablesData();
                }
            }
            
            function initTablesData(){
                global $wpdb;

                $settings = $wpdb->get_results('SELECT * FROM '.DOPBS_Calendars_table);
                
                if ($wpdb->num_rows == 0){
                    dbDelta($wpdb->insert(DOPBS_Calendars_table, array('name' => DOPBS_ADD_CALENDAR_NAME)));
                    
                    dbDelta($wpdb->insert(DOPBS_Settings_table, array('calendar_id' => $wpdb->insert_id,
                                                                      'hours_definitions' => '[{"value": "00:00"}]')));
                
                    dbDelta($wpdb->insert(DOPBS_Forms_table, array('id' => 1,
                                                                   'name' => DOPBS_BOOKING_FORM_NAME_DEFAULT)));
                    
                    dbDelta($wpdb->insert(DOPBS_Forms_Fields_table, array('id' => 1,
                                                                           'form_id' => 1,
                                                                           'type' => 'text',
                                                                           'multiple_select' => 'false',
                                                                           'allowed_characters' => '',
                                                                           'size' => 0,
                                                                           'is_email' => 'false',
                                                                           'required' => 'true',
                                                                           'translation' => '{"af": "First Name","al": "First Name","ar": "First Name","az": "First Name","bs": "First Name","by": "First Name","bg": "First Name","ca": "First Name","cn": "First Name","cr": "First Name","cz": "First Name","dk": "First Name","du": "First Name","en": "First Name","eo": "First Name","et": "First Name","fl": "First Name","fi": "First Name","fr": "First Name","gl": "First Name","de": "First Name","gr": "First Name","ha": "First Name","he": "First Name","hi": "First Name","hu": "First Name","is": "First Name","id": "First Name","ir": "First Name","it": "First Name","ja": "First Name","ko": "First Name","lv": "First Name","lt": "First Name","mk": "First Name","mg": "First Name","ma": "First Name","no": "First Name","pe": "First Name","pl": "First Name","pt": "First Name","ro": "First Name","ru": "First Name","sr": "First Name","sk": "First Name","sl": "First Name","sp": "First Name","sw": "First Name","se": "First Name","th": "First Name","tr": "First Name","uk": "First Name","ur": "First Name","vi": "First Name","we": "First Name","yi": "First Name"}')));
                    dbDelta($wpdb->insert(DOPBS_Forms_Fields_table, array('id' => 2,
                                                                           'form_id' => 1,
                                                                           'type' => 'text',
                                                                           'multiple_select' => 'false',
                                                                           'allowed_characters' => '',
                                                                           'size' => 0,
                                                                           'is_email' => 'false',
                                                                           'required' => 'true',
                                                                           'translation' => '{"af": "Last Name","al": "Last Name","ar": "Last Name","az": "Last Name","bs": "Last Name","by": "Last Name","bg": "Last Name","ca": "Last Name","cn": "Last Name","cr": "Last Name","cz": "Last Name","dk": "Last Name","du": "Last Name","en": "Last Name","eo": "Last Name","et": "Last Name","fl": "Last Name","fi": "Last Name","fr": "Last Name","gl": "Last Name","de": "Last Name","gr": "Last Name","ha": "Last Name","he": "Last Name","hi": "Last Name","hu": "Last Name","is": "Last Name","id": "Last Name","ir": "Last Name","it": "Last Name","ja": "Last Name","ko": "Last Name","lv": "Last Name","lt": "Last Name","mk": "Last Name","mg": "Last Name","ma": "Last Name","no": "Last Name","pe": "Last Name","pl": "Last Name","pt": "Last Name","ro": "Last Name","ru": "Last Name","sr": "Last Name","sk": "Last Name","sl": "Last Name","sp": "Last Name","sw": "Last Name","se": "Last Name","th": "Last Name","tr": "Last Name","uk": "Last Name","ur": "Last Name","vi": "Last Name","we": "Last Name","yi": "Last Name"}')));
                    dbDelta($wpdb->insert(DOPBS_Forms_Fields_table, array('id' => 3,
                                                                           'form_id' => 1,
                                                                           'type' => 'text',
                                                                           'multiple_select' => 'false',
                                                                           'allowed_characters' => '',
                                                                           'size' => 0,
                                                                           'is_email' => 'true',
                                                                           'required' => 'true',
                                                                           'translation' => '{"af": "Email","al": "Email","ar": "Email","az": "Email","bs": "Email","by": "Email","bg": "Email","ca": "Email","cn": "Email","cr": "Email","cz": "Email","dk": "Email","du": "Email","en": "Email","eo": "Email","et": "Email","fl": "Email","fi": "Email","fr": "Email","gl": "Email","de": "Email","gr": "Email","ha": "Email","he": "Email","hi": "Email","hu": "Email","is": "Email","id": "Email","ir": "Email","it": "Email","ja": "Email","ko": "Email","lv": "Email","lt": "Email","mk": "Email","mg": "Email","ma": "Email","no": "Email","pe": "Email","pl": "Email","pt": "Email","ro": "Email","ru": "Email","sr": "Email","sk": "Email","sl": "Email","sp": "Email","sw": "Email","se": "Email","th": "Email","tr": "Email","uk": "Email","ur": "Email","vi": "Email","we": "Email","yi": "Email"}')));
                    dbDelta($wpdb->insert(DOPBS_Forms_Fields_table, array('id' => 4,
                                                                           'form_id' => 1,
                                                                           'type' => 'text',
                                                                           'multiple_select' => 'false',
                                                                           'allowed_characters' => '0123456789+-().',
                                                                           'size' => 0,
                                                                           'is_email' => 'false',
                                                                           'required' => 'true',
                                                                           'translation' => '{"af": "Phone","al": "Phone","ar": "Phone","az": "Phone","bs": "Phone","by": "Phone","bg": "Phone","ca": "Phone","cn": "Phone","cr": "Phone","cz": "Phone","dk": "Phone","du": "Phone","en": "Phone","eo": "Phone","et": "Phone","fl": "Phone","fi": "Phone","fr": "Phone","gl": "Phone","de": "Phone","gr": "Phone","ha": "Phone","he": "Phone","hi": "Phone","hu": "Phone","is": "Phone","id": "Phone","ir": "Phone","it": "Phone","ja": "Phone","ko": "Phone","lv": "Phone","lt": "Phone","mk": "Phone","mg": "Phone","ma": "Phone","no": "Phone","pe": "Phone","pl": "Phone","pt": "Phone","ro": "Phone","ru": "Phone","sr": "Phone","sk": "Phone","sl": "Phone","sp": "Phone","sw": "Phone","se": "Phone","th": "Phone","tr": "Phone","uk": "Phone","ur": "Phone","vi": "Phone","we": "Phone","yi": "Phone"}')));
                    dbDelta($wpdb->insert(DOPBS_Forms_Fields_table, array('id' => 5,
                                                                           'form_id' => 1,
                                                                           'type' => 'textarea',
                                                                           'multiple_select' => 'false',
                                                                           'allowed_characters' => '',
                                                                           'size' => 0,
                                                                           'is_email' => 'false',
                                                                           'required' => 'true',
                                                                           'translation' => '{"af": "Message","al": "Message","ar": "Message","az": "Message","bs": "Message","by": "Message","bg": "Message","ca": "Message","cn": "Message","cr": "Message","cz": "Message","dk": "Message","du": "Message","en": "Message","eo": "Message","et": "Message","fl": "Message","fi": "Message","fr": "Message","gl": "Message","de": "Message","gr": "Message","ha": "Message","he": "Message","hi": "Message","hu": "Message","is": "Message","id": "Message","ir": "Message","it": "Message","ja": "Message","ko": "Message","lv": "Message","lt": "Message","mk": "Message","mg": "Message","ma": "Message","no": "Message","pe": "Message","pl": "Message","pt": "Message","ro": "Message","ru": "Message","sr": "Message","sk": "Message","sl": "Message","sp": "Message","sw": "Message","se": "Message","th": "Message","tr": "Message","uk": "Message","ur": "Message","vi": "Message","we": "Message","yi": "Message"}')));
                }
            }

// Pages            
            function printAdminPage(){// Prints out the admin page.
                $this->DOPBS_AddEditCalendars->calendarsList();
            }
            
// Change Translation
            function changeTranslation(){
                $current_backend_language = get_option('DOPBS_backend_language_'.wp_get_current_user()->ID);
                
                if ($current_backend_language == ''){
                    add_option('DOPBS_backend_language_'.wp_get_current_user()->ID, 'en');
                }
                else{
                    update_option('DOPBS_backend_language_'.wp_get_current_user()->ID, $_POST['language']);
                }
                
                die();
            }

// Calendars            
            function showCalendars(){// Show Calendars List.
                global $wpdb;
                                    
                $calendarsHTML = array();
                $noCalendars = 0;
                array_push($calendarsHTML, '<ul>');
                
                $calendars = $wpdb->get_results('SELECT * FROM '.DOPBS_Calendars_table.' ORDER BY id DESC');
                $noCalendars = $wpdb->num_rows;
                
                if ($noCalendars != 0){
                    foreach ($calendars as $calendar){
                        array_push($calendarsHTML, '<li class="item" id="DOPBS-ID-'.$calendar->id.'"><span class="name">'.$this->shortName($calendar->name, 25).'</span></li>');
                    }
                }
                else{
                    array_push($calendarsHTML, '<li class="no-data">'.DOPBS_NO_CALENDARS.'</li>');
                }
                
                array_push($calendarsHTML, '</ul>');
                echo implode('', $calendarsHTML);
                
            	die();                
            }

            function showCalendar(){// Show Calendar.
                if (isset($_POST['calendar_id'])){
                    global $wpdb;
                    global $DOPBS_currencies;
                    global $DOPBS_month_names;
                    global $DOPBS_day_names;
                    $data = array();
                    
                    $settings = $wpdb->get_row('SELECT * FROM '.DOPBS_Settings_table.' WHERE calendar_id="'.$_POST['calendar_id'].'"');
                                        
                    $data = array('AddtMonthViewText' => DOPBS_ADD_MONTH_VIEW,
                                  'AvailableDays' => explode(',', $settings->available_days),
                                  'AvailableLabel' => DOPBS_AVAILABLE_LABEL,
                                  'AvailableOneText' => DOPBS_AVAILABLE_ONE_TEXT,
                                  'AvailableText' => DOPBS_AVAILABLE_TEXT,
                                  'BookedText' => DOPBS_BOOKED_TEXT,
                                  'Currency' => $DOPBS_currencies[(int)$settings->currency-1]['sign'],
                                  'DateEndLabel' => DOPBS_DATE_END_LABEL,
                                  'DateStartLabel' => DOPBS_DATE_START_LABEL,
                                  'DateType' => 1,
                                  'DayNames' => $DOPBS_day_names,
                                  'FirstDay' => $settings->first_day,
                                  'HoursEnabled' => $settings->hours_enabled,
                                  'GroupDaysLabel' => DOPBS_GROUP_DAYS_LABEL,
                                  'GroupHoursLabel' => DOPBS_GROUP_HOURS_LABEL,
                                  'HourEndLabel' => DOPBS_HOURS_END_LABEL,
                                  'HourStartLabel' => DOPBS_HOURS_START_LABEL,
                                  'HoursAMPM' => $settings->hours_ampm,
                                  'HoursDefinitions' => json_decode($settings->hours_definitions),
                                  'HoursDefinitionsChangeLabel' => DOPBS_HOURS_DEFINITIONS_CHANGE_LABEL,
                                  'HoursDefinitionsLabel' => DOPBS_HOURS_DEFINITIONS_LABEL,
                                  'HoursSetDefaultDataLabel' => DOPBS_HOURS_SET_DEFAULT_DATA_LABEL, 
                                  'HoursIntervalEnabled' => $settings->hours_interval_enabled,
                                  'ID' => $_POST['calendar_id'],
                                  'InfoLabel' => DOPBS_HOURS_INFO_LABEL,
                                  'MaxYear' => $settings->max_year,
                                  'MonthNames' => $DOPBS_month_names,
                                  'NextMonthText' => DOPBS_NEXT_MONTH,
                                  'NotesLabel' => DOPBS_HOURS_NOTES_LABEL,
                                  'PreviousMonthText' => DOPBS_PREVIOUS_MONTH,
                                  'PriceLabel' => DOPBS_PRICE_LABEL,
                                  'PromoLabel' => DOPBS_PROMO_LABEL,
                                  'RemoveMonthViewText' => DOPBS_REMOVE_MONTH_VIEW,
                                  'ResetConfirmation' => DOPBS_RESET_CONFIRMATION,
                                  'StatusAvailableText' => DOPBS_STATUS_AVAILABLE_TEXT,
                                  'StatusBookedText' => DOPBS_STATUS_BOOKED_TEXT,
                                  'StatusLabel' => DOPBS_STATUS_LABEL,
                                  'StatusSpecialText' => DOPBS_STATUS_SPECIAL_TEXT,
                                  'StatusUnavailableText' => DOPBS_STATUS_UNAVAILABLE_TEXT,
                                  'UnavailableText' => DOPBS_UNAVAILABLE_TEXT,
                                  'ViewOnly' => $settings->view_only);
                    
                    echo json_encode($data);

                    die();
                }
            }
            
            function loadSchedule(){// Load Calendar Data.
                if (isset($_POST['calendar_id'])){
                    global $wpdb;
                    $schedule = array();
                    
                    $this->cleanSchedule();
                    $days = $wpdb->get_results('SELECT * FROM '.DOPBS_Days_table.' WHERE calendar_id="'.$_POST['calendar_id'].'" AND year="'.$_POST['year'].'"');
                    
                    foreach ($days as $day):
                        $schedule[$day->day] = json_decode($day->data);
                    endforeach;
                                            
                    if (count($schedule) > 0){
                        echo json_encode($schedule);
                    }
                    else{
                        echo '';
                    }

                    die();
                }                
            }
            
            function saveSchedule(){// Save Calendar Data.
                if (isset($_POST['calendar_id'])){
                    global $wpdb;
                    
                    $schedule = $_POST['schedule'];
                    $calendar_id = $_POST['calendar_id'];
                                        
                    while ($data = current($schedule)){
                        $day = key($schedule);
                        $day_items = explode('-', $day);
                        $result = $wpdb->get_results('SELECT * FROM '.DOPBS_Days_table.' WHERE calendar_id='.$calendar_id.' AND day=\''.$day.'\'');
                                                
                        if ($wpdb->num_rows != 0){  
                            $wpdb->update(DOPBS_Days_table, array('data' => json_encode($data)), array('calendar_id' => $calendar_id, 
                                                                                                        'day' => $day));
                        }
                        else{
                            $wpdb->insert(DOPBS_Days_table, array('calendar_id' => $calendar_id,
                                                                   'day' => $day,
                                                                   'year' => $day_items[0],
                                                                   'data' => json_encode($data)));
                        }
                        
                        next($schedule);                        
                    }
                    
                    $max_year = $wpdb->get_row('SELECT MAX(year) AS year FROM '.DOPBS_Days_table.' WHERE calendar_id="'.$calendar_id.'"');
                    
                    if ($max_year->year > 0){
                        $wpdb->update(DOPBS_Settings_table, array('max_year' => $max_year->year), array('calendar_id' => $calendar_id));
                    }
                    else{
                        $wpdb->update(DOPBS_Settings_table, array('max_year' => date('Y')), array('calendar_id' => $calendar_id));
                    }
                    
                    echo DOPBS_EDIT_CALENDAR_SUCCESS;

                    die();
                }                
            }
            
            function deleteSchedule(){// Save Calendar Data.
                if (isset($_POST['calendar_id'])){
                    global $wpdb;
                    
                    $schedule = $_POST['schedule'];
                    $calendar_id = $_POST['calendar_id'];
                                        
                    while ($data = current($schedule)){
                        $day = key($schedule);
                        $wpdb->query('DELETE FROM '.DOPBS_Days_table.' WHERE calendar_id='.$calendar_id.' AND day=\''.$day.'\'');                        
                        next($schedule);                        
                    }
                    
                    $max_year = $wpdb->get_row('SELECT MAX(year) AS year FROM '.DOPBS_Days_table.' WHERE calendar_id="'.$calendar_id.'"'); 
                    
                    if ($max_year->year > 0){
                        $wpdb->update(DOPBS_Settings_table, array('max_year' => $max_year->year), array('calendar_id' => $calendar_id));
                    }
                    else{
                        $wpdb->update(DOPBS_Settings_table, array('max_year' => date('Y')), array('calendar_id' => $calendar_id));
                    }
                    
                    echo DOPBS_EDIT_CALENDAR_SUCCESS;

                    die();
                }                
            }
            
            function cleanSchedule(){
                global $wpdb;
                $wpdb->query('DELETE FROM '.DOPBS_Days_table.' WHERE day<\''.date('Y-m-d').'\'');
            }

            function showCalendarSettings(){// Show Calendar Info.
                global $wpdb;
                global $DOPBS_pluginSeries_forms;
                $result = array();
                
                $calendar = $wpdb->get_row('SELECT * FROM '.DOPBS_Calendars_table.' WHERE id="'.$_POST['calendar_id'].'"');
                $settings = $wpdb->get_row('SELECT * FROM '.DOPBS_Settings_table.' WHERE calendar_id="'.$_POST['calendar_id'].'"');
  
                $result['name'] = $calendar->name;
                
                $result['available_days'] = $settings->available_days;
                $result['first_day'] = $settings->first_day;
                $result['currency'] = $settings->currency;
                $result['currencies_ids'] = $this->listCurrenciesIDs();
                $result['currencies_labels'] = $this->listCurrenciesLabels();
                $result['date_type'] = $settings->date_type;   
                $result['template'] = $settings->template;
                $result['templates'] = $this->listTemplates(); 
                $result['min_stay'] = $settings->min_stay;
                $result['max_stay'] = $settings->max_stay;
                $result['no_items_enabled'] = $settings->no_items_enabled;
                $result['view_only'] = $settings->view_only;
                $result['page_url'] = $settings->page_url;
                $result['template_email'] = $settings->template_email;
                $result['templates_email'] = $this->listEmailTemplates();  
                $result['notifications_email'] = $settings->notifications_email;  
                $result['smtp_enabled'] = $settings->smtp_enabled;
                $result['smtp_host_name'] = $settings->smtp_host_name;
                $result['smtp_host_port'] = $settings->smtp_host_port;
                $result['smtp_ssl'] = $settings->smtp_ssl;
                $result['smtp_user'] = $settings->smtp_user;
                $result['smtp_password'] = $settings->smtp_password;
                $result['multiple_days_select'] = $settings->multiple_days_select;
                $result['morning_check_out'] = $settings->morning_check_out;
                $result['hours_enabled'] = $settings->hours_enabled;
                $result['hours_definitions'] = json_decode($settings->hours_definitions);
                $result['multiple_hours_select'] = $settings->multiple_hours_select;
                $result['hours_ampm'] = $settings->hours_ampm;
                $result['last_hour_to_total_price'] = $settings->last_hour_to_total_price;
                $result['hours_interval_enabled'] = $settings->hours_interval_enabled;
                $result['discounts_no_days'] = $settings->discounts_no_days;
                $result['deposit'] = $settings->deposit;
                $result['form'] = $settings->form;
                $result['forms'] = $DOPBS_pluginSeries_forms->listForms();
                $result['instant_booking'] = $settings->instant_booking;
                $result['no_people_enabled'] = $settings->no_people_enabled;
                $result['min_no_people'] = $settings->min_no_people;
                $result['max_no_people'] = $settings->max_no_people;
                $result['no_children_enabled'] = $settings->no_children_enabled;
                $result['min_no_children'] = $settings->min_no_children;
                $result['max_no_children'] = $settings->max_no_children;
                $result['terms_and_conditions_enabled'] = $settings->terms_and_conditions_enabled;
                $result['terms_and_conditions_link'] = $settings->terms_and_conditions_link;
                $result['payment_arrival_enabled'] = $settings->payment_arrival_enabled;
                $result['payment_paypal_enabled'] = $settings->payment_paypal_enabled;  
                $result['payment_paypal_username'] = $settings->payment_paypal_username;   
                $result['payment_paypal_password'] = $settings->payment_paypal_password;   
                $result['payment_paypal_signature'] = $settings->payment_paypal_signature;  
                $result['payment_paypal_credit_card'] = $settings->payment_paypal_credit_card;
                $result['payment_paypal_sandbox_enabled'] = $settings->payment_paypal_sandbox_enabled;                           
                                            
                echo json_encode($result);
            	die();
            }
            
            function editCalendar(){// Edit Calendar Settings.
                global $wpdb;
                
                $settings = array('available_days' => $_POST['available_days'],
                                  'first_day' => $_POST['first_day'],
                                  'currency' => $_POST['currency'],
                                  'date_type' => $_POST['date_type'],
                                  'template' => $_POST['template'],
                                  'min_stay' => $_POST['min_stay'],
                                  'max_stay' => $_POST['max_stay'],
                                  'no_items_enabled' => $_POST['no_items_enabled'],
                                  'view_only' => $_POST['view_only'],
                                  'page_url' => $_POST['page_url'],
                                  'template_email' => $_POST['template_email'],
                                  'notifications_email' => $_POST['notifications_email'],
                                  'smtp_enabled' => $_POST['smtp_enabled'],
                                  'smtp_host_name' => $_POST['smtp_host_name'],
                                  'smtp_host_port' => $_POST['smtp_host_port'],
                                  'smtp_ssl' => $_POST['smtp_ssl'],
                                  'smtp_user' => $_POST['smtp_user'],
                                  'smtp_password' => $_POST['smtp_password'],
                                  'multiple_days_select' => $_POST['multiple_days_select'],
                                  'morning_check_out' => $_POST['morning_check_out'],
                                  'hours_enabled' => $_POST['hours_enabled'],
                                  'hours_definitions' => json_encode($_POST['hours_definitions']),
                                  'multiple_hours_select' => $_POST['multiple_hours_select'],
                                  'hours_ampm' => $_POST['hours_ampm'],
                                  'last_hour_to_total_price' => $_POST['last_hour_to_total_price'],
                                  'hours_interval_enabled' => $_POST['hours_interval_enabled'],
                                  'discounts_no_days' => $_POST['discounts_no_days'],
                                  'deposit' => $_POST['deposit'],
                                  'form' => $_POST['form'],
                                  'instant_booking' => $_POST['instant_booking'],
                                  'no_people_enabled' => $_POST['no_people_enabled'],
                                  'min_no_people' => $_POST['min_no_people'],
                                  'max_no_people' => $_POST['max_no_people'],
                                  'no_children_enabled' => $_POST['no_children_enabled'],
                                  'min_no_children' => $_POST['min_no_children'],
                                  'max_no_children' => $_POST['max_no_children'],
                                  'terms_and_conditions_enabled' => $_POST['terms_and_conditions_enabled'],
                                  'terms_and_conditions_link' => $_POST['terms_and_conditions_link'],
                                  'payment_arrival_enabled' => $_POST['payment_arrival_enabled'],
                                  'payment_paypal_enabled' => $_POST['payment_paypal_enabled'],
                                  'payment_paypal_username' => $_POST['payment_paypal_username'],
                                  'payment_paypal_password' => $_POST['payment_paypal_password'],
                                  'payment_paypal_signature' => $_POST['payment_paypal_signature'],
                                  'payment_paypal_credit_card' => $_POST['payment_paypal_credit_card'],
                                  'payment_paypal_sandbox_enabled' => $_POST['payment_paypal_sandbox_enabled']);     
                
                $wpdb->update(DOPBS_Calendars_table, array('name' => $_POST['name']), array(id => $_POST['calendar_id']));
                $wpdb->update(DOPBS_Settings_table, $settings, array('calendar_id' => $_POST['calendar_id']));
                
                echo '';
                
            	die();
            }
            
            function nextHour($hour, $hours){
                $next_hour = '24:00';
                        
                for ($i=count($hours)-1; $i>=0; $i--){
                    if ($hours[$i]->value > $hour){
                        $next_hour = $hours[$i]->value;
                    }
                }
                
                return $next_hour;
            }
            
// Options
            function listTemplates(){
                $folder = DOPBS_Plugin_AbsPath.'templates/';
                $folderData = opendir($folder);
                $list = array();
                
                while (($file = readdir($folderData)) !== false){
                    if ($file != '.' && $file != '..' && $file != '.DS_Store'){                        
                        array_push($list, $file);
                    }
                }
                closedir($folderData);
                
                return implode(';;', $list);
            }
            
            function listEmailTemplates(){
                $folder = DOPBS_Plugin_AbsPath.'emails/';
                $folderData = opendir($folder);
                $list = array();
                
                while (($file = readdir($folderData)) !== false){
                    if ($file != '.' && $file != '..' && $file != '.DS_Store'){                        
                        array_push($list, $file);
                    }
                }
                closedir($folderData);
                
                return implode(';;', $list);
            }
            
            function listCurrenciesIDs(){
                global $DOPBS_currencies;
                $result = array();
                
                for ($i=0; $i<count($DOPBS_currencies); $i++){
                    array_push($result, $DOPBS_currencies[$i]['id']);
                }
                
                return implode(';;', $result);
            }
            
            function listCurrenciesLabels(){
                global $DOPBS_currencies;
                $result = array();
                
                for ($i=0; $i<count($DOPBS_currencies); $i++){
                    array_push($result, $DOPBS_currencies[$i]['name'].' ('.$DOPBS_currencies[$i]['sign'].', '.$DOPBS_currencies[$i]['code'].')');
                }
                
                return implode(';;', $result);          
            }
            
            function shortName($name, $size){// Return a short name for the calendar.
                $new_name = '';
                $pieces = str_split($name);
               
                if (count($pieces) <= $size){
                    $new_name = $name;
                }
                else{
                    for ($i=0; $i<$size-3; $i++){
                        $new_name .= $pieces[$i];
                    }
                    $new_name .= '...';
                }

                return $new_name;
            }
            
// Editor Changes
            function addDOPBStoTinyMCE(){// Add calendar button to TinyMCE Editor.
                add_filter('tiny_mce_version', array (&$this, 'changeTinyMCEVersion'));
                add_action('init', array (&$this, 'addDOPBSButtons'));
            }

            function tinyMCECalendars(){// Send data to editor button.
                global $wpdb;
                $tinyMCE_data = '';
                $calendarsList = array();

                $calendars = $wpdb->get_results('SELECT * FROM '.DOPBS_Calendars_table.' ORDER BY id');
                
                foreach ($calendars as $calendar){
                    array_push($calendarsList, $calendar->id.';;'.$calendar->name);
                }
                $tinyMCE_data = DOPBS_TINYMCE_ADD.';;;;;'.implode(';;;', $calendarsList);
                
                echo '<script type="text/JavaScript">'.
                     '    var DOPBS_tinyMCE_data = "'.$tinyMCE_data.'"'.
                     '</script>';
            }

            function addDOPBSButtons(){// Add Button.
                if (!current_user_can('edit_posts') && !current_user_can('edit_pages')){
                    return;
                }

                if ( get_user_option('rich_editing') == 'true'){
                    add_action('admin_head', array (&$this, 'tinyMCECalendars'));
                    add_filter('mce_external_plugins', array (&$this, 'addDOPBSTinyMCEPlugin'), 5);
                    add_filter('mce_buttons', array (&$this, 'registerDOPBSTinyMCEPlugin'), 5);
                }
            }

            function registerDOPBSTinyMCEPlugin($buttons){// Register editor buttons.
                array_push($buttons, '', 'DOPBS');
                return $buttons;
            }

            function addDOPBSTinyMCEPlugin($plugin_array){// Add plugin to TinyMCE editor.
                $plugin_array['DOPBS'] =  DOPBS_Plugin_URL.'assets/js/tinymce-plugin.js';
                return $plugin_array;
            }

            function changeTinyMCEVersion($version){// TinyMCE version.
                $version = $version+100;
                return $version;
            }
            
// Prototypes
            function dateToFormat($date, $type){
                global $DOPBS_month_names;  
                $dayPieces = explode('-', $date);

                if ($type == '1'){
                    return $DOPBS_month_names[(int)$dayPieces[1]-1].' '.$dayPieces[2].', '.$dayPieces[0];
                }
                else{
                    return $dayPieces[2].' '.$DOPBS_month_names[(int)$dayPieces[1]-1].' '.$dayPieces[0];
                }
            }
            
            function timeToAMPM($item){
                $time_pieces = explode(':', $item);
                $hour = (int)$time_pieces[0];
                $minutes = $time_pieces[1];
                $result = '';

                if ($hour == 0){
                    $result = '12';
                }
                else if ($hour > 12){
                    $result = $this->timeLongItem($hour-12);
                }
                else{
                    $result = $this->timeLongItem($hour);
                }

                $result .= ':'.$minutes.' '.($hour < 12 ? 'AM':'PM');

                return $result;
            }
            
            function timeLongItem($item){
                if ($item < 10){
                    return '0'.$item;
                }
                else{
                    return $item;
                }
            }
            
            function validEmail($email){
                if (preg_match("/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is", $email)){
                    return true;
                }
                else{
                    return false;
                }
            }
        }
    }