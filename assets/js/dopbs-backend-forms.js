/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 1.0
* File                    : dopbs-backend-forms.js
* File Version            : 1.0
* Created / Last Modified : 29 July 2013
* Author                  : Dot on Paper
* Copyright               : © 2013 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System Forms Scripts.
*/

//****************************************************************************** Forms

function dopbsShowBookingForms(){// Show all forms.
    if (clearClick){
        clearClick = false;
        dopbsRemoveColumns(1);
        dopbsToggleMessage('show', DOPBS_LOAD);
        
        $jDOPBS('#DOPBS-add-booking-form-btn').css('display', 'block');
        $jDOPBS('#DOPBS-add-language-btn').css('display', 'none');
        $jDOPBS('#DOPBS-edit-calendars-btn').css('display', 'block');
        $jDOPBS('#DOPBS-languages-help').css('display', 'none');
        $jDOPBS('#DOPBS-languages-btn').css('display', 'block');
        $jDOPBS('#DOPBS-calendars-help').css('display', 'block');
        $jDOPBS('#DOPBS-calendars-btn').css('display', 'none');

        $jDOPBS.post(ajaxurl, {action:'dopbs_show_booking_forms'}, function(data){
            $jDOPBS('.column-content', '.column1', '.DOPBS-admin').html(data);
            dopbsBookingFormsEvents();
            dopbsToggleMessage('hide', DOPBS_BOOKING_FORMS_LOADED);
            clearClick = true;
            dopbsShowBookingForm(1);
        });
    }
}

function dopbsAddBookingForm(){// Add booking form via AJAX.
    if (clearClick){
        clearClick = false;
        dopbsRemoveColumns(2);
        dopbsToggleMessage('show', DOPBS_ADD_BOOKING_FORM_SUBMITED);
        
        $jDOPBS.post(ajaxurl, {action:'dopbs_add_booking_form'}, function(data){
            $jDOPBS('.column-content', '.column1', '.DOPBS-admin').html(data);
            dopbsBookingFormsEvents();
            dopbsToggleMessage('hide', DOPBS_ADD_BOOKING_FORM_SUCCESS);
            clearClick = true;
        });
    }
}

function dopbsBookingFormsEvents(){// Init Booking Forms Events.
    $jDOPBS('li', '.column1', '.DOPBS-admin').click(function(){
        if (clearClick){
            var id = $jDOPBS(this).attr('id').split('-')[2];
            
            if (currBookingForm != id){
                currBookingForm = id;
                $jDOPBS('li', '.column1', '.DOPBS-admin').removeClass('item-selected');
                $jDOPBS(this).addClass('item-selected');
                dopbsShowBookingForm(id);
            }
        }
    });
}

function dopbsShowBookingForm(id){// Show Form
    if (clearClick){
        clearClick = false;
        $jDOPBS('li', '.column2', '.DOPBS-admin').removeClass('item-image-selected');
        dopbsRemoveColumns(2);
        dopbsToggleMessage('show', DOPBS_LOAD);
        $jDOPBS('#booking_form_id').val(id);
        
        $jDOPBS.post(ajaxurl, {action: 'dopbs_show_booking_form', 
                                id: id}, function(data){
            var HeaderHTML = new Array();
            
            HeaderHTML.push('<input type="button" name="DOPBS_calendar_submit" class="submit-style" onclick="dopbsEditBookingForm()" title="'+DOPBS_EDIT_BOOKING_FORM_SUBMIT+'" value="'+DOPBS_SUBMIT+'" />');
            HeaderHTML.push('<a href="javascript:void()" class="header-help" title="'+DOPBS_BOOKING_FORM_SETTINGS_HELP+'"></a>');
            
            $jDOPBS('.column-header', '.column2', '.DOPBS-admin').html(HeaderHTML.join(''));
;
            dopbsSettingsBookingForm(data, 2);
            
            clearClick = true;
        });
    }
}

function dopbsEditBookingForm(){// Edit Form Settings.
    if (clearClick){
        clearClick = false;
        
        dopbsToggleMessage('show', DOPBS_SAVE);
        $jDOPBS.post(ajaxurl, {action:'dopbs_edit_booking_form',
                                id: $jDOPBS('#booking_form_id').val(),
                                name: $jDOPBS('#form-name').val()}, function(data){
            clearClick = true;
            
            if ($jDOPBS('#booking_form_id').val() != '0'){
                $jDOPBS('.name', '#DOPBS-ID-'+$jDOPBS('#booking_form_id').val()).html($jDOPBS('#form-name').val());
                dopbsToggleMessage('hide', DOPBS_EDIT_BOOKING_FORM_SUCCESS);
            }
            else{
                dopbsToggleMessage('hide', DOPBS_EDIT_BOOKING_FORM_SUCCESS);
            }
        });
    }
}

function dopbsDeleteBookingForm(id){// Delete Form
    if (clearClick){
        if (confirm(DOPBS_DELETE_BOOKING_FORM_CONFIRMATION)){
            clearClick = false;
            dopbsToggleMessage('show', DOPBS_DELETE_BOOKING_FORM_SUBMITED);
            
            $jDOPBS.post(ajaxurl, {action:'dopbs_delete_booking_form', id:id}, function(data){
                dopbsRemoveColumns(2);
                
                $jDOPBS('#DOPBS-ID-'+id).stop(true, true).animate({'opacity':0}, 600, function(){
                    $jDOPBS(this).remove();
                    
                    if (data == '0'){
                        $jDOPBS('.column-content', '.column1', '.DOPBS-admin').html('<ul><li class="no-data">'+DOPBS_NO_BOOKING_FORMS+'</li></ul>');
                    }
                    clearClick = true;
                });
                
                dopbsToggleMessage('hide', DOPBS_DELETE_BOOKING_FORM_SUCCESS);
            });
        }
    }
}

