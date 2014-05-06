<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 1.2
* File                    : expresscheckout.php
* File Version            : 1.0
* Created / Last Modified : 29 July 2013
* Author                  : Dot on Paper
* Copyright               : © 2013 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : PayPal Express Checkout script.
*/

    // ==================================
    // PayPal Express Checkout Module
    // ==================================
    
    $cID = $_POST['DOPBookingSystem_ID'];
    
    
    require_once('../../../../../wp-load.php');  
    global $wpdb;
    
    $form = $wpdb->get_results($wpdb->prepare('SELECT * FROM '.DOPBS_Forms_Fields_table.' WHERE form_id="%d" ORDER BY position', $_POST['DOPBookingSystem_FormID'.$cID]));
    $fields = array();
    $field_data = array();
    $i = 0;
    $email = '';
                
    foreach ($form as $field){
        $translation = json_decode(stripslashes($field->translation));
        $field->translation = $translation->$_POST['DOPBookingSystem_Language'.$cID];
        
        $field_data[$i] = new stdClass();
        $field_data[$i]->id = $field->id;
        $field_data[$i]->name = $field->translation;
                            
        if ($field->type == 'select'){
            $selected_values = $_POST['DOPBookingSystem_FormField'.$cID.'_'.$field->id];
            $field_data[$i]->value = array();
            $options = $wpdb->get_results('SELECT * FROM '.DOPBS_Forms_Select_Options_table.' WHERE field_id='.$field->id.' ORDER BY field_id ASC');
            
            foreach ($options as $option){
                $option_translation = json_decode(stripslashes($option->translation));
                $option->translation = $option_translation->$_POST['DOPBookingSystem_Language'.$cID];
                
                for ($o=0; $o<count($selected_values); $o++){
                    if ((int)$selected_values[$o] == $option->id){
                        array_push($field_data[$i]->value, $option);
                    }
                }
            }
        }
        else{
            if (isset($_POST['DOPBookingSystemPRO_FormField'.$cID.'_'.$field->id])){
                $field_data[$i]->value = $_POST['DOPBookingSystem_FormField'.$cID.'_'.$field->id];
            }
            else{
                $field_data[$i]->value = '';
            }
        }
        
        if ($field->is_email == 'true' && $email == ''){
            $email = $_POST['DOPBookingSystem_FormField'.$cID.'_'.$field->id];
        }
        
        array_push($fields, $field_data[$i]);
        
        $i++;
    }
    
    if (session_id() == ""){
        session_start();
    }
    
    $_SESSION['DOPBS_Language'] = $_POST['DOPBookingSystem_Language'.$cID];
    $_SESSION['DOPBS_Page'] = $_POST['DOPBookingSystem_Page'.$cID];
    $_SESSION['DOPBS_PluginURL'] = $_POST['DOPBookingSystem_PluginURL'.$cID];
    $_SESSION['DOPBS_CalendarID'] = $cID;   
    $_SESSION['DOPBS_PriceItemValue'] = $_POST['DOPBookingSystem_PriceItemValue'.$cID]; 
    $_SESSION['DOPBS_PriceValue'] = $_POST['DOPBookingSystem_PriceValue'.$cID]; 
    $_SESSION['DOPBS_DiscountValue'] = $_POST['DOPBookingSystem_DiscountValue'.$cID]; 
    $_SESSION['DOPBS_PriceToPayValue'] = $_POST['DOPBookingSystem_PriceToPayValue'.$cID]; 
    $_SESSION['DOPBS_PriceDepositValue'] = $_POST['DOPBookingSystem_PriceDepositValue'.$cID]; 
    $_SESSION['Payment_Amount'] = $_POST['DOPBookingSystem_PriceDepositValue'.$cID] != 0 ? $_POST['DOPBookingSystem_PriceDepositValue'.$cID]:$_POST['DOPBookingSystem_PriceToPayValue'.$cID];
    $_SESSION['DOPBS_Currency'] = $_POST['DOPBookingSystem_Currency'.$cID];
    $_SESSION['DOPBS_CurrencyCode'] = $_POST['DOPBookingSystem_CurrencyCode'.$cID];
    $_SESSION['DOPBS_FormID'] = $_POST['DOPBookingSystem_FormID'.$cID];
    $_SESSION['DOPBS_Form'] = $fields;
        
    $_SESSION['DOPBS_CheckIn'] = isset($_POST['DOPBookingSystem_CheckIn'.$cID]) ? $_POST['DOPBookingSystem_CheckIn'.$cID]:'';
    $_SESSION['DOPBS_CheckOut'] = isset($_POST['DOPBookingSystem_CheckOut'.$cID]) ? $_POST['DOPBookingSystem_CheckOut'.$cID]:'';    
    $_SESSION['DOPBS_StartHour'] = isset($_POST['DOPBookingSystem_StartHour'.$cID]) ? $_POST['DOPBookingSystem_StartHour'.$cID]:'';
    $_SESSION['DOPBS_EndHour'] = isset($_POST['DOPBookingSystem_EndHour'.$cID]) ? $_POST['DOPBookingSystem_EndHour'.$cID]:'';
    $_SESSION['DOPBS_NoItems'] = isset($_POST['DOPBookingSystem_NoItems'.$cID]) ? $_POST['DOPBookingSystem_NoItems'.$cID]:'';
    
    $_SESSION['DOPBS_Email'] = $email;
    $_SESSION['DOPBS_NoPeople'] = isset($_POST['DOPBookingSystem_NoPeople'.$cID]) ? $_POST['DOPBookingSystem_NoPeople'.$cID]:'';
    $_SESSION['DOPBS_NoChildren'] = isset($_POST['DOPBookingSystem_NoChildren'.$cID]) ? $_POST['DOPBookingSystem_NoChildren'.$cID]:'';
    
    $_SESSION['DOPBS_SkipPayPalRegistration'] = false;

    require_once("paypalfunctions.php");
    
    //'------------------------------------
    //' The paymentAmount is the total value of 
    //' the shopping cart, that was set 
    //' earlier in a session variable 
    //' by the shopping cart page
    //'------------------------------------
    $paymentAmount = $_SESSION["Payment_Amount"];
    
    //'------------------------------------
    //' The currencyCodeType and paymentType 
    //' are set to the selections made on the Integration Assistant 
    //'------------------------------------
    $currencyCodeType = $_SESSION["DOPBS_CurrencyCode"];
    $paymentType = "Sale";

    //'------------------------------------
    //' The returnURL is the location where buyers return to when a
    //' payment has been succesfully authorized.
    //'
    //' This is set to the value entered on the Integration Assistant 
    //'------------------------------------
    $returnURL = $_SESSION['DOPBS_PluginURL'].'assets/paypal/book-confirmation.php';

    //'------------------------------------
    //' The cancelURL is the location buyers are sent to when they hit the
    //' cancel button during authorization of payment during the PayPal flow
    //'
    //' This is set to the value entered on the Integration Assistant 
    //'------------------------------------
    $cancelURL = $_SESSION["DOPBS_Page"];

    //'------------------------------------
    //' Calls the SetExpressCheckout API call
    //'
    //' The CallShortcutExpressCheckout function is defined in the file PayPalFunctions.php,
    //' it is included at the top of this file.
    //'-------------------------------------------------
    
    $resArray = CallShortcutExpressCheckout($paymentAmount, $currencyCodeType, $paymentType, $returnURL, $cancelURL);
    $ack = strtoupper($resArray["ACK"]);
        
    if($ack=="SUCCESS" || $ack=="SUCCESSWITHWARNING"){
	RedirectToPayPal($resArray["TOKEN"]);
    } 
    else{
	//Display a user friendly Error on the page using any of the following error information returned by PayPal
	$ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
	$ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
	$ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
	$ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);
	
	echo "SetExpressCheckout API call failed.<br/>";
	echo "Detailed Error Message: ".$ErrorLongMsg."<br/>";
	echo "Short Error Message: ".$Error."<br/>";;
	echo "Error Severity Code: ".$ErrorSeverityCode."<br/>";
    }
    
?>