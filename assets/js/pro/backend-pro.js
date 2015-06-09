/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : assets/js/pro/backend-pro.js
* File Version            : 1.0.2
* Created / Last Modified : 23 September 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end pro JavaScript class.
*/

var DOPBSPPRO = new function(){
    'use strict';
    
    /*
     * Private variables.
     */
    var $ = jQuery.noConflict();
        
    /*
     * Constructor
     */
    this.DOPBSPPRO = function(){
    };
    
    /*
     * Display PRO.
     */
    this.display = function(){
        $('.DOPBSP-admin .dopbsp-main').css('display', 'block');
    };
    
    return this.DOPBSPPRO();
};