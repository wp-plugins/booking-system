<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 1.0
* File                    : du.php
* File Version            : 1.0
* Created / Last Modified : 29 July 2013
* Author                  : Dot on Paper
* Copyright               : © 2013 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Dutch Front End Translation.
* Translated by           : Kay van Aarssen - ICTWebSolution (http://www.ictwebsolution.nl)
*/
   
    // Months & Week Days
    global $DOPBS_month_names;
    global $DOPBS_month_short_names;
    $DOPBS_month_names = array('Januari', 'Februari', 'Maart', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September', 'Oktober', 'November', 'December');
    $DOPBS_month_short_names = array('Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec');
    
    global $DOPBS_day_names;
    global $DOPBS_day_short_names;
    $DOPBS_day_names = array('Zondag', 'Maandag', 'Dinsdag', 'Woensdag', 'Donderdag', 'Vrijdag', 'Zaterdag');
    $DOPBS_day_short_names = array('Zo', 'Ma', 'Di', 'Wo', 'Do', 'Vr', 'Za');
    
    // Calendar 
    define('DOPBS_ADD_MONTH_VIEW', "Voeg extra maand toe");
    define('DOPBS_REMOVE_MONTH_VIEW', "Verwijder extra maand");
    define('DOPBS_PREVIOUS_MONTH', "Vorige maand");
    define('DOPBS_NEXT_MONTH', "Volgende maand");
    define('DOPBS_AVAILABLE_ONE_TEXT', "beschikbaar");
    define('DOPBS_AVAILABLE_TEXT', "beschikbaar");
    define('DOPBS_BOOKED_TEXT', "bezet");
    define('DOPBS_UNAVAILABLE_TEXT', "niet beschikbaar");
                            
    // Calendar Form 
    define('DOPBS_CHECK_IN_LABEL', "Check In");
    define('DOPBS_CHECK_OUT_LABEL', "Check Uit");
    define('DOPBS_START_HOURS_LABEL', "Start op"); 
    define('DOPBS_END_HOURS_LABEL', "Eindigd op");
    define('DOPBS_NO_ITEMS_LABEL', "# Accomodaties"); 
    define('DOPBS_SERVICES_LABEL', "Services");
    define('DOPBS_TOTAL_PRICE_LABEL', "Totaal:");
    define('DOPBS_DEPOSIT_PRICE_LABEL', "Tegoed:");
    define('DOPBS_DEPOSIT_PRICE_LEFT_LABEL', " Te betalen:");
    define('DOPBS_DISCOUNT_PRICE_LABEL', "Actuele prijs Price:");
    define('DOPBS_DISCOUNT_TEXT', "Korting");
    define('DOPBS_DEPOSIT_TEXT', "Tegoed");
    
    define('DOPBS_NO_SERVICES_AVAILABLE', "Er zijn geen Er zijn geen diensten beschikbaar voor de periode die u hebt geselecteerd.");
    define('DOPBS_MIN_STAY_WARNING', "U dient een minimaal aantal dagen te reserveren");
    define('DOPBS_MAX_STAY_WARNING', "U kunt een maximum aantal dagen boeken");
    
    define('DOPBS_FORM_TITLE', 'Contact Informatie');
    define('DOPBS_FORM_REQUIRED', "is verplicht.");    
    define('DOPBS_FORM_EMAIL_INVALID', "is niet juist. Vul a.u.b. een geldig mail adres in."); 
    define('DOPBS_NO_PEOPLE_LABEL', "Geen Personen");
    define('DOPBS_NO_ADULTS_LABEL', "Geen Volwassenen");
    define('DOPBS_NO_CHILDREN_LABEL', "Geen Kinderen");
    define('DOPBS_PAYMENT_ARRIVAL_LABEL', "Betaling na bevestiging"); 
    define('DOPBS_PAYMENT_ARRIVAL_SUCCESS', "Uw aanvraag is succesvol verzonden. U ontvangt z.s.m. een reactie.");
    define('DOPBS_PAYMENT_ARRIVAL_SUCCESS_INSTANT_BOOKING', "Your request has been successfully received. We are waiting you!");
    define('DOPBS_PAYMENT_PAYPAL_LABEL', "Betaal via PayPal (Direct boeken)");
    define('DOPBS_PAYMENT_PAYPAL_TRANSACTON_ID_LABEL', "PayPal Transactie ID");
    define('DOPBS_PAYMENT_PAYPAL_SUCCESS', "Uw betaling is goedgekeurd en de diensten zijn geboekt."); 
    define('DOPBS_PAYMENT_PAYPAL_ERROR', "Er is een fout opgetreden tijdens het verwerken van PayPal-betaling. Probeer het opnieuw.");
    define('DOPBS_TERMS_AND_CONDITIONS_INVALID', "U moet de algemene voorwaarden accepteren om door te gaan.");  
    define('DOPBS_TERMS_AND_CONDITIONS_LABEL', "Ik accepteer de algemene voorwaarden.");
    define('DOPBS_BOOK_NOW_LABEL', "Reserveer nu!");
    
    // Email 
    define('DOPBS_EMAIL_RESERVATION_ID', 'Reserverings ID');
    define('DOPBS_EMAIL_CALENDAR_ID', 'Kalender ID');
    define('DOPBS_EMAIL_CALENDAR_NAME', 'Agendanaam');
    
    define('DOPBS_EMAIL_TO_USER_SUBJECT', "Uw boekingsverzoek is verzonden.");
    define('DOPBS_EMAIL_TO_USER_MESSAGE_PAYMENT_ARRIVAL', "Wacht a.u.b. op goedkeuring. Hieronder staat de gegevens.");
    define('DOPBS_EMAIL_TO_USER_MESSAGE_PAYMENT_ARRIVAL_INSTANT_BOOKING', "Hieronder staat de gegevens.");
    define('DOPBS_EMAIL_TO_USER_MESSAGE_PAYMENT_PAYPAL', "De periode is geboekt. Hieronder staan de gegevens.");
    
    define('DOPBS_EMAIL_TO_ADMIN_SUBJECT', "U heeft een boekingsaanvraag ontvangen");
    define('DOPBS_EMAIL_TO_ADMIN_MESSAGE_PAYMENT_ARRIVAL', "Hieronder staan de gegevens. Ga naar het administratie gedeelte om de boeking te accepteren of af te wijzen.");
    define('DOPBS_EMAIL_TO_ADMIN_MESSAGE_PAYMENT_ARRIVAL_INSTANT_BOOKING', "Hieronder staat de gegevens. Ga naar het administratie gedeelte om de boeking te annuleren.");
    define('DOPBS_EMAIL_TO_ADMIN_MESSAGE_PAYMENT_PAYPAL', "Hieronder staan de gegevens. De betaling is gedaan via PayPal en de periode is geboekt.");
    
    define('DOPBS_EMAIL_APPROVED_SUBJECT', "Uw boekingsaanvraag is goedgekeurd.");
    define('DOPBS_EMAIL_APPROVED_MESSAGE', "Gefelifiteerd! Uw boekingsaanvraag is goedgekeurd. Gegevens over uw boeking staan hieronder.");
    
    define('DOPBS_EMAIL_REJECTED_SUBJECT', "Uw boekingsaanvraag is afgewezen.");
    define('DOPBS_EMAIL_REJECTED_MESSAGE', "Sorry, maar helaas is uw boekingsaanvraag afgewezen. De gegevens van uw boeking staan hieronder.");
    
    define('DOPBS_EMAIL_CANCELED_SUBJECT', "Uw boekingsaanvraag is geannuleerd.");
    define('DOPBS_EMAIL_CANCELED_MESSAGE', "Sorry, maar helaas is uw boekingsaanvraag geannuleerd. De gegevens van uw boeking staan hieronder.");
    
    define('DOPBS_BOOKING_FORM_CHECKED', "Gecontroleerd");
    define('DOPBS_BOOKING_FORM_UNCHECKED', "Ongehinderd");
    
?>