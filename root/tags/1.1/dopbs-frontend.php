<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 1.1
* File                    : dopbs-frontend.php
* File Version            : 1.0
* Created / Last Modified : 29 July 2013
* Author                  : Dot on Paper
* Copyright               : © 2013 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System Front End Class.
*/

    if (session_id() == ""){
        session_start();
    }

    if (!class_exists("DOPBookingSystemFrontEnd")){
        class DOPBookingSystemFrontEnd{
            function DOPBookingSystemFrontEnd(){// Constructor.
                add_action('wp_enqueue_scripts', array(&$this, 'addScripts'));
                $this->init();
            }
            
            function addScripts(){
                wp_register_script('DOPBS_DOPBookingSystemJS', plugins_url('assets/js/jquery.dop.FrontendBookingSystem.js', __FILE__), array('jquery'), false, true);

                // Enqueue JavaScript.
                
                if (!wp_script_is('jquery-ui-datepicker', 'queue')){
                    wp_enqueue_script('jquery-ui-datepicker');
                }
                if (!wp_script_is('jquery', 'queue')){
                    wp_enqueue_script('jquery');
                }
                wp_enqueue_script('DOPBS_DOPBookingSystemJS');
            }

            function init(){// Init Gallery.
                $this->initConstants();
                add_shortcode('dopbs', array(&$this, 'captionShortcode'));
            }

            function initConstants(){// Constants init.
                global $wpdb;

                // Paths
                define('DOPBS_Plugin_AbsPath', ABSPATH.'wp-content/plugins/booking-system/');
                define('DOPBS_Plugin_URL', WP_PLUGIN_URL.'/booking-system/');
                
                // Tables
                define('DOPBS_Settings_table', $wpdb->prefix.'dopbs_settings');
                define('DOPBS_Calendars_table', $wpdb->prefix.'dopbs_calendars');
                define('DOPBS_Days_table', $wpdb->prefix.'dopbs_days');
                define('DOPBS_Reservations_table', $wpdb->prefix.'dopbs_reservations');
                define('DOPBS_Forms_table', $wpdb->prefix.'dopbs_forms');
                define('DOPBS_Forms_Fields_table', $wpdb->prefix.'dopbs_forms_fields');
                define('DOPBS_Forms_Select_Options_table', $wpdb->prefix.'dopbs_forms_select_options');
            }

            function captionShortcode($atts){// Read Shortcodes.
                extract(shortcode_atts(array('id' => '1',
                                             'lang' => 'en'), $atts));
                if (is_array($atts)){
                    $id = array_key_exists('id', $atts) ? $atts['id']:'1';
                    $lang = array_key_exists('lang', $atts) ? $atts['lang']:'en';
                }
                else{
                    $id = '1';
                    $lang = 'en';
                }
                
                $_SESSION['DOPBookingSystemFrontEndLanguage'.$id] = $lang;
                $data = array();
                                
                array_push($data, '<link rel="stylesheet" type="text/css" href="'.plugins_url('templates/'.$this->getCalendarTemplate($id).'/css/jquery-ui-1.8.21.customDatepicker.css', __FILE__).'" />');
                array_push($data, '<link rel="stylesheet" type="text/css" href="'.plugins_url('templates/'.$this->getCalendarTemplate($id).'/css/jquery.dop.FrontendBookingSystem.css', __FILE__).'" />');
                
                array_push($data, '<script type="text/JavaScript">');
                array_push($data, '    jQuery(document).ready(function(){');
                array_push($data, '        jQuery("#DOPBookingSystem'.$id.'").DOPBookingSystem('.$this->getCalendarSettings($id, $lang).');');
                array_push($data, '    });');
                array_push($data, '</script>');
                
                array_push($data, '<div class="DOPBookingSystemContainer" id="DOPBookingSystem'.$id.'"><a href="'.DOPBS_Plugin_URL.'frontend-ajax.php"></a></div>');
                
                return implode("\n", $data);
            }
 
            function getCalendarTemplate($id){// Get Gallery Info.
                global $wpdb;                
                $settings = $wpdb->get_row('SELECT template FROM '.DOPBS_Settings_table.' WHERE calendar_id="'.$id.'"');
                
                return $settings->template;
            }

            function getCalendarSettings($id, $language='en'){// Get Gallery Info.
                include_once 'translation/frontend/'.$language.'.php';
                global $wpdb;
                global $DOPBS_currencies;
                global $DOPBS_month_names;
                global $DOPBS_month_short_names;
                global $DOPBS_day_names;
                global $DOPBS_day_short_names;
                $data = array();
                                
                $settings = $wpdb->get_row('SELECT * FROM '.DOPBS_Settings_table.' WHERE calendar_id="'.$id.'"');
                $form = $wpdb->get_results('SELECT * FROM '.DOPBS_Forms_Fields_table.' WHERE form_id="'.$settings->form.'" ORDER BY position');
                
                foreach ($form as $field){
                    $translation = json_decode(stripslashes($field->translation));
                    $field->translation = $translation->$language;
                    
                    if ($field->type == 'select'){
                        $options = $wpdb->get_results('SELECT * FROM '.DOPBS_Forms_Select_Options_table.' WHERE field_id='.$field->id.' ORDER BY field_id ASC');
                        
                        foreach ($options as $option){
                            $option_translation = json_decode(stripslashes($option->translation));
                            $option->translation = $option_translation->$language;
                        }
                        $field->options = $options;
                    }
                }
                
                $discountsNoDays = explode(',', $settings->discounts_no_days);
                
                for ($i=0; $i<count($discountsNoDays); $i++){
                    $discountsNoDays[$i] = (float)$discountsNoDays[$i];
                }
                
                $data = array('AddLastHourToTotalPrice' => $settings->last_hour_to_total_price,
                              'AddtMonthViewText' => DOPBS_ADD_MONTH_VIEW,
                              'AvailableDays' => explode(',', $settings->available_days),
                              'AvailableOneText' => DOPBS_AVAILABLE_ONE_TEXT,
                              'AvailableText' => DOPBS_AVAILABLE_TEXT,
                              'BookedText' => DOPBS_BOOKED_TEXT,
                              'BookNowLabel' => DOPBS_BOOK_NOW_LABEL,
                              'CheckInLabel' => DOPBS_CHECK_IN_LABEL,
                              'CheckOutLabel' => DOPBS_CHECK_OUT_LABEL,
                              'Currency' => $DOPBS_currencies[(int)$settings->currency-1]['sign'],
                              'CurrencyCode' => $DOPBS_currencies[(int)$settings->currency-1]['code'],
                              'DayNames' => $DOPBS_day_names,
                              'DayShortNames' => $DOPBS_day_short_names,
                              'DateType' => $settings->date_type,
                              'Deposit' => $settings->deposit,
                              'DepositText' => DOPBS_DEPOSIT_TEXT,
                              'DiscountsNoDays' => $discountsNoDays,
                              'DiscountText' => DOPBS_DISCOUNT_TEXT,
                              'EndHourLabel' => DOPBS_END_HOURS_LABEL,
                              'FirstDay' => $settings->first_day,
                              'Form' => $form,
                              'FormID' => $settings->form,
                              'FormEmailInvalid' => DOPBS_FORM_EMAIL_INVALID,
                              'FormRequired' => DOPBS_FORM_REQUIRED,
                              'FormTitle' => DOPBS_FORM_TITLE,
                              'HoursAMPM' => $settings->hours_ampm,
                              'HoursEnabled' => $settings->hours_enabled,
                              'HoursDefinitions' => json_decode($settings->hours_definitions),
                              'HoursIntervalEnabled' => $settings->hours_interval_enabled,
                              'ID' => $id,
                              'Language' => $language,
                              'MaxNoChildren' => $settings->max_no_children,
                              'MaxNoPeople' => $settings->max_no_people,
                              'MaxYear' => $settings->max_year,
                              'MaxStay' => $settings->max_stay,
                              'MaxStayWarning' => DOPBS_MAX_STAY_WARNING,
                              'MinNoChildren' => $settings->min_no_children,
                              'MinNoPeople' => $settings->min_no_people,
                              'MinStay' => $settings->min_stay,
                              'MinStayWarning' => DOPBS_MIN_STAY_WARNING,
                              'MonthNames' => $DOPBS_month_names,
                              'MonthShortNames' => $DOPBS_month_short_names,
                              'MorningCheckOut' => $settings->morning_check_out,
                              'MultipleDaysSelect' => $settings->multiple_days_select,
                              'MultipleHoursSelect' => $settings->multiple_hours_select,
                              'NextMonthText' => DOPBS_NEXT_MONTH,
                              'NoAdultsLabel' => DOPBS_NO_ADULTS_LABEL,
                              'NoChildrenEnabled' => $settings->no_children_enabled,
                              'NoChildrenLabel' => DOPBS_NO_CHILDREN_LABEL,
                              'NoItemsLabel' => DOPBS_NO_ITEMS_LABEL,
                              'NoItemsEnabled' => $settings->no_items_enabled,
                              'NoPeopleLabel' => DOPBS_NO_PEOPLE_LABEL,
                              'NoPeopleEnabled' => $settings->no_people_enabled,
                              'NoServicesAvailableText' => DOPBS_NO_SERVICES_AVAILABLE,
                              'PaymentArrivalEnabled' => $settings->payment_arrival_enabled,
                              'PaymentArrivalLabel' => DOPBS_PAYMENT_ARRIVAL_LABEL,
                              'PaymentArrivalSuccess' => DOPBS_PAYMENT_ARRIVAL_SUCCESS,
                              'PaymentArrivalSuccessInstantBooking' => DOPBS_PAYMENT_ARRIVAL_SUCCESS_INSTANT_BOOKING,
                              'PaymentPayPalEnabled' => $settings->payment_paypal_enabled,
                              'PaymentPayPalLabel' => DOPBS_PAYMENT_PAYPAL_LABEL,
                              'PaymentPayPalSuccess' => DOPBS_PAYMENT_PAYPAL_SUCCESS,
                              'PaymentPayPalError' => DOPBS_PAYMENT_PAYPAL_ERROR,
                              'PluginURL' => DOPBS_Plugin_URL,
                              'PreviousMonthText' => DOPBS_PREVIOUS_MONTH,
                              'RemoveMonthViewText' => DOPBS_REMOVE_MONTH_VIEW,
                              'ServicesLabel' => DOPBS_SERVICES_LABEL,
                              'StartHourLabel' => DOPBS_START_HOURS_LABEL,
                              'TotalPriceLabel' => DOPBS_TOTAL_PRICE_LABEL,
                              'TermsAndConditionsEnabled' => $settings->terms_and_conditions_enabled,
                              'TermsAndConditionsInvalid' => DOPBS_TERMS_AND_CONDITIONS_INVALID,
                              'TermsAndConditionsLabel' => DOPBS_TERMS_AND_CONDITIONS_LABEL,
                              'TermsAndConditionsLink' => $settings->terms_and_conditions_link,
                              'UnavailableText' => DOPBS_UNAVAILABLE_TEXT,
                              'ViewOnly' => $settings->view_only);
                
                return json_encode($data);
            }
            
            function loadSchedule(){// Load Calendar Data.
                if (isset($_POST['calendar_id'])){
                    global $wpdb;
                    $schedule = array();
                    
                    $days = $wpdb->get_results('SELECT * FROM '.DOPBS_Days_table.' WHERE calendar_id="'.$_POST['calendar_id'].'"');
                    
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
            
            function bookRequest(){
                if (session_id() == ""){
                    session_start();
                }
                
                if (isset($_POST['calendar_id'])){
                    global $wpdb;
                    
                    $language = isset($_SESSION['DOPBookingSystemFrontEndLanguage'.$_POST['calendar_id']]) ? $_SESSION['DOPBookingSystemFrontEndLanguage'.$_POST['calendar_id']]:'en';
                    $form = $_POST['form'];
                    
                    $settings = $wpdb->get_row('SELECT * FROM '.DOPBS_Settings_table.' WHERE calendar_id="'.$_POST['calendar_id'].'"');
                    
                    $wpdb->insert(DOPBS_Reservations_table, array('calendar_id' => $_POST['calendar_id'],
                                                                   'check_in' => $_POST['check_in'],
                                                                   'check_out' => $_POST['check_out'],
                                                                   'start_hour' => $_POST['start_hour'],
                                                                   'end_hour' => $_POST['end_hour'],
                                                                   'no_items' => $_POST['no_items'],
                                                                   'currency' => $_POST['currency'],
                                                                   'currency_code' => $_POST['currency_code'],
                                                                   'total_price' => $_POST['total_price'],
                                                                   'discount' => $_POST['discount'],
                                                                   'price' => $_POST['price'],
                                                                   'deposit' => $_POST['deposit'],
                                                                   'language' => $language,
                                                                   'email' => $_POST['email'],
                                                                   'no_people' => $_POST['no_people'],
                                                                   'no_children' => $_POST['no_children'],
                                                                   'status' => $settings->instant_booking == 'false' ? 'pending':'approved',
                                                                   'info' => json_encode($form),
                                                                   'payment_method' => $_POST['payment_method']));
                    $reservationId = $wpdb->insert_id;
                    
                    $DOPemail = new DOPBookingSystemEmail();
                    
                    if ($settings->instant_booking == 'false'){
                        $DOPemail->sendMessage('booking_without_approval',
                                               $language,
                                               $_POST['calendar_id'], 
                                               $reservationId,
                                               $_POST['check_in'],
                                               $_POST['check_out'],
                                               $_POST['start_hour'],
                                               $_POST['end_hour'],
                                               $_POST['no_items'],
                                               $_POST['currency'],
                                               $_POST['price'],
                                               $_POST['deposit'],
                                               $_POST['total_price'],
                                               $_POST['discount'],
                                               $form,
                                               $_POST['no_people'],
                                               $_POST['no_children'],
                                               $_POST['email'],
                                               true,
                                               true);
                    }
                    else{
                        $DOPemail->sendMessage('booking_with_approval',
                                               $language,
                                               $_POST['calendar_id'], 
                                               $reservationId,
                                               $_POST['check_in'],
                                               $_POST['check_out'],
                                               $_POST['start_hour'],
                                               $_POST['end_hour'],
                                               $_POST['no_items'],
                                               $_POST['currency'],
                                               $_POST['price'],
                                               $_POST['deposit'],
                                               $_POST['total_price'],
                                               $_POST['discount'],
                                               $form,
                                               $_POST['no_people'],
                                               $_POST['no_children'],
                                               $_POST['email'],
                                               true,
                                               true);
                        
                        $DOPreservations = new DOPBookingSystemBackEndReservations();
                        $DOPreservations->approveReservationCalendarChange($reservationId, $settings);
                        
                        $ci = explode('-', $_POST['check_in']);
                        echo $ci[0].'-'.(int)$ci[1];
                    }
                }
                
                echo '';                
                die();
            }
            
            function paypalCheck(){
                if (session_id() == ""){
                    session_start();
                }
                
                if (isset($_POST['calendar_id']) && isset($_SESSION['DOPBS_PayPal'.$_POST['calendar_id']])){
                    $status = $_SESSION['DOPBS_PayPal'.$_POST['calendar_id']];
                    $_SESSION['DOPBS_PayPal'.$_POST['calendar_id']] = '';
                    
                    echo $status;                    
                }
                else{
                    echo 'no';
                }               
            }
        }
    }
?>