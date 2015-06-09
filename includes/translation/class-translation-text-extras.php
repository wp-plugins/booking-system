<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : includes/translation/class-translation-text-extras.php
* File Version            : 1.0.2
* Created / Last Modified : 12 December 2014
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System extras translation text PHP class.
*/

    if (!class_exists('DOPBSPTranslationTextExtras')){
        class DOPBSPTranslationTextExtras{
            /*
             * Constructor
             */
            function DOPBSPTranslationTextExtras(){
                /*
                 * Initialize extras text.
                 */
                add_filter('dopbsp_filter_translation_text', array(&$this, 'extras'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'extrasDefault'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'extrasExtra'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'extrasAddExtra'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'extrasDeleteExtra'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'extrasExtraGroups'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'extrasExtraGroup'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'extrasExtraAddGroup'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'extrasExtraDeleteGroup'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'extrasExtraGroupItems'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'extrasExtraGroupItem'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'extrasExtraGroupAddItem'));
                add_filter('dopbsp_filter_translation_text', array(&$this, 'extrasExtraGroupDeleteItem'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'extrasHelp'));
                
                add_filter('dopbsp_filter_translation_text', array(&$this, 'extrasFrontEnd'));
            }
            
            /*
             * Extras text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function extras($text){
                array_push($text, array('key' => 'PARENT_EXTRAS',
                                        'parent' => '',
                                        'text' => 'Extras'));
                
                array_push($text, array('key' => 'EXTRAS_TITLE',
                                        'parent' => 'PARENT_EXTRAS',
                                        'text' => 'Extras'));
                array_push($text, array('key' => 'EXTRAS_CREATED_BY',
                                        'parent' => 'PARENT_EXTRAS',
                                        'text' => 'Created by'));
                array_push($text, array('key' => 'EXTRAS_LOAD_SUCCESS',
                                        'parent' => 'PARENT_EXTRAS',
                                        'text' => 'Extras list loaded.'));
                array_push($text, array('key' => 'EXTRAS_NO_EXTRAS',
                                        'parent' => 'PARENT_EXTRAS',
                                        'text' => 'No extras. Click the above "plus" icon to add a new one.'));
                
                return $text;
            }
            
            /*
             * Extras default text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function extrasDefault($text){
                array_push($text, array('key' => 'PARENT_EXTRAS_DEFAULT',
                                        'parent' => '',
                                        'text' => 'Extras - Default data'));
                
                array_push($text, array('key' => 'EXTRAS_DEFAULT_PEOPLE',
                                        'parent' => 'PARENT_EXTRAS_DEFAULT',
                                        'text' => 'People'));
                array_push($text, array('key' => 'EXTRAS_DEFAULT_ADULTS',
                                        'parent' => 'PARENT_EXTRAS_DEFAULT',
                                        'text' => 'Adults'));
                array_push($text, array('key' => 'EXTRAS_DEFAULT_CHILDREN',
                                        'parent' => 'PARENT_EXTRAS_DEFAULT',
                                        'text' => 'Children'));
                
                return $text;
            }
            
            /*
             * Extras - Extra text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function extrasExtra($text){
                array_push($text, array('key' => 'PARENT_EXTRAS_EXTRA',
                                        'parent' => '',
                                        'text' => 'Extras - Extra'));
                
                array_push($text, array('key' => 'EXTRAS_EXTRA_NAME',
                                        'parent' => 'PARENT_EXTRAS_EXTRA',
                                        'text' => 'Name'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_LANGUAGE',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_GROUP',
                                        'text' => 'Language'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_LOADED',
                                        'parent' => 'PARENT_EXTRAS_EXTRA',
                                        'text' => 'Extra loaded.'));
                
                return $text;
            }
            
            /*
             * Extras - Add extra text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function extrasAddExtra($text){
                array_push($text, array('key' => 'PARENT_EXTRAS_ADD_EXTRA',
                                        'parent' => '',
                                        'text' => 'Extras - Add extra'));
                
                array_push($text, array('key' => 'EXTRAS_ADD_EXTRA_NAME',
                                        'parent' => 'PARENT_EXTRAS_ADD_EXTRA',
                                        'text' => 'New extra'));
                array_push($text, array('key' => 'EXTRAS_ADD_EXTRA_SUBMIT',
                                        'parent' => 'PARENT_EXTRAS_ADD_EXTRA',
                                        'text' => 'Add extra'));
                array_push($text, array('key' => 'EXTRAS_ADD_EXTRA_ADDING',
                                        'parent' => 'PARENT_EXTRAS_ADD_EXTRA',
                                        'text' => 'Adding a new extra ...'));
                array_push($text, array('key' => 'EXTRAS_ADD_EXTRA_SUCCESS',
                                        'parent' => 'PARENT_EXTRAS_ADD_EXTRA',
                                        'text' => 'You have succesfully added a new extra.'));
                
                return $text;
            }
            
            /*
             * Extras - Delete extra text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function extrasDeleteExtra($text){
                array_push($text, array('key' => 'PARENT_EXTRAS_DELETE_EXTRA',
                                        'parent' => '',
                                        'text' => 'Extras - Delete extra'));
                
                array_push($text, array('key' => 'EXTRAS_DELETE_EXTRA_CONFIRMATION',
                                        'parent' => 'PARENT_EXTRAS_DELETE_EXTRA',
                                        'text' => 'Are you sure you want to delete this extra?'));
                array_push($text, array('key' => 'EXTRAS_DELETE_EXTRA_SUBMIT',
                                        'parent' => 'PARENT_EXTRAS_DELETE_EXTRA',
                                        'text' => 'Delete extra'));
                array_push($text, array('key' => 'EXTRAS_DELETE_EXTRA_DELETING',
                                        'parent' => 'PARENT_EXTRAS_DELETE_EXTRA',
                                        'text' => 'Deleting extra ...'));
                array_push($text, array('key' => 'EXTRAS_DELETE_EXTRA_SUCCESS',
                                        'parent' => 'PARENT_EXTRAS_DELETE_EXTRA',
                                        'text' => 'You have succesfully deleted the extra.'));
                
                return $text;
            }
            
            /*
             * Extras - Extra groups text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function extrasExtraGroups($text){
                array_push($text, array('key' => 'PARENT_EXTRAS_EXTRA_GROUPS',
                                        'parent' => '',
                                        'text' => 'Extras - Extra groups'));
                
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUPS',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_GROUPS',
                                        'text' => 'Extra fields'));
                
                return $text;
            }
            
            /*
             * Extras - Extra group text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function extrasExtraGroup($text){
                array_push($text, array('key' => 'PARENT_EXTRAS_EXTRA_GROUP',
                                        'parent' => '',
                                        'text' => 'Extras - Extra group'));
                
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_SHOW_SETTINGS',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_GROUP',
                                        'text' => 'Show settings'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_HIDE_SETTINGS',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_GROUP',
                                        'text' => 'Hide settings'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_SORT',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_GROUP',
                                        'text' => 'Sort'));
                /*
                 * Settings labels.
                 */
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_LABEL_LABEL',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_GROUP',
                                        'text' => 'Label'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_REQUIRED_LABEL',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_GROUP',
                                        'text' => 'Required'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_MULTIPLE_SELECT_LABEL',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_GROUP',
                                        'text' => 'Multiple select'));
                
                return $text;
            }
            
            /*
             * Extras - Add extra group text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function extrasExtraAddGroup($text){
                array_push($text, array('key' => 'PARENT_EXTRAS_EXTRA_ADD_GROUP',
                                        'parent' => '',
                                        'text' => 'Extras - Add extra group'));
                
                array_push($text, array('key' => 'EXTRAS_EXTRA_ADD_GROUP_SUBMIT',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_ADD_GROUP',
                                        'text' => 'Add group'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_ADD_GROUP_LABEL',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_ADD_GROUP',
                                        'text' => 'New group'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_ADD_GROUP_ADDING',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_ADD_GROUP',
                                        'text' => 'Adding a new extra group ...'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_ADD_GROUP_SUCCESS',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_ADD_GROUP',
                                        'text' => 'You have succesfully added a new extra group.'));
                
                return $text;
            }
            
            /*
             * Extras - Delete extra group text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function extrasExtraDeleteGroup($text){
                array_push($text, array('key' => 'PARENT_EXTRAS_EXTRA_DELETE_GROUP',
                                        'parent' => '',
                                        'text' => 'Extras - Delete extra group'));
                
                array_push($text, array('key' => 'EXTRAS_EXTRA_DELETE_GROUP_CONFIRMATION',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_DELETE_GROUP',
                                        'text' => 'Are you sure you want to delete this extra group?'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_DELETE_GROUP_SUBMIT',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_DELETE_GROUP',
                                        'text' => 'Delete'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_DELETE_GROUP_DELETING',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_DELETE_GROUP',
                                        'text' => 'Deleting extra group ...'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_DELETE_GROUP_SUCCESS',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_DELETE_GROUP',
                                        'text' => 'You have succesfully deleted the extra group.'));
                
                return $text;
            }
            
            /*
             * Extras - Extra group items text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function extrasExtraGroupItems($text){
                array_push($text, array('key' => 'PARENT_EXTRAS_EXTRA_GROUP_ITEMS',
                                        'parent' => '',
                                        'text' => 'Extras - Extra group - Items'));
                
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_ITEMS_LABEL',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_GROUP_ITEMS',
                                        'text' => 'Items'));
                
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_ITEMS_LABELS_LABEL',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_GROUP_ITEMS',
                                        'text' => 'Label'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_ITEMS_LABELS_OPERATION',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_GROUP_ITEMS',
                                        'text' => 'Operation'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_ITEMS_LABELS_PRICE',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_GROUP_ITEMS',
                                        'text' => 'Price/Percent'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_ITEMS_LABELS_PRICE_TYPE',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_GROUP_ITEMS',
                                        'text' => 'Price type'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_ITEMS_LABELS_PRICE_BY',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_GROUP_ITEMS',
                                        'text' => 'Price by'));
                                    
                return $text;
            }
            
            /*
             * Extras - Extra group item text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function extrasExtraGroupItem($text){
                array_push($text, array('key' => 'PARENT_EXTRAS_EXTRA_GROUP_ITEM',
                                        'parent' => '',
                                        'text' => 'Extras - Extra group - Item'));
                
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_ITEMS_PRICE_TYPE_FIXED',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_GROUP_ITEM',
                                        'text' => 'Fixed'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_ITEMS_PRICE_TYPE_PERCENT',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_GROUP_ITEM',
                                        'text' => 'Percent'));
                
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_ITEMS_PRICE_BY_ONCE',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_GROUP_ITEM',
                                        'text' => 'Once'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_ITEMS_PRICE_BY_PERIOD',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_GROUP_ITEM',
                                        'text' => 'day/hour'));
                
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_ITEM_SORT',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_GROUP_ITEM',
                                        'text' => 'Sort'));
                
                return $text;
            }
            
            /*
             * Extras - Add extra group item text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function extrasExtraGroupAddItem($text){
                array_push($text, array('key' => 'PARENT_EXTRAS_EXTRA_GROUP_ADD_ITEM',
                                        'parent' => '',
                                        'text' => 'Extras - Extra group - Add item'));
                
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_ADD_ITEM_LABEL',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_GROUP_ADD_ITEM',
                                        'text' => 'New item'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_ADD_ITEM_SUBMIT',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_GROUP_ADD_ITEM',
                                        'text' => 'Add item'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_ADD_ITEM_ADDING',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_GROUP_ADD_ITEM',
                                        'text' => 'Adding a new item ...'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_ADD_ITEM_SUCCESS',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_GROUP_ADD_ITEM',
                                        'text' => 'You have succesfully added a new item.'));
                
                return $text;
            }
            
            /*
             * Extras - Delete extra group item text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function extrasExtraGroupDeleteItem($text){
                array_push($text, array('key' => 'PARENT_EXTRAS_EXTRA_GROUP_DELETE_ITEM',
                                        'parent' => '',
                                        'text' => 'Extras - Extra group - Delete item'));
                
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_DELETE_ITEM_CONFIRMATION',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_GROUP_DELETE_ITEM',
                                        'text' => 'Are you sure you want to delete this  item?'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_DELETE_ITEM_SUBMIT',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_GROUP_DELETE_ITEM',
                                        'text' => 'Delete'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_DELETE_ITEM_DELETING',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_GROUP_DELETE_ITEM',
                                        'text' => 'Deleting  item ...'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_DELETE_ITEM_SUCCESS',
                                        'parent' => 'PARENT_EXTRAS_EXTRA_GROUP_DELETE_ITEM',
                                        'text' => 'You have succesfully deleted the  item.'));
                
                return $text;
            }
            
            /*
             * Extras - Help text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function extrasHelp($text){
                array_push($text, array('key' => 'PARENT_EXTRAS_HELP',
                                        'parent' => '',
                                        'text' => 'Extras - Help'));
                
                array_push($text, array('key' => 'EXTRAS_HELP',
                                        'parent' => 'PARENT_EXTRAS_HELP',
                                        'text' => 'Click on a extra item to open the editing area.'));
                array_push($text, array('key' => 'EXTRAS_ADD_EXTRA_HELP',
                                        'parent' => 'PARENT_EXTRAS_HELP',
                                        'text' => 'Click on the "plus" icon to add a extra.'));
                
                /*
                 * Extra help.
                 */
                array_push($text, array('key' => 'EXTRAS_EXTRA_NAME_HELP',
                                        'parent' => 'PARENT_EXTRAS_HELP',
                                        'text' => 'Change extra name.'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_LANGUAGE_HELP',
                                        'parent' => 'PARENT_EXTRAS_HELP',
                                        'text' => 'Change to the language you want to edit the extra.'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_ADD_GROUP_HELP',
                                        'parent' => 'PARENT_EXTRAS_HELP',
                                        'text' => 'Click on the bellow "plus" icon to add a new extra group.'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_EDIT_GROUP_HELP',
                                        'parent' => 'PARENT_EXTRAS_HELP',
                                        'text' => 'Click the group "expand" icon to display/hide the settings.'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_DELETE_GROUP_HELP',
                                        'parent' => 'PARENT_EXTRAS_HELP',
                                        'text' => 'Click the group "trash" icon to delete it.'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_SORT_GROUP_HELP',
                                        'parent' => 'PARENT_EXTRAS_HELP',
                                        'text' => 'Drag the group "arrows" icon to sort it.'));
                /*
                 * Extra group help.
                 */
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_LABEL_HELP',
                                        'parent' => 'PARENT_EXTRAS_HELP',
                                        'text' => 'Enter group label.'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_REQUIRED_HELP',
                                        'parent' => 'PARENT_EXTRAS_HELP',
                                        'text' => 'Enable it if you want the group to be mandatory.'));
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_MULTIPLE_SELECT_HELP',
                                        'parent' => 'PARENT_EXTRAS_HELP',
                                        'text' => 'Enable it if you want multiple selection.'));
                
                array_push($text, array('key' => 'EXTRAS_EXTRA_GROUP_ITEMS_HELP',
                                        'parent' => 'PARENT_EXTRAS_HELP',
                                        'text' => 'Click the "plus" icon to add another item and enter the name and price conditions. Click on the "delete" icon to remove the item.'));
                
                return $text;
            }
            
            /*
             * Extras front end text.
             * 
             * @param lang (array): current translation
             * 
             * @return array with updated translation
             */
            function extrasFrontEnd($text){
                array_push($text, array('key' => 'PARENT_EXTRAS_FRONT_END',
                                        'parent' => '',
                                        'text' => 'Extras - Front end'));
                
                array_push($text, array('key' => 'EXTRAS_FRONT_END_TITLE',
                                        'parent' => 'PARENT_EXTRAS_FRONT_END',
                                        'text' => 'Extras'));
                array_push($text, array('key' => 'EXTRAS_FRONT_END_BY_DAY',
                                        'parent' => 'PARENT_EXTRAS_FRONT_END',
                                        'text' => 'day'));
                array_push($text, array('key' => 'EXTRAS_FRONT_END_BY_HOUR',
                                        'parent' => 'PARENT_EXTRAS_FRONT_END',
                                        'text' => 'hour'));
                array_push($text, array('key' => 'EXTRAS_FRONT_END_INVALID',
                                        'parent' => 'PARENT_EXTRAS_FRONT_END',
                                        'text' => 'Select an option from'));
                
                return $text;
            }
        }
    }