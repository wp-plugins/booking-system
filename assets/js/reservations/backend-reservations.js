/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : assets/js/reservations/backend-reservations.js
* File Version            : 1.0.4
* Created / Last Modified : 29 October 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end reservations JavaScript class.
*/

var DOPBSPReservations = new function(){
    'use strict';
    
    /*
     * Private variables.
     */
    var $ = jQuery.noConflict();
        
    /*
     * Constructor
     */
    this.DOPBSPReservations = function(){
    };
    
    /*
     * Display reservations.
     */
    this.display = function(){
        var calendarID = $('#DOPBSP-calendar-ID').val();
        
        $('.DOPBSP-admin .dopbsp-main').css('display', 'block');  
        
        if (calendarID.indexOf(',') !== -1){
            $('.DOPBSP-admin .dopbsp-main .dopbsp-button.dopbsp-reservations-add-button').addClass('dopbsp-disabled');
            $('.DOPBSP-admin .dopbsp-main .dopbsp-button.dopbsp-reservations-calendar-button').addClass('dopbsp-disabled');
            DOPBSPReservations.saveFilters({calendar: ''});
        }
        else{
            $('.DOPBSP-admin .dopbsp-main .dopbsp-button.dopbsp-reservations-add-button').removeClass('dopbsp-disabled');
            $('.DOPBSP-admin .dopbsp-main .dopbsp-button.dopbsp-reservations-calendar-button').removeClass('dopbsp-disabled');
            DOPBSPReservations.saveFilters({calendar: calendarID});
        }
        
        if (calendarID.indexOf(',') !== -1){
            DOPBSPReservationsList.display();
        }
        else if ($('.DOPBSP-admin .dopbsp-main .dopbsp-button.dopbsp-reservations-add-button').hasClass('dopbsp-selected')){
            DOPBSPReservationsAdd.display();
        }
        else if ($('.DOPBSP-admin .dopbsp-main .dopbsp-button.dopbsp-reservations-calendar-button').hasClass('dopbsp-selected')){
            DOPBSPReservationsCalendar.display();
        }
        else if ($('.DOPBSP-admin .dopbsp-main .dopbsp-button.dopbsp-reservations-list-button').hasClass('dopbsp-selected')){
            DOPBSPReservationsList.display();
        }
        else{
            if (DOPPrototypes.getCookie('DOPBSP_reservations_view') === 'calendar'){
                DOPBSPReservationsCalendar.display();
            }
            else{
                DOPBSPReservationsList.display();
            }
        }
    };
    
    /*
     * Save reservations filters in cookies.
     * 
     * @param filters (Object): filters list to be saved
     *                          * status_pending (Boolean): pending status filter
     *                          * status_approved (Boolean): approved status filter
     *                          * status_rejected (Boolean): rejected status filter
     *                          * status_canceled (Boolean): canceled status filter
     *                          * status_expired (Boolean): expired status filter
     *                          * payment_methods (String): selected payment methods
     *                          * per_page (Number): number of results per page (list only)
     *                          * order (String): order direction filter (list only)
     *                          * order_by (String): order by field filter (list only)
     * 
     */
    this.saveFilters = function(filters){
        for (var key in filters){
            DOPPrototypes.setCookie('DOPBSP_reservations_'+key, filters[key], 60);
        }
    };
    
    return this.DOPBSPReservations();
};