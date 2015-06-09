/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : assets/js/coupons/backend-coupon.js
* File Version            : 1.0.4
* Created / Last Modified : 23 October 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end coupon JavaScript class.
*/


var DOPBSPCoupon = new function(){
    'use strict';
    
    /*
     * Private variables.
     */
    var $ = jQuery.noConflict();

    /*
     * Public variables
     */
    this.ajaxRequestInProgress;
    this.ajaxRequestTimeout;
    
    /*
     * Constructor
     */
    this.DOPBSPCoupon = function(){
    };
    
    /*
     * Display coupon.
     * 
     * @param language (String): coupon current editing language
     * @param clearCoupon (Boolean): clear coupon extra data diplay
     */
    this.display = function(language,
                            clearCoupon){
        var HTML = new Array();
        
        language = language === undefined ? ($('#DOPBSP-coupon-language').val() === undefined ? '':$('#DOPBSP-coupon-language').val()):language;
        clearCoupon = clearCoupon === undefined ? true:false;
        language = clearCoupon ? '':language;
        
        if (clearCoupon){
            DOPBSP.clearColumns(2);
        }
        DOPBSP.toggleMessages('active', DOPBSP.text('MESSAGES_LOADING'));
        
        $('#DOPBSP-column1 .dopbsp-column-content li').removeClass('dopbsp-selected');
        $('#DOPBSP-coupon-ID-1').addClass('dopbsp-selected');
        $('#DOPBSP-coupon-ID').val(1);
        
        $.post(ajaxurl, {action: 'dopbsp_coupon_display', 
                         language: language}, function(data){
            
            $('#DOPBSP-column2 .dopbsp-column-header').html(HTML.join(''));
            $('#DOPBSP-column2 .dopbsp-column-content').html(data);
            
            $('#DOPBSP-coupon-start_date').datepicker();
            $('#DOPBSP-coupon-end_date').datepicker();
            
            DOPBSPCoupon.init();
            DOPBSP.toggleMessages('success', DOPBSP.text('COUPONS_COUPON_LOADED'));
        }).fail(function(data){
            DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
        });
    };
    
    /*
     * Initialize events and validations.
     */
    this.init = function(){
        /*
         * Price validation.
         */
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
        $('#DOPBSP-coupon-start_date').datepicker('destroy');                      
        $('#DOPBSP-coupon-start_date').datepicker({beforeShow: function(input, inst){
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
                           
        $('#DOPBSP-coupon-start_date').unbind('change');
        $('#DOPBSP-coupon-start_date').bind('change', function(){
            $('#DOPBSP-coupon-end_date').val('');
            DOPBSPCoupon.init();
        });
        
        /*
         * End date.
         */
        startDate = $('#DOPBSP-coupon-start_date'); 
        minDate = startDate.val() === '' ? 0:DOPPrototypes.getDatesDifference(DOPPrototypes.getToday(), startDate.val(), 'days', 'integer');
            
        $('#DOPBSP-coupon-end_date').datepicker('destroy');                      
        $('#DOPBSP-coupon-end_date').datepicker({beforeShow: function(input, inst){
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
         * Number of coupons.
         */
        $('#DOPBSP-coupon-no_coupons').unbind('input propertychange');
        $('#DOPBSP-coupon-no_coupons').bind('input propertychange', function(){
            DOPPrototypes.cleanInput($(this), '0123456789', '', '');
        });
        
        /*
         * Price
         */
        $('#DOPBSP-coupon-price').unbind('input propertychange');
        $('#DOPBSP-coupon-price').bind('input propertychange', function(){
            DOPPrototypes.cleanInput($(this), '0123456789.', '', '0');
        });
    };
    
    /*
     * Edit coupon.
     * 
     * @param type (String): field type
     * @param field (String): coupon field
     * @param value (String): coupon field value
     * @param onBlur (Boolean): true if function has been called on blur event
     */
    this.edit = function(type, 
                         field,
                         value, 
                         onBlur){
        onBlur = onBlur === undefined ? false:true;
        
        this.ajaxRequestInProgress !== undefined && !onBlur ? this.ajaxRequestInProgress.abort():'';
        this.ajaxRequestTimeout !== undefined ? clearTimeout(this.ajaxRequestTimeout):'';
        
        switch (field){
            case 'name':
                $('#DOPBSP-coupon-ID-1 .dopbsp-name').html(value === '' ? '&nbsp;':value);
                break;
        }
        
        if (onBlur 
                || type === 'select' 
                || type === 'switch'){
            if (!onBlur){
                DOPBSP.toggleMessages('active-info', DOPBSP.text('MESSAGES_SAVING'));
            }
            
            $.post(ajaxurl, {action: 'dopbsp_coupon_edit',
                             field: field,
                             value: value,
                             language: $('#DOPBSP-coupon-language').val()}, function(data){
                if (!onBlur){
                    DOPBSP.toggleMessages('success', DOPBSP.text('MESSAGES_SAVING_SUCCESS'));
                }
            }).fail(function(data){
                DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
            });
        }
        else{
            DOPBSP.toggleMessages('active-info', DOPBSP.text('MESSAGES_SAVING'));

            this.ajaxRequestTimeout = setTimeout(function(){
                clearTimeout(this.ajaxRequestTimeout);

                this.ajaxRequestInProgress = $.post(ajaxurl, {action: 'dopbsp_coupon_edit',
                                                              field: field,
                                                              value: value,
                                                              language: $('#DOPBSP-coupon-language').val()}, function(data){
                    DOPBSP.toggleMessages('success', DOPBSP.text('MESSAGES_SAVING_SUCCESS'));
                }).fail(function(data){
                    DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
                });
            }, 600);
        }
    };
    
    /*
     * Generate coupon code.
     * 
     */
    this.generateCode = function(){
        var code = DOPPrototypes.getRandomString(16);
        
        $('#DOPBSP-coupon-code').val(code);
        DOPBSPCoupon.edit('text',
                          'code',
                          code);
    };

    return this.DOPBSPCoupon();
};