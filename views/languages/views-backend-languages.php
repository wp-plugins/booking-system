<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : views/languages/views-backend-languages.php
* File Version            : 1.0
* Created / Last Modified : 02 December 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end languages views class.
*/

    if (!class_exists('DOPBSPViewsBackEndLanguages')){
        class DOPBSPViewsBackEndLanguages extends DOPBSPViewsBackEnd{
            /*
             * Constructor
             */
            function DOPBSPViewsBackEndLanguages(){
            }
            
            /*
             * Returns languages template.
             * 
             * @param args (array): function arguments
             *                      * languages (string): languages list
             * 
             * @return languages HTML list
             */
            function template($args = array()){
                global $DOPBSP;
                
                $languages = $args['languages'];
?>
                <table class="dopbsp-languages">
                    <colgroup>
                        <col />
                        <col class="dopbsp-separator" />
                        <col />
                        <col class="dopbsp-separator" />
                        <col />
                        <col class="dopbsp-separator" />
                        <col />
                        </colgroup>
                        <tbody>
<?php
                $i = 0;
                
                foreach ($languages as $language){
                    $i++;
                    
                    if ($i%4 == 1){
                        echo '<tr>';
                    }
                    
                    if ($i%4 != 1){
                        echo '  <td class="dopbsp-separator"></td>';
                    }
?>
                                <td>
                                    <div class="dopbsp-input-wrapper">
                                        <label class="dopbsp-for-switch"><?php echo $language->name; ?></label>
<?php                    
                    if ($language->code != DOPBSP_CONFIG_TRANSLATION_DEFAULT_LANGUAGE){
?>
                                        <div class="dopbsp-switch">
                                            <input type="checkbox" name="DOPBSP-translation-language-<?php echo $language->code; ?>" id="DOPBSP-translation-language-<?php echo $language->code; ?>" class="dopbsp-switch-checkbox"<?php echo $language->enabled == 'true' ? ' checked="checked"':''; ?>" onchange="DOPBSPLanguage.set('<?php echo $language->code; ?>')" />
                                            <label class="dopbsp-switch-label" for="DOPBSP-translation-language-<?php echo $language->code; ?>">
                                                <div class="dopbsp-switch-inner"></div>
                                                <div class="dopbsp-switch-switch"></div>
                                            </label>
                                        </div>
<?php
                    }
?>
                                    </div>
                                </td>
<?php 
                    if ($i%4 == 0){
                        echo '</tr>';
                    }
                }
                
                switch ($i%4){
                    case 0:
                        echo '</tr>';
                        break;
                    case 1:
?>
                                <td class="dopbsp-separator"></td>
                                <td></td>
                                <td class="dopbsp-separator"></td>
                                <td></td>
                                <td class="dopbsp-separator"></td>
                                <td></td>
                            </tr>
<?php
                        break;
                    case 2:
?>
                                <td class="dopbsp-separator"></td>
                                <td></td>
                                <td class="dopbsp-separator"></td>
                                <td></td>
                            </tr>
<?php
                        break;
                    case 3:
?>
                                <td class="dopbsp-separator"></td>
                                <td></td>
                            </tr>
<?php
                        break;
                }
?>      
                    </tbody>
                </table>
                <style type="text/css">
                    .DOPBSP-admin .dopbsp-input-wrapper .dopbsp-switch .dopbsp-switch-inner:before{content: "<?php echo $DOPBSP->text('SETTINGS_ENABLED'); ?>";}
                    .DOPBSP-admin .dopbsp-input-wrapper .dopbsp-switch .dopbsp-switch-inner:after{content: "<?php echo $DOPBSP->text('SETTINGS_DISABLED'); ?>";}
                </style>
<?php
            }
        }
    }