<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : views/settings/views-backend-settings-emails.php
* File Version            : 1.0.8
* Created / Last Modified : 10 February 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end emails settings views class.
*/

    if (!class_exists('DOPBSPViewsBackEndSettingsNotifications')){
        class DOPBSPViewsBackEndSettingsNotifications extends DOPBSPViewsBackEndSettings{
            /*
             * Constructor
             */
            function DOPBSPViewsBackEndSettingsNotifications(){
            }
            
            /*
             * Returns notifications settings template.
             * 
             * @param args (array): function arguments
             *                      * id (integer): calendar ID
             * 
             * @return emails settings HTML
             */
            function template($args = array()){
                global $DOPBSP;
                
                $settings_notifications = $DOPBSP->classes->backend_settings->values(1,'notifications');
?>
                <div class="dopbsp-inputs-wrapper">
<?php
                    /*
                     * Select templates.
                     */
                    $this->displaySelectInput(array('id' => 'templates',
                                                    'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_TEMPLATES'),
                                                    'value' => $settings_notifications->templates,
                                                    'settings_type' => 'notifications',
                                                    'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_TEMPLATES_HELP'),
                                                    'options' => $this->listEmails('labels'),
                                                    'options_values' => $this->listEmails('ids')));
                    /*
                     * Admin notifications method.
                     */
                    $this->displaySelectInput(array('id' => 'method_admin',
                                                    'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_METHOD_ADMIN'),
                                                    'value' => $settings_notifications->method_admin,
                                                    'settings_type' => 'notifications',
                                                    'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_METHOD_ADMIN_HELP'),
                                                    'options' => 'PHPMailer;;PHP mail();;SMTP;;SMTP 2;;WordPress wp_mail()',
                                                    'options_values' => 'mailer;;mail;;smtp;;smtp2;;wp'));
                    /*
                     * User notifications method.
                     */
                    $this->displaySelectInput(array('id' => 'method_user',
                                                    'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_METHOD_USER'),
                                                    'value' => $settings_notifications->method_user,
                                                    'settings_type' => 'notifications',
                                                    'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_METHOD_USER_HELP'),
                                                    'options' => 'PHPMailer;;PHP mail();;SMTP;;SMTP 2;;WordPress wp_mail()',
                                                    'options_values' => 'mailer;;mail;;smtp;;smtp2;;wp'));
                    /*
                     * Admin notification emails.
                     */
                    $this->displayTextInput(array('id' => 'email',
                                                  'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_EMAIL'),
                                                  'value' => $settings_notifications->email,
                                                  'settings_type' => 'notifications',
                                                  'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_EMAIL_HELP')));
                    /*
                     * Admin notification replay email.
                     */
                    $this->displayTextInput(array('id' => 'email_reply',
                                                  'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_EMAIL_REPLY'),
                                                  'value' => $settings_notifications->email_reply,
                                                  'settings_type' => 'notifications',
                                                  'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_EMAIL_REPLY_HELP')));
                    /*
                     * Admin notification name.
                     */
                    $this->displayTextInput(array('id' => 'email_name',
                                                  'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_EMAIL_NAME'),
                                                  'value' => $settings_notifications->email_name,
                                                  'settings_type' => 'notifications',
                                                  'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_EMAIL_NAME_HELP')));
                    /*
                     * Cc notifications email.
                     */
                    $this->displayTextarea(array('id' => 'email_cc',
                                                 'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_EMAIL_CC'),
                                                 'value' => str_replace(',', "\n", $settings_notifications->email_cc),
                                                 'settings_type' => 'notifications',
                                                 'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_EMAIL_CC_HELP')));
                    /*
                     * Cc notifications name.
                     */
                    $this->displayTextarea(array('id' => 'email_cc_name',
                                                 'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_EMAIL_CC_NAME'),
                                                 'value' => str_replace(',', "\n", $settings_notifications->email_cc_name),
                                                 'settings_type' => 'notifications',
                                                 'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_EMAIL_CC_NAME_HELP')));
                    /*
                     * Bcc notifications email.
                     */
                    $this->displayTextarea(array('id' => 'email_bcc',
                                                 'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_EMAIL_BCC'),
                                                 'value' => str_replace(',', "\n", $settings_notifications->email_bcc),
                                                 'settings_type' => 'notifications',
                                                 'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_EMAIL_BCC_HELP')));
                    /*
                     * Bcc notifications name.
                     */
                    $this->displayTextarea(array('id' => 'email_bcc_name',
                                                 'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_EMAIL_BCC_NAME'),
                                                 'value' => str_replace(',', "\n", $settings_notifications->email_bcc_name),
                                                 'settings_type' => 'notifications',
                                                 'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_EMAIL_BCC_NAME_HELP'),
                                                 'container_class' => 'dopbsp-last'));
