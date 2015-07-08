
/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 2.0
* File                    : assets/js/jquery.dop.frontend.BSPCalendar.js
* File Version            : 1.3.4
* Created / Last Modified : 17 February 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System front end calendar jQuery plugin.
*/

(function($){
    'use strict';
  
    $.fn.DOPBSPCalendar = function(options){
        /*
         * Private variables.
         */
        var Data = {"calendar": {"data": {"bookingStop": 0,
                                          "dateType": 1,
                                          "language": "en",
                                          "languages": [],
                                          "pluginURL": "",
                                          "maxYear": new Date().getFullYear(),
                                          "reinitialize": false,
                                          "view": false},
                                 "text": {"addMonth": "Add month view",
                                          "available": "available",
                                          "availableMultiple": "available",
                                          "booked": "booked",
                                          "nextMonth": "Next month",
                                          "previousMonth": "Previous month",
                                          "removeMonth": "Remove month view",
                                          "unavailable": "unavailable"}}, 
                    "cart": {"data": {"enabled": false},
                             "text": {"isEmpty": "Cart is empty.",
                                      "title": "Cart"}},
                    "coupons": {"data": {"coupon": {},
                                         "id": 0},
                                "text": {"byDay": "day",
                                         "byHour": "hour",
                                         "code": "Enter code",
                                         "title": "Coupon",
                                         "use": "Use coupon",
                                         "verify": "Verify code",
                                         "verifyError": "The coupon code is invalid. Please enter another one.",
                                         "verifySuccess": "The coupon code is valid."}}, 
                    "currency": {"data": {"code": "USD",
                                          "position": "before",
                                          "sign": "$"},
                                 "text": {}}, 
                    "days": {"data": {"available": [true, true, true, true, true, true, true],
                                      "first": 1,
                                      "firstDisplayed": "",
                                      "morningCheckOut": false,
                                      "multipleSelect": true},
                             "text": {"names": ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                                      "shortNames": ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"]}},
                    "deposit": {"data": {"deposit": 0,
                                         "type": "percent"},
                                "text": {"left": "Left to pay",
                                         "title": "Deposit"}}, 
                    "discounts": {"data": {"discount": [],
                                           "extras": false, 
                                           "id": 0},
                                  "text": {"byDay": "day",
                                           "byHour": "hour",
                                           "title": "Discount"}},
                    "extras": {"data": {"extra": [],
                                        "id": 0},
                               "text": {"byDay": "day",
                                        "byHour": "hour",
                                        "invalid": "Select an option from",
                                        "title": "Extras"}},
                    "fees": {"data": {"fees": []},
                             "text": {"byDay": "day",
                                      "byHour": "hour",
                                      "included": "Included in price",
                                      "title": "Taxes & fees"}},
                    "form": {"data": {"form": [],
                                      "id": 0},
                             "text": {"checked": "Checked",
                                      "invalidEmail": "is invalid. Please enter a valid email.",
                                      "required": "is required.",
                                      "title": "Contact information",
                                      "unchecked": "Unchecked"}},
                    "hours": {"data": {"addLastHourToTotalPrice": true,
                                       "ampm": false,
                                       "definitions": [{"value": "00:00"}],
                                       "enabled": false,
                                       "info": true,
                                       "interval": true,
                                       "multipleSelect": true},
                              "text": {}},
                    "ID": 0,
                    "months": {"data": {"no": 1},
                               "text": {"names": ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                                        "shortNames": ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]}},
                    "order": {"data": {"address_billing": {"address_first": {"enabled": true,
                                                                             "required": true},
                                                           "address_second": {"enabled": true,
                                                                              "required": false},
                                                           "city": {"enabled": true,
                                                                    "required": true},
                                                           "company": {"enabled": true,
                                                                       "required": false},
                                                           "country": {"enabled": true,
                                                                       "required": true},
                                                           "email": {"enabled": true,
                                                                     "required": true},
                                                           "enabled": false,
                                                           "first_name": {"enabled": true,
                                                                          "required": true},
                                                           "last_name": {"enabled": true,
                                                                         "required": true},
                                                           "phone": {"enabled": true,
                                                                     "required": true},
                                                           "state": {"enabled": true,
                                                                     "required": true},
                                                           "zip_code": {"enabled": true,
                                                                        "required": true}},
                                       "address_shipping": {"address_first": {"enabled": true,
                                                                              "required": true},
                                                            "address_second": {"enabled": true,
                                                                               "required": false},
                                                            "city": {"enabled": true,
                                                                     "required": true},
                                                            "company": {"enabled": true,
                                                                        "required": false},
                                                            "country": {"enabled": true,
                                                                        "required": true},
                                                            "email": {"enabled": true,
                                                                     "required": true},
                                                            "enabled": false,
                                                            "first_name": {"enabled": true,
                                                                           "required": true},
                                                            "last_name": {"enabled": true,
                                                                          "required": true},
                                                            "phone": {"enabled": true,
                                                                      "required": true},
                                                            "state": {"enabled": true,
                                                                      "required": true},
                                                            "zip_code": {"enabled": true,
                                                                         "required": true}},
                                       "countries": [],
                                       "paymentArrival": true,
                                       "paymentArrivalWithApproval": false,
                                       "paymentGateways": [],
                                       "redirect": "",
                                       "terms": false,
                                       "termsLink": ""},
                              "text": {"addressAddressFirst": "Address line 1",
                                       "addressAddressSecond": "Address line 2",
                                       "addressBilling": "Billing address",
                                       "addressBillingDisabled": "Billing address is not enabled.",
                                       "addressCity": "City",
                                       "addressCompany": "Company",
                                       "addressCountry": "Country",
                                       "addressEmail": "Email",
                                       "addressFirstName": "First name",
                                       "addressLastName": "Last name",
                                       "addressPhone": "Phone number",
                                       "addressSelectPaymentMethod": "Select payment method.",
                                       "addressShipping": "Shipping address",
                                       "addressShippingDisabled": "Shipping address is not enabled.",
                                       "addressShippingCopy": "Use billing address",
                                       "addressState": "State/Province",
                                       "addressZipCode": "Zip code",
                                       "book": "Book now",
                                       "paymentArrival": "Pay on arrival (instant booking)",
                                       "paymentArrivalWithApproval": "Pay on arrival (need to be approved)",
                                       "paymentArrivalSuccess": "Your request has been successfully received. We are waiting you!",
                                       "paymentArrivalWithApprovalSuccess": "Your request has been successfully sent. Please wait for approval.",
                                       "paymentMethod": "Payment method",
                                       "paymentMethodNone": "None",
                                       "paymentMethodArrival": "On arrival",
                                       "paymentMethodTransactionID": "Transaction ID",
                                       "paymentMethodWooCommerce": "WooCommerce",
                                       "paymentMethodWooCommerceOrderID": "Order ID",
                                       "success": "Reservation has been added!",
                                       "terms": "I accept to agree to the Terms & Conditions.",
                                       "termsInvalid": "You must agree with our Terms & Conditions to continue.",
                                       "title": "Order",
                                       "unavailable": "The period you selected is not available anymore. The calendar will refresh to update the schedule.",
                                       "unavailableCoupon": "The coupon you entered is not available anymore."}},
                    "reservation": {"data": {},
                                    "text": {"addressShippingCopy": "Same as billing address.",
                                             "buttonApprove": "Approve",
                                             "buttonCancel": "Cancel",
                                             "buttonClose": "Close",
                                             "buttonDelete": "Delete",
                                             "buttonReject": "Reject",
                                             "dateCreated": "Date created",
                                             "id": "ID",
                                             "instructions": "Click to edit the reservation.",
                                             "language": "Selected language",
                                             "noAddressBilling": "No billing address.",
                                             "noAddressShipping": "No shipping address.",
                                             "noExtras": "No extras.",
                                             "noDiscount": "No discount.",
                                             "noCoupon": "No coupon.",
                                             "noFees": "No taxes or fees.",
                                             "noForm": "Form was not completed.",
                                             "noFormField": "Form field was not completed.",
                                             "price": "Price",
                                             "priceChange": "Price change",
                                             "priceTotal": "Total",
                                             "selectDays": "Please select the days from calendar.",
                                             "selectHours": "Please select the days and hours from calendar.",
                                             "title": "Reservation",
                                             "titleDetails": "Details"}},
                    "rules": {"data": {"rule": {},
                                       "id": 0},
                              "text": {"maxTimeLapseDaysWarning": "You can book only a maximum number of %d days.",
                                       "maxTimeLapseHoursWarning": "You can book only a maximum number of %d hours.",
                                       "minTimeLapseDaysWarning": "You need to book a minimum number of %d days.",
                                       "minTimeLapseHoursWarning": "You need to book a minimum number of %d hours."}},
                    "search": {"data": {},
                               "text": {"checkIn": "Check in",
                                        "checkOut": "Check out",
                                        "hourEnd": "Finish at",
                                        "hourStart": "Start at",
                                        "noItems": "No. book items",
                                        "noServices": "There are no services available for the period you selected.",
                                        "noServicesSplitGroup": "You cannot add divided groups to a reservation.",
                                        "title": "Search"}},           
                    "sidebar": {"data": {"noItems": true,
                                         "positions": {"search": {"column": 1,
                                                                  "row": 1},
                                                       "extras": {"column": 1,
                                                                  "row": 2},   
                                                       "coupons": {"column": 1,
                                                                   "row": 3},       
                                                       "reservation": {"column": 1,
                                                                       "row": 4},
                                                       "cart": {"column": 1,
                                                                "row": 5},
                                                       "form": {"column": 1,
                                                                "row": 6},
                                                       "order": {"column": 1,
                                                                 "row": 7}},
                                         "style": 5},
                                "text": {}}, 
                    "woocommerce": {"data": {"enabled": false,
                                             "product_id": 0},
                                    "text": {"none": "No reservation",
                                             "reservation": "Reservation",
                                             "addToCart": "Add to cart"}}},
        ajaxURL = '',
        Container = this,
        ID = 0,

// ***************************************************************************** Main methods.

// 1. Main methods.
        
        methods = {
            init:function(){
            /*
             * Initialize jQuery plugin.
             */
                return this.each(function(){
                    if (options){
                        $.extend(Data, options);
                    }
                    
                    if (!$(Container).hasClass('dopbsp-initialized')
                            || Data['calendar']['data']['reinitialize']){
                        $(Container).addClass('dopbsp-initialized');
                        methods.parse();
                        $(window).bind('resize.DOPBSPCalendar', methods.rp);                          
                    }
                });
            },
            parse:function(){
            /*
             * Parse calendar options.
             */    
                ajaxURL = prototypes.acaoBuster($('a', Container).attr('href'));
                
                methods_calendar.data = Data['calendar']['data'];
                methods_calendar.text = Data['calendar']['text'];
                
                methods_cart.data = Data['cart']['data'];
                methods_cart.text = Data['cart']['text'];
                
                methods_coupons.data = Data['coupons']['data'];
                methods_coupons.text = Data['coupons']['text'];
                
                methods_currency.data = Data['currency']['data'];
                methods_currency.text = Data['currency']['text'];
                
                methods_days.data = Data['days']['data'];
                methods_days.text = Data['days']['text'];
                
                methods_deposit.data = Data['deposit']['data'];
                methods_deposit.text = Data['deposit']['text'];
                
                methods_discounts.data = Data['discounts']['data'];
                methods_discounts.text = Data['discounts']['text'];
                
                methods_extras.data = Data['extras']['data'];
                methods_extras.text = Data['extras']['text'];
                
                methods_fees.data = Data['fees']['data'];
                methods_fees.text = Data['fees']['text'];
                
                methods_form.data = Data['form']['data'];
                methods_form.text = Data['form']['text'];
                
                methods_hours.data = Data['hours']['data'];
                methods_hours.text = Data['hours']['text'];
                
                ID = Data['ID'];
                
                methods_months.data = Data['months']["data"];
                methods_months.text = Data['months']["text"];
                
                methods_order.data = Data['order']["data"];
                methods_order.text = Data['order']["text"];
                
                methods_reservation.data = Data['reservation']["data"];
                methods_reservation.text = Data['reservation']["text"];
                
                methods_rules.data = Data['rules']["data"];
                methods_rules.text = Data['rules']["text"];
                
                methods_search.data = Data['search']["data"];
                methods_search.text = Data['search']["text"];
                
                methods_sidebar.data = Data['sidebar']["data"];
                methods_sidebar.text = Data['sidebar']["text"];
                
                methods_woocommerce.data = Data['woocommerce']["data"];
                methods_woocommerce.text = Data['woocommerce']["text"];
                
                Container.html('<div class="dopbsp-loader"></div>');

                /*
                 * Verify if a payment has been made.
                 */
                methods_order.payment.verify();
                
                /*
                 * Init months data.
                 */
                methods_months.init();
                
                /*
                 * Load schedule.
                 */
                methods_schedule.parse(new Date().getFullYear());
            },
            rp:function(){
            /*
             * Initialize calendar resize & position. Used for responsive feature.
             */
                /*
                 * Resize & position the sidebar first.
                 */
                methods_sidebar.rp();
                methods_calendar.container.rp();
                methods_calendar.navigation.rp();
                methods_day.rp();
            }
        },           
        
// 2. Schedule

        methods_schedule = {
            vars: {schedule: {}},
            
            parse:function(year){
            /*
             * Parse calendar schedule.
             * 
             * @param year (Number): the year for which the calendar should get the schedule
             */
                var scheduleBuffer = {};
                
                $.post(ajaxURL, {action: 'dopbsp_calendar_schedule_get',
                                 dopbsp_frontend_ajax_request: true,
                                 id: ID,
                                 year:year}, function(data){
                    if ($.trim(data) !== ''){
                        scheduleBuffer = JSON.parse($.trim(data));

                        for (var day in scheduleBuffer){
                            scheduleBuffer[day] = JSON.parse(scheduleBuffer[day]);
                        }
                        $.extend(methods_schedule.vars.schedule, scheduleBuffer);
                    }
                    
                    if (methods_calendar.vars.display 
                            && (methods_calendar.vars.startMonth < 12-methods_months.vars.no+1 
                                    || methods_calendar.vars.firstYearLoaded 
                                    || year >= methods_calendar.data['maxYear'])){
                        methods_calendar.vars.display = false;
                        methods_calendar.display();
                        methods_components.init();
                    }

                    if (!methods_calendar.vars.firstYearLoaded){
                        methods_calendar.vars.firstYearLoaded = true;
                    }

                    if (year < methods_calendar.data['maxYear']){
                        methods_schedule.parse(year+1);
                    }
                });
            },
            reset:function(){
            /*
             * Reset calendar schedule.
             */
                Container.html('<div class="dopbsp-loader"></div>');
                methods_schedule.vars.schedule = {};
                methods_calendar.vars.display = true;
                methods_calendar.vars.firstYearLoaded = false;
                
                methods_schedule.parse(new Date().getFullYear());
            }
        },
                
// 3. Components

        methods_components = {
            init:function(){
            /*
             * Initialize calendar components.
             */ 
                var startDate;
                
                /*
                 * Initialize today date.
                 */
                methods_calendar.vars.todayDate = new Date();
                methods_calendar.vars.todayDay = methods_calendar.vars.todayDate.getDate();
                methods_calendar.vars.todayMonth = methods_calendar.vars.todayDate.getMonth()+1;
                methods_calendar.vars.todayYear = methods_calendar.vars.todayDate.getFullYear(); 
                
                /*
                 * Initialize start date.
                 */
                methods_calendar.vars.startDate = new Date(new Date().getTime()+methods_calendar.data['bookingStop']*60*1000);
                methods_calendar.vars.currMonth = methods_calendar.vars.startDate.getMonth()+1;
                methods_calendar.vars.currYear = methods_calendar.vars.startDate.getFullYear();
                methods_calendar.vars.startDay = methods_calendar.vars.startDate.getDate();
                methods_calendar.vars.startMonth = methods_calendar.vars.startDate.getMonth()+1;
                methods_calendar.vars.startYear = methods_calendar.vars.startDate.getFullYear(); 
                
                /*
                 * Tooltip
                 */
                methods_tooltip.display();
                
                startDate  = prototypes.getLeadingZero(methods_calendar.vars.startYear)
                             +'-'+prototypes.getLeadingZero(methods_calendar.vars.startMonth)
                             +'-'+prototypes.getLeadingZero(methods_calendar.vars.startDay);
                
                /*
                 * Calendar
                 */
                methods_calendar.container.init();
                methods_calendar.navigation.init();
                methods_calendar.init(methods_calendar.vars.startYear, 
                                      methods_calendar.vars.startMonth+(startDate < methods_days.data['firstDisplayed'] ? prototypes.getNoMonths(startDate, methods_days.data['firstDisplayed'])-1:0));
                
                /*
                 * Sidebar
                 */                      
                if (!methods_calendar.data['view']){
                    /*
                     * Search
                     */
                    methods_search.display();
                    
                    

                    /*
                     * Extras
                     */
                    if (methods_extras.data['id'] !== '0'){
                        methods_extras.display();
                    }

                    /*
                     * Reservation
                     */
                    methods_reservation.display();
  
                    /*
                     * Check if WooCommerce is enabled.
                     */
                    if (!methods_woocommerce.data['enabled']){
                        /*
                         * Coupons
                         */
                        if (methods_coupons.data['id'] !== '0'){
                            methods_coupons.display();
                        }
                    
                        /*
                         * Cart 
                         */
                        methods_cart.display();

                        /*
                         * methods_form.data['form']
                         */
                        methods_form.display();

                        /*
                         * Order
                         */
                        methods_order.display();
                    }
                    else{
                        methods_woocommerce.display();
                    }
                    
                    /*
                     * Initialize sidebar.
                     */
                    methods_sidebar.init();
                }
                
                methods.rp();
            }
        },  
                
// 4. Currency
        
        methods_currency = {
            data: {},
            text: {}
        },
         
// 5. Price         
                
        methods_price = {
            set:function(price){
            /*
             * Display price with currency in set format.
             * 
             * @param price (Number): price value
             * 
             * @return price with currency
             */ 
                var priceDisplayed = '';
                
                price = prototypes.getWithDecimals(Math.abs(price), 
                                                   2);
                                                   
                switch (methods_currency.data['position']){
                    case 'after':
                        priceDisplayed =  price+methods_currency.data['sign'];
                        break;
                    case 'after_with_space':
                        priceDisplayed =  price+' '+methods_currency.data['sign'];
                        break;
                    case 'before_with_space':
                        priceDisplayed =  methods_currency.data['sign']+' '+price;
                        break;
                    default:
                        priceDisplayed = methods_currency.data['sign']+price;
                }
                
                return priceDisplayed;
            }
        },        

// 6. Tooltip

        methods_tooltip = {
            display:function(){
            /*
             * Display information tooltip.
             */
                if ($('#DOPBSPCalendar-tooltip'+ID).length !== undefined){
                    $('#DOPBSPCalendar-tooltip'+ID).remove();
                }
                $('body').append('<div class="DOPBSPCalendar-tooltip" id="DOPBSPCalendar-tooltip'+ID+'"></div>');
                methods_tooltip.init();
            },
            init:function(){
            /*
             * Initialize information tooltip.
             */
                var $tooltip = $('#DOPBSPCalendar-tooltip'+ID),
                h,
                xPos = 0, 
                yPos = 0;
                            
                if (!prototypes.isTouchDevice()){
                    /*
                     * Position the tooltip depending on mouse position.
                     */
                    $(document).mousemove(function(e){
                        xPos = e.pageX+15;
                        yPos = e.pageY-10;

                        /*
                         * Tooltip height.
                         */
                        h = $tooltip.height()
                            +parseFloat($tooltip.css('padding-top'))
                            +parseFloat($tooltip.css('padding-bottom'))
                            +parseFloat($tooltip.css('border-top-width'))
                            +parseFloat($tooltip.css('border-bottom-width'));

                        if ($(document).scrollTop()+$(window).height() < yPos+h+10){
                            yPos = $(document).scrollTop()+$(window).height()-h-10;
                        }

                        $tooltip.css({'left': xPos, 
                                      'top': yPos});
                    });
                }
                else{
                    /*
                     * Hide tooltip when you touch it.
                     */
                    $tooltip.unbind('touchstart');
                    $tooltip.bind('touchstart', function(e){
                        e.preventDefault();
                        methods_tooltip.clear();
                    });
                }
            },
            set:function(day,
                         hour,
                         type,
                         infoData){
            /*
             * Set tooltip.
             * 
             * @param day (String): the day for which the information will be displayed (YYYY-MM-DD)
             * @param hour (String): the hour for which the information will be displayed (HH:MM)
             * @param type (String): type of information to be displayed
             *                       "hours" display hours information
             *                       "info" display information
             *                       "info-body" display information
             *                       "notes" display notes
             * @param infoData (String): information to be displayed
             */     
                var data = (hour === '' ? methods_schedule.vars.schedule[day]:
                                          methods_schedule.vars.schedule[day]['hours'][hour]),
                info = infoData !== undefined ? infoData:
                                                data[type]+(data['info_info'] !== undefined ? (data[type] !== '' && data['info_info'].length > 0 ? '<br /><br />':'')+methods_form.getInfo(data['info_info']):'');
                
                /*
                 * Display body info.
                 */
                if (type === 'info-body'){
                    info = methods_form.getInfo(data['info_body']);
                }
                                        
                // info = decodeURIComponent(escape(info));
                info = decodeURIComponent(unescape(unescape(info)));

                if (type === 'hours'
                        || type === 'info-body'){
                    $('#DOPBSPCalendar-tooltip'+ID).removeClass('dopbsp-text');
                }
                else{
                    $('#DOPBSPCalendar-tooltip'+ID).addClass('dopbsp-text');
                }
                $('#DOPBSPCalendar-tooltip'+ID).html(info)
                                               .css('display', 'block');                         
            },
            clear:function(){
            /*
             * Clear information display.
             */
                $('#DOPBSPCalendar-tooltip'+ID).css('display', 'none');                        
            }
        },
                
// 7. Info
        
        methods_info = {
            vars: {time: 0},
            
            toggleMessages:function(message,
                                    type){
            /*
             * Toggle info messages.
             * 
             * @param message (String): the message to be displayed
             * @param type (String): message type
             *                       "dopbsp-error" error message
             *                       "dopbsp-success" success message
             */         
                type = type === undefined ? 'dopbsp-error':type;
                
                $('#DOPBSPCalendar-info-message'+ID+' .dopbsp-text').html(message);
                $('#DOPBSPCalendar-info-message'+ID).removeClass('dopbsp-success')
                                                    .removeClass('dopbsp-error')
                                                    .addClass(type)
                                                    .css('display', 'block');
                prototypes.scrollToY($('#DOPBSPCalendar-info-message'+ID).offset().top-100);
                
                if (methods_info.vars.time !== 0){
                    methods_info.vars.time = 15;
                    
                }
                else{
                    methods_info.vars.time = 15;
                    methods_info.timer();
                }
            },
            timer:function(){
            /*
             * Count the number of seconds before the info message is hidden.
             */    
                $('#DOPBSPCalendar-info-message'+ID+' .dopbsp-timer').html('['+prototypes.getLeadingZero(methods_info.vars.time)+']');
                
                if (methods_info.vars.time === 0){
                    $('#DOPBSPCalendar-info-message'+ID).stop(true, true).fadeOut(300);
                }
                else{
                    setTimeout(function(){
                        methods_info.vars.time--;
                        methods_info.timer();
                    }, 1000);
                }
            }
        },
                
// ***************************************************************************** Calendar

// 8. Calendar
        
        methods_calendar = {
            data: {},
            text: {},
            vars: {currMonth: new Date(),
                   currYear: new Date(),
                   display: true,
                   firstYearLoaded: false,
                   startDate: new Date(),
                   startDay: new Date(),
                   startMonth: new Date(),
                   startYear: new Date(),
                   todayDate: new Date(),
                   todayDay: new Date(),
                   todayMonth: new Date(),
                   todayYear: new Date()},
            
            display:function(){
            /*
             * Display calendar.
             */
                var HTML = new Array();

                /*
                 *  Calendar HTML.
                 */
                HTML.push('<div class="DOPBSPCalendar-container">');                        
                HTML.push('    <div class="DOPBSPCalendar-navigation">');
                HTML.push('        <div class="dopbsp-month-year"></div>');
                HTML.push('        <a href="javascript:void(0)" class="dopbsp-add-btn"><span class="dopbsp-info">'+methods_calendar.text['addMonth']+'</span></a>');                        
                HTML.push('        <a href="javascript:void(0)" class="dopbsp-remove-btn"><span class="dopbsp-info">'+methods_calendar.text['removeMonth']+'</span></a>');
                HTML.push('        <a href="javascript:void(0)" class="dopbsp-next-btn"><span class="dopbsp-info">'+methods_calendar.text['nextMonth']+'</span></a>');
                HTML.push('        <a href="javascript:void(0)" class="dopbsp-previous-btn"><span class="dopbsp-info">'+methods_calendar.text['previousMonth']+'</span></a>');
                HTML.push('        <div class="dopbsp-week">');
                HTML.push('            <div class="dopbsp-day"></div>');
                HTML.push('            <div class="dopbsp-day"></div>');
                HTML.push('            <div class="dopbsp-day"></div>');
                HTML.push('            <div class="dopbsp-day"></div>');
                HTML.push('            <div class="dopbsp-day"></div>');
                HTML.push('            <div class="dopbsp-day"></div>');
                HTML.push('            <div class="dopbsp-day"></div>');
                HTML.push('        </div>');
                HTML.push('    </div>');
                HTML.push('    <div class="DOPBSPCalendar-calendar"></div>');
                HTML.push('</div>');

                /*
                 * Sidebar/form HTML.
                 */ 
                if (!methods_calendar.data['view']){
                    if ($('#DOPBSPCalendar-outer-sidebar'+ID).length === 0){
                        HTML.push('<div class="DOPBSPCalendar-sidebar dopbsp-style'+methods_sidebar.data['style']+'">'+methods_sidebar.display()+'</div>');
                    }
                    else{
                        HTML.push('<div class="DOPBSPCalendar-sidebar dopbsp-hidden"></div>');
                        $('#DOPBSPCalendar-outer-sidebar'+ID).html(methods_sidebar.display());
                    }
                }
                
                Container.html(HTML.join(''));
            },
            init:function(year,
                          month){
            /*
             * Initialize calendar.
             * 
             * @param year (Number): year to be displayed
             * @param month (Number): month to be displayed
             */
                var i;

                methods_calendar.vars.currYear = new Date(year, month, 0).getFullYear();
                methods_calendar.vars.currMonth = month;    

                /*
                 * Initialize add/remove buttons.
                 */
                if (methods_months.vars.no > 1){
                    $('.DOPBSPCalendar-navigation .dopbsp-remove-btn', Container).css('display', 'block');
                } 
                else{
                    $('.DOPBSPCalendar-navigation .dopbsp-remove-btn', Container).css('display', 'none');
                }
                
                if (methods_months.vars.no === methods_months.vars.maxAllowed){
                    $('.DOPBSPCalendar-navigation .dopbsp-add-btn', Container).css('display', 'none');
                    $('.DOPBSPCalendar-navigation .dopbsp-remove-btn', Container).addClass('dopbsp-no-add');
                } 
                else{
                    $('.DOPBSPCalendar-navigation .dopbsp-add-btn', Container).css('display', 'block');
                    $('.DOPBSPCalendar-navigation .dopbsp-remove-btn', Container).removeClass('dopbsp-no-add');
                }

                /*
                 * Initialize previous button.
                 */
                if (year !== methods_calendar.vars.startYear 
                        || month !== methods_calendar.vars.startMonth){
                    $('.DOPBSPCalendar-navigation .dopbsp-previous-btn', Container).css('display', 'block');
                }   

                if (year === methods_calendar.vars.startYear 
                        && month === methods_calendar.vars.startMonth){
                    $('.DOPBSPCalendar-navigation .dopbsp-previous-btn', Container).css('display', 'none');
                }
                methods_day.vars.previousStatus = '';
                methods_day.vars.previousBind = 0;

                if (Container.width() <= 400){
                    $('.DOPBSPCalendar-navigation .dopbsp-month-year', Container).html(methods_months.text['names'][(methods_calendar.vars.currMonth%12 !== 0 ? methods_calendar.vars.currMonth%12:12)-1]+' '+methods_calendar.vars.currYear); 
                }
                else{
                    $('.DOPBSPCalendar-navigation .dopbsp-month-year', Container).html(methods_months.text['names'][(methods_calendar.vars.currMonth%12 !== 0 ? methods_calendar.vars.currMonth%12:12)-1]+' '+methods_calendar.vars.currYear); 
                }                        
                $('.DOPBSPCalendar-calendar', Container).html('');

                for (i=1; i<=methods_months.vars.no; i++){
                    methods_month.display(methods_calendar.vars.currYear, 
                                          month = month%12 !== 0 ? month%12:12, 
                                          i);
                    month++;

                    if (month % 12 === 1){
                        methods_calendar.vars.currYear++;
                        month = 1;
                    }                            
                }
               
                methods_days.displaySelection();
                methods_day.events.init();
                
                if (methods_calendar.vars.firstYearLoaded){
                    methods_day.rp();                        
                }
                
                if (methods_hours.data['enabled']
                        && methods_days.vars.selectionStart !== ''){
                    methods_hours.display(methods_days.vars.selectionStart);
                }
            },
            
            container: {
                init:function(){
                /*
                 * Initialize calendar container. 
                 */
                    methods_calendar.container.rp();
                },
                rp:function(){
                /*
                 *  Resize & position calendar container. Used for responsive feature.
                 */  
                    var hiddenBustedItems = prototypes.doHiddenBuster($(Container));
                
                    if (Container.width() < 500
                            || (methods_sidebar.data['style'] === 1
                                    && Container.width() < 900)
                            || methods_sidebar.data['style'] === 2
                            || methods_sidebar.data['style'] === 3
                            || (methods_sidebar.data['style'] === 4
                                    && Container.width() < 660)
                            || (methods_sidebar.data['style'] === 5
                                    && Container.width() < 800)){
                        $('.DOPBSPCalendar-container', Container).width(Container.width());
                        
                        if (methods_sidebar.data['style'] === 5){                  
                            $('.DOPBSPCalendar-sidebar', Container).removeAttr('style');            
                        }
                    }
                    else{
                        if (methods_sidebar.data['style'] === 5){
                            $('.DOPBSPCalendar-container', Container).width((Container.width()-21)/2);                            
                            $('.DOPBSPCalendar-sidebar', Container).width((Container.width()-21)/2);                            
                        }
                        else{
                            $('.DOPBSPCalendar-container', Container).width(Container.width()-$('.DOPBSPCalendar-sidebar', Container).width()-parseFloat($('.DOPBSPCalendar-sidebar', Container).css('margin-left'))-1);
                        }
                    }

                    prototypes.undoHiddenBuster(hiddenBustedItems);
                }
            },
            navigation: {
                init:function(){
                /*
                 * Initialize calendar navigation.
                 */
                    methods_calendar.navigation.events();
                    methods_calendar.navigation.rp();
                },
                rp:function(){
                /*
                 *  Resize & position calendar navigation. Used for responsive feature.
                 */  
                    var no = 0,
                    hiddenBustedItems = prototypes.doHiddenBuster($(Container));

                    if ($('.DOPBSPCalendar-navigation', Container).width() <= 400){
                        $('.DOPBSPCalendar-navigation .dopbsp-month-year', Container).html(methods_months.text['names'][(methods_calendar.vars.currMonth%12 !== 0 ? methods_calendar.vars.currMonth%12:12)-1]+' '+(new Date(methods_calendar.vars.startYear, methods_calendar.vars.currMonth, 0).getFullYear()))
                                                                                     .addClass('dopbsp-style-small'); 
                    }
                    else{
                        $('.DOPBSPCalendar-navigation .dopbsp-month-year', Container).html(methods_months.text['names'][(methods_calendar.vars.currMonth%12 !== 0 ? methods_calendar.vars.currMonth%12:12)-1]+' '+(new Date(methods_calendar.vars.startYear, methods_calendar.vars.currMonth, 0).getFullYear()))
                                                                                     .removeClass('dopbsp-style-small'); 
                    }

                    $('.DOPBSPCalendar-navigation .dopbsp-week .dopbsp-day', Container).width(parseInt(($('.DOPBSPCalendar-navigation .dopbsp-week', Container).width()-parseInt($('.DOPBSPCalendar-navigation .dopbsp-week', Container).css('padding-left'))+parseInt($('.DOPBSPCalendar-navigation .dopbsp-week', Container).css('padding-right')))/7));
                    no = methods_days.data['first']-1;

                    $('.DOPBSPCalendar-navigation .dopbsp-week .dopbsp-day', Container).each(function(){
                        no++;

                        if (no === 7){
                            no = 0;
                        }

                        if ($(this).width() <= 70){
                            $(this).html(methods_days.text['shortNames'][no]);
                        }
                        else{
                            $(this).html(methods_days.text['names'][no]);
                        }
                    });

                    prototypes.undoHiddenBuster(hiddenBustedItems);
                },
                events:function(){
                /*
                 * Initialize calendar navigation events.
                 */
                    /*
                     * Previous button event.
                     */
                    $('.DOPBSPCalendar-navigation .dopbsp-previous-btn', Container).unbind('click');
                    $('.DOPBSPCalendar-navigation .dopbsp-previous-btn', Container).bind('click', function(){
                        methods_calendar.init(methods_calendar.vars.startYear, 
                                              methods_calendar.vars.currMonth-1);

                        if (methods_calendar.vars.currMonth === methods_calendar.vars.startMonth){
                            $('.DOPBSPCalendar-navigation .dopbsp-previous-btn', Container).css('display', 'none');
                        }
                    });

                    /*
                     * Next button event.
                     */
                    $('.DOPBSPCalendar-navigation .dopbsp-next-btn', Container).unbind('click');
                    $('.DOPBSPCalendar-navigation .dopbsp-next-btn', Container).bind('click', function(){
                        methods_calendar.init(methods_calendar.vars.startYear, 
                                              methods_calendar.vars.currMonth+1);
                        $('.DOPBSPCalendar-navigation .dopbsp-previous-btn', Container).css('display', 'block');
                    });

                    /*
                     * Add button event.
                     */
                    $('.DOPBSPCalendar-navigation .dopbsp-add-btn', Container).unbind('click');
                    $('.DOPBSPCalendar-navigation .dopbsp-add-btn', Container).bind('click', function(){
                        methods_months.vars.no++;
                        methods_calendar.init(methods_calendar.vars.startYear, 
                                              methods_calendar.vars.currMonth);
                         
                        if (methods_months.vars.no >= methods_months.vars.maxAllowed){
                            $('.DOPBSPCalendar-navigation .dopbsp-add-btn', Container).css('display', 'none');
                            $('.DOPBSPCalendar-navigation .dopbsp-remove-btn', Container).addClass('dopbsp-no-add');
                        }
                        $('.DOPBSPCalendar-navigation .dopbsp-remove-btn', Container).css('display', 'block');
                        
                        prototypes.scrollToY($('.DOPBSPCalendar-calendar', Container).offset().top+$('.DOPBSPCalendar-calendar', Container).height()-$(window).height()+10);
                    });

                    /*
                     * Remove button event.
                     */
                    $('.DOPBSPCalendar-navigation .dopbsp-remove-btn', Container).unbind('click');
                    $('.DOPBSPCalendar-navigation .dopbsp-remove-btn', Container).bind('click', function(){
                        methods_months.vars.no--;
                        methods_calendar.init(methods_calendar.vars.startYear, 
                                              methods_calendar.vars.currMonth);

                        if (methods_months.vars.no < methods_months.vars.maxAllowed){
                            $('.DOPBSPCalendar-navigation .dopbsp-add-btn', Container).css('display', 'block');
                            $('.DOPBSPCalendar-navigation .dopbsp-remove-btn', Container).removeClass('dopbsp-no-add');
                        }
                        
                        if(methods_months.vars.no === 1){
                            $('.DOPBSPCalendar-navigation .dopbsp-remove-btn', Container).css('display', 'none');
                        }
                        
                        prototypes.scrollToY($('.DOPBSPCalendar-calendar', Container).offset().top+$('.DOPBSPCalendar-calendar', Container).height()-$(window).height()+10);
                    });
                }
            }
        },
                  
// 9. Months
        
        methods_months = {
            data: {},
            text: {},
            vars: {maxAllowed: 6,
                   no: 1},
            
            init:function(){
            /*
             * Initialize months data.
             */
                methods_months.vars.no = methods_months.data['no'];
            }
        },
                
        methods_month = {
            display:function(year,
                             month,
                             position){
            /*
             * Display month.
             * 
             * @param year (Number): the year that has the month to be initialized
             * @param month (Number): month to be initialized
             * @param position (Number): month's position in display order
             * 
             * @return months HTML
             */    
                var cmonth, 
                cday, 
                cyear,
                d, 
                day = methods_day.default(),
                HTML = new Array(), 
                i, 
                prevDay,
                noDays = new Date(year, month, 0).getDate(),
                noDaysPrevMonth = new Date(year, month-1, 0).getDate(),
                firstDay = new Date(year, month-1, 2-methods_days.data['first']).getDay(),
                lastDay = new Date(year, month-1, noDays-methods_days.data['first']+1).getDay(),
                schedule = methods_schedule.vars.schedule,
                totalDays = 0;
       
                if (position > 1){
                    HTML.push('<div class="DOPBSPCalendar-month-year">'+methods_months.text['names'][(month%12 !== 0 ? month%12:12)-1]+' '+year+'</div>');
                }
                HTML.push('<div class="DOPBSPCalendar-month" id="DOPBSPCalendar-month-'+ID+'-'+position+'">');

                /*
                 * Display previous month days.
                 */
                for (i=(firstDay === 0 ? 7:firstDay)-1; i>=1; i--){
                    totalDays++;

                    d = new Date(year, month-2, noDaysPrevMonth-i+1);
                    cyear = d.getFullYear();
                    cmonth = prototypes.getLeadingZero(d.getMonth()+1);
                    cday = prototypes.getLeadingZero(d.getDate());
                    day = schedule[cyear+'-'+cmonth+'-'+cday] !== undefined ? schedule[cyear+'-'+cmonth+'-'+cday]:methods_day.default(prototypes.getWeekDay(cyear+'-'+cmonth+'-'+cday));

                    prevDay = prototypes.getPrevDay(cyear+'-'+cmonth+'-'+cday);
                    methods_day.vars.previousStatus = methods_day.vars.previousStatus === '' ? (schedule[prevDay] !== undefined ? schedule[prevDay]['status']:'none'):methods_day.vars.previousStatus;
                    methods_day.vars.previousBind = methods_day.vars.previousBind === 0 ? (schedule[prevDay] !== undefined ? schedule[prevDay]['group']:0):methods_day.vars.previousBind;

                    if (methods_calendar.vars.startMonth === month 
                            && methods_calendar.vars.startYear === year){
                        HTML.push(methods_day.display('dopbsp-past-day', 
                                                      ID+'_'+cyear+'-'+cmonth+'-'+cday, 
                                                      d.getDate(), 
                                                      '', 
                                                      '', 
                                                      '', 
                                                      '', 
                                                      '', 
                                                      '', 
                                                      '', 
                                                      'none'));            
                    }
                    else{
                        HTML.push(methods_day.display('dopbsp-last-month'+(position > 1 ?  ' dopbsp-mask':''), 
                                                      position > 1 ? ID+'_'+cyear+'-'+cmonth+'-'+cday+'_last':ID+'_'+cyear+'-'+cmonth+'-'+cday, 
                                                      d.getDate(), 
                                                      day['available'], 
                                                      day['bind'], 
                                                      day['info'], 
                                                      day['info_body'],
                                                      day['info_info'],
                                                      day['price'], 
                                                      day['promo'], 
                                                      day['status']));
                    }
                }

                /*
                 * Display current month days.
                 */
                for (i=1; i<=noDays; i++){
                    totalDays++;

                    d = new Date(year, month-1, i);
                    cyear = d.getFullYear();
                    cmonth = prototypes.getLeadingZero(d.getMonth()+1);
                    cday = prototypes.getLeadingZero(d.getDate());
                    day = schedule[cyear+'-'+cmonth+'-'+cday] !== undefined ? schedule[cyear+'-'+cmonth+'-'+cday]:methods_day.default(prototypes.getWeekDay(cyear+'-'+cmonth+'-'+cday));

                    if (methods_calendar.vars.startMonth === month 
                            && methods_calendar.vars.startYear === year
                            && methods_calendar.vars.startDay > d.getDate()){
                        HTML.push(methods_day.display('dopbsp-past-day', 
                                                      ID+'_'+cyear+'-'+cmonth+'-'+cday, 
                                                      d.getDate(), 
                                                      '',
                                                      '', 
                                                      '',
                                                      '',
                                                      '', 
                                                      '', 
                                                      '', 
                                                      'none'));    
                    }
                    else{
                        HTML.push(methods_day.display('dopbsp-curr-month', 
                                                      ID+'_'+cyear+'-'+cmonth+'-'+cday, 
                                                      d.getDate(), 
                                                      day['available'], 
                                                      day['bind'], 
                                                      day['info'],
                                                      day['info_body'],
                                                      day['info_info'], 
                                                      day['price'], 
                                                      day['promo'], 
                                                      day['status']));
                    }
                }

                /*
                 * Display next month days.
                 */
                for (i=1; i<=(totalDays+7 < 42 ? 14:7)-lastDay; i++){
                    d = new Date(year, month, i);
                    cyear = d.getFullYear();
                    cmonth = prototypes.getLeadingZero(d.getMonth()+1);
                    cday = prototypes.getLeadingZero(d.getDate());
                    day = schedule[cyear+'-'+cmonth+'-'+cday] !== undefined ? schedule[cyear+'-'+cmonth+'-'+cday]:methods_day.default(prototypes.getWeekDay(cyear+'-'+cmonth+'-'+cday));

                    HTML.push(methods_day.display('dopbsp-next-month'+(position < methods_months.vars.no ?  ' dopbsp-hide':''), 
                                                  position < methods_months.vars.no ? ID+'_'+cyear+'-'+cmonth+'-'+cday+'_next':ID+'_'+cyear+'-'+cmonth+'-'+cday, 
                                                  d.getDate(), 
                                                  day['available'], 
                                                  day['bind'], 
                                                  day['info'], 
                                                  day['info_body'],
                                                  day['info_info'], 
                                                  day['price'], 
                                                  day['promo'], 
                                                  day['status']));
                }
                HTML.push('</div>');
                HTML.push('<div class="DOPBSPCalendar-hours" id="'+ID+'_'+year+'-'+prototypes.getLeadingZero(month)+'_hours"></div>');

                $('.DOPBSPCalendar-calendar', Container).append(HTML.join(''));
            }
        },
 
// 10. Days
        
        methods_days = {
            data: {},
            text: {},
            vars: {selectionEnd: '',
                   selectionInit: false,
                   selectionStart: '',
                   no: 0},
            
            displaySelection:function(id){
            /*
             * Display selected days "selection".
             * 
             * @param id (String): current day ID (ID_YYYY-MM-DD) 
             */
                var $day,
                day,
                $nextDay = undefined, 
                $prevDay = undefined;
        
                id = id === undefined ? methods_days.vars.selectionEnd:id;

                methods_days.clearSelection();
                
                if (methods_days.vars.selectionStart !== ''){
                    if (id < methods_days.vars.selectionStart){
                        $($('.DOPBSPCalendar-day', Container).get().reverse()).each(function(){
                            if ($(this).attr('id').split('_').length === 2){
                                $day = $(this);
                                day = this;

                                /*
                                 * Add selection if day is available.
                                 */
                                if ($day.attr('id') <= methods_days.vars.selectionStart
                                        && $day.attr('id') >= id
                                        && !$day.hasClass('dopbsp-mask') 
                                        && !$day.hasClass('dopbsp-past-day')){
                                    $day.addClass('dopbsp-selected');

                                    /*
                                     * Add selection if morning checkout option is enabled.
                                     */
                                    if (methods_days.data['morningCheckOut']){
                                        if ($day.attr('id') === methods_days.vars.selectionStart){
                                            $day.addClass('dopbsp-last');
                                        }

                                        if ($day.attr('id') !== methods_days.vars.selectionStart){
                                            $day.addClass('dopbsp-first');

                                            if ($nextDay !== undefined){
                                                $nextDay.removeClass('dopbsp-first');
                                            }
                                            $nextDay = $day;
                                        }
                                    }
                                }
                            }
                        });
                    }
                    else{
                        $('.DOPBSPCalendar-day', Container).each(function(){
                            if ($(this).attr('id').split('_').length === 2){
                                $day = $(this);  
                                day = this;

                                /*
                                 * Add selection if day is available.
                                 */
                                if ($day.attr('id') >= methods_days.vars.selectionStart
                                        && $day.attr('id') <= id
                                        && !$day.hasClass('dopbsp-mask') 
                                        && !$day.hasClass('dopbsp-past-day')){
                                    $day.addClass('dopbsp-selected');

                                    /*
                                     * Add selection if morning checkout option is enabled.
                                     */
                                    if (methods_days.data['morningCheckOut']){
                                        if ($day.attr('id') === methods_days.vars.selectionStart){
                                            $day.addClass('dopbsp-first');
                                        }
                                                
                                        if ($day.attr('id') !== methods_days.vars.selectionStart){
                                            $day.addClass('dopbsp-last');
                                            
                                            if (methods_days.vars.selectionEnd !== ''
                                                    && $day.attr('id') < methods_days.vars.selectionEnd){
                                                $day.removeClass('dopbsp-last');
                                            }

                                            if ($prevDay !== undefined){
                                                $prevDay.removeClass('dopbsp-last');
                                            }
                                            $prevDay = $day;
                                        }
                                    }
                                }
                            }
                        });
                    }
                }
            },
            
            clearSelection:function(){
            /*
             * Clear days "selection".
             * 
             */    
                $('.DOPBSPCalendar-day', Container).removeClass('dopbsp-selected')
                                                   .removeClass('dopbsp-first')
                                                   .removeClass('dopbsp-last'); 
            },
            
            getSelected:function(ciDay,
                                 coDay){
            /*
             * Get the list between 2 dates, included.
             * 
             * @param ciDay (String): check in day (YYYY-MM-DD)
             * @param coDay (String): check out day (YYYY-MM-DD)
             * 
             * @return array with selected days
             */
                var selectedDays = new Array(),
                y, 
                d, 
                m,
                ciy, 
                cim, 
                cid,
                coy, 
                com, 
                cod,
                firstMonth, 
                lastMonth, 
                firstDay, 
                lastDay,
                currYear, 
                currMonth, 
                currDay;

                /*
                 * Verify days.
                 */
                coDay = coDay === '' ? ciDay:coDay;

                ciy = parseInt(ciDay.split('-')[0], 10);
                cim = parseInt(ciDay.split('-')[1], 10);
                cid = parseInt(ciDay.split('-')[2], 10);
                coy = parseInt(coDay.split('-')[0], 10);
                com = parseInt(coDay.split('-')[1], 10);
                cod = parseInt(coDay.split('-')[2], 10);

                /*
                 * Generate all days between the dates.
                 */
                for (y=ciy; y<=coy; y++){
                    firstMonth = y === ciy ? cim:1;
                    lastMonth = y === coy ? com:12;

                    for (m=firstMonth; m<=lastMonth; m++){
                        firstDay = y === ciy && m === cim ? cid:1;
                        lastDay = y === coy && m === com ? cod:new Date(y,m,0).getDate();

                        for (d=firstDay; d<=lastDay; d++){
                            currYear = String(y);
                            currMonth = prototypes.getLeadingZero(m);
                            currDay = prototypes.getLeadingZero(d);

                            selectedDays.push(currYear+'-'+currMonth+'-'+currDay);
                        }
                    }
                }

                return selectedDays;
            },
            getAvailability:function(ciDay,
                                     coDay){
            /*
             * Get availability between 2 dates, included.
             * 
             * @param ciDay (String): check in day (YYYY-MM-DD)
             * @param coDay (String): check out day (YYYY-MM-DD)
             * 
             * @return true/false
             */
                var currDay,
                dayFound,
                i,
                maxNoDays,
                minNoDays,
                noDays,
                schedule = methods_schedule.vars.schedule,
                selectedDays = new Array();

                /*
                 * Verify days.
                 */
                coDay = coDay === '' && !methods_days.data['multipleSelect'] ? ciDay:coDay;
                
                if (methods_search.days.validate(ciDay) 
                        && methods_search.days.validate(coDay) 
                        && schedule !== {}){
                    /*
                     * Check if minimum/maximum number of days has been selected.
                     */
                    maxNoDays = methods_rules.getMaxTimeLapse();
                    minNoDays = methods_rules.getMinTimeLapse();
                    noDays = prototypes.getNoDays(ciDay, coDay)-(methods_days.data['morningCheckOut'] ? 1:0);
                    
                    if (noDays < minNoDays){
                        methods_info.toggleMessages(methods_rules.text['minTimeLapseDaysWarning'].replace(/%d/gi, minNoDays));
                        return false;
                    }
                    
                    if (maxNoDays !== 0
                            && noDays > maxNoDays){
                        methods_info.toggleMessages(methods_rules.text['maxTimeLapseDaysWarning'].replace(/%d/gi, maxNoDays));
                        return false;
                    }
                    
                    /*
                     * Get selected days.
                     */
                    selectedDays = methods_days.getSelected(ciDay,
                                                            coDay);
                    /*
                     * Check if selected days are available.
                     */
                    if (schedule[selectedDays[0]] === undefined 
                            || schedule[selectedDays[noDays-1]] === undefined){
                        methods_info.toggleMessages(methods_search.text['noServices']);
                        return false;
                    }
                    
                    if (schedule[selectedDays[0]]['bind'] === 2 
                            || schedule[selectedDays[0]]['bind'] === 3
                            || schedule[selectedDays[noDays-1]]['bind'] === 1 
                            || schedule[selectedDays[noDays-1]]['bind'] === 2){
                        methods_info.toggleMessages(methods_search.text['noServicesSplitGroup']);
                        return false;
                    }
                    
                    /*
                     * Check if selected days are available.
                     */
                    for (i=0; i<selectedDays.length-(methods_days.data['morningCheckOut'] ? 1:0); i++){
                        dayFound = false;
                        currDay = selectedDays[i];

                        if (schedule[currDay] !== undefined 
                                && (schedule[currDay]['status'] === 'available' 
                                        || schedule[currDay]['status'] === 'special')){
                            dayFound = true;
                        }

                        if (!dayFound){
                            methods_info.toggleMessages(methods_search.text['noServices']);
                            return false;
                        }
                    }
                    return true;
                }
                else{
                    if (!methods_search.days.validate(ciDay) 
                            || !methods_search.days.validate(coDay)){
                        return false;
                    }
                    else{
                        methods_info.toggleMessages(methods_search.text['noServices']);
                        return false;
                    }
                }
            },
            getNoAvailable:function(){
            /*
             * Get maximum number of available items for currently selected days.
             * 
             * @return number of available items
             */
                var ciDay,
                coDay,
                currDay,
                i,
                noAvailable = 1000000,
                schedule = methods_schedule.vars.schedule,
                selectedDays = new Array();

                /*
                 * Get days.
                 */
                if (methods_days.data['multipleSelect']){
                    ciDay = $('#DOPBSPCalendar-check-in'+ID).val();
                    coDay = $('#DOPBSPCalendar-check-out'+ID).val();
                }
                else{                            
                    ciDay = $('#DOPBSPCalendar-check-in'+ID).val();
                    coDay = $('#DOPBSPCalendar-check-in'+ID).val();
                }

                if (methods_search.days.validate(ciDay) 
                        && methods_search.days.validate(coDay) 
                        && schedule !== {}){
                    /*
                     * Get selected days.
                     */
                    selectedDays = methods_days.getSelected(ciDay,
                                                            coDay);
                    
                    for (i=0; i<selectedDays.length-(methods_days.data['morningCheckOut'] ? 1:0); i++){
                        currDay = selectedDays[i];

                        if (schedule[currDay] === undefined || 
                                schedule[currDay]['available'] === ''){
                            noAvailable = 1;
                        }
                        else if (noAvailable > schedule[currDay]['available']){
                            noAvailable = schedule[currDay]['available'];
                        }
                    }
                }
                
                return noAvailable === 0 || noAvailable === 1000000 ? 1:noAvailable;
            },
            getPrice:function(ciDay,
                              coDay){
            /*
             * Get the price between 2 dates, included.
             * 
             * @param ciDay (String): check in day (YYYY-MM-DD)
             * @param coDay (String): check out day (YYYY-MM-DD)
             * 
             * @return price value
             */
                var currDay,
                i,
                price,
                promo,
                schedule = methods_schedule.vars.schedule,
                selectedDays = new Array(),
                totalPrice = 0;
        
                /*
                 * Verify days.
                 */
                coDay = coDay === '' ? ciDay:coDay;

                /*
                 * Get selected days.
                 */
                selectedDays = methods_days.getSelected(ciDay,
                                                        coDay);

                for (i=0; i<selectedDays.length-(methods_days.data['morningCheckOut'] ? 1:0); i++){
                    currDay = selectedDays[i];

                    if (schedule[currDay] !== undefined 
                            && (schedule[currDay]['status'] === 'available' 
                                    || schedule[currDay]['status'] === 'special') 
                            && (schedule[currDay]['bind'] === 0
                                    || schedule[currDay]['bind'] === 1)){
                        price = parseFloat(schedule[currDay]['price']);
                        promo = parseFloat(schedule[currDay]['promo']);

                        if (price !== 0){
                            totalPrice += promo === 0 || isNaN(promo) ? price:promo;
                        }
                    }
                }
                
                return totalPrice;
            },
            getHistory:function(ciDay,
                                coDay){
            /*
             * Get the history (current schedule) between 2 dates, included.
             * 
             * @param ciDay (String): check in day (YYYY-MM-DD)
             * @param coDay (String): check out day (YYYY-MM-DD)
             * 
             * @return curent schedule
             */
                var currDay,
                history = {},
                i, 
                selectedDays = new Array(),
                schedule = methods_schedule.vars.schedule;

                /*
                 * Verify days.
                 */
                coDay = coDay === '' ? ciDay:coDay;

                /*
                 * Get selected days.
                 */
                selectedDays = methods_days.getSelected(ciDay,
                                                        coDay);

                for (i=0; i<selectedDays.length-(methods_days.data['morningCheckOut'] ? 1:0); i++){
                    currDay = selectedDays[i];

                    history[currDay] = {"available": "",
                                        "bind": 0,
                                        "price": 0,
                                        "promo": 0,
                                        "status": ""};
                    history[currDay]['available'] = schedule[currDay]['available'];
                    history[currDay]['bind'] = schedule[currDay]['bind'];
                    history[currDay]['price'] = schedule[currDay]['price'];
                    history[currDay]['promo'] = schedule[currDay]['promo'];
                    history[currDay]['status'] = schedule[currDay]['status'];
                }
                
                return history;
            }
        },
                
        methods_day = {
            vars: {displayedHours: false,
                   previousBind: 0,
                   previousStatus: ''},
    
            display:function(type,
                             id,
                             day,
                             available,
                             bind,
                             info,
                             infoBody,
                             infoInfo,
                             price,
                             promo,
                             status){
            /*
             * Display day.
             * 
             * @param type (String): day type (past-day, last-month, curr-month, next-month)
             * @param id (String): day ID (ID_YYYY-MM-DD)
             * @param day (String): current day
             * @param available (Number): number of available items for current day
             * @param bind (Number): day bind status
             *                       "0" none
             *                       "1" binded at the start of a group
             *                       "2" binded in a group group
             *                       "3" binded at the end of a group
             * @param info (String): day info
             * @param infoBody (String): day body info
             * @param infoInfo (String): day tooltip info
             * @param price (Number): day price
             * @param promo (Number): day promotional price
             * @param status (String): day status (available, booked, special, unavailable)
             * 
             * @retun day HTML
             */
                var dayHTML = Array(),
                contentLine1 = '&nbsp;', 
                contentLine2 = '&nbsp;';

                price = parseFloat(price);
                promo = parseFloat(promo);
                methods_days.vars.no++;

                if (price > 0 
                        && (bind === 0 
                                || bind === 1)){
                    contentLine1 = methods_price.set(price);
                }

                if (promo > 0 
                        && (bind === 0 
                                || bind === 1)){
                    contentLine1 = methods_price.set(promo);;
                }

                if (type !== 'dopbsp-past-day'){
                    switch (status){
                        case 'available':
                            type += ' dopbsp-available';

                            if (bind === 0 
                                    || bind === 1 
                                    || methods_hours.data['enabled']){
                                if (available > 1){
                                    contentLine2 = available+' '+'<span class="dopbsp-no-available-text">'+methods_calendar.text['availableMultiple']+'</span>';
                                }
                                else if (available === 1){
                                    contentLine2 = available+' '+'<span class="dopbsp-no-available-text">'+methods_calendar.text['available']+'</span>';
                                }
                                else{
                                    contentLine2 = '<span class="dopbsp-text">'+methods_calendar.text['available']+'</span>';
                                }
                            }
                            break;
                        case 'booked':
                            type += ' dopbsp-booked';
                            contentLine2 = '<span class="dopbsp-no-available-text">'+methods_calendar.text['booked']+'</span>';                                    
                            break;
                        case 'special':
                            type += ' dopbsp-special';

                            if (bind === 0 
                                    || bind === 1 
                                    || methods_hours.data['enabled']){
                                if (available > 1){
                                    contentLine2 = available+' '+'<span class="dopbsp-no-available-text">'+methods_calendar.text['availableMultiple']+'</span>';
                                }
                                else if (available === 1){
                                    contentLine2 = available+' '+'<span class="dopbsp-no-available-text">'+methods_calendar.text['available']+'</span>';
                                }
                                else{
                                    contentLine2 = '<span class="dopbsp-text">'+methods_calendar.text['available']+'</span>';
                                }
                            }
                            break;
                        case 'unavailable':
                            type += ' dopbsp-unavailable';
                            contentLine2 = '<span class="dopbsp-no-available-text">'+methods_calendar.text['unavailable']+'</span>';
                            break;
                    }
                    
                    /*
                     * Add pointer cursor.
                     */
                    if (type.indexOf('mask') !== -1){
                    /*
                     * No pointer cursor.
                     */
                        type += ' dopbsp-no-cursor-pointer';
                    }
                    else{
                        if (methods_hours.data['enabled']
                                || (!methods_days.data['morningCheckOut']
                                        && (status === 'available'
                                                || status === 'special'))){
                            type += ' dopbsp-cursor-pointer';
                        }
                    }
                }

                if (methods_days.vars.no % 7 === 1){
                    type += ' dopbsp-first-column';
                }

                if (methods_days.vars.no % 7 === 0){
                    type += ' dopbsp-last-column';
                }

                dayHTML.push('<div class="DOPBSPCalendar-day '+type+'" id="'+id+'">');
                dayHTML.push('  <div class="dopbsp-bind-left'+((bind === 2 || bind === 3) && (status === 'available' || status === 'special') && !methods_hours.data['enabled'] ? ' dopbsp-enabled':'')+(methods_day.vars.previousBind === 3 && methods_days.data['morningCheckOut'] && (methods_day.vars.previousStatus === 'available' || methods_day.vars.previousStatus === 'special') && !methods_hours.data['enabled'] ? ' dopbsp-extended dopbsp-'+methods_day.vars.previousStatus:'')+'">');
                dayHTML.push('      <div class="dopbsp-head">&nbsp;</div>');
                dayHTML.push('      <div class="dopbsp-body">&nbsp;</div>');
                dayHTML.push('  </div>');                        
                dayHTML.push('  <div class="dopbsp-bind-middle dopbsp-group'+((status === 'available' || status === 'special') && !methods_hours.data['enabled'] ? bind:'0')+(bind === 3 && methods_days.data['morningCheckOut'] && (status === 'available' || status === 'special') && !methods_hours.data['enabled'] ? ' dopbsp-extended':'')+(methods_day.vars.previousBind === 3 && methods_days.data['morningCheckOut'] && (methods_day.vars.previousStatus === 'available' || methods_day.vars.previousStatus === 'special') && !methods_hours.data['enabled'] ? ' dopbsp-extended':'')+'">');
                dayHTML.push('      <div class="dopbsp-head">');
                dayHTML.push('          <div class="dopbsp-co dopbsp-'+(methods_days.data['morningCheckOut'] ? methods_day.vars.previousStatus:status)+'"></div>');
                dayHTML.push('          <div class="dopbsp-ci dopbsp-'+status+'"></div>');
                dayHTML.push('          <div class="dopbsp-day">'+day+'</div>');

                if ((info !== ''
                                || (infoInfo !== undefined
                                            && infoInfo.length > 0))
                        && type.indexOf('past-day') === -1){
                    switch (status){
                        case 'available':
                            if (bind === 0 
                                    || bind === 3 
                                    || methods_hours.data['enabled']){
                                dayHTML.push('          <div class="dopbsp-info" id="'+id+'_info"></div>');
                            }
                            break;
                        case 'booked':
                            dayHTML.push('          <div class="dopbsp-info" id="'+id+'_info"></div>');                                   
                            break;
                        case 'special':
                            if (bind === 0 
                                    || bind === 3 
                                    || methods_hours.data['enabled']){
                                dayHTML.push('          <div class="dopbsp-info" id="'+id+'_info"></div>');
                            }
                            break;
                        case 'unavailable':
                            dayHTML.push('          <div class="dopbsp-info" id="'+id+'_info"></div>');
                            break;
                        default:
                            dayHTML.push('          <div class="dopbsp-info" id="'+id+'_info"></div>');
                    }
                }
                dayHTML.push('      </div>');
                dayHTML.push('      <div class="dopbsp-body">');
                dayHTML.push('          <div class="dopbsp-co dopbsp-'+(methods_days.data['morningCheckOut'] ? methods_day.vars.previousStatus:status)+'"></div>');
                dayHTML.push('          <div class="dopbsp-ci dopbsp-'+status+'"></div>');
                dayHTML.push('          <div class="dopbsp-price">'+contentLine1+'</div>');

                if (promo > 0 
                        && (bind === 0 
                                || bind === 1)){
                    dayHTML.push('          <div class="dopbsp-old-price">'+methods_price.set(price)+'</div>');
                }
                dayHTML.push('          <br class="DOPBSPCalendar-clear" />');
                dayHTML.push('          <div class="dopbsp-available">'+contentLine2+'</div>');
                
                if ((infoBody !== undefined
                                && infoBody.length > 0)
                        && type.indexOf('past-day') === -1){
                    dayHTML.push('          <div class="dopbsp-info-body" id="'+id+'_info-body">');
                    dayHTML.push('              <div class="dopbsp-info-body-mask">&#8594;</div>');
                    dayHTML.push(methods_form.getInfo(infoBody));
                    dayHTML.push('          </div>');
                }
                
                dayHTML.push('      </div>');  
                dayHTML.push('  </div>');
                dayHTML.push('  <div class="dopbsp-bind-right'+((bind === 1 || bind === 2) && (status === 'available' || status === 'special') && !methods_hours.data['enabled'] ? ' dopbsp-enabled':'')+(bind === 3 && methods_days.data['morningCheckOut'] && (status === 'available' || status === 'special') && !methods_hours.data['enabled'] ? ' dopbsp-extended':'')+'">');
                dayHTML.push('      <div class="dopbsp-head">&nbsp;</div>');
                dayHTML.push('      <div class="dopbsp-body">&nbsp;</div>');
                dayHTML.push('  </div>');
                dayHTML.push('</div>');

                if (type !== 'dopbsp-past-day'){
                    methods_day.vars.previousStatus = status;
                    methods_day.vars.previousBind = bind;
                }
                else{
                    methods_day.vars.previousStatus = 'none';
                    methods_day.vars.previousBind = 0;
                }

                return dayHTML.join('');
            },                    
            default:function(day){
            /*
             * Day default data.
             * 
             * @param day (Date): this day
             * 
             * @return JSON with default data
             */    
                return {"available": "",
                        "bind": 0,
                        "hours_definitions": methods_hours.data['definitions'],
                        "hours": {},
                        "info": "",
                        "info_body": "",
                        "info_info": "",
                        "notes": "",
                        "price": 0, 
                        "promo": 0,
                        "status": methods_days.data['available'][day] ? "none":"unavailable"};
            },
            rp:function(){
            /*
             *  Resize & position calendar day. Used for responsive feature.
             */  
                var $day = $('.DOPBSPCalendar-day', Container),
                $dayBody = $('.DOPBSPCalendar-day .dopbsp-body', Container),
                $month = $('#DOPBSPCalendar-month-'+ID+'-1'),        
                dayWidth = 0,
                maxHeight = 0,
                hiddenBustedItems = prototypes.doHiddenBuster($(Container));
        
                dayWidth = parseInt(($month.width()-parseInt($month.css('padding-left'))+parseInt($month.css('padding-right')))/7);
        
                $dayBody.removeAttr('style');
                $day.width(dayWidth);
                $day.find($('.dopbsp-bind-middle')).width(dayWidth-2);

                /*
                 * If day width smaller than 70px available, booked, unavailable text is hidden.
                 */
                if (dayWidth <= 70){
                    $day.find($('.dopbsp-no-available-text')).css('display', 'none');
                }
                else{
                    $day.find($('.dopbsp-no-available-text')).css('display', 'inline');
                }

                /*
                 * If day width smaller than 40px only day header with day number is visible.
                 */
                if (dayWidth <= 40){
                    $day.addClass('dopbsp-style-small');
                }
                else{
                    $day.removeClass('dopbsp-style-small');

                    /*
                     * Set days height to the biggest height found.
                     */
                    $('.DOPBSPCalendar-day .dopbsp-bind-middle .dopbsp-body', Container).each(function(){
                        if (maxHeight < $(this).height()){
                            maxHeight = $(this).height();
                        }
                    });

                    $dayBody.height(maxHeight);
                }

                prototypes.undoHiddenBuster(hiddenBustedItems);
            },  
            
            getInfo:function(info){
                var info = new Array(),
                i;
                
                for (i=0; i<info.length; i++){
                    info.push(info[i]);
                }
                
                return info.join('<br />');
            },
            
            events: {
                init:function(){
                /*
                 * Initialize days events.
                 */
                    if (!methods_calendar.data['view']){
                        if (methods_hours.data['enabled']){
                            methods_day.events.selectHours();
                        }
                        else{
                            if (methods_days.data['multipleSelect']){
                                methods_day.events.selectMultiple();
                            }
                            else{
                                methods_day.events.selectSingle();
                            }
                        }
                    }
                    else{
                        $('.DOPBSPCalendar-day .dopbsp-co', Container).css('cursor', 'default');
                        $('.DOPBSPCalendar-day .dopbsp-ci', Container).css('cursor', 'default');
                    }

                    if (!prototypes.isTouchDevice()){
                        if (!methods_calendar.data['view']){
                            /*
                             * Days hover events, not available for devices with touchscreen.
                             */
                            $('.DOPBSPCalendar-day', Container).hover(function(){
                                var day = $(this);

                                if (methods_days.vars.selectionInit){
                                    methods_days.displaySelection(day.attr('id'));
                                }

                                if (methods_hours.data['enabled'] 
                                        && methods_hours.data['info'] 
                                        && !day.hasClass('dopbsp-past-day')
                                        && !day.hasClass('dopbsp-selected') 
                                        && !day.hasClass('dopbsp-mask')){
                                    methods_tooltip.set($(this).attr('id').split('_')[1], 
                                                        '', 
                                                        'hours', 
                                                        methods_hours.displayInfo(day.attr('id')));
                                }
                            }, function(){
                                methods_tooltip.clear();
                            });
                        }

                        /*
                         * Info icon events.
                         */
                        $('.DOPBSPCalendar-day .dopbsp-info', Container).hover(function(){
                            methods_tooltip.set($(this).attr('id').split('_')[1], 
                                                '', 
                                                'info');
                        }, function(){
                            methods_tooltip.clear();
                        });
                        
                        /*
                         * Body info events.
                         */
                        $('.DOPBSPCalendar-day .dopbsp-info-body', Container).hover(function(){
                            methods_tooltip.set($(this).attr('id').split('_')[1], 
                                                '', 
                                                'info-body');
                        }, function(){
                            methods_tooltip.clear();
                        });
                    }
                    else{
                        var xPos = 0, 
                        yPos = 0, 
                        touch;

                        /*
                         * Info icon events on devices with touchscreen.
                         */
                        $('.DOPBSPCalendar-day .dopbsp-info', Container).unbind('touchstart');
                        $('.DOPBSPCalendar-day .dopbsp-info', Container).bind('touchstart', function(e){
                            e.preventDefault();
                            touch = e.originalEvent.touches[0];
                            xPos = touch.clientX+$(document).scrollLeft();
                            yPos = touch.clientY+$(document).scrollTop();
                            $('#DOPBSPCalendar-tooltip'+ID).css({'left': xPos,
                                                                 'top': yPos});
                            methods_tooltip.set($(this).attr('id').split('_')[1], 
                                                '', 
                                                'info');
                        });

                        /*
                         * Body info events on devices with touchscreen.
                         */
                        $('.DOPBSPCalendar-day .dopbsp-info-body', Container).unbind('touchstart');
                        $('.DOPBSPCalendar-day .dopbsp-info-body', Container).bind('touchstart', function(e){
                            e.preventDefault();
                            touch = e.originalEvent.touches[0];
                            xPos = touch.clientX+$(document).scrollLeft();
                            yPos = touch.clientY+$(document).scrollTop();
                            $('#DOPBSPCalendar-tooltip'+ID).css({'left': xPos,
                                                                 'top': yPos});
                            methods_tooltip.set($(this).attr('id').split('_')[1], 
                                                '', 
                                                'info-body');
                        });
                    }
                },
                selectHours:function(){
                /*
                 * Select hours event.
                 */    
                    /*
                     * Days click event.
                     */
                    $('.DOPBSPCalendar-day', Container).unbind('click');
                    $('.DOPBSPCalendar-day', Container).bind('click', function(){
                        var day = $(this);
                        
                        if (!day.hasClass('dopbsp-mask') 
                                && !day.hasClass('dopbsp-past-day')){
                            methods_hours.display(day.attr('id'));
                        }
                    });
                },
                selectMultiple:function(){
                /*
                 * Select multipe days events.
                 */    
                    /*
                     * Days click event.
                     */
                    $('.DOPBSPCalendar-day', Container).unbind('click');
                    $('.DOPBSPCalendar-day', Container).bind('click', function(){
                        var auxDate,
                        $day = $(this),
                        eDate, 
                        eDay,
                        eMonth, 
                        eYear, 
                        minDateValue = 0,
                        sDate, 
                        sDay,
                        sMonth, 
                        sYear;
                        
                        /*
                         * Add a small delay of 10 miliseconds for hover selection to display properly.
                         */
                        setTimeout(function(){
                            if (!$day.hasClass('dopbsp-mask') 
                                    && !$day.hasClass('dopbsp-past-day')){
                                if (!methods_days.vars.selectionInit){
                                /*
                                 * Select first day.
                                 */                                                       
                                    methods_days.vars.selectionInit = true;
                                    methods_days.vars.selectionStart = $day.attr('id');
                                    methods_days.vars.selectionEnd = '';

                                    /*
                                     * Reinitialize datepickers.
                                     */
                                    sDate = methods_days.vars.selectionStart.split('_')[1];
                                    sYear = sDate.split('-')[0];
                                    sMonth = parseInt(sDate.split('-')[1], 10)-1;
                                    sDay = sDate.split('-')[2];
                                    minDateValue = prototypes.getNoDays(prototypes.getToday(), sDate)-(methods_days.data['morningCheckOut'] ? 0:1);

                                    $('#DOPBSPCalendar-check-in'+ID).val(sDate);
                                    $('#DOPBSPCalendar-check-in-view'+ID).val(methods_calendar.data['dateType'] === 1 ? 
                                                                              methods_months.text['names'][sMonth]+' '+sDay+', '+sYear:
                                                                              sDay+' '+methods_months.text['names'][sMonth]+' '+sYear);
                                    $('#DOPBSPCalendar-check-out'+ID).val('');
                                    $('#DOPBSPCalendar-check-out-view'+ID).val(methods_search.text['checkOut'])
                                                                          .removeAttr('disabled');;

                                    methods_search.days.initDatepicker('#DOPBSPCalendar-check-out-view'+ID,
                                                                       '#DOPBSPCalendar-check-out'+ID,
                                                                       minDateValue);

                                    methods_days.displaySelection(methods_days.vars.selectionStart);
                                }
                                else if (!methods_days.data['morningCheckOut'] 
                                            || (methods_days.data['morningCheckOut'] 
                                                        && methods_days.vars.selectionStart !== $day.attr('id'))){
                                /*
                                 * Select second day.
                                 */
                                    methods_days.vars.selectionInit = false;
                                    methods_days.vars.selectionEnd = $day.attr('id');
                                    $('#DOPBSPCalendar-check-out-view'+ID).removeAttr('disabled');

                                    if (methods_days.vars.selectionStart > methods_days.vars.selectionEnd){
                                        auxDate = methods_days.vars.selectionStart;
                                        methods_days.vars.selectionStart = methods_days.vars.selectionEnd;
                                        methods_days.vars.selectionEnd = auxDate;
                                    }

                                    /*
                                     * Reinitialize datepickers.
                                     */
                                    sDate = methods_days.vars.selectionStart.split('_')[1];
                                    sYear = sDate.split('-')[0];
                                    sMonth = parseInt(sDate.split('-')[1], 10)-1;
                                    sDay = sDate.split('-')[2];
                                    eDate = methods_days.vars.selectionEnd.split('_')[1];
                                    eYear = eDate.split('-')[0];
                                    eMonth = parseInt(eDate.split('-')[1], 10)-1;
                                    eDay = eDate.split('-')[2];
                                    minDateValue = prototypes.getNoDays(prototypes.getToday(), sDate)-(methods_days.data['morningCheckOut'] ? 0:1);

                                    $('#DOPBSPCalendar-check-in'+ID).val(sDate);
                                    $('#DOPBSPCalendar-check-in-view'+ID).val(methods_calendar.data['dateType'] === 1 ? 
                                                                              methods_months.text['names'][sMonth]+' '+sDay+', '+sYear:
                                                                              sDay+' '+methods_months.text['names'][sMonth]+' '+sYear);
                                    $('#DOPBSPCalendar-check-out'+ID).val(eDate);
                                    $('#DOPBSPCalendar-check-out-view'+ID).val(methods_calendar.data['dateType'] === 1 ? 
                                                                               methods_months.text['names'][eMonth]+' '+eDay+', '+eYear:
                                                                               eDay+' '+methods_months.text['names'][eMonth]+' '+eYear);
                                    methods_search.days.initDatepicker('#DOPBSPCalendar-check-out-view'+ID,
                                                                       '#DOPBSPCalendar-check-out'+ID,
                                                                       minDateValue);
                                    methods_days.displaySelection(methods_days.vars.selectionEnd);
                                    methods_search.set();
                                }
                            }
                        }, 10);
                    });
                },
                selectSingle:function(){
                /*
                 * Select single day event.
                 */    
                    /*
                     * Days click event.
                     */
                    $('.DOPBSPCalendar-day', Container).unbind('click');
                    $('.DOPBSPCalendar-day', Container).bind('click', function(){
                        var day = $(this),
                        dayThis = this,
                        sDate, 
                        sDay,
                        sMonth, 
                        sYear;

                        /*
                         * Add a small delay of 10 miliseconds for hover selection to display properly.
                         */
                        setTimeout(function(){
                            /*
                             * Check if the day has availability set.
                             */
                            if ((day.hasClass('dopbsp-available') 
                                        || day.hasClass('dopbsp-special')) 
                                    && $('.dopbsp-bind-middle', dayThis).hasClass('dopbsp-group0')){
                            /*
                             * Select one day.
                             */    
                                methods_days.vars.selectionInit = false;
                                methods_days.vars.selectionStart = day.attr('id');
                                methods_days.vars.selectionEnd = day.attr('id');

                                sDate = methods_days.vars.selectionStart.split('_')[1];
                                sYear = sDate.split('-')[0];
                                sMonth = parseInt(sDate.split('-')[1], 10)-1;
                                sDay = sDate.split('-')[2];

                                $('#DOPBSPCalendar-check-in'+ID).val(sDate);
                                $('#DOPBSPCalendar-check-in-view'+ID).val(methods_calendar.data['dateType'] === 1 ? 
                                                                          methods_months.text['names'][sMonth]+' '+sDay+', '+sYear:
                                                                          sDay+' '+methods_months.text['names'][sMonth]+' '+sYear);

                                methods_days.displaySelection(methods_days.vars.selectionEnd);
                                methods_search.set();
                            }
                        }, 10);
                    });
                }
            }
        },

// 11. Hours
         
        methods_hours = {
            data: {},
            text: {},
            vars: {selectionEnd: '',
                   selectionInit: false,
                   selectionStart: ''},
            
            display:function(id){
            /*
             * Display hours.
             * 
             * @param id (String): day ID (ID_YYYY-MM-DD)
             */
                var currHour = methods_calendar.vars.startDate.getHours(),
                currMin = methods_calendar.vars.startDate.getMinutes(),
                hour,
                hoursContainer,
                hoursDef = methods_hours.data['definitions'], 
                HTML = new Array(), 
                i,
                date = id.split('_')[1],
                year = date.split('-')[0],
                month = date.split('-')[1],
                day = date.split('-')[2];

                methods_days.vars.selectionInit = false;
                methods_days.vars.selectionStart = id;
                methods_days.vars.selectionEnd = id;
                methods_day.vars.displayedHours = true;
                methods_hours.vars.selectionInit = false;
                methods_hours.vars.selectionStart = '';
                methods_hours.vars.selectionEnd = '';

                $('#DOPBSPCalendar-check-in'+ID).val(date);
                $('#DOPBSPCalendar-check-in-view'+ID).val(methods_calendar.data['dateType'] === 1 ? methods_months.text['names'][parseInt(month, 10)-1]+' '+day+', '+year:
                                                                                                    day+' '+methods_months.text['names'][parseInt(month, 10)-1]+' '+year);
                
                /*
                 * Select day even if status is not available or special.
                 */
                methods_days.displaySelection(methods_days.vars.selectionEnd);
                $('#'+methods_days.vars.selectionStart).addClass('dopbsp-selected');
                methods_search.set();
                
                /*
                 * Generate hours list.
                 */
                if (methods_schedule.vars.schedule[date] !== undefined){
                    hoursDef = methods_schedule.vars.schedule[date]['hours_definitions'];
                }                        

                for (i=0; i<hoursDef.length-(methods_hours.data['interval'] ? 1:0); i++){
                    if (methods_schedule.vars.schedule[date] !== undefined 
                            && methods_schedule.vars.schedule[date]['hours'][hoursDef[i]['value']] !== undefined){
                        hour = methods_schedule.vars.schedule[date]['hours'][hoursDef[i]['value']];
                    }
                    else{
                        hour = methods_hour.default();
                    }
                    
                    HTML.push(methods_hour.display(ID+'_'+hoursDef[i]['value'],
                                                   hoursDef[i]['value'],
                                                   hour['available'], 
                                                   hour['bind'], 
                                                   hour['info'], 
                                                   hour['info_body'],
                                                   hour['info_info'],
                                                   hour['price'], 
                                                   hour['promo'],
                                                   hoursDef[i]['value'] < prototypes.getLeadingZero(currHour)+':'+prototypes.getLeadingZero(currMin) 
                                                        && methods_calendar.vars.startYear+'-'+prototypes.getLeadingZero(methods_calendar.vars.startMonth)+'-'+prototypes.getLeadingZero(methods_calendar.vars.startDay) === year+'-'+month+'-'+day 
                                                        ? 'past-hour':hour['status'], 
                                                   hoursDef));
                }                   

                $('.DOPBSPCalendar-hours', Container).css('display', 'none')
                                                     .html('');

                /*
                 * Check for correct hours container when more months are displayed
                 */                                     
                if ($('#'+id).hasClass('dopbsp-next-month')){  
                    $('.DOPBSPCalendar-hours', Container).each(function(){
                        hoursContainer = $(this);
                    });
                    hoursContainer.css('display', 'block')
                                  .html(HTML.join(''));
                }
                else if ($('#'+id).hasClass('dopbsp-last-month')){
                    $($('.DOPBSPCalendar-hours', Container).get().reverse()).each(function(){
                        hoursContainer = $(this);
                    });
                    hoursContainer.css('display', 'block')
                                  .html(HTML.join(''));
                }
                else{
                    $('#'+ID+'_'+year+'-'+month+'_hours').css('display', 'block')
                                                         .html(HTML.join(''));
                }
                
                /*
                 * Init hours events & sidebar.
                 */
                methods_hour.events.init();
                methods_search.hours.set();
            },
            displayInfo:function(id){
            /*
             * Display hours info.
             * 
             * @param id (String): day ID (ID_YYYY-MM-DD)
             */    
                var currHour = methods_calendar.vars.startDate.getHours(),
                currMin = methods_calendar.vars.startDate.getMinutes(),
                hour, 
                hoursDef = methods_hours.data['definitions'],
                HTML = new Array(),
                i,
                date = id.split('_')[1],
                year = date.split('-')[0],
                month = date.split('-')[1],
                day = date.split('-')[2];

                /*
                 * Generate hours list.
                 */
                if (methods_schedule.vars.schedule[date] !== undefined){
                    hoursDef = methods_schedule.vars.schedule[date]['hours_definitions'];
                }   
                
                for (i=0; i<hoursDef.length-(methods_hours.data['interval'] ? 1:0); i++){
                    if (methods_schedule.vars.schedule[date] !== undefined 
                            && methods_schedule.vars.schedule[date]['hours'][hoursDef[i]['value']] !== undefined){
                        hour = methods_schedule.vars.schedule[date]['hours'][hoursDef[i]['value']];
                    }
                    else{
                        hour = methods_hour.default();
                    }
                    
                    HTML.push(methods_hour.display(ID+'_'+hoursDef[i]['value'],
                                                   hoursDef[i]['value'],
                                                   hour['available'],
                                                   hour['bind'], 
                                                   '',
                                                   hour['info_body'],
                                                   '',
                                                   hour['price'], 
                                                   hour['promo'], 
                                                   hoursDef[i]['value'] < prototypes.getLeadingZero(currHour)+':'+prototypes.getLeadingZero(currMin) 
                                                        && methods_calendar.vars.startYear+'-'+prototypes.getLeadingZero(methods_calendar.vars.startMonth)+'-'+prototypes.getLeadingZero(methods_calendar.vars.startDay) === year+'-'+month+'-'+day 
                                                        ? 'past-hour':hour['status'], 
                                                   hoursDef));
                }   

                return HTML.join('');
            },
            displaySelection:function(id){
            /*
             * Display selected hours "selection".
             * 
             * @param id (String): day ID (ID_YYYY-MM-DD)
             */    
                var hour;

                id = id === undefined ? methods_hours.vars.selectionEnd:id;
                
                $('.DOPBSPCalendar-hour', Container).removeClass('dopbsp-selected');

                if (id < methods_hours.vars.selectionStart){
                    $($('.DOPBSPCalendar-hour', Container).get().reverse()).each(function(){
                        hour = $(this);

                        if (hour.attr('id') >= id 
                                && hour.attr('id') <= methods_hours.vars.selectionStart
                                && !hour.hasClass('dopbsp-past-hour')){
                            hour.addClass('dopbsp-selected');
                        }
                    });
                }
                else{
                    $('.DOPBSPCalendar-hour', Container).each(function(){
                        hour = $(this);   

                        if (hour.attr('id') >= methods_hours.vars.selectionStart 
                                && hour.attr('id') <= id
                                && !hour.hasClass('dopbsp-past-hour')){
                            hour.addClass('dopbsp-selected');
                        }
                    });
                }       

                $('.DOPBSPCalendar-hour.selected .dopbsp-bind-middle', Container).removeAttr('style');  
                $('.DOPBSPCalendar-hour.selected .dopbsp-bind-middle .dopbsp-hour', Container).removeAttr('style');         
            },
            
            clear:function(){
            /*
             * Clear selected hours, including selected day.
             */    
                methods_days.vars.selectionInit = false;
                methods_days.vars.selectionStart = '';
                methods_days.vars.selectionEnd = '';
                methods_day.vars.displayedHours = '';
                methods_hours.vars.selectionInit = false;
                methods_hours.vars.selectionStart = '';
                methods_hours.vars.selectionEnd = '';
                
                methods_days.clearSelection();
                $('.DOPBSPCalendar-hours', Container).css('display', 'none')
                                                     .html('');
                methods_search.set();
            },
            
            getSelected:function(day,
                                 startHour,
                                 endHour){
            /*
             * Get the list between 2 hours, included.
             * 
             * @param day (String): check in day (YYYY-MM-DD)
             * @param startHour (String): start hour (HH-MM)
             * @param endHour (String): end hour (HH-MM)
             * 
             * @return array with selected hours
             */
                var schedule = methods_schedule.vars.schedule,
                selectedHours = new Array();
        
                /*
                 * Verify hours.
                 */
                endHour = endHour === '' ? startHour:endHour;

                $.each(schedule[day]['hours_definitions'], function(index){
                    if (startHour <= schedule[day]['hours_definitions'][index]['value'] 
                            && schedule[day]['hours_definitions'][index]['value'] <= endHour){
                        selectedHours.push(schedule[day]['hours_definitions'][index]['value']);
                    }
                });
                
                return selectedHours;
            },
            getAvailability:function(day,
                                     startHour,
                                     endHour){
            /*
             * Get availability between 2 hours, included.
             * 
             * @param day (String): check in day (YYYY-MM-DD)
             * @param startHour (String): start hour (HH-MM)
             * @param endHour (String): end hour (HH-MM)
             * 
             * @return true/false
             */
                var currHour,
                hourFound,
                hoursDiff = ((!methods_hours.data['addLastHourToTotalPrice'] || methods_hours.data['interval']) && methods_hours.data['multipleSelect'] ? 1:0),
                i,
                maxNoMinutes,
                minNoMinutes,
                noMinutes,
                schedule = methods_schedule.vars.schedule,
                selectedHours = new Array();
        
                /*
                 * Verify hours.
                 */
                endHour = endHour === '' && !methods_hours.data['multipleSelect'] ? startHour:endHour;
                
                if (methods_search.days.validate(day) 
                        && startHour !== '' 
                        && endHour !== '' 
                        && schedule !== {}
                        && schedule[day] !== undefined){
                    /*
                     * Check if minimum/maximum number of hours has been selected.
                     */
                    maxNoMinutes = methods_rules.getMaxTimeLapse()*60;
                    minNoMinutes = methods_rules.getMinTimeLapse()*60;
                    noMinutes = prototypes.getHoursDifference(startHour, endHour, 'minutes');
                    
                    if (noMinutes < minNoMinutes){
                        methods_info.toggleMessages(methods_rules.text['minTimeLapseHoursWarning'].replace(/%d/gi, minNoMinutes/60));
                        return false;
                    }
                    
                    if (maxNoMinutes !== 0
                            && noMinutes > maxNoMinutes){
                        methods_info.toggleMessages(methods_rules.text['maxTimeLapseHoursWarning'].replace(/%d/gi, maxNoMinutes/60));
                        return false;
                    }
                    
                    /*
                     * Get selected hours.
                     */
                    selectedHours = methods_hours.getSelected(day,
                                                              startHour,
                                                              endHour);

                    /*
                     * Check if selected hours are available.
                     */
                    if (schedule[day]['hours'][selectedHours[0]] === undefined 
                            || schedule[day]['hours'][selectedHours[selectedHours.length-hoursDiff-1]] === undefined){
                        methods_info.toggleMessages(methods_search.text['noServices']);
                        return false;
                    }
                    
                    if (schedule[day]['hours'][selectedHours[0]]['bind'] === 2 
                            || schedule[day]['hours'][selectedHours[0]]['bind'] === 3 
                            || schedule[day]['hours'][selectedHours[selectedHours.length-hoursDiff-1]]['bind'] === 1
                            || schedule[day]['hours'][selectedHours[selectedHours.length-hoursDiff-1]]['bind'] === 2){
                        methods_info.toggleMessages(methods_search.text['noServicesSplitGroup']);
                        return false;
                    }
                    
                    for (i=0; i<selectedHours.length-hoursDiff; i++){
                        hourFound = false;
                        currHour = selectedHours[i];
                        
                        if (schedule[day]['hours'][currHour] !== undefined 
                                && (schedule[day]['hours'][currHour]['status'] === 'available' 
                                        || schedule[day]['hours'][currHour]['status'] === 'special')){
                            hourFound = true;
                        }

                        if (!hourFound){
                            methods_info.toggleMessages(methods_search.text['noServices']);
                            return false;
                        }
                    }
                    return true;
                }
                else{
                    if (!methods_search.days.validate(day)
                            || startHour === '' 
                            || endHour === ''){
                        return false;
                    }
                    else{
                        methods_info.toggleMessages(methods_search.text['noServices']);
                        return false;
                    }
                }
            },
            getNoAvailable:function(){
            /*
             * Get maximum number of available items for currently selected hours.
             * 
             * @return number of available items
             */
                var currHour,
                day,  
                endHour,
                i,
                noAvailable = 1000000,
                schedule = methods_schedule.vars.schedule,
                selectedHours = new Array(),
                startHour;
                
                /*
                 * Verify day.
                 */
                day = $('#DOPBSPCalendar-check-in'+ID).val();
                
                /*
                 * Verify hours.
                 */
                if (methods_hours.data['multipleSelect']){
                    startHour = $('#DOPBSPCalendar-start-hour'+ID).val();
                    endHour = $('#DOPBSPCalendar-end-hour'+ID).val();
                }
                else{                            
                    startHour = $('#DOPBSPCalendar-start-hour'+ID).val();
                    endHour = $('#DOPBSPCalendar-start-hour'+ID).val();
                }

                if (methods_search.days.validate(day) 
                        && startHour !== '' 
                        && endHour !== '' 
                        && schedule !== {}
                        && schedule[day] !== undefined){
                    selectedHours = methods_hours.getSelected(day,
                                                              startHour,
                                                              endHour);
                    
                    for (i=0; i<selectedHours.length-((!methods_hours.data['addLastHourToTotalPrice'] || methods_hours.data['interval']) && methods_hours.data['multipleSelect'] ? 1:0); i++){
                        currHour = selectedHours[i];  
                                        
                        if (schedule[day]['hours'][currHour] !== undefined 
                                && (schedule[day]['hours'][currHour]['status'] === 'available' 
                                        || schedule[day]['hours'][currHour]['status'] === 'special')){
                            if (schedule[day]['hours'][currHour]['available'] === ''){
                                noAvailable = 1;
                            } 
                            else if (parseInt(schedule[day]['hours'][currHour]['available'], 10) < noAvailable){
                                noAvailable = parseInt(schedule[day]['hours'][currHour]['available'], 10);
                            }
                        }
                    }
                }
                
                return noAvailable === 0 || noAvailable === 1000000 ? 1:noAvailable;
            },
            getPrice:function(day,
                              startHour,
                              endHour){
            /*
             * Get the price between 2 hours, included.
             * 
             * @param day (String): check in day (YYYY-MM-DD)
             * @param startHour (String): start hour (HH-MM)
             * @param endHour (String): end hour (HH-MM)
             * 
             * @return price value
             */
                var currHour,
                i,
                price,
                promo,
                schedule = methods_schedule.vars.schedule,
                selectedHours = new Array(),
                totalPrice = 0;
        
                /*
                 * Verify hours.
                 */
                endHour = endHour === '' ? startHour:endHour;
                
                /*
                 * Get selected hours.
                 */
                selectedHours = methods_hours.getSelected(day,
                                                          startHour,
                                                          endHour);

                for (i=0; i<selectedHours.length-((!methods_hours.data['addLastHourToTotalPrice'] || methods_hours.data['interval']) && methods_hours.data['multipleSelect'] ? 1:0); i++){
                    currHour = selectedHours[i];  
                    
                    if (schedule[day]['hours'][currHour] !== undefined 
                            && (schedule[day]['hours'][currHour]['status'] === 'available' 
                                    || schedule[day]['hours'][currHour]['status'] === 'special')
                            && (schedule[day]['hours'][currHour]['bind'] === 0 
                                    || schedule[day]['hours'][currHour]['bind'] === 1)){
                        price = parseFloat(schedule[day]['hours'][currHour]['price']);
                        promo = parseFloat(schedule[day]['hours'][currHour]['promo']);

                        if (price !== 0){
                            totalPrice += promo === 0 ? price:promo;
                        }
                    }
                }
                
                return totalPrice;
            },
            getHistory:function(day,
                                startHour,
                                endHour){
            /*
             * Get the history (current schedule) between 2 hours, included.
             * 
             * @param day (String): check in day (YYYY-MM-DD)
             * @param startHour (String): start hour (HH-MM)
             * @param endHour (String): end hour (HH-MM)
             * 
             * @return curent schedule
             */
                var currHour,
                history = {},
                i,
                schedule = methods_schedule.vars.schedule,
                selectedHours = new Array();
        
                /*
                 * Verify hours.
                 */
                endHour = endHour === '' ? startHour:endHour;

                /*
                 * Get selected hours.
                 */
                selectedHours = methods_hours.getSelected(day,
                                                          startHour,
                                                          endHour);

                for (i=0; i<selectedHours.length-((!methods_hours.data['addLastHourToTotalPrice'] || methods_hours.data['interval']) && methods_hours.data['multipleSelect'] ? 1:0); i++){
                    currHour = selectedHours[i];

                    history[currHour] = {"available": "",
                                         "bind": 0,
                                         "price": 0,
                                         "promo": 0,
                                         "status": ""};
                    history[currHour]['available'] = schedule[day]['hours'][currHour]['available'];
                    history[currHour]['bind'] = schedule[day]['hours'][currHour]['bind'];
                    history[currHour]['price'] = schedule[day]['hours'][currHour]['price'];
                    history[currHour]['promo'] = schedule[day]['hours'][currHour]['promo'];
                    history[currHour]['status'] = schedule[day]['hours'][currHour]['status'];
                }
                
                return history;
            }
        },
                
        methods_hour = {
            display:function(id, 
                             hour, 
                             available, 
                             bind, 
                             info, 
                             infoBody,
                             infoInfo,
                             price, 
                             promo, 
                             status, 
                             hoursDef){
            /*
             * Display hour.
             * 
             * @param id (String): hour ID (ID_HH:MM for list, ID_HH:MM for info)
             * @param hour (String): current hour (HH:MM)
             * @param available (Number): number of available items for current hour
             * @param bind (Number): day bind status
             *                       "0" none
             *                       "1" binded at the start of a group
             *                       "2" binded in a group group
             *                       "3" binded at the end of a group
             * @param info (String): hour info
             * @param infoBody (String): hour body info
             * @param infoInfo (String): hour tooltip info
             * @param price (Number): hour price
             * @param promo (Number): hour promotional price
             * @param status (String): hour status (available, booked, special, unavailable)
             * @param hoursDef (Array): hours definitions
             * 
             * @retun hour HTML
             */
                var hourHTML = new Array(),
                priceContent = '&nbsp;',
                availableContent = '&nbsp;',
                type = '';

                if (status !== 'past-hour'){
                    if (price > 0 
                            && (bind === 0 
                                    || bind === 1)){
                        priceContent = methods_price.set(price);
                    }

                    if (promo > 0 
                            && (bind === 0 
                                    || bind === 1)){
                        priceContent = methods_price.set(promo);
                    }

                    switch (status){
                        case 'available':
                            type += ' dopbsp-available';

                            if (bind === 0 
                                    || bind === 1){
                                if (available > 1){
                                    availableContent = available+' '+methods_calendar.text['availableMultiple'];
                                }
                                else if (available === 1){
                                    availableContent = available+' '+methods_calendar.text['available'];
                                }
                                else{
                                    availableContent = methods_calendar.text['available'];
                                }
                            }
                            break;
                        case 'booked':
                            type += ' dopbsp-booked';

                            if (bind === 0 
                                    || bind === 1){
                                availableContent = methods_calendar.text['booked'];
                            }
                            break;
                        case 'special':
                            type += ' dopbsp-special';

                            if (bind === 0 
                                    || bind === 1){
                                if (available > 1){
                                    availableContent = available+' '+methods_calendar.text['availableMultiple'];
                                }
                                else if (available === 1){
                                    availableContent = available+' '+methods_calendar.text['available'];
                                }
                                else{
                                    availableContent = methods_calendar.text['available'];
                                }
                            }
                            break;
                        case 'unavailable':
                            type += ' dopbsp-unavailable';

                            if (bind === 0 
                                    || bind === 1){
                                availableContent = methods_calendar.text['unavailable'];  
                            }
                            break;
                    }
                }
                else{
                    type = ' dopbsp-'+status;
                }

                hourHTML.push('<div class="DOPBSPCalendar-hour'+type+'" id="'+id+'">');
                hourHTML.push('    <div class="dopbsp-bind-top'+((bind === 2 || bind === 3) && (status === 'available' || status === 'special') ? ' dopbsp-enabled':'')+'"><div class="dopbsp-hour">&nbsp;</div></div>');                        
                hourHTML.push('    <div class="dopbsp-bind-middle dopbsp-group'+(status === 'available' || status === 'special' ? bind:'0')+'">');
                hourHTML.push('        <div class="dopbsp-hour">'+(methods_hours.data['ampm'] ? prototypes.getAMPM(hour):hour)+(methods_hours.data['interval'] ? ' - '+(methods_hours.data['ampm'] ? prototypes.getAMPM(methods_hour.getNext(hour, hoursDef)):methods_hour.getNext(hour, hoursDef)):'')+'</div>');

                if (price > 0 
                        && type !== ' dopbsp-past-hour' 
                        && (bind === 0 
                                || bind === 1)){
                    hourHTML.push('        <div class="'+(promo > 0 ? 'dopbsp-price-promo':'dopbsp-price')+'">'+priceContent+'</div>');      
                }

                if (promo > 0 
                        && type !== ' dopbsp-past-hour' 
                        && (bind === 0 
                                || bind === 1)){                                      
                    hourHTML.push('        <div class="dopbsp-old-price">'+methods_price.set(price)+'</div>');
                }                        
                hourHTML.push('        <div class="dopbsp-available">'+availableContent+'</div>');
                
                if ((infoBody !== undefined
                                && infoBody.length > 0)
                        && type !== ' dopbsp-past-hour'){
                    hourHTML.push('          <div class="dopbsp-info-body" id="'+id+'_info-body">');
                    hourHTML.push('              <div class="dopbsp-info-body-mask">&#8594;</div>');
                    hourHTML.push(methods_form.getInfo(infoBody));
                    hourHTML.push('          </div>');
                }

                if ((info !== ''
                                || (infoInfo !== undefined
                                            && infoInfo.length > 0))
                        && type !== ' dopbsp-past-hour' 
                        && (bind === 0 
                                || bind === 1)){
                    hourHTML.push('        <div class="dopbsp-info" id="'+id+'_info"></div>');
                }
                hourHTML.push('    </div>');
                hourHTML.push('    <div class="dopbsp-bind-bottom'+((bind === 1 || bind === 2) && (status === 'available' || status === 'special') ? ' dopbsp-enabled':'')+'"><div class="dopbsp-hour">&nbsp;</div></div>');
                hourHTML.push('</div>');

                return hourHTML.join('');
            },
            default:function(){
            /*
             * Default hour data.
             * 
             * @return JSON with default data
             */
                return {"available": "",
                        "bind": 0,
                        "info": "",
                        "info_body": "",
                        "info_info": "",
                        "notes": "",
                        "price": 0, 
                        "promo": 0,
                        "status": "none"};
            },
            
            getNext:function(hour,
                             hours){
            /*
             * Returns next hour from a list of time hours definitions.
             * 
             * @param hour (String): current hour (HH:MM)
             * @param hours (Array): hours definitions
             * 
             * @return next hour
             */    
                var nextHour = '24:00', 
                i;

                for (i=hours.length-1; i>=0; i--){
                    if (hours[i]['value'] > hour){
                        nextHour = hours[i]['value'];
                    }
                }

                return nextHour;
            },
            getPrev:function(hour,
                             hours){
            /*
             * Returns previous hour from a list of time hours definitions.
             * 
             * @param hour (String): current hour (HH:MM)
             * @param hours (Array): hours definitions
             * 
             * @return previous hour
             */ 
                var previousHour = '00:00', 
                i;

                for (i=0; i<hours.length; i++){
                    if (hours[i]['value'] < hour){
                        previousHour = hours[i]['value'];
                    }
                }

                return previousHour;
            },
            
            events: {
                init:function(){
                /*
                 * Initialize hour events.
                 */    
                    /*
                     * Hours click events.
                     */                      
                    if (methods_hours.data['multipleSelect']){
                        methods_hour.events.selectMultiple();
                    }
                    else{
                        methods_hour.events.selectSingle();
                    }

                    if (!prototypes.isTouchDevice()){
                        /*
                         * Hour hover event. 
                         */
                        $('.DOPBSPCalendar-hour', Container).hover(function(){
                            var hour = $(this);

                            if (methods_hours.vars.selectionInit){
                                methods_hours.displaySelection(hour.attr('id'));
                            }
                        });

                        /*
                         * Info icon event.
                         */
                        $('.DOPBSPCalendar-hour .dopbsp-info', Container).hover(function(){
                            methods_tooltip.set(methods_days.vars.selectionStart.split('_')[1], 
                                                $(this).attr('id').split('_')[1],
                                                'info');
                        }, function(){
                            methods_tooltip.clear();
                        });

                        /*
                         * Body info event.
                         */
                        $('.DOPBSPCalendar-hour .dopbsp-info-body', Container).hover(function(){
                            methods_tooltip.set(methods_days.vars.selectionStart.split('_')[1], 
                                                $(this).attr('id').split('_')[1],
                                                'info-body');
                        }, function(){
                            methods_tooltip.clear();
                        });
                    }
                    else{
                        var xPos = 0, 
                        yPos = 0, 
                        touch;

                        /*
                         * Info icon events on devices with touchscreen.
                         */
                        $('.DOPBSPCalendar-hour .dopbsp-info', Container).unbind('touchstart');
                        $('.DOPBSPCalendar-hour .dopbsp-info', Container).bind('touchstart', function(e){
                            e.preventDefault();
                            touch = e.originalEvent.touches[0];
                            xPos = touch.clientX+$(document).scrollLeft();
                            yPos = touch.clientY+$(document).scrollTop();
                            $('#DOPBSPCalendar-tooltip'+ID).css({'left': xPos,
                                                                 'top': yPos});
                            methods_tooltip.set(methods_days.vars.selectionStart.split('_')[1], 
                                                $(this).attr('id').split('_')[1],
                                                'info');
                        });

                        /*
                         * Body info events on devices with touchscreen.
                         */
                        $('.DOPBSPCalendar-hour .dopbsp-info-body', Container).unbind('touchstart');
                        $('.DOPBSPCalendar-hour .dopbsp-info-body', Container).bind('touchstart', function(e){
                            e.preventDefault();
                            touch = e.originalEvent.touches[0];
                            xPos = touch.clientX+$(document).scrollLeft();
                            yPos = touch.clientY+$(document).scrollTop();
                            $('#DOPBSPCalendar-tooltip'+ID).css({'left': xPos,
                                                                 'top': yPos});
                            methods_tooltip.set(methods_days.vars.selectionStart.split('_')[1], 
                                                $(this).attr('id').split('_')[1],
                                                'info-body');
                        });
                        
                    }
                },
                selectMultiple:function(){
                /*
                 * Select multiple hours events.
                 */
                    /*
                     * Hours click event.
                     */
                    $('.DOPBSPCalendar-hour', Container).unbind('click');
                    $('.DOPBSPCalendar-hour', Container).bind('click', function(){
                        var hour = $(this),
                        selectionAux,
                        selectionDay = methods_days.vars.selectionStart,
                        schedule = methods_schedule.vars.schedule,
                        hoursDef = schedule[selectionDay.split('_')[1]] !== undefined ? schedule[selectionDay.split('_')[1]]['hours_definitions']:methods_hours.data['definitions'];

                        setTimeout(function(){
                            if (!methods_hours.vars.selectionInit){
                            /*
                             * Select start hour.
                             */    
                                methods_hours.vars.selectionInit = true;
                                methods_hours.vars.selectionStart = hour.attr('id');
                                methods_hours.vars.selectionEnd = '';

                                methods_search.set();
                                methods_hours.displaySelection(methods_hours.vars.selectionStart);
                            }
                            else if ((((!methods_hours.data['addLastHourToTotalPrice'] 
                                                && (methods_hours.vars.selectionStart !== hour.attr('id') 
                                                        || methods_hours.data['interval'])) 
                                                        || methods_hours.data['addLastHourToTotalPrice']))
                                        || (!methods_hours.data['interval'] 
                                                && !methods_hours.data['addLastHourToTotalPrice'] 
                                                && methods_hours.vars.selectionStart !== hour.attr('id'))){
                            /*
                             * Select end hour.
                             */    
                                methods_hours.vars.selectionInit = false;
                                methods_hours.vars.selectionEnd = hour.attr('id');

                                if (methods_hours.vars.selectionStart > methods_hours.vars.selectionEnd){
                                    selectionAux = methods_hours.vars.selectionStart;
                                    methods_hours.vars.selectionStart = methods_hours.vars.selectionEnd;
                                    methods_hours.vars.selectionEnd = selectionAux;
                                }
                                methods_hours.displaySelection(methods_hours.vars.selectionEnd);

                                if (methods_hours.data['interval']){
                                    methods_hours.vars.selectionEnd = ID+'_'+methods_hour.getNext(methods_hours.vars.selectionEnd.split('_')[1], hoursDef);
                                }

                                methods_search.set();
                            }
                        }, 10);
                    });
                },
                selectSingle:function(){
                /*
                 * Select single hours event.
                 */
                    /*
                     * Hours click event.
                     */                      
                    $('.DOPBSPCalendar-hour', Container).unbind('click');
                    $('.DOPBSPCalendar-hour', Container).bind('click', function(){
                        var $hour = $(this),
                        hour = this;
                        
                        setTimeout(function(){
                            if (($hour.hasClass('dopbsp-available') 
                                        || $hour.hasClass('dopbsp-special'))
                                    && $('.dopbsp-bind-middle', hour).hasClass('dopbsp-group0')){
                                methods_hours.vars.selectionInit = false;
                                methods_hours.vars.selectionStart = $hour.attr('id');
                                methods_hours.vars.selectionEnd = $hour.attr('id');

                                methods_hours.displaySelection(methods_hours.vars.selectionEnd);
                                methods_search.set();
                            }
                        }, 10);
                    });
                }
            }
        },
         
// ***************************************************************************** Sidebar       

// 12. Sidebar

        methods_sidebar = {
            data: {},
            text: {},
            
            display:function(){
            /*
             * Display sidebar.
             * 
             * @return sidebar HTML
             */    
                var HTML = new Array();
                
                HTML.push('<form name="DOPBSPCalendar-form'+ID+'" id="DOPBSPCalendar-form'+ID+'" action="" method="POST" onsubmit="return false;">');
                HTML.push(' <table class="dopbsp-sidebar-content">');
                HTML.push('     <colgroup>');
                HTML.push('         <col class="dopbsp-column1" />');
                HTML.push('         <col class="dopbsp-column-separator-style dopbsp-column2" />');
                HTML.push('         <col class="dopbsp-column3" />');
                HTML.push('     </colgroup>');
                HTML.push('     <tbody>');
                HTML.push('         <tr>');
                HTML.push('             <td class="dopbsp-column1">');
                
                HTML.push('                 <table class="dopbsp-sidebar-content">');
                HTML.push('                     <colgroup>');
                HTML.push('                         <col class="dopbsp-column4" />');
                HTML.push('                         <col class="dopbsp-column-separator-style dopbsp-column5" />');
                HTML.push('                         <col class="dopbsp-column6" />');
                HTML.push('                     </colgroup>');
                HTML.push('                     <tbody>');
                HTML.push('                         <tr>');
                HTML.push('                             <td id="DOPBSPCalendar-sidebar-column-wrapper-1-'+ID+'" class="dopbsp-column4">');
                HTML.push('                                 <div class="dopbsp-row1"></div>');
                HTML.push('                                 <div class="dopbsp-row2"></div>');
                HTML.push('                                 <div class="dopbsp-row3"></div>');
                HTML.push('                                 <div class="dopbsp-row4"></div>');
                HTML.push('                                 <div class="dopbsp-row5"></div>');
                HTML.push('                                 <div class="dopbsp-row6"></div>');
                HTML.push('                                 <div class="dopbsp-row7"></div>');
                HTML.push('                             </td>');
                HTML.push('                             <td class="dopbsp-column-separator dopbsp-column5"></td>');
                HTML.push('                             <td id="DOPBSPCalendar-sidebar-column-wrapper-2-'+ID+'" class="dopbsp-column6">');
                HTML.push('                                 <div class="dopbsp-row1"></div>');
                HTML.push('                                 <div class="dopbsp-row2"></div>');
                HTML.push('                                 <div class="dopbsp-row3"></div>');
                HTML.push('                                 <div class="dopbsp-row4"></div>');
                HTML.push('                                 <div class="dopbsp-row5"></div>');
                HTML.push('                                 <div class="dopbsp-row6"></div>');
                HTML.push('                                 <div class="dopbsp-row7"></div>');
                HTML.push('                             </td>');
                HTML.push('                         </tr>');
                HTML.push('                     </tbody>');
                HTML.push('                 </table>');
                
                HTML.push('             </td>');
                HTML.push('             <td class="dopbsp-column-separator dopbsp-column2"></td>');
                HTML.push('             <td class="dopbsp-column3">');
                
                HTML.push('                 <table class="dopbsp-sidebar-content level2">');
                HTML.push('                     <colgroup>');
                HTML.push('                         <col class="dopbsp-column7" />');
                HTML.push('                         <col class="dopbsp-column-separator-style dopbsp-column8" />');
                HTML.push('                         <col class="dopbsp-column9" />');
                HTML.push('                     </colgroup>');
                HTML.push('                     <tbody>');
                HTML.push('                         <tr>');
                HTML.push('                             <td id="DOPBSPCalendar-sidebar-column-wrapper-3-'+ID+'" class="dopbsp-column7">');
                HTML.push('                                 <div class="dopbsp-row1"></div>');
                HTML.push('                                 <div class="dopbsp-row2"></div>');
                HTML.push('                                 <div class="dopbsp-row3"></div>');
                HTML.push('                                 <div class="dopbsp-row4"></div>');
                HTML.push('                                 <div class="dopbsp-row5"></div>');
                HTML.push('                                 <div class="dopbsp-row6"></div>');
                HTML.push('                                 <div class="dopbsp-row7"></div>');
                HTML.push('                             </td>');
                HTML.push('                             <td class="dopbsp-column-separator dopbsp-column8"></td>');
                HTML.push('                             <td id="DOPBSPCalendar-sidebar-column-wrapper-4-'+ID+'" class="dopbsp-column9">');
                HTML.push('                                 <div class="dopbsp-row1"></div>');
                HTML.push('                                 <div class="dopbsp-row2"></div>');
                HTML.push('                                 <div class="dopbsp-row3"></div>');
                HTML.push('                                 <div class="dopbsp-row4"></div>');
                HTML.push('                                 <div class="dopbsp-row5"></div>');
                HTML.push('                                 <div class="dopbsp-row6"></div>');
                HTML.push('                                 <div class="dopbsp-row7"></div>');
                HTML.push('                             </td>');
                HTML.push('                         </tr>');
                HTML.push('                     </tbody>');
                HTML.push('                 </table>');
                
                HTML.push('             </td>');
                HTML.push('         </tr>');
                HTML.push('     <tbody>');
                HTML.push(' </table>');
                HTML.push('</form>');

                return HTML.join('');
            },
            init:function(){
            /*
             * Initialize sidebar.
             */    
                /*
                 * Hide WooCommerce "Add to cart" button.
                 */
                methods_search.init();
                methods_reservation.init();
                
                if (methods_extras.data['id'] !== '0'){
                    methods_extras.init();
                }

                if (methods_coupons.data['id'] !== '0'){
                    methods_coupons.init();
                }
            },
            
            getDateFormat:function(date){
            /*
             * Convert a date to calendar format.
             * 
             * @param date (String): date to be converted "YYYY-MM-DD"
             * 
             * @return date in set format
             */    
                var year = date.split('-')[0],
                month = date.split('-')[1],
                day = date.split('-')[2];
                
                return methods_calendar.data['dateType'] === 1 ? methods_months.text['names'][parseInt(month, 10)-1]+' '+day+', '+year:
                                                                 day+' '+methods_months.text['names'][parseInt(month, 10)-1]+' '+year;
            },
            
            rp:function(){
            /*
             *  Resize & position calendar sidebar. Used for responsive feature.
             */
                var hiddenBustedItems = prototypes.doHiddenBuster($(Container));

                $('.DOPBSPCalendar-sidebar', Container).removeClass('dopbsp-style1')
                                                       .removeClass('dopbsp-style2')
                                                       .removeClass('dopbsp-style3')
                                                       .removeClass('dopbsp-style4')
                                                       .removeClass('dopbsp-style5')
                                                       .removeClass('dopbsp-style1-medium')
                                                       .removeClass('dopbsp-style2-medium')
                                                       .removeClass('dopbsp-style3-medium')
                                                       .removeClass('dopbsp-style4-medium')
                                                       .removeClass('dopbsp-style5-medium')
                                                       .removeClass('dopbsp-style-small');
                
                if (Container.width() < 500){
                    $('.DOPBSPCalendar-sidebar', Container).addClass('dopbsp-style-small');
                }
                else{
                    switch (methods_sidebar.data['style']){
                        case 2:
                            if (Container.width() < 760){
                                $('.DOPBSPCalendar-sidebar', Container).addClass('dopbsp-style2-medium');
                            }
                            else{
                                $('.DOPBSPCalendar-sidebar', Container).addClass('dopbsp-style2');
                            }
                            break;
                        case 3:
                            if (Container.width() < 1020){
                                $('.DOPBSPCalendar-sidebar', Container).addClass('dopbsp-style3-medium');
                            }
                            else{
                                $('.DOPBSPCalendar-sidebar', Container).addClass('dopbsp-style3');
                            }
                            break;
                        case 4:
                            if (Container.width() < 660){
                                $('.DOPBSPCalendar-sidebar', Container).addClass('dopbsp-style4-medium');
                            }
                            else{
                                $('.DOPBSPCalendar-sidebar', Container).addClass('dopbsp-style4');
                            }
                            break;
                        case 5:
                            if (Container.width() < 800){
                                $('.DOPBSPCalendar-sidebar', Container).addClass('dopbsp-style5-medium');
                            }
                            else{
                                $('.DOPBSPCalendar-sidebar', Container).addClass('dopbsp-style5');
                            }
                            break;
                        default:                 
                            if (Container.width() < 900){
                                $('.DOPBSPCalendar-sidebar', Container).addClass('dopbsp-style1-medium');
                            }
                            else{
                                $('.DOPBSPCalendar-sidebar', Container).addClass('dopbsp-style1');
                            }
                    }
                }

                prototypes.undoHiddenBuster(hiddenBustedItems);
            }
        },
                
// 13. Search
        
        methods_search = {
            data: {},
            text: {},
            
            display:function(){
            /*
             * Display sidebar search module.
             */    
                var HTML = new Array(),
                position = methods_sidebar.data['positions']['search'];
                
                HTML.push('     <div id="DOPBSPCalendar-search'+ID+'" class="dopbsp-module">');
                
                HTML.push(methods_search.days.display());

                if (methods_hours.data['enabled']){
                    HTML.push(methods_search.hours.display());
                }
                HTML.push(methods_search.no_items.display());
                
                HTML.push('     </div>');
                
                $('#DOPBSPCalendar-sidebar-column-wrapper-'+position['column']+'-'+ID+' .dopbsp-row'+position['row']).html(HTML.join(''));
            },
            init:function(){
            /*
             * Initialize sidebar search module.
             */ 
                /*
                 * Initialize days.
                 */
                methods_search.days.init();
                
                /*
                 * Initialize hours.
                 */
                if (methods_hours.data['enabled']){
                    methods_search.hours.init();
                }
                
                /*
                 * Initialize number of booked items.
                 */
                if (methods_sidebar.data['noItems']){
                    methods_search.no_items.set();
                }
            },
            set:function(toSet){
            /*
             * Set sidebar search module.
             * 
             * @param toSet (String): what to set in search module
             *                        "hours" set hours & number of items
             *                        "noItems" number of items
             */    
                toSet = toSet === undefined ? 'hours':toSet;
                
                if (toSet === 'hours' 
                        && methods_hours.data['enabled']){ 
                    methods_search.hours.set();
                }
                
                if (methods_sidebar.data['noItems']){
                    methods_search.no_items.set();
                }
                methods_reservation.set();
            },
            
            days: {
                display:function(){
                /*
                 * Display sidebar search days.
                 * 
                 * @return days search HTML
                 */
                    var HTML = new Array();

                    /*
                     * Check in.
                     */
                    HTML.push('         <div class="dopbsp-input-wrapper DOPBSPCalendar-left">');
                    HTML.push('             <input type="text" name="DOPBSPCalendar-check-in-view'+ID+'" id="DOPBSPCalendar-check-in-view'+ID+'" class="DOPBSPCalendar-check-in-view" value="'+methods_search.text['checkIn']+'" />');
                    HTML.push('             <input type="hidden" name="DOPBSPCalendar-check-in'+ID+'" id="DOPBSPCalendar-check-in'+ID+'" value="" />');
                    HTML.push('         </div>');

                    /*
                     * Check out.
                     */
                    //if (!methods_hours.data['enabled'] 
                    //        && methods_days.data['multipleSelect']){
                        HTML.push('     <div class="dopbsp-input-wrapper DOPBSPCalendar-left">');
                        HTML.push('         <input type="text" name="DOPBSPCalendar-check-out-view'+ID+'" id="DOPBSPCalendar-check-out-view'+ID+'" class="DOPBSPCalendar-check-out-view" value="'+methods_search.text['checkOut']+'" />');
                        HTML.push('         <input type="hidden" name="DOPBSPCalendar-check-out'+ID+'" id="DOPBSPCalendar-check-out'+ID+'" value="" />');
                        HTML.push('     </div>');
                    //}
                    HTML.push('         <br class="DOPBSPCalendar-clear" />');

                    return HTML.join('');
                },
                init:function(){
                /*
                 * Initialize sidebar search days.
                 */ 
                    methods_search.days.events.init();
                },
                initDatepicker:function(id,
                                        altId,    
                                        minDate){
                /*
                 * Initialize sidebar search datepicker.
                 * 
                 * @param id (String): input(text) field ID
                 * @param aldId (String): alternative input(hidden) field ID
                 * @param minDate (Number): start date from today
                 */                            
                    minDate = minDate === undefined ? prototypes.getNoDays(methods_calendar.vars.startYear+'-'+prototypes.getLeadingZero(methods_calendar.vars.startMonth)+'-'+prototypes.getLeadingZero(methods_calendar.vars.startDay),
                                                                           methods_calendar.vars.todayYear+'-'+prototypes.getLeadingZero(methods_calendar.vars.todayMonth)+'-'+prototypes.getLeadingZero(methods_calendar.vars.todayDay))-1:minDate;           
                                                                           
                    $(id).datepicker('destroy');
                    $(id).datepicker({altField: altId,
                                      altFormat: 'yy-mm-dd',
                                      beforeShow: function(input, inst){
                                        $('#ui-datepicker-div').removeClass('DOPBSPCalendar-datepicker')
                                                               .addClass('DOPBSPCalendar-datepicker');
                                      },
                                      dateFormat: methods_calendar.data['dateType'] === 1 ? 'MM dd, yy':'dd MM yy',
                                      dayNames: methods_days.text['names'],
                                      dayNamesMin: methods_days.text['shortNames'],
                                      firstDay: methods_days.data['first'],
                                      minDate: minDate,
                                      monthNames: methods_months.text['names'],
                                      monthNamesMin: methods_months.text['shortNames'],
                                      nextText: methods_calendar.text['nextMonth'],
                                      prevText: methods_calendar.text['previousMonth']});
                    $('.ui-datepicker').removeClass('notranslate').addClass('notranslate');
                },
                validate:function(day){
                /*
                 * Validate day format.
                 * 
                 * @param day (String): day format to be verified
                 * 
                 * @return true if format is "YYYY-MM-DD"
                 */    
                    var dayPieces = day.split('-');
                    
                    if (day === ''
                            || dayPieces.length !== 3
                            || dayPieces[0].length !== 4
                            || dayPieces[1].length !== 2
                            || dayPieces[2].length !== 2){
                        return false;
                    }
                    else{
                        return true;
                    }
                },

                events: {
                    init:function(){
                    /*
                     * Initialize sidebar search days events.
                     */    
                        if (!methods_calendar.data['view']){
                            /*
                             * Initialize check in datepicker.
                             */
                            methods_search.days.initDatepicker('#DOPBSPCalendar-check-in-view'+ID,
                                                               '#DOPBSPCalendar-check-in'+ID);

                            if (methods_hours.data['enabled']){
                                /*
                                 * Initialize hours select events.
                                 */
                                methods_search.days.events.selectHours();
                            }
                            else{
                                if (methods_days.data['multipleSelect']){
                                    /*
                                     * Initialize check out datepicker.
                                     */
                                    methods_search.days.initDatepicker('#DOPBSPCalendar-check-out-view'+ID,
                                                                       '#DOPBSPCalendar-check-out'+ID);
                                    $('#DOPBSPCalendar-check-out-view'+ID).attr('disabled', 'disabled');
                                    
                                    /*
                                     * Initialize multiple days select events.
                                     */
                                    methods_search.days.events.selectMultiple();
                                }
                                else{
                                    /*
                                     * Initialize single day select events.
                                     */
                                    methods_search.days.events.selectSingle();
                                }
                            }
                        }
                    },
                    selectHours:function(){
                    /*
                     * Initialize sidebar search days events when hours need to be selected.
                     */   
                        /*
                         * Check in click event.
                         */
                        $('#DOPBSPCalendar-check-in-view'+ID).unbind('click');
                        $('#DOPBSPCalendar-check-in-view'+ID).bind('click', function(){
                            $(this).val('');
                            methods_hours.clear();
                            methods_search.set();
                        });
                        
                        /*
                         * Check in blur event.
                         */
                        $('#DOPBSPCalendar-check-in-view'+ID).unbind('blur');
                        $('#DOPBSPCalendar-check-in-view'+ID).bind('blur', function(){  
                            var $this = $(this);

                            if ($this.val() === ''){
                                $this.val(methods_search.text['checkIn']);
                            }
                        });

                        /*
                         * Check in change event.
                         */
                        $('#DOPBSPCalendar-check-in-view'+ID).unbind('change');
                        $('#DOPBSPCalendar-check-in-view'+ID).bind('change', function(){
                            var ciDay = $('#DOPBSPCalendar-check-in'+ID).val();

                            if (methods_search.days.validate(ciDay)){
                                methods_calendar.init(parseInt(ciDay.split('-')[0], 10), 
                                                      parseInt(ciDay.split('-')[1], 10));
                                methods_hours.display(ID+'_'+ciDay);
                            }
                            else{
                                $('#DOPBSPCalendar-check-in-view'+ID).val(methods_search.text['checkIn']);
                            }
                        });
                    },
                    selectMultiple:function(){
                    /*
                     * Initialize sidebar search days events when multiple days need to be selected.
                     */
                        /*
                         * Check in click event.
                         */
                        $('#DOPBSPCalendar-check-in-view'+ID).unbind('click');
                        $('#DOPBSPCalendar-check-in-view'+ID).bind('click', function(){
                            $('#DOPBSPCalendar-check-out-view'+ID).val(methods_search.text['checkOut'])
                                                                  .attr('disabled', 'disabled');
                            $('#DOPBSPCalendar-check-in'+ID).val('');
                            $('#DOPBSPCalendar-check-out'+ID).val('');

                            $(this).val('');
                            methods_days.vars.selectionInit = false;
                            methods_days.clearSelection();
                            methods_search.set();
                        });

                        /*
                         * Check in blur event.
                         */
                        $('#DOPBSPCalendar-check-in-view'+ID).unbind('blur');
                        $('#DOPBSPCalendar-check-in-view'+ID).bind('blur', function(){  
                            var $this = $(this);
                            
                            if ($this.val() === ''){
                                $this.val(methods_search.text['checkIn']);
                            }
                            methods_search.set();
                        });
                        
                        /*
                         * Check in change event.
                         */
                        $('#DOPBSPCalendar-check-in-view'+ID).unbind('change');
                        $('#DOPBSPCalendar-check-in-view'+ID).bind('change', function(){
                            var ciDay = $('#DOPBSPCalendar-check-in'+ID).val(),
                            minDateValue;
                            
                            if (methods_search.days.validate(ciDay)){
                                minDateValue = prototypes.getNoDays(prototypes.getToday(), ciDay)-(methods_days.data['morningCheckOut'] ? 0:1);
                                methods_days.vars.selectionInit = true;
                                methods_days.vars.selectionStart = ID+'_'+ciDay;
                                methods_days.vars.selectionEnd = ID+'_'+ciDay;
                                $('#DOPBSPCalendar-check-out-view'+ID).removeAttr('disabled')
                                                                      .val('');
                                $('#DOPBSPCalendar-check-out'+ID).val('');
                                methods_search.days.initDatepicker('#DOPBSPCalendar-check-out-view'+ID,
                                                                   '#DOPBSPCalendar-check-out'+ID,
                                                                   minDateValue);
                                                                   
                                methods_calendar.init(methods_calendar.vars.startYear, 
                                                      methods_calendar.vars.startMonth+prototypes.getNoMonths(methods_calendar.vars.startYear+'-'+methods_calendar.vars.startMonth+'-'+methods_calendar.vars.startDay, ciDay)-1);
                                methods_days.displaySelection(methods_days.vars.selectionEnd);

                                setTimeout(function(){
                                    $('#DOPBSPCalendar-check-out-view'+ID).val('')
                                                                          .select();  
                                    $('#DOPBSPCalendar-check-out'+ID).val('');
                                }, 100);
                            }
                            else{
                                $('#DOPBSPCalendar-check-in-view'+ID).val(methods_search.text['checkIn']);
                            }
                        });
                        
                        /*
                         * Check out click event.
                         */
                        $('#DOPBSPCalendar-check-out-view'+ID).unbind('click');
                        $('#DOPBSPCalendar-check-out-view'+ID).bind('click', function(){  
                            var ciDay = $('#DOPBSPCalendar-check-in'+ID).val();
                            
                            $('#DOPBSPCalendar-check-out-view'+ID).val('');  
                            $('#DOPBSPCalendar-check-out'+ID).val('');      
                            
                            methods_search.set();
      
                            if (ciDay !== ''){
                                methods_days.vars.selectionStart = ID+'_'+ciDay;    
                                methods_days.displaySelection(methods_days.vars.selectionStart);        
                            }
                        });
                        
                        /*
                         * Check out blur event.
                         */
                        $('#DOPBSPCalendar-check-out-view'+ID).unbind('blur');
                        $('#DOPBSPCalendar-check-out-view'+ID).bind('blur', function(){ 
                            var $this = $(this),
                            ciDay = $('#DOPBSPCalendar-check-in'+ID).val();

                            setTimeout(function(){
                                if ($this.val() === ''){
                                    $this.val(methods_search.text['checkOut']);
                                }      
                                methods_search.set();
                                
                                if (ciDay !== ''){
                                    methods_days.vars.selectionStart = ID+'_'+ciDay;  
                                    methods_days.displaySelection(methods_days.vars.selectionStart);                   
                                }
                            }, 100);
                        });

                        /*
                         * Check out change event.
                         */
                        $('#DOPBSPCalendar-check-out-view'+ID).unbind('change');
                        $('#DOPBSPCalendar-check-out-view'+ID).bind('change', function(){
                            var ciDay = $('#DOPBSPCalendar-check-in'+ID).val(),
                            coDay = $('#DOPBSPCalendar-check-out'+ID).val();
                            
                            setTimeout(function(){
                                if (methods_search.days.validate(coDay)){
                                    methods_days.vars.selectionInit = false;
                                    methods_days.vars.selectionStart = ID+'_'+ciDay;
                                    methods_days.vars.selectionEnd = ID+'_'+coDay;

                                    methods_calendar.init(methods_calendar.vars.startYear, 
                                                          methods_calendar.vars.startMonth+prototypes.getNoMonths(methods_calendar.vars.startYear+'-'+methods_calendar.vars.startMonth+'-'+methods_calendar.vars.startDay, ciDay)-1);
                                    methods_days.displaySelection(methods_days.vars.selectionEnd);
                                    methods_search.set();
                                }
                                else{
                                    $('#DOPBSPCalendar-check-out-view'+ID).val(methods_search.text['checkOut']);
                                }
                            }, 100);
                        });
                    },
                    selectSingle:function(){
                    /*
                     * Initialize sidebar search days events when single day need to be selected.
                     */
                        /*
                         * Check in click event.
                         */
                        $('#DOPBSPCalendar-check-in-view'+ID).unbind('click');
                        $('#DOPBSPCalendar-check-in-view'+ID).bind('click', function(){
                            $(this).val('');
                            methods_days.vars.selectionInit = false;
                            methods_days.clearSelection();
                            methods_search.set();
                        });

                        /*
                         * Check in blur event.
                         */
                        $('#DOPBSPCalendar-check-in-view'+ID).unbind('blur');
                        $('#DOPBSPCalendar-check-in-view'+ID).bind('blur', function(){  
                            var $this = $(this);

                            if ($this.val() === ''){
                                $this.val(methods_search.text['checkIn']);
                            }
                            methods_search.set();
                        });

                        /*
                         * Check in change event.
                         */
                        $('#DOPBSPCalendar-check-in-view'+ID).unbind('change');
                        $('#DOPBSPCalendar-check-in-view'+ID).bind('change', function(){
                            var ciDay = $('#DOPBSPCalendar-check-in'+ID).val();

                            if (methods_search.days.validate(ciDay)){
                                methods_days.vars.selectionStart = ID+'_'+ciDay;
                                methods_days.vars.selectionEnd = ID+'_'+ciDay;

                                methods_calendar.init(methods_calendar.vars.startYear, 
                                                      methods_calendar.vars.startMonth+prototypes.getNoMonths(methods_calendar.vars.startYear+'-'+methods_calendar.vars.startMonth+'-'+methods_calendar.vars.startDay, ciDay)-1);
                                methods_days.displaySelection(methods_days.vars.selectionEnd);
                                methods_search.set();
                            }
                            else{
                                $('#DOPBSPCalendar-check-in-view'+ID).val(methods_search.text['checkIn']);
                            }
                        });
                    }
                }
            },
            hours: {
                display:function(){
                /*
                 * Display sidebar search hours.
                 * 
                 * @return hours search HTML
                 */
                    var HTML = new Array();

                    /*
                     * Start hour.
                     */
                    HTML.push('     <div id="DOPBSPCalendar-hours-select'+ID+'">');
                    HTML.push('         <div class="dopbsp-input-wrapper DOPBSPCalendar-left">');
                    HTML.push('             <label for="DOPBSPCalendar-start-hour'+ID+'">'+methods_search.text['hourStart']+'</label>');
                    HTML.push('             <div id="DOPSelect-DOPBSPCalendar-start-hour'+ID+'" class="dopbsp-small"></div>');
                    HTML.push('         </div>');

                    /*
                     * End hour.
                     */
                    if (methods_hours.data['multipleSelect']){
                        HTML.push('         <div class="dopbsp-input-wrapper DOPBSPCalendar-left">');
                        HTML.push('             <label for="DOPBSPCalendar-end-hour'+ID+'">'+methods_search.text['hourEnd']+'</label>');
                        HTML.push('             <div id="DOPSelect-DOPBSPCalendar-end-hour'+ID+'" class="dopbsp-small"></div>');
                        HTML.push('         </div>');
                    }
                    else{
                        HTML.push('         <input type="hidden" name="DOPBSPCalendar-end-hour'+ID+'" id="DOPBSPCalendar-end-hour'+ID+'" value="" />');
                    }
                    HTML.push('         <br class="DOPBSPCalendar-clear">');
                    HTML.push('     </div>');

                    return HTML.join('');
                },
                init:function(){
                /*
                 * Initialize sidebar search hours.
                 */ 
                    methods_search.hours.set();
                },
                set:function(toSet){
                /*
                 * Set sidebar search hours.
                 * 
                 * @param toSet (String): what to set in search hours
                 *                        "all" set all hours
                 *                        "endHour" set only end hour
                 */
                    var currHour = methods_calendar.vars.startDate.getHours(),
                    currMin = methods_calendar.vars.startDate.getMinutes(),
                    endHTML = new Array(),
                    i,
                    schedule = methods_schedule.vars.schedule,
                    selectedDay = methods_days.vars.selectionStart.split('_')[1],
                    hoursDef = schedule[selectedDay] !== undefined ? schedule[selectedDay]['hours_definitions']:methods_hours.data['definitions'],
                    selectedHourStart = methods_hours.vars.selectionStart.split('_')[1],
                    selectedHourEnd = methods_hours.vars.selectionEnd.split('_')[1],
                    startHTML = new Array();

                    toSet = toSet === undefined ? 'all':toSet;

                    /*
                     * Set start hour.
                     */
                    if (toSet === 'all'){
                        startHTML.push('<select name="DOPBSPCalendar-start-hour'+ID+'" id="DOPBSPCalendar-start-hour'+ID+'" class="dopbsp-small">');
                        startHTML.push('    <option value=""></option>');

                        for (i=0; i<hoursDef.length; i++){
                            /*
                             * Check if hour has passed then display.
                             */
                            if (hoursDef[i]['value'] >= prototypes.getLeadingZero(currHour)+':'+prototypes.getLeadingZero(currMin) 
                                    || methods_calendar.vars.startYear+'-'+prototypes.getLeadingZero(methods_calendar.vars.startMonth)+'-'+prototypes.getLeadingZero(methods_calendar.vars.startDay) !== selectedDay){
                                startHTML.push('    <option value="'+hoursDef[i]['value']+'"'+(selectedHourStart === hoursDef[i]['value'] ? ' selected="selected"':'')+'>'+(methods_hours.data['ampm'] ? prototypes.getAMPM(hoursDef[i]['value']):hoursDef[i]['value'])+'</option>');
                            }
                        }
                        startHTML.push('</select>');

                        $('#DOPSelect-DOPBSPCalendar-start-hour'+ID).replaceWith(startHTML.join(''));
                        $('#DOPBSPCalendar-start-hour'+ID).DOPSelect();
                    }

                    /*
                     * Set end hour.
                     */
                    if (methods_hours.data['multipleSelect']){
                        endHTML.push('<select name="DOPBSPCalendar-end-hour'+ID+'" id="DOPBSPCalendar-end-hour'+ID+'" class="dopbsp-small">');
                        endHTML.push('  <option value=""></option>');
                        
                        for (i=0; i<hoursDef.length; i++){
                            if (hoursDef[i]['value'] >= prototypes.getLeadingZero(currHour)+':'+prototypes.getLeadingZero(currMin) 
                                    || methods_calendar.vars.startYear+'-'+prototypes.getLeadingZero(methods_calendar.vars.startMonth)+'-'+prototypes.getLeadingZero(methods_calendar.vars.startDay) !== selectedDay){
                                if (methods_hours.data['interval'] 
                                        || !methods_hours.data['addLastHourToTotalPrice']){
                                    if (selectedHourStart === undefined
                                            || hoursDef[i]['value'] > selectedHourStart){
                                        endHTML.push('  <option value="'+hoursDef[i]['value']+'"'+(selectedHourEnd === hoursDef[i]['value'] ? ' selected="selected"':'')+'>'+(methods_hours.data['ampm'] ? prototypes.getAMPM(hoursDef[i]['value']):hoursDef[i]['value'])+'</option>');
                                    }
                                }
                                else{
                                    if (selectedHourStart === undefined
                                            || hoursDef[i]['value'] >= selectedHourStart){
                                        endHTML.push('  <option value="'+hoursDef[i]['value']+'"'+(selectedHourEnd === hoursDef[i]['value'] ? ' selected="selected"':'')+'>'+(methods_hours.data['ampm'] ? prototypes.getAMPM(hoursDef[i]['value']):hoursDef[i]['value'])+'</option>');
                                    }
                                }
                            }
                        }
                        endHTML.push('</select>');

                        $('#DOPSelect-DOPBSPCalendar-end-hour'+ID).replaceWith(endHTML.join(''));
                        $('#DOPBSPCalendar-end-hour'+ID).DOPSelect();
                    }

                    methods_search.hours.events.init();
                },

                events: {
                    init:function(){
                    /*
                     * Initialize sidebar search hours events.
                     */
                        if (methods_hours.data['multipleSelect']){
                            /*
                             * Initialize multiple hours select events.
                             */
                            methods_search.hours.events.selectMultiple();
                        }
                        else{
                            /*
                             * Initialize single hour select event.
                             */
                            methods_search.hours.events.selectSingle();
                        }
                    },
                    selectMultiple:function(){
                    /*
                     * Initialize sidebar search hours events when multiple hours need to be selected.
                     */
                        /*
                         * Start hour change event.
                         */
                        $('#DOPBSPCalendar-start-hour'+ID).unbind('change');
                        $('#DOPBSPCalendar-start-hour'+ID).bind('change', function(){
                            var startHour = $(this).val();

                            methods_hours.vars.selectionInit = true;
                            methods_hours.vars.selectionStart = ID+'_'+startHour;
                            methods_hours.vars.selectionEnd = '';

                            methods_hours.displaySelection(methods_hours.vars.selectionStart);
                            methods_search.hours.set('endHour');
                            methods_search.set('noItems');
                        });

                        /*
                         * End hours change event.
                         */
                        $('#DOPBSPCalendar-end-hour'+ID).unbind('change');
                        $('#DOPBSPCalendar-end-hour'+ID).bind('change', function(){
                            var endHour = $(this).val(),
                            selectionDay = methods_days.vars.selectionStart,
                            schedule = methods_schedule.vars.schedule,
                            hoursDef = schedule[selectionDay.split('_')[1]] !== undefined ? schedule[selectionDay.split('_')[1]]['hours_definitions']:methods_hours.data['definitions'];

                            methods_hours.vars.selectionInit = false;
                            methods_hours.vars.selectionEnd = ID+'_'+endHour;

                            if (methods_hours.data['interval']){
                                methods_hours.vars.selectionEnd = ID+'_'+methods_hour.getPrev(methods_hours.vars.selectionEnd.split('_')[1], hoursDef);
                            }
                            methods_hours.displaySelection(methods_hours.vars.selectionEnd);
                            methods_search.set('noItems');
                        });
                    },
                    selectSingle:function(){
                    /*
                     * Initialize sidebar search hours events when single hour need to be selected.
                     */
                        /*
                         * Start hour change event.
                         */
                        $('#DOPBSPCalendar-start-hour'+ID).unbind('change');
                        $('#DOPBSPCalendar-start-hour'+ID).bind('change', function(){
                            var startHour = $(this).val();

                            methods_hours.vars.selectionStart = ID+'_'+startHour;
                            methods_hours.vars.selectionEnd = ID+'_'+startHour;

                            methods_hours.displaySelection(methods_hours.vars.selectionEnd);
                            methods_search.set('noItems');
                        });
                    }
                }
            },
            no_items: {
                display:function(){
                /*
                 * Display sidebar search number of items.
                 * 
                 * @return number of items search HTML
                 */
                    var HTML = new Array();

                    if (methods_sidebar.data['noItems']){
                        HTML.push('         <div id="DOPBSPCalendar-no-items-wrapper'+ID+'" class="dopbsp-input-wrapper">');
                        HTML.push('             <label for="DOPBSPCalendar-no-items'+ID+'">'+methods_search.text['noItems']+'</label>');
                        HTML.push('             <div id="DOPSelect-DOPBSPCalendar-no-items'+ID+'" class="dopbsp-small"></div>');
                        HTML.push('         </div>');
                    }
                    else{
                        HTML.push('         <input type="hidden" name="DOPBSPCalendar-no-items'+ID+'" id="DOPBSPCalendar-no-items'+ID+'" value="1" />');
                    }

                    return HTML.join('');
                },
                set:function(){
                /*
                 * Set sidebar search number of items.
                 */
                    var HTML = new Array(),
                    i,
                    noAvailable = methods_hours.data['enabled'] ? methods_hours.getNoAvailable():methods_days.getNoAvailable();

                    HTML.push('<select name="DOPBSPCalendar-no-items'+ID+'" id="DOPBSPCalendar-no-items'+ID+'" class="dopbsp-small">');

                    for (i=1; i<=noAvailable; i++){
                        HTML.push(' <option value="'+i+'">'+i+'</option>');
                    }
                    HTML.push('</select>');

                    $('#DOPSelect-DOPBSPCalendar-no-items'+ID).replaceWith(HTML.join(''));
                    $('#DOPBSPCalendar-no-items'+ID).DOPSelect();

                    methods_search.no_items.events();
                },
                events:function(){
                /*
                 * Initialize sidebar search number of items events.
                 */
                    /*
                     * Number of items change event.
                     */
                    $('#DOPBSPCalendar-no-items'+ID).unbind('change');
                    $('#DOPBSPCalendar-no-items'+ID).bind('change', function(){
                        methods_reservation.set();
                    });
                }
            }
        },

// 14. Rules        
                
        methods_rules = {
            data: {},
            text: {},
            
            getMaxTimeLapse:function(){
            /*
             * Get the maximum stay of days/hours set in the rules.
             * 
             * @return maximum time lapse value
             */    
                return methods_rules.data['id'] !== '0'? parseFloat(methods_rules.data['rule']['time_lapse_max']):0;
            },
            getMinTimeLapse:function(){
            /*
             * Get the minimum stay of days/hours set in the rules.
             * 
             * @return minimum time lapse value
             */    
                return methods_rules.data['id'] !== '0' 
                            && (!methods_hours.data['enabled'] && methods_days.data['multipleSelect']
                                            || methods_hours.data['enabled'] && methods_hours.data['multipleSelect']) ? parseFloat(methods_rules.data['rule']['time_lapse_min']):0;
            }
        },
                
// 15. Extras
        
        methods_extras = {
            data: {},
            text: {},
            
            display:function(){
            /*
             * Display extras.
             */
                var extra = methods_extras.data['extra'],
                groupItem,
                HTML = new Array(),
                i,
                j;
                
                HTML.push('<div id="DOPBSPCalendar-extras'+ID+'" class="dopbsp-module">');
                
                /*
                 * Title
                 */
                HTML.push(' <h4>'+methods_extras.text['title']+'</h4>');

                /*
                 * List
                 */
                for (i=0; i<extra.length; i++){
                    HTML.push('<div class="dopbsp-input-wrapper">');
                    HTML.push(' <label for="DOPBSPCalendar-extras-group'+ID+'-'+extra[i]['id']+'">'+extra[i]['translation']+(extra[i]['required'] === 'true' ? '  <span class="dopbsp-required">*</span>':'')+'</label>');
                    HTML.push(' <select name="DOPBSPCalendar-extras-group'+ID+'-'+extra[i]['id']+'" id="DOPBSPCalendar-extras-group'+ID+'-'+extra[i]['id']+'"'+(extra[i]['multiple_select'] === 'true' ? ' value="[]" multiple class="dopbsp-big"':'')+'>');

                    if (extra[i]['required'] === 'false' 
                            && extra[i]['multiple_select'] === 'false'){
                        HTML.push('<option value=""></option>');
                    }

                    for (j=0; j<extra[i]['group_items'].length; j++){
                        groupItem = extra[i]['group_items'][j];
                                
                        if (groupItem['translation'] !== ''){
                            HTML.push('<option value="'+groupItem['id']+'">');
                            HTML.push(groupItem['translation']);
                            
                            if (parseFloat(groupItem['price']) !== 0){
                                HTML.push(' <span class="dopbsp-info">(');
                                    
                                if (groupItem['price_type'] === 'fixed'){
                                    HTML.push(groupItem['operation']+methods_price.set(groupItem['price']));
                                }
                                else{
                                    HTML.push(groupItem['operation']+groupItem['price']+'%');
                                }
                                
                                if (groupItem['price_by'] !== 'once'){
                                    HTML.push('/'+(methods_hours.data['enabled'] ? methods_extras.text['byHour']:methods_extras.text['byDay']));
                                }
                                HTML.push(')</span>');
                            }
                            HTML.push('</option>');
                        }
                    }
                    HTML.push(' </select>');
                    HTML.push('</div>');
                }
                
                /*
                 * Message
                 */
                HTML.push(' <div class="dopbsp-message DOPBSPCalendar-hidden"></div>');
                HTML.push('</div>');
            
                $('#DOPBSPCalendar-sidebar-column-wrapper-'+methods_sidebar.data['positions']['extras']['column']+'-'+ID+' .dopbsp-row'+methods_sidebar.data['positions']['extras']['row']).html(HTML.join(''));
            },
            init:function(){
            /*
             * Initialize extras lists (drop downs/selects).
             */    
                var extra = methods_extras.data['extra'],
                i;
                
                /*
                 * For each extras list initialize DOP Select jQuery plugin.
                 */
                for (i=0; i<extra.length; i++){
                    $('#DOPBSPCalendar-extras-group'+ID+'-'+extra[i]['id']).DOPSelect();
                }
                methods_extras.events();
            },
            events:function(){
            /*
             * Initialize extras lists events.
             */
                var extra = methods_extras.data['extra'],
                i;
                
                /*
                 * For each extras list initialize change event.
                 */
                for (i=0; i<extra.length; i++){
                    $('#DOPBSPCalendar-extras-group'+ID+'-'+extra[i]['id']).unbind('change');
                    $('#DOPBSPCalendar-extras-group'+ID+'-'+extra[i]['id']).bind('change', function(){
                        methods_reservation.set();
                    });
                }
            },
            
            get:function(reservationPrice,
                         ciDay,
                         coDay,
                         startHour,
                         endHour,
                         noItems){
            /*
             * Get list of selected extras.
             * 
             * @param reservationPrice (Number): reservation price
             * @param ciDay (String): check in day
             * @param ciDay (String): check in day
             * @param startHour (String): start hour
             * @param endHour (String): start hour
             * @param noItems (Number): number of reserved items
             * 
             * @return array of extras
             */    
                var extra = methods_extras.data['extra'],
                extras = new Array(),
                groupItem,
                i,
                j;
        
                /*
                 * All 3 "for" statements need to be separated.
                 */
                
                /*
                 * Set verified value to false.
                 */
                for (i=0; i<extra.length; i++){
                    extra[i]['verified'] = false;
                }
                
                /*
                 * Get selected extras list.
                 */
                for (i=0; i<extra.length; i++){
                    if (extra[i]['verified'] === undefined){
                        extra[i]['verified'] = false;
                    }
                    
                    for (j=0; j<extra[i]['group_items'].length; j++){
                        groupItem = extra[i]['group_items'][j];
                        
                        if ((extra[i]['multiple_select'] === 'false'
                                        && $('#DOPBSPCalendar-extras-group'+ID+'-'+extra[i]['id']).val() === groupItem['id']
                                        && extra[i]['verified'] === false)
                                || (extra[i]['multiple_select'] !== 'false'
                                        && $('#DOPSelect-DOPBSPCalendar-extras-group'+ID+'-'+extra[i]['id']+'-'+groupItem['id']).is(':checked'))){
                            extra[i]['verified'] = true;
                            
                            extras.push({'group_id': extra[i]['id'],
                                         'group_translation': extra[i]['translation'],
                                         'id': groupItem['id'],
                                         'operation': groupItem['operation'],
                                         'price': parseFloat(groupItem['price']),
                                         'price_by': groupItem['price_by'],
                                         'price_type': groupItem['price_type'],
                                         'translation': groupItem['translation']});
                        }
                    }
                }
        
                /*
                 * Calculate price for each selected extra.
                 */
                for (i=0; i<extras.length; i++){
                    delete extras[i]['verified'];
                    extras[i]['price_total'] = methods_extras.getPrice([extras[i]],
                                                                        reservationPrice,
                                                                        ciDay,
                                                                        coDay,
                                                                        startHour,
                                                                        endHour,
                                                                        noItems);
                }
                
                return extras;
            },
            getPrice:function(extras,
                              reservationPrice,
                              ciDay,
                              coDay,
                              startHour,
                              endHour,
                              noItems){
            /*
             * Get selected extras price. If you give an array with only one extra you get the price of that selected extra.
             * 
             * @param extras (Array): list of extras
             * @param reservationPrice (Number): reservation price
             * @param ciDay (String): check in day
             * @param ciDay (String): check in day
             * @param startHour (String): start hour
             * @param endHour (String): start hour
             * @param noItems (Number): number of reserved items
             * 
             * @retun extras total price value
             */
                var groupItem,
                i,
                price = 0,
                timeLapse;
        
                /*
                 * Verify days/hours.
                 */
                coDay = coDay === '' ? ciDay:coDay;
                endHour = endHour === '' ? startHour:endHour;
                
                /*
                 * Calculate price.
                 */
                timeLapse = methods_hours.data['enabled'] ? prototypes.getHoursDifference(startHour, endHour, 'hours')+(methods_hours.data['addLastHourToTotalPrice'] ? 1:0):
                                                            prototypes.getNoDays(ciDay, coDay)-(methods_days.data['morningCheckOut'] ? 1:0);

                for (i=0; i<extras.length; i++){
                    groupItem = extras[i];
                    price += (groupItem['operation'] === '-' ? -1:1)
                             *(groupItem['price_by'] === 'once' ? 1:timeLapse)
                             *groupItem['price']
                             *(groupItem['price_type'] === 'fixed' ? noItems:reservationPrice)/
                             (groupItem['price_type'] === 'fixed' ? 1:100);
                }
                
                return price;
            },
            set:function(extras,
                         ciDay,
                         coDay,
                         startHour,
                         endHour){
            /*
             * Set selected extras details.
             * 
             * @param extras (Array): list of extras
             * @param ciDay (String): check in day
             * @param ciDay (String): check in day
             * @param startHour (String): start hour
             * @param endHour (String): start hour
             * 
             * @retun HTML
             */
                var extra,
                extraHTML = new Array(),
                extrasHTML = new Array(),
                HTML = new Array(),
                i,
                j;
        
                /*
                 * Verify days/hours.
                 */
                coDay = coDay === '' ? ciDay:coDay;
                endHour = endHour === '' ? startHour:endHour;
                
                /*
                 * If extras are selected display.
                 */
                if (extras.length > 0){
                    HTML.push('<tr class="dopbsp-separator">');
                    HTML.push(' <td class="dopbsp-label"><div class="dopbsp-line"></div></td>');
                    HTML.push(' <td class="dopbsp-value"><div class="dopbsp-line"></div></td>');
                    HTML.push('</tr>');
                }
                
                for (i=0; i<extras.length; i++){
                    extrasHTML.length = 0;
                    
                    if (extras[i]['displayed'] === undefined){
                        for (j=0; j<extras.length; j++){
                            extra = extras[j];
                            extraHTML.length = 0;
                                
                            if (extras[j]['displayed'] === undefined
                                    && extras[i]['group_id'] === extras[j]['group_id']){
                                extraHTML.push(extra['translation']);

                                if (parseFloat(extra['price']) !== 0){
                                    extraHTML.push(' <br />');
                                    
                                    if (extra['price_type'] !== 'fixed' 
                                            || extra['price_by'] !== 'once'){
                                        extraHTML.push(' <span class="dopbsp-info-rule">&#9632;&nbsp;');

                                        if (extra['price_type'] === 'fixed'){
                                            extraHTML.push(extra['operation']+methods_price.set(extra['price']));
                                        }
                                        else{
                                            extraHTML.push(extra['operation']+extra['price']+'%');
                                        }

                                        if (extra['price_by'] !== 'once'){
                                            extraHTML.push('/'+(methods_hours.data['enabled'] ? methods_extras.text['byHour']:methods_extras.text['byDay']));
                                        }
                                        extraHTML.push('</span><br />');
                                    }
                                    extraHTML.push('<span class="dopbsp-info-price">'+extra['operation']+'&nbsp;'+methods_price.set(extra['price_total'])+'</span>');
                                }
                            
                                if (extraHTML.length !== 0){
                                    extras[j]['displayed'] = true;
                                    extrasHTML.push(extraHTML.join(''));
                                }
                            }
                        }
                        
                        if (extrasHTML.length !== 0){
                            HTML.push('<tr>');
                            HTML.push(' <td class="dopbsp-label">'+extras[i]['group_translation']+'</td>');
                            HTML.push(' <td class="dopbsp-value dopbsp-info">'+extrasHTML.join('<br /><br />')+'</td>');
                            HTML.push('</tr>');
                        }
                    }
                }
                
                for (i=0; i<extras.length; i++){
                    delete extras[i]['displayed'];
                }
                
                return HTML.join('');
            },
            
            validate:function(extras){
            /*
             * Check if required extras are selected.
             * 
             * @param extras (Array): list of extras
             * 
             * @retun true/false
             */
                var extra = methods_extras.data['extra'],
                i,
                j,
                message = '',
                validateExtras = true,
                validateGroup;
                
                for (i=0; i<extra.length; i++){
                    if (extra[i]['required'] === 'true'
                            && extra[i]['multiple_select'] === 'true'){
                        validateGroup = false;
                        
                        for (j=0; j<extras.length; j++){
                            if (extra[i]['id'] === extras[j]['group_id']){
                                validateGroup = true;
                            }
                        }
                        
                        if (!validateGroup){
                            validateExtras = false;
                            
                            message += (message === '' ? '':'<br />')+methods_extras.text['invalid']+' '+extra[i]['translation']+'.';
                        }
                    }
                }
                
                if (!validateExtras){
                    methods_extras.toggleMessages(message);
                    return false;
                }
                else{
                    methods_extras.toggleMessages('',
                                                  'dopbsp-success',
                                                  'none');
                    return true;
                }
            },
            toggleMessages:function(message,
                                    display,
                                    type){
            /*
             * Toggle extras messages.
             * 
             * @param message (String): the message to be displayed
             * @param display (String): CSS display value
             *                          "block" display message
             *                          "none" hide message
             * @param type (String): message type
             *                       "dopbsp-error" error message
             *                       "dopbsp-success" success message
             */         
                display = display === undefined ? 'block':display;
                type = type === undefined ? 'dopbsp-error':type;
                
                $('#DOPBSPCalendar-extras'+ID+' .dopbsp-message').html(message)
                                                                 .removeClass('dopbsp-success')
                                                                 .removeClass('dopbsp-error')
                                                                 .addClass(type)
                                                                 .css('display', display);
            }
        },

// 16. Discounts
        
        methods_discounts = {
            data: {},
            text: {},
            
            get:function(ciDay,
                         coDay,
                         startHour,
                         endHour){
            /*
             * Get discount data.
             * 
             * @param ciDay (String): check in day
             * @param ciDay (String): check in day
             * @param startHour (String): start hour
             * @param endHour (String): start hour
             * 
             * @retun discount data
             */
                var discount = {'id': 0,
                                'rule_id': 0,
                                'operation': '-',
                                'price': 0,
                                'price_type': 'percent',
                                'price_by': 'once',
                                'start_date': '',
                                'end_date': '',
                                'start_hour': '',
                                'end_hour': '',
                                'translation': ''},
                discounts = methods_discounts.data['discount'], 
                i,
                j,
                rule,
                ruleFound,
                timeLapse;
        
                /*
                 * Verify days/hours.
                 */
                coDay === '' ? ciDay:coDay;
                endHour === '' ? startHour:endHour;
        
                /*
                 * Calculate time lapse.
                 */
                timeLapse = methods_hours.data['enabled'] ? prototypes.getHoursDifference(startHour, endHour, 'hours')+(methods_hours.data['addLastHourToTotalPrice'] ? 1:0):
                                                            prototypes.getNoDays(ciDay, coDay)-(methods_days.data['morningCheckOut'] ? 1:0);
                
                for (i=0; i<discounts.length; i++){
                    if ((discounts[i]['start_time_lapse'] === ''
                                || parseInt(discounts[i]['start_time_lapse']) <= timeLapse)
                            && (discounts[i]['end_time_lapse'] === ''
                                || parseInt(discounts[i]['end_time_lapse']) >= timeLapse)){
                        discount['id'] = discounts[i]['id'];
                        discount['operation'] = discounts[i]['operation'];
                        discount['price'] = discounts[i]['price'];
                        discount['price_by'] = discounts[i]['price_by'];
                        discount['price_type'] = discounts[i]['price_type'];
                        discount['translation'] = discounts[i]['translation'];
                        
                        for (j=0; j<discounts[i]['rules'].length; j++){
                            rule = discounts[i]['rules'][j];
                            ruleFound = false;
                            
                            if ((rule['start_date'] === ''
                                        || rule['start_date'] <= ciDay)
                                    && (rule['end_date'] === ''
                                        || rule['end_date'] >= coDay)){
                                if (methods_hours.data['enabled']){
                                    if ((rule['start_hour'] === ''
                                                || rule['start_hour'] <= startHour)
                                            && (rule['end_hour'] === ''
                                                || rule['end_hour'] >= endHour)){
                                        ruleFound = true;
                                    }
                                }
                                else{
                                    ruleFound = true;
                                }
                            }
                            
                            if (ruleFound){
                                discount['rule_id'] = rule['id'];
                                discount['operation'] = rule['operation'];
                                discount['price'] = rule['price'];
                                discount['price_by'] = rule['price_by'];
                                discount['price_type'] = rule['price_type'];
                                discount['start_date'] = rule['start_date'];
                                discount['end_date'] = rule['end_date'];
                                
                                break;
                            }
                        }
                        break;
                    }
                }
                
                return discount;
            },
            getPrice:function(discount,
                              reservationPrice,
                              extrasPrice,
                              ciDay,
                              coDay,
                              startHour,
                              endHour,
                              noItems){
            /*
             * Get discount value.
             * 
             * @param discount (Object): discount data
             * @param reservationPrice (Number): reservation price
             * @param extrasPrice (Number): extras price
             * @param ciDay (String): check in day
             * @param ciDay (String): check in day
             * @param startHour (String): start hour
             * @param endHour (String): start hour
             * @param noItems (Number): number of reserved items
             * 
             * @retun discount price value
             */
                var timeLapse;
        
                /*
                 * Verify days/hours.
                 */
                coDay = coDay === '' ? ciDay:coDay;
                endHour = endHour === '' ? startHour:endHour;
                
                /*
                 * Calculate price.
                 */
                timeLapse = methods_hours.data['enabled'] ? prototypes.getHoursDifference(startHour, endHour, 'hours')+(methods_hours.data['addLastHourToTotalPrice'] ? 1:0):
                                                            prototypes.getNoDays(ciDay, coDay)-(methods_days.data['morningCheckOut'] ? 1:0);
                                                    
                return (discount['operation'] === '-' ? -1:1)
                       *(discount['price_by'] === 'once' ? 1:timeLapse)
                       *discount['price']
                       *(discount['price_type'] === 'fixed' ? noItems:(reservationPrice+(methods_discounts.data['extras'] ? extrasPrice:0)))/
                       (discount['price_type'] === 'fixed' ? 1:100);
            },
            set:function(discount,
                         reservationPrice,
                         extrasPrice,
                         ciDay,
                         coDay,
                         startHour,
                         endHour,
                         noItems){
            /*
             * Set discount details.
             * 
             * @param discount (Object): discount data
             * @param reservationPrice (Number): reservation price
             * @param extrasPrice (Number): extras price
             * @param ciDay (String): check in day
             * @param ciDay (String): check in day
             * @param startHour (String): start hour
             * @param endHour (String): start hour
             * @param noItems (Number): number of reserved items
             * 
             * @retun HTML
             */
                var HTML = new Array(),
                price;
        
                /*
                 * Verify days/hours.
                 */
                coDay = coDay === '' ? ciDay:coDay;
                endHour = endHour === '' ? startHour:endHour;
                
                if (discount['price'] > 0){
                    price = methods_discounts.getPrice(discount,
                                                       reservationPrice,
                                                       extrasPrice,
                                                       ciDay,
                                                       coDay,
                                                       startHour,
                                                       endHour,
                                                       noItems);
                                                       
                    HTML.push(' <tr class="dopbsp-separator">');
                    HTML.push('     <td class="dopbsp-label"><div class="dopbsp-line"></div></td>');
                    HTML.push('     <td class="dopbsp-value"><div class="dopbsp-line"></div></td>');
                    HTML.push(' </tr>');
                    HTML.push(' <tr>');
                    HTML.push('     <td class="dopbsp-label">'+methods_discounts.text['title']+'</td>');
                    HTML.push('     <td class="dopbsp-value dopbsp-info">');
                    HTML.push('         '+discount['translation']+'<br />');
                    
                    if (discount['price_type'] !== 'fixed' 
                            || discount['price_by'] !== 'once'){
                        HTML.push('         <span class="dopbsp-info-rule">&#9632;&nbsp;');

                        if (discount['price_type'] === 'fixed'){
                            HTML.push(discount['operation']+methods_price.set(discount['price']));
                        }
                        else{
                            HTML.push(discount['operation']+discount['price']+'%');
                        }

                        if (discount['price_by'] !== 'once'){
                            HTML.push('/'+(methods_hours.data['enabled'] ? methods_discounts.text['byHour']:methods_discounts.text['byDay']));
                        }
                        HTML.push('         </span><br />');
                    }
                    HTML.push('         <span class="dopbsp-info-price">'+discount['operation']+'&nbsp;'+methods_price.set(price)+'</span>');
                    
                    HTML.push('     </td>');
                    HTML.push(' </tr>');
                }
                
                return HTML.join('');
            }
        },

// 17. Fees
        
        methods_fees = {
            data: {},
            text: {},
            
            get:function(reservationPrice,
                         discountPrice,
                         extrasPrice,
                         ciDay,
                         coDay,
                         startHour,
                         endHour,
                         noItems){
            /*
             * Get fees.
             * 
             * @param reservationPrice (Number): reservation price
             * @param discountPrice (Number): discount price
             * @param extrasPrice (Number): extras price
             * @param ciDay (String): check in day
             * @param ciDay (String): check in day
             * @param startHour (String): start hour
             * @param endHour (String): start hour
             * @param noItems (Number): number of reserved items
             * 
             * @retun fees
             */
                var fees = methods_fees.data['fees'],
                i,
                timeLapse;
                
                /*
                 * Fees are not used in WooCommerce.
                 */
                if (methods_woocommerce.data['enabled']){
                    return '';
                }
        
                /*
                 * Verify days/hours.
                 */
                coDay = coDay === '' ? ciDay:coDay;
                endHour = endHour === '' ? startHour:endHour;
                
                /*
                 * Calculate price.
                 */
                timeLapse = methods_hours.data['enabled'] ? prototypes.getHoursDifference(startHour, endHour, 'hours')+(methods_hours.data['addLastHourToTotalPrice'] ? 1:0):
                                                            prototypes.getNoDays(ciDay, coDay)-(methods_days.data['morningCheckOut'] ? 1:0);
                                                    
                for (i=0; i<fees.length; i++){
                    fees[i]['price_total'] = methods_fees.getPrice([fees[i]],
                                                                   reservationPrice,
                                                                   discountPrice,
                                                                   extrasPrice,
                                                                   ciDay,
                                                                   coDay,
                                                                   startHour,
                                                                   endHour,
                                                                   noItems);
                }
                
                return fees;
            },
            getPrice:function(fees,
                              reservationPrice,
                              discountPrice,
                              extrasPrice,
                              ciDay,
                              coDay,
                              startHour,
                              endHour,
                              noItems){
            /*
             * Get fees value.
             * 
             * @param fees (Array): list of fees
             * @param reservationPrice (Number): reservation price
             * @param discountPrice (Number): discount price
             * @param extrasPrice (Number): extras price
             * @param ciDay (String): check in day
             * @param ciDay (String): check in day
             * @param startHour (String): start hour
             * @param endHour (String): start hour
             * @param noItems (Number): number of reserved items
             * 
             * @retun fees price value
             */
                var fee,
                i,
                price = 0,
                timeLapse;
                
                /*
                 * Fees are not used in WooCommerce.
                 */
                if (methods_woocommerce.data['enabled']){
                    return price;
                }
        
                /*
                 * Verify days/hours.
                 */
                coDay = coDay === '' ? ciDay:coDay;
                endHour = endHour === '' ? startHour:endHour;
                
                /*
                 * Calculate price.
                 */
                timeLapse = methods_hours.data['enabled'] ? prototypes.getHoursDifference(startHour, endHour, 'hours')+(methods_hours.data['addLastHourToTotalPrice'] ? 1:0):
                                                            prototypes.getNoDays(ciDay, coDay)-(methods_days.data['morningCheckOut'] ? 1:0);
                                                    
                for (i=0; i<fees.length; i++){
                    fee = fees[i];
                    
                    if (fee['included'] === 'false'){
                        price += (fee['operation'] === '-' ? -1:1)
                                 *(fee['price_by'] === 'once' ? 1:timeLapse)
                                 *parseFloat(fee['price'])
                                 *(fee['price_type'] === 'fixed' ? noItems:(reservationPrice+discountPrice+(fee['extras'] === 'true' ? extrasPrice:0)))/
                                 (fee['price_type'] === 'fixed' ? 1:100);
                    }
                }
                
                return price;
            },
            set:function(type,
                         fees,
                         ciDay,
                         coDay,
                         startHour,
                         endHour){
            /*
             * Set fees details.
             * 
             * @param type (String): set where to display fees details
             *                       "reservation" display details in reservation
             *                       "cart" display details in cart
             * @param fees (Array): list of fees
             * @param reservationPrice (Number): reservation price
             * @param discountPrice (Number): discount price
             * @param extrasPrice (Number): extras price
             * @param ciDay (String): check in day
             * @param ciDay (String): check in day
             * @param startHour (String): start hour
             * @param endHour (String): start hour
             * @param noItems (Number): number of reserved items
             * 
             * @retun HTML
             */
                var HTML = new Array(),
                i;
        
                /*
                 * Verify days/hours.
                 */
                coDay = coDay === '' ? ciDay:coDay;
                endHour = endHour === '' ? startHour:endHour;
                
                if (fees.length > 0){
                    HTML.push(' <tr class="dopbsp-separator">');
                    HTML.push('     <td class="dopbsp-label"><div class="dopbsp-line"></div></td>');
                    HTML.push('     <td class="dopbsp-value"><div class="dopbsp-line"></div></td>');
                    HTML.push(' </tr>');
                }
                
                for (i=0; i<fees.length; i++){
                    if ((type === 'reservation'
                                    && (fees[i]['cart'] === 'false'
                                            || !methods_cart.data['enabled']))
                            || (type === 'cart'
                                    && fees[i]['cart'] === 'true')){
                        HTML.push(' <tr>');
                        HTML.push('     <td class="dopbsp-label">'+fees[i]['translation']+'</td>');
                        HTML.push('     <td class="dopbsp-value">');

                        /*
                         * Set fee rule.
                         */
                        
                        if (fees[i]['price_type'] !== 'fixed' 
                                || fees[i]['price_by'] !== 'once'){
                            HTML.push('         <span class="dopbsp-info-rule">&#9632;&nbsp;');

                            if (fees[i]['price_type'] === 'fixed'){
                                HTML.push(fees[i]['operation']+methods_price.set(fees[i]['price']));
                            }
                            else{
                                HTML.push(fees[i]['operation']+fees[i]['price']+'%');
                            }

                            if (fees[i]['price_by'] !== 'once'){
                                HTML.push('/'+(methods_hours.data['enabled'] ? methods_fees.text['byHour']:methods_fees.text['byDay']));
                            }
                            HTML.push('         </span><br />');
                        }
                        HTML.push('         <span class="dopbsp-info-price">');
                        
                        /*
                         * Set fee value.
                         */
                        if (fees[i]['included'] === 'true'){
                            HTML.push(methods_fees.text['included']);
                        }
                        else{
                            HTML.push(fees[i]['operation']+'&nbsp;'+methods_price.set(fees[i]['price_total']));
                        }
                        HTML.push('         </span>');
                        HTML.push('     </td>');
                        HTML.push(' </tr>');
                    }
                }
                
                return HTML.join('');
            }
        },
                
// 18. Coupons
        
        methods_coupons = {
            data: {},
            text: {},
            vars: {use: false},
            
            display:function(){
            /*
             * Display extras.
             */
                var HTML = new Array();
                
                HTML.push('<div id="DOPBSPCalendar-coupons'+ID+'" class="dopbsp-module">');
                
                /*
                 * Title
                 */
                HTML.push(' <h4>'+methods_coupons.text['title']+'</h4>');
                
                /*
                 * Code
                 */     
                HTML.push(' <div class="dopbsp-input-wrapper">');
                HTML.push('     <label for="DOPBSPCalendar-coupons-code'+ID+'">'+methods_coupons.text['code']+'</label>');
                HTML.push('     <input type="text" name="DOPBSPCalendar-coupons-code'+ID+'" id="DOPBSPCalendar-coupons-code'+ID+'" value="" />');
                HTML.push(' </div>');
                
                /*
                 * Buttons
                 */
                HTML.push(' <div class="dopbsp-input-wrapper">');
                HTML.push('     <input type="button" name="DOPBSPCalendar-coupons-verify'+ID+'" id="DOPBSPCalendar-coupons-verify'+ID+'" class="DOPBSPCalendar-hidden" value="'+methods_coupons.text['verify']+'" />');
                HTML.push('     <input type="button" name="DOPBSPCalendar-coupons-use'+ID+'" id="DOPBSPCalendar-coupons-use'+ID+'" class="DOPBSPCalendar-hidden" value="'+methods_coupons.text['use']+'" />');
                HTML.push('     <div id="DOPBSPCalendar-coupons-loader'+ID+'" class="dopbsp-submit-loader DOPBSPCalendar-hidden"></div>');
                HTML.push(' </div>');
                
                /*
                 * Message
                 */
                HTML.push(' <div class="dopbsp-message DOPBSPCalendar-hidden"></div>');
                HTML.push('</div>');
            
                $('#DOPBSPCalendar-sidebar-column-wrapper-'+methods_sidebar.data['positions']['coupons']['column']+'-'+ID+' .dopbsp-row'+methods_sidebar.data['positions']['coupons']['row']).html(HTML.join(''));
            },
            init:function(){
            /*
             * Initialize coupons.
             */
                methods_coupons.events();
            },
            events:function(){
            /*
             * Initialize coupons events.
             */
                /*
                 * Code input.
                 */
                $('#DOPBSPCalendar-coupons-code'+ID).unbind('input propertychange blur');
                $('#DOPBSPCalendar-coupons-code'+ID).bind('input propertychange blur', function(){
                    if ($(this).val() === ''){
                        $('#DOPBSPCalendar-coupons-verify'+ID).css('display', 'none');
                    }
                    else{
                        $('#DOPBSPCalendar-coupons-verify'+ID).css('display', 'block');
                    }
                    $('#DOPBSPCalendar-coupons-use'+ID).css('display', 'none');
                    $('#DOPBSPCalendar-coupons-loader'+ID).css('display', 'none');
                    methods_coupons.toggleMessages('', 'none');
                });
                
                /*
                 * Verify button.
                 */
                $('#DOPBSPCalendar-coupons-verify'+ID).unbind('click');
                $('#DOPBSPCalendar-coupons-verify'+ID).bind('click', function(){
                    methods_coupons.verify();
                });
                
                /*
                 * Use button.
                 */
                $('#DOPBSPCalendar-coupons-use'+ID).unbind('click');
                $('#DOPBSPCalendar-coupons-use'+ID).bind('click', function(){
                    methods_coupons.vars.use = true;
                    methods_reservation.set();
                    
                    $('#DOPBSPCalendar-coupons-code'+ID).val('');
                    $('#DOPBSPCalendar-coupons-use'+ID).css('display', 'none');
                    methods_coupons.toggleMessages('', 'none');
                });
            },
            verify:function(){
            /*
             * Verify coupon code.
             */  
                var currDate = new Date,
                today = currDate.getFullYear()+'-'+prototypes.getLeadingZero(currDate.getMonth()+1)+'-'+prototypes.getLeadingZero(currDate.getDate()),
                currTime = prototypes.getLeadingZero(currDate.getHours())+':'+prototypes.getLeadingZero(currDate.getMinutes());
                
                $('#DOPBSPCalendar-coupons-code'+ID).attr('disabled', 'disabled');
                $('#DOPBSPCalendar-coupons-verify'+ID).css('display', 'none');
                $('#DOPBSPCalendar-coupons-use'+ID).css('display', 'none');
                methods_coupons.toggleMessages('', 'none');
                $('#DOPBSPCalendar-coupons-loader'+ID).css('display', 'block');
               
                $.post(ajaxURL, {action: 'dopbsp_coupons_verify',
                                 dopbsp_frontend_ajax_request: true,
                                 id: methods_coupons.data['id'],
                                 code: $('#DOPBSPCalendar-coupons-code'+ID).val(),
                                 today: today,
                                 curr_time: currTime}, function(data){  
                    data = $.trim(data);
                    
                    $('#DOPBSPCalendar-coupons-code'+ID).removeAttr('disabled');
                    $('#DOPBSPCalendar-coupons-loader'+ID).css('display', 'none');
                    
                    if (data === 'success'){
                        $('#DOPBSPCalendar-coupons-use'+ID).css('display', 'block');
                        methods_coupons.toggleMessages(methods_coupons.text['verifySuccess'],
                                                       'block',
                                                       'dopbsp-success');
                    }
                    else{
                        $('#DOPBSPCalendar-coupons-verify'+ID).css('display', 'block');
                        methods_coupons.toggleMessages(methods_coupons.text['verifyError'],
                                                       'block',
                                                       'dopbsp-error');
                    }
                });
            },
            
            get:function(){
            /*
             * Get coupon data.
             * 
             * @retun coupon data
             */
                var coupon = {'id': 0,
                              'code': '', 
                              'operation': '-',
                              'price': 0,
                              'price_type': 'percent',
                              'price_by': 'once',
                              'translation': ''},
                coupon_data = methods_coupons.data['coupon'];
        
                /*
                 * Coupons are not used in WooCommerce.
                 */
                if (methods_woocommerce.data['enabled']){
                    return coupon;
                }
                
                if (methods_coupons.vars.use === true){
                    coupon['id'] = coupon_data['id'];
                    coupon['code'] = coupon_data['code'];
                    coupon['operation'] = coupon_data['operation'];
                    coupon['price'] = coupon_data['price'];
                    coupon['price_type'] = coupon_data['price_type'];
                    coupon['price_by'] = coupon_data['price_by'];
                    coupon['translation'] = coupon_data['translation'];
                }
                
                return coupon;
            },
            getPrice:function(coupon,
                              reservationPrice,
                              discountPrice,
                              extrasPrice,
                              feesPrice,
                              ciDay,
                              coDay,
                              startHour,
                              endHour,
                              noItems){
            /*
             * Get coupon value.
             * 
             * @param coupon (Object): coupon data
             * @param reservationPrice (Number): reservation price
             * @param discountPrice (Number): discount price
             * @param extrasPrice (Number): extras price
             * @param feesPrice (Number): fees price
             * @param ciDay (String): check in day
             * @param ciDay (String): check in day
             * @param startHour (String): start hour
             * @param endHour (String): start hour
             * @param noItems (Number): number of reserved items
             * 
             * @retun coupon price value
             */
                var price = 0,
                timeLapse;
        
                /*
                 * Coupons are not used in WooCommerce.
                 */
                if (methods_woocommerce.data['enabled']){
                    return price;
                }
        
                /*
                 * Verify days/hours.
                 */
                coDay = coDay === '' ? ciDay:coDay;
                endHour = endHour === '' ? startHour:endHour;
                
                /*
                 * Calculate price.
                 */
                timeLapse = methods_hours.data['enabled'] ? prototypes.getHoursDifference(startHour, endHour, 'hours')+(methods_hours.data['addLastHourToTotalPrice'] ? 1:0):
                                                            prototypes.getNoDays(ciDay, coDay)-(methods_days.data['morningCheckOut'] ? 1:0);
                                                    
                price += (coupon['operation'] === '-' ? -1:1)
                         *(coupon['price_by'] === 'once' ? 1:timeLapse)
                         *parseFloat(coupon['price'])
                         *(coupon['price_type'] === 'fixed' ? noItems:(reservationPrice+discountPrice+extrasPrice+feesPrice))/
                         (coupon['price_type'] === 'fixed' ? 1:100);
                
                return price;
            },
            set:function(coupon,
                         reservationPrice,
                         discountPrice,
                         extrasPrice,
                         feesPrice,
                         ciDay,
                         coDay,
                         startHour,
                         endHour,
                         noItems) {
            /*
             * Set coupon details.
             * 
             * @param coupon (Object): coupon data
             * @param reservationPrice (Number): reservation price
             * @param discountPrice (Number): discount price
             * @param extrasPrice (Number): extras price
             * @param feesPrice (Number): fees price
             * @param ciDay (String): check in day
             * @param ciDay (String): check in day
             * @param startHour (String): start hour
             * @param endHour (String): start hour
             * @param noItems (Number): number of reserved items
             * 
             * @retun HTML
             */
                var HTML = new Array(),
                i,
                price = 0;
        
                /*
                 * Verify days/hours.
                 */
                coDay = coDay === '' ? ciDay:coDay;
                endHour = endHour === '' ? startHour:endHour;
                
                if (coupon['price'] > 0){
                    price = methods_coupons.getPrice(coupon,
                                                     reservationPrice,
                                                     discountPrice,
                                                     extrasPrice,
                                                     feesPrice,
                                                     ciDay,
                                                     coDay,
                                                     startHour,
                                                     endHour,
                                                     noItems);
                                                       
                    HTML.push(' <tr class="dopbsp-separator">');
                    HTML.push('     <td class="dopbsp-label"><div class="dopbsp-line"></div></td>');
                    HTML.push('     <td class="dopbsp-value"><div class="dopbsp-line"></div></td>');
                    HTML.push(' </tr>');
                    HTML.push(' <tr>');
                    HTML.push('     <td class="dopbsp-label">'+coupon['translation']+'</td>');
                    HTML.push('     <td class="dopbsp-value dopbsp-info">');
                    HTML.push('         '+coupon['code']+'<br />');
                    
                    if (coupon['price_type'] !== 'fixed' 
                            || coupon['price_by'] !== 'once'){
                        HTML.push('         <span class="dopbsp-info-rule">&#9632;&nbsp;');

                        if (coupon['price_type'] === 'fixed'){
                            HTML.push(coupon['operation']+methods_price.set(coupon['price']));
                        }
                        else{
                            HTML.push(coupon['operation']+coupon['price']+'%');
                        }

                        if (coupon['price_by'] !== 'once'){
                            HTML.push('/'+(methods_hours.data['enabled'] ? methods_coupons.text['byHour']:methods_coupons.text['byDay']));
                        }
                        HTML.push('         </span><br />');
                    }
                    HTML.push('         <span class="dopbsp-info-price">'+coupon['operation']+'&nbsp;'+methods_price.set(price)+'</span>');
                    
                    HTML.push('     </td>');
                    HTML.push(' </tr>');
                }
                
                return HTML.join('');
            },
            
            toggleMessages:function(message,
                                    display,
                                    type){
            /*
             * Toggle coupons messages.
             * 
             * @param message (String): the message to be displayed
             * @param display (String): CSS display value
             *                          "block" display message
             *                          "none" hide message
             * @param type (String): message type
             *                       "dopbsp-error" error message
             *                       "dopbsp-success" success message
             */         
                display = display === undefined ? 'block':display;
                type = type === undefined ? 'dopbsp-error':type;
                
                $('#DOPBSPCalendar-coupons'+ID+' .dopbsp-message').html(message)
                                                                  .removeClass('dopbsp-success')
                                                                  .removeClass('dopbsp-error')
                                                                  .addClass(type)
                                                                  .css('display', display);
            }
        },

// 19. Deposit
        
        methods_deposit = {
            data: {},
            text: {},
            
            get:function(){
            /*
             * Get deposit data.
             * 
             * @retun deposit data
             */
                var deposit = {'price': 0,
                               'price_type': 'percent'};
                
                /*
                 * Deposit is not used in WooCommerce.
                 */
                if (methods_woocommerce.data['enabled']){
                    return deposit;
                }
                
                if (methods_deposit.data['deposit'] !== 0){
                    deposit['price'] = methods_deposit.data['deposit'];
                    deposit['price_type'] = methods_deposit.data['type'];
                }
                
                return deposit;
            },
            getPrice:function(deposit,
                              totalPrice){
            /*
             * Get deposit value.
             * 
             * @param deposit (Object): deposit data
             * @param totalPrice (Number): reservation total price
             * 
             * @retun deposit price value
             */
                var price = 0;
                
                /*
                 * Deposit is not used in WooCommerce.
                 */
                if (methods_woocommerce.data['enabled']){
                    return price;
                }
        
                price += parseFloat(deposit['price'])
                         *(deposit['price_type'] === 'fixed' ? 1:totalPrice)/
                         (deposit['price_type'] === 'fixed' ? 1:100);
                
                return price;
            },
            set:function(deposit,
                         totalPrice){
            /*
             * Set coupon details.
             * 
             * @param deposit (Object): deposit data
             * @param totalPrice (Number): reservation total price
             * 
             * @retun HTML
             */
                var HTML = new Array(),
                price = 0;
        
                if (deposit['price'] !== 0){
                    price = methods_deposit.getPrice(deposit,
                                                     totalPrice);
                                                       
                    HTML.push(' <tr class="dopbsp-deposit">');
                    HTML.push('     <td class="dopbsp-label">'+methods_deposit.text['title']+'</td>');
                    HTML.push('     <td class="dopbsp-value">'+methods_price.set(price)+'</td>');
                    HTML.push(' </tr>');
                }
                
                return HTML.join('');
            }
        },    

// 20. Reservation
        
        methods_reservation = {
            data: {},
            text: {},
            reservation: {'check_in': '',
                          'check_out': '',
                          'start_hour': '',
                          'end_hour': '',
                          'no_items': 1,
                          'price': 0,
                          'price_total': 0,
                          'extras': new Array(),
                          'extras_price': 0,
                          'discount': {},
                          'discount_price': 0,
                          'coupon': {},
                          'coupon_price': 0,
                          'fees': new Array(),
                          'fees_price': 0,
                          'deposit': {},
                          'deposit_price': 0,
                          'days_hours_history': {}},
            
            display:function(){
            /*
             * Display reservation.
             */
                var HTML = new Array();
                
                HTML.push(' <div id="DOPBSPCalendar-reservation'+ID+'" class="dopbsp-module">');
                HTML.push('     <h4>'+methods_reservation.text['title']+'</h4>');
                HTML.push('     <div id="DOPBSPCalendar-reservation-cart'+ID+'">');
                HTML.push('         <div class="dopbsp-message">'+(methods_hours.data['enabled'] ? methods_reservation.text['selectHours']:methods_reservation.text['selectDays'])+'</div>');
                HTML.push('     </div>');

                /*
                 * Add to cart button.
                 */
                if (methods_cart.data['enabled']
                        || (methods_woocommerce.data['enabled']
                                && methods_woocommerce.data['add_to_cart'])){
                    HTML.push('     <div class="dopbsp-input-wrapper dopbsp-add-to-cart-wrapper">');
                    HTML.push('         <input type="submit" name="DOPBSPCalendar-add-to-cart'+ID+'" id="DOPBSPCalendar-add-to-cart'+ID+'" value="'+methods_woocommerce.text['addToCart']+'" />');
                    HTML.push('     </div>');
                }
                HTML.push(' </div>');
                
                $('#DOPBSPCalendar-sidebar-column-wrapper-'+methods_sidebar.data['positions']['reservation']['column']+'-'+ID+' .dopbsp-row'+methods_sidebar.data['positions']['reservation']['row']).html(HTML.join(''));
            },
            init:function(){
            /*
             * Initialize reservation.
             */
                methods_reservation.events();
            },
            set:function(){
            /*
             * Set reservation details.
             */    
                var ciDay = $('#DOPBSPCalendar-check-in'+ID).val(),
                coDay = $('#DOPBSPCalendar-check-out'+ID).val() !== undefined ? $('#DOPBSPCalendar-check-out'+ID).val():'',
                endHour = $('#DOPBSPCalendar-end-hour'+ID).val() !== undefined ? $('#DOPBSPCalendar-end-hour'+ID).val():'',
                HTML = new Array(),
                noItems = parseInt($('#DOPBSPCalendar-no-items'+ID).val()),
                startHour = $('#DOPBSPCalendar-start-hour'+ID).val() !== undefined ? $('#DOPBSPCalendar-start-hour'+ID).val():'';
                
                if (!methods_hours.data['enabled']
                        && !methods_days.getAvailability(ciDay, coDay)){
                    methods_reservation.toggleMessages(methods_reservation.text['selectDays'], '');
                    methods_reservation.clear();
                    methods_order.payment.set();
                    
                    return false;
                }
                
                if (methods_hours.data['enabled']
                        && !methods_hours.getAvailability(ciDay, startHour, endHour)){
                    methods_reservation.toggleMessages(methods_reservation.text['selectHours'], '');
                    endHour !== '' ? methods_reservation.clear():'';
                    methods_order.payment.set();
                    
                    return false;
                }
                   
                /*
                 * Set reservation data.
                 */
                methods_reservation.reservation['check_in'] = ciDay;
                methods_reservation.reservation['check_out'] = coDay;
                methods_reservation.reservation['start_hour'] = startHour;
                methods_reservation.reservation['end_hour'] = endHour;
                methods_reservation.reservation['no_items'] = noItems;
                methods_reservation.reservation['price'] = noItems*(methods_hours.data['enabled'] ? methods_hours.getPrice(methods_reservation.reservation['check_in'],
                                                                                                                           methods_reservation.reservation['start_hour'],
                                                                                                                           methods_reservation.reservation['end_hour']):
                                                                                                    methods_days.getPrice(methods_reservation.reservation['check_in'],
                                                                                                                          methods_reservation.reservation['check_out']));
                /*
                 * Set reservation extras data.
                 */
                methods_reservation.reservation['extras'] = methods_extras.get(methods_reservation.reservation['price'],
                                                                               methods_reservation.reservation['check_in'],
                                                                               methods_reservation.reservation['check_out'],
                                                                               methods_reservation.reservation['start_hour'],
                                                                               methods_reservation.reservation['end_hour'],
                                                                               methods_reservation.reservation['no_items']);
                methods_reservation.reservation['extras_price'] = methods_extras.getPrice(methods_reservation.reservation['extras'],
                                                                                          methods_reservation.reservation['price'],
                                                                                          methods_reservation.reservation['check_in'],
                                                                                          methods_reservation.reservation['check_out'],
                                                                                          methods_reservation.reservation['start_hour'],
                                                                                          methods_reservation.reservation['end_hour'],
                                                                                          methods_reservation.reservation['no_items']);
                
                /*
                 * Set reservation discount data.
                 */
                methods_reservation.reservation['discount'] = methods_discounts.get(methods_reservation.reservation['check_in'],
                                                                                    methods_reservation.reservation['check_out'],
                                                                                    methods_reservation.reservation['start_hour'],
                                                                                    methods_reservation.reservation['end_hour']);
                methods_reservation.reservation['discount_price'] = methods_discounts.getPrice(methods_reservation.reservation['discount'],
                                                                                               methods_reservation.reservation['price'],
                                                                                               methods_reservation.reservation['extras_price'],
                                                                                               methods_reservation.reservation['check_in'],
                                                                                               methods_reservation.reservation['check_out'],
                                                                                               methods_reservation.reservation['start_hour'],
                                                                                               methods_reservation.reservation['end_hour'],
                                                                                               methods_reservation.reservation['no_items']);
                
                /*
                 * Set reservation fees data.
                 */
                methods_reservation.reservation['fees'] = methods_fees.get(methods_reservation.reservation['price'],
                                                                           methods_reservation.reservation['discount_price'],
                                                                           methods_reservation.reservation['extras_price'],
                                                                           methods_reservation.reservation['check_in'],
                                                                           methods_reservation.reservation['check_out'],
                                                                           methods_reservation.reservation['start_hour'],
                                                                           methods_reservation.reservation['end_hour'],
                                                                           methods_reservation.reservation['no_items']);
                methods_reservation.reservation['fees_price'] = methods_fees.getPrice(methods_reservation.reservation['fees'],
                                                                                      methods_reservation.reservation['price'],
                                                                                      methods_reservation.reservation['discount_price'],
                                                                                      methods_reservation.reservation['extras_price'],
                                                                                      methods_reservation.reservation['check_in'],
                                                                                      methods_reservation.reservation['check_out'],
                                                                                      methods_reservation.reservation['start_hour'],
                                                                                      methods_reservation.reservation['end_hour'],
                                                                                      methods_reservation.reservation['no_items']);
                
                /*
                 * Set reservation coupon data.
                 */
                methods_reservation.reservation['coupon'] = methods_coupons.get();
                methods_reservation.reservation['coupon_price'] = methods_coupons.getPrice(methods_reservation.reservation['coupon'],
                                                                                           methods_reservation.reservation['price'],
                                                                                           methods_reservation.reservation['discount_price'],
                                                                                           methods_reservation.reservation['extras_price'],
                                                                                           methods_reservation.reservation['fees_price'],
                                                                                           methods_reservation.reservation['check_in'],
                                                                                           methods_reservation.reservation['check_out'],
                                                                                           methods_reservation.reservation['start_hour'],
                                                                                           methods_reservation.reservation['end_hour'],
                                                                                           methods_reservation.reservation['no_items']);
                
                /*
                 * Total price.
                 */
                methods_reservation.reservation['price_total'] = methods_reservation.reservation['price']
                                                                 +methods_reservation.reservation['extras_price']
                                                                 +methods_reservation.reservation['discount_price']
                                                                 +methods_reservation.reservation['fees_price']
                                                                 +methods_reservation.reservation['coupon_price'];
                                                         
                /*
                 * Deposit
                 */
                methods_reservation.reservation['deposit'] = methods_deposit.get();
                methods_reservation.reservation['deposit_price'] = methods_deposit.getPrice(methods_reservation.reservation['deposit'],
                                                                                            methods_reservation.reservation['price_total']);
                
                /*
                 * Set reservation history data.
                 */
                methods_reservation.reservation['days_hours_history'] = methods_hours.data['enabled'] ? methods_hours.getHistory(methods_reservation.reservation['check_in'],
                                                                                                                                 methods_reservation.reservation['start_hour'],
                                                                                                                                 methods_reservation.reservation['end_hour']):
                                                                                                        methods_days.getHistory(methods_reservation.reservation['check_in'],
                                                                                                                                methods_reservation.reservation['check_out']);
                
                /*
                 * Set reservation display.
                 */
                HTML.push('<div class="dopbsp-cart-wrapper">');
                HTML.push(' <table class="dopbsp-cart">');
                HTML.push('     <tbody>');
                HTML.push('         <tr>');
                HTML.push('             <td class="dopbsp-label">'+methods_search.text['checkIn']+'</td>');
                HTML.push('             <td class="dopbsp-value">'+methods_sidebar.getDateFormat(methods_reservation.reservation['check_in'])+'</td>');
                HTML.push('         </tr>');
                
                if (methods_reservation.reservation['check_out'] !== ''){
                    HTML.push(' <tr>');
                    HTML.push('     <td class="dopbsp-label">'+methods_search.text['checkOut']+'</td>');
                    HTML.push('     <td class="dopbsp-value">'+methods_sidebar.getDateFormat(methods_reservation.reservation['check_out'])+'</td>');
                    HTML.push(' </tr>');
                }
                
                if (methods_reservation.reservation['end_hour'] !== ''){
                    HTML.push(' <tr>');
                    HTML.push('     <td class="dopbsp-label">'+methods_search.text['hourStart']+'</td>');
                    HTML.push('     <td class="dopbsp-value">');
                    HTML.push(methods_hours.data['ampm'] ? prototypes.getAMPM(methods_reservation.reservation['start_hour']):
                                                           methods_reservation.reservation['start_hour']);
                    HTML.push('     </td>');
                    HTML.push(' </tr>');
                }
                
                if (methods_reservation.reservation['end_hour'] !== ''){
                    HTML.push(' <tr>');
                    HTML.push('     <td class="dopbsp-label">'+methods_search.text['hourEnd']+'</td>');
                    HTML.push('     <td class="dopbsp-value">');
                    HTML.push(methods_hours.data['ampm'] ? prototypes.getAMPM(methods_reservation.reservation['end_hour']):
                                                           methods_reservation.reservation['end_hour']);
                    HTML.push('     </td>');
                    HTML.push(' </tr>');
                }
                
                if (methods_sidebar.data['noItems']){
                    HTML.push(' <tr>');
                    HTML.push('     <td class="dopbsp-label">'+methods_search.text['noItems']+'</td>');
                    HTML.push('     <td class="dopbsp-value">'+methods_reservation.reservation['no_items']+'</td>');
                    HTML.push(' </tr>');
                }
                
                if (methods_reservation.reservation['price'] !== 0){
                    HTML.push(' <tr>');
                    HTML.push('     <td class="dopbsp-label">'+methods_reservation.text['price']+'</td>');
                    HTML.push('     <td class="dopbsp-value dopbsp-price">');
                    HTML.push(methods_price.set(methods_reservation.reservation['price']));
                    HTML.push('     </td>');
                    HTML.push(' </tr>');
                }
                
                /*
                 * Extras
                 */
                HTML.push(methods_extras.set(methods_reservation.reservation['extras'],
                                             methods_reservation.reservation['check_in'],
                                             methods_reservation.reservation['check_out'],
                                             methods_reservation.reservation['start_hour'],
                                             methods_reservation.reservation['end_hour']));
                
                /*
                 * Discounts
                 */
                if (methods_reservation.reservation['price'] !== 0){
                    HTML.push(methods_discounts.set(methods_reservation.reservation['discount'],
                                                    methods_reservation.reservation['price'],
                                                    methods_reservation.reservation['extras_price'],
                                                    methods_reservation.reservation['check_in'],
                                                    methods_reservation.reservation['check_out'],
                                                    methods_reservation.reservation['start_hour'],
                                                    methods_reservation.reservation['end_hour'],
                                                    methods_reservation.reservation['no_items']));
                }
                
                /*
                 * Fees
                 */
                HTML.push(methods_fees.set('reservation',
                                           methods_reservation.reservation['fees'],
                                           methods_reservation.reservation['check_in'],
                                           methods_reservation.reservation['check_out'],
                                           methods_reservation.reservation['start_hour'],
                                           methods_reservation.reservation['end_hour']));
                
                /*
                 * Coupons
                 */
                if (methods_reservation.reservation['price'] !== 0){
                    HTML.push(methods_coupons.set(methods_reservation.reservation['coupon'],
                                                  methods_reservation.reservation['price'],
                                                  methods_reservation.reservation['discount_price'],
                                                  methods_reservation.reservation['extras_price'],
                                                  methods_reservation.reservation['fees_price'],
                                                  methods_reservation.reservation['check_in'],
                                                  methods_reservation.reservation['check_out'],
                                                  methods_reservation.reservation['start_hour'],
                                                  methods_reservation.reservation['end_hour'],
                                                  methods_reservation.reservation['no_items']));
                }
                
                HTML.push('         <tr class="dopbsp-separator">');
                HTML.push('             <td class="dopbsp-label"></td>');
                HTML.push('             <td class="dopbsp-value"></td>');
                HTML.push('         </tr>');
                
                /*
                 * Total price.
                 */
                if (methods_reservation.reservation['price_total'] > 0){
                    /*
                     * Deposit
                     */
                    if (methods_reservation.reservation['deposit_price'] > 0){
                        HTML.push(methods_deposit.set(methods_reservation.reservation['deposit'],
                                                      methods_reservation.reservation['price_total']));
                    }
                    HTML.push('         <tr class="dopbsp-total">');
                    HTML.push('             <td class="dopbsp-label">'+methods_reservation.text['priceTotal']+'</td>');
                    HTML.push('             <td class="dopbsp-value">'+methods_price.set(methods_reservation.reservation['price_total'])+'</td>');
                    HTML.push('         </tr>');
                }
                HTML.push('     </tbody>');
                HTML.push(' </table>');
                HTML.push('</div>');
                
                $('#DOPBSPCalendar-reservation-cart'+ID).html(HTML.join(''));
                
                /*
                 * Scroll to reservation or to add to cart button for WooCommerce.
                 */
                if (methods_woocommerce.data['enabled']
                        && !methods_woocommerce.data['add_to_cart']){
                    if ($('#dopbsp-wc-booking-reservation').offset().top+$('#dopbsp-wc-booking-reservation').height() < $(document).scrollTop()){
                        prototypes.scrollToY($('#dopbsp-wc-booking-reservation').offset().top+$('#dopbsp-wc-booking-reservation').height()-200);
                    }
                }
                else{
                    if ($('#DOPBSPCalendar-reservation'+ID).offset().top+$('#DOPBSPCalendar-reservation'+ID).height() > $(document).scrollTop()+$(window).height()){
                        prototypes.scrollToY($('#DOPBSPCalendar-reservation'+ID).offset().top+$('#DOPBSPCalendar-reservation'+ID).height()-$(window).height()+50);
                    }
                }
                
                if (methods_extras.validate(methods_reservation.reservation['extras'])){
                    if (methods_woocommerce.data['enabled']){ 
                        methods_cart.cart[0] = methods_reservation.reservation;
                        methods_woocommerce.set();
                    }
                    else if (methods_cart.data['enabled']){ 
                        
                    }
                    else{
                        methods_cart.cart[0] = methods_reservation.reservation;
                        methods_order.payment.set();
                        $('#DOPBSPCalendar-submit'+ID).css('display', 'block');
                    }
                }
                else{
                    if (!methods_cart.data['enabled']){
                        $('#DOPBSPCalendar-submit'+ID).css('display', 'none');
                    }
                }
            },
            
            events:function(){
            /*
             * Initialize reservation events.
             */    
                if (methods_woocommerce.data['enabled']
                        && methods_woocommerce.data['add_to_cart']){
                    $('#DOPBSPCalendar-add-to-cart'+ID).unbind('click');
                    $('#DOPBSPCalendar-add-to-cart'+ID).bind('click', function(){
                        $('.variations_form').submit();
                    });
                }
            },
            
            clear:function(){
            /*
             * Clear reservation data.
             */
                methods_days.vars.selectionEnd = '';
                methods_days.vars.selectionInit = false;
                methods_days.vars.selectionStart = '';
                methods_days.clearSelection();
                
                methods_hours.vars.selectionEnd = '';
                methods_hours.vars.selectionInit = false;
                methods_hours.vars.selectionStart = '';
                $('.DOPBSPCalendar-hour', Container).removeClass('dopbsp-selected');
                
                methods_coupons.vars.use = false;
        
                methods_reservation.reservation = {'check_in': '',
                                                   'check_out': '',
                                                   'start_hour': '',
                                                   'end_hour': '',
                                                   'no_items': 1,
                                                   'price': 0,
                                                   'price_total': 0,
                                                   'extras': new Array(),
                                                   'extras_price': 0,
                                                   'discount': {},
                                                   'discount_price': 0,
                                                   'coupon': {},
                                                   'coupon_price': 0,
                                                   'fees': new Array(),
                                                   'fees_price': 0,
                                                   'deposit': {},
                                                   'deposit_price': 0,
                                                   'days_hours_history': {}};
                                               
                if (!methods_cart.data['enabled']){
                    methods_cart.cart = new Array();
                    $('#DOPBSPCalendar-submit'+ID).css('display', 'none');
                } 
            },
            toggleMessages:function(message,
                                    type){
            /*
             * Toggle reservation messages.
             * 
             * @param message (String): the message to be displayed
             * @param type (String): message type
             *                       "none"
             *                       "dopbsp-error" error message
             *                       "dopbsp-success" success message
             */
                type = type === undefined ? 'dopbsp-error':type;
                
                $('#DOPBSPCalendar-reservation-cart'+ID).html('<div class="dopbsp-message '+type+'">'+message+'</div>');
            }
        },         
                
// 21. Cart

        methods_cart = {
            data: {},
            text: {},
            cart: new Array(),
              
            display:function(){
            /*
             * Display cart.
             */
                var HTML = new Array();
                
                /*
                 * Cart totals.
                 */
                HTML.push(' <div id="DOPBSPCalendar-cart'+ID+'" class="module'+(methods_cart.data['enabled'] ? '':' DOPBSPCalendar-hidden')+'">');
                HTML.push('     <h4>'+methods_cart.text['title']+'</h4>');
                HTML.push('     <table id="DOPBSPCalendar-list-cart'+ID+'" class="cart">');
                HTML.push('         <tbody>');
                HTML.push('             <tr>');
                HTML.push('                 <td class="label">Price</td>');
                HTML.push('                 <td class="value"></td>');
                HTML.push('             </tr>');
                HTML.push('             <tr id="DOPBSPCalendar-cart-totals-discount'+ID+'">');
                HTML.push('                 <td class="label">Discount</td>');
                HTML.push('                 <td class="value"></td>');
                HTML.push('             </tr>');
                HTML.push('             <tr id="DOPBSPCalendar-cart-totals-deposit'+ID+'">');
                HTML.push('                 <td class="label">'+methods_deposit.text['title']+'</td>');
                HTML.push('                 <td class="value"></td>');
                HTML.push('             </tr>');
                HTML.push('             <tr id="DOPBSPCalendar-cart-totals-total-price'+ID+'" class="total">');
                HTML.push('                 <td class="label">'+methods_reservation.text['priceTotal']+'</td>');
                HTML.push('                 <td class="value"></td>');
                HTML.push('             </tr>');
                HTML.push('         </tbody>');
                HTML.push('     </table>');
                HTML.push(' </div>');
                
                $('#DOPBSPCalendar-sidebar-column-wrapper-'+methods_sidebar.data['positions']['cart']['column']+'-'+ID+' .row'+methods_sidebar.data['positions']['cart']['row']).html(HTML.join(''));
            },
            add:function(){
                methods_cart.cart.push(methods_reservation.reservation);
                methods_cart.set();
            },
            delete:function(i){
                methods_cart.cart.splice(i, 1);
                methods_cart.set();
            },
            set:function(){
                var HTML = new Array(),
                i;
                HTML.push('<tbody>');
                
                if (methods_cart.cart.length > 0){
                    for (i=0; i<methods_cart.cart.length; i++){

                    }
                    methods_order.set();
                }
                else{
                    HTML.push('  <tr>');
                    HTML.push('     <td>'+methods_cart.text['isEmpty']+'</td>');
                    HTML.push('  </tr>');
                    methods_order.clear();
                }
                HTML.push('</tbody>');
            }
        },
                
// 22. Form
                
        methods_form = {
            data: {},
            text: {},
            
            display:function(){
            /*
             * Display form.
             */
                var form = methods_form.data['form'],
                formField,
                formFieldOption,
                HTML = new Array (),
                i,
                j;
        
                HTML.push('<div id="DOPBSPCalendar-form'+ID+'" class="dopbsp-module">');

                if (!methods_woocommerce.data['enabled']){
                    /*
                     * Title
                     */
                    HTML.push(' <h4>'+methods_form.text['title']+'</h4>');

                    /*
                     * Fields
                     */
                    for (i=0; i<form.length; i++){
                        formField = form[i];
                        
                        HTML.push(' <div class="dopbsp-input-wrapper">');

                        switch (formField['type']){
                            case 'checkbox':
                                /*
                                 * Checkbox field.
                                 */
                                HTML.push('     <div id="DOPBSPCalendar-form-field-warning'+ID+'_'+formField['id']+'" class="dopbsp-warning-info DOPBSPCalendar-hidden">');
                                HTML.push('         <a href="javascript:void(0)" class="dopbsp-icon"></a>');
                                HTML.push('         <div class="dopbsp-message">'+formField['translation']+' '+methods_form.text['required']+'</div>');
                                HTML.push('     </div>');
                                HTML.push('     <input type="checkbox" name="DOPBSPCalendar-form-field'+ID+'_'+formField['id']+'" id="DOPBSPCalendar-form-field'+ID+'_'+formField['id']+'" />');
                                HTML.push('     <label class="dopbsp-for-checkbox" for="DOPBSPCalendar-form-field'+ID+'_'+formField['id']+'">'+formField['translation']+(formField['required'] === 'true' ? '  <span class="dopbsp-required">*</span>':'')+'</label>');
                                break;
                            case 'select':
                                /*
                                 * Select field.
                                 */
                                HTML.push('     <div id="DOPBSPCalendar-form-field-warning'+ID+'_'+formField['id']+'" class="dopbsp-warning-info DOPBSPCalendar-hidden">');
                                HTML.push('         <a href="javascript:void(0)" class="dopbsp-icon"></a>');
                                HTML.push('         <div class="dopbsp-message">'+formField['translation']+' '+methods_form.text['required']+'</div>');
                                HTML.push('     </div>');
                                HTML.push('     <label for="DOPBSPCalendar-form-field'+ID+'_'+formField['id']+'">'+formField['translation']+(formField['required'] === 'true' ? '  <span class="dopbsp-required">*</span>':'')+'</label>');
                                HTML.push('     <select name="DOPBSPCalendar-form-field'+ID+'_'+formField['id']+(formField['multiple_select'] === 'true' ? '[]':'')+'" id="DOPBSPCalendar-form-field'+ID+'_'+formField['id']+'" value=""'+(formField['multiple_select'] === 'true' ? ' multiple':'')+'>');

                                for (j=0; j<formField['options'].length; j++){
                                    formFieldOption = formField['options'][j];
                                    HTML.push('<option value="'+formFieldOption['id']+'">'+formFieldOption['translation']+'</option>');
                                }
                                HTML.push('     </select>');
                                break;
                            case 'text':
                                /*
                                 * Text field.
                                 */
                                HTML.push('     <div id="DOPBSPCalendar-form-field-warning'+ID+'_'+formField['id']+'" class="dopbsp-warning-info DOPBSPCalendar-hidden">');
                                HTML.push('         <a href="javascript:void(0)" class="dopbsp-icon"></a>');
                                HTML.push('         <div class="dopbsp-message">'+formField['translation']+' '+(formField['is_email'] === 'true' ? methods_form.text['invalidEmail']:methods_form.text['required'])+'</div>');
                                HTML.push('     </div>');
                                HTML.push('     <label for="DOPBSPCalendar-form-field'+ID+'_'+formField['id']+'">'+formField['translation']+(formField['required'] === 'true' ? ' <span class="dopbsp-required">*</span>':'')+'</label>');
                                HTML.push('     <input type="text" name="DOPBSPCalendar-form-field'+ID+'_'+formField['id']+'" id="DOPBSPCalendar-form-field'+ID+'_'+formField['id']+'" value="" />');
                                break;
                            case 'textarea':
                                /*
                                 * Textarea field.
                                 */
                                HTML.push('     <div id="DOPBSPCalendar-form-field-warning'+ID+'_'+formField['id']+'" class="dopbsp-warning-info DOPBSPCalendar-hidden">');
                                HTML.push('         <a href="javascript:void(0)" class="dopbsp-icon"></a>');
                                HTML.push('         <div class="dopbsp-message">'+formField['translation']+' '+methods_form.text['required']+'</div>');
                                HTML.push('     </div>');
                                HTML.push('     <label for="DOPBSPCalendar-form-field'+ID+'_'+formField['id']+'">'+formField['translation']+(formField['required'] === 'true' ? '  <span class="dopbsp-required">*</span>':'')+'</label>');
                                HTML.push('     <textarea name="DOPBSPCalendar-form-field'+ID+'_'+formField['id']+'" id="DOPBSPCalendar-form-field'+ID+'_'+formField['id']+'" col="" rows="3"></textarea>');
                                break;
                        }
                        HTML.push(' </div>');
                    }
                }
                
                HTML.push('</div>');
                
                $('#DOPBSPCalendar-sidebar-column-wrapper-'+methods_sidebar.data['positions']['form']['column']+'-'+ID+' .dopbsp-row'+methods_sidebar.data['positions']['form']['row']).html(HTML.join(''));
                
                methods_form.init();
            },
            init:function(){
            /*
             * Initialize form.
             */    
                var form = methods_form.data['form'],
                formField,
                i;
        
                for (i=0; i<form.length; i++){
                    formField = form[i];
                    
                    /*
                     * Initialize select fields.
                     */
                    if (formField['type'] === 'select'){
                        $('#DOPBSPCalendar-form-field'+ID+'_'+formField['id']).DOPSelect();
                    }
                }
                
                methods_form.events();
            },
            events:function(){
            /*
             * Initialize form events.
             */    
                var form = methods_form.data['form'],
                formData = {},
                formField,
                i;
        
                for (i=0; i<form.length; i++){
                    formField = form[i];
                    formData[formField['id']] = formField;
                    formData[formField['id']]['size'] = parseInt(formData[formField['id']]['size'], 10);
                        
                    switch (formField['type']){
                        case 'checkbox':
                            $('#DOPBSPCalendar-form-field'+ID+'_'+formField['id']).unbind('click');
                            $('#DOPBSPCalendar-form-field'+ID+'_'+formField['id']).bind('click', function(){
                                var id = $(this).attr('id').split('DOPBSPCalendar-form-field'+ID+'_')[1];
                                
                                /*
                                 * Verify if required.
                                 */
                                if (formData[id]['required'] === 'true' 
                                        && !$(this).is(':checked')){
                                    $('#DOPBSPCalendar-form-field-warning'+ID+'_'+id).css('display', 'block');
                                }
                                else{
                                    $('#DOPBSPCalendar-form-field-warning'+ID+'_'+id).css('display', 'none');
                                }
                            });
                            break;
                        case 'text':
                            $('#DOPBSPCalendar-form-field'+ID+'_'+formField['id']).unbind('input propertychange blur');
                            $('#DOPBSPCalendar-form-field'+ID+'_'+formField['id']).bind('input propertychange blur', function(){
                                var id = $(this).attr('id').split('DOPBSPCalendar-form-field'+ID+'_')[1],
                                value;
                                
                                /*
                                 * Verify characters.
                                 */
                                if (formData[id]['allowed_characters'] !== ''){
                                    prototypes.cleanInput($(this), formData[id]['allowed_characters']);
                                }
                                
                                value = $(this).val();
                                
                                /*
                                 * Verify size.
                                 */
                                if (formData[id]['size'] !== 0){
                                    $(this).val(value.substring(0, formData[id]['size']));
                                }
                                
                                /*
                                 * Verify if required/email.
                                 */
                                if (formData[id]['is_email'] === 'true' 
                                        && (formData[id]['required'] === 'true' 
                                                        && !prototypes.validEmail(value)
                                                || formData[id]['required'] === 'false' 
                                                        && !prototypes.validEmail(value)
                                                        && value !== '')){
                                    $('#DOPBSPCalendar-form-field-warning'+ID+'_'+id).css('display', 'block');
                                }
                                else if (formData[id]['required'] === 'true' 
                                            && value === ''){
                                    $('#DOPBSPCalendar-form-field-warning'+ID+'_'+id).css('display', 'block');
                                }
                                else{
                                    $('#DOPBSPCalendar-form-field-warning'+ID+'_'+id).css('display', 'none');
                                }
                            });
                            break;
                        case 'select':
                            $('#DOPBSPCalendar-form-field'+ID+'_'+formField['id']).unbind('change');
                            $('#DOPBSPCalendar-form-field'+ID+'_'+formField['id']).bind('change', function(){
                                var id = $(this).attr('id').split('DOPBSPCalendar-form-field'+ID+'_')[1];
                                
                                /*
                                 * Verify if required.
                                 */
                                if (formData[id]['required'] === 'true' 
                                        && ($(this).val() === '' 
                                            || $(this).val() === null)){
                                    $('#DOPBSPCalendar-form-field-warning'+ID+'_'+id).css('display', 'block');
                                }
                                else{
                                    $('#DOPBSPCalendar-form-field-warning'+ID+'_'+id).css('display', 'none');
                                }
                            });
                            break;
                        case 'textarea':
                            $('#DOPBSPCalendar-form-field'+ID+'_'+formField['id']).unbind('input propertychange blur');
                            $('#DOPBSPCalendar-form-field'+ID+'_'+formField['id']).bind('input propertychange blur', function(){
                                var id = $(this).attr('id').split('DOPBSPCalendar-form-field'+ID+'_')[1],
                                value;
                                
                                /*
                                 * Verify characters.
                                 */
                                if (formData[id]['allowed_characters'] !== ''){
                                    prototypes.cleanInput($(this), formData[id]['allowed_characters']);
                                }
                                
                                value = $(this).val();
                                
                                /*
                                 * Verify size.
                                 */
                                if (formData[id]['size'] !== 0){
                                    $(this).val(value.substring(0, formData[id]['size']));
                                }
                                
                                /*
                                 * Verify if required.
                                 */
                                if (formData[id]['required'] === 'true' 
                                        && value === ''){
                                    $('#DOPBSPCalendar-form-field-warning'+ID+'_'+id).css('display', 'block');
                                }
                                else{
                                    $('#DOPBSPCalendar-form-field-warning'+ID+'_'+id).css('display', 'none');
                                }
                            });
                            break;
                    }
                }
            },
            
            get:function(){
            /*
             * Get form valid data.
             * 
             * @return JSON
             */    
                var form = methods_form.data['form'],
                formData = new Array(),
                formField,
                i,
                j,
                k,
                option,
                selectedOptions;
        
                for (i=0; i<form.length; i++){
                    formField = form[i];

                    formData[i] = {"id": "",
                                   "is_email": false,
                                   "add_to_day_hour_info": false,
                                   "add_to_day_hour_body": false,
                                   "translation": "",
                                   "value": ""};
                    formData[i]['id'] = formField['id'];
                    formData[i]['is_email'] = formField['is_email'] === 'true' ? true:false;
                    formData[i]['add_to_day_hour_info'] = formField['add_to_day_hour_info'] === 'true' ? true:false;
                    formData[i]['add_to_day_hour_body'] = formField['add_to_day_hour_body'] === 'true' ? true:false;
                    formData[i]['translation'] = formField['translation'];

                    switch (formField['type']){
                        case 'checkbox':
                            formData[i]['value'] = $('#DOPBSPCalendar-form-field'+ID+'_'+formField['id']).is(':checked');
                            break;
                        case 'select':
                            option = $('#DOPBSPCalendar-form-field'+ID+'_'+formField['id']).val();
                            
                            if (formField['multiple_select'] === 'true'){
                                selectedOptions = option.split(',');
                                formData[i]['value'] = new Array();

                                for (j=0; j<selectedOptions.length; j++){
                                    for (k=0; k<formField['options'].length; k++){
                                        if (formField['options'][k]['id'] === selectedOptions[j]){
                                            formData[i]['value'][j] = formField['options'][k];
                                        }
                                    }
                                }
                                
                                if (formData[i]['value'].length === 0){
                                    formData[i]['value'] = '';
                                }
                            }
                            else{
                                formData[i]['value'] = '';
                                
                                for (k=0; k<formField['options'].length; k++){
                                    if (formField['options'][k]['id'] === option){
                                        formData[i]['value'] = formField['options'][k]['translation'];
                                        break;
                                    }
                                }
                            }
                            break;
                        default:
                            formData[i]['value'] = $('#DOPBSPCalendar-form-field'+ID+'_'+formField['id']).val();
                    }
                }
                
                return formData;
            },
            validate:function(){
            /*
             * Validate form data.
             * 
             * @return true/false
             */    
                var form = methods_form.data['form'],
                formField,        
                i,
                isValid = true;

                for (i=0; i<form.length; i++){
                    formField = form[i];
                        
                    switch (formField['type']){
                        case 'checkbox':
                            if (formField['required'] === 'true' 
                                    && !$('#DOPBSPCalendar-form-field'+ID+'_'+formField['id']).is(':checked')){
                                isValid = false;
                                $('#DOPBSPCalendar-form-field-warning'+ID+'_'+formField['id']).css('display', 'block');
                            }
                            else{
                                $('#DOPBSPCalendar-form-field-warning'+ID+'_'+formField['id']).css('display', 'none');
                            }
                            break;
                        case 'text':
                            if (formField['is_email'] === 'true' 
                                    && (formField['required'] === 'true' 
                                                    && !prototypes.validEmail($('#DOPBSPCalendar-form-field'+ID+'_'+formField['id']).val())
                                            || formField['required'] === 'false' 
                                                    && !prototypes.validEmail($('#DOPBSPCalendar-form-field'+ID+'_'+formField['id']).val())
                                                    && $('#DOPBSPCalendar-form-field'+ID+'_'+formField['id']).val() !== '')){
                                isValid = false;
                                $('#DOPBSPCalendar-form-field-warning'+ID+'_'+formField['id']).css('display', 'block');
                            }
                            else if (formField['required'] === 'true' 
                                    && $('#DOPBSPCalendar-form-field'+ID+'_'+formField['id']).val() === ''){
                                isValid = false;
                                $('#DOPBSPCalendar-form-field-warning'+ID+'_'+formField['id']).css('display', 'block');
                            }
                            else{
                                $('#DOPBSPCalendar-form-field-warning'+ID+'_'+formField['id']).css('display', 'none');
                            }
                            break;
                        case 'select':
                            if (formField['required'] === 'true' 
                                    && ($('#DOPBSPCalendar-form-field'+ID+'_'+formField['id']).val() === '' 
                                    || $('#DOPBSPCalendar-form-field'+ID+'_'+formField['id']).val() === null)){
                                isValid = false;
                                $('#DOPBSPCalendar-form-field-warning'+ID+'_'+formField['id']).css('display', 'block');
                            }
                            else{
                                $('#DOPBSPCalendar-form-field-warning'+ID+'_'+formField['id']).css('display', 'none');
                            }
                            break;
                        case 'textarea':
                            if (formField['required'] === 'true' 
                                    && $('#DOPBSPCalendar-form-field'+ID+'_'+formField['id']).val() === ''){
                                isValid = false;
                                $('#DOPBSPCalendar-form-field-warning'+ID+'_'+formField['id']).css('display', 'block');
                            }
                            else{
                                $('#DOPBSPCalendar-form-field-warning'+ID+'_'+formField['id']).css('display', 'none');
                            }
                            break;
                    }
                }

                return isValid;
            },
            
            getInfo:function(info){
            /*
             * Get form info in day/hour tooltip or body.
             * 
             * @param info (Array): info list
             * 
             * @return info text
             */    
                var i,
                text = new Array();
                
                for (i=0; i<info.length; i++){
                    text.push(info[i]['data']);
                }
                
                return text.join('<br /><br />');
            }
        },
                
// 23. Order
 
        methods_order = {
            data: {},
            text: {},
            vars: {addressFields: [{"id": "first-name",
                                    "key": "first_name",
                                    "text": "addressFirstName"},
                                   {"id": "last-name",
                                    "key": "last_name",
                                    "text": "addressLastName"},
                                   {"id": "company",
                                    "key": "company",
                                    "text": "addressCompany"},
                                   {"id": "email",
                                    "key": "email",
                                    "text": "addressEmail"},
                                   {"id": "phone",
                                    "key": "phone",
                                    "text": "addressPhone"},
                                   {"id": "country",
                                    "key": "country",
                                    "text": "addressCountry"},
                                   {"id": "address-first",
                                    "key": "address_first",
                                    "text": "addressAddressFirst"},
                                   {"id": "address-second",
                                    "key": "address_second",
                                    "text": "addressAddressSecond"},
                                   {"id": "city",
                                    "key": "city",
                                    "text": "addressCity"},
                                   {"id": "state",
                                    "key": "state",
                                    "text": "addressState"},
                                   {"id": "zip-code",
                                    "key": "zip_code",
                                    "text": "addressZipCode"}], 
                   tokenInit: false},
            
            display:function(){
            /*
             * Display order.
             * 
             * @return order HTML
             */
                var HTML = new Array (),
                key,
                paymentGateways = methods_order.data['paymentGateways'];
                
                HTML.push('<div id="DOPBSPCalendar-order'+ID+'" class="dopbsp-module">');

                /*
                 * Title
                 */
                HTML.push(' <h4>'+methods_order.text['title']+'</h4>');

                /*
                 * Pay on arrival.
                 */
                if (methods_order.data['paymentArrival']){
                    HTML.push(' <div class="dopbsp-input-wrapper dopbsp-payment-first">');
                    HTML.push('     <input type="radio" name="DOPBSPCalendar-payment'+ID+'" value="default" />');
                    HTML.push('     <label class="dopbsp-for-radio">'+(methods_order.data['paymentArrivalWithApproval'] ? methods_order.text['paymentArrivalWithApproval']:methods_order.text['paymentArrival'])+'</label>');
                    HTML.push(' </div>');
                }

                /*
                 * Payment gateways.
                 */
                if (paymentGateways.length !== 0) {
                    for (key in paymentGateways){
                        HTML.push(' <div class="dopbsp-input-wrapper">');
                        HTML.push('     <input type="radio" name="DOPBSPCalendar-payment'+ID+'" value="'+paymentGateways[key]['id']+'" />');
                        HTML.push('     <label class="dopbsp-for-radio">'+paymentGateways[key]['text']['label']+'</label>');
                        HTML.push(' </div>');
                    }
                }
                
                /*
                 * Token fields.
                 */
                HTML.push(' <input type="hidden" name="DOPBSPCalendar-payment-token'+ID+'" id="DOPBSPCalendar-payment-token'+ID+'" value="" />');
                HTML.push(' <input type="hidden" name="DOPBSPCalendar-payment-token-message'+ID+'" id="DOPBSPCalendar-payment-token-message'+ID+'" value="" />');
                
                HTML.push(' <div id="DOPBSPCalendar-payment-form-addon'+ID+'"></div>');
                /*
                 * Credit card.
                 */
                HTML.push(methods_order.payment.card.display());
                
                /*
                 * Billing address.
                 */
                HTML.push(methods_order.payment.address_billing.display());
                
                /*
                 * Shipping address.
                 */
                HTML.push(methods_order.payment.address_shipping.display());

                /*
                 * Terms & conditions.
                 */
                if (methods_order.data['termsAndConditions']){
                    HTML.push(' <div class="dopbsp-input-wrapper">');
                    HTML.push('     <input type="checkbox" name="DOPBSPCalendar-terms-and-conditions'+ID+'" id="DOPBSPCalendar-terms-and-conditions'+ID+'" />');
                    HTML.push('     <label class="dopbsp-for-checkbox" for="DOPBSPCalendar-terms-and-conditions'+ID+'"><a href="'+methods_order.data['termsAndConditionsLink']+'" target="_blank">'+methods_order.text['termsAndConditions']+'</a></label>');
                    HTML.push(' </div>');
                }

                /*
                 * Submit button.
                 */
                HTML.push(' <div class="dopbsp-input-wrapper">');
                HTML.push('     <input type="submit" name="DOPBSPCalendar-submit'+ID+'" id="DOPBSPCalendar-submit'+ID+'" class="DOPBSPCalendar-hidden" value="'+methods_order.text['book']+'" />');
                HTML.push('     <div id="DOPBSPCalendar-submit-loader'+ID+'" class="dopbsp-submit-loader DOPBSPCalendar-hidden"></div>');
                HTML.push(' </div>');
                
                /*
                 * Message
                 */
                HTML.push(' <div class="dopbsp-message DOPBSPCalendar-hidden"></div>');
                HTML.push('</div>');
                
                $('#DOPBSPCalendar-sidebar-column-wrapper-'+methods_sidebar.data['positions']['order']['column']+'-'+ID+' .dopbsp-row'+methods_sidebar.data['positions']['order']['row']).html(HTML.join(''));
                
                methods_order.init();
            },
            init:function(){
            /*
             * Initialize order.
             */    
                $('#DOPBSPCalendar-payment-card-expiration-date-month'+ID).DOPSelect();
                $('#DOPBSPCalendar-payment-card-expiration-date-year'+ID).DOPSelect();
                
                methods_order.events();
                methods_order.payment.set();
                
                methods_order.payment.address_billing.init();
                methods_order.payment.address_shipping.init();
                methods_order.payment.card.init();
            },
            events:function(){
            /*
             * Initialize order events.
             */    
                $('input[name=DOPBSPCalendar-payment'+ID+']').unbind('click');
                $('input[name=DOPBSPCalendar-payment'+ID+']').bind('click', function(){
                    methods_order.payment.form_addon.display();
                    methods_order.payment.card.set();
                    methods_order.payment.address_billing.set();
                    methods_order.payment.address_shipping.set();
                });
            
                $('#DOPBSPCalendar-submit'+ID).unbind('click');
                $('#DOPBSPCalendar-submit'+ID).bind('click', function(){
                    methods_order.book();
                });
            },
            validate:function(){
            /*
             * Validate order.
             */    
                var isValid = true;
                
                if (methods_order.data['termsAndConditions'] 
                        && !$('#DOPBSPCalendar-terms-and-conditions'+ID).is(':checked')){
                    methods_order.toggleMessages(methods_order.text['termsAndConditionsInvalid'],
                                                 'block');
                    isValid = false;
                }
                
                return isValid;
            },
            
            payment: {
                set:function(){
                /*
                 * Set payment methods to be used depending on cart price.
                 */
                    var cart= methods_cart.cart,
                    i,
                    price = 0;

                    for (i=0; i<cart.length; i++){
                        price += cart[i]['price_total'];
                    }

                    if (price > 0){
                        $('input[name=DOPBSPCalendar-payment'+ID+']').removeAttr('disabled')
                                                                     .removeAttr('checked');
                        $('input[name=DOPBSPCalendar-payment'+ID+']:first').attr('checked', 'checked');
                    }
                    else{
                        $('input[name=DOPBSPCalendar-payment'+ID+']').attr('disabled', 'disabled')
                                                                     .removeAttr('checked');
                    }
                    
                    methods_order.payment.form_addon.display();
                    methods_order.payment.card.set();
                    methods_order.payment.address_billing.set();
                    methods_order.payment.address_shipping.set();
                },
                token:function(paymentMethod){
                /*
                 * Get payment token from a JavaScript function.
                 * 
                 * @param paymentMethod (String): selected payment method
                 */    
                    var paymentGateways = methods_order.data['paymentGateways'];

                    if (!methods_order.vars.tokenInit){
                        methods_order.vars.tokenInit = true;
                        eval(paymentGateways[paymentMethod]['data']['token']['function']);
                    }
                    
                    /*
                     * Book function is called to verify if the token is created. If not the book function will call this function again.
                     */
                    setTimeout(function(){
                        methods_order.book();
                    }, 100);
                },
                verify:function(){
                /*
                 * Verify if payment has been made.
                 */
                    var href = window.location.href,
                    key,
                    paymentGateways = methods_order.data['paymentGateways'],
                    paymentCancel = prototypes.$_GET('dopbsp_payment_cancel'),
                    paymentError = prototypes.$_GET('dopbsp_payment_error'),
                    paymentSuccess = prototypes.$_GET('dopbsp_payment_success'),
                    variables;
            
                    for (key in paymentGateways){
                        if (paymentCancel !== undefined
                                && key === paymentCancel){
                            methods_info.toggleMessages(paymentGateways[key]['text']['cancel'],
                                                        'dopbsp-error');
                            variables = (href.indexOf('?dopbsp_payment_cancel') !== -1 ? '?':'&')+'dopbsp_payment_cancel';
                        }
                        else if (paymentError !== undefined
                                && key === paymentError){
                            methods_info.toggleMessages(paymentGateways[key]['text']['error'],
                                                        'dopbsp-error');
                            variables = (href.indexOf('?dopbsp_payment_error') !== -1 ? '?':'&')+'dopbsp_payment_error';
                        }
                        else if (paymentSuccess !== undefined
                                && key === paymentSuccess){
                            methods_info.toggleMessages(paymentGateways[key]['text']['success'],
                                                        'dopbsp-success');
                            variables = (href.indexOf('?dopbsp_payment_success') !== -1 ? '?':'&')+'dopbsp_payment_success';
                        }   
                    }

                    if (paymentCancel !== undefined
                            || paymentError !== undefined
                            || paymentSuccess !== undefined){
                        try{
                            window.history.pushState({'html':'', 'pageTitle':document.title}, '', href.split(variables)[0]);
                        }
                        catch(e){
                            // console.log(e);
                        }
                    }
                },
            
                address_billing: {
                    display:function(){
                    /*
                     * Display billing address form.
                     * 
                     * @return billing address HTML
                     */
                        var countries = methods_order.data.countries,
                        fields = methods_order.vars.addressFields, 
                        HTML = new Array (),
                        i,
                        j;
                
                        HTML.push('<div id="DOPBSPCalendar-payment-address-billing'+ID+'" class="DOPBSPCalendar-hidden">');
                        HTML.push(' <h4 id="DOPBSPCalendar-payment-address-billing-title'+ID+'">'+methods_order.text['addressBilling']+'</h4>');

                        for (i=0; i<fields.length; i++){
                            switch (fields[i]['key']){
                                case 'country':
                                    HTML.push(' <div id="DOPBSPCalendar-payment-address-billing-'+fields[i]['id']+'-wrapper'+ID+'" class="dopbsp-input-wrapper">');
                                    HTML.push('     <div id="DOPBSPCalendar-payment-address-billing-'+fields[i]['id']+'-warning'+ID+'" class="dopbsp-warning-info DOPBSPCalendar-hidden">');
                                    HTML.push('         <a href="javascript:void(0)" class="dopbsp-icon"></a>');
                                    HTML.push('         <div class="dopbsp-message">'+methods_order.text[fields[i]['text']]+' '+methods_form.text['required']+'</div>');
                                    HTML.push('     </div>');
                                    HTML.push('     <label for="DOPBSPCalendar-payment-address-billing-'+fields[i]['id']+ID+'">'+methods_order.text[fields[i]['text']]+' <span class="dopbsp-required">*</span></label>');
                                    HTML.push('     <select name="DOPBSPCalendar-payment-address-billing-'+fields[i]['id']+ID+'" id="DOPBSPCalendar-payment-address-billing-'+fields[i]['id']+ID+'">');

                                    for (j=0; j<countries.length; j++){
                                        HTML.push('     <option value="'+countries[j]['code3']+'">'+countries[j]['name']+'</option>');
                                    }
                                    HTML.push('     </select>');
                                    HTML.push(' </div>');           
                                    
                                    break;
                                case 'zip_code':
                                    HTML.push(' <div id="DOPBSPCalendar-payment-address-billing-'+fields[i]['id']+'-wrapper'+ID+'" class="dopbsp-input-wrapper">');
                                    HTML.push('     <div id="DOPBSPCalendar-payment-address-billing-'+fields[i]['id']+'-warning'+ID+'" class="dopbsp-warning-info DOPBSPCalendar-hidden">');
                                    HTML.push('         <a href="javascript:void(0)" class="dopbsp-icon"></a>');
                                    HTML.push('         <div class="dopbsp-message">'+methods_order.text[fields[i]['text']]+' '+methods_form.text['required']+'</div>');
                                    HTML.push('     </div>');
                                    HTML.push('     <label for="DOPBSPCalendar-payment-address-billing-'+fields[i]['id']+ID+'">'+methods_order.text[fields[i]['text']]+' <span class="dopbsp-required">*</span></label>');
                                    HTML.push('     <input type="text" name="DOPBSPCalendar-payment-address-billing-'+fields[i]['id']+ID+'" id="DOPBSPCalendar-payment-address-billing-'+fields[i]['id']+ID+'" class="dopbsp-small" value="" />');
                                    HTML.push(' </div>');
                                    
                                    break;
                                default:
                                    HTML.push(' <div id="DOPBSPCalendar-payment-address-billing-'+fields[i]['id']+'-wrapper'+ID+'" class="dopbsp-input-wrapper">');
                                    HTML.push('     <div id="DOPBSPCalendar-payment-address-billing-'+fields[i]['id']+'-warning'+ID+'" class="dopbsp-warning-info DOPBSPCalendar-hidden">');
                                    HTML.push('         <a href="javascript:void(0)" class="dopbsp-icon"></a>');
                                    HTML.push('         <div class="dopbsp-message">'+methods_order.text[fields[i]['text']]+' '+(fields[i]['key'] === 'email' ? methods_form.text['invalidEmail']:methods_form.text['required'])+'</div>');
                                    HTML.push('     </div>');
                                    HTML.push('     <label for="DOPBSPCalendar-payment-address-billing-'+fields[i]['id']+ID+'">'+methods_order.text[fields[i]['text']]+' <span class="dopbsp-required">*</span></label>');
                                    HTML.push('     <input type="text" name="DOPBSPCalendar-payment-address-billing-'+fields[i]['id']+ID+'" id="DOPBSPCalendar-payment-address-billing-'+fields[i]['id']+ID+'" value="" />');
                                    HTML.push(' </div>');
                            }
                        }
                        HTML.push('</div>');
                        
                        return HTML.join('');
                    },
                    init:function(){
                    /*
                     * Initialize billing address.
                     */    
                        $('#DOPBSPCalendar-payment-address-billing-country'+ID).DOPSelect();
                        methods_order.payment.address_billing.events();
                    },
                    
                    set:function(){
                    /*
                     * Set billing address form.
                     */
                        var fields = methods_order.vars.addressFields, 
                        i,
                        paymentGateways = methods_order.data['paymentGateways'],
                        paymentMethod = $('input[name=DOPBSPCalendar-payment'+ID+']:checked').val() === undefined ? 'none':$('input[name=DOPBSPCalendar-payment'+ID+']:checked').val(),
                        data = paymentMethod === 'none' || paymentMethod === 'default' ? methods_order.data['address_billing']:paymentGateways[paymentMethod]['data']['address_billing'];

                        $('#DOPBSPCalendar-payment-address-billing'+ID).css('display', paymentMethod !== 'none' && data['enabled'] ? 'block':'none');
                            
                        if (paymentMethod === 'none'
                                || !data['enabled']){
                            return false;
                        }
                        
                        for (i=0; i<fields.length; i++){
                            $('#DOPBSPCalendar-payment-address-billing-'+fields[i]['id']+'-wrapper'+ID).css('display', data[fields[i]['key']]['enabled'] ? 'block':'none');
                            $('#DOPBSPCalendar-payment-address-billing-'+fields[i]['id']+'-wrapper'+ID+' .dopbsp-required').css('display', data[fields[i]['key']]['required'] ? 'inline-block':'none');
                        }
                    },
                    get:function(){
                    /*
                     * Get billing address data.
                     */ 
                        var paymentGateways = methods_order.data['paymentGateways'],
                        paymentMethod = $('input[name=DOPBSPCalendar-payment'+ID+']:checked').val() === undefined ? 'none':$('input[name=DOPBSPCalendar-payment'+ID+']:checked').val(),
                        data = paymentMethod === 'none' || paymentMethod === 'default' ? methods_order.data['address_billing']:paymentGateways[paymentMethod]['data']['address_billing'];
 
                        if (!data['enabled']){
                            return '';
                        }
                        else{
                            return {"address_first": $('#DOPBSPCalendar-payment-address-billing-address-first'+ID).val(),
                                    "address_second": $('#DOPBSPCalendar-payment-address-billing-address-second'+ID).val(),
                                    "city": $('#DOPBSPCalendar-payment-address-billing-city'+ID).val(),
                                    "company": $('#DOPBSPCalendar-payment-address-billing-company'+ID).val(),
                                    "country": data['country']['enabled'] ? $('#DOPBSPCalendar-payment-address-billing-country'+ID).val():'',
                                    "email": $('#DOPBSPCalendar-payment-address-billing-email'+ID).val(),
                                    "first_name": $('#DOPBSPCalendar-payment-address-billing-first-name'+ID).val(),
                                    "last_name": $('#DOPBSPCalendar-payment-address-billing-last-name'+ID).val(),
                                    "phone": $('#DOPBSPCalendar-payment-address-billing-phone'+ID).val(),
                                    "state": $('#DOPBSPCalendar-payment-address-billing-state'+ID).val(),
                                    "zip_code": $('#DOPBSPCalendar-payment-address-billing-zip-code'+ID).val()};
                        }
                    },
                    validate:function(){
                    /*
                     * Validate billing address data.
                     * 
                     * @return true/false
                     */    
                        var fields = methods_order.vars.addressFields, 
                        i,
                        isValid = true,
                        paymentGateways = methods_order.data['paymentGateways'],
                        paymentMethod = $('input[name=DOPBSPCalendar-payment'+ID+']:checked').val() === undefined ? 'none':$('input[name=DOPBSPCalendar-payment'+ID+']:checked').val(),
                        data = paymentMethod === 'none' || paymentMethod === 'default' ? methods_order.data['address_billing']:paymentGateways[paymentMethod]['data']['address_billing'];
                        
                        if (!data['enabled']){
                            return true;
                        }
                        
                        for (i=0; i<fields.length; i++){
                            if ($('#DOPBSPCalendar-payment-address-billing-'+fields[i]['id']+ID).val() === ''
                                    && data[fields[i]['key']]['enabled'] 
                                    && data[fields[i]['key']]['required']
                                    && (fields[i]['key'] === 'email'
                                                && !prototypes.validEmail($('#DOPBSPCalendar-payment-address-billing-'+fields[i]['id']+ID).val())
                                                || fields[i]['key'] !== 'email')){
                                $('#DOPBSPCalendar-payment-address-billing-'+fields[i]['id']+'-warning'+ID).css('display', 'block');
                                isValid = false;
                            }
                            else{
                                $('#DOPBSPCalendar-payment-address-billing-'+fields[i]['id']+'-warning'+ID).css('display', 'none');
                            }
                        }

                        return isValid;
                    },
                    
                    events:function(){
                    /*
                     * Initialize billing address events.
                     */    
                        var fields = methods_order.vars.addressFields, 
                        i,
                        paymentGateways = methods_order.data['paymentGateways'],
                        paymentMethod = $('input[name=DOPBSPCalendar-payment'+ID+']:checked').val() === undefined ? 'none':$('input[name=DOPBSPCalendar-payment'+ID+']:checked').val(),
                        data = paymentMethod === 'none' || paymentMethod === 'default' ? methods_order.data['address_billing']:paymentGateways[paymentMethod]['data']['address_billing'];
                        
                        /*
                         * Billing address form fields events.
                         */
                        for (i=0; i<fields.length; i++){
                            switch (fields[i]['key']){
                                case 'country':
                                    break;
                                case 'email':
                                    if (data[fields[i]['key']]['enabled']){
                                        $('#DOPBSPCalendar-payment-address-billing-'+fields[i]['id']+ID).unbind('input propertychange blur');
                                        $('#DOPBSPCalendar-payment-address-billing-'+fields[i]['id']+ID).bind('input propertychange blur', function(){
                                            var paymentGateways = methods_order.data['paymentGateways'],
                                            paymentMethod = $('input[name=DOPBSPCalendar-payment'+ID+']:checked').val() === undefined ? 'none':$('input[name=DOPBSPCalendar-payment'+ID+']:checked').val(),
                                            data = paymentMethod === 'none' || paymentMethod === 'default' ? methods_order.data['address_billing']:paymentGateways[paymentMethod]['data']['address_billing'];
                                            
                                            $(this).parent().find('.dopbsp-warning-info').css('display', !prototypes.validEmail($(this).val()) && $(this).val() !== '' || data['email']['required'] && $(this).val() === ''  ? 'block':'none');
                                        });
                                    }
                                    break;
                                case 'phone':
                                    if (data[fields[i]['key']]['enabled']){
                                        $('#DOPBSPCalendar-payment-address-billing-'+fields[i]['id']+ID).unbind('input propertychange blur');
                                        $('#DOPBSPCalendar-payment-address-billing-'+fields[i]['id']+ID).bind('input propertychange blur', function(){
                                            prototypes.cleanInput($(this), '0123456789+-().');
                                        });
                                    }
                                    break;
                                default:
                                    if (data[fields[i]['key']]['enabled']
                                            && data[fields[i]['key']]['required']){
                                        $('#DOPBSPCalendar-payment-address-billing-'+fields[i]['id']+ID).unbind('input propertychange blur');
                                        $('#DOPBSPCalendar-payment-address-billing-'+fields[i]['id']+ID).bind('input propertychange blur', function(){
                                            $(this).parent().find('.dopbsp-warning-info').css('display', $(this).val() === '' ? 'block':'none');
                                        });
                                    }
                            }
                        }
                    }
                },
                address_shipping: {
                    display:function(){
                    /*
                     * Display shipping address form.
                     * 
                     * @return shipping address HTML
                     */
                        var countries = methods_order.data.countries,
                        fields = methods_order.vars.addressFields, 
                        HTML = new Array (),
                        i,
                        j;
                
                        HTML.push('<div id="DOPBSPCalendar-payment-address-shipping'+ID+'" class="DOPBSPCalendar-hidden">');
                        HTML.push(' <h4 id="DOPBSPCalendar-payment-address-shipping-title'+ID+'">'+methods_order.text['addressShipping']+'</h4>');
                        
                        HTML.push(' <div class="dopbsp-input-wrapper">');
                        HTML.push('     <input type="checkbox" name="DOPBSPCalendar-payment-address-shipping-copy'+ID+'" id="DOPBSPCalendar-payment-address-shipping-copy'+ID+'" checked="checked">');
                        HTML.push('     <label class="dopbsp-for-checkbox" for="DOPBSPCalendar-payment-address-shipping-copy'+ID+'">'+methods_order.text['addressShippingCopy']+'</label>');
                        HTML.push(' </div>');           

                        for (i=0; i<fields.length; i++){
                            switch (fields[i]['key']){
                                case 'country':
                                    HTML.push(' <div id="DOPBSPCalendar-payment-address-shipping-'+fields[i]['id']+'-wrapper'+ID+'" class="dopbsp-input-wrapper">');
                                    HTML.push('     <div id="DOPBSPCalendar-payment-address-shipping-'+fields[i]['id']+'-warning'+ID+'" class="dopbsp-warning-info DOPBSPCalendar-hidden">');
                                    HTML.push('         <a href="javascript:void(0)" class="dopbsp-icon"></a>');
                                    HTML.push('         <div class="dopbsp-message">'+methods_order.text[fields[i]['text']]+' '+methods_form.text['required']+'</div>');
                                    HTML.push('     </div>');
                                    HTML.push('     <label for="DOPBSPCalendar-payment-address-shipping-'+fields[i]['id']+ID+'">'+methods_order.text[fields[i]['text']]+' <span class="dopbsp-required">*</span></label>');
                                    HTML.push('     <select name="DOPBSPCalendar-payment-address-shipping-'+fields[i]['id']+ID+'" id="DOPBSPCalendar-payment-address-shipping-'+fields[i]['id']+ID+'">');

                                    for (j=0; j<countries.length; j++){
                                        HTML.push('     <option value="'+countries[j]['code3']+'">'+countries[j]['name']+'</option>');
                                    }
                                    HTML.push('     </select>');
                                    HTML.push(' </div>');           
                                    
                                    break;
                                case 'zip_code':
                                    HTML.push(' <div id="DOPBSPCalendar-payment-address-shipping-'+fields[i]['id']+'-wrapper'+ID+'" class="dopbsp-input-wrapper">');
                                    HTML.push('     <div id="DOPBSPCalendar-payment-address-shipping-'+fields[i]['id']+'-warning'+ID+'" class="dopbsp-warning-info DOPBSPCalendar-hidden">');
                                    HTML.push('         <a href="javascript:void(0)" class="dopbsp-icon"></a>');
                                    HTML.push('         <div class="dopbsp-message">'+methods_order.text[fields[i]['text']]+' '+methods_form.text['required']+'</div>');
                                    HTML.push('     </div>');
                                    HTML.push('     <label for="DOPBSPCalendar-payment-address-shipping-'+fields[i]['id']+ID+'">'+methods_order.text[fields[i]['text']]+' <span class="dopbsp-required">*</span></label>');
                                    HTML.push('     <input type="text" name="DOPBSPCalendar-payment-address-shipping-'+fields[i]['id']+ID+'" id="DOPBSPCalendar-payment-address-shipping-'+fields[i]['id']+ID+'" class="dopbsp-small" value="" />');
                                    HTML.push(' </div>');
                                    
                                    break;
                                default:
                                    HTML.push(' <div id="DOPBSPCalendar-payment-address-shipping-'+fields[i]['id']+'-wrapper'+ID+'" class="dopbsp-input-wrapper">');
                                    HTML.push('     <div id="DOPBSPCalendar-payment-address-shipping-'+fields[i]['id']+'-warning'+ID+'" class="dopbsp-warning-info DOPBSPCalendar-hidden">');
                                    HTML.push('         <a href="javascript:void(0)" class="dopbsp-icon"></a>');
                                    HTML.push('         <div class="dopbsp-message">'+methods_order.text[fields[i]['text']]+' '+(fields[i]['key'] === 'email' ? methods_form.text['invalidEmail']:methods_form.text['required'])+'</div>');
                                    HTML.push('     </div>');
                                    HTML.push('     <label for="DOPBSPCalendar-payment-address-shipping-'+fields[i]['id']+ID+'">'+methods_order.text[fields[i]['text']]+' <span class="dopbsp-required">*</span></label>');
                                    HTML.push('     <input type="text" name="DOPBSPCalendar-payment-address-shipping-'+fields[i]['id']+ID+'" id="DOPBSPCalendar-payment-address-shipping-'+fields[i]['id']+ID+'" value="" />');
                                    HTML.push(' </div>');
                            }
                        }
                        HTML.push('</div>');
                        
                        return HTML.join('');
                    },
                    init:function(){
                    /*
                     * Initialize shipping address.
                     */    
                        $('#DOPBSPCalendar-payment-address-shipping-country'+ID).DOPSelect();
                        methods_order.payment.address_shipping.events();
                    },
                    
                    set:function(){
                    /*
                     * Set shipping address form.
                     */
                        var fields = methods_order.vars.addressFields, 
                        i,
                        paymentGateways = methods_order.data['paymentGateways'],
                        paymentMethod = $('input[name=DOPBSPCalendar-payment'+ID+']:checked').val() === undefined ? 'none':$('input[name=DOPBSPCalendar-payment'+ID+']:checked').val(),
                        data = paymentMethod === 'none' || paymentMethod === 'default' ? methods_order.data['address_shipping']:paymentGateways[paymentMethod]['data']['address_shipping'],
                        useBilling = $('#DOPBSPCalendar-payment-address-shipping-copy'+ID).is(':checked');

                        $('#DOPBSPCalendar-payment-address-shipping'+ID).css('display', paymentMethod !== 'none' && data['enabled'] ? 'block':'none');
                          
                        if (paymentMethod === 'none'
                                || !data['enabled']){
                            return false;
                        }
                        
                        for (i=0; i<fields.length; i++){
                            $('#DOPBSPCalendar-payment-address-shipping-'+fields[i]['id']+'-wrapper'+ID).css('display', data[fields[i]['key']]['enabled'] && !useBilling ? 'block':'none');
                            $('#DOPBSPCalendar-payment-address-shipping-'+fields[i]['id']+'-wrapper'+ID+' .dopbsp-required').css('display', data[fields[i]['key']]['required'] ? 'inline-block':'none');
                        }
                    },
                    get:function(){
                    /*
                     * Get shipping address data.
                     * 
                     * @return shipping address data
                     */ 
                        var paymentGateways = methods_order.data['paymentGateways'],
                        paymentMethod = $('input[name=DOPBSPCalendar-payment'+ID+']:checked').val() === undefined ? 'none':$('input[name=DOPBSPCalendar-payment'+ID+']:checked').val(),
                        data = paymentMethod === 'none' || paymentMethod === 'default' ? methods_order.data['address_shipping']:paymentGateways[paymentMethod]['data']['address_shipping'],
                        useBilling = $('#DOPBSPCalendar-payment-address-shipping-copy'+ID).is(':checked');
 
                        if (!data['enabled']){
                            return '';
                        }
                        else if (useBilling){
                            return 'billing_address';
                        }
                        else{
                            return {"address_first": $('#DOPBSPCalendar-payment-address-shipping-address-first'+ID).val(),
                                    "address_second": $('#DOPBSPCalendar-payment-address-shipping-address-second'+ID).val(),
                                    "city": $('#DOPBSPCalendar-payment-address-shipping-city'+ID).val(),
                                    "company": $('#DOPBSPCalendar-payment-address-shipping-company'+ID).val(),
                                    "country": data['country']['enabled'] ? $('#DOPBSPCalendar-payment-address-shipping-country'+ID).val():'',
                                    "email": $('#DOPBSPCalendar-payment-address-shipping-email'+ID).val(),
                                    "first_name": $('#DOPBSPCalendar-payment-address-shipping-first-name'+ID).val(),
                                    "last_name": $('#DOPBSPCalendar-payment-address-shipping-last-name'+ID).val(),
                                    "phone": $('#DOPBSPCalendar-payment-address-shipping-phone'+ID).val(),
                                    "state": $('#DOPBSPCalendar-payment-address-shipping-state'+ID).val(),
                                    "zip_code": $('#DOPBSPCalendar-payment-address-shipping-zip-code'+ID).val()};
                        }
                    },
                    validate:function(){
                    /*
                     * Validate shipping address data.
                     * 
                     * @return true/false
                     */    
                        var fields = methods_order.vars.addressFields, 
                        i,
                        isValid = true,
                        paymentGateways = methods_order.data['paymentGateways'],
                        paymentMethod = $('input[name=DOPBSPCalendar-payment'+ID+']:checked').val() === undefined ? 'none':$('input[name=DOPBSPCalendar-payment'+ID+']:checked').val(),
                        data = paymentMethod === 'none' || paymentMethod === 'default' ? methods_order.data['address_shipping']:paymentGateways[paymentMethod]['data']['address_shipping'];
                        
                        if (!data['enabled']
                                || $('#DOPBSPCalendar-payment-address-shipping-copy'+ID).is(':checked')){
                            return true;
                        }
                        
                        for (i=0; i<fields.length; i++){
                            if ($('#DOPBSPCalendar-payment-address-shipping-'+fields[i]['id']+ID).val() === ''
                                    && data[fields[i]['key']]['enabled'] 
                                    && data[fields[i]['key']]['required']
                                    && (fields[i]['key'] === 'email'
                                                && !prototypes.validEmail($('#DOPBSPCalendar-payment-address-shipping-'+fields[i]['id']+ID).val())
                                                || fields[i]['key'] !== 'email')){
                                $('#DOPBSPCalendar-payment-address-shipping-'+fields[i]['id']+'-warning'+ID).css('display', 'block');
                                isValid = false;
                            }
                            else{
                                $('#DOPBSPCalendar-payment-address-shipping-'+fields[i]['id']+'-warning'+ID).css('display', 'none');
                            }
                        }

                        return isValid;
                    },
                    
                    events:function(){
                    /*
                     * Initialize shipping address events.
                     */     
                        var fields = methods_order.vars.addressFields, 
                        i,
                        paymentGateways = methods_order.data['paymentGateways'],
                        paymentMethod = $('input[name=DOPBSPCalendar-payment'+ID+']:checked').val() === undefined ? 'none':$('input[name=DOPBSPCalendar-payment'+ID+']:checked').val(),
                        data = paymentMethod === 'none' || paymentMethod === 'default' ? methods_order.data['address_shipping']:paymentGateways[paymentMethod]['data']['address_shipping'];
                
                        /*
                         * Use shipping address event.
                         */
                        $('#DOPBSPCalendar-payment-address-shipping-copy'+ID).unbind('click');
                        $('#DOPBSPCalendar-payment-address-shipping-copy'+ID).bind('click', function(){
                            methods_order.payment.address_shipping.set();
                        }); 
                        
                        /*
                         * Shipping address form fields events.
                         */
                        for (i=0; i<fields.length; i++){
                            switch (fields[i]['key']){
                                case 'country':
                                    break;
                                case 'email':
                                    if (data[fields[i]['key']]['enabled']){
                                        $('#DOPBSPCalendar-payment-address-shipping-'+fields[i]['id']+ID).unbind('input propertychange blur');
                                        $('#DOPBSPCalendar-payment-address-shipping-'+fields[i]['id']+ID).bind('input propertychange blur', function(){
                                            var paymentGateways = methods_order.data['paymentGateways'],
                                            paymentMethod = $('input[name=DOPBSPCalendar-payment'+ID+']:checked').val() === undefined ? 'none':$('input[name=DOPBSPCalendar-payment'+ID+']:checked').val(),
                                            data = paymentMethod === 'none' || paymentMethod === 'default' ? methods_order.data['address_shipping']:paymentGateways[paymentMethod]['data']['address_shipping'];
                                            
                                            $(this).parent().find('.dopbsp-warning-info').css('display', !prototypes.validEmail($(this).val()) && $(this).val() !== '' || data['email']['required'] && $(this).val() === ''  ? 'block':'none');
                                        });
                                    }
                                    break;
                                case 'phone':
                                    if (data[fields[i]['key']]['enabled']){
                                        $('#DOPBSPCalendar-payment-address-shipping-'+fields[i]['id']+ID).unbind('input propertychange blur');
                                        $('#DOPBSPCalendar-payment-address-shipping-'+fields[i]['id']+ID).bind('input propertychange blur', function(){
                                            prototypes.cleanInput($(this), '0123456789+-().');
                                        });
                                    }
                                    break;
                                default:
                                    if (data[fields[i]['key']]['enabled']
                                            && data[fields[i]['key']]['required']){
                                        $('#DOPBSPCalendar-payment-address-shipping-'+fields[i]['id']+ID).unbind('input propertychange blur');
                                        $('#DOPBSPCalendar-payment-address-shipping-'+fields[i]['id']+ID).bind('input propertychange blur', function(){
                                            $(this).parent().find('.dopbsp-warning-info').css('display', $(this).val() === '' ? 'block':'none');
                                        });
                                    }
                            }
                        }
                    }
                },
                card: {
                    display:function(){
                    /*
                     * Display card form.
                     * 
                     * @return card HTML
                     */
                        var HTML = new Array (),
                        i;

                        HTML.push('<div id="DOPBSPCalendar-payment-card'+ID+'" class="DOPBSPCalendar-hidden">');
                        HTML.push(' <h4 id="DOPBSPCalendar-payment-card-title'+ID+'"></h4>');

                        /*
                         * Card number.
                         */
                        HTML.push(' <div id="DOPBSPCalendar-payment-card-number-wrapper'+ID+'" class="dopbsp-input-wrapper">');
                        HTML.push('     <label id="DOPBSPCalendar-payment-card-number-label'+ID+'" for="DOPBSPCalendar-payment-card-number'+ID+'"></label>');
                        HTML.push('     <input type="text" name="DOPBSPCalendar-payment-card-number'+ID+'" id="DOPBSPCalendar-payment-card-number'+ID+'" value="" />');
                        HTML.push(' </div>');

                        /*
                         * Card security code.
                         */
                        HTML.push(' <div id="DOPBSPCalendar-payment-card-security-code-wrapper'+ID+'" class="dopbsp-input-wrapper">');
                        HTML.push('     <label id="DOPBSPCalendar-payment-card-security-code-label'+ID+'" for="DOPBSPCalendar-payment-card-security-code'+ID+'"></label>');
                        HTML.push('     <input type="text" name="DOPBSPCalendar-payment-card-security-code'+ID+'" id="DOPBSPCalendar-payment-card-security-code'+ID+'" class="dopbsp-small" value="" />');
                        HTML.push(' </div>');

                        /*
                         * Card expiration date.
                         */
                        HTML.push(' <div id="DOPBSPCalendar-payment-card-expiration-date-wrapper'+ID+'" class="dopbsp-input-wrapper">');
                        HTML.push('     <label id="DOPBSPCalendar-payment-card-expiration-date-label'+ID+'"></label>');
                        HTML.push('     <select name="DOPBSPCalendar-payment-card-expiration-date-month'+ID+'" id="DOPBSPCalendar-payment-card-expiration-date-month'+ID+'" class="dopbsp-small DOPBSPCalendar-left">');

                        for (i=1; i<=12; i++){
                            HTML.push('     <option value="'+prototypes.getLeadingZero(i)+'">'+prototypes.getLeadingZero(i)+' '+methods_months.text['shortNames'][i-1]+'</option>');
                        }
                        HTML.push('     </select>');
                        HTML.push('     <select name="DOPBSPCalendar-payment-card-expiration-date-year'+ID+'" id="DOPBSPCalendar-payment-card-expiration-date-year'+ID+'" class="dopbsp-small DOPBSPCalendar-left">');

                        for (i=methods_calendar.vars.todayYear; i<=methods_calendar.vars.todayYear+10; i++){
                            HTML.push('     <option value="'+i+'">'+i+'</option>');
                        }
                        HTML.push('     </select>');
                        HTML.push('     <br class="DOPBSPCalendar-clear" />');
                        HTML.push(' </div>');

                        /*
                         * Card name.
                         */
                        HTML.push(' <div id="DOPBSPCalendar-payment-card-name-wrapper'+ID+'" class="dopbsp-input-wrapper">');
                        HTML.push('     <label id="DOPBSPCalendar-payment-card-name-label'+ID+'" for="DOPBSPCalendar-payment-card-name'+ID+'"></label>');
                        HTML.push('     <input type="text" name="DOPBSPCalendar-payment-card-name'+ID+'" id="DOPBSPCalendar-payment-card-name'+ID+'" value="" />');
                        HTML.push(' </div>');
                        HTML.push('</div>');

                        return HTML.join('');
                    },
                    init:function(){
                    /*
                     * Initialize card.
                     */     
                        methods_order.payment.card.events();
                    },

                    set:function(){
                    /*
                     * Set card data for the selected payment method.
                     */    
                        var paymentGateways = methods_order.data['paymentGateways'],
                        paymentMethod = $('input[name=DOPBSPCalendar-payment'+ID+']:checked').val() === undefined ? 'none':$('input[name=DOPBSPCalendar-payment'+ID+']:checked').val();

                        if (paymentMethod !== 'none'
                                && paymentMethod !== 'default'
                                && paymentGateways[paymentMethod]['data']['card']['enabled']){
                            $('#DOPBSPCalendar-payment-card'+ID).removeClass('DOPBSPCalendar-hidden');

                            /*
                             * Set card title.
                             */
                            $('#DOPBSPCalendar-payment-card-title'+ID).html(paymentGateways[paymentMethod]['text']['card_title']);

                            /*
                             * Set card number.
                             */
                            $('#DOPBSPCalendar-payment-card-number-label'+ID).html(paymentGateways[paymentMethod]['text']['card_number']);

                            paymentGateways[paymentMethod]['data']['card']['number']['attribute'] !== '' ? $('#DOPBSPCalendar-payment-card-number'+ID).attr(paymentGateways[paymentMethod]['data']['card']['number']['attribute'],
                                                                                                                                                            paymentGateways[paymentMethod]['data']['card']['number']['value']):'';

                            /*
                             * Set card security code.
                             */
                            $('#DOPBSPCalendar-payment-card-security-code-label'+ID).html(paymentGateways[paymentMethod]['text']['card_security_code']);
                            paymentGateways[paymentMethod]['data']['card']['security_code']['attribute'] !== '' ? $('#DOPBSPCalendar-payment-card-security-code'+ID).attr(paymentGateways[paymentMethod]['data']['card']['security_code']['attribute'],
                                                                                                                                                                          paymentGateways[paymentMethod]['data']['card']['security_code']['value']):'';

                            /*
                             * Set card expiration date.
                             */
                            $('#DOPBSPCalendar-payment-card-expiration-date-label'+ID).html(paymentGateways[paymentMethod]['text']['card_expiration_date']);
                            paymentGateways[paymentMethod]['data']['card']['expiration_date_month']['attribute'] !== '' ? $('#DOPBSPCalendar-payment-card-expiration-date-month'+ID).attr(paymentGateways[paymentMethod]['data']['card']['expiration_date_month']['attribute'],
                                                                                                                                                                                          paymentGateways[paymentMethod]['data']['card']['expiration_date_month']['value']):'';
                            paymentGateways[paymentMethod]['data']['card']['expiration_date_year']['attribute'] !== '' ? $('#DOPBSPCalendar-payment-card-expiration-date-year'+ID).attr(paymentGateways[paymentMethod]['data']['card']['expiration_date_year']['attribute'],
                                                                                                                                                                                        paymentGateways[paymentMethod]['data']['card']['expiration_date_year']['value']):'';

                            /*
                             * Set card name.
                             */
                            paymentGateways[paymentMethod]['data']['card']['name']['enabled'] ? $('#DOPBSPCalendar-payment-card-name-wrapper'+ID).removeClass('DOPBSPCalendar-hidden'):$('#DOPBSPCalendar-payment-card-name-wrapper'+ID).addClass('DOPBSPCalendar-hidden');
                            $('#DOPBSPCalendar-payment-card-name-label'+ID).html(paymentGateways[paymentMethod]['text']['card_name']);
                            paymentGateways[paymentMethod]['data']['card']['name']['attribute'] !== '' ? $('#DOPBSPCalendar-payment-card-name'+ID).attr(paymentGateways[paymentMethod]['data']['card']['name']['attribute'],
                                                                                                                                                        paymentGateways[paymentMethod]['data']['card']['name']['value']):'';
                        }
                        else{
                            $('#DOPBSPCalendar-payment-card'+ID).addClass('DOPBSPCalendar-hidden');

                            $('#DOPBSPCalendar-payment-card-title'+ID).html('');
                            $('#DOPBSPCalendar-payment-card-number-label'+ID).html('');
                            $('#DOPBSPCalendar-payment-card-security-code-label'+ID).html('');
                            $('#DOPBSPCalendar-payment-card-expiration-date-label'+ID).html('');
                            $('#DOPBSPCalendar-payment-card-name-label'+ID).html('');
                        }
                    },
                    get:function(){
                    /*
                     * Get card data.
                     */ 
                        return {"expiration_date_month": $('#DOPBSPCalendar-payment-card-expiration-date-month'+ID).val(),
                                "expiration_date_year": $('#DOPBSPCalendar-payment-card-expiration-date-year'+ID).val(),
                                "name": $('#DOPBSPCalendar-payment-card-name'+ID).val(),
                                "number": $('#DOPBSPCalendar-payment-card-number'+ID).val(),
                                "security_code": $('#DOPBSPCalendar-payment-card-security-code'+ID).val()};
                    },

                    events:function(){
                    /*
                     * Initialize card events.
                     */    
                        /*
                         * Allow only numbers for credit card number.
                         */
                        $('#DOPBSPCalendar-payment-card-number'+ID).unbind('input propertychange blur');
                        $('#DOPBSPCalendar-payment-card-number'+ID).bind('input propertychange blur', function(){
                            prototypes.cleanInput($(this), '0123456789');
                        });

                        /*
                         * Allow only numbers for credit card security code.
                         */
                        $('#DOPBSPCalendar-payment-card-security-code'+ID).unbind('input propertychange blur');
                        $('#DOPBSPCalendar-payment-card-security-code'+ID).bind('input propertychange blur', function(){
                            prototypes.cleanInput($(this), '0123456789');
                        });
                    }
                },
                form_addon: {
                    display:function(){
                    /*
                     * Display shipping address form.
                     */
                        var HTML = new Array(),
                        i,
                        options = new Array(),
                        paymentGateways = methods_order.data['paymentGateways'],
                        paymentMethod = $('input[name=DOPBSPCalendar-payment'+ID+']:checked').val() === undefined ? 'none':$('input[name=DOPBSPCalendar-payment'+ID+']:checked').val(),
                        data = paymentMethod === 'none' || paymentMethod === 'default' ? new Array():paymentGateways[paymentMethod]['data']['form_addon'];

                        $('#DOPBSPCalendar-payment-form-addon'+ID).html('');
                          
                        if (data.length === 0){
                            return false;
                        }
                        
                        for (var id in data){
                            switch (data[id]['type']){
                                case 'select':
                                    HTML.push(' <div id="DOPBSPCalendar-payment-form-addon-wrapper'+ID+'-'+id+'" class="dopbsp-input-wrapper '+data[id]['classes']+'">');
                                    HTML.push('     <label for="DOPBSPCalendar-payment-form-addon'+ID+'-'+id+'">'+data[id]['label']+'</label>');
                                    HTML.push('     <select type="text" name="DOPBSPCalendar-payment-form-addon'+ID+'-'+id+'" id="DOPBSPCalendar-payment-form-addon'+ID+'-'+id+'" onchange="'+data[id]['function']+'">');
                                    
                                    options = data[id]['options'];
                                    
                                    for (i=0; i<options.length; i++){
                                        HTML.push('     <option value="'+options[i]['value']+'">'+options[i]['label']+'</label>');
                                    }
                                    HTML.push('     </select>');
                                    HTML.push(' </div>');
                                    break;
                                case 'text':
                                    HTML.push(' <div id="DOPBSPCalendar-payment-form-addon-wrapper'+ID+'-'+id+'" class="dopbsp-input-wrapper '+data[id]['classes']+'">');
                                    HTML.push('     <label for="DOPBSPCalendar-payment-form-addon'+ID+'-'+id+'">'+data[id]['label']+'</label>');
                                    HTML.push('     <input type="text" name="DOPBSPCalendar-payment-form-addon'+ID+'-'+id+'" id="DOPBSPCalendar-payment-form-addon'+ID+'-'+id+'" value="" />');
                                    HTML.push(' </div>');
                                    break;
                                case 'title':
                                    HTML.push(' <h4>'+data[id]['label']+'</h4>');
                                    break;
                                    
                            }
                        }
                        
                        $('#DOPBSPCalendar-payment-form-addon'+ID).html(HTML.join(''));
                        
                        methods_order.payment.form_addon.init();
                    },
                    init:function(){
                        var paymentGateways = methods_order.data['paymentGateways'],
                        paymentMethod = $('input[name=DOPBSPCalendar-payment'+ID+']:checked').val() === undefined ? 'none':$('input[name=DOPBSPCalendar-payment'+ID+']:checked').val(),
                        data = paymentMethod === 'none' || paymentMethod === 'default' ? new Array():paymentGateways[paymentMethod]['data']['form_addon'];
                          
                        if (data.length === 0){
                            return false;
                        }
                        
                        for (var id in data){
                            $('#DOPBSPCalendar-payment-form-addon'+ID+'-'+id).val();
                            switch (data[id]['type']){
                                case 'select':
                                    $('#DOPBSPCalendar-payment-form-addon'+ID+'-'+id).DOPSelect();
                                    break;
                            }
                        }
                    },
                    
                    get:function(){
                        var paymentGateways = methods_order.data['paymentGateways'],
                        paymentMethod = $('input[name=DOPBSPCalendar-payment'+ID+']:checked').val() === undefined ? 'none':$('input[name=DOPBSPCalendar-payment'+ID+']:checked').val(),
                        data = paymentMethod === 'none' || paymentMethod === 'default' ? new Array():paymentGateways[paymentMethod]['data']['form_addon'],
                        returnData = {};
                          
                        if (data.length === 0){
                            return false;
                        }
                        
                        for (var id in data){
                            returnData[id] = $('#DOPBSPCalendar-payment-form-addon'+ID+'-'+id).val();
                        }
                        
                        return returnData;
                    }
                }
            },
            
            book:function(){
            /*
             * Book a reservation.
             */    
                var isValid = true,
                paymentGateways = methods_order.data['paymentGateways'],
                paymentMethod = $('input[name=DOPBSPCalendar-payment'+ID+']:checked').val() === undefined ? 'none':$('input[name=DOPBSPCalendar-payment'+ID+']:checked').val();
                
                /*
                 * Stop if form, billing & shipping address or order are not valid.
                 */
                !methods_form.validate() ? (isValid = false):'';
                !methods_order.payment.address_billing.validate() ? (isValid = false):'';
                !methods_order.payment.address_shipping.validate() ? (isValid = false):'';
                !methods_order.validate() ? (isValid = false):'';
                
                if (!isValid){
                    return false;
                }
                
                methods_order.toggleMessages('', 'none');
                $('#DOPBSPCalendar-submit'+ID).css('display', 'none');
                $('#DOPBSPCalendar-submit-loader'+ID).css('display', 'block');
                
                /*
                 * Create payment token for different payment methods.
                 */
                if (paymentMethod !== 'none'
                        && paymentMethod !== 'default'
                        && paymentGateways[paymentMethod]['data']['token']['enabled']){
                    if ($('#DOPBSPCalendar-payment-token'+ID).val() === ''){
                        methods_order.payment.token(paymentMethod);
                        
                        return false;
                    }
                    else{
                        methods_order.vars.tokenInit = false;
                    }
                    
                    if ($('#DOPBSPCalendar-payment-token-message'+ID).val() !== ''){
                        methods_order.toggleMessages($('#DOPBSPCalendar-payment-token-message'+ID).val(),
                                                     'block');
                        $('#DOPBSPCalendar-payment-token'+ID).val('');
                        $('#DOPBSPCalendar-payment-token-message'+ID).val('');
                        
                        $('#DOPBSPCalendar-submit'+ID).css('display', 'block');
                        $('#DOPBSPCalendar-submit-loader'+ID).css('display', 'none');
                        
                        return false;
                    }
                }
                
                $.post(ajaxURL, {action: 'dopbsp_reservations_book',
                                 dopbsp_frontend_ajax_request: true,
                                 calendar_id: ID,
                                 language: methods_calendar.data['language'],
                                 currency: methods_currency.data['sign'],
                                 currency_code: methods_currency.data['code'],
                                 cart_data: methods_cart.cart,
                                 form: methods_form.get(),
                                 address_billing_data: methods_order.payment.address_billing.get(),
                                 address_shipping_data: methods_order.payment.address_shipping.get(),
                                 payment_method: paymentMethod,
                                 form_addon_data: methods_order.payment.form_addon.get(),
                                 card_data: methods_order.payment.card.get(),
                                 token: $('#DOPBSPCalendar-payment-token'+ID).val(),
                                 page_url: window.location.href}, function(data){  
                    data = $.trim(data);
                    
                    $('#DOPBSPCalendar-payment-token'+ID).val('');
                    $('#DOPBSPCalendar-payment-token-message'+ID).val('');
                    
                    /*
                     * If period is unavailable reload schedule.
                     */
                    if (data === 'unavailable'){
                        methods_info.toggleMessages(methods_order.text['unavailable'],
                                                    'dopbsp-error');
                        methods_reservation.clear();
                        methods_schedule.reset();
                        
                        return false;
                    }
                    
                    /*
                     * If coupon is unavailable remove it from reservation.
                     */
                    if (data === 'unavailable-coupon'){
                        methods_info.toggleMessages(methods_order.text['unavailableCoupon'],
                                                    'dopbsp-error');
                        methods_coupons.vars.use = false;
                        methods_reservation.set();
                        
                        return false;
                    }
                    
                    if (paymentMethod !== 'none'
                            && paymentMethod !== 'default'){
                        var response = data.split(';;;;;');

                        if (response[0] === 'success'){
                            $('#DOPBSPCalendar-submit'+ID).css('display', 'block');
                            $('#DOPBSPCalendar-submit-loader'+ID).css('display', 'none');

                            methods_info.toggleMessages(paymentGateways[paymentMethod]['text']['success'],
                                                        'dopbsp-success');
                            methods_reservation.clear();
                            methods_schedule.reset();
                        }
                        else if (response[0] === 'success_redirect'){
                            window.location.href = response[1];
                        }
                        else{
                            $('#DOPBSPCalendar-submit'+ID).css('display', 'block');
                            $('#DOPBSPCalendar-submit-loader'+ID).css('display', 'none');
                            
                            methods_info.toggleMessages(data);
                            
                            return false;
                        }
                    }
                    else{
                        if (methods_order.data['redirect'] !== null
                                && methods_order.data['redirect'] !== ''){
                            window.location.href = methods_order.data['redirect'];
                        }
                        
                        $('#DOPBSPCalendar-submit'+ID).css('display', 'block');
                        $('#DOPBSPCalendar-submit-loader'+ID).css('display', 'none');
                        
                        methods_info.toggleMessages((methods_order.data['paymentArrivalWithApproval'] ? methods_order.text['paymentArrivalWithApprovalSuccess']:methods_order.text['paymentArrivalSuccess']),
                                                    'dopbsp-success');
                        methods_reservation.clear();
                        
                        /*
                         * Reload schedule if it has been changed after the reservation was made.
                         */
                        if (methods_order.data['paymentArrivalWithApproval']){
                            methods_schedule.reset();
                        }
                        else{
                            methods_calendar.display();
                            methods_components.init();
                        }
                    }
                });
            },
            
            toggleMessages:function(message,
                                    display,
                                    type){
            /*
             * Toggle order messages.
             * 
             * @param message (String): the message to be displayed
             * @param display (String): CSS display value
             *                          "block" display message
             *                          "none" hide message
             * @param type (String): message type
             *                       "dopbsp-error" error message
             *                       "dopbsp-success" success message
             */                            
                display = display === undefined ? 'block':display;
                type = type === undefined ? 'dopbsp-error':type;
                
                $('#DOPBSPCalendar-order'+ID+' .dopbsp-message').html(message)
                                                                .removeClass('dopbsp-success')
                                                                .removeClass('dopbsp-error')
                                                                .addClass(type)
                                                                .css('display', display);
            }
        },  

// 24. WooCommerce
        
        methods_woocommerce = {
            data: {},
            text: {},
            
            display:function(){
            /*
             * Display WooCommerce reservation info area.
             * 
             * @return order HTML
             */
                var HTML = new Array(),
                parent = $('#booking').parent();
        
                HTML.push('<span id="dopbsp-wc-booking-reservation">'+methods_woocommerce.text['none']+'</span>');
                HTML.push('<input type="hidden" id="dopbsp-wc-booking-reservation-variation" name="dopbsp-wc-booking-reservation-variation" value="" />');
                HTML.push('<input type="hidden" id="dopbsp-wc-booking-reservation-price" name="dopbsp-wc-booking-reservation-price" value="" />');
                
                $(parent).append(HTML.join(''));
                
                methods_woocommerce.init();
            },
            init:function(){
            /*
             * Initialize WooCommerce variation field.s
             */    
                $('#booking option').removeAttr('selected');
                $('#booking option[value=""]').attr('selected', 'seleted');
                $('#booking').change();
                
                methods_woocommerce.events();
            },
            events:function(){
            /*
             * WooCommerce variations events.
             */    
                $('.variations_form .variations .value select').unbind('change');
                $('.variations_form .variations .value select').bind('change', function(){
                    var variation = $('#dopbsp-wc-booking-reservation-variation').val(),
                    variationsSelected = true;

                    if (variation === ''){
                        if (methods_woocommerce.data['add_to_cart']){
                            $('#DOPBSPCalendar-add-to-cart'+ID).css('display', 'none');
                        }
                        return false;
                    }
                    
                    if ($('#booking option[value="reservation-'+variation+'"]').html() === undefined){
                        $('#booking').append('<option value="reservation-'+variation+'" class="active">Reservation '+variation+'</option>');
                    }
                    $('#booking option').removeAttr('selected');
                    $('#booking option[value="reservation-'+variation+'"]').attr('selected', 'selected');
                    
                    setTimeout(function(){
                        $('input[name="variation_id"]').val(variation);
                        $('.variations_form .single_variation_wrap .single_variation .price .amount').html($('#dopbsp-wc-booking-reservation-price').val());
                        
                        $('.variations_form .variations .value select').each(function(){
                            variationsSelected = $(this).val() === '' ? false:variationsSelected;
                        });
                        
                        if (methods_woocommerce.data['add_to_cart']
                                && variationsSelected){
                            $('.variations_form button[type="submit"]').css('display', 'none');
                            $('.variations_form input[type="submit"]').css('display', 'none');
                            $('#DOPBSPCalendar-add-to-cart'+ID).css('display', 'block');
                            
                            if ($('#DOPBSPCalendar-add-to-cart'+ID).offset().top+$('#DOPBSPCalendar-add-to-cart'+ID).height() > $(document).scrollTop()+$(window).height()){
                                prototypes.scrollToY($('#DOPBSPCalendar-add-to-cart'+ID).offset().top+$('#DOPBSPCalendar-add-to-cart'+ID).height()-$(window).height()+100);
                            }
                        }
                        else{
                            $('#DOPBSPCalendar-add-to-cart'+ID).css('display', 'none');
                        }
                    }, 10);
                });
            },
            
            set:function(){
            /*
             * Set WooCommerce variation for current reservation.
             */
                var attributes = {},
                product = {},
                variations = new Array();
        
                $('#dopbsp-wc-booking-reservation').addClass('dopbsp-loader')
                                                   .html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
                
                $.post(ajaxURL, {action: 'dopbsp_woocommerce_variation_add',
                                 dopbsp_frontend_ajax_request: true,
                                 calendar_id: ID,
                                 language: methods_calendar.data['language'],
                                 currency: methods_currency.data['sign'],
                                 currency_code: methods_currency.data['code'],
                                 cart_data: methods_cart.cart,
                                 product_id: methods_woocommerce.data['product_id']}, function(data){
                    data = $.trim(data);
                    
                    /*
                     * If period is unavailable reload schedule.
                     */
                    if (data === 'unavailable'){
                        $('#dopbsp-wc-booking-reservation').removeClass('dopbsp-loader');
                        methods_info.toggleMessages(methods_order.text['unavailable'],
                                                    'dopbsp-error');
                        methods_reservation.clear();
                        methods_schedule.reset();
                        
                        return false;
                    }
                    
                    /*
                     * Create product.
                     */
                    $('.variations_form .variations .value select').each(function(){
                        var name = $(this).attr('name');
                        attributes[name] = (name === 'attribute_booking' ? 'reservation-'+data:'');
                    });
                    
                    product = {"attributes": attributes,
                               "availability_html": "",
                               "backorders_allowed": false,
                               "dimensions": "",
                               "image_alt": "",
                               "image_link": "",
                               "image_src": "",
                               "image_title": "",
                               "is_downloadable": false,
                               "is_in_stock": true,
                               "is_purchasable": true,
                               "is_sold_individually": "yes",
                               "is_virtual": true,
                               "max_qty": 1,
                               "min_qty": 1,
                               "price_html": methods_price.set(methods_cart.cart[0]['price_total']),
                               "sku": "",
                               "variation_is_visible": true,
                               "variation_id": parseInt(data),
                               "weight": " kg"};
                           
                    variations = $('.variations_form').data('product_variations');
                    variations.push(product);
                    $('.variations_form').data('product_variations', variations);
                    
                    $('#dopbsp-wc-booking-reservation').removeClass('dopbsp-loader')
                                                       .html('Reservation '+data);
                    $('#dopbsp-wc-booking-reservation-variation').val(data);
                    $('#dopbsp-wc-booking-reservation-price').val(methods_price.set(methods_cart.cart[0]['price_total']));
                    
                    $('#booking').change();
                });
            }
        },

// ***************************************************************************** Prototypes
        
// 25. Prototypes

        prototypes = {
// Actions                  
            doHiddenBuster:function(item){
            /*
             * Make all parents & current item visible.
             * 
             * @param item (element): item for which all parens are going to be made visible
             * 
             * @return list of parents
             */
                var parent = item.parent(),
                items = new Array();

                if (item.prop('tagName') !== undefined 
                        && item.prop('tagName').toLowerCase() !== 'body'){
                    items = prototypes.doHiddenBuster(parent);
                }

                if (item.css('display') === 'none'){
                    item.css('display', 'block');
                    items.push(item);
                }

                return items;
            },
            undoHiddenBuster:function(items){
            /*
             * Hide all items from list. The list is returned by function doHiddenBuster().
             * 
             * @param items (Array): list of items to be hidden
             */    
                var i;

                for (i=0; i<items.length; i++){
                    items[i].css('display', 'none');
                }
            },
            openLink:function(url,
                              target){
            /*
             * Open a link.
             * 
             * @param url (String): link URL
             * @param target (String): link target (_blank, _parent, _self, _top)
             */
                switch (target.toLowerCase()){
                    case '_blank':
                        window.open(url);
                        break;
                    case '_parent':
                        parent.location.href = url;
                        break;
                    case '_top':
                        top.location.href = url;
                        break;
                    default:    
                        window.location = url;
                }
            },
            randomizeArray:function(theArray){
            /*
             * Randomize the items of an array.
             * 
             * @param theArray (Array): the array to be mixed
             * 
             * return array with mixed items
             */
                theArray.sort(function(){
                    return 0.5-Math.random();
                });
                return theArray;
            },
            scrollToY:function(position,
                               speed){
            /*
             * Scroll vertically to position.
             * 
             * @param position (Number): position to scroll to
             * @param speed (Number): scroll speed 
             */  
                speed = speed !== undefined ? speed: 300;

                $('html').stop(true, true)
                         .animate({'scrollTop': position}, 
                                  speed);
                $('body').stop(true, true)
                         .animate({'scrollTop': position}, 
                                  speed);
            },
            touchNavigation:function(parent,
                                     child){
            /*
             * One finger navigation for touchscreen devices.
             * 
             * @param parent (element): parent item
             * @param child (element): child item
             */
                var prevX, 
                prevY, 
                currX, 
                currY, 
                touch, 
                childX, 
                childY;

                parent.bind('touchstart', function(e){
                    touch = e.originalEvent.touches[0];
                    prevX = touch.clientX;
                    prevY = touch.clientY;
                });

                parent.bind('touchmove', function(e){                                
                    touch = e.originalEvent.touches[0];
                    currX = touch.clientX;
                    currY = touch.clientY;
                    childX = currX>prevX ? parseInt(child.css('margin-left'))+(currX-prevX):parseInt(child.css('margin-left'))-(prevX-currX);
                    childY = currY>prevY ? parseInt(child.css('margin-top'))+(currY-prevY):parseInt(child.css('margin-top'))-(prevY-currY);

                    if (childX < (-1)*(child.width()-parent.width())){
                        childX = (-1)*(child.width()-parent.width());
                    }
                    else if (childX > 0){
                        childX = 0;
                    }
                    else{                                    
                        e.preventDefault();
                    }

                    if (childY < (-1)*(child.height()-parent.height())){
                        childY = (-1)*(child.height()-parent.height());
                    }
                    else if (childY > 0){
                        childY = 0;
                    }
                    else{                                    
                        e.preventDefault();
                    }

                    prevX = currX;
                    prevY = currY;

                    if (parent.width() < child.width()){
                        child.css('margin-left', childX);
                    }

                    if (parent.height() < child.height()){
                        child.css('margin-top', childY);
                    }
                });

                parent.bind('touchend', function(e){
                    if (!prototypes.isChromeMobileBrowser()){
                        e.preventDefault();
                    }
                });
            },

// Browsers & devices
            isAndroid:function(){
            /*
             * Check if operating system is Android.
             * 
             * @return true/false
             */
                var isAndroid = false,
                agent = navigator.userAgent.toLowerCase();

                if (agent.indexOf('android') !== -1){
                    isAndroid = true;
                }
                return isAndroid;
            },
            isChromeMobileBrowser:function(){
            /*
             * Check if browser is Chrome on mobile..
             * 
             * @return true/false
             */
                var isChromeMobile = false,
                agent = navigator.userAgent.toLowerCase();

                if ((agent.indexOf('chrome') !== -1 
                                || agent.indexOf('crios') !== -1) 
                        && prototypes.isTouchDevice()){
                    isChromeMobile = true;
                }
                return isChromeMobile;
            },
            isIE8Browser:function(){
            /*
             * Check if browser is IE8.
             * 
             * @return true/false
             */
                var isIE8 = false,
                agent = navigator.userAgent.toLowerCase();

                if (agent.indexOf('msie 8') !== -1){
                    isIE8 = true;
                }
                return isIE8;
            },
            isIEBrowser:function(){
            /*
             * Check if browser is IE..
             * 
             * @return true/false
             */
                var isIE = false,
                agent = navigator.userAgent.toLowerCase();

                if (agent.indexOf('msie') !== -1){
                    isIE = true;
                }
                return isIE;
            },
            isTouchDevice:function(){
            /*
             * Detect touchscreen devices.
             * 
             * @return true/false
             */
                var os = navigator.platform;

                if (os.toLowerCase().indexOf('win') !== -1){
                    return window.navigator.msMaxTouchPoints;
                }
                else {
                    return 'ontouchstart' in document;
                }
            },

// Cookies
            deleteCookie:function(name,
                                  path,
                                  domain){
            /*
             * Delete cookie.
             * 
             * @param name (String): cookie name
             * @param path (String): cookie path
             * @param domain (String): cookie domain
             */
                if (prototypes.getCookie(name)){
                    document.cookie = name+'='+((path) ? ';path='+path:'')+((domain) ? ';domain='+domain:'')+';expires=Thu, 01-Jan-1970 00:00:01 GMT';
                }
            },
            getCookie:function(name){
            /*
             * Get cookie.
             * 
             * @param name (String): cookie name
             */    
                var namePiece = name+"=",
                cookie = document.cookie.split(";"),
                i;

                for (i=0; i<cookie.length; i++){
                    var cookiePiece = cookie[i];

                    while (cookiePiece.charAt(0) === ' '){
                        cookiePiece = cookiePiece.substring(1, cookiePiece.length);            
                    } 

                    if (cookiePiece.indexOf(namePiece) === 0){
                        return unescape(cookiePiece.substring(namePiece.length, cookiePiece.length));
                    } 
                }
                return null;
            },
            setCookie:function(name,
                               value,
                               expire){
            /*
             * Set cookie.
             * 
             * @param name (String): cookie name
             * @param value (String): cookie value
             * @param expire (String): the number of days after which the cookie will expire
             */
                var expirationDate = new Date();

                expirationDate.setDate(expirationDate.getDate()+expire);
                document.cookie = name+'='+escape(value)+((expire === null) ? '': ';expires='+expirationDate.toUTCString())+';javahere=yes;path=/';
            },

// Date & time          
            getAMPM:function(time){
            /*
             * Converts time to AM/PM format.
             *
             * @param time (String): the time that will be converted (HH:MM)
             *
             * @return time to AM/PM format
             */
                var hour = parseInt(time.split(':')[0], 10),
                minutes = time.split(':')[1],
                result = '';

                if (hour === 0){
                    result = '12';
                }
                else if (hour > 12){
                    result = prototypes.getLeadingZero(hour-12);
                }
                else{
                    result = prototypes.getLeadingZero(hour);
                }

                result += ':'+minutes+' '+(hour < 12 ? 'AM':'PM');

                return result;
            },
            getDatesDifference:function(date1,
                                        date2,
                                        type,
                                        valueType,
                                        noDecimals){
            /*
             * Returns difference between 2 dates.
             * 
             * @param date1 (Date): first date (YYYY-MM-DD)
             * @param date2 (Date): second date (YYYY-MM-DD)
             * @param type (String): diference type
             *                       "seconds"
             *                       "minutes"
             *                       "hours"
             *                       "days"
             * @param valueType (String): type of number returned
             *                            "float"
             *                            "integer"
             * @param noDecimals (Number): number of decimals returned with the float value (-1 to display all decimals)
             * 
             * @return dates diference
             */
                var y1 = date1.split('-')[0],
                m1 = date1.split('-')[1],
                d1 = date1.split('-')[2],
                y2 = date2.split('-')[0],
                m2 = date2.split('-')[1],
                d2 = date2.split('-')[2],
                time1 = (new Date(y1, m1-1, d1)).getTime(),
                time2 = (new Date(y2, m2-1, d2)).getTime(),
                diff = Math.abs(time1-time2);
        
                if (type === undefined){
                    type = 'seconds';
                }
                
                if (valueType === undefined){
                    valueType = 'float';
                }
                
                if (noDecimals === undefined){
                    noDecimals = -1;
                }
                
                switch (type){
                    case 'days':
                        diff = diff/(1000*60*60*24);
                        break;
                    case 'hours':
                        diff = diff/(1000*60*60);
                        break;
                    case 'minutes':
                        diff = diff/(1000*60);
                        break;
                    default:
                        diff = diff/(1000);
                }
                
                if (valueType === 'float'){
                    return noDecimals === -1 ? diff:prototypes.getWithDecimals(diff, noDecimals);
                }
                else{
                    return Math.ceil(diff);
                }
            },
            getHoursDifference:function(hour1,
                                        hour2,
                                        type,
                                        valueType,
                                        noDecimals){
            /*
             * Returns difference between 2 hours.
             * 
             * @param hour1 (Date): first hour (HH:MM, HH:MM:SS)
             * @param hour2 (Date): second hour (HH:MM, HH:MM:SS)
             * @param type (String): diference type
             *                       "seconds"
             *                       "minutes"
             *                       "hours"
             * @param valueType (String): type of number returned
             *                            "float"
             *                            "integer"
             * @param noDecimals (Number): number of decimals returned with the float value (-1 to display all decimals)
             * 
             * @return hours difference
             */
                var hours1 = parseInt(hour1.split(':')[0], 10),
                minutes1 = parseInt(hour1.split(':')[1], 10),
                seconds1 = hour1.split(':')[2] !== undefined ? parseInt(hour1.split(':')[2], 10):0,
                hours2 = parseInt(hour2.split(':')[0], 10),
                minutes2 = parseInt(hour2.split(':')[1], 10),
                seconds2 = hour2.split(':')[2] !== undefined ? parseInt(hour2.split(':')[2], 10):0,
                time1,
                time2,
                diff;
        
                if (type === undefined){
                    type = 'seconds';
                }
                
                if (valueType === undefined){
                    valueType = 'float';
                }
                
                if (noDecimals === undefined){
                    noDecimals = -1;
                }
                
                switch (type){
                    case 'hours':
                        time1 = hours1+minutes1/60+seconds1/60/60;
                        time2 = hours2+minutes2/60+seconds2/60/60;
                        break;
                    case 'minutes':
                        time1 = hours1*60+minutes1+seconds1/60;
                        time2 = hours2*60+minutes2+seconds2/60;
                        break;
                    default:
                        time1 = hours1*60*60+minutes1*60+seconds1;
                        time2 = hours2*60*60+minutes2*60+seconds2;
                }
                
                diff = Math.abs(time1-time2);
                
                if (valueType === 'float'){
                    return noDecimals === -1 ? diff:prototypes.getWithDecimals(diff, noDecimals);
                }
                else{
                    return Math.ceil(diff);
                }
            },
            getNextDay:function(date){
            /*
             * Returns next day.
             * 
             * @param date (Date): current date (YYYY-MM-DD)
             * 
             * @return next day (YYYY-MM-DD)
             */
                var nextDay = new Date(),
                parts = date.split('-');

                nextDay.setFullYear(parts[0], parts[1], parts[2]);
                nextDay.setTime(nextDay.getTime()+86400000);

                return nextDay.getFullYear()+'-'+prototypes.getLeadingZero(nextDay.getMonth())+'-'+prototypes.getLeadingZero(nextDay.getDate());
            },
            getNoDays:function(date1,
                               date2){
            /*
             * Returns number of days between 2 dates.
             * 
             * @param date1 (Date): first date (YYYY-MM-DD)
             * @param date2 (Date): second date (YYYY-MM-DD)
             * 
             * @return number of days
             */
                var y1 = date1.split('-')[0],
                m1 = date1.split('-')[1],
                d1 = date1.split('-')[2],
                y2 = date2.split('-')[0],
                m2 = date2.split('-')[1],
                d2 = date2.split('-')[2],
                time1 = (new Date(y1, m1-1, d1)).getTime(),
                time2 = (new Date(y2, m2-1, d2)).getTime(),
                diff = Math.abs(time1-time2);
        
                return Math.round(diff/(1000*60*60*24))+1;
            },
            getNoMonths:function(date1,
                                 date2){
            /*
             * Returns the number of months between 2 dates.
             * 
             * @param date1 (Date): first date (YYYY-MM-DD)
             * @param date2 (Date): second date (YYYY-MM-DD)
             * 
             * @return the number of months 
             */
                var firstMonth,
                lastMonth,
                m,
                month1,
                month2,
                noMonths = 0,
                y,
                year1,
                year2;
        
                date1 = date1 <= date2 ? date1:date2;
                month1 = parseInt(date1.split('-')[1], 10);
                year1 = parseInt(date1.split('-')[0], 10);
                month2 = parseInt(date2.split('-')[1], 10);
                year2 = parseInt(date2.split('-')[0], 10);
                
                for (y=year1; y<=year2; y++){
                    firstMonth = y === year1 ? month1:1;
                    lastMonth = y === year2 ? month2:12;

                    for (m=firstMonth; m<=lastMonth; m++){
                        noMonths++;
                    }
                }
                
                return noMonths;
            },
            getPrevDay:function(date){
            /*
             * Returns previous day.
             * 
             * @param date (Date): current date (YYYY-MM-DD)
             * 
             * @return previous day (YYYY-MM-DD)
             */
                var previousDay = new Date(),
                parts = date.split('-');

                previousDay.setFullYear(parts[0],
                                        parseInt(parts[1])-1, 
                                        parts[2]);
                previousDay.setTime(previousDay.getTime()-86400000);

                return previousDay.getFullYear()+'-'+prototypes.getLeadingZero(previousDay.getMonth()+1)+'-'+prototypes.getLeadingZero(previousDay.getDate());                        
            },
            getPrevTime:function(time,
                                 diff,
                                 diffBy){
            /*
             * Returns previous time by hours, minutes, seconds.
             * 
             * @param time (String): time (HH, HH:MM, HH:MM:SS)
             * @param diff (Number): diference for previous time
             * @param diffBy (Number): diference by 
             *                         "hours"
             *                         "minutes"
             *                         "seconds"
             * 
             * @return previus hour (HH, HH:MM, HH:MM:SS)
             */
                var timePieces = time.split(':'),
                hours = parseInt(timePieces[0], 10),
                minutes = timePieces[1] === undefined ? 0:parseInt(timePieces[1], 10),
                seconds = timePieces[2] === undefined ? 0:parseInt(timePieces[2], 10);

                switch (diffBy){
                    case 'seconds':
                        seconds = seconds-diff;

                        if (seconds < 0){
                            seconds = 60+seconds;
                            minutes = minutes-1;

                            if (minutes < 0){
                                minutes = 60+minutes;
                                hours = hours-1 < 0 ? 0:hours-1;
                            }
                        }
                        break;
                    case 'minutes':
                            minutes = minutes-diff;

                            if (minutes < 0){
                                minutes = 60+minutes;
                                hours = hours-1 < 0 ? 0:hours-1;
                            }
                        break;
                    default:
                        hours = hours-diff < 0 ? 0:hours-diff;
                }

                return prototypes.getLeadingZero(hours)+(timePieces[1] === undefined ? '':':'+prototypes.getLeadingZero(minutes)+(timePieces[2] === undefined ? '':':'+prototypes.getLeadingZero(seconds)));
            },
            getToday:function(){
            /*
             * Returns today date.
             * 
             * @return today (YYYY-MM-DD)
             */    
                var today = new Date();
              
                return today.getFullYear()+'-'+prototypes.getLeadingZero(today.getMonth()+1)+'-'+prototypes.getLeadingZero(today.getDate());
            },
            getWeekDay:function(date){
            /*
             * Returns week day.
             * 
             * @param date (String): date for which the function get day of the week (YYYY-MM-DD)
             * 
             * @return week day index (0 for Sunday)
             */    
                var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                year = date.split('-')[0],
                month = date.split('-')[1],
                day = date.split('-')[2],
                newDate = new Date(eval('"'+day+' '+months[parseInt(month, 10)-1]+', '+year+'"'));

                return newDate.getDay();
            },

// Domains & URLs                        
            $_GET:function(name){
            /*
             * Parse a $_GET variable.
             * 
             * @param name (String): variable name
             * 
             * @return variable vaue or "undefined" if it doesn't exist
             */
                var url = window.location.href.split('?')[1],
                variables = url !== undefined ? url.split('&'):[],
                i; 

                for (i=0; i<variables.length; i++){
                    if (variables[i].indexOf(name) !== -1){
                        return variables[i].split('=')[1];
                        break;
                    }
                }

                return undefined;
            },
            acaoBuster:function(url){
            /*
             * Access-Control-Allow-Origin buster. Modifies URL to be the same as browser URL.
             * 
             * @param url (String): URL
             * 
             * @return modified URL
             */
                var browserURL = window.location.href,
                pathPiece1 = '', pathPiece2 = '';

                if (prototypes.getDomain(browserURL) === prototypes.getDomain(url)){
                    if (url.indexOf('https') !== -1 
                            || url.indexOf('http') !== -1){
                        if (browserURL.indexOf('http://www.') !== -1){
                            pathPiece1 = 'http://www.';
                        }
                        else if (browserURL.indexOf('http://') !== -1){
                            pathPiece1 = 'http://';
                        }
                        else if (browserURL.indexOf('https://www.') !== -1){
                            pathPiece1 = 'https://www.';
                        }
                        else if (browserURL.indexOf('https://') !== -1){
                            pathPiece1 = 'https://';
                        }

                        if (url.indexOf('http://www.') !== -1){
                            pathPiece2 = url.split('http://www.')[1];
                        }
                        else if (url.indexOf('http://') !== -1){
                            pathPiece2 = url.split('http://')[1];
                        }
                        else if (url.indexOf('https://www.') !== -1){
                            pathPiece2 = url.split('https://www.')[1];
                        }
                        else if (url.indexOf('https://') !== -1){
                            pathPiece2 = url.split('https://')[1];
                        }

                        return pathPiece1+pathPiece2;
                    }
                    else{
                        return url;
                    }
                }
                else{
                    return url;
                }
            },
            getDomain:function(url){
            /*
             * Get current domain.
             *
             * @param url (String): the URL from which the domain will be extracted
             *
             * @return current domain
             */ 
                var domain = url;

                /*
                 * Remove white spaces from the begining of the URL.
                 */
                domain = domain.replace(new RegExp(/^\s+/),"");

                /*
                 * Remove white spaces from the end of the URL.
                 */
                domain = domain.replace(new RegExp(/\s+$/),"");

                /*
                 * If found , convert back slashes to forward slashes.
                 */
                domain = domain.replace(new RegExp(/\\/g),"/");

                /*
                 * If there, removes "http://", "https://" or "ftp://" from the begining.
                 */
                domain = domain.replace(new RegExp(/^http\:\/\/|^https\:\/\/|^ftp\:\/\//i),"");

                /*
                 * If there, removes 'www.' from the begining.
                 */
                domain = domain.replace(new RegExp(/^www\./i),"");

                /*
                 * Remove complete string from first forward slash on.
                 */
                domain = domain.replace(new RegExp(/\/(.*)/),"");

                return domain;
            },
            hasSubdomain:function(url){
            /*
             * Check if current URL has a subdomain.
             *
             * @param url (String): URL that will be checked
             *
             * @return true/false
             */ 
                var subdomain;

                /*
                 * Remove white spaces from the begining of the URL.
                 */
                url = url.replace(new RegExp(/^\s+/),"");

                /*
                 * Remove white spaces from the end of the URL.
                 */
                url = url.replace(new RegExp(/\s+$/),"");

                /*
                 * If found , convert back slashes to forward slashes.
                 */
                url = url.replace(new RegExp(/\\/g),"/");

                /*
                 * If there, removes 'http://', 'https://' or 'ftp://' from the begining.
                 */
                url = url.replace(new RegExp(/^http\:\/\/|^https\:\/\/|^ftp\:\/\//i),"");

                /*
                 * If there, removes 'www.' from the begining.
                 */
                url = url.replace(new RegExp(/^www\./i),"");

                /*
                 * Remove complete string from first forward slaash on.
                 */
                url = url.replace(new RegExp(/\/(.*)/),""); // 

                if (url.match(new RegExp(/\.[a-z]{2,3}\.[a-z]{2}$/i))){
                    /*
                     * Remove ".??.??" or ".???.??" from end - e.g. ".CO.UK", ".COM.AU"
                     */
                    url = url.replace(new RegExp(/\.[a-z]{2,3}\.[a-z]{2}$/i),"");
                }
                else if (url.match(new RegExp(/\.[a-z]{2,4}$/i))){
                    /*
                     * Removes ".??" or ".???" or ".????" from end - e.g. ".US", ".COM", ".INFO"
                     */
                    url = url.replace(new RegExp(/\.[a-z]{2,4}$/i),"");
                }

                /*
                 * Check to see if there is a dot "." left in the string.
                 */
                subdomain = (url.match(new RegExp(/\./g))) ? true : false;

                return(subdomain);
            },

// Resize & position                        
            rp:function(parent,
                        child,
                        pw,
                        ph,
                        cw,
                        ch,
                        pos,
                        type){
            /*
             * Resize & position an item inside a parent.
             * 
             * @param parent (element): parent item
             * @param child (element): child item
             * @param pw (Number): parent width
             * @param ph (Number): parent height
             * @param cw (Number): child width
             * @param ch (Number): child height
             * @param pos (String): set child position in parent (bottom, bottom-center, bottom-left, bottom-right, center, left, horizontal-center, middle-left, middle-right, right, top, top-center, top-left, top-right, vertical-center)
             * @param type (String): resize type
             *                       "fill" fill parent (child will be cropped)
             *                       "fit" child resize to fit in parent
             */
                var newW = 0,
                newH = 0;

                /*
                 * Resize child.
                 */
                if (cw <= pw 
                        && ch <= ph){
                    newW = cw;
                    newH = ch;
                }
                else{
                    switch (type){
                        case 'fill':
                            newH = ph;
                            newW = (cw*ph)/ch;

                            if (newW < pw){
                                newW = pw;
                                newH = (ch*pw)/cw;
                            }
                            break;
                        default:
                            newH = ph;
                            newW = (cw*ph)/ch;

                            if (newW > pw){
                                newW = pw;
                                newH = (ch*pw)/cw;
                            }
                            break;
                    }
                }

                child.width(newW);
                child.height(newH);

                /*
                 * Position child.
                 */
                switch(pos.toLowerCase()){
                    case 'bottom':
                        prototypes.rpBottom(parent,
                                            child, 
                                            ph);
                        break;
                    case 'bottom-center':
                        prototypes.rpBottomCenter(parent, 
                                                  child, 
                                                  pw, 
                                                  ph);
                        break;
                    case 'bottom-left':
                        prototypes.rpBottomLeft(parent, 
                                                child, 
                                                pw, 
                                                ph);
                        break;
                    case 'bottom-right':
                        prototypes.rpBottomRight(parent,
                                                 child, 
                                                 pw, 
                                                 ph);
                        break;
                    case 'center':
                        prototypes.rpCenter(parent, 
                                            child, 
                                            pw, 
                                            ph);
                        break;
                    case 'left':
                        prototypes.rpLeft(parent, 
                                          child, 
                                          pw);
                        break;
                    case 'horizontal-center':
                        prototypes.rpCenterHorizontally(parent, 
                                                        child, 
                                                        pw);
                        break;
                    case 'middle-left':
                        prototypes.rpMiddleLeft(parent, 
                                                child, 
                                                pw, 
                                                ph);
                        break;
                    case 'middle-right':
                        prototypes.rpMiddleRight(parent, 
                                                 child, 
                                                 pw, 
                                                 ph);
                        break;
                    case 'right':
                        prototypes.rpRight(parent, 
                                           child, 
                                           pw);
                        break;
                    case 'top':
                        prototypes.rpTop(parent, 
                                         child, 
                                         ph);
                        break;
                    case 'top-center':
                        prototypes.rpTopCenter(parent, 
                                               child, 
                                               pw, 
                                               ph);
                        break;
                    case 'top-left':
                        prototypes.rpTopLeft(parent, 
                                             child, 
                                             pw, 
                                             ph);
                        break;
                    case 'top-right':
                        prototypes.rpTopRight(parent, 
                                              child,
                                              pw, 
                                              ph);
                        break;
                    case 'vertical-center':
                        prototypes.rpCenterVertically(parent, 
                                                      child, 
                                                      ph);
                        break;
                }
            },
            rpBottom:function(parent,
                              child,
                              ph){
            /*
             * Position item on bottom.
             * 
             * @param parent (element): parent item
             * @param child (element): child item
             * @param ph (Number): height to which the parent is going to be set
             */
                if (ph !== undefined){
                    parent.height(ph);
                }
                child.css('margin-top', parent.height()-child.height());
            },
            rpBottomCenter:function(parent,
                                    child,
                                    pw,
                                    ph){
            /*
             * Position item on bottom-left.
             * 
             * @param parent (element): parent item
             * @param child (element): child item
             * @param pw (Number): width to which the parent is going to be set
             * @param ph (Number): height to which the parent is going to be set
             */
                prototypes.rpBottom(parent, 
                                    child, 
                                    ph);
                prototypes.rpCenterHorizontally(parent, 
                                                child, 
                                                pw);
            },
            rpBottomLeft:function(parent,
                                  child,
                                  pw,
                                  ph){
            /*
             * Position item on bottom-left.
             * 
             * @param parent (element): parent item
             * @param child (element): child item
             * @param pw (Number): width to which the parent is going to be set
             * @param ph (Number): height to which the parent is going to be set
             */
                prototypes.rpBottom(parent, 
                                    child, 
                                    ph);
                prototypes.rpLeft(parent, 
                                  child, 
                                  pw);
            },
            rpBottomRight:function(parent,
                                   child,
                                   pw,
                                   ph){
            /*
             * Position item on bottom-left.
             * 
             * @param parent (element): parent item
             * @param child (element): child item
             * @param pw (Number): width to which the parent is going to be set
             * @param ph (Number): height to which the parent is going to be set
             */
                prototypes.rpBottom(parent, 
                                    child, 
                                    ph);
                prototypes.rpRight(parent, 
                                   child, 
                                   pw);
            },
            rpCenter:function(parent,
                              child,
                              pw,
                              ph){
            /*
             * Position item on center.
             * 
             * @param parent (element): parent item
             * @param child (element): child item
             * @param pw (Number): width to which the parent is going to be set
             * @param ph (Number): height to which the parent is going to be set
             */
                prototypes.rpCenterHorizontally(parent, 
                                                child, 
                                                pw);
                prototypes.rpCenterVertically(parent, 
                                              child, 
                                              ph);
            },
            rpCenterHorizontally:function(parent,
                                          child,
                                          pw){
            /*
             * Center item horizontally.
             * 
             * @param parent (element): parent item
             * @param child (element): child item
             * @param pw (Number): width to which the parent is going to be set
             */
                if (pw !== undefined){
                    parent.width(pw);
                }
                child.css('margin-left', (parent.width()-child.width())/2);
            },
            rpCenterVertically:function(parent,
                                        child,
                                        ph){
            /*
             * Center item vertically.
             * 
             * @param parent (element): parent item
             * @param child (element): child item
             * @param ph (Number): height to which the parent is going to be set
             */
                if (ph !== undefined){
                    parent.height(ph);
                }
                child.css('margin-top', (parent.height()-child.height())/2);
            },
            rpLeft:function(parent,
                            child,
                            pw){
            /*
             * Position item on left.
             * 
             * @param parent (element): parent item
             * @param child (element): child item
             * @param pw (Number): width to which the parent is going to be set
             */
                if (pw !== undefined){
                    parent.width(pw);
                }
                child.css('margin-left', 0);
            },
            rpMiddleLeft:function(parent,
                                  child,
                                  pw,
                                  ph){
            /*
             * Position item on middle-left.
             * 
             * @param parent (element): parent item
             * @param child (element): child item
             * @param pw (Number): width to which the parent is going to be set
             * @param ph (Number): height to which the parent is going to be set
             */
                prototypes.rpCenterVertically(parent,
                                              child, 
                                              ph);
                prototypes.rpLeft(parent,
                                  child, 
                                  pw);
            },
            rpMiddleRight:function(parent,
                                   child,
                                   pw,
                                   ph){
            /*
             * Position item on middle-right.
             * 
             * @param parent (element): parent item
             * @param child (element): child item
             * @param pw (Number): width to which the parent is going to be set
             * @param ph (Number): height to which the parent is going to be set
             */
                prototypes.rpCenterVertically(parent,
                                              child, 
                                              ph);
                prototypes.rpRight(parent, 
                                   child, 
                                   pw);
            },
            rpRight:function(parent,
                             child,
                             pw){
            /*
             * Position item on right.
             * 
             * @param parent (element): parent item
             * @param child (element): child item
             * @param pw (Number): width to which the parent is going to be set
             */
                if (pw !== undefined){
                    parent.width(pw);
                }
                child.css('margin-left', parent.width()-child.width());
            },
            rpTop:function(parent,
                           child,
                           ph){
            /*
             * Position item on top.
             * 
             * @param parent (element): parent item
             * @param child (element): child item
             * @param ph (Number): height to which the parent is going to be set
             */
                if (ph !== undefined){
                    parent.height(ph);
                }
                child.css('margin-top', 0);
            },
            rpTopCenter:function(parent,
                                 child,
                                 pw,
                                 ph){
            /*
             * Position item on top-center.
             * 
             * @param parent (element): parent item
             * @param child (element): child item
             * @param pw (Number): width to which the parent is going to be set
             * @param ph (Number): height to which the parent is going to be set
             */
                prototypes.rpTop(parent, 
                                 child, 
                                 ph);
                prototypes.rpCenterHorizontally(parent, 
                                                child, 
                                                pw);
            },
            rpTopLeft:function(parent,
                               child,
                               pw,
                               ph){
            /*
             * Position item on top-left.
             * 
             * @param parent (element): parent item
             * @param child (element): child item
             * @param pw (Number): width to which the parent is going to be set
             * @param ph (Number): height to which the parent is going to be set
             */
                prototypes.rpTop(parent, 
                                 child, 
                                 ph);
                prototypes.rpLeft(parent, 
                                  child, 
                                  pw);
            },
            rpTopRight:function(parent,
                                child,
                                pw,
                                ph){
            /*
             * Position item on top-right.
             * 
             * @param parent (element): parent item
             * @param child (element): child item
             * @param pw (Number): width to which the parent is going to be set
             * @param ph (Number): height to which the parent is going to be set
             */
                prototypes.rpTop(parent, 
                                 child, 
                                 ph);
                prototypes.rpRight(parent, 
                                   child, 
                                   pw);
            },

// Strings & numbers
            cleanInput:function(input,
                                allowedCharacters,
                                firstNotAllowed,
                                min){
            /*
             * Clean an input from unwanted characters.
             * 
             * @param input (element): the input to be checked
             * @param allowedCharacters (String): the string of allowed characters
             * @param firstNotAllowed (String): the character which can't be on the first position
             * @param min (Number/String): the minimum value that is allowed in the input
             * 
             * @return clean string
             */ 
                var characters = input.val().split(''),
                returnStr = '', 
                i, 
                startIndex = 0;

                /*
                 * Check first character.
                 */
                if (characters.length > 1
                        && characters[0] === firstNotAllowed){
                    startIndex = 1;
                }

                /*
                 * Check characters.
                 */
                for (i=startIndex; i<characters.length; i++){
                    if (allowedCharacters.indexOf(characters[i]) !== -1){
                        returnStr += characters[i];
                    }
                }

                /*
                 * Check the minimum value.
                 */
                if (min > returnStr){
                    returnStr = min;
                }

                input.val(returnStr);
            },
            getLeadingZero:function(no){
            /*
             * Adds a leading 0 if number smaller than 10.
             * 
             * @param no (Number): the number
             * 
             * @return number with leading 0 if needed
             */
                if (no < 10){
                    return '0'+no;
                }
                else{
                    return no;
                }
            },
            getRandomString:function(stringLength,
                                     allowedCharacters){
            /*
             * Creates a string with random characters.
             * 
             * @param stringLength (Number): the length of the returned string
             * @param allowedCharacters (String): the string of allowed characters
             * 
             * @return random string
             */
                var randomString = '',
                charactersPosition,
                i;

                allowedCharacters = allowedCharacters !== undefined ? allowedCharacters:'0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz';

                for (i=0; i<stringLength; i++){
                    charactersPosition = Math.floor(Math.random()*allowedCharacters.length);
                    randomString += allowedCharacters.substring(charactersPosition, charactersPosition+1);
                }
                return randomString;
            },
            getShortString:function(str,
                                    size){
            /*
             * Returns a part of a string followed by 3 dots.
             * 
             * @param str (String): the string
             * @param size (Number): the number of characters that will be displayed minus 3 dots
             * 
             * @return short string ...
             */
                var newStr = new Array(),
                pieces = str.split(''), i;

                if (pieces.length <= size){
                    newStr.push(str);
                }
                else{
                    for (i=0; i<size-3; i++){
                        newStr.push(pieces[i]);
                    }
                    newStr.push('...');
                }

                return newStr.join('');
            },
            getWithDecimals:function(number,
                                     no){
            /*
             * Returns a number with a predefined number of decimals.
             * 
             * @param number (Number): the number
             * @param no (Number): the number of decimals
             * 
             * @return string with number and decimals
             */
                no = no === undefined ? 2:no;
                return parseInt(number) === number ? String(number):parseFloat(number).toFixed(no);
            },
            validateCharacters:function(str,
                                        allowedCharacters){
            /*
             * Verify if a string contains allowed characters.
             * 
             * @param str (String): string to be checked
             * @param allowedCharacters (String): the string of allowed characters
             * 
             * @return true/false
             */
                var characters = str.split(''), i;

                for (i=0; i<characters.length; i++){
                    if (allowedCharacters.indexOf(characters[i]) === -1){
                        return false;
                    }
                }
                return true;
            },
            validEmail:function(email){
            /*
             * Email validation.
             * 
             * @param email (String): email to be checked
             * 
             * @return true/false
             */
                var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

                if (filter.test(email)){
                    return true;
                }
                return false;
            },
            stripSlashes:function(str){
            /*
             * Remove slashes from string.
             * 
             * @param str (String): the string
             * 
             * @return string without slashes
             */
                return (str + '').replace(/\\(.?)/g, function (s, n1){
                    switch (n1){
                        case '\\':
                            return '\\';
                        case '0':
                            return '\u0000';
                        case '':
                            return '';
                        default:
                            return n1;
                    }
                });
            },

// Styles
            getHEXfromRGB:function(rgb){
            /*
             * Convert RGB color to HEX.
             * 
             * @param rgb (String): RGB color
             * 
             * @return color HEX
             */
                var hexDigits = new Array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');

                rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);

                return (isNaN(rgb[1]) ? '00':hexDigits[(rgb[1]-rgb[1]%16)/16]+hexDigits[rgb[1]%16])+
                       (isNaN(rgb[2]) ? '00':hexDigits[(rgb[2]-rgb[2]%16)/16]+hexDigits[rgb[2]%16])+
                       (isNaN(rgb[3]) ? '00':hexDigits[(rgb[3]-rgb[3]%16)/16]+hexDigits[rgb[3]%16]);
            },
            getIdealTextColor:function(bgColor){
            /*
             * Set text color depending on the background color.
             * 
             * @param bgColor(String): background color
             * 
             * return white/black
             */
                var rgb = /rgb\((\d+).*?(\d+).*?(\d+)\)/.exec(bgColor);

                if (rgb !== null){
                    return parseInt(rgb[1], 10)+parseInt(rgb[2], 10)+parseInt(rgb[3], 10) < 3*256/2 ? 'white' : 'black';
                }
                else{
                    return parseInt(bgColor.substring(0, 2), 16)+parseInt(bgColor.substring(2, 4), 16)+parseInt(bgColor.substring(4, 6), 16) < 3*256/2 ? 'white' : 'black';
                }
            }
        };

        return methods.init.apply(this);
    };
})(jQuery);