<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : views/reservations/views-backend-reservation-discount.php
* File Version            : 1.0.4
* Created / Last Modified : 29 October 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end reservation discount views class.
*/

    if (!class_exists('DOPBSPViewsBackEndReservationDiscount')){
        class DOPBSPViewsBackEndReservationDiscount extends DOPBSPViewsBackEndReservation{
            /*
             * Constructor
             */
            function DOPBSPViewsBackEndReservationDiscount(){
            }
            
            /*
             * @param args (array): function arguments
             *                      * reservation (object): reservation data
             *                      * settings_calendar (object): calendar settings data
             */
            function template($args = array()){
                global $DOPBSP;
                
                $reservation = $args['reservation'];
                $settings_calendar = $args['settings_calendar'];
                
                $discount = json_decode(utf8_decode($reservation->discount));
?>
                <div class="dopbsp-data-module">
                    <div class="dopbsp-data-head"> 
                        <h3><?php echo $DOPBSP->text('DISCOUNTS_FRONT_END_TITLE'); ?></h3>
                    </div>
                    <div class="dopbsp-data-body"> 
<?php
                if ($discount->id != 0){
                    $value = array();

                    array_push($value, '<span class="dopbsp-info-rule">&#9632;&nbsp;');

                    if ($discount->price_type == 'fixed'){
                        array_push($value, $discount->operation.'&nbsp;'.$DOPBSP->classes->price->set($discount->price,
                                                                                                      $reservation->currency,
                                                                                                      $settings_calendar->currency_position));
                    }
                    else{
                        array_push($value, $discount->operation.'&nbsp;'.$discount->price.'%');
                    }

                    if ($discount->price_by != 'once'){
                        array_push($value, '/'.($settings_calendar->hours_enabled == 'true' ? $DOPBSP->text('DISCOUNTS_FRONT_END_BY_HOUR'):$DOPBSP->text('DISCOUNTS_FRONT_END_BY_DAY')));
                    }
                    array_push($value, '</span>');

                    $this->displayData($discount->translation,
                                       implode('', $value));

                    if ($reservation->discount_price != 0){
                        echo '<br />';
                        $this->displayData($DOPBSP->text('RESERVATIONS_RESERVATION_PAYMENT_PRICE_CHANGE'),
                                           ($reservation->discount_price > 0 ? '+':'-').
                                                '&nbsp;'.
                                                $DOPBSP->classes->price->set($reservation->discount_price,
                                                                             $reservation->currency,
                                                                             $settings_calendar->currency_position),
                                           'dopbsp-price');
                    }
                }
                else{
                    echo '<em>'.$DOPBSP->text('RESERVATIONS_RESERVATION_NO_DISCOUNT').'</em>';
                }
?>
                    </div>
                </div>
<?php
            }
        }
    }