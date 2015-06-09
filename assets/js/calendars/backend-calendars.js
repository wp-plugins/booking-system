/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : assets/js/calendars/backend-calendars.js
* File Version            : 1.0.4
* Created / Last Modified : 14 October 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end calendars JavaScript class.
*/

var DOPBSPCalendars = new function(){
    'use strict';
    
    /*
     * Private variables.
     */
    var $ = jQuery.noConflict();
        
    /*
     * Constructor
     */
    this.DOPBSPCalendars = function(){
    };
    
    /*
     * Display calendars list or initialize custom post calendar.
     */
    this.display = function(){
        var post_id = DOPPrototypes.$_GET('post'),
        action = DOPPrototypes.$_GET('action'),
        id;
    
        DOPBSP.clearColumns(1);
        DOPBSP.toggleMessages('active', DOPBSP.text('MESSAGES_LOADING'));
        
        if (action === 'edit'){
            $('#DOPBSP-col-column1').remove();
            $('#DOPBSP-col-column-separator1').remove();
            $('#DOPBSP-column1').remove();
            $('#DOPBSP-column-separator1').remove();
            
            $.post(ajaxurl, {action: 'dopbsp_custom_posts_get',
                             post_id: post_id}, function(data){

                $('.DOPBSP-admin .dopbsp-main').css('display', 'block');
                DOPBSPCalendar.init($.trim(data));
            }).fail(function(data){
                DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
            });
        }
        else{
            $.post(ajaxurl, {action: 'dopbsp_calendars_display'}, function(data){
                $('#DOPBSP-column1 .dopbsp-column-content').html(data);
                $('.DOPBSP-admin .dopbsp-main').css('display', 'block');
                
                DOPBSP.toggleMessages('success', DOPBSP.text('CALENDARS_LOAD_SUCCESS'));
            }).fail(function(data){
                DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
            });
        }
    };
    
    return this.DOPBSPCalendars();
};