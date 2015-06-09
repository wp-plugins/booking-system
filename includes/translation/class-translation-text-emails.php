<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/translation/class-translation-text-emails.php
* File Version            : 1.0.2
* Created / Last Modified : 12 December 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System emails translation text PHP class.
*/

    if (!class_exists('DOPBSPTranslationTextEmails')){
        class DOPBSPTranslationTextEmails{
            /*
             * Constructor
             */
            function DOPBSPTranslationTextEmails(){
                /*
                 * Initialize emails text.
                 */
                add_filter('dopbsp_filter_translation_text', array(&$this, 'emails'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'emailsDefault'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'emailsEmail'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'emailsAddEmail'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'emailsDeleteEmail'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'emailsHelp'));
            }
            
            /*
             * Emails text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function emails($text){
                array_push($text, array('key' => 'PARENT_EMAILS',
                                        'parent' => '',
                                        'text' => 'Email templates'));
                
                array_push($text, array('key' => 'EMAILS_TITLE',
                                        'parent' => 'PARENT_EMAILS',
                                        'text' => 'Email templates'));
                array_push($text, array('key' => 'EMAILS_CREATED_BY',
                                        'parent' => 'PARENT_EMAILS',
                                        'text' => 'Created by'));
                array_push($text, array('key' => 'EMAILS_LOAD_SUCCESS',
                                        'parent' => 'PARENT_EMAILS',
                                        'text' => 'Email templates  list loaded.'));
                array_push($text, array('key' => 'EMAILS_NO_EMAILS',
                                        'parent' => 'PARENT_EMAILS',
                                        'text' => 'No email templates. Click the above "plus" icon to add new ones.'));
                
                return $text;
            }
            
            /*
             * Emails default text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function emailsDefault($text){
                array_push($text, array('key' => 'PARENT_EMAILS_DEFAULT',
                                        'parent' => '',
                                        'text' => 'Email templates - Default messages'));
                
                array_push($text, array('key' => 'EMAILS_DEFAULT_NAME',
                                        'parent' => 'PARENT_EMAILS_DEFAULT',
                                        'text' => 'Default email templates'));
                
                /*
                 * Default booking, with payment on arrival.
                 */
                array_push($text, array('key' => 'EMAILS_DEFAULT_BOOK_ADMIN_SUBJECT',
                                        'parent' => 'PARENT_EMAILS_DEFAULT',
                                        'text' => 'You received a booking request.',
                                        'de' => 'Sie haben eine buchungsanfrage erhalten.',
                                        'nl' => 'U heeft een boekingsaanvraag ontvangen',
                                        'fr' => 'Vous avez reçu une demande de réservation.',
                                        'pl' => 'Otrzymałeś nową rezerwację.'));
                array_push($text, array('key' => 'EMAILS_DEFAULT_BOOK_ADMIN',
                                        'parent' => 'PARENT_EMAILS_DEFAULT',
                                        'text' => 'Below are the details. Go to admin to approve or reject the request.',
                                        'de' => 'Details finden sie nachfolgend. Öffnen sie das dashboard um die anfrage zu genehmigen oder die anfrage abzulehnen.',
                                        'nl' => 'Hieronder staan de gegevens. Ga naar het administratie gedeelte om de boeking te accepteren of af te wijzen.',
                                        'fr' => 'Voici les détails. Aller à l<<single-quote>>administration pour approuver ou rejeter la demande.',
                                        'pl' => 'Szczegóły zamówienia, przejdź do panelu aby zaakceptować.'));
                array_push($text, array('key' => 'EMAILS_DEFAULT_BOOK_USER_SUBJECT',
                                        'parent' => 'PARENT_EMAILS_DEFAULT',
                                        'text' => 'Your booking request has been sent.',
                                        'de' => 'Ihre Buchungsanfrage wurde versendet.',
                                        'nl' => 'Uw boekingsverzoek is verzonden.',
                                        'fr' => 'Votre demande de réservation a été envoyée.',
                                        'pl' => 'Zamówienie została wysłane.'));
                array_push($text, array('key' => 'EMAILS_DEFAULT_BOOK_USER',
                                        'parent' => 'PARENT_EMAILS_DEFAULT',
                                        'text' => 'Please wait for approval. Below are the details.',
                                        'de' => 'BItte warten sie auf die bestätigung. Details finden sie nachfolgend.',
                                        'nl' => 'Wacht a.u.b. op goedkeuring. Hieronder staat de gegevens.',
                                        'fr' => 'Veuillez attendre l<<single-quote>>approbation. Voici les détails ci-dessous.',
                                        'pl' => 'Prosimy czekać na potwierdzenie. Poniżej szczegóły.'));
                /*
                 * Booking with approval.
                 */
                array_push($text, array('key' => 'EMAILS_DEFAULT_BOOK_WITH_APPROVAL_ADMIN_SUBJECT',
                                        'parent' => 'PARENT_EMAILS_DEFAULT',
                                        'text' => 'You received a booking request.',
                                        'de' => 'Sie haben eine buchungsanfrage erhalten.',
                                        'nl' => 'U heeft een boekingsaanvraag ontvangen',
                                        'fr' => 'Vous avez reçu une demande de réservation.',
                                        'pl' => 'Otrzymałeś nową rezerwację.'));
                array_push($text, array('key' => 'EMAILS_DEFAULT_BOOK_WITH_APPROVAL_ADMIN',
                                        'parent' => 'PARENT_EMAILS_DEFAULT',
                                        'text' => 'Below are the details. Go to admin to cancel the request.',
                                        'de' => 'Details finden sie nachfolgend. Öffnen sie das dashboard um die anfrage zu stornieren.',
                                        'nl' => 'Hieronder staat de gegevens. Ga naar het administratie gedeelte om de boeking te annuleren.',
                                        'fr' => 'Voici les détails. Aller à l<<single-quote>>administration pour annuler la demande.',
                                        'pl' => 'Szczegóły zamówienia, przejdź do panelu aby anulować.'));
                array_push($text, array('key' => 'EMAILS_DEFAULT_BOOK_WITH_APPROVAL_USER_SUBJECT',
                                        'parent' => 'PARENT_EMAILS_DEFAULT',
                                        'text' => 'Your booking request has been sent.',
                                        'de' => 'Ihre Buchungsanfrage wurde versendet.',
                                        'nl' => 'Uw boekingsverzoek is verzonden.',
                                        'fr' => 'Votre demande de réservation a été envoyée.',
                                        'pl' => 'Zamówienie została wysłane.'));
                array_push($text, array('key' => 'EMAILS_DEFAULT_BOOK_WITH_APPROVAL_USER',
                                        'parent' => 'PARENT_EMAILS_DEFAULT',
                                        'text' => 'Below are the details.',
                                        'de' => 'Details finden sie nachfolgend.',
                                        'nl' => 'Hieronder staat de gegevens.',
                                        'fr' => 'Voici les détails ci-dessous.',
                                        'pl' => 'BSzczegóły zamówienia.'));
                /*
                 * Approved reservation.
                 */
                array_push($text, array('key' => 'EMAILS_DEFAULT_APPROVED_SUBJECT',
                                        'parent' => 'PARENT_EMAILS_DEFAULT',
                                        'text' => 'Your booking request has been approved.',
                                        'de' => 'Ihre buchungsanfrage wurde zurück akzeptiert.',
                                        'nl' => 'Uw boekingsaanvraag is goedgekeurd.',
                                        'fr' => 'Votre demande de réservation a été approuvée.',
                                        'pl' => 'Rezerwacja została przyjęta.'));
                array_push($text, array('key' => 'EMAILS_DEFAULT_APPROVED',
                                        'parent' => 'PARENT_EMAILS_DEFAULT',
                                        'text' => 'Congratulations! Your booking request has been approved. Details about your request are below.',
                                        'de' => 'Glückwunsch! Ihre buchungsanfrage wurde zurück akzeptiert. Details finden sie nachfolgend.',
                                        'nl' => 'Gefelifiteerd! Uw boekingsaanvraag is goedgekeurd. Gegevens over uw boeking staan hieronder.',
                                        'fr' => 'Félicitations! Votre demande de réservation a été approuvée. Les détails au sujet de votre demande sont ci-dessous.',
                                        'pl' => 'Dziękujemy! Rezerwacja została przyjęta, szczegóły zamówienia poniżej.'));
                /*
                 * Canceled reservation.
                 */
                array_push($text, array('key' => 'EMAILS_DEFAULT_CANCELED_SUBJECT',
                                        'parent' => 'PARENT_EMAILS_DEFAULT',
                                        'text' => 'Your booking request has been canceled.',
                                        'de' => 'Ihre buchungsanfrage wurde storniert.',
                                        'nl' => 'Uw boekingsaanvraag is geannuleerd.',
                                        'fr' => 'Votre demande de réservation a été annulée.',
                                        'pl' => 'Rezerwacja została anulowana.'));
                array_push($text, array('key' => 'EMAILS_DEFAULT_CANCELED',
                                        'parent' => 'PARENT_EMAILS_DEFAULT',
                                        'text' => 'I<<single-quote>>m sorry but your booking request has been canceled. Details about your request are below.',
                                        'de' => 'Ihre buchungsanfrage wurde storniert. Details finden sie nachfolgend.',
                                        'nl' => 'Sorry, maar helaas is uw boekingsaanvraag geannuleerd. De gegevens van uw boeking staan hieronder.',
                                        'fr' => 'Nous sommes désolés mais votre demande de réservation a été annulée. Les détails au sujet de votre demande sont ci-dessous.',
                                        'pl' => 'Bardzo nam przykro, rezerwacja została anulowana. Szczegóły poniżej.'));
                /*
                 * Rejected reservation.
                 */
                array_push($text, array('key' => 'EMAILS_DEFAULT_REJECTED_SUBJECT',
                                        'parent' => 'PARENT_EMAILS_DEFAULT',
                                        'text' => 'Your booking request has been rejected.',
                                        'de' => 'Ihre buchungsanfrage wurde zurück gewiesen.',
                                        'nl' => 'Uw boekingsaanvraag is afgewezen.',
                                        'fr' => 'Votre demande de réservation a été rejetée.',
                                        'pl' => 'Rezerwacja została odrzucona.'));
                array_push($text, array('key' => 'EMAILS_DEFAULT_REJECTED',
                                        'parent' => 'PARENT_EMAILS_DEFAULT',
                                        'text' => 'I<<single-quote>>m sorry but your booking request has been rejected. Details about your request are below.',
                                        'de' => 'Ihre buchungsanfrage wurde zurück gewiesen. Details finden sie nachfolgend.',
                                        'nl' => 'Sorry, maar helaas is uw boekingsaanvraag afgewezen. De gegevens van uw boeking staan hieronder.',
                                        'fr' => 'Nous sommes désolés mais votre demande de réservation a été rejetée. Les détails au sujet de votre demande sont ci-dessous.',
                                        'pl' => 'Bardzo nam przykro, rezerwacja została odrzucona. Szczegóły poniżej.'));
                
                return $text;
            }
            
            /*
             * Emails - Email text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function emailsEmail($text){
                array_push($text, array('key' => 'PARENT_EMAILS_EMAIL',
                                        'parent' => '',
                                        'text' => 'Email templates - Templates'));
                
                array_push($text, array('key' => 'EMAILS_EMAIL_NAME',
                                        'parent' => 'PARENT_EMAILS_EMAIL',
                                        'text' => 'Name'));
                array_push($text, array('key' => 'EMAILS_EMAIL_LANGUAGE',
                                        'parent' => 'PARENT_EMAILS_EMAIL',
                                        'text' => 'Language'));
                
                array_push($text, array('key' => 'EMAILS_EMAIL_TEMPLATE_SELECT',
                                        'parent' => 'PARENT_EMAILS_EMAIL',
                                        'text' => 'Select template'));
                array_push($text, array('key' => 'EMAILS_EMAIL_TEMPLATE_SELECT_BOOK_ADMIN',
                                        'parent' => 'PARENT_EMAILS_EMAIL',
                                        'text' => 'Admin notification'));
                array_push($text, array('key' => 'EMAILS_EMAIL_TEMPLATE_SELECT_BOOK_USER',
                                        'parent' => 'PARENT_EMAILS_EMAIL',
                                        'text' => 'User notification'));
                array_push($text, array('key' => 'EMAILS_EMAIL_TEMPLATE_SELECT_BOOK_WITH_APPROVAL_ADMIN',
                                        'parent' => 'PARENT_EMAILS_EMAIL',
                                        'text' => 'Instant approval admin notification'));
                array_push($text, array('key' => 'EMAILS_EMAIL_TEMPLATE_SELECT_BOOK_WITH_APPROVAL_USER',
                                        'parent' => 'PARENT_EMAILS_EMAIL',
                                        'text' => 'Instant approval user notification'));
                array_push($text, array('key' => 'EMAILS_EMAIL_TEMPLATE_SELECT_APPROVED',
                                        'parent' => 'PARENT_EMAILS_EMAIL',
                                        'text' => 'Approve resevation'));
                array_push($text, array('key' => 'EMAILS_EMAIL_TEMPLATE_SELECT_CANCELED',
                                        'parent' => 'PARENT_EMAILS_EMAIL',
                                        'text' => 'Cancel resevation'));
                array_push($text, array('key' => 'EMAILS_EMAIL_TEMPLATE_SELECT_REJECTED',
                                        'parent' => 'PARENT_EMAILS_EMAIL',
                                        'text' => 'Reject resevation'));
                array_push($text, array('key' => 'EMAILS_EMAIL_SUBJECT',
                                        'parent' => 'PARENT_EMAILS_EMAIL',
                                        'text' => 'Subject'));
                array_push($text, array('key' => 'EMAILS_EMAIL_MESSAGE',
                                        'parent' => 'PARENT_EMAILS_EMAIL',
                                        'text' => 'Message'));
                
                array_push($text, array('key' => 'EMAILS_EMAIL_LOADED',
                                        'parent' => 'PARENT_EMAILS_EMAIL',
                                        'text' => 'Email templates loaded.'));
                
                return $text;
            }
            
            /*
             * Email templates - Add email text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function emailsAddEmail($text){
                array_push($text, array('key' => 'PARENT_EMAILS_ADD_EMAIL',
                                        'parent' => '',
                                        'text' => 'Email templates - Add templates'));
                
                array_push($text, array('key' => 'EMAILS_ADD_EMAIL_NAME',
                                        'parent' => 'PARENT_EMAILS_ADD_EMAIL',
                                        'text' => 'New email templates'));
                array_push($text, array('key' => 'EMAILS_ADD_EMAIL_SUBMIT',
                                        'parent' => 'PARENT_EMAILS_ADD_EMAIL',
                                        'text' => 'Add email templates'));
                array_push($text, array('key' => 'EMAILS_ADD_EMAIL_ADDING',
                                        'parent' => 'PARENT_EMAILS_ADD_EMAIL',
                                        'text' => 'Adding new email templates ...'));
                array_push($text, array('key' => 'EMAILS_ADD_EMAIL_SUCCESS',
                                        'parent' => 'PARENT_EMAILS_ADD_EMAIL',
                                        'text' => 'You have succesfully added new email templates.'));
                
                return $text;
            }
            
            /*
             * Emails - Delete email text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function emailsDeleteEmail($text){
                array_push($text, array('key' => 'PARENT_EMAILS_DELETE_EMAIL',
                                        'parent' => '',
                                        'text' => 'Email templates - Delete templates'));
                
                array_push($text, array('key' => 'EMAILS_DELETE_EMAIL_CONFIRMATION',
                                        'parent' => 'PARENT_EMAILS_DELETE_EMAIL',
                                        'text' => 'Are you sure you want to delete the email templates?'));
                array_push($text, array('key' => 'EMAILS_DELETE_EMAIL_SUBMIT',
                                        'parent' => 'PARENT_EMAILS_DELETE_EMAIL',
                                        'text' => 'Delete email templates'));
                array_push($text, array('key' => 'EMAILS_DELETE_EMAIL_DELETING',
                                        'parent' => 'PARENT_EMAILS_DELETE_EMAIL',
                                        'text' => 'Deleting email templates ...'));
                array_push($text, array('key' => 'EMAILS_DELETE_EMAIL_SUCCESS',
                                        'parent' => 'PARENT_EMAILS_DELETE_EMAIL',
                                        'text' => 'You have succesfully deleted the email templates.'));
                
                return $text;
            }
            
            /*
             * Emails - Help text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function emailsHelp($text){
                array_push($text, array('key' => 'PARENT_EMAILS_HELP',
                                        'parent' => '',
                                        'text' => 'Email templates - Help'));
                
                array_push($text, array('key' => 'EMAILS_HELP',
                                        'parent' => 'PARENT_EMAILS_HELP',
                                        'text' => 'Click on a templates item to open the editing area.'));
                array_push($text, array('key' => 'EMAILS_ADD_EMAIL_HELP',
                                        'parent' => 'PARENT_EMAILS_HELP',
                                        'text' => 'Click on the "plus" icon to add email templates.'));
                
                /*
                 * Email help.
                 */
                array_push($text, array('key' => 'EMAILS_EMAIL_HELP',
                                        'parent' => 'PARENT_EMAILS_HELP',
                                        'text' => 'Click the "trash" icon to delete the email.'));
                array_push($text, array('key' => 'EMAILS_EMAIL_NAME_HELP',
                                        'parent' => 'PARENT_EMAILS_HELP',
                                        'text' => 'Change email templates name.'));
                array_push($text, array('key' => 'EMAILS_EMAIL_LANGUAGE_HELP',
                                        'parent' => 'PARENT_EMAILS_HELP',
                                        'text' => 'Change to the language you want to edit the email templates.'));
                array_push($text, array('key' => 'EMAILS_EMAIL_TEMPLATE_SELECT_HELP',
                                        'parent' => 'PARENT_EMAILS_HELP',
                                        'text' => 'Select the template you want to edit and modify the subject and message.'));
                
                return $text;
            }
        }
    }