<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : views/dashboard/views-backend-dashboard.php
* File Version            : 1.0.3
* Created / Last Modified : 13 October 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end dashboard views class.
*/

    if (!class_exists('DOPBSPViewsBackEndDashboard')){
        class DOPBSPViewsBackEndDashboard extends DOPBSPViewsBackEnd{
            /*
             * Constructor
             */
            function DOPBSPViewsBackEndDashboard(){
            }
            
            /*
             * Returns dashboard template.
             * 
             * @param args (array): function arguments
             * 
             * @return dashboard HTML page
             */
            function template($args = array()){
                global $DOPBSP;
                
                $this->getTranslation();
?>            
    <div class="wrap DOPBSP-admin">
        
<!-- 
    Header
-->
        <?php $this->displayHeader($DOPBSP->text('TITLE'), $DOPBSP->text('DASHBOARD_TITLE')); ?>

<!--
    Content
-->
        <div class="dopbsp-main dopbsp-hidden">
<?php
                /*
                 * Dashboard start template.
                 */
                $DOPBSP->views->backend_dashboard_start->template();
                
                /*
                 * Dashboard server template.
                 */
                $DOPBSP->views->backend_dashboard_server->template($args);
?>
        </div>
    </div>       
<?php
            }
        }
    }