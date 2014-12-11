/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 1.2
* File                    : dopbs-backend.js
* File Version            : 1.0
* Created / Last Modified : 29 July 2013
* Author                  : Dot on Paper
* Copyright               : © 2013 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System Admin Scripts.
*/

//Declare global variables.
var currCalendar = 0,
currBookingForm = 0,
clearClick = true,
calendarLoaded = false,
messageTimeout,
$jDOPBS = jQuery.noConflict();

$jDOPBS(document).ready(function(){
    dopbsResize();
    switch (DOPBS_curr_page){
        case 'Calendars List':
            dopbsShowCalendars();
            break;
        case 'Forms List':
            dopbsShowBookingForms();
            break;
    }
    
});

function dopbsResize(){// ResiE admin panel.
    if (DOPBS_curr_page == 'Calendars List'){
        if (!calendarLoaded){
            $jDOPBS('.column2', '.DOPBS-admin').width(($jDOPBS('.DOPBS-admin').width()-$jDOPBS('.column1', '.DOPBS-admin').width()-2)/2);
            $jDOPBS('.column3', '.DOPBS-admin').width(($jDOPBS('.DOPBS-admin').width()-$jDOPBS('.column1', '.DOPBS-admin').width()-2)/2);
        }
        else{
            $jDOPBS('.column2', '.DOPBS-admin').width(620);
            $jDOPBS('.column3', '.DOPBS-admin').width($jDOPBS('.DOPBS-admin').width()-$jDOPBS('.column1', '.DOPBS-admin').width()-$jDOPBS('.column2', '.DOPBS-admin').width()-2);
        }
    }
    else{
        $jDOPBS('.column2', '.DOPBS-admin').width($jDOPBS('.DOPBS-admin').width()-$jDOPBS('.column1', '.DOPBS-admin').width()-2);
        $jDOPBS('.column3', '.DOPBS-admin').width(0);
    }
    
    $jDOPBS('.column-separator', '.DOPBS-admin').height(0);
    $jDOPBS('.column-separator', '.DOPBS-admin').height($jDOPBS('.DOPBS-admin').height()-$jDOPBS('h2', '.DOPBS-admin').height()-parseInt($jDOPBS('h2', '.DOPBS-admin').css('padding-top'))-parseInt($jDOPBS('h2', '.DOPBS-admin').css('padding-bottom')));
    $jDOPBS('.main', '.DOPBS-admin').css('display', 'block');
    
    setTimeout(function(){
        dopbsResize();
    }, 100);
}

function dopbsResizeOneTime(){// ResiE admin panel.
    if (!calendarLoaded){
        $jDOPBS('.column2', '.DOPBS-admin').width(($jDOPBS('.DOPBS-admin').width()-$jDOPBS('.column1', '.DOPBS-admin').width()-2)/2);
        $jDOPBS('.column3', '.DOPBS-admin').width(($jDOPBS('.DOPBS-admin').width()-$jDOPBS('.column1', '.DOPBS-admin').width()-2)/2);
    }
    else{
        $jDOPBS('.column2', '.DOPBS-admin').width(620);
        $jDOPBS('.column3', '.DOPBS-admin').width($jDOPBS('.DOPBS-admin').width()-$jDOPBS('.column1', '.DOPBS-admin').width()-$jDOPBS('.column2', '.DOPBS-admin').width()-2);
    }
    
    $jDOPBS('.column-separator', '.DOPBS-admin').height(0);
    $jDOPBS('.column-separator', '.DOPBS-admin').height($jDOPBS('.DOPBS-admin').height()-$jDOPBS('h2', '.DOPBS-admin').height()-parseInt($jDOPBS('h2', '.DOPBS-admin').css('padding-top'))-parseInt($jDOPBS('h2', '.DOPBS-admin').css('padding-bottom')));
    $jDOPBS('.main', '.DOPBS-admin').css('display', 'block');
}

//****************************************************************************** Translation

function dopbsChangeTranslation(){
    if (clearClick){
        dopbsToggleMessage('show', DOPBS_SAVE);
        clearClick = false;
        $jDOPBS.post(ajaxurl, {action: 'dopbs_change_translation',
                                language: $jDOPBS('#DOPBS-admin-translation').val()}, function(data){
            window.location.reload();
        });
    }
}

//****************************************************************************** Calendars

function dopbsShowCalendars(){// Show all calendars.
    if (clearClick){
        dopbsRemoveColumns(1);
        dopbsToggleMessage('show', DOPBS_LOAD);
        clearClick = false;
        
        $jDOPBS.post(ajaxurl, {action: 'dopbs_show_calendars'}, function(data){
            $jDOPBS('.column-content', '.column1', '.DOPBS-admin').html(data);
            dopbsCalendarsEvents();
            dopbsToggleMessage('hide', DOPBS_CALENDARS_LOADED);
            clearClick = true;
            
            dopbsShowCalendar(1);
        });
    }
}

function dopbsCalendarsEvents(){// Init Calendar Events.
    $jDOPBS('li', '.column1', '.DOPBS-admin').click(function(){
        if (clearClick){
            var id = $jDOPBS(this).attr('id').split('-')[2];
            
            if (currCalendar != id){
                currCalendar = id;
                $jDOPBS('li', '.column1', '.DOPBS-admin').removeClass('item-selected');
                $jDOPBS(this).addClass('item-selected');
                dopbsShowCalendar(id);
            }
        }
    });
}

