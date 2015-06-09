<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : views/reservations/views-backend-reservation-form.php
* File Version            : 1.0.3
* Created / Last Modified : 08 February 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end reservation form views class.
*/

    if (!class_exists('DOPBSPViewsBackEndReservationForm')){
        class DOPBSPViewsBackEndReservationForm extends DOPBSPViewsBackEndReservation{
            /*
             * Constructor
             */
            function DOPBSPViewsBackEndReservationForm(){
            }
            
            /*
             * @param args (array): function arguments
             *                      * reservation (object): reservation data
             */
            function template($args = array()){
                global $DOPBSP;
                
                $reservation = $args['reservation'];
?>
                <div class="dopbsp-data-module">
                    <div class="dopbsp-data-head"> 
                        <h3><?php echo $DOPBSP->text('FORMS_FRONT_END_TITLE'); ?></h3>
                    </div>
                    <div class="dopbsp-data-body"> 
<?php
                if ($reservation->form != ''){
                    $form = json_decode(utf8_decode($reservation->form));

                    for ($i=0; $i<count($form); $i++){
                        if (!is_array($form[$i])){
                            $form_item = get_object_vars($form[$i]);
                        }
                        else{
                            $form_item = $form[$i];
                        }

                        if (is_array($form_item['value'])){
                            $values = array();

                            foreach ($form_item['value'] as $value){
                                array_push($values, $value->translation);
                            }
                            $this->displayData($form_item['translation'],
                                               implode('<br />', $values));
                        }
                        else{
                            if ($form_item['value'] == 'true'){
                                $value = $DOPBSP->text('FORMS_FORM_FIELD_TYPE_CHECKBOX_CHECKED_LABEL');
                            }
                            elseif ($form_item['value'] == 'false'){
                                $value = $DOPBSP->text('FORMS_FORM_FIELD_TYPE_CHECKBOX_UNCHECKED_LABEL');
                            }
                            else{
                                $value = isset($form_item['is_email']) && $form_item['is_email'] == 'true' ? '<a href="mailto:'.$form_item['value'].'">'.$form_item['value'].'</a>':
                                                                                                             $form_item['value'];
                            }
                            $this->displayData($form_item['translation'],
                                               $value != '' ? $value:$DOPBSP->text('RESERVATIONS_RESERVATION_NO_FORM_FIELD'),
                                               $value != '' ? '':'dopbsp-no-data');
                        }
                    }
                }
                else{
                    echo '<em>'.$DOPBSP->text('RESERVATIONS_RESERVATION_NO_FORM').'</em>';
                }
?>
                    </div>
                </div>
<?php
            }
        }
    }