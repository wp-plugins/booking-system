<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/woocommerce/class-woocommerce-variation.php
* File Version            : 1.0.4
* Created / Last Modified : 08 January 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System WooCommerce variation PHP class.
*/

    if (!class_exists('DOPBSPWooCommerceVariation')){
        class DOPBSPWooCommerceVariation extends DOPBSPWooCommerce{
            /*
             * Constructor
             */
            function DOPBSPWooCommerceVariation(){
            }
            
            /*
             * Add variation to product.
             * 
             * @post calendar_id (integer): calendar id
             * @post language (string): selected language
             * @post currency (string): selected currency sign
             * @post currency_code (string): selected currency code
             * @post cart (array): list of reservations
             * @post product_id (integer): product ID
             * 
             * @return variation ID
             */
            function add(){
                global $wpdb;
                global $DOPBSP;
                
                $calendar_id = $_POST['calendar_id'];
                $language = $_POST['language'];
                $currency = $_POST['currency'];
                $currency_code = $_POST['currency_code'];
                $cart = $_POST['cart_data'];
                $product_id = $_POST['product_id'];
                
                /*
                 * Clean old variations.
                 */
                $this->clean();
                
                /*
                 * Verify reservations availability.
                 */
                $reservation = $cart[0];
                    
                if ($reservation['start_hour'] == ''){
                    if (!$DOPBSP->classes->backend_calendar_schedule->validateDays($reservation['check_in'], $reservation['check_out'], $reservation['no_items'])){
                        echo 'unavailable';
                        die();
                    }
                }
                else{
                    if (!$DOPBSP->classes->backend_calendar_schedule->validateHours($reservation['check_in'], $reservation['start_hour'], $reservation['end_hour'], $reservation['no_items'])){
                        echo 'unavailable';
                        die();
                    }
                }
                
                /*
                 * Add variation.
                 */
                $token = $DOPBSP->classes->prototypes->getRandomString(64);
                
                $variation_data = array('post_title' => 'Variation #'.$token,
                                        'post_name' => 'product-'.$product_id.'-variation-'.$token,
                                        'post_status' => 'publish',
                                        'post_parent' => $product_id,
                                        'post_type' => 'product_variation',
                                        'guid' => home_url().'/?product_variation=product-'.$product_id.'-variation-'.$token);

                $variation_id = wp_insert_post($variation_data);
                
                /*
                 * Add variation meta.
                 */
                add_post_meta($variation_id, 'attribute_booking', 'reservation-'.$variation_id);
                add_post_meta($variation_id, '_download_expiry', '');
                add_post_meta($variation_id, '_download_limit', '');
                add_post_meta($variation_id, '_downloadable', 'no');
                add_post_meta($variation_id, '_file_paths', '');
                add_post_meta($variation_id, '_height', '');
                add_post_meta($variation_id, '_length', '');
                add_post_meta($variation_id, '_manage_stock', 'yes');
                add_post_meta($variation_id, '_price', $cart[0]['price_total'] != '' ? $cart[0]['price_total']:0);
                add_post_meta($variation_id, '_regular_price', $cart[0]['price_total'] != '' ? $cart[0]['price_total']:'');
                add_post_meta($variation_id, '_sale_price', '');
                add_post_meta($variation_id, '_sale_price_dates_from', '');
                add_post_meta($variation_id, '_sale_price_dates_to', '');
                add_post_meta($variation_id, '_sku', '');
                add_post_meta($variation_id, '_stock', '1');
                add_post_meta($variation_id, '_thumbnail_id', '0');
                add_post_meta($variation_id, '_virtual', 'yes');
                add_post_meta($variation_id, '_weight', '');
                add_post_meta($variation_id, '_width', '');
                
                /*
                 * Create an attribute for the variation.
                 */
                $attributes = maybe_unserialize(get_post_meta($product_id, '_product_attributes'));
                $attributes = $attributes[0];
                
                foreach ($attributes as $key => $attribute){
                    if ($key == 'booking'){
                        if ($attribute['value'] == ''){
                            $values = array();
                        }
                        else{
                            $values = explode(' '.$this->wc_delimiter.' ', $attribute['value']);
                        }
                
                        array_push($values, 'Reservation '.$variation_id); 
                        $attributes[$key]['value'] = implode(' '.$this->wc_delimiter.' ', $values);
                    }
                }
		update_post_meta($product_id, '_product_attributes', $attributes);
                
                /*
                 * Save variation to database.
                 */
                $wpdb->insert($DOPBSP->tables->woocommerce, array('variation_id' => $variation_id, 
                                                                  'product_id' => $product_id,
                                                                  'calendar_id' => $calendar_id,
                                                                  'language' => $language,
                                                                  'currency' => $currency,
                                                                  'currency_code' => $currency_code,
                                                                  'data' => json_encode($cart[0])));
                
                echo $variation_id;
                
                die();
            }
            
            /*
             * Delete variation from product.
             * 
             * @param product_id (integer): product ID
             * @param prev_variation (integer): previous variation used
             * @param only_from_bsp_database (boolean): delete variation only from booking system database
             */
            function delete($product_id,
                            $variation_id,
                            $only_from_bsp_database = false){
                global $wpdb;
                global $DOPBSP;
                
                if (!$only_from_bsp_database){
                    /*
                     * Delete variation.
                     */
                    wp_delete_post($variation_id);

                    /*
                     * Delete variation meta.
                     */
                    delete_post_meta($variation_id, 'attribute_booking');
                    delete_post_meta($variation_id, '_download_expiry');
                    delete_post_meta($variation_id, '_download_limit');
                    delete_post_meta($variation_id, '_downloadable');
                    delete_post_meta($variation_id, '_file_paths');
                    delete_post_meta($variation_id, '_height');
                    delete_post_meta($variation_id, '_length');
                    delete_post_meta($variation_id, '_manage_stock');
                    delete_post_meta($variation_id, '_price');
                    delete_post_meta($variation_id, '_regular_price');
                    delete_post_meta($variation_id, '_sale_price');
                    delete_post_meta($variation_id, '_sale_price_dates_from');
                    delete_post_meta($variation_id, '_sale_price_dates_to');
                    delete_post_meta($variation_id, '_sku');
                    delete_post_meta($variation_id, '_stock');
                    delete_post_meta($variation_id, '_thumbnail_id');
                    delete_post_meta($variation_id, '_virtual');
                    delete_post_meta($variation_id, '_weight');
                    delete_post_meta($variation_id, '_width');

                    /*
                     * Delete variation attribute.
                     */
                    $attributes = maybe_unserialize(get_post_meta($product_id, '_product_attributes'));
                    $attributes = $attributes[0];

                    foreach ($attributes as $key => $attribute){
                        if ($key == 'booking'){
                            $values = explode(' '.$this->wc_delimiter.' ', $attribute['value']);

                            for ($i=0; $i<count($values); $i++){
                                $value_data = explode(' ', $values[$i]);

                                if (isset($value_data[1])
                                        && (int)$value_data[1] == $variation_id){
                                    array_splice($values, $i, 1);
                                }
                            }
                            $attributes[$key]['value'] = implode(' '.$this->wc_delimiter.' ', $values);
                        }
                    }
                    update_post_meta($product_id, '_product_attributes', $attributes);
                }
                
                /*
                 * Delete variation from database.
                 */
                $wpdb->delete($DOPBSP->tables->woocommerce, array('variation_id' => $variation_id, 
                                                                  'product_id' => $product_id));
            }
            
            /*
             * Clean unused variations.
             */
            function clean(){
                global $wpdb;
                global $DOPBSP;
                
                $variations = $wpdb->get_results('SELECT * FROM '.$DOPBSP->tables->woocommerce.' WHERE date_created < DATE_SUB(CURDATE(),INTERVAL 1 DAY)');
                // $variations = $wpdb->get_results('SELECT * FROM '.$DOPBSP->tables->woocommerce);
                
                foreach ($variations as $variation){
                    $this->delete($variation->product_id,
                                  $variation->variation_id);
                }
            }
        }
    }