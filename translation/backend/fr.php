<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 1.1
* File                    : fr.php
* File Version            : 1.0
* Created / Last Modified : 29 July 2013
* Author                  : Dot on Paper
* Copyright               : © 2013 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : French Back End Translation.
* Translated by           : Asselin de Beauville Christophe - http://gegeek.net/
*/

    define('DOPBSP_TITLE', "Système de réservation Pro");

    // Loading ...
    define('DOPBSP_LOAD', "Chargement des informations ...");

    // Save ...
    define('DOPBSP_SAVE', "Sauvegarde des informations ...");
    define('DOPBSP_SAVE_SUCCESS', "Les informations ont été sauvegardées.");
    
    // Months & Week Days
    global $DOPBSP_month_names;
    $DOPBSP_month_names = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
    
    global $DOPBSP_day_names;
    $DOPBSP_day_names = array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
    
    // Help
    define('DOPBSP_CALENDARS_HELP', "Cliquez sur l'icône 'Plus' pour ajouter un mois. Cliquez sur un élément du calendrier pour ouvrir la zone d'édition.");
    define('DOPBSP_CALENDAR_EDIT_HELP', "Sélectionnez les jours et les heures à éditer. Cliquez sur l'icône 'stylo' pour éditer les paramètres du calendrier. Cliquez sur l'icône 'e-mail' pour voir si vous avez des réservations. Lisez la documentation pour plus d'informations.");
    define('DOPBSP_CALENDAR_EDIT_SETTINGS_HELP', "Cliquez sur le bouton 'Enregistrer' pour sauvegarder les changements. Cliquez sur le bouton 'Supprimer' pour supprimer le calendrier. Cliquez sur le bouton 'Retour' pour retourner au calendrier.");
    
    // Form
    define('DOPBSP_SUBMIT', "Enregistrer");
    define('DOPBSP_DELETE', "Supprimer");
    define('DOPBSP_BACK', "Retour");
    define('DOPBSP_BACK_SUBMIT', "Retour au calendrier.");
    define('DOPBSP_ENABLED', "Activé");
    define('DOPBSP_DISABLED', "Désactivé");
    define('DOPBSP_DATE_TYPE_AMERICAN', "Américain (MM JJ, YYYY)");
    define('DOPBSP_DATE_TYPE_EUROPEAN', "Européen (JJ MM YYYY)");

    // Calendars    
    define('DOPBSP_SHOW_CALENDARS', "Calendriers");
    define('DOPBSP_CALENDARS_LOADED', "Liste des calendriers chargée.");
    define('DOPBSP_CALENDAR_LOADED', "Calendrier chargé.");
    define('DOPBSP_NO_CALENDARS', "Aucun calendrier.");    
    
    // Calendar 
    define('DOPBSP_ADD_MONTH_VIEW', "Ajouter la vue du mois suivant");
    define('DOPBSP_REMOVE_MONTH_VIEW', "Supprimer la vue du mois suivant");
    define('DOPBSP_PREVIOUS_MONTH', "Mois précédent");
    define('DOPBSP_NEXT_MONTH', "Mois suivant");
    define('DOPBSP_AVAILABLE_ONE_TEXT', "Disponible");
    define('DOPBSP_AVAILABLE_TEXT', "disponible");
    define('DOPBSP_BOOKED_TEXT', "Réservé");
    define('DOPBSP_UNAVAILABLE_TEXT', "Indisponible");
                            
    // Calendar Form 
    define('DOPBSP_DATE_START_LABEL', "Date d'arrivée");
    define('DOPBSP_DATE_END_LABEL', "Date de départ");    
    define('DOPBSP_STATUS_LABEL', "Statut");
    define('DOPBSP_STATUS_AVAILABLE_TEXT', "Disponible");
    define('DOPBSP_STATUS_BOOKED_TEXT', "Réservé");
    define('DOPBSP_STATUS_SPECIAL_TEXT', "Special");
    define('DOPBSP_STATUS_UNAVAILABLE_TEXT', "Indisponible");
    define('DOPBSP_PRICE_LABEL', "Prix");    
    define('DOPBSP_PROMO_LABEL', "Prix Promotionnel");               
    define('DOPBSP_AVAILABLE_LABEL', "No. Disponible");         
    define('DOPBSP_HOURS_DEFINITIONS_CHANGE_LABEL', "Changer les horaires(cela remplacera toute autre définition horaire précédente)");
    define('DOPBSP_HOURS_DEFINITIONS_LABEL', "Heures (hh:mm, ajouter une par ligne). Utiliser uniquement le format 24h.");  
    define('DOPBSP_HOURS_SET_DEFAULT_DATA_LABEL', "Définir les horaires par défaut pour ce(s) jour(s). Cela remplacera toute configuration horaire existante.)"); 
    define('DOPBSP_HOURS_START_LABEL', "Heure d'arrivée"); 
    define('DOPBSP_HOURS_END_LABEL', "Heure de départ");
    define('DOPBSP_HOURS_INFO_LABEL', "Information (les utilisateurs verront ce message)");
    define('DOPBSP_HOURS_NOTES_LABEL', "Notes (vous serez le seul à voir ce message)");
    define('DOPBSP_GROUP_DAYS_LABEL', "Groupe de jours");
    define('DOPBSP_GROUP_HOURS_LABEL', "Groupe d'heures");
    define('DOPBSP_RESET_CONFIRMATION', "Etes-vous sûr de vouloir réinitialiser les informations? Si vous réinitialisez les jours, les informations horaires de ces jours seront aussi réinitialisées.");
    
    // Add Calendar
    define('DOPBSP_ADD_CALENDAR_NAME', "Nouveau calendrier");

    // Edit Calendar
    define('DOPBSP_EDIT_CALENDAR_SUBMIT', "Editer le calendrier");
    define('DOPBSP_EDIT_CALENDAR_USERS_PERMISSIONS', "Permissions des utilisateurs");
    define('DOPBSP_EDIT_CALENDAR_SUCCESS', "Vous avez éditer le calendrier avec succès.");
    
    // Reservations
    define('DOPBSP_SHOW_RESERVATIONS', "Montrer les réservations");    
    define('DOPBSP_NO_RESERVATIONS', "Il n'y a aucune réservations.");
    
    define('DOPBSP_RESERVATIONS_ID', "ID de la réservation");
    
    define('DOPBSP_RESERVATIONS_CHECK_IN_LABEL', "Arrivée");
    define('DOPBSP_RESERVATIONS_CHECK_OUT_LABEL', "Départ");
    define('DOPBSP_RESERVATIONS_START_HOURS_LABEL', "Arrivée à"); 
    define('DOPBSP_RESERVATIONS_END_HOURS_LABEL', "Départ à");
    
    define('DOPBSP_RESERVATIONS_FIRST_NAME_LABEL', "Prénom");
    define('DOPBSP_RESERVATIONS_LAST_NAME_LABEL', "Nom");
    define('DOPBSP_RESERVATIONS_STATUS_LABEL', "Statut");
    define('DOPBSP_RESERVATIONS_STATUS_PENDING', "En attente");
    define('DOPBSP_RESERVATIONS_STATUS_APPROVED', "Approuvé");        
    define('DOPBSP_RESERVATIONS_DATE_CREATED_LABEL', "Date de création");    
    define('DOPBSP_RESERVATIONS_PAYMENT_METHOD_LABEL', 'Méthode de paiement');
    define('DOPBSP_RESERVATIONS_PAYMENT_METHOD_ARRIVAL', 'A l\'arrivée');
    define('DOPBSP_RESERVATIONS_PAYMENT_METHOD_PAYPAL', 'PayPal');
    define('DOPBSP_RESERVATIONS_PAYMENT_METHOD_PAYPAL_TRANSACTION_ID_LABEL', 'ID de la transaction Paypal');   
    define('DOPBSP_RESERVATIONS_TOTAL_PRICE_LABEL', "Total:"); 
    define('DOPBSP_RESERVATIONS_NO_ITEMS_LABEL', "Aucun élément réservé"); 
    define('DOPBSP_RESERVATIONS_PRICE_LABEL', "Prix"); 
    define('DOPBSP_RESERVATIONS_DEPOSIT_PRICE_LABEL', "Dépôt");
    define('DOPBSP_RESERVATIONS_DEPOSIT_PRICE_LEFT_LABEL', " Reste à payer");
    define('DOPBSP_RESERVATIONS_DISCOUNT_PRICE_LABEL', "Prix actuel");
    define('DOPBSP_RESERVATIONS_DISCOUNT_PRICE_TEXT', "Rabais");
    define('DOPBSP_RESERVATIONS_EMAIL_LABEL', "Email"); 
    define('DOPBSP_RESERVATIONS_PHONE_LABEL', "Téléphone"); 
    define('DOPBSP_RESERVATIONS_NO_PEOPLE_LABEL', "Aucune personne"); 
    define('DOPBSP_RESERVATIONS_NO_ADULTS_LABEL', "Aucun adulte"); 
    define('DOPBSP_RESERVATIONS_NO_CHILDREN_LABEL', "Aucun enfant"); 
    define('DOPBSP_RESERVATIONS_MESSAGE_LABEL', "Message");
    
    define('DOPBSP_RESERVATIONS_JUMP_TO_DAY_LABEL', 'Aller au jour');
    define('DOPBSP_RESERVATIONS_APPROVE_LABEL', 'Approuver');
    define('DOPBSP_RESERVATIONS_REJECT_LABEL', 'Rejeter');
    define('DOPBSP_RESERVATIONS_CANCEL_LABEL', 'Annuler');
    
    define('DOPBSP_RESERVATIONS_APPROVE_CONFIRMATION', 'Etes-vous sûr de vouloir approuver cette réservation?');
    define('DOPBSP_RESERVATIONS_APPROVE_SUCCESS', 'Cette réservation à été approuvée.');
    define('DOPBSP_RESERVATIONS_REJECT_CONFIRMATION', 'Etes-vous sûr de vouloir rejeter cette réservation?');
    define('DOPBSP_RESERVATIONS_REJECT_SUCCESS', 'Cette réservation à été rejetée.');
    define('DOPBSP_RESERVATIONS_CANCEL_CONFIRMATION', 'Etes-vous sûr de vouloir annuler cette réservation?');
    define('DOPBSP_RESERVATIONS_CANCEL_SUCCESS', 'Cette réservation à été annulée.');
    
    // TinyMCE
    define('DOPBSP_TINYMCE_ADD', 'Ajouter un calendrier');
    
    // Settings
    define('DOPBSP_GENERAL_STYLES_SETTINGS', "Paramètres généraux");
    define('DOPBSP_CALENDAR_NAME', "Nom");
    define('DOPBSP_AVAILABLE_DAYS', "Jours disponibles");
    define('DOPBSP_FIRST_DAY', "Premier jour");
    define('DOPBSP_CURRENCY', "Devise");
    define('DOPBSP_DATE_TYPE', "Date");
    define('DOPBSP_PREDEFINED', "Selectionner les paramètres prédéfinis");
    define('DOPBSP_TEMPLATE', "Modèle de style");
    define('DOPBSP_MIN_STAY', "Durée minimum");
    define('DOPBSP_MAX_STAY', "Durée maximum");
    define('DOPBSP_NO_ITEMS_ENABLED', "Activer le nombre d\'éléments sélectionnés");
    define('DOPBSP_VIEW_ONLY', "Voir uniquement les informations");
    define('DOPBSP_PAGE_URL', "URL de la page");
    
    define('DOPBSP_NOTIFICATIONS_STYLES_SETTINGS', "Paramètres de notifications");
    define('DOPBSP_NOTIFICATIONS_TEMPLATE', "Modèle d'e-mail");
    define('DOPBSP_NOTIFICATIONS_EMAIL', "E-mails de notifications");
    define('DOPBSP_NOTIFICATIONS_SMTP_ENABLED', "Activer SMTP");
    define('DOPBSP_NOTIFICATIONS_SMTP_HOST_NAME', "Nom d'hôte SMTP");
    define('DOPBSP_NOTIFICATIONS_SMTP_HOST_PORT', "Port d'hôte SMTP");
    define('DOPBSP_NOTIFICATIONS_SMTP_SSL', "Connexion SSL SMTP");
    define('DOPBSP_NOTIFICATIONS_SMTP_USER', "Hôte utilisateur SMTP");
    define('DOPBSP_NOTIFICATIONS_SMTP_PASSWORD', "Mot de passe hôte SMTP");
                                              
    define('DOPBSP_HOURS_STYLES_SETTINGS', "Paramètres des heures");
    define('DOPBSP_MULTIPLE_DAYS_SELECT', "Utiliser Arrivée/Départ");
    define('DOPBSP_MORNING_CHECK_OUT', "Départ le matin");
    define('DOPBSP_HOURS_ENABLED', "Utiliser les heures");
    define('DOPBSP_HOURS_DEFINITIONS', "Definir les heures");
    define('DOPBSP_MULTIPLE_HOURS_SELECT', "Utiliser le début/fin des heures");
    define('DOPBSP_HOURS_AMPM', "Activer le format AM/PM");
    define('DOPBSP_LAST_HOUR_TO_TOTAL_PRICE', "Ajouter le prix horaire précédemment sélectionné au prix total");
    define('DOPBSP_HOURS_INTERVAL_ENABLED', "Ajouter les intervalles horaires");
    
    define('DOPBSP_DISCOUNTS_NO_DAYS_SETTINGS', "Rabais par Nombre de jours");
    define('DOPBSP_DISCOUNTS_NO_DAYS', "Nombre de jours");
    define('DOPBSP_DISCOUNTS_NO_DAYS_DAYS', "jours de réservation");
    
    define('DOPBSP_DEPOSIT_SETTINGS', "Depôt");
    define('DOPBSP_DEPOSIT', "Valeur du dépôt");
    
    define('DOPBSP_FORM_STYLES_SETTINGS', "Paramètres des formulaires de contact");
    define('DOPBSP_FORM', "Séléctionnez le formulaire");
    define('DOPBSP_INSTANT_BOOKING_ENABLED', "Réservation instantanée");
    define('DOPBSP_NO_PEOPLE_ENABLED', "Activer le nombre de personnes autorisées");
    define('DOPBSP_MIN_NO_PEOPLE', "Nombre minimum de personnes autorisées");
    define('DOPBSP_MAX_NO_PEOPLE', "Nombre maximum de personnes autorisées");
    define('DOPBSP_NO_CHILDREN_ENABLED', "Activer le nombre d'enfants autorisés");
    define('DOPBSP_MIN_NO_CHILDREN', "Nombre minimum d'enfants autorisés");
    define('DOPBSP_MAX_NO_CHILDREN', "Nombre maximum d'enfants autorisés");
    define('DOPBSP_PAYMENT_ARRIVAL_ENABLED', "Activer le paiement à l'arrivée");
    
    define('DOPBSP_PAYMENT_PAYPAL_STYLES_SETTINGS', "Paramètres Paypal");
    define('DOPBSP_PAYMENT_PAYPAL_ENABLED', "Activer le paiement par Paypal");
    define('DOPBSP_PAYMENT_PAYPAL_USERNAME', "Nom d'utilisateur de l'API Paypal");
    define('DOPBSP_PAYMENT_PAYPAL_PASSWORD', "Mot de passe de l'API Paypal");
    define('DOPBSP_PAYMENT_PAYPAL_SIGNATURE', "Signature de l'API Paypal");
    define('DOPBSP_PAYMENT_PAYPAL_CREDIT_CARD', "Activer la paiement par carte de crédit");
    define('DOPBSP_PAYMENT_PAYPAL_SANDBOX_ENABLED', "Activer PayPal Sandbox");
    
    define('DOPBSP_TERMS_AND_CONDITIONS_ENABLED', "Activer les Termes & Conditions");
    define('DOPBSP_TERMS_AND_CONDITIONS_LINK', "Lien des Termes & Conditions");
    
    define('DOPBSP_GO_TOP', "monter");
    define('DOPBSP_SHOW', "montrer");
    define('DOPBSP_HIDE', "cacher");
    
    // Settings Info
    define('DOPBSP_CALENDAR_NAME_INFO', "Changer le nom du calendrier.");
    define('DOPBSP_AVAILABLE_DAYS_INFO', "Valeur par défaut: tout disponible. Séléctionner les jours disponibles.");
    define('DOPBSP_FIRST_DAY_INFO', "Valeur par défaut: Lundi. Sélectionner le premier jour du calendrier.");
    define('DOPBSP_CURRENCY_INFO', "Valeur par défaut: USD. Sélectionner la devise du calendrier.");
    define('DOPBSP_DATE_TYPE_INFO', "Valeur par défaut: Americain. Sélectionner le format de date: Americain (MM JJ, AAAA) ou Européen (JJ MM AAAA).");
    define('DOPBSP_PREDEFINED_INFO', "Si sélectionnés à l'envoie, les paramètres ci-dessous seront changés.");
    define('DOPBSP_TEMPLATE_INFO', "Valeur par défaut: défaut. Sélectionner le modèle de style.");
    define('DOPBSP_MIN_STAY_INFO', "Valeur par défaut: 1. Fixer le nombre minimum de jours qui peuvent être sélectionnés.");
    define('DOPBSP_MAX_STAY_INFO', "Valeur par défaut: 0. Fixer le nombre maximum de jours qui peuvent être sélectionnés. Si vous mettez 0, le nombre est illimité.");
    define('DOPBSP_NO_ITEMS_ENABLED_INFO', "Valeur par défaut: Activé. Configuré pour afficher uniquement les informations de réservation sur le site.");
    define('DOPBSP_VIEW_ONLY_INFO', "Valeur par défaut: Activé. Configuré pour afficher uniquement les informations de réservation sur le site.");
    define('DOPBSP_PAGE_URL_INFO', "Définir le lien URL où le calendrier sera ajouté. Ceci est obligatoire si vous créez un système de recherche à travers des calendriers.");
    
    define('DOPBSP_NOTIFICATIONS_TEMPLATE_INFO', "Valeur par défaut: default. Select email template.");
    define('DOPBSP_NOTIFICATIONS_EMAIL_INFO', "Enter the email were you will notified about booking requests or you will use to notify users.");
    define('DOPBSP_NOTIFICATIONS_SMTP_ENABLED_INFO', "Use SMTP to send emails.");
    define('DOPBSP_NOTIFICATIONS_SMTP_HOST_NAME_INFO', "Enter SMTP host name.");
    define('DOPBSP_NOTIFICATIONS_SMTP_HOST_PORT_INFO', "Enter SMTP host port.");
    define('DOPBSP_NOTIFICATIONS_SMTP_SSL_INFO', "Use a  SSL conenction.");
    define('DOPBSP_NOTIFICATIONS_SMTP_USER_INFO', "Enter SMTP host username.");
    define('DOPBSP_NOTIFICATIONS_SMTP_PASSWORD_INFO', "Enter SMTP host password.");
    
    define('DOPBSP_MULTIPLE_DAYS_SELECT_INFO', "Valeur par défaut: Activé. Utiliser Départ/Arrivée ou uniquement un jour.");
    define('DOPBSP_MORNING_CHECK_OUT_INFO', "Valeur par défaut: Désactivé. Cette option active l'Arrivée dans l'après-midi de la première journée et le Départ le matin du jour après le dernier jour.");
    define('DOPBSP_HOURS_ENABLED_INFO', "Valeur par défaut: Désactivé. Activer les heures dans le calendrier.");
    define('DOPBSP_HOURS_DEFINITIONS_INFO', "Entrez hh:mm ... ajouter une heure par ligne. En changeant ces valeurs, les paramètres précédents seront écrasés. Utilisez uniquement le format 24h.");
    define('DOPBSP_MULTIPLE_HOURS_SELECT_INFO', "Valeur par défaut: Activé. Utiliser les heures de Départ/Arrivée ou uniquement sélectionner une heure.");
    define('DOPBSP_HOURS_AMPM_INFO', "Valeur par défaut: Désactivé. Afficher les heure au format AP/PM. NOTE: Les heures doivent rester en format 24 heures.");
    define('DOPBSP_LAST_HOUR_TO_TOTAL_PRICE_INFO', "Valeur par défaut: Activé. Cela calcule le prix total avant les dernières heures sélectionnées si cela est désactivée. Cela calcule le prix total, y compris la dernière heure choisie si elle est activée. <br /> <br /> <strong> Attention: </ strong> Dans le panel d'administration les dernières heures de votre liste de définitions ne sera pas affichée.");
    define('DOPBSP_HOURS_INTERVAL_ENABLED_INFO', "Valeur par défaut: Désactivé. Afficher l'intervalle des heures à partir de l'heure courante à la suivante.");
    
    define('DOPBSP_DISCOUNTS_NO_DAYS_INFO', "Sélectionnez le nombre de jours auxquels vous souhaitez ajouter un rabais (jusqu'à 31 jours).");
    define('DOPBSP_DISCOUNTS_NO_DAYS_DAYS_INFO', "Valeur par défaut 0. Réglez le pourcentage de rabais qu'un utilisateur obtiendra lors de la réservation pour ce nombre de jours.");
    
    define('DOPBSP_DEPOSIT_INFO', "Valeur par défaut: 0. Réglez la valeur en pourcentage pour le dépôt. Le dépôt est disponible uniquement si vous avez un service de paiement activé.");
    
    define('DOPBSP_FORM_INFO', "Sélectionnez le formulaire du système de réservation.");
    define('DOPBSP_INSTANT_BOOKING_ENABLED_INFO', "Valeur par défaut: Désactivé. Réserver immédiatement les données dans un calendrier dès que la demande a été présentée.");
    define('DOPBSP_NO_PEOPLE_ENABLED_INFO', "Valeur par défaut: Activé. Demander le nombre de personnes qui utiliseront l'élément réservé.");
    define('DOPBSP_MIN_NO_PEOPLE_INFO', "Valeur par défaut: 1. Définir le nombre minimum de personnes autorisées par réservation.");
    define('DOPBSP_MAX_NO_PEOPLE_INFO', "Valeur par défaut: 4. Définir le nombre maximum de personnes autorisées par réservation.");
    define('DOPBSP_NO_CHILDREN_ENABLED_INFO', "Valeur par défaut: Activer. Demander le nombre d'enfants qui utiliseront l'élément réservé.");
    define('DOPBSP_MIN_NO_CHILDREN_INFO', "Valeur par défaut: 0. Définir le nombre minimum d'enfants autorisés par réservation.");
    define('DOPBSP_MAX_NO_CHILDREN_INFO', "Valeur par défaut: 2. Définir le nombre maximum d'enfants autorisés par réservation.");
    define('DOPBSP_PAYMENT_ARRIVAL_ENABLED_INFO', "Valeur par défaut: Activé. Autoriser les utilisateurs à payer à l'arrivée. Besoin d'approbation.");
    
    define('DOPBSP_PAYMENT_PAYPAL_ENABLED_INFO', "Valeur par défaut: Désactivé. Autoriser les utilisateurs à payer avec Paypal. La période est automatiquement réservée.");
    define('DOPBSP_PAYMENT_PAYPAL_USERNAME_INFO', "Entrer les informations de nom d'utilisateur de l'API de PayPal. Voir la section Aide pour voir d'où vous pouvez les obtenir.");
    define('DOPBSP_PAYMENT_PAYPAL_PASSWORD_INFO', "Entrer les informations de mot de passe de l'API de PayPal. Voir la section Aide pour voir d'où vous pouvez les obtenir.");
    define('DOPBSP_PAYMENT_PAYPAL_SIGNATURE_INFO', "Entrer les informations de signature de l'API de PayPal. Voir la section Aide pour voir d'où vous pouvez les obtenir.");
    define('DOPBSP_PAYMENT_PAYPAL_CREDIT_CARD_INFO', "Valeur par défaut: Désactivé. Activer afin que les utilisateurs puissent payer directement avec leur carte de crédit.");
    define('DOPBSP_PAYMENT_PAYPAL_SANDBOX_ENABLED_INFO', "Valeur par défaut: Désactivé. Activer pour utiliser les fonctionnalités de PayPal Sandbox.");
    
    define('DOPBSP_TERMS_AND_CONDITIONS_ENABLED_INFO', "Valeur par défaut: Désactivé. Activer la case à cocher des Termes & Conditions.");
    define('DOPBSP_TERMS_AND_CONDITIONS_LINK_INFO', "Entrer le lien de la page des Termes & Conditions.");
    
    // Booking Forms
    define('DOPBSP_TITLE_BOOKING_FORMS', "Formulaires de réservation");
    define('DOPBSP_BOOKING_FORMS_HELP', "Cliquez sur l'icône 'Plus' pour ajouter un formulaire de réservation. Cliquez sur un élément du formulaire de réservation pour la zone d'édition.");
    define('DOPBSP_BOOKING_FORMS_LOADED', "Liste des formulaires de réservation chargée.");
    define('DOPBSP_BOOKING_FORM_SETTINGS_HELP', "Clquez sur le bouton 'Sauvegarder' pour sauvegarder les changements. Cliquez sur le bouton 'Supprimer' pour supprimer le formulaire.");
    define('DOPBSP_BOOKING_FORM_LOADED', "Formulaire de réservation chargé.");
    define('DOPBSP_NO_BOOKING_FORMS', "Aucun formulaire de réservation.");
    
    // Add Booking Form
    define('DOPBSP_ADD_BOOKING_FORM_NAME', "Nouveau formulaire de réservation");
    
    // Edit Booking Form
    define('DOPBSP_EDIT_BOOKING_FORM_SUBMIT', "Sauvegarder");
    define('DOPBSP_EDIT_BOOKING_FORM_SUCCESS', "Vous avez édité le formulaire avec succès.");
    
    // Booking Form Fields
    define('DOPBSP_BOOKING_FORM_NAME', "Nom du formulaire");
    define('DOPBSP_BOOKING_FORM_NAME_DEFAULT', "Formulaire par défaut");
    define('DOPBSP_BOOKING_FORM_FIELDS_TITLE', "Champs de formulaire");
    define('DOPBSP_BOOKING_FORM_FIELDS_SHOW_SETTINGS', "Montrer les paramètres");
    define('DOPBSP_BOOKING_FORM_FIELDS_HIDE_SETTINGS', "Cacher les paramètres");
    define('DOPBSP_BOOKING_FORM_FIELDS_TYPE_TEXT_LABEL', "Texte");
    define('DOPBSP_BOOKING_FORM_FIELDS_TYPE_TEXTAREA_LABEL', "Zone de texte");
    define('DOPBSP_BOOKING_FORM_FIELDS_TYPE_CHECKBOX_LABEL', "Case à cocher");
    define('DOPBSP_BOOKING_FORM_FIELDS_TYPE_SELECT_LABEL', "Menu déroulant");
    define('DOPBSP_BOOKING_FORM_FIELDS_LANGUAGE_LABEL', "Language");
    define('DOPBSP_BOOKING_FORM_FIELDS_NAME_LABEL', "Titre");
    define('DOPBSP_BOOKING_FORM_FIELDS_NEW_FIELD_TEXT_LABEL', "Nouveau champs de texte");
    define('DOPBSP_BOOKING_FORM_FIELDS_NEW_FIELD_TEXTAREA_LABEL', "Nouveau champs de zone de texte");
    define('DOPBSP_BOOKING_FORM_FIELDS_NEW_FIELD_CHECKBOX_LABEL', "Nouveau champs case à cocher");
    define('DOPBSP_BOOKING_FORM_FIELDS_NEW_FIELD_SELECT_LABEL', "Nouveau champs déroulant");
    define('DOPBSP_BOOKING_FORM_FIELDS_ALLOWED_CHARACTERS_LABEL', "Caractères autorisés");
    define('DOPBSP_BOOKING_FORM_FIELDS_SIZE_LABEL', "Taille");
    define('DOPBSP_BOOKING_FORM_FIELDS_EMAIL_LABEL', "Est un e-mail");
    define('DOPBSP_BOOKING_FORM_FIELDS_REQUIRED_LABEL', "Requis");
    define('DOPBSP_BOOKING_FORM_FIELDS_SELECT_OPTIONS_LABEL', "Options");
    define('DOPBSP_BOOKING_FORM_FIELDS_SELECT_ADD_OPTION', "Ajouter une option");
    define('DOPBSP_BOOKING_FORM_FIELDS_SELECT_NEW_OPTION_LABEL', "Nouvelle option");
    define('DOPBSP_BOOKING_FORM_FIELDS_SELECT_DELETE_OPTION', "Supprimer une option");
    define('DOPBSP_BOOKING_FORM_FIELDS_SELECT_MULTIPLE_SELECT_LABEL', "Sélection multiple");
    define('DOPBSP_BOOKING_FORM_CHECKED', "Coché");
    define('DOPBSP_BOOKING_FORM_UNCHECKED', "Non coché");
    
    // Booking Form Fields Info
    define('DOPBSP_BOOKING_FORM_NAME_INFO', "Changer le nom du formulaire et cliquez sur Enregistrer.");
    define('DOPBSP_BOOKING_FORM_FIELDS_INFO', "Faites glisser le type de champs de droite à gauche pour créer un nouveau champs. Faites glisser un champs créé à la corbeille pour supprimer. Cliquez sur Afficher les paramètres pour modifier un champs créé.");
    define('DOPBSP_BOOKING_FORM_FIELDS_LANGUAGE_INFO', "Sélectionnez la langue pour laquelle vous souhaitez modifier les noms (titres).");
    define('DOPBSP_BOOKING_FORM_FIELDS_NAME_INFO', "Entrez le nom du champs (titre).");
    define('DOPBSP_BOOKING_FORM_FIELDS_ALLOWED_CHARACTERS_INFO', "Entrez les caractères autorisés dans ce champs. Laissez ce champs vide si tous les caractères sont autorisés.");
    define('DOPBSP_BOOKING_FORM_FIELDS_SIZE_INFO', "Entrez le nombre maximum de caractères autorisés. Laissez ce champs vide pour un nombre illimité.");
    define('DOPBSP_BOOKING_FORM_FIELDS_EMAIL_INFO', "Vérifiez si vous souhaitez que ce champs vérifie si un e-mail a été ajouté ou non.");
    define('DOPBSP_BOOKING_FORM_FIELDS_REQUIRED_INFO', "Vérifiez si vous souhaitez que ce champs soit obligatoire.");
    define('DOPBSP_BOOKING_FORM_FIELDS_SELECT_OPTIONS_INFO', "Ajouter l'icône Plus pour ajouter une autre option et entrez le nom. Cliquez sur le bouton supprimer pour supprimer l'option.");
    define('DOPBSP_BOOKING_FORM_FIELDS_SELECT_MULTIPLE_SELECT_INFO', "Vérifiez si vous voulez un menu déroulant de sélection multiple.");
    
    // Help
    define('DOPBSP_HELP_DOCUMENTATION', "Documentation");
    define('DOPBSP_HELP_FAQ', "FAQ");

?>