// Form Generator
function dopbsSettingsBookingForm(name, column){// Settings Form.
    var HTML = new Array(), 
    nameTranslation = new Array(),
    copyHelper;
    
    HTML.push('<form method="post" class="settings" action="" onsubmit="return false;">');
    
// General Settings
    HTML.push('    <h3 class="settings">'+DOPBS_GENERAL_STYLES_SETTINGS+'</h3>');
    
    if ($jDOPBS('#booking_form_id').val() != '0'){
        HTML.push(dopbsSettingsFormInput('form-name', name, DOPBS_BOOKING_FORM_NAME, '', '', '', 'help', DOPBS_BOOKING_FORM_NAME_INFO));
    }
    HTML.push('</form>');
    
    // Booking Form Fields
    HTML.push('<h3 class="settings">'+DOPBS_BOOKING_FORM_FIELDS_TITLE+'</h3>');
    
    HTML.push('<div class="booking-form-wrapper">');

    // Form Fields
    HTML.push('    <div class="booking-form-fields-wrapper">');
    HTML.push('        <div class="booking-form-fields-container">');
    HTML.push('            <ul id="DOPBS-form-fields" class="connect-form-fields remove-form-fields">');
    HTML.push(dopbsBookingFormShowFields());
    HTML.push('            </ul>');
    HTML.push('        </div>');
    HTML.push('    </div>');
    
    // Form Fields Types
    HTML.push('    <div class="booking-form-fields-type-wrapper">');
    HTML.push('        <div class="booking-form-fields-types-container">');
    HTML.push('            <ul id="DOPBS-form-fields-types" class="connect-form-fields">');
    // Text Input Field
    HTML.push('                <li class="booking-form-item text">');
    HTML.push('                    <span class="booking-form-field-name-wrapper">');
    HTML.push('                        <span class="booking-form-field-name">'+DOPBS_BOOKING_FORM_FIELDS_TYPE_TEXT_LABEL+'</span>');
    HTML.push('                        <span class="booking-form-field-loader" style="display: none;"></span>');
    HTML.push('                        <a href="javascript:void(0)" class="booking-form-field-show-settings-button" style="display: none;">'+DOPBS_BOOKING_FORM_FIELDS_SHOW_SETTINGS+'</a>');
    HTML.push('                        <br class="DOPBS-clear">');
    HTML.push('                    </span>');
    HTML.push('                    <div class="booking-form-field-settings-wrapper"></div>');
    HTML.push('                </li>');
    // Text Area Field
    HTML.push('                <li class="booking-form-item textarea">');
    HTML.push('                    <span class="booking-form-field-name-wrapper">');
    HTML.push('                        <span class="booking-form-field-name">'+DOPBS_BOOKING_FORM_FIELDS_TYPE_TEXTAREA_LABEL+'</span>');
    HTML.push('                        <span class="booking-form-field-loader" style="display: none;"></span>');
    HTML.push('                        <a href="javascript:void(0)" class="booking-form-field-show-settings-button" style="display: none;">'+DOPBS_BOOKING_FORM_FIELDS_SHOW_SETTINGS+'</a>');
    HTML.push('                        <br class="DOPBS-clear">');
    HTML.push('                    </span>');
    HTML.push('                    <div class="booking-form-field-settings-wrapper"></div>');
    HTML.push('                 </li>');
    // Checkbox Field
    HTML.push('                 <li class="booking-form-item checkbox">');
    HTML.push('                    <span class="booking-form-field-name-wrapper">');
    HTML.push('                        <span class="booking-form-field-name">'+DOPBS_BOOKING_FORM_FIELDS_TYPE_CHECKBOX_LABEL+'</span>');
    HTML.push('                        <span class="booking-form-field-loader" style="display: none;"></span>');
    HTML.push('                        <a href="javascript:void(0)" class="booking-form-field-show-settings-button" style="display: none;">'+DOPBS_BOOKING_FORM_FIELDS_SHOW_SETTINGS+'</a>');
    HTML.push('                        <br class="DOPBS-clear">');
    HTML.push('                    </span>');
    HTML.push('                    <div class="booking-form-field-settings-wrapper"></div>');
    HTML.push('                 </li>');
    // Select Field
    HTML.push('                 <li class="booking-form-item select">');
    HTML.push('                    <span class="booking-form-field-name-wrapper">');
    HTML.push('                        <span class="booking-form-field-name">'+DOPBS_BOOKING_FORM_FIELDS_TYPE_SELECT_LABEL+'</span>');
    HTML.push('                        <span class="booking-form-field-loader" style="display: none;"></span>');
    HTML.push('                        <a href="javascript:void(0)" class="booking-form-field-show-settings-button" style="display: none;">'+DOPBS_BOOKING_FORM_FIELDS_SHOW_SETTINGS+'</a>');
    HTML.push('                        <br class="DOPBS-clear">');
    HTML.push('                    </span>');
    HTML.push('                    <div class="booking-form-field-settings-wrapper"></div>');
    HTML.push('                 </li>');
    HTML.push('             </ul>');
    HTML.push('         </div>');
    HTML.push('     </div>');
    
    // Form Fields Delete
    HTML.push('    <div class="booking-form-fields-delete-wrapper">');
    HTML.push('        <div class="booking-form-fields-delete-container">');
    HTML.push('            <ul id="DOPBS-form-fields-delete" class="remove-form-fields"></ul>');
    HTML.push('        </div>');
    HTML.push('    </div>');
    
    HTML.push('    <br class="DOPBS-clear" />');
    HTML.push('</div>');
    
    $jDOPBS('.column-content', '.column'+column, '.DOPBS-admin').html(HTML.join(''));
     
    $jDOPBS( "#DOPBS-form-fields-types" ).sortable({
        connectWith: ".connect-form-fields",
        forcePlaceholderSize: true,
        helper: function(e,li){
            copyHelper= li.clone().insertAfter(li);
            return li.clone();
        },
        update: function (e,li){
            var nrLi = $jDOPBS('#DOPBS-form-fields li').length,
            type = '',
            fieldId = 0,
            position = 0,
            positions = '',
            newId = '',
            idall = '',
            m = 0, j;
        
            if ($jDOPBS('#DOPBS-form-fields').find('li').hasClass('text')){
                $jDOPBS('#DOPBS-form-fields .text').attr('id', 'prov');
                type = 'text';
            } 
            else if ($jDOPBS('#DOPBS-form-fields').find('li').hasClass('textarea')){ 
                $jDOPBS('#DOPBS-form-fields .textarea').attr('id', 'prov');
                type = 'textarea';
            }
            else if($jDOPBS('#DOPBS-form-fields').find('li').hasClass('checkbox')){
                $jDOPBS('#DOPBS-form-fields .checkbox').attr('id', 'prov');
                type = 'checkbox';
            }
            else if ($jDOPBS('#DOPBS-form-fields').find('li').hasClass('select')){
                $jDOPBS('#DOPBS-form-fields .select').attr('id', 'prov');
                type = 'select';
            }
        
            for(j=1; j<=nrLi; j++){
                if ($jDOPBS('#DOPBS-form-fields li').eq(j-1).hasClass('text')
                    || $jDOPBS('#DOPBS-form-fields li').eq(j-1).hasClass('textarea') 
                    || $jDOPBS('#DOPBS-form-fields li').eq(j-1).hasClass('checkbox')
                    || $jDOPBS('#DOPBS-form-fields li').eq(j-1).hasClass('select')){
                   position = j;
                }
                else {
                    idall = $jDOPBS('#DOPBS-form-fields li').eq(j-1).attr('id');
                    newId = idall.split('booking-form-field-')[1];

                    if (m > 0){
                        positions = positions+','+newId+'-'+j;
                    }
                    else{
                       positions = positions+newId+'-'+j; 
                    }
                    m++;
                }
            }
            positions = '"'+positions+'"';
        
            //Generate translation
            var nameTranslation = new Array(),
            names = new Array(),
            namesSec = new Array(),
            label;
            
            switch (type){
                case 'text':
                    label = DOPBS_BOOKING_FORM_FIELDS_NEW_FIELD_TEXT_LABEL;
                    break;
                case 'textarea':
                    label = DOPBS_BOOKING_FORM_FIELDS_NEW_FIELD_TEXTAREA_LABEL;
                    break;
                case 'checkbox':
                    label = DOPBS_BOOKING_FORM_FIELDS_NEW_FIELD_CHECKBOX_LABEL;
                    break;
                case 'select':
                    label = DOPBS_BOOKING_FORM_FIELDS_NEW_FIELD_SELECT_LABEL;
                    break;
            }
        
            $jDOPBS("#DOPBS-admin-translation option").each(function(){
                nameTranslation[$jDOPBS(this).val()] = label;
                names.push('"'+$jDOPBS(this).val()+'": "'+nameTranslation[$jDOPBS(this).val()]+'"');
                namesSec.push('#'+$jDOPBS(this).val()+'#: #'+nameTranslation[$jDOPBS(this).val()]+'#');
            });
            names.join(',');
            names = '{'+names+'}';
            namesSec.join(',');
            namesSec = '{'+namesSec+'}';
            
            $jDOPBS('#DOPBS-form-fields #prov .booking-form-field-loader').css('display', 'block');
            
            $jDOPBS.post(ajaxurl, {action: 'dopbs_add_booking_form_field',
                                    form_id: $jDOPBS('#booking_form_id').val(),
                                    type: type,
                                    position: position,
                                    positions: positions,
                                    translation: names}, function(data){
                if (data){
                    fieldId = data.trim();
                    $jDOPBS('#DOPBS-form-fields #prov .booking-form-field-loader').css('display', 'none');
                    
                    switch (type){
                        case 'text':
                            $jDOPBS('#DOPBS-form-fields').find('li.text').attr('id', 'booking-form-field-'+fieldId);
                            $jDOPBS('#booking-form-field-'+fieldId).removeClass('text');
                            break;
                        case 'textarea':
                            $jDOPBS('#DOPBS-form-fields').find('li.textarea').attr('id','booking-form-field-'+fieldId);
                            $jDOPBS('#booking-form-field-'+fieldId).removeClass('textarea');
                            break;
                        case 'checkbox':
                            $jDOPBS('#DOPBS-form-fields').find('li.checkbox').attr('id','booking-form-field-'+fieldId);
                            $jDOPBS('#booking-form-field-'+fieldId).removeClass('checkbox');
                            break;
                        case 'select':
                            $jDOPBS('#DOPBS-form-fields').find('li.select').attr('id','booking-form-field-'+fieldId);
                            $jDOPBS('#booking-form-field-'+fieldId).removeClass('select');
                            break;
                    }
                    
                    $jDOPBS('#booking-form-field-'+fieldId+' .booking-form-field-name').html(label+' <span></span>');
                    $jDOPBS('#booking-form-field-'+fieldId+' .booking-form-field-show-settings-button').attr('href','javascript:dopbsExpandBookingFormField('+fieldId+')');
                    $jDOPBS('#booking-form-field-'+fieldId+' .booking-form-field-show-settings-button').removeAttr('style');
                    $jDOPBS('#booking-form-field-'+fieldId+' .booking-form-field-settings-wrapper').html(dopsbsGenerateBookingFormFieldSettings(fieldId, type, namesSec));
                    
                    switch (type){
                        case 'text':
                            $jDOPBS('#booking-form-field-'+fieldId+' .booking-form-field-name-wrapper').append('<input type="text" name="booking-form-field-demo-'+fieldId+'" id="booking-form-field-demo-'+fieldId+'" class="booking-form-field-demo-text" value="" disabled="disabled" />');
                            break;
                        case 'textarea':
                            $jDOPBS('#booking-form-field-'+fieldId+' .booking-form-field-name-wrapper').append('<textarea name="booking-form-field-demo-'+fieldId+'" id="booking-form-field-demo-'+fieldId+'" class="booking-form-field-demo-textarea" disabled="disabled"></textarea>');
                            break;
                        case 'checkbox':
                            $jDOPBS('#booking-form-field-'+fieldId+' .booking-form-field-name-wrapper').prepend('<input type="checkbox" name="booking-form-field-demo-'+fieldId+'" id="booking-form-field-demo-'+fieldId+'" class="booking-form-field-demo-checkbox" disabled="disabled" />');
                            break;
                        case 'select':
                            $jDOPBS('#booking-form-field-'+fieldId+' .booking-form-field-name-wrapper').append('<select name="booking-form-field-demo-'+fieldId+'" id="booking-form-field-demo-'+fieldId+'" class="booking-form-field-demo-select" disabled="disabled"></select>');
                            break;
                    }
                    
                    dopbsExpandBookingFormField(fieldId);
                }
            });
        },        
        stop: function() {
            copyHelper && copyHelper.remove();
        }
    });
    
    $jDOPBS("#DOPBS-form-fields").sortable({
        connectWith: '.remove-form-fields',
        receive: function(e,ui) {
            copyHelper= null;
        },
        update: function(e,ui){
            var fieldId = ui.item.context.id.split('booking-form-field-')[1],
            position = 0,
            positions = '',
            nrLi = $jDOPBS('#DOPBS-form-fields li').length,
            m = 0, j,
            idall = '',
            newId = '';
            
            for(j=1; j<=nrLi; j++){
                if ($jDOPBS('#DOPBS-form-fields li').eq(j-1).attr('id') == ui.item.context.id){
                   position = j;
                }
                else{
                    idall = $jDOPBS('#DOPBS-form-fields li').eq(j-1).attr('id');
                    newId = idall.split('booking-form-field-')[1];

                    if (m > 0){
                        positions = positions+','+newId+'-'+j;
                    }
                    else {
                       positions = positions+newId+'-'+j; 
                    }
                    m++;
                }
            }
            positions = '"'+positions+'"';

            $jDOPBS.post(ajaxurl, {action: 'dopbs_update_booking_form_field',
                                    fieldId: fieldId,
                                    position: position,
                                    positions: positions}, function(data){});
        }
    });

    $jDOPBS("#DOPBS-form-fields-delete").sortable({
        receive: function(e,ui){
            var fieldId = ui.item.context.id.split('booking-form-field-')[1];
            ui.item.remove();
            
            $jDOPBS.post(ajaxurl, {action: 'dopbs_delete_booking_form_field',
                                    fieldId: fieldId}, function(data){});
        }
    });
}

