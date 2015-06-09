<?php

/*
* Title                   : Booking System Pro (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/settings/class-backend-settings-licenses.php
* File Version            : 1.0
* Created / Last Modified : 29 April 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System PRO back end licenses settings PHP class.
*/

    if (!class_exists('DOPBSPBackEndSettingsLicenses')){
        class DOPBSPBackEndSettingsLicenses extends DOPBSPBackEndSettings{
            /*
             * Constructor
             */
            function DOPBSPBackEndSettingsLicenses(){
            }
        
            /*
             * Prints out the licenses settings page.
             * 
             * @post id (integer): calendar ID
             * 
             * @return licenses settings HTML
             */
            function display(){
                global $DOPBSP;
                
                $DOPBSP->views->backend_settings_licenses->template(array());
                
                die();
            }
            
            /*
             * Activate add-ons.
             * 
             * @post id (string): add-on ID
             * @post key (string): add-on license key
             * @post email (string): add-on license email
             */
            function activate(){
                $id = $_POST['id'];
                $key = $_POST['key'];
                $email = $_POST['email'];
                
                $addon = 'DOPBSP_'.$id;
                
                global $DOPBSP;
                global $$addon;
                
                /*
                 * Create request url.
                 */
                $args = array();
                
                $instance = get_option('DOPBSP_'.$id.'_license_instance');
                
                if ($instance == ''){
                    $instance = $DOPBSP->classes->prototypes->getRandomString(64);
                    add_option('DOPBSP_'.$id.'_license_instance', $instance);
                }
                
		$defaults = array('wc-api' => 'am-software-api',
                                  'email' => $email,
                                  'instance' => $instance,
                                  'licence_key' => $key,
                                  'platform' => $$addon->license->platform,
                                  'product_id' => $$addon->license->product_id,
                                  'request' => 'activation',
                                  'software_version' => $$addon->license->software_version);
		$args = wp_parse_args($defaults, $args);
		$request_url = esc_url_raw($$addon->license->platform.'?'.http_build_query($args));
                
                /*
                 * Request plugin activation.
                 */
		$request = wp_remote_get($request_url);
                
		if (is_wp_error($request) 
                        || wp_remote_retrieve_response_code($request) != 200){
                    echo 'error_with_message;;;;;'.$DOPBSP->text('SETTINGS_LICENSES_STATUS_ACTIVATED_ERROR');
		}
                else{
                    $response = json_decode(wp_remote_retrieve_body($request));
                    
                    if ((string)$response->activated == 'inactive'){
                        $message = array();

                        array_push($message, $DOPBSP->text('SETTINGS_LICENSES_STATUS_ACTIVATED_ERROR').'<br />');
                        array_push($message, 'Error: '.$response->error);
                        array_push($message, 'Code: '.$response->code);
                        
                        if(isset($response->{'additional info'})) {
                            array_push($message, 'Message: '.$response->{'additional info'});
                        }

                        echo 'error_with_message;;;;;'.implode('<br />', $message);
                    }
                    else{
                        $DOPBSP->classes->backend_settings->set(array('id' => 0,
                                                                      'is_ajax' => false,
                                                                      'key' => $id.'_license',
                                                                      'settings_type' => 'global',
                                                                      'value' => 'activated'));
                        $DOPBSP->classes->backend_settings->set(array('id' => 0,
                                                                      'is_ajax' => false,
                                                                      'key' => $id.'_license_key',
                                                                      'settings_type' => 'global',
                                                                      'value' => $key));
                        $DOPBSP->classes->backend_settings->set(array('id' => 0,
                                                                      'is_ajax' => false,
                                                                      'key' => $id.'_license_email',
                                                                      'settings_type' => 'global',
                                                                      'value' => $email));
                        echo 'success;;;;;'.$DOPBSP->text('SETTINGS_LICENSES_STATUS_ACTIVATED_SUCCESS').'<br /><br />'.$response->message;
                    }
                }
                
                die();
            }
            
            /*
             * Deactivate add-ons.
             * 
             * @post id (string): add-on ID
             * @post key (string): add-on license key
             * @post email (string): add-on license email
             */
            function deactivate(){
                $id = $_POST['id'];
                $key = $_POST['key'];
                $email = $_POST['email'];
                
                $addon = 'DOPBSP_'.$id;
                
                global $DOPBSP;
                global $$addon;
                
                /*
                 * Create request url.
                 */
                $args = array();
                
                $instance = get_option('DOPBSP_'.$id.'_license_instance');
                
                if ($instance == ''){
                    $instance = $DOPBSP->classes->prototypes->getRandomString(64);
                    add_option('DOPBSP_'.$id.'_license_instance', $instance);
                }
                
		$defaults = array('wc-api' => 'am-software-api',
                                  'email' => $email,
                                  'instance' => $instance,
                                  'licence_key' => $key,
                                  'platform' => $$addon->license->platform,
                                  'product_id' => $$addon->license->product_id,
                                  'request' => 'deactivation');
		$args = wp_parse_args($defaults, $args);
		$request_url = esc_url_raw($$addon->license->platform.'?'.http_build_query($args));
                
                /*
                 * Request plugin activation.
                 */
		$request = wp_remote_get($request_url);
                
		if (is_wp_error($request) 
                        || wp_remote_retrieve_response_code($request) != 200){
                    echo 'error_with_message;;;;;'.$DOPBSP->text('SETTINGS_LICENSES_STATUS_DEACTIVATED_ERROR');
		}
                else{
                    $response = json_decode(wp_remote_retrieve_body($request));
                    
                    if ((string)$response->deactivated == false){
                        $message = array();

                        array_push($message, $DOPBSP->text('SETTINGS_LICENSES_STATUS_DEACTIVATED_ERROR').'<br />');
                        array_push($message, 'Error: '.$response->error);
                        array_push($message, 'Code: '.$response->code);
                        
                        if(isset($response->{'additional info'})) {
                            array_push($message, 'Message: '.$response->{'additional info'});
                        }

                        echo 'error_with_message;;;;;'.implode('<br />', $message);
                    }
                    else{
                        $DOPBSP->classes->backend_settings->set(array('id' => 0,
                                                                      'is_ajax' => false,
                                                                      'key' => $id.'_license',
                                                                      'settings_type' => 'global',
                                                                      'value' => 'deactivated'));
                        echo 'success;;;;;'.$DOPBSP->text('SETTINGS_LICENSES_STATUS_DEACTIVATED_SUCCESS').'<br /><br />'.$response->activations_remaining;
                    }
                }
                
                die();
            }
        }
    }