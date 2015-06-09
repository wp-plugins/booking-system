/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : assets/js/settings/backend-tools-repair-calendars-settings.js
* File Version            : 1.0.1
* Created / Last Modified : 26 January 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end repair calendars settings JavaScript class.
*/

var DOPBSPToolsRepairCalendarsSettings = new function(){
    'use strict';
    
    /*
     * Private variables
     */
    var $ = jQuery.noConflict(),
    calendars = new Array();
    

    /*
     * Constructor
     */
    this.DOPBSPToolsRepairCalendarsSettings = function(){
    };
    
    /*
     * Initialize calendars settings repair.
     */
    this.init = function(){
        DOPBSP.toggleMessages('active', DOPBSP.text('TOOLS_REPAIR_CALENDARS_SETTINGS_REPAIRING'));
        
        $.post(ajaxurl, {action: 'dopbsp_tools_repair_calendars_settings_display'}, function(data){
            $('#DOPBSP-column2 .dopbsp-column-content').html($.trim(data));
            
            $.post(ajaxurl, {action: 'dopbsp_tools_repair_calendars_settings_get'}, function(data){
                calendars = $.trim(data).split(',');
            
                DOPBSPToolsRepairCalendarsSettings.set(0);
            }).fail(function(data){
                DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
            });
        }).fail(function(data){
            DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
        });
    };
    
    /*
     * Set repair to calendar settings.
     * 
     * @param no (Number): calendars array index
     */
    this.set = function(no){
        $.post(ajaxurl, {action: 'dopbsp_tools_repair_calendars_settings_set',
                         id: calendars[no],
                         no: no}, function(data){
            $('#DOPBSP-tools-repair-calendars-settings tbody').append(data);
            
            if (no < calendars.length-1){
                DOPBSPToolsRepairCalendarsSettings.set(no+1);
            }
            else{
                DOPBSPToolsRepairCalendarsSettings.clean();
            }
        }).fail(function(data){
            DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
        });
    };
    
    /*
     * Clean calendars settings tables.
     */
    this.clean = function(){
        $.post(ajaxurl, {action: 'dopbsp_tools_repair_calendars_settings_clean'}, function(data){
            DOPBSP.toggleMessages('success', DOPBSP.text('TOOLS_REPAIR_CALENDARS_SETTINGS_SUCCESS'));
        }).fail(function(data){
            DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
        });
    };
    
    return this.DOPBSPToolsRepairCalendarsSettings();
};