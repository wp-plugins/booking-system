<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/translation/class-translation-text-coupons.php
* File Version            : 1.0.3
* Created / Last Modified : 28 December 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System coupons translation text PHP class.
*/

    if (!class_exists('DOPBSPTranslationTextCoupons')){
        class DOPBSPTranslationTextCoupons{
            /*
             * Constructor
             */
            function DOPBSPTranslationTextCoupons(){
                /*
                 * Initialize coupons text.
                 */
                add_filter('dopbsp_filter_translation_text', array(&$this, 'coupons'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'couponsCoupon'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'couponsAddCoupon'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'couponsDeleteCoupon'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'couponsHelp'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'couponsFrontEnd'));
            }
            
            /*
             * Coupons text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function coupons($text){
                array_push($text, array('key' => 'PARENT_COUPONS',
                                        'parent' => '',
                                        'text' => 'Coupons'));
                
                array_push($text, array('key' => 'COUPONS_TITLE',
                                        'parent' => 'PARENT_COUPONS',
                                        'text' => 'Coupons'));
                array_push($text, array('key' => 'COUPONS_CREATED_BY',
                                        'parent' => 'PARENT_COUPONS',
                                        'text' => 'Created by'));
                array_push($text, array('key' => 'COUPONS_LOAD_SUCCESS',
                                        'parent' => 'PARENT_COUPONS',
                                        'text' => 'Coupons list loaded.'));
                array_push($text, array('key' => 'COUPONS_NO_COUPONS',
                                        'parent' => 'PARENT_COUPONS',
                                        'text' => 'No coupons. Click the above "plus" icon to add a new one.'));
                
                return $text;
            }
            
            /*
             * Coupons - Coupon text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function couponsCoupon($text){
                array_push($text, array('key' => 'PARENT_COUPONS_COUPON',
                                        'parent' => '',
                                        'text' => 'Coupons - Coupon'));
                
                array_push($text, array('key' => 'COUPONS_COUPON_NAME',
                                        'parent' => 'PARENT_COUPONS_COUPON',
                                        'text' => 'Name'));
                array_push($text, array('key' => 'COUPONS_COUPON_LANGUAGE',
                                        'parent' => 'PARENT_COUPONS_COUPON',
                                        'text' => 'Language'));
                
                array_push($text, array('key' => 'COUPONS_COUPON_LABEL',
                                        'parent' => 'PARENT_COUPONS_COUPON',
                                        'text' => 'Label'));
                array_push($text, array('key' => 'COUPONS_COUPON_CODE',
                                        'parent' => 'PARENT_COUPONS_COUPON',
                                        'text' => 'Code'));
                array_push($text, array('key' => 'COUPONS_COUPON_CODE_GENERATE',
                                        'parent' => 'PARENT_COUPONS_COUPON',
                                        'text' => 'Generate a random code'));
                array_push($text, array('key' => 'COUPONS_COUPON_START_DATE',
                                        'parent' => 'PARENT_COUPONS_COUPON',
                                        'text' => 'Start date'));
                array_push($text, array('key' => 'COUPONS_COUPON_END_DATE',
                                        'parent' => 'PARENT_COUPONS_COUPON',
                                        'text' => 'End date'));
                array_push($text, array('key' => 'COUPONS_COUPON_START_HOUR',
                                        'parent' => 'PARENT_COUPONS_COUPON',
                                        'text' => 'Start hour'));
                array_push($text, array('key' => 'COUPONS_COUPON_END_HOUR',
                                        'parent' => 'PARENT_COUPONS_COUPON',
                                        'text' => 'End hour'));
                array_push($text, array('key' => 'COUPONS_COUPON_NO_COUPONS',
                                        'parent' => 'PARENT_COUPONS_COUPON',
                                        'text' => 'Number of coupons'));
                array_push($text, array('key' => 'COUPONS_COUPON_OPERATION',
                                        'parent' => 'PARENT_COUPONS_COUPON',
                                        'text' => 'Operation'));
                array_push($text, array('key' => 'COUPONS_COUPON_PRICE',
                                        'parent' => 'PARENT_COUPONS_COUPON',
                                        'text' => 'Price/Percent'));
                array_push($text, array('key' => 'COUPONS_COUPON_PRICE_TYPE',
                                        'parent' => 'PARENT_COUPONS_COUPON',
                                        'text' => 'Price type'));
                array_push($text, array('key' => 'COUPONS_COUPON_PRICE_TYPE_FIXED',
                                        'parent' => 'PARENT_COUPONS_COUPON',
                                        'text' => 'Fixed'));
                array_push($text, array('key' => 'COUPONS_COUPON_PRICE_TYPE_PERCENT',
                                        'parent' => 'PARENT_COUPONS_COUPON',
                                        'text' => 'Percent'));
                array_push($text, array('key' => 'COUPONS_COUPON_PRICE_BY',
                                        'parent' => 'PARENT_COUPONS_COUPON',
                                        'text' => 'Price by'));
                array_push($text, array('key' => 'COUPONS_COUPON_PRICE_BY_ONCE',
                                        'parent' => 'PARENT_COUPONS_COUPON',
                                        'text' => 'Once'));
                array_push($text, array('key' => 'COUPONS_COUPON_PRICE_BY_PERIOD',
                                        'parent' => 'PARENT_COUPONS_COUPON',
                                        'text' => 'day/hour'));
                
                array_push($text, array('key' => 'COUPONS_COUPON_LOADED',
                                        'parent' => 'PARENT_COUPONS_COUPON',
                                        'text' => 'Coupon loaded.'));
                
                return $text;
            }
            
            /*
             * Coupons - Add coupon text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function couponsAddCoupon($text){
                array_push($text, array('key' => 'PARENT_COUPONS_ADD_COUPON',
                                        'parent' => '',
                                        'text' => 'Coupons - Add coupon'));
                
                array_push($text, array('key' => 'COUPONS_ADD_COUPON_NAME',
                                        'parent' => 'PARENT_COUPONS_ADD_COUPON',
                                        'text' => 'New coupon'));
                array_push($text, array('key' => 'COUPONS_ADD_COUPON_LABEL',
                                        'parent' => 'PARENT_COUPONS_ADD_COUPON',
                                        'text' => 'Coupon'));
                array_push($text, array('key' => 'COUPONS_ADD_COUPON_SUBMIT',
                                        'parent' => 'PARENT_COUPONS_ADD_COUPON',
                                        'text' => 'Add coupon'));
                array_push($text, array('key' => 'COUPONS_ADD_COUPON_ADDING',
                                        'parent' => 'PARENT_COUPONS_ADD_COUPON',
                                        'text' => 'Adding a new coupon ...'));
                array_push($text, array('key' => 'COUPONS_ADD_COUPON_SUCCESS',
                                        'parent' => 'PARENT_COUPONS_ADD_COUPON',
                                        'text' => 'You have succesfully added a new coupon.'));
                
                return $text;
            }
            
            /*
             * Coupons - Delete coupon text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function couponsDeleteCoupon($text){
                array_push($text, array('key' => 'PARENT_COUPONS_DELETE_COUPON',
                                        'parent' => '',
                                        'text' => 'Coupons - Delete coupon'));
                
                array_push($text, array('key' => 'COUPONS_DELETE_COUPON_CONFIRMATION',
                                        'parent' => 'PARENT_COUPONS_DELETE_COUPON',
                                        'text' => 'Are you sure you want to delete this coupon?'));
                array_push($text, array('key' => 'COUPONS_DELETE_COUPON_SUBMIT',
                                        'parent' => 'PARENT_COUPONS_DELETE_COUPON',
                                        'text' => 'Delete coupon'));
                array_push($text, array('key' => 'COUPONS_DELETE_COUPON_DELETING',
                                        'parent' => 'PARENT_COUPONS_DELETE_COUPON',
                                        'text' => 'Deleting coupon ...'));
                array_push($text, array('key' => 'COUPONS_DELETE_COUPON_SUCCESS',
                                        'parent' => 'PARENT_COUPONS_DELETE_COUPON',
                                        'text' => 'You have succesfully deleted the coupon.'));
                
                return $text;
            }
            
            /*
             * Coupons - Help text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function couponsHelp($text){
                array_push($text, array('key' => 'PARENT_COUPONS_HELP',
                                        'parent' => '',
                                        'text' => 'Coupons - Help'));
                
                array_push($text, array('key' => 'COUPONS_HELP',
                                        'parent' => 'PARENT_COUPONS_HELP',
                                        'text' => 'Click on a coupon item to open the editing area.'));
                array_push($text, array('key' => 'COUPONS_ADD_COUPON_HELP',
                                        'parent' => 'PARENT_COUPONS_HELP',
                                        'text' => 'Click on the "plus" icon to add a coupon.'));
                
                /*
                 * Coupon help.
                 */
                array_push($text, array('key' => 'COUPONS_COUPON_HELP',
                                        'parent' => 'PARENT_COUPONS_HELP',
                                        'text' => 'Click the group "trash" icon to delete the coupon.'));
                array_push($text, array('key' => 'COUPONS_COUPON_NAME_HELP',
                                        'parent' => 'PARENT_COUPONS_HELP',
                                        'text' => 'Change coupon name.'));
                array_push($text, array('key' => 'COUPONS_COUPON_LANGUAGE_HELP',
                                        'parent' => 'PARENT_COUPONS_HELP',
                                        'text' => 'Change to the language you want to edit the coupon.'));
                array_push($text, array('key' => 'COUPONS_COUPON_LABEL_HELP',
                                        'parent' => 'PARENT_COUPONS_HELP',
                                        'text' => 'Enter coupon label.'));
                array_push($text, array('key' => 'COUPONS_COUPON_CODE_HELP',
                                        'parent' => 'PARENT_COUPONS_HELP',
                                        'text' => 'Enter coupon code.'));
                array_push($text, array('key' => 'COUPONS_COUPON_START_DATE_HELP',
                                        'parent' => 'PARENT_COUPONS_HELP',
                                        'text' => 'Enter coupon start date, when the coupon will start being used.. Leave it blank to start today.'));
                array_push($text, array('key' => 'COUPONS_COUPON_END_DATE_HELP',
                                        'parent' => 'PARENT_COUPONS_HELP',
                                        'text' => 'Enter coupon end date, when the coupon will stop being used. Leave it blank for the coupons to have an unlimited time lapse.'));
                array_push($text, array('key' => 'COUPONS_COUPON_START_HOUR_HELP',
                                        'parent' => 'PARENT_COUPONS_HELP',
                                        'text' => 'Enter coupon start hour, when the coupon will start being used. Leave it blank so you can use the coupons from the start of the day.'));
                array_push($text, array('key' => 'COUPONS_COUPON_END_HOUR_HELP',
                                        'parent' => 'PARENT_COUPONS_HELP',
                                        'text' => 'Enter coupon end hour, when the coupon will end being used. Leave it blank so you can use the coupons until the end of the day.'));
                array_push($text, array('key' => 'COUPONS_COUPON_NO_COUPONS_HELP',
                                        'parent' => 'PARENT_COUPONS_HELP',
                                        'text' => 'Enter the number of coupons available. Leave it blank for unlimited number of coupons.'));
                array_push($text, array('key' => 'COUPONS_COUPON_OPERATION_HELP',
                                        'parent' => 'PARENT_COUPONS_HELP',
                                        'text' => 'Select coupon price operation. You can add or subtract a value.'));
                array_push($text, array('key' => 'COUPONS_COUPON_PRICE_HELP',
                                        'parent' => 'PARENT_COUPONS_HELP',
                                        'text' => 'Enter coupon price.'));
                array_push($text, array('key' => 'COUPONS_COUPON_PRICE_TYPE_HELP',
                                        'parent' => 'PARENT_COUPONS_HELP',
                                        'text' => 'Select coupon price type. It can be a fixed value or a percent from price.'));
                array_push($text, array('key' => 'COUPONS_COUPON_PRICE_BY_HELP',
                                        'parent' => 'PARENT_COUPONS_HELP',
                                        'text' => 'Select coupon price by. The price can be calculated once or by day/hour.'));
                
                return $text;
            }
            
            /*
             * Coupons front end text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function couponsFrontEnd($text){
                array_push($text, array('key' => 'PARENT_COUPONS_FRONT_END',
                                        'parent' => '',
                                        'text' => 'Coupons - Front end'));
                
                array_push($text, array('key' => 'COUPONS_FRONT_END_TITLE',
                                        'parent' => 'PARENT_COUPONS_FRONT_END',
                                        'text' => 'Coupons'));
                
                array_push($text, array('key' => 'COUPONS_FRONT_END_CODE',
                                        'parent' => 'PARENT_COUPONS_FRONT_END',
                                        'text' => 'Enter code'));
                array_push($text, array('key' => 'COUPONS_FRONT_END_VERIFY',
                                        'parent' => 'PARENT_COUPONS_FRONT_END',
                                        'text' => 'Verify code'));
                array_push($text, array('key' => 'COUPONS_FRONT_END_VERIFY_SUCCESS',
                                        'parent' => 'PARENT_COUPONS_FRONT_END',
                                        'text' => 'The coupon code is valid.'));
                array_push($text, array('key' => 'COUPONS_FRONT_END_VERIFY_ERROR',
                                        'parent' => 'PARENT_COUPONS_FRONT_END',
                                        'text' => 'The coupon code is invalid. Please enter another one.'));
                array_push($text, array('key' => 'COUPONS_FRONT_END_USE',
                                        'parent' => 'PARENT_COUPONS_FRONT_END',
                                        'text' => 'Use coupon'));
                
                array_push($text, array('key' => 'COUPONS_FRONT_END_BY_DAY',
                                        'parent' => 'PARENT_COUPONS_FRONT_END',
                                        'text' => 'day'));
                array_push($text, array('key' => 'COUPONS_FRONT_END_BY_HOUR',
                                        'parent' => 'PARENT_COUPONS_FRONT_END',
                                        'text' => 'hour'));
                
                return $text;
            }
        }
    }