/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : assets/js/settings/backend-tools-repair-database-text.js
* File Version            : 1.0
* Created / Last Modified : 12 October 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end repair database & text JavaScript class.
*/

var DOPBSPToolsRepairDatabaseText = new function(){
    'use strict';
    
    /*
     * Private variables
     */
    var $ = jQuery.noConflict();
    
    /*
     * Constructor
     */
    this.DOPBSPToolsRepairDatabaseText = function(){
    };
    
    /*
     * Set verify & repair to database & text.
     */
    this.set = function(no){
        DOPBSP.toggleMessages('active', DOPBSP.text('TOOLS_REPAIR_DATABASE_TEXT_REPAIRING', 'Verifying and repairing the database & the text ...'));
        
        $.post(ajaxurl, {action: 'dopbsp_tools_repair_database_text_set',
                         dopbsp_repair_database_text: true}, function(data){
            DOPBSP.toggleMessages('active', DOPBSP.text('TOOLS_REPAIR_DATABASE_TEXT_SUCCESS', 'The database & the text have been verified and repaired. The page will redirect shortly to Dashboard.'));

            setTimeout(function(){
                window.location.href = $.trim(data);
            }, 300);
        }).fail(function(data){
            DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
        });
    };
    
    return this.DOPBSPToolsRepairDatabaseText();
};