function dopsbsGenerateBookingFormFieldSettings(id, type, namesSec){
    var HTML = new Array(),
    label;

    switch (type){
        case 'text':
            label = DOPBS_BOOKING_FORM_FIELDS_NEW_FIELD_TEXT_LABEL;
            break;
        case 'textarea':
            label = DOPBS_BOOKING_FORM_FIELDS_NEW_FIELD_TEXTAREA_LABEL;
            break;
        case 'checkbox':
            label = DOPBS_BOOKING_FORM_FIELDS_NEW_FIELD_CHECKBOX_LABEL;
            break;
        case 'select':
            label = DOPBS_BOOKING_FORM_FIELDS_NEW_FIELD_SELECT_LABEL;
            break;
    }
    
    // Language
    HTML.push(' <div class="settings-box">');
    HTML.push('     <label for="DOPBS-admin-form-field-language-'+id+'">'+DOPBS_BOOKING_FORM_FIELDS_LANGUAGE_LABEL+'</label>');
    HTML.push(dopbsTranslationBookingFormField(id));
    HTML.push('     <a href="javascript:void()" class="help" title="'+DOPBS_BOOKING_FORM_FIELDS_LANGUAGE_INFO+'"></a>');
    HTML.push('     <br class="DOPBS-clear" />');
    HTML.push(' </div>');
    // Name
    HTML.push(' <div class="settings-box">');
    HTML.push('     <label for="booking-form-field-name-'+id+'">'+DOPBS_BOOKING_FORM_FIELDS_NAME_LABEL+' *</label>');
    HTML.push('     <input type="text" name="booking-form-field-name-'+id+'" id="booking-form-field-name-'+id+'" value="'+label+'" onkeyup="dopbsBookingFormFieldChange(\'translation\', '+id+', this.value, \''+$jDOPBS('#DOPBS-admin-translation').val()+'\', \'\')" onblur="dopbsBookingFormFieldChange(\'translation\', '+id+', this.value, \''+$jDOPBS('#DOPBS-admin-translation').val()+'\', \'\')" />');
    HTML.push('     <a href="javascript:void()" class="help" title="'+DOPBS_BOOKING_FORM_FIELDS_NAME_INFO+'"></a>');
    HTML.push('     <span class="loader" id="booking-form-loader-field-name-'+id+'"></span>');
    HTML.push('     <br class="DOPBS-clear" />');
    HTML.push('     <input type="hidden" name="booking-form-field-translation-'+id+'" id="booking-form-field-translation-'+id+'" value="'+namesSec+'" />');
    HTML.push(' </div>');

    if (type == 'select'){
        HTML.push(' <div class="settings-box">');
        HTML.push('     <label>'+DOPBS_BOOKING_FORM_FIELDS_SELECT_OPTIONS_LABEL+'</label>');
        HTML.push('     <div class="booking-form-field-select-options" id="booking-form-field-select-options-'+id+'">');
        HTML.push('         <a class="add" href="javascript:dopbsBookingFormFieldSelectAddOption('+id+')" title="'+DOPBS_BOOKING_FORM_FIELDS_SELECT_ADD_OPTION+'"></a>');
        HTML.push('         <a href="javascript:void()" class="help" title="'+DOPBS_BOOKING_FORM_FIELDS_SELECT_OPTIONS_INFO+'"></a>');
        HTML.push('         <span class="loader" id="booking-form-loader-field-select-'+id+'"></span>');
        HTML.push('         <br class="DOPBS-clear" /><br />');
        HTML.push('     </div>');
        HTML.push('    <br class="DOPBS-clear" />');
        HTML.push(' </div>');

        // Multiple Select    
        HTML.push(' <div class="settings-box">');
        HTML.push('     <label for="booking-form-field-multiple-select-'+id+'">'+DOPBS_BOOKING_FORM_FIELDS_SELECT_MULTIPLE_SELECT_LABEL+'</label>');
        HTML.push('     <input type="checkbox" name="booking-form-field-multiple-select-'+id+'" id="booking-form-field-multiple-select-'+id+'" onclick="dopbsBookingFormFieldChange(\'multiple_select\', \''+id+'\', \'false\', \'\')" />');
        HTML.push('     <a href="javascript:void()" class="help" title="'+DOPBS_BOOKING_FORM_FIELDS_SELECT_MULTIPLE_SELECT_INFO+'"></a>');
        HTML.push('     <span class="loader" id="booking-form-loader-field-multiple-select-'+id+'"></span>');
        HTML.push('     <br class="DOPBS-clear" />');
        HTML.push(' </div>');
    }

    if (type !='checkbox' && type !='select'){
        // Allowed Characters    
        HTML.push(' <div class="settings-box">');
        HTML.push('     <label for="booking-form-field-allowed-characters-'+id+'">'+DOPBS_BOOKING_FORM_FIELDS_ALLOWED_CHARACTERS_LABEL+'</label>');
        HTML.push('     <input type="text" name="booking-form-field-allowed-characters-'+id+'" id="booking-form-field-allowed-characters-'+id+'" value="" onkeyup="dopbsBookingFormFieldChange(\'allowed_characters\', \''+id+'\', this.value, \'\')" onblur="dopbsBookingFormFieldChange(\'allowed_characters\', \''+id+'\', this.value, \'\')" />');
        HTML.push('     <a href="javascript:void()" class="help" title="'+DOPBS_BOOKING_FORM_FIELDS_ALLOWED_CHARACTERS_INFO+'"></a>');
        HTML.push('     <span class="loader" id="booking-form-loader-field-allowed-characters-'+id+'"></span>');
        HTML.push('     <br class="DOPBS-clear" />');
        HTML.push(' </div>');
        //Size
        HTML.push(' <div class="settings-box">');
        HTML.push('     <label for="booking-form-field-size-'+id+'">'+DOPBS_BOOKING_FORM_FIELDS_SIZE_LABEL+'</label>');
        HTML.push('     <input type="text" name="booking-form-field-size-'+id+'" id="booking-form-field-size-'+id+'" value="" onkeyup="dopbsBookingFormFieldChange(\'size\', \''+id+'\', this.value, \'\')" onblur="dopbsBookingFormFieldChange(\'size\', \''+id+'\', this.value, \'\')" />');
        HTML.push('     <a href="javascript:void()" class="help" title="'+DOPBS_BOOKING_FORM_FIELDS_SIZE_INFO+'"></a>');
        HTML.push('     <span class="loader" id="booking-form-loader-field-size-'+id+'"></span>');
        HTML.push('     <br class="DOPBS-clear" />');
        HTML.push(' </div>');
    }

    if (type == 'text'){
        // Email
        HTML.push(' <div class="settings-box">');
        HTML.push('     <label for="booking-form-field-email-'+id+'">'+DOPBS_BOOKING_FORM_FIELDS_EMAIL_LABEL+'</label>');
        HTML.push('     <input type="checkbox" name="booking-form-field-email-'+id+'" id="booking-form-field-email-'+id+'" onclick="dopbsBookingFormFieldChange(\'is_email\', \''+id+'\', \'false\', \'\')" />');
        HTML.push('     <a href="javascript:void()" class="help" title="'+DOPBS_BOOKING_FORM_FIELDS_EMAIL_INFO+'"></a>');
        HTML.push('     <span class="loader" id="booking-form-loader-field-is-email-'+id+'"></span>');
        HTML.push('     <br class="DOPBS-clear" />');
        HTML.push(' </div>');
    }

    // Required
    HTML.push(' <div class="settings-box">');
    HTML.push('     <label for="booking-form-field-required-'+id+'">'+DOPBS_BOOKING_FORM_FIELDS_REQUIRED_LABEL+'</label>');
    HTML.push('     <input type="checkbox" name="booking-form-field-required-'+id+'" id="booking-form-field-required-'+id+'" onclick="dopbsBookingFormFieldChange(\'required\', \''+id+'\', \'false\', \'\')" />');
    HTML.push('     <a href="javascript:void()" class="help" title="'+DOPBS_BOOKING_FORM_FIELDS_REQUIRED_INFO+'"></a>');
    HTML.push('     <span class="loader" id="booking-form-loader-field-required-'+id+'"></span>');
    HTML.push('     <br class="DOPBS-clear" />');
    HTML.push(' </div>');
    
    return HTML.join('');
}

