/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : assets/js/discounts/backend-discount-item-rules.js
* File Version            : 1.0.2
* Created / Last Modified : 23 September 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end discount item rules JavaScript class.
*/


var DOPBSPDiscountItemRules = new function(){
    'use strict';
    
    /*
     * Private variables
     */
    var $ = jQuery.noConflict();
    
    /*
     * Constructor
     */
    this.DOPBSPDiscountItemRules = function(){
    };
    
    /*
     * Initialize discount item rules sort.
     */
    this.init = function(){
        $('#DOPBSP-discount-items .dopbsp-rules').sortable({handle: '.dopbsp-handle',
                                                            opacity: 0.75,
                                                            placeholder: 'dopbsp-placeholder',
                                                            update: function(e, ui){
                                                                var ids = new Array();

                                                                DOPBSP.toggleMessages('active-info', DOPBSP.text('MESSAGES_SAVING'));

                                                                $('#'+e.target.id+' li.dopbsp-item-rule-wrapper').each(function(){
                                                                    if (!$(this).hasClass('dopbsp-placeholder')){
                                                                        ids.push($(this).attr('id').split('DOPBSP-discount-item-rule-')[1]);
                                                                    }
                                                                });

                                                                $.post(ajaxurl, {action: 'dopbsp_discount_item_rules_sort',
                                                                                 ids: ids.join(',')}, function(data){
                                                                    DOPBSP.toggleMessages('success', DOPBSP.text('MESSAGES_SAVING_SUCCESS'));
                                                                }).fail(function(data){
                                                                    DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
                                                                });
                                                            }});
    };
    
    return this.DOPBSPDiscountItemRules();
};