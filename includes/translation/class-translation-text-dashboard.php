<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/translation/class-translation-text-dashboard.php
* File Version            : 1.0.9
* Created / Last Modified : 19 January 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System dashboard translation text PHP class.
*/

    if (!class_exists('DOPBSPTranslationTextDashboard')){
        class DOPBSPTranslationTextDashboard{
            /*
             * Constructor
             */
            function DOPBSPTranslationTextDashboard(){
                /*
                 * Initialize dashboard text.
                 */
                add_filter('dopbsp_filter_translation_text', array(&$this, 'dashboard'));
            }

            /*
             * Dashboard text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function dashboard($text){
                array_push($text, array('key' => 'PARENT_DASHBOARD',
                                        'parent' => '',
                                        'text' => 'Dashboard'));
                
                array_push($text, array('key' => 'DASHBOARD_TITLE',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'Dashboard'));
                array_push($text, array('key' => 'DASHBOARD_SUBTITLE',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'Welcome to Booking System!'));
                array_push($text, array('key' => 'DASHBOARD_TEXT',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'This plugin will help you to easily create a booking/reservation system on your WordPress website or blog. This is intended to book, anything, anywhere, anytime ... so if you have any suggestions please tell us.'));
                /*
                 * Get started
                 */
                array_push($text, array('key' => 'DASHBOARD_GET_STARTED',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'Get started'));
                array_push($text, array('key' => 'DASHBOARD_GET_STARTED_CALENDARS',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'Add a new calendar'));
                array_push($text, array('key' => 'DASHBOARD_GET_STARTED_EVENTS',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'Add a new event'));
                array_push($text, array('key' => 'DASHBOARD_GET_STARTED_STAFF',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'Add a staff member'));
                array_push($text, array('key' => 'DASHBOARD_GET_STARTED_LOCATIONS',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'Add a new location'));
                array_push($text, array('key' => 'DASHBOARD_GET_STARTED_RESERVATIONS',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'View reservations'));
                array_push($text, array('key' => 'DASHBOARD_GET_STARTED_REVIEWS',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'View reviews'));
                /*
                 * More actions
                 */
                array_push($text, array('key' => 'DASHBOARD_MORE_ACTIONS',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'More actions'));
                array_push($text, array('key' => 'DASHBOARD_MORE_ACTIONS_ADDONS',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'Get add-ons!'));
                array_push($text, array('key' => 'DASHBOARD_MORE_ACTIONS_COUPONS',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'Add coupons'));
                array_push($text, array('key' => 'DASHBOARD_MORE_ACTIONS_DISCOUNTS',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'Add discounts'));
                array_push($text, array('key' => 'DASHBOARD_MORE_ACTIONS_EMAILS',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'Add email templates'));
                array_push($text, array('key' => 'DASHBOARD_MORE_ACTIONS_EXTRAS',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'Add extras'));
                array_push($text, array('key' => 'DASHBOARD_MORE_ACTIONS_FEES',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'Add taxes & fees'));
                array_push($text, array('key' => 'DASHBOARD_MORE_ACTIONS_FORMS',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'Add forms'));
                array_push($text, array('key' => 'DASHBOARD_MORE_ACTIONS_RULES',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'Add rules'));
                array_push($text, array('key' => 'DASHBOARD_MORE_ACTIONS_SEARCH',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'Add search'));
                array_push($text, array('key' => 'DASHBOARD_MORE_ACTIONS_SETTINGS',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'Change settings'));
                array_push($text, array('key' => 'DASHBOARD_MORE_ACTIONS_TEMPLATES',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'Add templates'));
                array_push($text, array('key' => 'DASHBOARD_MORE_ACTIONS_THEMES',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'Get themes!'));
                array_push($text, array('key' => 'DASHBOARD_MORE_ACTIONS_TOOLS',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'Tools'));
                array_push($text, array('key' => 'DASHBOARD_MORE_ACTIONS_TRANSLATION',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'Change translation'));
                /*
                 * Server
                 */
                array_push($text, array('key' => 'DASHBOARD_SERVER_TITLE',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'Server environment'));
                
                array_push($text, array('key' => 'DASHBOARD_SERVER_REQUIRED',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'Required'));
                array_push($text, array('key' => 'DASHBOARD_SERVER_AVAILABLE',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'Available'));
                array_push($text, array('key' => 'DASHBOARD_SERVER_STATUS',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'Status'));
                
                array_push($text, array('key' => 'DASHBOARD_SERVER_NO',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'No'));
                array_push($text, array('key' => 'DASHBOARD_SERVER_YES',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'Yes'));
                
                array_push($text, array('key' => 'DASHBOARD_SERVER_VERSION',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'Booking System version'));
                array_push($text, array('key' => 'DASHBOARD_SERVER_WORDPRESS_VERSION',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'WordPress version'));
                array_push($text, array('key' => 'DASHBOARD_SERVER_WORDPRESS_MULTISITE',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'WordPress multisite'));
                array_push($text, array('key' => 'DASHBOARD_SERVER_WOOCOMMERCE_VERSION',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'WooCommerce version'));
                array_push($text, array('key' => 'DASHBOARD_SERVER_WOOCOMMERCE_ENABLE_CODE',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'code is enabled even if WooCommerce plugin is not detected'));
                array_push($text, array('key' => 'DASHBOARD_SERVER_PHP_VERSION',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'PHP version'));
                array_push($text, array('key' => 'DASHBOARD_SERVER_MYSQL_VERSION',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'MySQL version'));
                array_push($text, array('key' => 'DASHBOARD_SERVER_MEMORY_LIMIT',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'Memory limit'));
                array_push($text, array('key' => 'DASHBOARD_SERVER_MEMORY_LIMIT_WP',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'WordPress memory limit'));
                array_push($text, array('key' => 'DASHBOARD_SERVER_MEMORY_LIMIT_WP_MAX',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'WordPress maximum memory limit'));
                array_push($text, array('key' => 'DASHBOARD_SERVER_MEMORY_LIMIT_WOOCOMMERCE',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'WooCommerce memory limit'));
                array_push($text, array('key' => 'DASHBOARD_SERVER_CURL_VERSION',
                                        'parent' => 'PARENT_DASHBOARD',
                                        'text' => 'cURL version - necessary for TLS security protocol'));
                
                return $text;
            }
        }
    }