function dopbsShowCalendar(calendar_id){// Show Images List.
    if (clearClick){
        $jDOPBS('#calendar_id').val(calendar_id);
        dopbsRemoveColumns(2);
        calendarLoaded = true;            
        dopbsToggleMessage('show', DOPBS_LOAD);
        
        $jDOPBS.post(ajaxurl, {action:'dopbs_show_calendar', calendar_id:calendar_id}, function(data){
            var HeaderHTML = new Array();
            
            HeaderHTML.push('<div class="edit-button">');
            HeaderHTML.push('    <a href="javascript:dopbsShowCalendarSettings()" title="'+DOPBS_EDIT_CALENDAR_SUBMIT+'"></a>');
            HeaderHTML.push('</div>');
            HeaderHTML.push('<div class="reservations-button">');
            HeaderHTML.push('    <a href="javascript:void(0)" id="DOPBS-reservations" title="'+DOPBS_SHOW_RESERVATIONS+'"><span></span></a>');
            HeaderHTML.push('</div>');
            HeaderHTML.push('<a href="javascript:void()" class="header-help" title="'+DOPBS_CALENDAR_EDIT_HELP+'"></a>');
            
            $jDOPBS('.column-header', '.column2', '.DOPBS-admin').html(HeaderHTML.join(''));
            $jDOPBS('.column-content', '.column2', '.DOPBS-admin').html('<div id="DOPBS-Calendar"></div>');
            
            $jDOPBS('#DOPBS-Calendar').DOPBookingSystem($jDOPBS.parseJSON(data));
                        
            $jDOPBS.post(ajaxurl, {action:'dopbs_show_no_reservations', calendar_id:calendar_id}, function(data){
                if (parseInt(data) != 0){
                    $jDOPBS('#DOPBS-reservations').addClass('new');
                    $jDOPBS('#DOPBS-reservations span').html(data);
                }
            });            
        });
    }
}

//****************************************************************************** Settings

function dopbsShowCalendarSettings(){// Show calendar settings.
    if (clearClick){
        $jDOPBS('li', '.column2', '.DOPBS-admin').removeClass('item-image-selected');
        dopbsRemoveColumns(2);
        dopbsToggleMessage('show', DOPBS_LOAD);
        
        $jDOPBS.post(ajaxurl, {action:'dopbs_show_calendar_settings', calendar_id:$jDOPBS('#calendar_id').val()}, function(data){
            var HeaderHTML = new Array(),
            json = $jDOPBS.parseJSON(data);
            
            HeaderHTML.push('<input type="button" name="DOPBS_calendar_submit" class="submit-style" onclick="dopbsEditCalendar()" title="'+DOPBS_EDIT_CALENDAR_SUBMIT+'" value="'+DOPBS_SUBMIT+'" />');
            HeaderHTML.push('<input type="button" name="DOPBS_calendar_back" class="submit-style" onclick="dopbsShowCalendar('+$jDOPBS('#calendar_id').val()+')" title="'+DOPBS_BACK_SUBMIT+'" value="'+DOPBS_BACK+'" />');
            HeaderHTML.push('<a href="javascript:void()" class="header-help" title="'+DOPBS_CALENDAR_EDIT_SETTINGS_HELP+'"></a>');
            
            $jDOPBS('.column-header', '.column2', '.DOPBS-admin').html(HeaderHTML.join(''));
            dopbsSettingsForm(json, 2);
            
            dopbsToggleMessage('hide', DOPBS_CALENDAR_LOADED);
        });
    }
}

