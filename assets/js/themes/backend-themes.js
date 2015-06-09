/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : assets/js/themes/backend-themes.js
* File Version            : 1.0.2
* Created / Last Modified : 19 January 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end themes JavaScript class.
*/

var DOPBSPThemes = new function(){
    'use strict';
    
    /*
     * Private variables.
     */
    var $ = jQuery.noConflict();
        
    /*
     * Constructor
     */
    this.DOPBSPThemes = function(){
    };
    
    /*
     * Display themes.
     */
    this.display = function(){
        DOPBSP.clearColumns(1);
        DOPBSP.toggleMessages('active', DOPBSP.text('MESSAGES_LOADING'));

        $.post(ajaxurl, {action: 'dopbsp_themes_display'}, function(data){
            var content = '';
            
            data = $.trim(data);
            
            if (data === 'error'){
                DOPBSP.toggleMessages('error', DOPBSP.text('THEMES_LOAD_ERROR'));
            }
            else{
                content = data.split(';;;;;;;');

                $('#DOPBSP-column1 .dopbsp-column-content').html(content[0]);
                $('#DOPBSP-column2 .dopbsp-column-content').html(content[1]);
                $('.DOPBSP-admin .dopbsp-main').css('display', 'block');

                DOPBSPThemes.init();

                DOPBSP.toggleMessages('success', DOPBSP.text('THEMES_LOAD_SUCCESS'));
            }
        }).fail(function(data){
            DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
        });
    };
    
    /*
     * Initialize themes.
     */
    this.init = function(){
        $('#DOPBSP-themes-list').isotope({layoutMode: 'fitRows',
                                          transitionDuration: 0});
        
        DOPBSPThemes.events();
    };
    
    /*
     * Initialize themes events.
     */
    this.events = function(){
        $('#DOPBSP-inputs-themes-filters-tags .dopbsp-input-wrapper').unbind('click');
        $('#DOPBSP-inputs-themes-filters-tags .dopbsp-input-wrapper').bind('click', function(){
            var filters = new Array();
            
            if ($(this).attr('data-filter') === '.dopbsp-all'){
                $('#DOPBSP-inputs-themes-filters-tags .dopbsp-input-wrapper').removeClass('dopbsp-selected');
                $('#DOPBSP-inputs-themes-filters-tags .dopbsp-input-wrapper input[type="checkbox"]').removeAttr('checked');
            }
            else{
                $('#DOPBSP-inputs-themes-filters-tags .dopbsp-input-wrapper:first-child').removeClass('dopbsp-selected');
                $('#DOPBSP-inputs-themes-filters-tags .dopbsp-input-wrapper:first-child input[type="checkbox"]').removeAttr('checked');
            }

            if ($(this).hasClass('dopbsp-selected')){
                $(this).removeClass('dopbsp-selected');
                $('input[type="checkbox"]', this).removeAttr('checked');
            }
            else{
                $(this).addClass('dopbsp-selected');
                $('input[type="checkbox"]', this).attr('checked', 'checked');
            }

            $('#DOPBSP-inputs-themes-filters-tags .dopbsp-input-wrapper').each(function(){
                if ($(this).hasClass('dopbsp-selected')){
                    filters.push($(this).attr('data-filter'));
                }
            });

            $('#DOPBSP-themes-list').isotope({filter: filters.join('')});
        });
        
    };
    
    /*
     * Search themes.
     */
    this.search = function(){
        var filters = new Array(),
        i = 0,
        searchRegex = new RegExp($('#DOPBSP-themes-search').val(), 'gi');

        $('#DOPBSP-inputs-themes-filters-tags .dopbsp-input-wrapper').removeClass('dopbsp-selected');
        $('#DOPBSP-inputs-themes-filters-tags .dopbsp-input-wrapper input[type="checkbox"]').removeAttr('checked');
        $('#DOPBSP-inputs-themes-filters-tags .dopbsp-input-wrapper:first-child').addClass('dopbsp-selected');
        $('#DOPBSP-inputs-themes-filters-tags .dopbsp-input-wrapper:first-child input[type="checkbox"]').attr('checked', 'checked');
                
        $('#DOPBSP-themes-list .dopbsp-theme').each(function(){
            i++;
            
            if ($(this).text().match(searchRegex) !== null){
                filters.push('.dopbsp-theme-'+i);
            }
        });
        
        $('#DOPBSP-themes-list').isotope({filter: (filters.length > 0 ? filters.join(','):true)});
    };
    
    return this.DOPBSPThemes();
};