function dopbsBookingFormShowFields(){
    $jDOPBS.post(ajaxurl, {action:'dopbs_show_booking_form_fields',
                            booking_form_id:$jDOPBS('#booking_form_id').val(),
                            language: $jDOPBS("#DOPBS-admin-translation").val()}, function(data){
        $jDOPBS('#DOPBS-form-fields').append(data);
        dopbsToggleMessage('hide', DOPBS_BOOKING_FORM_LOADED);
    });
}

function dopbsBookingFormFieldChange(name, id, value, language){
    var alphaValue = value;
    
    if (name == 'translation'){
        var fieldTranslation = $jDOPBS('#booking-form-field-translation-'+id).val(),
        newFieldTranslation = new Array()
        ;
        $jDOPBS('#booking-form-field-'+id+' .booking-form-field-name').html(value+' <span></span>');
        
        fieldTranslation = dopbsReplaceAll('#', '"', fieldTranslation);
        fieldTranslation = JSON.parse(fieldTranslation);

        $jDOPBS.each(fieldTranslation, function(key){
            if (key == language){
                fieldTranslation[key] = value;
            }
            newFieldTranslation.push('#'+key+'#: #'+fieldTranslation[key]+'#');
        });
        newFieldTranslation.join(',');
        newFieldTranslation = '{'+newFieldTranslation+'}';
        $jDOPBS('#booking-form-field-translation-'+id).val(newFieldTranslation);
        
        alphaValue = dopbsReplaceAll('#', '"', newFieldTranslation);;
    }
    
    if (name == 'multiple_select' && $jDOPBS('#booking-form-field-multiple-select-'+id).is(':checked')){
        alphaValue = 'true';
    }
    
    if (name == 'is_email' && $jDOPBS('#booking-form-field-email-'+id).is(':checked')){
        alphaValue = 'true';    
    }
    
    if (name == 'required' && $jDOPBS('#booking-form-field-required-'+id).is(':checked')){
        alphaValue = 'true';    
    }
    
    switch (name){
        case 'translation':
            $jDOPBS('#booking-form-loader-field-name-'+id).css('display', 'block');
            break;
        case 'multiple_select':
            $jDOPBS('#booking-form-loader-field-multiple-select-'+id).css('display', 'block');
            
            if ($jDOPBS('#booking-form-field-multiple-select-'+id).is(':checked')){
                $jDOPBS('#booking-form-field-demo-'+id).attr('multiple', 'multiple');
            }
            else{
                $jDOPBS('#booking-form-field-demo-'+id).removeAttr('multiple');
            }
            break;
        case 'allowed_characters':
            $jDOPBS('#booking-form-loader-field-allowed-characters-'+id).css('display', 'block');
            break;
        case 'size':
            $jDOPBS('#booking-form-loader-field-size-'+id).css('display', 'block');
            break;
        case 'is_email':
            $jDOPBS('#booking-form-loader-field-is-email-'+id).css('display', 'block');
            break;
        case 'required':
            $jDOPBS('#booking-form-loader-field-required-'+id).css('display', 'block');
            break;
    }
    
    $jDOPBS.post(ajaxurl, {action:'dopbs_edit_booking_form_field',
                            id: id,
                            name: name,
                            value: alphaValue}, function(data){
        switch (name){
            case 'translation':
                $jDOPBS('#booking-form-loader-field-name-'+id).css('display', 'none');
                break;
            case 'multiple_select':
                $jDOPBS('#booking-form-loader-field-multiple-select-'+id).css('display', 'none');
                break;
            case 'allowed_characters':
                $jDOPBS('#booking-form-loader-field-allowed-characters-'+id).css('display', 'none');
                break;
            case 'size':
                $jDOPBS('#booking-form-loader-field-size-'+id).css('display', 'none');
                break;
            case 'is_email':
                $jDOPBS('#booking-form-loader-field-is-email-'+id).css('display', 'none');
                break;
            case 'required':
                $jDOPBS('#booking-form-loader-field-required-'+id).css('display', 'none');
                break;
        }
    });
}

