/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : assets/js/forms/backend-form-field-select-options.js
* File Version            : 1.0.2
* Created / Last Modified : 23 September 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end form field select options JavaScript class.
*/


var DOPBSPFormFieldSelectOptions = new function(){
    'use strict';
    
    /*
     * Private variables
     */
    var $ = jQuery.noConflict();
    
    /*
     * Constructor
     */
    this.DOPBSPFormFieldSelectOptions = function(){
    };
    
    /*
     * Initialize form field select options sort.
     */
    this.init = function(){
        $('#DOPBSP-form-fields .dopbsp-select-options').sortable({handle: '.dopbsp-handle',
                                                                  opacity: 0.75,
                                                                  placeholder: 'dopbsp-placeholder',
                                                                  update: function(e, ui){
                                                                         var ids = new Array();

                                                                         DOPBSP.toggleMessages('active-info', DOPBSP.text('MESSAGES_SAVING'));
                                                                         DOPBSPFormField.setSelectPreview($('#'+e.target.id).attr('id').split('DOPBSP-form-field-select-options-')[1]);

                                                                         $('#'+e.target.id+' li').each(function(){
                                                                             if (!$(this).hasClass('dopbsp-placeholder')){
                                                                                 ids.push($(this).attr('id').split('DOPBSP-form-field-select-option-')[1]);
                                                                             }
                                                                         });

                                                                         $.post(ajaxurl, {action: 'dopbsp_form_field_select_options_sort',
                                                                                          ids: ids.join(',')}, function(data){
                                                                             DOPBSP.toggleMessages('success', DOPBSP.text('MESSAGES_SAVING_SUCCESS'));
                                                                         }).fail(function(data){
                                                                             DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
                                                                         });
                                                                  }});
    };
    
    return this.DOPBSPFormFieldSelectOptions();
};