/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : assets/js/forms/backend-form-field.js
* File Version            : 1.0.4
* Created / Last Modified : 25 September 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end form field JavaScript class.
*/

var DOPBSPFormField = new function(){
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
    this.DOPBSPFormField = function(){
    };
    
    /*
     * Add form field.
     * 
     * @param type (String): form field type
     * @param language (String): form current selected language
     */
    this.add = function(type,
                        language){
        DOPBSP.toggleMessages('active', DOPBSP.text('FORMS_FORM_ADD_FIELD_ADDING'));
        
        $.post(ajaxurl, {action:'dopbsp_form_field_add',
                         type: type,
                         position: $('#DOPBSP-form-fields li.dopbsp-field-wrapper').size()+1,
                         language: language}, function(data){
            $('#DOPBSP-form-fields').append(data);
            
            DOPPrototypes.scrollToY($('#DOPBSP-form-fields li.dopbsp-field-wrapper:last-child').offset().top-100);
            DOPBSP.toggleMessages('success', DOPBSP.text('FORMS_FORM_ADD_FIELD_SUCCESS'));
        }).fail(function(data){
            DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
        });
        
    };

    /*
     * Edit form field.
     * 
     * @param id (Number): field ID
     * @param type (String): field type
     * @param field (String): field setting
     * @param value (String): field setting value
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
        
        switch (field){
            case 'label':
                $('#DOPBSP-form-field-label-preview-'+id).html(value);
                break;
            case 'is_email':
                value = $('#DOPBSP-form-field-is_email-'+id).is(':checked') ? 'true':'false';
                break;
            case 'multiple_select':
                this.setSelectPreview(id);
                value = $('#DOPBSP-form-field-multiple_select-'+id).is(':checked') ? 'true':'false';
                break;
            case 'required':
                value = $('#DOPBSP-form-field-required-'+id).is(':checked') ? 'true':'false';
                $('#DOPBSP-form-field-label-preview-'+id+' .dopbsp-required').html(value === 'true' ? '*':'');
                break;
            case 'add_to_day_hour_info':
                value = $('#DOPBSP-form-field-add_to_day_hour_info-'+id).is(':checked') ? 'true':'false';
                break;
            case 'add_to_day_hour_body':
                value = $('#DOPBSP-form-field-add_to_day_hour_body-'+id).is(':checked') ? 'true':'false';
                break;
        }
        
        if (onBlur 
                || type === 'select' 
                || type === 'switch'){
            if (!onBlur){
                DOPBSP.toggleMessages('active-info', DOPBSP.text('MESSAGES_SAVING'));
            }
            
            $.post(ajaxurl, {action: 'dopbsp_form_field_edit',
                             id: id,
                             field: field,
                             value: value,
                             language: $('#DOPBSP-form-language').val()}, function(data){
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

                this.ajaxRequestInProgress = $.post(ajaxurl, {action: 'dopbsp_form_field_edit',
                                                              id: id,
                                                              field: field,
                                                              value: value,
                                                              language: $('#DOPBSP-form-language').val()}, function(data){
                    DOPBSP.toggleMessages('success', DOPBSP.text('MESSAGES_SAVING_SUCCESS'));
                }).fail(function(data){
                    DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
                });
            }, 600);
        }
    };
    
    /*
     * Delete form field.
     * 
     * @param id (Number): form field ID
     */
    this.delete = function(id){
        DOPBSP.toggleMessages('active', DOPBSP.text('FORMS_FORM_DELETE_FIELD_DELETING'));

        $.post(ajaxurl, {action:'dopbsp_form_field_delete', 
                         id: id}, function(data){
            $('#DOPBSP-form-field-'+id).stop(true, true)
                                       .animate({'opacity':0}, 
                                       600, function(){
                $(this).remove();
            });
            DOPBSP.toggleMessages('success', DOPBSP.text('FORMS_FORM_DELETE_FIELD_SUCCESS'));
        }).fail(function(data){
            DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
        });
    };

    /*
     * Toggle form field.
     * 
     * @param id (Number): form field ID
     */
    this.toggle = function(id){
        if ($('#DOPBSP-form-field-'+id).hasClass('dopbsp-displayed')){
            $('#DOPBSP-form-field-'+id).removeClass('dopbsp-displayed');
            $('#DOPBSP-form-field-'+id+' .dopbsp-preview-wrapper .dopbsp-buttons-wrapper .dopbsp-toggle .dopbsp-info').html(DOPBSP.text('FORMS_FORM_FIELD_SHOW_SETTINGS'));
        }
        else{
            $('#DOPBSP-form-field-'+id).addClass('dopbsp-displayed');
            $('#DOPBSP-form-field-'+id+' .dopbsp-preview-wrapper .dopbsp-buttons-wrapper .dopbsp-toggle .dopbsp-info').html(DOPBSP.text('FORMS_FORM_FIELD_HIDE_SETTINGS'));
        }
    };

    /*
     * Create select preview.
     * 
     * @param id (Number): form field ID
     */
    this.setSelectPreview = function(id){
        var HTML = new Array(),
        optionId,
        i = 0;

        HTML.push('<select name="DOPBSP-form-field-preview-'+id+'" id="DOPBSP-form-field-preview-'+id+'" value="" disabled="disabled" '+($('#DOPBSP-form-field-multiple_select-'+id).is(':checked') ? ' multiple="multiple"':'')+'>');
                            
        $('#DOPBSP-form-field-select-options-'+id+' li').each(function(){
            if (!$(this).hasClass('dopbsp-placeholder')){
                i++;
                optionId = $(this).attr('id').split('DOPBSP-form-field-select-option-')[1];
                HTML.push('<option value="'+i+'">'+$('#DOPBSP-form-field-select-option-label-'+optionId).val()+'</option>');
            }
        });
        HTML.push('</select>');
        
        $('#DOPSelect-DOPBSP-form-field-preview-'+id).replaceWith(HTML.join(''));
        $('#DOPBSP-form-field-preview-'+id).DOPSelect();
    };
    
    return this.DOPBSPFormField();
};