<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/woocommerce/class-woocommerce.php
* File Version            : 1.1.
* Created / Last Modified : 06 February 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System WooCommerce PHP class.
*/

    if (!class_exists('DOPBSPWooCommerce')){
        class DOPBSPWooCommerce{
            /*
             * Public variable.
             */
            public $wc_delimiter = '|';
            
            /*
             * Constructor
             */
            function DOPBSPWooCommerce(){
                /*
                 * Add reservetions to booking system after payment has been completed.
                 */
                add_action('woocommerce_payment_complete', array(&$this, 'book'));
                
                /*
                 * Add reservetions to booking system after some payments have been completed.
                 */
                add_action('woocommerce_thankyou', array(&$this, 'book'));
            }

            /*
             * Add reservetions to booking system.
             * 
             * @param order_id (integer): order ID
             */
            function book($order_id){
                global $wpdb;
                global $DOPBSP;
                
                $order = new WC_Order($order_id);
                $order_items = $order->get_items();

                foreach ($order_items as $order_item){
                    $product_id = $order_item['product_id'];
                    $variation_id = $order_item['variation_id'];

                    $reservation_data = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->woocommerce.' WHERE product_id=%d AND variation_id=%d',
                                                                      $product_id, $variation_id));

                    /*
                     * Skip if product is not using the booking system.
                     */
                    if (!is_object($reservation_data)){
                        continue;
                    }
                    
                    $DOPBSP->classes->backend_reservation->add($reservation_data->language,
                                                               $reservation_data->currency,
                                                               $reservation_data->currency_code,
                                                               json_decode($reservation_data->data, true),
                                                               '',
                                                               '',
                                                               '',
                                                               'woocommerce',
                                                               '',
                                                               $order_id);
                     $DOPBSP->classes->woocommerce_variation->delete($reservation_data->product_id,
                                                                     $reservation_data->variation_id,
                                                                     true);
                }
            }
            
            /*
             * Get reservation details.
             * 
             * @param reservation (object): reservation data
             * @param calendar (object): calendar data
             * @param settings_calendar (object): calendar settings data
             * 
             * @return details info
             */
            function getDetails($reservation,
                                $calendar,
                                $settings_calendar){
                global $DOPBSP;
                
                $info = array();
                
                // array_push($info, '<table class="dopbsp-wc-cart">');
                // array_push($info, '     <tbody>');
                
                /*
                 * Reservation ID.
                 */
                // array_push($info, $this->getInfo($DOPBSP->text('RESERVATIONS_RESERVATION_ID'),
                //                                  $reservation->id));
                
                /*
                 * Calendar ID.
                 */
                // array_push($info, $this->getInfo($DOPBSP->text('RESERVATIONS_RESERVATION_CALENDAR_ID'),
                //                                  $reservation->calendar_id));
                
                /*
                 * Calendar name.
                 */
                // array_push($info, $this->getInfo($DOPBSP->text('RESERVATIONS_RESERVATION_CALENDAR_NAME'),
                //                                  $calendar->name));
                
                /*
                 * Selected language.
                 */
                // array_push($info, $this->getInfo($DOPBSP->text('RESERVATIONS_RESERVATION_LANGUAGE'),
                //                                  $DOPBSP->classes->languages->getName($reservation->language)));
                
                // array_push($info, '     </tbody>');
                // array_push($info, '</table>');
                
                array_push($info, '<table class="dopbsp-wc-cart">');
                array_push($info, '     <tbody>');
                
                /*
                 * Check in data.
                 */
                array_push($info, $this->getInfo($DOPBSP->text('SEARCH_FRONT_END_CHECK_IN'),
                                                 $DOPBSP->classes->prototypes->setDateToFormat($reservation->check_in, 
                                                                                               $settings_calendar->date_type, 
                                                                                               array($DOPBSP->text('MONTH_JANUARY'), 
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
                                                                                                     $DOPBSP->text('MONTH_DECEMBER')))));
                /*
                 * Check out data.
                 */
                if ($reservation->check_out != ''){
                    array_push($info, $this->getInfo($DOPBSP->text('SEARCH_FRONT_END_CHECK_OUT'),
                                                     $DOPBSP->classes->prototypes->setDateToFormat($reservation->check_out, 
                                                                                                   $settings_calendar->date_type, 
                                                                                                   array($DOPBSP->text('MONTH_JANUARY'), 
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
                                                                                                         $DOPBSP->text('MONTH_DECEMBER')))));
                }

                /*
                 * Start hour data.
                 */
                if ($reservation->start_hour != ''){
                    array_push($info, $this->getInfo($DOPBSP->text('SEARCH_FRONT_END_START_HOUR'),
                                                     $settings_calendar->hours_ampm == 'true' ? $DOPBSP->classes->prototypes->getAMPM($reservation->start_hour):$reservation->start_hour));
                }

                /*
                 * End hour data.
                 */
                if ($reservation->end_hour != ''){
                    array_push($info, $this->getInfo($DOPBSP->text('SEARCH_FRONT_END_END_HOUR'),
                                                     $settings_calendar->hours_ampm == 'true' ? $DOPBSP->classes->prototypes->getAMPM($reservation->end_hour):$reservation->end_hour));
                }

                /*
                 * No items data.
                 */
                if ($settings_calendar->sidebar_no_items_enabled == 'true'){
                    array_push($info, $this->getInfo($DOPBSP->text('SEARCH_FRONT_END_NO_ITEMS'),
                                                     $reservation->no_items));
                }

                /*
                 * Reservation price.
                 */
                if ($reservation->price > 0){
                    array_push($info, $this->getInfo($DOPBSP->text('RESERVATIONS_RESERVATION_FRONT_END_PRICE'),
                                                     $DOPBSP->classes->price->set($reservation->price,
                                                                                  $reservation->currency,
                                                                                  $settings_calendar->currency_position),
                                                     'price'));
                }
                
                array_push($info, '     </tbody>');
                array_push($info, '</table>');
                
                return implode('', $info);
            }
            
            /*
             * Get reservation extras.
             * 
             * @param reservation (object): reservation data
             * @param settings_calendar (object): calendar settings data
             * 
             * @return extras info
             */
            function getExtras($reservation,
                               $settings_calendar){
                global $DOPBSP;
                
                $info = array();
                
                if (isset($reservation->extras)
                        && $reservation->extras != ''){
                    $extras = is_string($reservation->extras) ? json_decode($reservation->extras):$reservation->extras;
                
                    for ($i=0; $i<count($extras); $i++){
                        $extras[$i]->displayed = false;
                    }
                    
                    array_push($info, '<table class="dopbsp-wc-cart">');
                    array_push($info, '     <tbody>');

                    for ($i=0; $i<count($extras); $i++){
                        $values = array();

                        if ($extras[$i]->displayed == false){
                            for ($j=0; $j<count($extras); $j++){
                                $value = array();
                                $extra = $extras[$j];

                                if ($extras[$i]->group_id == $extra->group_id){
                                    array_push($value, $extra->translation);

                                    if ($extra->price != 0){
                                        array_push($value, '<br />');


                                        if ($extra->price_type != 'fixed' 
                                                || $extra->price_by != 'once'){ 
                                            array_push($value, '&#9632;&nbsp;');

                                            if ($extra->price_type == 'fixed'){
                                                array_push($value, $extra->operation.'&nbsp;'.$DOPBSP->classes->price->set($extra->price,
                                                                                                                           $reservation->currency,
                                                                                                                           $settings_calendar->currency_position));
                                            }
                                            else{
                                                array_push($value, $extra->operation.'&nbsp;'.$extra->price.'%');
                                            }

                                            if ($extra->price_by != 'once'){
                                                array_push($value, '/'.($settings_calendar->hours_enabled == 'true' ? $DOPBSP->text('EXTRAS_FRONT_END_BY_HOUR'):$DOPBSP->text('EXTRAS_FRONT_END_BY_DAY')));
                                            }
                                            array_push($value, '<br />');
                                        }
                                        array_push($value, '<strong>'.$extra->operation.'&nbsp;');
                                        array_push($value, $DOPBSP->classes->price->set($extra->price_total,
                                                                                        $reservation->currency,
                                                                                        $settings_calendar->currency_position));
                                        array_push($value, '</strong>');
                                    }

                                    if (count($value) != 0){
                                        $extras[$j]->displayed = true;
                                        array_push($values, implode('', $value));
                                    }
                                }
                            }    
                            array_push($info, $this->getInfo($extras[$i]->group_translation,
                                                             implode('<br /><br />', $values)));
                        }
                    }
                    
                    if ($reservation->extras_price != 0){
                        array_push($info, '<br />');
                        array_push($info, $this->getInfo($DOPBSP->text('RESERVATIONS_RESERVATION_PAYMENT_PRICE_CHANGE'),
                                                         ($reservation->extras_price > 0 ? '+':'-').
                                                             '&nbsp;'.
                                                             $DOPBSP->classes->price->set($reservation->extras_price,
                                                                                          $reservation->currency,
                                                                                          $settings_calendar->currency_position),
                                                         'price'));
                    }
                    array_push($info, '     </tbody>');
                    array_push($info, '</table>');
                }
                else{
                    array_push($info, '<em>'.$DOPBSP->text('RESERVATIONS_RESERVATION_NO_EXTRAS').'</em>');
                }
                
                return implode('', $info);
            }
            
            /*
             * Get reservation discount.
             * 
             * @param reservation (object): reservation data
             * @param settings_calendar (object): calendar settings data
             * 
             * @return discount info
             */
            function getDiscount($reservation,
                                 $settings_calendar){
                global $DOPBSP;
                
                $info = array();
                
                $discount = is_string($reservation->discount) ? json_decode($reservation->discount):$reservation->discount;
                
                if ($discount->id != 0){
                    $value = array();
                
                    array_push($info, '<table class="dopbsp-wc-cart">');
                    array_push($info, '     <tbody>');

                    array_push($value, '&#9632;&nbsp;');

                    if ($discount->price_type == 'fixed'){
                        array_push($value, $discount->operation.'&nbsp;'.$DOPBSP->classes->price->set($discount->price,
                                                                                                      $reservation->currency,
                                                                                                      $settings_calendar->currency_position));
                    }
                    else{
                        array_push($value, $discount->operation.'&nbsp;'.$discount->price.'%');
                    }

                    if ($discount->price_by != 'once'){
                        array_push($value, '/'.($settings_calendar->hours_enabled == 'true' ? $DOPBSP->text('DISCOUNTS_FRONT_END_BY_HOUR'):$DOPBSP->text('DISCOUNTS_FRONT_END_BY_DAY')));
                    }

                    array_push($info, $this->getInfo($discount->translation,
                                                     implode('', $value)));

                    if ($reservation->discount_price != 0){
                        array_push($info, '<br />');
                        array_push($info, $this->getInfo($DOPBSP->text('RESERVATIONS_RESERVATION_PAYMENT_PRICE_CHANGE'),
                                                         ($reservation->discount_price > 0 ? '+':'-').
                                                             '&nbsp;'.
                                                             $DOPBSP->classes->price->set($reservation->discount_price,
                                                                                          $reservation->currency,
                                                                                          $settings_calendar->currency_position),
                                                         'price'));
                    }
                    array_push($info, '     </tbody>');
                    array_push($info, '</table>');
                }
                else{
                    array_push($info, '<em>'.$DOPBSP->text('RESERVATIONS_RESERVATION_NO_DISCOUNT').'</em>');
                }
                
                return implode('', $info);
            }
            
            /*
             * Get info field.
             * 
             * @param label (string):  data label
             * @param value (string):  data value
             * @param value_type (string):  data value type
             * 
             * @return info field
             */
            function getInfo($label = '',
                             $value = '',
                             $type = ''){
                $info = array();
                
                // $label = stripslashes(utf8_decode($label));
                // $value = stripslashes(utf8_decode($value));
                $label = stripslashes($label);
                $value = stripslashes($value);
                
                switch ($type){
                    case 'no-data':
                        $label = '<strong style="color: #898989;">'.$label.'</strong>';
                        $value = '<em style="color: #acacac;">'.$value.'</em>';
                        break;
                    case 'price':
                        $label = '<strong style="color: #252525;">'.$label.'</strong>';
                        $value = '<strong style="color: #252525;">'.$value.'</strong>';
                        break;
                    case 'price-total':
                        $label = '<strong style="color: #252525;">'.$label.'</strong>';
                        $value = '<strong style="color: #ff6300;">'.$value.'</strong>';
                        break;
                    default:
                        $label = '<strong style="color: #898989;">'.$label.'</strong>';
                        $value = '<span style="color: #666666;">'.$value.'</em>';
                }   
                
                array_push($info, '<tr>');
                array_push($info, '     <td style="vertical-align: top; width: 150px;">'.$label.'</td>');
                array_push($info, '     <td style="vertical-align: top;">'.$value.'</td>');
                array_push($info, '</tr>');
                
                return implode('', $info);
            }
        }
    }