<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/translation/class-translation-text-translation.php
* File Version            : 1.0.3
* Created / Last Modified : 12 December 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System translation translation text PHP class.
*/

    if (!class_exists('DOPBSPTranslationTextTranslation')){
        class DOPBSPTranslationTextTranslation{
            /*
             * Constructor
             */
            function DOPBSPTranslationTextTranslation(){
                /*
                 * Initialize translation text.
                 */
                add_filter('dopbsp_filter_translation_text', array(&$this, 'translation'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'translationHelp'));
            }
            
            /*
             * Translation text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function translation($text){
                array_push($text, array('key' => 'PARENT_TRANSLATION',
                                        'parent' => '',
                                        'text' => 'Translation'));
                
                array_push($text, array('key' => 'TRANSLATION_TITLE',
                                        'parent' => 'PARENT_TRANSLATION',
                                        'text' => 'Translation'));
                array_push($text, array('key' => 'TRANSLATION_SUBMIT',
                                        'parent' => 'PARENT_TRANSLATION',
                                        'text' => 'Manage translation'));
                array_push($text, array('key' => 'TRANSLATION_LOADED',
                                        'parent' => 'PARENT_TRANSLATION',
                                        'text' => 'Translation has been loaded.'));
                array_push($text, array('key' => 'TRANSLATION_LANGUAGE',
                                        'parent' => 'PARENT_TRANSLATION',
                                        'text' => 'Select language'));
                array_push($text, array('key' => 'TRANSLATION_TEXT_GROUP',
                                        'parent' => 'PARENT_TRANSLATION',
                                        'text' => 'Select text group'));
                array_push($text, array('key' => 'TRANSLATION_TEXT_GROUP_ALL',
                                        'parent' => 'PARENT_TRANSLATION',
                                        'text' => 'All'));
                array_push($text, array('key' => 'TRANSLATION_SEARCH',
                                        'parent' => 'PARENT_TRANSLATION',
                                        'text' => 'Search'));
                
                array_push($text, array('key' => 'TRANSLATION_RESET',
                                        'parent' => 'PARENT_TRANSLATION',
                                        'text' => 'Reset translation'));
                array_push($text, array('key' => 'TRANSLATION_RESET_CONFIRMATION',
                                        'parent' => 'PARENT_TRANSLATION',
                                        'text' => 'Are you sure you want to reset all translation data? All your modifications are going to be overwritten.'));
                array_push($text, array('key' => 'TRANSLATION_RESETING',
                                        'parent' => 'PARENT_TRANSLATION',
                                        'text' => 'Translation is resetting ...'));
                array_push($text, array('key' => 'TRANSLATION_RESET_SUCCESS',
                                        'parent' => 'PARENT_TRANSLATION',
                                        'text' => 'The translation has reset. The page will refresh shortly.'));
                
                return $text;
            }            
            
            /*
             * Translation - Help text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function translationHelp($text){
                array_push($text, array('key' => 'PARENT_TRANSLATION_HELP',
                                        'parent' => '',
                                        'text' => 'Translation - Help'));
                
                array_push($text, array('key' => 'TRANSLATION_HELP',
                                        'parent' => 'PARENT_TRANSLATION_HELP',
                                        'text' => 'Select the language & text group you want to translate.'));
                array_push($text, array('key' => 'TRANSLATION_SEARCH_HELP',
                                        'parent' => 'PARENT_TRANSLATION_HELP',
                                        'text' => 'Use the search field to look & display the text you want.'));
                array_push($text, array('key' => 'TRANSLATION_RESET_HELP',
                                        'parent' => 'PARENT_TRANSLATION_HELP',
                                        'text' => 'If you want to use the translation that came with the plugin click "Reset translation" button. Note that all your modifications will be overwritten.'));
                
                return $text;
            }
        }
    }