/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 1.0
* File                    : tinymce-plugin.php
* File Version            : 1.0
* Created / Last Modified : 29 July 2013
* Author                  : Dot on Paper
* Copyright               : © 2013 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : TinyMCE Editor Plugin.
*/

(function(){
    var title, i,
    calendarsData,
    calendars = new Array();

    tinymce.create('tinymce.plugins.DOPBS', {
        init:function(ed, url){
            title = DOPBS_tinyMCE_data.split(';;;;;')[0];
            calendarsData = DOPBS_tinyMCE_data.split(';;;;;')[1];
            calendars = calendarsData.split(';;;');
        },

        createControl:function(n, cm){// Init Combo Box.
            switch (n){
                case 'DOPBS':
                    if (calendarsData != ''){
                        var mlb = cm.createListBox('DOPBS', {
                             title: title,
                             onselect: function(value){
                                 tinyMCE.activeEditor.selection.setContent(value);
                             }
                        });

                        for (i=0; i<calendars.length; i++){
                            if (calendars[i] != ''){
                                mlb.add(calendars[i].split(';;')[1], '[dopbs]');
                            }
                        }

                        return mlb;
                    }
            }

            return null;
        },

        getInfo:function(){
            return {longname  : 'Booking System',
                    author    : 'Dot on Paper',
                    authorurl : 'http://www.dotonpaper.net',
                    infourl   : 'http://www.dotonpaper.net',
                    version   : '1.0'};
        }
    });

    tinymce.PluginManager.add('DOPBS', tinymce.plugins.DOPBS);
})();