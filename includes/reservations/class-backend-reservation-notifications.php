<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/reservations/class-backend-reservation.php
* File Version            : 1.1.3
* Created / Last Modified : 10 February 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end reservations PHP class.
*/

    if (!class_exists('DOPBSPBackEndReservationNotifications')){
        class DOPBSPBackEndReservationNotifications extends DOPBSPBackEndReservation{
            /*
             * Constructor
             */
            function DOPBSPBackEndReservationNotifications(){
            }
            
            /*
             * Send notification emails.
             * 
             * @param reservation_id (integer): reservation ID
             * @param template (string): email template
             */
            function send($reservation_id,
                          $template){
                global $wpdb;
                global $DOPBSP;
                
                /*
                 * Get data from database.
                 */
                $reservation = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->reservations.' WHERE id=%d',
                                                             $reservation_id));
                $calendar = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->calendars.' WHERE id=%d',
                                                          1));
                $settings_calendar = $DOPBSP->classes->backend_settings->values(1,'calendar');
                $settings_notifications = $DOPBSP->classes->backend_settings->values(1,'notifications');
                $settings_payment = $DOPBSP->classes->backend_settings->values(1,'payment');
                $translation = $DOPBSP->classes->backend_email->get($template);
                $admin_emails = explode(';', $settings_notifications->email);
                
                $DOPBSP->classes->translation->set($reservation->language,
                                                   false);
                
                /*
                 * Verify if you have enabled notifications to be sent.
                 */
                $to = 'send_'.$template;
                
                if ($settings_notifications->$to == 'false'){
                    return false;
                }
                
                /*
                 * Set email info to user or buyer.
                 */
                if (strpos($template, 'admin') !== false){
                    if ($DOPBSP->classes->prototypes->validEmail($settings_notifications->email) == ''){
                        return false;
                    }
                    $email_to = $settings_notifications->email;
                    $email_from = $reservation->email;                       
                    $email_reply = '';
                    $email_name = '';
                    $email_cc = '';
                    $email_cc_name = '';
                    $email_bcc = '';
                    $email_bcc_name = '';
                    
                    $method = $settings_notifications->method_user;
                }
                else{
                    if ($DOPBSP->classes->prototypes->validEmail($reservation->email) == ''){
                        return false;
                    }
                    $email_to = $reservation->email;
                    $email_from = $admin_emails[0];                       
                    $email_reply = $settings_notifications->email_reply;
                    $email_name = $settings_notifications->email_name;
                    $email_cc = $settings_notifications->email_cc;
                    $email_cc_name = $settings_notifications->email_cc_name;
                    $email_bcc = $settings_notifications->email_bcc;
                    $email_bcc_name = $settings_notifications->email_bcc_name;
                    
                    $method = $settings_notifications->method_admin;
                }
                
                /*
                 * Set subject and messsage.
                 */
                $subject = $DOPBSP->classes->translation->decodeJSON($translation->subject,
                                                                     $reservation->language);
                $message = $this->getMessage($translation->message,
                                             $reservation,
                                             $calendar,
                                             $settings_calendar,
                                             $settings_payment); 
                
                /*
                 * Send notification email.
                 */
                $DOPBSP->classes->notifications->send($email_to,
                                                      $email_from,
                                                      $email_reply,
                                                      $email_name,
                                                      $email_cc,
                                                      $email_cc_name,
                                                      $email_bcc,
                                                      $email_bcc_name,
                                                      $subject,
                                                      $message,
                                                      $settings_notifications->smtp_host_name,
                                                      $settings_notifications->smtp_host_port,
                                                      $settings_notifications->smtp_ssl,
                                                      $settings_notifications->smtp_tls,
                                                      $settings_notifications->smtp_user,
                                                      $settings_notifications->smtp_password,
                                                      $settings_notifications->smtp_host_name2,
                                                      $settings_notifications->smtp_host_port2,
                                                      $settings_notifications->smtp_ssl2,
                                                      $settings_notifications->smtp_tls2,
                                                      $settings_notifications->smtp_user2,
                                                      $settings_notifications->smtp_password2,
                                                      $method);
            }
            
            /*
             * Get notification message with data.
             * 
             * @param message (string): message template
             * @param reservation (object): reservation data
             * @param calendar (object): calendar data
             * @param settings_calendar (object): calendar settings data
             * @param settings_payment (object): payment settings data
             * 
             * @return modified message
             */
            function getMessage($message,
                                $reservation,
                                $calendar,
                                $settings_calendar,
                                $settings_payment){
                global $DOPBSP;                                       
                
                $message = $DOPBSP->classes->translation->decodeJSON($message,
                                                                     $reservation->language);
                $message = str_replace('|DETAILS|', $this->getDetails($reservation, $calendar, $settings_calendar), $message);
                $message = str_replace('|EXTRAS|', $this->getExtras($reservation, $settings_calendar), $message);
                $message = str_replace('|DISCOUNT|', $this->getDiscount($reservation, $settings_calendar), $message);
                $message = str_replace('|COUPON|', $this->getCoupon($reservation, $settings_calendar), $message);
                $message = str_replace('|FEES|', $this->getFees($reservation, $settings_calendar), $message);
                $message = str_replace('|FORM|', $this->getForm($reservation), $message);
                $message = str_replace('|BILLING ADDRESS|', $this->getAddress($reservation, $settings_payment, 'billing'), $message);
                $message = str_replace('|SHIPPING ADDRESS|', $this->getAddress($reservation, $settings_payment, 'shipping'), $message);
                
                return $message;
            }
            
            /*
             * Get reservation details.
             * 
             * @param reservation (object): reservation data
             * @param calendar (object): calendar data
             * @param settings_calendar (object): calendar settings data
             * 
             * @return details info
             */
            function getDetails($reservation,
                                $calendar,
                                $settings_calendar){
                global $DOPBSP;
                
                $info = array();
                
                array_push($info, '<h3>'.$DOPBSP->text('RESERVATIONS_RESERVATION_DETAILS_TITLE').'</h3>');
                array_push($info, '<table>');
                array_push($info, '     <tbody>');
                
                /*
                 * Reservation ID.
                 */
                array_push($info, $this->getInfo($DOPBSP->text('RESERVATIONS_RESERVATION_ID'),
                                                 $reservation->id));
                
                /*
                 * Calendar ID.
                 */
                array_push($info, $this->getInfo($DOPBSP->text('RESERVATIONS_RESERVATION_CALENDAR_ID'),
                                                 1));
                
                /*
                 * Calendar name.
                 */
                array_push($info, $this->getInfo($DOPBSP->text('RESERVATIONS_RESERVATION_CALENDAR_NAME'),
                                                 $calendar->name));
                
                /*
                 * Selected language.
                 */
                array_push($info, $this->getInfo($DOPBSP->text('RESERVATIONS_RESERVATION_LANGUAGE'),
                                                 $DOPBSP->classes->languages->get($reservation->language)));
                
                array_push($info, '     </tbody>');
                array_push($info, '</table>');
                array_push($info, '<br />');
                array_push($info, '<table>');
                array_push($info, '     <tbody>');
                
                /*
                 * Check in data.
                 */
                array_push($info, $this->getInfo($DOPBSP->text('SEARCH_FRONT_END_CHECK_IN'),
                                                 $DOPBSP->classes->prototypes->setDateToFormat($reservation->check_in, 
                                                                                               $settings_calendar->date_type, 
                                                                                               array($DOPBSP->text('MONTH_JANUARY'), 
                                                                                                     $DOPBSP->text('MONTH_FEBRUARY'),  
                                                                                                     $DOPBSP->text('MONTH_MARCH'),  
                                                                                                     $DOPBSP->text('MONTH_APRIL'),  
                                                                                                     $DOPBSP->text('MONTH_MAY'),  
                                                                                                     $DOPBSP->text('MONTH_JUNE'),  
                                                                                                     $DOPBSP->text('MONTH_JULY'),  
                                                                                                     $DOPBSP->text('MONTH_AUGUST'),  
                                                                                                     $DOPBSP->text('MONTH_SEPTEMBER'),  
                                                                                                     $DOPBSP->text('MONTH_OCTOBER'),  
                                                                                                     $DOPBSP->text('MONTH_NOVEMBER'),  
                                                                                                     $DOPBSP->text('MONTH_DECEMBER')))));
                /*
                 * Check out data.
                 */
                if ($reservation->check_out != ''){
                    array_push($info, $this->getInfo($DOPBSP->text('SEARCH_FRONT_END_CHECK_OUT'),
                                                     $DOPBSP->classes->prototypes->setDateToFormat($reservation->check_out, 
                                                                                                   $settings_calendar->date_type, 
                                                                                                   array($DOPBSP->text('MONTH_JANUARY'), 
                                                                                                         $DOPBSP->text('MONTH_FEBRUARY'),  
                                                                                                         $DOPBSP->text('MONTH_MARCH'),  
                                                                                                         $DOPBSP->text('MONTH_APRIL'),  
                                                                                                         $DOPBSP->text('MONTH_MAY'),  
                                                                                                         $DOPBSP->text('MONTH_JUNE'),  
                                                                                                         $DOPBSP->text('MONTH_JULY'),  
                                                                                                         $DOPBSP->text('MONTH_AUGUST'),  
                                                                                                         $DOPBSP->text('MONTH_SEPTEMBER'),  
                                                                                                         $DOPBSP->text('MONTH_OCTOBER'),  
                                                                                                         $DOPBSP->text('MONTH_NOVEMBER'),
                                                                                                         $DOPBSP->text('MONTH_DECEMBER')))));
                }

                /*
                 * Start hour data.
                 */
                if ($reservation->start_hour != ''){
                    array_push($info, $this->getInfo($DOPBSP->text('SEARCH_FRONT_END_START_HOUR'),
                                                     $settings_calendar->hours_ampm == 'true' ? $DOPBSP->classes->prototypes->getAMPM($reservation->start_hour):$reservation->start_hour));
                }

                /*
                 * End hour data.
                 */
                if ($reservation->end_hour != ''){
                    array_push($info, $this->getInfo($DOPBSP->text('SEARCH_FRONT_END_END_HOUR'),
                                                     $settings_calendar->hours_ampm == 'true' ? $DOPBSP->classes->prototypes->getAMPM($reservation->end_hour):$reservation->end_hour));
                }

                /*
                 * No items data.
                 */
                if ($settings_calendar->sidebar_no_items_enabled == 'true'){
                    array_push($info, $this->getInfo($DOPBSP->text('SEARCH_FRONT_END_NO_ITEMS'),
                                                     $reservation->no_items));
                }

                /*
                 * Reservation price.
                 */
                if ($reservation->price > 0){
                    array_push($info, $this->getInfo($DOPBSP->text('RESERVATIONS_RESERVATION_FRONT_END_PRICE'),
                                                     $DOPBSP->classes->price->set($reservation->price,
                                                                                  $reservation->currency,
                                                                                  $settings_calendar->currency_position),
                                                     'price'));
                }
                
                array_push($info, '     </tbody>');
                array_push($info, '</table>');
                array_push($info, '<br />');
                array_push($info, '<table>');
                array_push($info, '     <tbody>');
                
                /*
                 * Payment method.
                 */
                switch ($reservation->payment_method){
                    case 'none':
                        array_push($info, $this->getInfo($DOPBSP->text('ORDER_PAYMENT_METHOD'),
                                                         $DOPBSP->text('ORDER_PAYMENT_METHOD_NONE')));
                        break;
                    case 'default':
                        array_push($info, $this->getInfo($DOPBSP->text('ORDER_PAYMENT_METHOD'),
                                                         $DOPBSP->text('ORDER_PAYMENT_METHOD_ARRIVAL')));
                        break;
                    default:
                        array_push($info, $this->getInfo($DOPBSP->text('ORDER_PAYMENT_METHOD'),
                                                         $DOPBSP->text('SETTINGS_PAYMENT_GATEWAYS_'.strtoupper($reservation->payment_method))));
                        
                        /*
                         * Transaction ID
                         */
                        array_push($info, $this->getInfo($DOPBSP->text('ORDER_PAYMENT_METHOD_TRANSACTION_ID'),
                                                         $reservation->transaction_id));
                }

                /*
                 * Reservation total price.
                 */
                if ($reservation->price_total > 0){
                    array_push($info, $this->getInfo($DOPBSP->text('RESERVATIONS_RESERVATION_FRONT_END_TOTAL_PRICE'),
                                                     $DOPBSP->classes->price->set($reservation->price_total,
                                                                                  $reservation->currency,
                                                                                  $settings_calendar->currency_position),
                                                     'price-total'));
                }

                /*
                 * Deposit
                 */
                if ($reservation->deposit_price > 0){
                    $deposit = json_decode(stripslashes($reservation->deposit));
                    
                    array_push($info, $this->getInfo($DOPBSP->text('RESERVATIONS_RESERVATION_FRONT_END_DEPOSIT'),
                                                     ($deposit->price_type == 'percent' ? '&#9632;&nbsp;'.$deposit->price.'%<br />':'').
                                                     $DOPBSP->classes->price->set($reservation->deposit_price,
                                                                                  $reservation->currency,
                                                                                  $settings_calendar->currency_position),
                                                     'price'));
                    array_push($info, $this->getInfo($DOPBSP->text('RESERVATIONS_RESERVATION_FRONT_END_DEPOSIT_LEFT'),
                                                     $DOPBSP->classes->price->set($reservation->price_total-$reservation->deposit_price,
                                                                                  $reservation->currency,
                                                                                  $settings_calendar->currency_position),
                                                     'price-total'));
                }
                
                array_push($info, '     </tbody>');
                array_push($info, '</table>');
                
                return implode('', $info);
            }
            
            /*
             * Get reservation extras.
             * 
             * @param reservation (object): reservation data
             * @param settings_calendar (object): calendar settings data
             * 
             * @return extras info
             */
            function getExtras($reservation,
                               $settings_calendar){
                global $DOPBSP;
                
                $info = array();
                array_push($info, '<h3>'.$DOPBSP->text('EXTRAS_FRONT_END_TITLE').'</h3>');
                
                if ($reservation->extras != ''){
                    $extras = json_decode($reservation->extras);
                
                    for ($i=0; $i<count($extras); $i++){
                        $extras[$i]->displayed = false;
                    }
                    
                    array_push($info, '<table>');
                    array_push($info, '     <tbody>');

                    for ($i=0; $i<count($extras); $i++){
                        $values = array();

                        if ($extras[$i]->displayed == false){
                            for ($j=0; $j<count($extras); $j++){
                                $value = array();
                                $extra = $extras[$j];

                                if ($extras[$i]->group_id == $extra->group_id){
                                    array_push($value, $extra->translation);

                                    if ($extra->price != 0){
                                        array_push($value, '<br />');


                                        if ($extra->price_type != 'fixed' 
                                                || $extra->price_by != 'once'){ 
                                            array_push($value, '&#9632;&nbsp;');

                                            if ($extra->price_type == 'fixed'){
                                                array_push($value, $extra->operation.'&nbsp;'.$DOPBSP->classes->price->set($extra->price,
                                                                                                                           $reservation->currency,
                                                                                                                           $settings_calendar->currency_position));
                                            }
                                            else{
                                                array_push($value, $extra->operation.'&nbsp;'.$extra->price.'%');
                                            }

                                            if ($extra->price_by != 'once'){
                                                array_push($value, '/'.($settings_calendar->hours_enabled == 'true' ? $DOPBSP->text('EXTRAS_FRONT_END_BY_HOUR'):$DOPBSP->text('EXTRAS_FRONT_END_BY_DAY')));
                                            }
                                            array_push($value, '<br />');
                                        }
                                        array_push($value, '<strong>'.$extra->operation.'&nbsp;');
                                        array_push($value, $DOPBSP->classes->price->set($extra->price_total,
                                                                                        $reservation->currency,
                                                                                        $settings_calendar->currency_position));
                                        array_push($value, '</strong>');
                                    }

                                    if (count($value) != 0){
                                        $extras[$j]->displayed = true;
                                        array_push($values, implode('', $value));
                                    }
                                }
                            }    
                            array_push($info, $this->getInfo($extras[$i]->group_translation,
                                                             implode('<br /><br />', $values)));
                        }
                    }
                    
                    if ($reservation->extras_price != 0){
                        array_push($info, '<br />');
                        array_push($info, $this->getInfo($DOPBSP->text('RESERVATIONS_RESERVATION_PAYMENT_PRICE_CHANGE'),
                                                         ($reservation->extras_price > 0 ? '+':'-').
                                                             '&nbsp;'.
                                                             $DOPBSP->classes->price->set($reservation->extras_price,
                                                                                          $reservation->currency,
                                                                                          $settings_calendar->currency_position),
                                                         'price'));
                    }
                    array_push($info, '     </tbody>');
                    array_push($info, '</table>');
                }
                else{
                    array_push($info, '<em>'.$DOPBSP->text('RESERVATIONS_RESERVATION_NO_EXTRAS').'</em>');
                }
                
                return implode('', $info);
            }
            
            /*
             * Get reservation discount.
             * 
             * @param reservation (object): reservation data
             * @param settings_calendar (object): calendar settings data
             * 
             * @return discount info
             */
            function getDiscount($reservation,
                                 $settings_calendar){
                global $DOPBSP;
                
                $info = array();
                array_push($info, '<h3>'.$DOPBSP->text('DISCOUNTS_FRONT_END_TITLE').'</h3>');
                
                $discount = json_decode($reservation->discount);
                
                if ($discount->id != 0){
                    $value = array();
                
                    array_push($info, '<table>');
                    array_push($info, '     <tbody>');

                    array_push($value, '&#9632;&nbsp;');

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

                    array_push($info, $this->getInfo($discount->translation,
                                                     implode('', $value)));

                    if ($reservation->discount_price != 0){
                        array_push($info, '<br />');
                        array_push($info, $this->getInfo($DOPBSP->text('RESERVATIONS_RESERVATION_PAYMENT_PRICE_CHANGE'),
                                                         ($reservation->discount_price > 0 ? '+':'-').
                                                             '&nbsp;'.
                                                             $DOPBSP->classes->price->set($reservation->discount_price,
                                                                                          $reservation->currency,
                                                                                          $settings_calendar->currency_position),
                                                         'price'));
                    }
                    array_push($info, '     </tbody>');
                    array_push($info, '</table>');
                }
                else{
                    array_push($info, '<em>'.$DOPBSP->text('RESERVATIONS_RESERVATION_NO_DISCOUNT').'</em>');
                }
                
                return implode('', $info);
            }
            
            /*
             * Get reservation coupon.
             * 
             * @param reservation (object): reservation data
             * @param settings_calendar (object): calendar settings data
             * 
             * @return coupon info
             */
            function getCoupon($reservation,
                               $settings_calendar){
                global $DOPBSP;
                
                $info = array();
                array_push($info, '<h3>'.$DOPBSP->text('COUPONS_FRONT_END_TITLE').'</h3>');
                
                $coupon = json_decode($reservation->coupon);
                
                if ($coupon->id != 0){
                    $value = array();
                
                    array_push($info, '<table>');
                    array_push($info, '     <tbody>');

                    array_push($value, $coupon->code);

                    if ($coupon->price_type != 'fixed' 
                            || $coupon->price_by != 'once'){ 
                        array_push($value, '<br />&#9632;&nbsp;');

                        if ($coupon->price_type == 'fixed'){
                            array_push($value, $coupon->operation.'&nbsp;'.$DOPBSP->classes->price->set($coupon->price,
                                                                                                        $reservation->currency,
                                                                                                        $settings_calendar->currency_position));
                        }
                        else{
                            array_push($value, $coupon->operation.'&nbsp;'.$coupon->price.'%');
                        }

                        if ($coupon->price_by != 'once'){
                            array_push($value, '/'.($settings_calendar->hours_enabled == 'true' ? $DOPBSP->text('COUPONS_FRONT_END_BY_HOUR'):$DOPBSP->text('COUPONS_FRONT_END_BY_DAY')));
                        }
                    }

                    array_push($info, $this->getInfo($coupon->translation,
                                                     implode('', $value)));

                    if ($reservation->coupon_price != 0){
                        array_push($info, '<br />');
                        array_push($info, $this->getInfo($DOPBSP->text('RESERVATIONS_RESERVATION_PAYMENT_PRICE_CHANGE'),
                                                         ($reservation->coupon_price > 0 ? '+':'-').
                                                            '&nbsp;'.
                                                            $DOPBSP->classes->price->set($reservation->coupon_price,
                                                                                         $reservation->currency,
                                                                                         $settings_calendar->currency_position),
                                                         'price'));
                    }
                    array_push($info, '     </tbody>');
                    array_push($info, '</table>');
                }
                else{
                    array_push($info, '<em>'.$DOPBSP->text('RESERVATIONS_RESERVATION_NO_COUPON').'</em>');
                }
                
                return implode('', $info);
            }
            
            /*
             * Get reservation fees.
             * 
             * @param reservation (object): reservation data
             * @param settings_calendar (object): calendar settings data
             * 
             * @return fees info
             */
            function getFees($reservation,
                             $settings_calendar){
                global $DOPBSP;
                
                $info = array();
                array_push($info, '<h3>'.$DOPBSP->text('FEES_FRONT_END_TITLE').'</h3>');
                
                if ($reservation->fees != ''){
                    $fees = json_decode($reservation->fees);
                    
                    array_push($info, '<table>');
                    array_push($info, '     <tbody>');

                    for ($i=0; $i<count($fees); $i++){
                        $value = array();
                        $fee = $fees[$i];

                        if ($fee->price_type != 'fixed' 
                                || $fee->price_by != 'once'){ 
                            array_push($value, '&#9632;&nbsp;');

                            if ($fee->price_type == 'fixed'){
                                array_push($value, $fee->operation.'&nbsp;'.$DOPBSP->classes->price->set($fee->price,
                                                                                                         $reservation->currency,
                                                                                                         $settings_calendar->currency_position));
                            }
                            else{
                                array_push($value, $fee->operation.'&nbsp;'.$fee->price.'%');
                            }

                            if ($fee->price_by != 'once'){
                                array_push($value, '/'.($settings_calendar->hours_enabled == 'true' ? $DOPBSP->text('FEES_FRONT_END_BY_HOUR'):$DOPBSP->text('FEES_FRONT_END_BY_DAY')));
                            }
                            array_push($value, '<br />');
                        }
                        
                        if ($fee->included == 'true'){
                            array_push($value, '<strong>'.$DOPBSP->text('FEES_FRONT_END_INCLUDED').'</strong>');
                        }
                        else{
                            array_push($value, '<strong>'.$fee->operation.'&nbsp;');
                            array_push($value, $DOPBSP->classes->price->set($fee->price_total,
                                                                            $reservation->currency,
                                                                            $settings_calendar->currency_position));
                            array_push($value, '</strong>');
                        }

                        array_push($info, $this->getInfo($fee->translation,
                                                         implode('', $value)));
                    }
                    
                    if ($reservation->fees_price != 0){
                        array_push($info, '<br />');
                        array_push($info, $this->getInfo($DOPBSP->text('RESERVATIONS_RESERVATION_PAYMENT_PRICE_CHANGE'),
                                                        ($reservation->fees_price > 0 ? '+':'-').
                                                             '&nbsp;'.
                                                             $DOPBSP->classes->price->set($reservation->fees_price,
                                                                                          $reservation->currency,
                                                                                          $settings_calendar->currency_position),
                                                        'price'));
                    }
                    array_push($info, '     </tbody>');
                    array_push($info, '</table>');
                }
                else{
                    array_push($info, '<em>'.$DOPBSP->text('RESERVATIONS_RESERVATION_NO_FEES').'</em>');
                }
                
                return implode('', $info);
            }
            
            /*
             * Get reservation form.
             * 
             * @param reservation (object): reservation data
             * 
             * @return form info
             */
            function getForm($reservation){
                global $DOPBSP;
                
                $info = array();
                array_push($info, '<h3>'.$DOPBSP->text('FORMS_FRONT_END_TITLE').'</h3>');
                
                $form = json_decode($reservation->form);
                
                array_push($info, '<table>');
                array_push($info, '     <tbody>');
                
                for ($i=0; $i<count($form); $i++){
                    if (!is_array($form[$i])){
                        $form_item = get_object_vars($form[$i]);
                    }
                    else{
                        $form_item = $form[$i];
                    }
                        
                    if (is_array($form_item['value'])){
                        $values = array();

                        foreach ($form_item['value'] as $value){
                            array_push($values, $value->translation);
                        }
                        array_push($info, $this->getInfo($form_item['translation'],
                                                         implode('<br />', $values)));
                    }
                    else{
                        if ($form_item['value'] == 'true'){
                            $value = $DOPBSP->text('FORMS_FORM_FIELD_TYPE_CHECKBOX_CHECKED_LABEL');
                        }
                        elseif ($form_item['value'] == 'false'){
                            $value = $DOPBSP->text('FORMS_FORM_FIELD_TYPE_CHECKBOX_UNCHECKED_LABEL');
                        }
                        else{
                            $value = isset($form_item['is_email']) && $form_item['is_email'] == 'true' ? '<a href="mailto:'.$form_item['value'].'">'.$form_item['value'].'</a>':
                                                                                                         $form_item['value'];
                        }
                        array_push($info, $this->getInfo($form_item['translation'],
                                                         $value != '' ? $value:$DOPBSP->text('RESERVATIONS_RESERVATION_NO_FORM_FIELD'),
                                                         $value != '' ? '':'no-data'));
                    }
                }
                array_push($info, '     </tbody>');
                array_push($info, '</table>');
                
                return implode('', $info);
            }
            
            /*
             * Get reservation billing/shipping address.
             * 
             * @param reservation (object): reservation data
             * @param settings_payment (object): payment settings data
             * @param type (string): address type
             * 
             * @return billing/shipping address info
             */
            function getAddress($reservation,
                                $settings_payment,
                                $type = 'billing'){
                global $DOPBSP;
                
                $fields = array('first_name',
                                'last_name',
                                'company',
                                'email',
                                'phone',
                                'country',
                                'address_first',
                                'address_second',
                                'city',
                                'state',
                                'zip_code');
                $info = array();
                $reservation_address = $type == 'billing' ? $reservation->address_billing:$reservation->address_shipping;
                
                array_push($info, '<h3>'.$DOPBSP->text('ORDER_ADDRESS_'.strtoupper($type)).'</h3>');
                
                array_push($info, '<table>');
                array_push($info, '     <tbody>');
                
                if ($type == 'shipping'
                        && $reservation_address == 'billing_address'){
                    array_push($info, '<em>'.$DOPBSP->text('RESERVATIONS_RESERVATION_ADDRESS_SHIPPING_COPY').'</em>');
                }
                elseif ($reservation_address != ''){
                    $address = json_decode($reservation_address);
                    
                    foreach ($fields as $field){
                        $settings_field = 'address_'.$type.'_'.$field.'_enabled';
                                
                        if ($settings_payment->$settings_field == 'true'){
                        array_push($info, $this->getInfo($DOPBSP->text('ORDER_ADDRESS_'.strtoupper($field)),
                                                                       $address->$field != '' ? ($field == 'email' ? '<a href="mailto:'.$address->$field.'">'.$address->$field.'</a>':
                                                                                                                     $address->$field):
                                                                                                $DOPBSP->text('RESERVATIONS_RESERVATION_NO_FORM_FIELD'),
                                                                       $address->$field != '' ? '':'no-data'));
                        }
                    }
                }
                else{
                    array_push($info, '<em>'.$DOPBSP->text('RESERVATIONS_RESERVATION_NO_ADDRESS_'.strtoupper($type)).'</em>');
                }
                array_push($info, '     </tbody>');
                array_push($info, '</table>');
                
                return implode('', $info);
            }
            
            /*
             * Get info field.
             * 
             * @param label (string):  data label
             * @param value (string):  data value
             * @param value_type (string):  data value type
             * 
             * @return info field
             */
            function getInfo($label = '',
                             $value = '',
                             $type = ''){
                $info = array();
                
                switch ($type){
                    case 'no-data':
                        $label = '<strong style="color: #898989;">'.$label.'</strong>';
                        $value = '<em style="color: #acacac;">'.$value.'</em>';
                        break;
                    case 'price':
                        $label = '<strong style="color: #252525;">'.$label.'</strong>';
                        $value = '<strong style="color: #252525;">'.$value.'</strong>';
                        break;
                    case 'price-total':
                        $label = '<strong style="color: #252525;">'.$label.'</strong>';
                        $value = '<strong style="color: #ff6300;">'.$value.'</strong>';
                        break;
                    default:
                        $label = '<strong style="color: #898989;">'.$label.'</strong>';
                        $value = '<span style="color: #666666;">'.$value.'</em>';
                }   
                
                array_push($info, '<tr>');
                array_push($info, '     <td style="vertical-align: top; width: 150px;">'.$label.'</td>');
                array_push($info, '     <td style="vertical-align: top;">'.$value.'</td>');
                array_push($info, '</tr>');
                
                return implode('', $info);
            }
        }
    }