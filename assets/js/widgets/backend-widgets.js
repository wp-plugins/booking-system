/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : assets/js/backend-widgets.js
* File Version            : 1.0
* Created / Last Modified : 23 September 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end widgets JavaScript class.
*/

var DOPBSPWidgets = new function(){
    'use strict';
    
    /*
     * Private variables.
     */
    var $ = jQuery.noConflict();

    /*
     * Constructor
     */
    this.DOPBSPWidgets = function(){
    };
    
    this.display = function(id,
                            selection){
        $('#DOPBSP-widget-id-'+id).css('display', 'none');
        $('#DOPBSP-widget-lang-'+id).css('display', 'none');

        switch (selection){
            case 'calendar':
                $('#DOPBSP-widget-id-'+id).css('display', 'block');
                $('#DOPBSP-widget-lang-'+id).css('display', 'block');
                break;
            case 'sidebar':
                $('#DOPBSP-widget-id-'+id).css('display', 'block');
                break;
        }
    };
    
    return this.DOPBSPWidgets();
};