function dopbsExpandBookingFormField(id){
    if ($jDOPBS('#booking-form-field-'+id+' .booking-form-field-show-settings-button').html() == DOPBS_BOOKING_FORM_FIELDS_SHOW_SETTINGS){
        $jDOPBS('#booking-form-field-'+id+' .booking-form-field-show-settings-button').html(DOPBS_BOOKING_FORM_FIELDS_HIDE_SETTINGS);
        $jDOPBS('#booking-form-field-'+id).addClass('selected');
    }
    else{
        $jDOPBS('#booking-form-field-'+id+' .booking-form-field-show-settings-button').html(DOPBS_BOOKING_FORM_FIELDS_SHOW_SETTINGS);
        $jDOPBS('#booking-form-field-'+id).removeClass('selected');
    }
    
    $jDOPBS('#booking-form-field-'+id+' .booking-form-field-settings-wrapper').toggle('fast');
}

function dopbsChangeTranslationBookingFormField(fieldId, language){
    var fieldTranslation = $jDOPBS('#booking-form-field-translation-'+fieldId).val();
    
    fieldTranslation = dopbsReplaceAll('#', '"', fieldTranslation);
    fieldTranslation = JSON.parse(fieldTranslation);
    
    $jDOPBS('#booking-form-field-name-'+fieldId).attr('onkeyup', "dopbsBookingFormFieldChange('translation', "+fieldId+", this.value, '"+language+"')");
    $jDOPBS('#booking-form-field-name-'+fieldId).attr('onblur', "dopbsBookingFormFieldChange('translation', "+fieldId+", this.value, '"+language+"')");
    $jDOPBS('#booking-form-field-'+fieldId+' .booking-form-field-name').html(fieldTranslation[language]+' <span></span>');
    $jDOPBS('#booking-form-field-name-'+fieldId).val(fieldTranslation[language]);
    
    $jDOPBS('#booking-form-field-select-options-'+fieldId+' .form_options_name_cls').each(function(){
        if ($jDOPBS(this).attr('id') != undefined){
            var optionId = $jDOPBS(this).attr('id').split('booking-form-field-select-option-id-')[1];
            
            $jDOPBS('#booking-form-field-select-option-language-'+optionId).val(language);
            fieldTranslation = $jDOPBS('#booking-form-field-select-option-translation-'+optionId).val();

            fieldTranslation = dopbsReplaceAll('#', '"', fieldTranslation);
            fieldTranslation = JSON.parse(fieldTranslation);

            $jDOPBS('#booking-form-field-select-option-id-'+optionId).val(fieldTranslation[language]);
            $jDOPBS('#booking-form-field-option-demo-'+optionId).html(fieldTranslation[language]);
        }
    });
}

