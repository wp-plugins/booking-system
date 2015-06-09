<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : views/amenities/views-backend-amenities.php
* File Version            : 1.0
* Created / Last Modified : 13 October 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end amenities views class.
*/

    if (!class_exists('DOPBSPViewsBackEndAmenities')){
        class DOPBSPViewsBackEndAmenities extends DOPBSPViewsBackEnd{
            /*
             * Constructor
             */
            function DOPBSPViewsBackEndAmenities(){
            }
            
            /*
             * Returns amenities template.
             * 
             * @return amenities HTML page
             */
            function template(){
                global $DOPBSP;
                
                $this->getTranslation();
?>            
    <div class="wrap DOPBSP-admin">
        
<!--
    Header
-->
        <?php $this->displayHeader($DOPBSP->text('TITLE'), $DOPBSP->text('AMENITIES_TITLE'), $DOPBSP->text('SOON_TITLE')); ?>

<!-- 
    Content
-->
        <div class="dopbsp-main dopbsp-hidden">
        </div>
    </div>       
<?php
            }
        }
    }