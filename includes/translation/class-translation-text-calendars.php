<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/translation/class-translation-text-calendars.php
* File Version            : 1.0.3
* Created / Last Modified : 12 December 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System calendars translation text PHP class.
*/

    if (!class_exists('DOPBSPTranslationTextCalendars')){
        class DOPBSPTranslationTextCalendars{
            /*
             * Constructor
             */
            function DOPBSPTranslationTextCalendars(){
                /*
                 * Initialize calendars text.
                 */
                add_filter('dopbsp_filter_translation_text', array(&$this, 'calendars'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'calendarsCalendar'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'calendarsCalendarForm'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'calendarsAddCalendar'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'calendarsEditCalendar'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'calendarsDeleteCalendar'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'calendarsHelp'));
            }

            /*
             * Calendars text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function calendars($text){
                array_push($text, array('key' => 'PARENT_CALENDARS',
                                        'parent' => '',
                                        'text' => 'Calendars'));
                
                array_push($text, array('key' => 'CALENDARS_TITLE',
                                        'parent' => 'PARENT_CALENDARS',
                                        'text' => 'Calendars'));   
                array_push($text, array('key' => 'CALENDARS_CREATED_BY',
                                        'parent' => 'PARENT_CALENDARS',
                                        'text' => 'Created by'));
                array_push($text, array('key' => 'CALENDARS_NO_PENDING_RESERVATIONS',
                                        'parent' => 'PARENT_CALENDARS',
                                        'text' => 'pending reservations'));
                array_push($text, array('key' => 'CALENDARS_NO_APPROVED_RESERVATIONS',
                                        'parent' => 'PARENT_CALENDARS',
                                        'text' => 'approved reservations'));
                array_push($text, array('key' => 'CALENDARS_NO_REJECTED_RESERVATIONS',
                                        'parent' => 'PARENT_CALENDARS',
                                        'text' => 'rejected reservations'));
                array_push($text, array('key' => 'CALENDARS_NO_CANCELED_RESERVATIONS',
                                        'parent' => 'PARENT_CALENDARS',
                                        'text' => 'canceled reservations'));
                array_push($text, array('key' => 'CALENDARS_LOAD_SUCCESS',
                                        'parent' => 'PARENT_CALENDARS',
                                        'text' => 'Calendars list loaded.'));
                array_push($text, array('key' => 'CALENDARS_NO_CALENDARS',
                                        'parent' => 'PARENT_CALENDARS',
                                        'text' => 'No calendars. Click the above "plus" icon to add a new one.'));
                
                return $text;
            }
            
            /*
             * Calendars - Calendar text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function calendarsCalendar($text){
                array_push($text, array('key' => 'PARENT_CALENDARS_CALENDAR',
                                        'parent' => '',
                                        'text' => 'Calendars - Calendar'));
                
                array_push($text, array('key' => 'CALENDARS_CALENDAR_LOAD_SUCCESS',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR',
                                        'text' => 'Calendar loaded.'));
                array_push($text, array('key' => 'CALENDARS_CALENDAR_SAVING_SUCCESS',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR',
                                        'text' => 'Schedule saved.'));
                array_push($text, array('key' => 'CALENDARS_CALENDAR_ADD_MONTH_VIEW',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR',
                                        'text' => 'Add month view',
                                        'de' => 'Füge monatsansicht hinzu',
                                        'nl' => 'Voeg extra maand toe',
                                        'fr' => 'Ajouter la vue du mois suivant',
                                        'pl' => 'Dodaj widok miesiąca'));
                array_push($text, array('key' => 'CALENDARS_CALENDAR_REMOVE_MONTH_VIEW',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR',
                                        'text' => 'Remove month view',
                                        'de' => 'Entferne monatsansicht',
                                        'nl' => 'Verwijder extra maand',
                                        'fr' => 'Supprimer la vue du mois suivant',
                                        'pl' => 'Usuń widok miesiąca'));
                array_push($text, array('key' => 'CALENDARS_CALENDAR_PREVIOUS_MONTH',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR',
                                        'text' => 'Previous month',
                                        'de' => 'Voriger monat',
                                        'nl' => 'Vorige maand',
                                        'fr' => 'Mois précédent',
                                        'pl' => 'Poprzedni miesiąc'));
                array_push($text, array('key' => 'CALENDARS_CALENDAR_NEXT_MONTH',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR',
                                        'text' => 'Next month',
                                        'de' => 'Nächster monat',
                                        'nl' => 'Volgende maand',
                                        'fr' => 'Mois suivant',
                                        'pl' => 'Następny miesiąc'));
                array_push($text, array('key' => 'CALENDARS_CALENDAR_AVAILABLE_ONE_TEXT',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR',
                                        'text' => 'available',
                                        'de' => 'verfügbar',
                                        'nl' => 'beschikbaar',
                                        'fr' => 'disponible',
                                        'pl' => 'dostępne'));
                array_push($text, array('key' => 'CALENDARS_CALENDAR_AVAILABLE_TEXT',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR',
                                        'text' => 'available',
                                        'de' => 'verfügbar',
                                        'nl' => 'beschikbaar',
                                        'fr' => 'disponible',
                                        'pl' => 'dostępne'));
                array_push($text, array('key' => 'CALENDARS_CALENDAR_BOOKED_TEXT',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR',
                                        'text' => 'booked',
                                        'de' => 'belegt',
                                        'nl' => 'bezet',
                                        'fr' => 'réservé',
                                        'pl' => 'zajęte'));
                array_push($text, array('key' => 'CALENDARS_CALENDAR_UNAVAILABLE_TEXT',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR',
                                        'text' => 'unavailable',
                                        'de' => 'nicht verfügbar',
                                        'nl' => 'niet beschikbaar',
                                        'fr' => 'indisponible',
                                        'pl' => 'zajęte'));
                
                return $text;
            }
            
            /*
             * Calendars - Calendar form text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function calendarsCalendarForm($text){
                array_push($text, array('key' => 'PARENT_CALENDARS_CALENDAR_FORM',
                                        'parent' => '',
                                        'text' => 'Calendars - Calendar form'));
                
                array_push($text, array('key' => 'CALENDARS_CALENDAR_FORM_DATE_START_LABEL',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR_FORM',
                                        'text' => 'Start date'));
                array_push($text, array('key' => 'CALENDARS_CALENDAR_FORM_DATE_END_LABEL',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR_FORM',
                                        'text' => 'End date'));  
                array_push($text, array('key' => 'CALENDARS_CALENDAR_FORM_HOURS_START_LABEL',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR_FORM',
                                        'text' => 'Start hour')); 
                array_push($text, array('key' => 'CALENDARS_CALENDAR_FORM_HOURS_END_LABEL',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR_FORM',
                                        'text' => 'End hour'));
                
                array_push($text, array('key' => 'CALENDARS_CALENDAR_FORM_SET_DAYS_AVAILABILITY_LABEL',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR_FORM',
                                        'text' => 'Set days availability'));
                array_push($text, array('key' => 'CALENDARS_CALENDAR_FORM_SET_HOURS_DEFINITIONS_LABEL',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR_FORM',
                                        'text' => 'Set hours definitions'));
                array_push($text, array('key' => 'CALENDARS_CALENDAR_FORM_SET_HOURS_AVAILABILITY_LABEL',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR_FORM',
                                        'text' => 'Set hours availability'));
                
                array_push($text, array('key' => 'CALENDARS_CALENDAR_FORM_STATUS_LABEL',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR_FORM',
                                        'text' => 'Status'));
                array_push($text, array('key' => 'CALENDARS_CALENDAR_FORM_STATUS_AVAILABLE_TEXT',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR_FORM',
                                        'text' => 'Available'));
                array_push($text, array('key' => 'CALENDARS_CALENDAR_FORM_STATUS_BOOKED_TEXT',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR_FORM',
                                        'text' => 'Booked'));
                array_push($text, array('key' => 'CALENDARS_CALENDAR_FORM_STATUS_SPECIAL_TEXT',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR_FORM',
                                        'text' => 'Special'));
                array_push($text, array('key' => 'CALENDARS_CALENDAR_FORM_STATUS_UNAVAILABLE_TEXT',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR_FORM',
                                        'text' => 'Unavailable'));
                array_push($text, array('key' => 'CALENDARS_CALENDAR_FORM_PRICE_LABEL',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR_FORM',
                                        'text' => 'Price'));    
                array_push($text, array('key' => 'CALENDARS_CALENDAR_FORM_PROMO_LABEL',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR_FORM',
                                        'text' => 'Promo price'));               
                array_push($text, array('key' => 'CALENDARS_CALENDAR_FORM_AVAILABLE_LABEL',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR_FORM',
                                        'text' => 'Number available'));
                array_push($text, array('key' => 'CALENDARS_CALENDAR_FORM_HOURS_DEFINITIONS_CHANGE_LABEL',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR_FORM',
                                        'text' => 'Change hours definitions (changing the definitions will overwrite any previous hours data)'));
                array_push($text, array('key' => 'CALENDARS_CALENDAR_FORM_HOURS_DEFINITIONS_LABEL',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR_FORM',
                                        'text' => 'Hours definitions (hh:mm add one per line). Use only 24 hours format.'));  
                array_push($text, array('key' => 'CALENDARS_CALENDAR_FORM_HOURS_SET_DEFAULT_DATA_LABEL',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR_FORM',
                                        'text' => 'Set default hours values for this day(s). This will overwrite any existing data.')); 
                array_push($text, array('key' => 'CALENDARS_CALENDAR_FORM_HOURS_INFO_LABEL',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR_FORM',
                                        'text' => 'Information (users will see this message)'));
                array_push($text, array('key' => 'CALENDARS_CALENDAR_FORM_HOURS_NOTES_LABEL',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR_FORM',
                                        'text' => 'Notes (only administrators will see this message)'));
                array_push($text, array('key' => 'CALENDARS_CALENDAR_FORM_GROUP_DAYS_LABEL',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR_FORM',
                                        'text' => 'Group days'));
                array_push($text, array('key' => 'CALENDARS_CALENDAR_FORM_GROUP_HOURS_LABEL',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR_FORM',
                                        'text' => 'Group hours'));
                array_push($text, array('key' => 'CALENDARS_CALENDAR_FORM_RESET_CONFIRMATION',
                                        'parent' => 'PARENT_CALENDARS_CALENDAR_FORM',
                                        'text' => 'Are you sure you want to reset the data? If you reset the days, hours data from those days will reset to.'));
                
                return $text;
            }
            
            /*
             * Calendars - Add caledar text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function calendarsAddCalendar($text){
                array_push($text, array('key' => 'PARENT_CALENDARS_ADD_CALENDAR',
                                        'parent' => '',
                                        'text' => 'Calendars - Add calendar'));
                
                array_push($text, array('key' => 'CALENDARS_ADD_CALENDAR_NAME',
                                        'parent' => 'PARENT_CALENDARS_ADD_CALENDAR',
                                        'text' => 'New calendar'));
                array_push($text, array('key' => 'CALENDARS_ADD_CALENDAR_SUBMIT',
                                        'parent' => 'PARENT_CALENDARS_ADD_CALENDAR',
                                        'text' => 'Add calendar'));
                array_push($text, array('key' => 'CALENDARS_ADD_CALENDAR_ADDING',
                                        'parent' => 'PARENT_CALENDARS_ADD_CALENDAR',
                                        'text' => 'Adding a new calendar ...'));
                array_push($text, array('key' => 'CALENDARS_ADD_CALENDAR_SUCCESS',
                                        'parent' => 'PARENT_CALENDARS_ADD_CALENDAR',
                                        'text' => 'You have succesfully added a new calendar.'));
                
                return $text;
            }
            
            /*
             * Calendars - Edit calendar text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function calendarsEditCalendar($text){
                array_push($text, array('key' => 'PARENT_CALENDARS_EDIT_CALENDAR',
                                        'parent' => '',
                                        'text' => 'Calendars - Edit calendar'));
                
                array_push($text, array('key' => 'CALENDARS_EDIT_CALENDAR',
                                        'parent' => 'PARENT_CALENDARS_EDIT_CALENDAR',
                                        'text' => 'Edit calendar availability'));
                array_push($text, array('key' => 'CALENDARS_EDIT_CALENDAR_SETTINGS',
                                        'parent' => 'PARENT_CALENDARS_EDIT_CALENDAR',
                                        'text' => 'Edit calendar settings'));
                array_push($text, array('key' => 'CALENDARS_EDIT_CALENDAR_NOTIFICATIONS',
                                        'parent' => 'PARENT_CALENDARS_EDIT_CALENDAR',
                                        'text' => 'Edit calendar notifications'));
                array_push($text, array('key' => 'CALENDARS_EDIT_CALENDAR_PAYMENT_GATEWAYS',
                                        'parent' => 'PARENT_CALENDARS_EDIT_CALENDAR',
                                        'text' => 'Edit calendar payment gateways'));
                array_push($text, array('key' => 'CALENDARS_EDIT_CALENDAR_USERS_PERMISSIONS',
                                        'parent' => 'PARENT_CALENDARS_EDIT_CALENDAR',
                                        'text' => 'Edit users permissions'));
                array_push($text, array('key' => 'CALENDARS_EDIT_CALENDAR_NEW_RESERVATIONS',
                                        'parent' => 'PARENT_CALENDARS_EDIT_CALENDAR',
                                        'text' => 'new reservations'));
                array_push($text, array('key' => 'CALENDARS_EDIT_CALENDAR_DELETE',
                                        'parent' => 'PARENT_CALENDARS_EDIT_CALENDAR',
                                        'text' => 'Delete calendar'));
                
                return $text;
            }
            
            /*
             * Calendars - Delete calendar text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function calendarsDeleteCalendar($text){
                array_push($text, array('key' => 'PARENT_CALENDARS_DELETE_CALENDAR',
                                        'parent' => '',
                                        'text' => 'Calendars - Delete calendar'));
                
                array_push($text, array('key' => 'CALENDARS_DELETE_CALENDAR_CONFIRMATION',
                                        'parent' => 'PARENT_CALENDARS_DELETE_CALENDAR',
                                        'text' => 'Are you sure you want to delete this calendar?'));
                array_push($text, array('key' => 'CALENDARS_DELETE_CALENDAR_DELETING',
                                        'parent' => 'PARENT_CALENDARS_DELETE_CALENDAR',
                                        'text' => 'Deleting calendar ...'));
                array_push($text, array('key' => 'CALENDARS_DELETE_CALENDAR_SUCCESS',
                                        'parent' => 'PARENT_CALENDARS_DELETE_CALENDAR',
                                        'text' => 'You have succesfully deleted the calendar.'));
                
                return $text;
            }
            
            /*
             * Calendars - Help text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function calendarsHelp($text){
                array_push($text, array('key' => 'PARENT_CALENDARS_HELP',
                                        'parent' => '',
                                        'text' => 'Calendars - Help'));
                
                array_push($text, array('key' => 'CALENDARS_HELP',
                                        'parent' => 'PARENT_CALENDARS_HELP',
                                        'text' => 'Click on a calendar item to open the editing area.'));
                
                array_push($text, array('key' => 'CALENDARS_ADD_CALENDAR_HELP',
                                        'parent' => 'PARENT_CALENDARS_HELP',
                                        'text' => 'Click on the "plus" icon to add a calendar.'));
                
                array_push($text, array('key' => 'CALENDARS_EDIT_CALENDAR_HELP',
                                        'parent' => 'PARENT_CALENDARS_HELP',
                                        'text' => 'Click on the "calendar" icon to edit calendar availability. Select the days and hours to edit them.'));
                array_push($text, array('key' => 'CALENDARS_EDIT_CALENDAR_SETTINGS_HELP',
                                        'parent' => 'PARENT_CALENDARS_HELP',
                                        'text' => 'Click on the "gear" icon to edit calendar settings.'));
                array_push($text, array('key' => 'CALENDARS_EDIT_CALENDAR_EMAILS_HELP',
                                        'parent' => 'PARENT_CALENDARS_HELP',
                                        'text' => 'Click on the "email" icon to set emails/notifications options.'));
                array_push($text, array('key' => 'CALENDARS_EDIT_CALENDAR_PAYMENT_GATEWAYS_HELP',
                                        'parent' => 'PARENT_CALENDARS_HELP',
                                        'text' => 'Click on the "wallet" icon to set payment options.'));
                array_push($text, array('key' => 'CALENDARS_EDIT_CALENDAR_USERS_HELP',
                                        'parent' => 'PARENT_CALENDARS_HELP',
                                        'text' => 'Click on the "users" icon to set users permissions.'));
                
                array_push($text, array('key' => 'CALENDARS_CALENDAR_NOTIFICATIONS_HELP',
                                        'parent' => 'PARENT_CALENDARS_HELP',
                                        'text' => 'The "bulb" icon notifies you if you have new reserservations.'));
                
                return $text;
            }
        }
    }