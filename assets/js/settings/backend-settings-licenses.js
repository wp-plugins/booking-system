/*
* Title                   : Booking System PRO (WordPress Plugin)
* Version                 : 2.0
* File                    : assets/js/settings/backend-settings-licenses.js
* File Version            : 1.0
* Created / Last Modified : 29 April 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System PRO back end licenses settings JavaScript class.
*/

var DOPBSPSettingsLicenses = new function(){
    'use strict';
    
    /*
     * Private variables
     */
    var $ = jQuery.noConflict();

    /*
     * Constructor
     */
    this.DOPBSPSettingsLicenses = function(){
    };
    
    /*
     * Display licenses settings.
     */
    this.display = function(id){
        DOPBSP.toggleMessages('active', DOPBSP.text('MESSAGES_LOADING'));
        DOPBSPSettings.toggle('licenses');

        $.post(ajaxurl, {action: 'dopbsp_settings_licenses_display'}, function(data){
            DOPBSP.toggleMessages('success', DOPBSP.text('MESSAGES_LOADING_SUCCESS'));
            $('#DOPBSP-column2 .dopbsp-column-content').html(data);
        }).fail(function(data){
            DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
        });
    };
    
    /*
     * Set settings.
     * 
     * @param id (Number): licence ID
     * @param action (String): action type "activate" or "deactivate"
     */
    this.set = function(id, 
                        action){
        var key = $('#DOPBSP-settings-'+id+'_license_key').val(),
        email = $('#DOPBSP-settings-'+id+'_license_email').val();

        DOPBSP.toggleMessages('active', DOPBSP.text('MESSAGES_SAVING'));

        $.post(ajaxurl, {action: 'dopbsp_settings_licenses_'+action,
                         id: id,
                         key: key,
                         email: email}, function(data){
                         console.log(data);
            var response = $.trim(data).split(';;;;;');
            
            if (response[0] === 'success'){
                $('#DOPBSP-inputs-button-'+id+'-deactivate').css('display', action === 'activate' ? 'block':'none');
                $('#DOPBSP-inputs-button-'+id+'-activate').css('display', action === 'deactivate' ? 'block':'none');
                $('#DOPBSP-settings-'+id+'_license_status').html(action === 'activate' ? DOPBSP.text('SETTINGS_LICENSES_STATUS_ACTIVATED'):DOPBSP.text('SETTINGS_LICENSES_STATUS_DEACTIVATED'))
                                                           .removeClass(action === 'activate' ? 'dopbsp-deactivated':'dopbsp-activated')
                                                           .addClass(action === 'activate' ? 'dopbsp-activated':'dopbsp-deactivated');
                            
                if (action === 'activate'){
                    $('#DOPBSP-settings-'+id+'_license_key').attr('disabled', 'disabled');
                    $('#DOPBSP-settings-'+id+'_license_email').attr('disabled', 'disabled');
                }
                else{
                    $('#DOPBSP-settings-'+id+'_license_key').removeAttr('disabled');
                    $('#DOPBSP-settings-'+id+'_license_email').removeAttr('disabled');
                }
                                                   
                DOPBSP.toggleMessages('success', response[1]);
            }
            else{
                DOPBSP.toggleMessages('error', response[1]);
            }
        }).fail(function(data){
            DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
        });
    };
    
    return this.DOPBSPSettingsLicenses();
};