<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/forms/class-backend-form-field-select-option.php
* File Version            : 1.0.3
* Created / Last Modified : 25 January 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end form field select option PHP class.
*/

    if (!class_exists('DOPBSPBackEndFormFieldSelectOption')){
        class DOPBSPBackEndFormFieldSelectOption extends DOPBSPBackEndFormFieldSelectOptions{
            /*
             * Constructor
             */
            function DOPBSPBackEndFormFieldSelectOption(){
            }
            
            /*
             * Add form field select option.
             * 
             * @post field_id (integer): field ID
             * @post position (integer): select option position
             * @post language (string): current select option language
             * 
             * @return new field HTML
             */
            function add(){
                global $wpdb;
                global $DOPBSP;
                
                $field_id = $_POST['field_id'];
                $position = $_POST['position'];
                $language = $_POST['language'];
                
                $wpdb->insert($DOPBSP->tables->forms_fields_options, array('field_id' => $field_id,
                                                                           'position' => $position,
                                                                           'translation' => $DOPBSP->classes->translation->encodeJSON('FORMS_FORM_FIELD_SELECT_ADD_OPTION_LABEL')));
                $id = $wpdb->insert_id;
                $select_option = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->forms_fields_options.' WHERE id=%d',
                                                               $id));
                
                $DOPBSP->views->backend_form_field_select_option->template(array('select_option' => $select_option,
                                                                         'language' => $language));
                
                die();
            }
            
            /*
             * Edit form field select option.
             * 
             * @post id (integer): select option ID
             * @post field (string): select option field
             * @post value (string): select option value
             * @post language (string): form selected language
             * 
             * @return option field ID
             */
            function edit(){
                global $wpdb;
                global $DOPBSP;
                
                $id = $_POST['id'];
                $field = $_POST['field'];
                $value = $_POST['value'];
                $language = $_POST['language'];
                
                if ($field == 'label'){
                    $value = str_replace("\n", '<<new-line>>', $value);
                    $value = str_replace("\'", '<<single-quote>>', $value);
                    $value = utf8_encode($value);
                    
                    $field_data = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->forms_fields_options.' WHERE id=%d',
                                                                $id));
                    
                    $translation = json_decode($field_data->translation);
                    $translation->$language = $value;
                    
                    $value = json_encode($translation);
                    $field = 'translation';
                }
                        
                $select_option = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->forms_fields_options.' WHERE id=%d',
                                                               $id));
                $wpdb->update($DOPBSP->tables->forms_fields_options, array($field => $value), 
                                                                     array('id' => $_POST['id']));
                
                echo $select_option->field_id;
                
                die();
            }
            
            /*
             * Delete form field select option.
             * 
             * @post id (integer): select option ID
             * 
             * @return option field ID
             */
            function delete(){
                global $wpdb;
                global $DOPBSP;
                
                $id = $_POST['id'];
                
                $select_option = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->forms_fields_options.' WHERE id=%d',
                                                               $id));
                $wpdb->delete($DOPBSP->tables->forms_fields_options, array('id' => $id));
                
                echo $select_option->field_id;
                
                die();
            }
        }
    }