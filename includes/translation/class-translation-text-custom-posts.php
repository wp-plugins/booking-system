<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/translation/class-translation-text-custom-posts.php
* File Version            : 1.0.2
* Created / Last Modified : 12 December 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System custom posts translation text PHP class.
*/

    if (!class_exists('DOPBSPTranslationTextCustomPosts')){
        class DOPBSPTranslationTextCustomPosts{
            /*
             * Constructor
             */
            function DOPBSPTranslationTextCustomPosts(){
                /*
                 * Initialize custom posts text.
                 */
                add_filter('dopbsp_filter_translation_text', array(&$this, 'customPosts'));
            }
            
            /*
             * Custom posts text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function customPosts($text){
                array_push($text, array('key' => 'PARENT_CUSTOM_POSTS',
                                        'parent' => '',
                                        'text' => 'Custom posts'));
                
                array_push($text, array('key' => 'CUSTOM_POSTS',
                                        'parent' => 'PARENT_CUSTOM_POSTS',
                                        'text' => 'Booking System custom posts'));
                array_push($text, array('key' => 'CUSTOM_POSTS_ADD_ALL',
                                        'parent' => 'PARENT_CUSTOM_POSTS',
                                        'text' => 'Posts'));
                array_push($text, array('key' => 'CUSTOM_POSTS_ADD',
                                        'parent' => 'PARENT_CUSTOM_POSTS',
                                        'text' => 'Add new Booking System custom post'));
                array_push($text, array('key' => 'CUSTOM_POSTS_EDIT',
                                        'parent' => 'PARENT_CUSTOM_POSTS',
                                        'text' => 'Edit Booking System custom post'));
                array_push($text, array('key' => 'CUSTOM_POSTS_BOOKING_SYSTEM',
                                        'parent' => 'PARENT_CUSTOM_POSTS',
                                        'text' => 'Booking System'));
                
                return $text;
            }
        }
    }