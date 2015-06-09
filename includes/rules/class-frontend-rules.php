<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/extras/class-frontend-rules.php
* File Version            : 1.0.1
* Created / Last Modified : 25 January 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System front end rules PHP class.
*/

    if (!class_exists('DOPBSPFrontEndRules')){
        class DOPBSPFrontEndRules extends DOPBSPFrontEnd{
            /*
             * Constructor.
             */
            function DOPBSPFrontEndRules(){
            }
            
            /*
             * Get selected rule.
             * 
             * @param id (integer): rule ID
             * 
             * @return data array
             */
            function get($id){
                global $wpdb;
                global $DOPBSP;
                
                $rule = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->rules.' WHERE id=%d ORDER BY id',
                                                      $id));
                
                return array('data' => array('rule' => $rule,
                                             'id' => $id),
                             'text' => array('maxTimeLapseDaysWarning' => $DOPBSP->text('RULES_FRONT_END_MAX_TIME_LAPSE_DAYS_WARNING'),
                                             'maxTimeLapseHoursWarning' => $DOPBSP->text('RULES_FRONT_END_MAX_TIME_LAPSE_HOURS_WARNING'),
                                             'minTimeLapseDaysWarning' => $DOPBSP->text('RULES_FRONT_END_MIN_TIME_LAPSE_DAYS_WARNING'),
                                             'minTimeLapseHoursWarning' => $DOPBSP->text('RULES_FRONT_END_MIN_TIME_LAPSE_HOURS_WARNING')));
            }
        }
    }