<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 1.2
* File                    : de.php
* File Version            : 1.0
* Created / Last Modified : 29 July 2013
* Author                  : Dot on Paper
* Copyright               : © 2013 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : German Front End Translation.
* Translated by           : Dieter Pfenning - dieter.pfenning@winball.de
*/
   
    // Months & Week Days
    global $DOPBS_month_names;
    global $DOPBS_month_short_names;
    $DOPBS_month_names = array('Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember');
    $DOPBS_month_short_names = array('Jan', 'Feb', 'Mär', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dez');
    
    global $DOPBS_day_names;
    global $DOPBS_day_short_names;
    $DOPBS_day_names = array('Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag');
    $DOPBS_day_short_names = array('So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa');
    
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
    define('DOPBS_CHECK_IN_LABEL', "Anreise");
    define('DOPBS_CHECK_OUT_LABEL', "Abreise");
    define('DOPBS_START_HOURS_LABEL', "Start um"); 
    define('DOPBS_END_HOURS_LABEL', "Ende um");
    define('DOPBS_NO_ITEMS_LABEL', "No book items"); 
    define('DOPBS_SERVICES_LABEL', "Services");
    define('DOPBS_TOTAL_PRICE_LABEL', "Summe:");
    define('DOPBS_DEPOSIT_PRICE_LABEL', "Anzahlung:");
    define('DOPBS_DEPOSIT_PRICE_LEFT_LABEL', " Restbetrag:");
    define('DOPBS_DISCOUNT_PRICE_LABEL', "Aktueller Preis:");
    define('DOPBS_DISCOUNT_TEXT', "Ermäßigung");
    define('DOPBS_DEPOSIT_TEXT', "Anzahlung");
    
    define('DOPBS_NO_SERVICES_AVAILABLE', "There are no services available for the period you selected.");
    define('DOPBS_MIN_STAY_WARNING', "Sie müssen zumindest 1 Tag buchen.");
    define('DOPBS_MAX_STAY_WARNING', "Sie können maximal 30 Tage buchen.");
    
    define('DOPBS_FORM_TITLE', 'Kontaktinformationen');
    define('DOPBS_FORM_REQUIRED', "erforderlich.");    
    define('DOPBS_FORM_EMAIL_INVALID', "ist ungültig. Bitte geben Sie eine gültige Emailadresse ein."); 
    define('DOPBS_NO_PEOPLE_LABEL', "Gäste");
    define('DOPBS_NO_ADULTS_LABEL', "Erwachsene");
    define('DOPBS_NO_CHILDREN_LABEL', "Kinder");
    define('DOPBS_PAYMENT_ARRIVAL_LABEL', "Zahlung bei Ankunft (muss genehmigt werden)"); 
    define('DOPBS_PAYMENT_ARRIVAL_SUCCESS', "Ihre Anfrage wurde erfolgreich übermittelt. Bitte warten Sie auf Ihre Bestätigung.");
    define('DOPBS_PAYMENT_ARRIVAL_SUCCESS_INSTANT_BOOKING', "Wir haben Ihre Buchung erhalten. Wir freuen uns auf Sie!");
    define('DOPBS_PAYMENT_PAYPAL_LABEL', "Bezahlung mit PayPal");
    define('DOPBS_PAYMENT_PAYPAL_TRANSACTON_ID_LABEL', "PayPal-Transaktions-ID");
    define('DOPBS_PAYMENT_PAYPAL_SUCCESS', "Ihre Zahlung wurde akzeptiert und die Leistungen sind gebucht."); 
    define('DOPBS_PAYMENT_PAYPAL_ERROR', "Es gab einen Fehler während der Paypal-Bezahlung. Bitte versuchen Sie es erneut.");
    define('DOPBS_TERMS_AND_CONDITIONS_INVALID', "Sie müssen unseren AGB zustimmen, um fortfahren zu können.");  
    define('DOPBS_TERMS_AND_CONDITIONS_LABEL', "Ich akzeptiere die AGB.");
    define('DOPBS_BOOK_NOW_LABEL', "Jetzt buchen");
    
    // Email 
    define('DOPBS_EMAIL_RESERVATION_ID', 'Reservierungs-ID');
    define('DOPBS_EMAIL_CALENDAR_ID', 'Kalender-ID');
    define('DOPBS_EMAIL_CALENDAR_NAME', 'Kalender-Name');
    
    define('DOPBS_EMAIL_TO_USER_SUBJECT', "Ihre Buchungsanfrage wurde versendet.");
    define('DOPBS_EMAIL_TO_USER_MESSAGE_PAYMENT_ARRIVAL', "BItte warten Sie auf die Bestätigung. Details finden Sie nachfolgend.");
    define('DOPBS_EMAIL_TO_USER_MESSAGE_PAYMENT_ARRIVAL_INSTANT_BOOKING', "Details finden Sie nachfolgend.");
    define('DOPBS_EMAIL_TO_USER_MESSAGE_PAYMENT_PAYPAL', "Der Zeitraum wurde gebucht. Details finden Sie nachfolgend.");
    
    define('DOPBS_EMAIL_TO_ADMIN_SUBJECT', "Sie haben eine Buchungsanfrage erhalten.");
    define('DOPBS_EMAIL_TO_ADMIN_MESSAGE_PAYMENT_ARRIVAL', "Details finden Sie nachfolgend. Öffnen Sie das Dashboard um die Anfrage zu genehmigen oder die Anfrage abzulehnen.");
    define('DOPBS_EMAIL_TO_ADMIN_MESSAGE_PAYMENT_ARRIVAL_INSTANT_BOOKING', "Details finden Sie nachfolgend. Öffnen Sie das Dashboard um die Anfrage zu stornieren.");
    define('DOPBS_EMAIL_TO_ADMIN_MESSAGE_PAYMENT_PAYPAL', "Details finden Sie nachfolgend. Es wurde mit Paypal bezahlt und der Zeitraum wurde gebucht.");
    
    define('DOPBS_EMAIL_APPROVED_SUBJECT', "Ihre Buchungsanfrage wurde zurück akzeptiert.");
    define('DOPBS_EMAIL_APPROVED_MESSAGE', "Glückwunsch! Ihre Buchungsanfrage wurde zurück akzeptiert. Details finden Sie nachfolgend.");
    
    define('DOPBS_EMAIL_REJECTED_SUBJECT', "Ihre Buchungsanfrage wurde zurück gewiesen.");
    define('DOPBS_EMAIL_REJECTED_MESSAGE', "Ihre Buchungsanfrage wurde zurück gewiesen. Details finden Sie nachfolgend.");
    
    define('DOPBS_EMAIL_CANCELED_SUBJECT', "Ihre Buchungsanfrage wurde storniert.");
    define('DOPBS_EMAIL_CANCELED_MESSAGE', "Ihre Buchungsanfrage wurde storniert. Details finden Sie nachfolgend.");
    
    define('DOPBS_BOOKING_FORM_CHECKED', "Überprüft");
    define('DOPBS_BOOKING_FORM_UNCHECKED', "Ungeprüft");
    
?>