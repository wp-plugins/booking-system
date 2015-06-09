<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/forms/class-backend-forms.php
* File Version            : 1.0.5
* Created / Last Modified : 25 January 2015
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end forms PHP class.
*/

    if (!class_exists('DOPBSPBackEndForms')){
        class DOPBSPBackEndForms extends DOPBSPBackEnd{
            /*
             * Constructor
             */
            function DOPBSPBackEndForms(){
            }
        
            /*
             * Prints out the forms page.
             * 
             * @return HTML page
             */
            function view(){
                global $DOPBSP;
                
                $DOPBSP->views->backend_forms->template();
            }
                
            /*
             * Display forms list.
             * 
             * @return forms list HTML
             */      
            function display(){
                global $wpdb;
                global $DOPBSP;
                                    
                $html = array();
                
                $form = $wpdb->get_row('SELECT * FROM '.$DOPBSP->tables->forms);
                
                /* 
                 * Create forms list HTML.
                 */
                array_push($html, '<ul>');
                
                if ($wpdb->num_rows != 0){
                    if ($form){
                        array_push($html, $this->listItem($form));
                    }
                }
                else{
                    array_push($html, '<li class="dopbsp-no-data">'.$DOPBSP->text('NO_FORMS').'</li>');
                }
                array_push($html, '</ul>');
                
                echo implode('', $html);
                
            	die();                
            }
            
            /*
             * Returns forms list item HTML.
             * 
             * @param form (object): form data
             * 
             * @return form list item HTML
             */
            function listItem($form){
                global $DOPBSP;
                
                $html = array();
                $user = get_userdata($form->user_id); // Get data about the user who created the form.
                
                array_push($html, '<li class="dopbsp-item" id="DOPBSP-form-ID-1" onclick="DOPBSPForm.display()">');
                array_push($html, ' <div class="dopbsp-header">');
                
                /*
                 * Display form ID.
                 */
                array_push($html, '     <span class="dopbsp-id">ID: 1</span>');
                
                /*
                 * Display data about the user who created the form.
                 */
                if ($form->user_id > 0){
                    array_push($html, '     <span class="dopbsp-header-item dopbsp-avatar">'.get_avatar($form->user_id, 17));
                    array_push($html, '         <span class="dopbsp-info">'.$DOPBSP->text('FORMS_CREATED_BY').': '.$user->data->display_name.'</span>');
                    array_push($html, '         <br class="dopbsp-clear" />');
                    array_push($html, '     </span>');
                }
                array_push($html, '     <br class="dopbsp-clear" />');
                array_push($html, ' </div>');
                array_push($html, ' <div class="dopbsp-name">'.($form->name == '' ? '&nbsp;':$form->name).'</div>');
                array_push($html, '</li>');
                
                return implode('', $html);
            }
        }
    }