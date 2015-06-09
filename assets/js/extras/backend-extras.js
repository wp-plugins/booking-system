/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : assets/js/extras/backend-extras.js
* File Version            : 1.0.2
* Created / Last Modified : 23 September 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end extras JavaScript class.
*/

var DOPBSPExtras = new function(){
    'use strict';
    
    /*
     * Private variables.
     */
    var $ = jQuery.noConflict();
    
    /*
     * Display extras list.
     */
    this.DOPBSPExtras = function(){
    };

    /*
     * Display extras list.
     */
    this.display = function(){
        DOPBSP.clearColumns(1);
        DOPBSP.toggleMessages('active', DOPBSP.text('MESSAGES_LOADING'));

        $.post(ajaxurl, {action: 'dopbsp_extras_display'}, function(data){
            $('#DOPBSP-column1 .dopbsp-column-content').html(data);
            $('.DOPBSP-admin .dopbsp-main').css('display', 'block');
            DOPBSP.toggleMessages('success', DOPBSP.text('EXTRAS_LOAD_SUCCESS'));
        }).fail(function(data){
            DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
        });
    };
    
    return this.DOPBSPExtras();
};