function dopbsEditCalendar(){// Edit Calendar Settings.
    if (clearClick){
        dopbsToggleMessage('show', DOPBS_SAVE);
        
        var availableDays = '', i,
        hoursDefinitions = new Array(),
        hours = new Array(),
        discountsNoDays = new Array();
            
        for (i=0; i<7; i++){    
            if ($jDOPBS('#available_days'+i).is(':checked')){
                if (i == 0){
                    availableDays += 'true';
                }
                else{
                    availableDays += ',true';                    
                }                
            } 
            else{
                if (i == 0){
                    availableDays += 'false';
                }
                else{
                    availableDays += ',false';                    
                }
            }
        }
        
        if ($jDOPBS('#hours_definitions').val() != ''){
            hoursDefinitions = $jDOPBS('#hours_definitions').val().split('\n');

            for (i=0; i<hoursDefinitions.length; i++){
                hoursDefinitions[i] = hoursDefinitions[i].replace(/\s/g, "");
                                    
                if (hoursDefinitions[i] != ''){
                    hours.push({'value': hoursDefinitions[i]});
                }
            }
        }
        else{
            hours.push({'value': '00:00'});
        }
        
        $jDOPBS('#discounts_no_days option').each(function(){
            discountsNoDays.push($jDOPBS(this).attr('value'));
        });
        
        $jDOPBS.post(ajaxurl, {action:'dopbs_edit_calendar',
                                calendar_id: $jDOPBS('#calendar_id').val(),
                                name: $jDOPBS('#name').val(),
                                available_days: availableDays,
                                first_day: $jDOPBS('#first_day').val(),
                                currency: $jDOPBS('#currency').val(),
                                date_type: $jDOPBS('#date_type').val(),
                                template: $jDOPBS('#template').val(),
                                min_stay: $jDOPBS('#min_stay').val(),
                                max_stay: $jDOPBS('#max_stay').val(),
                                no_items_enabled: $jDOPBS('#no_items_enabled').val(),
                                view_only: $jDOPBS('#view_only').val(),
                                page_url: $jDOPBS('#page_url').val(),
                                template_email: $jDOPBS('#template_email').val(),
                                notifications_email: $jDOPBS('#notifications_email').val(),
                                smtp_enabled: $jDOPBS('#smtp_enabled').val(),
                                smtp_host_name: $jDOPBS('#smtp_host_name').val(),
                                smtp_host_port: $jDOPBS('#smtp_host_port').val(),
                                smtp_ssl: $jDOPBS('#smtp_ssl').val(),
                                smtp_user: $jDOPBS('#smtp_user').val(),
                                smtp_password: $jDOPBS('#smtp_password').val(),
                                multiple_days_select: $jDOPBS('#multiple_days_select').val(),
                                morning_check_out: $jDOPBS('#morning_check_out').val(),
                                hours_enabled: $jDOPBS('#hours_enabled').val(),
                                hours_definitions: hours,
                                multiple_hours_select: $jDOPBS('#multiple_hours_select').val(),
                                hours_ampm: $jDOPBS('#hours_ampm').val(),
                                last_hour_to_total_price: $jDOPBS('#last_hour_to_total_price').val(),
                                hours_interval_enabled: $jDOPBS('#hours_interval_enabled').val(),
                                discounts_no_days: discountsNoDays.join(','),
                                deposit: $jDOPBS('#deposit').val(),
                                form: $jDOPBS('#form').val(),
                                instant_booking: $jDOPBS('#instant_booking').val(),
                                no_people_enabled: $jDOPBS('#no_people_enabled').val(),
                                min_no_people: $jDOPBS('#min_no_people').val(),
                                max_no_people: $jDOPBS('#max_no_people').val(),
                                no_children_enabled: $jDOPBS('#no_children_enabled').val(),
                                min_no_children: $jDOPBS('#min_no_children').val(),
                                max_no_children: $jDOPBS('#max_no_children').val(),
                                terms_and_conditions_enabled: $jDOPBS('#terms_and_conditions_enabled').val(),
                                terms_and_conditions_link: $jDOPBS('#terms_and_conditions_link').val(),
                                payment_arrival_enabled: $jDOPBS('#payment_arrival_enabled').val(),
                                payment_paypal_enabled: $jDOPBS('#payment_paypal_enabled').val(),
                                payment_paypal_username: $jDOPBS('#payment_paypal_username').val(),
                                payment_paypal_password: $jDOPBS('#payment_paypal_password').val(),
                                payment_paypal_signature: $jDOPBS('#payment_paypal_signature').val(),
                                payment_paypal_credit_card: $jDOPBS('#payment_paypal_credit_card').val(),
                                payment_paypal_sandbox_enabled: $jDOPBS('#payment_paypal_sandbox_enabled').val()}, function(data){
            if ($jDOPBS('#calendar_id').val() != '0'){
                $jDOPBS('.name', '#DOPBS-ID-'+$jDOPBS('#calendar_id').val()).html($jDOPBS('#name').val());
                dopbsToggleMessage('hide', DOPBS_EDIT_CALENDAR_SUCCESS);
            }
            else{
                dopbsToggleMessage('hide', DOPBS_EDIT_CALENDARS_SUCCESS);
            }
        });
    }
}

function dopbsRemoveColumns(no){// Clear columns content.
    if (no <= 1){
        $jDOPBS('.column-content', '.column1', '.DOPBS-admin').html('');
    }
    if (no <= 2){
        $jDOPBS('.column-header', '.column2', '.DOPBS-admin').html('');
        $jDOPBS('.column-content', '.column2', '.DOPBS-admin').html('');
        calendarLoaded = false;
    }
    if (no <= 3){
        $jDOPBS('.column-header', '.column3', '.DOPBS-admin').html('');
        $jDOPBS('.column-content', '.column3', '.DOPBS-admin').html('');        
    }
}

function dopbsToggleMessage(action, message){// Display Info Messages.
    if (action == 'show'){
        clearClick = false;        
        clearTimeout(messageTimeout);
        $jDOPBS('#DOPBS-admin-message').addClass('loader');
        $jDOPBS('#DOPBS-admin-message').html(message);
        $jDOPBS('#DOPBS-admin-message').stop(true, true).animate({'opacity':1}, 600);
    }
    else{
        clearClick = true;
        $jDOPBS('#DOPBS-admin-message').removeClass('loader');
        $jDOPBS('#DOPBS-admin-message').html(message);
        
        messageTimeout = setTimeout(function(){
            $jDOPBS('#DOPBS-admin-message').stop(true, true).animate({'opacity':0}, 600, function(){
                $jDOPBS('#DOPBS-admin-message').html('');
            });
        }, 2000);
    }
}

