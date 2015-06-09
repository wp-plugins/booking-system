<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/translation/class-translation-text-forms.php
* File Version            : 1.0.2
* Created / Last Modified : 12 December 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System forms translation text PHP class.
*/

    if (!class_exists('DOPBSPTranslationTextForms')){
        class DOPBSPTranslationTextForms{
            /*
             * Constructor
             */
            function DOPBSPTranslationTextForms(){
                /*
                 * Initialize forms text.
                 */
                add_filter('dopbsp_filter_translation_text', array(&$this, 'forms'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'formsDefault'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'formsForm'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'formsAddForm'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'formsDeleteForm'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'formsFormFields'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'formsFormField'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'formsFormAddField'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'formsFormDeleteField'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'formsFormFieldSelectOptions'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'formsFormFieldSelectOption'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'formsFormFieldSelectAddOption'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'formsFormFieldSelectDeleteOption'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'formsHelp'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'formsFrontEnd'));
            }
            
            /*
             * Forms text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function forms($text){
                array_push($text, array('key' => 'PARENT_FORMS',
                                        'parent' => '',
                                        'text' => 'Forms'));
                
                array_push($text, array('key' => 'FORMS_TITLE',
                                        'parent' => 'PARENT_FORMS',
                                        'text' => 'Forms'));
                array_push($text, array('key' => 'FORMS_CREATED_BY',
                                        'parent' => 'PARENT_FORMS',
                                        'text' => 'Created by'));
                array_push($text, array('key' => 'FORMS_LOAD_SUCCESS',
                                        'parent' => 'PARENT_FORMS',
                                        'text' => 'Forms list loaded.'));
                array_push($text, array('key' => 'FORMS_NO_FORMS',
                                        'parent' => 'PARENT_FORMS',
                                        'text' => 'No forms. Click the above "plus" icon to add a new one.'));
                
                return $text;
            }
            
            /*
             * Forms default text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function formsDefault($text){
                array_push($text, array('key' => 'PARENT_FORMS_DEFAULT',
                                        'parent' => '',
                                        'text' => 'Forms - Default data'));
                
                array_push($text, array('key' => 'FORMS_DEFAULT_NAME',
                                        'parent' => 'PARENT_FORMS_DEFAULT',
                                        'text' => 'Cotact information'));
                array_push($text, array('key' => 'FORMS_DEFAULT_FIRST_NAME',
                                        'parent' => 'PARENT_FORMS_DEFAULT',
                                        'text' => 'First name'));
                array_push($text, array('key' => 'FORMS_DEFAULT_LAST_NAME',
                                        'parent' => 'PARENT_FORMS_DEFAULT',
                                        'text' => 'Last name'));
                array_push($text, array('key' => 'FORMS_DEFAULT_EMAIL',
                                        'parent' => 'PARENT_FORMS_DEFAULT',
                                        'text' => 'Email'));
                array_push($text, array('key' => 'FORMS_DEFAULT_PHONE',
                                        'parent' => 'PARENT_FORMS_DEFAULT',
                                        'text' => 'Phone'));
                array_push($text, array('key' => 'FORMS_DEFAULT_MESSAGE',
                                        'parent' => 'PARENT_FORMS_DEFAULT',
                                        'text' => 'Message'));
                
                return $text;
            }
            
            /*
             * Forms - Form text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function formsForm($text){
                array_push($text, array('key' => 'PARENT_FORMS_FORM',
                                        'parent' => '',
                                        'text' => 'Forms - Form'));
                
                array_push($text, array('key' => 'FORMS_FORM_NAME',
                                        'parent' => 'PARENT_FORMS_FORM',
                                        'text' => 'Name'));
                array_push($text, array('key' => 'FORMS_FORM_LANGUAGE',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD',
                                        'text' => 'Language'));
                array_push($text, array('key' => 'FORMS_FORM_LOADED',
                                        'parent' => 'PARENT_FORMS_FORM',
                                        'text' => 'Form loaded.'));
                
                return $text;
            }
            
            /*
             * Forms - Add form text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function formsAddForm($text){
                array_push($text, array('key' => 'PARENT_FORMS_ADD_FORM',
                                        'parent' => '',
                                        'text' => 'Forms - Add form'));
                
                array_push($text, array('key' => 'FORMS_ADD_FORM_NAME',
                                        'parent' => 'PARENT_FORMS_ADD_FORM',
                                        'text' => 'New form'));
                array_push($text, array('key' => 'FORMS_ADD_FORM_SUBMIT',
                                        'parent' => 'PARENT_FORMS_ADD_FORM',
                                        'text' => 'Add form'));
                array_push($text, array('key' => 'FORMS_ADD_FORM_ADDING',
                                        'parent' => 'PARENT_FORMS_ADD_FORM',
                                        'text' => 'Adding a new form ...'));
                array_push($text, array('key' => 'FORMS_ADD_FORM_SUCCESS',
                                        'parent' => 'PARENT_FORMS_ADD_FORM',
                                        'text' => 'You have succesfully added a new form.'));
                
                return $text;
            }
            
            /*
             * Forms - Delete form text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function formsDeleteForm($text){
                array_push($text, array('key' => 'PARENT_FORMS_DELETE_FORM',
                                        'parent' => '',
                                        'text' => 'Forms - Delete form'));
                
                array_push($text, array('key' => 'FORMS_DELETE_FORM_CONFIRMATION',
                                        'parent' => 'PARENT_FORMS_DELETE_FORM',
                                        'text' => 'Are you sure you want to delete this form?'));
                array_push($text, array('key' => 'FORMS_DELETE_FORM_SUBMIT',
                                        'parent' => 'PARENT_FORMS_DELETE_FORM',
                                        'text' => 'Delete form'));
                array_push($text, array('key' => 'FORMS_DELETE_FORM_DELETING',
                                        'parent' => 'PARENT_FORMS_DELETE_FORM',
                                        'text' => 'Deleting form ...'));
                array_push($text, array('key' => 'FORMS_DELETE_FORM_SUCCESS',
                                        'parent' => 'PARENT_FORMS_DELETE_FORM',
                                        'text' => 'You have succesfully deleted the form.'));
                
                return $text;
            }
            
            /*
             * Forms - Form fields text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function formsFormFields($text){
                array_push($text, array('key' => 'PARENT_FORMS_FORM_FIELDS',
                                        'parent' => '',
                                        'text' => 'Forms - Form fields'));
                
                array_push($text, array('key' => 'FORMS_FORM_FIELDS',
                                        'parent' => 'PARENT_FORMS_FORM_FIELDS',
                                        'text' => 'Form fiels'));
                
                return $text;
            }
            
            /*
             * Forms - Form field text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function formsFormField($text){
                array_push($text, array('key' => 'PARENT_FORMS_FORM_FIELD',
                                        'parent' => '',
                                        'text' => 'Forms - Form field'));
                
                array_push($text, array('key' => 'FORMS_FORM_FIELD_SHOW_SETTINGS',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD',
                                        'text' => 'Show settings'));
                array_push($text, array('key' => 'FORMS_FORM_FIELD_HIDE_SETTINGS',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD',
                                        'text' => 'Hide settings'));
                array_push($text, array('key' => 'FORMS_FORM_FIELD_SORT',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD',
                                        'text' => 'Sort'));
                
                /*
                 * Field types.
                 */
                array_push($text, array('key' => 'FORMS_FORM_FIELD_TYPE_TEXT_LABEL',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD',
                                        'text' => 'Text'));
                array_push($text, array('key' => 'FORMS_FORM_FIELD_TYPE_TEXTAREA_LABEL',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD',
                                        'text' => 'Textarea'));
                array_push($text, array('key' => 'FORMS_FORM_FIELD_TYPE_CHECKBOX_LABEL',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD',
                                        'text' => 'Checkbox'));
                array_push($text, array('key' => 'FORMS_FORM_FIELD_TYPE_CHECKBOX_CHECKED_LABEL',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD',
                                        'text' => 'Checked',
                                        'de' => 'Überprüft',
                                        'nl' => 'Gecontroleerd',
                                        'fr' => 'Coché',
                                        'pl' => 'Wybrane'));
                array_push($text, array('key' => 'FORMS_FORM_FIELD_TYPE_CHECKBOX_UNCHECKED_LABEL',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD',
                                        'text' => 'Unchecked',
                                        'de' => 'Ungeprüft',
                                        'nl' => 'Ongehinderd',
                                        'fr' => 'Non coché',
                                        'pl' => 'Niewybrane'));
                array_push($text, array('key' => 'FORMS_FORM_FIELD_TYPE_SELECT_LABEL',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD',
                                        'text' => 'Drop down'));
                
                /*
                 * Settings labels.
                 */
                array_push($text, array('key' => 'FORMS_FORM_FIELD_LABEL_LABEL',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD',
                                        'text' => 'Label'));
                array_push($text, array('key' => 'FORMS_FORM_FIELD_ALLOWED_CHARACTERS_LABEL',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD',
                                        'text' => 'Allowed Characters'));
                array_push($text, array('key' => 'FORMS_FORM_FIELD_SIZE_LABEL',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD',
                                        'text' => 'Size'));
                array_push($text, array('key' => 'FORMS_FORM_FIELD_EMAIL_LABEL',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD',
                                        'text' => 'Is email'));
                array_push($text, array('key' => 'FORMS_FORM_FIELD_REQUIRED_LABEL',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD',
                                        'text' => 'Required'));
                array_push($text, array('key' => 'FORMS_FORM_FIELD_MULTIPLE_SELECT_LABEL',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD',
                                        'text' => 'Multiple select'));
                array_push($text, array('key' => 'FORMS_FORM_FIELD_ADD_TO_DAY_HOUR_INFO_LABEL',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD',
                                        'text' => 'Add field to day/hour info'));
                array_push($text, array('key' => 'FORMS_FORM_FIELD_ADD_TO_DAY_HOUR_BODY_LABEL',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD',
                                        'text' => 'Add field to day/hour body'));
                
                return $text;
            }
            
            /*
             * Forms - Add form field text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function formsFormAddField($text){
                array_push($text, array('key' => 'PARENT_FORMS_FORM_ADD_FIELD',
                                        'parent' => '',
                                        'text' => 'Forms - Add form field'));
                
                array_push($text, array('key' => 'FORMS_FORM_ADD_FIELD_TEXT_LABEL',
                                        'parent' => 'PARENT_FORMS_FORM_ADD_FIELD',
                                        'text' => 'New text field'));
                array_push($text, array('key' => 'FORMS_FORM_ADD_FIELD_TEXTAREA_LABEL',
                                        'parent' => 'PARENT_FORMS_FORM_ADD_FIELD',
                                        'text' => 'New textarea field'));
                array_push($text, array('key' => 'FORMS_FORM_ADD_FIELD_CHECKBOX_LABEL',
                                        'parent' => 'PARENT_FORMS_FORM_ADD_FIELD',
                                        'text' => 'New checkbox field'));
                array_push($text, array('key' => 'FORMS_FORM_ADD_FIELD_SELECT_LABEL',
                                        'parent' => 'PARENT_FORMS_FORM_ADD_FIELD',
                                        'text' => 'New drop down field'));
                
                array_push($text, array('key' => 'FORMS_FORM_ADD_FIELD_ADDING',
                                        'parent' => 'PARENT_FORMS_FORM_ADD_FIELD',
                                        'text' => 'Adding a new form field ...'));
                array_push($text, array('key' => 'FORMS_FORM_ADD_FIELD_SUCCESS',
                                        'parent' => 'PARENT_FORMS_FORM_ADD_FIELD',
                                        'text' => 'You have succesfully added a new form field.'));
                
                return $text;
            }
            
            /*
             * Forms - Delete form field text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function formsFormDeleteField($text){
                array_push($text, array('key' => 'PARENT_FORMS_FORM_DELETE_FIELD',
                                        'parent' => '',
                                        'text' => 'Forms - Delete form field'));
                
                array_push($text, array('key' => 'FORMS_FORM_DELETE_FIELD_CONFIRMATION',
                                        'parent' => 'PARENT_FORMS_FORM_DELETE_FIELD',
                                        'text' => 'Are you sure you want to delete this form field?'));
                array_push($text, array('key' => 'FORMS_FORM_DELETE_FIELD_SUBMIT',
                                        'parent' => 'PARENT_FORMS_FORM_DELETE_FIELD',
                                        'text' => 'Delete'));
                array_push($text, array('key' => 'FORMS_FORM_DELETE_FIELD_DELETING',
                                        'parent' => 'PARENT_FORMS_FORM_DELETE_FIELD',
                                        'text' => 'Deleting form field ...'));
                array_push($text, array('key' => 'FORMS_FORM_DELETE_FIELD_SUCCESS',
                                        'parent' => 'PARENT_FORMS_FORM_DELETE_FIELD',
                                        'text' => 'You have succesfully deleted the form field.'));
                
                return $text;
            }
            
            /*
             * Forms - Form field select options text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function formsFormFieldSelectOptions($text){
                array_push($text, array('key' => 'PARENT_FORMS_FORM_FIELD_SELECT_OPTIONS',
                                        'parent' => '',
                                        'text' => 'Forms - Form field - Select options'));
                
                array_push($text, array('key' => 'FORMS_FORM_FIELD_SELECT_OPTIONS_LABEL',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD_SELECT_OPTIONS',
                                        'text' => 'Options'));
                
                return $text;
            }
            
            /*
             * Forms - Form field select option text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function formsFormFieldSelectOption($text){
                array_push($text, array('key' => 'PARENT_FORMS_FORM_FIELD_SELECT_OPTION',
                                        'parent' => '',
                                        'text' => 'Forms - Form field - Select option'));
                
                array_push($text, array('key' => 'FORMS_FORM_FIELD_SELECT_OPTION_SORT',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD_SELECT_OPTION',
                                        'text' => 'Sort'));
                
                return $text;
            }
            
            /*
             * Forms - Add form field select option text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function formsFormFieldSelectAddOption($text){
                array_push($text, array('key' => 'PARENT_FORMS_FORM_FIELD_SELECT_ADD_OPTION',
                                        'parent' => '',
                                        'text' => 'Forms - Form field - Add select option'));
                
                array_push($text, array('key' => 'FORMS_FORM_FIELD_SELECT_ADD_OPTION_LABEL',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD_SELECT_ADD_OPTION',
                                        'text' => 'New option'));
                array_push($text, array('key' => 'FORMS_FORM_FIELD_SELECT_ADD_OPTION_SUBMIT',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD_SELECT_ADD_OPTION',
                                        'text' => 'Add select option'));
                array_push($text, array('key' => 'FORMS_FORM_FIELD_SELECT_ADD_OPTION_ADDING',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD_SELECT_ADD_OPTION',
                                        'text' => 'Adding a new select option ...'));
                array_push($text, array('key' => 'FORMS_FORM_FIELD_SELECT_ADD_OPTION_SUCCESS',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD_SELECT_ADD_OPTION',
                                        'text' => 'You have succesfully added a new select option.'));
                
                return $text;
            }
            
            /*
             * Forms - Delete form field select option text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function formsFormFieldSelectDeleteOption($text){
                array_push($text, array('key' => 'PARENT_FORMS_FORM_FIELD_SELECT_DELETE_OPTION',
                                        'parent' => '',
                                        'text' => 'Forms - Form field - Delete select option'));
                
                array_push($text, array('key' => 'FORMS_FORM_FIELD_SELECT_DELETE_OPTION_CONFIRMATION',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD_SELECT_DELETE_OPTION',
                                        'text' => 'Are you sure you want to delete this select option?'));
                array_push($text, array('key' => 'FORMS_FORM_FIELD_SELECT_DELETE_OPTION_SUBMIT',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD_SELECT_DELETE_OPTION',
                                        'text' => 'Delete'));
                array_push($text, array('key' => 'FORMS_FORM_FIELD_SELECT_DELETE_OPTION_DELETING',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD_SELECT_DELETE_OPTION',
                                        'text' => 'Deleting select option ...'));
                array_push($text, array('key' => 'FORMS_FORM_FIELD_SELECT_DELETE_OPTION_SUCCESS',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD_SELECT_DELETE_OPTION',
                                        'text' => 'You have succesfully deleted the select option.'));
                
                return $text;
            }
            
            /*
             * Forms - Help text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function formsHelp($text){
                array_push($text, array('key' => 'PARENT_FORMS_HELP',
                                        'parent' => '',
                                        'text' => 'Forms - Help'));
                
                array_push($text, array('key' => 'FORMS_HELP',
                                        'parent' => 'PARENT_FORMS_HELP',
                                        'text' => 'Click on a form item to open the editing area.'));
                array_push($text, array('key' => 'FORMS_ADD_FORM_HELP',
                                        'parent' => 'PARENT_FORMS_HELP',
                                        'text' => 'Click on the "plus" icon to add a form.'));
                
                /*
                 * Form help.
                 */
                array_push($text, array('key' => 'FORMS_FORM_NAME_HELP',
                                        'parent' => 'PARENT_FORMS_HELP',
                                        'text' => 'Change form name.'));
                array_push($text, array('key' => 'FORMS_FORM_LANGUAGE_HELP',
                                        'parent' => 'PARENT_FORMS_HELP',
                                        'text' => 'Change to the language you want to edit the form.'));
                array_push($text, array('key' => 'FORMS_FORM_ADD_FIELD_HELP',
                                        'parent' => 'PARENT_FORMS_HELP',
                                        'text' => 'Click on the bellow "plus" icon to add a form field.'));
                array_push($text, array('key' => 'FORMS_FORM_EDIT_FIELD_HELP',
                                        'parent' => 'PARENT_FORMS_HELP',
                                        'text' => 'Click the field "expand" icon to display/hide the settings.'));
                array_push($text, array('key' => 'FORMS_FORM_DELETE_FIELD_HELP',
                                        'parent' => 'PARENT_FORMS_HELP',
                                        'text' => 'Click the field "trash" icon to delete it.'));
                array_push($text, array('key' => 'FORMS_FORM_SORT_FIELD_HELP',
                                        'parent' => 'PARENT_FORMS_HELP',
                                        'text' => 'Drag the field "arrows" icon to sort it.'));
                /*
                 * Form field help.
                 */
                array_push($text, array('key' => 'FORMS_FORM_FIELD_LABEL_HELP',
                                        'parent' => 'PARENT_FORMS_HELP',
                                        'text' => 'Enter field label.'));
                array_push($text, array('key' => 'FORMS_FORM_FIELD_ALLOWED_CHARACTERS_HELP',
                                        'parent' => 'PARENT_FORMS_HELP',
                                        'text' => 'Enter the caracters allowed in this field. Leave it blank if all characters are allowed.'));
                array_push($text, array('key' => 'FORMS_FORM_FIELD_SIZE_HELP',
                                        'parent' => 'PARENT_FORMS_HELP',
                                        'text' => 'Enter the maximum number of characters allowed. Leave it blank for unlimited.'));
                array_push($text, array('key' => 'FORMS_FORM_FIELD_EMAIL_HELP',
                                        'parent' => 'PARENT_FORMS_HELP',
                                        'text' => 'Enable it if you want this field to be verified if an email has been added or not.'));
                array_push($text, array('key' => 'FORMS_FORM_FIELD_REQUIRED_HELP',
                                        'parent' => 'PARENT_FORMS_HELP',
                                        'text' => 'Enable it if you want the field to be mandatory.'));
                array_push($text, array('key' => 'FORMS_FORM_FIELD_MULTIPLE_SELECT_HELP',
                                        'parent' => 'PARENT_FORMS_HELP',
                                        'text' => 'Enable it if you want a multiple select drop down.'));
                array_push($text, array('key' => 'FORMS_FORM_FIELD_ADD_TO_DAY_HOUR_INFO_HELP',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD',
                                        'text' => 'Enable it if you want to display the field in a reservations list, in the info tooltip, in calendars days/hours.'));
                array_push($text, array('key' => 'FORMS_FORM_FIELD_ADD_TO_DAY_HOUR_BODY_HELP',
                                        'parent' => 'PARENT_FORMS_FORM_FIELD',
                                        'text' => 'Enable it if you want to display the field in a reservations list, in the days/hours boby (under availability), in calendars.'));
                
                array_push($text, array('key' => 'FORMS_FORM_FIELD_SELECT_OPTIONS_HELP',
                                        'parent' => 'PARENT_FORMS_HELP',
                                        'text' => 'Click the "plus" icon to add another option and enter the name. Click on the "delete" icon to remove the option.'));
                
                return $text;
            }
            
            /*
             * Forms front end text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function formsFrontEnd($text){
                array_push($text, array('key' => 'PARENT_FORMS_FRONT_END',
                                        'parent' => '',
                                        'text' => 'Forms - Front end'));
                
                array_push($text, array('key' => 'FORMS_FRONT_END_TITLE',
                                        'parent' => 'PARENT_FORMS_FRONT_END',
                                        'text' => 'Contact information',
                                        'de' => 'Kontaktinformationen',
                                        'nl' => 'Contact informatie',
                                        'fr' => 'Informations de contact',
                                        'pl' => 'Informacje kontaktowe'));
                array_push($text, array('key' => 'FORMS_FRONT_END_REQUIRED',
                                        'parent' => 'PARENT_FORMS_FRONT_END',
                                        'text' => 'is required.',
                                        'de' => 'erforderlich.',
                                        'nl' => 'is verplicht.',
                                        'fr' => 'est requis.',
                                        'pl' => 'wymagane.'));  
                array_push($text, array('key' => 'FORMS_FRONT_END_INVALID_EMAIL',
                                        'parent' => 'PARENT_FORMS_FRONT_END',
                                        'text' => 'is invalid. Please enter a valid email.',
                                        'de' => 'ist ungültig. Bitte geben Sie eine gültige emailadresse ein.',
                                        'nl' => 'is niet juist. Vul a.u.b. een geldig mail adres in.',
                                        'fr' => 'est invalide. Veuillez entrer une adresse e-mail valide.',
                                        'pl' => 'proszę wpisać poprawny adres e-mail.'));
                
                return $text;
            }
        }
    }