<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/reservations/class-reservations-extras.php
* File Version            : 1.0.9
* Created / Last Modified : 08 February 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System front end reservations PHP class.
*/

    if (!class_exists('DOPBSPFrontEndReservations')){
        class DOPBSPFrontEndReservations extends DOPBSPFrontEnd{
            /*
             * Constructor.
             */
            function DOPBSPFrontEndReservations(){
            }
            
            /*
             * Get reservation data.
             */
            function get(){
                global $DOPBSP;
                
                
//                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_NO_ADDRESS_BILLING',
//                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
//                                        'text' => 'No billing address.'));
//                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_NO_ADDRESS_SHIPPING',
//                
//                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_ADDRESS_SHIPPING_COPY',
                    
                return array('data' => array(),
                             'text' => array('addressShippingCopy' => $DOPBSP->text('RESERVATIONS_RESERVATION_ADDRESS_SHIPPING_COPY'),
                                             'buttonApprove' => $DOPBSP->text('RESERVATIONS_RESERVATION_APPROVE'),
                                             'buttonCancel' => $DOPBSP->text('RESERVATIONS_RESERVATION_CANCEL'),
                                             'buttonClose' => $DOPBSP->text('RESERVATIONS_RESERVATION_CLOSE'),
                                             'buttonDelete' => $DOPBSP->text('RESERVATIONS_RESERVATION_DELETE'),
                                             'buttonReject' => $DOPBSP->text('RESERVATIONS_RESERVATION_REJECT'),
                                             'dateCreated' => $DOPBSP->text('RESERVATIONS_RESERVATION_DATE_CREATED'),
                                             'id' => $DOPBSP->text('RESERVATIONS_RESERVATION_ID'),
                                             'instructions' => $DOPBSP->text('RESERVATIONS_RESERVATION_INSTRUCTIONS'),
                                             'language' => $DOPBSP->text('RESERVATIONS_RESERVATION_LANGUAGE'),   
                                             'noAddressBilling' => $DOPBSP->text('RESERVATIONS_RESERVATION_NO_ADDRESS_BILLING'),   
                                             'noAddressShipping' => $DOPBSP->text('RESERVATIONS_RESERVATION_NO_ADDRESS_SHIPPING'),   
                                             'noExtras' => $DOPBSP->text('RESERVATIONS_RESERVATION_NO_EXTRAS'),   
                                             'noDiscount' => $DOPBSP->text('RESERVATIONS_RESERVATION_NO_DISCOUNT'),
                                             'noCoupon' => $DOPBSP->text('RESERVATIONS_RESERVATION_NO_COUPON'),
                                             'noFees' => $DOPBSP->text('RESERVATIONS_RESERVATION_NO_FEES'),
                                             'noForm' => $DOPBSP->text('RESERVATIONS_RESERVATION_NO_FORM'),
                                             'noFormField' => $DOPBSP->text('RESERVATIONS_RESERVATION_NO_FORM_FIELD'),
                                             'price' => $DOPBSP->text('RESERVATIONS_RESERVATION_FRONT_END_PRICE'),
                                             'priceChange' => $DOPBSP->text('RESERVATIONS_RESERVATION_PAYMENT_PRICE_CHANGE'),
                                             'priceTotal' => $DOPBSP->text('RESERVATIONS_RESERVATION_FRONT_END_TOTAL_PRICE'),   
                                             'selectDays' => $DOPBSP->text('RESERVATIONS_RESERVATION_FRONT_END_SELECT_DAYS'),
                                             'selectHours' => $DOPBSP->text('RESERVATIONS_RESERVATION_FRONT_END_SELECT_HOURS'),
                                             'status' => $DOPBSP->text('RESERVATIONS_RESERVATION_STATUS'),
                                             'statusApproved' => $DOPBSP->text('RESERVATIONS_RESERVATION_STATUS_APPROVED'),
                                             'statusCanceled' => $DOPBSP->text('RESERVATIONS_RESERVATION_STATUS_CANCELED'),
                                             'statusExpired' => $DOPBSP->text('RESERVATIONS_RESERVATION_STATUS_EXPIRED'),
                                             'statusPending' => $DOPBSP->text('RESERVATIONS_RESERVATION_STATUS_PENDING'),
                                             'statusRejected' => $DOPBSP->text('RESERVATIONS_RESERVATION_STATUS_REJECTED'),
                                             'title' => $DOPBSP->text('RESERVATIONS_RESERVATION_FRONT_END_TITLE'),
                                             'titleDetails' => $DOPBSP->text('RESERVATIONS_RESERVATION_DETAILS_TITLE')));
            }
            
            /*
             * Book a reservation.
             * 
             * @post language (string): selected language
             * @post currency (string): selected currency sign
             * @post currency_code (string): selected currency code
             * @post cart_data (array): list of reservations
             * @post form (object): form data
             * @post address_billing_data (object): billing address data
             * @post address_shipping_data (object): shipping address data
             * @post payment_method (string): selected payment method
             * @post form_addon_data (object): form addon data
             * @post card_data (object): card data
             * @post token (string): payment token (different for payment gateways)
             * @post page_url (string): page url were the calendar is
             */
            function book(){
                global $DOPBSP;
                    
// HOOK (dopbsp_action_book_before) *************************************** Add action before booking request.
                do_action('dopbsp_action_book_before');

                $language = $_POST['language'];
                $currency = $_POST['currency'];
                $currency_code = $_POST['currency_code'];
                $cart = $_POST['cart_data'];
                $form = $_POST['form'];
                $address_billing = $_POST['address_billing_data'];
                $address_shipping = $_POST['address_shipping_data'];
                $payment_method = $_POST['payment_method'];
                $token = $_POST['token'];
                
                /*
                 * Verify reservations.
                 */
                $settings_payment = $DOPBSP->classes->backend_settings->values(1,'payment');
                
                for ($i=0; $i<count($cart); $i++){
                    $reservation = $cart[$i];
                    
                    if (($payment_method != 'default' 
                                    && $payment_method != 'none')
                            || $settings_payment->arrival_with_approval_enabled == 'true'){
                        /*
                         * Verify reservations availability.
                         */
                        if ($reservation['start_hour'] == ''){
                            if (!$DOPBSP->classes->backend_calendar_schedule->validateDays($reservation['check_in'], $reservation['check_out'], $reservation['no_items'])){
                                echo 'unavailable';
                                die();
                            }
                        }
                        else{
                            if (!$DOPBSP->classes->backend_calendar_schedule->validateHours($reservation['check_in'], $reservation['start_hour'], $reservation['end_hour'], $reservation['no_items'])){
                                echo 'unavailable';
                                die();
                            }
                        }
                
                        /*
                         * Verify coupon.
                         */
                        // $coupon = json_decode($reservation['coupon']);
                        $coupon = $reservation['coupon'];
                        
                        if ($coupon['id'] != 0){
                            if (!$DOPBSP->classes->backend_coupon->validate($coupon['id'])){
                                echo 'unavailable-coupon';
                                die();
                            }
                        }
                    }
                }
                
                /*
                 * Set token.
                 */
                if ($payment_method != 'default'
                        && $payment_method != 'none'){
                    $token = $token == '' ? $DOPBSP->classes->prototypes->getRandomString(32):$token;
                }
                else{
                    $token = '';
                }
                $DOPBSP->vars->payment_token = $token;
                
                /*
                 * Add reservations.
                 */
                for ($i=0; $i<count($cart); $i++){
                    $reservation = $cart[$i];
                
                    $reservation_id = $DOPBSP->classes->backend_reservation->add($language,
                                                                                 $currency,
                                                                                 $currency_code,
                                                                                 $reservation,
                                                                                 $form,
                                                                                 $address_billing,
                                                                                 $address_shipping,
                                                                                 $payment_method,
                                                                                 $token);
                    
                    if ($payment_method == 'default'
                            || $payment_method == 'none'){
                        if ($settings_payment->arrival_with_approval_enabled == 'true'){
                            $DOPBSP->classes->backend_reservation_notifications->send($reservation_id,
                                                                                      'book_with_approval_admin');
                            $DOPBSP->classes->backend_reservation_notifications->send($reservation_id,
                                                                                      'book_with_approval_user');
                        }
                        else{
                            $DOPBSP->classes->backend_reservation_notifications->send($reservation_id,
                                                                                      'book_admin');
                            $DOPBSP->classes->backend_reservation_notifications->send($reservation_id,
                                                                                      'book_user');
                        }
                    }
                }
                
// HOOK (dopbsp_action_book_payment) *************************************** Add action for payment gateways.
                do_action('dopbsp_action_book_payment');
                
// HOOK (dopbsp_action_book_after) *************************************** Add action after booking request.
                do_action('dopbsp_action_book_after');
                           
                die();
            }
        }
    }