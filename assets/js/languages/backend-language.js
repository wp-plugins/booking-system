/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : assets/js/languages/backend-language.js
* File Version            : 1.0
* Created / Last Modified : 02 December 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end language JavaScript class.
*/

var DOPBSPLanguage = new function(){
    'use strict';
    
    /*
     * Private variables
     */
    var $ = jQuery.noConflict();

    /*
     * Constructor
     */
    this.DOPBSPLanguage = function(){
    };
    
    /*
     * Change back end language.
     */
    this.change = function(){
        DOPBSP.toggleMessages('active', DOPBSP.text('MESSAGES_SAVING'));
        
        $.post(ajaxurl, {action: 'dopbsp_language_change',
                         language: $('#DOPBSP-admin-language').val()}, function(data){
            window.location.reload();
        }).fail(function(data){
            DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
        });
    };

    /*
     * Set language to be used with the plugin.
     * 
     * @param language (String): language code
     */
    this.set = function(language){
        if ($('#DOPBSP-translation-language-'+language).is(':checked')){
            DOPBSPLanguage.enable(language);
        }
        else{
            DOPBSP.confirmation('LANGUAGES_REMOVE_CONFIGURATION', "DOPBSPLanguage.enable('"+language+"')", "$('#DOPBSP-translation-language-"+language+"').attr('checked', 'checked');");
        }
    };
    
    /*
     * Enable/disable a language.
     * 
     * @param language (String): language code
     */
    this.enable = function(language){
        DOPBSP.toggleMessages('active', $('#DOPBSP-translation-language-'+language).is(':checked') ? DOPBSP.text('LANGUAGES_SETTING'):DOPBSP.text('LANGUAGES_REMOVING'));

        $.post(ajaxurl, {action: 'dopbsp_language_enable',
                         language: language,
                         value: $('#DOPBSP-translation-language-'+language).is(':checked') ? 'true':'false'}, function(data){
            DOPBSP.toggleMessages('active', $('#DOPBSP-translation-language-'+language).is(':checked') ? DOPBSP.text('LANGUAGES_SET_SUCCESS'):DOPBSP.text('LANGUAGES_REMOVE_SUCCESS'));
            DOPPrototypes.setCookie('DOPBSP-translation-redirect', 'languages', 1);

            setTimeout(function(){
                window.location.reload();
            }, 2000);
        }).fail(function(data){
            DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
        });
    };
    
    return this.DOPBSPLanguage();
};