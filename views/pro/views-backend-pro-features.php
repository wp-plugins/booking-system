<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : views/pro/views-backend-pro-features.php
* File Version            : 1.0.6
* Created / Last Modified : 19 January 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System back end pro views class.
*/

    if (!class_exists('DOPBSPViewsBackEndPROFeatures')){
        class DOPBSPViewsBackEndPROFeatures extends DOPBSPViewsBackEndPRO{
            /*
             * Constructor
             */
            function DOPBSPViewsBackEndPROFeatures(){
            }
            
            /*
             * Returns pro features template.
             * 
             * @param args (array): function arguments
             * 
             * @return pro features HTML template
             */
            function template($args = array()){
                global $DOPBSP;
?>            
            <section class="dopbsp-content-wrapper">
                <h3>Features</h3>
                <p>The booking system comes with a huge set of amazing features.
View the list, compare standard and pro versions, and decide which is best suited for your needs.</p>
                
                <div id="DOPBSP-get-features-all" class="DOPBSP-pro-tips dopbsp-left">
                    
                    <table class="doptable features">
                        <colgroup>
                        <col>
                        <col>
                        <col>
                        </colgroup>
                        <thead>
                        <tr>
                        <th>Features</th>
                        <th>Standard</th>
                        <th>PRO</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        <td>
                        <h5 class="title">Pricing</h5>
                        </td>
                        <td>
                        <h6>FREE</h6>
                        <p>            <a href="https://wordpress.org/plugins/booking-system/" target="_blank" class="download">Download it</a>
                                </p></td>
                        <td>
                        <h6>44$</h6>
                        <p>            <a href="http://wordpressbooking.systems/redirect/?action=buy-from-features" target="_blank" class="buy">Buy Now</a>
                                </p></td>
                        </tr>
                        <tr>
                        <td>
                        <h5 class="green">Booking calendar</h5>
                        <ul class="doplist green">
                        <li>A booking calendar is displayed in front end, where clients can view availability and can make reservations &amp; appointments.</li>
                        <li>All administrators &amp; users can create an unlimited number of booking calendars.</li>
                        <li>Booking can be stopped x minutes/hours/days in advance.</li>
                        <li>Clients can click on the calendar’s days and/or hours to select the booking period they want.</li>
                        <li>Clients can select to display multiple or fewer months for better visualization. The number of months to be initially displayed can be set from calendar settings.</li>
                        <li>Front end booking calendar is responsive and can be viewed on all browsers and devices.</li>
                        <li>Only the calendar can be be displayed so that your users can check only availability.</li>
                        <li>Support for Terms &amp; Conditions.</li>
                        <li>The booking calendar is AJAX powered, so there is no need to refresh the page to do a reservation, update schedule …</li>
                        <li>The booking calendar contains a sidebar where clients can search availability, they can select the number of rooms/items they want, can select extras &amp; services, can use coupons/vouchers, can view reservation summary with discounts &amp; taxes/fees and can enter their details in a customizable form.</li>
                        <li>The calendar’s sidebar view is customizable.</li>
                        <li>The check in/out dates can be in american (MM DD, YYYY) or european (DD MM YYYY) format.</li>
                        <li>The back end booking calendar is similar to the front end version so that administrators can have a very familiar way to add information … <em>what they see the clients see.</em></li>
                        <li>You can create an unlimited number of calendars</li>
                        </ul>
                                </td>
                        <td><span class="icon-limited" title="Only one"></span></td>
                        <td><span class="icon-infinite" title="Unlimited"></span></td>
                        </tr>
                        <tr>
                        <td>
                        <h5 class="green">Book days</h5>
                        <ul class="doplist green">
                        <li>Add price, promo price, number of items available and information for each day in the front end booking calendar. In the back end booking calendar administrators can add notes to themselves or other administrators.</li>
                        <li>Days are displayed in the booking calendar with the following statuses: None, Available, Booked, Special, Unavailable.</li>
                        <li>One or more days can be selected.</li>
                        <li>Set price &amp; status for groups of days. Multiple groups can be booked together.</li>
                        <li>Set the first day of the week that will appear in the booking calendar.</li>
                        <li>Set general available/unavailable weekdays.</li>
                        <li>Support for morning check out. It will display information in the Booking Calendar if you need to check in in the afternoon and check out in the morning. This option is very useful for hotels.</li>
                        </ul>
                                </td>
                        <td><span class="icon-available" title="Available"></span></td>
                        <td><span class="icon-available" title="Available"></span></td>
                        </tr>
                        <tr>
                        <td>
                        <h5 class="green">Book hours</h5>
                        <ul class="doplist green">
                        <li>Add price, promo price, number of items available and information for each hour in the front end booking calendar. In the back end booking calendar administrators can add notes to themselves or other administrators.</li>
                        <li>One or more hours can be selected.</li>
                        <li>Hours can be in AM/PM or 24 hours format.</li>
                        <li>Hours intervals are supported.</li>
                        <li>Set price &amp; status for groups of hours. Multiple groups can be booked together.</li>
                        <li>The hours are displayed in the Booking Calendar with the following statuses: None, Available, Booked, Special, Unavailable.</li>
                        <li>You have complete control to what hours you are using in your booking calendar. You can set same hours by the minute for the whole calendar or you can set different hours for different days.</li>
                        </ul>
                                </td>
                        <td><span class="icon-available" title="Available"></span></td>
                        <td><span class="icon-available" title="Available"></span></td>
                        </tr>
                        <tr>
                        <td>
                        <h5 class="green">Extend with WooCommerce</h5>
                        <ul class="doplist green">
                        <li>Configure calendar availability, services, discounts … and attach it to a product.</li>
                        <li>Add bookings to cart and use WooCommerce Extensions for coupons, deposits, taxes and more.</li>
                        <li>And the most important part … you can use all the payment gateways offered by WooCommerce.</li>
                        </ul>
                                </td>
                        <td><span class="icon-available" title="Available"></span></td>
                        <td><span class="icon-available" title="Available"></span></td>
                        </tr>
                        <tr>
                        <td>
                        <h5 class="green">Multi language support for front end &amp; back end</h5>
                        <ul class="doplist green">
                        <li>All booking system text is changeable (calendars, extras, form fields, taxes …).</li>
                        <li>Change translation or text in back end with an easy “to do” translation tool.</li>
                        <li>Enable/disable languages.</li>
                        <li>You can add your own language.</li>
                        <li><strong>Note:</strong> Not all languages are translated.</li>
                        </ul>
                                </td>
                        <td><span class="icon-available" title="Available"></span></td>
                        <td><span class="icon-available" title="Available"></span></td>
                        </tr>
                        <tr>
                        <td>
                        <h5 class="green">Multi currency support</h5>
                        <ul class="doplist green">
                        <li>Any currency can be used with your booking calendar.</li>
                        <li>Currency can be positioned before or after price.</li>
                        <li>You can add your own currency.</li>
                        </ul>
                                </td>
                        <td><span class="icon-available" title="Available"></span></td>
                        <td><span class="icon-available" title="Available"></span></td>
                        </tr>
                        <tr>
                        <td>
                        <h5 class="green">Reservations</h5>
                        <ul class="doplist green">
                        <li>Administrators have the possibility to add, approve, reject, cancel or delete a booking request (reservation).</li>
                        <li>Administrators have the possibility to filter and/or search throw booking requests (reservations).</li>
                        <li>Booking requests (reservations) can be instantly approved or can be approved/rejected by administrators. The boking calendar will be changed accordingly.</li>
                        <li>Booking requests (reservations) cannot overlap.</li>
                        <li>Reservations are displayed in a list or in a calendar.</li>
                        </ul>
                                </td>
                        <td><span class="icon-available" title="Available"></span></td>
                        <td><span class="icon-available" title="Available"></span></td>
                        </tr>
                        <tr>
                        <td>
                        <h5 class="green">Booking rules</h5>
                        <ul class="doplist green">
                        <li>Set minimum &amp; maximum number of days/hours/minutes that are permitted in a booking request (reservation).</li>
                        </ul>
                                </td>
                        <td><span class="icon-limited" title="Only one"></span></td>
                        <td><span class="icon-infinite" title="Unlimited"></span></td>
                        </tr>
                        <tr>
                        <td>
                        <h5 class="green">Extras (amenities, services &amp; other stuff)</h5>
                        <ul class="doplist green">
                        <li>Add amenities, services &amp; other stuff, with price or not, to a booking request (reservation).</li>
                        <li>Extras groups can be mandatory or not and a client can select a single or multiple items.</li>
                        <li>The value for extras can be negative or positive, fixed or percent, once or by day/hour, or 0.</li>
                        <li>You can create unlimited number of different extras groups, to use with one or multiple calendars.</li>
                        </ul>
                                </td>
                        <td><span class="icon-limited" title="Only one"></span></td>
                        <td><span class="icon-infinite" title="Unlimited"></span></td>
                        </tr>
                        <tr>
                        <td>
                        <h5 class="green">Booking discounts</h5>
                        <ul class="doplist green">
                        <li>Set discounts depending on the number of days/hours/minutes that are in a booking request (reservation).</li>
                        <li>The value for discounts can be negative or positive, fixed or percent, once or by day/hour.</li>
                        <li>You can create unlimited number of different discounts, to use with one or multiple calendars.</li>
                        <li>You can set specific discounts for the date/time for which the booking request (reservation) is made.</li>
                        </ul>
                                </td>
                        <td><span class="icon-limited" title="Only one"></span></td>
                        <td><span class="icon-infinite" title="Unlimited"></span></td>
                        </tr>
                        <tr>
                        <td>
                        <h5 class="green">Taxes &amp; fees</h5>
                        <ul class="doplist green">
                        <li>Add taxes &amp; fees that need to be paid with a booking request (reservation).</li>
                        <li>Taxes &amp; fees included or not in booking request (reservation) price.</li>
                        <li>The value for taxes &amp; fees can be negative or positive, fixed or percent, once or by day/hour.</li>
                        <li>You can choose to include or not extras in the calculation of taxes &amp; fees.</li>
                        <li>You can create unlimited number of taxes &amp; fees, to use with one or multiple calendars.</li>
                        </ul>
                                </td>
                        <td><span class="icon-limited" title="Only one"></span></td>
                        <td><span class="icon-infinite" title="Unlimited"></span></td>
                        </tr>
                        <tr>
                        <td>
                        <h5 class="green">Coupons &amp; vouchers</h5>
                        <ul class="doplist green">
                        <li>Create coupon/voucher codes for your clients.</li>
                        <li>The value for coupons can be negative or positive, fixed or percent, once or by day/hour.</li>
                        <li>You can set date/time when the coupons can be used.</li>
                        <li>You can create unlimited number of coupons, to use with one or multiple calendars.</li>
                        </ul>
                                </td>
                        <td><span class="icon-limited" title="Only one"></span></td>
                        <td><span class="icon-infinite" title="Unlimited"></span></td>
                        </tr>
                        <tr>
                        <td>
                        <h5 class="green">Email templates &amp; notifications</h5>
                        <ul class="doplist green">
                        <li>Create email templates for all possible notifications and languages.</li>
                        <li>Enable/disable which notifications should be sent.</li>
                        <li>Notifications can be sent to multiple admins.</li>
                        <li>Use SMTP to send notifications.</li>
                        <li>You can add reply email &amp; name.</li>
                        <li>You can create unlimited number of email templates, to use with one or multiple calendars.</li>
                        <li>You can set what information should be included in notifications regarding the booking request (reservation).</li>
                        </ul>
                                </td>
                        <td><span class="icon-limited" title="Only one"></span></td>
                        <td><span class="icon-infinite" title="Unlimited"></span></td>
                        </tr>
                        <tr>
                        <td>
                        <h5 class="green">Booking forms</h5>
                        <ul class="doplist green">
                        <li>Create your own custom booking forms to get what information you want from your clients.</li>
                        <li>The booking form supports <strong>Text fields</strong> (email, phone, name etc), <strong>Text areas</strong>, <strong>Checkboxes</strong> &amp; <strong>Drop downs</strong>.</li>
                        <li>You can create unlimited number of booking forms, to use with one or multiple calendars.</li>
                        </ul>
                                </td>
                        <td><span class="icon-limited" title="Only one"></span></td>
                        <td><span class="icon-infinite" title="Unlimited"></span></td>
                        </tr>
                        <tr>
                        <td>
                        <h5 class="green">Payment systems</h5>
                        <ul class="doplist green">
                        <li>Payment can not be mandatory when a client creates a booking request (reservation).</li>
                        <li>Payment can be made when a client arrives at the location he/she booked.</li>
                        <li>PayPal (credit card supported)</li>
                        <li>More coming soon … if you have a request please do not hesitate to tell us.</li>
                        </ul>
                                </td>
                        <td><span class="icon-available" title="Available"></span></td>
                        <td><span class="icon-available" title="Available"></span></td>
                        </tr>
                        <tr>
                        <td>
                        <h5 class="green">Support of multiple CSS Templates</h5>
                        <ul class="doplist green">
                        <li>You have the possibility to create an unlimited number of CSS Templates to customize your front end booking calendars.</li>
                        </ul>
                                </td>
                        <td><span class="icon-limited" title="Only one"></span></td>
                        <td><span class="icon-infinite" title="Unlimited"></span></td>
                        </tr>
                        <tr>
                        <td>
                        <h5 class="green">Support for Multi Site/Multi User</h5>
                        <ul class="doplist green">
                        <li>Allow administrators to access all calendars.</li>
                        <li>Allow users access to booking system.</li>
                        <li>Allow users access to booking system custom post types.</li>
                        <li>Allow administrators to create booking calendars and give access to different users.</li>
                        </ul>
                                </td>
                        <td><span class="icon-unavailable" title="Not Available"></span></td>
                        <td><span class="icon-available" title="Available"></span></td>
                        </tr>
                        <tr>
                        <td>
                        <h5 class="green">Support for Widgets</h5>
                        <ul class="doplist green">
                        <li>Add booking calendars in a widget area.</li>
                        <li>Display a booking calendar sidebar in a widget area.</li>
                        </ul>
                                </td>
                        <td><span class="icon-available" title="Available"></span></td>
                        <td><span class="icon-available" title="Available"></span></td>
                        </tr>
                        <tr>
                        <td>
                        <h5 class="green">Support for custom post type</h5>
                        <ul class="doplist green">
                        <li>Users have the possibility to create a post with a booking calendar attached.</li>
                        <li>The booking calendar availability, reservations &amp; settings can be managed from the post.</li>
                        </ul>
                                </td>
                        <td><span class="icon-unavailable" title="Not Available"></span></td>
                        <td><span class="icon-available" title="Available"></span></td>
                        </tr>
                        </tbody>
                    </table>
                    
                </div>
            </section>
<?php
            }
        }
    }