?>
                </div>
<?php
                /*
                 * SMTP configuration.
                 */
                $this->templateSMTP($settings_notifications);
                
                /*
                 * Second SMTP configuration.
                 */
                $this->templateSMTP2($settings_notifications);
                
                /*
                 * Send notifications.
                 */
                $this->templateSend($settings_notifications);
                
                /*
                 * Test notifications.
                 */
                $this->templateTest($settings_notifications);
            }
            
            /*
             * Returns notifications send settings template.
             * 
             * @param settings_notifications (object): notifications settings
             * 
             * @return send notifications settings HTML
             */
            function templateSend($settings_notifications){
                global $DOPBSP;
?>
                 <div class="dopbsp-inputs-header dopbsp-hide">
                    <h3><?php echo $DOPBSP->text('SETTINGS_NOTIFICATIONS_SEND_TITLE'); ?></h3>
                    <a href="javascript:DOPBSP.toggleInputs('settings-notifications-send')" id="DOPBSP-inputs-button-settings-notifications-send" class="dopbsp-button"></a>
                </div>
                <div id="DOPBSP-inputs-settings-notifications-send" class="dopbsp-inputs-wrapper">
<?php
                    /*
                     * Send on book request to admin.
                     */
                    $this->displaySwitchInput(array('id' => 'send_book_admin',
                                                    'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SEND_BOOK_ADMIN'),
                                                    'value' => $settings_notifications->send_book_admin,
                                                    'settings_type' => 'notifications',
                                                    'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SEND_BOOK_ADMIN_HELP')));
                    /*
                     * Send on book request to user.
                     */
                    $this->displaySwitchInput(array('id' => 'send_book_user',
                                                    'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SEND_BOOK_USER'),
                                                    'value' => $settings_notifications->send_book_user,
                                                    'settings_type' => 'notifications',
                                                    'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SEND_BOOK_USER_HELP')));
                    /*
                     * Send on book with approval request to admin.
                     */
                    $this->displaySwitchInput(array('id' => 'send_book_with_approval_admin',
                                                    'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SEND_BOOK_WITH_APPROVAL_ADMIN'),
                                                    'value' => $settings_notifications->send_book_with_approval_admin,
                                                    'settings_type' => 'notifications',
                                                    'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SEND_BOOK_WITH_APPROVAL_ADMIN_HELP')));
                    /*
                     * Send on book with approval request to user.
                     */
                    $this->displaySwitchInput(array('id' => 'send_book_with_approval_user',
                                                    'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SEND_BOOK_WITH_APPROVAL_USER'),
                                                    'value' => $settings_notifications->send_book_with_approval_user,
                                                    'settings_type' => 'notifications',
                                                    'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SEND_BOOK_WITH_APPROVAL_USER_HELP')));
                    /*
                     * Send on approved reservation.
                     */
                    $this->displaySwitchInput(array('id' => 'send_approved',
                                                    'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SEND_APPROVED'),
                                                    'value' => $settings_notifications->send_approved,
                                                    'settings_type' => 'notifications',
                                                    'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SEND_APPROVED_HELP')));
                    /*
                     * Send on canceled reservation.
                     */
                    $this->displaySwitchInput(array('id' => 'send_canceled',
                                                    'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SEND_CANCELED'),
                                                    'value' => $settings_notifications->send_canceled,
                                                    'settings_type' => 'notifications',
                                                    'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SEND_CANCELED_HELP')));
                    /*
                     * Send on rejected reservation.
                     */
                    $this->displaySwitchInput(array('id' => 'send_rejected',
                                                    'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SEND_REJECTED'),
                                                    'value' => $settings_notifications->send_rejected,
                                                    'settings_type' => 'notifications',
                                                    'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SEND_REJECTED_HELP'),
                                                    'container_class' => 'dopbsp-last'));
                    
/*
 * ACTION HOOK (dopbsp_action_views_settings_notifications) ***************** Add payment gateways settings.
 */
                    do_action('dopbsp_action_views_settings_notifications', array('id' => 1,
                                                                                  'settings_notifications' => $settings_notifications));
?>
                </div>
