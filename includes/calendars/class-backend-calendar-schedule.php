<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/calendars/class-backend-calendar-schedule.php
* File Version            : 1.0.8
* Created / Last Modified : 25 January 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end calendar schedule PHP class.
*/

    if (!class_exists('DOPBSPBackEndCalendarSchedule')){
        class DOPBSPBackEndCalendarSchedule extends DOPBSPBackEndCalendar{
            /*
             * Constructor
             */
            function DOPBSPBackEndCalendarSchedule(){
            }
        
            /*
             * Get calendar schedule.
             * 
             * @post id (integer): calendar ID
             * @post year (integer): year for which the data will be loaded
             * 
             * @return schedule JSON
             */
            function get(){
                global $wpdb;
                global $DOPBSP;
                
                $schedule = array();

                $year = $_POST['year'];
                
                $days = $wpdb->get_results($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->days.' WHERE calendar_id=%d AND year=%d',
                                                          1, $year));

                foreach ($days as $day):
                    $schedule[$day->day] = $day->data;
                endforeach;

                if (count($schedule) > 0){
                    echo json_encode($schedule);
                }

                die();
            }
            
            /*
             * Set calendar schedule.
             * 
             * @post id (integer): calendar ID
             * @post schedule (string): calendar data
             * @post hours_enabled (string): hours enabled
             * 
             */
            function set(){
                global $wpdb;
                global $DOPBSP;

                $schedule = json_decode(stripslashes(utf8_encode($_POST['schedule'])));
                $hours_enabled = $_POST['hours_enabled'];
                
                $days = array();
                $query_insert_values = array();

                /*
                 * Set days data.
                 */
                while ($data = current($schedule)){
                    $price_min  = 1000000000;
                    $price_max  = 0;
                        
                    $day = key($schedule);
                    array_push($days, $day);
                    $day_items = explode('-', $day);
                    
                    $control_data = $wpdb->get_results($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->days.' WHERE calendar_id=%d AND day="%s"',
                                                                      1, $day));
                        
                    if ($hours_enabled == 'true'){
                        foreach ($data->hours as $hour):
                            $price = $hour->promo == '' ? ($hour->price == '' ? 0:(float)$hour->price):(float)$hour->promo;
                        
                            if ($hour->price != '0'){
                                $price_min = $price < $price_min ? $price:$price_min;
                                $price_max = $price > $price_max ? $price:$price_max;
                            }
                        endforeach;
                    }
                    else{
                        $price_min = $data->promo == '' ? ($data->price == '' ? 0:(float)$data->price):(float)$data->promo;
                        $price_max = $price_min;
                    }
                    
                    if ($wpdb->num_rows != 0){
                        $wpdb->update($DOPBSP->tables->days, array('data' => json_encode($data),
                                                                   'price_min' => $price_min,
                                                                   'price_max' => $price_max), 
                                                             array('calendar_id' => 1,
                                                                   'day' => $day));
                    }
                    else{
                        array_push($query_insert_values, '(\'1_'.$day.'\', \'1\', \''.$day.'\', \''.$day_items[0].'\', \''.json_encode($data).'\', \''.$price_min.'\', \''.$price_max.'\')');
                    }
                    next($schedule);                        
                }
                
                if (count($query_insert_values) > 0){
                    $wpdb->query('INSERT INTO '.$DOPBSP->tables->days.' (unique_key, calendar_id, day, year, data, price_min, price_max) VALUES '.implode(', ', $query_insert_values));
                }
                
                $this->clean();
                $this->setMaxYear();
                $this->setPrice();
                $DOPBSP->classes->backend_calendar_availability->set($days);
                
                die();      
            }
            
            /*
             * Change schedule when reservation is approved.
             * 
             * @param reservation_id (integer): reservation ID
             */
            function setApproved($reservation_id){
                global $wpdb;
                global $DOPBSP;
                
                $new_info_info = new stdClass;
                $new_info_body = new stdClass;
                
                $reservation = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->reservations.' WHERE id=%d',
                                                             $reservation_id));
                $settings_calendar = $DOPBSP->classes->backend_settings->values(1,'calendar');
                
                /*
                 * Get info data.
                 */        
                $info_info = $this->getFormInfo(json_decode($reservation->form));
                $info_body = $this->getFormInfo(json_decode($reservation->form), 'body');
                
                if ($info_info != ''){
                    $new_info_info->reservation_id = $reservation_id;
                    $new_info_info->data = $info_info;
                }
                
                if ($info_body != ''){
                    $new_info_body->reservation_id = $reservation_id;
                    $new_info_body->data = $info_body;
                }
                        
                /*
                 * Select days to be updated.
                 */
                if ($reservation->check_out == ''){
                    $day = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->days.' WHERE calendar_id=%d AND day="%s"',
                                                         $reservation->calendar_id, $reservation->check_in));
                }
                else{
                    if ($settings_calendar->days_morning_check_out == 'true'){
                        $days = $wpdb->get_results($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->days.' WHERE calendar_id=%d AND day>="%s" AND day<"%s"',
                                                                  $reservation->calendar_id, $reservation->check_in, $reservation->check_out));
                    }
                    else{
                        $days = $wpdb->get_results($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->days.' WHERE calendar_id=%d AND day>="%s" AND day<="%s"',
                                                                  $reservation->calendar_id, $reservation->check_in, $reservation->check_out));
                    }
                }

                if ($reservation->check_out == '' 
                        && $reservation->start_hour == ''){
                /*
                 * Change single day.
                 */    
                    $data = json_decode($day->data);

                    if ($data->available == '' 
                            || (int)$data->available < 1){
                        $available = 1;
                    }
                    else{
                        $available = $data->available;
                    }

                    if ($available-$reservation->no_items == 0){
                        $data->price = '';
                        $data->promo = '';
                        $data->status = 'booked';
                    }

                    $data->available = $available-$reservation->no_items;
                    
                    if (isset($new_info_body->reservation_id)){
                        if (!isset($data->info_info)
                                || $data->info_info == null){
                            $data->info_info = array();
                        }
                        array_push($data->info_info, $new_info_info);
                    }
                    
                    if (isset($new_info_body->reservation_id)){
                        if (!isset($data->info_body)
                                || $data->info_body == null){
                            $data->info_body = array();
                        }
                        array_push($data->info_body, $new_info_body);
                    }

                    $wpdb->update($DOPBSP->tables->days, array('data' => json_encode($data)), 
                                                         array('calendar_id' => $reservation->calendar_id, 
                                                               'day' => $day->day));
                }
                else if ($reservation->check_out != ''){    
                /*
                 * Change multiple days.
                 */                
                    foreach ($days as $key => $day){
                        $data = json_decode($day->data);

                        if ($data->available == '' 
                                || (int)$data->available < 1){
                            $available = 1;
                        }
                        else{
                            $available = $data->available;
                        }

                        if ($available-$reservation->no_items == 0){
                            $data->price = '';
                            $data->promo = '';
                            $data->status = 'booked';
                        }

                        $data->available = $available-$reservation->no_items;
                    
                        if (isset($new_info_body->reservation_id)){
                            if (!isset($data->info_info)
                                    || $data->info_info == null){
                                $data->info_info = array();
                            }
                            array_push($data->info_info, $new_info_info);
                        }

                        if (isset($new_info_body->reservation_id)){
                            if (!isset($data->info_body)
                                    || $data->info_body == null){
                                $data->info_body = array();
                            }
                            array_push($data->info_body, $new_info_body);
                        }
                        $wpdb->update($DOPBSP->tables->days, array('data' => json_encode($data)), 
                                                             array('calendar_id' => $reservation->calendar_id, 
                                                                   'day' => $day->day));
                    }
                }
                else if ($reservation->start_hour != '' 
                            && $reservation->end_hour == ''){    
                /*
                 * Change single hour.
                 */
                    $data = json_decode($day->data);
                    $start_hour = $reservation->start_hour;
                    $hour = $data->hours->$start_hour;

                    if ($hour->available == '' 
                            || (int)$hour->available < 1){
                        $available = 1;
                    }
                    else{
                        $available = (int)$hour->available;
                    }

                    if ($available-$reservation->no_items == 0){
                        $hour->price = '';
                        $hour->promo = '';
                        $hour->status = 'booked';
                    }

                    $hour->available = $available-$reservation->no_items;
                    
                    if (isset($new_info_body->reservation_id)){
                        if (!isset($hour->info_info)
                                || $hour->info_info == null){
                            $hour->info_info = array();
                        }
                        array_push($hour->info_info, $new_info_info);
                    }
                    
                    if (isset($new_info_body->reservation_id)){
                        if (!isset($hour->info_body)
                                || $hour->info_body == null){
                            $hour->info_body = array();
                        }
                        array_push($hour->info_body, $new_info_body);
                    }

                    $data->hours->$start_hour = $hour;
                    $wpdb->update($DOPBSP->tables->days, array('data' => json_encode($data)), 
                                                         array('calendar_id' => $reservation->calendar_id, 
                                                               'day' => $day->day));
                    
                    if ($settings_calendar->days_details_from_hours == 'true'){
                        $this->setDayFromHours($day->day);
                    }
                }
                else if ($reservation->end_hour != ''){  
                /*
                 * Change multiple hour.
                 */
                    $data = json_decode($day->data);

                    foreach ($data->hours as $key => $item){
                        if ($reservation->start_hour <= $key 
                                && ((($settings_calendar->hours_add_last_hour_to_total_price == 'false' 
                                                        || $settings_calendar->hours_interval_enabled == 'true') 
                                                && $key < $reservation->end_hour) || 
                                        ($settings_calendar->hours_add_last_hour_to_total_price == 'true' 
                                                        && $settings_calendar->hours_interval_enabled == 'false' 
                                                        && $key <= $reservation->end_hour))){                           
                            $hour = $data->hours->$key;

                            if ($hour->available == '' 
                                    || (int)$hour->available < 1){
                                $available = 1;
                            }
                            else{
                                $available = (int)$hour->available;
                            }

                            if ($available-$reservation->no_items == 0){
                                $hour->price = '';
                                $hour->promo = '';
                                $hour->status = 'booked';
                            }

                            $hour->available = $available-$reservation->no_items;
                    
                            if (isset($new_info_body->reservation_id)){
                                if (!isset($hour->info_info)
                                        || $hour->info_info == null){
                                    $hour->info_info = array();
                                }
                                array_push($hour->info_info, $new_info_info);
                            }

                            if (isset($new_info_body->reservation_id)){
                                if (!isset($hour->info_body)
                                        || $hour->info_body == null){
                                    $hour->info_body = array();
                                }
                                array_push($hour->info_body, $new_info_body);
                            }

                            $data->hours->$key = $hour;
                        }
                    }

                    $wpdb->update($DOPBSP->tables->days, array('data' => json_encode($data)),
                                                         array('calendar_id' => $reservation->calendar_id, 
                                                               'day' => $day->day));
                    
                    if ($settings_calendar->days_details_from_hours == 'true'){
                        $this->setDayFromHours($day->day);
                    }
                }
                
                $this->clean();
                $this->setPrice($reservation->calendar_id);
                $DOPBSP->classes->backend_calendar_availability->set($reservation->calendar_id,
                                                                     array(),
                                                                     $reservation->check_in,
                                                                     $reservation->check_out);
            }
            
            /*
             * Change schedule when reservation is canceled.
             * 
             * @param reservation_id (integer): reservation ID
             */
            function setCanceled($reservation_id){
                global $wpdb;
                global $DOPBSP;
                
                $reservation = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->reservations.' WHERE id=%d',
                                                             $reservation_id));
                $settings_calendar = $DOPBSP->classes->backend_settings->values(1,'calendar');
                $history = json_decode($reservation->days_hours_history);    
                
                /*
                 * Select days to be updated.
                 */
                if ($reservation->check_out == ''){
                    $day = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->days.' WHERE calendar_id=%d AND day="%s"',
                                                         $reservation->calendar_id, $reservation->check_in));
                }
                else{
                    if ($settings_calendar->days_morning_check_out == 'true'){
                        $days = $wpdb->get_results($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->days.' WHERE calendar_id=%d AND day>="%s" AND day<"%s"',
                                                                  $reservation->calendar_id, $reservation->check_in, $reservation->check_out));
                    }
                    else{
                        $days = $wpdb->get_results($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->days.' WHERE calendar_id=%d AND day>="%s" AND day<="%s"',
                                                                  $reservation->calendar_id, $reservation->check_in, $reservation->check_out));
                    }
                }
                
                if ($reservation->check_out == '' 
                        && $reservation->start_hour == ''){ 
                /*
                 * Change single day.
                 */ 
                    $data = json_decode($day->data);
                    $day_date = $day->day;
                    
                    if ($data->status == 'booked'){
                        $data->available = $history->$day_date->available == '' ? '':$data->available+$reservation->no_items;
                        $data->bind = (int)$history->$day_date->bind;
                        $data->price = (int)$history->$day_date->price;
                        $data->promo = (int)$history->$day_date->promo;
                        $data->status = $history->$day_date->status;
                    }
                    else{
                        if ($data->available != ''){
                            $data->available = $data->available+$reservation->no_items;
                        }
                    }
                    $data->info_info = $this->deleteFormInfo($reservation_id,
                                                             isset($data->info_info) ? $data->info_info:array());
                    $data->info_body = $this->deleteFormInfo($reservation_id,
                                                             isset($data->info_body) ? $data->info_body:array());
                    
                    $wpdb->update($DOPBSP->tables->days, array('data' => json_encode($data)), 
                                                         array('calendar_id' => $reservation->calendar_id, 
                                                               'day' => $day_date));
                }
                else if ($reservation->check_out != ''){  
                /*
                 * Change multiple days.
                 */                
                    foreach ($days as $key => $day){
                        $data = json_decode($day->data);
                        $day_date = $day->day;

                        if ($data->status == 'booked'){
                            $data->available = $history->$day_date->available == '' ? '':$data->available+$reservation->no_items;
                            $data->bind = (int)$history->$day_date->bind;
                            $data->price = (int)$history->$day_date->price;
                            $data->promo = (int)$history->$day_date->promo;
                            $data->status = $history->$day_date->status;
                        }
                        else{
                            if ($data->available != ''){
                                $data->available = $data->available+$reservation->no_items;
                            }
                        }
                        $data->info_info = $this->deleteFormInfo($reservation_id,
                                                                 isset($data->info_info) ? $data->info_info:array());
                        $data->info_body = $this->deleteFormInfo($reservation_id,
                                                                 isset($data->info_body) ? $data->info_body:array());
                        
                        $wpdb->update($DOPBSP->tables->days, array('data' => json_encode($data)), 
                                                             array('calendar_id' => $reservation->calendar_id, 
                                                                   'day' => $day_date));
                    }
                }
                else if ($reservation->start_hour != '' 
                            && $reservation->end_hour == ''){ 
                /*
                 * Change single hour.
                 */
                    $data = json_decode($day->data);
                    $hour_time = $reservation->start_hour;
                    $hour = $data->hours->$hour_time;
                    
                    if ($hour->status == 'booked'){
                        $hour->available = $history->$hour_time->available == '' ? '':$hour->available+$reservation->no_items;
                        $hour->bind = (int)$history->$hour_time->bind;
                        $hour->price = (int)$history->$hour_time->price;
                        $hour->promo = (int)$history->$hour_time->promo;
                        $hour->status = $history->$hour_time->status;
                    }
                    else{
                        if ($hour->available != ''){
                            $hour->available = $hour->available+$reservation->no_items;
                        }
                    }
                    $hour->info_info = $this->deleteFormInfo($reservation_id,
                                                             isset($data->info_info) ? $data->info_info:array());
                    $hour->info_body = $this->deleteFormInfo($reservation_id,
                                                             isset($data->info_body) ? $data->info_body:array());

                    $data->hours->$hour_time = $hour;
                    
                    $wpdb->update($DOPBSP->tables->days, array('data' => json_encode($data)), 
                                                         array('calendar_id' => $reservation->calendar_id, 
                                                               'day' => $day->day));
                    
                    if ($settings_calendar->days_details_from_hours == 'true'){
                        $this->setDayFromHours($day->day);
                    }
                }
                else if ($reservation->end_hour != ''){ 
                /*
                 * Change multiple hours.
                 */
                    $data = json_decode($day->data);

                    foreach ($data->hours as $key => $item){
                        if ($reservation->start_hour <= $key &&
                                ((($settings_calendar->hours_add_last_hour_to_total_price == 'false' 
                                                        || $settings_calendar->hours_interval_enabled == 'true') 
                                                && $key < $reservation->end_hour) || 
                                        ($settings_calendar->hours_add_last_hour_to_total_price == 'true' 
                                                        && $settings_calendar->hours_interval_enabled == 'false' 
                                                        && $key <= $reservation->end_hour))){
                            $hour_time = $key;
                            $hour = $data->hours->$hour_time;

                            if ($hour->status == 'booked'){
                                $hour->available = $history->$hour_time->available == '' ? '':$hour->available+$reservation->no_items;
                                $hour->bind = (int)$history->$hour_time->bind;
                                $hour->price = (int)$history->$hour_time->price;
                                $hour->promo = (int)$history->$hour_time->promo;
                                $hour->status = $history->$hour_time->status;
                            }
                            else{
                                if ($hour->available != ''){
                                    $hour->available = $hour->available+$reservation->no_items;
                                }
                            }
                            
                            $hour->info_info = $this->deleteFormInfo($reservation_id,
                                                                     isset($data->info_info) ? $data->info_info:array());
                            $hour->info_body = $this->deleteFormInfo($reservation_id,
                                                                     isset($data->info_body) ? $data->info_body:array());

                            $data->hours->$hour_time = $hour;
                        }

                        $wpdb->update($DOPBSP->tables->days, array('data' => json_encode($data)), 
                                                             array('calendar_id' => $reservation->calendar_id, 
                                                                   'day' => $day->day));
                        
                        if ($settings_calendar->days_details_from_hours == 'true'){
                            $this->setDayFromHours($day->day);
                        }
                    }
                }
                
                $this->clean();
                $this->setPrice($reservation->calendar_id);
                $DOPBSP->classes->backend_calendar_availability->set($reservation->calendar_id,
                                                                     array(),
                                                                     $reservation->check_in,
                                                                     $reservation->check_out);
            }
            
            /*
             * Set day data from hours data.
             * 
             * @param caledar_id (integer): calendar ID
             * @param day (string): selected day in YYYY-MM-DD format
             */
            function setDayFromHours($day){
                global $wpdb;
                global $DOPBSP;
                
                $day_data = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->days.' WHERE calendar_id=%d AND day="%s"',
                                                          1, $day));
                $data = json_decode($day_data->data);
                
                $available = 0;
                $price = '';
                $status = 'none';

                foreach ($data->hours as $hour){
                    if ($hour->bind == 0 
                            || $hour->bind == 1){
                        /*
                         * Check availability.
                         */
                        if ($hour->available != ''){
                            $available += $hour->available;
                        }

                        /*
                         * Check price.
                         */
                        if ($hour->price != '' 
                                && ($price == '' 
                                        || (float)$hour->price < $price)){
                            $price = (float)$hour->price;
                        }

                        if ($hour->promo != '' 
                                && ($price == '' 
                                        || (float)$hour->promo < $price)){
                            $price = (float)$hour->promo;
                        }

                        /*
                         * Check status 
                         */
                        if ($hour->status == 'unavailable' 
                                && $status == 'none'){
                            $status = 'unavailable';
                        }

                        if ($hour->status == 'booked' 
                                && ($status == 'none' 
                                        || $status == 'unavailable')){
                            $status = 'booked';
                        }

                        if ($hour->status == 'special' 
                                && ($status == 'none' 
                                        || $status == 'unavailable' 
                                        || $status == 'booked')){
                            $status = 'special';
                        }

                        if ($hour->status == 'available'){
                            $status = 'available';
                        }
                    }
                }
                
                $data->available = $available == 0 ? '':$available;
                $data->price = $price;
                $data->status = $status;
                
                $wpdb->update($DOPBSP->tables->days, array('data' => json_encode($data)), 
                                                     array('calendar_id' => 1, 
                                                           'day' => $day));
            }
            
            /*
             * Delete calendar schedule.
             * 
             * @post id (integer): calendar ID
             * @post schedule (string): calendar data
             */
            function delete(){
                global $wpdb;
                global $DOPBSP;
                
                $schedule = json_decode(stripslashes($_POST['schedule']));
                
                $days = array();
                $query = array();

                while ($data = current($schedule)){
                    $day = key($schedule);
                    array_push($days, $day);
                    array_push($query, 'day="'.$day.'"');                
                    next($schedule);                        
                }
                
                if (count($query) > 0){
                    $wpdb->query('DELETE FROM '.$DOPBSP->tables->days.' WHERE calendar_id="1" AND ('.implode(' OR ', $query).')');
                }
                
                $this->setMaxYear();
                $this->setPrice();
                $DOPBSP->classes->backend_calendar_availability->set($days);

                die();
            }
            
            /*
             * Clean database by past days data.
             */
            function clean(){
                global $wpdb;
                global $DOPBSP;
                
                $wpdb->query('DELETE FROM '.$DOPBSP->tables->days.' WHERE day < "'.date('Y-m-d').'"');
                $wpdb->query('DELETE FROM '.$DOPBSP->tables->days_available.' WHERE day < "'.date('Y-m-d').'"');
                $wpdb->query('DELETE FROM '.$DOPBSP->tables->days_unavailable.' WHERE day < "'.date('Y-m-d').'"');
            }
            
            /*
             * Get all days between 2 dates.
             * 
             * @param check_in (string): check in day in "YYYY-MM-DD" format
             * @param check_out (string): check out day in "YYYY-MM-DD" format
             * 
             * @return array of days
             */
            function getDays($check_in,
                             $check_out){
                $days = array();
                
                $ci_year = substr($check_in, 0, 4);
                $ci_month = substr($check_in, 5, 2);
                $ci_day = substr($check_in, 8, 2);
                
                $co_year = substr($check_out, 0, 4);
                $co_month = substr($check_out, 5, 2);
                $co_day = substr($check_out, 8, 2);

                $ci = mktime(1, 0, 0, $ci_month, $ci_day, $ci_year);
                $co = mktime(1, 0, 0, $co_month, $co_day, $co_year);

                if ($co >= $ci){
                    /*
                     * First day.
                     */
                    array_push($days, date('Y-m-d', $ci));

                    /*
                     * Create the rest of the days
                     */
                    while ($ci < $co){
                        $ci += 86400;
                        array_push($days, date('Y-m-d', $ci));
                    }
                }
                return $days;
            }
            
            /*
             * Check if days are available.
             * 
             * @param calendar_id (integer): calendar ID
             * @param check_in (string): check in day in "YYYY-MM-DD" format
             * @param check_out (string): check out day in "YYYY-MM-DD" format
             * @param no_items (integer): no of booked items
             * 
             * @return true/false
             */
            function validateDays($check_in,
                                  $check_out,
                                  $no_items = 1){
                global $wpdb;
                global $DOPBSP;
                
                $check_out = $check_out == '' ? $check_in:$check_out;
                
                $settings_calendar = $DOPBSP->classes->backend_settings->values(1,'calendar');
                
                $selected_days = $this->getDays($check_in,
                                                $check_out);
                
                for ($i=0; $i<count($selected_days)-($settings_calendar->days_morning_check_out == 'true' ? 1:0); $i++){
                    $day = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->days.' WHERE calendar_id=%d AND day="%s"',
                                                         1, $selected_days[$i]));
                    
                    $day_data = json_decode($day->data);
                    
                    if ($day_data->status != 'available'
                            && $day_data->status != 'special'
                            || ($day_data->available != '' && $no_items > $day_data->available)
                            || ($day_data->available == '' && $no_items > 1)){
                        return false;
                    }
                }
                
                return true;
            }
            
            /*
             * Check if reservations (days) do not overlap.
             * 
             * @param calendar_id (integer): calendar ID
             * @param reservations (array): a list of reservations to be verified
             * 
             * @return true/false
             */
            function validateDaysOverlap($reservations){
                global $wpdb;
                global $DOPBSP;
                
                $settings_calendar = $DOPBSP->classes->backend_settings->values(1,'calendar');
                $days = array();
                
                for ($i=0; $i<count($reservations); $i++){
                    $check_in = $reservations[$i]->check_in;
                    $check_out = $reservations[$i]->check_out == '' ? $reservations[$i]->check_in:$reservations[$i]->check_out;
                    $no_items = $reservations[$i]->no_items;
                    
                    if ($this->validateDays($check_in, $check_out, $no_items)){
                        $selected_days = $this->getDays($check_in,
                                                        $check_out);

                        for ($j=0; $j<count($selected_days)-($settings_calendar->days_morning_check_out == 'true' ? 1:0); $j++){
                            if (!isset($days[$selected_days[$j]])){
                                $day = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->days.' WHERE calendar_id=%d AND day="%s"',
                                                                     1, $selected_days[$j]));
                                $days[$selected_days[$j]] = json_decode($day->data);
                            }

                            $day_data = $days[$selected_days[$j]];

                            if ($day_data->status != 'available'
                                    && $day_data->status != 'special'
                                    || ($day_data->available != '' && $no_items > $day_data->available)
                                    || ($day_data->available == '' && $no_items > 1)){
                                return false;
                            }
                            else{
                                if ($day_data->available == '' 
                                        || (int)$day_data->available < 1){
                                    $available = 1;
                                }
                                else{
                                    $available = $day_data->available;
                                }

                                if ($available-$no_items == 0){
                                    $days[$selected_days[$j]]->status = 'booked';
                                }
                                $days[$selected_days[$j]]->available = $available-$no_items;
                            }
                        }
                    }
                }
                
                return true;
            }
            
            /*
             * Check if hours are available.
             * 
             * @param calendar_id (integer): calendar ID
             * @param reservations (array): a list of reservations to be verified
             * 
             * @return true/false
             */
            function validateHours($day,
                                   $start_hour,
                                   $end_hour,
                                   $no_items = 1){
                global $wpdb;
                global $DOPBSP;
                
                $end_hour = $end_hour == '' ? $start_hour:$end_hour;
                
                $settings_calendar = $DOPBSP->classes->backend_settings->values(1,'calendar');
                $day = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->days.' WHERE calendar_id=%d AND day="%s"',
                                                     1, $day));
                
                $day_data = json_decode($day->data);
                
                foreach ($day_data->hours as $key => $hour){
                    if ($start_hour <= $key 
                            && ((($settings_calendar->hours_add_last_hour_to_total_price == 'false' 
                                                    || $settings_calendar->hours_interval_enabled == 'true') 
                                            && $key < $end_hour) || 
                                    ($settings_calendar->hours_add_last_hour_to_total_price == 'true' 
                                                    && $settings_calendar->hours_interval_enabled == 'false' 
                                                    && $key <= $end_hour))
                            && ($hour->status != 'available'
                                    && $hour->status != 'special'
                                    || ($hour->available != '' && $no_items > $hour->available)
                                    || ($hour->available == '' && $no_items > 1))){
                        return false;
                    }
                }
                
                return true;
            }
            
            /*
             * Check if reservations (hours) do not overlap.
             * 
             * @param calendar_id (integer): calendar ID
             * @param reservations (array): a list of reservations to be verified
             * 
             * @return true/false
             */
            function validateHoursOverlap($reservations){
                global $wpdb;
                global $DOPBSP;
                
                $settings_calendar = $DOPBSP->classes->backend_settings->values(1,'calendar');
                $days = array();
                
                for ($i=0; $i<count($reservations); $i++){
                    $day = $reservations[$i]->check_in;
                    $start_hour = $reservations[$i]->start_hour;
                    $end_hour = $reservations[$i]->end_hour == '' ? $reservations[$i]->start_hour:$reservations[$i]->end_hour;
                    $no_items = $reservations[$i]->no_items;
                    
                    if ($this->validateHours($day, $start_hour, $end_hour, $no_items)){
                        if (!isset($days[$day])){
                            $day_result = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->days.' WHERE calendar_id=%d AND day="%s"',
                                                                        1, $day));
                            $days[$day] = json_decode($day_result->data);
                        }

                        $day_data = $days[$day];

                        foreach ($day_data->hours as $key => $hour){
                            if ($start_hour <= $key 
                                    && ((($settings_calendar->hours_add_last_hour_to_total_price == 'false' 
                                                            || $settings_calendar->hours_interval_enabled == 'true') 
                                                    && $key < $end_hour) || 
                                            ($settings_calendar->hours_add_last_hour_to_total_price == 'true' 
                                                            && $settings_calendar->hours_interval_enabled == 'false' 
                                                            && $key <= $end_hour))
                                    && ($hour->status != 'available'
                                            && $hour->status != 'special'
                                            || ($hour->available != '' && $no_items > $hour->available)
                                            || ($hour->available == '' && $no_items > 1))){
                                return false;
                            }
                            else{
                                if ($start_hour <= $key
                                    && ((($settings_calendar->hours_add_last_hour_to_total_price == 'false' 
                                                            || $settings_calendar->hours_interval_enabled == 'true') 
                                                    && $key < $end_hour) || 
                                            ($settings_calendar->hours_add_last_hour_to_total_price == 'true' 
                                                            && $settings_calendar->hours_interval_enabled == 'false' 
                                                            && $key <= $end_hour))){
                                    if ($hour->available == '' 
                                            || (int)$hour->available < 1){
                                        $available = 1;
                                    }
                                    else{
                                        $available = (int)$hour->available;
                                    }

                                    if ($available-$no_items == 0){
                                        $hour->status = 'booked';
                                    }

                                    $hour->available = $available-$no_items;

                                    $days[$day]->hours->$key = $hour;
                                }
                            }
                        }
                    }
                    else{
                        return false;
                    }
                }
                
                return true;
            }
            
            /*
             * Get form data for info areas.
             * 
             * @param form (array): booking form data
             * @param for (string): info area
             * 
             * @return form info
             */
            function getFormInfo($form,
                                 $for = 'info'){
                $data = array();
                
                if (isset($form)
                        && $form != ''){
                    foreach ($form as $field){
                        $option = 'add_to_day_hour_'.$for;
                        
                        if ($field->$option == 'true'){
                            array_push($data, $field->value);
                        }
                    }
                }
                
                return implode(' ', $data);
            }
            
            /*
             * Delete form data from info areas.
             * 
             * @param reservation_id (integer): reservation ID
             * @param info (array): form info data
             * 
             * @return form info
             */
            function deleteFormInfo($reservation_id,
                                    $info){
                $data = array();
                
                for ($i=0; $i<count($info); $i++){
                    if ($info[$i]->reservation_id != $reservation_id){
                        array_push($data, $info[$i]);
                    }
                }
                
                return $data;
            }
        }
    }