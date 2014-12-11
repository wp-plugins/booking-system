<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 1.0
* File                    : book-confirmation.php
* File Version            : 1.0
* Created / Last Modified : 29 July 2013
* Author                  : Dot on Paper
* Copyright               : © 2013 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : PayPal Book Confirmation script.
*/

    // ==================================================================
    //    PayPal Express Checkout Call
    // ===================================================================
    
    if (session_id() == ""){
        session_start();
    }
    
    $_SESSION['DOPBS_SkipPayPalRegistration'] = true;
    require_once ("paypalfunctions.php");
    $PaymentOption = "PayPal";
    
    if ($PaymentOption == "PayPal"){
	/*
	'------------------------------------
	' The paymentAmount is the total value of 
	' the shopping cart, that was set 
	' earlier in a session variable 
	' by the shopping cart page
	'------------------------------------
	*/
        
        $DOPBS_Page_holder = $_SESSION['DOPBS_Page'];
        $DOPBS_PluginURL_holder = $_SESSION['DOPBS_PluginURL'];
        $DOPBS_CalendarID_holder = $_SESSION['DOPBS_CalendarID'];
        $DOPBS_PriceItemValue_holder = $_SESSION['DOPBS_PriceItemValue'];
        $DOPBS_PriceValue_holder = $_SESSION['DOPBS_PriceValue']; 
        $DOPBS_DiscountValue_holder = $_SESSION['DOPBS_DiscountValue']; 
        $DOPBS_PriceToPayValue_holder = $_SESSION['DOPBS_PriceToPayValue']; 
        $DOPBS_PriceDepositValue_holder = $_SESSION['DOPBS_PriceDepositValue']; 
	$finalPaymentAmount_holder = $_SESSION["Payment_Amount"];
        $DOPBS_Currency_holder = $_SESSION['DOPBS_Currency'];
        $DOPBS_CurrencyCode_holder = $_SESSION['DOPBS_CurrencyCode'];
        $DOPBS_FormID_holder = $_SESSION['DOPBS_FormID'];
        $DOPBS_Form_holder = $_SESSION['DOPBS_Form'];
                
        $DOPBS_CheckIn_holder = $_SESSION['DOPBS_CheckIn'];
        $DOPBS_CheckOut_holder = $_SESSION['DOPBS_CheckOut'];    
        $DOPBS_StartHour_holder = $_SESSION['DOPBS_StartHour'];
        $DOPBS_EndHour_holder = $_SESSION['DOPBS_EndHour'];
        $DOPBS_NoItems_holder = $_SESSION['DOPBS_NoItems'];

        $DOPBS_Email_holder = $_SESSION['DOPBS_Email'];
        $DOPBS_NoPeople_holder = $_SESSION['DOPBS_NoPeople'];
        $DOPBS_NoChildren_holder = $_SESSION['DOPBS_NoChildren'];
                
        $DOPBS_Notes = array();
        
        $_SESSION['DOPBS_Page'] = '';
        $_SESSION['DOPBS_PluginURL'] = '';
        $_SESSION['DOPBS_CalendarID'] = '';   
        $_SESSION['DOPBS_PriceItemValue'] = ''; 
        $_SESSION['DOPBS_Currency'] = '';
        $_SESSION['DOPBS_CurrencyCode'] = '';
        $_SESSION['DOPBS_FormID'] = '';
        $_SESSION['DOPBS_Form'] = '';

        $_SESSION['DOPBS_CheckIn'] = '';
        $_SESSION['DOPBS_CheckOut'] = '';    
        $_SESSION['DOPBS_StartHour'] = '';
        $_SESSION['DOPBS_EndHour'] = '';
        $_SESSION['DOPBS_NoItems'] = '';

        $_SESSION['DOPBS_Email'] = '';
        $_SESSION['DOPBS_NoPeople'] = '';
        $_SESSION['DOPBS_NoChildren'] = '';
		
	/*
	'------------------------------------
	' Calls the DoExpressCheckoutPayment API call
	'
	' The ConfirmPayment function is defined in the file PayPalFunctions.jsp,
	' that is included at the top of this file.
	'-------------------------------------------------
	*/
        
	$resArray = ConfirmPayment($finalPaymentAmount_holder);
	$ack = strtoupper($resArray["ACK"]);
                
	if ($ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING"){
            /*
            '********************************************************************************************************************
            '
            ' THE PARTNER SHOULD SAVE THE KEY TRANSACTION RELATED INFORMATION LIKE 
            '                    transactionId & orderTime 
            '  IN THEIR OWN  DATABASE
            ' AND THE REST OF THE INFORMATION CAN BE USED TO UNDERSTAND THE STATUS OF THE PAYMENT 
            '
            '********************************************************************************************************************
            */
  
            $transactionId = $resArray["PAYMENTINFO_0_TRANSACTIONID"]; // ' Unique transaction ID of the payment. Note:  If the PaymentAction of the request was Authorization or Order, this value is your AuthorizationID for use with the Authorization & Capture APIs. 
//            $transactionType = $resArray["PAYMENTINFO_0_TRANSACTIONTYPE"]; //' The type of transaction Possible values: l  cart l  express-checkout 
//            $paymentType = $resArray["PAYMENTINFO_0_PAYMENTTYPE"];  //' Indicates whether the payment is instant or delayed. Possible values: l  none l  echeck l  instant 
//            $orderTime = $resArray["PAYMENTINFO_0_ORDERTIME"];  //' Time/date stamp of payment
//            $amt = $resArray["PAYMENTINFO_0_AMT"];  //' The final amount charged, including any shipping and taxes from your Merchant Profile.
//            $currencyCode= $resArray["PAYMENTINFO_0_CURRENCYCODE"];  //' A three-character currency code for one of the currencies listed in PayPay-Supported Transactional Currencies. Default: USD. 
//            $feeAmt = $resArray["PAYMENTINFO_0_FEEAMT"];  //' PayPal fee amount charged for the transaction
//            $settleAmt = $resArray["PAYMENTINFO_0_SETTLEAMT"];  //' Amount deposited in your PayPal account after a currency conversion.
//            $taxAmt = $resArray["PAYMENTINFO_0_TAXAMT"];  //' Tax charged on the transaction.
//            $exchangeRate = $resArray["PAYMENTINFO_0_EXCHANGERATE"];  //' Exchange rate if a currency conversion occurred. Relevant only if your are billing in their non-primary currency. If the customer chooses to pay with a currency other than the non-primary currency, the conversion occurs in the customer's account.
		
            /*
            ' Status of the payment: 
                            'Completed: The payment has been completed, and the funds have been added successfully to your account balance.
                            'Pending: The payment is pending. See the PendingReason element for more information. 
            */
		
//            $paymentStatus = $resArray["PAYMENTINFO_0_PAYMENTSTATUS"]; 

            /*
            'The reason the payment is pending:
            '  none: No pending reason 
            '  address: The payment is pending because your customer did not include a confirmed shipping address and your Payment Receiving Preferences is set such that you want to manually accept or deny each of these payments. To change your preference, go to the Preferences section of your Profile. 
            '  echeck: The payment is pending because it was made by an eCheck that has not yet cleared. 
            '  intl: The payment is pending because you hold a non-U.S. account and do not have a withdrawal mechanism. You must manually accept or deny this payment from your Account Overview. 		
            '  multi-currency: You do not have a balance in the currency sent, and you do not have your Payment Receiving Preferences set to automatically convert and accept this payment. You must manually accept or deny this payment. 
            '  verify: The payment is pending because you are not yet verified. You must verify your account before you can accept this payment. 
            '  other: The payment is pending for a reason other than those listed above. For more information, contact PayPal customer service. 
            */
		
//            $pendingReason = $resArray["PAYMENTINFO_0_PENDINGREASON"];  

            /*
            'The reason for a reversal if TransactionType is reversal:
            '  none: No reason code 
            '  chargeback: A reversal has occurred on this transaction due to a chargeback by your customer. 
            '  guarantee: A reversal has occurred on this transaction due to your customer triggering a money-back guarantee. 
            '  buyer-complaint: A reversal has occurred on this transaction due to a complaint about the transaction from your customer. 
            '  refund: A reversal has occurred on this transaction because you have given the customer a refund. 
            '  other: A reversal has occurred on this transaction due to a reason not listed above. 
            */
		
//            $reasonCode = $resArray["PAYMENTINFO_0_REASONCODE"];   
            
            // ================================================================= WP Settings
            require_once('../../../../../wp-load.php');  
            require_once('../../dopbs-email.php');  
            require_once('../../dopbs-backend-reservations.php');  
            
            $language = isset($_SESSION['DOPBookingSystemFrontEndLanguage'.$DOPBS_CalendarID_holder]) ? $_SESSION['DOPBookingSystemFrontEndLanguage'.$DOPBS_CalendarID_holder]:'en';

            global $wpdb;
            $wp_settings = $wpdb->get_row('SELECT * FROM '.DOPBS_Settings_table.' WHERE calendar_id="'.$DOPBS_CalendarID_holder.'"');
        
            $wpdb->insert(DOPBS_Reservations_table, array('calendar_id' => $DOPBS_CalendarID_holder,
                                                           'check_in' => $DOPBS_CheckIn_holder,
                                                           'check_out' => $DOPBS_CheckOut_holder,
                                                           'start_hour' => $DOPBS_StartHour_holder,
                                                           'end_hour' => $DOPBS_EndHour_holder,
                                                           'no_items' => $DOPBS_NoItems_holder,
                                                           'currency' => $DOPBS_Currency_holder,
                                                           'currency_code' => $DOPBS_CurrencyCode_holder,
                                                           'total_price' => $DOPBS_PriceValue_holder,
                                                           'discount' => $DOPBS_DiscountValue_holder,
                                                           'price' => $DOPBS_PriceToPayValue_holder,
                                                           'deposit' => $DOPBS_PriceDepositValue_holder,
                                                           'language' => $language,
                                                           'email' => $DOPBS_Email_holder,
                                                           'no_people' => $DOPBS_NoPeople_holder,
                                                           'no_children' => $DOPBS_NoChildren_holder,
                                                           'info' => json_encode($DOPBS_Form_holder),
                                                           'payment_method' => '2',
                                                           'paypal_transaction_id' => $transactionId,
                                                           'status' => 'approved'));
            $DOPemail = new DOPBookingSystemEmail();
            $reservationId = $wpdb->insert_id;
            
            $DOPemail->sendMessage('booking_paypal',
                                   $language,
                                   $DOPBS_CalendarID_holder, 
                                   $reservationId,
                                   $DOPBS_CheckIn_holder,
                                   $DOPBS_CheckOut_holder,
                                   $DOPBS_StartHour_holder,
                                   $DOPBS_EndHour_holder,
                                   $DOPBS_NoItems_holder,
                                   $DOPBS_Currency_holder,
                                   $DOPBS_PriceToPayValue_holder,
                                   $DOPBS_PriceDepositValue_holder,
                                   $DOPBS_PriceValue_holder,
                                   $DOPBS_DiscountValue_holder,
                                   $DOPBS_Form_holder,
                                   $DOPBS_NoPeople_holder,
                                   $DOPBS_NoChildren_holder,
                                   $DOPBS_Email_holder,
                                   true,
                                   true,
                                   $transactionId);
            
// ================================================================= Change Schedule
                        
            $DOPreservations = new DOPBookingSystemBackEndReservations();
            $DOPreservations->approveReservationCalendarChange($reservationId, $wp_settings);
            
            // =================================================================        
                    
            $_SESSION['DOPBS_PayPal'.$DOPBS_CalendarID_holder] = 'success';
            
            echo '<script type="text/JavaScript">
                    window.location.href = "'.$DOPBS_Page_holder.'";
                  </script>';
//            header('Location:'.$DOPBS_Page_holder);
            
            // =================================================================
	}
	else{
            //Display a user friendly Error on the page using any of the following error information returned by PayPal
            $ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
            $ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
            $ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
            $ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);

//            echo "GetExpressCheckoutDetails API call failed.<br />";
//            echo "Detailed Error Message: ".$ErrorLongMsg."<br />";
//            echo "Short Error Message: ".$ErrorShortMsg."<br />";
//            echo "Error Code: ".$ErrorCode."<br />";
//            echo "Error Severity Code: ".$ErrorSeverityCode."<br />";
            if (session_id() == ""){
                session_start();
            }
            
            $_SESSION['DOPBS_PayPal'.$DOPBS_CalendarID_holder] = 'error';
            header('Location:'.$DOPBS_Page_holder);
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
            $result = timeLongItem($hour-12);
        }
        else{
            $result = timeLongItem($hour);
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
		
?>