<?php
            }
            
            /*
             * Returns notifications SMTP settings template.
             * 
             * @param settings_notifications (object): notifications settings
             * 
             * @return SMTP settings HTML
             */
            function templateSMTP($settings_notifications){
                global $DOPBSP;
?>
                 <div class="dopbsp-inputs-header dopbsp-hide">
                    <h3><?php echo $DOPBSP->text('SETTINGS_NOTIFICATIONS_SMTP_TITLE'); ?></h3>
                    <a href="javascript:DOPBSP.toggleInputs('settings-notifications-smtp')" id="DOPBSP-inputs-button-settings-notifications-smtp" class="dopbsp-button"></a>
                </div>
                <div id="DOPBSP-inputs-settings-notifications-smtp" class="dopbsp-inputs-wrapper">
<?php
                    /*
                     * SMTP host name.
                     */
                    $this->displayTextInput(array('id' => 'smtp_host_name',
                                                  'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SMTP_HOST_NAME'),
                                                  'value' => $settings_notifications->smtp_host_name,
                                                  'settings_type' => 'notifications',
                                                  'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SMTP_HOST_NAME_HELP')));
                    /*
                     * SMTP host port.
                     */
                    $this->displayTextInput(array('id' => 'smtp_host_port',
                                                  'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SMTP_HOST_PORT'),
                                                  'value' => $settings_notifications->smtp_host_port,
                                                  'settings_type' => 'notifications',
                                                  'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SMTP_HOST_PORT_HELP')));
                    /*
                     * SMTP ssl.
                     */
                    $this->displaySwitchInput(array('id' => 'smtp_ssl',
                                                    'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SMTP_SSL'),
                                                    'value' => $settings_notifications->smtp_ssl,
                                                    'settings_type' => 'notifications',
                                                    'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SMTP_SSL_HELP')));
                    /*
                     * SMTP tls.
                     */
                    $this->displaySwitchInput(array('id' => 'smtp_tls',
                                                    'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SMTP_TLS'),
                                                    'value' => $settings_notifications->smtp_tls,
                                                    'settings_type' => 'notifications',
                                                    'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SMTP_TLS_HELP')));
                    /*
                     * SMTP username.
                     */
                    $this->displayTextInput(array('id' => 'smtp_user',
                                                  'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SMTP_USER'),
                                                  'value' => $settings_notifications->smtp_user,
                                                  'settings_type' => 'notifications',
                                                  'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SMTP_USER_HELP')));
                    /*
                     * SMTP password.
                     */
                    $this->displayTextInput(array('id' => 'smtp_password',
                                                  'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SMTP_PASSWORD'),
                                                  'value' => $settings_notifications->smtp_password,
                                                  'settings_type' => 'notifications',
                                                  'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SMTP_PASSWORD_HELP'),
                                                  'container_class' => 'dopbsp-last',
                                                  'is_password' => true));
?>
                </div>
<?php
            }
            
            /*
             * Returns notifications second SMTP settings template.
             * 
             * @param id (integer): calendar ID
             * @param settings_notifications (object): notifications settings
             * 
             * @return second SMTP settings HTML
             */
            function templateSMTP2($settings_notifications){
                global $DOPBSP;
?>
                 <div class="dopbsp-inputs-header dopbsp-hide">
                    <h3><?php echo $DOPBSP->text('SETTINGS_NOTIFICATIONS_SMTP_SECOND_TITLE'); ?></h3>
                    <a href="javascript:DOPBSP.toggleInputs('settings-notifications-smtp2')" id="DOPBSP-inputs-button-settings-notifications-smtp2" class="dopbsp-button"></a>
                </div>
                <div id="DOPBSP-inputs-settings-notifications-smtp2" class="dopbsp-inputs-wrapper">
<?php
                    /*
                     * SMTP host name.
                     */
                    $this->displayTextInput(array('id' => 'smtp_host_name2',
                                                  'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SMTP_HOST_NAME'),
                                                  'value' => $settings_notifications->smtp_host_name2,
                                                  'settings_type' => 'notifications',
                                                  'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SMTP_HOST_NAME_HELP')));
                    /*
                     * SMTP host port.
                     */
                    $this->displayTextInput(array('id' => 'smtp_host_port2',
                                                  'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SMTP_HOST_PORT'),
                                                  'value' => $settings_notifications->smtp_host_port2,
                                                  'settings_type' => 'notifications',
                                                  'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SMTP_HOST_PORT_HELP')));
                    /*
                     * SMTP ssl.
                     */
                    $this->displaySwitchInput(array('id' => 'smtp_ssl2',
                                                    'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SMTP_SSL'),
                                                    'value' => $settings_notifications->smtp_ssl2,
                                                    'settings_type' => 'notifications',
                                                    'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SMTP_SSL_HELP')));
                    /*
                     * SMTP tls.
                     */
                    $this->displaySwitchInput(array('id' => 'smtp_tls2',
                                                    'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SMTP_TLS'),
                                                    'value' => $settings_notifications->smtp_tls2,
                                                    'settings_type' => 'notifications',
                                                    'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SMTP_TLS_HELP')));
                    /*
                     * SMTP username.
                     */
                    $this->displayTextInput(array('id' => 'smtp_user2',
                                                  'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SMTP_USER'),
                                                  'value' => $settings_notifications->smtp_user2,
                                                  'settings_type' => 'notifications',
                                                  'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SMTP_USER_HELP')));
                    /*
                     * SMTP password.
                     */
                    $this->displayTextInput(array('id' => 'smtp_password2',
                                                  'label' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SMTP_PASSWORD'),
                                                  'value' => $settings_notifications->smtp_password2,
                                                  'settings_type' => 'notifications',
                                                  'help' => $DOPBSP->text('SETTINGS_NOTIFICATIONS_SMTP_PASSWORD_HELP'),
                                                  'container_class' => 'dopbsp-last',
                                                  'is_password' => true));
