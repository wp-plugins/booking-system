<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/calendars/class-frontend-calendar.php
* File Version            : 1.1
* Created / Last Modified : 25 January 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System front end calendar PHP class.
*/

    if (!class_exists('DOPBSPFrontEndCalendar')){
        class DOPBSPFrontEndCalendar extends DOPBSPFrontEnd{
            /*
             * Constructor.
             */
            function DOPBSPFrontEndCalendar(){
            }

            /*
             * Display front end calendar.
             * 
             * @param atts (array): shortcode attributes
             */
            function display($atts){
                global $wpdb;
                global $DOPBSP;
                
                $html = array();
                
                /*
                 * Do not display anything if the shortcode is invalid.
                 */
                $calendar = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->calendars.' WHERE id=%d',
                                                          1));
                
                if ($wpdb->num_rows == 0){
                    return false;
                }
                
// HOOK (dopbsp_action_calendar_init_before) ********************************* Add action before calendar init.
                do_action('dopbsp_action_calendar_init_before');
                
// HOOK (dopbsp_frontend_content_before_calendar) ****************************** Add content before calendar.
                ob_start();
                    do_action('dopbsp_frontend_content_before_calendar');
                    $dopbsp_frontend_before_calendar = ob_get_contents();
                ob_end_clean();
                array_push($html, $dopbsp_frontend_before_calendar);
                
                /*
                 * Calendar HTML.
                 */
                array_push($html, '<link rel="stylesheet" type="text/css" href="'.$DOPBSP->paths->url.'templates/'.$this->getTemplate().'/css/jquery.dop.frontend.BSPCalendar.css" />');
                
                array_push($html, '<script type="text/JavaScript">');
                array_push($html, '    jQuery(document).ready(function(){');
                array_push($html, '        jQuery("#DOPBSPCalendar1").DOPBSPCalendar('.$this->getJSON($atts).');');
                array_push($html, '    });');
                array_push($html, '</script>');
                
                array_push($html, '<div class="DOPBSPCalendar-info-message" id="DOPBSPCalendar-info-message1">');
                array_push($html, ' <div class="dopbsp-icon"></div>');
                array_push($html, ' <div class="dopbsp-text"></div>');
                array_push($html, ' <div class="dopbsp-timer"></div>');
                array_push($html, ' <a href="javascript:void(0)" onclick="jQuery(\'#DOPBSPCalendar-info-message1\').stop(true, true).fadeOut(300)" class="dopbsp-close"></a>');
                array_push($html, '</div>');
                array_push($html, '<div class="DOPBSPCalendar-wrapper notranslate" id="DOPBSPCalendar1"><a href="'.admin_url('admin-ajax.php').'"></a></div>');
                
// HOOK (dopbsp_frontend_content_after_calendar) ******************************* Add content after calendar.
                ob_start();
                    do_action('dopbsp_frontend_content_after_calendar');
                    $dopbsp_frontend_after_calendar = ob_get_contents();
                ob_end_clean();
                array_push($html, $dopbsp_frontend_after_calendar);
                
                return implode("\n", $html);
            }
            
            /*
             * Get calendar options in JSON format.
             * 
             * @param atts (array): shortcode attributes
             * 
             * @return options JSON
             */
            function getJSON($atts){
                global $DOPBSP;
                
                $data = array();
                
                $language = $atts['lang'];
                $woocommerce = isset($atts['woocommerce']) ? $atts['woocommerce']:'';
                $woocommerce_add_to_cart = isset($atts['woocommerce_add_to_cart']) ? $atts['woocommerce_add_to_cart']:'';
                $woocommerce_position = isset($atts['woocommerce_position']) ? $atts['woocommerce_position']:'';
                $woocommerce_product_id = isset($atts['woocommerce_product_id']) ? $atts['woocommerce_product_id']:'';
                
                $DOPBSP->classes->translation->set($language,
                                                   false);
                
                $settings_calendar = $DOPBSP->classes->backend_settings->values(1,'calendar');
                $settings_payment = $DOPBSP->classes->backend_settings->values(1,'payment');
                /*
                 * JSON
                 */
                $data = array('calendar' => array('data' => array('bookingStop' => (int)$settings_calendar->booking_stop,
                                                                  'dateType' => (int)$settings_calendar->date_type,
                                                                  'language' => $language,
                                                                  'languages' => $DOPBSP->classes->languages->languages,
                                                                  'pluginURL' => $DOPBSP->paths->url,
                                                                  'maxYear' => $DOPBSP->classes->backend_calendar->getMaxYear(),
                                                                  'reinitialize' => false,
                                                                  'view' => $settings_calendar->view_only == 'true' ? true:false),
                                                  'text' => array('addMonth' => $DOPBSP->text('CALENDARS_CALENDAR_ADD_MONTH_VIEW'),
                                                                  'available' => $DOPBSP->text('CALENDARS_CALENDAR_AVAILABLE_ONE_TEXT'),
                                                                  'availableMultiple' => $DOPBSP->text('CALENDARS_CALENDAR_AVAILABLE_TEXT'),
                                                                  'booked' => $DOPBSP->text('CALENDARS_CALENDAR_BOOKED_TEXT'),
                                                                  'nextMonth' => $DOPBSP->text('CALENDARS_CALENDAR_NEXT_MONTH'),
                                                                  'previousMonth' => $DOPBSP->text('CALENDARS_CALENDAR_PREVIOUS_MONTH'),
                                                                  'removeMonth' => $DOPBSP->text('CALENDARS_CALENDAR_REMOVE_MONTH_VIEW'),
                                                                  'unavailable' => $DOPBSP->text('CALENDARS_CALENDAR_UNAVAILABLE_TEXT'))), 
                              'cart' => array('data' => array('enabled' => $settings_calendar->cart_enabled == 'true' ? true:false),
                                              'text' => array('isEmpty' => $DOPBSP->text('CART_IS_EMPTY'),
                                                              'title' => $DOPBSP->text('CART_TITLE'))),
                              'coupons' => $DOPBSP->classes->frontend_coupons->get($settings_calendar->coupon,
                                                                                   $language),
                              'currency' => array('data' => array('code' => $settings_calendar->currency,
                                                                  'position' => $settings_calendar->currency_position,
                                                                  'sign' => $DOPBSP->classes->currencies->get($settings_calendar->currency),
                                                  'text' => array())),
                              'days' => array('data' => array('available' => $this->getAvailableDays($settings_calendar->days_available),
                                                              'first' => (int)$settings_calendar->days_first,
                                                              'firstDisplayed' => $settings_calendar->days_first_displayed,
                                                              'morningCheckOut' => $settings_calendar->days_multiple_select == 'false' || $settings_calendar->hours_enabled == 'true' ? false:($settings_calendar->days_morning_check_out == 'true' ? true:false),
                                                              'multipleSelect' => $settings_calendar->hours_enabled == 'true' ? false:($settings_calendar->days_multiple_select == 'true' ? true:false)),
                                              'text' => array('names' => array($DOPBSP->text('DAY_SUNDAY'), 
                                                                               $DOPBSP->text('DAY_MONDAY'), 
                                                                               $DOPBSP->text('DAY_TUESDAY'), 
                                                                               $DOPBSP->text('DAY_WEDNESDAY'), 
                                                                               $DOPBSP->text('DAY_THURSDAY'), 
                                                                               $DOPBSP->text('DAY_FRIDAY'), 
                                                                               $DOPBSP->text('DAY_SATURDAY')),
                                                              'shortNames' => array($DOPBSP->text('SHORT_DAY_SUNDAY'), 
                                                                                    $DOPBSP->text('SHORT_DAY_MONDAY'), 
                                                                                    $DOPBSP->text('SHORT_DAY_TUESDAY'), 
                                                                                    $DOPBSP->text('SHORT_DAY_WEDNESDAY'), 
                                                                                    $DOPBSP->text('SHORT_DAY_THURSDAY'), 
                                                                                    $DOPBSP->text('SHORT_DAY_FRIDAY'), 
                                                                                    $DOPBSP->text('SHORT_DAY_SATURDAY')))),
                              'deposit' => array('data' => array('deposit' => (int)$settings_calendar->deposit,
                                                                 'type' => $settings_calendar->deposit_type),
                                                 'text' => array('left' => $DOPBSP->text('RESERVATIONS_RESERVATION_FRONT_END_DEPOSIT_LEFT'),
                                                                 'title' => $DOPBSP->text('RESERVATIONS_RESERVATION_FRONT_END_DEPOSIT'))), 
                              'discounts' => $DOPBSP->classes->frontend_discounts->get($settings_calendar->discount,
                                                                                       $language),
                              'extras' => $DOPBSP->classes->frontend_extras->get($settings_calendar->extra,
                                                                                 $language),
                              'fees' => $DOPBSP->classes->frontend_fees->get($settings_calendar->fees,
                                                                             $language),
                              'form' => $DOPBSP->classes->frontend_forms->get($settings_calendar->form,
                                                                              $language),
                              'hours' => array('data' => array('addLastHourToTotalPrice' => $settings_calendar->hours_multiple_select == 'false' ? true:($settings_calendar->hours_add_last_hour_to_total_price == 'true' && $settings_calendar->hours_interval_enabled == 'false' ? true:false),
                                                               'ampm' => $settings_calendar->hours_ampm == 'true' ? true:false,
                                                               'definitions' => json_decode($settings_calendar->hours_definitions),
                                                               'enabled' => $settings_calendar->hours_enabled == 'true' ? true:false,
                                                               'info' => $settings_calendar->hours_info_enabled == 'true' ? true:false,
                                                               'interval' => $settings_calendar->hours_multiple_select == 'false' ? false:($settings_calendar->hours_interval_enabled == 'true' ? true:false),
                                                               'multipleSelect' => $settings_calendar->hours_multiple_select == 'true' ? true:false),
                                               'text' => array()),
                              'ID' => 1,
                              'months' => array('data' => array('no' => $settings_calendar->months_no == 0 || is_nan($settings_calendar->months_no) ? 1:($settings_calendar->months_no > 6 ? 6:$settings_calendar->months_no)),
                                                'text' => array('names' => array($DOPBSP->text('MONTH_JANUARY'), 
                                                                                 $DOPBSP->text('MONTH_FEBRUARY'),  
                                                                                 $DOPBSP->text('MONTH_MARCH'),
                                                                                 $DOPBSP->text('MONTH_APRIL'),  
                                                                                 $DOPBSP->text('MONTH_MAY'),  
                                                                                 $DOPBSP->text('MONTH_JUNE'),  
                                                                                 $DOPBSP->text('MONTH_JULY'),  
                                                                                 $DOPBSP->text('MONTH_AUGUST'),  
                                                                                 $DOPBSP->text('MONTH_SEPTEMBER'),  
                                                                                 $DOPBSP->text('MONTH_OCTOBER'),  
                                                                                 $DOPBSP->text('MONTH_NOVEMBER'),  
                                                                                 $DOPBSP->text('MONTH_DECEMBER')),
                                                                'shortNames' => array($DOPBSP->text('SHORT_MONTH_JANUARY'),  
                                                                                      $DOPBSP->text('SHORT_MONTH_FEBRUARY'), 
                                                                                      $DOPBSP->text('SHORT_MONTH_MARCH'),
                                                                                      $DOPBSP->text('SHORT_MONTH_APRIL'),
                                                                                      $DOPBSP->text('SHORT_MONTH_MAY'),
                                                                                      $DOPBSP->text('SHORT_MONTH_JUNE'), 
                                                                                      $DOPBSP->text('SHORT_MONTH_JULY'), 
                                                                                      $DOPBSP->text('SHORT_MONTH_AUGUST'), 
                                                                                      $DOPBSP->text('SHORT_MONTH_SEPTEMBER'), 
                                                                                      $DOPBSP->text('SHORT_MONTH_OCTOBER'), 
                                                                                      $DOPBSP->text('SHORT_MONTH_NOVEMBER'), 
                                                                                      $DOPBSP->text('SHORT_MONTH_DECEMBER')))),
                              'order' => $DOPBSP->classes->frontend_order->get($settings_calendar,
                                                                               $settings_payment),
                              'reservation' => $DOPBSP->classes->frontend_reservations->get(),
                              'rules' => $DOPBSP->classes->frontend_rules->get($settings_calendar->rule,
                                                                               $language),
                              'sidebar' => $DOPBSP->classes->frontend_calendar_sidebar->get($settings_calendar,
                                                                                            $woocommerce,
                                                                                            $woocommerce_position),
                              'woocommerce' => array('data' => array('add_to_cart' => $woocommerce_add_to_cart == 'true' ? true:false,
                                                                     'enabled' => $woocommerce == 'true' ? true:false,
                                                                     'product_id' => $woocommerce_product_id),
                                                     'text' => array('none' => $DOPBSP->text('WOOCOMMERCE_PRODUCT_NONE'),
                                                                     'reservation' => $DOPBSP->text('WOOCOMMERCE_PRODUCT_RESERVATION'),
                                                                     'addToCart' => $DOPBSP->text('WOOCOMMERCE_ADD_TO_CART'))));
                
                return json_encode($data);
            }
 
            /*
             * Get available days.
             * 
             * @param available_days (string): available days data
             * 
             * @return available days array
             */
            function getAvailableDays($available_days){
                $days = explode(',', $available_days);
                
                for ($i=0; $i<count($days); $i++){
                    $days[$i] = $days[$i] == 'true' ? true:false;
                }
                
                return $days;
            }
 
            /*
             * Get calendar template.
             * 
             * @param id (integer): calendar ID
             * 
             * @return template name
             */
            function getTemplate(){
                global $DOPBSP;
                
                $settings_calendar = $DOPBSP->classes->backend_settings->values(1,'calendar');
                
                return $settings_calendar->template;
            }
        }
    }