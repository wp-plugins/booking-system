<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/fees/class-backend-fees.php
* File Version            : 1.0.4
* Created / Last Modified : 25 January 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end fees PHP class.
*/

    if (!class_exists('DOPBSPBackEndFees')){
        class DOPBSPBackEndFees extends DOPBSPBackEnd{
            /*
             * Constructor
             */
            function DOPBSPBackEndFees(){
            }
        
            /*
             * Prints out the fees page.
             * 
             * @return HTML page
             */
            function view(){
                global $DOPBSP;
                
                $DOPBSP->views->backend_fees->template();
            }
                
            /*
             * Display fees list.
             * 
             * @return fees list HTML
             */      
            function display(){
                global $wpdb;
                global $DOPBSP;
                                    
                $html = array();
                
                $fee = $wpdb->get_row('SELECT * FROM '.$DOPBSP->tables->fees);
                
                /* 
                 * Create fees list HTML.
                 */
                array_push($html, '<ul>');
                
                if ($wpdb->num_rows != 0){
                    if ($fee){
                        array_push($html, $this->listItem($fee));
                    }
                }
                else{
                    array_push($html, '<li class="dopbsp-no-data">'.$DOPBSP->text('FEES_NO_FEES').'</li>');
                }
                array_push($html, '</ul>');
                
                echo implode('', $html);
                
            	die();                
            }
            
            /*
             * Returns fees list item HTML.
             * 
             * @param fee (object): fee data
             * 
             * @return fee list item HTML
             */
            function listItem($fee){
                global $DOPBSP;
                
                $html = array();
                $user = get_userdata($fee->user_id); // Get data about the user who created the fees.
                
                array_push($html, '<li class="dopbsp-item" id="DOPBSP-fee-ID-1" onclick="DOPBSPFee.display()">');
                array_push($html, ' <div class="dopbsp-header">');
                
                /*
                 * Display fee ID.
                 */
                array_push($html, '     <span class="dopbsp-id">ID: 1</span>');
                
                /*
                 * Display data about the user who created the fee.
                 */
                if ($fee->user_id > 0){
                    array_push($html, '     <span class="dopbsp-header-item dopbsp-avatar">'.get_avatar($fee->user_id, 17));
                    array_push($html, '         <span class="dopbsp-info">'.$DOPBSP->text('FEES_CREATED_BY').': '.$user->data->display_name.'</span>');
                    array_push($html, '         <br class="dopbsp-clear" />');
                    array_push($html, '     </span>');
                }
                array_push($html, '     <br class="dopbsp-clear" />');
                array_push($html, ' </div>');
                array_push($html, ' <div class="dopbsp-name">'.($fee->name == '' ? '&nbsp;':$fee->name).'</div>');
                array_push($html, '</li>');
                
                return implode('', $html);
            }
        }
    }