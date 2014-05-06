<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 1.2
* File                    : fr.php
* File Version            : 1.0
* Created / Last Modified : 29 July 2013
* Author                  : Dot on Paper
* Copyright               : © 2013 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : French Front End Translation.
* Translated by           : Asselin de Beauville Christophe - http://gegeek.net/
*/
   
    // Months & Week Days
    global $DOPBS_month_names;
    global $DOPBS_month_short_names;
    $DOPBS_month_names = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
    $DOPBS_month_short_names = array('Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jun', 'Jui', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec');
    
    global $DOPBS_day_names;
    global $DOPBS_day_short_names;
    $DOPBS_day_names = array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
    $DOPBS_day_short_names = array('Di', 'lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa');
    
    // Calendar 
    define('DOPBS_ADD_MONTH_VIEW', "Ajouter la vue du mois suivant");
    define('DOPBS_REMOVE_MONTH_VIEW', "Supprimer la vue du mois suivant");
    define('DOPBS_PREVIOUS_MONTH', "Mois précédent");
    define('DOPBS_NEXT_MONTH', "Mois suivant");
    define('DOPBS_AVAILABLE_ONE_TEXT', "Disponible");
    define('DOPBS_AVAILABLE_TEXT', "disponible");
    define('DOPBS_BOOKED_TEXT', "Réservé");
    define('DOPBS_UNAVAILABLE_TEXT', "Indisponible");
                            
    // Calendar Form 
    define('DOPBS_CHECK_IN_LABEL', "Arrivée");
    define('DOPBS_CHECK_OUT_LABEL', "Départ");
    define('DOPBS_START_HOURS_LABEL', "Arrivée à"); 
    define('DOPBS_END_HOURS_LABEL', "Départ à");
    define('DOPBS_NO_ITEMS_LABEL', "Aucun élément de réservation"); 
    define('DOPBS_SERVICES_LABEL', "Services");
    define('DOPBS_TOTAL_PRICE_LABEL', "Total:");
    define('DOPBS_DEPOSIT_PRICE_LABEL', "Dépôt:");
    define('DOPBS_DEPOSIT_PRICE_LEFT_LABEL', " Reste à payer:");
    define('DOPBS_DISCOUNT_PRICE_LABEL', "Prix actuel:");
    define('DOPBS_DISCOUNT_TEXT', "rabais");
    define('DOPBS_DEPOSIT_TEXT', "dépôt");
    
    define('DOPBS_NO_SERVICES_AVAILABLE', "Il n'y a pas de services disponibles pour la période que vous avez sélectionné.");
    define('DOPBS_MIN_STAY_WARNING', "Vous avez besoin de réserver un nombre minimum de jours");
    define('DOPBS_MAX_STAY_WARNING', "Vous avez besoin de réserver un nombre maximum de jours");
    
    define('DOPBS_FORM_TITLE', 'Informations de contact');
    define('DOPBS_FORM_REQUIRED', "est requis.");    
    define('DOPBS_FORM_EMAIL_INVALID', "est invalide. Veuillez entrer une adresse e-mail valide."); 
    define('DOPBS_NO_PEOPLE_LABEL', "Personne");
    define('DOPBS_NO_ADULTS_LABEL', "Aucun adulte");
    define('DOPBS_NO_CHILDREN_LABEL', "Aucun enfant");
    define('DOPBS_PAYMENT_ARRIVAL_LABEL', "Payer à l'arrivée (réservation instantanée)"); 
    define('DOPBS_PAYMENT_ARRIVAL_SUCCESS', "Votre demande a bien été envoyé. Veuillez attendre l'approbation.");
    define('DOPBS_PAYMENT_ARRIVAL_SUCCESS_INSTANT_BOOKING', "Votre demande a bien été reçue. Nous vous attendons!");
    define('DOPBS_PAYMENT_PAYPAL_LABEL', "Payer sur PayPal (réservation instantanée)");
    define('DOPBS_PAYMENT_PAYPAL_TRANSACTON_ID_LABEL', "ID de tansaction Paypal");
    define('DOPBS_PAYMENT_PAYPAL_SUCCESS', "Votre paiement a été approuvé et vos services sont réservés."); 
    define('DOPBS_PAYMENT_PAYPAL_ERROR', "Il y a eu une erreur lors du traitement de paiement PayPal. Veuillez essayer à nouveau.");
    define('DOPBS_TERMS_AND_CONDITIONS_INVALID', "Vous devez accepter nos Termes & Conditions pour continuer.");  
    define('DOPBS_TERMS_AND_CONDITIONS_LABEL', "Je m'engage à accepter les Termes & Conditions.");
    define('DOPBS_BOOK_NOW_LABEL', "Réserver maintenant");
    
    // Email 
    define('DOPBS_EMAIL_RESERVATION_ID', 'ID de réservation');
    define('DOPBS_EMAIL_CALENDAR_ID', 'ID du calendrier');
    define('DOPBS_EMAIL_CALENDAR_NAME', 'Nom du calendrier');
    
    define('DOPBS_EMAIL_TO_USER_SUBJECT', "Votre demande de réservation a été envoyée.");
    define('DOPBS_EMAIL_TO_USER_MESSAGE_PAYMENT_ARRIVAL', "Veuillez attendre l'approbation. Voici les détails ci-dessous.");
    define('DOPBS_EMAIL_TO_USER_MESSAGE_PAYMENT_ARRIVAL_INSTANT_BOOKING', "Voici les détails ci-dessous.");
    define('DOPBS_EMAIL_TO_USER_MESSAGE_PAYMENT_PAYPAL', "La période a été réservée. Voici les détails.");
    
    define('DOPBS_EMAIL_TO_ADMIN_SUBJECT', "Vous avez reçu une demande de réservation.");
    define('DOPBS_EMAIL_TO_ADMIN_MESSAGE_PAYMENT_ARRIVAL', "Voici les détails. Aller à l'administration pour approuver ou rejeter la demande.");
    define('DOPBS_EMAIL_TO_ADMIN_MESSAGE_PAYMENT_ARRIVAL_INSTANT_BOOKING', "Voici les détails. Aller à l'administration pour annuler la demande.");
    define('DOPBS_EMAIL_TO_ADMIN_MESSAGE_PAYMENT_PAYPAL', "Voici les détails. Le paiement a été effectué via PayPal et la période a été réservée.");
    
    define('DOPBS_EMAIL_APPROVED_SUBJECT', "Votre demande de réservation a été approuvée.");
    define('DOPBS_EMAIL_APPROVED_MESSAGE', "Félicitations! Votre demande de réservation a été approuvée. Les détails au sujet de votre demande sont ci-dessous.");
    
    define('DOPBS_EMAIL_REJECTED_SUBJECT', "Votre demande de réservation a été rejetée.");
    define('DOPBS_EMAIL_REJECTED_MESSAGE', "Nous sommes désolés mais votre demande de réservation a été rejetée. Les détails au sujet de votre demande sont ci-dessous.");
    
    define('DOPBS_EMAIL_CANCELED_SUBJECT', "Votre demande de réservation a été annulée.");
    define('DOPBS_EMAIL_CANCELED_MESSAGE', "Nous sommes désolés mais votre demande de réservation a été annulée. Les détails au sujet de votre demande sont ci-dessous.");
    
    define('DOPBS_BOOKING_FORM_CHECKED', "Coché");
    define('DOPBS_BOOKING_FORM_UNCHECKED', "Non coché");
    
?>