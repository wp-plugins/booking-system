<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/coupons/class-backend-coupon.php
* File Version            : 1.0.2
* Created / Last Modified : 25 January 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end coupon PHP class.
*/

    if (!class_exists('DOPBSPBackEndCoupon')){
        class DOPBSPBackEndCoupon extends DOPBSPBackEndCoupons{
            /*
             * Constructor
             */
            function DOPBSPBackEndCoupon(){
            }
            
            /*
             * Prints out the coupon.
             * 
             * @post language (string): coupon current editing language
             * 
             * @return coupon HTML
             */
            function display(){
                global $DOPBSP;
                
                $language = $_POST['language'];
                
                $DOPBSP->views->backend_coupon->template(array('language' => $language));
                
                die();
            }
            
            /*
             * Edit coupon fields.
             * 
             * @post field (string): coupon field
             * @post value (string): coupon new value
             * @post language (string): coupon selected language
             */
            function edit(){
                global $wpdb;  
                global $DOPBSP;
                
                $field = $_POST['field'];
                $value = $_POST['value'];
                $language = $_POST['language'];
                
                if ($field == 'label'){
                    $value = str_replace("\n", '<<new-line>>', $value);
                    $value = str_replace("\'", '<<single-quote>>', $value);
                    $value = utf8_encode($value);
                    
                    $coupon_data = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->coupons.' WHERE id=%d',
                                                                 1));
                    
                    $translation = json_decode($coupon_data->translation);
                    $translation->$language = $value;
                    
                    $value = json_encode($translation);
                    $field = 'translation';
                }
                        
                $wpdb->update($DOPBSP->tables->coupons, array($field => $value), 
                                                        array('id' =>1));
                
            	die();
            }
            
            /*
             * Delete coupon.
             * 
             * 
             * @return number of coupons left
             */
            function delete(){
                global $wpdb;
                global $DOPBSP;

                /*
                 * Delete coupon.
                 */
                $wpdb->delete($DOPBSP->tables->coupons, array('id' => 1));
                $coupons = $wpdb->get_results('SELECT * FROM '.$DOPBSP->tables->coupons.' ORDER BY id DESC');
                
                echo $wpdb->num_rows;

            	die();
            }
            
            /*
             * Update coupon availability.
             * 
             * @param action (string): "use" or "restore" coupon
             */
            function update($action){
                global $wpdb;
                global $DOPBSP;
                
                $coupon = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->coupons.' WHERE id=%d ORDER BY id',
                                                        1));
                
                if ($coupon->no_coupons != ''){
                    if ($action == 'use'){
                        $no_coupons = (int)$coupon->no_coupons-1;
                    }
                    else{
                        $no_coupons = (int)$coupon->no_coupons+1;
                    }
                    $wpdb->update($DOPBSP->tables->coupons, array('no_coupons' => $no_coupons), 
                                                            array('id' =>1));
                }
            }
            
            /*
             * Check if coupon is still available.
             * 
             * 
             * @return true/false
             */
            function validate(){
                global $wpdb;
                global $DOPBSP;
                
                $coupon = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->coupons.' WHERE id=%d ORDER BY id',
                                                        1));
                
                if (($coupon->no_coupons == ''
                                || (int)$coupon->no_coupons > 0)
                        && (int)$coupon->price > 0){
                    return true;
                }
                else{
                    return false;
                }
            }
        }
    }