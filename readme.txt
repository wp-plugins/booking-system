=== Booking System (+ WooCommerce) ===
Contributors: DOTonPAPER
Donate link: http://www.dopdemo.net/wp/booking-system
Tags: accommodations, admin, administration, ajax, appointment, availability, availability calendar, book, bookable, bookable events, boking, booking, booking calendar, booking form, booking module, booking plugin, booking system, bookings, calendar, event, event calendar, events, hotel, hotel booking, hotel rooms, jquery, management, meeting, meeting scheduling, organizer, payment, paypal, plugin, rent, rental, reservation, reservation calendar, reservation plugin, reservation system, schedule, schedule calendar, schedule system, scheduling, service, to book, villa booking
Requires at least: 3.3
Tested up to: 4.0.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This Plugin will help you to easily create a booking/reservation system into your WordPress website or blog.

== Description ==

View live demo of Booking System Front End [here](http://wordpressbooking.systems/).

This Plugin will help you to easily create a booking/reservation system into your WordPress website or blog. The Booking System will display a calendar for users to see availability and book dates and hours.

Booking System is great for booking hotel rooms, apartments, houses, villas, rooms etc, make appointments to doctors, dentists, lawyers, beauty salons, spas, massage therapists etc or schedule events.

The Plugin is intended to book anything, anywhere, anytime. We always accept feedback and constructive criticism so if you have something to say please use the [support forum](http://wordpress.org/support/plugin/booking-system).

= Features =
If you want new features or functionalities in the Booking System drop us a line in [support forum](http://wordpress.org/support/plugin/booking-system).

**Responsive**

* Front End Booking Calendar is responsive and can be viewed on all browsers and devices.

**Booking Calendar**

* A Booking Calendar is displayed in Front End, where clients can view availability and make reservations & appointments.
* The clients can select to display multiple or fewer months for better visualization.
* The clients can click on the calendar's days and/or hours to select the booking period they want.
* The Booking Calendar contains a Sidebar where clients can search availability through the calendar, select number of rooms/items they want, see the price and book them by completing a very customizable Booking Form.
* Support for Terms &amp; Conditions.
* The Check In/Out dates can be in american (MM DD, YYYY) or european (DD MM YYYY) format.
* Only the Calendar be displayed so that your users can check only availability.
* The Back End Booking Calendar is similar to the Front End version so that administrators can have a very familiar way to add information ... <em>what they see the clients see.</em>

**Book Days**

* Add price, promo price, number of items available and information for each day in the Front End Booking Calendar. In the Back End Booking Calendar administrators can add notes to themselves or other administrators.
* The days are displayed in the Booking Calendar with the following statuses: None, Available, Booked, Special, Unavailable.
* Set Price & Status for a groups of days.
* Set discounts depending on the number of days that are booked.
* Set minimum & maximum number of days that you are permitted to book.
* Set the first day of the week that will appear in the Booking calendar.
* Set general available/unavailable weekdays.
* Support for Morning Check Out. It will display information in the Booking Calendar if you need to Check In in the afternoon and Check Out in the morning. This option is very useful for hotels.

**Book Hours**

* You have complete control to what hours you are using in your Booking Calendar. You can set same hours by the minute for the whole calendar or you can set different hours for different days.
* Add price, promo price, number of items available and information for each hour in the Front End Booking Calendar. In the Back End Booking Calendar administrators can add notes to themselves or other administrators.
* The hours are displayed in the Booking Calendar with the following statuses: None, Available, Booked, Special, Unavailable.
* Set Price & Status for a groups of hours.
* Hours can be in AM/PM or 24 hours format.
* Hours intervals are supported.

**Multi Language support for Front End &amp; Back End**

* Note: Not all language files are translated. View documentation to see where you can translate them if needed.

**Ability to change currency**

* You can select any currency to use into your Booking Calendar.

**Reservations**

* Booking requests can be instantly approved or can be approved/rejected by administrators. The booking calendar will be changed accordingly.
* Administrators have the possibility to Approve, Reject or Cancel a reservation.


**Booking Forms**

* Create your own custom booking form to get what information you want from your clients.
* The Booking form supports Text Fields (Email, Phone, Name etc), Text Areas, Checkboxes & Drop Downs.

**Payment Systems**

* PayPal (credit card supported)

**View complete [List of Features](http://wordpressbooking.systems/features/)**

== Installation ==

Upload the folder **booking-system** from the zip file to "wp-content/plugins/" and activate the plugin in your admin panel or upload **booking-system.zip** in the "Add new" section.

== Frequently Asked Questions ==

Click [here](http://help.dotonpaper.net/booking-system-wordpress-plugin.html) to view Boking System Documentation.

Click [here](http://help.dotonpaper.net/booking-system-wordpress-plugin.html#faq) to view Booking System FAQ.

== Screenshots ==

View [demo](http://dopdemo.net/wp/booking-system/) here.

== Changelog ==

= 2.0 =
* "Add-ons" added. Increase and improve functionalities.
* "Themes" added. A collection of themes specially created for the booking system.
* "Settings" database has been updated.
* Billing & shipping address added.
* Calendar sidebar widget CSS has been repaired.
* Calendars are displayed correctly for the users that have permissions to view them, bug repaired.
* Email form field can be empty when is not mandatory, bug repaired.
* Notifications are not sent two times when you use a SMTP, bug repaired.
* PayPal transaction may be refunded when a reservation is canceled.
* Plugin update has been optimized.
* Reservation status is saved correctly in "Reservations calendar", bug repaired.
* Filter by price, in search, has been repaired.
* Small "add reservations" CSS style update.
* The "book now" button is not visible when a payment is in progress, bug repaired.
* TLS connection can be used with SMTP.
* User meta is deleted when the plugin us deleted.
* WooCommerce cart, validation bug has been repaired.
* Cyrillic characters are displayed correctly in calendars tooltip, bug repaired.
* Database indexes have been updated.
* Months are displayed correctly, if you navigate through the calendar after you select a period of time from the sidebar, bug repaired.
* Old calendars load even if availability is not set, bug repaired.
* Payment API has been added.
* PayPal API sandbox credentials have their own settings.
* PayPal works with both SSL and TLS, until SSL will be dropped.
* Reservations' count is displayed correctly in "Calendars" section, bug repaired.
* SMTP notifications are sent correctly for each payment method, bug repaired.
* The translation is displayed in alphabetical order, when you want to edit it, in WordPress admin.
* Updating and fixing the translation database has been improved.
* Users' roles are displayed correctly, even if they are modified by third party plugins.
* WooCommerce "Add to cart" button can be replaced with booking system button.
* WooCommerce booking variations are cleaned more often, to improve performance.
* WooCommerce products can have multiple variations with the booking system, bug repaired.
* Currencies can be added using hooks.
* Deposit information is displayed correctly in email notifications.
* Language in admin is verified and set to default, if different errors appear.
* Languages can be added using hooks.
* PayPal API request using TLS instead of SSL.
* Search display the correct results for calendars that have hours interval enabled, bug repaired.
* Search results display correct calendars when you search only hours, not days, bug repaired.
* Selecting quantity for reservation in WooCommerce cart has been disabled, bug repaired (for WooCommerce > 2.2.8).
* Translation text is created when a new language is enabled, bug repaired.
* Back end list items are displayed correctly if name is blank.
* Booking requests buttons work in back end reservations calendar, bug repaired.
* Database class has been updated.
* Front end calendar can start at any day you want.
* Front end fonts are loaded from Google using a secure connection (HTTPS).
* Pending reservations are displayed in back end if there is no payment required, bug repaired.
* Reservations filters history is saved and is displayed when you revisit the page.
* Minimum price is displayed correctly when searching for calendars with hours, bug repaired.
* Total price is calculated correctly when discount is used, bug repaired.
* Translation can repair itself.
* WooCommerce variations are hidden in back end, if they are used by the booking system.
* "Search" added. Use this feature to search for availability in multiple calendars.
* "Tools" added. Tools to help you with some of the booking system needs.
* All WordPress back end CSS classes are unique.
* Booking notifications can be sent using Gmail SMTP, bug repaired.
* Booking notifications can be set to use different methods to send emails to administrators and users.
* Booking notifications can use two SMTP servers, one for administrators and one for users.
* Booking notifications for administrators have Cc and Bcc fields, so that you can send them to multiple people.
* Calendar is displayed correctly in WooCommerce summary, bug repaired.
* Custom posts display the booking calendar in WordPress admin, bug repaired.
* Database is created correctly when updating from a version older than 2.0, bug repaired.
* Discounts can be calculated including Extras price, in booking requests.
* PayPal payment calculates prices with decimal correctly, bug repaired.
* PHP function mysql_insert_id() has been replaced with $wpdb->insert_id, in WordPress back end.
* Retina ready, both front end calendar & back end administration area.
* Reservations calendar display the reservation correctly in last weekday, bug repaired.
* Role actions are set correctly for custom user roles, bug repaired.
* Special characters display correctly in WooCommerce cart, bug repaired.
* Taxes & fees percent value is correctly calculated from "Extras", in front end calendar plugin, bug repaired.
* Unpaid reservations do not display in WordPress back end, bug repaired.
* WooCommerce details display in reservations calendar, bug repaired.
* WooCommerce reservation do not duplicate when an order is made anymore, bug repaired.
* WooCommerce reservations with same day but different hours do not overlap anymore, bug repaired.
* WooCommerce shipping tax is not attached to a booking product anymore, bug repaired.
* "Dashboard" memory tests have been improved.
* "Dashboard" MySQL test works in PHP 5.5 or higher, bug repaired.
* Bookings/reservations calendars jump to the last added/removed month.
* Booking/reservation notifications & payment gateway settings can be edited in custom posts, bug repaired.
* Currency can be displayed with space when price is shown, both in booking calendars and WordPress back end.
* Displaying all translation initially in WordPress admin can be disabled in the configuration file.
* DOP Select jQuery plugin not working with some themes, in front end booking calendar, bug repaired.
* Information tooltip is displayed, bug repaired in front end booking calendar.
* Messages modal always hides in WordPress back end, bug repaired.
* November & December months are displayed correctly in reservations, booking notifications ...
* Number of days in booking/reservation is calculated correctly in October, bug repaired.
* PayPal cancel, error, success links are set correctly in front end booking calendar, bug repaired.
* Price decimals ending in 0 display correctly in back end bookings/reservations and notifications, bug repaired.
* Reservations calendar has been added/improved, in WordPress back end.
* Translation may be forced reset, bug repaired.
* Weekdays are displayed correctly in WordPress back end datepickers, bug repaired.
* WooCommerce code can be enabled in configuration file, if WooCommerce is not detected.
* "Dashboard" added. Display a landing page and server environment.
* Administrators are removed from calendar user permissions list, bug repaired.
* Armenian dram currency added.
* Bangladesh Taka currency added.
* Booking notifications can be sent using PHP mail function.
* Booking notifications can be sent using WordPress wp_mail function.
* Booking notifications methods can be tested.
* DOP Select jquery plugin updated.
* Form data, that was entered when the a booking was requested, can be displayed in calendar information tooltip and/or day/hour body.
* Set minimum booking period for less than 1 hour, bug repaired.
* Use different product type in WooCommerce, bug repaired.
* User booking notifications are not sent to admin, bug repaired.
* WooCommerce cart & order display the right language for bookings, bug repaired.
* WooCommerce booking with "Direct bank transfer" error has been repaired.
* Adding reservations from back end update availability, bug repaired.
* Bookings can be limited to minutes.
* Booking notifications are sent in the language that was used when the reservation was created.
* Booking notifications are sent to multiple admins, bug repaired.
* Jump to "Add to cart" button in WooCommerce after a reservation has been selected for booking.
* Kenya Shilling currency added.
* Period is booked after payment is done with some WooCommerce payment gateways extensions, bug repaired.
* Set booking period rules for minutes.
* TinyMCE button incompatibility with some themes has been repaired.
* Update schedule after a booking request is payed with PayPal, bug repaired.
* Use prices lower than 1 in a booking request, added.
* Users permissions for specific calendars have been repaired.
* "Coupons" added. Create voucher codes for your clients to use with their booking requests.
* "Discounts" added. Give discounts for the period booked, in different time periods.
* "Email templates" added. Customize your booking notifications directly from administration area.
* "Extras" added. Add amenities, services & other stuff, with price or not, to a booking/reservation.
* "Rules" added. Currently you can set min/max time lapse for a booking request.
* "Taxes & fees" added. Set taxes & fees that need to be paid (VAT tax for example) with the booking.
* "Translation" page has been updated in WordPress admin.
* Add user permissions using custom roles in WordPress admin.
* AJAX requests no longer return 403, 404 errors in front end.
* All algorithms are improved and work faster. Install, save, search ...
* Availability text is visible on special days, bug repaired.
* Back end UI/CSS has been changed. A new design has been created for WordPress administration area.
* Booking notifications are sent without SMTP if SMTP does not work.
* Booking notifications can be enabled/disabled in administration area.
* Booking notifications can be sent to multiple admins.
* Compatibility with PHP 5.3 or higher has been repaired.
* Complete code core changes. Everything is OOP & commented.
* Currency can be positioned before or after price, in booking calendar.
* Current year changes on booking calendar resize, bug repaired.
* Custom post types do not appear anymore in blog posts by default.
* Data save/load speed & server memory usage has been optimized.
* Days availability is restored when you cancel a booking/reservation.
* Different levels of checking availability have been added in the booking process.
* Front end booking calendar info messages hide after a few seconds.
* Front end booking calendar's sidebar view is customizable.
* Front end booking calendar speed has been improved.
* Front end UI/CSS has been changed. A new design has been created for front end booking calendar and all classes and ids are unique.
* IE bugs repaired.
* Language is not saved anymore in sessions in front end.
* Language codes have been changed to international codes for: Albanian (al->sq), Basque (bs->eu), Belarusian (by->be), Chinese (cn->zh), Croatian (cr->hr), Czech (cz->cs), Danish (dk->da), Dutch (du->nl), Greek (gr->el), Haitian Creole(ha->ht), Irish (ir->ga), Malay (mg->ms), Maltese (ma->mt), Persian (pe->fa), Spanish (sp->es), Swedish (se->sv), Welsh (we->cy).
* Languages can be enabled/disabled in WordPress back end.
* Major database changes. Column changes and more indexes created.
* Minimum booking period error message does not display randomly when you select only check in date, in booking calendar.
* Payment transaction ID is displayed in booking notification emails.
* PHPMailer class is used when sending booking notifications.
* Redirect after a booking has been made, has been added.
* Redirect after a booking has been payed with PayPal, has been added.
* Reservations view is the same after page is refreshed.
* Possibility to select more than one group of days/hours in a booking/reservation has been added.
* Required checkbox validation bug repaired, in booking form.
* Set the number of months to be initially displayed in the booking calendar.
* Stop bookings in advance added.
* Translation for dynamic items display correctly, both in booking calendar and WordPress admin.
* Translation works with special characters, both in booking calendar and WordPress admin.
* UAE Dirham currency added.
* User capabilities repaired, in WordPress admin.
* Verification if booking calendar has been attached to WooCommerce product has been added.
* WooCommerce integration has been changed. This should fix all incompatibility problems that were in previous version.
* WooCommerce redirect to cart page after a booking/reservation is added to cart, bug repaired.
* "wp_mail()" function replaced with "mail()".
* Booking calendar display even it is used twice on same page.
* Booking order is added to WooCommerce cart even if form is removed from product page.
* Booking/reservation details appear on WooCommerce notifications email.
* Booking/reservation details appear on WooCommerce order.
* Booking/reservation save bug repaired.
* Installation on XAMP server repaired.
* WooCommerce date format repaired.
* bbPress incompatibility, bug repaired.
* Booking calendars not loading, bug repaired.
* Bookings/reservations appear in custom post type.
* Bookings/reservations currency display bug repaired.
* Config file added.
* CSS bugs repaired.
* Delete plugin data/database, bug repaired.
* Delete booking/reservation added.
* Front end translation not showing, bug repaired.
* Hooks added.
* Installation algorithms have been optimized.
* Month not displaying in booking notification emails bug repaired.
* Navigation after data is saved in back end repaired.
* Reservations calendar is generated correctly when filters are modified.
* Save translation bug repaired.
* Set default database values before installation.
* Set default language for back end and/or front end before installation.
* Set default users permissions before installation.
* Submit button ("Add to cart" / "Book") is hidden when you submit a booking or you add a reservation to cart.
* Translation display bug repaired when using characters like ' or ", both in booking calendar and WordPress admin.
* Translation edit has been optimized.
* When a booking calendar is deleted the reservations area is removed.
* WooCommerce support added.
* Add bookins/reservations in WordPress admin.
* Approving/canceling a reservation modifies the booking calendar data.
* Back end CSS bugs repaired.
* Bookings/reservations logic has been completly modified (search added, filters added, calendar & list view added).
* Custom post types bugs repaired.
* Edit unavailable days, bug repaired.
* Front end booking calendar CSS bugs repaired.
* Instant/waiting approval display, bug repaired.
* JavaScript in admin posts repaired.
* Localhost bugs repaired.
* Plugin paths updated.
* Prices, deposits, discounts can have float values.
* Select days from different months on front end booking calendar, bug repaired.
* Translation system has been updated.
* User management updated.
* Windows server mySQL text fields bug repaired.
* Add booking calendars in widgets.
* Approve booking/reservation bug repaired.
* Back end style changes.
* Calendar ID is removed from clients booking notification emails.
* CSS bug fixes, in booking calendar.
* Custom post type added.
* Date select is repaired when minimum amount of days is set.
* Datepicker bug fix, when you can select only one day, in booking calendar.
* Drop down fields display correct selected option in booking notifications.
* Hours info is displayed on day hover, in booking calendar.
* Major changes in booking hours logic and display.
* Newly created booking forms display correct after PayPal Payment.
* PayPal booking notification email content bug repaired.
* Send email using normal function if SMTP is incorrect.
* Tables not created on Windows OS bug repaired.
* Text on Settings page, in WordPress admin, has been changed.
* Translation for check fields added.
* User role is updated when is changed in WordPress admin.
* When hours are enabled, days details can be set manually or set depending on hours details on that current day.
* WordPress update error repaired. 
* Admin language is different for each user, in WordPress back end.
* Compatibility fixes, in WordPress back end.
* Custom booking forms tweaks.
* Database update.
* Datepicker & Google translate incompatibility, bug repaired in booking calendar.
* Display calendar id & name in notifications emails.
* Display hours interval from current hour to next one.
* Possibility to hide number of items select field has been added, in booking calendar.
* You can set booking requests to by approved instantly, or not.
* You have the possibility to calculate the total price using the last hour selected value, or not.
* CSS incompatibility fixes, in front end booking calendar.
* Custom booking forms added.
* Datepicker z-index bug repaired, in front end booking calendar.
* Email header is custom.
* Group day date is displayed correctly after select, in front end booking calendar.
* Users permissons translation repaired.
* ACAO buster added.
* Admin change language bug repaired.
* Administrators can create booking calendars for users.
* Booking calendar loading time is improved.
* Booking calendar resize on hidden elements, bug repaired.
* Booking notifications are sent using "wp_mail()".
* Database is deleted when you delete the booking system plugin.
* Display only an information calendar in front end.
* Indonesia Rupiah currency bug repaired.
* PayPal credit card payment bug repaired.
* PayPal session bug repaired.
* Select first day of the week, in booking calendar.
* Slow admin bug repaired.
* Small admin changes.
* Touch devices freeze bug repaired.
* Translation fixes, both in front end booking calendar and back end.
* Update booking notification added.
* User permissions updated, in booking system back end.
* Booking notifications message and language bugs have been repaired.
* Correct hours format is displayed, in front end booking calendar.
* Deposit feature has been added, for booking requests.
* Discounts by number of days booked have been added.
* Front end booking calendar is responsive.
* Touch devices navigation has been enabled.
* You can translate the sidebar datepicker.
* You can use PayPal credit card payment, for booking requests.

= 1.3.1 =
* TinyMCE shortcodes bug fixed.

= 1.3 =
* Security fixes.
* 3.9 compatibilities fixed.

= 1.2 =
* Localhost bugs fixed.

= 1.1 =
* Access-Control-Allow-Origin Buster bug fixed.
* French Translation updated thanks to Asselin de Beauville Christophe - http://gegeek.net/
* German Translation updated thanks to Dieter Pfenning - dieter.pfenning@winball.de
* Polish Translation updated thanks to Kwasniewski Krzysztof - http://etechnologie.pl
* Small fixes.

= 1.0 =
* Initial release.

== Upgrade Notice ==

= 1.4 =
* Security fixes.

= 1.3.1 =
* TinyMCE shortcodes bug fixed.

= 1.3 =
* Security fixes.
* 3.9 compatibilities fixed.

= 1.2 =
* Localhost bugs fixed.

= 1.1 =
* Access-Control-Allow-Origin Buster bug fixed.
* French Translation updated thanks to Asselin de Beauville Christophe - http://gegeek.net/
* German Translation updated thanks to Dieter Pfenning - dieter.pfenning@winball.de
* Polish Translation updated thanks to Kwasniewski Krzysztof - http://etechnologie.pl
* Small fixes.

= 1.0 =
* Initial release.