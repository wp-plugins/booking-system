<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/coupons/class-frontend-coupons.php
* File Version            : 1.0.1
* Created / Last Modified : 25 January 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System front end coupons PHP class.
*/

    if (!class_exists('DOPBSPFrontEndCoupons')){
        class DOPBSPFrontEndCoupons extends DOPBSPFrontEnd{
            /*
             * Constructor.
             */
            function DOPBSPFrontEndCoupons(){
            }
            
            /*
             * Get selected coupons.
             * 
             * @param id(string): coupon ID
             * @param language (string): selected language
             * 
             * @return data array
             */
            function get($id,
                         $language = DOPBSP_CONFIG_TRANSLATION_DEFAULT_LANGUAGE){
                global $wpdb;
                global $DOPBSP;
                
                $coupon = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->coupons.' WHERE id=%d ORDER BY id',
                                                        $id));
                
                if ($id != 0){
                    $coupon->translation = $DOPBSP->classes->translation->decodeJSON($coupon->translation,
                                                                                     $language);
                }
                
                return array('data' => array('coupon' => $coupon,
                                             'id' => $id),
                             'text' => array('byDay' => $DOPBSP->text('COUPONS_FRONT_END_BY_DAY'),
                                             'byHour' => $DOPBSP->text('COUPONS_FRONT_END_BY_HOUR'),
                                             'code' => $DOPBSP->text('COUPONS_FRONT_END_CODE'),
                                             'title' => $DOPBSP->text('COUPONS_FRONT_END_TITLE'),
                                             'use' => $DOPBSP->text('COUPONS_FRONT_END_USE'),
                                             'verify' => $DOPBSP->text('COUPONS_FRONT_END_VERIFY'),
                                             'verifyError' => $DOPBSP->text('COUPONS_FRONT_END_VERIFY_ERROR'),
                                             'verifySuccess' => $DOPBSP->text('COUPONS_FRONT_END_VERIFY_SUCCESS')));
            }
            
            /*
             * Verify coupon code.
             * 
             * @post id (integer): coupon ID
             * @post code (string): coupon code
             * @post today (string): today date
             * @post curr_time (string): current time
             * 
             * @return "success" or "error" message
             */
            function verify(){
                global $wpdb;
                global $DOPBSP;
                
                $id = $_POST['id'];
                $code = $_POST['code'];
                $today = $_POST['today'];
                $curr_time = $_POST['curr_time'];
                
                $coupon = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->coupons.' WHERE id=%d ORDER BY id',
                                                        $id));
                
                if ($code == $coupon->code
                        && ($coupon->start_date == ''
                                    || $coupon->start_date <= $today)
                        && ($coupon->end_date == ''
                                    || $coupon->end_date >= $today)
                        && ($coupon->start_hour == ''
                                    || $coupon->start_hour <= $curr_time)
                        && ($coupon->end_hour == ''
                                    || $coupon->end_hour >= $curr_time)
                        && ($coupon->no_coupons == ''
                                    || (int)$coupon->no_coupons > 0)
                        && (int)$coupon->price > 0){
                    echo 'success';
                }
                else{
                    echo 'error';
                }
                
                die();
            }
        }
    }