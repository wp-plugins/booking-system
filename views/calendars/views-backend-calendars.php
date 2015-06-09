<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : views/calendars/views-backend-calendars.php
* File Version            : 1.0.1
* Created / Last Modified : 13 October 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end calendars views class.
*/

    if (!class_exists('DOPBSPViewsBackEndCalendars')){
        class DOPBSPViewsBackEndCalendars extends DOPBSPViewsBackEnd{
            /*
             * Constructor
             */
            function DOPBSPViewsBackEndCalendars(){
            }
            
            /*
             * Returns calendars template.
             * 
             * @return calendars HTML page
             */
            function template(){
                global $DOPBSP;
                
                $this->getTranslation();
?>            
    <div class="wrap DOPBSP-admin">
<!--
    Header
-->
        <?php $this->displayHeader($DOPBSP->text('TITLE'), $DOPBSP->text('CALENDARS_TITLE')); ?>
        <input type="hidden" name="DOPBSP-calendar-ID" id="DOPBSP-calendar-ID" value="" />
        <input type="hidden" name="DOPBSP-calendar-jump-to-day" id="DOPBSP-calendar-jump-to-day" value="" />
<!--
    Content
-->
        <div class="dopbsp-main dopbsp-hidden">
            <table class="dopbsp-content-wrapper">
                <colgroup>
                    <col id="DOPBSP-col-column1" class="dopbsp-column1" />
                    <col id="DOPBSP-col-column-separator1" class="dopbsp-separator" />
                    <col id="DOPBSP-col-column2" class="dopbsp-column2" />
                    <col id="DOPBSP-col-column-separator2" class="dopbsp-separator" />
                    <col id="DOPBSP-col-column3" class="dopbsp-column3" />
                </colgroup>
                <tbody>
                    <tr>
                        <td id="DOPBSP-column1" class="dopbsp-column">
                            <div class="dopbsp-column-header">
<?php 
    if($DOPBSP->vars->pro_tips) {
?>  
                                <a href="?page=dopbsp-pro" class="dopbsp-button dopbsp-add">
                                    <span class="dopbsp-info dopbsp-info-blue dopbsp-help"><?php echo $DOPBSP->text('CALENDARS_ADD_CALENDAR_SUBMIT').' - '.$DOPBSP->text('ONLY_IN_PRO_MESSAGE_ONLY'); ?> <span class="dopbsp-pro"><?php echo $DOPBSP->text('ONLY_IN_PRO_MESSAGE_PRO'); ?></span></span>
                                </a>
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
                        <td id="DOPBSP-column-separator2" class="dopbsp-separator"></td>
                        <td id="DOPBSP-column3" class="dopbsp-column">
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