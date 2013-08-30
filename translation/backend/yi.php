<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 1.2
* File                    : yi.php
* File Version            : 1.0
* Created / Last Modified : 29 July 2013
* Author                  : Dot on Paper
* Copyright               : © 2013 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Yiddish Back End Translation.
* Translated by           : Dot on Paper
*/

    define('DOPBS_TITLE', "Booking System");

    // Loading ...
    define('DOPBS_LOAD', "Load data ...");

    // Save ...
    define('DOPBS_SAVE', "Save data ...");
    define('DOPBS_SAVE_SUCCESS', "Data has been saved.");
    
    // Months & Week Days
    global $DOPBS_month_names;
    $DOPBS_month_names = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    
    global $DOPBS_day_names;
    $DOPBS_day_names = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
    
    // Help
    define('DOPBS_CALENDARS_HELP', "Click on a calendar item to open the editing area.");
    define('DOPBS_CALENDAR_EDIT_HELP', "Select the days and hours to edit them. Click on the 'pencil' icon to edit calendar settings. Click on the 'mail' icon to see if you have reservations. Read documentation for more information.");
    define('DOPBS_CALENDAR_EDIT_SETTINGS_HELP', "Click 'Submit Button' to save changes. Click 'Back Button' to return to the calendar.");
    
    // Form
    define('DOPBS_SUBMIT', "Submit");
    define('DOPBS_DELETE', "Delete");
    define('DOPBS_BACK', "Back");
    define('DOPBS_BACK_SUBMIT', "Back to calendar.");
    define('DOPBS_ENABLED', "Enabled");
    define('DOPBS_DISABLED', "Disabled");
    define('DOPBS_DATE_TYPE_AMERICAN', "American (mm dd, yyyy)");
    define('DOPBS_DATE_TYPE_EUROPEAN', "European (dd mm yyyy)");

    // Calendars    
    define('DOPBS_SHOW_CALENDARS', "Calendars");
    define('DOPBS_CALENDARS_LOADED', "Calendars list loaded.");
    define('DOPBS_CALENDAR_LOADED', "Calendar loaded.");
    define('DOPBS_NO_CALENDARS', "No calendars.");    
    
    // Calendar 
    define('DOPBS_ADD_MONTH_VIEW', "Add Month View");
    define('DOPBS_REMOVE_MONTH_VIEW', "Remove Month View");
    define('DOPBS_PREVIOUS_MONTH', "Previous Month");
    define('DOPBS_NEXT_MONTH', "Next Month");
    define('DOPBS_AVAILABLE_ONE_TEXT', "available");
    define('DOPBS_AVAILABLE_TEXT', "available");
    define('DOPBS_BOOKED_TEXT', "booked");
    define('DOPBS_UNAVAILABLE_TEXT', "unavailable");
                            
    // Calendar Form 
    define('DOPBS_DATE_START_LABEL', "Start Date");
    define('DOPBS_DATE_END_LABEL', "End Date");    
    define('DOPBS_STATUS_LABEL', "Status");
    define('DOPBS_STATUS_AVAILABLE_TEXT', "Available");
    define('DOPBS_STATUS_BOOKED_TEXT', "Booked");
    define('DOPBS_STATUS_SPECIAL_TEXT', "Special");
    define('DOPBS_STATUS_UNAVAILABLE_TEXT', "Unavailable");
    define('DOPBS_PRICE_LABEL', "Price");    
    define('DOPBS_PROMO_LABEL', "Promo Price");               
    define('DOPBS_AVAILABLE_LABEL', "No. Available");         
    define('DOPBS_HOURS_DEFINITIONS_CHANGE_LABEL', "Change Hours Definitions (changing the definitions will overwrite any previous hours data)");
    define('DOPBS_HOURS_DEFINITIONS_LABEL', "Hours Definitions (hh:mm add one per line). Use only 24 hours format.");  
    define('DOPBS_HOURS_SET_DEFAULT_DATA_LABEL', "Set default hours values for this day(s). This will overwrite any existing data.)"); 
    define('DOPBS_HOURS_START_LABEL', "Start Hour"); 
    define('DOPBS_HOURS_END_LABEL', "End Hour");
    define('DOPBS_HOURS_INFO_LABEL', "Information (users will see this message)");
    define('DOPBS_HOURS_NOTES_LABEL', "Notes (only you will see this message)");
    define('DOPBS_GROUP_DAYS_LABEL', "Group Days");
    define('DOPBS_GROUP_HOURS_LABEL', "Group Hours");
    define('DOPBS_RESET_CONFIRMATION', "Are you sure you want to reset data? If you reset days, hours data from those days will be reset to.");
    
    // Add Calendar
    define('DOPBS_ADD_CALENDAR_NAME', "Booking Calendar");

    // Edit Calendar
    define('DOPBS_EDIT_CALENDAR_SUBMIT', "Edit Calendar");
    define('DOPBS_EDIT_CALENDAR_USERS_PERMISSIONS', "Users Permissions");
    define('DOPBS_EDIT_CALENDAR_SUCCESS', "You have succesfully edited the calendar.");
    
    // Reservations
    define('DOPBS_SHOW_RESERVATIONS', "Show Reservations");    
    define('DOPBS_NO_RESERVATIONS', "There are no reservations.");
    
    define('DOPBS_RESERVATIONS_ID', "Reservation ID");
    
    define('DOPBS_RESERVATIONS_CHECK_IN_LABEL', "Check In");
    define('DOPBS_RESERVATIONS_CHECK_OUT_LABEL', "Check Out");
    define('DOPBS_RESERVATIONS_START_HOURS_LABEL', "Start at"); 
    define('DOPBS_RESERVATIONS_END_HOURS_LABEL', "Finish at");
    
    define('DOPBS_RESERVATIONS_FIRST_NAME_LABEL', "First Name");
    define('DOPBS_RESERVATIONS_LAST_NAME_LABEL', "Last Name");
    define('DOPBS_RESERVATIONS_STATUS_LABEL', "Status");
    define('DOPBS_RESERVATIONS_STATUS_PENDING', "Pending");
    define('DOPBS_RESERVATIONS_STATUS_APPROVED', "Approved");        
    define('DOPBS_RESERVATIONS_DATE_CREATED_LABEL', "Date Created");    
    define('DOPBS_RESERVATIONS_PAYMENT_METHOD_LABEL', 'Payment Method');
    define('DOPBS_RESERVATIONS_PAYMENT_METHOD_ARRIVAL', 'On Arrival');
    define('DOPBS_RESERVATIONS_PAYMENT_METHOD_PAYPAL', 'PayPal');
    define('DOPBS_RESERVATIONS_PAYMENT_METHOD_PAYPAL_TRANSACTION_ID_LABEL', 'PayPal Transaction ID');   
    define('DOPBS_RESERVATIONS_TOTAL_PRICE_LABEL', "Total:"); 
    define('DOPBS_RESERVATIONS_NO_ITEMS_LABEL', "No Booked Items"); 
    define('DOPBS_RESERVATIONS_PRICE_LABEL', "Price"); 
    define('DOPBS_RESERVATIONS_DEPOSIT_PRICE_LABEL', "Deposit");
    define('DOPBS_RESERVATIONS_DEPOSIT_PRICE_LEFT_LABEL', " Left to Pay");
    define('DOPBS_RESERVATIONS_DISCOUNT_PRICE_LABEL', "Actual Price");
    define('DOPBS_RESERVATIONS_DISCOUNT_PRICE_TEXT', "discount");
    define('DOPBS_RESERVATIONS_EMAIL_LABEL', "Email"); 
    define('DOPBS_RESERVATIONS_PHONE_LABEL', "Phone"); 
    define('DOPBS_RESERVATIONS_NO_PEOPLE_LABEL', "No People"); 
    define('DOPBS_RESERVATIONS_NO_ADULTS_LABEL', "No Adults"); 
    define('DOPBS_RESERVATIONS_NO_CHILDREN_LABEL', "No Children"); 
    define('DOPBS_RESERVATIONS_MESSAGE_LABEL', "Message");
    
    define('DOPBS_RESERVATIONS_JUMP_TO_DAY_LABEL', 'Jump to day');
    define('DOPBS_RESERVATIONS_APPROVE_LABEL', 'Approve');
    define('DOPBS_RESERVATIONS_REJECT_LABEL', 'Reject');
    define('DOPBS_RESERVATIONS_CANCEL_LABEL', 'Cancel');
    
    define('DOPBS_RESERVATIONS_APPROVE_CONFIRMATION', 'Are you sure you want to approve this reservation?');
    define('DOPBS_RESERVATIONS_APPROVE_SUCCESS', 'The reservation has been approved.');
    define('DOPBS_RESERVATIONS_REJECT_CONFIRMATION', 'Are you sure you want to reject this reservation?');
    define('DOPBS_RESERVATIONS_REJECT_SUCCESS', 'The reservation has been rejected.');
    define('DOPBS_RESERVATIONS_CANCEL_CONFIRMATION', 'Are you sure you want to cancel this reservation?');
    define('DOPBS_RESERVATIONS_CANCEL_SUCCESS', 'The reservation has been canceled.');
    
    // TinyMCE
    define('DOPBS_TINYMCE_ADD', 'Add Calendar');
    
    // Settings
    define('DOPBS_GENERAL_STYLES_SETTINGS', "General Settings");
    define('DOPBS_CALENDAR_NAME', "Name");
    define('DOPBS_AVAILABLE_DAYS', "Available Days");
    define('DOPBS_FIRST_DAY', "First Day");
    define('DOPBS_CURRENCY', "Currency");
    define('DOPBS_DATE_TYPE', "Date Type");
    define('DOPBS_PREDEFINED', "Select Predifined Settings");
    define('DOPBS_TEMPLATE', "Style Template");
    define('DOPBS_MIN_STAY', "Minimum Stay");
    define('DOPBS_MAX_STAY', "Maximum Stay");
    define('DOPBS_NO_ITEMS_ENABLED', "Enable Number of Items Select");
    define('DOPBS_VIEW_ONLY', "View Only Info");
    define('DOPBS_PAGE_URL', "Page URL");
    
    define('DOPBS_NOTIFICATIONS_STYLES_SETTINGS', "Notifications Settings");
    define('DOPBS_NOTIFICATIONS_TEMPLATE', "Email Template");
    define('DOPBS_NOTIFICATIONS_EMAIL', "Notifications Email");
    define('DOPBS_NOTIFICATIONS_SMTP_ENABLED', "Enable SMTP");
    define('DOPBS_NOTIFICATIONS_SMTP_HOST_NAME', "SMTP Host Name");
    define('DOPBS_NOTIFICATIONS_SMTP_HOST_PORT', "SMTP Host Port");
    define('DOPBS_NOTIFICATIONS_SMTP_SSL', "SMTP SSL Conenction");
    define('DOPBS_NOTIFICATIONS_SMTP_USER', "SMTP Host User");
    define('DOPBS_NOTIFICATIONS_SMTP_PASSWORD', "SMTP Host Password");
                                              
    define('DOPBS_HOURS_STYLES_SETTINGS', "Days/Hours Settings");
    define('DOPBS_MULTIPLE_DAYS_SELECT', "Use Check In/Check Out");
    define('DOPBS_MORNING_CHECK_OUT', "Morning Check Out");
    define('DOPBS_HOURS_ENABLED', "Use Hours");
    define('DOPBS_HOURS_DEFINITIONS', "Define Hours");
    define('DOPBS_MULTIPLE_HOURS_SELECT', "Use Start/Finish Hours");
    define('DOPBS_HOURS_AMPM', "Enable AM/PM format");
    define('DOPBS_LAST_HOUR_TO_TOTAL_PRICE', "Add last selected hour price to total price");
    define('DOPBS_HOURS_INTERVAL_ENABLED', "Enable hours interval");
    
    define('DOPBS_DISCOUNTS_NO_DAYS_SETTINGS', "Discounts by Number of Days");
    define('DOPBS_DISCOUNTS_NO_DAYS', "Number of Days");
    define('DOPBS_DISCOUNTS_NO_DAYS_DAYS', "days booking");
    
    define('DOPBS_DEPOSIT_SETTINGS', "Deposit");
    define('DOPBS_DEPOSIT', "Deposit value");
    
    define('DOPBS_FORM_STYLES_SETTINGS', "Contact Form Settings");
    define('DOPBS_FORM', "Select Form");
    define('DOPBS_INSTANT_BOOKING_ENABLED', "Instant Booking");
    define('DOPBS_NO_PEOPLE_ENABLED', "Enable Number of People Allowed");
    define('DOPBS_MIN_NO_PEOPLE', "Minimum number of allowed people");
    define('DOPBS_MAX_NO_PEOPLE', "Maximum number of allowed people");
    define('DOPBS_NO_CHILDREN_ENABLED', "Enable Number of Children Allowed");
    define('DOPBS_MIN_NO_CHILDREN', "Minimum number of allowed children");
    define('DOPBS_MAX_NO_CHILDREN', "Maximum number of allowed children");
    define('DOPBS_PAYMENT_ARRIVAL_ENABLED', "Enable Payment on Arrival");
    
    define('DOPBS_PAYMENT_PAYPAL_STYLES_SETTINGS', "PayPal Settings");
    define('DOPBS_PAYMENT_PAYPAL_ENABLED', "Enable PayPal Payment");
    define('DOPBS_PAYMENT_PAYPAL_USERNAME', "PayPal API User Name");
    define('DOPBS_PAYMENT_PAYPAL_PASSWORD', "PayPal API Password");
    define('DOPBS_PAYMENT_PAYPAL_SIGNATURE', "PayPal API Signature");
    define('DOPBS_PAYMENT_PAYPAL_CREDIT_CARD', "Enable Credit Card Payment");
    define('DOPBS_PAYMENT_PAYPAL_SANDBOX_ENABLED', "Enable PayPal Sandbox");
    
    define('DOPBS_TERMS_AND_CONDITIONS_ENABLED', "Enable Terms & Conditions");
    define('DOPBS_TERMS_AND_CONDITIONS_LINK', "Terms & Conditions Link");
    
    define('DOPBS_GO_TOP', "go top");
    define('DOPBS_SHOW', "show");
    define('DOPBS_HIDE', "hide");
    
    // Settings Info
    define('DOPBS_CALENDAR_NAME_INFO', "Change calendar name.");
    define('DOPBS_AVAILABLE_DAYS_INFO', "Default value: all available. Select available days.");
    define('DOPBS_FIRST_DAY_INFO', "Default value: Monday. Select calendar first day.");
    define('DOPBS_CURRENCY_INFO', "Default value: USD. Select calendar currency.");
    define('DOPBS_DATE_TYPE_INFO', "Default value: American. Select date format: American (mm dd, yyyy) or European (dd mm yyyy)");
    define('DOPBS_PREDEFINED_INFO', "If selected on Submit the below settings will be changed.");
    define('DOPBS_TEMPLATE_INFO', "Default value: default. Select styles template.");
    define('DOPBS_MIN_STAY_INFO', "Default value: 1. Set minimum amount of days that can be selected.");
    define('DOPBS_MAX_STAY_INFO', "Default value: 0. Set maximum amount of days that can be selected. If you set 0 the number is unlimited.");
    define('DOPBS_NO_ITEMS_ENABLED_INFO', "Default value: Enabled. Set to display only booking information in Front End.");
    define('DOPBS_VIEW_ONLY_INFO', "Default value: Enabled. Set to display only booking information in Front End.");
    define('DOPBS_PAGE_URL_INFO', "Set page URL were the calendar will be added. It is mandatory if you create a searching system through some calendars.");
    
    define('DOPBS_NOTIFICATIONS_TEMPLATE_INFO', "Default value: default. Select email template.");
    define('DOPBS_NOTIFICATIONS_EMAIL_INFO', "Enter the email were you will notified about booking requests or you will use to notify users.");
    define('DOPBS_NOTIFICATIONS_SMTP_ENABLED_INFO', "Use SMTP to send emails.");
    define('DOPBS_NOTIFICATIONS_SMTP_HOST_NAME_INFO', "Enter SMTP host name");
    define('DOPBS_NOTIFICATIONS_SMTP_HOST_PORT_INFO', "Enter SMTP host port.");
    define('DOPBS_NOTIFICATIONS_SMTP_SSL_INFO', "Use a  SSL conenction.");
    define('DOPBS_NOTIFICATIONS_SMTP_USER_INFO', "Enter SMTP host username.");
    define('DOPBS_NOTIFICATIONS_SMTP_PASSWORD_INFO', "Enter SMTP host password.");
    
    define('DOPBS_MULTIPLE_DAYS_SELECT_INFO', "Default value: Enabled. Use Check In/Check Out or select only one day.");
    define('DOPBS_MORNING_CHECK_OUT_INFO', "Default value: Disabled. This option enables Check In in the afternoon of first day and Check Out in the morning of the day after last day.");
    define('DOPBS_HOURS_ENABLED_INFO', "Default value: Disabled. Enable hours for the calendar.");
    define('DOPBS_HOURS_DEFINITIONS_INFO', "Enter hh:mm ... add one per line. Changing the definitions will overwrite any previous hours data. Use only 24 hours format.");
    define('DOPBS_MULTIPLE_HOURS_SELECT_INFO', "Default value: Enabled. Use Start/Finish Hours or select only one hour.");
    define('DOPBS_HOURS_AMPM_INFO', "Default value: Disabled. Display hours in AM/PM format. NOTE: Hours definitions still need to be in 24 hours format.");
    define('DOPBS_LAST_HOUR_TO_TOTAL_PRICE_INFO', "Default value: Enabled. It calculates the total price before the last hours selected if Disabled. It calculates the total price including the last hour selected if Enabled.");
    define('DOPBS_HOURS_INTERVAL_ENABLED_INFO', "Default value: Disabled. Show hours interval from the current hour to the next one.");
    
    define('DOPBS_DISCOUNTS_NO_DAYS_INFO', "Select the number of days to which you want to add a discount (up to 31 days).");
    define('DOPBS_DISCOUNTS_NO_DAYS_DAYS_INFO', "Default value 0. Set the discount percent that a user will get when booking this number of days.");
    
    define('DOPBS_DEPOSIT_INFO', "Default value: 0. Set the percent value for the deposit. The Deposit is available only if you have a Payment Service activated.");
    
    define('DOPBS_FORM_INFO', "Select the form for Contact Form.");
    define('DOPBS_INSTANT_BOOKING_ENABLED_INFO', "Default value: Disabled. Instantly book the data in a calendar once the request has been submitted.");
    define('DOPBS_NO_PEOPLE_ENABLED_INFO', "Default value: Enabled. Request number of people that will use the booked item.");
    define('DOPBS_MIN_NO_PEOPLE_INFO', "Default value: 1. Set minimum number of allowed people per booked item.");
    define('DOPBS_MAX_NO_PEOPLE_INFO', "Default value: 4. Set maximum number of allowed people per booked item.");
    define('DOPBS_NO_CHILDREN_ENABLED_INFO', "Default value: Enabled. Request number of children that will use the booked item.");
    define('DOPBS_MIN_NO_CHILDREN_INFO', "Default value: 0. Set minimum number of allowed children per booked item.");
    define('DOPBS_MAX_NO_CHILDREN_INFO', "Default value: 2. Set maximum number of allowed children per booked item.");
    define('DOPBS_PAYMENT_ARRIVAL_ENABLED_INFO', "Default value: Enabled. Allow user to pay on arrival. Need approval.");
    
    define('DOPBS_PAYMENT_PAYPAL_ENABLED_INFO', "Default value: Disabled. Allow user to pay with PayPal. The period is instantly booked.");
    define('DOPBS_PAYMENT_PAYPAL_USERNAME_INFO', "Enter PayPal API Credentials User Name. View Help section to see from were you can get them.");
    define('DOPBS_PAYMENT_PAYPAL_PASSWORD_INFO', "Enter PayPal API Credentials Password. View Help section to see from were you can get them.");
    define('DOPBS_PAYMENT_PAYPAL_SIGNATURE_INFO', "Enter PayPal API Credentials Signature. View Help section to see from were you can get them.");
    define('DOPBS_PAYMENT_PAYPAL_CREDIT_CARD_INFO', "Enable so that users can pay directly with their Credit Card.");
    define('DOPBS_PAYMENT_PAYPAL_SANDBOX_ENABLED_INFO', "Enable to use PayPal Sandbox features.");
    
    define('DOPBS_TERMS_AND_CONDITIONS_ENABLED_INFO', "Default value: Disabled. Enable Terms & Conditions check box.");
    define('DOPBS_TERMS_AND_CONDITIONS_LINK_INFO', "Enter the link to Terms & Conditions page.");
    
    // Booking Forms
    define('DOPBS_TITLE_BOOKING_FORMS', "Booking Forms");
    define('DOPBS_BOOKING_FORMS_HELP', "Click on the 'plus' icon to add a booking form. Click on a booking form item to open the editing area.");
    define('DOPBS_BOOKING_FORMS_LOADED', "Booking forms list loaded.");
    define('DOPBS_BOOKING_FORM_SETTINGS_HELP', "Click 'Submit Button' to save changes. Click 'Delete Button' to delete the form.");
    define('DOPBS_BOOKING_FORM_LOADED', "Booking form loaded.");
    define('DOPBS_NO_BOOKING_FORMS', "No booking forms.");
    
    // Add Booking Form
    define('DOPBS_ADD_BOOKING_FORM_NAME', "Booking Form");
    
    // Edit Booking Form
    define('DOPBS_EDIT_BOOKING_FORM_SUBMIT', "Submit");
    define('DOPBS_EDIT_BOOKING_FORM_SUCCESS', "You have succesfully edited the form.");
    
    // Booking Form Fields
    define('DOPBS_BOOKING_FORM_NAME', "Form Name");
    define('DOPBS_BOOKING_FORM_NAME_DEFAULT', "Default Form");
    define('DOPBS_BOOKING_FORM_FIELDS_TITLE', "Form Fields");
    define('DOPBS_BOOKING_FORM_FIELDS_SHOW_SETTINGS', "Show Settings");
    define('DOPBS_BOOKING_FORM_FIELDS_HIDE_SETTINGS', "Hide Settings");
    define('DOPBS_BOOKING_FORM_FIELDS_TYPE_TEXT_LABEL', "Text");
    define('DOPBS_BOOKING_FORM_FIELDS_TYPE_TEXTAREA_LABEL', "Textarea");
    define('DOPBS_BOOKING_FORM_FIELDS_TYPE_CHECKBOX_LABEL', "Checkbox");
    define('DOPBS_BOOKING_FORM_FIELDS_TYPE_SELECT_LABEL', "Drop Down");
    define('DOPBS_BOOKING_FORM_FIELDS_LANGUAGE_LABEL', "Language");
    define('DOPBS_BOOKING_FORM_FIELDS_NAME_LABEL', "Label");
    define('DOPBS_BOOKING_FORM_FIELDS_NEW_FIELD_TEXT_LABEL', "New Text Field");
    define('DOPBS_BOOKING_FORM_FIELDS_NEW_FIELD_TEXTAREA_LABEL', "New Textarea Field");
    define('DOPBS_BOOKING_FORM_FIELDS_NEW_FIELD_CHECKBOX_LABEL', "New Checkbox Field");
    define('DOPBS_BOOKING_FORM_FIELDS_NEW_FIELD_SELECT_LABEL', "New Drop Down Field");
    define('DOPBS_BOOKING_FORM_FIELDS_ALLOWED_CHARACTERS_LABEL', "Allowed Characters");
    define('DOPBS_BOOKING_FORM_FIELDS_SIZE_LABEL', "Size");
    define('DOPBS_BOOKING_FORM_FIELDS_EMAIL_LABEL', "Is Email");
    define('DOPBS_BOOKING_FORM_FIELDS_REQUIRED_LABEL', "Required");
    define('DOPBS_BOOKING_FORM_FIELDS_SELECT_OPTIONS_LABEL', "Options");
    define('DOPBS_BOOKING_FORM_FIELDS_SELECT_ADD_OPTION', "Add Option");
    define('DOPBS_BOOKING_FORM_FIELDS_SELECT_NEW_OPTION_LABEL', "New Option");
    define('DOPBS_BOOKING_FORM_FIELDS_SELECT_DELETE_OPTION', "Delete Option");
    define('DOPBS_BOOKING_FORM_FIELDS_SELECT_MULTIPLE_SELECT_LABEL', "Multiple Select");
    define('DOPBS_BOOKING_FORM_CHECKED', "Checked");
    define('DOPBS_BOOKING_FORM_UNCHECKED', "Unchecked");
    
    // Booking Form Fields Info
    define('DOPBS_BOOKING_FORM_NAME_INFO', "Change form name and click Submit.");
    define('DOPBS_BOOKING_FORM_FIELDS_INFO', "Drag the Field Type from right to left to create a new Field. Drag a created Field to trash to delete. Click Show Settings to edit a created Field.");
    define('DOPBS_BOOKING_FORM_FIELDS_LANGUAGE_INFO', "Select the language for which you want to change the names (labels).");
    define('DOPBS_BOOKING_FORM_FIELDS_NAME_INFO', "Enter field name (label).");
    define('DOPBS_BOOKING_FORM_FIELDS_ALLOWED_CHARACTERS_INFO', "Enter the caracters allowed in this field. Leave it blank if all characters are allowed.");
    define('DOPBS_BOOKING_FORM_FIELDS_SIZE_INFO', "Enter the maximum number of characters allowed. Leave it blank for unlimited.");
    define('DOPBS_BOOKING_FORM_FIELDS_EMAIL_INFO', "Check it if you want this field to be verified if an email has been added or not.");
    define('DOPBS_BOOKING_FORM_FIELDS_REQUIRED_INFO', "Check it if you want the field to be mandatory.");
    define('DOPBS_BOOKING_FORM_FIELDS_SELECT_OPTIONS_INFO', "Add the Plus Icon to add another option and enter the name. Click on the Delete Icon to remove the option.");
    define('DOPBS_BOOKING_FORM_FIELDS_SELECT_MULTIPLE_SELECT_INFO', "Check it if you want a multiple select Drop Down.");
    
    // Help
    define('DOPBS_HELP_DOCUMENTATION', "Documentation");
    define('DOPBS_HELP_FAQ', "FAQ");

?>