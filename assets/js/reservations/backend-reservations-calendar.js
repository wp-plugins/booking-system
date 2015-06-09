/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : assets/js/reservations/backend-reservations-calendar.js
* File Version            : 1.0.6
* Created / Last Modified : 29 October 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end reservations calendar JavaScript class.
*/

var DOPBSPReservationsCalendar = new function(){
    'use strict';
    
    /*
     * Private variables.
     */
    var $ = jQuery.noConflict();
        
    /*
     * Constructor
     */
    this.DOPBSPReservationsCalendar = function(){
    };
    
    /*
     * Display reservations calendar.
     */
    this.display = function(){
        if ($('#DOPBSP-calendar-ID').val().indexOf(',') !== -1){
            return false;
        }
        DOPBSPReservations.saveFilters({view: 'calendar'});
        
        /*
         * Clear previous content.
         */
        DOPBSP.clearColumns(2);
        $('#DOPBSP-col-column-separator2').css('display', 'none');
        $('#DOPBSP-col-column3').css('display', 'none');
        $('#DOPBSP-column-separator2').css('display', 'none');
        $('#DOPBSP-column3').css('display', 'none');
        
        /*
         * Set buttons.
         */
        $('.DOPBSP-admin .dopbsp-main .dopbsp-button.dopbsp-reservations-list-button').removeClass('dopbsp-selected');
        $('.DOPBSP-admin .dopbsp-main .dopbsp-button.dopbsp-reservations-add-button').removeClass('dopbsp-selected');
        $('.DOPBSP-admin .dopbsp-main .dopbsp-button.dopbsp-reservations-calendar-button').addClass('dopbsp-selected');
        
        /*
         * Set filters.
         */
        $('#DOPBSP-inputs-reservations-filters-calendars').removeClass('dopbsp-last');
        
        DOPBSPReservationsCalendar.init();
    };
    
    /*
     * Initialize reservations calendar.
     */
    this.init = function(){
        DOPBSP.toggleMessages('active', DOPBSP.text('MESSAGES_LOADING'));
        $('#DOPBSP-column2 .dopbsp-column-content').html('<div id="DOPBSP-reservations-calendar"></div>');
        
        $.post(ajaxurl, {action: 'dopbsp_reservations_calendar_get_json',
                         calendar_id: $('#DOPBSP-calendar-ID').val()}, function(data){console.log(data);
            var json = JSON.parse($.trim(data));
            
            /*
             * Set filters.
             */
            $('#DOPBSP-inputs-reservations-filters-calendars').removeClass('last');

            if (json['hours']['data']['enabled']){
                $('#DOPBSP-inputs-button-reservations-filters-period').parent().css('display', 'block');
                $('#DOPBSP-inputs-reservations-filters-period').css('display', $('#DOPBSP-inputs-button-reservations-filters-period').parent().hasClass('dopbsp-display') ? 'none':'block');
                $('#DOPBSP-reservations-start-date-wrapper').css('display', 'none');
                $('#DOPBSP-reservations-end-date-wrapper').css('display', 'none');
            }
            else{
                $('#DOPBSP-inputs-button-reservations-filters-period').parent().css('display', 'none');
                $('#DOPBSP-inputs-reservations-filters-period').css('display', 'none');
                $('#DOPBSP-reservations-start-date-wrapper').css('display', 'block');
                $('#DOPBSP-reservations-end-date-wrapper').css('display', 'block');
            }

            $('#DOPBSP-inputs-button-reservations-filters-status').parent().css('display', 'block');
            $('#DOPBSP-inputs-reservations-filters-status').css('display', $('#DOPBSP-inputs-button-reservations-filters-status').parent().hasClass('dopbsp-display') ? 'none':'block');
            $('#DOPBSP-reservations-expired-wrapper').css('display', 'none');

            $('#DOPBSP-inputs-button-reservations-filters-payment').parent().css('display', 'block')
                                                                            .addClass('dopbsp-last');
            $('#DOPBSP-inputs-reservations-filters-payment').css('display', $('#DOPBSP-inputs-button-reservations-filters-payment').parent().hasClass('dopbsp-display') ? 'none':'block')
                                                            .addClass('dopbsp-last');

            $('#DOPBSP-inputs-button-reservations-filters-search').parent().css('display', 'none');
            $('#DOPBSP-inputs-reservations-filters-search').css('display', 'none');
            
            $('#DOPBSP-reservations-calendar').DOPBSPReservationsCalendar(json);
        });
    };
    
    return this.DOPBSPReservationsCalendar();
};