<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 1.2
* File                    : pl.php
* File Version            : 1.0
* Created / Last Modified : 29 July 2013
* Author                  : Dot on Paper
* Copyright               : © 2013 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Polish Front End Translation.
* Translated by           : Kwasniewski Krzysztof - http://etechnologie.pl
*/
   
    // Months & Week Days
    global $DOPBS_month_names;
    global $DOPBS_month_short_names;
    $DOPBS_month_names = array('Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień');
    $DOPBS_month_short_names = array('Sty', 'Lut', 'Mar', 'Kwi', 'Maj', 'Cze', 'Lip', 'Sie', 'Wrz', 'Paź', 'Lis', 'Gru');
    
    global $DOPBS_day_names;
    global $DOPBS_day_short_names;
    $DOPBS_day_names = array('Niedziela', 'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota');
    $DOPBS_day_short_names = array('Niedz', 'Pon', 'Wt', 'Śr', 'Czw', 'Pt', 'Sob');
    
    // Calendar 
    define('DOPBS_ADD_MONTH_VIEW', "Dodaj widok miesiąca");
    define('DOPBS_REMOVE_MONTH_VIEW', "Usuń widok miesiąca");
    define('DOPBS_PREVIOUS_MONTH', "Poprzedni miesiąc");
    define('DOPBS_NEXT_MONTH', "Następny miesiąc");
    define('DOPBS_AVAILABLE_ONE_TEXT', "dostępne");
    define('DOPBS_AVAILABLE_TEXT', "dostępne");
    define('DOPBS_BOOKED_TEXT', "zajęte");
    define('DOPBS_UNAVAILABLE_TEXT', "zajęte");
                            
    // Calendar Form 
    define('DOPBS_CHECK_IN_LABEL', "Przyjazd");
    define('DOPBS_CHECK_OUT_LABEL', "Wyjazd");
    define('DOPBS_START_HOURS_LABEL', "Rozpoczęcie"); 
    define('DOPBS_END_HOURS_LABEL', "Zakończenie");
    define('DOPBS_NO_ITEMS_LABEL', "Brak rezerwacji"); 
    define('DOPBS_SERVICES_LABEL', "Usługi");
    define('DOPBS_TOTAL_PRICE_LABEL', "Razem:");
    define('DOPBS_DEPOSIT_PRICE_LABEL', "Zaliczka:");
    define('DOPBS_DEPOSIT_PRICE_LEFT_LABEL', " Przejdź do płatności:");
    define('DOPBS_DISCOUNT_PRICE_LABEL', "Aktualna cena:");
    define('DOPBS_DISCOUNT_TEXT', "rabat");
    define('DOPBS_DEPOSIT_TEXT', "zaliczka");
    
    define('DOPBS_NO_SERVICES_AVAILABLE', "W wybranych terminie nie posiadamy wolnych miejsc.");
    define('DOPBS_MIN_STAY_WARNING', "Oferta dotyczy minimalnej liczby dni.");
    define('DOPBS_MAX_STAY_WARNING', "Można zarezerwować tylko max liczbę dni");
    
    define('DOPBS_FORM_TITLE', 'Informacje kontaktowe');
    define('DOPBS_FORM_REQUIRED', "wymagane");    
    define('DOPBS_FORM_EMAIL_INVALID', "Proszę wpisać poprawny adres e-mail."); 
    define('DOPBS_NO_PEOPLE_LABEL', "Ilość dzieci");
    define('DOPBS_NO_ADULTS_LABEL', "Ilość dorosłych");
    define('DOPBS_NO_CHILDREN_LABEL', "Bez dzieci");
    define('DOPBS_PAYMENT_ARRIVAL_LABEL', "Pay on Arrival (need to be approved)"); 
    define('DOPBS_PAYMENT_ARRIVAL_SUCCESS', "Państwa rezerwacja została wysłana, prosimy czekać na potwierdzenie.");
    define('DOPBS_PAYMENT_ARRIVAL_SUCCESS_INSTANT_BOOKING', "Państwa rezerwacja została potwierdzona, dziękujemy!");
    define('DOPBS_PAYMENT_PAYPAL_LABEL', "Pay on PayPal (instant booking)");
    define('DOPBS_PAYMENT_PAYPAL_TRANSACTON_ID_LABEL', "PayPal Transaction ID");
    define('DOPBS_PAYMENT_PAYPAL_SUCCESS', "Płatność została zaakceptowana i rezerwacj potwierdzona."); 
    define('DOPBS_PAYMENT_PAYPAL_ERROR', "Wystapił bład podczas płatności, prosimy spróbować ponownie.");
    define('DOPBS_TERMS_AND_CONDITIONS_INVALID', "Proszę zaakceptować regulamin.");  
    define('DOPBS_TERMS_AND_CONDITIONS_LABEL', "Akceptuję regulamin.");
    define('DOPBS_BOOK_NOW_LABEL', "Rezerwuj teraz");
    
    // Email 
    define('DOPBS_EMAIL_RESERVATION_ID', 'Reservation ID');
    define('DOPBS_EMAIL_CALENDAR_ID', 'Calendar ID');
    define('DOPBS_EMAIL_CALENDAR_NAME', 'Calendar Name');
    
    define('DOPBS_EMAIL_TO_USER_SUBJECT', "Zamówienie została wysłane.");
    define('DOPBS_EMAIL_TO_USER_MESSAGE_PAYMENT_ARRIVAL', "Prosimy czekać na potwierdzenie. poniżej szczegóły.");
    define('DOPBS_EMAIL_TO_USER_MESSAGE_PAYMENT_ARRIVAL_INSTANT_BOOKING', "BSzczegóły zamówienia.");
    define('DOPBS_EMAIL_TO_USER_MESSAGE_PAYMENT_PAYPAL', "Termin został zarezerwowany.");
    
    define('DOPBS_EMAIL_TO_ADMIN_SUBJECT', "Otrzymałeś nową rezerwację.");
    define('DOPBS_EMAIL_TO_ADMIN_MESSAGE_PAYMENT_ARRIVAL', "Szczegóły zamówienia, przejdź do panelu aby zaakceptować.");
    define('DOPBS_EMAIL_TO_ADMIN_MESSAGE_PAYMENT_ARRIVAL_INSTANT_BOOKING', "Szczegóły zamówienia, przejdź do panelu aby anulować.");
    define('DOPBS_EMAIL_TO_ADMIN_MESSAGE_PAYMENT_PAYPAL', "Szczegóły zamówienia, rezerwacja została opłacona i termin zarezerwowany.");
    
    define('DOPBS_EMAIL_APPROVED_SUBJECT', "Rezerwacja została przyjęta.");
    define('DOPBS_EMAIL_APPROVED_MESSAGE', "Dziękujemy, Rezerwacja została przyjęta, szczegóły zamówienia poniżej.");
    
    define('DOPBS_EMAIL_REJECTED_SUBJECT', "Rezerwacja została odrzucona.");
    define('DOPBS_EMAIL_REJECTED_MESSAGE', "Bardzo nam przykro, rezerwacja została odrzucona. Szczegóły poniżej.");
    
    define('DOPBS_EMAIL_CANCELED_SUBJECT', "Rezerwacja została anulowana.");
    define('DOPBS_EMAIL_CANCELED_MESSAGE', "Bardzo nam przykro, rezerwacja została anulowana. Szczegóły poniżej.");
    
    define('DOPBS_BOOKING_FORM_CHECKED', "wybrane");
    define('DOPBS_BOOKING_FORM_UNCHECKED', "niewybrane");
    
?>