/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : assets/js/discounts/backend-discount-item-rule.js
* File Version            : 1.0.3
* Created / Last Modified : 25 September 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end discount item rule JavaScript class.
*/

var DOPBSPDiscountItemRule = new function(){
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
    this.DOPBSPDiscountItemRule = function(){
    };
    
    /*
     * Initialize events and validations.
     */
    this.init = function(){
        var dayNames = [DOPBSP.text('DAY_SUNDAY'),
                        DOPBSP.text('DAY_MONDAY'),
                        DOPBSP.text('DAY_TUESDAY'),
                        DOPBSP.text('DAY_WEDNESDAY'),
                        DOPBSP.text('DAY_THURSDAY'),
                        DOPBSP.text('DAY_FRIDAY'),
                        DOPBSP.text('DAY_SATURDAY')],
        dayShortNames = [DOPBSP.text('SHORT_DAY_SUNDAY'),
                         DOPBSP.text('SHORT_DAY_MONDAY'),
                         DOPBSP.text('SHORT_DAY_TUESDAY'),
                         DOPBSP.text('SHORT_DAY_WEDNESDAY'),
                         DOPBSP.text('SHORT_DAY_THURSDAY'),
                         DOPBSP.text('SHORT_DAY_FRIDAY'),
                         DOPBSP.text('SHORT_DAY_SATURDAY')],
        monthNames = [DOPBSP.text('MONTH_JANUARY'),
                      DOPBSP.text('MONTH_FEBRUARY'),
                      DOPBSP.text('MONTH_MARCH'),
                      DOPBSP.text('MONTH_APRIL'),
                      DOPBSP.text('MONTH_MAY'),
                      DOPBSP.text('MONTH_JUNE'),
                      DOPBSP.text('MONTH_JULY'),
                      DOPBSP.text('MONTH_AUGUST'),
                      DOPBSP.text('MONTH_SEPTEMBER'),
                      DOPBSP.text('MONTH_OCTOBER'),
                      DOPBSP.text('MONTH_NOVEMBER'),
                      DOPBSP.text('MONTH_DECEMBER')],
        monthShortNames = [DOPBSP.text('SHORT_MONTH_JANUARY'),
                           DOPBSP.text('SHORT_MONTH_FEBRUARY'),
                           DOPBSP.text('SHORT_MONTH_MARCH'),
                           DOPBSP.text('SHORT_MONTH_APRIL'),
                           DOPBSP.text('SHORT_MONTH_MAY'),
                           DOPBSP.text('SHORT_MONTH_JUNE'),
                           DOPBSP.text('SHORT_MONTH_JULY'),
                           DOPBSP.text('SHORT_MONTH_AUGUST'),
                           DOPBSP.text('SHORT_MONTH_SEPTEMBER'),
                           DOPBSP.text('SHORT_MONTH_OCTOBER'),
                           DOPBSP.text('SHORT_MONTH_NOVEMBER'),
                           DOPBSP.text('SHORT_MONTH_DECEMBER')],
        id,
        startDate,
        minDate;
                       
        $('.DOPBSP-discount-item-rule-start-date').each(function(){
            $(this).datepicker('destroy');                      
            $(this).datepicker({beforeShow: function(input, inst){
                                    $('#ui-datepicker-div').removeClass('DOPBSP-admin-datepicker')
                                                           .addClass('DOPBSP-admin-datepicker');
                               },
                               dateFormat: 'yy-mm-dd',
                               dayNames: dayNames,
                               dayNamesMin: dayShortNames,
                               firstDay: 1,
                               minDate: 0,
                               monthNames: monthNames,
                               monthNamesMin: monthShortNames,
                               nextText: '',
                               prevText: ''});
                           
            $(this).unbind('change');
            $(this).bind('change', function(){
                id = $(this).attr('id').split('DOPBSP-discount-item-rule-start-date-')[1];
                $('#DOPBSP-discount-item-rule-end-date-'+id).val('');
                DOPBSPDiscountItemRule.init();
            });
        });
        
        $('.DOPBSP-discount-item-rule-end-date').each(function(){
            id = $(this).attr('id').split('DOPBSP-discount-item-rule-end-date-')[1];
            startDate = $('#DOPBSP-discount-item-rule-start-date-'+id); 
            minDate = startDate.val() === '' ? 0:DOPPrototypes.getDatesDifference(DOPPrototypes.getToday(), startDate.val(), 'days', 'integer');

            $(this).datepicker('destroy');                      
            $(this).datepicker({beforeShow: function(input, inst){
                                    $('#ui-datepicker-div').removeClass('DOPBSP-admin-datepicker')
                                                           .addClass('DOPBSP-admin-datepicker');
                               },
                               dateFormat: 'yy-mm-dd',
                               dayNames: dayNames,
                               dayNamesMin: dayShortNames,
                               firstDay: 1,
                               minDate: minDate,
                               monthNames: monthNames,
                               monthNamesMin: monthShortNames,
                               nextText: '',
                               prevText: ''});
        });
        
        $('.ui-datepicker').removeClass('notranslate').addClass('notranslate');
        
        /*
         * Price validation.
         */
        $('.DOPBSP-input-discount-item-rule-price').unbind('input propertychange');
        $('.DOPBSP-input-discount-item-rule-price').bind('input propertychange', function(){
            DOPPrototypes.cleanInput($(this), '0123456789.', '', '0');
        });
    };
    
    /*
     * Add discount item rule.
     * 
     * @param itemId (Number): item ID
     * @param language (String): discount current selected language
     */
    this.add = function(itemId,
                        language){
        DOPBSP.toggleMessages('active', DOPBSP.text('DISCOUNTS_DISCOUNT_ITEM_ADD_RULE_ADDING'));
        
        $.post(ajaxurl, {action:'dopbsp_discount_item_rule_add',
                         item_id: itemId,
                         position: $('#DOPBSP-discount-item-id-'+itemId+' li.dopbsp-item-rule-wrapper').size()+1,
                         language: language}, function(data){
            $('#DOPBSP-discount-item-rules-'+itemId).append(data);
            
            DOPBSPDiscountItemRule.init();
            DOPBSP.toggleMessages('success', DOPBSP.text('DISCOUNTS_DISCOUNT_ITEM_ADD_RULE_SUCCESS'));
        }).fail(function(data){
            DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
        });
    };

    /*
     * Edit discount item rule.
     * 
     * @param id (Number): item rule ID
     * @param type (String): field type
     * @param field (String): item rule field
     * @param value (String): item rule value
     * @param onBlur (Boolean): true if function has been called on blur event
     */
    this.edit = function(id, 
                         type, 
                         field,
                         value, 
                         onBlur){
        onBlur = onBlur === undefined ? false:true;
        
        this.ajaxRequestInProgress !== undefined && !onBlur ? this.ajaxRequestInProgress.abort():'';
        this.ajaxRequestTimeout !== undefined ? clearTimeout(this.ajaxRequestTimeout):'';
        
        if (onBlur 
                || type === 'select' 
                || type === 'switch'){
            if (!onBlur){
                DOPBSP.toggleMessages('active-info', DOPBSP.text('MESSAGES_SAVING'));
            }
            
            $.post(ajaxurl, {action: 'dopbsp_discount_item_rule_edit',
                             id: id,
                             field: field,
                             value: value,
                             language: $('#DOPBSP-discount-language').val()}, function(data){
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

                this.ajaxRequestInProgress = $.post(ajaxurl, {action: 'dopbsp_discount_item_rule_edit',
                                                              id: id,
                                                              field: field,
                                                              value: value,
                                                              language: $('#DOPBSP-discount-language').val()}, function(data){
                    DOPBSP.toggleMessages('success', DOPBSP.text('MESSAGES_SAVING_SUCCESS'));
                }).fail(function(data){
                    DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
                });
            }, 600);
        }
    };
    
    /*
     * Delete discount item rule.
     * 
     * @param id (Number): item rule ID
     */
    this.delete = function(id){
        DOPBSP.toggleMessages('active', DOPBSP.text('DISCOUNTS_DISCOUNT_ITEM_DELETE_RULE_DELETING'));

        $.post(ajaxurl, {action:'dopbsp_discount_item_rule_delete', 
                         id: id}, function(data){
            $('#DOPBSP-discount-item-rule-'+id).stop(true, true)
                                               .animate({'opacity':0}, 
                                               600, function(){
                $(this).remove();
            });
            DOPBSP.toggleMessages('success', DOPBSP.text('DISCOUNTS_DISCOUNT_ITEM_DELETE_RULE_SUCCESS'));
        }).fail(function(data){
            DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
        });
    };
    
    return this.DOPBSPDiscountItemRule();
};