function dopbsSettingsForm(data, column){// Settings Form.
    var HTML = new Array(), i,
    discountsNoDays = data['discounts_no_days'].split(','),
    discountsNoDaysValues = new Array(), 
    discountsNoDaysLabels = new Array(),
    formsItems = data['forms'].split(';;;'),
    formsValues = new Array(),
    formsLabels = new Array();
    
    for (i=0; i<formsItems.length; i++){
        formsValues.push(formsItems[i].split(';;')[0]);
        formsLabels.push(formsItems[i].split(';;')[1]);
    }
    
    HTML.push('<form method="post" class="settings" action="" onsubmit="return false;">');

// General Settings
    HTML.push('    <h3 class="settings">'+DOPBS_GENERAL_STYLES_SETTINGS+'</h3>');
    
    if ($jDOPBS('#calendar_id').val() != '0'){
        HTML.push(dopbsSettingsFormInput('name', data['name'], DOPBS_CALENDAR_NAME, '', '', '', 'help', DOPBS_CALENDAR_NAME_INFO));
    }
    HTML.push(dopbsSettingsFormAvailableDays('available_days', data['available_days'], DOPBS_AVAILABLE_DAYS, '', '', '', 'help', DOPBS_AVAILABLE_DAYS_INFO));
    HTML.push(dopbsSettingsFormSelect('first_day', data['first_day'], DOPBS_FIRST_DAY, '', '', '', 'help', DOPBS_FIRST_DAY_INFO, '1;;2;;3;;4;;5;;6;;7', DOPBS_day_names[1]+';;'+DOPBS_day_names[2]+';;'+DOPBS_day_names[3]+';;'+DOPBS_day_names[4]+';;'+DOPBS_day_names[5]+';;'+DOPBS_day_names[6]+';;'+DOPBS_day_names[0]));
    HTML.push(dopbsSettingsFormSelect('currency', data['currency'], DOPBS_CURRENCY, '', '', '', 'help', DOPBS_CURRENCY_INFO, data['currencies_ids'], data['currencies_labels']));
    HTML.push(dopbsSettingsFormSelect('date_type', data['date_type'], DOPBS_DATE_TYPE, '', '', '', 'help', DOPBS_DATE_TYPE_INFO, '1;;2', DOPBS_DATE_TYPE_AMERICAN+';;'+DOPBS_DATE_TYPE_EUROPEAN));
    HTML.push(dopbsSettingsFormSelect('template', data['template'], DOPBS_TEMPLATE, '', '', '', 'help', DOPBS_TEMPLATE_INFO, data['templates'], data['templates']));
    HTML.push(dopbsSettingsFormInput('min_stay', data['min_stay'], DOPBS_MIN_STAY, '', '', '', 'help', DOPBS_MIN_STAY_INFO));  
    HTML.push(dopbsSettingsFormInput('max_stay', data['max_stay'], DOPBS_MAX_STAY, '', '', '', 'help', DOPBS_MAX_STAY_INFO));  
    HTML.push(dopbsSettingsFormSelect('no_items_enabled', data['no_items_enabled'], DOPBS_NO_ITEMS_ENABLED, '', '', '', 'help', DOPBS_NO_ITEMS_ENABLED_INFO, 'true;;false', DOPBS_ENABLED+';;'+DOPBS_DISABLED));
    HTML.push(dopbsSettingsFormSelect('view_only', data['view_only'], DOPBS_VIEW_ONLY, '', '', '', 'help', DOPBS_VIEW_ONLY_INFO, 'true;;false', DOPBS_ENABLED+';;'+DOPBS_DISABLED));
    HTML.push(dopbsSettingsFormInput('page_url', data['page_url'], DOPBS_PAGE_URL, '', '', '', 'help', DOPBS_PAGE_URL_INFO));  
    
// Notifications Settings
    HTML.push('    <a href="javascript:dopbsMoveTop()" class="go-top">'+DOPBS_GO_TOP+'</a><h3 class="settings">'+DOPBS_NOTIFICATIONS_STYLES_SETTINGS+'</h3>'); 
    HTML.push(dopbsSettingsFormSelect('template_email', data['template_email'], DOPBS_NOTIFICATIONS_TEMPLATE, '', '', '', 'help', DOPBS_NOTIFICATIONS_TEMPLATE_INFO, data['templates_email'], data['templates_email']));
    HTML.push(dopbsSettingsFormInput('notifications_email', data['notifications_email'], DOPBS_NOTIFICATIONS_EMAIL, '', '', '', 'help', DOPBS_NOTIFICATIONS_EMAIL_INFO));  
    HTML.push(dopbsSettingsFormSelect('smtp_enabled', data['smtp_enabled'], DOPBS_NOTIFICATIONS_SMTP_ENABLED, '', '', '', 'help', DOPBS_NOTIFICATIONS_SMTP_ENABLED_INFO, 'true;;false', DOPBS_ENABLED+';;'+DOPBS_DISABLED));     
    HTML.push(dopbsSettingsFormInput('smtp_host_name', data['smtp_host_name'], DOPBS_NOTIFICATIONS_SMTP_HOST_NAME, '', '', '', 'help', DOPBS_NOTIFICATIONS_SMTP_HOST_NAME_INFO));  
    HTML.push(dopbsSettingsFormInput('smtp_host_port', data['smtp_host_port'], DOPBS_NOTIFICATIONS_SMTP_HOST_PORT, '', '', '', 'help', DOPBS_NOTIFICATIONS_SMTP_HOST_PORT_INFO));  
    HTML.push(dopbsSettingsFormSelect('smtp_ssl', data['smtp_ssl'], DOPBS_NOTIFICATIONS_SMTP_SSL, '', '', '', 'help', DOPBS_NOTIFICATIONS_SMTP_SSL_INFO, 'true;;false', DOPBS_ENABLED+';;'+DOPBS_DISABLED));                           
    HTML.push(dopbsSettingsFormInput('smtp_user', data['smtp_user'], DOPBS_NOTIFICATIONS_SMTP_USER, '', '', '', 'help', DOPBS_NOTIFICATIONS_SMTP_USER_INFO));  
    HTML.push(dopbsSettingsFormInput('smtp_password', data['smtp_password'], DOPBS_NOTIFICATIONS_SMTP_PASSWORD, '', '', '', 'help', DOPBS_NOTIFICATIONS_SMTP_PASSWORD_INFO));  
    
// Days/Hours Settings
    HTML.push('    <a href="javascript:dopbsMoveTop()" class="go-top">'+DOPBS_GO_TOP+'</a><h3 class="settings">'+DOPBS_HOURS_STYLES_SETTINGS+'</h3>'); 
    HTML.push(dopbsSettingsFormSelect('multiple_days_select', data['multiple_days_select'], DOPBS_MULTIPLE_DAYS_SELECT, '', '', '', 'help', DOPBS_MULTIPLE_DAYS_SELECT_INFO, 'true;;false', DOPBS_ENABLED+';;'+DOPBS_DISABLED));  
    HTML.push(dopbsSettingsFormSelect('morning_check_out', data['morning_check_out'], DOPBS_MORNING_CHECK_OUT, '', '', '', 'help', DOPBS_MORNING_CHECK_OUT_INFO, 'true;;false', DOPBS_ENABLED+';;'+DOPBS_DISABLED)); 
    HTML.push(dopbsSettingsFormSelect('hours_enabled', data['hours_enabled'], DOPBS_HOURS_ENABLED, '', '', '', 'help', DOPBS_HOURS_ENABLED_INFO, 'true;;false', DOPBS_ENABLED+';;'+DOPBS_DISABLED));  
    HTML.push(dopbsSettingsFormHoursDefinitions('hours_definitions', data['hours_definitions'], DOPBS_HOURS_DEFINITIONS, '', '', '', 'help', DOPBS_HOURS_DEFINITIONS_INFO));
    HTML.push(dopbsSettingsFormSelect('multiple_hours_select', data['multiple_hours_select'], DOPBS_MULTIPLE_HOURS_SELECT, '', '', '', 'help', DOPBS_MULTIPLE_HOURS_SELECT_INFO, 'true;;false', DOPBS_ENABLED+';;'+DOPBS_DISABLED));
    HTML.push(dopbsSettingsFormSelect('hours_ampm', data['hours_ampm'], DOPBS_HOURS_AMPM, '', '', '', 'help', DOPBS_HOURS_AMPM_INFO, 'true;;false', DOPBS_ENABLED+';;'+DOPBS_DISABLED));
    HTML.push(dopbsSettingsFormSelect('last_hour_to_total_price', data['last_hour_to_total_price'], DOPBS_LAST_HOUR_TO_TOTAL_PRICE, '', '', '', 'help', DOPBS_LAST_HOUR_TO_TOTAL_PRICE_INFO, 'true;;false', DOPBS_ENABLED+';;'+DOPBS_DISABLED));
    HTML.push(dopbsSettingsFormSelect('hours_interval_enabled', data['hours_interval_enabled'], DOPBS_HOURS_INTERVAL_ENABLED, '', '', '', 'help', DOPBS_HOURS_INTERVAL_ENABLED_INFO, 'true;;false', DOPBS_ENABLED+';;'+DOPBS_DISABLED));

// Discounts by Number of Days
    HTML.push('    <a href="javascript:dopbsMoveTop()" class="go-top">'+DOPBS_GO_TOP+'</a><h3 class="settings">'+DOPBS_DISCOUNTS_NO_DAYS_SETTINGS+'</h3>');
    
    for (i=2; i<=31; i++){
        discountsNoDaysValues.push(discountsNoDays[i-2]);
        discountsNoDaysLabels.push(i+' '+DOPBS_DISCOUNTS_NO_DAYS_DAYS+' ('+(discountsNoDays[i-2] != 0 ? '-':'')+discountsNoDays[i-2]+'%)');
    }
    
    HTML.push(dopbsSettingsFormSelect('discounts_no_days', '-1', DOPBS_DISCOUNTS_NO_DAYS, '', '', '', 'help', DOPBS_DISCOUNTS_NO_DAYS_INFO, discountsNoDaysValues.join(';;'), discountsNoDaysLabels.join(';;')));
    HTML.push(dopbsSettingsFormInput('discount_no_days', discountsNoDays[0], '2 '+DOPBS_DISCOUNTS_NO_DAYS_DAYS, '-', '%', 'small', 'help-small', DOPBS_DISCOUNTS_NO_DAYS_DAYS_INFO));

// Deposit
    HTML.push('    <a href="javascript:dopbsMoveTop()" class="go-top">'+DOPBS_GO_TOP+'</a><h3 class="settings">'+DOPBS_DEPOSIT_SETTINGS+'</h3>');
    HTML.push(dopbsSettingsFormInput('deposit', data['deposit'], DOPBS_DEPOSIT, '', '%', 'small', 'help-small', DOPBS_DEPOSIT_INFO));

// Contact Form Settings
    HTML.push('    <a href="javascript:dopbsMoveTop()" class="go-top">'+DOPBS_GO_TOP+'</a><h3 class="settings">'+DOPBS_FORM_STYLES_SETTINGS+'</h3>');
    HTML.push(dopbsSettingsFormSelect('form', data['form'], DOPBS_FORM, '', '', '', 'help', DOPBS_FORM_INFO, formsValues.join(';;'), formsLabels.join(';;')));
    HTML.push(dopbsSettingsFormSelect('instant_booking', data['instant_booking'], DOPBS_INSTANT_BOOKING_ENABLED, '', '', '', 'help', DOPBS_INSTANT_BOOKING_ENABLED_INFO, 'true;;false', DOPBS_ENABLED+';;'+DOPBS_DISABLED));   
    HTML.push(dopbsSettingsFormSelect('no_people_enabled', data['no_people_enabled'], DOPBS_NO_PEOPLE_ENABLED, '', '', '', 'help', DOPBS_NO_PEOPLE_ENABLED_INFO, 'true;;false', DOPBS_ENABLED+';;'+DOPBS_DISABLED));   
    HTML.push(dopbsSettingsFormInput('min_no_people', data['min_no_people'], DOPBS_MIN_NO_PEOPLE, '', '', 'small', 'help-small', DOPBS_MIN_NO_PEOPLE_INFO));
    HTML.push(dopbsSettingsFormInput('max_no_people', data['max_no_people'], DOPBS_MAX_NO_PEOPLE, '', '', 'small', 'help-small', DOPBS_MAX_NO_PEOPLE_INFO));
    HTML.push(dopbsSettingsFormSelect('no_children_enabled', data['no_children_enabled'], DOPBS_NO_CHILDREN_ENABLED, '', '', '', 'help', DOPBS_NO_CHILDREN_ENABLED_INFO, 'true;;false', DOPBS_ENABLED+';;'+DOPBS_DISABLED));   
    HTML.push(dopbsSettingsFormInput('min_no_children', data['min_no_children'], DOPBS_MIN_NO_CHILDREN, '', '', 'small', 'help-small', DOPBS_MIN_NO_CHILDREN_INFO));
    HTML.push(dopbsSettingsFormInput('max_no_children', data['max_no_children'], DOPBS_MAX_NO_CHILDREN, '', '', 'small', 'help-small', DOPBS_MAX_NO_CHILDREN_INFO));
    HTML.push(dopbsSettingsFormSelect('payment_arrival_enabled', data['payment_arrival_enabled'], DOPBS_PAYMENT_ARRIVAL_ENABLED, '', '', '', 'help', DOPBS_PAYMENT_ARRIVAL_ENABLED_INFO, 'true;;false', DOPBS_ENABLED+';;'+DOPBS_DISABLED));
    HTML.push(dopbsSettingsFormSelect('terms_and_conditions_enabled', data['terms_and_conditions_enabled'], DOPBS_TERMS_AND_CONDITIONS_ENABLED, '', '', '', 'help', DOPBS_TERMS_AND_CONDITIONS_ENABLED_INFO, 'true;;false', DOPBS_ENABLED+';;'+DOPBS_DISABLED));
    HTML.push(dopbsSettingsFormInput('terms_and_conditions_link', data['terms_and_conditions_link'], DOPBS_TERMS_AND_CONDITIONS_LINK, '', '', '', 'help', DOPBS_TERMS_AND_CONDITIONS_LINK_INFO));

// PayPal Settings
    HTML.push('    <a href="javascript:dopbsMoveTop()" class="go-top">'+DOPBS_GO_TOP+'</a><h3 class="settings">'+DOPBS_PAYMENT_PAYPAL_STYLES_SETTINGS+'</h3>');  
    HTML.push(dopbsSettingsFormSelect('payment_paypal_enabled', data['payment_paypal_enabled'], DOPBS_PAYMENT_PAYPAL_ENABLED, '', '', '', 'help', DOPBS_PAYMENT_PAYPAL_ENABLED_INFO, 'true;;false', DOPBS_ENABLED+';;'+DOPBS_DISABLED));
    HTML.push(dopbsSettingsFormInput('payment_paypal_username', data['payment_paypal_username'], DOPBS_PAYMENT_PAYPAL_USERNAME, '', '', '', 'help', DOPBS_PAYMENT_PAYPAL_USERNAME_INFO));
    HTML.push(dopbsSettingsFormInput('payment_paypal_password', data['payment_paypal_password'], DOPBS_PAYMENT_PAYPAL_PASSWORD, '', '', '', 'help', DOPBS_PAYMENT_PAYPAL_PASSWORD_INFO));
    HTML.push(dopbsSettingsFormInput('payment_paypal_signature', data['payment_paypal_signature'], DOPBS_PAYMENT_PAYPAL_SIGNATURE, '', '', '', 'help', DOPBS_PAYMENT_PAYPAL_SIGNATURE_INFO));
    HTML.push(dopbsSettingsFormSelect('payment_paypal_credit_card', data['payment_paypal_credit_card'], DOPBS_PAYMENT_PAYPAL_CREDIT_CARD, '', '', '', 'help', DOPBS_PAYMENT_PAYPAL_CREDIT_CARD_INFO, 'true;;false', DOPBS_ENABLED+';;'+DOPBS_DISABLED));
    HTML.push(dopbsSettingsFormSelect('payment_paypal_sandbox_enabled', data['payment_paypal_sandbox_enabled'], DOPBS_PAYMENT_PAYPAL_SANDBOX_ENABLED, '', '', '', 'help', DOPBS_PAYMENT_PAYPAL_SANDBOX_ENABLED_INFO, 'true;;false', DOPBS_ENABLED+';;'+DOPBS_DISABLED));

    HTML.push('</form>');
    $jDOPBS('.column-content', '.column'+column, '.DOPBS-admin').html(HTML.join(''));
    
    $jDOPBS('#discounts_no_days').unbind('change');
    $jDOPBS('#discounts_no_days').bind('change', function(){
        $jDOPBS('#discount_no_days').val($jDOPBS('#discounts_no_days').val());
        $jDOPBS('label', $jDOPBS('#discount_no_days').parent()).html(($jDOPBS(this).prop('selectedIndex')+2)+' '+DOPBS_DISCOUNTS_NO_DAYS_DAYS);
    });
    
    $jDOPBS('#discount_no_days').unbind('keyup');
    $jDOPBS('#discount_no_days').bind('keyup', function(){
        dopbsCleanInput(this, '0123456789.', '0', '');
        $jDOPBS('#discounts_no_days').find(":selected").val($jDOPBS(this).val());
        $jDOPBS('#discounts_no_days').find(":selected").text(($jDOPBS('#discounts_no_days').prop('selectedIndex')+2)+' '+DOPBS_DISCOUNTS_NO_DAYS_DAYS+' ('+($jDOPBS(this).val() != '0' ? '-':'')+$jDOPBS(this).val()+'%)');
    });
    
    $jDOPBS('#deposit').unbind('keyup');
    $jDOPBS('#deposit').bind('keyup', function(){
        dopbsCleanInput(this, '0123456789.', '0', '');
    });
}

