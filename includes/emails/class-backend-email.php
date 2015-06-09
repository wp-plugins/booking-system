<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/emails/class-backend-email.php
* File Version            : 1.0.4
* Created / Last Modified : 08 February 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end email PHP class.
*/

    if (!class_exists('DOPBSPBackEndEmail')){
        class DOPBSPBackEndEmail extends DOPBSPBackEndEmails{
            /*
             * Constructor
             */
            function DOPBSPBackEndEmail(){
            }
            
            /*
             * Prints out the email.
             * 
             * @post language (string): email current editing language
             * @param template (string): email template key
             * 
             * @return email HTML
             */
            function display(){
                global $DOPBSP;
                
                $language = $_POST['language'];
                $template = $_POST['template'];
                
                $DOPBSP->views->backend_email->template(array('language' => $language,
                                                              'template' => $template));
                
                die();
            }
            
            /*
             * Get email template and if it does not exist create a new one.
             * 
             * @param template (string): email template key
             * 
             * @return email template
             */
            function get($template){
                global $wpdb;
                global $DOPBSP;
                
                $template_data = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->emails_translation.' WHERE email_id=%d AND template="%s"',
                                                               1, $template));
                
                if ($template_data == ''){
                    $wpdb->insert($DOPBSP->tables->emails_translation, array('email_id' => 1,
                                                                             'template' => $template,
                                                                             'subject' => $DOPBSP->classes->translation->encodeJSON('EMAILS_DEFAULT_'.strtoupper($template).'_SUBJECT'),
                                                                             'message' => $DOPBSP->classes->backend_email->defaultTemplate('EMAILS_DEFAULT_'.strtoupper($template))));
                    $template_data = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->emails_translation.' WHERE email_id=%d AND template="%s"',
                                                                   1, $template));
                }
                
                
                $DOPBSP_db_debug = get_option('DOPBSP_db_debug');
                
                if (!isset($DOPBSP_db_debug)) {
                    add_option('DOPBSP_db_debug',json_encode($settings_notifications->templates));
                } else {
                    update_option('DOPBSP_db_debug',json_encode($settings_notifications->templates));
                }
                
                return $template_data;
            }
            
            /*
             * Edit email fields.
             * 
             * @post template (string): email template
             * @post field (string): email field
             * @post value (string): email new value
             * @post language (string): email selected language
             */
            function edit(){
                global $wpdb;  
                global $DOPBSP;
                
                $template = $_POST['template'];
                $field = $_POST['field'];
                $value = $_POST['value'];
                $language = $_POST['language'];
                
                if ($field != 'name'){
                    $value = str_replace("\n", '<<new-line>>', $value);
                    $value = str_replace("\'", '<<single-quote>>', $value);
                    $value = utf8_encode($value);
                    
                    $email_translation = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->emails_translation.' WHERE email_id=%d AND template="%s"',
                                                                       1, $template));
                    
                    $translation = json_decode($email_translation->$field);
                    $translation->$language = $value;
                    $value = json_encode($translation);
                    
                    $wpdb->update($DOPBSP->tables->emails_translation, array($field => $value), 
                                                                       array('email_id' =>1,
                                                                             'template' =>$template));
                }
                else{   
                    $wpdb->update($DOPBSP->tables->emails, array($field => $value), 
                                                           array('id' =>1));
                }
                
            	die();
            }
            
            /*
             * Default email template.
             * 
             * @param key (string): translation key
             * 
             * @return default email content
             */
            function defaultTemplate($key = ''){
                global $DOPBSP;
                
                return $DOPBSP->classes->translation->encodeJSON($key,
                                                                 '',
                                                                 '',
                                                                 '<<new-line>><br /><br /><<new-line>>|DETAILS|<<new-line>><br /><br /><<new-line>>|EXTRAS|<<new-line>><br /><br /><<new-line>>|DISCOUNT|<<new-line>><br /><br /><<new-line>>|COUPON|<<new-line>><br /><br /><<new-line>>|FEES|<<new-line>><br /><br /><<new-line>>|FORM|<<new-line>><br /><br /><<new-line>>|BILLING ADDRESS|<<new-line>><br /><br /><<new-line>>|SHIPPING ADDRESS|');
            }
        }
    }