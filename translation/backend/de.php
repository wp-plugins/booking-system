<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 1.1
* File                    : de.php
* File Version            : 1.0
* Created / Last Modified : 29 July 2013
* Author                  : Dot on Paper
* Copyright               : © 2013 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : German Back End Translation.
* Translated by           : Dieter Pfenning - dieter.pfenning@winball.de
*/

    define('DOPBS_TITLE', "Buchungssystem");

    // Loading ...
    define('DOPBS_LOAD', "Lade Daten ...");

    // Save ...
    define('DOPBS_SAVE', "Speichere Daten ...");
    define('DOPBS_SAVE_SUCCESS', "Die Daten wurden gespeichert.");
    
    // Months & Week Days
    global $DOPBS_month_names;
    $DOPBS_month_names = array('Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember');
    
    global $DOPBS_day_names;
    $DOPBS_day_names = array('Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag');
    
    // Help
    define('DOPBS_CALENDARS_HELP', "Klick auf ein Kalendereintrag um die Bearbeitungsmaske zu öffnen.");
    define('DOPBS_CALENDAR_EDIT_HELP', "Selektiere die Tage und Stunden, um sie zu bearbeiten. Klick auf das Bleistift-Icon, um die Kalender-Einstellungen zu bearbeiten. Klick auf das Brief-Icon, um nachzusehen, ob Du Reservierungen hast  Lies die Dokumentation für mehr Informationen.");
    define('DOPBS_CALENDAR_EDIT_SETTINGS_HELP', "Klicke den 'Submit Button' um Änderungen zu speichern. Klicke den 'Back Button' um zum Kalender zurückzukehren.");
    
    // Form
    define('DOPBS_SUBMIT', "Senden");
    define('DOPBS_DELETE', "LÖschen");
    define('DOPBS_BACK', "Zurück");
    define('DOPBS_BACK_SUBMIT', "Zurück zum Kalender.");
    define('DOPBS_ENABLED', "Aktiv");
    define('DOPBS_DISABLED', "Inaktive");
    define('DOPBS_DATE_TYPE_AMERICAN', "Amerikanisch (mm dd, yyyy)");
    define('DOPBS_DATE_TYPE_EUROPEAN', "Europäisch (dd mm yyyy)");

    // Calendars    
    define('DOPBS_SHOW_CALENDARS', "Kalender");
    define('DOPBS_CALENDARS_LOADED', "Kalender-Liste geladen.");
    define('DOPBS_CALENDAR_LOADED', "Kalender geladen.");
    define('DOPBS_NO_CALENDARS', "Keine Kalender.");    
    
    // Calendar 
    define('DOPBS_ADD_MONTH_VIEW', "Füge Monatsansicht hinzu");
    define('DOPBS_REMOVE_MONTH_VIEW', "Entferne Monatsansicht");
    define('DOPBS_PREVIOUS_MONTH', "Voriger Monat");
    define('DOPBS_NEXT_MONTH', "Nächster Monat");
    define('DOPBS_AVAILABLE_ONE_TEXT', "verfügbar");
    define('DOPBS_AVAILABLE_TEXT', "verfügbar");
    define('DOPBS_BOOKED_TEXT', "belegt");
    define('DOPBS_UNAVAILABLE_TEXT', "nicht verfügbar");
                            
    // Calendar Form 
    define('DOPBS_DATE_START_LABEL', "Start-Datum");
    define('DOPBS_DATE_END_LABEL', "End-Datum");    
    define('DOPBS_STATUS_LABEL', "Status");
    define('DOPBS_STATUS_AVAILABLE_TEXT', "Verfügbar");
    define('DOPBS_STATUS_BOOKED_TEXT', "Belegt");
    define('DOPBS_STATUS_SPECIAL_TEXT', "Special");
    define('DOPBS_STATUS_UNAVAILABLE_TEXT', "Nicht verfügbar");
    define('DOPBS_PRICE_LABEL', "Preis");    
    define('DOPBS_PROMO_LABEL', "Promotions-Preis");               
    define('DOPBS_AVAILABLE_LABEL', "Nein. Verfügbar");         
    define('DOPBS_HOURS_DEFINITIONS_CHANGE_LABEL', "Ändere die Stunden-Definitionen (das Ändern der Definitionen wird alle früheren Stunden-Daten überschreiben)");
    define('DOPBS_HOURS_DEFINITIONS_LABEL', "Stunden-Definitionen (hh:mm füge eine pro Zeile hinzu). Verwende nur das 24-Stunden-Format.");  
    define('DOPBS_HOURS_SET_DEFAULT_DATA_LABEL', "Lege die Stunden-Vorgabe-Werte für diese(n) Tag(e) fest. (Dies wird alle bestehenden Daten überschreiben )"); 
    define('DOPBS_HOURS_START_LABEL', "Anfangs-Stunde"); 
    define('DOPBS_HOURS_END_LABEL', "End-Stunde");
    define('DOPBS_HOURS_INFO_LABEL', "Information (Anwender können diese Information anzeigen)");
    define('DOPBS_HOURS_NOTES_LABEL', "Bemerkungen (nur Du (Administrator) kannst diese Bemerkungen sehen");
    define('DOPBS_GROUP_DAYS_LABEL', "Gruppen-Tage");
    define('DOPBS_GROUP_HOURS_LABEL', "Gruppen-Stunden");
    define('DOPBS_RESET_CONFIRMATION', "Bist Du sicher, alle Daten zurückzusetzen? Wenn Du Tage zurücksetzt, werden die Stunden-Daten auch zurückgesetzt.");
    
    // Add Calendar
    define('DOPBS_ADD_CALENDAR_NAME', "Buchungs-Kalender");

    // Edit Calendar
    define('DOPBS_EDIT_CALENDAR_SUBMIT', "Bearbeite Kalender");
    define('DOPBS_EDIT_CALENDAR_USERS_PERMISSIONS', "Benutzerrechte");
    define('DOPBS_EDIT_CALENDAR_SUCCESS', "Du hast den Kalender erfolgreich bearbeitet.");
    
    // Reservations
    define('DOPBS_SHOW_RESERVATIONS', "Zeige Reserierungen");    
    define('DOPBS_NO_RESERVATIONS', "Es gibt keine Reservierungen.");
    
    define('DOPBS_RESERVATIONS_ID', "Reservierungs-ID");
    
    define('DOPBS_RESERVATIONS_CHECK_IN_LABEL', "Anreise");
    define('DOPBS_RESERVATIONS_CHECK_OUT_LABEL', "Abreise");
    define('DOPBS_RESERVATIONS_START_HOURS_LABEL', "Start um"); 
    define('DOPBS_RESERVATIONS_END_HOURS_LABEL', "Ende um");
    
    define('DOPBS_RESERVATIONS_FIRST_NAME_LABEL', "Vorname");
    define('DOPBS_RESERVATIONS_LAST_NAME_LABEL', "Nachname");
    define('DOPBS_RESERVATIONS_STATUS_LABEL', "Status");
    define('DOPBS_RESERVATIONS_STATUS_PENDING', "Offen");
    define('DOPBS_RESERVATIONS_STATUS_APPROVED', "Genehmigt");        
    define('DOPBS_RESERVATIONS_DATE_CREATED_LABEL', "Erstellungs-Datum");    
    define('DOPBS_RESERVATIONS_PAYMENT_METHOD_LABEL', 'Bezahl-Methode');
    define('DOPBS_RESERVATIONS_PAYMENT_METHOD_ARRIVAL', 'Bei Ankunft');
    define('DOPBS_RESERVATIONS_PAYMENT_METHOD_PAYPAL', 'PayPal');
    define('DOPBS_RESERVATIONS_PAYMENT_METHOD_PAYPAL_TRANSACTION_ID_LABEL', 'PayPal-Transaktions-ID');   
    define('DOPBS_RESERVATIONS_TOTAL_PRICE_LABEL', "Summe:"); 
    define('DOPBS_RESERVATIONS_NO_ITEMS_LABEL', "Keine gebuchten Elemente"); 
    define('DOPBS_RESERVATIONS_PRICE_LABEL', "Preis"); 
    define('DOPBS_RESERVATIONS_DEPOSIT_PRICE_LABEL', "Anzahlung");
    define('DOPBS_RESERVATIONS_DEPOSIT_PRICE_LEFT_LABEL', " offener Restbetrag");
    define('DOPBS_RESERVATIONS_DISCOUNT_PRICE_LABEL', "Aktueller Preis");
    define('DOPBS_RESERVATIONS_DISCOUNT_PRICE_TEXT', "Rabatt");
    define('DOPBS_RESERVATIONS_EMAIL_LABEL', "Email"); 
    define('DOPBS_RESERVATIONS_PHONE_LABEL', "Telefon"); 
    define('DOPBS_RESERVATIONS_NO_PEOPLE_LABEL', "Keine Gäste"); 
    define('DOPBS_RESERVATIONS_NO_ADULTS_LABEL', "Erwachsene"); 
    define('DOPBS_RESERVATIONS_NO_CHILDREN_LABEL', "Kinder"); 
    define('DOPBS_RESERVATIONS_MESSAGE_LABEL', "Nachricht");
    
    define('DOPBS_RESERVATIONS_JUMP_TO_DAY_LABEL', 'Springe zum Tag');
    define('DOPBS_RESERVATIONS_APPROVE_LABEL', 'Genehmigen');
    define('DOPBS_RESERVATIONS_REJECT_LABEL', 'Ablehnen');
    define('DOPBS_RESERVATIONS_CANCEL_LABEL', 'Stornieren');
    
    define('DOPBS_RESERVATIONS_APPROVE_CONFIRMATION', 'Bist Du sicher, dass Du diese Reservierung bestätigen möchtest?');
    define('DOPBS_RESERVATIONS_APPROVE_SUCCESS', 'Die Reservierung wurde bestätigt.');
    define('DOPBS_RESERVATIONS_REJECT_CONFIRMATION', 'Bist Du sicher, dass Du diese Reservierung ablehnen möchtest?');
    define('DOPBS_RESERVATIONS_REJECT_SUCCESS', 'Die Reservierung wurde abgelehnt.');
    define('DOPBS_RESERVATIONS_CANCEL_CONFIRMATION', 'Bist Du sicher, dass Du diese Reservierung stornieren möchtest?');
    define('DOPBS_RESERVATIONS_CANCEL_SUCCESS', 'Die Reservierung wurde storniert.');
    
    // TinyMCE
    define('DOPBS_TINYMCE_ADD', 'Füge Kalnder hinzu');
    
    // Settings
    define('DOPBS_GENERAL_STYLES_SETTINGS', "Allgemeine Einstellungen");
    define('DOPBS_CALENDAR_NAME', "Name");
    define('DOPBS_AVAILABLE_DAYS', "Verfügbare Tage");
    define('DOPBS_FIRST_DAY', "Erster Tag");
    define('DOPBS_CURRENCY', "Währung");
    define('DOPBS_DATE_TYPE', "Datums-Typ");
    define('DOPBS_PREDEFINED', "Wähle vordefinierte Einstellungen");
    define('DOPBS_TEMPLATE', "Style Template");
    define('DOPBS_MIN_STAY', "Min. Aufenthaltsdauer");
    define('DOPBS_MAX_STAY', "Max. Aufenthaltsdauer");
    define('DOPBS_NO_ITEMS_ENABLED', "Aktiviere Anzahl-Auswahl");
    define('DOPBS_VIEW_ONLY', "Nur Anzeige Info");
    define('DOPBS_PAGE_URL', "Seiten-URL");
    
    define('DOPBS_NOTIFICATIONS_STYLES_SETTINGS', "Benachrichtigungs-Einstellungen");
    define('DOPBS_NOTIFICATIONS_TEMPLATE', "Email-Template");
    define('DOPBS_NOTIFICATIONS_EMAIL', "Benachrichtigungs-Email");
    define('DOPBS_NOTIFICATIONS_SMTP_ENABLED', "Aktiviere SMTP");
    define('DOPBS_NOTIFICATIONS_SMTP_HOST_NAME', "SMTP Host Name");
    define('DOPBS_NOTIFICATIONS_SMTP_HOST_PORT', "SMTP Host Port");
    define('DOPBS_NOTIFICATIONS_SMTP_SSL', "SMTP SSL Conenction");
    define('DOPBS_NOTIFICATIONS_SMTP_USER', "SMTP Host User");
    define('DOPBS_NOTIFICATIONS_SMTP_PASSWORD', "SMTP Host Password");
                                              
    define('DOPBS_HOURS_STYLES_SETTINGS', "Tage/Stunden Einstellungen");
    define('DOPBS_MULTIPLE_DAYS_SELECT', "Verwende An-/Abreise");
    define('DOPBS_MORNING_CHECK_OUT', "Abreise Morgens");
    define('DOPBS_HOURS_ENABLED', "Verwende Stunden");
    define('DOPBS_HOURS_DEFINITIONS', "Definiere Stunden");
    define('DOPBS_MULTIPLE_HOURS_SELECT', "Verwende Anfangs-/Ende-Stunden");
    define('DOPBS_HOURS_AMPM', "Aktiviere AM/PM Format");
    define('DOPBS_LAST_HOUR_TO_TOTAL_PRICE', "Addiere den letzten Stundenpreis zur Endsumme");
    define('DOPBS_HOURS_INTERVAL_ENABLED', "Aktiviere Stunden-Intervall");
    
    define('DOPBS_DISCOUNTS_NO_DAYS_SETTINGS', "Rabatt bei Anzahl Tagen");
    define('DOPBS_DISCOUNTS_NO_DAYS', "Anzahl Tage");
    define('DOPBS_DISCOUNTS_NO_DAYS_DAYS', "Tagesbuchung");
    
    define('DOPBS_DEPOSIT_SETTINGS', "Anzahlung");
    define('DOPBS_DEPOSIT', "Anzahlungsbetrag");
    
    define('DOPBS_FORM_STYLES_SETTINGS', "Kontaktformular Einstellungen");
    define('DOPBS_FORM', "Wähle Formular");
    define('DOPBS_INSTANT_BOOKING_ENABLED', "Sofort-Buchung");
    define('DOPBS_NO_PEOPLE_ENABLED', "Aktiviere Anzahl Personen erlaubt");
    define('DOPBS_MIN_NO_PEOPLE', "Min. Anzahl erlaubter Personen");
    define('DOPBS_MAX_NO_PEOPLE', "Max. Anzahl erlaubter Personen");
    define('DOPBS_NO_CHILDREN_ENABLED', "Aktiviere Anzahl Kinder erlaubt");
    define('DOPBS_MIN_NO_CHILDREN', "Min. Anzahl erlaubter Kinder");
    define('DOPBS_MAX_NO_CHILDREN', "Max. Anzahl erlaubter Kinder");
    define('DOPBS_PAYMENT_ARRIVAL_ENABLED', "Aktiviere Bezahlung bei Ankunft");
    
    define('DOPBS_PAYMENT_PAYPAL_STYLES_SETTINGS', "PayPal Einstellungen");
    define('DOPBS_PAYMENT_PAYPAL_ENABLED', "Aktiviere PayPal-Bezahlung");
    define('DOPBS_PAYMENT_PAYPAL_USERNAME', "PayPal-API User Name");
    define('DOPBS_PAYMENT_PAYPAL_PASSWORD', "PayPal-API Password");
    define('DOPBS_PAYMENT_PAYPAL_SIGNATURE', "PayPal-API Signature");
    define('DOPBS_PAYMENT_PAYPAL_CREDIT_CARD', "Aktiviere Kreditkartenzahlung");
    define('DOPBS_PAYMENT_PAYPAL_SANDBOX_ENABLED', "Aktiviere PayPal-Sandbox");
    
    define('DOPBS_TERMS_AND_CONDITIONS_ENABLED', "Aktiviere AGB");
    define('DOPBS_TERMS_AND_CONDITIONS_LINK', "AGB Link");
    
    define('DOPBS_GO_TOP', "Nach oben");
    define('DOPBS_SHOW', "Zeige");
    define('DOPBS_HIDE', "Verberge");
    
    // Settings Info
    define('DOPBS_CALENDAR_NAME_INFO', "Ändere Kalendername.");
    define('DOPBS_AVAILABLE_DAYS_INFO', "Vorgabewert: alle verfügbar. Wähle verfügbare Tage.");
    define('DOPBS_FIRST_DAY_INFO', "Vorgabewert: Montag. Wähle ersten Tag.");
    define('DOPBS_CURRENCY_INFO', "Vorgabewert: USD. Wähle Kalender-Währung.");
    define('DOPBS_DATE_TYPE_INFO', "Vorgabewert: Amerikanisch. Wähle ein Datumsformat: Amerikanisch (mm dd, yyyy) oder Europäisch (dd mm yyyy)");
    define('DOPBS_PREDEFINED_INFO', "Wenn beim Senden ausgewählt, werden die folgenden Einstellungen geändert.");
    define('DOPBS_TEMPLATE_INFO', "Vorgabewert: default. Wähle das Style-Template.");
    define('DOPBS_MIN_STAY_INFO', "Vorgabewert: 1. Definiere die min. Anzahl Tage, die ausgewählt werden kann.");
    define('DOPBS_MAX_STAY_INFO', "Vorgabewert: 0. Definiere die max. Anzahl Tage, die ausgewählt werden kann. (0 = unbegrenzt)");
    define('DOPBS_NO_ITEMS_ENABLED_INFO', "Vorgabewert: Aktiviert. Aktiviere zum einschränken auf reine Anzeige der Buchungsinformationen im Frontend.");
    define('DOPBS_VIEW_ONLY_INFO', "orgabewert: Aktiviert. Aktiviere zum einschränken auf reine Anzeige der Buchungsinformationen im Frontend.");
    define('DOPBS_PAGE_URL_INFO', "Definiere Seiten-URL auf der der Kalender eingefügt wird. Das ist notwendig, wenn Du ein Suchsystem für mehrere Kalender erstellen möchtest.");
    
    define('DOPBS_NOTIFICATIONS_TEMPLATE_INFO', "Vorgabewert: default. Wähle das Email-Template.");
    define('DOPBS_NOTIFICATIONS_EMAIL_INFO', " Gib die Emailadresse ein, unter der Du über Buchungsanfragen informiert wirst oder über die Endkunden informiert werden.");
    define('DOPBS_NOTIFICATIONS_SMTP_ENABLED_INFO', "Verwende SMTP zum Versenden der Emails.");
    define('DOPBS_NOTIFICATIONS_SMTP_HOST_NAME_INFO', "SMTP Hostname");
    define('DOPBS_NOTIFICATIONS_SMTP_HOST_PORT_INFO', "SMTP Hostport.");
    define('DOPBS_NOTIFICATIONS_SMTP_SSL_INFO', "Verwende SSL.");
    define('DOPBS_NOTIFICATIONS_SMTP_USER_INFO', "SMTP Host username.");
    define('DOPBS_NOTIFICATIONS_SMTP_PASSWORD_INFO', "SMTP Host password.");
    
    define('DOPBS_MULTIPLE_DAYS_SELECT_INFO', "Vorgabewert: Aktiviert. Verwende An-/Abreise oder wähle nur einen Tag.");
    define('DOPBS_MORNING_CHECK_OUT_INFO', "Vorgabewert: Deaktiviert. Diese Option aktiviert die Anreise am Nachmittag des ersten Tages und die Abreise am Morgen nach dem letzten Tag.");
    define('DOPBS_HOURS_ENABLED_INFO', "Vorgabewert: Deaktiviert. Aktiviere die Stunden für den Kalender.");
    define('DOPBS_HOURS_DEFINITIONS_INFO', "Gib ein hh:mm ... ein Eintrag pro Zeile. Eine Änderung der Definitionen überschreibt alle früheren Stundendefinitionen. Verwende nur das 24-Stunden-Format.");
    define('DOPBS_MULTIPLE_HOURS_SELECT_INFO', "Vorgabewert: Aktiviert. Verwende Start-/End-Stunden oder wähle nur eine Stunde aus.");
    define('DOPBS_HOURS_AMPM_INFO', "Vorgabewert: Deaktiviert. Zeige Stunden im AM/PM-Format. Anmerkung: Stundendefinitionen müssen trotzdem im 24-Stunden-Format eingegeben werden.");
    define('DOPBS_LAST_HOUR_TO_TOTAL_PRICE_INFO', "Vorgabewert: Aktiviert. Der Preis wird ohne die letzte Stunde berechnet, falls deaktiviert. Der Preis wird inklusive der letzten Stunde berechnet, falls aktiviert.");
    define('DOPBS_HOURS_INTERVAL_ENABLED_INFO', "Vorgabewert: Deaktiviert. Zeigt den Stundenzeitraum zwischen der aktuellen und der nächsten Stunde an.");
    
    define('DOPBS_DISCOUNTS_NO_DAYS_INFO', "Wähle die Anzahl Tage bei der Du einen Rabatt geben möchtest (bis zu 31 Tage).");
    define('DOPBS_DISCOUNTS_NO_DAYS_DAYS_INFO', "Vorgabewert: 0. Definiere den Rabattprozentsatz, den ein Kunde erhält, wenn er diese Anzahl an Tagen bucht.");
    
    define('DOPBS_DEPOSIT_INFO', "Vorgabewert: 0. Definiere den Prozentsatz für die Anzahlung. Die Anzahlung ist nur verfügbar, wenn eine Bezahlmethode aktiviert ist.");
    
    define('DOPBS_FORM_INFO', "Wähle das Kontaktformular.");
    define('DOPBS_INSTANT_BOOKING_ENABLED_INFO', "Vorgabewert: Deaktiviert. Buche die Daten sofort in den Kalender, sobald die Anfrage abgesendet wurde.");
    define('DOPBS_NO_PEOPLE_ENABLED_INFO', "Vorgabewert: Aktiviert. Erfrage die Anzahl Personen, die das gebuchte Objekt benutzen wollen.");
    define('DOPBS_MIN_NO_PEOPLE_INFO', "Vorgabewert: 1. Definiere die min. erlaubte Anzahl Personen pro gebuchtem Objekt.");
    define('DOPBS_MAX_NO_PEOPLE_INFO', "Vorgabewert: 4. Definiere die max. erlaubte Anzahl Personen pro gebuchtem Objekt.");
    define('DOPBS_NO_CHILDREN_ENABLED_INFO', "Vorgabewert: Aktiviert. Erfrage die Anzahl Kinder, die das Objekt benutzen wollen.");
    define('DOPBS_MIN_NO_CHILDREN_INFO', "Vorgabewert: 0. Definiere die min. erlaubte Anzahl Kinder pro gebuchtem Objekt.");
    define('DOPBS_MAX_NO_CHILDREN_INFO', "Vorgabewert: 2. Definiere die max. erlaubte Kinder Personen pro gebuchtem Objekt.");
    define('DOPBS_PAYMENT_ARRIVAL_ENABLED_INFO', "Vorgabewert: Aktiviert. Erlaube Gästen bei Ankunft zu bezahlen. Benötigt Genehmigung.");
    
    define('DOPBS_PAYMENT_PAYPAL_ENABLED_INFO', "Vorgabewert: Deaktiviert. Erlaube die Bezahlung per Paypal. Der Zeitraum wird sofort gebucht.");
    define('DOPBS_PAYMENT_PAYPAL_USERNAME_INFO', "Gib die PayPal API-Daten ein (Benutzername). Siehe im Hilfebereich nach, woher Du die Daten bekommen kannst.");
    define('DOPBS_PAYMENT_PAYPAL_PASSWORD_INFO', "Gib die PayPal API-Daten ein (Kennwort). Siehe im Hilfebereich nach, woher Du die Daten bekommen kannst.");
    define('DOPBS_PAYMENT_PAYPAL_SIGNATURE_INFO', "Gib die PayPal API-Daten ein (Signatur). Siehe im Hilfebereich nach, woher Du die Daten bekommen kannst.");
    define('DOPBS_PAYMENT_PAYPAL_CREDIT_CARD_INFO', "Aktiviere, damit Benutzer direkt per Kreditkarte bezahlen können.");
    define('DOPBS_PAYMENT_PAYPAL_SANDBOX_ENABLED_INFO', "Aktiviere, um die Paypal-Sandbox zu verwenden.");
    
    define('DOPBS_TERMS_AND_CONDITIONS_ENABLED_INFO', "Vorgabewert: Deaktiviert. Aktiviere AGB-Checkbox.");
    define('DOPBS_TERMS_AND_CONDITIONS_LINK_INFO', "Link zur AGB-Seite.");
    
    // Booking Forms
    define('DOPBS_TITLE_BOOKING_FORMS', "Buchungsformulare");
    define('DOPBS_BOOKING_FORMS_HELP', "Klicke auf das Plus-Icon um eine Buchungsformular hinzu zu fügen. Klicke auf ein Formularelement, um die Bearbeitungsmaske zu öffnen.");
    define('DOPBS_BOOKING_FORMS_LOADED', "Buchungsformular-Liste geladen.");
    define('DOPBS_BOOKING_FORM_SETTINGS_HELP', "Klicke auf den 'Senden'-Button, um Änderungen zu speichern. Klicke auf dem 'Löschen'-Button, um ein Formular zu löschen.");
    define('DOPBS_BOOKING_FORM_LOADED', "Buchungsformular geladen.");
    define('DOPBS_NO_BOOKING_FORMS', "Keine Buchungsformulare.");
    
    // Add Booking Form
    define('DOPBS_ADD_BOOKING_FORM_NAME', "Buchungs-Formular");
    
    // Edit Booking Form
    define('DOPBS_EDIT_BOOKING_FORM_SUBMIT', "Senden");
    define('DOPBS_EDIT_BOOKING_FORM_SUCCESS', "Du hast das Formular erfolgreich bearbeitet.");
    
    // Booking Form Fields
    define('DOPBS_BOOKING_FORM_NAME', "Formular-Name");
    define('DOPBS_BOOKING_FORM_NAME_DEFAULT', "Default-Formular");
    define('DOPBS_BOOKING_FORM_FIELDS_TITLE', "Formular-Felder");
    define('DOPBS_BOOKING_FORM_FIELDS_SHOW_SETTINGS', "Zeige Einstellungen");
    define('DOPBS_BOOKING_FORM_FIELDS_HIDE_SETTINGS', "Blende Einstellungen aus");
    define('DOPBS_BOOKING_FORM_FIELDS_TYPE_TEXT_LABEL', "Text");
    define('DOPBS_BOOKING_FORM_FIELDS_TYPE_TEXTAREA_LABEL', "Textarea");
    define('DOPBS_BOOKING_FORM_FIELDS_TYPE_CHECKBOX_LABEL', "Checkbox");
    define('DOPBS_BOOKING_FORM_FIELDS_TYPE_SELECT_LABEL', "Drop Down");
    define('DOPBS_BOOKING_FORM_FIELDS_LANGUAGE_LABEL', "Sprache");
    define('DOPBS_BOOKING_FORM_FIELDS_NAME_LABEL', "Label");
    define('DOPBS_BOOKING_FORM_FIELDS_NEW_FIELD_TEXT_LABEL', "Neues Text-Feld");
    define('DOPBS_BOOKING_FORM_FIELDS_NEW_FIELD_TEXTAREA_LABEL', "Neues Textarea-Feld");
    define('DOPBS_BOOKING_FORM_FIELDS_NEW_FIELD_CHECKBOX_LABEL', "Neues Checkbox-Feld");
    define('DOPBS_BOOKING_FORM_FIELDS_NEW_FIELD_SELECT_LABEL', "Neues Drop Down-Feld");
    define('DOPBS_BOOKING_FORM_FIELDS_ALLOWED_CHARACTERS_LABEL', "Erlaubte Buchstaben");
    define('DOPBS_BOOKING_FORM_FIELDS_SIZE_LABEL', "Größe");
    define('DOPBS_BOOKING_FORM_FIELDS_EMAIL_LABEL', "Ist Emailadresse");
    define('DOPBS_BOOKING_FORM_FIELDS_REQUIRED_LABEL', "Erforderlich");
    define('DOPBS_BOOKING_FORM_FIELDS_SELECT_OPTIONS_LABEL', "Optionen");
    define('DOPBS_BOOKING_FORM_FIELDS_SELECT_ADD_OPTION', "Füge Option hinzu");
    define('DOPBS_BOOKING_FORM_FIELDS_SELECT_NEW_OPTION_LABEL', "Neue Option");
    define('DOPBS_BOOKING_FORM_FIELDS_SELECT_DELETE_OPTION', "Lösche Option");
    define('DOPBS_BOOKING_FORM_FIELDS_SELECT_MULTIPLE_SELECT_LABEL', "Mehrfachauswahl");
    define('DOPBS_BOOKING_FORM_CHECKED', "Ausgewählt");
    define('DOPBS_BOOKING_FORM_UNCHECKED', "Nicht ausgewählt");
    
    // Booking Form Fields Info
    define('DOPBS_BOOKING_FORM_NAME_INFO', "Change form name and click Submit.");
    define('DOPBS_BOOKING_FORM_FIELDS_INFO', "Drag the Field Type from right to left to create a new Field. Drag a created Field to trash to delete. Click Show Settings to edit a created Field.");
    define('DOPBS_BOOKING_FORM_FIELDS_LANGUAGE_INFO', "Select the language for which you want to change the names (labels).");
    define('DOPBS_BOOKING_FORM_FIELDS_NAME_INFO', "Enter field name (label).");
    define('DOPBS_BOOKING_FORM_FIELDS_ALLOWED_CHARACTERS_INFO', "Enter the caracters allowed in this field. Leave it blank if all characters are allowed.");
    define('DOPBS_BOOKING_FORM_FIELDS_SIZE_INFO', "Enter the maximum number of characters allowed. Leave it blank for unlimited.");
    define('DOPBS_BOOKING_FORM_FIELDS_EMAIL_INFO', "Check it if you want this field to be verified if an email has been added or not.");
    define('DOPBS_BOOKING_FORM_FIELDS_REQUIRED_INFO', "Check it if you want the field to be mandatory.");
    define('DOPBS_BOOKING_FORM_FIELDS_SELECT_OPTIONS_INFO', "Add the Plus Icon to add another option and enter the name. Click on the Delete Icon to remove the option.");
    define('DOPBS_BOOKING_FORM_FIELDS_SELECT_MULTIPLE_SELECT_INFO', "Check it if you want a multiple select Drop Down.");
    
    // Help
    define('DOPBS_HELP_DOCUMENTATION', "Dokumentation");
    define('DOPBS_HELP_FAQ', "FAQ");

?>