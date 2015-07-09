<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/class-api.php
* File Version            : 1.0
* Created / Last Modified : 29 June 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System JSON api PHP class.
*/

    if (!class_exists('DOPBSPApi')){
        class DOPBSPApi{
            /*
             * Constructor
             */
            function DOPBSPApi(){
                global $DOPBSP;
                
                $settings_global = $DOPBSP->classes->backend_settings->values(0,  
                                                                              'global');
                
                if(isset($_GET['page'])) {
                    
                    $page = $_GET['page'];
                    
                    if($page == 'dopbsp-api') {
                        
                        $key = $_POST['key'];
                        $action = $_GET['action'];
                        $section = $_GET['section'];
                        $json = array();

                        if(!isset($action)){
                            $action = 'get';
                        }

                        if(!isset($section)){
                            $section = 'reservations';
                        }

                        if(isset($key)) {

                            if($settings_global->api_key === $key){
                                
                                $args = array('section' => $section);
                                
                                if($action == 'get') {
                                    $this->get($args);
                                } else {
                                    $this->set($args);
                                }

                            } else {
                                $json = array('code' => 102,
                                              'status' => 'error',
                                              'data' => 'Wrong API key.');
                                echo json_encode($json);
                            }
                        } else {
                            $json = array('code' => 103,
                                          'status' => 'error',
                                          'data' => 'empty API key.');
                            echo json_encode($json);
                        }
                        
                        die();
                    }
                }
                
            }
            /*
             * Display reservations
             * 
             * @return api json
             */
            function get($args){
                
                switch($args['section']){
                    case 'reservations': 
                        $this->getReservations();
                        break;
                }
            }
            
            function set(){
                
            }
            
            function getReservations(){
                global $wpdb;
                global $DOPBSP;
                
                $query_extend = $_POST['query_extend'];
                $query_data = '';

                if (isset($_GET['reservation_id'])){ // Get Only Reservation with ID wanted
                    
                    if(isset($query_extend)) {
                        
                        if($query_extend != '') {
                            $query_data = ' AND '.$query_extend;
                        }
                    }
                    $reservations = $wpdb->get_row('SELECT * FROM '.$DOPBSP->tables->reservations.' WHERE id='.$_GET['reservation_id'].$query_data);
                } else if(isset($_GET['calendar_id'])){ // Get All Reservations from wantend Calendar
                    
                    if(isset($query_extend)) {
                        
                        if($query_extend != '') {
                            $query_data = ' AND '.$query_extend;
                        }
                    }
                    $reservations = $wpdb->get_results('SELECT * FROM '.$DOPBSP->tables->reservations.' WHERE calendar_id='.$_GET['calendar_id'].$query_data);
                } else { // Get All Reservations
                    
                    if(isset($query_extend)) {
                        
                        if($query_extend != '') {
                            $query_data = ' WHERE '.$query_extend;
                        }
                    }
                    $reservations = $wpdb->get_results('SELECT * FROM '.$DOPBSP->tables->reservations.$query_data);
                }

                if(!empty($reservations)) {
                    $reservationsData = array('code' => 100,
                                              'status' => 'success',
                                              'data' => $reservations);
                    echo json_encode($reservationsData);
                } else {
                    $reservationsData = array('code' => 101,
                                              'status' => 'empty',
                                              'data' => array());
                    echo json_encode($reservationsData);
                }
            }
        }
    }