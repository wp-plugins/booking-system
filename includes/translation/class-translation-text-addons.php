<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/translation/class-translation-text-addons.php
* File Version            : 1.0.3
* Created / Last Modified : 16 January 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System addons translation text PHP class.
*/

    if (!class_exists('DOPBSPTranslationTextAddons')){
        class DOPBSPTranslationTextAddons{
            /*
             * Constructor
             */
            function DOPBSPTranslationTextAddons(){
                /*
                 * Initialize addons text.
                 */
                add_filter('dopbsp_filter_translation_text', array(&$this, 'addons'));
            }

            /*
             * Addons text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function addons($text){
                array_push($text, array('key' => 'PARENT_ADDONS',
                                        'parent' => '',
                                        'text' => 'Add-ons'));
                
                array_push($text, array('key' => 'ADDONS_TITLE',
                                        'parent' => 'PARENT_ADDONS',
                                        'text' => 'Add-ons'));
                array_push($text, array('key' => 'ADDONS_HELP',
                                        'parent' => 'PARENT_ADDONS',
                                        'text' => 'Increase and improve booking system functionalities with one of the following addons.'));
                
                array_push($text, array('key' => 'ADDONS_LOAD_SUCCESS',
                                        'parent' => 'PARENT_ADDONS',
                                        'text' => 'Add-ons list loaded.'));
                array_push($text, array('key' => 'ADDONS_LOAD_ERROR',
                                        'parent' => 'PARENT_ADDONS',
                                        'text' => 'Add-ons list failed to load. Please refresh the page to try again.'));
                
                array_push($text, array('key' => 'ADDONS_FILTERS_SEARCH',
                                        'parent' => 'PARENT_ADDONS',
                                        'text' => 'Search'));
                array_push($text, array('key' => 'ADDONS_FILTERS_SEARCH_TERMS',
                                        'parent' => 'PARENT_ADDONS',
                                        'text' => 'Enter search terms'));
                array_push($text, array('key' => 'ADDONS_FILTERS_CATEGORIES',
                                        'parent' => 'PARENT_ADDONS',
                                        'text' => 'Categories'));
                array_push($text, array('key' => 'ADDONS_FILTERS_CATEGORIES_ALL',
                                        'parent' => 'PARENT_ADDONS',
                                        'text' => 'All'));
                
                array_push($text, array('key' => 'ADDONS_ADDON_PRICE',
                                        'parent' => 'PARENT_ADDONS',
                                        'text' => 'Price:'));
                array_push($text, array('key' => 'ADDONS_ADDON_GET_IT_NOW',
                                        'parent' => 'PARENT_ADDONS',
                                        'text' => 'Get it now'));
                
                return $text;
            }
        }
    }