function dopbsSettingsFormInput(id, value, label, pre, suf, input_class, help_class, help){// Create an Input Field.
    var inputHTML = new Array();

    inputHTML.push('    <div class="setting-box">');
    inputHTML.push('        <label for="'+id+'">'+label+'</label>');
    inputHTML.push('        <span class="pre">'+pre+'</span><input type="text" class="'+input_class+'" name="'+id+'" id="'+id+'" value="'+value+'" /><span class="suf">'+suf+'</span>');
    inputHTML.push('        <a href="javascript:void()" class="'+help_class+'" title="'+help+'"></a>');
    inputHTML.push('        <br class="DOPBS-clear" />');
    inputHTML.push('    </div>');

    return inputHTML.join('');
}

function dopbsSettingsFormAvailableDays(id, value, label, pre, suf, textarea_class, help_class, help){// Create an Input Field.
    var inputHTML = new Array(),
    content = value.split(',');
    
    inputHTML.push('    <div class="setting-box">');
    inputHTML.push('        <label>'+label+'</label>');
    inputHTML.push('        <span class="pre">'+pre+'</span>');
    inputHTML.push('        <span class="days">');
    inputHTML.push('            <input type="checkbox" name="'+id+'0" id="'+id+'0"'+(content[0] == 'true' ? ' checked="checked"':'')+' /><label for="'+id+'0">'+DOPBS_day_names[0]+'</label><br class="DOPBS-clear" />');
    inputHTML.push('            <input type="checkbox" name="'+id+'1" id="'+id+'1"'+(content[1] == 'true' ? ' checked="checked"':'')+' /><label for="'+id+'1">'+DOPBS_day_names[1]+'</label><br class="DOPBS-clear" />');
    inputHTML.push('            <input type="checkbox" name="'+id+'2" id="'+id+'2"'+(content[2] == 'true' ? ' checked="checked"':'')+' /><label for="'+id+'2">'+DOPBS_day_names[2]+'</label><br class="DOPBS-clear" />');
    inputHTML.push('            <input type="checkbox" name="'+id+'3" id="'+id+'3"'+(content[3] == 'true' ? ' checked="checked"':'')+' /><label for="'+id+'3">'+DOPBS_day_names[3]+'</label><br class="DOPBS-clear" />');
    inputHTML.push('            <input type="checkbox" name="'+id+'4" id="'+id+'4"'+(content[4] == 'true' ? ' checked="checked"':'')+' /><label for="'+id+'4">'+DOPBS_day_names[4]+'</label><br class="DOPBS-clear" />');
    inputHTML.push('            <input type="checkbox" name="'+id+'5" id="'+id+'5"'+(content[5] == 'true' ? ' checked="checked"':'')+' /><label for="'+id+'5">'+DOPBS_day_names[5]+'</label><br class="DOPBS-clear" />');
    inputHTML.push('            <input type="checkbox" name="'+id+'6" id="'+id+'6"'+(content[6] == 'true' ? ' checked="checked"':'')+' /><label for="'+id+'6">'+DOPBS_day_names[6]+'</label><br class="DOPBS-clear" />');    
    inputHTML.push('        </span>');        
    inputHTML.push('        <span class="suf">'+suf+'</span>');
    inputHTML.push('        <a href="javascript:void()" class="'+help_class+'" title="'+help+'"></a>');
    inputHTML.push('        <br class="DOPBS-clear" />');
    inputHTML.push('    </div>');

    return inputHTML.join('');
}

