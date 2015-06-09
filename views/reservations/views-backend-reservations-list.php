<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : views/reservations/views-backend-reservations-list.php
* File Version            : 1.0.2
* Created / Last Modified : 13 October 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end reservations list views class.
*/

    if (!class_exists('DOPBSPViewsBackEndReservationsList')){
        class DOPBSPViewsBackEndReservationsList extends DOPBSPViewsBackEndReservations{
            /*
             * Constructor
             */
            function DOPBSPViewsBackEndReservationsList(){
            }
            
            /*
             * Returns reservations template.
             * 
             * @param args (array): function arguments
             *                      * reservations (array): reservations list
             * 
             * @return reservations HTML page
             */
            function template($args = array()){
                global $DOPBSP;
                
                $reservations = $args['reservations'];
?>
                <ul class="dopbsp-reservations-list">
<?php
                /*
                 * Check if reservations exist.
                 */
                if (count($reservations) > 0){
                    foreach ($reservations as $reservation){
                        $DOPBSP->views->backend_reservation->template(array('reservation' => $reservation));
                    }
                }
                else{
?>                    
                    <li class="dopbsp-no-data"><?php echo $DOPBSP->text('RESERVATIONS_NO_RESERVATIONS'); ?></li>
<?php                    
                }
?>
                </ul>    
<?php
            }
        }
    }