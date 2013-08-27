<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 1.1
* File                    : templates.php
* File Version            : 1.0
* Created / Last Modified : 29 July 2013
* Author                  : Dot on Paper
* Copyright               : © 2013 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System Templates Class.
*/

    if (!class_exists("DOPBSTemplates")){
        class DOPBSTemplates{
            function DOPBSTemplates(){// Constructor.
            }
            
            function returnTranslations(){// Add translation to JavaScript variables for AJAX usage.
                $current_page = $_GET['page'];

                switch($current_page){
                    case "dopbs-booking-forms":
                        $DOPBS_curr_page = "Forms List";
                        break;
                    default:
                        $DOPBS_curr_page = "Calendars List";
                        break;
                }
?>        
            <script type="text/JavaScript">
                var DOPBS_curr_page = "<?php echo $DOPBS_curr_page?>",
                DOPBS_user_role = "<?php echo wp_get_current_user()->roles[0]?>",
                DOPBS_plugin_url = "<?php echo WP_PLUGIN_URL.'/booking-system/'?>",
                DOPBS_plugin_abs = "<?php echo ABSPATH.'wp-content/plugins/booking-system/'?>",

                DOPBS_TITLE = "<?php echo DOPBS_TITLE?>",

                // Loading ...
                DOPBS_LOAD = "<?php echo DOPBS_LOAD?>",

                // Save ...
                DOPBS_SAVE = "<?php echo DOPBS_SAVE?>",
                DOPBS_SAVE_SUCCESS = "<?php echo DOPBS_SAVE_SUCCESS?>",

                // Months & Week Days
                DOPBS_month_names = [<?php            
                    global $DOPBS_month_names;

                    for ($i=0; $i<count($DOPBS_month_names); $i++){
                        if ($i == 0){
                            echo '"'.$DOPBS_month_names[$i].'"';
                        }
                        else{
                            echo ', "'.$DOPBS_month_names[$i].'"';                
                        }
                    }?>],     
                DOPBS_day_names = [<?php            
                    global $DOPBS_day_names;

                    for ($i=0; $i<count($DOPBS_day_names); $i++){
                        if ($i == 0){
                            echo '"'.$DOPBS_day_names[$i].'"';
                        }
                        else{
                            echo ', "'.$DOPBS_day_names[$i].'"';                
                        }
                    }?>],

                // Help
                DOPBS_CALENDARS_HELP = "<?php echo DOPBS_CALENDARS_HELP?>",
                DOPBS_CALENDAR_EDIT_HELP = "<?php echo DOPBS_CALENDAR_EDIT_HELP?>",
                DOPBS_CALENDAR_EDIT_SETTINGS_HELP = "<?php echo DOPBS_CALENDAR_EDIT_SETTINGS_HELP?>",

                // Form
                DOPBS_SUBMIT = "<?php echo DOPBS_SUBMIT?>",
                DOPBS_DELETE = "<?php echo DOPBS_DELETE?>",
                DOPBS_BACK = "<?php echo DOPBS_BACK?>",
                DOPBS_BACK_SUBMIT = "<?php echo DOPBS_BACK_SUBMIT?>",
                DOPBS_ENABLED = "<?php echo DOPBS_ENABLED?>",
                DOPBS_DISABLED = "<?php echo DOPBS_DISABLED?>",
                DOPBS_DATE_TYPE_AMERICAN = "<?php echo DOPBS_DATE_TYPE_AMERICAN?>",
                DOPBS_DATE_TYPE_EUROPEAN = "<?php echo DOPBS_DATE_TYPE_EUROPEAN?>",

                // Calendars    
                DOPBS_SHOW_CALENDARS = "<?php echo DOPBS_SHOW_CALENDARS?>",
                DOPBS_CALENDARS_LOADED = "<?php echo DOPBS_CALENDARS_LOADED?>",
                DOPBS_CALENDAR_LOADED = "<?php echo DOPBS_CALENDAR_LOADED?>",
                DOPBS_NO_CALENDARS = "<?php echo DOPBS_NO_CALENDARS?>",

                // Calendar 
                DOPBS_ADD_MONTH_VIEW = "<?php echo DOPBS_ADD_MONTH_VIEW?>",
                DOPBS_REMOVE_MONTH_VIEW = "<?php echo DOPBS_REMOVE_MONTH_VIEW?>",
                DOPBS_PREVIOUS_MONTH = "<?php echo DOPBS_PREVIOUS_MONTH?>",
                DOPBS_NEXT_MONTH = "<?php echo DOPBS_NEXT_MONTH?>",
                DOPBS_AVAILABLE_ONE_TEXT = "<?php echo DOPBS_AVAILABLE_ONE_TEXT?>",
                DOPBS_AVAILABLE_TEXT = "<?php echo DOPBS_AVAILABLE_TEXT?>",
                DOPBS_BOOKED_TEXT = "<?php echo DOPBS_BOOKED_TEXT?>",
                DOPBS_UNAVAILABLE_TEXT = "<?php echo DOPBS_UNAVAILABLE_TEXT?>",

                // Calendar Form 
                DOPBS_DATE_START_LABEL = "<?php echo DOPBS_DATE_START_LABEL?>",
                DOPBS_DATE_START_LABEL = "<?php echo DOPBS_DATE_START_LABEL?>",
                DOPBS_DATE_END_LABEL = "<?php echo DOPBS_DATE_END_LABEL?>",
                DOPBS_STATUS_LABEL = "<?php echo DOPBS_STATUS_LABEL?>",
                DOPBS_STATUS_AVAILABLE_TEXT = "<?php echo DOPBS_STATUS_AVAILABLE_TEXT?>",
                DOPBS_STATUS_BOOKED_TEXT = "<?php echo DOPBS_STATUS_BOOKED_TEXT?>",
                DOPBS_STATUS_SPECIAL_TEXT = "<?php echo DOPBS_STATUS_SPECIAL_TEXT?>",
                DOPBS_STATUS_UNAVAILABLE_TEXT = "<?php echo DOPBS_STATUS_UNAVAILABLE_TEXT?>",
                DOPBS_PRICE_LABEL = "<?php echo DOPBS_PRICE_LABEL?>",
                DOPBS_PROMO_LABEL = "<?php echo DOPBS_PROMO_LABEL?>",
                DOPBS_AVAILABLE_LABEL = "<?php echo DOPBS_AVAILABLE_LABEL?>",
                DOPBS_HOURS_DEFINITIONS_CHANGE_LABEL = "<?php echo DOPBS_HOURS_DEFINITIONS_CHANGE_LABEL?>",
                DOPBS_HOURS_DEFINITIONS_LABEL = "<?php echo DOPBS_HOURS_DEFINITIONS_LABEL?>",
                DOPBS_HOURS_SET_DEFAULT_DATA_LABEL = "<?php echo DOPBS_HOURS_SET_DEFAULT_DATA_LABEL?>",
                DOPBS_HOURS_START_LABEL = "<?php echo DOPBS_HOURS_START_LABEL?>",
                DOPBS_HOURS_END_LABEL = "<?php echo DOPBS_HOURS_END_LABEL?>",
                DOPBS_HOURS_INFO_LABEL = "<?php echo DOPBS_HOURS_INFO_LABEL?>",
                DOPBS_HOURS_NOTES_LABEL = "<?php echo DOPBS_HOURS_NOTES_LABEL?>",
                DOPBS_GROUP_DAYS_LABEL = "<?php echo DOPBS_GROUP_DAYS_LABEL?>",
                DOPBS_GROUP_HOURS_LABEL = "<?php echo DOPBS_GROUP_HOURS_LABEL?>",
                DOPBS_RESET_CONFIRMATION = "<?php echo DOPBS_RESET_CONFIRMATION?>",

                // Add Calendar
                DOPBS_ADD_CALENDAR_NAME = "<?php echo DOPBS_ADD_CALENDAR_NAME?>",

                // Edit Calendar
                DOPBS_EDIT_CALENDAR_SUBMIT = "<?php echo DOPBS_EDIT_CALENDAR_SUBMIT?>",
                DOPBS_EDIT_CALENDAR_SUCCESS = "<?php echo DOPBS_EDIT_CALENDAR_SUCCESS?>",
                DOPBS_EDIT_CALENDAR_USERS_PERMISSIONS = "<?php echo DOPBS_EDIT_CALENDAR_USERS_PERMISSIONS?>",

                // Reservations
                DOPBS_SHOW_RESERVATIONS = "<?php echo DOPBS_SHOW_RESERVATIONS?>",
                DOPBS_NO_RESERVATIONS = "<?php echo DOPBS_NO_RESERVATIONS?>",

                DOPBS_RESERVATIONS_ID = "<?php echo DOPBS_RESERVATIONS_ID?>",

                DOPBS_RESERVATIONS_CHECK_IN_LABEL = "<?php echo DOPBS_RESERVATIONS_CHECK_IN_LABEL?>",
                DOPBS_RESERVATIONS_CHECK_OUT_LABEL = "<?php echo DOPBS_RESERVATIONS_CHECK_OUT_LABEL?>",
                DOPBS_RESERVATIONS_START_HOURS_LABEL = "<?php echo DOPBS_RESERVATIONS_START_HOURS_LABEL?>",
                DOPBS_RESERVATIONS_END_HOURS_LABEL = "<?php echo DOPBS_RESERVATIONS_END_HOURS_LABEL?>",

                DOPBS_RESERVATIONS_FIRST_NAME_LABEL = "<?php echo DOPBS_RESERVATIONS_FIRST_NAME_LABEL?>",
                DOPBS_RESERVATIONS_LAST_NAME_LABEL = "<?php echo DOPBS_RESERVATIONS_LAST_NAME_LABEL?>",
                DOPBS_RESERVATIONS_STATUS_LABEL = "<?php echo DOPBS_RESERVATIONS_STATUS_LABEL?>",
                DOPBS_RESERVATIONS_STATUS_PENDING = "<?php echo DOPBS_RESERVATIONS_STATUS_PENDING?>",
                DOPBS_RESERVATIONS_STATUS_APPROVED = "<?php echo DOPBS_RESERVATIONS_STATUS_APPROVED?>",
                DOPBS_RESERVATIONS_DATE_CREATED_LABEL = "<?php echo DOPBS_RESERVATIONS_DATE_CREATED_LABEL?>",
                DOPBS_RESERVATIONS_PAYMENT_METHOD_LABEL = "<?php echo DOPBS_RESERVATIONS_PAYMENT_METHOD_LABEL?>",
                DOPBS_RESERVATIONS_PAYMENT_METHOD_ARRIVAL = "<?php echo DOPBS_RESERVATIONS_PAYMENT_METHOD_ARRIVAL?>",
                DOPBS_RESERVATIONS_PAYMENT_METHOD_PAYPAL = "<?php echo DOPBS_RESERVATIONS_PAYMENT_METHOD_PAYPAL?>",
                DOPBS_RESERVATIONS_PAYMENT_METHOD_PAYPAL_TRANSACTION_ID_LABEL = "<?php echo DOPBS_RESERVATIONS_PAYMENT_METHOD_PAYPAL_TRANSACTION_ID_LABEL?>",
                DOPBS_RESERVATIONS_TOTAL_PRICE_LABEL = "<?php echo DOPBS_RESERVATIONS_TOTAL_PRICE_LABEL?>",   
                DOPBS_RESERVATIONS_NO_ITEMS_LABEL = "<?php echo DOPBS_RESERVATIONS_NO_ITEMS_LABEL?>",
                DOPBS_RESERVATIONS_PRICE_LABEL = "<?php echo DOPBS_RESERVATIONS_PRICE_LABEL?>",
                DOPBS_RESERVATIONS_EMAIL_LABEL = "<?php echo DOPBS_RESERVATIONS_EMAIL_LABEL?>",
                DOPBS_RESERVATIONS_PHONE_LABEL = "<?php echo DOPBS_RESERVATIONS_PHONE_LABEL?>",
                DOPBS_RESERVATIONS_NO_PEOPLE_LABEL = "<?php echo DOPBS_RESERVATIONS_NO_PEOPLE_LABEL?>",
                DOPBS_RESERVATIONS_NO_CHILDREN_LABEL = "<?php echo DOPBS_RESERVATIONS_NO_CHILDREN_LABEL?>",
                DOPBS_RESERVATIONS_MESSAGE_LABEL = "<?php echo DOPBS_RESERVATIONS_MESSAGE_LABEL?>",

                DOPBS_RESERVATIONS_JUMP_TO_DAY_LABEL = "<?php echo DOPBS_RESERVATIONS_JUMP_TO_DAY_LABEL?>",
                DOPBS_RESERVATIONS_APPROVE_LABEL = "<?php echo DOPBS_RESERVATIONS_APPROVE_LABEL?>",
                DOPBS_RESERVATIONS_REJECT_LABEL = "<?php echo DOPBS_RESERVATIONS_REJECT_LABEL?>",
                DOPBS_RESERVATIONS_CANCEL_LABEL = "<?php echo DOPBS_RESERVATIONS_CANCEL_LABEL?>",

                DOPBS_RESERVATIONS_APPROVE_CONFIRMATION = "<?php echo DOPBS_RESERVATIONS_APPROVE_CONFIRMATION?>",
                DOPBS_RESERVATIONS_APPROVE_SUCCESS = "<?php echo DOPBS_RESERVATIONS_APPROVE_SUCCESS?>",
                DOPBS_RESERVATIONS_REJECT_CONFIRMATION = "<?php echo DOPBS_RESERVATIONS_REJECT_CONFIRMATION?>",
                DOPBS_RESERVATIONS_REJECT_SUCCESS = "<?php echo DOPBS_RESERVATIONS_REJECT_SUCCESS?>",
                DOPBS_RESERVATIONS_CANCEL_CONFIRMATION = "<?php echo DOPBS_RESERVATIONS_CANCEL_CONFIRMATION?>",
                DOPBS_RESERVATIONS_CANCEL_SUCCESS = "<?php echo DOPBS_RESERVATIONS_CANCEL_SUCCESS?>",

                // TinyMCE
                DOPBS_TINYMCE_ADD = "<?php echo DOPBS_TINYMCE_ADD?>",

                // Settings
                DOPBS_GENERAL_STYLES_SETTINGS = "<?php echo DOPBS_GENERAL_STYLES_SETTINGS?>",
                DOPBS_CALENDAR_NAME = "<?php echo DOPBS_CALENDAR_NAME?>",
                DOPBS_AVAILABLE_DAYS = "<?php echo DOPBS_AVAILABLE_DAYS?>",
                DOPBS_FIRST_DAY = "<?php echo DOPBS_FIRST_DAY?>",
                DOPBS_CURRENCY = "<?php echo DOPBS_CURRENCY?>",
                DOPBS_DATE_TYPE = "<?php echo DOPBS_DATE_TYPE?>",
                DOPBS_PREDEFINED = "<?php echo DOPBS_PREDEFINED?>",
                DOPBS_TEMPLATE = "<?php echo DOPBS_TEMPLATE?>",
                DOPBS_MIN_STAY = "<?php echo DOPBS_MIN_STAY?>",
                DOPBS_MAX_STAY = "<?php echo DOPBS_MAX_STAY?>",
                DOPBS_NO_ITEMS_ENABLED = "<?php echo DOPBS_NO_ITEMS_ENABLED?>",
                DOPBS_VIEW_ONLY = "<?php echo DOPBS_VIEW_ONLY?>",
                DOPBS_PAGE_URL = "<?php echo DOPBS_PAGE_URL?>",

                DOPBS_NOTIFICATIONS_STYLES_SETTINGS = "<?php echo DOPBS_NOTIFICATIONS_STYLES_SETTINGS?>",
                DOPBS_NOTIFICATIONS_TEMPLATE = "<?php echo DOPBS_NOTIFICATIONS_TEMPLATE?>",
                DOPBS_NOTIFICATIONS_EMAIL = "<?php echo DOPBS_NOTIFICATIONS_EMAIL?>",
                DOPBS_NOTIFICATIONS_SMTP_ENABLED = "<?php echo DOPBS_NOTIFICATIONS_SMTP_ENABLED?>",
                DOPBS_NOTIFICATIONS_SMTP_HOST_NAME = "<?php echo DOPBS_NOTIFICATIONS_SMTP_HOST_NAME?>",
                DOPBS_NOTIFICATIONS_SMTP_HOST_PORT = "<?php echo DOPBS_NOTIFICATIONS_SMTP_HOST_PORT?>",
                DOPBS_NOTIFICATIONS_SMTP_SSL = "<?php echo DOPBS_NOTIFICATIONS_SMTP_SSL?>",
                DOPBS_NOTIFICATIONS_SMTP_USER = "<?php echo DOPBS_NOTIFICATIONS_SMTP_USER?>",
                DOPBS_NOTIFICATIONS_SMTP_PASSWORD = "<?php echo DOPBS_NOTIFICATIONS_SMTP_PASSWORD?>",

                DOPBS_HOURS_STYLES_SETTINGS = "<?php echo DOPBS_HOURS_STYLES_SETTINGS?>",
                DOPBS_MULTIPLE_DAYS_SELECT = "<?php echo DOPBS_MULTIPLE_DAYS_SELECT?>",
                DOPBS_MORNING_CHECK_OUT = "<?php echo DOPBS_MORNING_CHECK_OUT?>",
                DOPBS_HOURS_ENABLED = "<?php echo DOPBS_HOURS_ENABLED?>",
                DOPBS_HOURS_DEFINITIONS = "<?php echo DOPBS_HOURS_DEFINITIONS?>",
                DOPBS_MULTIPLE_HOURS_SELECT = "<?php echo DOPBS_MULTIPLE_HOURS_SELECT?>",
                DOPBS_HOURS_AMPM = "<?php echo DOPBS_HOURS_AMPM?>",
                DOPBS_LAST_HOUR_TO_TOTAL_PRICE = "<?php echo DOPBS_LAST_HOUR_TO_TOTAL_PRICE?>",
                DOPBS_HOURS_INTERVAL_ENABLED = "<?php echo DOPBS_HOURS_INTERVAL_ENABLED?>",

                DOPBS_DISCOUNTS_NO_DAYS_SETTINGS = "<?php echo DOPBS_DISCOUNTS_NO_DAYS_SETTINGS?>",
                DOPBS_DISCOUNTS_NO_DAYS = "<?php echo DOPBS_DISCOUNTS_NO_DAYS?>",
                DOPBS_DISCOUNTS_NO_DAYS_DAYS = "<?php echo DOPBS_DISCOUNTS_NO_DAYS_DAYS?>",

                DOPBS_DEPOSIT_SETTINGS = "<?php echo DOPBS_DEPOSIT_SETTINGS?>",
                DOPBS_DEPOSIT = "<?php echo DOPBS_DEPOSIT?>",

                DOPBS_FORM_STYLES_SETTINGS = "<?php echo DOPBS_FORM_STYLES_SETTINGS?>",
                DOPBS_FORM = "<?php echo DOPBS_FORM?>",
                DOPBS_INSTANT_BOOKING_ENABLED = "<?php echo DOPBS_INSTANT_BOOKING_ENABLED?>",
                DOPBS_NO_PEOPLE_ENABLED = "<?php echo DOPBS_NO_PEOPLE_ENABLED?>",
                DOPBS_MIN_NO_PEOPLE = "<?php echo DOPBS_MIN_NO_PEOPLE?>",
                DOPBS_MAX_NO_PEOPLE = "<?php echo DOPBS_MAX_NO_PEOPLE?>",
                DOPBS_NO_CHILDREN_ENABLED = "<?php echo DOPBS_NO_CHILDREN_ENABLED?>",
                DOPBS_MIN_NO_CHILDREN = "<?php echo DOPBS_MIN_NO_CHILDREN?>",
                DOPBS_MAX_NO_CHILDREN = "<?php echo DOPBS_MAX_NO_CHILDREN?>",
                DOPBS_PAYMENT_ARRIVAL_ENABLED = "<?php echo DOPBS_PAYMENT_ARRIVAL_ENABLED?>",

                DOPBS_PAYMENT_PAYPAL_STYLES_SETTINGS = "<?php echo DOPBS_PAYMENT_PAYPAL_STYLES_SETTINGS?>",
                DOPBS_PAYMENT_PAYPAL_ENABLED = "<?php echo DOPBS_PAYMENT_PAYPAL_ENABLED?>",
                DOPBS_PAYMENT_PAYPAL_USERNAME = "<?php echo DOPBS_PAYMENT_PAYPAL_USERNAME?>",
                DOPBS_PAYMENT_PAYPAL_PASSWORD = "<?php echo DOPBS_PAYMENT_PAYPAL_PASSWORD?>",
                DOPBS_PAYMENT_PAYPAL_SIGNATURE = "<?php echo DOPBS_PAYMENT_PAYPAL_SIGNATURE?>",
                DOPBS_PAYMENT_PAYPAL_CREDIT_CARD = "<?php echo DOPBS_PAYMENT_PAYPAL_CREDIT_CARD?>",
                DOPBS_PAYMENT_PAYPAL_SANDBOX_ENABLED = "<?php echo DOPBS_PAYMENT_PAYPAL_SANDBOX_ENABLED?>",

                DOPBS_TERMS_AND_CONDITIONS_ENABLED = "<?php echo DOPBS_TERMS_AND_CONDITIONS_ENABLED?>",
                DOPBS_TERMS_AND_CONDITIONS_LINK = "<?php echo DOPBS_TERMS_AND_CONDITIONS_LINK?>",

                DOPBS_GO_TOP = "<?php echo DOPBS_GO_TOP?>",
                DOPBS_SHOW = "<?php echo DOPBS_SHOW?>",
                DOPBS_HIDE = "<?php echo DOPBS_HIDE?>",

                // Settings Info
                DOPBS_CALENDAR_NAME_INFO = "<?php echo DOPBS_CALENDAR_NAME_INFO?>",
                DOPBS_AVAILABLE_DAYS_INFO = "<?php echo DOPBS_AVAILABLE_DAYS_INFO?>",
                DOPBS_FIRST_DAY_INFO = "<?php echo DOPBS_FIRST_DAY_INFO?>",
                DOPBS_CURRENCY_INFO = "<?php echo DOPBS_CURRENCY_INFO?>",
                DOPBS_DATE_TYPE_INFO = "<?php echo DOPBS_DATE_TYPE_INFO?>",
                DOPBS_PREDEFINED_INFO = "<?php echo DOPBS_PREDEFINED_INFO?>",
                DOPBS_TEMPLATE_INFO = "<?php echo DOPBS_TEMPLATE_INFO?>",
                DOPBS_MIN_STAY_INFO = "<?php echo DOPBS_MIN_STAY_INFO?>",
                DOPBS_MAX_STAY_INFO = "<?php echo DOPBS_MAX_STAY_INFO?>",
                DOPBS_NO_ITEMS_ENABLED_INFO = "<?php echo DOPBS_NO_ITEMS_ENABLED_INFO?>",
                DOPBS_VIEW_ONLY_INFO = "<?php echo DOPBS_VIEW_ONLY_INFO?>",
                DOPBS_PAGE_URL_INFO = "<?php echo DOPBS_PAGE_URL_INFO?>",

                DOPBS_NOTIFICATIONS_TEMPLATE_INFO = "<?php echo DOPBS_NOTIFICATIONS_TEMPLATE_INFO?>",
                DOPBS_NOTIFICATIONS_EMAIL_INFO = "<?php echo DOPBS_NOTIFICATIONS_EMAIL_INFO?>",
                DOPBS_NOTIFICATIONS_SMTP_ENABLED_INFO = "<?php echo DOPBS_NOTIFICATIONS_SMTP_ENABLED_INFO?>",
                DOPBS_NOTIFICATIONS_SMTP_HOST_NAME_INFO = "<?php echo DOPBS_NOTIFICATIONS_SMTP_HOST_NAME_INFO?>",
                DOPBS_NOTIFICATIONS_SMTP_HOST_PORT_INFO = "<?php echo DOPBS_NOTIFICATIONS_SMTP_HOST_PORT_INFO?>",
                DOPBS_NOTIFICATIONS_SMTP_SSL_INFO = "<?php echo DOPBS_NOTIFICATIONS_SMTP_SSL_INFO?>",
                DOPBS_NOTIFICATIONS_SMTP_USER_INFO = "<?php echo DOPBS_NOTIFICATIONS_SMTP_USER_INFO?>",
                DOPBS_NOTIFICATIONS_SMTP_PASSWORD_INFO = "<?php echo DOPBS_NOTIFICATIONS_SMTP_PASSWORD_INFO?>",

                DOPBS_MULTIPLE_DAYS_SELECT_INFO = "<?php echo DOPBS_MULTIPLE_DAYS_SELECT_INFO?>",
                DOPBS_MORNING_CHECK_OUT_INFO = "<?php echo DOPBS_MORNING_CHECK_OUT_INFO?>",
                DOPBS_HOURS_ENABLED_INFO = "<?php echo DOPBS_HOURS_ENABLED_INFO?>",
                DOPBS_HOURS_DEFINITIONS_INFO = "<?php echo DOPBS_HOURS_DEFINITIONS_INFO?>",
                DOPBS_MULTIPLE_HOURS_SELECT_INFO = "<?php echo DOPBS_MULTIPLE_HOURS_SELECT_INFO?>",
                DOPBS_HOURS_AMPM_INFO = "<?php echo DOPBS_HOURS_AMPM_INFO?>",
                DOPBS_LAST_HOUR_TO_TOTAL_PRICE_INFO = "<?php echo DOPBS_LAST_HOUR_TO_TOTAL_PRICE_INFO?>",
                DOPBS_HOURS_INTERVAL_ENABLED_INFO = "<?php echo DOPBS_HOURS_INTERVAL_ENABLED_INFO?>",

                DOPBS_DISCOUNTS_NO_DAYS_INFO = "<?php echo DOPBS_DISCOUNTS_NO_DAYS_INFO?>",
                DOPBS_DISCOUNTS_NO_DAYS_DAYS_INFO = "<?php echo DOPBS_DISCOUNTS_NO_DAYS_DAYS_INFO?>",

                DOPBS_DEPOSIT_INFO = "<?php echo DOPBS_DEPOSIT_INFO?>",

                DOPBS_FORM_INFO = "<?php echo DOPBS_FORM_INFO?>",
                DOPBS_INSTANT_BOOKING_ENABLED_INFO = "<?php echo DOPBS_INSTANT_BOOKING_ENABLED_INFO?>",
                DOPBS_NO_PEOPLE_ENABLED_INFO = "<?php echo DOPBS_NO_PEOPLE_ENABLED_INFO?>",
                DOPBS_MIN_NO_PEOPLE_INFO = "<?php echo DOPBS_MIN_NO_PEOPLE_INFO?>",
                DOPBS_MAX_NO_PEOPLE_INFO = "<?php echo DOPBS_MAX_NO_PEOPLE_INFO?>",
                DOPBS_NO_CHILDREN_ENABLED_INFO = "<?php echo DOPBS_NO_CHILDREN_ENABLED_INFO?>",
                DOPBS_MIN_NO_CHILDREN_INFO = "<?php echo DOPBS_MIN_NO_CHILDREN_INFO?>",
                DOPBS_MAX_NO_CHILDREN_INFO = "<?php echo DOPBS_MAX_NO_CHILDREN_INFO?>",
                DOPBS_PAYMENT_ARRIVAL_ENABLED_INFO = "<?php echo DOPBS_PAYMENT_ARRIVAL_ENABLED_INFO?>",

                DOPBS_PAYMENT_PAYPAL_ENABLED_INFO = "<?php echo DOPBS_PAYMENT_PAYPAL_ENABLED_INFO?>",   
                DOPBS_PAYMENT_PAYPAL_USERNAME_INFO = "<?php echo DOPBS_PAYMENT_PAYPAL_USERNAME_INFO?>",
                DOPBS_PAYMENT_PAYPAL_PASSWORD_INFO = "<?php echo DOPBS_PAYMENT_PAYPAL_PASSWORD_INFO?>",  
                DOPBS_PAYMENT_PAYPAL_SIGNATURE_INFO = "<?php echo DOPBS_PAYMENT_PAYPAL_SIGNATURE_INFO?>",
                DOPBS_PAYMENT_PAYPAL_CREDIT_CARD_INFO = "<?php echo DOPBS_PAYMENT_PAYPAL_CREDIT_CARD_INFO?>",
                DOPBS_PAYMENT_PAYPAL_SANDBOX_ENABLED_INFO = "<?php echo DOPBS_PAYMENT_PAYPAL_SANDBOX_ENABLED_INFO?>",

                DOPBS_TERMS_AND_CONDITIONS_ENABLED_INFO = "<?php echo DOPBS_TERMS_AND_CONDITIONS_ENABLED_INFO?>",
                DOPBS_TERMS_AND_CONDITIONS_LINK_INFO = "<?php echo DOPBS_TERMS_AND_CONDITIONS_LINK_INFO?>",
    
                // Booking Forms
                DOPBS_TITLE_BOOKING_FORMS = "<?php echo DOPBS_TITLE_BOOKING_FORMS?>",
                DOPBS_BOOKING_FORMS_HELP = "<?php echo DOPBS_BOOKING_FORMS_HELP?>",
                DOPBS_BOOKING_FORMS_LOADED = "<?php echo DOPBS_BOOKING_FORMS_LOADED?>",
                DOPBS_BOOKING_FORM_SETTINGS_HELP = "<?php echo DOPBS_BOOKING_FORM_SETTINGS_HELP?>",
                DOPBS_BOOKING_FORM_LOADED = "<?php echo DOPBS_BOOKING_FORM_LOADED?>",
                DOPBS_NO_BOOKING_FORMS = "<?php echo DOPBS_NO_BOOKING_FORMS?>",

                // Add Booking Form
                DOPBS_ADD_BOOKING_FORM_NAME = "<?php echo DOPBS_ADD_BOOKING_FORM_NAME?>",

                // Edit Booking Form
                DOPBS_EDIT_BOOKING_FORM_SUBMIT = "<?php echo DOPBS_EDIT_BOOKING_FORM_SUBMIT?>",
                DOPBS_EDIT_BOOKING_FORM_SUCCESS = "<?php echo DOPBS_EDIT_BOOKING_FORM_SUCCESS?>",

                // Booking Form Fields
                DOPBS_BOOKING_FORM_NAME = "<?php echo DOPBS_BOOKING_FORM_NAME?>",
                DOPBS_BOOKING_FORM_NAME_DEFAULT = "<?php echo DOPBS_BOOKING_FORM_NAME_DEFAULT?>",
                DOPBS_BOOKING_FORM_FIELDS_TITLE = "<?php echo DOPBS_BOOKING_FORM_FIELDS_TITLE?>",
                DOPBS_BOOKING_FORM_FIELDS_SHOW_SETTINGS = "<?php echo DOPBS_BOOKING_FORM_FIELDS_SHOW_SETTINGS?>",
                DOPBS_BOOKING_FORM_FIELDS_HIDE_SETTINGS = "<?php echo DOPBS_BOOKING_FORM_FIELDS_HIDE_SETTINGS?>",
                DOPBS_BOOKING_FORM_FIELDS_TYPE_TEXT_LABEL = "<?php echo DOPBS_BOOKING_FORM_FIELDS_TYPE_TEXT_LABEL?>",
                DOPBS_BOOKING_FORM_FIELDS_TYPE_TEXTAREA_LABEL = "<?php echo DOPBS_BOOKING_FORM_FIELDS_TYPE_TEXTAREA_LABEL?>",
                DOPBS_BOOKING_FORM_FIELDS_TYPE_CHECKBOX_LABEL = "<?php echo DOPBS_BOOKING_FORM_FIELDS_TYPE_CHECKBOX_LABEL?>",
                DOPBS_BOOKING_FORM_FIELDS_TYPE_SELECT_LABEL = "<?php echo DOPBS_BOOKING_FORM_FIELDS_TYPE_SELECT_LABEL?>",
                DOPBS_BOOKING_FORM_FIELDS_LANGUAGE_LABEL = "<?php echo DOPBS_BOOKING_FORM_FIELDS_LANGUAGE_LABEL?>",
                DOPBS_BOOKING_FORM_FIELDS_NAME_LABEL = "<?php echo DOPBS_BOOKING_FORM_FIELDS_NAME_LABEL?>",
                DOPBS_BOOKING_FORM_FIELDS_NEW_FIELD_TEXT_LABEL = "<?php echo DOPBS_BOOKING_FORM_FIELDS_NEW_FIELD_TEXT_LABEL?>",
                DOPBS_BOOKING_FORM_FIELDS_NEW_FIELD_TEXTAREA_LABEL = "<?php echo DOPBS_BOOKING_FORM_FIELDS_NEW_FIELD_TEXTAREA_LABEL?>",
                DOPBS_BOOKING_FORM_FIELDS_NEW_FIELD_CHECKBOX_LABEL = "<?php echo DOPBS_BOOKING_FORM_FIELDS_NEW_FIELD_CHECKBOX_LABEL?>",
                DOPBS_BOOKING_FORM_FIELDS_NEW_FIELD_SELECT_LABEL = "<?php echo DOPBS_BOOKING_FORM_FIELDS_NEW_FIELD_SELECT_LABEL?>",
                DOPBS_BOOKING_FORM_FIELDS_ALLOWED_CHARACTERS_LABEL = "<?php echo DOPBS_BOOKING_FORM_FIELDS_ALLOWED_CHARACTERS_LABEL?>",
                DOPBS_BOOKING_FORM_FIELDS_SIZE_LABEL = "<?php echo DOPBS_BOOKING_FORM_FIELDS_SIZE_LABEL?>",
                DOPBS_BOOKING_FORM_FIELDS_EMAIL_LABEL = "<?php echo DOPBS_BOOKING_FORM_FIELDS_EMAIL_LABEL?>",
                DOPBS_BOOKING_FORM_FIELDS_REQUIRED_LABEL = "<?php echo DOPBS_BOOKING_FORM_FIELDS_REQUIRED_LABEL?>",
                DOPBS_BOOKING_FORM_FIELDS_SELECT_OPTIONS_LABEL = "<?php echo DOPBS_BOOKING_FORM_FIELDS_SELECT_OPTIONS_LABEL?>",
                DOPBS_BOOKING_FORM_FIELDS_SELECT_ADD_OPTION = "<?php echo DOPBS_BOOKING_FORM_FIELDS_SELECT_ADD_OPTION?>",
                DOPBS_BOOKING_FORM_FIELDS_SELECT_NEW_OPTION_LABEL = "<?php echo DOPBS_BOOKING_FORM_FIELDS_SELECT_NEW_OPTION_LABEL?>",
                DOPBS_BOOKING_FORM_FIELDS_SELECT_DELETE_OPTION = "<?php echo DOPBS_BOOKING_FORM_FIELDS_SELECT_DELETE_OPTION?>",
                DOPBS_BOOKING_FORM_FIELDS_SELECT_MULTIPLE_SELECT_LABEL = "<?php echo DOPBS_BOOKING_FORM_FIELDS_SELECT_MULTIPLE_SELECT_LABEL?>",

                // Booking Form Fields Info
                DOPBS_BOOKING_FORM_NAME_INFO = "<?php echo DOPBS_BOOKING_FORM_NAME_INFO?>",
                DOPBS_BOOKING_FORM_FIELDS_LANGUAGE_INFO = "<?php echo DOPBS_BOOKING_FORM_FIELDS_LANGUAGE_INFO?>",
                DOPBS_BOOKING_FORM_FIELDS_NAME_INFO = "<?php echo DOPBS_BOOKING_FORM_FIELDS_NAME_INFO?>",
                DOPBS_BOOKING_FORM_FIELDS_ALLOWED_CHARACTERS_INFO = "<?php echo DOPBS_BOOKING_FORM_FIELDS_ALLOWED_CHARACTERS_INFO?>",
                DOPBS_BOOKING_FORM_FIELDS_SIZE_INFO = "<?php echo DOPBS_BOOKING_FORM_FIELDS_SIZE_INFO?>",
                DOPBS_BOOKING_FORM_FIELDS_EMAIL_INFO = "<?php echo DOPBS_BOOKING_FORM_FIELDS_EMAIL_INFO?>",
                DOPBS_BOOKING_FORM_FIELDS_REQUIRED_INFO = "<?php echo DOPBS_BOOKING_FORM_FIELDS_REQUIRED_INFO?>",
                DOPBS_BOOKING_FORM_FIELDS_SELECT_OPTIONS_INFO = "<?php echo DOPBS_BOOKING_FORM_FIELDS_SELECT_OPTIONS_INFO?>",
                DOPBS_BOOKING_FORM_FIELDS_SELECT_MULTIPLE_SELECT_INFO = "<?php echo DOPBS_BOOKING_FORM_FIELDS_SELECT_MULTIPLE_SELECT_INFO?>",
    
                // Help
                DOPBS_HELP_DOCUMENTATION = "<?php echo DOPBS_HELP_DOCUMENTATION?>",
                DOPBS_HELP_FAQ = "<?php echo DOPBS_HELP_FAQ?>";
            </script>
<?php  
            }
            
            function returnLanguages(){ // List languages select.
                $current_backend_language = get_option('DOPBS_backend_language_'.wp_get_current_user()->ID);
                
                if ($current_backend_language == ''){
                    $current_backend_language = 'en';
                    add_option('DOPBS_backend_language_'.wp_get_current_user()->ID, 'en');
                }
?>
                <select id="DOPBS-admin-translation" onchange="dopbsChangeTranslation()">
                    <option value="af"<?php echo $current_backend_language == 'af' ? ' selected="selected"':''?>>Afrikaans (Afrikaans)</option>
                    <option value="al"<?php echo $current_backend_language == 'al' ? ' selected="selected"':''?>>Albanian (Shqiptar)</option>
                    <option value="ar"<?php echo $current_backend_language == 'ar' ? ' selected="selected"':''?>>Arabic (>العربية)</option>
                    <option value="az"<?php echo $current_backend_language == 'az' ? ' selected="selected"':''?>>Azerbaijani (Azərbaycan)</option>
                    <option value="bs"<?php echo $current_backend_language == 'bs' ? ' selected="selected"':''?>>Basque (Euskal)</option>
                    <option value="by"<?php echo $current_backend_language == 'by' ? ' selected="selected"':''?>>Belarusian (Беларускай)</option>
                    <option value="bg"<?php echo $current_backend_language == 'bg' ? ' selected="selected"':''?>>Bulgarian (Български)</option>
                    <option value="ca"<?php echo $current_backend_language == 'ca' ? ' selected="selected"':''?>>Catalan (Català)</option>
                    <option value="cn"<?php echo $current_backend_language == 'cn' ? ' selected="selected"':''?>>Chinese (中国的)</option>
                    <option value="cr"<?php echo $current_backend_language == 'cr' ? ' selected="selected"':''?>>Croatian (Hrvatski)</option>
                    <option value="cz"<?php echo $current_backend_language == 'cz' ? ' selected="selected"':''?>>Czech (Český)</option>
                    <option value="dk"<?php echo $current_backend_language == 'dk' ? ' selected="selected"':''?>>Danish (Dansk)</option>
                    <option value="du"<?php echo $current_backend_language == 'du' ? ' selected="selected"':''?>>Dutch (Nederlands)</option>
                    <option value="en"<?php echo $current_backend_language == 'en' ? ' selected="selected"':''?>>English</option>
                    <option value="eo"<?php echo $current_backend_language == 'eo' ? ' selected="selected"':''?>>Esperanto (Esperanto)</option>
                    <option value="et"<?php echo $current_backend_language == 'et' ? ' selected="selected"':''?>>Estonian (Eesti)</option>
                    <option value="fl"<?php echo $current_backend_language == 'fl' ? ' selected="selected"':''?>>Filipino (na Filipino)</option>
                    <option value="fi"<?php echo $current_backend_language == 'fi' ? ' selected="selected"':''?>>Finnish (Suomi)</option>
                    <option value="fr"<?php echo $current_backend_language == 'fr' ? ' selected="selected"':''?>>French (Français)</option>
                    <option value="gl"<?php echo $current_backend_language == 'gl' ? ' selected="selected"':''?>>Galician (Galego)</option>
                    <option value="de"<?php echo $current_backend_language == 'de' ? ' selected="selected"':''?>>German (Deutsch)</option>
                    <option value="gr"<?php echo $current_backend_language == 'gr' ? ' selected="selected"':''?>>Greek (Ɛλληνικά)</option>
                    <option value="ha"<?php echo $current_backend_language == 'ha' ? ' selected="selected"':''?>>Haitian Creole (Kreyòl Ayisyen)</option>
                    <option value="he"<?php echo $current_backend_language == 'he' ? ' selected="selected"':''?>>Hebrew (עברית)</option>
                    <option value="hi"<?php echo $current_backend_language == 'hi' ? ' selected="selected"':''?>>Hindi (हिंदी)</option>
                    <option value="hu"<?php echo $current_backend_language == 'hu' ? ' selected="selected"':''?>>Hungarian (Magyar)</option>
                    <option value="is"<?php echo $current_backend_language == 'is' ? ' selected="selected"':''?>>Icelandic (Íslenska)</option>
                    <option value="id"<?php echo $current_backend_language == 'id' ? ' selected="selected"':''?>>Indonesian (Indonesia)</option>
                    <option value="ir"<?php echo $current_backend_language == 'ir' ? ' selected="selected"':''?>>Irish (Gaeilge)</option>
                    <option value="it"<?php echo $current_backend_language == 'it' ? ' selected="selected"':''?>>Italian (Italiano)</option>
                    <option value="ja"<?php echo $current_backend_language == 'ja' ? ' selected="selected"':''?>>Japanese (日本の)</option>
                    <option value="ko"<?php echo $current_backend_language == 'ko' ? ' selected="selected"':''?>>Korean (한국의)</option>            
                    <option value="lv"<?php echo $current_backend_language == 'lv' ? ' selected="selected"':''?>>Latvian (Latvijas)</option>
                    <option value="lt"<?php echo $current_backend_language == 'lt' ? ' selected="selected"':''?>>Lithuanian (Lietuvos)</option>            
                    <option value="mk"<?php echo $current_backend_language == 'mk' ? ' selected="selected"':''?>>Macedonian (македонски)</option>
                    <option value="mg"<?php echo $current_backend_language == 'mg' ? ' selected="selected"':''?>>Malay (Melayu)</option>
                    <option value="ma"<?php echo $current_backend_language == 'ma' ? ' selected="selected"':''?>>Maltese (Maltija)</option>
                    <option value="no"<?php echo $current_backend_language == 'no' ? ' selected="selected"':''?>>Norwegian (Norske)</option>            
                    <option value="pe"<?php echo $current_backend_language == 'pe' ? ' selected="selected"':''?>>Persian (فارسی)</option>
                    <option value="pl"<?php echo $current_backend_language == 'pl' ? ' selected="selected"':''?>>Polish (Polski)</option>
                    <option value="pt"<?php echo $current_backend_language == 'pt' ? ' selected="selected"':''?>>Portuguese (Português)</option>
                    <option value="ro"<?php echo $current_backend_language == 'ro' ? ' selected="selected"':''?>>Romanian (Română)</option>
                    <option value="ru"<?php echo $current_backend_language == 'ru' ? ' selected="selected"':''?>>Russian (Pусский)</option>
                    <option value="sr"<?php echo $current_backend_language == 'sr' ? ' selected="selected"':''?>>Serbian (Cрпски)</option>
                    <option value="sk"<?php echo $current_backend_language == 'sk' ? ' selected="selected"':''?>>Slovak (Slovenských)</option>
                    <option value="sl"<?php echo $current_backend_language == 'sl' ? ' selected="selected"':''?>>Slovenian (Slovenski)</option>
                    <option value="sp"<?php echo $current_backend_language == 'sp' ? ' selected="selected"':''?>>Spanish (Español)</option>
                    <option value="sw"<?php echo $current_backend_language == 'sw' ? ' selected="selected"':''?>>Swahili (Kiswahili)</option>
                    <option value="se"<?php echo $current_backend_language == 'se' ? ' selected="selected"':''?>>Swedish (Svenskt)</option>
                    <option value="th"<?php echo $current_backend_language == 'th' ? ' selected="selected"':''?>>Thai (ภาษาไทย)</option>
                    <option value="tr"<?php echo $current_backend_language == 'tr' ? ' selected="selected"':''?>>Turkish (Türk)</option>
                    <option value="uk"<?php echo $current_backend_language == 'uk' ? ' selected="selected"':''?>>Ukrainian (Український)</option>
                    <option value="ur"<?php echo $current_backend_language == 'ur' ? ' selected="selected"':''?>>Urdu (اردو)</option>
                    <option value="vi"<?php echo $current_backend_language == 'vi' ? ' selected="selected"':''?>>Vietnamese (Việt)</option>
                    <option value="we"<?php echo $current_backend_language == 'we' ? ' selected="selected"':''?>>Welsh (Cymraeg)</option>
                    <option value="yi"<?php echo $current_backend_language == 'yi' ? ' selected="selected"':''?>>Yiddish (ייִדיש)</option>
                </select>                    
<?php  
            }
            
            function returnBookingFormLanguages(){ // List languages select.
                $current_backend_language = get_option('DOPBS_backend_language_'.wp_get_current_user()->ID);
                
                if ($current_backend_language == ''){
                    $current_backend_language = 'en';
                }
?>
                <select id="DOPBS-admin-form-field-language-<?=$field_id?>" onchange="dopbsTranslationBookingFormField(this.value)">
                    <option value="af"<?php echo $current_backend_language == 'af' ? ' selected="selected"':''?>>Afrikaans (Afrikaans)</option>
                    <option value="al"<?php echo $current_backend_language == 'al' ? ' selected="selected"':''?>>Albanian (Shqiptar)</option>
                    <option value="ar"<?php echo $current_backend_language == 'ar' ? ' selected="selected"':''?>>Arabic (>العربية)</option>
                    <option value="az"<?php echo $current_backend_language == 'az' ? ' selected="selected"':''?>>Azerbaijani (Azərbaycan)</option>
                    <option value="bs"<?php echo $current_backend_language == 'bs' ? ' selected="selected"':''?>>Basque (Euskal)</option>
                    <option value="by"<?php echo $current_backend_language == 'by' ? ' selected="selected"':''?>>Belarusian (Беларускай)</option>
                    <option value="bg"<?php echo $current_backend_language == 'bg' ? ' selected="selected"':''?>>Bulgarian (Български)</option>
                    <option value="ca"<?php echo $current_backend_language == 'ca' ? ' selected="selected"':''?>>Catalan (Català)</option>
                    <option value="cn"<?php echo $current_backend_language == 'cn' ? ' selected="selected"':''?>>Chinese (中国的)</option>
                    <option value="cr"<?php echo $current_backend_language == 'cr' ? ' selected="selected"':''?>>Croatian (Hrvatski)</option>
                    <option value="cz"<?php echo $current_backend_language == 'cz' ? ' selected="selected"':''?>>Czech (Český)</option>
                    <option value="dk"<?php echo $current_backend_language == 'dk' ? ' selected="selected"':''?>>Danish (Dansk)</option>
                    <option value="du"<?php echo $current_backend_language == 'du' ? ' selected="selected"':''?>>Dutch (Nederlands)</option>
                    <option value="en"<?php echo $current_backend_language == 'en' ? ' selected="selected"':''?>>English</option>
                    <option value="eo"<?php echo $current_backend_language == 'eo' ? ' selected="selected"':''?>>Esperanto (Esperanto)</option>
                    <option value="et"<?php echo $current_backend_language == 'et' ? ' selected="selected"':''?>>Estonian (Eesti)</option>
                    <option value="fl"<?php echo $current_backend_language == 'fl' ? ' selected="selected"':''?>>Filipino (na Filipino)</option>
                    <option value="fi"<?php echo $current_backend_language == 'fi' ? ' selected="selected"':''?>>Finnish (Suomi)</option>
                    <option value="fr"<?php echo $current_backend_language == 'fr' ? ' selected="selected"':''?>>French (Français)</option>
                    <option value="gl"<?php echo $current_backend_language == 'gl' ? ' selected="selected"':''?>>Galician (Galego)</option>
                    <option value="de"<?php echo $current_backend_language == 'de' ? ' selected="selected"':''?>>German (Deutsch)</option>
                    <option value="gr"<?php echo $current_backend_language == 'gr' ? ' selected="selected"':''?>>Greek (Ɛλληνικά)</option>
                    <option value="ha"<?php echo $current_backend_language == 'ha' ? ' selected="selected"':''?>>Haitian Creole (Kreyòl Ayisyen)</option>
                    <option value="he"<?php echo $current_backend_language == 'he' ? ' selected="selected"':''?>>Hebrew (עברית)</option>
                    <option value="hi"<?php echo $current_backend_language == 'hi' ? ' selected="selected"':''?>>Hindi (हिंदी)</option>
                    <option value="hu"<?php echo $current_backend_language == 'hu' ? ' selected="selected"':''?>>Hungarian (Magyar)</option>
                    <option value="is"<?php echo $current_backend_language == 'is' ? ' selected="selected"':''?>>Icelandic (Íslenska)</option>
                    <option value="id"<?php echo $current_backend_language == 'id' ? ' selected="selected"':''?>>Indonesian (Indonesia)</option>
                    <option value="ir"<?php echo $current_backend_language == 'ir' ? ' selected="selected"':''?>>Irish (Gaeilge)</option>
                    <option value="it"<?php echo $current_backend_language == 'it' ? ' selected="selected"':''?>>Italian (Italiano)</option>
                    <option value="ja"<?php echo $current_backend_language == 'ja' ? ' selected="selected"':''?>>Japanese (日本の)</option>
                    <option value="ko"<?php echo $current_backend_language == 'ko' ? ' selected="selected"':''?>>Korean (한국의)</option>            
                    <option value="lv"<?php echo $current_backend_language == 'lv' ? ' selected="selected"':''?>>Latvian (Latvijas)</option>
                    <option value="lt"<?php echo $current_backend_language == 'lt' ? ' selected="selected"':''?>>Lithuanian (Lietuvos)</option>            
                    <option value="mk"<?php echo $current_backend_language == 'mk' ? ' selected="selected"':''?>>Macedonian (македонски)</option>
                    <option value="mg"<?php echo $current_backend_language == 'mg' ? ' selected="selected"':''?>>Malay (Melayu)</option>
                    <option value="ma"<?php echo $current_backend_language == 'ma' ? ' selected="selected"':''?>>Maltese (Maltija)</option>
                    <option value="no"<?php echo $current_backend_language == 'no' ? ' selected="selected"':''?>>Norwegian (Norske)</option>            
                    <option value="pe"<?php echo $current_backend_language == 'pe' ? ' selected="selected"':''?>>Persian (فارسی)</option>
                    <option value="pl"<?php echo $current_backend_language == 'pl' ? ' selected="selected"':''?>>Polish (Polski)</option>
                    <option value="pt"<?php echo $current_backend_language == 'pt' ? ' selected="selected"':''?>>Portuguese (Português)</option>
                    <option value="ro"<?php echo $current_backend_language == 'ro' ? ' selected="selected"':''?>>Romanian (Română)</option>
                    <option value="ru"<?php echo $current_backend_language == 'ru' ? ' selected="selected"':''?>>Russian (Pусский)</option>
                    <option value="sr"<?php echo $current_backend_language == 'sr' ? ' selected="selected"':''?>>Serbian (Cрпски)</option>
                    <option value="sk"<?php echo $current_backend_language == 'sk' ? ' selected="selected"':''?>>Slovak (Slovenských)</option>
                    <option value="sl"<?php echo $current_backend_language == 'sl' ? ' selected="selected"':''?>>Slovenian (Slovenski)</option>
                    <option value="sp"<?php echo $current_backend_language == 'sp' ? ' selected="selected"':''?>>Spanish (Español)</option>
                    <option value="sw"<?php echo $current_backend_language == 'sw' ? ' selected="selected"':''?>>Swahili (Kiswahili)</option>
                    <option value="se"<?php echo $current_backend_language == 'se' ? ' selected="selected"':''?>>Swedish (Svenskt)</option>
                    <option value="th"<?php echo $current_backend_language == 'th' ? ' selected="selected"':''?>>Thai (ภาษาไทย)</option>
                    <option value="tr"<?php echo $current_backend_language == 'tr' ? ' selected="selected"':''?>>Turkish (Türk)</option>
                    <option value="uk"<?php echo $current_backend_language == 'uk' ? ' selected="selected"':''?>>Ukrainian (Український)</option>
                    <option value="ur"<?php echo $current_backend_language == 'ur' ? ' selected="selected"':''?>>Urdu (اردو)</option>
                    <option value="vi"<?php echo $current_backend_language == 'vi' ? ' selected="selected"':''?>>Vietnamese (Việt)</option>
                    <option value="we"<?php echo $current_backend_language == 'we' ? ' selected="selected"':''?>>Welsh (Cymraeg)</option>
                    <option value="yi"<?php echo $current_backend_language == 'yi' ? ' selected="selected"':''?>>Yiddish (ייִדיש)</option>
                </select>                    
<?php
            }

            function calendarsList(){// Return Template              
                if (class_exists("DOPBookingSystemBackEnd")){
                    $DOPBS_pluginSeries = new DOPBookingSystemBackEnd();
                }
                $this->returnTranslations();
?>            
    <div class="wrap DOPBS-admin">
<!-- Header -->
        <h2><?php echo DOPBS_TITLE?></h2>
        <div id="DOPBS-admin-message"></div>
        <?php $this->returnLanguages(); ?>
        <a href="http://help.dotonpaper.net/booking-system-wordpress-plugin.html#faq" target="_blank" class="DOPBS-help"><?php echo DOPBS_HELP_FAQ ?></a>
        <a href="http://help.dotonpaper.net/booking-system-wordpress-plugin.html" target="_blank" class="DOPBS-help"><?php echo DOPBS_HELP_DOCUMENTATION ?></a>
        <input type="hidden" id="calendar_id" value="" />
        <br class="DOPBS-clear" />

<!-- Content -->        
        <div class="main">
            <div class="column column1">
                <div class="column-header">
                    <a href="javascript:void()" class="header-help" title="<?php echo DOPBS_CALENDARS_HELP?>"></a>
                </div>
                <div class="column-content-container">
                    <div class="column-content">
                        &nbsp;
                    </div>
                </div>
            </div>
            <div class="column-separator"></div>
            <div class="column column2">
                <div class="column-header"></div>
                <div class="column-content-container">
                    <div class="column-content">
                        &nbsp;
                    </div>
                </div>
            </div>
            <div class="column-separator"></div>
            <div class="column column3">
                <div class="column-header"></div>
                <div class="column-content-container">
                    <div class="column-content">
                        &nbsp;
                    </div>
                </div>
            </div>
        </div>
        <br class="DOPBS-clear" />
    </div>
<?php
            }
            
            function bookingForms(){// Return Template              
                if (class_exists("DOPBookingSystemBackEnd")){
                    $DOPBS_pluginSeries = new DOPBookingSystemBackEnd();
                }
                $this->returnTranslations();
?>            
    <div class="wrap DOPBS-admin">
        <h2><?php echo DOPBS_TITLE_BOOKING_FORMS?></h2>
        <div id="DOPBS-admin-message"></div>
        <?php $this->returnLanguages(); ?>
        <a href="http://envato-help.dotonpaper.net/booking-system-pro-wordpress-plugin.html#faq" target="_blank" class="DOPBS-help"><?php echo DOPBS_HELP_FAQ ?></a>
        <a href="http://envato-help.dotonpaper.net/booking-system-pro-wordpress-plugin.html" target="_blank" class="DOPBS-help"><?php echo DOPBS_HELP_DOCUMENTATION ?></a>
        <input type="hidden" id="booking_form_id" value="" />
        <br class="DOPBS-clear" />
        <div class="main">
            <div class="column column1">
                <div class="column-header">
                    <a href="javascript:void()" class="header-help" title="<?php echo DOPBS_BOOKING_FORMS_HELP?>"></a>                    
                </div>
                <div class="column-content-container">
                    <div class="column-content">
                        &nbsp;
                    </div>
                </div>
            </div>
            <div class="column-separator"></div>
            <div class="column column2">
                <div class="column-header"></div>
                <div class="column-content-container">
                    <div class="column-content">
                        &nbsp;
                    </div>
                </div>
            </div>
            <div class="column-separator"></div>
            <div class="column column3">
                <div class="column-header"></div>
                <div class="column-content-container">
                    <div class="column-content">
                        &nbsp;
                    </div>
                </div>
            </div>
        </div>
        <br class="DOPBS-clear" />
    </div>
<?php
            }
        }
    }
?>