function dopbsTranslationBookingFormField(id){
    var HTML = new Array(), i,
    languageValues = ['af',
                      'al',
                      'ar',
                      'az',
                      'bs',
                      'by',
                      'bg',
                      'ca',
                      'cn',
                      'cr',
                      'cz',
                      'dk',
                      'du',
                      'en',
                      'eo',
                      'et',
                      'fl',
                      'fl',
                      'fi',
                      'fr',
                      'gl',
                      'de',
                      'gr',
                      'ha',
                      'he',
                      'hi',
                      'hu',
                      'is',
                      'id',
                      'ir',
                      'it',
                      'ja',
                      'ko',
                      'lv',
                      'lt',
                      'mk',
                      'mg',
                      'ma',
                      'no',
                      'pe',
                      'pl',
                      'pt',
                      'ro',
                      'ru',
                      'sr',
                      'sk',
                      'sl',
                      'sp',
                      'sw',
                      'se',
                      'th',
                      'tr',
                      'uk',
                      'ur',
                      'vi',
                      'we',
                      'yi'],
    languageNames = ['Afrikaans (Afrikaans)',
                     'Albanian (Shqiptar)',
                     'Arabic (>العربية)',
                     'Azerbaijani (Azərbaycan)',
                     'Basque (Euskal)',
                     'Belarusian (Беларускай)',
                     'Bulgarian (Български)',
                     'Catalan (Català)',
                     'Chinese (中国的)',
                     'Croatian (Hrvatski)',
                     'Czech (Český)',
                     'Danish (Dansk)',
                     'Dutch (Nederlands)',
                     'English',
                     'Esperanto (Esperanto)',
                     'Estonian (Eesti)',
                     'Filipino (na Filipino)',
                     'Filipino (na Filipino)',
                     'Finnish (Suomi)',
                     'French (Français)',
                     'Galician (Galego)',
                     'German (Deutsch)',
                     'Greek (Ɛλληνικά)',
                     'Haitian Creole (Kreyòl Ayisyen)',
                     'Hebrew (עברית)',
                     'Hindi (हिंदी)',
                     'Hungarian (Magyar)',
                     'Icelandic (Íslenska)',
                     'Indonesian (Indonesia)',
                     'Irish (Gaeilge)',
                     'Italian (Italiano)',
                     'Japanese (日本の)',
                     'Korean (한국의)',
                     'Latvian (Latvijas)',
                     'Lithuanian (Lietuvos)',
                     'Macedonian (македонски)',
                     'Malay (Melayu)',
                     'Maltese (Maltija)',
                     'Norwegian (Norske)',
                     'Persian (فارسی)',
                     'Polish (Polski)',
                     'Portuguese (Português)',
                     'Romanian (Română)',
                     'Russian (Pусский)',
                     'Serbian (Cрпски)',
                     'Slovak (Slovenských)',
                     'Slovenian (Slovenski)',
                     'Spanish (Español)',
                     'Swahili (Kiswahili)',
                     'Swedish (Svenskt)',
                     'Thai (ภาษาไทย)',
                     'Turkish (Türk)',
                     'Ukrainian (Український)',
                     'Urdu (اردو)',
                     'Vietnamese (Việt)',
                     'Welsh (Cymraeg)',
                     'Yiddish (ייִדיש)'];
    
    HTML.push('<select id="DOPBS-admin-form-field-language-'+id+'" onchange="dopbsChangeTranslationBookingFormField('+id+',this.value)">');
    
    for (i=0; i<languageValues.length; i++){
        HTML.push(' <option value="'+languageValues[i]+'" '+($jDOPBS("#DOPBS-admin-translation").val() == languageValues[i] ? 'selected="selected"':'')+'>'+languageNames[i]+'</option>');
    }
    
    HTML.push('</select>');
    return HTML.join('');
}

