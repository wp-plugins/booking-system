<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 1.1
* File                    : dopbs-backend.php
* File Version            : 1.0
* Created / Last Modified : 29 July 2013
* Author                  : Dot on Paper
* Copyright               : © 2013 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System Email Class.
*/

    require("libraries/php/smtp/smtp.php");
    require("libraries/php/smtp/sasl.php");
    
    if (!class_exists("DOPBookingSystemEmail")){
        class DOPBookingSystemEmail{
            function DOPBookingSystemEmail(){
            }
            
            function sendMessage($type,
                                 $language,
                                 $calendar_id,
                                 $reservationId,
                                 $check_in,   
                                 $check_out,   
                                 $start_hour,   
                                 $end_hour,   
                                 $no_items,   
                                 $currency,   
                                 $price,   
                                 $deposit,   
                                 $total_price,   
                                 $discount,   
                                 $form,   
                                 $no_people,   
                                 $no_children,
                                 $email,
                                 $email_to_admin = true,
                                 $email_to_user = true,
                                 $transaction_id = ''){
                global $wpdb;
                
                include_once "translation/frontend/".$language.".php";
                
                $settings = $wpdb->get_row('SELECT * FROM '.DOPBS_Settings_table.' WHERE calendar_id="'.$calendar_id.'"');
                $calendar = $wpdb->get_row('SELECT * FROM '.DOPBS_Calendars_table.' WHERE id="'.$calendar_id.'"');
                    
                // ================================================================= Creating the message
                switch ($type){
                    case 'booking_without_approval':
                        $subject = DOPBS_EMAIL_TO_USER_SUBJECT;
                        $message = DOPBS_EMAIL_TO_USER_MESSAGE_PAYMENT_ARRIVAL;
                        $template_path = DOPBS_Plugin_URL.'emails/'.$settings->template_email.'/book-user-email.html';
                        break;
                    case 'booking_with_approval':
                        $subject = DOPBS_EMAIL_TO_USER_SUBJECT;
                        $message = DOPBS_EMAIL_TO_USER_MESSAGE_PAYMENT_ARRIVAL_INSTANT_BOOKING;
                        $template_path = DOPBS_Plugin_URL.'emails/'.$settings->template_email.'/book-user-email.html';
                        break;
                    case 'booking_approved':
                        $subject = DOPBS_EMAIL_APPROVED_SUBJECT;
                        $message = DOPBS_EMAIL_APPROVED_MESSAGE;
                        $template_path = DOPBS_Plugin_URL.'emails/'.$settings->template_email.'/book-approved-email.html';
                        break;
                    case 'booking_rejected':
                        $subject = DOPBS_EMAIL_REJECTED_SUBJECT;
                        $message = DOPBS_EMAIL_REJECTED_MESSAGE;
                        $template_path = DOPBS_Plugin_URL.'emails/'.$settings->template_email.'/book-rejected-email.html';
                        break;
                    case 'booking_canceled':
                        $subject = DOPBS_EMAIL_CANCELED_SUBJECT;
                        $message = DOPBS_EMAIL_CANCELED_MESSAGE;
                        $template_path = DOPBS_Plugin_URL.'emails/'.$settings->template_email.'/book-canceled-email.html';
                        break;
                    case 'booking_paypal':
                        $subject = DOPBS_EMAIL_TO_USER_SUBJECT;
                        $message = DOPBS_EMAIL_TO_USER_MESSAGE_PAYMENT_PAYPAL;
                        $template_path = DOPBS_Plugin_URL.'emails/'.$settings->template_email.'/paypal-user-email.html';
                        break;
                    default:
                        $subject = '';
                        $message = '';
                        $template_path = DOPBS_Plugin_URL.'emails/'.$settings->template_email.'/book-user-email.html';
                }

                $message_ids = '<strong>'.DOPBS_EMAIL_RESERVATION_ID.':</strong> '.$reservationId;
                $message_ids .= '<br /><strong>'.DOPBS_EMAIL_CALENDAR_ID.':</strong> '.$calendar_id;
                $message_ids .= '<br /><strong>'.DOPBS_EMAIL_CALENDAR_NAME.':</strong> '.$calendar->name;
                
                if ($type == 'booking_paypal'){
                    $message_ids .= '<br /><strong>'.DOPBS_PAYMENT_PAYPAL_TRANSACTON_ID_LABEL.':</strong> '.$transaction_id;
                }

                $message_date = $check_in != '' ? '<strong>'.DOPBS_CHECK_IN_LABEL.':</strong> '.$this->dateToFormat($check_in, $settings->date_type):'';
                $message_date .= $check_out != '' ? '<br /><strong>'.DOPBS_CHECK_OUT_LABEL.':</strong> '.$this->dateToFormat($check_out, $settings->date_type):'';
                $message_date .= $start_hour != '' ?  '<br /><strong>'.DOPBS_START_HOURS_LABEL.':</strong> '.($settings->hours_ampm == 'true' ? $this->timeToAMPM($start_hour):$start_hour):'';
                $message_date .= $end_hour != '' ? '<br /><strong>'.DOPBS_END_HOURS_LABEL.':</strong> '.($settings->hours_ampm == 'true' ? $this->timeToAMPM($end_hour):$end_hour):'';

                $message_price = $no_items != '' && $settings->no_items_enabled == 'true' ? '<strong>'.DOPBS_NO_ITEMS_LABEL.':</strong> '.$no_items:'';
                $message_price .= $price != 0 ? '<br /><strong>'.DOPBS_TOTAL_PRICE_LABEL.'</strong> '.$currency.$price:'';
                $message_price .= $deposit != 0 ? '<br /><strong>'.DOPBS_DEPOSIT_PRICE_LABEL.'</strong> '.$currency.$deposit.' ('.$settings->deposit.'%)'.
                                                  '<br /><strong>'.DOPBS_DEPOSIT_PRICE_LEFT_LABEL.'</strong> '.$currency.($price-$deposit):'';
                $message_price .= $total_price != 0 && $total_price != $price ? '<br /><strong>'.DOPBS_DISCOUNT_PRICE_LABEL.'</strong> <span style="text-decoration: line-through;">'.$currency.$total_price.'</span> ('.$discount.'% '.DOPBS_DISCOUNT_TEXT.')':'';

                $message_form = '';

                for ($i=0; $i<count($form); $i++){
                    if (!is_array($form[$i])){
                        $form_item = get_object_vars($form[$i]);
                    }
                    else{
                        $form_item = $form[$i];
                    }
                        
                    if (is_array($form_item['value'])){
                        $message_form .= ($i != 0 ? '<br />':'').'<strong>'.$form_item['name'].':</strong> ';
                        $j = 0;

                        foreach ($form_item['value'] as $value){
                            $j++;
                            
                            if (!is_array($value)){
                                $value = get_object_vars($form[$i]);
                                
                                if (is_array($value)){
                                    $value = get_object_vars($value['value'][0]);
                                }
                            }
                            else{
                                $value = $form[$i]['value'][0];
                            }
                            $message_form .= ($j == 1 ? '':', ').$value['translation'];
                        }
                    }
                    else{
                        if ($form_item['value'] == 'true' || $form_item['value'] == 'on'){
                            $value = DOPBS_BOOKING_FORM_CHECKED;
                        }
                        elseif ($form_item['value'] == 'false' || $form_item['value'] == ''){
                            $value = DOPBS_BOOKING_FORM_UNCHECKED;
                        }
                        else{
                            $value = $form_item['value'];
                        }
                        $message_form .= ($i != 0 ? '<br />':'').'<strong>'.$form_item['name'].':</strong> '.$value;
                    }
                }
                $message_form .= $no_people != '' ? ($no_children == '' ? '<br /><strong>'.DOPBS_NO_PEOPLE_LABEL:'<br /><strong>'.DOPBS_NO_ADULTS_LABEL).':</strong> '.$no_people:'';
                $message_form .= $no_children != '' ? '<br /><strong>'.DOPBS_NO_CHILDREN_LABEL.':</strong> '.$no_children:'';

                // ============================================================= Email to user
                if ($email_to_user){
                    if ($settings->smtp_enabled == 'true'){
                        $this->sendSMTPEmail($email,
                                             $settings->notifications_email,
                                             $subject,
                                             $this->message($message,
                                                            $message_ids,
                                                            $message_date,
                                                            $message_price,
                                                            $message_form,
                                                            $template_path),
                                             $settings->smtp_host_name,
                                             $settings->smtp_host_port,
                                             $settings->smtp_ssl,
                                             $settings->smtp_user,
                                             $settings->smtp_password);
                    }
                    else{
                        $this->sendEmail($email,
                                         $settings->notifications_email,
                                         $subject,
                                         $this->message($message,
                                                        $message_ids,
                                                        $message_date,
                                                        $message_price,
                                                        $message_form,
                                                        $template_path));
                    }
                }

                // ============================================================= Email to admin
                if ($settings->notifications_email && $email_to_admin){
                    switch ($type){
                        case 'booking_without_approval':
                            $subject = DOPBS_EMAIL_TO_ADMIN_SUBJECT;
                            $message = DOPBS_EMAIL_TO_ADMIN_MESSAGE_PAYMENT_ARRIVAL;
                            $template_path = DOPBS_Plugin_URL.'emails/'.$settings->template_email.'/book-administrator-email.html';
                            break;
                        case 'booking_with_approval':
                            $subject = DOPBS_EMAIL_TO_ADMIN_SUBJECT;
                            $message = DOPBS_EMAIL_TO_ADMIN_MESSAGE_PAYMENT_ARRIVAL_INSTANT_BOOKING;
                            $template_path = DOPBS_Plugin_URL.'emails/'.$settings->template_email.'/book-administrator-email.html';
                            break;
                        case 'booking_paypal':
                            $subject = DOPBS_EMAIL_TO_ADMIN_SUBJECT;
                            $message = DOPBS_EMAIL_TO_ADMIN_MESSAGE_PAYMENT_PAYPAL;
                            $template_path = DOPBS_Plugin_URL.'emails/'.$settings->template_email.'/paypal-administrator-email.html';
                            break;
                        default:
                            $subject = '';
                            $message = '';
                            $template_path = DOPBS_Plugin_URL.'emails/'.$settings->template_email.'/book-administrator-email.html';
                    }

                    if ($settings->smtp_enabled == 'true'){
                        $this->sendSMTPEmail($settings->notifications_email,
                                             $email,
                                             $subject,
                                             $this->message($message,
                                                            $message_ids,
                                                            $message_date,
                                                            $message_price,
                                                            $message_form,
                                                            $template_path),
                                             $settings->smtp_host_name,
                                             $settings->smtp_host_port,
                                             $settings->smtp_ssl,
                                             $settings->smtp_user,
                                             $settings->smtp_password);
                    }
                    else{
                        $this->sendEmail($settings->notifications_email,
                                         $email,
                                         $subject,
                                         $this->message($message,
                                                        $message_ids,
                                                        $message_date,
                                                        $message_price,
                                                        $message_form,
                                                        $template_path));
                    }
                }   
            }
            
            function sendEmail($email_to,
                               $email_from,
                               $subject,
                               $message){
                $headers = "Content-type: text/html; charset=utf-8"."\r\n".
                           "MIME-Version: 1.1"."\r\n".
                           "From: ".get_bloginfo('name')." <".$email_from.">\r\n".
                           "Reply-To:".$email_from;

                wp_mail($email_to, $subject, $message, $headers);
            }
            
            function sendSMTPEmail($email_to,
                                   $email_from,
                                   $subject,
                                   $message,
                                   $host_name,
                                   $host_port,
                                   $ssl,
                                   $user,
                                   $password){
                $smtp = new smtp_class;
                
                $smtp->host_name = $host_name;        // IP address Change this variable to the address of the SMTP server to relay, like "smtp.myisp.com"
                $smtp->host_port = $host_port;        // Change this variable to the port of the SMTP server to use, like 465
                $smtp->ssl = $ssl;                    // Change this variable if the SMTP server requires an secure connection using SSL
                $smtp->start_tls = 0;                 // Change this variable if the SMTP server requires security by starting TLS during the connection
                $smtp->localhost = "localhost";       // Your computer address
                $smtp->direct_delivery = 0;           // Set to 1 to deliver directly to the recepient SMTP server
                $smtp->timeout = 10;                  // Set to the number of seconds wait for a successful connection to the SMTP server
                $smtp->data_timeout = 0;              // Set to the number seconds wait for sending or retrieving data from the SMTP server. Set to 0 to use the same defined in the timeout variable
                $smtp->debug = 1;                     // Set to 1 to output the communication with the SMTP server
                $smtp->html_debug = 1;                // Set to 1 to format the debug output as HTML
                $smtp->pop3_auth_host = "";           // Set to the POP3 authentication host if your SMTP server requires prior POP3 authentication
                $smtp->user = $user;                  // Set to the user name if the server requires authetication
                $smtp->realm = "";                    // Set to the authetication realm, usually the authentication user e-mail domain
                $smtp->password = $password;          // Set to the authetication password
                $smtp->workstation = "";              // Workstation name for NTLM authentication
                $smtp->authentication_mechanism="";   // Specify a SASL authentication method like LOGIN, PLAIN, CRAM-MD5, NTLM, etc... Leave it empty to make the class negotiate if necessary

                if($smtp->SendMessage($email_from,
                                      array($email_to),
                                      array("MIME-Version: 1.0",
                                            "Content-type: text/html; charset=iso-8859-1",
                                            "From: $email_from",
                                            "To: $email_to",
                                            "Subject: $subject",
                                            "Date: ".strftime("%a, %d %b %Y %H:%M:%S %Z")),
                                      "$message")){
                    //echo "Message sent to $email_to OK.\n"; 
                }
                else{
                    echo "Cound not send the message to $email_to.\nError: ".$smtp->error."\n";
                }
            }
            
            function message($message, 
                             $ids, 
                             $date, 
                             $price, 
                             $form, 
                             $file){
                $content = file_get_contents($file, true);
                
                if ($content === false){
                    $simple_message = '';
                    $simple_message .= $message.'<br /><br />';
                    $simple_message .= $ids.'<br /><br />';
                    $simple_message .= $date.'<br /><br />';
                    $simple_message .= $price.'<br /><br />';
                    $simple_message .= $form;
                    
                    return $simple_message;
                }
                else{
                    $content = str_replace('{MESSAGE}', $message, $content);
                    $content = str_replace('{IDS_DATA}', $ids, $content);
                    $content = str_replace('{DATE_DATA}', $date, $content);
                    $content = str_replace('{PRICE_DATA}', $price, $content);
                    $content = str_replace('{FORM_DATA}', $form, $content);
                    
                    return $content;
                }
            }
            
// Prototypes
            function dateToFormat($date, $type){
                global $DOPBS_month_names;  
                $dayPieces = explode('-', $date);

                if ($type == '1'){
                    return $DOPBS_month_names[(int)$dayPieces[1]-1].' '.$dayPieces[2].', '.$dayPieces[0];
                }
                else{
                    return $dayPieces[2].' '.$DOPBS_month_names[(int)$dayPieces[1]-1].' '.$dayPieces[0];
                }
            }
            
            function timeToAMPM($item){
                $time_pieces = explode(':', $item);
                $hour = (int)$time_pieces[0];
                $minutes = $time_pieces[1];
                $result = '';

                if ($hour == 0){
                    $result = '12';
                }
                else if ($hour > 12){
                    $result = $this->timeLongItem($hour-12);
                }
                else{
                    $result = $this->timeLongItem($hour);
                }

                $result .= ':'.$minutes.' '.($hour < 12 ? 'AM':'PM');

                return $result;
            }
            
            function timeLongItem($item){
                if ($item < 10){
                    return '0'.$item;
                }
                else{
                    return $item;
                }
            }
        }
    }
        
?>