function dopbsSettingsFormHoursDefinitions(id, value, label, pre, suf, textarea_class, help_class, help){// Create an Input Field.
    var inputHTML = new Array(),
    content = new Array(), i;
    
    for (i=0; i<value.length; i++){
        content.push(value[i]['value']);
    }

    inputHTML.push('    <div class="setting-box">');
    inputHTML.push('        <label for="'+id+'">'+label+'</label>');
    inputHTML.push('        <span class="pre">'+pre+'</span><textarea type="text" class="'+textarea_class+'" name="'+id+'" id="'+id+'" cols="" rows="8">'+content.join('\n')+'</textarea><span class="suf">'+suf+'</span>');
    inputHTML.push('        <a href="javascript:void()" class="'+help_class+'" title="'+help+'"></a>');
    inputHTML.push('        <br class="DOPBS-clear" />');
    inputHTML.push('    </div>');

    return inputHTML.join('');
}

function dopbsSettingsFormSelect(id, value, label, pre, suf, input_class, help_class, help, values, valueLabels){// Create a Combo Box.
    var selectHTML = new Array(), i,
    valuesList = values.split(';;'),
    valueLabelsList = valueLabels.split(';;'),
    hide = false;
    
    if (id == 'template'){
        hide = true;
    }
    
    if (id == 'template_email'){
        hide = true;
    }

    selectHTML.push('    <div class="setting-box" '+(hide ? 'style="display: none;"':'')+'>');
    selectHTML.push('        <label for="'+id+'">'+label+'</label>');
    selectHTML.push('        <span class="pre">'+pre+'</span>');
    selectHTML.push('            <select name="'+id+'" id="'+id+'">');
    
    for (i=0; i<valuesList.length; i++){
        if (valuesList[i] == value){
            selectHTML.push('        <option value="'+valuesList[i]+'" selected="selected">'+valueLabelsList[i]+'</option>');
        }
        else{
            selectHTML.push('        <option value="'+valuesList[i]+'">'+valueLabelsList[i]+'</option>');
        }
    }
    selectHTML.push('            </select>');
    selectHTML.push('        <span class="suf">'+suf+'</span>');
    selectHTML.push('        <a href="javascript:void()" class="'+help_class+'" title="'+help+'"></a>');
    selectHTML.push('        <br class="DOPBS-clear" />');
    selectHTML.push('    </div>');

    return selectHTML.join('');
}

