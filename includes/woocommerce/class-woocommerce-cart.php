<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/woocommerce/class-woocommerce-cart.php
* File Version            : 1.0.9
* Created / Last Modified : 13 February 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System WooCommerce cart PHP class.
*/

    if (!class_exists('DOPBSPWooCommerceCart')){
        class DOPBSPWooCommerceCart extends DOPBSPWooCommerce{
            /*
             * Constructor
             */
            function DOPBSPWooCommerceCart(){
                /*
                 * Set reservation info in cart.
                 */
                add_filter('woocommerce_get_item_data', array(&$this, 'set'), 10, 2);
                
                /*
                 * Update variation with cart key if added to cart.
                 */
                add_action('woocommerce_cart_updated', array(&$this, 'update'));
                
                /*
                 * Delete variation if it has been removed from cart.
                 */
                add_action('woocommerce_cart_updated', array(&$this, 'delete'));
                
                /*
                 * Validate cart items.
                 */
                add_action('woocommerce_check_cart_items', array(&$this, 'validate'));
                
                /*
                 * Validate reservation before adding it to cart.
                 */
                add_filter('woocommerce_add_to_cart_validation', array(&$this, 'validateAdd'), 10, 4);
            }
            
            /*
             * Set reservation info to cart.
             * 
             * @param other_data (array): the array to which the info will be added
             * @param car_item (array): cart data
             * 
             * @return info array
             */
            function set($other_data, 
                         $cart_item){
                global $wpdb;
                global $DOPBSP;
                
                $product_id = $cart_item['product_id'];
                $variations = $cart_item['data']->variation_data;
                  
                /*
                 * Skip products without variations.
                 */
                if (!is_array($variations)){
                    return $other_data;
                }
                
                foreach ($variations as $key => $variation){
                    if ($key == 'attribute_booking'){
                        $reservation_data = array();
                        $variation_data = explode('-', $variation);
                        
                        if (count($reservation_data > 1)){
                            $variation_id = $variation_data[1];
                        
                            $reservation_data = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->woocommerce.' WHERE product_id=%d AND variation_id=%d',
                                                                              $product_id, $variation_id));
                        
                            $reservation = json_decode($reservation_data->data);
                            $reservation->currency = $reservation_data->currency;

                            $calendar = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->calendars.' WHERE id=%d',
                                                                      1));
                            $settings_calendar = $DOPBSP->classes->backend_settings->values(1,'calendar');

                            $DOPBSP->classes->translation->set($reservation_data->language,
                                                               false);

                            /*
                             * Display error.
                             */
                            $validated = $this->validateItem($reservation_data->calendar_id,
                                                             $product_id,
                                                             $reservation_data->cart_key,
                                                             $reservation);

                            if ($validated != ''){
                                $other_data[] =  array('name' => '<span class="dopbsp-wc-error-title">'.$DOPBSP->text('CART_ERROR').'</span>',
                                                       'value' => '<span class="dopbsp-wc-error-message">'.$validated.'</span>');
                            }

                            /*
                             * Display details data.
                             */
                            $other_data[] =  array('name' => $DOPBSP->text('RESERVATIONS_RESERVATION_DETAILS_TITLE'),
                                                   'value' => $this->getDetails($reservation,
                                                                                $calendar,
                                                                                $settings_calendar));

                            /*
                             * Display extra data.
                             */
                            if ((int)$settings_calendar->extra != 0){
                                $other_data[] = array('name' => $DOPBSP->text('EXTRAS_FRONT_END_TITLE'),
                                                      'value' => $this->getExtras($reservation,
                                                                                  $settings_calendar));
                            }

                            /*
                             * Display discount data.
                             */
                            if ((int)$settings_calendar->discount != 0){
                                $other_data[] = array('name' => $DOPBSP->text('DISCOUNTS_FRONT_END_TITLE'),
                                                      'value' => $this->getDiscount($reservation,
                                                                                    $settings_calendar));
                            }
                        }
                    }
                }
                
                return $other_data;
            }
 
            /*
             * Add cart item key to variation in database.
             */
            function update(){
                global $wpdb;
                global $woocommerce;
                global $DOPBSP;
                
                foreach ($woocommerce->cart->cart_contents as $cart_key => $cart_item){
                    $product_id = $cart_item['product_id'];
                    $variations = $cart_item['data']->variation_data;
                    
                    /*
                     * Skip products without variations.
                     */
                    if (!is_array($variations)){
                        continue;
                    }
                    
                    foreach ($variations as $key => $variation){
                        if ($key == 'attribute_booking'){
                            $reservation_data = array();
                            $variation_data = explode('-', $variation);
                        
                            if (count($reservation_data > 1)){
                                $variation_id = $variation_data[1];

                                $wpdb->update($DOPBSP->tables->woocommerce, array('cart_key' => $cart_key),
                                                                            array('product_id' => $product_id,
                                                                                  'variation_id' => $variation_id));
                            }
                        }
                    }
                }
            }
            
            /*
             * Delete variation when cart item is deleted.
             * 
             * @get remove_item (string): deleted item cart key
             */
            function delete(){
                global $wpdb;
                global $DOPBSP;
                
                if (isset($_GET['remove_item'])){
                    $variation = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->woocommerce.' WHERE cart_key="%s"',
                                                               $_GET['remove_item']));
                    
                    if (is_object($variation)){
                        $DOPBSP->classes->woocommerce_variation->delete($variation->product_id,
                                                                        $variation->variation_id);
                    }
                }
            }
            
            /*
             * Verify all cart items that contain a reservation request.
             * 
             * @return error messages
             */
            function validate(){
                global $wpdb;
                global $woocommerce;
                global $DOPBSP;
                
                $cart = $woocommerce->cart->cart_contents;
                $query = array();
                $errors = array();
                
                /*
                 * Get reservations that are in this cart and from same calednar.
                 */
                foreach ($cart as $key => $cart_item){
                    array_push($query, 'cart_key="'.$key.'"');
                }
                
                if (isset($query)) {
                    
                    if (count($query) > 0){
                        
                        if (count($query) > 1){
                            $variations = $wpdb->get_results('SELECT * FROM '.$DOPBSP->tables->woocommerce.(count($query) > 0 ? ' WHERE '.implode(' OR ', $query):'').' ORDER BY date_created');
                        } else{
                            $variations = $wpdb->get_results('SELECT * FROM '.$DOPBSP->tables->woocommerce.(count($query) > 0 ? ' WHERE '.$query[0]:'').' ORDER BY date_created');
                        }
                        
                        foreach ($variations as $variation){
                            $error = $this->validateItem($variation->calendar_id,
                                                         $variation->product_id,
                                                         $variation->cart_key,
                                                         json_decode($variation->data));
                            if ($error != ''){
                                array_push($errors, '<a href="'.get_permalink($variation->product_id).'">'.get_the_title($variation->product_id).'</a> - Reservation '.$variation->variation_id.': '.$error);
                            }
                        }

                        if (count($errors) > 0){
                            wc_add_notice(implode('<br /><br />', $errors), 'error');
                        }
                    }
                }
                
            }
            
            /*
             * Verify if cart item reservation is available.
             * 
             * @param calendar_id (integer): calendar ID
             * @param product_id (integer): product ID 
             * @param cart_key (string): cart item key
             * @param reservation (object): reservation data
             * 
             * @return error messages
             */
            function validateItem($calendar_id,
                                  $product_id,
                                  $cart_key,
                                  $reservation){
                global $wpdb;
                global $woocommerce;
                global $DOPBSP;
                
                if ($reservation->start_hour == ''){
                    if (!$DOPBSP->classes->backend_calendar_schedule->validateDays($reservation->check_in, $reservation->check_out, $reservation->no_items)){
                        return $DOPBSP->text('CART_UNAVAILABLE');
                    }
                }
                else{
                    if (!$DOPBSP->classes->backend_calendar_schedule->validateHours($reservation->check_in, $reservation->start_hour, $reservation->end_hour, $reservation->no_items)){
                        return $DOPBSP->text('CART_UNAVAILABLE');
                    }
                }
                
                $cart = $woocommerce->cart->cart_contents;
                $query = array();
                $reservations = array();
                
                /*
                 * Get reservations that are in this cart and from same calednar.
                 */
                foreach ($cart as $key => $cart_item){
                    if ($key == $cart_key){
                        break;
                    }
                    array_push($query, 'cart_key="'.$key.'"');
                }
                
                if (count($query) == 0){
                    return '';
                }
                
                $variations = $wpdb->get_results('SELECT * FROM '.$DOPBSP->tables->woocommerce.' WHERE product_id='.$product_id.' AND ('.implode(' OR ', $query).') ORDER BY date_created');
                
                /*
                 * Verify reservations.
                 */
                foreach ($variations as $variation){
                    array_push($reservations, json_decode($variation->data));
                }
                array_push($reservations, $reservation);
                
                if ($reservation->start_hour == ''){
                    if (!$DOPBSP->classes->backend_calendar_schedule->validateDaysOverlap($reservations)){
                        return $DOPBSP->text('CART_OVERLAP');
                    }
                }
                else{
                    if (!$DOPBSP->classes->backend_calendar_schedule->validateHoursOverlap($reservations)){
                        return $DOPBSP->text('CART_OVERLAP');
                    }
                }
                
                return '';
            }
            
            /*
             * Validate new reservation before adding it to cart, to not overlap with the ones already existing in cart.
             * 
             * @param passed (boolean): previous validations result
             * @param product_id (integer): product ID 
             * @param quantity (integer): product quantity
             * @param variation_id (integer): variation ID
             * 
             * @return true/false
             */
            function validateAdd($passed, 
                                 $product_id,
                                 $quantity,
                                 $variation_id = ''){
                global $wpdb;
                global $woocommerce;
                global $DOPBSP;
                
                /*
                 * Do not verify if previous validations are false or if there is no variation.
                 */
                if (!$passed
                        || $variation_id == ''){
                    return $passed;
                }
                
                $cart = $woocommerce->cart->cart_contents;
                $query = array();
                $reservations = array();
                
                /*
                 * Get reservations that are in this cart and from same calednar.
                 */
                foreach ($cart as $key => $cart_item){
                    array_push($query, 'cart_key="'.$key.'"');
                }
                
                if (count($query) == 0){
                    return $passed;
                }
                
                $variations = $wpdb->get_results('SELECT * FROM '.$DOPBSP->tables->woocommerce.' WHERE product_id='.$product_id.' AND ('.implode(' OR ', $query).') ORDER BY date_created');
                
                $current_variation = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->woocommerce.' WHERE product_id=%d AND variation_id=%d',
                                                                   $product_id, $variation_id));
                $settings_calendar = $DOPBSP->classes->backend_settings->values(1,'calendar');
                
                /*
                 * Verify reservations.
                 */
                foreach ($variations as $variation){
                    array_push($reservations, json_decode($variation->data));
                }
                array_push($reservations, json_decode($current_variation->data));
                
                if ($settings_calendar->hours_enabled == 'false'){
                    $passed = $DOPBSP->classes->backend_calendar_schedule->validateDaysOverlap($reservations);
                }
                else{
                    $passed = $DOPBSP->classes->backend_calendar_schedule->validateHoursOverlap($reservations);
                }
                
                if (!$passed){
                    wc_add_notice($DOPBSP->text('CART_OVERLAP'), 'error');
                    
                    return $passed;
                }
                
                return $passed;
            }   
        }
    }