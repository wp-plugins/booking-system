<?php

/*
* Title                   : Booking System PRO (WordPress Plugin)
* Version                 : 2.0
* File                    : views/settings/views-backend-settings-general.php
* File Version            : 1.0
* Created / Last Modified : 29 April 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System PRO back end general settings views class.
*/

    if (!class_exists('DOPBSPViewsBackEndSettingsGeneral')){
        class DOPBSPViewsBackEndSettingsGeneral extends DOPBSPViewsBackEndSettings{
            /*
             * Constructor
             */
            function DOPBSPViewsBackEndSettingsGeneral(){
            }
            
            /*
             * Returns general settings template.
             * 
             * @param args (array): function arguments
             * 
             * @return general settings HTML
             */
            function template($args = array()){
                global $DOPBSP;
                
                $settings_global = $DOPBSP->classes->backend_settings->values(0,  
                                                                              'global');
?>
                <div class="dopbsp-inputs-header dopbsp-hide">
                    <h3><?php echo $DOPBSP->text('SETTINGS_CALENDAR_GENERAL_SETTINGS'); ?></h3>
                    <a href="javascript:DOPBSP.toggleInputs('general-settings')" id="DOPBSP-inputs-button-calendar-general-settings" class="dopbsp-button"></a>
                </div>
                <div id="DOPBSP-inputs-general-settings" class="dopbsp-inputs-wrapper">
<?php
                /*
                 * API KEY.
                 */
                $this->displayTextInput(array('id' => 'api_key',
                                              'label' => $DOPBSP->text('SETTINGS_GENERAL_API_KEY'),
                                              'value' => $settings_global->api_key,
                                              'settings_id' => 0,
                                              'settings_type' => 'global',
                                              'help' => $DOPBSP->text('SETTINGS_GENERAL_API_KEY_HELP'),
                                              'container_class' => 'dopbsp-last'));
?>
                </div>
<?php
            }
        }
    }