<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/translation/class-translation-text-tools.php
* File Version            : 1.0.2
* Created / Last Modified : 12 December 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System tools translation text PHP class.
*/

    if (!class_exists('DOPBSPTranslationTextTools')){
        class DOPBSPTranslationTextTools{
            /*
             * Constructor
             */
            function DOPBSPTranslationTextTools(){
                /*
                 * Initialize tools text.
                 */
                add_filter('dopbsp_filter_translation_text', array(&$this, 'tools'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'toolsHelp'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'toolsRepairCalendarsSettings'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'toolsRepairDatabaseText'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'toolsRepairSearchSettings'));
            }

            /*
             * Tools text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function tools($text){
                array_push($text, array('key' => 'PARENT_TOOLS',
                                        'parent' => '',
                                        'text' => 'Tools'));
                
                array_push($text, array('key' => 'TOOLS_TITLE',
                                        'parent' => 'PARENT_TOOLS',
                                        'text' => 'Tools'));
                
                return $text;
            }
            
            /*
             * Tools help text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function toolsHelp($text){
                array_push($text, array('key' => 'PARENT_TOOLS_HELP',
                                        'parent' => '',
                                        'text' => 'Tools - Help'));
                
                array_push($text, array('key' => 'TOOLS_HELP',
                                        'parent' => 'PARENT_TOOLS_HELP',
                                        'text' => 'Tools to help you with some of the booking system needs.'));
                
                return $text;
            }

            /*
             * Tools repair calendars settings text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function toolsRepairCalendarsSettings($text){
                array_push($text, array('key' => 'PARENT_TOOLS_REPAIR_CALENDARS_SETTINGS',
                                        'parent' => '',
                                        'text' => 'Tools - Repair calendars settings'));
                
                array_push($text, array('key' => 'TOOLS_REPAIR_CALENDARS_SETTINGS_TITLE',
                                        'parent' => 'PARENT_TOOLS_REPAIR_CALENDARS_SETTINGS',
                                        'text' => 'Repair calendars settings'));
                
                array_push($text, array('key' => 'TOOLS_REPAIR_CALENDARS_SETTINGS_CONFIRMATION',
                                        'parent' => 'PARENT_TOOLS_REPAIR_CALENDARS_SETTINGS',
                                        'text' => 'Are you sure you want to start calendars settings repairs?'));
                array_push($text, array('key' => 'TOOLS_REPAIR_CALENDARS_SETTINGS_REPAIRING',
                                        'parent' => 'PARENT_TOOLS_REPAIR_CALENDARS_SETTINGS',
                                        'text' => 'Repairing calendars settings ...'));
                array_push($text, array('key' => 'TOOLS_REPAIR_CALENDARS_SETTINGS_SUCCESS',
                                        'parent' => 'PARENT_TOOLS_REPAIR_CALENDARS_SETTINGS',
                                        'text' => 'The settings have been repaired.'));
                
                array_push($text, array('key' => 'TOOLS_REPAIR_CALENDARS_SETTINGS_CALENDARS',
                                        'parent' => 'PARENT_TOOLS_REPAIR_CALENDARS_SETTINGS',
                                        'text' => 'Calendars'));
                array_push($text, array('key' => 'TOOLS_REPAIR_CALENDARS_SETTINGS_SETTINGS_DATABASE',
                                        'parent' => 'PARENT_TOOLS_REPAIR_CALENDARS_SETTINGS',
                                        'text' => 'Settings database'));
                array_push($text, array('key' => 'TOOLS_REPAIR_CALENDARS_SETTINGS_NOTIFICATIONS_DATABASE',
                                        'parent' => 'PARENT_TOOLS_REPAIR_CALENDARS_SETTINGS',
                                        'text' => 'Notifications database'));
                array_push($text, array('key' => 'TOOLS_REPAIR_CALENDARS_SETTINGS_PAYMENT_DATABASE',
                                        'parent' => 'PARENT_TOOLS_REPAIR_CALENDARS_SETTINGS',
                                        'text' => 'Payment database'));
                
                array_push($text, array('key' => 'TOOLS_REPAIR_CALENDARS_SETTINGS_UNCHANGED',
                                        'parent' => 'PARENT_TOOLS_REPAIR_CALENDARS_SETTINGS',
                                        'text' => 'Unchanged'));
                array_push($text, array('key' => 'TOOLS_REPAIR_CALENDARS_SETTINGS_REPAIRED',
                                        'parent' => 'PARENT_TOOLS_REPAIR_CALENDARS_SETTINGS',
                                        'text' => 'Repaired'));
                
                return $text;
            }

            /*
             * Tools repair database & text text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function toolsRepairDatabaseText($text){
                array_push($text, array('key' => 'PARENT_TOOLS_REPAIR_DATABASE_TEXT',
                                        'parent' => '',
                                        'text' => 'Tools - Repair database & text'));
                
                array_push($text, array('key' => 'TOOLS_REPAIR_DATABASE_TEXT_TITLE',
                                        'parent' => 'PARENT_TOOLS_REPAIR_DATABASE_TEXT',
                                        'text' => 'Repair database & text'));
                
                array_push($text, array('key' => 'TOOLS_REPAIR_DATABASE_TEXT_CONFIRMATION',
                                        'parent' => 'PARENT_TOOLS_REPAIR_DATABASE_TEXT',
                                        'text' => 'Are you sure you want to verify the database & the text and repair them if needed?'));
                array_push($text, array('key' => 'TOOLS_REPAIR_DATABASE_TEXT_REPAIRING',
                                        'parent' => 'PARENT_TOOLS_REPAIR_DATABASE_TEXT',
                                        'text' => 'Verifying and repairing the database & the text ...'));
                array_push($text, array('key' => 'TOOLS_REPAIR_DATABASE_TEXT_SUCCESS',
                                        'parent' => 'PARENT_TOOLS_REPAIR_DATABASE_TEXT',
                                        'text' => 'The database & the text have been verified and repaired. The page will redirect shortly to Dashboard.'));
                
                return $text;
            }

            /*
             * Tools repair search settings text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function toolsRepairSearchSettings($text){
                array_push($text, array('key' => 'PARENT_TOOLS_REPAIR_SEARCH_SETTINGS',
                                        'parent' => '',
                                        'text' => 'Tools - Repair search settings'));
                
                array_push($text, array('key' => 'TOOLS_REPAIR_SEARCH_SETTINGS_TITLE',
                                        'parent' => 'PARENT_TOOLS_REPAIR_SEARCH_SETTINGS',
                                        'text' => 'Repair search settings'));
                
                array_push($text, array('key' => 'TOOLS_REPAIR_SEARCH_SETTINGS_CONFIRMATION',
                                        'parent' => 'PARENT_TOOLS_REPAIR_SEARCH_SETTINGS',
                                        'text' => 'Are you sure you want to start search settings repairs?'));
                array_push($text, array('key' => 'TOOLS_REPAIR_SEARCH_SETTINGS_REPAIRING',
                                        'parent' => 'PARENT_TOOLS_REPAIR_SEARCH_SETTINGS',
                                        'text' => 'Repairing search settings ...'));
                array_push($text, array('key' => 'TOOLS_REPAIR_SEARCH_SETTINGS_SUCCESS',
                                        'parent' => 'PARENT_TOOLS_REPAIR_SEARCH_SETTINGS',
                                        'text' => 'The settings have been repaired.'));
                
                array_push($text, array('key' => 'TOOLS_REPAIR_SEARCH_SETTINGS_SEARCHES',
                                        'parent' => 'PARENT_TOOLS_REPAIR_SEARCH_SETTINGS',
                                        'text' => 'Searches'));
                array_push($text, array('key' => 'TOOLS_REPAIR_SEARCH_SETTINGS_SETTINGS_DATABASE',
                                        'parent' => 'PARENT_TOOLS_REPAIR_SEARCH_SETTINGS',
                                        'text' => 'Settings database'));
                
                array_push($text, array('key' => 'TOOLS_REPAIR_SEARCH_SETTINGS_UNCHANGED',
                                        'parent' => 'PARENT_TOOLS_REPAIR_SEARCH_SETTINGS',
                                        'text' => 'Unchanged'));
                array_push($text, array('key' => 'TOOLS_REPAIR_SEARCH_SETTINGS_REPAIRED',
                                        'parent' => 'PARENT_TOOLS_REPAIR_SEARCH_SETTINGS',
                                        'text' => 'Repaired'));
                
                return $text;
            }
        }
    }