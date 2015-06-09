<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/translation/class-translation-text-reservations.php
* File Version            : 1.0.8
* Created / Last Modified : 16 February 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System reservations translation text PHP class.
*/

    if (!class_exists('DOPBSPTranslationTextReservations')){
        class DOPBSPTranslationTextReservations{
            /*
             * Constructor
             */
            function DOPBSPTranslationTextReservations(){
                /*
                 * Initialize reservations text.
                 */
                add_filter('dopbsp_filter_translation_text', array(&$this, 'reservations'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'reservationsFilters'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'reservationsReservation'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'reservationsHelp'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'reservationsReservationFrontEnd'));
            }
            
            /*
             * Reservations text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function reservations($text){
                array_push($text, array('key' => 'PARENT_RESERVATIONS',
                                        'parent' => '',
                                        'text' => 'Reservations'));  
                
                array_push($text, array('key' => 'RESERVATIONS_TITLE',
                                        'parent' => 'PARENT_RESERVATIONS',
                                        'text' => 'Reservations'));

                array_push($text, array('key' => 'RESERVATIONS_DISPLAY_NEW_RESERVATIONS',
                                        'parent' => 'PARENT_RESERVATIONS',
                                        'text' => 'Display new reservations'));    
                array_push($text, array('key' => 'RESERVATIONS_NO_RESERVATIONS',
                                        'parent' => 'PARENT_RESERVATIONS',
                                        'text' => 'There are no reservations.'));
                
                return $text;
            }
            
            /*
             * Reservations filters text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function reservationsFilters($text){
                array_push($text, array('key' => 'PARENT_RESERVATIONS_FILTERS',
                                        'parent' => '',
                                        'text' => 'Reservations - Filters')); 
                /*
                 * Reservations calendar filters.
                 */
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_CALENDAR',
                                        'parent' => 'PARENT_RESERVATIONS_FILTERS',
                                        'text' => 'Calendar'));
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_CALENDAR_ALL',
                                        'parent' => 'PARENT_RESERVATIONS_FILTERS',
                                        'text' => 'All'));
                /*
                 * Reservations view filters.
                 */
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_VIEW_CALENDAR',
                                        'parent' => 'PARENT_RESERVATIONS_FILTERS',
                                        'text' => 'View calendar'));
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_VIEW_LIST',
                                        'parent' => 'PARENT_RESERVATIONS_FILTERS',
                                        'text' => 'View list'));
                /*
                 * Reservations period filters.
                 */
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_PERIOD',
                                        'parent' => 'PARENT_RESERVATIONS_FILTERS',
                                        'text' => 'Period'));
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_START_DAY',
                                        'parent' => 'PARENT_RESERVATIONS_FILTERS',
                                        'text' => 'Start day'));
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_END_DAY',
                                        'parent' => 'PARENT_RESERVATIONS_FILTERS',
                                        'text' => 'End day'));
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_START_HOUR',
                                        'parent' => 'PARENT_RESERVATIONS_FILTERS',
                                        'text' => 'Start hour'));
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_END_HOUR',
                                        'parent' => 'PARENT_RESERVATIONS_FILTERS',
                                        'text' => 'End hour'));
                /*
                 * Reservations status filters.
                 */
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_STATUS',
                                        'parent' => 'PARENT_RESERVATIONS_FILTERS',
                                        'text' => 'Status'));
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_STATUS_LABEL',
                                        'parent' => 'PARENT_RESERVATIONS_FILTERS',
                                        'text' => 'Select statuses'));
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_STATUS_PENDING',
                                        'parent' => 'PARENT_RESERVATIONS_FILTERS',
                                        'text' => 'Pending'));
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_STATUS_APPROVED',
                                        'parent' => 'PARENT_RESERVATIONS_FILTERS',
                                        'text' => 'Approved'));
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_STATUS_REJECTED',
                                        'parent' => 'PARENT_RESERVATIONS_FILTERS',
                                        'text' => 'Rejected'));
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_STATUS_CANCELED',
                                        'parent' => 'PARENT_RESERVATIONS_FILTERS',
                                        'text' => 'Canceled'));
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_STATUS_EXPIRED',
                                        'parent' => 'PARENT_RESERVATIONS_FILTERS',
                                        'text' => 'Expired'));
                /*
                 * Reservations payment filters.
                 */
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_PAYMENT_LABEL',
                                        'parent' => 'PARENT_RESERVATIONS_FILTERS',
                                        'text' => 'Select payment methods'));
                /*
                 * Reservations search filters.
                 */
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_SEARCH',
                                        'parent' => 'PARENT_RESERVATIONS_FILTERS',
                                        'text' => 'Search'));
                
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_PAGE',
                                        'parent' => 'PARENT_RESERVATIONS_FILTERS',
                                        'text' => 'Page'));
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_PER_PAGE',
                                        'parent' => 'PARENT_RESERVATIONS_FILTERS',
                                        'text' => 'Reservations per page'));
                
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_ORDER',
                                        'parent' => 'PARENT_RESERVATIONS_FILTERS',
                                        'text' => 'Order'));
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_ORDER_ASCENDING',
                                        'parent' => 'PARENT_RESERVATIONS_FILTERS',
                                        'text' => 'Ascending'));
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_ORDER_DESCENDING',
                                        'parent' => 'PARENT_RESERVATIONS_FILTERS',
                                        'text' => 'Descending'));
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_ORDER_BY',
                                        'parent' => 'PARENT_RESERVATIONS_FILTERS',
                                        'text' => 'Order by'));
                
                return $text;
            }
            
            /*
             * Reservation text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function reservationsReservation($text){
                array_push($text, array('key' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'parent' => '',
                                        'text' => 'Reservations - Reservation'));  
                /*
                 * Add
                 */
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_ADD',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Add reservation'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_ADD_SUCCESS',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Add reservation'));
                /*
                 * Details
                 */
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_DETAILS_TITLE',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Details'));
                
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_ID',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Reservation ID'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_DATE_CREATED',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Date created'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_CALENDAR_ID',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Calendar ID'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_CALENDAR_NAME',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Calendar name'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_LANGUAGE',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Selected language'));
                /*
                 * Status
                 */
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_STATUS',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Status'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_STATUS_PENDING',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Pending'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_STATUS_APPROVED',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Approved'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_STATUS_REJECTED',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Rejected'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_STATUS_CANCELED',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Canceled'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_STATUS_EXPIRED',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Expired'));
                /*
                 * Payment details.
                 */
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_PAYMENT_PRICE_CHANGE',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Price change'));
                /*
                 * No data.
                 */
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_NO_EXTRAS',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'No extras.'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_NO_DISCOUNT',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'No discount.'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_NO_COUPON',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'No coupon.'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_NO_FEES',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'No taxes or fees.'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_NO_ADDRESS_BILLING',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'No billing address.'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_NO_ADDRESS_SHIPPING',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'No shipping address.'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_NO_FORM',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Form was not completed.'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_NO_FORM_FIELD',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Form field was not completed.'));
                
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_ADDRESS_SHIPPING_COPY',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Same as billing address.'));
                
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_INSTRUCTIONS',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Click to edit the reservation.'));
                /*
                 * Approve reservation.
                 */
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_APPROVE',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Approve'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_APPROVE_CONFIRMATION',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Are you sure you want to approve this reservation?'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_APPROVE_SUCCESS',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'The reservation has been approved.'));
                /*
                 * Cancel reservation.
                 */
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_CANCEL',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Cancel'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_CANCEL_CONFIRMATION',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Are you sure you want to cancel this reservation?'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_CANCEL_CONFIRMATION_REFUND',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Are you sure you want to cancel this reservation? A refund will be issued automatically.'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_CANCEL_SUCCESS',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'The reservation has been canceled.'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_CANCEL_SUCCESS_REFUND',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'A refund of %s has been made.'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_CANCEL_SUCCESS_REFUND_WARNING',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'A refund or a partial refund has already been made.'));
                /*
                 * Delete reservation.
                 */
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_DELETE',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Delete'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_DELETE_CONFIRMATION',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Are you sure you want to delete this reservation?'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_DELETE_SUCCESS',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'The reservation has been deleted.'));
                /*
                 * Reject reservation.
                 */
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_REJECT',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Reject'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_REJECT_CONFIRMATION',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Are you sure you want to reject this reservation?'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_REJECT_SUCCESS',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'The reservation has been rejected.'));
                
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_CLOSE',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION',
                                        'text' => 'Close'));
                
                return $text;
            }
            
            /*
             * Reservations help text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function reservationsHelp($text){
                array_push($text, array('key' => 'PARENT_RESERVATIONS_HELP',
                                        'parent' => '',
                                        'text' => 'Reservations - Help')); 
                /*
                 * Reservations calendar filters.
                 */
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_CALENDAR_HELP',
                                        'parent' => 'PARENT_RESERVATIONS_HELP',
                                        'text' => 'Select the calendar for which you want to see reservations, or display all reservations.'));
                /*
                 * Reservations view filters.
                 */
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_VIEW_CALENDAR_HELP',
                                        'parent' => 'PARENT_RESERVATIONS_HELP',
                                        'text' => 'Selecting "Calendar view" will display the reservations in a calendar. Only possible when you select one calendar.'));
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_VIEW_LIST_HELP',
                                        'parent' => 'PARENT_RESERVATIONS_HELP',
                                        'text' => 'Selecting "List view" will display the reservations in a list.'));
                /*
                 * Reservations period filters.
                 */
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_START_DAY_HELP',
                                        'parent' => 'PARENT_RESERVATIONS_HELP',
                                        'text' => 'Select the day from where displayed reservations start.'));
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_END_DAY_HELP',
                                        'parent' => 'PARENT_RESERVATIONS_HELP',
                                        'text' => 'Select the day from where displayed reservations end.'));
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_START_HOUR_HELP',
                                        'parent' => 'PARENT_RESERVATIONS_HELP',
                                        'text' => 'Select the hour from where displayed reservations start.'));
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_END_HOUR_HELP',
                                        'parent' => 'PARENT_RESERVATIONS_HELP',
                                        'text' => 'Select the hour from where displayed reservations end.'));
                /*
                 * Reservations status filters.
                 */
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_STATUS_HELP',
                                        'parent' => 'PARENT_RESERVATIONS_HELP',
                                        'text' => 'Display reservations with selected status.'));
                /*
                 * Reservations payment filters.
                 */
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_PAYMENT_HELP',
                                        'parent' => 'PARENT_RESERVATIONS_HELP',
                                        'text' => 'Display reservations with selected payment methods.'));
                /*
                 * Reservations search filters.
                 */
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_SEARCH_HELP',
                                        'parent' => 'PARENT_RESERVATIONS_HELP',
                                        'text' => 'Enter the search value.'));
                
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_PAGE_HELP',
                                        'parent' => 'PARENT_RESERVATIONS_HELP',
                                        'text' => 'Select page.'));
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_PER_PAGE_HELP',
                                        'parent' => 'PARENT_RESERVATIONS_HELP',
                                        'text' => 'Select the number of reservations which will be displayed on page.'));
                
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_ORDER_HELP',
                                        'parent' => 'PARENT_RESERVATIONS_HELP',
                                        'text' => 'Order the reservations ascending or descending.'));
                array_push($text, array('key' => 'RESERVATIONS_FILTERS_ORDER_BY_HELP',
                                        'parent' => 'PARENT_RESERVATIONS_HELP',
                                        'text' => 'Select the field after which the reservations will be sorted.'));
                
                return $text;
            }
            
            /*
             * Reservations - Reservation front end text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function reservationsReservationFrontEnd($text){
                array_push($text, array('key' => 'PARENT_RESERVATIONS_RESERVATION_FRONT_END',
                                        'parent' => '',
                                        'text' => 'Reservations - Reservation front end'));
                
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_FRONT_END_TITLE',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION_FRONT_END',
                                        'text' => 'Reservation'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_FRONT_END_SELECT_DAYS',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION_FRONT_END',
                                        'text' => 'Please select the days from calendar.'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_FRONT_END_SELECT_HOURS',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION_FRONT_END',
                                        'text' => 'Please select the days and hours from calendar.'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_FRONT_END_PRICE',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION_FRONT_END',
                                        'text' => 'Price'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_FRONT_END_TOTAL_PRICE',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION_FRONT_END',
                                        'text' => 'Total',
                                        'de' => 'Summe',
                                        'nl' => 'Totaal',
                                        'fr' => 'Total',
                                        'pl' => 'Razem'));
                
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_FRONT_END_DEPOSIT',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION_FRONT_END',
                                        'text' => 'Deposit',
                                        'de' => 'Anzahlung',
                                        'nl' => 'Tegoed',
                                        'fr' => 'Dépôt',
                                        'pl' => 'Zaliczka'));
                array_push($text, array('key' => 'RESERVATIONS_RESERVATION_FRONT_END_DEPOSIT_LEFT',
                                        'parent' => 'PARENT_RESERVATIONS_RESERVATION_FRONT_END',
                                        'text' => 'Left to pay',
                                        'de' => 'Restbetrag',
                                        'nl' => 'Te betalen',
                                        'fr' => 'Reste à payer',
                                        'pl' => 'Przejdź do płatności'));
                
                return $text;
            }
        }
    }