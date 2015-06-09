/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : assets/js/settings/backend-settings-notifications.js
* File Version            : 1.0.3
* Created / Last Modified : 23 September 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end notifications settings JavaScript class.
*/

var DOPBSPSettingsNotifications = new function(){
    'use strict';
    
    /*
     * Private variables
     */
    var $ = jQuery.noConflict();

    /*
     * Constructor
     */
    this.DOPBSPSettingsNotifications = function(){
    };
    
    /*
     * Display notifications settings.
     * 
     */
    this.display = function(){
        DOPBSP.toggleMessages('active', DOPBSP.text('MESSAGES_LOADING'));
        DOPBSPSettings.toggle('notifications');

        $.post(ajaxurl, {action: 'dopbsp_settings_notifications_display'}, function(data){
            DOPBSP.toggleMessages('success', DOPBSP.text('MESSAGES_LOADING_SUCCESS'));
            $('#DOPBSP-column2 .dopbsp-column-content').html(data);
        }).fail(function(data){
            DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
        });
    };
    
    /*
     * Test notification method.
     * 
     */
    this.test = function(){
        DOPBSP.toggleMessages('active', DOPBSP.text('SETTINGS_NOTIFICATIONS_TEST_SENDING'));
        
        $.post(ajaxurl, {action: 'dopbsp_settings_notifications_test',
                         method: $('#DOPBSP-settings-notifications-test-method').val(),
                         email: $('#DOPBSP-settings-notifications-test-email').val()}, function(data){
            data = $.trim(data);
                         
            if (data === 'success'){
                DOPBSP.toggleMessages('success', DOPBSP.text('SETTINGS_NOTIFICATIONS_TEST_SUCCESS'));
            }             
            else{
                DOPBSP.toggleMessages('error', data);
            }
        }).fail(function(data){
            DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
        });
    };
    
    return this.DOPBSPSettingsNotifications();
};