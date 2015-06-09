/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : assets/js/languages/backend-languages.js
* File Version            : 1.0
* Created / Last Modified : 02 December 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end languages JavaScript class.
*/

var DOPBSPLanguages = new function(){
    'use strict';
    
    /*
     * Private variables
     */
    var $ = jQuery.noConflict();

    /*
     * Constructor
     */
    this.DOPBSPLanguages = function(){
    };
    
    /*
     * Display languages.
     */
    this.display = function(){
        $('.DOPBSP-admin .dopbsp-main').css('display', 'block');
        $('#DOPBSP-translation-manage-translation').css('display', 'block');
        $('#DOPBSP-translation-manage-language').css('display', 'none');
        $('#DOPBSP-translation-manage-text-group').css('display', 'none');
        $('#DOPBSP-translation-manage-search').css('display', 'none');
        $('#DOPBSP-translation-manage-languages').css('display', 'none');
        $('#DOPBSP-translation-reset').css('display', 'none');
        $('#DOPBSP-translation-check').css('display', 'none');
        
        DOPBSP.toggleMessages('active', DOPBSP.text('MESSAGES_LOADING'));
        $('#DOPBSP-translation-content').html('');

        $.post(ajaxurl, {action: 'dopbsp_languages_display'}, function(data){
            $('#DOPBSP-translation-content').html(data);
            DOPBSP.toggleMessages('success', DOPBSP.text('LANGUAGES_LOADED'));
        }).fail(function(data){
            DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
        });
    };
    
    return this.DOPBSPLanguages();
};