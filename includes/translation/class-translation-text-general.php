<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/translation/class-translation-text-general.php
* File Version            : 1.0.3
* Created / Last Modified : 12 December 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System general translation text PHP class.
*/

    if (!class_exists('DOPBSPTranslationTextGeneral')){
        class DOPBSPTranslationTextGeneral{
            /*
             * Constructor
             */
            function DOPBSPTranslationTextGeneral(){
                /*
                 * Initialize general text.
                 */
                add_filter('dopbsp_filter_translation_text', array(&$this, 'general'));
            }
            
            /*
             * General text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function general($text){
                array_push($text, array('key' => 'TITLE',
                                        'parent' => 'none',
                                        'text' => 'Booking System'));
                
                /*
                 * PRO
                 */
                array_push($text, array('key' => 'PARENT_PRO_VERSION',
                                        'parent' => '',
                                        'text' => 'PRO Version'));
                array_push($text, array('key' => 'LOCATIONS_TITLE',
                                        'parent' => 'PARENT_PRO_VERSION',
                                        'text' => 'Locations'));
                array_push($text, array('key' => 'ONLY_IN_PRO_TITLE',
                                        'parent' => 'PARENT_PRO_VERSION',
                                        'text' => 'only in PRO'));
                array_push($text, array('key' => 'ONLY_IN_PRO_MESSAGE',
                                        'parent' => 'PARENT_PRO_VERSION',
                                        'text' => 'This feature exist only in PRO version.'));
                array_push($text, array('key' => 'ONLY_IN_PRO_MESSAGE_ONLY',
                                        'parent' => 'PARENT_PRO_VERSION',
                                        'text' => 'only'));
                array_push($text, array('key' => 'ONLY_IN_PRO_MESSAGE_PRO',
                                        'parent' => 'PARENT_PRO_VERSION',
                                        'text' => 'PRO'));
                
                /*
                 * Messages
                 */
                array_push($text, array('key' => 'PARENT_MESSAGES',
                                        'parent' => '',
                                        'text' => 'Messages'));
                
                array_push($text, array('key' => 'MESSAGES_LOADING',
                                        'parent' => 'PARENT_MESSAGES',
                                        'text' => 'Loading data ...'));
                array_push($text, array('key' => 'MESSAGES_LOADING_SUCCESS',
                                        'parent' => 'PARENT_MESSAGES',
                                        'text' => 'Data has been loaded.'));
                array_push($text, array('key' => 'MESSAGES_SAVING',
                                        'parent' => 'PARENT_MESSAGES',
                                        'text' => 'Saving data ...'));
                array_push($text, array('key' => 'MESSAGES_SAVING_SUCCESS',
                                        'parent' => 'PARENT_MESSAGES',
                                        'text' => 'Data has been saved.'));
                
                array_push($text, array('key' => 'MESSAGES_CONFIRMATION_YES',
                                        'parent' => 'PARENT_MESSAGES',
                                        'text' => 'Yes'));
                array_push($text, array('key' => 'MESSAGES_CONFIRMATION_NO',
                                        'parent' => 'PARENT_MESSAGES',
                                        'text' => 'No'));
                
                /*
                 * Months & week days
                 */
                array_push($text, array('key' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'parent' => '',
                                        'text' => 'Months & Week Days'));
                
                array_push($text, array('key' => 'MONTH_JANUARY',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'January',
                                        'de' => 'Januar',
                                        'nl' => 'Januari',
                                        'fr' => 'Janvier',
                                        'pl' => 'Styczeń'));
                array_push($text, array('key' => 'MONTH_FEBRUARY',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'February',
                                        'de' => 'Februar',
                                        'nl' => 'Februari',
                                        'fr' => 'Février',
                                        'pl' => 'Luty'));
                array_push($text, array('key' => 'MONTH_MARCH',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'March',
                                        'de' => 'März',
                                        'nl' => 'Maart',
                                        'fr' => 'Mars',
                                        'pl' => 'Marzec'));
                array_push($text, array('key' => 'MONTH_APRIL',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'April',
                                        'de' => 'April',
                                        'nl' => 'April',
                                        'fr' => 'Avril',
                                        'pl' => 'Kwiecień'));
                array_push($text, array('key' => 'MONTH_MAY',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'May',
                                        'de' => 'Mai',
                                        'nl' => 'Mei',
                                        'fr' => 'Mai',
                                        'pl' => 'Maj'));
                array_push($text, array('key' => 'MONTH_JUNE',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'June',
                                        'de' => 'Juni',
                                        'nl' => 'Juni',
                                        'fr' => 'Juin',
                                        'pl' => 'Czerwiec'));
                array_push($text, array('key' => 'MONTH_JULY',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'July',
                                        'de' => 'Juli',
                                        'nl' => 'Juli',
                                        'fr' => 'Juillet',
                                        'pl' => 'Lipiec'));
                array_push($text, array('key' => 'MONTH_AUGUST',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'August',
                                        'de' => 'August',
                                        'nl' => 'Augustus',
                                        'fr' => 'Août',
                                        'pl' => 'Sierpień'));
                array_push($text, array('key' => 'MONTH_SEPTEMBER',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'September',
                                        'de' => 'September',
                                        'nl' => 'September',
                                        'fr' => 'Septembre',
                                        'pl' => 'Wrzesień'));
                array_push($text, array('key' => 'MONTH_OCTOBER',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'October',
                                        'de' => 'Oktober',
                                        'nl' => 'Oktober',
                                        'fr' => 'Octobre',
                                        'pl' => 'Październik'));
                array_push($text, array('key' => 'MONTH_NOVEMBER',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'November',
                                        'de' => 'November',
                                        'nl' => 'November',
                                        'fr' => 'Novembre',
                                        'pl' => 'Listopad'));
                array_push($text, array('key' => 'MONTH_DECEMBER',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'December',
                                        'de' => 'Dezember',
                                        'nl' => 'December',
                                        'fr' => 'Décembre',
                                        'pl' => 'Grudzień'));
    
                array_push($text, array('key' => 'SHORT_MONTH_JANUARY',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'Jan',
                                        'de' => 'Jan',
                                        'nl' => 'Jan',
                                        'fr' => 'Jan',
                                        'pl' => 'Sty'));
                array_push($text, array('key' => 'SHORT_MONTH_FEBRUARY',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'Feb',
                                        'de' => 'Feb',
                                        'nl' => 'Feb',
                                        'fr' => 'Fev',
                                        'pl' => 'Lut'));
                array_push($text, array('key' => 'SHORT_MONTH_MARCH',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'Mar',
                                        'de' => 'Mär',
                                        'nl' => 'Mar',
                                        'fr' => 'Mar',
                                        'pl' => 'Mar'));
                array_push($text, array('key' => 'SHORT_MONTH_APRIL',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'Apr',
                                        'de' => 'Apr',
                                        'nl' => 'Apr',
                                        'fr' => 'Avr',
                                        'pl' => 'Kwi'));
                array_push($text, array('key' => 'SHORT_MONTH_MAY',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'May',
                                        'de' => 'Mai',
                                        'nl' => 'Mei',
                                        'fr' => 'Mai',
                                        'pl' => 'Maj'));
                array_push($text, array('key' => 'SHORT_MONTH_JUNE',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'Jun',
                                        'de' => 'Jun',
                                        'nl' => 'Jun',
                                        'fr' => 'Jun',
                                        'pl' => 'Cze'));
                array_push($text, array('key' => 'SHORT_MONTH_JULY',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'Jul',
                                        'de' => 'Jul',
                                        'nl' => 'Jul',
                                        'fr' => 'Jui',
                                        'pl' => 'Lip'));
                array_push($text, array('key' => 'SHORT_MONTH_AUGUST',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'Aug',
                                        'de' => 'Aug',
                                        'nl' => 'Aug',
                                        'fr' => 'Aou',
                                        'pl' => 'Sie'));
                array_push($text, array('key' => 'SHORT_MONTH_SEPTEMBER',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'Sep',
                                        'de' => 'Sep',
                                        'nl' => 'Sep',
                                        'fr' => 'Sep',
                                        'pl' => 'Wrz'));
                array_push($text, array('key' => 'SHORT_MONTH_OCTOBER',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'Oct',
                                        'de' => 'Okt',
                                        'nl' => 'Okt',
                                        'fr' => 'Oct',
                                        'pl' => 'Paź'));
                array_push($text, array('key' => 'SHORT_MONTH_NOVEMBER',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'Nov',
                                        'de' => 'Nov',
                                        'nl' => 'Nov',
                                        'fr' => 'Nov',
                                        'pl' => 'Lis'));
                array_push($text, array('key' => 'SHORT_MONTH_DECEMBER',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'Dec',
                                        'de' => 'Dez',
                                        'nl' => 'Dec',
                                        'fr' => 'Dec',
                                        'pl' => 'Gru'));
                
                array_push($text, array('key' => 'DAY_MONDAY',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'Monday',
                                        'de' => 'Montag',
                                        'nl' => 'Maandag',
                                        'fr' => 'Lundi',
                                        'pl' => 'Poniedziałek'));
                array_push($text, array('key' => 'DAY_TUESDAY',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'Tuesday',
                                        'de' => 'Dienstag',
                                        'nl' => 'Dinsdag',
                                        'fr' => 'Mardi',
                                        'pl' => 'Wtorek'));
                array_push($text, array('key' => 'DAY_WEDNESDAY',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'Wednesday',
                                        'de' => 'Mittwoch',
                                        'nl' => 'Woensdag',
                                        'fr' => 'Mercredi',
                                        'pl' => 'Środa'));
                array_push($text, array('key' => 'DAY_THURSDAY',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'Thursday',
                                        'de' => 'Donnerstag',
                                        'nl' => 'Donderdag',
                                        'fr' => 'Jeudi',
                                        'pl' => 'Czwartek'));
                array_push($text, array('key' => 'DAY_FRIDAY',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'Friday',
                                        'de' => 'Freitag',
                                        'nl' => 'Vrijdag',
                                        'fr' => 'Vendredi',
                                        'pl' => 'Piątek'));
                array_push($text, array('key' => 'DAY_SATURDAY',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'Saturday',
                                        'de' => 'Samstag',
                                        'nl' => 'Zaterdag',
                                        'fr' => 'Samedi',
                                        'pl' => 'Sobota'));
                array_push($text, array('key' => 'DAY_SUNDAY',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'Sunday',
                                        'de' => 'Sonntag',
                                        'nl' => 'Zondag',
                                        'fr' => 'Dimanche',
                                        'pl' => 'Niedziela'));
    
                array_push($text, array('key' => 'SHORT_DAY_MONDAY',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'Mo',
                                        'de' => 'Mo',
                                        'nl' => 'Ma',
                                        'fr' => 'Lu',
                                        'pl' => 'Pon'));
                array_push($text, array('key' => 'SHORT_DAY_TUESDAY',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'Tu',
                                        'de' => 'Di',
                                        'nl' => 'Di',
                                        'fr' => 'Ma',
                                        'pl' => 'Wt'));
                array_push($text, array('key' => 'SHORT_DAY_WEDNESDAY',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'We',
                                        'de' => 'Mi',
                                        'nl' => 'Wo',
                                        'fr' => 'Me',
                                        'pl' => 'Śr'));
                array_push($text, array('key' => 'SHORT_DAY_THURSDAY',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'Th',
                                        'de' => 'Do',
                                        'nl' => 'Do',
                                        'fr' => 'Je',
                                        'pl' => 'Czw'));
                array_push($text, array('key' => 'SHORT_DAY_FRIDAY',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'Fr',
                                        'de' => 'Fr',
                                        'nl' => 'Vr',
                                        'fr' => 'Ve',
                                        'pl' => 'Pt'));
                array_push($text, array('key' => 'SHORT_DAY_SATURDAY',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'Sa',
                                        'de' => 'Sa',
                                        'nl' => 'Za',
                                        'fr' => 'Sa',
                                        'pl' => 'Sob'));
                array_push($text, array('key' => 'SHORT_DAY_SUNDAY',
                                        'parent' => 'PARENT_MONTHS_WEEK_DAYS',
                                        'text' => 'Su',
                                        'de' => 'So',
                                        'nl' => 'Zo',
                                        'fr' => 'Di',
                                        'pl' => 'Niedz'));
                /*
                 * TinyMCE
                 */
                array_push($text, array('key' => 'PARENT_TINYMCE',
                                        'parent' => '',
                                        'text' => 'TinyMCE'));
                array_push($text, array('key' => 'TINYMCE_ADD',
                                        'parent' => 'PARENT_TINYMCE',
                                        'text' => 'Add Calendar'));
                /*
                 * Documentation
                 */
                array_push($text, array('key' => 'PARENT_DOCUMENTATION',
                                        'parent' => '',
                                         'text' => 'Documentation'));
                
                array_push($text, array('key' => 'HELP_DOCUMENTATION',
                                        'parent' => 'PARENT_DOCUMENTATION',
                                        'text' => 'Documentation'));
                array_push($text, array('key' => 'HELP_VIEW_DOCUMENTATION',
                                        'parent' => 'PARENT_DOCUMENTATION',
                                        'text' => 'Click this to view the documentation for more informations.'));
                
                /*
                 * Development
                 */
                array_push($text, array('key' => 'BETA',
                                        'parent' => 'none',
                                        'text' => 'beta'));
                array_push($text, array('key' => 'BETA_TITLE',
                                        'parent' => 'none',
                                        'text' => 'Beta'));
                array_push($text, array('key' => 'SOON',
                                        'parent' => 'none',
                                        'text' => 'soon'));
                array_push($text, array('key' => 'SOON_TITLE',
                                        'parent' => 'none',
                                        'text' => 'Comming soon'));
                
                return $text;
            }
        }
    }