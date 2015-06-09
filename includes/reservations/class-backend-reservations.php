<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/reservations/class-backend-reservations.php
* File Version            : 1.0.4
* Created / Last Modified : 25 January 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end reservations PHP class.
*/

    if (!class_exists('DOPBSPBackEndReservations')){
        class DOPBSPBackEndReservations extends DOPBSPBackEnd{
            /*
             * Constructor.
             */
            function DOPBSPBackEndReservations(){
            }

            /*
             * Prints out the reservations page.
             * 
             * @return HTML page
             */        
            function view(){
                global $DOPBSP;
                
                /*
                 * Check if reservations have expired each time you open the reservations page.
                 */
                $this->clean();
                
                /*
                 * Display reservations template.
                 */
                $DOPBSP->views->backend_reservations->template();
            }
            
            /*
             * Set reservations status to expired if check out day has passed.
             */
            function clean(){
                global $wpdb;
                global $DOPBSP;
                
                $wpdb->query('DELETE FROM '.$DOPBSP->tables->reservations. ' WHERE token <> "" AND ((check_out < "'.date('Y-m-d').'" AND check_out <> "") OR (check_in < "'.date('Y-m-d').'" AND check_out = ""))');
                $wpdb->query('UPDATE '.$DOPBSP->tables->reservations.' SET status="expired" WHERE status <> "expired" AND ((check_out < "'.date('Y-m-d').'" AND check_out <> "") OR (check_in < "'.date('Y-m-d').'" AND check_out = ""))');
            }
        }
    }