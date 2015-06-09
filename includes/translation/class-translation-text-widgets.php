<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/translation/class-translation-text-widgets.php
* File Version            : 1.0.2
* Created / Last Modified : 12 December 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System widgets translation text PHP class.
*/

    if (!class_exists('DOPBSPTranslationTextWidgets')){
        class DOPBSPTranslationTextWidgets{
            /*
             * Constructor
             */
            function DOPBSPTranslationTextWidgets(){
                /*
                 * Initialize widgets text.
                 */
                add_filter('dopbsp_filter_translation_text', array(&$this, 'widget'));
            }
            
            /*
             * Widget text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function widget($text){
                array_push($text, array('key' => 'PARENT_WIDGET',
                                        'parent' => '',
                                        'text' => 'Widget'));
                
                array_push($text, array('key' => 'WIDGET_TITLE',
                                        'parent' => 'PARENT_WIDGET',
                                        'text' => 'Booking System'));
                array_push($text, array('key' => 'WIDGET_DESCRIPTION',
                                        'parent' => 'PARENT_WIDGET',
                                        'text' => 'Select option you want to appear in the widget and ID(s) of the calendar(s).'));
                array_push($text, array('key' => 'WIDGET_TITLE_LABEL',
                                        'parent' => 'PARENT_WIDGET',
                                        'text' => 'Title:'));
                array_push($text, array('key' => 'WIDGET_SELECTION_LABEL',
                                        'parent' => 'PARENT_WIDGET',
                                        'text' => 'Select action:'));
                array_push($text, array('key' => 'WIDGET_SELECTION_ADD_CALENDAR',
                                        'parent' => 'PARENT_WIDGET',
                                        'text' => 'Add calendar'));
                array_push($text, array('key' => 'WIDGET_SELECTION_ADD_SIDEBAR',
                                        'parent' => 'PARENT_WIDGET',
                                        'text' => 'Add calendar sidebar'));
                array_push($text, array('key' => 'WIDGET_ID_LABEL',
                                        'parent' => 'PARENT_WIDGET',
                                        'text' => 'Select calendar ID:'));
                array_push($text, array('key' => 'WIDGET_NO_CALENDARS',
                                        'parent' => 'PARENT_WIDGET',
                                        'text' => 'No calendars.'));
                array_push($text, array('key' => 'WIDGET_LANGUAGE_LABEL',
                                        'parent' => 'PARENT_WIDGET',
                                        'text' => 'Select language:'));
                
                return $text;
            }
        }
    }