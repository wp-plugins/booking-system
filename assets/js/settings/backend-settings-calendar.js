/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : assets/js/settings/backend-settings-calendar.js
* File Version            : 1.0.4
* Created / Last Modified : 23 January 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end calendar settings JavaScript class.
*/

var DOPBSPSettingsCalendar = new function(){
    'use strict';
    
    /*
     * Private variables
     */
    var $ = jQuery.noConflict();

    /*
     * Constructor
     */
    this.DOPBSPSettingsCalendar = function(){
    };
    
    /*
     * Display calendar settings.
     * 
     */
    this.display = function(){
        DOPBSP.toggleMessages('active', DOPBSP.text('MESSAGES_LOADING'));
        DOPBSPSettings.toggle('calendars');
        
        $.post(ajaxurl, {action: 'dopbsp_settings_calendar_display'}, function(data){
            DOPBSP.toggleMessages('success', DOPBSP.text('MESSAGES_LOADING_SUCCESS'));
            $('#DOPBSP-column2 .dopbsp-column-content').html(data);
            
            DOPBSPSettingsCalendar.init();
        }).fail(function(data){
            DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
        });
    };
    
    /*
     * Initialize calendar settings.
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
                           DOPBSP.text('SHORT_MONTH_DECEMBER')];
                               
        $('#DOPBSP-settings-days_first_displayed').datepicker('destroy');
        $('#DOPBSP-settings-days_first_displayed').datepicker({beforeShow: function(input, inst){
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
        $('.ui-datepicker').removeClass('notranslate').addClass('notranslate');
    };
    
    return this.DOPBSPSettingsCalendar();
};