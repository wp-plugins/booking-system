<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/calendars/class-backend-calendar-availability.php
* File Version            : 1.0.1
* Created / Last Modified : 25 January 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end calendar availability PHP class.
*/

    if (!class_exists('DOPBSPBackEndCalendarAvailability')){
        class DOPBSPBackEndCalendarAvailability extends DOPBSPBackEndCalendar{
            /*
             * Constructor
             */
            function DOPBSPBackEndCalendarAvailability(){
            }
            
            /*
             * Set availability indexes for faster search.
             * 
             * @param id (integer): calendar ID
             * @param days (array): days to be set
             * @param start_date (string): start date in "YYYY-MM-DD" format
             * @param end_date (string): end date in "YYYY-MM-DD" format
             */
            function set($id,
                         $days = array(),
                         $start_date = '',
                         $end_date = ''){
                global $DOPBSP;
                
                if (count($days) == 0 
                        && $start_date == ''){
                    return false;
                }
                else if (count($days) == 0
                            && $start_date != ''){
                    if ($end_date == ''){
                        array_push($days, $start_date);
                    }
                    else{
                        $days = $DOPBSP->classes->backend_calendar_schedule->getDays($start_date,
                                                                                     $end_date);
                    }
                }
                
                $settings_calendar = $DOPBSP->classes->backend_settings->values(1,'calendar');
                
                if ($settings_calendar->hours_enabled == 'true'){
                    $this->setHours($id,
                                    $days);
                }
                else{
                    $this->setDays($id,
                                   $days);
                }
                
                return true;
            }
            
            /*
             * Set days availability indexes for faster search.
             * 
             * @param id (integer): calendar ID
             * @param days (array): days to be set
             */
            function setDays($id,
                             $days){
                global $wpdb;
                global $DOPBSP;
                
                $days_available = array();
                $days_unavailable = array();
                $days_verified = array();
                
                $days_data = $wpdb->get_results('SELECT * FROM '.$DOPBSP->tables->days.' WHERE unique_key in ('.('"'.$id.'_'.implode('","'.$id.'_', $days).'"').') ORDER BY day');
                $days_available_data = $wpdb->get_results('SELECT * FROM '.$DOPBSP->tables->days_available.' WHERE unique_key in ('.('"'.implode('_0","', $days).'_0"').') ORDER BY day');
                $days_unavailable_data = $wpdb->get_results('SELECT * FROM '.$DOPBSP->tables->days_unavailable.' WHERE unique_key in ('.('"'.implode('_0","', $days).'_0"').') ORDER BY day');
                
                foreach ($days_available_data as $day):
                    $data_pieces = explode('|', $day->data);
                    $data_ids = explode(',', $data_pieces[0]);
                    $data_no = explode(',', $data_pieces[1]);
                    $days_available[$day->day] = array_combine($data_ids, $data_no);
                endforeach;
                
                foreach ($days_unavailable_data as $day):
                    $data_ids = explode(',', $day->data);
                    $days_unavailable[$day->day] = array_combine($data_ids, $data_ids);
                endforeach;
                
                foreach ($days_data as $day):
                    array_push($days_verified, $day->day);
                    $day_data = json_decode($day->data);
                
                    /*
                     * Set availability/unavailability.
                     */
                    if ($day_data->status == 'available' 
                            || $day_data->status == 'special'){
                        /*
                         * Add calendar to available table.
                         */
                        if (isset($days_available[$day->day])){
                            if (!isset($days_available[$day->day][$id])
                                    || $days_available[$day->day][$id] != $day_data->available){
                                $days_available[$day->day][$id] = $day_data->available;
                                ksort($days_available[$day->day]);

                                $wpdb->update($DOPBSP->tables->days_available, array('data' => implode(',', array_keys($days_available[$day->day])).'|'.implode(',', $days_available[$day->day])), 
                                                                               array('unique_key' => $day->day.'_0'));
                            }
                        }
                        else{
                            $days_available[$day->day][$id] = $day_data->available;
                            
                            $wpdb->insert($DOPBSP->tables->days_available, array('unique_key' =>  $day->day.'_0',
                                                                                 'day' => $day->day,
                                                                                 'data' => $id.'|'.$day_data->available));
                        }
                        
                        /*
                         * Delete calendar from unavailable table.
                         */
                        if (isset($days_unavailable[$day->day]) 
                                && isset($days_unavailable[$day->day][$id])){
                            unset($days_unavailable[$day->day][$id]);
                            
                            if (count($days_unavailable[$day->day]) == 0){
                                $wpdb->delete($DOPBSP->tables->days_unavailable, array('unique_key' => $day->day.'_0'));
                            }
                            else{
                                $wpdb->update($DOPBSP->tables->days_unavailable, array('data' => implode(',', array_keys($days_unavailable[$day->day]))), 
                                                                                 array('unique_key' => $day->day.'_0'));
                            }
                        }
                    }
                    else{
                        /*
                         * Add calendar to unavailable table.
                         */
                        if (isset($days_unavailable[$day->day])){
                            if (!isset($days_unavailable[$day->day][$id])){
                                $days_unavailable[$day->day][$id] = $id;
                                ksort($days_unavailable[$day->day]);

                                $wpdb->update($DOPBSP->tables->days_unavailable, array('data' => implode(',', array_keys($days_unavailable[$day->day]))), 
                                                                                 array('unique_key' => $day->day.'_0'));
                            }
                        }
                        else{
                            $days_unavailable[$day->day][$id] = $id;
                            
                            $wpdb->insert($DOPBSP->tables->days_unavailable, array('unique_key' =>  $day->day.'_0',
                                                                                   'day' => $day->day,
                                                                                   'data' => $id));
                        }
                        
                        /*
                         * Delete calendar from available table.
                         */
                        if (isset($days_available[$day->day])
                                && isset($days_available[$day->day][$id])){
                            unset($days_available[$day->day][$id]);
                            
                            if (count($days_available[$day->day]) == 0){
                                $wpdb->delete($DOPBSP->tables->days_available, array('unique_key' => $day->day.'_0'));
                            }
                            else{
                                $wpdb->update($DOPBSP->tables->days_available, array('data' => implode(',', array_keys($days_available[$day->day])).'|'.implode(',', $days_available[$day->day])), 
                                                                               array('unique_key' => $day->day.'_0'));
                            }
                        }
                    }
                endforeach;
                
                /*
                 * Remove deleted days from availability.
                 */
                foreach ($days as $day):
                    if (!in_array($day, $days_verified)){
                        /*
                         * Delete calendar from available table.
                         */
                        if (isset($days_available[$day])
                                && isset($days_available[$day][$id])){
                            unset($days_available[$day][$id]);
                            
                            if (count($days_available[$day]) == 0){
                                $wpdb->delete($DOPBSP->tables->days_available, array('unique_key' => $day.'_0'));
                            }
                            else{
                                $wpdb->update($DOPBSP->tables->days_available, array('data' => implode(',', array_keys($days_available[$day])).'|'.implode(',', $days_available[$day])), 
                                                                               array('unique_key' => $day.'_0'));
                            }
                        }
                        
                        /*
                         * Delete calendar from unavailable table.
                         */
                        if (isset($days_unavailable[$day])
                                && isset($days_unavailable[$day][$id])){
                            unset($days_unavailable[$day][$id]);
                            
                            if (count($days_unavailable[$day]) == 0){
                                $wpdb->delete($DOPBSP->tables->days_unavailable, array('unique_key' => $day.'_0'));
                            }
                            else{
                                $wpdb->update($DOPBSP->tables->days_unavailable, array('data' => implode(',', array_keys($days_unavailable[$day]))), 
                                                                                 array('unique_key' => $day.'_0'));
                            }
                        }
                    }
                endforeach;
            }
            
            /*
             * Set days availability indexes for faster search.
             * 
             * @param id (integer): calendar ID
             * @param days (array): days to be set
             */
            function setHours($id,
                              $days){
                global $wpdb;
                global $DOPBSP;
                
                $days_available = array();
                $days_unavailable = array();
                $days_verified = array();
                
                $days_data = $wpdb->get_results('SELECT * FROM '.$DOPBSP->tables->days.' WHERE unique_key in ('.('"'.$id.'_'.implode('","'.$id.'_', $days).'"').') ORDER BY day');
                $days_available_data = $wpdb->get_results('SELECT * FROM '.$DOPBSP->tables->days_available.' WHERE day in ('.('"'.implode('","', $days).'"').') ORDER BY day');
                $days_unavailable_data = $wpdb->get_results('SELECT * FROM '.$DOPBSP->tables->days_unavailable.' WHERE day in ('.('"'.implode('","', $days).'"').') ORDER BY day');
                
                foreach ($days_available_data as $day):
                    $data_pieces = explode('|', $day->data);
                    $data_ids = explode(',', $data_pieces[0]);
                    $data_no = explode(',', $data_pieces[1]);
                    $days_available[$day->day][$day->hour] = array_combine($data_ids, $data_no);
                endforeach;
                
                foreach ($days_unavailable_data as $day):
                    $data_ids = explode(',', $day->data);
                    $days_unavailable[$day->day][$day->hour] = array_combine($data_ids, $data_ids);
                endforeach;
                
                foreach ($days_data as $day):
                    array_push($days_verified, $day->day);
                    $day_data = json_decode($day->data);
                
                    foreach ($day_data->hours as $key => $hour):
                        /*
                         * Set availability/unavailability.
                         */
                        if ($hour->status == 'available' 
                                    || $hour->status == 'special'){
                            /*
                             * Add calendar to available table.
                             */
                            if (isset($days_available[$day->day][$key])){
                                if (!isset($days_available[$day->day][$key][$id])
                                        || $days_available[$day->day][$key][$id] != $hour->available){
                                    $days_available[$day->day][$key][$id] = $hour->available;
                                    ksort($days_available[$day->day][$key]);

                                    $wpdb->update($DOPBSP->tables->days_available, array('data' => implode(',', array_keys($days_available[$day->day][$key])).'|'.implode(',', $days_available[$day->day][$key])), 
                                                                                   array('unique_key' => $day->day.'_'.$key));
                                }
                            }
                            else{
                                $days_available[$day->day][$key][$id] = $hour->available;

                                $wpdb->insert($DOPBSP->tables->days_available, array('unique_key' =>  $day->day.'_'.$key,
                                                                                     'day' => $day->day,
                                                                                     'hour' => $key,
                                                                                     'data' => $id.'|'.$hour->available));
                            }

                            /*
                             * Delete calendar from unavailable table.
                             */
                            if (isset($days_unavailable[$day->day])
                                    && isset($days_unavailable[$day->day][$key])
                                    && isset($days_unavailable[$day->day][$key][$id])){
                                unset($days_unavailable[$day->day][$key][$id]);

                                if (count($days_unavailable[$day->day][$key]) == 0){
                                    $wpdb->delete($DOPBSP->tables->days_unavailable, array('unique_key' => $day->day.'_'.$key));
                                }
                                else{
                                    $wpdb->update($DOPBSP->tables->days_unavailable, array('data' => implode(',', array_keys($days_unavailable[$day->day][$key]))), 
                                                                                     array('unique_key' => $day->day.'_'.$key));
                                }
                            }
                        }
                        else{
                            /*
                             * Add calendar to unavailable table.
                             */
                            if (isset($days_unavailable[$day->day][$key])){
                                if (!isset($days_unavailable[$day->day][$key][$id])){
                                    $days_unavailable[$day->day][$key][$id] = $id;
                                    ksort($days_unavailable[$day->day][$key]);

                                    $wpdb->update($DOPBSP->tables->days_unavailable, array('data' => implode(',', array_keys($days_unavailable[$day->day][$key]))), 
                                                                                     array('unique_key' => $day->day.'_'.$key));
                                }
                            }
                            else{
                                $days_unavailable[$day->day][$key][$id] = $id;

                                $wpdb->insert($DOPBSP->tables->days_unavailable, array('unique_key' =>  $day->day.'_'.$key,
                                                                                       'day' => $day->day,
                                                                                       'hour' => $key,
                                                                                       'data' => $id));
                            }

                            /*
                             * Delete calendar from available table.
                             */
                            if (isset($days_available[$day->day]) 
                                    && isset($days_available[$day->day][$key])
                                    && isset($days_available[$day->day][$key][$id])){
                                unset($days_available[$day->day][$key][$id]);

                                if (count($days_available[$day->day][$key]) == 0){
                                    $wpdb->delete($DOPBSP->tables->days_available, array('unique_key' => $day->day.'_'.$key));
                                }
                                else{
                                    $wpdb->update($DOPBSP->tables->days_available, array('data' => implode(',', array_keys($days_available[$day->day][$key])).'|'.implode(',', $days_available[$day->day][$key])), 
                                                                                   array('unique_key' => $day->day.'_'.$key));
                                }
                            }
                        }
                    endforeach;
                endforeach;
                
                /*
                 * Remove deleted days from availability.
                 */
                foreach ($days as $day):
                    if (!in_array($day, $days_verified)){
                        /*
                         * Delete calendar from available table.
                         */
                        if (isset($days_available[$day])){
                            foreach ($days_available[$day] as $key => $hour):
                                if (isset($days_available[$day]) 
                                        && isset($days_available[$day][$key])
                                        && isset($days_available[$day][$key][$id])){
                                    unset($days_available[$day][$key][$id]);

                                    if (count($days_available[$day][$key]) == 0){
                                        $wpdb->delete($DOPBSP->tables->days_available, array('unique_key' => $day.'_'.$key));
                                    }
                                    else{
                                        $wpdb->update($DOPBSP->tables->days_available, array('data' => implode(',', array_keys($days_available[$day][$key])).'|'.implode(',', $days_available[$day][$key])), 
                                                                                       array('unique_key' => $day.'_'.$key));
                                    }
                                }
                            endforeach;
                        }
                        
                        /*
                         * Delete calendar from unavailable table.
                         */
                        if (isset($days_unavailable[$day])){
                            foreach ($days_unavailable[$day] as $key => $hour):
                                if (isset($days_unavailable[$day]) 
                                        && isset($days_unavailable[$day][$key])
                                        && isset($days_unavailable[$day][$key][$id])){
                                    unset($days_unavailable[$day][$key][$id]);

                                    if (count($days_unavailable[$day][$key]) == 0){
                                        $wpdb->delete($DOPBSP->tables->days_unavailable, array('unique_key' => $day.'_'.$key));
                                    }
                                    else{
                                        $wpdb->update($DOPBSP->tables->days_unavailable, array('data' => implode(',', array_keys($days_unavailable[$day][$key]))), 
                                                                                         array('unique_key' => $day.'_'.$key));
                                    }
                                }
                            endforeach;
                        }
                    }
                endforeach;
            }
        }
    }