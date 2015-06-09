<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/translation/class-translation-text-discounts.php
* File Version            : 1.0.4
* Created / Last Modified : 12 December 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System discounts translation text PHP class.
*/

    if (!class_exists('DOPBSPTranslationTextDiscounts')){
        class DOPBSPTranslationTextDiscounts{
            /*
             * Constructor
             */
            function DOPBSPTranslationTextDiscounts(){
                /*
                 * Initialize discounts text.
                 */
                add_filter('dopbsp_filter_translation_text', array(&$this, 'discounts'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'discountsDiscount'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'discountsAddDiscount'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'discountsDeleteDiscount'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'discountsDiscountItems'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'discountsDiscountItem'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'discountsDiscountAddItem'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'discountsDiscountDeleteItem'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'discountsDiscountItemRules'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'discountsDiscountItemRule'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'discountsDiscountItemAddRule'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'discountsDiscountItemDeleteRule'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'discountsHelp'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'discountsFrontEnd'));
            }
            
            /*
             * Discounts text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function discounts($text){
                array_push($text, array('key' => 'PARENT_DISCOUNTS',
                                        'parent' => '',
                                        'text' => 'Discounts'));
                
                array_push($text, array('key' => 'DISCOUNTS_TITLE',
                                        'parent' => 'PARENT_DISCOUNTS',
                                        'text' => 'Discounts'));
                array_push($text, array('key' => 'DISCOUNTS_CREATED_BY',
                                        'parent' => 'PARENT_DISCOUNTS',
                                        'text' => 'Created by'));
                array_push($text, array('key' => 'DISCOUNTS_LOAD_SUCCESS',
                                        'parent' => 'PARENT_DISCOUNTS',
                                        'text' => 'Discounts list loaded.'));
                array_push($text, array('key' => 'DISCOUNTS_NO_DISCOUNTS',
                                        'parent' => 'PARENT_DISCOUNTS',
                                        'text' => 'No discounts. Click the above "plus" icon to add a new one.'));
                
                return $text;
            }
            
            /*
             * Discounts - Discount text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function discountsDiscount($text){
                array_push($text, array('key' => 'PARENT_DISCOUNTS_DISCOUNT',
                                        'parent' => '',
                                        'text' => 'Discounts - Discount'));
                
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_NAME',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT',
                                        'text' => 'Name'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_LANGUAGE',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM',
                                        'text' => 'Language'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_EXTRAS',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM',
                                        'text' => 'Add the extra<<single-quote>>s price in the calculations'));
                
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_LOADED',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT',
                                        'text' => 'Discount loaded.'));
                
                return $text;
            }
            
            /*
             * Discounts - Add discount text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function discountsAddDiscount($text){
                array_push($text, array('key' => 'PARENT_DISCOUNTS_ADD_DISCOUNT',
                                        'parent' => '',
                                        'text' => 'Discounts - Add discount'));
                
                array_push($text, array('key' => 'DISCOUNTS_ADD_DISCOUNT_NAME',
                                        'parent' => 'PARENT_DISCOUNTS_ADD_DISCOUNT',
                                        'text' => 'New discount'));
                array_push($text, array('key' => 'DISCOUNTS_ADD_DISCOUNT_SUBMIT',
                                        'parent' => 'PARENT_DISCOUNTS_ADD_DISCOUNT',
                                        'text' => 'Add discount'));
                array_push($text, array('key' => 'DISCOUNTS_ADD_DISCOUNT_ADDING',
                                        'parent' => 'PARENT_DISCOUNTS_ADD_DISCOUNT',
                                        'text' => 'Adding a new discount ...'));
                array_push($text, array('key' => 'DISCOUNTS_ADD_DISCOUNT_SUCCESS',
                                        'parent' => 'PARENT_DISCOUNTS_ADD_DISCOUNT',
                                        'text' => 'You have succesfully added a new discount.'));
                
                return $text;
            }
            
            /*
             * Discounts - Delete discount text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function discountsDeleteDiscount($text){
                array_push($text, array('key' => 'PARENT_DISCOUNTS_DELETE_DISCOUNT',
                                        'parent' => '',
                                        'text' => 'Discounts - Delete discount'));
                
                array_push($text, array('key' => 'DISCOUNTS_DELETE_DISCOUNT_CONFIRMATION',
                                        'parent' => 'PARENT_DISCOUNTS_DELETE_DISCOUNT',
                                        'text' => 'Are you sure you want to delete this discount?'));
                array_push($text, array('key' => 'DISCOUNTS_DELETE_DISCOUNT_SUBMIT',
                                        'parent' => 'PARENT_DISCOUNTS_DELETE_DISCOUNT',
                                        'text' => 'Delete discount'));
                array_push($text, array('key' => 'DISCOUNTS_DELETE_DISCOUNT_DELETING',
                                        'parent' => 'PARENT_DISCOUNTS_DELETE_DISCOUNT',
                                        'text' => 'Deleting discount ...'));
                array_push($text, array('key' => 'DISCOUNTS_DELETE_DISCOUNT_SUCCESS',
                                        'parent' => 'PARENT_DISCOUNTS_DELETE_DISCOUNT',
                                        'text' => 'You have succesfully deleted the discount.'));
                
                return $text;
            }
            
            /*
             * Discounts - Discount items text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function discountsDiscountItems($text){
                array_push($text, array('key' => 'PARENT_DISCOUNTS_DISCOUNT_ITEMS',
                                        'parent' => '',
                                        'text' => 'Discounts - Discount items'));
                
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEMS',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEMS',
                                        'text' => 'Discount items'));
                
                return $text;
            }
            
            /*
             * Discounts - Discount item text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function discountsDiscountItem($text){
                array_push($text, array('key' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM',
                                        'parent' => '',
                                        'text' => 'Discounts - Discount item'));
                
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_SHOW_SETTINGS',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM',
                                        'text' => 'Show settings'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_HIDE_SETTINGS',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM',
                                        'text' => 'Hide settings'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_SORT',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM',
                                        'text' => 'Sort'));
                /*
                 * Settings labels.
                 */
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_LABEL_LABEL',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM',
                                        'text' => 'Label'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_START_TIME_LAPSE_LABEL',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM',
                                        'text' => 'Start time lapse (days/hours)'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_END_TIME_LAPSE_LABEL',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM',
                                        'text' => 'End time lapse (days/hours)'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_OPERATION_LABEL',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM',
                                        'text' => 'Operation'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_PRICE_LABEL',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM',
                                        'text' => 'Price/Percent'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_PRICE_TYPE_LABEL',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM',
                                        'text' => 'Price type'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_PRICE_BY_LABEL',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM',
                                        'text' => 'Price by'));
                
                return $text;
            }
            
            /*
             * Discounts - Add discount item text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function discountsDiscountAddItem($text){
                array_push($text, array('key' => 'PARENT_DISCOUNTS_DISCOUNT_ADD_ITEM',
                                        'parent' => '',
                                        'text' => 'Discounts - Add discount item'));
                
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ADD_ITEM_SUBMIT',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ADD_ITEM',
                                        'text' => 'Add item'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ADD_ITEM_LABEL',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ADD_ITEM',
                                        'text' => 'New item'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ADD_ITEM_ADDING',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ADD_ITEM',
                                        'text' => 'Adding a new discount item ...'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ADD_ITEM_SUCCESS',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ADD_ITEM',
                                        'text' => 'You have succesfully added a new discount item.'));
                
                return $text;
            }
            
            /*
             * Discounts - Delete discount item text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function discountsDiscountDeleteItem($text){
                array_push($text, array('key' => 'PARENT_DISCOUNTS_DISCOUNT_DELETE_ITEM',
                                        'parent' => '',
                                        'text' => 'Discounts - Delete discount item'));
                
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_DELETE_ITEM_CONFIRMATION',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_DELETE_ITEM',
                                        'text' => 'Are you sure you want to delete this discount item?'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_DELETE_ITEM_SUBMIT',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_DELETE_ITEM',
                                        'text' => 'Delete'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_DELETE_ITEM_DELETING',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_DELETE_ITEM',
                                        'text' => 'Deleting discount item ...'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_DELETE_ITEM_SUCCESS',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_DELETE_ITEM',
                                        'text' => 'You have succesfully deleted the discount item.'));
                
                return $text;
            }
            
            /*
             * Discounts - Discount item rules text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function discountsDiscountItemRules($text){
                array_push($text, array('key' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM_RULES',
                                        'parent' => '',
                                        'text' => 'Discounts - Discount item - Rules'));
                
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_RULES_LABEL',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM_RULES',
                                        'text' => 'Rules'));
                
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_RULES_LABELS_OPERATION',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM_RULES',
                                        'text' => 'Operation'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_RULES_LABELS_PRICE',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM_RULES',
                                        'text' => 'Price/Percent'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_RULES_LABELS_PRICE_TYPE',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM_RULES',
                                        'text' => 'Price type'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_RULES_LABELS_PRICE_BY',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM_RULES',
                                        'text' => 'Price by'));
                                    
                return $text;
            }
            
            /*
             * Discounts - Discount item rule text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function discountsDiscountItemRule($text){
                array_push($text, array('key' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM_RULE',
                                        'parent' => '',
                                        'text' => 'Discounts - Discount item - Rule'));
                
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_RULES_PRICE_TYPE_FIXED',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM_RULE',
                                        'text' => 'Fixed'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_RULES_PRICE_TYPE_PERCENT',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM_RULE',
                                        'text' => 'Percent'));
                
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_RULES_PRICE_BY_ONCE',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM_RULE',
                                        'text' => 'Once'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_RULES_PRICE_BY_PERIOD',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM_RULE',
                                        'text' => 'day/hour'));
                
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_RULE_SORT',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM_RULE',
                                        'text' => 'Sort'));
                
                return $text;
            }
            
            /*
             * Discounts - Add discount item rule text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function discountsDiscountItemAddRule($text){
                array_push($text, array('key' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM_ADD_RULE',
                                        'parent' => '',
                                        'text' => 'Discounts - Discount item - Add rule'));
                
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_ADD_RULE_SUBMIT',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM_ADD_RULE',
                                        'text' => 'Add rule'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_ADD_RULE_ADDING',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM_ADD_RULE',
                                        'text' => 'Adding a new rule ...'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_ADD_RULE_SUCCESS',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM_ADD_RULE',
                                        'text' => 'You have succesfully added a new rule.'));
                
                return $text;
            }
            
            /*
             * Discounts - Delete discount item rule text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function discountsDiscountItemDeleteRule($text){
                array_push($text, array('key' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM_DELETE_RULE',
                                        'parent' => '',
                                        'text' => 'Discounts - Discount item - Delete rule'));
                
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_DELETE_RULE_CONFIRMATION',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM_DELETE_RULE',
                                        'text' => 'Are you sure you want to delete this  rule?'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_DELETE_RULE_SUBMIT',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM_DELETE_RULE',
                                        'text' => 'Delete'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_DELETE_RULE_DELETING',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM_DELETE_RULE',
                                        'text' => 'Deleting  rule ...'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_DELETE_RULE_SUCCESS',
                                        'parent' => 'PARENT_DISCOUNTS_DISCOUNT_ITEM_DELETE_RULE',
                                        'text' => 'You have succesfully deleted the  rule.'));
                
                return $text;
            }
            
            /*
             * Discounts - Help text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function discountsHelp($text){
                array_push($text, array('key' => 'PARENT_DISCOUNTS_HELP',
                                        'parent' => '',
                                        'text' => 'Discounts - Help'));
                
                array_push($text, array('key' => 'DISCOUNTS_HELP',
                                        'parent' => 'PARENT_DISCOUNTS_HELP',
                                        'text' => 'Click on a discount rule to open the editing area.'));
                array_push($text, array('key' => 'DISCOUNTS_ADD_DISCOUNT_HELP',
                                        'parent' => 'PARENT_DISCOUNTS_HELP',
                                        'text' => 'Click on the "plus" icon to add a discount.'));
                
                /*
                 * Discount help.
                 */
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_NAME_HELP',
                                        'parent' => 'PARENT_DISCOUNTS_HELP',
                                        'text' => 'Change discount name.'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_LANGUAGE_HELP',
                                        'parent' => 'PARENT_DISCOUNTS_HELP',
                                        'text' => 'Change to the language you want to edit the discount.'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_EXTRAS_HELP',
                                        'parent' => 'PARENT_DISCOUNTS_HELP',
                                        'text' => 'Calculate reservation discounts including extras price, if used.'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ADD_ITEM_HELP',
                                        'parent' => 'PARENT_DISCOUNTS_HELP',
                                        'text' => 'Click on the bellow "plus" icon to add a new discount item.'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_EDIT_ITEM_HELP',
                                        'parent' => 'PARENT_DISCOUNTS_HELP',
                                        'text' => 'Click the item "expand" icon to display/hide the settings.'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_DELETE_ITEM_HELP',
                                        'parent' => 'PARENT_DISCOUNTS_HELP',
                                        'text' => 'Click the item "trash" icon to delete it.'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_SORT_ITEM_HELP',
                                        'parent' => 'PARENT_DISCOUNTS_HELP',
                                        'text' => 'Drag the item "arrows" icon to sort it.'));
                /*
                 * Discount item help.
                 */
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_LABEL_HELP',
                                        'parent' => 'PARENT_DISCOUNTS_HELP',
                                        'text' => 'Enter item label.'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_START_TIME_LAPSE_HELP',
                                        'parent' => 'PARENT_DISCOUNTS_HELP',
                                        'text' => 'Enter the number of days/hours for the begining of the time lapse. Leave it blank for it to start from 1 day/hour.'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_END_TIME_LAPSE_HELP',
                                        'parent' => 'PARENT_DISCOUNTS_HELP',
                                        'text' => 'Enter the number of days/hours for the ending of the time lapse. Leave it blank to be unlimited.'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_OPERATION_HELP',
                                        'parent' => 'PARENT_DISCOUNTS_HELP',
                                        'text' => 'Select item price operation. You can add or subtract a value.'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_PRICE_HELP',
                                        'parent' => 'PARENT_DISCOUNTS_HELP',
                                        'text' => 'Enter item price.'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_PRICE_TYPE_HELP',
                                        'parent' => 'PARENT_DISCOUNTS_HELP',
                                        'text' => 'Select item price type. It can be a fixed value or a percent from price.'));
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_PRICE_BY_HELP',
                                        'parent' => 'PARENT_DISCOUNTS_HELP',
                                        'text' => 'Select item price by. The price can be calculated once or by day/hour.'));
                
                array_push($text, array('key' => 'DISCOUNTS_DISCOUNT_ITEM_RULES_HELP',
                                        'parent' => 'PARENT_DISCOUNTS_HELP',
                                        'text' => 'Click the "plus" icon to add another rule and enter the name and price conditions. Click on the "delete" icon to remove the rule. Add dates and hours intervals for which you want the rule to apply.'));
                
                return $text;
            }
            
            /*
             * Discounts front end text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function discountsFrontEnd($text){
                array_push($text, array('key' => 'PARENT_DISCOUNTS_FRONT_END',
                                        'parent' => '',
                                        'text' => 'Discounts - Front end'));
                
                array_push($text, array('key' => 'DISCOUNTS_FRONT_END_TITLE',
                                        'parent' => 'PARENT_DISCOUNTS_FRONT_END',
                                        'text' => 'Discount'));
                array_push($text, array('key' => 'DISCOUNTS_FRONT_END_BY_DAY',
                                        'parent' => 'PARENT_DISCOUNTS_FRONT_END',
                                        'text' => 'day'));
                array_push($text, array('key' => 'DISCOUNTS_FRONT_END_BY_HOUR',
                                        'parent' => 'PARENT_DISCOUNTS_FRONT_END',
                                        'text' => 'hour'));
                
                return $text;
            }
        }
    }