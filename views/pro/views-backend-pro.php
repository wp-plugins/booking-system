<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : views/pro/views-backend-pro.php
* File Version            : 1.0.3
* Created / Last Modified : 13 October 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end pro views class.
*/

    if (!class_exists('DOPBSPViewsBackEndPRO')){
        class DOPBSPViewsBackEndPRO extends DOPBSPViewsBackEnd{
            /*
             * Constructor
             */
            function DOPBSPViewsBackEndPRO(){
            }
            
            /*
             * Returns pro template.
             * 
             * @param args (array): function arguments
             * 
             * @return pro HTML page
             */
            function template($args = array()){
                global $DOPBSP;
                
                $this->getTranslation();
?>            
    <div class="wrap DOPBSP-admin">
        
<!-- 
    Header
-->
        <?php $this->displayHeader($DOPBSP->text('TITLE'), 'Why choose PRO ?'); ?>

<!--
    Content
-->
        <div class="dopbsp-main dopbsp-hidden">
<?php
                /*
                 * PRO features template.
                 */
                $DOPBSP->views->backend_pro_features->template();
?>
        </div>
    </div>       
<?php
            }
        }
    }