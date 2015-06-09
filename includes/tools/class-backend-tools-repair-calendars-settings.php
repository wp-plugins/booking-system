<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/tools/class-backend-tools-repair-calendars-settings.php
* File Version            : 1.0.4
* Created / Last Modified : 26 January 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end repair calendars settings PHP class.
*/

    if (!class_exists('DOPBSPBackEndToolsRepairCalendarsSettings')){
        class DOPBSPBackEndToolsRepairCalendarsSettings extends DOPBSPBackEndTools{
            /*
             * Constructor
             */
            function DOPBSPBackEndToolsRepairCalendarsSettings(){
            }
            
            /*
             * Display repair calendars settings.
             * 
             * @return repair calendars settings HTML
             */
            function display(){
                global $DOPBSP;
                
                $DOPBSP->views->backend_tools_repair_calendars_settings->template();
                
                die();
            }
            
            /*
             * Get calendars list.
             * 
             * @return a string with all calendars IDs
             */
            function get(){
                global $wpdb;
                global $DOPBSP;
                
                /*
                 * Rename calendar settings table.
                 */
                $DOPBSP->classes->database->updateRename();
                
                $calendars_list = array();
                
                /*
                 * Repair calendars settings.
                 */
                $calendars = $wpdb->get_results('SELECT * FROM '.$DOPBSP->tables->calendars.' ORDER BY id');
                array_push($calendars_list, 0);
                
                foreach ($calendars as $calendar){
                    array_push($calendars_list, $calendar->id);
                }
                
                echo implode(',', $calendars_list);
                
                die();
            }
            
            /*
             * Repair settings for each calendar.
             * 
             * @post id (integer): calendar ID
             * @post no (integer): calendar position
             * 
             * @return status HTML
             */
            function set(){
                global $wpdb;
                global $DOPBSP;
                
                $id = isset($_POST['id']) ? $_POST['id']:0;
                $no = isset($_POST['no']) ? $_POST['no']:0;
                
                $html = array();
                
                $columns = $wpdb->get_results('DESCRIBE '.$DOPBSP->tables->settings_calendar);
                
                array_push($html, '<tr class="dopbsp-'.($no%2 == 0 ? 'odd':'even').'">');
                
                if ($id != 0){
                    $calendar = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->calendars.' WHERE id=%d',
                                                              1));
                
                    array_push($html, ' <td>ID: 1 - '.$calendar->name.'</td>');
                }
                else{
                    array_push($html, ' <td>'.$DOPBSP->text('SETTINGS_GENERAL_TITLE').'</td>');
                }
                
                if (count($columns) > 5){
                    /*
                     * Update calendar settings.
                     */
                    $settings_calendar = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->settings_calendar.' WHERE calendar_id=%d AND unique_key=""',
                                                                       1));
                    $default_calendar = $DOPBSP->classes->backend_settings->default_calendar;
                    
                    foreach ($default_calendar as $key => $default){
                        $value_data = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->settings_calendar.' WHERE calendar_id=%d AND unique_key="%s"',
                                                                    1, $key));
                        
                        if ($wpdb->num_rows == 0
                                && isset($settings_calendar->$key)
                                && $settings_calendar->$key != $default){
                            $wpdb->insert($DOPBSP->tables->settings_calendar, array('calendar_id' => 1,
                                                                                    'unique_key' => $key,
                                                                                    'value' => $settings_calendar->$key));
                        }
                    }
                    
                    /*
                     * Update notifications settings.
                     */
                    $settings_notifications = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->settings_notifications.' WHERE calendar_id=%d AND unique_key=""',
                                                                            1));
                    $default_notifications = $DOPBSP->classes->backend_settings->default_notifications;
                    
                    foreach ($default_notifications as $key => $default){
                        $value_data = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->settings_notifications.' WHERE calendar_id=%d AND unique_key="%s"',
                                                                    1, $key));
                        
                        if ($wpdb->num_rows == 0
                                && isset($settings_notifications->$key)
                                && $settings_notifications->$key != $default){
                            $wpdb->insert($DOPBSP->tables->settings_notifications, array('calendar_id' => 1,
                                                                                         'unique_key' => $key,
                                                                                         'value' => $settings_calendar->$key));
                        }
                    }
                    
                    /*
                     * Update payment settings.
                     */
                    $settings_payment = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->settings_payment.' WHERE calendar_id=%d AND unique_key=""',
                                                                      1));
                    $default_payment = $DOPBSP->classes->backend_settings->default_payment;
                    
                    foreach ($default_payment as $key => $default){
                        $value_data = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->settings_payment.' WHERE calendar_id=%d AND unique_key="%s"',
                                                                    1, $key));
                        
                        if ($wpdb->num_rows == 0
                                && isset($settings_payment->$key)
                                && $settings_payment->$key != $default){
                            $wpdb->insert($DOPBSP->tables->settings_payment, array('calendar_id' => 1,
                                                                                   'unique_key' => $key,
                                                                                   'value' => $settings_calendar->$key));
                        }
                    }
                    
                    array_push($html, ' <td><span class="dopbsp-icon dopbsp-success"></span>'.$DOPBSP->text('TOOLS_REPAIR_CALENDARS_SETTINGS_REPAIRED').'</td>');
                    array_push($html, ' <td><span class="dopbsp-icon dopbsp-success"></span>'.$DOPBSP->text('TOOLS_REPAIR_CALENDARS_SETTINGS_REPAIRED').'</td>');
                    array_push($html, ' <td><span class="dopbsp-icon dopbsp-success"></span>'.$DOPBSP->text('TOOLS_REPAIR_CALENDARS_SETTINGS_REPAIRED').'</td>');
                }
                else{
                    array_push($html, ' <td><span class="dopbsp-icon dopbsp-none"></span>'.$DOPBSP->text('TOOLS_REPAIR_CALENDARS_SETTINGS_UNCHANGED').'</td>');
                    array_push($html, ' <td><span class="dopbsp-icon dopbsp-none"></span>'.$DOPBSP->text('TOOLS_REPAIR_CALENDARS_SETTINGS_UNCHANGED').'</td>');
                    array_push($html, ' <td><span class="dopbsp-icon dopbsp-none"></span>'.$DOPBSP->text('TOOLS_REPAIR_CALENDARS_SETTINGS_UNCHANGED').'</td>');
                }
                array_push($html, '</tr>');
                
                echo implode('', $html);
                
                die();
            }
            
            /*
             * Clean calendars settings tables.
             */
            function clean(){
                global $wpdb;
                global $DOPBSP;
                
                /*
                 * Delete columns.
                 */
                $columns_calendar = $wpdb->get_results('DESCRIBE '.$DOPBSP->tables->settings_calendar);
                $columns_notifications = $wpdb->get_results('DESCRIBE '.$DOPBSP->tables->settings_notifications);
                $columns_payment = $wpdb->get_results('DESCRIBE '.$DOPBSP->tables->settings_payment);
                
                if (count($columns_calendar) > 5){
                    foreach ($columns_calendar as $column){
                        if ($column->Field != 'id'
                                && $column->Field != 'calendar_id'
                                && $column->Field != 'unique_key'
                                && $column->Field != 'value'){
                            $wpdb->query('ALTER TABLE '.$DOPBSP->tables->settings_calendar.' DROP COLUMN '.$column->Field);
                        }
                    }
                }
                
                if (count($columns_notifications) > 5){
                    foreach ($columns_notifications as $column){
                        if ($column->Field != 'id'
                                && $column->Field != 'calendar_id'
                                && $column->Field != 'unique_key'
                                && $column->Field != 'value'){
                            $wpdb->query('ALTER TABLE '.$DOPBSP->tables->settings_notifications.' DROP COLUMN '.$column->Field);
                        }
                    }
                }
                
                if (count($columns_payment) > 5){
                    foreach ($columns_payment as $column){
                        if ($column->Field != 'id'
                                && $column->Field != 'calendar_id'
                                && $column->Field != 'unique_key'
                                && $column->Field != 'value'){
                            $wpdb->query('ALTER TABLE '.$DOPBSP->tables->settings_payment.' DROP COLUMN '.$column->Field);
                        }
                    }
                }
                
                /*
                 * Delete old data.
                 */
                $wpdb->delete($DOPBSP->tables->settings_calendar, array('unique_key' => ''));
                $wpdb->delete($DOPBSP->tables->settings_notifications, array('unique_key' => ''));
                $wpdb->delete($DOPBSP->tables->settings_payment, array('unique_key' => ''));
                
                die();
            }
        }
    }