function dopbsBookingFormFieldSelectAddOption(fieldId){
    var HTML = new Array(),
    namesSec = new Array(),
    names = new Array();

    $jDOPBS("#DOPBS-admin-translation option").each(function(){
        names.push('"'+$jDOPBS(this).val()+'": "'+DOPBS_BOOKING_FORM_FIELDS_SELECT_NEW_OPTION_LABEL+'"');
        namesSec.push('#'+$jDOPBS(this).val()+'#: #'+DOPBS_BOOKING_FORM_FIELDS_SELECT_NEW_OPTION_LABEL+'#');
    });
    
    names.join(',');
    names = '{'+names+'}';
    namesSec.join(',');
    namesSec = '{'+namesSec+'}';

    $jDOPBS('#booking-form-loader-field-select-'+fieldId).css('display', 'block');
        
    $jDOPBS.post(ajaxurl, {action: 'dopbs_add_booking_form_field_select_option',
                            field_id: fieldId,
                            translation: names}, function(data){
        $jDOPBS('#booking-form-loader-field-select-'+fieldId).css('display', 'none');
        
        if (data){
            HTML.push('<div class="option-box" id="booking-form-field-select-option-'+data+'">');
            HTML.push(' <input type="text" class="form_name form_options_name_cls" id="booking-form-field-select-option-id-'+data+'" value="'+DOPBS_BOOKING_FORM_FIELDS_SELECT_NEW_OPTION_LABEL+'" onkeyup="dopbsBookingFormFieldOptionChange('+data+', this.value)" onblur="dopbsBookingFormFieldOptionChange('+data+', this.value)" />');
            HTML.push(' <a href="javascript:dopbsBookingFormFieldSelectDeleteOption('+data+')" title="'+DOPBS_BOOKING_FORM_FIELDS_SELECT_DELETE_OPTION+'" class="remove" id="booking-form-field-select-option-remove-'+data+'"></a>');
            HTML.push(' <span class="loader" id="booking-form-loader-field-select-option-'+data+'"></span>');
            HTML.push(' <input type="hidden" class="dopbs-booking-form-options-translations" id="booking-form-field-select-option-translation-'+data+'" name="option" value="'+namesSec+'"/>');
            HTML.push(' <input type="hidden" class="dopbs-booking-form-options-curent-language" id="booking-form-field-select-option-language-'+data+'" name="language" value="'+$jDOPBS("#DOPBS-admin-form-field-language-"+fieldId).val()+'"/>');
            HTML.push(' <br class="DOPBS-clear">');
            HTML.push('</div>');

            $jDOPBS('#booking-form-field-select-options-'+fieldId).append(HTML.join(''));
            $jDOPBS('#booking-form-field-demo-'+fieldId).append('<option id="booking-form-field-option-demo-'+data+'" value="'+data+'">'+DOPBS_BOOKING_FORM_FIELDS_SELECT_NEW_OPTION_LABEL+'</option>')
        }   
    });
}