// ***************************************************************************** Administrator Settings

//****************************************************************************** Prototypes
                        
function dopbsMoveTop(){
    jQuery('html').stop(true, true).animate({'scrollTop':'0'}, 300);
    jQuery('body').stop(true, true).animate({'scrollTop':'0'}, 300);
}

function dopbsShowHideUsers(){
    $jDOPBS('#dopbs-administrators-show-hide').unbind('click');
    $jDOPBS('#dopbs-administrators-show-hide').bind('click', function(){
        $jDOPBS('#dopbs-administrators-list').toggle('fast', function(){
            if ($jDOPBS(this).css('display') == 'block'){
                $jDOPBS('#dopbs-administrators-show-hide').html(DOPBS_USERS_HIDE);
            }
            else{
                $jDOPBS('#dopbs-administrators-show-hide').html(DOPBS_USERS_SHOW);
            }
        });
    });

    $jDOPBS('#dopbs-authors-show-hide').unbind('click');
    $jDOPBS('#dopbs-authors-show-hide').bind('click', function(){
        $jDOPBS('#dopbs-authors-list').toggle('fast', function(){
            if ($jDOPBS(this).css('display') == 'block'){
                $jDOPBS('#dopbs-authors-show-hide').html(DOPBS_USERS_HIDE);
            }
            else{
                $jDOPBS('#dopbs-authors-show-hide').html(DOPBS_USERS_SHOW);
            }
        });
    });

    $jDOPBS('#dopbs-contributors-show-hide').unbind('click');
    $jDOPBS('#dopbs-contributors-show-hide').bind('click', function(){
        $jDOPBS('#dopbs-contributors-list').toggle('fast', function(){
            if ($jDOPBS(this).css('display') == 'block'){
                $jDOPBS('#dopbs-contributors-show-hide').html(DOPBS_USERS_HIDE);
            }
            else{
                $jDOPBS('#dopbs-contributors-show-hide').html(DOPBS_USERS_SHOW);
            }
        });
    });

    $jDOPBS('#dopbs-editors-show-hide').unbind('click');
    $jDOPBS('#dopbs-editors-show-hide').bind('click', function(){
        $jDOPBS('#dopbs-editors-list').toggle('fast', function(){
            if ($jDOPBS(this).css('display') == 'block'){
                $jDOPBS('#dopbs-editors-show-hide').html(DOPBS_USERS_HIDE);
            }
            else{
                $jDOPBS('#dopbs-editors-show-hide').html(DOPBS_USERS_SHOW);
            }
        });
    });

    $jDOPBS('#dopbs-subscribers-show-hide').unbind('click');
    $jDOPBS('#dopbs-subscribers-show-hide').bind('click', function(){
        $jDOPBS('#dopbs-subscribers-list').toggle('fast', function(){
            if ($jDOPBS(this).css('display') == 'block'){
                $jDOPBS('#dopbs-subscribers-show-hide').html(DOPBS_USERS_HIDE);
            }
            else{
                $jDOPBS('#dopbs-subscribers-show-hide').html(DOPBS_USERS_SHOW);
            }
        });
    });
}

function dopbsCleanInput(input, allowedCharacters, firstNotAllowed, min){
    var characters = $jDOPBS(input).val().split(''),
    returnStr = '', i, startIndex = 0;

    if (characters.length > 1 && characters[0] == firstNotAllowed){
        startIndex = 1;
    }

    for (i=startIndex; i<characters.length; i++){
        if (allowedCharacters.indexOf(characters[i]) != -1){
            returnStr += characters[i];
        }
    }

    if (min > returnStr){
        returnStr = min;
    }

    $jDOPBS(input).val(returnStr);
}

function dopbsReplaceAll(find, replace, str){
    return str.replace(new RegExp(find, 'g'), replace);
}