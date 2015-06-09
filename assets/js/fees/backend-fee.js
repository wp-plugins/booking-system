/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : assets/js/fees/backend-fee.js
* File Version            : 1.0.4
* Created / Last Modified : 23 October 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end fee JavaScript class.
*/


var DOPBSPFee = new function(){
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
    this.DOPBSPFee = function(){
    };
    
    /*
     * Display fee.
     * 
     * @param language (String): fee current editing language
     * @param clearFee (Boolean): clear fee extra data diplay
     */
    this.display = function(language,
                            clearFee){
        var HTML = new Array();
        
        language = language === undefined ? ($('#DOPBSP-fee-language').val() === undefined ? '':$('#DOPBSP-fee-language').val()):language;
        clearFee = clearFee === undefined ? true:false;
        language = clearFee ? '':language;
        
        if (clearFee){
            DOPBSP.clearColumns(2);
        }
        DOPBSP.toggleMessages('active', DOPBSP.text('MESSAGES_LOADING'));
        
        $('#DOPBSP-column1 .dopbsp-column-content li').removeClass('dopbsp-selected');
        $('#DOPBSP-fee-ID-1').addClass('dopbsp-selected');
        $('#DOPBSP-fee-ID').val(1);
        
        $.post(ajaxurl, {action: 'dopbsp_fee_display', 
                         language: language}, function(data){
            HTML.push('<a href="'+DOPBSP_CONFIG_HELP_DOCUMENTATION_URL+'" target="_blank" class="dopbsp-button dopbsp-help">');
            HTML.push(' <span class="dopbsp-info dopbsp-help">');
            HTML.push(DOPBSP.text('HELP_VIEW_DOCUMENTATION'));
            HTML.push(' </span>');
            HTML.push('</a>');
            
            $('#DOPBSP-column2 .dopbsp-column-header').html(HTML.join(''));
            $('#DOPBSP-column2 .dopbsp-column-content').html(data);
            
            DOPBSPFee.init();
            DOPBSP.toggleMessages('success', DOPBSP.text('FEES_FEE_LOADED'));
        }).fail(function(data){
            DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
        });
    };
    
    /*
     * Initialize validations.
     */
    this.init = function(){
        /*
         * Price validation.
         */
        $('.DOPBSP-input-fee-price').unbind('input propertychange');
        $('.DOPBSP-input-fee-price').bind('input propertychange', function(){
            DOPPrototypes.cleanInput($(this), '0123456789.', '', '0');
        });
    };

    /*
     * Edit fee.
     * 
     * @param type (String): field type
     * @param field (String): group field
     * @param value (String): group value
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
                $('#DOPBSP-fee-ID-1 .dopbsp-name').html(value === '' ? '&nbsp;':value);
                break;
        }
        
        switch (type){
            case 'switch':
                value = $('#DOPBSP-fee-'+field+'-1').is(':checked') ? 'true':'false';
                break;
        }
        
        if (onBlur 
                || type === 'select' 
                || type === 'switch'){
            if (!onBlur){
                DOPBSP.toggleMessages('active-info', DOPBSP.text('MESSAGES_SAVING'));
            }
            
            $.post(ajaxurl, {action: 'dopbsp_fee_edit',
                             field: field,
                             value: value,
                             language: $('#DOPBSP-fee-language').val()}, function(data){
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

                this.ajaxRequestInProgress = $.post(ajaxurl, {action: 'dopbsp_fee_edit',
                                                              field: field,
                                                              value: value,
                                                              language: $('#DOPBSP-fee-language').val()}, function(data){
                    DOPBSP.toggleMessages('success', DOPBSP.text('MESSAGES_SAVING_SUCCESS'));
                }).fail(function(data){
                    DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
                });
            }, 600);
        }
    };

    return this.DOPBSPFee();
};