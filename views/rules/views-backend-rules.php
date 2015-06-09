<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : views/views-backend-rules.php
* File Version            : 1.0.4
* Created / Last Modified : 13 October 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end rules views class.
*/

    if (!class_exists('DOPBSPViewsBackEndRules')){
        class DOPBSPViewsBackEndRules extends DOPBSPViewsBackEnd{
            /*
             * Constructor
             */
            function DOPBSPViewsBackEndRules(){
            }
            
            /*
             * Returns rules template.
             * 
             * @param args (array): function arguments
             * 
             * @return rules HTML page
             */
            function template($args = array()){
                global $DOPBSP;
                
                $this->getTranslation();
?>            
    <div class="wrap DOPBSP-admin">
        
<!--
    Header
-->
        <?php $this->displayHeader($DOPBSP->text('TITLE'), $DOPBSP->text('RULES_TITLE')); ?>
        <input type="hidden" name="DOPBSP-rule-ID" id="DOPBSP-rule-ID" value="" />
        
<!--
    Content
-->
        <div class="dopbsp-main dopbsp-hidden">
            <table class="dopbsp-content-wrapper">
                <colgroup>
                    <col id="DOPBSP-col-column1" class="dopbsp-column1" />
                    <col id="DOPBSP-col-column-separator1" class="dopbsp-separator" />
                    <col id="DOPBSP-col-column2" class="dopbsp-column2" />
                </colgroup>
                <tbody>
                    <tr>
                        <td class="dopbsp-column" id="DOPBSP-column1">
                            <div class="dopbsp-column-header">
<?php 
                if (isset($_GET['page']) && $DOPBSP->vars->pro_tips){ 
?>                  
                                <a href="?page=dopbsp-pro" class="dopbsp-button dopbsp-add"><span class="dopbsp-info dopbsp-info-blue dopbsp-help"><?php echo $DOPBSP->text('RULES_ADD_RULE_SUBMIT').' - '.$DOPBSP->text('ONLY_IN_PRO_MESSAGE_ONLY'); ?> <span class="dopbsp-pro"><?php echo $DOPBSP->text('ONLY_IN_PRO_MESSAGE_PRO'); ?></span></span></a>
<?php
                }
?>                           
                                <br class="dopbsp-clear" />
                            </div>
                            <div class="dopbsp-column-content">&nbsp;</div>
                        </td>
                        <td id="DOPBSP-column-separator1" class="dopbsp-separator"></td>
                        <td id="DOPBSP-column2" class="dopbsp-column">
                            <div class="dopbsp-column-header">&nbsp;</div>
                            <div class="dopbsp-column-content">&nbsp;</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>       
<?php
            }
        }
    }