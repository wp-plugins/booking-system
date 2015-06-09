/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : assets/js/woocommerce/backend-woocommerce.js
* File Version            : 1.0.1
* Created / Last Modified : 08 January 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end woocommerce JavaScript class.
*/

var DOPBSPWooCommerce = new function(){
    'use strict';
    
    /*
     * Private variables.
     */
    var $ = jQuery.noConflict();
        
    /*
     * Constructor
     */
    this.DOPBSPWooCommerce = function(){
        $(document).ready(function(){
            DOPBSPWooCommerce.set();
        });
    };
    
    /*
     * Set variations.
     */
    this.set = function(){
        $('.woocommerce_variation').each(function(){
            if ($('select[name*="attribute_booking"]', this).val() !== undefined
                    && $('select[name*="attribute_booking"]', this).val().indexOf('reservation-') !== -1){
                $(this).css('display', 'none');
            }
        });
    };
    
    return this.DOPBSPWooCommerce();
};