<?php

/*
* Title                   : Booking System PRO (WordPress Plugin)
* Version                 : 2.0
* File                    : views/settings/views-backend-settings-licenses.php
* File Version            : 1.0
* Created / Last Modified : 29 April 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System PRO back end licenses settings views class.
*/

    if (!class_exists('DOPBSPViewsBackEndSettingsLicenses')){
        class DOPBSPViewsBackEndSettingsLicenses extends DOPBSPViewsBackEndSettings{
            /*
             * Constructor
             */
            function DOPBSPViewsBackEndSettingsLicenses(){
            }
            
            /*
             * Returns licenses settings template.
             * 
             * @param args (array): function arguments
             * 
             * @return licenses settings HTML
             */
            function template($args = array()){
                global $DOPBSP;
                
                $settings_global = $DOPBSP->classes->backend_settings->values(0,'global');
?>
                <div class="dopbsp-inputs-wrapper">
                    <em><?php echo $DOPBSP->text('SETTINGS_LICENSES_HELP'); ?></em>
                </div>
<?php
/*
 * ACTION HOOK (dopbsp_action_views_settings_licenses) ***************** Add licenses settings.
 */
                do_action('dopbsp_action_views_settings_licenses', array('settings_global' => $settings_global));
            }
        }
    }