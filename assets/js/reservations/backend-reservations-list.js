/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : assets/js/reservations/backend-reservations-list.js
* File Version            : 1.0.8
* Created / Last Modified : 29 October 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end reservations list JavaScript class.
*/

var DOPBSPReservationsList = new function(){
    'use strict';
    
    /*
     * Private variables.
     */
    var $ = jQuery.noConflict();

    /*
     * Public variables
     */
    this.ajaxRequestInProgress;
        
    /*
     * Constructor
     */
    this.DOPBSPReservationsList = function(){
    };
    
    /*
     * Display reservations.
     */
    this.display = function(){
        DOPBSPReservations.saveFilters({view: 'list'});
        
        /*
         * Clear previous content.
         */
        DOPBSP.clearColumns(2);
        $('#DOPBSP-col-column-separator2').css('display', 'none');
        $('#DOPBSP-col-column3').css('display', 'none');
        $('#DOPBSP-column-separator2').css('display', 'none');
        $('#DOPBSP-column3').css('display', 'none');
        
        if ($('.DOPBSPReservationsCalendar-tooltip').length !== undefined){
            $('.DOPBSPReservationsCalendar-tooltip').remove();
        }
        
        /*
         * Set buttons.
         */
        $('.DOPBSP-admin .dopbsp-main .dopbsp-button.dopbsp-reservations-list-button').addClass('dopbsp-selected');
        $('.DOPBSP-admin .dopbsp-main .dopbsp-button.dopbsp-reservations-add-button').removeClass('dopbsp-selected');
        $('.DOPBSP-admin .dopbsp-main .dopbsp-button.dopbsp-reservations-calendar-button').removeClass('dopbsp-selected');
        
        /*
         * Set filters.
         */
        $('#DOPBSP-inputs-reservations-filters-calendars').removeClass('dopbsp-last');
        
        $('#DOPBSP-inputs-button-reservations-filters-period').parent().css('display', 'block');
        $('#DOPBSP-inputs-reservations-filters-period').css('display', $('#DOPBSP-inputs-button-reservations-filters-period').parent().hasClass('dopbsp-display') ? 'none':'block');
        $('#DOPBSP-reservations-start-date-wrapper').css('display', 'block');
        $('#DOPBSP-reservations-end-date-wrapper').css('display', 'block');
        
        $('#DOPBSP-inputs-button-reservations-filters-status').parent().css('display', 'block');
        $('#DOPBSP-inputs-reservations-filters-status').css('display', $('#DOPBSP-inputs-button-reservations-filters-status').parent().hasClass('dopbsp-display') ? 'none':'block');
        $('#DOPBSP-reservations-expired-wrapper').css('display', 'block');
        
        $('#DOPBSP-inputs-button-reservations-filters-payment').parent().css('display', 'block')
                                                                        .removeClass('dopbsp-last');
        $('#DOPBSP-inputs-reservations-filters-payment').css('display', $('#DOPBSP-inputs-button-reservations-filters-payment').parent().hasClass('dopbsp-display') ? 'none':'block')
                                                        .removeClass('dopbsp-last');
        
        $('#DOPBSP-inputs-button-reservations-filters-search').parent().css('display', 'block');
        $('#DOPBSP-inputs-reservations-filters-search').css('display', $('#DOPBSP-inputs-button-reservations-filters-search').parent().hasClass('dopbsp-display') ? 'none':'block');
        
        this.init();
        this.get();
    };
    
    /*
     * Initialize reservations list.
     */
    this.init = function(){
        var dayNames = [DOPBSP.text('DAY_SUNDAY'),
                        DOPBSP.text('DAY_MONDAY'),
                        DOPBSP.text('DAY_TUESDAY'),
                        DOPBSP.text('DAY_WEDNESDAY'),
                        DOPBSP.text('DAY_THURSDAY'),
                        DOPBSP.text('DAY_FRIDAY'),
                        DOPBSP.text('DAY_SATURDAY')],
        dayShortNames = [DOPBSP.text('SHORT_DAY_SUNDAY'),
                         DOPBSP.text('SHORT_DAY_MONDAY'),
                         DOPBSP.text('SHORT_DAY_TUESDAY'),
                         DOPBSP.text('SHORT_DAY_WEDNESDAY'),
                         DOPBSP.text('SHORT_DAY_THURSDAY'),
                         DOPBSP.text('SHORT_DAY_FRIDAY'),
                         DOPBSP.text('SHORT_DAY_SATURDAY')],
        monthNames = [DOPBSP.text('MONTH_JANUARY'),
                      DOPBSP.text('MONTH_FEBRUARY'),
                      DOPBSP.text('MONTH_MARCH'),
                      DOPBSP.text('MONTH_APRIL'),
                      DOPBSP.text('MONTH_MAY'),
                      DOPBSP.text('MONTH_JUNE'),
                      DOPBSP.text('MONTH_JULY'),
                      DOPBSP.text('MONTH_AUGUST'),
                      DOPBSP.text('MONTH_SEPTEMBER'),
                      DOPBSP.text('MONTH_OCTOBER'),
                      DOPBSP.text('MONTH_NOVEMBER'),
                      DOPBSP.text('MONTH_DECEMBER')],
        monthShortNames = [DOPBSP.text('SHORT_MONTH_JANUARY'),
                           DOPBSP.text('SHORT_MONTH_FEBRUARY'),
                           DOPBSP.text('SHORT_MONTH_MARCH'),
                           DOPBSP.text('SHORT_MONTH_APRIL'),
                           DOPBSP.text('SHORT_MONTH_MAY'),
                           DOPBSP.text('SHORT_MONTH_JUNE'),
                           DOPBSP.text('SHORT_MONTH_JULY'),
                           DOPBSP.text('SHORT_MONTH_AUGUST'),
                           DOPBSP.text('SHORT_MONTH_SEPTEMBER'),
                           DOPBSP.text('SHORT_MONTH_OCTOBER'),
                           DOPBSP.text('SHORT_MONTH_NOVEMBER'),
                           DOPBSP.text('SHORT_MONTH_DECEMBER')],
        startDate,
        minDate;
        
        /*
         * Start date.
         */
        $('#DOPBSP-reservations-start-date').datepicker('destroy');                      
        $('#DOPBSP-reservations-start-date').datepicker({beforeShow: function(input, inst){
                                                            $('#ui-datepicker-div').removeClass('DOPBSP-admin-datepicker')
                                                                                   .addClass('DOPBSP-admin-datepicker');
                                                        },
                                                        dateFormat: 'yy-mm-dd',
                                                        dayNames: dayNames,
                                                        dayNamesMin: dayShortNames,
                                                        minDate: 0,
                                                        monthNames: monthNames,
                                                        monthNamesMin: monthShortNames,
                                                        nextText: '',
                                                        prevText: ''});
                           
        $('#DOPBSP-reservations-start-date').unbind('change');
        $('#DOPBSP-reservations-start-date').bind('change', function(){
            $('#DOPBSP-reservations-end-date').val('');
            DOPBSPReservationsList.init();
        });
        
        /*
         * End date.
         */
        startDate = $('#DOPBSP-reservations-start-date'); 
        minDate = startDate.val() === '' ? 0:DOPPrototypes.getDatesDifference(DOPPrototypes.getToday(), startDate.val(), 'days', 'integer');
            
        $('#DOPBSP-reservations-end-date').datepicker('destroy');                      
        $('#DOPBSP-reservations-end-date').datepicker({beforeShow: function(input, inst){
                                                            $('#ui-datepicker-div').removeClass('DOPBSP-admin-datepicker')
                                                                                   .addClass('DOPBSP-admin-datepicker');
                                                       },
                                                       dateFormat: 'yy-mm-dd',
                                                       dayNames: dayNames,
                                                       dayNamesMin: dayShortNames,
                                                       minDate: minDate,
                                                       monthNames: monthNames,
                                                       monthNamesMin: monthShortNames,
                                                       nextText: '',
                                                       prevText: ''});
        
        $('.ui-datepicker').removeClass('notranslate').addClass('notranslate');
        
        /*
         * Period
         */
        $('#DOPBSP-reservations-start-hour').unbind('change');
        $('#DOPBSP-reservations-start-hour').bind('change', function(){
            DOPBSPReservationsList.get();
        });
        
        $('#DOPBSP-reservations-end-hour').unbind('change');
        $('#DOPBSP-reservations-end-hour').bind('change', function(){
            DOPBSPReservationsList.get();
        });
        
        /*
         * Status
         */
        $('#DOPBSP-inputs-reservations-filters-status input[type=checkbox]').unbind('click');
        $('#DOPBSP-inputs-reservations-filters-status input[type=checkbox]').bind('click', function(){
            DOPBSPReservationsList.get();
        });
        
        /*
         * Payment
         */
        $('#DOPBSP-inputs-reservations-filters-payment input[type=checkbox]').unbind('click');
        $('#DOPBSP-inputs-reservations-filters-payment input[type=checkbox]').bind('click', function(){
            DOPBSPReservationsList.get();
        });
    };

    /*
     * Get reservations list.
     * 
     * @param resetPages (Boolean): reset the number of pages
     */
    this.get = function(resetPages){
        var paymentMethods = new Array();
                
        DOPBSP.toggleMessages('active', DOPBSP.text('MESSAGES_LOADING'));
        
        /*
         * Get payment methods.
         */
        $('#DOPBSP-inputs-reservations-filters-payment input[type=checkbox]').each(function(){
            if ($(this).is(':checked')){
                paymentMethods.push($(this).attr('id').split('DOPBSP-reservations-payment-')[1]);
            }
        });

        resetPages = resetPages === undefined ? true:resetPages;
        this.ajaxRequestInProgress !== undefined ? this.ajaxRequestInProgress.abort():'';
        
        DOPBSPReservations.saveFilters({status_pending: $('#DOPBSP-reservations-pending').is(':checked') ? true:false,
                                        status_approved: $('#DOPBSP-reservations-approved').is(':checked') ? true:false,
                                        status_rejected: $('#DOPBSP-reservations-rejected').is(':checked') ? true:false,
                                        status_canceled: $('#DOPBSP-reservations-canceled').is(':checked') ? true:false,
                                        status_expired: $('#DOPBSP-reservations-expired').is(':checked') ? true:false,
                                        payment_methods: paymentMethods.join(','),
                                        per_page: $('#DOPBSP-reservations-per-page').val(),
                                        order: $('#DOPBSP-reservations-order').val(),
                                        order_by: $('#DOPBSP-reservations-order-by').val()});
        
        this.ajaxRequestInProgress = $.post(ajaxurl, {action: 'dopbsp_reservations_list_get',
                                                      calendar_id: $('#DOPBSP-calendar-ID').val(),
                                                      start_date: $('#DOPBSP-reservations-start-date').val(),
                                                      end_date: $('#DOPBSP-reservations-end-date').val(),
                                                      start_hour: $('#DOPBSP-reservations-start-hour').val(),
                                                      end_hour: $('#DOPBSP-reservations-end-hour').val(),
                                                      status_pending: $('#DOPBSP-reservations-pending').is(':checked') ? true:false,
                                                      status_approved: $('#DOPBSP-reservations-approved').is(':checked') ? true:false,
                                                      status_rejected: $('#DOPBSP-reservations-rejected').is(':checked') ? true:false,
                                                      status_canceled: $('#DOPBSP-reservations-canceled').is(':checked') ? true:false,
                                                      status_expired: $('#DOPBSP-reservations-expired').is(':checked') ? true:false,
                                                      payment_methods: paymentMethods.join(','),
                                                      search: $('#DOPBSP-reservations-search').val(),
                                                      search_by: $('#DOPBSP-reservations-search-by').val(),
                                                      page: $('#DOPBSP-reservations-page').val(),
                                                      per_page: $('#DOPBSP-reservations-per-page').val(),
                                                      order: $('#DOPBSP-reservations-order').val(),
                                                      order_by: $('#DOPBSP-reservations-order-by').val()}, function(data){
            data = $.trim(data);
            
            if (resetPages){
                $('#DOPBSP-reservations-no-pages').val(data.split(';;;;;;;;;;;')[0]);
                DOPBSPReservationsList.set();
            }
            $('#DOPBSP-column2 .dopbsp-column-content').html(data.split(';;;;;;;;;;;')[1]);
            
            DOPBSPReservation.init();
            DOPBSP.toggleMessages('none', '');
        });
    };

    /*
     * Set filters data.
     */
    this.set = function(){
        var i, 
        pagesHTML = new Array(),
        noPages = Math.ceil(parseInt($('#DOPBSP-reservations-no-pages').val())/parseInt($('#DOPBSP-reservations-pagination-no-page').val()));

        for (i=1; i<=noPages; i++){
            pagesHTML.push('<option value="'+i+'">'+i+'</option>');
        }

        if (noPages === 0){
            pagesHTML.push('<option value="1">1</option>');

        }
        $('#DOPBSP-reservations-pagination-page').html(pagesHTML.join(''));
    };
    
    return this.DOPBSPReservationsList();
};