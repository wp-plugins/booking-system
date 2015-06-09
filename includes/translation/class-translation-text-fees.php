<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/translation/class-translation-text-fees.php
* File Version            : 1.0.2
* Created / Last Modified : 12 December 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System fees translation text PHP class.
*/

    if (!class_exists('DOPBSPTranslationTextFees')){
        class DOPBSPTranslationTextFees{
            /*
             * Constructor
             */
            function DOPBSPTranslationTextFees(){
                /*
                 * Initialize fees text.
                 */
                add_filter('dopbsp_filter_translation_text', array(&$this, 'fees'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'feesFee'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'feesAddFee'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'feesDeleteFee'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'feesHelp'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'feesFrontEnd'));
            }
            
            /*
             * Fees text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function fees($text){
                array_push($text, array('key' => 'PARENT_FEES',
                                        'parent' => '',
                                        'text' => 'Taxes & fees'));
                
                array_push($text, array('key' => 'FEES_TITLE',
                                        'parent' => 'PARENT_FEES',
                                        'text' => 'Taxes & fees'));
                array_push($text, array('key' => 'FEES_CREATED_BY',
                                        'parent' => 'PARENT_FEES',
                                        'text' => 'Created by'));
                array_push($text, array('key' => 'FEES_LOAD_SUCCESS',
                                        'parent' => 'PARENT_FEES',
                                        'text' => 'Taxes & fees list loaded.'));
                array_push($text, array('key' => 'FEES_NO_FEES',
                                        'parent' => 'PARENT_FEES',
                                        'text' => 'No taxes or fees. Click the above "plus" icon to add a new one.'));
                
                return $text;
            }
            
            /*
             * Fees - Fee text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function feesFee($text){
                array_push($text, array('key' => 'PARENT_FEES_FEE',
                                        'parent' => '',
                                        'text' => 'Taxes & fees - Tax or fee'));
                
                array_push($text, array('key' => 'FEES_FEE_NAME',
                                        'parent' => 'PARENT_FEES_FEE',
                                        'text' => 'Name'));
                array_push($text, array('key' => 'FEES_FEE_LANGUAGE',
                                        'parent' => 'PARENT_FEES_FEE',
                                        'text' => 'Language'));
                
                array_push($text, array('key' => 'FEES_FEE_LABEL',
                                        'parent' => 'PARENT_FEES_FEE',
                                        'text' => 'Label'));
                array_push($text, array('key' => 'FEES_FEE_OPERATION',
                                        'parent' => 'PARENT_FEES_FEE',
                                        'text' => 'Operation'));
                array_push($text, array('key' => 'FEES_FEE_PRICE',
                                        'parent' => 'PARENT_FEES_FEE',
                                        'text' => 'Price/Percent'));
                array_push($text, array('key' => 'FEES_FEE_PRICE_TYPE',
                                        'parent' => 'PARENT_FEES_FEE',
                                        'text' => 'Price type'));
                array_push($text, array('key' => 'FEES_FEE_PRICE_TYPE_FIXED',
                                        'parent' => 'PARENT_FEES_FEE',
                                        'text' => 'Fixed'));
                array_push($text, array('key' => 'FEES_FEE_PRICE_TYPE_PERCENT',
                                        'parent' => 'PARENT_FEES_FEE',
                                        'text' => 'Percent'));
                array_push($text, array('key' => 'FEES_FEE_PRICE_BY',
                                        'parent' => 'PARENT_FEES_FEE',
                                        'text' => 'Price by'));
                array_push($text, array('key' => 'FEES_FEE_PRICE_BY_ONCE',
                                        'parent' => 'PARENT_FEES_FEE',
                                        'text' => 'Once'));
                array_push($text, array('key' => 'FEES_FEE_PRICE_BY_PERIOD',
                                        'parent' => 'PARENT_FEES_FEE',
                                        'text' => 'day/hour'));
                array_push($text, array('key' => 'FEES_FEE_INCLUDED',
                                        'parent' => 'PARENT_FEES_FEE',
                                        'text' => 'Included'));
                array_push($text, array('key' => 'FEES_FEE_EXTRAS',
                                        'parent' => 'PARENT_FEES_FEE',
                                        'text' => 'Add the extra<<single-quote>>s price in the calculations'));
                array_push($text, array('key' => 'FEES_FEE_CART',
                                        'parent' => 'PARENT_FEES_FEE',
                                        'text' => 'Display fees in cart<<single-quote>>s total'));
                
                array_push($text, array('key' => 'FEES_FEE_LOADED',
                                        'parent' => 'PARENT_FEES_FEE',
                                        'text' => 'Tax or fee loaded.'));
                
                return $text;
            }
            
            /*
             * Fees - Add fee text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function feesAddFee($text){
                array_push($text, array('key' => 'PARENT_FEES_ADD_FEE',
                                        'parent' => '',
                                        'text' => 'Taxes & fees - Add tax or fee'));
                
                array_push($text, array('key' => 'FEES_ADD_FEE_NAME',
                                        'parent' => 'PARENT_FEES_ADD_FEE',
                                        'text' => 'New tax / fee'));
                array_push($text, array('key' => 'FEES_ADD_FEE_LABEL',
                                        'parent' => 'PARENT_FEES_ADD_FEE',
                                        'text' => 'New tax / fee label'));
                array_push($text, array('key' => 'FEES_ADD_FEE_SUBMIT',
                                        'parent' => 'PARENT_FEES_ADD_FEE',
                                        'text' => 'Add tax or fee'));
                array_push($text, array('key' => 'FEES_ADD_FEE_ADDING',
                                        'parent' => 'PARENT_FEES_ADD_FEE',
                                        'text' => 'Adding a new tax or fee ...'));
                array_push($text, array('key' => 'FEES_ADD_FEE_SUCCESS',
                                        'parent' => 'PARENT_FEES_ADD_FEE',
                                        'text' => 'You have succesfully added a new tax or fee.'));
                
                return $text;
            }
            
            /*
             * Fees - Delete fee text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function feesDeleteFee($text){
                array_push($text, array('key' => 'PARENT_FEES_DELETE_FEE',
                                        'parent' => '',
                                        'text' => 'Taxes & fees - Delete tax or fee'));
                
                array_push($text, array('key' => 'FEES_DELETE_FEE_CONFIRMATION',
                                        'parent' => 'PARENT_FEES_DELETE_FEE',
                                        'text' => 'Are you sure you want to delete this tax / fee?'));
                array_push($text, array('key' => 'FEES_DELETE_FEE_SUBMIT',
                                        'parent' => 'PARENT_FEES_DELETE_FEE',
                                        'text' => 'Delete tax / fee'));
                array_push($text, array('key' => 'FEES_DELETE_FEE_DELETING',
                                        'parent' => 'PARENT_FEES_DELETE_FEE',
                                        'text' => 'Deleting tax / fee ...'));
                array_push($text, array('key' => 'FEES_DELETE_FEE_SUCCESS',
                                        'parent' => 'PARENT_FEES_DELETE_FEE',
                                        'text' => 'You have succesfully deleted the tax / fee.'));
                
                return $text;
            }
            
            /*
             * Fees - Help text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function feesHelp($text){
                array_push($text, array('key' => 'PARENT_FEES_HELP',
                                        'parent' => '',
                                        'text' => 'Taxes & fees - Help'));
                
                array_push($text, array('key' => 'FEES_HELP',
                                        'parent' => 'PARENT_FEES_HELP',
                                        'text' => 'Click on a tax / fee item to open the editing area.'));
                array_push($text, array('key' => 'FEES_ADD_FEE_HELP',
                                        'parent' => 'PARENT_FEES_HELP',
                                        'text' => 'Click on the "plus" icon to add a tax or fee.'));
                
                /*
                 * Fee help.
                 */
                array_push($text, array('key' => 'FEES_FEE_HELP',
                                        'parent' => 'PARENT_FEES_HELP',
                                        'text' => 'Click the group "trash" icon to delete the tax / fee.'));
                array_push($text, array('key' => 'FEES_FEE_NAME_HELP',
                                        'parent' => 'PARENT_FEES_HELP',
                                        'text' => 'Change tax / fee name.'));
                array_push($text, array('key' => 'FEES_FEE_LANGUAGE_HELP',
                                        'parent' => 'PARENT_FEES_HELP',
                                        'text' => 'Change to the language you want to edit the tax / fee.'));
                array_push($text, array('key' => 'FEES_FEE_LABEL_HELP',
                                        'parent' => 'PARENT_FEES_HELP',
                                        'text' => 'Enter tax / fee label.'));
                array_push($text, array('key' => 'FEES_FEE_OPERATION_HELP',
                                        'parent' => 'PARENT_FEES_FEE',
                                        'text' => 'Select tax / fee price operation.'));
                array_push($text, array('key' => 'FEES_FEE_PRICE_HELP',
                                        'parent' => 'PARENT_FEES_FEE',
                                        'text' => 'Enter tax / fee price.'));
                array_push($text, array('key' => 'FEES_FEE_PRICE_TYPE_HELP',
                                        'parent' => 'PARENT_FEES_FEE',
                                        'text' => 'Select tax / fee price type.'));
                array_push($text, array('key' => 'FEES_FEE_PRICE_BY_HELP',
                                        'parent' => 'PARENT_FEES_FEE',
                                        'text' => 'Select tax / fee price by.'));
                array_push($text, array('key' => 'FEES_FEE_INCLUDED_HELP',
                                        'parent' => 'PARENT_FEES_FEE',
                                        'text' => 'Tax / fee is included in reservation prices.'));
                array_push($text, array('key' => 'FEES_FEE_EXTRAS_HELP',
                                        'parent' => 'PARENT_FEES_FEE',
                                        'text' => 'Calculate reservation tax / fee including extras price, if used.'));
                array_push($text, array('key' => 'FEES_FEE_CART_HELP',
                                        'parent' => 'PARENT_FEES_FEE',
                                        'text' => 'If you use the cart option, you can choose to display the tax to total price or to each reservation.'));
                
                return $text;
            }
            
            /*
             * Fees front end text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function feesFrontEnd($text){
                array_push($text, array('key' => 'PARENT_FEES_FRONT_END',
                                        'parent' => '',
                                        'text' => 'Fees - Front end'));
                
                array_push($text, array('key' => 'FEES_FRONT_END_TITLE',
                                        'parent' => 'PARENT_FEES_FRONT_END',
                                        'text' => 'Taxes & fees'));
                array_push($text, array('key' => 'FEES_FRONT_END_BY_DAY',
                                        'parent' => 'PARENT_FEES_FRONT_END',
                                        'text' => 'day'));
                array_push($text, array('key' => 'FEES_FRONT_END_BY_HOUR',
                                        'parent' => 'PARENT_FEES_FRONT_END',
                                        'text' => 'hour'));
                array_push($text, array('key' => 'FEES_FRONT_END_INCLUDED',
                                        'parent' => 'PARENT_FEES_FRONT_END',
                                        'text' => 'Included in price'));
                
                return $text;
            }
        }
    }