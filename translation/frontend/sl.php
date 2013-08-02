<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 1.0
* File                    : sl.php
* File Version            : 1.0
* Created / Last Modified : 29 July 2013
* Author                  : Dot on Paper
* Copyright               : © 2013 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Slovenian Front End Translation.
* Translated by           : Dot on Paper
*/
   
    // Months & Week Days
    global $DOPBS_month_names;
    global $DOPBS_month_short_names;
    $DOPBS_month_names = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $DOPBS_month_short_names = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
    
    global $DOPBS_day_names;
    global $DOPBS_day_short_names;
    $DOPBS_day_names = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
    $DOPBS_day_short_names = array('Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa');
    
    // Calendar 
    define('DOPBS_ADD_MONTH_VIEW', "Add Month View");
    define('DOPBS_REMOVE_MONTH_VIEW', "Remove Month View");
    define('DOPBS_PREVIOUS_MONTH', "Previous Month");
    define('DOPBS_NEXT_MONTH', "Next Month");
    define('DOPBS_AVAILABLE_ONE_TEXT', "available");
    define('DOPBS_AVAILABLE_TEXT', "available");
    define('DOPBS_BOOKED_TEXT', "booked");
    define('DOPBS_UNAVAILABLE_TEXT', "unavailable");
                            
    // Calendar Form 
    define('DOPBS_CHECK_IN_LABEL', "Check In");
    define('DOPBS_CHECK_OUT_LABEL', "Check Out");
    define('DOPBS_START_HOURS_LABEL', "Start at"); 
    define('DOPBS_END_HOURS_LABEL', "Finish at");
    define('DOPBS_NO_ITEMS_LABEL', "No book items"); 
    define('DOPBS_SERVICES_LABEL', "Services");
    define('DOPBS_TOTAL_PRICE_LABEL', "Total:");
    define('DOPBS_DEPOSIT_PRICE_LABEL', "Deposit:");
    define('DOPBS_DEPOSIT_PRICE_LEFT_LABEL', " Left to Pay:");
    define('DOPBS_DISCOUNT_PRICE_LABEL', "Actual Price:");
    define('DOPBS_DISCOUNT_TEXT', "discount");
    define('DOPBS_DEPOSIT_TEXT', "deposit");
    
    define('DOPBS_NO_SERVICES_AVAILABLE', "There are no services available for the period you selected.");
    define('DOPBS_MIN_STAY_WARNING', "You need to book a minimum number of days");
    define('DOPBS_MAX_STAY_WARNING', "You can book only a maximum number of days");
    
    define('DOPBS_FORM_TITLE', 'Contact Information');
    define('DOPBS_FORM_REQUIRED', "is required.");    
    define('DOPBS_FORM_EMAIL_INVALID', "is invalid. Please enter a valid Email."); 
    define('DOPBS_NO_PEOPLE_LABEL', "No People");
    define('DOPBS_NO_ADULTS_LABEL', "No Adults");
    define('DOPBS_NO_CHILDREN_LABEL', "No Children");
    define('DOPBS_PAYMENT_ARRIVAL_LABEL', "Pay on Arrival (need to be approved)"); 
    define('DOPBS_PAYMENT_ARRIVAL_SUCCESS', "Your request has been successfully sent. Please wait for approval.");
    define('DOPBS_PAYMENT_ARRIVAL_SUCCESS_INSTANT_BOOKING', "Your request has been successfully received. We are waiting you!");
    define('DOPBS_PAYMENT_PAYPAL_LABEL', "Pay on PayPal (instant booking)");
    define('DOPBS_PAYMENT_PAYPAL_TRANSACTON_ID_LABEL', "PayPal Transaction ID");
    define('DOPBS_PAYMENT_PAYPAL_SUCCESS', "Your payment was approved and services are booked."); 
    define('DOPBS_PAYMENT_PAYPAL_ERROR', "There was an error while processing PayPal payment. Please try again.");
    define('DOPBS_TERMS_AND_CONDITIONS_INVALID', "You must agree with our Terms & Conditions to continue.");  
    define('DOPBS_TERMS_AND_CONDITIONS_LABEL', "I accept to agree to the Terms & Conditions.");
    define('DOPBS_BOOK_NOW_LABEL', "Book Now");
    
    // Email 
    define('DOPBS_EMAIL_RESERVATION_ID', 'Reservation ID');
    define('DOPBS_EMAIL_CALENDAR_ID', 'Calendar ID');
    define('DOPBS_EMAIL_CALENDAR_NAME', 'Calendar Name');
    
    define('DOPBS_EMAIL_TO_USER_SUBJECT', "Your booking request has been sent.");
    define('DOPBS_EMAIL_TO_USER_MESSAGE_PAYMENT_ARRIVAL', "Please wait for approval. Below are the details.");
    define('DOPBS_EMAIL_TO_USER_MESSAGE_PAYMENT_ARRIVAL_INSTANT_BOOKING', "Below are the details.");
    define('DOPBS_EMAIL_TO_USER_MESSAGE_PAYMENT_PAYPAL', "The period has been book. Below are the details.");
    
    define('DOPBS_EMAIL_TO_ADMIN_SUBJECT', "You received a booking request.");
    define('DOPBS_EMAIL_TO_ADMIN_MESSAGE_PAYMENT_ARRIVAL', "Below are the details. Go to admin to Approve or Reject the request.");
    define('DOPBS_EMAIL_TO_ADMIN_MESSAGE_PAYMENT_ARRIVAL_INSTANT_BOOKING', "Below are the details. Go to admin to Cancel the request.");
    define('DOPBS_EMAIL_TO_ADMIN_MESSAGE_PAYMENT_PAYPAL', "Below are the details. Payment has been done via PayPal and the period has been booked.");
    
    define('DOPBS_EMAIL_APPROVED_SUBJECT', "Your booking request has been approved.");
    define('DOPBS_EMAIL_APPROVED_MESSAGE', "Congratulations! Your booking request has been approved. Details about your request are below.");
    
    define('DOPBS_EMAIL_REJECTED_SUBJECT', "Your booking request has been rejected.");
    define('DOPBS_EMAIL_REJECTED_MESSAGE', "I'm sorry but your booking request has been rejected. Details about your request are below.");
    
    define('DOPBS_EMAIL_CANCELED_SUBJECT', "Your booking request has been canceled.");
    define('DOPBS_EMAIL_CANCELED_MESSAGE', "I'm sorry but your booking request has been canceled. Details about your request are below.");
    
    define('DOPBS_BOOKING_FORM_CHECKED', "Checked");
    define('DOPBS_BOOKING_FORM_UNCHECKED', "Unchecked");
    
?>