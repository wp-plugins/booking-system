/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : assets/js/discounts/backend-discount.js
* File Version            : 1.0.5
* Created / Last Modified : 23 October 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end discount JavaScript class.
*/


var DOPBSPDiscount = new function(){
    'use strict';
    
    /*
     * Private variables.
     */
    var $ = jQuery.noConflict();

    /*
     * Public variables
     */
    this.ajaxRequestInProgress;
    this.ajaxRequestTimeout;
    
    /*
     * Constructor
     */
    this.DOPBSPDiscount = function(){
    };
    
    /*
     * Display discount.
     * 
     * @param language (String): discount current editing language
     * @param clearDiscount (Boolean): clear current discount data diplay
     */
    this.display = function(language,
                            clearDiscount){
        var HTML = new Array();
        
        language = language === undefined ? ($('#DOPBSP-discount-language').val() === undefined ? '':$('#DOPBSP-discount-language').val()):language;
        clearDiscount = clearDiscount === undefined ? true:false;
        language = clearDiscount ? '':language;
        
        if (clearDiscount){
            DOPBSP.clearColumns(2);
        }
        DOPBSP.toggleMessages('active', DOPBSP.text('MESSAGES_LOADING'));
        
        $('#DOPBSP-column1 .dopbsp-column-content li').removeClass('dopbsp-selected');
        $('#DOPBSP-discount-ID-1').addClass('dopbsp-selected');
        $('#DOPBSP-discount-ID').val(1);
        
        $.post(ajaxurl, {action: 'dopbsp_discount_display', 
                         language: language}, function(data){
            HTML.push('<a href="'+DOPBSP_CONFIG_HELP_DOCUMENTATION_URL+'" target="_blank" class="dopbsp-button dopbsp-help">');
            HTML.push(' <span class="dopbsp-info dopbsp-help">');
            HTML.push(DOPBSP.text('DISCOUNTS_DISCOUNT_ADD_ITEM_HELP')+'<br /><br />');
            HTML.push(DOPBSP.text('DISCOUNTS_DISCOUNT_EDIT_ITEM_HELP')+'<br /><br />');
            HTML.push(DOPBSP.text('DISCOUNTS_DISCOUNT_DELETE_ITEM_HELP')+'<br /><br />');
            HTML.push(DOPBSP.text('DISCOUNTS_DISCOUNT_SORT_ITEM_HELP')+'<br /><br />');
            HTML.push(DOPBSP.text('HELP_VIEW_DOCUMENTATION'));
            HTML.push(' </span>');
            HTML.push('</a>');
            
            $('#DOPBSP-column2 .dopbsp-column-header').html(HTML.join(''));
            $('#DOPBSP-column2 .dopbsp-column-content').html(data);
            
            DOPBSPDiscountItems.init();
            DOPBSPDiscountItem.init();
            DOPBSPDiscountItemRules.init();
            DOPBSPDiscountItemRule.init();
            DOPBSP.toggleMessages('success', DOPBSP.text('DISCOUNTS_DISCOUNT_LOADED'));
        }).fail(function(data){
            DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
        });
    };

    /*
     * Edit discount.
     * 
     * @param type (String): field type
     * @param field (String): item field
     * @param value (String): item value
     * @param onBlur (Boolean): true if function has been called on blur event
     */
    this.edit = function(type, 
                         field,
                         value, 
                         onBlur){
        onBlur = onBlur === undefined ? false:true;
        
        this.ajaxRequestInProgress !== undefined && !onBlur ? this.ajaxRequestInProgress.abort():'';
        this.ajaxRequestTimeout !== undefined ? clearTimeout(this.ajaxRequestTimeout):'';
        
        switch (field){
            case 'name':
                $('#DOPBSP-discount-ID-1 .dopbsp-name').html(value === '' ? '&nbsp;':value);
                break;
        }
        
        switch (type){
            case 'switch':
                value = $('#DOPBSP-discount-'+field+'-1').is(':checked') ? 'true':'false';
                break;
        }
        
        if (onBlur 
                || type === 'select' 
                || type === 'switch'){
            if (!onBlur){
                DOPBSP.toggleMessages('active-info', DOPBSP.text('MESSAGES_SAVING'));
            }
            
            $.post(ajaxurl, {action: 'dopbsp_discount_edit',
                             field: field,
                             value: value}, function(data){
                if (!onBlur){
                    DOPBSP.toggleMessages('success', DOPBSP.text('MESSAGES_SAVING_SUCCESS'));
                }
            }).fail(function(data){
                DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
            });
        }
        else{
            DOPBSP.toggleMessages('active-info', DOPBSP.text('MESSAGES_SAVING'));

            this.ajaxRequestTimeout = setTimeout(function(){
                clearTimeout(this.ajaxRequestTimeout);

                this.ajaxRequestInProgress = $.post(ajaxurl, {action: 'dopbsp_discount_edit',
                                                              field: field,
                                                              value: value}, function(data){
                    DOPBSP.toggleMessages('success', DOPBSP.text('MESSAGES_SAVING_SUCCESS'));
                }).fail(function(data){
                    DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
                });
            }, 600);
        }
    };

    return this.DOPBSPDiscount();
};