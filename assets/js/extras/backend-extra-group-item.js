/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : assets/js/extras/backend-extra-group-item.js
* File Version            : 1.0.3
* Created / Last Modified : 25 September 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end extra group item JavaScript class.
*/

var DOPBSPExtraGroupItem = new function(){
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
    this.DOPBSPExtraGroupItem = function(){
    };
    
    /*
     * Initialize validations.
     */
    this.init = function(){
        /*
         * Price validation.
         */
        $('.DOPBSP-input-extra-group-item-price').unbind('input propertychange');
        $('.DOPBSP-input-extra-group-item-price').bind('input propertychange', function(){
            DOPPrototypes.cleanInput($(this), '0123456789.', '', '0');
        });
    };
    
    /*
     * Add extra group item.
     * 
     * @param groupId (Number): group ID
     * @param language (String): extra current selected language
     */
    this.add = function(groupId,
                        language){
        DOPBSP.toggleMessages('active', DOPBSP.text('EXTRAS_EXTRA_GROUP_ADD_ITEM_ADDING'));
        
        $.post(ajaxurl, {action:'dopbsp_extra_group_item_add',
                         group_id: groupId,
                         position: $('#DOPBSP-extra-group-id-'+groupId+' li.dopbsp-group-item-wrapper').size()+1,
                         language: language}, function(data){
            $('#DOPBSP-extra-group-items-'+groupId).append(data);
            
            DOPBSP.toggleMessages('success', DOPBSP.text('EXTRAS_EXTRA_GROUP_ADD_ITEM_SUCCESS'));
        }).fail(function(data){
            DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
        });
    };

    /*
     * Edit extra group item.
     * 
     * @param id (Number): group item ID
     * @param type (String): field type
     * @param field (String): group item field
     * @param value (String): group item value
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
            
            $.post(ajaxurl, {action: 'dopbsp_extra_group_item_edit',
                             id: id,
                             field: field,
                             value: value,
                             language: $('#DOPBSP-extra-language').val()}, function(data){
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

                this.ajaxRequestInProgress = $.post(ajaxurl, {action: 'dopbsp_extra_group_item_edit',
                                                              id: id,
                                                              field: field,
                                                              value: value,
                                                              language: $('#DOPBSP-extra-language').val()}, function(data){
                    DOPBSP.toggleMessages('success', DOPBSP.text('MESSAGES_SAVING_SUCCESS'));
                }).fail(function(data){
                    DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
                });
            }, 600);
        }
    };
    
    /*
     * Delete extra group item.
     * 
     * @param id (Number): group item ID
     */
    this.delete = function(id){
        DOPBSP.toggleMessages('active', DOPBSP.text('EXTRAS_EXTRA_GROUP_DELETE_ITEM_DELETING'));

        $.post(ajaxurl, {action:'dopbsp_extra_group_item_delete', 
                         id: id}, function(data){
            $('#DOPBSP-extra-group-item-'+id).stop(true, true)
                                             .animate({'opacity':0}, 
                                             600, function(){
                $(this).remove();
            });
            DOPBSP.toggleMessages('success', DOPBSP.text('EXTRAS_EXTRA_GROUP_DELETE_ITEM_SUCCESS'));
        }).fail(function(data){
            DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
        });
    };
    
    return this.DOPBSPExtraGroupItem();
};