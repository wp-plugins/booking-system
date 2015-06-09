<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/extras/class-frontend-extras.php
* File Version            : 1.0.1
* Created / Last Modified : 25 January 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System front end extras PHP class.
*/

    if (!class_exists('DOPBSPFrontEndExtras')){
        class DOPBSPFrontEndExtras extends DOPBSPFrontEnd{
            /*
             * Constructor.
             */
            function DOPBSPFrontEndExtras(){
            }
            
            /*
             * Get selected extra.
             * 
             * @param id (integer): extra ID
             * @param language (string): selected language
             * 
             * @return data array
             */
            function get($id,
                         $language = DOPBSP_CONFIG_TRANSLATION_DEFAULT_LANGUAGE){
                global $wpdb;
                global $DOPBSP;
                
                /*
                 * Get extra groups.
                 */
                $groups = $wpdb->get_results($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->extras_groups.' WHERE extra_id=%d ORDER BY position',
                                                            $id));
                
                foreach ($groups as $group){
                    $group->translation = $DOPBSP->classes->translation->decodeJSON($group->translation,
                                                                                    $language);
                    
                    $items = $wpdb->get_results($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->extras_groups_items.' WHERE group_id=%d ORDER BY position',
                                                               $group->id));

                    foreach ($items as $item){
                        $item->translation = $DOPBSP->classes->translation->decodeJSON($item->translation,
                                                                                       $language);
                    }
                    $group->group_items = $items;
                }
                
                return array('data' => array('extra' => $groups,
                                             'id' => $id),
                             'text' => array('byDay' => $DOPBSP->text('EXTRAS_FRONT_END_BY_DAY'),
                                             'byHour' => $DOPBSP->text('EXTRAS_FRONT_END_BY_HOUR'),
                                             'invalid' => $DOPBSP->text('EXTRAS_FRONT_END_INVALID'),
                                             'title' => $DOPBSP->text('EXTRAS_FRONT_END_TITLE')));
            }
        }
    }