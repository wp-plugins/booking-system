<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 1.1
* File                    : dopbs-backend-forms.php
* File Version            : 1.0
* Created / Last Modified : 29 July 2013
* Author                  : Dot on Paper
* Copyright               : © 2013 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System Forms Class.
*/

    if (!class_exists("DOPBookingSystemBackEndForms")){
        class DOPBookingSystemBackEndForms extends DOPBookingSystemBackEnd{
            private $DOPBS_AddEditCalendars;

            function DOPBookingSystemBackEndForms(){// Constructor.
                if (is_admin()){
                    if ($this->validPage()){
                        $this->DOPBS_AddEditCalendars = new DOPBSTemplates();
                    }
                }
            }

// Pages            
            function printBookingFormsPage(){// Prints out the settings page.
                $this->DOPBS_AddEditCalendars->bookingForms();
            }
            
// Options
            function listForms(){
                global $wpdb;
                $result = array();
                
                
                $booking_forms = $wpdb->get_results('SELECT * FROM '.DOPBS_Forms_table.' ORDER BY id ASC');
                
                if ($wpdb->num_rows != 0){
                    foreach ($booking_forms as $booking_form){
                        array_push($result, $booking_form->id.';;'.$booking_form->id.': '.$booking_form->name);  
                    }
                    return implode(';;;', $result);
                }
                else{
                    return '';
                }
            }
            
// Booking Forms            
            function showBookingForms(){// Show Forms List.
                global $wpdb;
                                    
                $booking_forms_HTML = array();
                array_push($booking_forms_HTML, '<ul>');
                
                $booking_forms = $wpdb->get_results('SELECT * FROM '.DOPBS_Forms_table.' ORDER BY id DESC');
                                
                if ($wpdb->num_rows != 0){
                    if ($booking_forms){
                        foreach ($booking_forms as $booking_form){
                            array_push($booking_forms_HTML, '<li class="item" id="DOPBS-ID-'.$booking_form->id.'"><span class="id">ID '.$booking_form->id.':</span> <span class="name">'.$this->shortName($booking_form->name, 25).'</span></li>');  
                        }
                    }
                }
                else{
                    array_push($booking_forms_HTML, '<li class="no-data">'.DOPBS_NO_BOOKING_FORMS.'</li>');
                }
                array_push($booking_forms_HTML, '</ul>');
                
                echo implode('', $booking_forms_HTML);
                
            	die();                
            }
            
            function showBookingForm(){// Show Calendar.
                if (isset($_POST['id'])){
                    global $wpdb;
                    
                    $data = array();
                    $form = $wpdb->get_row('SELECT * FROM '.DOPBS_Forms_table.' WHERE id="'.$_POST['id'].'"');
                    
                    echo $form->name;

                    die();
                }
            }
            
            function editBookingForm(){// Edit Booking Form Settings.
                global $wpdb;  
                
                $wpdb->update(DOPBS_Forms_table, array('name' => $_POST['name']), array(id => $_POST['id']));
                echo '';
                
            	die();
            }
            
            function showBookingFormFields(){
                global $wpdb;
                
                $current_backend_language = get_option('DOPBS_backend_language_'.wp_get_current_user()->ID);
                $fields = $wpdb->get_results('SELECT * FROM '.DOPBS_Forms_Fields_table.' WHERE form_id='.$_POST['booking_form_id'].' ORDER BY position ASC');
                
                if ($wpdb->num_rows > 0){
                    $language = $_POST["language"];
                    
                    foreach($fields as $field){
                        $translations = json_decode(stripslashes($field->translation));
                        $ok_translation = str_replace('"', '#', stripslashes($field->translation));
                        
                        $options = $wpdb->get_results('SELECT * FROM '.DOPBS_Forms_Select_Options_table.' WHERE field_id='.$field->id.' ORDER BY field_id ASC');
                        
                        echo '<li class="booking-form-item" id="booking-form-field-'.$field->id.'">';
                        // Field Name and Show/Hide button
                        echo '  <span class="booking-form-field-name-wrapper">'.
                                    ($field->type == 'checkbox' ? '<input type="checkbox" name="booking-form-field-demo-'.$field->id.'" id="booking-form-field-demo-'.$field->id.'" class="booking-form-field-demo-checkbox" disabled="disabled" />':'').'
                                    <span class="booking-form-field-name">'.$translations->$language.' <span></span></span>    
                                    <a href="javascript:dopbsExpandBookingFormField('.$field->id.')" class="booking-form-field-show-settings-button">'.DOPBS_BOOKING_FORM_FIELDS_SHOW_SETTINGS.'</a>   
                                    <br class="DOPBS-clear">';
                        
                        switch ($field->type){
                            case 'text':
                                echo '<input type="text" name="booking-form-field-demo-'.$field->id.'" id="booking-form-field-demo-'.$field->id.'" class="booking-form-field-demo-text" value="" disabled="disabled" />';
                                break;
                            case 'textarea':
                                echo '<textarea name="booking-form-field-demo-'.$field->id.'" id="booking-form-field-demo-'.$field->id.'" class="booking-form-field-demo-textarea" disabled="disabled"></textarea>';
                                break;
                            case 'select':
                                echo '<select name="booking-form-field-demo-'.$field->id.'" id="booking-form-field-demo-'.$field->id.'" class="booking-form-field-demo-select" '.($field->multiple_select == 'true' ? 'multiple':'').' disabled="disabled">';
                                
                                foreach ($options as $option){
                                    $optiontranslations = json_decode($option->translation);
                                    echo '<option id="booking-form-field-option-demo-'.$option->id.'" value="">'.$optiontranslations->$language.'</option>';
                                }
                                echo '</select>';
                                break;
                        }
                        echo '  </span>
                                <div class="booking-form-field-settings-wrapper">';
                        // Language
                        echo '      <div class="settings-box">
                                        <label for="DOPBS-admin-form-field-language-'.$field->id.'">'.DOPBS_BOOKING_FORM_FIELDS_LANGUAGE_LABEL.'</label>';
                                        echo $this->bookingFormLanguages($field->id);
                        echo '          <a href="javascript:void()" class="help" title="'.DOPBS_BOOKING_FORM_FIELDS_LANGUAGE_INFO.'"></a>
                                        <br class="DOPBS-clear" />
                                    </div>';
                        // Name
                        echo '      <div class="settings-box">
                                        <label for="booking-form-field-name-'.$field->id.'">'.DOPBS_BOOKING_FORM_FIELDS_NAME_LABEL.' *</label>
                                        <input type="text" name="booking-form-field-name-'.$field->id.'" id="booking-form-field-name-'.$field->id.'" value="'.$translations->$language.'" onkeyup="dopbsBookingFormFieldChange(\'translation\', '.$field->id.', this.value, \''.$current_backend_language.'\', \'\')" onblur="dopbsBookingFormFieldChange(\'translation\', '.$field->id.', this.value, \''.$current_backend_language.'\', \'\')" />
                                        <a href="javascript:void()" class="help" title="'.DOPBS_BOOKING_FORM_FIELDS_NAME_INFO.'"></a>
                                        <span class="loader" id="booking-form-loader-field-name-'.$field->id.'"></span>
                                        <br class="DOPBS-clear" />
                                        <input type="hidden" name="booking-form-field-translation-'.$field->id.'" id="booking-form-field-translation-'.$field->id.'" value="'.$ok_translation.'" />    
                                    </div>';
                        
                        if ($field->type == 'select'){
                            echo '  <div class="settings-box">
                                        <label>'.DOPBS_BOOKING_FORM_FIELDS_SELECT_OPTIONS_LABEL.'</label>
                                        <div class="booking-form-field-select-options" id="booking-form-field-select-options-'.$field->id.'">
                                            <a class="add" href="javascript:dopbsBookingFormFieldSelectAddOption('.$field->id.')" title="'.DOPBS_BOOKING_FORM_FIELDS_SELECT_ADD_OPTION.'"></a>
                                            <a href="javascript:void()" class="help" title="'.DOPBS_BOOKING_FORM_FIELDS_SELECT_OPTIONS_INFO.'"></a>
                                            <span class="loader" id="booking-form-loader-field-select-'.$field->id.'"></span>
                                            <br class="DOPBS-clear" /><br />';
                            
                            foreach ($options as $option){
                                $optiontranslations = json_decode($option->translation);
                                $optiontranslationsok = str_replace('"','#',$option->translation);
                                
                                echo '      <div class="option-box" id="booking-form-field-select-option-'.$option->id.'">
                                                <input type="text" class="form_name form_options_name_cls" name="booking-form-field-select-option-id-'.$option->id.'" id="booking-form-field-select-option-id-'.$option->id.'" value="'.$optiontranslations->$language.'" onkeyup="dopbsBookingFormFieldOptionChange('.$option->id.', this.value)" onblur="dopbsBookingFormFieldOptionChange('.$option->id.', this.value)" />
                                                <a href="javascript:dopbsBookingFormFieldSelectDeleteOption('.$option->id.')" class="remove" id="booking-form-field-select-option-remove-'.$option->id.'" title="'.DOPBS_BOOKING_FORM_FIELDS_SELECT_DELETE_OPTION.'"></a>
                                                <span class="loader" id="booking-form-loader-field-select-option-'.$option->id.'"></span>
                                                <input type="hidden" class="dopbs-booking-form-options-translations" id="booking-form-field-select-option-translation-'.$option->id.'" name="option" value="'.$optiontranslationsok.'"/>
                                                <input type="hidden" class="dopbs-booking-form-options-curent-language" id="booking-form-field-select-option-language-'.$option->id.'" name="language" value="'.$current_backend_language.'"/>
                                                <br class="DOPBS-clear">
                                            </div>';
                            }
                            echo '      </div>
                                        <br class="DOPBS-clear" />
                                    </div>';
                            
                            // Multiple Select    
                            echo '  <div class="settings-box">
                                        <label for="booking-form-field-multiple-select-'.$field->id.'">'.DOPBS_BOOKING_FORM_FIELDS_SELECT_MULTIPLE_SELECT_LABEL.'</label>
                                        <input type="checkbox" name="booking-form-field-multiple-select-'.$field->id.'" id="booking-form-field-multiple-select-'.$field->id.'" onclick="dopbsBookingFormFieldChange(\'multiple_select\', \''.$field->id.'\', \'false\', \'\')"'.($field->multiple_select != 'false' ? ' checked=""checked':'').' />
                                        <a href="javascript:void()" class="help" title="'.DOPBS_BOOKING_FORM_FIELDS_SELECT_MULTIPLE_SELECT_INFO.'"></a>
                                        <span class="loader" id="booking-form-loader-field-multiple-select-'.$field->id.'"></span>   
                                        <br class="DOPBS-clear" />
                                    </div>';
                        }
                        
                        if ($field->type !='checkbox' && $field->type !='select'){
                            // Allowed Characters    
                            echo '  <div class="settings-box">
                                        <label for="booking-form-field-allowed-characters-'.$field->id.'">'.DOPBS_BOOKING_FORM_FIELDS_ALLOWED_CHARACTERS_LABEL.'</label>
                                        <input type="text" name="booking-form-field-allowed-characters-'.$field->id.'" id="booking-form-field-allowed-characters-'.$field->id.'" value="'.$field->allowed_characters.'" onkeyup="dopbsBookingFormFieldChange(\'allowed_characters\', \''.$field->id.'\', this.value, \'\')" onblur="dopbsBookingFormFieldChange(\'allowed_characters\', \''.$field->id.'\', this.value, \'\')" />
                                        <a href="javascript:void()" class="help" title="'.DOPBS_BOOKING_FORM_FIELDS_ALLOWED_CHARACTERS_INFO.'"></a>
                                        <span class="loader" id="booking-form-loader-field-allowed-characters-'.$field->id.'"></span>   
                                        <br class="DOPBS-clear" />
                                    </div>';
                            //Size
                            echo '  <div class="settings-box">
                                        <label for="booking-form-field-size-'.$field->id.'">'.DOPBS_BOOKING_FORM_FIELDS_SIZE_LABEL.'</label>
                                        <input type="text" name="booking-form-field-size-'.$field->id.'" id="booking-form-field-size-'.$field->id.'" value="'.($field->size < 1 ? '':$field->size).'" onkeyup="dopbsBookingFormFieldChange(\'size\', \''.$field->id.'\', this.value, \'\')" onblur="dopbsBookingFormFieldChange(\'size\', \''.$field->id.'\', this.value, \'\')" />
                                        <a href="javascript:void()" class="help" title="'.DOPBS_BOOKING_FORM_FIELDS_SIZE_INFO.'"></a>
                                        <span class="loader" id="booking-form-loader-field-size-'.$field->id.'"></span>   
                                        <br class="DOPBS-clear" />
                                    </div>';
                        }
                        
                        if ($field->type == 'text'){
                            // Email
                            echo '  <div class="settings-box">
                                        <label for="booking-form-field-email-'.$field->id.'">'.DOPBS_BOOKING_FORM_FIELDS_EMAIL_LABEL.'</label>
                                        <input type="checkbox" name="booking-form-field-email-'.$field->id.'" id="booking-form-field-email-'.$field->id.'" onclick="dopbsBookingFormFieldChange(\'is_email\', \''.$field->id.'\', \'false\', \'\')"'.($field->is_email != 'false' ? ' checked=""checked':'').' />
                                        <a href="javascript:void()" class="help" title="'.DOPBS_BOOKING_FORM_FIELDS_EMAIL_INFO.'"></a>
                                        <span class="loader" id="booking-form-loader-field-is-email-'.$field->id.'"></span>    
                                        <br class="DOPBS-clear" />
                                    </div>';
                        }
                        
                        // Required
                        echo '      <div class="settings-box">
                                        <label for="booking-form-field-required-'.$field->id.'">'.DOPBS_BOOKING_FORM_FIELDS_REQUIRED_LABEL.'</label>
                                        <input type="checkbox" name="booking-form-field-required-'.$field->id.'" id="booking-form-field-required-'.$field->id.'" onclick="dopbsBookingFormFieldChange(\'required\', \''.$field->id.'\', \'false\', \'\')"'.($field->required != 'false' ? ' checked=""checked':'').' />
                                        <a href="javascript:void()" class="help" title="'.DOPBS_BOOKING_FORM_FIELDS_REQUIRED_INFO.'"></a>
                                        <span class="loader" id="booking-form-loader-field-required-'.$field->id.'"></span>
                                        <br class="DOPBS-clear" />
                                    </div>';
                        echo '  </div>';
                        echo '</li>';
                    }
                }
                
                die();
            }
                    
            function bookingFormLanguages($field_id){ // List languages select.
                $current_backend_language = get_option('DOPBS_backend_language_'.wp_get_current_user()->ID);
                
                if ($current_backend_language == ''){
                    $current_backend_language = 'en';
                }
?>
                <select id="DOPBS-admin-form-field-language-<?=$field_id?>" onchange="dopbsChangeTranslationBookingFormField(<?=$field_id?>, this.value)">
                    <option value="af"<?php echo $current_backend_language == 'af' ? ' selected="selected"':''?>>Afrikaans (Afrikaans)</option>
                    <option value="al"<?php echo $current_backend_language == 'al' ? ' selected="selected"':''?>>Albanian (Shqiptar)</option>
                    <option value="ar"<?php echo $current_backend_language == 'ar' ? ' selected="selected"':''?>>Arabic (>العربية)</option>
                    <option value="az"<?php echo $current_backend_language == 'az' ? ' selected="selected"':''?>>Azerbaijani (Azərbaycan)</option>
                    <option value="bs"<?php echo $current_backend_language == 'bs' ? ' selected="selected"':''?>>Basque (Euskal)</option>
                    <option value="by"<?php echo $current_backend_language == 'by' ? ' selected="selected"':''?>>Belarusian (Беларускай)</option>
                    <option value="bg"<?php echo $current_backend_language == 'bg' ? ' selected="selected"':''?>>Bulgarian (Български)</option>
                    <option value="ca"<?php echo $current_backend_language == 'ca' ? ' selected="selected"':''?>>Catalan (Català)</option>
                    <option value="cn"<?php echo $current_backend_language == 'cn' ? ' selected="selected"':''?>>Chinese (中国的)</option>
                    <option value="cr"<?php echo $current_backend_language == 'cr' ? ' selected="selected"':''?>>Croatian (Hrvatski)</option>
                    <option value="cz"<?php echo $current_backend_language == 'cz' ? ' selected="selected"':''?>>Czech (Český)</option>
                    <option value="dk"<?php echo $current_backend_language == 'dk' ? ' selected="selected"':''?>>Danish (Dansk)</option>
                    <option value="du"<?php echo $current_backend_language == 'du' ? ' selected="selected"':''?>>Dutch (Nederlands)</option>
                    <option value="en"<?php echo $current_backend_language == 'en' ? ' selected="selected"':''?>>English</option>
                    <option value="eo"<?php echo $current_backend_language == 'eo' ? ' selected="selected"':''?>>Esperanto (Esperanto)</option>
                    <option value="et"<?php echo $current_backend_language == 'et' ? ' selected="selected"':''?>>Estonian (Eesti)</option>
                    <option value="fl"<?php echo $current_backend_language == 'fl' ? ' selected="selected"':''?>>Filipino (na Filipino)</option>
                    <option value="fi"<?php echo $current_backend_language == 'fi' ? ' selected="selected"':''?>>Finnish (Suomi)</option>
                    <option value="fr"<?php echo $current_backend_language == 'fr' ? ' selected="selected"':''?>>French (Français)</option>
                    <option value="gl"<?php echo $current_backend_language == 'gl' ? ' selected="selected"':''?>>Galician (Galego)</option>
                    <option value="de"<?php echo $current_backend_language == 'de' ? ' selected="selected"':''?>>German (Deutsch)</option>
                    <option value="gr"<?php echo $current_backend_language == 'gr' ? ' selected="selected"':''?>>Greek (Ɛλληνικά)</option>
                    <option value="ha"<?php echo $current_backend_language == 'ha' ? ' selected="selected"':''?>>Haitian Creole (Kreyòl Ayisyen)</option>
                    <option value="he"<?php echo $current_backend_language == 'he' ? ' selected="selected"':''?>>Hebrew (עברית)</option>
                    <option value="hi"<?php echo $current_backend_language == 'hi' ? ' selected="selected"':''?>>Hindi (हिंदी)</option>
                    <option value="hu"<?php echo $current_backend_language == 'hu' ? ' selected="selected"':''?>>Hungarian (Magyar)</option>
                    <option value="is"<?php echo $current_backend_language == 'is' ? ' selected="selected"':''?>>Icelandic (Íslenska)</option>
                    <option value="id"<?php echo $current_backend_language == 'id' ? ' selected="selected"':''?>>Indonesian (Indonesia)</option>
                    <option value="ir"<?php echo $current_backend_language == 'ir' ? ' selected="selected"':''?>>Irish (Gaeilge)</option>
                    <option value="it"<?php echo $current_backend_language == 'it' ? ' selected="selected"':''?>>Italian (Italiano)</option>
                    <option value="ja"<?php echo $current_backend_language == 'ja' ? ' selected="selected"':''?>>Japanese (日本の)</option>
                    <option value="ko"<?php echo $current_backend_language == 'ko' ? ' selected="selected"':''?>>Korean (한국의)</option>            
                    <option value="lv"<?php echo $current_backend_language == 'lv' ? ' selected="selected"':''?>>Latvian (Latvijas)</option>
                    <option value="lt"<?php echo $current_backend_language == 'lt' ? ' selected="selected"':''?>>Lithuanian (Lietuvos)</option>            
                    <option value="mk"<?php echo $current_backend_language == 'mk' ? ' selected="selected"':''?>>Macedonian (македонски)</option>
                    <option value="mg"<?php echo $current_backend_language == 'mg' ? ' selected="selected"':''?>>Malay (Melayu)</option>
                    <option value="ma"<?php echo $current_backend_language == 'ma' ? ' selected="selected"':''?>>Maltese (Maltija)</option>
                    <option value="no"<?php echo $current_backend_language == 'no' ? ' selected="selected"':''?>>Norwegian (Norske)</option>            
                    <option value="pe"<?php echo $current_backend_language == 'pe' ? ' selected="selected"':''?>>Persian (فارسی)</option>
                    <option value="pl"<?php echo $current_backend_language == 'pl' ? ' selected="selected"':''?>>Polish (Polski)</option>
                    <option value="pt"<?php echo $current_backend_language == 'pt' ? ' selected="selected"':''?>>Portuguese (Português)</option>
                    <option value="ro"<?php echo $current_backend_language == 'ro' ? ' selected="selected"':''?>>Romanian (Română)</option>
                    <option value="ru"<?php echo $current_backend_language == 'ru' ? ' selected="selected"':''?>>Russian (Pусский)</option>
                    <option value="sr"<?php echo $current_backend_language == 'sr' ? ' selected="selected"':''?>>Serbian (Cрпски)</option>
                    <option value="sk"<?php echo $current_backend_language == 'sk' ? ' selected="selected"':''?>>Slovak (Slovenských)</option>
                    <option value="sl"<?php echo $current_backend_language == 'sl' ? ' selected="selected"':''?>>Slovenian (Slovenski)</option>
                    <option value="sp"<?php echo $current_backend_language == 'sp' ? ' selected="selected"':''?>>Spanish (Español)</option>
                    <option value="sw"<?php echo $current_backend_language == 'sw' ? ' selected="selected"':''?>>Swahili (Kiswahili)</option>
                    <option value="se"<?php echo $current_backend_language == 'se' ? ' selected="selected"':''?>>Swedish (Svenskt)</option>
                    <option value="th"<?php echo $current_backend_language == 'th' ? ' selected="selected"':''?>>Thai (ภาษาไทย)</option>
                    <option value="tr"<?php echo $current_backend_language == 'tr' ? ' selected="selected"':''?>>Turkish (Türk)</option>
                    <option value="uk"<?php echo $current_backend_language == 'uk' ? ' selected="selected"':''?>>Ukrainian (Український)</option>
                    <option value="ur"<?php echo $current_backend_language == 'ur' ? ' selected="selected"':''?>>Urdu (اردو)</option>
                    <option value="vi"<?php echo $current_backend_language == 'vi' ? ' selected="selected"':''?>>Vietnamese (Việt)</option>
                    <option value="we"<?php echo $current_backend_language == 'we' ? ' selected="selected"':''?>>Welsh (Cymraeg)</option>
                    <option value="yi"<?php echo $current_backend_language == 'yi' ? ' selected="selected"':''?>>Yiddish (ייִדיש)</option>
                </select>                    
<?php
            }
            
            function addBookingFormField(){
                global $wpdb;
                
                $positions = $_POST['positions'];
                $positionsp = str_replace('\"','',$positions);
                $positionsp = explode(',',$positionsp);
                
                foreach ($positionsp as $position){
                    if ($position){
                        $positionsdate = explode('-', $position);
                        $pos_id = $positionsdate[0];
                        $position_ok = $positionsdate[1];    
                        $data = array('position' => $position_ok);
                        $wpdb->update(DOPBS_Forms_Fields_table, $data, array(id => $pos_id));
                    }
                    
                }
                
                $translation = $_POST['translation'];
                $translation = str_replace('\"','"',$translation);
                
                mysql_query('BEGIN');
                $wpdb->insert(DOPBS_Forms_Fields_table, array('form_id' => $_POST['form_id'],
                                                               'type' => $_POST['type'],
                                                               'position' => $_POST['position'],
                                                               'translation' => $translation));
                $id = mysql_insert_id();
                mysql_query('COMMIT');
                
                echo $id;
                die();
            }
            
            function editBookingFormField(){
                global $wpdb;
                
                $data = array($_POST['name'] => $_POST['value']);
                $wpdb->update(DOPBS_Forms_Fields_table, $data, array(id => $_POST['id']));
                
                echo '';
                die();
            }
            
            function updateBookingFormFields(){
                global $wpdb;
                
                $positions = $_POST['positions'];
                $positionsp = str_replace('\"','',$positions);
                $positionsp = explode(',',$positionsp);
                
                foreach ($positionsp as $position){
                    if ($position){
                        $positionsdate = explode('-',$position);
                        $posid = $positionsdate[0];
                        $positionok = $positionsdate[1];    
                        $data = array(
                            'position' => $positionok
                        );
                        $wpdb->update(DOPBS_Forms_Fields_table, $data, array(id => $posid));
                    }
                    
                }
                
                $datasec = array('position' => $_POST['position']);
                $wpdb->update(DOPBS_Forms_Fields_table, $datasec, array(id => $_POST['fieldId']));
                
                echo '';
                die();
            }
            
            function deleteBookingFormField(){
                global $wpdb;
                
                $wpdb->query('DELETE FROM '.DOPBS_Forms_Fields_table.' WHERE id="'.$_POST['fieldId'].'"');
                $wpdb->query('DELETE FROM '.DOPBS_Forms_Select_Options_table.' WHERE field_id="'.$_POST['fieldId'].'"');
                
                echo '';
                die();
            }
            
            function addBookingFormFieldSelectOption(){
                global $wpdb;
                
                $new_translation = str_replace('\"', '"', $_POST['translation']);
                
                mysql_query('BEGIN');
                $wpdb->insert(DOPBS_Forms_Select_Options_table, array('field_id' => $_POST['field_id'],
                                                                       'translation' => $new_translation));
                $id = mysql_insert_id();
                mysql_query('COMMIT');
                
                echo $id;
                die();
            }
            
            function editBookingFormFieldSelectOption(){
                global $wpdb;
                
                $new_translation = str_replace('#', '"', $_POST['translation']);
                $data = array('translation' => $new_translation);
                
                
                $wpdb->update(DOPBS_Forms_Select_Options_table, $data, array(id => $_POST['id']));
                
                echo '';
                die();
            }
            
            function deleteBookingFormFieldSelectOption(){
                global $wpdb;
                
                $wpdb->query('DELETE FROM '.DOPBS_Forms_Select_Options_table.' WHERE id="'.$_POST['id'].'"');
                echo $_POST['id'];
                
                die();
            }
        }
    }