function dopbsBookingFormFieldOptionChange(id, value){
    var fieldTranslation = $jDOPBS('#booking-form-field-select-option-translation-'+id).val(),
    fieldLanguage = $jDOPBS('#booking-form-field-select-option-language-'+id).val(),
    fieldNewTranslation = new Array();

    fieldTranslation = dopbsReplaceAll('#', '"', fieldTranslation);
    fieldTranslation = JSON.parse(fieldTranslation);

    $jDOPBS.each(fieldTranslation, function(key){
        if (key == fieldLanguage){
            fieldTranslation[key] = value;
        }
        fieldNewTranslation.push('#'+key+'#: #'+fieldTranslation[key]+'#');
    });
    fieldNewTranslation.join(',');
    fieldNewTranslation = '{'+fieldNewTranslation+'}';

    $jDOPBS('#booking-form-field-select-option-translation-'+id).val(fieldNewTranslation); 
    $jDOPBS('#booking-form-loader-field-select-option-'+id).css('display', 'block');

    $jDOPBS.post(ajaxurl, {action:'dopbs_edit_booking_form_field_select_option',
                            id: id,
                            translation: fieldNewTranslation}, function(data){
        $jDOPBS('#booking-form-loader-field-select-option-'+id).css('display', 'none');
        $jDOPBS('#booking-form-field-option-demo-'+id).html(value);
    });
}

function dopbsBookingFormFieldSelectDeleteOption(id){
    $jDOPBS('#booking-form-loader-field-select-option-'+id).css('display', 'block');
    
    $jDOPBS.post(ajaxurl, {action: 'dopbs_delete_booking_form_field_select_option',
                            id: id}, function(data){
        $jDOPBS('#booking-form-loader-field-select-option-'+id).css('display', 'none');
    
        if (data){
            $jDOPBS('#booking-form-field-option-demo-'+id).remove(); 
            $jDOPBS('#booking-form-field-select-option-'+data).remove(); 
            $jDOPBS('#booking-form-field-select-option-label-id-'+data).remove();
            $jDOPBS('#booking-form-field-select-option-id-'+data).remove();
            $jDOPBS('#booking-form-field-select-option-translation-'+data).remove();
            $jDOPBS('#booking-form-field-select-option-remove-'+data).remove(); 
            
            if (data == '0'){
                $jDOPBS('.column-content', '.column1', '.DOPBS-admin').html('<ul><li class="no-data">'+DOPBS_NO_FORMS+'</li></ul>');
            }
        }
    });
}