?>
                </div>
<?php
            }
            
            /*
             * Returns notifications test template.
             * 
             * @return notifications test HTML
             */
            function templateTest(){
                global $DOPBSP;
?>
                 <div class="dopbsp-inputs-header dopbsp-last dopbsp-hide">
                    <h3><?php echo $DOPBSP->text('SETTINGS_NOTIFICATIONS_TEST_TITLE'); ?></h3>
                    <a href="javascript:DOPBSP.toggleInputs('settings-notifications-test')" id="DOPBSP-inputs-button-settings-notifications-test" class="dopbsp-button"></a>
                </div>
                <div id="DOPBSP-inputs-settings-notifications-test" class="dopbsp-inputs-wrapper dopbsp-last">
                    <!--
                        Notifications test.
                    -->
                    <div class="dopbsp-input-wrapper">
                        <label for="DOPBSP-settings-notifications-test-method"><?php echo $DOPBSP->text('SETTINGS_NOTIFICATIONS_TEST_METHOD'); ?></label>
                        <select name="DOPBSP-settings-notifications-test-method" id="DOPBSP-settings-notifications-test-method" class="dopbsp-left">
                            <option value="mailer">PHPMailer</option>
                            <option value="mail">PHP mail()</option>
                            <option value="smtp">SMTP</option>
                            <option value="smtp2">SMTP 2</option>
                            <option value="wp">WordPress wp_mail()</option>
                        </select>
                        <script type="text/JavaScript">jQuery('#DOPBSP-settings-notifications-test-method').DOPSelect();</script>
                        <a href="<?php echo DOPBSP_CONFIG_HELP_DOCUMENTATION_URL; ?>" target="_blank" class="dopbsp-button dopbsp-help"><span class="dopbsp-info dopbsp-help"><?php echo $DOPBSP->text('SETTINGS_NOTIFICATIONS_TEST_METHOD_HELP'); ?><br /><br /><?php echo $DOPBSP->text('HELP_VIEW_DOCUMENTATION'); ?></span></a>
                    </div>
                    
                    <!--
                        Test email.
                    -->
                    <div class="dopbsp-input-wrapper">
                        <label for="DOPBSP-settings-notifications-test-email"><?php echo $DOPBSP->text('SETTINGS_NOTIFICATIONS_TEST_EMAIL'); ?></label>
                        <input type="text" name="DOPBSP-settings-notifications-test-email" id="DOPBSP-settings-notifications-test-email" value="" />
                        <a href="<?php echo DOPBSP_CONFIG_HELP_DOCUMENTATION_URL; ?>" target="_blank" class="dopbsp-button dopbsp-help"><span class="dopbsp-info dopbsp-help"><?php echo $DOPBSP->text('SETTINGS_NOTIFICATIONS_TEST_EMAIL_HELP'); ?><br /><br /><?php echo $DOPBSP->text('HELP_VIEW_DOCUMENTATION'); ?></span></a>
                    </div>
                    
                    <!--
                        Submit button.
                    -->
                    <div class="dopbsp-input-wrapper dopbsp-last">
                        <label>&nbsp;</label>
                        <input type="button" name="DOPBSP-settings-test-submit" id="DOPBSP-settings-test-submit" value="<?php echo $DOPBSP->text('SETTINGS_NOTIFICATIONS_TEST_SUBMIT'); ?>" onclick="DOPBSPSettingsNotifications.test()" />
                    </div>
                </div>
<?php
            }
        }
    }