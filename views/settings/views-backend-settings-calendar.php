<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : views/settings/views-backend-settings-calendar.php
* File Version            : 1.1.5
* Created / Last Modified : 03 February 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end calendar settings views class.
*/

    if (!class_exists('DOPBSPViewsBackEndSettingsCalendar')){
        class DOPBSPViewsBackEndSettingsCalendar extends DOPBSPViewsBackEndSettings{
            /*
             * Constructor
             */
            function DOPBSPViewsBackEndSettingsCalendar(){
            }
            
            /*
             * Returns calendar settings template.
             * 
             * @param args (array): function arguments
             *                      * id (integer): calendar ID
             * 
             * @return calendar settings HTML
             */
            function template($args = array()){
                global $wpdb;
                global $DOPBSP;
                
                
                $settings_calendar = $DOPBSP->classes->backend_settings->values(1,'calendar');
                
                $calendar = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->calendars.' WHERE id=%d',
                                                          1));
?>
                <div class="dopbsp-inputs-wrapper">
                    <div class="dopbsp-input-wrapper">
                         <label for="DOPBSP-settings-name"><?php echo $DOPBSP->text('SETTINGS_CALENDAR_NAME'); ?></label>
                         <input type="text" name="DOPBSP-settings-name" id="DOPBSP-settings-name" value="<?php echo $calendar->name; ?>" onkeyup="if ((event.keyCode||event.which) !== 9){DOPBSPCalendar.edit('text', 'name', this.value);}" onpaste="DOPBSPCalendar.edit('text', 'name', this.value)" onblur="DOPBSPCalendar.edit('text', 'name', this.value, true)" />
                         <a href="<?php echo DOPBSP_CONFIG_HELP_DOCUMENTATION_URL; ?>" target="_blank" class="dopbsp-button dopbsp-help"><span class="dopbsp-info dopbsp-help"><?php echo $DOPBSP->text('SETTINGS_CALENDAR_NAME_HELP'); ?><br /><br /><?php echo $DOPBSP->text('HELP_VIEW_DOCUMENTATION'); ?></span></a>
                    </div>
                </div>
<?php
                
                $this->templateGeneral($settings_calendar);
                $this->templateCurrency($settings_calendar);
                $this->templateDays($settings_calendar);
                $this->templateHours($settings_calendar);
                $this->templateSidebar($settings_calendar);
                $this->templateRules($settings_calendar);
                $this->templateExtras($settings_calendar);
//                $this->templateCart(,
//                                    $settings_calendar);
                $this->templateDiscounts($settings_calendar);
                $this->templateFees($settings_calendar);
                $this->templateCoupons($settings_calendar);
                $this->templateDeposit($settings_calendar);
                $this->templateForms($settings_calendar);
                $this->templateOrder($settings_calendar);
            }
            
            /*
             * Returns calendar general settings template.
             * 
             * @param settings_calendar (object): calendar settings data
             * 
             * @return general settings HTML
             */
            function templateGeneral($settings_calendar){
                global $DOPBSP;
?>
                <div class="dopbsp-inputs-header dopbsp-hide">
                    <h3><?php echo $DOPBSP->text('SETTINGS_CALENDAR_GENERAL_SETTINGS'); ?></h3>
                    <a href="javascript:DOPBSP.toggleInputs('calendar-general-settings')" id="DOPBSP-inputs-button-calendar-general-settings" class="dopbsp-button"></a>
                </div>
                <div id="DOPBSP-inputs-calendar-general-settings" class="dopbsp-inputs-wrapper">
<?php   
                /*
                 * Select date type.
                 */
                $this->displaySelectInput(array('id' => 'date_type',
                                                'label' => $DOPBSP->text('SETTINGS_CALENDAR_GENERAL_DATE_TYPE'),
                                                'value' => $settings_calendar->date_type,
                                                'settings_type' => 'calendar',
                                                'help' => $DOPBSP->text('SETTINGS_CALENDAR_GENERAL_DATE_TYPE_HELP'),
                                                'options' => $DOPBSP->text('SETTINGS_CALENDAR_GENERAL_DATE_TYPE_AMERICAN').';;'.$DOPBSP->text('SETTINGS_CALENDAR_GENERAL_DATE_TYPE_EUROPEAN'),
                                                'options_values' => '1;;2'));
                /*
                 * Select calendar template.
                 */
                $this->displaySelectInput(array('id' => 'template',
                                                'label' => $DOPBSP->text('SETTINGS_CALENDAR_GENERAL_TEMPLATE'),
                                                'value' => $settings_calendar->template,
                                                'settings_type' => 'calendar',
                                                'help' => $DOPBSP->text('SETTINGS_CALENDAR_GENERAL_TEMPLATE_HELP'),
                                                'options' => $this->listTemplates(),
                                                'options_values' => $this->listTemplates()));
                /*
                 * Stop booking x minutes in advance.
                 */
                $this->displayTextInput(array('id' => 'booking_stop',
                                              'label' => $DOPBSP->text('SETTINGS_CALENDAR_GENERAL_BOOKING_STOP'),
                                              'value' => $settings_calendar->booking_stop,
                                              'settings_type' => 'calendar',
                                              'help' => $DOPBSP->text('SETTINGS_CALENDAR_GENERAL_BOOKING_STOP_HELP'),
                                              'container_class' => '',
                                              'input_class' => 'dopbsp-small'));
                /*
                 * Number of months displayed.
                 */
                $this->displayTextInput(array('id' => 'months_no',
                                              'label' => $DOPBSP->text('SETTINGS_CALENDAR_GENERAL_MONTHS_NO'),
                                              'value' => $settings_calendar->months_no,
                                              'settings_type' => 'calendar',
                                              'help' => $DOPBSP->text('SETTINGS_CALENDAR_GENERAL_MONTHS_NO_HELP'),
                                              'container_class' => '',
                                              'input_class' => 'dopbsp-small'));
                /*
                 * Enable view only.
                 */
                $this->displaySwitchInput(array('id' => 'view_only',
                                                'label' => $DOPBSP->text('SETTINGS_CALENDAR_GENERAL_VIEW_ONLY'),
                                                'value' => $settings_calendar->view_only,
                                                'settings_type' => 'calendar',
                                                'help' => $DOPBSP->text('SETTINGS_CALENDAR_GENERAL_VIEW_ONLY_HELP'),
                                                'container_class' => 'dopbsp-last'));
?>
                </div>
<?php                
            }
            
            /*
             * Returns calendar currency settings template.
             * 
             * @param settings_calendar (object): calendar settings data
             * 
             * @return currency settings HTML
             */
            function templateCurrency($settings_calendar){
                global $DOPBSP;
?>
                <div class="dopbsp-inputs-header dopbsp-hide">
                    <h3><?php echo $DOPBSP->text('SETTINGS_CALENDAR_CURRENCY_SETTINGS'); ?></h3>
                    <a href="javascript:DOPBSP.toggleInputs('calendar-currency-settings')" id="DOPBSP-inputs-button-calendar-currency-settings" class="dopbsp-button"></a>
                </div>
                <div id="DOPBSP-inputs-calendar-currency-settings" class="dopbsp-inputs-wrapper">
<?php
                /*
                 * Select currency.
                 */
                $this->displaySelectInput(array('id' => 'currency',
                                                'label' => $DOPBSP->text('SETTINGS_CALENDAR_CURRENCY'),
                                                'value' => $settings_calendar->currency,
                                                'settings_type' => 'calendar',
                                                'help' => $DOPBSP->text('SETTINGS_CALENDAR_CURRENCY_HELP'),
                                                'options' => $this->listCurrencies('labels'),
                                                'options_values' => $this->listCurrencies('ids')));
                /*
                 * Select currency position.
                 */
                $this->displaySelectInput(array('id' => 'currency_position',
                                                'label' => $DOPBSP->text('SETTINGS_CALENDAR_CURRENCY_POSITION'),
                                                'value' => $settings_calendar->currency_position,
                                                'settings_type' => 'calendar',
                                                'help' => $DOPBSP->text('SETTINGS_CALENDAR_CURRENCY_POSITION_HELP'),
                                                'options' => $DOPBSP->text('SETTINGS_CALENDAR_CURRENCY_POSITION_BEFORE').';;'.$DOPBSP->text('SETTINGS_CALENDAR_CURRENCY_POSITION_BEFORE_WITH_SPACE').';;'.$DOPBSP->text('SETTINGS_CALENDAR_CURRENCY_POSITION_AFTER').';;'.$DOPBSP->text('SETTINGS_CALENDAR_CURRENCY_POSITION_AFTER_WITH_SPACE'),
                                                'options_values' => 'before;;before_with_space;;after;;after_with_space',
                                                'container_class' => 'dopbsp-last'));
?>
                </div>
<?php
            }
            
            /*
             * Returns calendar days settings template.
             * 
             * @param settings_calendar (object): calendar settings data
             * 
             * @return days settings HTML
             */
            function templateDays($settings_calendar){
                global $DOPBSP;
?>
                <div class="dopbsp-inputs-header dopbsp-hide">
                    <h3><?php echo $DOPBSP->text('SETTINGS_CALENDAR_DAYS_SETTINGS'); ?></h3>
                    <a href="javascript:DOPBSP.toggleInputs('calendar-days-settings')" id="DOPBSP-inputs-button-calendar-days-settings" class="dopbsp-button"></a>
                </div>
                <div id="DOPBSP-inputs-calendar-days-settings" class="dopbsp-inputs-wrapper">
<?php           
                /*
                 * Set available days.
                 */
                    $days_available = explode(',', $settings_calendar->days_available);
?>
                    <div class="dopbsp-input-wrapper">
                        <label class="dopbsp-for-checkboxes" for="DOPBSP-settings-days_available"><?php echo $DOPBSP->text('SETTINGS_CALENDAR_DAYS_AVAILABLE'); ?></label>
                        <div class="dopbsp-checkboxes-wrapper">
                            <input type="checkbox" name="DOPBSP-settings-days-available-0" id="DOPBSP-settings-days-available-0"<?php echo $days_available[0] == 'true' ? ' checked="checked"':'' ?> onclick="DOPBSPSettings.set('calendar', 'checkbox', 'days_available')" />
                            <label class="dopbsp-for-checkbox" for="DOPBSP-settings-days-available-0"><?php echo $DOPBSP->text('DAY_SUNDAY'); ?></label>
                            <br class="dopbsp-clear" />
                            <input type="checkbox" name="DOPBSP-settings-days-available-1" id="DOPBSP-settings-days-available-1"<?php echo $days_available[1] == 'true' ? ' checked="checked"':'' ?> onclick="DOPBSPSettings.set('calendar', 'checkbox', 'days_available')" />
                            <label class="dopbsp-for-checkbox" for="DOPBSP-settings-days-available-1"><?php echo $DOPBSP->text('DAY_MONDAY'); ?></label>
                            <br class="dopbsp-clear" />
                            <input type="checkbox" name="DOPBSP-settings-days-available-2" id="DOPBSP-settings-days-available-2"<?php echo $days_available[2] == 'true' ? ' checked="checked"':'' ?> onclick="DOPBSPSettings.set('calendar', 'checkbox', 'days_available')" />
                            <label class="dopbsp-for-checkbox" for="DOPBSP-settings-day-available-2"><?php echo $DOPBSP->text('DAY_TUESDAY'); ?></label>
                            <br class="dopbsp-clear" />
                            <input type="checkbox" name="DOPBSP-settings-days-available-3" id="DOPBSP-settings-days-available-3"<?php echo $days_available[3] == 'true' ? ' checked="checked"':'' ?> onclick="DOPBSPSettings.set('calendar', 'checkbox', 'days_available')" />
                            <label class="dopbsp-for-checkbox" for="DOPBSP-settings-days-available-3"><?php echo $DOPBSP->text('DAY_WEDNESDAY'); ?></label>
                            <br class="dopbsp-clear" />
                            <input type="checkbox" name="DOPBSP-settings-days-available-4" id="DOPBSP-settings-days-available-4"<?php echo $days_available[4] == 'true' ? ' checked="checked"':'' ?> onclick="DOPBSPSettings.set('calendar', 'checkbox', 'days_available')"  />
                            <label class="dopbsp-for-checkbox" for="DOPBSP-settings-days-available-4"><?php echo $DOPBSP->text('DAY_THURSDAY'); ?></label>
                            <br class="dopbsp-clear" />
                            <input type="checkbox" name="DOPBSP-settings-days-available-5" id="DOPBSP-settings-days-available-5"<?php echo $days_available[5] == 'true' ? ' checked="checked"':'' ?> onclick="DOPBSPSettings.set('calendar', 'checkbox', 'days_available')" />
                            <label class="dopbsp-for-checkbox" for="DOPBSP-settings-days-available-5"><?php echo $DOPBSP->text('DAY_FRIDAY'); ?></label>
                            <br class="dopbsp-clear" />
                            <input type="checkbox" name="DOPBSP-settings-days-available-6" id="DOPBSP-settings-days-available-6"<?php echo $days_available[6] == 'true' ? ' checked="checked"':'' ?> onclick="DOPBSPSettings.set('calendar', 'checkbox', 'days_available')" />
                            <label class="dopbsp-for-checkbox" for="DOPBSP-settings-days-available-6"><?php echo $DOPBSP->text('DAY_SATURDAY'); ?></label>
                        </div>
                        <a href="<?php echo DOPBSP_CONFIG_HELP_DOCUMENTATION_URL; ?>" target="_blank" class="dopbsp-button dopbsp-help"><span class="dopbsp-info dopbsp-help"><?php echo $DOPBSP->text('SETTINGS_CALENDAR_DAYS_AVAILABLE_HELP'); ?><br /><br /><?php echo $DOPBSP->text('HELP_VIEW_DOCUMENTATION'); ?></span></a>
                    </div>
<?php                        
                /*
                 * Select calendar first week day.
                 */
                $this->displaySelectInput(array('id' => 'days_first',
                                                'label' => $DOPBSP->text('SETTINGS_CALENDAR_DAYS_FIRST'),
                                                'value' => $settings_calendar->days_first,
                                                'settings_type' => 'calendar',
                                                'help' => $DOPBSP->text('SETTINGS_CALENDAR_DAYS_FIRST_HELP'),
                                                'options' => $DOPBSP->text('DAY_MONDAY').';;'.$DOPBSP->text('DAY_TUESDAY').';;'.$DOPBSP->text('DAY_WEDNESDAY').';;'.$DOPBSP->text('DAY_THURSDAY').';;'.$DOPBSP->text('DAY_FRIDAY').';;'.$DOPBSP->text('DAY_SATURDAY').';;'.$DOPBSP->text('DAY_SUNDAY'),
                                                'options_values' => '1;;2;;3;;4;;5;;6;;7'));
                /*
                 * First day displayed.
                 */
                $this->displayTextInput(array('id' => 'days_first_displayed',
                                              'label' => $DOPBSP->text('SETTINGS_CALENDAR_DAYS_FIRST_DISPLAYED'),
                                              'value' => $settings_calendar->days_first_displayed,
                                              'settings_type' => 'calendar',
                                              'help' => $DOPBSP->text('SETTINGS_CALENDAR_DAYS_FIRST_DISPLAYED_HELP'),
                                              'container_class' => '',
                                              'input_class' => 'dopbsp-date'));
                /*
                 * Enable multiple days select.
                 */
                $this->displaySwitchInput(array('id' => 'days_multiple_select',
                                                'label' => $DOPBSP->text('SETTINGS_CALENDAR_DAYS_MULTIPLE_SELECT'),
                                                'value' => $settings_calendar->days_multiple_select,
                                                'settings_type' => 'calendar',
                                                'help' => $DOPBSP->text('SETTINGS_CALENDAR_DAYS_MULTIPLE_SELECT_HELP')));
                /*
                 * Enable morning check out.
                 */
                $this->displaySwitchInput(array('id' => 'days_morning_check_out',
                                                'label' => $DOPBSP->text('SETTINGS_CALENDAR_DAYS_MORNING_CHECK_OUT'),
                                                'value' => $settings_calendar->days_morning_check_out,
                                                'settings_type' => 'calendar',
                                                'help' => $DOPBSP->text('SETTINGS_CALENDAR_DAYS_MORNING_CHECK_OUT_HELP')));
                /*
                 * Enable details from hours.
                 */
                $this->displaySwitchInput(array('id' => 'days_details_from_hours',
                                                'label' => $DOPBSP->text('SETTINGS_CALENDAR_DAYS_DETAILS_FROM_HOURS'),
                                                'value' => $settings_calendar->days_details_from_hours,
                                                'settings_type' => 'calendar',
                                                'help' => $DOPBSP->text('SETTINGS_CALENDAR_DAYS_DETAILS_FROM_HOURS_HELP'),
                                                'container_class' => 'dopbsp-last'));
?>
                </div>
<?php
            }
            
            /*
             * Returns calendar hours settings template.
             * 
             * @param settings_calendar (object): calendar settings data
             * 
             * @return hours settings HTML
             */
            function templateHours($settings_calendar){
                global $DOPBSP;
?>
                <div class="dopbsp-inputs-header dopbsp-hide">
                    <h3><?php echo $DOPBSP->text('SETTINGS_CALENDAR_HOURS_SETTINGS'); ?></h3>
                    <a href="javascript:DOPBSP.toggleInputs('calendar-hours-settings')" id="DOPBSP-inputs-button-calendar-hours-settings" class="dopbsp-button"></a>
                </div>
                <div id="DOPBSP-inputs-calendar-hours-settings" class="dopbsp-inputs-wrapper">
<?php
                /*
                 * Hours enabled.
                 */
                $this->displaySwitchInput(array('id' => 'hours_enabled',
                                                'label' => $DOPBSP->text('SETTINGS_CALENDAR_HOURS_ENABLED'),
                                                'value' => $settings_calendar->hours_enabled,
                                                'settings_type' => 'calendar',
                                                'help' => $DOPBSP->text('SETTINGS_CALENDAR_HOURS_ENABLED_HELP')));
                /*
                 * Hours info enabled.
                 */
                $this->displaySwitchInput(array('id' => 'hours_info_enabled',
                                                'label' => $DOPBSP->text('SETTINGS_CALENDAR_HOURS_INFO_ENABLED'),
                                                'value' => $settings_calendar->hours_info_enabled,
                                                'settings_type' => 'calendar',
                                                'help' => $DOPBSP->text('SETTINGS_CALENDAR_HOURS_INFO_ENABLED_HELP')));
                /*
                 * Hours definitions.
                 */
                $hours_html = array();
                $hours = json_decode($settings_calendar->hours_definitions);

                foreach ($hours as $hour){
                    array_push($hours_html, $hour->value);
                }
                
                $this->displayTextarea(array('id' => 'hours_definitions',
                                             'label' => $DOPBSP->text('SETTINGS_CALENDAR_HOURS_DEFINITIONS'),
                                             'value' => implode("\n", $hours_html),
                                             'settings_type' => 'calendar',
                                             'help' => $DOPBSP->text('SETTINGS_CALENDAR_HOURS_DEFINITIONS_HELP')));
                /*
                 * Enable multiple hours select.
                 */
                $this->displaySwitchInput(array('id' => 'hours_multiple_select',
                                                'label' => $DOPBSP->text('SETTINGS_CALENDAR_HOURS_MULTIPLE_SELECT'),
                                                'value' => $settings_calendar->hours_multiple_select,
                                                'settings_type' => 'calendar',
                                                'help' => $DOPBSP->text('SETTINGS_CALENDAR_HOURS_MULTIPLE_SELECT_HELP')));
                /*
                 * Set hours AM/PM.
                 */
                $this->displaySwitchInput(array('id' => 'hours_ampm',
                                                'label' => $DOPBSP->text('SETTINGS_CALENDAR_HOURS_AMPM'),
                                                'value' => $settings_calendar->hours_ampm,
                                                'settings_type' => 'calendar',
                                                'help' => $DOPBSP->text('SETTINGS_CALENDAR_HOURS_AMPM_HELP')));
                /*
                 * Enable to add last hour to total price.
                 */
                $this->displaySwitchInput(array('id' => 'hours_add_last_hour_to_total_price',
                                                'label' => $DOPBSP->text('SETTINGS_CALENDAR_HOURS_ADD_LAST_HOUR_TO_TOTAL_PRICE'),
                                                'value' => $settings_calendar->hours_add_last_hour_to_total_price,
                                                'settings_type' => 'calendar',
                                                'help' => $DOPBSP->text('SETTINGS_CALENDAR_HOURS_ADD_LAST_HOUR_TO_TOTAL_PRICE_HELP')));
                /*
                 * Enable hours interval.
                 */
                $this->displaySwitchInput(array('id' => 'hours_interval_enabled',
                                                'label' => $DOPBSP->text('SETTINGS_CALENDAR_HOURS_INTERVAL_ENABLED'),
                                                'value' => $settings_calendar->hours_interval_enabled,
                                                'settings_type' => 'calendar',
                                                'help' => $DOPBSP->text('SETTINGS_CALENDAR_HOURS_INTERVAL_ENABLED_HELP'),
                                                'container_class' => 'dopbsp-last'));
?>
                </div>
<?php       
            }
            
            /*
             * Returns calendar sidebar settings template.
             * 
             * @param id (integer): calendar ID
             * @param settings_calendar (object): calendar settings data
             * 
             * @return sidebar settings HTML
             */
            function templateSidebar($settings_calendar){
                global $DOPBSP;
?>
                <div class="dopbsp-inputs-header dopbsp-hide">
                    <h3><?php echo $DOPBSP->text('SETTINGS_CALENDAR_SIDEBAR_SETTINGS'); ?></h3>
                    <a href="javascript:DOPBSP.toggleInputs('calendar-sidebar-settings')" id="DOPBSP-inputs-button-calendar-sidebar-settings" class="dopbsp-button"></a>
                </div>
                <div id="DOPBSP-inputs-calendar-sidebar-settings" class="dopbsp-inputs-wrapper">
                    <div class="dopbsp-input-wrapper">
                        <label class="dopbsp-for-checkboxes"><?php echo $DOPBSP->text('SETTINGS_CALENDAR_SIDEBAR_STYLE'); ?></label>
                        <ul id="DOPBSP-settings-sidebar-styles" class="dopbsp-sidebar-styles">
                            <li id="DOPBSP-settings-sidebar-style1"<?php echo $settings_calendar->sidebar_style == 1 ? ' class="dopbsp-selected"':''; ?> onclick="DOPBSPSettings.set('calendar', 'sidebar-style', 'sidebar_style', 1)"></li>
                            <li id="DOPBSP-settings-sidebar-style2"<?php echo $settings_calendar->sidebar_style == 2 ? ' class="dopbsp-selected"':''; ?> onclick="DOPBSPSettings.set('calendar', 'sidebar-style', 'sidebar_style', 2)"></li>
                            <li id="DOPBSP-settings-sidebar-style3"<?php echo $settings_calendar->sidebar_style == 3 ? ' class="dopbsp-selected"':''; ?> onclick="DOPBSPSettings.set('calendar', 'sidebar-style', 'sidebar_style', 3)"></li>
                            <li id="DOPBSP-settings-sidebar-style4"<?php echo $settings_calendar->sidebar_style == 4 ? ' class="dopbsp-selected"':''; ?> onclick="DOPBSPSettings.set('calendar', 'sidebar-style', 'sidebar_style', 4)"></li>
                            <li id="DOPBSP-settings-sidebar-style5"<?php echo $settings_calendar->sidebar_style == 5 ? ' class="dopbsp-selected"':''; ?> onclick="DOPBSPSettings.set('calendar', 'sidebar-style', 'sidebar_style', 5)"></li>
                        </ul>
                        <a href="<?php echo DOPBSP_CONFIG_HELP_DOCUMENTATION_URL; ?>" target="_blank" class="dopbsp-button dopbsp-help"><span class="dopbsp-info dopbsp-help"><?php echo $DOPBSP->text('SETTINGS_CALENDAR_SIDEBAR_STYLE_HELP'); ?><br /><br /><?php echo $DOPBSP->text('HELP_VIEW_DOCUMENTATION'); ?></span></a>
                    </div>
<?php    
                /*
                 * Enable number of items display.
                 */
                $this->displaySwitchInput(array('id' => 'sidebar_no_items_enabled',
                                                'label' => $DOPBSP->text('SETTINGS_CALENDAR_SIDEBAR_NO_ITEMS_ENABLED'),
                                                'value' => $settings_calendar->sidebar_no_items_enabled,
                                                'settings_type' => 'calendar',
                                                'help' => $DOPBSP->text('SETTINGS_CALENDAR_SIDEBAR_NO_ITEMS_ENABLED_HELP'),
                                                'container_class' => 'dopbsp-last'));
?>
                </div>
<?php                
            }
            
            /*
             * Returns calendar rules settings template.
             * 
             * @param settings_calendar (object): calendar settings data
             * 
             * @return rules settings HTML
             */
            function templateRules($settings_calendar){
                global $DOPBSP;
?>
                <div class="dopbsp-inputs-header dopbsp-hide">
                    <h3><?php echo $DOPBSP->text('SETTINGS_CALENDAR_RULES_SETTINGS'); ?></h3>
                    <a href="javascript:DOPBSP.toggleInputs('calendar-rules-settings')" id="DOPBSP-inputs-button-calendar-rules-settings" class="dopbsp-button"></a>
                </div>
                <div id="DOPBSP-inputs-calendar-rules-settings" class="dopbsp-inputs-wrapper">
<?php           
                /*
                 * Extra select.
                 */
                $this->displaySelectInput(array('id' => 'rule',
                                                'label' => $DOPBSP->text('SETTINGS_CALENDAR_RULES'),
                                                'value' => $settings_calendar->rule,
                                                'settings_type' => 'calendar',
                                                'help' => $DOPBSP->text('SETTINGS_CALENDAR_RULES_HELP'),
                                                'options' => $this->listRules('labels'),
                                                'options_values' => $this->listRules('ids'),
                                                'container_class' => 'dopbsp-last'));
?>
                </div>
<?php       
            }
            
            /*
             * Returns calendar extras settings template.
             * 
             * @param settings_calendar (object): calendar settings data
             * 
             * @return extras settings HTML
             */
            function templateExtras($settings_calendar){
                global $DOPBSP;
?>
                <div class="dopbsp-inputs-header dopbsp-hide">
                    <h3><?php echo $DOPBSP->text('SETTINGS_CALENDAR_EXTRAS_SETTINGS'); ?></h3>
                    <a href="javascript:DOPBSP.toggleInputs('calendar-extras-settings')" id="DOPBSP-inputs-button-calendar-extras-settings" class="dopbsp-button"></a>
                </div>
                <div id="DOPBSP-inputs-calendar-extras-settings" class="dopbsp-inputs-wrapper">
<?php           
                /*
                 * Extra select.
                 */
                $this->displaySelectInput(array('id' => 'extra',
                                                'label' => $DOPBSP->text('SETTINGS_CALENDAR_EXTRAS'),
                                                'value' => $settings_calendar->extra,
                                                'settings_type' => 'calendar',
                                                'help' => $DOPBSP->text('SETTINGS_CALENDAR_EXTRAS_HELP'),
                                                'options' => $this->listExtras('labels'),
                                                'options_values' => $this->listExtras('ids'),
                                                'container_class' => 'dopbsp-last'));
?>
                </div>
<?php       
            }
            
            /*
             * Returns calendar cart settings template.
             * 
             * @param settings_calendar (object): calendar settings data
             * 
             * @return cart settings HTML
             */
            function templateCart($settings_calendar){
                global $DOPBSP;
?>
                <div class="dopbsp-inputs-header dopbsp-hide">
                    <h3><?php echo $DOPBSP->text('SETTINGS_CALENDAR_CART_SETTINGS'); ?></h3>
                    <a href="javascript:DOPBSP.toggleInputs('calendar-cart-settings')" id="DOPBSP-inputs-button-calendar-cart-settings" class="dopbsp-button"></a>
                </div>
                <div id="DOPBSP-inputs-calendar-cart-settings" class="dopbsp-inputs-wrapper">
<?php          
                /*
                 * Enable cart.
                 */
                $this->displaySwitchInput(array('id' => 'cart_enabled',
                                                'label' => $DOPBSP->text('SETTINGS_CALENDAR_CART_ENABLED'),
                                                'value' => $settings_calendar->cart_enabled,
                                                'settings_type' => 'calendar',
                                                'help' => $DOPBSP->text('SETTINGS_CALENDAR_CART_ENABLED_HELP'),
                                                'container_class' => 'dopbsp-last'));
?>
                </div>
<?php       
            }
            
            /*
             * Returns calendar discounts settings template.
             * 
             * @param settings_calendar (object): calendar settings data
             * 
             * @return discounts settings HTML
             */
            function templateDiscounts($settings_calendar){
                global $DOPBSP;
?>
                <div class="dopbsp-inputs-header dopbsp-hide">
                    <h3><?php echo $DOPBSP->text('SETTINGS_CALENDAR_DISCOUNTS_SETTINGS'); ?></h3>
                    <a href="javascript:DOPBSP.toggleInputs('calendar-discounts-settings')" id="DOPBSP-inputs-button-calendar-discounts-settings" class="dopbsp-button"></a>
                </div>
                <div id="DOPBSP-inputs-calendar-discounts-settings" class="dopbsp-inputs-wrapper">
<?php           
                /*
                 * Discount select.
                 */
                $this->displaySelectInput(array('id' => 'discount',
                                                'label' => $DOPBSP->text('SETTINGS_CALENDAR_DISCOUNTS'),
                                                'value' => $settings_calendar->discount,
                                                'settings_type' => 'calendar',
                                                'help' => $DOPBSP->text('SETTINGS_CALENDAR_DISCOUNTS_HELP'),
                                                'options' => $this->listDiscounts('labels'),
                                                'options_values' => $this->listDiscounts('ids'),
                                                'container_class' => 'dopbsp-last'));
?>
                </div>
<?php       
            }
            
            /*
             * Returns calendar fees settings template.
             * 
             * @param settings_calendar (object): calendar settings data
             * 
             * @return fees settings HTML
             */
            function templateFees($settings_calendar){
                global $DOPBSP;
?>
                <div class="dopbsp-inputs-header dopbsp-hide">
                    <h3><?php echo $DOPBSP->text('SETTINGS_CALENDAR_FEES_SETTINGS'); ?></h3>
                    <a href="javascript:DOPBSP.toggleInputs('calendar-fees-settings')" id="DOPBSP-inputs-button-calendar-fees-settings" class="dopbsp-button"></a>
                </div>
                <div id="DOPBSP-inputs-calendar-fees-settings" class="dopbsp-inputs-wrapper">
<?php           
                /*
                 * Fees multiple list.
                 */
                echo $this->multipleFees(array('label' => $DOPBSP->text('SETTINGS_CALENDAR_FEES'),
                                               'value' => $settings_calendar->fees,
                                               'settings_type' => 'calendar',
                                               'help' => $DOPBSP->text('SETTINGS_CALENDAR_FEES_HELP'),
                                               'container_class' => 'dopbsp-last'));
?>
                </div>
<?php       
            }
            
            /*
             * Returns calendar coupons settings template.
             * 
             * @param settings_calendar (object): settings data
             * 
             * @return coupons settings HTML
             */
            function templateCoupons($settings_calendar){
                global $DOPBSP;
?>
                <div class="dopbsp-inputs-header dopbsp-hide">
                    <h3><?php echo $DOPBSP->text('SETTINGS_CALENDAR_COUPONS_SETTINGS'); ?></h3>
                    <a href="javascript:DOPBSP.toggleInputs('calendar-coupons-settings')" id="DOPBSP-inputs-button-calendar-coupons-settings" class="dopbsp-button"></a>
                </div>
                <div id="DOPBSP-inputs-calendar-coupons-settings" class="dopbsp-inputs-wrapper">
<?php           
                /*
                 * Discount select.
                 */
                $this->displaySelectInput(array('id' => 'coupon',
                                                'label' => $DOPBSP->text('SETTINGS_CALENDAR_COUPONS'),
                                                'value' => $settings_calendar->coupon,
                                                'settings_type' => 'calendar',
                                                'help' => $DOPBSP->text('SETTINGS_CALENDAR_COUPONS_HELP'),
                                                'options' => $this->listCoupons('labels'),
                                                'options_values' => $this->listCoupons('ids'),
                                                'container_class' => 'dopbsp-last'));
?>
                </div>
<?php       
            }
            
            /*
             * Returns calendar deposit settings template.
             * 
             * @param settings_calendar (object): calendar settings data
             * 
             * @return deposit settings HTML
             */
            function templateDeposit($settings_calendar){
                global $DOPBSP;
?>
                <div class="dopbsp-inputs-header dopbsp-hide">
                    <h3><?php echo $DOPBSP->text('SETTINGS_CALENDAR_DEPOSIT_SETTINGS'); ?></h3>
                    <a href="javascript:DOPBSP.toggleInputs('calendar-deposit-settings')" id="DOPBSP-inputs-button-calendar-deposit-settings" class="dopbsp-button"></a>
                </div>
                <div id="DOPBSP-inputs-calendar-deposit-settings" class="dopbsp-inputs-wrapper">
<?php           
                /*
                 * Deposit
                 */
                $this->displayTextInput(array('id' => 'deposit',
                                              'label' => $DOPBSP->text('SETTINGS_CALENDAR_DEPOSIT'),
                                              'value' => $settings_calendar->deposit,
                                              'settings_type' => 'calendar',
                                              'help' => $DOPBSP->text('SETTINGS_CALENDAR_DEPOSIT_HELP')));
                /*
                 * Deposit type.
                 */
                $this->displaySelectInput(array('id' => 'deposit_type',
                                                'label' => $DOPBSP->text('SETTINGS_CALENDAR_DEPOSIT_TYPE'),
                                                'value' => $settings_calendar->deposit_type,
                                                'settings_type' => 'calendar',
                                                'help' => $DOPBSP->text('SETTINGS_CALENDAR_DEPOSIT_TYPE_HELP'),
                                                'options' => $DOPBSP->text('SETTINGS_CALENDAR_DEPOSIT_TYPE_FIXED').';;'.$DOPBSP->text('SETTINGS_CALENDAR_DEPOSIT_TYPE_PERCENT'),
                                                'options_values' => 'fixed;;percent',
                                                'container_class' => 'dopbsp-last'));
?>
                </div>
<?php       
            }
            
            /*
             * Returns calendar form settings template.
             * 
             * @param settings_calendar (object): calendar settings data
             * 
             * @return form settings HTML
             */
            function templateForms($settings_calendar){
                global $DOPBSP;
?>
                <div class="dopbsp-inputs-header dopbsp-hide">
                    <h3><?php echo $DOPBSP->text('SETTINGS_CALENDAR_FORMS_SETTINGS'); ?></h3>
                    <a href="javascript:DOPBSP.toggleInputs('calendar-forms-settings')" id="DOPBSP-inputs-button-calendar-forms-settings" class="dopbsp-button"></a>
                </div>
                <div id="DOPBSP-inputs-calendar-forms-settings" class="dopbsp-inputs-wrapper">
<?php           
                /*
                 * Form select.
                 */
                $this->displaySelectInput(array('id' => 'form',
                                                'label' => $DOPBSP->text('SETTINGS_CALENDAR_FORMS'),
                                                'value' => $settings_calendar->form,
                                                'settings_type' => 'calendar',
                                                'help' => $DOPBSP->text('SETTINGS_CALENDAR_FORMS_HELP'),
                                                'options' => $this->listForms('labels'),
                                                'options_values' => $this->listForms('ids'),
                                                'container_class' => 'dopbsp-last'));
?>
                </div>
<?php       
            }
            
            /*
             * Returns calendar order settings template.
             * 
             * @param settings_calendar (object): calendar settings data
             * 
             * @return order settings HTML
             */
            function templateOrder($settings_calendar){
                global $DOPBSP;
?>
                <div class="dopbsp-inputs-header dopbsp-last dopbsp-hide">
                    <h3><?php echo $DOPBSP->text('SETTINGS_CALENDAR_ORDER_SETTINGS'); ?></h3>
                    <a href="javascript:DOPBSP.toggleInputs('calendar-order-settings')" id="DOPBSP-inputs-button-calendar-order-settings" class="dopbsp-button"></a>
                </div>
                <div id="DOPBSP-inputs-calendar-order-settings" class="dopbsp-inputs-wrapper dopbsp-last dopbsp-displayed">
<?php                
                /*
                 * Enable terms & conditions.
                 */
                $this->displaySwitchInput(array('id' => 'terms_and_conditions_enabled',
                                                'label' => $DOPBSP->text('SETTINGS_CALENDAR_ORDER_TERMS_AND_CONDITIONS_ENABLED'),
                                                'value' => $settings_calendar->terms_and_conditions_enabled,
                                                'settings_type' => 'calendar',
                                                'help' => $DOPBSP->text('SETTINGS_CALENDAR_ORDER_TERMS_AND_CONDITIONS_ENABLED_HELP')));
                /*
                 * Terms & conditions link.
                 */
                $this->displayTextInput(array('id' => 'terms_and_conditions_link',
                                              'label' => $DOPBSP->text('SETTINGS_CALENDAR_ORDER_TERMS_AND_CONDITIONS_LINK'),
                                              'value' => $settings_calendar->terms_and_conditions_link,
                                              'settings_type' => 'calendar',
                                              'help' => $DOPBSP->text('SETTINGS_CALENDAR_ORDER_TERMS_AND_CONDITIONS_LINK_HELP'),
                                              'container_class' => 'dopbsp-last'));
?>
                </div>
<?php       
            }
        }
    }