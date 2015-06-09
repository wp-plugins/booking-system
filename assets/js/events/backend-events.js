/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : assets/js/events/backend-events.js
* File Version            : 1.0
* Created / Last Modified : 23 September 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end events JavaScript class.
*/

var DOPBSPEvents = new function(){
    'use strict';
    
    /*
     * Private variables.
     */
    var $ = jQuery.noConflict();
        
    /*
     * Constructor
     */
    this.DOPBSPEvents = function(){
    };
    
    /*
     * Display events.
     */
    this.display = function(){
//        $('.DOPBSP-admin .dopbsp-main').css('display', 'block');
    };
    
    return this.DOPBSPEvents();
};