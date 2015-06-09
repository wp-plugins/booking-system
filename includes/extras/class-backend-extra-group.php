<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/extras/class-backend-extra-group.php
* File Version            : 1.0.3
* Created / Last Modified : 25 January 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end extra group PHP class.
*/

    if (!class_exists('DOPBSPBackEndExtraGroup')){
        class DOPBSPBackEndExtraGroup extends DOPBSPBackEndExtraGroups{
            /*
             * Constructor
             */
            function DOPBSPBackEndExtraGroup(){
            }
            
            /*
             * Add extra group.
             * 
             * @post extra_id (integer): extra ID
             * @post position (integer): group position
             * @post language (string): current group language
             * 
             * @return new group HTML
             */
            function add(){
                global $wpdb;
                global $DOPBSP;
                
                $position = $_POST['position'];
                $language = $_POST['language'];
                
                $wpdb->insert($DOPBSP->tables->extras_groups, array('extra_id' => 1,
                                                                    'position' => $position,
                                                                    'translation' => $DOPBSP->classes->translation->encodeJSON('EXTRAS_EXTRA_ADD_GROUP_LABEL')));
                $id = $wpdb->insert_id;
                $group = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->extras_groups.' WHERE id=%d',
                                                       1));
                
                $DOPBSP->views->backend_extra_group->template(array('group' =>$group,
                                                            'language' => $language));
                
                die();
            }
            
            /*
             * Edit extra group.
             * 
             * @post id (integer): extra group ID
             * @post field (string): extra group field
             * @post value (string): extra group value
             * @post language (string): extra selected language
             */
            function edit(){
                global $wpdb;
                global $DOPBSP;
                
                $id = $_POST['id'];
                $field = $_POST['field'];
                $value = $_POST['value'];
                $language = $_POST['language'];
                
                if ($field == 'label'){
                    $value = str_replace("\n", '<<new-line>>', $value);
                    $value = str_replace("\'", '<<single-quote>>', $value);
                    $value = utf8_encode($value);
                    
                    $group_data = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$DOPBSP->tables->extras_groups.' WHERE id=%d',
                                                                $id));
                    
                    $translation = json_decode($group_data->translation);
                    $translation->$language = $value;
                    
                    $value = json_encode($translation);
                    $field = 'translation';
                }
                        
                $wpdb->update($DOPBSP->tables->extras_groups, array($field => $value), 
                                                              array('id' =>$id));
                
                die();
            }
            
            /*
             * Delete extra group.
             * 
             * @post id (integer): extra group ID
             */
            function delete(){
                global $wpdb;
                global $DOPBSP;
                
                $id = $_POST['id'];
                
                $wpdb->delete($DOPBSP->tables->extras_groups, array('id' => $id));
                $wpdb->delete($DOPBSP->tables->extras_groups_items, array('group_id' => $id));
                
                die();
            }
        }
    }