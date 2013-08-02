
/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 1.0
* File                    : jquery.dop.FrontendBookingSystem.js
* File Version            : 1.0
* Created / Last Modified : 29 July 2013
* Author                  : Dot on Paper
* Copyright               : © 2013 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Booking System PRO Front End jQuery plugin.
*/

(function($){
    $.fn.DOPBookingSystem = function(options){
        var Data = {'AddLastHourToTotalPrice': true,
                    'AddtMonthViewText': 'Add Month View',
                    'AvailableDays': ['true', 'true', 'true', 'true', 'true', 'true', 'true'],
                    'AvailableOneText': 'available',
                    'AvailableText': 'available',
                    'BookedText': 'booked',
                    'BookNowLabel': 'Book Now',
                    'CheckInLabel': 'Check In',
                    'CheckOutLabel': 'Check Out',
                    'Currency': '$',
                    'CurrencyCode': 'USD',
                    'DateType': 1,
                    'DayNames': ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                    'DayShortNames': ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    'Deposit': 0,
                    'DepositText': 'deposit',
                    'DiscountsNoDays': [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                    'DiscountText': 'discount',
                    'EndHourLabel': 'Finish at',
                    'FirstDay': 1,
                    'Form': [],
                    'FormID': 1,
                    'FormEmailInvalid': 'is invalid. Please enter a valid Email.',
                    'FormRequired': 'is required.',
                    'FormTitle': 'Contact Information',
                    'HoursAMPM': 'false',
                    'HoursEnabled': 'false',
                    'HoursDefinitions': [{"value": "00:00"}],
                    'HoursIntervalEnabled': false,
                    'ID': 0,
                    'Language': 'en',
                    'MaxNoChildren': 2,
                    'MaxNoPeople': 4,
                    'MaxYear': new Date().getFullYear(),
                    'MaxStay': 0,
                    'MaxStayWarning': 'You can book only a maximum number of days',
                    'MinNoChildren': 0, 
                    'MinNoPeople': 1,
                    'MinStay': 1,
                    'MinStayWarning': 'You need to book a minimum number of days',
                    'MonthNames': ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    'MonthShortNames': ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    'MorningCheckOut': 'false',
                    'MultipleDaysSelect': 'true',
                    'MultipleHoursSelect': 'true',
                    'NextMonthText': 'Next Month',
                    'NoAdultsLabel': 'No Adults',
                    'NoChildrenEnabled': 'true',
                    'NoChildrenLabel': 'No Chilren',
                    'NoItemsEnabled': true,
                    'NoItemsLabel': 'No book items',
                    'NoPeopleLabel': 'No People',
                    'NoPeopleEnabled': 'true',
                    'NoServicesAvailableText': 'There are no services available for the period you selected.',
                    'PaymentArrivalEnabled': 'true',
                    'PaymentArrivalLabel': 'Pay on Arrival (need to be approved)',
                    'PaymentArrivalSuccess': 'Your request has been successfully sent. Please wait for approval.',
                    'PaymentArrivalSuccessInstantBooking': 'Your request has been successfully received. We are waiting you!',
                    'PaymentPayPalEnabled': 'true',
                    'PaymentPayPalLabel': 'Pay on PayPal (instant booking)',
                    'PaymentPayPalSuccess': 'Your payment was approved and services are booked.',
                    'PaymentPayPalError': 'There was an error while processing PayPal payment. Please try again.',
                    'PluginURL': '',
                    'PreviousMonthText': 'Previous Month',
                    'Reinitialize': 'false',
                    'RemoveMonthViewText': 'Remove Month View',
                    'StartHourLabel': 'Start at',
                    'TermsAndConditionsEnabled': 'false',
                    'TermsAndConditionsInvalid': 'You must agree with our Terms & Conditions to continue.',
                    'TermsAndConditionsLabel': 'I accept to agree to the Terms & Conditions',
                    'TermsAndConditionsLink': '',
                    'TotalPriceLabel': 'Total:',
                    'UnavailableText': 'unavailable',
                    'ViewOnly': 'false'},
        Container = this,
        ajaxURL = '',

        Schedule = {},

        StartDate = new Date(),
        StartYear = StartDate.getFullYear(),
        StartMonth = StartDate.getMonth()+1,
        StartDay = StartDate.getDate(),
        CurrYear = StartYear,
        CurrMonth = StartMonth, 
        
        AddLastHourToTotalPrice = true,
        AddtMonthViewText = 'Add Month View',
        AvailableDays = [true, true, true, true, true, true, true],
        AvailableOneText = 'available',
        AvailableText = 'available',
        BookedText = 'booked',
        BookNowLabel = 'Book Now',
        CheckInLabel = 'Check In',
        CheckOutLabel = 'Check Out',
        Currency = '$',
        CurrencyCode = 'USD',
        DateType = 1,
        DayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
        DayShortNames = ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
        Deposit = 0,
        DepositText = 'deposit',
        DiscountsNoDays = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        DiscountText = 'discount',
        EndHourLabel = 'Finish at',
        FirstDay = 1,
        Form = [],
        FormID = 1,
        FormEmailInvalid = 'is invalid. Please enter a valid Email.',
        FormRequired = 'is required.',
        HoursAMPM = false,
        HoursEnabled = true,
        HoursDefinitions = [{"value": "00:00"}, {"value": "00:15"}, {"value": "00:30"}, {"value": "00:45"}, {"value": "01:00"}, {"value": "01:15"}, {"value": "01:30"}, {"value": "01:45"}, {"value": "02:00"}, {"value": "02:15"}, {"value": "02:30"}, {"value": "02:45"}, {"value": "03:00"}, {"value": "03:15"}, {"value": "03:30"}, {"value": "03:45"}, {"value": "04:00"}, {"value": "04:15"}, {"value": "04:30"}, {"value": "04:45"}, {"value": "05:00"}, {"value": "05:15"}, {"value": "05:30"}, {"value": "05:45"}, {"value": "06:00"}, {"value": "06:15"}, {"value": "06:30"}, {"value": "06:45"}, {"value": "07:00"}, {"value": "07:15"}, {"value": "07:30"}, {"value": "07:45"}, {"value": "08:00"}, {"value": "08:15"}, {"value": "08:30"}, {"value": "08:45"}, {"value": "09:00"}, {"value": "09:15"}, {"value": "09:30"}, {"value": "09:45"}, {"value": "10:00"}, {"value": "10:15"}, {"value": "10:30"}, {"value": "10:45"}, {"value": "11:00"}, {"value": "11:15"}, {"value": "11:30"}, {"value": "11:45"}, {"value": "12:00"}, {"value": "12:15"}, {"value": "12:30"}, {"value": "12:45"}, {"value": "13:00"}, {"value": "13:15"}, {"value": "13:30"}, {"value": "13:45"}, {"value": "14:00"}, {"value": "14:15"}, {"value": "14:30"}, {"value": "14:45"}, {"value": "15:00"}, {"value": "15:15"}, {"value": "15:30"}, {"value": "15:45"}, {"value": "16:00"}, {"value": "16:15"}, {"value": "16:30"}, {"value": "16:45"}, {"value": "17:00"}, {"value": "17:15"}, {"value": "17:30"}, {"value": "17:45"}, {"value": "18:00"}, {"value": "18:15"}, {"value": "18:30"}, {"value": "18:45"}, {"value": "19:00"}, {"value": "19:15"}, {"value": "19:30"}, {"value": "19:45"}, {"value": "20:00"}, {"value": "20:15"}, {"value": "20:30"}, {"value": "20:45"}, {"value": "21:00"}, {"value": "21:15"}, {"value": "21:30"}, {"value": "21:45"}, {"value": "22:00"}, {"value": "22:15"}, {"value": "22:30"}, {"value": "22:45"}, {"value": "23:00"}, {"value": "23:15"}, {"value": "23:30"}, {"value": "23:45"}],
        HoursIntervalEnabled = false,
        ID = 0,
        Language = 'en',
        MaxNoChildren = 3,
        MaxNoPeople = 10,
        MaxYear = new Date().getFullYear(),
        MaxStay = 0,
        MaxStayWarning = 'You can book only a maximum number of days',
        MinNoChildren = 0, 
        MinNoPeople = 1,
        MinStay = 1,
        MinStayWarning = 'You need to book a minimum number of days',
        MonthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        MonthShortNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        MorningCheckOut = false,
        MultipleDaysSelect = true,
        MultipleHoursSelect = true,
        NextMonthText = 'Next Month',
        NoAdultsLabel = 'No Adults',
        NoChildrenEnabled = true,
        NoChildrenLabel = 'No Chilren',
        NoItemsEnabled = true,
        NoItemsLabel = 'No book items',
        NoPeopleLabel = 'No People',
        NoPeopleEnabled = true,
        NoServicesAvailableText  = 'There are no services available for the period you selected',
        PaymentArrivalEnabled = true,
        PaymentArrivalLabel = 'Pay on Arrival (need to be approved)',
        PaymentArrivalSuccess = 'Your request has been successfully sent. Please wait for approval.',
        PaymentArrivalSuccessInstantBooking = 'Your request has been successfully received. We are waiting you!',
        PaymentPayPalEnabled = true,
        PaymentPayPalLabel = 'Pay on PayPal (instant booking)',
        PaymentPayPalSuccess = 'Your payment was approved and services are booked.',
        PaymentPayPalError = 'There was an error while processing PayPal payment. Please try again.',
        PluginURL = '',
        PreviousMonthText = 'Previous Month',
        RemoveMonthViewText = 'Remove Month View',
        StartHourLabel = 'Start at',
        TermsAndConditionsEnabled = false,
        TermsAndConditionsInvalid = 'You must agree with our Terms & Conditions to continue.',
        TermsAndConditionsLabel = 'I accept to agree to the Terms & Conditions',
        TermsAndConditionsLink = '',
        TotalPriceLabel = 'Total:',
        UnavailableText = 'unavailable',
        ViewOnly = true,
        
        showCalendar = true,
        firstYearLoaded = false,

        noMonths = 1,
        dayStartSelection,
        dayEndSelection,
        dayFirstSelected = false,
        dayTimeDisplay = false,
        dayPreviousStatus = '',
        dayPreviousBind = 0,
        dayNo = 0,
        
        hourStartSelection,
        hourEndSelection,
        hourDaySelection,
        hourFirstSelected = false,

        methods = {
                    init:function(){// Init Plugin.
                        return this.each(function(){
                            if (options){
                                $.extend(Data, options);
                            }
                            
                            if (!$(Container).hasClass('dopbs-initialized') || Data['Reinitialize']){
                                $(Container).addClass('dopbs-initialized');
                                methods.parseData();
                                $(window).bind('resize.DOPBookingSystem', methods.initRP);                          
                            }
                        });
                    },
                    parseData:function(){
                        ajaxURL = prototypes.acaoBuster($('a', Container).attr('href'));
                        
                        Container.html('<div class="loader"></div>');
                        
                        AddLastHourToTotalPrice = Data['AddLastHourToTotalPrice'] == "true" ? true:false;
                        AddtMonthViewText = Data['AddtMonthViewText'];
                        AvailableDays[0] = Data['AvailableDays'][0] == "true" ? true:false;
                        AvailableDays[1] = Data['AvailableDays'][1] == "true" ? true:false;
                        AvailableDays[2] = Data['AvailableDays'][2] == "true" ? true:false;
                        AvailableDays[3] = Data['AvailableDays'][3] == "true" ? true:false;
                        AvailableDays[4] = Data['AvailableDays'][4] == "true" ? true:false;
                        AvailableDays[5] = Data['AvailableDays'][5] == "true" ? true:false;
                        AvailableDays[6] = Data['AvailableDays'][6] == "true" ? true:false;  
                        AvailableOneText = Data['AvailableOneText'];
                        AvailableText = Data['AvailableText'];
                        BookedText = Data['BookedText'];
                        BookNowLabel = Data['BookNowLabel'];
                        CheckInLabel = Data['CheckInLabel'];
                        CheckOutLabel = Data['CheckOutLabel'];
                        Currency = Data['Currency'];
                        CurrencyCode = Data['CurrencyCode'];
                        DateType = parseInt(Data['DateType']);
                        DayNames = Data['DayNames'];
                        DayShortNames = Data['DayShortNames'];
                        Deposit = parseFloat(Data['Deposit']);
                        DepositText = Data['DepositText'];
                        DiscountsNoDays = Data['DiscountsNoDays'];
                        DiscountText = Data['DiscountText'];
                        EndHourLabel = Data['EndHourLabel'];
                        FirstDay = parseInt(Data['FirstDay']);
                        Form = Data['Form'];
                        FormID = Data['FormID'];
                        FormEmailInvalid = Data['FormEmailInvalid'];
                        FormRequired = Data['FormRequired'];
                        FormTitle = Data['FormTitle'];
                        HoursAMPM = Data['HoursAMPM'] == 'true' ? true:false;
                        HoursEnabled = Data['HoursEnabled'] == 'true' ? true:false;
                        HoursDefinitions = Data['HoursDefinitions'];
                        HoursIntervalEnabled = Data['HoursIntervalEnabled'] == 'true' ? true:false;
                        ID = Data['ID'];
                        Language = Data['Language'];
                        MaxNoChildren = parseInt(Data['MaxNoChildren']);
                        MaxNoPeople = parseInt(Data['MaxNoPeople']);
                        MaxYear = Data['MaxYear'];
                        MaxStayWarning = Data['MaxStayWarning'];
                        MaxStay = parseInt(Data['MaxStay']);
                        MinNoChildren = parseInt(Data['MinNoChildren']);
                        MinNoPeople = parseInt(Data['MinNoPeople']);
                        MinStay = parseInt(Data['MinStay']);
                        MinStayWarning = Data['MinStayWarning'];
                        MonthNames = Data['MonthNames'];
                        MonthShortNames = Data['MonthShortNames'];
                        MorningCheckOut = Data['MorningCheckOut'] == 'true' ? true:false;
                        MultipleDaysSelect = Data['MultipleDaysSelect'] == 'true' ? true:false;
                        MultipleHoursSelect = Data['MultipleHoursSelect'] == 'true' ? true:false;
                        NextMonthText = Data['NextMonthText'];
                        NoAdultsLabel = Data['NoAdultsLabel'];
                        NoChildrenEnabled = Data['NoChildrenEnabled'] == 'true' ? true:false;
                        NoChildrenLabel = Data['NoChildrenLabel'];
                        NoItemsEnabled = Data['NoItemsEnabled'] == 'true' ? true:false;
                        NoItemsLabel = Data['NoItemsLabel'];
                        NoPeopleLabel = Data['NoPeopleLabel'];
                        NoPeopleEnabled = Data['NoPeopleEnabled'] == 'true' ? true:false;
                        NoServicesAvailableText  = Data['NoServicesAvailableText'];
                        PaymentArrivalEnabled = Data['PaymentArrivalEnabled'] == 'true' ? true:false;
                        PaymentArrivalLabel = Data['PaymentArrivalLabel'];
                        PaymentArrivalSuccess = Data['PaymentArrivalSuccess'];
                        PaymentArrivalSuccessInstantBooking = Data['PaymentArrivalSuccessInstantBooking'];
                        PaymentPayPalEnabled = Data['PaymentPayPalEnabled'] == 'true' ? true:false;
                        PaymentPayPalLabel = Data['PaymentPayPalLabel'];
                        PaymentPayPalSuccess = Data['PaymentPayPalSuccess'];
                        PaymentPayPalError = Data['PaymentPayPalError'];
                        PluginURL = Data['PluginURL'];
                        PreviousMonthText = Data['PreviousMonthText'];
                        RemoveMonthViewText = Data['RemoveMonthViewText'];
                        StartHourLabel = Data['StartHourLabel'];
                        TermsAndConditionsEnabled = Data['TermsAndConditionsEnabled'] == 'true' ? true:false;
                        TermsAndConditionsInvalid = Data['TermsAndConditionsInvalid'];
                        TermsAndConditionsLabel = Data['TermsAndConditionsLabel'];
                        TermsAndConditionsLink = Data['TermsAndConditionsLink'];
                        TotalPriceLabel = Data['TotalPriceLabel'];
                        UnavailableText = Data['UnavailableText'];
                        ViewOnly = Data['ViewOnly'] == 'true' ? true:false;
                        
                        MorningCheckOut = HoursEnabled ? false:MorningCheckOut;
                        MultipleDaysSelect = HoursEnabled ? false:MultipleDaysSelect;
                        
                        methods.parseCalendarData(new Date().getFullYear());
                    },
                    parseCalendarData:function(year){                        
                        $.post(ajaxURL, {action:'dopbs_load_schedule', calendar_id:ID, year:year}, function(data){
                            if ($.trim(data) != ''){
                                $.extend(Schedule, JSON.parse($.trim(data)));
                            }
                            
                            if (showCalendar && (StartMonth < 12-noMonths+1 || firstYearLoaded)){
                                showCalendar = false;
                                methods.initCalendar();
                            }
                            
                            if (!firstYearLoaded){
                                firstYearLoaded = true;
                            }
                                                       
                            if (year < MaxYear){
                                methods.parseCalendarData(year+1);
                            }
                        });
                    },

                    initCalendar:function(){// Init  Calendar
                        var HTML = new Array(), i, j;
                        
                        // ***************************************************** Calendar HTML
                        HTML.push('<div class="DOPBookingSystem_Container" style="float:left;">'); 
                        HTML.push('    <div class="DOPBookingSystem_Navigation">');
                        HTML.push('        <div class="add_btn" title="'+AddtMonthViewText+'"></div>');                        
                        HTML.push('        <div class="remove_btn" title="'+RemoveMonthViewText+'"></div>');
                        HTML.push('        <div class="previous_btn" title="'+PreviousMonthText+'"></div>');
                        HTML.push('        <div class="next_btn" title="'+NextMonthText+'"></div>');
                        HTML.push('        <div class="month_year"></div>');
                        HTML.push('        <div class="week">');
                        HTML.push('            <div class="day"></div>');
                        HTML.push('            <div class="day"></div>');
                        HTML.push('            <div class="day"></div>');
                        HTML.push('            <div class="day"></div>');
                        HTML.push('            <div class="day"></div>');
                        HTML.push('            <div class="day"></div>');
                        HTML.push('            <div class="day"></div><br style="clear:both;" />');
                        HTML.push('        </div>');
                        HTML.push('    </div>');
                        HTML.push('    <div class="DOPBookingSystem_Calendar"></div>');
                        HTML.push('</div>');
                        
                        // ***************************************************** Sidebar/Form HTML
                        if (!ViewOnly){
                            if ($('#DOPBookingSystem_SidebarWidget'+ID).length == 0){
                                HTML.push('<div class="DOPBookingSystem_Sidebar">'+methods.generateSidebar()+'</div>');
                            }
                            else{
                                HTML.push('<div class="DOPBookingSystem_Sidebar" style="margin-left:0px; width:0px;"></div>');
                                $('#DOPBookingSystem_SidebarWidget'+ID).html(methods.generateSidebar());
                            }
                        }
                        HTML.push('<br class="DOPBookingSystem_Clear" />');
                        
                        Container.html(HTML.join(''));
                        $('body').append('<div class="DOPBookingSystem_Info" id="DOPBookingSystem_Info'+ID+'"></div>');
                        
                        for (i=0; i<Form.length; i++){
                            if (Form[i]['allowed_characters'] != ''){
                                $('#DOPBookingSystem_FormField'+Form[i]['id']).unbind('keyup');
                                $('#DOPBookingSystem_FormField'+Form[i]['id']).bind('keyup', function(){
                                    var id = parseInt($(this).attr('id').split('DOPBookingSystem_FormField')[1]);
                                    
                                    for (j=0; j<Form.length; j++){
                                        if (Form[j]['id'] == id){
                                            prototypes.cleanInput($(this), Form[j]['allowed_characters']);
                                        }
                                    }
                                });
                            }
                        }
                        
                        methods.initSettings();
                    },
                    generateSidebar:function(){
                        var HTML = new Array(), i, j;
                        
                        HTML.push('    <div class="section">');
                        HTML.push('        <form name="DOPBookingSystem_Form'+ID+'" id="DOPBookingSystem_Form'+ID+'" action="" method="POST">');
                        HTML.push('            <input type="hidden" name="DOPBookingSystem_Language'+ID+'" id="DOPBookingSystem_Language'+ID+'" value="'+Language+'" />');
                        HTML.push('            <input type="hidden" name="DOPBookingSystem_Page'+ID+'" id="DOPBookingSystem_Page'+ID+'" value="'+window.location.href+'" />');
                        HTML.push('            <input type="hidden" name="DOPBookingSystem_PluginURL'+ID+'" id="DOPBookingSystem_PluginURL'+ID+'" value="'+PluginURL+'" />');
                        HTML.push('            <input type="hidden" name="DOPBookingSystem_ID" id="DOPBookingSystem_ID'+ID+'" value="'+ID+'" />');
                        HTML.push('            <input type="hidden" name="DOPBookingSystem_PriceItemValue'+ID+'" id="DOPBookingSystem_PriceItemValue'+ID+'" value="0" />');
                        HTML.push('            <input type="hidden" name="DOPBookingSystem_PriceValue'+ID+'" id="DOPBookingSystem_PriceValue'+ID+'" value="0" />');
                        HTML.push('            <input type="hidden" name="DOPBookingSystem_DiscountValue'+ID+'" id="DOPBookingSystem_DiscountValue'+ID+'" value="0" />');
                        HTML.push('            <input type="hidden" name="DOPBookingSystem_PriceToPayValue'+ID+'" id="DOPBookingSystem_PriceToPayValue'+ID+'" value="0" />');
                        HTML.push('            <input type="hidden" name="DOPBookingSystem_PriceDepositValue'+ID+'" id="DOPBookingSystem_PriceDepositValue'+ID+'" value="0" />');
                        HTML.push('            <input type="hidden" name="DOPBookingSystem_Currency'+ID+'" id="DOPBookingSystem_Currency'+ID+'" value="'+Currency+'" />');
                        HTML.push('            <input type="hidden" name="DOPBookingSystem_CurrencyCode'+ID+'" id="DOPBookingSystem_CurrencyCode'+ID+'" value="'+CurrencyCode+'" />');
                        HTML.push('            <input type="hidden" name="DOPBookingSystem_FormID'+ID+'" id="DOPBookingSystem_FormID'+ID+'" value="'+FormID+'" />');
                        // Check In
                        HTML.push('            <div class="section-item left">');
                        HTML.push('                <label for="DOPBookingSystem_CheckIn'+ID+'">'+CheckInLabel+'</label>');
                        HTML.push('                <input type="text" name="DOPBookingSystem_CheckInView'+ID+'" id="DOPBookingSystem_CheckInView'+ID+'" class="small" value="" />');
                        HTML.push('                <input type="hidden" name="DOPBookingSystem_CheckIn'+ID+'" id="DOPBookingSystem_CheckIn'+ID+'" value="" />');
                        HTML.push('            </div>');
                        
                        // Check Out
                        if (!HoursEnabled && MultipleDaysSelect){
                            HTML.push('            <div class="section-item left second">');
                            HTML.push('                <label for="DOPBookingSystem_CheckOut'+ID+'">'+CheckOutLabel+'</label>');
                            HTML.push('                <input type="text" name="DOPBookingSystem_CheckOutView'+ID+'" id="DOPBookingSystem_CheckOutView'+ID+'" class="small" value="" />');
                            HTML.push('                <input type="hidden" name="DOPBookingSystem_CheckOut'+ID+'" id="DOPBookingSystem_CheckOut'+ID+'" value="" />');
                            HTML.push('            </div>');
                        } 
                        
                        HTML.push('            <br class="DOPBookingSystem_Clear" />');
                                                
                        if (HoursEnabled){
                            // Start Hour                            
                            HTML.push('            <div class="DOPBookingSystem_HoursSelect" id="DOPBookingSystem_HoursSelect'+ID+'">');
                            HTML.push('                <div class="section-item left">');
                            HTML.push('                    <label for="DOPBookingSystem_StartHour'+ID+'">'+StartHourLabel+'</label>');
                            HTML.push('                    <select name="DOPBookingSystem_StartHour'+ID+'" id="DOPBookingSystem_StartHour'+ID+'" class="small">');
                            
                            for (i=0; i<HoursDefinitions.length; i++){
                                HTML.push('                    <option value="'+HoursDefinitions[i]['value']+'">'+(HoursAMPM ? prototypes.timeToAMPM(HoursDefinitions[i]['value']):HoursDefinitions[i]['value'])+'</option>');
                            }
                            HTML.push('                    </select>');
                            HTML.push('                </div>');
                            
                            // End Hour
                            if (MultipleHoursSelect){
                                HTML.push('                <div class="section-item left second">');
                                HTML.push('                    <label for="DOPBookingSystem_EndHour'+ID+'">'+EndHourLabel+'</label>');
                                HTML.push('                    <select name="DOPBookingSystem_EndHour'+ID+'" id="DOPBookingSystem_EndHour'+ID+'" class="small">');
                                
                                for (i=0; i<HoursDefinitions.length; i++){
                                    HTML.push('                    <option value="'+HoursDefinitions[i]['value']+'">'+(HoursAMPM ? prototypes.timeToAMPM(HoursDefinitions[i]['value']):HoursDefinitions[i]['value'])+'</option>');
                                }
                                HTML.push('                    </select>');
                                HTML.push('                </div>');
                            }
                            HTML.push('                <br class="DOPBookingSystem_Clear" />');
                            HTML.push('            </div>');
                        }
                        
                        // No Items
                        HTML.push('            <div class="DOPBookingSystem_NoItemsSelect" id="DOPBookingSystem_NoItemsSelect'+ID+'">');
                        HTML.push('                <div class="section-item left">');
                        HTML.push('                    <label for="DOPBookingSystem_NoItems'+ID+'">'+NoItemsLabel+'</label>');
                        HTML.push('                    <select name="DOPBookingSystem_NoItems'+ID+'" id="DOPBookingSystem_NoItems'+ID+'" class="small">');
                        HTML.push('                        <option value="1">1</option>');
                        HTML.push('                    </select>');
                        HTML.push('                </div>');
                        HTML.push('                <br class="DOPBookingSystem_Clear" />');
                        HTML.push('            </div>');
                        
                        // Price
                        HTML.push('            <div class="section-item price" id="DOPBookingSystem_Price'+ID+'">'+TotalPriceLabel+' <span class="value"></span></div>');
                        // Message 
                        HTML.push('            <div class="section-item message" id="DOPBookingSystem_InfoMessage'+ID+'"></div>');
                        
                        // ***************************************************** Contact Form
                        HTML.push('            <div class="DOPBookingSystem_ContactForm" id="DOPBookingSystem_ContactForm'+ID+'">');
                        // Title
                        HTML.push('                <div class="section-item title">'+FormTitle+'</div>');
                        
                        for (i=0; i<Form.length; i++){
                            HTML.push('                <div class="section-item">');
                            
                            switch (Form[i]['type']){
                                case 'checkbox':
                                    HTML.push('                    <input type="checkbox" name="DOPBookingSystem_FormField'+ID+'_'+Form[i]['id']+'" id="DOPBookingSystem_FormField'+ID+'_'+Form[i]['id']+'" />');
                                    HTML.push('                    <label class="checkbox" for="DOPBookingSystem_FormField'+ID+'_'+Form[i]['id']+'">'+Form[i]['translation']+(Form[i]['required'] == 'true' ? ' *':'')+'</label>');
                                    break;
                                case 'text':
                                    HTML.push('                    <label for="DOPBookingSystem_FormField'+ID+'_'+Form[i]['id']+'">'+Form[i]['translation']+(Form[i]['required'] == 'true' ? ' *':'')+'</label>');
                                    HTML.push('                    <input type="text" name="DOPBookingSystem_FormField'+ID+'_'+Form[i]['id']+'" id="DOPBookingSystem_FormField'+ID+'_'+Form[i]['id']+'" value="" />');
                                    break;
                                case 'select':
                                    HTML.push('                    <label for="DOPBookingSystem_FormField'+ID+'_'+Form[i]['id']+'">'+Form[i]['translation']+(Form[i]['required'] == 'true' ? ' *':'')+'</label>');
                                    HTML.push('                    <select name="DOPBookingSystem_FormField'+ID+'_'+Form[i]['id']+(Form[i]['multiple_select'] == 'true' ? '[]':'')+'" id="DOPBookingSystem_FormField'+ID+'_'+Form[i]['id']+'" value=""'+(Form[i]['multiple_select'] == 'true' ? ' multiple':'')+'>');
                                    
                                    for (j=0; j<Form[i]['options'].length; j++){
                                        if (Form[i]['options'][j]['translation'] != ''){
                                            HTML.push('<option value="'+Form[i]['options'][j]['id']+'">'+Form[i]['options'][j]['translation']+'</option>');
                                        }
                                    }
                                    HTML.push('                    </select>');
                                    break;
                                case 'textarea':
                                    HTML.push('                    <label for="DOPBookingSystem_FormField'+ID+'_'+Form[i]['id']+'">'+Form[i]['translation']+(Form[i]['required'] == 'true' ? ' *':'')+'</label>');
                                    HTML.push('                    <textarea name="DOPBookingSystem_FormField'+ID+'_'+Form[i]['id']+'" id="DOPBookingSystem_FormField'+ID+'_'+Form[i]['id']+'" col="" rows="6"></textarea>');
                                    break;
                            }
                            HTML.push('                </div>');
                        }
                        
                        if (NoPeopleEnabled){
                            // No People
                            HTML.push('                <div class="section-item left">');
                            HTML.push('                    <label for="DOPBookingSystem_NoPeople'+ID+'">'+(NoChildrenEnabled ? NoAdultsLabel:NoPeopleLabel)+'</label>');
                            HTML.push('                    <select name="DOPBookingSystem_NoPeople'+ID+'" id="DOPBookingSystem_NoPeople'+ID+'" class="small">');
                            
                            for (i=MinNoPeople; i<=MaxNoPeople; i++){
                                HTML.push('                    <option value="'+i+'">'+i+'</option>');
                            }
                            HTML.push('                    </select>');
                            HTML.push('                </div>');  
                            
                            // No Children
                            if (NoChildrenEnabled){
                                HTML.push('                <div class="section-item left second">');
                                HTML.push('                    <label for="DOPBookingSystem_NoChildren'+ID+'">'+NoChildrenLabel+'</label>');
                                HTML.push('                    <select name="DOPBookingSystem_NoChildren'+ID+'" id="DOPBookingSystem_NoChildren'+ID+'" class="small">');
                                
                                for (i=MinNoChildren; i<=MaxNoChildren; i++){
                                    HTML.push('                    <option value="'+i+'">'+i+'</option>');
                                }
                                HTML.push('                    </select>');
                                HTML.push('                </div>');
                                HTML.push('                <br class="DOPBookingSystem_Clear" />');
                            }
                            else{                                
                                HTML.push('                <br class="DOPBookingSystem_Clear" />');
                            }
                        }
                        
                        // Pay on Arrival
                        if (PaymentArrivalEnabled){
                            HTML.push('                <div class="section-item" id="DOPBookingSystem_PaymentArrival'+ID+'">');
                            HTML.push('                    <input type="radio" name="DOPBookingSystem_Payment'+ID+'" value="1" checked="checked" />');
                            HTML.push('                    <label class="radio">'+PaymentArrivalLabel+'</label>');
                            HTML.push('                </div>');
                        }
                        
                        // PayPal 
                        if (PaymentPayPalEnabled){
                            HTML.push('                <div class="section-item" id="DOPBookingSystem_PaymentPayPal'+ID+'">');
                            HTML.push('                    <input type="radio" name="DOPBookingSystem_Payment'+ID+'" value="2"'+(!PaymentArrivalEnabled ? ' checked="checked"':'')+' />');
                            HTML.push('                    <label class="radio">'+PaymentPayPalLabel+'</label>');
                            HTML.push('                </div>');
                        }
                        
                        // Terms & Conditions
                        if (TermsAndConditionsEnabled){
                            HTML.push('                <div class="section-item">');
                            HTML.push('                    <input type="checkbox" name="DOPBookingSystem_TermsAndConditions'+ID+'" id="DOPBookingSystem_TermsAndConditions'+ID+'" />');
                            HTML.push('                    <label class="checkbox"><a href="'+TermsAndConditionsLink+'" target="_blank">'+TermsAndConditionsLabel+'</a></label>');
                            HTML.push('                </div>');
                        }
                        
                        // Submit
                        HTML.push('                <div class="section-item">');
                        HTML.push('                    <input type="submit" name="DOPBookingSystem_Submit'+ID+'" id="DOPBookingSystem_Submit'+ID+'" value="'+BookNowLabel+'" />');
                        HTML.push('                </div>');
                        HTML.push('            </div>');
                        HTML.push('        </form>');
                        HTML.push('    </div>');
                        
                        return HTML.join('');
                    },
                    initSettings:function(){// Init  Settings
                        methods.initContainer();
                        methods.initNavigation();
                        methods.initInfo();
                        methods.generateCalendar(StartYear, StartMonth);
                        
                        if (!ViewOnly){
                            methods.initSidebar();
                        }
                    },
                    initRP:function(){
                        methods.rpContainer();
                        methods.rpNavigation();
                        methods.rpDays();
                    },
                    
                    initContainer:function(){// Init Container
                        methods.rpContainer();
                    },
                    rpContainer:function(){// RP Container
                        var hiddenBustedItems = prototypes.doHideBuster($(Container));
                        
                        if (Container.width() <= 600){
                            $('.DOPBookingSystem_Container', Container).width(Container.width());
                            $('.DOPBookingSystem_Sidebar', Container).addClass('bottom');
                        }
                        else{
                            $('.DOPBookingSystem_Container', Container).width(Container.width()-$('.DOPBookingSystem_Sidebar', Container).width()-(ViewOnly ? 0:parseFloat($('.DOPBookingSystem_Sidebar', Container).css('margin-left')))-1);
                            $('.DOPBookingSystem_Sidebar', Container).removeClass('bottom');
                        }
                        
                        if (Container.width() <= 280){
                            $('.DOPBookingSystem_Navigation .month_year', Container).html(MonthShortNames[(CurrMonth%12 != 0 ? CurrMonth%12:12)-1]+' '+CurrYear); 
                        }
                        else{
                            $('.DOPBookingSystem_Navigation .month_year', Container).html(MonthNames[(CurrMonth%12 != 0 ? CurrMonth%12:12)-1]+' '+CurrYear); 
                        }
                        
                        prototypes.undoHideBuster(hiddenBustedItems);
                    },
                    
                    initNavigation:function(){// Init Navigation
                        methods.rpNavigation();
                        
                        if (!prototypes.isTouchDevice()){
                            $('.DOPBookingSystem_Navigation .previous_btn', Container).hover(function(){
                                $(this).addClass('hover');
                            }, function(){
                                $(this).removeClass('hover');
                            });

                            $('.DOPBookingSystem_Navigation .next_btn', Container).hover(function(){
                                $(this).addClass('hover');
                            }, function(){
                                $(this).removeClass('hover');
                            });

                            $('.DOPBookingSystem_Navigation .add_btn', Container).hover(function(){
                                $(this).addClass('hover');
                            }, function(){
                                $(this).removeClass('hover');
                            });

                            $('.DOPBookingSystem_Navigation .remove_btn', Container).hover(function(){
                                $(this).addClass('hover');
                            }, function(){
                                $(this).removeClass('hover');
                            }); 
                        }
                        
                        $('.DOPBookingSystem_Navigation .previous_btn', Container).bind('click', function(){
                            methods.resetSidebar(); 
                            methods.generateCalendar(StartYear, CurrMonth-1);

                            if (CurrMonth == StartMonth){
                                $('.DOPBookingSystem_Navigation .previous_btn', Container).css('display', 'none');
                            }
                        });
                        
                        $('.DOPBookingSystem_Navigation .next_btn', Container).bind('click', function(){
                            methods.resetSidebar(); 
                            methods.generateCalendar(StartYear, CurrMonth+1);
                            $('.DOPBookingSystem_Navigation .previous_btn', Container).css('display', 'block');
                        });
                        
                        $('.DOPBookingSystem_Navigation .add_btn', Container).bind('click', function(){
                            methods.resetSidebar(); 
                            noMonths++;
                            methods.generateCalendar(StartYear, CurrMonth);
                            $('.DOPBookingSystem_Navigation .remove_btn', Container).css('display', 'block');
                        });
                                                
                        $('.DOPBookingSystem_Navigation .remove_btn', Container).bind('click', function(){
                            methods.resetSidebar(); 
                            noMonths--;
                            methods.generateCalendar(StartYear, CurrMonth);
                            
                            if(noMonths == 1){
                                $('.DOPBookingSystem_Navigation .remove_btn', Container).css('display', 'none');
                            }
                        });
                    },
                    rpNavigation:function(){ // RP Navigation
                        var no = 0,
                        hiddenBustedItems = prototypes.doHideBuster($(Container));
                        
                        $('.DOPBookingSystem_Navigation .week .day', Container).width(parseInt(($('.DOPBookingSystem_Navigation .week', Container).width()-parseInt($('.DOPBookingSystem_Navigation .week', Container).css('padding-left'))+parseInt($('.DOPBookingSystem_Navigation .week', Container).css('padding-right')))/7));
                        
                        no = FirstDay-1;
                        
                        $('.DOPBookingSystem_Navigation .week .day', Container).each(function(){
                            no++;
                            
                            if (no == 7){
                                no = 0;
                            }
                                
                            if ($(this).width() <= 70){
                                $(this).html(DayShortNames[no]);
                            }
                            else{
                                $(this).html(DayNames[no]);
                            }
                        });
                        
                        prototypes.undoHideBuster(hiddenBustedItems);
                    },
                    
                    generateCalendar:function(startYear, startMonth){// Init Calendar                          
                        CurrYear = new Date(startYear, startMonth, 0).getFullYear();
                        CurrMonth = startMonth;    
                        
                        if (startYear != StartYear || startMonth != StartMonth){
                            $('.DOPBookingSystem_Navigation .previous_btn', Container).css('display', 'block');
                        }
                        
                        dayPreviousStatus = '';
                        dayPreviousBind = 0;
                                       
                        if (Container.width() <= 280){
                            $('.DOPBookingSystem_Navigation .month_year', Container).html(MonthShortNames[(CurrMonth%12 != 0 ? CurrMonth%12:12)-1]+' '+CurrYear); 
                        }
                        else{
                            $('.DOPBookingSystem_Navigation .month_year', Container).html(MonthNames[(CurrMonth%12 != 0 ? CurrMonth%12:12)-1]+' '+CurrYear); 
                        }         
                        $('.DOPBookingSystem_Calendar', Container).html('<div class="loader"></div>');

//                        setTimeout(function(){
                            for (var i=1; i<=noMonths; i++){
                                methods.initMonth(CurrYear, startMonth = startMonth%12 != 0 ? startMonth%12:12, i);
                                startMonth++;

                                if (startMonth % 12 == 1){
                                    CurrYear++;
                                    startMonth = 1;
                                }                            
                            }
                            
                            $('.DOPBookingSystem_Calendar .loader', Container).remove();
//                        }, 10);
                    },
                    initMonth:function(year, month, position){// Init Month
                        var i, d, cyear, cmonth, cday, start, totalDays = 0,
                        noDays = new Date(year, month, 0).getDate(),
                        noDaysPreviousMonth = new Date(year, month-1, 0).getDate(),
                        firstDay = new Date(year, month-1, 2-FirstDay).getDay(),
                        lastDay = new Date(year, month-1, noDays-FirstDay+1).getDay(),
                        monthHTML = new Array(), 
                        day = methods.defaultDay();
                        
                        dayNo = 0;
                        
                        monthHTML.push('<div class="DOPBookingSystem_Month">');
                        
                        if (position > 1){
                            monthHTML.push('<div class="month_year">'+MonthNames[(month%12 != 0 ? month%12:12)-1]+' '+year+'</div>');
                        }
                                                
                        if (firstDay == 0){
                            start = 7;
                        }
                        else{
                            start = firstDay;
                        }
                        
                        for (i=start-1; i>=1; i--){
                            totalDays++;
                            
                            d = new Date(year, month-2, noDaysPreviousMonth-i+1);
                            cyear = d.getFullYear();
                            cmonth = prototypes.timeLongItem(d.getMonth()+1);
                            cday = prototypes.timeLongItem(d.getDate());
                            day = Schedule[cyear+'-'+cmonth+'-'+cday] != undefined ? Schedule[cyear+'-'+cmonth+'-'+cday]:methods.defaultDay(methods.weekDay(cyear, cmonth, cday));
                            
                            dayPreviousStatus = dayPreviousStatus == '' ? Schedule[methods.previousDay(cyear+'-'+cmonth+'-'+cday)] != undefined ? Schedule[methods.previousDay(cyear+'-'+cmonth+'-'+cday)]['status']:'none':dayPreviousStatus;
                            dayPreviousBind = dayPreviousBind == 0 ? Schedule[methods.previousDay(cyear+'-'+cmonth+'-'+cday)] != undefined ? Schedule[methods.previousDay(cyear+'-'+cmonth+'-'+cday)]['group']:0:dayPreviousBind;
                            
                            if (StartMonth == month && StartYear == year){
                                monthHTML.push(methods.initDay('past_day', 
                                                               ID+'_'+cyear+'-'+cmonth+'-'+cday, 
                                                               d.getDate(), 
                                                               '', '', '', '', '', '', 'none'));            
                            }
                            else{
                                monthHTML.push(methods.initDay('last_month'+(position>1 ?  ' mask':''), 
                                                               position>1 ? ID+'_'+cyear+'-'+cmonth+'-'+cday+'_last':ID+'_'+cyear+'-'+cmonth+'-'+cday, 
                                                               d.getDate(), 
                                                               day['available'], day['bind'], day['info'], day['notes'], day['price'], day['promo'], day['status']));
                            }
                        }
                        
                        for (i=1; i<=noDays; i++){
                            totalDays++;
                            
                            d = new Date(year, month-1, i);
                            cyear = d.getFullYear();
                            cmonth = prototypes.timeLongItem(d.getMonth()+1);
                            cday = prototypes.timeLongItem(d.getDate());
                            day = Schedule[cyear+'-'+cmonth+'-'+cday] != undefined ? Schedule[cyear+'-'+cmonth+'-'+cday]:methods.defaultDay(methods.weekDay(cyear, cmonth, cday));
                            
                            if (StartMonth == month && StartYear == year && StartDay > d.getDate()){
                                monthHTML.push(methods.initDay('past_day', 
                                                               ID+'_'+cyear+'-'+cmonth+'-'+cday, 
                                                               d.getDate(), 
                                                               '', '', '', '', '', '', 'none'));    
                            }
                            else{
                                monthHTML.push(methods.initDay('curr_month', 
                                                               ID+'_'+cyear+'-'+cmonth+'-'+cday, 
                                                               d.getDate(), 
                                                               day['available'], day['bind'], day['info'], day['notes'], day['price'], day['promo'], day['status']));
                            }
                        }

                        if (totalDays+7 < 42){
                            for (i=1; i<=14-lastDay; i++){
                                d = new Date(year, month, i);
                                cyear = d.getFullYear();
                                cmonth = prototypes.timeLongItem(d.getMonth()+1);
                                cday = prototypes.timeLongItem(d.getDate());
                                day = Schedule[cyear+'-'+cmonth+'-'+cday] != undefined ? Schedule[cyear+'-'+cmonth+'-'+cday]:methods.defaultDay(methods.weekDay(cyear, cmonth, cday));
                            
                                monthHTML.push(methods.initDay('next_month'+(position<noMonths ?  ' hide':''), 
                                                               position<noMonths ? ID+'_'+cyear+'-'+cmonth+'-'+cday+'_next':ID+'_'+cyear+'-'+cmonth+'-'+cday, 
                                                               d.getDate(), 
                                                               day['available'], day['bind'], day['info'], day['notes'], day['price'], day['promo'], day['status']));
                            }
                        }
                        else{
                            for (i=1; i<=7-lastDay; i++){
                                d = new Date(year, month, i);
                                cyear = d.getFullYear();
                                cmonth = prototypes.timeLongItem(d.getMonth()+1);
                                cday = prototypes.timeLongItem(d.getDate());
                                day = Schedule[cyear+'-'+cmonth+'-'+cday] != undefined ? Schedule[cyear+'-'+cmonth+'-'+cday]:methods.defaultDay(methods.weekDay(cyear, cmonth, cday));
                                
                                monthHTML.push(methods.initDay('next_month'+(position<noMonths ?  ' hide':''), 
                                                               position<noMonths ? ID+'_'+cyear+'-'+cmonth+'-'+cday+'_next':ID+'_'+cyear+'-'+cmonth+'-'+cday, 
                                                               d.getDate(), 
                                                               day['available'], day['bind'], day['info'], day['notes'], day['price'], day['promo'], day['status']));
                            }
                        }

                        monthHTML.push('    <br class="DOPBookingSystem_Clear" />');
                        monthHTML.push('</div>');
                        
                        monthHTML.push('<div class="DOPBookingSystem_Hours" id="'+ID+'_'+year+'-'+prototypes.timeLongItem(month)+'_hours"></div>');

                        $('.DOPBookingSystem_Calendar', Container).append(monthHTML.join(''));
                        
                        methods.rpDays();                        
                        methods.initDayEvents();
                    },
                    
                    initDay:function(type, id, day, available, bind, info, notes, price, promo, status){// Init Day
                        var dayHTML = Array(),
                        contentLine1 = '&nbsp;', 
                        contentLine2 = '&nbsp;';
                        
                        dayNo++;
                        
                        if (price > 0 && (bind == 0 || bind == 1)){
                            contentLine1 = Currency+price;
                        }
                                                
                        if (promo > 0 && (bind == 0 || bind == 1)){
                            contentLine1 = Currency+promo;
                        }
                        
                        if (type != 'past_day'){
                            switch (status){
                                case 'available':
                                    type += ' available';
                                    
                                    if (bind == 0 || bind == 1 || HoursEnabled){
                                        if (available > 1){
                                            contentLine2 = available+' '+'<span class="no-available-text">'+AvailableText+'</span>';
                                        }
                                        else if (available == 1){
                                            contentLine2 = available+' '+'<span class="no-available-text">'+AvailableOneText+'</span>';
                                        }
                                        else{
                                            contentLine2 = '<span class="text">'+AvailableOneText+'</span>';
                                        }
                                    }
                                    break;
                                case 'booked':
                                    type += ' booked';
                                    contentLine2 = '<span class="no-available-text">'+BookedText+'</span>';                                    
                                    break;
                                case 'special':
                                    type += ' special';

                                    if (bind == 0 || bind == 1 || HoursEnabled){
                                        if (available > 1){
                                            contentLine2 = available+' '+'<span class="no-available-text">'+AvailableText+'</span>';
                                        }
                                        else if (available == 1){
                                            contentLine2 = available+' '+'<span class="no-available-text">'+AvailableOneText+'</span>';
                                        }
                                    }
                                    break;
                                case 'unavailable':
                                    type += ' unavailable';
                                    contentLine2 = '<span class="no-available-text">'+UnavailableText+'</span>';
                                    break;
                            }
                        }
                        
                        if (dayNo % 7 == 1){
                            type += ' first-column';
                        }
                        
                        if (dayNo % 7 == 0){
                            type += ' last-column';
                        }
                        
                        dayHTML.push('<div class="DOPBookingSystem_Day '+type+'" id="'+id+'">');
                        dayHTML.push('    <div class="bind-left'+((bind == 2 || bind == 3) && (status == 'available' || status == 'special') && !HoursEnabled ? ' enabled':'')+(dayPreviousBind == 3 && MorningCheckOut && (dayPreviousStatus == 'available' || dayPreviousStatus == 'special') && !HoursEnabled ? ' extended '+dayPreviousStatus:'')+'">');
                        dayHTML.push('        <div class="header">&nbsp;</div>');
                        dayHTML.push('        <div class="content">&nbsp;</div>');
                        dayHTML.push('    </div>');                        
                        dayHTML.push('    <div class="bind-content group'+((status == 'available' || status == 'special') && !HoursEnabled ? bind:'0')+(bind == 3 && MorningCheckOut && (status == 'available' || status == 'special') && !HoursEnabled ? ' extended':'')+(dayPreviousBind == 3 && MorningCheckOut && (dayPreviousStatus == 'available' || dayPreviousStatus == 'special') && !HoursEnabled ? ' extended':'')+'">');
                        dayHTML.push('        <div class="header">');
                        dayHTML.push('            <div class="co '+(MorningCheckOut ? dayPreviousStatus:status)+'"></div>');
                        dayHTML.push('            <div class="ci '+status+'"></div>');
                        dayHTML.push('            <div class="day">'+day+'</div>');
                       
                        if (info != '' && type != 'past_day'){
                            switch (status){
                                case 'available':
                                    if (bind == 0 || bind == 3 || HoursEnabled){
                                        dayHTML.push('            <div class="info" id="'+id+'_info"></div>');
                                    }
                                    break;
                                case 'booked':
                                    dayHTML.push('            <div class="info" id="'+id+'_info"></div>');                                   
                                    break;
                                case 'special':
                                    if (bind == 0 || bind == 3 || HoursEnabled){
                                        dayHTML.push('            <div class="info" id="'+id+'_info"></div>');
                                    }
                                    break;
                                case 'unavailable':
                                    dayHTML.push('            <div class="info" id="'+id+'_info"></div>');
                                    break;
                            }
                        }
                        
                        dayHTML.push('            <br class="DOPBookingSystem_Clear" />');
                        dayHTML.push('        </div>');
                        dayHTML.push('        <div class="content">');
                        dayHTML.push('            <div class="co '+(MorningCheckOut ? dayPreviousStatus:status)+'"></div>');
                        dayHTML.push('            <div class="ci '+status+'"></div>');
                        dayHTML.push('            <div class="price">'+contentLine1+'</div>');
                        
                        if (promo > 0 && (bind == 0 || bind == 1)){
                            dayHTML.push('            <div class="old-price">'+Currency+price+'</div>');
                        }
                        dayHTML.push('            <br class="DOPBookingSystem_Clear" />');
                        dayHTML.push('            <div class="available">'+contentLine2+'</div>');
                        dayHTML.push('        </div>');  
                        dayHTML.push('    </div>');
                        dayHTML.push('    <div class="bind-right'+((bind == 1 || bind == 2) && (status == 'available' || status == 'special') && !HoursEnabled ? ' enabled':'')+(bind == 3 && MorningCheckOut && (status == 'available' || status == 'special') && !HoursEnabled ? ' extended':'')+'">');
                        dayHTML.push('        <div class="header">&nbsp;</div>');
                        dayHTML.push('        <div class="content">&nbsp;</div>');
                        dayHTML.push('    </div>');
                        dayHTML.push('</div>');
                        
                        if (type != 'past_day'){
                            dayPreviousStatus = status;
                            dayPreviousBind = bind;
                        }
                        else{
                            dayPreviousStatus = 'none';
                            dayPreviousBind = 0;
                        }
                        
                        return dayHTML.join('');
                    },                    
                    defaultDay:function(day){
                        return {"available": "",
                                "bind": "0",
                                "info": "",
                                "hours_definitions": HoursDefinitions,
                                "hours": {},
                                "notes": "",
                                "price": "", 
                                "promo": "",
                                "status": AvailableDays[day] ? "none":"unavailable"}
                    },
                    rpDays:function(){
                        var maxHeight = 0,
                        hiddenBustedItems = prototypes.doHideBuster($(Container));
                        
                        $('.DOPBookingSystem_Day .content', Container).removeAttr('style');
                       
                        $('.DOPBookingSystem_Day', Container).width(parseInt(($('.DOPBookingSystem_Month', Container).width()-parseInt($('.DOPBookingSystem_Month', Container).css('padding-left'))+parseInt($('.DOPBookingSystem_Month', Container).css('padding-right')))/7));
                        $('.DOPBookingSystem_Day .bind-content', Container).width($('.DOPBookingSystem_Day', Container).width()-2);
                      
                        if ($('.DOPBookingSystem_Day', Container).width() <= 70){
                            $('.DOPBookingSystem_Day .no-available-text', Container).css('display', 'none');
                        }
                        else{
                            $('.DOPBookingSystem_Day .no-available-text', Container).css('display', 'inline');
                        }
                        
                        if ($('.DOPBookingSystem_Day', Container).width() <= 40){
                            $('.DOPBookingSystem_Day .bind-content .header .info', Container).css('display', 'none');
                            $('.DOPBookingSystem_Day .bind-left .content', Container).css('display', 'none');
                            $('.DOPBookingSystem_Day .bind-content .content', Container).css('display', 'none');
                            $('.DOPBookingSystem_Day .bind-right .content', Container).css('display', 'none');
                        }
                        else{
                            $('.DOPBookingSystem_Day .bind-content .header .info', Container).css('display', 'block');
                            $('.DOPBookingSystem_Day .bind-left .content', Container).removeAttr('style');
                            $('.DOPBookingSystem_Day .bind-content .content', Container).removeAttr('style');
                            $('.DOPBookingSystem_Day .bind-right .content', Container).removeAttr('style');
                        }
                        
                        $('.DOPBookingSystem_Day .bind-content .content', Container).each(function(){
                            if (maxHeight < $(this).height()){
                                maxHeight = $(this).height();
                            }
                        });
                        
                        $('.DOPBookingSystem_Day .content', Container).height(maxHeight);
                        
                        prototypes.undoHideBuster(hiddenBustedItems);
                    },                    
                    initDayEvents:function(){// Init Events for the days of the Calendar.
//Calendar Day click event. 
                        if (!ViewOnly){
                            $('.DOPBookingSystem_Day', Container).unbind('click');
                            $('.DOPBookingSystem_Day', Container).bind('click', function(){
                                var day = $(this),
                                dayThis = this,
                                auxDate, sDate, sYear, sMonth, sDay,
                                stopGroup = false, startDate, endDate, startDateBoogie, endDateBoogie,
                                maxHeight = 0,
                                minDateValue = 0;

                                if (HoursEnabled){
                                    if (!day.hasClass('mask') && !day.hasClass('past_day') && !day.hasClass('unavailable') && !day.hasClass('booked')){
                                        methods.resetSidebar();
                                        day.addClass('selected');
                                        dayTimeDisplay = true;
                                        dayStartSelection = day.attr('id');
                                        methods.initHours(day.attr('id'));
                                    }

                                    $('.DOPBookingSystem_Day .content', Container).each(function(){
                                        if (maxHeight < $(this).height()){
                                            maxHeight = $(this).height();
                                        }
                                    });
                                    $('.DOPBookingSystem_Day .content', Container).height(maxHeight);
                                }
                                else{
                                    setTimeout(function(){
                                        if (!dayTimeDisplay){
                                            if ((day.hasClass('available') || day.hasClass('special')) || 
                                                (($('.header .ci', dayThis).hasClass('available') || $('.header .ci', dayThis).hasClass('special') || $('.header .co', dayThis).hasClass('available') || $('.header .co', dayThis).hasClass('special')) && dayFirstSelected && MorningCheckOut)){

                                                if (!MultipleDaysSelect && $('.bind-content', dayThis).hasClass('group0')){
                                                    methods.resetSidebar();
                                                    dayFirstSelected = false;
                                                    dayStartSelection = day.attr('id');
                                                    dayEndSelection = day.attr('id');
                                                    $('#DOPBookingSystem_CheckIn'+ID).val(dayStartSelection.split('_')[1]);
                                                    $('#DOPBookingSystem_CheckInView'+ID).val(DateType == 1 ? 
                                                                                                 MonthNames[parseInt((dayStartSelection.split('_')[1]).split('-')[1], 10)-1]+' '+(dayStartSelection.split('_')[1]).split('-')[2]+', '+(dayStartSelection.split('_')[1]).split('-')[0]:
                                                                                                 (dayStartSelection.split('_')[1]).split('-')[2]+' '+MonthNames[parseInt((dayStartSelection.split('_')[1]).split('-')[1], 10)-1]+' '+(dayStartSelection.split('_')[1]).split('-')[0]);
                                                    methods.calculateDaysPrice();
                                                }
                                                else if (MultipleDaysSelect && 
                                                         (!MorningCheckOut && $('.bind-content', dayThis).hasClass('group0') || 
                                                          MorningCheckOut && !dayFirstSelected && $('.bind-content', dayThis).hasClass('group0') ||
                                                          MorningCheckOut && dayFirstSelected && ($('.bind-content', dayThis).hasClass('group0') || $('.bind-content', dayThis).hasClass('group1')))){

                                                    if (!dayFirstSelected){
                                                        methods.resetSidebar();                                                    
                                                        dayFirstSelected = true;
                                                        dayStartSelection = day.attr('id');
                                                        methods.showDaySelection(day.attr('id'));
                                                    }
                                                    else if (((day.hasClass('available') || day.hasClass('special')) && !MorningCheckOut) || 
                                                             ((day.hasClass('available') || day.hasClass('special') || $('.header .ci', dayThis).hasClass('available') || $('.header .ci', dayThis).hasClass('special') || $('.header .co', dayThis).hasClass('available') || $('.header .co', dayThis).hasClass('special')) && MorningCheckOut && dayStartSelection != day.attr('id'))){

                                                        startDateBoogie = dayStartSelection.split('_')[1];
                                                        endDateBoogie = day.attr('id').split('_')[1];

                                                        if (prototypes.isTouchDevice()){
                                                            methods.showDaySelection(day.attr('id'));
                                                        }

                                                        if (day.hasClass('selected')){
                                                            startDate = dayStartSelection.split('_')[1];
                                                            endDate = day.attr('id').split('_')[1];

                                                            if (MinStay+(MorningCheckOut ? 1:0) <= prototypes.noDays(new Date(startDate.split('-')[0], startDate.split('-')[1]-1, startDate.split('-')[2]), new Date(endDate.split('-')[0], endDate.split('-')[1]-1, endDate.split('-')[2]))){
                                                                dayFirstSelected = false;
                                                                dayEndSelection = day.attr('id');
                                                                $('#DOPBookingSystem_CheckOutView'+ID).removeAttr('disabled');

                                                                if (dayStartSelection > dayEndSelection){
                                                                    auxDate = dayStartSelection;
                                                                    dayStartSelection = dayEndSelection;
                                                                    dayEndSelection = auxDate;
                                                                }

                                                                sDate = dayStartSelection.split('_')[1];
                                                                sYear = sDate.split('-')[0];
                                                                sMonth = sDate.split('-')[1];
                                                                sDay = sDate.split('-')[2];
                                                                minDateValue = StartYear == sYear && StartMonth-1 == parseInt(sMonth, 10)-1 && StartDay == parseInt(sDay, 10)+MinStay-1 ? (MorningCheckOut ? 1:0):prototypes.dateDiference(new Date(), new Date(sYear, parseInt(sMonth, 10)-1, parseInt(sDay, 10)+MinStay-(MorningCheckOut ? 0:1)));


                                                                $('#DOPBookingSystem_CheckIn'+ID).val(dayStartSelection.split('_')[1]);
                                                                $('#DOPBookingSystem_CheckOut'+ID).val(dayEndSelection.split('_')[1]);

                                                                $('#DOPBookingSystem_CheckInView'+ID).val(DateType == 1 ? 
                                                                                                             MonthNames[parseInt((dayStartSelection.split('_')[1]).split('-')[1], 10)-1]+' '+(dayStartSelection.split('_')[1]).split('-')[2]+', '+(dayStartSelection.split('_')[1]).split('-')[0]:
                                                                                                             (dayStartSelection.split('_')[1]).split('-')[2]+' '+MonthNames[parseInt((dayStartSelection.split('_')[1]).split('-')[1], 10)-1]+' '+(dayStartSelection.split('_')[1]).split('-')[0]);
                                                                $('#DOPBookingSystem_CheckOutView'+ID).val(DateType == 1 ? 
                                                                                                              MonthNames[parseInt((dayEndSelection.split('_')[1]).split('-')[1], 10)-1]+' '+(dayEndSelection.split('_')[1]).split('-')[2]+', '+(dayEndSelection.split('_')[1]).split('-')[0]:
                                                                                                              (dayEndSelection.split('_')[1]).split('-')[2]+' '+MonthNames[parseInt((dayEndSelection.split('_')[1]).split('-')[1], 10)-1]+' '+(dayEndSelection.split('_')[1]).split('-')[0]);

                                                                $('#DOPBookingSystem_CheckOutView'+ID).datepicker('destroy');

                                                                if (MaxStay == 0){
                                                                    $('#DOPBookingSystem_CheckOutView'+ID).datepicker({minDate: minDateValue, 
                                                                                                                          dateFormat: DateType == 1 ? 'MM dd, yy':'dd MM yy',
                                                                                                                          altField: '#DOPBookingSystem_CheckOut'+ID,
                                                                                                                          altFormat: 'yy-mm-dd',
                                                                                                                          firstDay: FirstDay,
                                                                                                                          dayNames: DayNames,
                                                                                                                          dayNamesMin: DayShortNames,
                                                                                                                          monthNames: MonthNames,
                                                                                                                          monthNamesMin: MonthShortNames});
                                                                }
                                                                else{
                                                                    $('#DOPBookingSystem_CheckOutView'+ID).datepicker({minDate: minDateValue, 
                                                                                                                          maxDate: prototypes.dateDiference(new Date(), new Date(sYear, parseInt(sMonth, 10)-1, parseInt(sDay, 10)+MaxStay-(MorningCheckOut ? 0:1))), 
                                                                                                                          dateFormat: DateType == 1 ? 'MM dd, yy':'dd MM yy',
                                                                                                                          altField: '#DOPBookingSystem_CheckOut'+ID,
                                                                                                                          altFormat: 'yy-mm-dd',
                                                                                                                          firstDay: FirstDay,
                                                                                                                          dayNames: DayNames,
                                                                                                                          dayNamesMin: DayShortNames,
                                                                                                                          monthNames: MonthNames,
                                                                                                                          monthNamesMin: MonthShortNames}); 
                                                                }
                                                                $('.ui-datepicker').removeClass('notranslate').addClass('notranslate');

                                                                methods.calculateDaysPrice();
                                                            }
                                                            else{
                                                                methods.unavailableSidebar(MinStayWarning+', '+MinStay+'.');
                                                                dayFirstSelected = false;
                                                                $('.DOPBookingSystem_Day', Container).removeClass('selected');
                                                                $('.DOPBookingSystem_Day', Container).removeClass('first');
                                                                $('.DOPBookingSystem_Day', Container).removeClass('last');
                                                            }
                                                        }
                                                        else if(MaxStay != 0 && MaxStay+(MorningCheckOut ? 1:0) <= prototypes.noDays(new Date(startDateBoogie.split('-')[0], startDateBoogie.split('-')[1]-1, startDateBoogie.split('-')[2]), new Date(endDateBoogie.split('-')[0], endDateBoogie.split('-')[1]-1, endDateBoogie.split('-')[2]))){
                                                            methods.unavailableSidebar(MaxStayWarning+', '+MaxStay+'.');
                                                            dayFirstSelected = false;
                                                            $('.DOPBookingSystem_Day', Container).removeClass('selected');
                                                            $('.DOPBookingSystem_Day', Container).removeClass('first');
                                                            $('.DOPBookingSystem_Day', Container).removeClass('last');
                                                        }
                                                    }
                                                }
                                                else if (MultipleDaysSelect && !dayFirstSelected && !$('.bind-content', dayThis).hasClass('group0')){
                                                    $('.DOPBookingSystem_Day', Container).removeClass('selected');
                                                    $('.DOPBookingSystem_Day', Container).removeClass('first');
                                                    $('.DOPBookingSystem_Day', Container).removeClass('last');

                                                    if ($('.bind-content', dayThis).hasClass('group1')){
                                                        dayStartSelection = day.attr('id');          

                                                        $('.DOPBookingSystem_Day', Container).each(function(){
                                                            if ($(this).attr('id') >= dayStartSelection && $('.bind-content', this).hasClass('group3') && !stopGroup){
                                                                stopGroup = true;
                                                                dayEndSelection = $(this).attr('id');

                                                                if (MorningCheckOut && stopGroup){

                                                                }
                                                            }
                                                        });
                                                    }
                                                    else if ($('.bind-content', dayThis).hasClass('group3')){
                                                        dayEndSelection = day.attr('id');

                                                        $($('.DOPBookingSystem_Day', Container).get().reverse()).each(function(){
                                                            if ($(this).attr('id') <= dayEndSelection  && $('.bind-content', this).hasClass('group1') && !stopGroup){
                                                                stopGroup = true;
                                                                dayStartSelection = $(this).attr('id');
                                                            }
                                                        });
                                                    }
                                                    else if ($('.bind-content', dayThis).hasClass('group2')){                                                                                                    
                                                        $($('.DOPBookingSystem_Day', Container).get().reverse()).each(function(){
                                                            if ($(this).attr('id') <= day.attr('id')  && $('.bind-content', this).hasClass('group1') && !stopGroup){
                                                                stopGroup = true;
                                                                dayStartSelection = $(this).attr('id');
                                                            }
                                                        });

                                                        if (stopGroup){
                                                            stopGroup = false;

                                                            $('.DOPBookingSystem_Day', Container).each(function(){
                                                                if ($(this).attr('id') >= day.attr('id') && $('.bind-content', this).hasClass('group3') && !stopGroup){
                                                                    stopGroup = true;
                                                                    dayEndSelection = $(this).attr('id');
                                                                }
                                                            });
                                                        }
                                                    }

                                                    if (MorningCheckOut){  
                                                        endDateBoogie = dayEndSelection;

                                                        $($('.DOPBookingSystem_Day', Container).get().reverse()).each(function(){
                                                            if ($(this).attr('id') > endDateBoogie){
                                                                dayEndSelection = $(this).attr('id');
                                                            }
                                                        });
                                                    }

                                                    if (stopGroup){
                                                        sDate = dayStartSelection.split('_')[1];
                                                        sYear = sDate.split('-')[0];
                                                        sMonth = sDate.split('-')[1];
                                                        sDay = sDate.split('-')[2];
                                                        minDateValue = StartYear == sYear && StartMonth-1 == parseInt(sMonth, 10)-1 && StartDay == parseInt(sDay, 10)+MinStay-1 ? (MorningCheckOut ? 1:0):prototypes.dateDiference(new Date(), new Date(sYear, parseInt(sMonth, 10)-1, parseInt(sDay, 10)+MinStay-1));

                                                        $('#DOPBookingSystem_CheckIn'+ID).val(dayStartSelection.split('_')[1]);
                                                        $('#DOPBookingSystem_CheckOut'+ID).val(dayEndSelection.split('_')[1]);

                                                        $('#DOPBookingSystem_CheckInView'+ID).val(DateType == 1 ? 
                                                                                                     MonthNames[parseInt((dayStartSelection.split('_')[1]).split('-')[1], 10)-1]+' '+(dayStartSelection.split('_')[1]).split('-')[2]+', '+(dayStartSelection.split('_')[1]).split('-')[0]:
                                                                                                     (dayStartSelection.split('_')[1]).split('-')[2]+' '+MonthNames[parseInt((dayStartSelection.split('_')[1]).split('-')[1], 10)-1]+' '+(dayStartSelection.split('_')[1]).split('-')[0]);
                                                        $('#DOPBookingSystem_CheckOutView'+ID).val(DateType == 1 ? 
                                                                                                      MonthNames[parseInt((dayEndSelection.split('_')[1]).split('-')[1], 10)-1]+' '+(dayEndSelection.split('_')[1]).split('-')[2]+', '+(dayEndSelection.split('_')[1]).split('-')[0]:
                                                                                                      (dayEndSelection.split('_')[1]).split('-')[2]+' '+MonthNames[parseInt((dayEndSelection.split('_')[1]).split('-')[1], 10)-1]+' '+(dayEndSelection.split('_')[1]).split('-')[0]);

                                                        $('#DOPBookingSystem_CheckOut'+ID).datepicker('destroy');

                                                        if (MaxStay == 0){
                                                            $('#DOPBookingSystem_CheckOutView'+ID).datepicker({minDate: minDateValue, 
                                                                                                                  dateFormat: DateType == 1 ? 'MM dd, yy':'dd MM yy',
                                                                                                                  altField: '#DOPBookingSystem_CheckOut'+ID,
                                                                                                                  altFormat: 'yy-mm-dd',
                                                                                                                  firstDay: FirstDay,
                                                                                                                  dayNames: DayNames,
                                                                                                                  dayNamesMin: DayShortNames,
                                                                                                                  monthNames: MonthNames,
                                                                                                                  monthNamesMin: MonthShortNames});
                                                        }
                                                        else{
                                                            $('#DOPBookingSystem_CheckOutView'+ID).datepicker({minDate: minDateValue, 
                                                                                                                  maxDate: prototypes.dateDiference(new Date(), new Date(sYear, parseInt(sMonth, 10)-1, parseInt(sDay, 10)+MaxStay-(MorningCheckOut ? 0:1))), 
                                                                                                                  dateFormat: DateType == 1 ? 'MM dd, yy':'dd MM yy',
                                                                                                                  altField: '#DOPBookingSystem_CheckOut'+ID,
                                                                                                                  altFormat: 'yy-mm-dd',
                                                                                                                  firstDay: FirstDay,
                                                                                                                  dayNames: DayNames,
                                                                                                                  dayNamesMin: DayShortNames,
                                                                                                                  monthNames: MonthNames,
                                                                                                                  monthNamesMin: MonthShortNames}); 
                                                        }
                                                        $('.ui-datepicker').removeClass('notranslate').addClass('notranslate');

                                                        methods.calculateDaysPrice();
                                                    }
                                                }
                                            }
                                        }
                                        else{
                                            dayTimeDisplay = false;
                                        }
                                    }, 10);
                                }
                            });
                        }
                        else{
                            $('.DOPBookingSystem_Day .co', Container).css('cursor', 'default');
                            $('.DOPBookingSystem_Day .ci', Container).css('cursor', 'default');
                        }
                        
// Info icon events.
                        if (!prototypes.isTouchDevice()){
                            if (!ViewOnly){
                                $('.DOPBookingSystem_Day', Container).hover(function(){
                                    var day = $(this);

                                    if (dayFirstSelected){
                                        methods.showDaySelection(day.attr('id'));
                                    }
                                });
                            }

                            $('.DOPBookingSystem_Day .info', Container).hover(function(){
                                methods.showInfo($(this).attr('id').split('_')[1], '', 'info');
                            }, function(){
                                methods.hideInfo();
                            });
                        }
                        else{
                            var xPos = 0, yPos = 0, touch;
                            
                            $('.DOPBookingSystem_Day .info', Container).unbind('touchstart');
                            $('.DOPBookingSystem_Day .info', Container).bind('touchstart', function(e){
                                e.preventDefault();
                                touch = e.originalEvent.touches[0];
                                xPos = touch.clientX+$(document).scrollLeft();
                                yPos = touch.clientY+$(document).scrollTop();
                                $('#DOPBookingSystem_Info'+ID).css({'left': xPos, 'top': yPos});
                                methods.showInfo($(this).attr('id').split('_')[1], '', 'info');
                            });
                        }
                    },
                    showDaySelection:function(id){
                        var day, dayThis, maxHeight = 0,
                        notAvailable = false,
                        noDays = 0, startDate, endDate,
                        nextDay = undefined, previousDay = undefined;
                        
                        $('.DOPBookingSystem_Day', Container).removeClass('selected');
                        $('.DOPBookingSystem_Day', Container).removeClass('first');
                        $('.DOPBookingSystem_Day', Container).removeClass('last');
                                            
                        if (id < dayStartSelection){
                            endDate = dayStartSelection.split('_')[1];
                            
                            $($('.DOPBookingSystem_Day', Container).get().reverse()).each(function(){
                                if ($(this).attr('id').split('_').length == 2){
                                    day = $(this);
                                    dayThis = this;
                                    startDate = day.attr('id').split('_')[1];
                                    noDays = prototypes.noDays(new Date(startDate.split('-')[0], startDate.split('-')[1]-1, startDate.split('-')[2]), new Date(endDate.split('-')[0], endDate.split('-')[1]-1, endDate.split('-')[2]));

                                    if (day.attr('id') <= dayStartSelection && 
                                        (!day.hasClass('available') && !$('.header .ci', dayThis).hasClass('available') && !day.hasClass('special') && !$('.header .ci', dayThis).hasClass('special') || !$('.bind-content', dayThis).hasClass('group0'))){
                                        
                                        notAvailable = true;
                                    }

                                    if (((day.attr('id') >= id && day.attr('id') <= dayStartSelection && !notAvailable && (noDays <= MaxStay+(MorningCheckOut ? 1:0) || MaxStay == 0)) ||
                                        (day.attr('id') <= dayStartSelection && !notAvailable && noDays <= MinStay+(MorningCheckOut ? 1:0))) &&
                                         (day.hasClass('available') || $('.header .co', dayThis).hasClass('available') || day.hasClass('special') || $('.header .co', dayThis).hasClass('special'))){
                                         
                                        day.addClass('selected');

                                        if (MorningCheckOut){
                                            if (day.attr('id') == dayStartSelection){
                                                day.addClass('last');
                                            }

                                            if (day.attr('id') != dayStartSelection){
                                                day.addClass('first');

                                                if (nextDay != undefined){
                                                    nextDay.removeClass('first');
                                                }
                                                nextDay = day;
                                            }
                                        }
                                    }
                                }
                            });
                        }
                        else{
                            startDate = dayStartSelection.split('_')[1];
                            
                            $('.DOPBookingSystem_Day', Container).each(function(){
                                if ($(this).attr('id').split('_').length == 2){
                                    day = $(this);  
                                    dayThis = this;
                                    endDate = day.attr('id').split('_')[1];
                                    noDays = prototypes.noDays(new Date(startDate.split('-')[0], startDate.split('-')[1]-1, startDate.split('-')[2]), new Date(endDate.split('-')[0], endDate.split('-')[1]-1, endDate.split('-')[2]));

                                    if (day.attr('id') >= dayStartSelection && 
                                        (!day.hasClass('available') && !$('.header .co', dayThis).hasClass('available') && !day.hasClass('special') && !$('.header .co', dayThis).hasClass('special') || (!MorningCheckOut && !$('.bind-content', dayThis).hasClass('group0')) || (MorningCheckOut && !$('.bind-content', dayThis).hasClass('group0') && !$('.bind-content', dayThis).hasClass('group1')))){
                                        
                                        notAvailable = true;
                                    }

                                    if (((day.attr('id') >= dayStartSelection && day.attr('id') <= id && (noDays <= MaxStay+(MorningCheckOut ? 1:0) || MaxStay == 0)) ||
                                         (day.attr('id') >= dayStartSelection && noDays <= MinStay+(MorningCheckOut ? 1:0))) &&
                                        (day.hasClass('available') || $('.header .co', dayThis).hasClass('available') || day.hasClass('special') || $('.header .co', dayThis).hasClass('special')) && 
                                        !notAvailable){
                                        
                                        day.addClass('selected');

                                        if (MorningCheckOut){
                                            if (day.attr('id') == dayStartSelection){
                                                day.addClass('first');
                                            }

                                            if (day.attr('id') != dayStartSelection){
                                                day.addClass('last');

                                                if (previousDay != undefined){
                                                    previousDay.removeClass('last');
                                                }
                                                previousDay = day;
                                            }
                                        }
                                    }
                                    
                                    if (day.attr('id') >= dayStartSelection && MorningCheckOut && 
                                        (!day.hasClass('available') && !day.hasClass('special') || !$('.bind-content', dayThis).hasClass('group0'))){
                                        
                                        notAvailable = true;
                                    }
                                }
                            });
                        }
                        
                        $('.DOPBookingSystem_Day .content', Container).each(function(){
                            if (maxHeight < $(this).height()){
                                maxHeight = $(this).height();
                            }
                        });
                        
                        $('.DOPBookingSystem_Day .content', Container).height(maxHeight);
                    },
                                        
                    initHours:function(id){
                        var HTML = new Array(), i,
                        hoursDef = HoursDefinitions,
                        date = id.split('_')[1],
                        year = date.split('-')[0],
                        month = date.split('-')[1],
                        day = date.split('-')[2],
                        hour, hoursContainer,
                        currTime = new Date(),
                        currHour = currTime.getHours(),
                        currMin = currTime.getMinutes(),
                        hoursHTML = new Array();
                        
                        hourDaySelection = id;
                        
                        $('.DOPBookingSystem_Day', Container).removeClass('selected');
                        methods.rpDays();
                        $('#'+id).addClass('selected');
                        $('.DOPBookingSystem_Day.selected .header', Container).removeAttr('style');
                        $('.DOPBookingSystem_Day.selected .content', Container).removeAttr('style');
                        $('#DOPBookingSystem_CheckIn'+ID).val(date);
                        $('#DOPBookingSystem_CheckInView'+ID).val(DateType == 1 ? 
                                                                     MonthNames[parseInt(date.split('-')[1], 10)-1]+' '+date.split('-')[2]+', '+date.split('-')[0]:
                                                                     date.split('-')[2]+' '+MonthNames[parseInt(date.split('-')[1], 10)-1]+' '+date.split('-')[0]);
                        $('#DOPBookingSystem_HoursSelect'+ID).css('display', 'block');

                        if (Schedule[date] != undefined){
                            hoursDef = Schedule[date]['hours_definitions'];
                        }   
                        hoursHTML.push('<option value=""></option>');                        
                        
                        for (i=0; i<hoursDef.length; i++){
                            if (Schedule[date] != undefined && Schedule[date]['hours'][hoursDef[i]['value']] != undefined){
                                hour = Schedule[date]['hours'][hoursDef[i]['value']];
                            }
                            else{
                                hour = methods.defaultHour();
                            }
                            
                            if (hoursDef[i]['value'] < prototypes.timeLongItem(currHour)+':'+prototypes.timeLongItem(currMin) && StartYear+'-'+prototypes.timeLongItem(StartMonth)+'-'+prototypes.timeLongItem(StartDay) == year+'-'+month+'-'+day){                                
                                HTML.push(methods.initHour(ID+'_'+hoursDef[i]['value'].split(':')[0]+'-'+hoursDef[i]['value'].split(':')[1],
                                                           hoursDef[i]['value'],
                                                           hour['available'], hour['bind'], hour['info'], hour['notes'], hour['price'], hour['promo'], 'past_hour', hoursDef));
                            }
                            else{
                                hoursHTML.push('<option value="'+hoursDef[i]['value']+'">'+(HoursAMPM ? prototypes.timeToAMPM(hoursDef[i]['value']):hoursDef[i]['value'])+'</option>');
                                HTML.push(methods.initHour(ID+'_'+hoursDef[i]['value'].split(':')[0]+'-'+hoursDef[i]['value'].split(':')[1],
                                                           hoursDef[i]['value'],
                                                           hour['available'], hour['bind'], hour['info'], hour['notes'], hour['price'], hour['promo'], hour['status'], hoursDef));
                            }
                        }   
                        
                        $('#DOPBookingSystem_StartHour'+ID).html(hoursHTML.join(''));
                        
                        if (MultipleHoursSelect){
                            $('#DOPBookingSystem_EndHour'+ID).html(hoursHTML.join(''));
                        }                        
                        
                        if ($('#'+id).hasClass('next_month')){  
                            $('.DOPBookingSystem_Hours', Container).each(function(){
                                hoursContainer = $(this);
                            });
                            hoursContainer.html(HTML.join(''));
                        }
                        else if ($('#'+id).hasClass('last_month')){
                            $($('.DOPBookingSystem_Hours', Container).get().reverse()).each(function(){
                                hoursContainer = $(this);
                            });
                            hoursContainer.html(HTML.join(''));
                        }
                        else{
                            $('#'+ID+'_'+year+'-'+month+'_hours').html(HTML.join(''));
                        }
                            
                        methods.initHourEvents();
                        methods.initSidebarHours();
                    },
                    initHour:function(id, hour, available, bind, info, notes, price, promo, status, hoursDef){
                        var hourHTML = new Array(),
                        priceContent = '&nbsp;',
                        availableContent = '&nbsp;',
                        type = '';
                        
                        if (status != 'past_hour'){
                            if (price > 0 && (bind == 0 || bind == 1)){
                                priceContent = Currency+price;
                            }

                            if (promo > 0 && (bind == 0 || bind == 1)){
                                priceContent = Currency+promo;
                            }

                            switch (status){
                                case 'available':
                                    type += ' available';
                                    
                                    if (bind == 0 || bind == 1){
                                        if (available > 1){
                                            availableContent = available+' '+AvailableText;
                                        }
                                        else if (available == 1){
                                            availableContent = available+' '+AvailableOneText;
                                        }
                                        else{
                                            availableContent = AvailableOneText;
                                        }
                                    }
                                    break;
                                case 'booked':
                                    type += ' booked';
                                    
                                    if (bind == 0 || bind == 1){
                                        availableContent = BookedText;
                                    }
                                    break;
                                case 'special':
                                    type += ' special';

                                    if (bind == 0 || bind == 1){
                                        if (available > 1){
                                            availableContent = available+' '+AvailableText;
                                        }
                                        else if (available == 1){
                                            availableContent = available+' '+AvailableOneText;
                                        }
                                    }
                                    break;
                                case 'unavailable':
                                    type += ' unavailable';
                                    
                                    if (bind == 0 || bind == 1){
                                        availableContent = UnavailableText;  
                                    }
                                    break;
                            }
                        }
                        else{
                            type = ' '+status;
                        }
            
                        hourHTML.push('<div class="DOPBookingSystem_Hour'+type+'" id="'+id+'">');
                        hourHTML.push('    <div class="bind-top'+((bind == 2 || bind == 3) && (status == 'available' || status == 'special') ? '  enabled':'')+'"><div class="hour">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><br class="DOPBookingSystem_Clear" /></div>');                        
                        hourHTML.push('    <div class="bind-content group'+(status == 'available' || status == 'special' ? bind:'0')+'">');
                        hourHTML.push('        <div class="hour">'+(HoursAMPM ? prototypes.timeToAMPM(hour):hour)+(HoursIntervalEnabled ? ' - '+(HoursAMPM ? prototypes.timeToAMPM(prototypes.previousTime(methods.nextHour(hour, hoursDef), 1, 'minutes')):prototypes.previousTime(methods.nextHour(hour, hoursDef), 1, 'minutes')):'')+'</div>');
                        
                        if (price > 0 && type != 'past_hour' && (bind == 0 || bind == 1)){
                            hourHTML.push('        <div class="'+(promo > 0 ? 'price-promo':'price')+'">'+priceContent+'</div>');      
                        }
                        
                        if (promo > 0 && type != 'past_hour' && (bind == 0 || bind == 1)){                                      
                            hourHTML.push('        <div class="old-price">'+Currency+price+'</div>');
                        }                        
                        hourHTML.push('        <div class="available">'+availableContent+'</div>');
                                                
                        if (info != '' && type != 'past_hour' && (bind == 0 || bind == 1)){
                            hourHTML.push('        <div class="info" id="'+id+'_info"></div>');
                        }
                        hourHTML.push('        <br class="DOPBookingSystem_Clear" />');
                        hourHTML.push('    </div>');
                        hourHTML.push('    <div class="bind-bottom'+((bind == 1 || bind == 2) && (status == 'available' || status == 'special') ? '  enabled':'')+'"><div class="hour">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><br class="DOPBookingSystem_Clear" /></div>');
                        hourHTML.push('</div>');
                        
                        return hourHTML.join('');
                    },                    
                    defaultHour:function(){
                        return {"available": "",
                                "bind": "0",
                                "info": "",
                                "notes": "",
                                "price": "", 
                                "promo": "",
                                "status": "none"}
                    },
                    initHourEvents:function(){// Init Events for the days of the Calendar.                        
                        $('.DOPBookingSystem_Hour', Container).unbind('click');
                        $('.DOPBookingSystem_Hour', Container).bind('click', function(){
                            var hour = $(this),
                            hourThis = this, sHour, eHour,
                            auxHour, stopGroup = false;
                                
                            setTimeout(function(){
                                if (hour.hasClass('available') || hour.hasClass('special')){
                                    if (!MultipleHoursSelect && $('.bind-content', hourThis).hasClass('group0')){
                                        $('.DOPBookingSystem_Hour', Container).removeClass('selected');
                                        methods.hideForm();
                                        methods.selectHourValue('#DOPBookingSystem_StartHour'+ID, '');

                                        if (MultipleHoursSelect){
                                            $('#DOPBookingSystem_EndHour'+ID).html($('#DOPBookingSystem_StartHour'+ID).html());
                                            methods.selectHourValue('#DOPBookingSystem_EndHour'+ID, '');
                                        }
                                        hourFirstSelected = false;
                                        hourStartSelection = hour.attr('id');
                                        hourEndSelection = hour.attr('id');
                                                                                
                                        sHour = hourStartSelection.split('_')[1];
                                        eHour = hourEndSelection.split('_')[1];
                                        
                                        methods.selectHourValue('#DOPBookingSystem_StartHour'+ID, sHour.split('-')[0]+':'+sHour.split('-')[1]);
                                        methods.calculateHoursPrice();
                                    }
                                    else if (MultipleHoursSelect && $('.bind-content', hourThis).hasClass('group0')){
                                        if (!hourFirstSelected){
                                            methods.hideForm();
                                            methods.selectHourValue('#DOPBookingSystem_StartHour'+ID, '');

                                            if (MultipleHoursSelect){
                                                $('#DOPBookingSystem_EndHour'+ID).html($('#DOPBookingSystem_StartHour'+ID).html());
                                                methods.selectHourValue('#DOPBookingSystem_EndHour'+ID, '');
                                            }
                                            hourFirstSelected = true;
                                            hourStartSelection = hour.attr('id');
                                            methods.showHourSelection(hour.attr('id'));
                                        }
                                        else if ((hour.hasClass('available') || hour.hasClass('special')) && ((!AddLastHourToTotalPrice && hourStartSelection != hour.attr('id')) || AddLastHourToTotalPrice)){
                                            hourFirstSelected = false;
                                            hourEndSelection = hour.attr('id');

                                            if (hourStartSelection > hourEndSelection){
                                                auxHour = hourStartSelection;
                                                hourStartSelection = hourEndSelection;
                                                hourEndSelection = auxHour;
                                            }
                                            
                                            sHour = hourStartSelection.split('_')[1];
                                            eHour = hourEndSelection.split('_')[1];
                                            
                                            methods.selectHourValue('#DOPBookingSystem_StartHour'+ID, sHour.split('-')[0]+':'+sHour.split('-')[1]);
                                            methods.selectHourValue('#DOPBookingSystem_EndHour'+ID, eHour.split('-')[0]+':'+eHour.split('-')[1]);
                                            
                                            $('#DOPBookingSystem_EndHour'+ID+' option').each(function(){
                                                if ($(this).attr('value') < $('#DOPBookingSystem_StartHour'+ID).val() && $(this).attr('value') != ''){
                                                    $(this).remove();
                                                }
                                            });

                                            methods.calculateHoursPrice();
                                        }
                                    }
                                    else if (MultipleHoursSelect && !hourFirstSelected && !$('.bind-content', hourThis).hasClass('group0')){
                                        $('.DOPBookingSystem_Hour', Container).removeClass('selected');

                                        if ($('.bind-content', hourThis).hasClass('group1')){
                                            hourStartSelection = hour.attr('id');          

                                            $('.DOPBookingSystem_Hour', Container).each(function(){
                                                if ($(this).attr('id') >= hourStartSelection && $('.bind-content', this).hasClass('group3') && !stopGroup){
                                                    stopGroup = true;
                                                    hourEndSelection = $(this).attr('id');
                                                }
                                            });
                                        }
                                        else if ($('.bind-content', hourThis).hasClass('group3')){
                                            hourEndSelection = hour.attr('id');

                                            $($('.DOPBookingSystem_Hour', Container).get().reverse()).each(function(){
                                                if ($(this).attr('id') <= hourEndSelection  && $('.bind-content', this).hasClass('group1') && !stopGroup){
                                                    stopGroup = true;
                                                    hourStartSelection = $(this).attr('id');
                                                }
                                            });
                                        }
                                        else if ($('.bind-content', hourThis).hasClass('group2')){                                                                                                    
                                            $($('.DOPBookingSystem_Hour', Container).get().reverse()).each(function(){
                                                if ($(this).attr('id') <= hour.attr('id')  && $('.bind-content', this).hasClass('group1') && !stopGroup){
                                                    stopGroup = true;
                                                    hourStartSelection = $(this).attr('id');
                                                }
                                            });

                                            if (stopGroup){
                                                stopGroup = false;

                                                $('.DOPBookingSystem_Hour', Container).each(function(){
                                                    if ($(this).attr('id') >= hour.attr('id') && $('.bind-content', this).hasClass('group3') && !stopGroup){
                                                        stopGroup = true;
                                                        hourEndSelection = $(this).attr('id');
                                                    }
                                                });
                                            }
                                        }

                                        if (stopGroup){
                                            sHour = hourStartSelection.split('_')[1];
                                            eHour = hourEndSelection.split('_')[1];
                                            
                                            methods.selectHourValue('#DOPBookingSystem_StartHour'+ID, sHour.split('-')[0]+':'+sHour.split('-')[1]);
                                            methods.selectHourValue('#DOPBookingSystem_EndHour'+ID, eHour.split('-')[0]+':'+eHour.split('-')[1]);

                                            methods.calculateHoursPrice();
                                        }
                                    }
                                }
                            }, 10);
                        });
                        
                        $('.DOPBookingSystem_Hour', Container).hover(function(){
                            var hour = $(this);
                            
                            if (hourFirstSelected){
                                methods.showHourSelection(hour.attr('id'));
                            }
                        });
                        
                        $('.DOPBookingSystem_Hour .info', Container).hover(function(){
                            methods.showInfo(hourDaySelection.split('_')[1], $(this).attr('id').split('_')[1], 'info');
                        }, function(){
                            methods.hideInfo();
                        });
                    },
                    showHourSelection:function(id){
                        var hour,
                        notAvailable = false;
                        
                        $('.DOPBookingSystem_Hour', Container).removeClass('selected');
                        
                        if (id < hourStartSelection){
                            $($('.DOPBookingSystem_Hour', Container).get().reverse()).each(function(){
                                hour = $(this);
                                                              
                                if (hour.attr('id') >= id && hour.attr('id') <= hourStartSelection && !hour.hasClass('available') && !hour.hasClass('special')){
                                    notAvailable = true;
                                }
                               
                                if (hour.attr('id') >= id && hour.attr('id') <= hourStartSelection && !notAvailable){
                                    hour.addClass('selected');
                                }
                            });
                        }
                        else{
                            $('.DOPBookingSystem_Hour', Container).each(function(){
                                hour = $(this);   
                                                              
                                if (hour.attr('id') >= hourStartSelection && hour.attr('id') <= id && !hour.hasClass('available') && !hour.hasClass('special')){
                                    notAvailable = true;
                                }    
                                
                                if (hour.attr('id') >= hourStartSelection && hour.attr('id') <= id && !notAvailable){
                                    hour.addClass('selected');
                                }
                            });
                        }       
                        
                        $('.DOPBookingSystem_Hour.selected .bind-content', Container).removeAttr('style');  
                        $('.DOPBookingSystem_Hour.selected .bind-content .hour', Container).removeAttr('style');         
                    },
                    selectHourValue:function(field, val){
                        $(field+' option').removeAttr('selected');
                        $(field+" option[value='"+val+"']").attr('selected', 'selected');
                    },
                    hideHours:function(){
                        $('.DOPBookingSystem_Hours', Container).html('');
                    },
                    
                    initSidebar:function(){
                        methods.initSidebarDates();
                        
                        $('#DOPBookingSystem_NoItems'+ID).unbind('change');
                        $('#DOPBookingSystem_NoItems'+ID).bind('change', function(){
                            if (HoursEnabled){
                                methods.calculateHoursPrice();                                  
                            }
                            else{
                                methods.calculateDaysPrice();                            
                            }
                        });
                        
                        $('#DOPBookingSystem_Form'+ID).unbind('submit');
                        $('#DOPBookingSystem_Form'+ID).bind('submit', function(){
                            if ($('input[name=DOPBookingSystem_Payment'+ID+']:checked', '#DOPBookingSystem_ContactForm'+ID).val() == 2){
                                if (methods.validForm()){
                                    $('#DOPBookingSystem_Submit'+ID).attr('disabled', 'disabled');
                                    $('#DOPBookingSystem_Form'+ID).attr('action', PluginURL+'assets/paypal/expresscheckout.php');
                                    return true;
                                }
                                else{
                                    return false;
                                }    
                            }
                            else{
                                $('#DOPBookingSystem_ContactForm'+ID).attr('action', '');
                                methods.book();
                                return false;
                            }
                        });
                                
                        if (PaymentPayPalEnabled){
                            $.post(ajaxURL, {action: 'dopbs_paypal_check', calendar_id:ID}, function(data){
                                if (data == 'success'){
                                    $('#DOPBookingSystem_InfoMessage'+ID).html('<span class="success">'+PaymentPayPalSuccess+'</span>');
                                    $('#DOPBookingSystem_InfoMessage'+ID).css('display', 'block');
                                }
                                else if (data == 'error'){
                                    $('#DOPBookingSystem_InfoMessage'+ID).html(PaymentPayPalError);
                                    $('#DOPBookingSystem_InfoMessage'+ID).css('display', 'block');
                                }
                            });
                        }
                    },
                    initSidebarDates:function(){    
                        $('#DOPBookingSystem_CheckInView'+ID).unbind('click');
                        $('#DOPBookingSystem_CheckInView'+ID).bind('click', function(){  
                            methods.resetSidebar();
                        });
                        
                        $('#DOPBookingSystem_CheckInView'+ID).unbind('blur');
                        $('#DOPBookingSystem_CheckInView'+ID).bind('blur', function(){  
                            if ($(this).val() == ''){  
                               methods.resetSidebar();
                            }
                        });
                            
                        if (!HoursEnabled && MultipleDaysSelect){                    
                            $('#DOPBookingSystem_CheckInView'+ID).datepicker('destroy');                      
                            $('#DOPBookingSystem_CheckInView'+ID).datepicker({minDate: 0,
                                                                                 dateFormat: DateType == 1 ? 'MM dd, yy':'dd MM yy',
                                                                                 altField: '#DOPBookingSystem_CheckIn'+ID,
                                                                                 altFormat: 'yy-mm-dd',
                                                                                 firstDay: FirstDay,
                                                                                 dayNames: DayNames,
                                                                                 dayNamesMin: DayShortNames,
                                                                                 monthNames: MonthNames,
                                                                                 monthNamesMin: MonthShortNames});
                            $('#DOPBookingSystem_CheckOutView'+ID).datepicker('destroy');  
                            $('#DOPBookingSystem_CheckOutView'+ID).datepicker({minDate: 0,
                                                                                  dateFormat: DateType == 1 ? 'MM dd, yy':'dd MM yy',
                                                                                  altField: '#DOPBookingSystem_CheckOut'+ID,
                                                                                  altFormat: 'yy-mm-dd',
                                                                                  firstDay: FirstDay,
                                                                                  dayNames: DayNames,
                                                                                  dayNamesMin: DayShortNames,
                                                                                  monthNames: MonthNames,
                                                                                  monthNamesMin: MonthShortNames});
                            $('#DOPBookingSystem_CheckOutView'+ID).attr('disabled', 'disabled');
                            $('.ui-datepicker').removeClass('notranslate').addClass('notranslate');
                            
                            $('#DOPBookingSystem_CheckInView'+ID).unbind('click');
                            $('#DOPBookingSystem_CheckInView'+ID).bind('click', function(){
                                $('#DOPBookingSystem_CheckOutView'+ID).val('');
                                $('#DOPBookingSystem_CheckOut'+ID).val('');
                                $('#DOPBookingSystem_CheckOutView'+ID).attr('disabled', 'disabled');
                            });
                            
                            $('#DOPBookingSystem_CheckInView'+ID).unbind('change');
                            $('#DOPBookingSystem_CheckInView'+ID).bind('change', function(){
                                var year = parseInt($('#DOPBookingSystem_CheckIn'+ID).val().split('-')[0], 10),
                                month = parseInt($('#DOPBookingSystem_CheckIn'+ID).val().split('-')[1], 10)-1,
                                day = parseInt($('#DOPBookingSystem_CheckIn'+ID).val().split('-')[2], 10),
                                minDateValue = StartYear == year && StartMonth-1 == month && StartDay == day+MinStay-1 ? (MorningCheckOut ? 1:0):prototypes.dateDiference(new Date(), new Date(year, month, day+MinStay-(MorningCheckOut ? 0:1)));
                                
                                $('#DOPBookingSystem_CheckOutView'+ID).removeAttr('disabled');

                                $('#DOPBookingSystem_CheckOutView'+ID).val('');
                                $('#DOPBookingSystem_CheckOut'+ID).val('');
                                $('#DOPBookingSystem_CheckOutView'+ID).datepicker('destroy');
                                
                                if (MaxStay == 0){
                                    $('#DOPBookingSystem_CheckOutView'+ID).datepicker({minDate: minDateValue, 
                                                                                          dateFormat: DateType == 1 ? 'MM dd, yy':'dd MM yy',
                                                                                          altField: '#DOPBookingSystem_CheckOut'+ID,
                                                                                          altFormat: 'yy-mm-dd',
                                                                                          firstDay: FirstDay,
                                                                                          dayNames: DayNames,
                                                                                          dayNamesMin: DayShortNames,
                                                                                          monthNames: MonthNames,
                                                                                          monthNamesMin: MonthShortNames}); 
                                }
                                else{
                                    $('#DOPBookingSystem_CheckOutView'+ID).datepicker({minDate: minDateValue, 
                                                                                          maxDate: prototypes.dateDiference(new Date(), new Date(year, month, day+MaxStay-(MorningCheckOut ? 0:1))), 
                                                                                          dateFormat: DateType == 1 ? 'MM dd, yy':'dd MM yy',
                                                                                          altField: '#DOPBookingSystem_CheckOut'+ID,
                                                                                          altFormat: 'yy-mm-dd',
                                                                                          firstDay: FirstDay,
                                                                                          dayNames: DayNames,
                                                                                          dayNamesMin: DayShortNames,
                                                                                          monthNames: MonthNames,
                                                                                          monthNamesMin: MonthShortNames}); 
                                }
                                $('.ui-datepicker').removeClass('notranslate').addClass('notranslate');
                                
                                setTimeout(function(){  
                                    $('#DOPBookingSystem_CheckOutView'+ID).val('').select();  
                                    $('#DOPBookingSystem_CheckOut'+ID).val('');                 
                                    $('#DOPBookingSystem_CheckOutView'+ID).val('').select();                 
                                }, 100);
                            });
                                                        
                            $('#DOPBookingSystem_CheckOutView'+ID).unbind('click');
                            $('#DOPBookingSystem_CheckOutView'+ID).bind('click', function(){  
                                $('.DOPBookingSystem_Day', Container).removeClass('selected');
                                dayFirstSelected = false;
                                $('#DOPBookingSystem_CheckOutView'+ID).val('');  
                                $('#DOPBookingSystem_CheckOut'+ID).val('');  
                                methods.hideForm();
                            });

                            $('#DOPBookingSystem_CheckOutView'+ID).unbind('blur');
                            $('#DOPBookingSystem_CheckOutView'+ID).bind('blur', function(){  
                                if ($(this).val() == ''){
                                    methods.hideForm();
                                }
                            });

                            $('#DOPBookingSystem_CheckOutView'+ID).unbind('change');
                            $('#DOPBookingSystem_CheckOutView'+ID).bind('change', function(){
                                methods.generateCalendar(parseInt($('#DOPBookingSystem_CheckIn'+ID).val().split('-')[0], 10), parseInt($('#DOPBookingSystem_CheckIn'+ID).val().split('-')[1], 10));
                                methods.calculateDaysPrice();
                            });
                        }
                        else{
                            $('#DOPBookingSystem_CheckInView'+ID).datepicker('destroy');
                            $('#DOPBookingSystem_CheckInView'+ID).datepicker({minDate: 0,
                                                                                 dateFormat: DateType == 1 ? 'MM dd, yy':'dd MM yy',
                                                                                 altField: '#DOPBookingSystem_CheckIn'+ID,
                                                                                 altFormat: 'yy-mm-dd',
                                                                                 firstDay: FirstDay,
                                                                                 dayNames: DayNames,
                                                                                 dayNamesMin: DayShortNames,
                                                                                 monthNames: MonthNames,
                                                                                 monthNamesMin: MonthShortNames});
                            $('.ui-datepicker').removeClass('notranslate').addClass('notranslate');
                            
                            $('#DOPBookingSystem_CheckInView'+ID).unbind('change');
                            $('#DOPBookingSystem_CheckInView'+ID).bind('change', function(){
                                if (HoursEnabled){
                                    $('#'+ID+'_'+$('#DOPBookingSystem_CheckIn'+ID).val()).addClass('selected');
                                    dayTimeDisplay = true;
                                    dayStartSelection = ID+'_'+$('#DOPBookingSystem_CheckIn'+ID).val();
                                    methods.initHours(ID+'_'+$('#DOPBookingSystem_CheckIn'+ID).val());
                                    methods.rpDays();
                                }
                                else{
                                    methods.generateCalendar(parseInt($('#DOPBookingSystem_CheckIn'+ID).val().split('-')[0], 10), parseInt($('#DOPBookingSystem_CheckIn'+ID).val().split('-')[1], 10));
                                    methods.calculateDaysPrice();                                    
                                }
                            });
                        }
                    },
                    initSidebarHours:function(){
                        $('#DOPBookingSystem_StartHour'+ID).unbind('change');
                        $('#DOPBookingSystem_StartHour'+ID).bind('change', function(){
                            if (MultipleHoursSelect){
                                $('#DOPBookingSystem_EndHour'+ID).html($('#DOPBookingSystem_StartHour'+ID).html());

                                $('#DOPBookingSystem_EndHour'+ID+' option').each(function(){
                                    if ($(this).attr('value') < $('#DOPBookingSystem_StartHour'+ID).val() && $(this).attr('value') != ''){
                                        $(this).remove();
                                    }
                                });

                                methods.selectHourValue('#DOPBookingSystem_EndHour'+ID, '');
                                $('.DOPBookingSystem_Hour', Container).removeClass('selected');
                                methods.hideForm();
                            }
                            else{                           
                                $('.DOPBookingSystem_Hour', Container).removeClass('selected');
                                methods.hideForm();
                                methods.calculateHoursPrice();                                
                            }
                        });
                        
                        $('#DOPBookingSystem_EndHour'+ID).unbind('change');
                        $('#DOPBookingSystem_EndHour'+ID).bind('change', function(){
                            $('.DOPBookingSystem_Hour', Container).removeClass('selected');
                            methods.hideForm();
                            methods.calculateHoursPrice();
                        });
                    },
                    resetSidebar:function(){
                        $('.DOPBookingSystem_Day', Container).removeClass('selected');
                        dayFirstSelected = false;
                        $('#DOPBookingSystem_CheckInView'+ID).val('');
                        $('#DOPBookingSystem_CheckIn'+ID).val('');

                        if (!HoursEnabled && MultipleDaysSelect){                            
                            $('#DOPBookingSystem_CheckOutView'+ID).val(''); 
                            $('#DOPBookingSystem_CheckOut'+ID).val(''); 
                            $('#DOPBookingSystem_CheckOutView'+ID).attr('disabled', 'disabled');
                        }
                            
                        if (HoursEnabled){
                            methods.hideHours();
                            $('#DOPBookingSystem_HoursSelect'+ID).css('display', 'none');
                            $('#DOPBookingSystem_StartHour'+ID).html('<option value=""></option>');
                                
                            if (MultipleHoursSelect){
                                $('#DOPBookingSystem_EndHour'+ID).html('<option value=""></option>');
                            }
                        }
                        
                        methods.hideForm();
                    },
                    unavailableSidebar:function(message){
                        $('#DOPBookingSystem_NoItems'+ID).html('<option value="1">1</option>');
                        $('#DOPBookingSystem_NoItemsSelect'+ID).css('display', 'none');
                        $('#DOPBookingSystem_Price'+ID).css('display', 'none');
                        $('#DOPBookingSystem_PriceItemValue'+ID).val('');
                        $('#DOPBookingSystem_PriceValue'+ID).val('');
                        $('#DOPBookingSystem_InfoMessage'+ID).html(message);
                        $('#DOPBookingSystem_InfoMessage'+ID).css('display', 'block');
                        $('#DOPBookingSystem_ContactForm'+ID).css('display', 'none');
                    },
                    
                    initInfo:function(){
                        var xPos = 0, yPos = 0, touch;
                        
                        if (!prototypes.isTouchDevice()){
                            $(document).mousemove(function(e){
                                xPos = e.pageX+30;
                                yPos = e.pageY;

                                if ($(document).scrollTop()+$(window).height() < yPos+$('#DOPBookingSystem_Info'+ID).height()+parseInt($('#DOPBookingSystem_Info'+ID).css('padding-top'))+parseInt($('#DOPBookingSystem_Info'+ID).css('padding-bottom'))+10){
                                   yPos = $(document).scrollTop()+$(window).height()-$('#DOPBookingSystem_Info'+ID).height()-parseInt($('#DOPBookingSystem_Info'+ID).css('padding-top'))-parseInt($('#DOPBookingSystem_Info'+ID).css('padding-bottom'))-10;
                                }
                                $('#DOPBookingSystem_Info'+ID).css({'left': xPos, 'top': yPos});
                            }); 
                        }
                        else{
                            $('#DOPBookingSystem_Info'+ID).unbind('touchstart');
                            $('#DOPBookingSystem_Info'+ID).bind('touchstart', function(e){
                                e.preventDefault();
                                methods.hideInfo();
                            });
                        }
                    },
                    showInfo:function(date, hour, type){
                        var info = hour == '' ? Schedule[date][type]:Schedule[date]['hours'][hour][type],
                        xPos = 0, yPos = 0, touch;
                        
                        $('#DOPBookingSystem_Info'+ID).html(info);
                        $('#DOPBookingSystem_Info'+ID).css('display', 'block');                         
                    },
                    hideInfo:function(){
                        $('#DOPBookingSystem_Info'+ID).css('display', 'none');                        
                    },
            
                    calculateDaysPrice:function(){
                        var bookedDays = new Array(),
                        i, y, d, m,
                        ciDay, ciy, cim, cid,
                        coDay, coy, com, cod,
                        firstMonth, lastMonth, firstDay, lastDay,
                        currYear, currMonth, currDay, currBookedDay,
                        available = true, itemPrice = 0, noItems = 1000000, totalPrice = 0, totalToPay = 0,  depositToPay = 0,
                        oldNoItems = $('#DOPBookingSystem_NoItems'+ID).val(),
                        dayFound, noDays = 0, discountValue = 0,
                        noItemsHTML = new Array();
                        
                        if (MultipleDaysSelect){
                            ciDay = $('#DOPBookingSystem_CheckIn'+ID).val();
                            coDay = $('#DOPBookingSystem_CheckOut'+ID).val();
                        }
                        else{                            
                            ciDay = $('#DOPBookingSystem_CheckIn'+ID).val();
                            coDay = $('#DOPBookingSystem_CheckIn'+ID).val();
                        }
                        
                        if (ciDay.split('-').length == 3 && coDay.split('-').length == 3 && Schedule != {}){
                            ciy = parseInt(ciDay.split('-')[0], 10);
                            cim = parseInt(ciDay.split('-')[1], 10);
                            cid = parseInt(ciDay.split('-')[2], 10);
                            coy = parseInt(coDay.split('-')[0], 10);
                            com = parseInt(coDay.split('-')[1], 10);
                            cod = parseInt(coDay.split('-')[2], 10);
                            
                            for (y=ciy; y<=coy; y++){
                                firstMonth = y == ciy ? cim:1;
                                lastMonth = y == coy ? com:12;

                                for (m=firstMonth; m<=lastMonth; m++){
                                    firstDay = y == ciy && m == cim ? cid:1;
                                    lastDay = y == coy && m == com ? cod:new Date(y,m,0).getDate();

                                    for (d=firstDay; d<=lastDay; d++){
                                        currYear = String(y);
                                        currMonth = m <= 9 ? '0'+String(m):String(m);
                                        currDay = d <= 9 ? '0'+String(d):String(d);

                                        bookedDays.push(currYear+'-'+currMonth+'-'+currDay);
                                    }
                                }
                            }
                            
                            noDays = prototypes.noDays(new Date(bookedDays[0].split('-')[0], bookedDays[0].split('-')[1]-1, bookedDays[0].split('-')[2]), new Date(bookedDays[bookedDays.length-1].split('-')[0], bookedDays[bookedDays.length-1].split('-')[1]-1, bookedDays[bookedDays.length-1].split('-')[2]))-(MorningCheckOut ? 1:0);
                            
                            if (noDays > 1){
                                if (noDays > 31){
                                    discountValue = DiscountsNoDays[29];
                                }
                                else{
                                    discountValue = DiscountsNoDays[noDays-2];
                                }
                            }
                            
                            if (Schedule[bookedDays[0]] == undefined || Schedule[bookedDays[bookedDays.length-(MorningCheckOut ? 2:1)]] == undefined || Schedule[bookedDays[0]]['bind'] == '2' || Schedule[bookedDays[0]]['bind'] == '3' || Schedule[bookedDays[bookedDays.length-(MorningCheckOut ? 2:1)]]['bind'] == '1' || Schedule[bookedDays[bookedDays.length-(MorningCheckOut ? 2:1)]]['bind'] == '2'){
                                available = false;
                            }
                            
                            if (available){
                                for (i=0; i<bookedDays.length-(MorningCheckOut ? 1:0); i++){
                                    dayFound = false;
                                    currBookedDay = bookedDays[i];

                                    if (Schedule[currBookedDay] != undefined && (Schedule[currBookedDay]['status'] == 'available' || Schedule[currBookedDay]['status'] == 'special') && 
                                        ((i != 0 && i != bookedDays.length-(MorningCheckOut ? 2:1) && Schedule[currBookedDay]['bind'] != '1' && Schedule[currBookedDay]['bind'] != '3') || i==0 || i == bookedDays.length-(MorningCheckOut ? 2:1))){
                                        
                                        dayFound = true;

                                        if (Schedule[currBookedDay]['price'] != ''){
                                            itemPrice += Schedule[currBookedDay]['promo'] == '' ? parseFloat(Schedule[currBookedDay]['price']):parseFloat(Schedule[currBookedDay]['promo']);
                                        }

                                        if (Schedule[currBookedDay]['available'] == ''){
                                            noItems = 1;
                                        } 
                                        else if (parseInt(Schedule[currBookedDay]['available'], 10) < noItems){
                                            noItems = parseInt(Schedule[currBookedDay]['available'], 10);
                                        }
                                    }

                                    if (!dayFound){
                                        available = false;
                                        break;
                                    }
                                }
                            }

                            if (!available){
                                methods.unavailableSidebar(NoServicesAvailableText);
                            }
                            else{
                                for (i=0; i<bookedDays.length; i++){
                                    $('#'+ID+'_'+bookedDays[i]).addClass('selected');
                                }
                                
                                if (MorningCheckOut){
                                    $('#'+ID+'_'+bookedDays[0]).addClass('first');
                                    $('#'+ID+'_'+bookedDays[bookedDays.length-1]).addClass('last');
                                }  
                                
                                for (i=1; i<=noItems; i++){
                                    if (oldNoItems == i){
                                        noItemsHTML.push('<option value="'+i+'" selected="selected">'+i+'</option>');                                        
                                    }
                                    else{
                                        noItemsHTML.push('<option value="'+i+'">'+i+'</option>');
                                    }
                                }

                                $('#DOPBookingSystem_NoItems'+ID).html(noItemsHTML.join(''));
                                
                                if (NoItemsEnabled){
                                    $('#DOPBookingSystem_NoItemsSelect'+ID).css('display', 'block');
                                }
                                else{
                                    $('#DOPBookingSystem_NoItemsSelect'+ID).css('display', 'none');
                                }
                                   
                                if (itemPrice == 0){
                                    $('#DOPBookingSystem_PaymentArrival'+ID).css('display', 'none');
                                    $('#DOPBookingSystem_PaymentPayPal'+ID).css('display', 'none');
                                    $('#DOPBookingSystem_Price'+ID).css('display', 'none');
                                    $('#DOPBookingSystem_PriceItemValue'+ID).val(0);
                                    $('#DOPBookingSystem_PriceValue'+ID).val(0);
                                    $('#DOPBookingSystem_DiscountValue'+ID).val(0);
                                    $('#DOPBookingSystem_PriceToPayValue'+ID).val(0);
                                    $('#DOPBookingSystem_PriceDepositValue'+ID).val(0);
                                }
                                else{
                                    if (Schedule[bookedDays[0]] != undefined && Schedule[bookedDays[0]]['bind'] == '1'){
                                        itemPrice = Schedule[bookedDays[0]]['promo'] == '' ? parseFloat(Schedule[bookedDays[0]]['price']):parseFloat(Schedule[bookedDays[0]]['promo']);
                                    }
                                    
                                    totalPrice = Math.round(itemPrice*$('#DOPBookingSystem_NoItems'+ID).val()*100)/100;
                                    
                                    if (discountValue == 0){
                                        totalToPay = Math.round(totalPrice*100)/100;
                                    }
                                    else{
                                        totalToPay = Math.round((totalPrice-(totalPrice*discountValue/100))*100)/100;
                                    }
                                    
                                    if (PaymentPayPalEnabled){
                                        depositToPay = Math.round(Deposit*totalToPay)/100;
                                    }

                                    $('#DOPBookingSystem_PaymentArrival'+ID).css('display', 'block');
                                    $('#DOPBookingSystem_PaymentPayPal'+ID).css('display', 'block');
                                    $('#DOPBookingSystem_PriceItemValue'+ID).val(itemPrice);
                                    $('#DOPBookingSystem_PriceValue'+ID).val(totalPrice);
                                    $('#DOPBookingSystem_DiscountValue'+ID).val(discountValue);
                                    $('#DOPBookingSystem_PriceToPayValue'+ID).val(totalToPay);
                                    $('#DOPBookingSystem_PriceDepositValue'+ID).val(depositToPay);
                                    
                                    $('#DOPBookingSystem_Price'+ID+' .value').html(Currency+totalToPay);
                                    
                                    if (discountValue != 0){
                                        $('#DOPBookingSystem_Price'+ID+' .value').append('<br /><span class="small"><span class="cut">'+Currency+totalPrice+'</span> ('+discountValue+'% '+DiscountText+')</span>');
                                    }
                                    
                                    if (depositToPay != 0){
                                        $('#DOPBookingSystem_Price'+ID+' .value').append('<br /><span class="medium">'+Currency+depositToPay+' '+DepositText+' ('+Deposit+'%)</span>');
                                    }
                                    $('#DOPBookingSystem_Price'+ID).css('display', 'block');
                                }

                                $('#DOPBookingSystem_InfoMessage'+ID).css('display', 'none');
                                $('#DOPBookingSystem_ContactForm'+ID).css('display', 'block');                              
                            }
                        }
                    },
                    calculateHoursPrice:function(){
                        var bookedHours = new Array(),
                        i, ciDay, sHour, eHour, currBookedHour,
                        available = true, itemPrice = 0, noItems = 1000000, totalPrice = 0, totalToPay = 0,  depositToPay = 0,
                        oldNoItems = $('#DOPBookingSystem_NoItems'+ID).val(),
                        hourFound,
                        noItemsHTML = new Array();
                        
                        ciDay = $('#DOPBookingSystem_CheckIn'+ID).val();
                        
                        if (ciDay.split('-').length == 3){
                            if (Schedule[ciDay] != undefined){
                                if (MultipleHoursSelect){
                                    sHour = $('#DOPBookingSystem_StartHour'+ID).val();
                                    eHour = $('#DOPBookingSystem_EndHour'+ID).val();
                                }
                                else{                            
                                    sHour = $('#DOPBookingSystem_StartHour'+ID).val();
                                    eHour = $('#DOPBookingSystem_StartHour'+ID).val();
                                }

                                $.each(Schedule[ciDay]['hours_definitions'], function(index){
                                    if (sHour <= Schedule[ciDay]['hours_definitions'][index]['value'] && Schedule[ciDay]['hours_definitions'][index]['value'] <= eHour){
                                        bookedHours.push(Schedule[ciDay]['hours_definitions'][index]['value']);
                                    }
                                });
                                
                                if (Schedule[ciDay]['hours'][bookedHours[0]] == undefined || Schedule[ciDay]['hours'][bookedHours[bookedHours.length-1]] == undefined || Schedule[ciDay]['hours'][bookedHours[0]]['bind'] == '2' || Schedule[ciDay]['hours'][bookedHours[0]]['bind'] == '3' || Schedule[ciDay]['hours'][bookedHours[bookedHours.length-1]]['bind'] == '1' || Schedule[ciDay]['hours'][bookedHours[bookedHours.length-1]]['bind'] == '2'){
                                    available = false;
                                }
                                                                
                                if (available){
                                    for (i=0; i<bookedHours.length-(AddLastHourToTotalPrice ? 0:1); i++){
                                        hourFound = false;
                                        currBookedHour = bookedHours[i];
                                        
                                        if (Schedule[ciDay]['hours'][currBookedHour] != undefined && (Schedule[ciDay]['hours'][currBookedHour]['status'] == 'available' || Schedule[ciDay]['hours'][currBookedHour]['status'] == 'special') && 
                                            ((i != 0 && i != bookedHours.length-1 && Schedule[ciDay]['hours'][currBookedHour]['bind'] != '1' && Schedule[ciDay]['hours'][currBookedHour]['bind'] != '3') || i==0 || i == bookedHours.length-1)){
                                            
                                            hourFound = true;

                                            if (Schedule[ciDay]['hours'][currBookedHour]['price'] != ''){
                                                itemPrice += Schedule[ciDay]['hours'][currBookedHour]['promo'] == '' ? parseFloat(Schedule[ciDay]['hours'][currBookedHour]['price']):parseFloat(Schedule[ciDay]['hours'][currBookedHour]['promo']);
                                            }

                                            if (Schedule[ciDay]['hours'][currBookedHour]['available'] == ''){
                                                noItems = 1;
                                            } 
                                            else if (parseInt(Schedule[ciDay]['hours'][currBookedHour]['available'], 10) < noItems){
                                                noItems = parseInt(Schedule[ciDay]['hours'][currBookedHour]['available'], 10);
                                            }
                                        }

                                        if (!hourFound){
                                            available = false;
                                            break;
                                        }
                                    }
                                }

                                if (!available){
                                    methods.unavailableSidebar(NoServicesAvailableText);
                                }
                                else{
                                    for (i=0; i<bookedHours.length; i++){
                                        $('#'+ID+'_'+bookedHours[i].split(':')[0]+'-'+bookedHours[i].split(':')[1]).addClass('selected');
                                    }

                                    for (i=1; i<=noItems; i++){
                                        if (oldNoItems == i){
                                            noItemsHTML.push('<option value="'+i+'" selected="selected">'+i+'</option>');                                        
                                        }
                                        else{
                                            noItemsHTML.push('<option value="'+i+'">'+i+'</option>');
                                        }
                                    }

                                    $('#DOPBookingSystem_NoItems'+ID).html(noItemsHTML.join(''));
                                
                                    if (NoItemsEnabled){
                                        $('#DOPBookingSystem_NoItemsSelect'+ID).css('display', 'block');
                                    }
                                    else{
                                        $('#DOPBookingSystem_NoItemsSelect'+ID).css('display', 'none');
                                    }

                                    if (itemPrice == 0){
                                        $('#DOPBookingSystem_PaymentArrival'+ID).css('display', 'none');
                                        $('#DOPBookingSystem_PaymentPayPal'+ID).css('display', 'none');
                                        $('#DOPBookingSystem_Price'+ID).css('display', 'none');
                                        $('#DOPBookingSystem_PriceItemValue'+ID).val(0);
                                        $('#DOPBookingSystem_PriceValue'+ID).val(0);
                                        $('#DOPBookingSystem_DiscountValue'+ID).val(0);
                                        $('#DOPBookingSystem_PriceToPayValue'+ID).val(0);
                                        $('#DOPBookingSystem_PriceDepositValue'+ID).val(0);
                                    }
                                    else{
                                        if (Schedule[ciDay]['hours'][bookedHours[0]] != undefined && Schedule[ciDay]['hours'][bookedHours[0]]['bind'] == '1'){
                                            itemPrice = Schedule[ciDay]['hours'][bookedHours[0]]['promo'] == '' ? parseFloat(Schedule[ciDay]['hours'][bookedHours[0]]['price']):parseFloat(Schedule[ciDay]['hours'][bookedHours[0]]['promo']);
                                        }
                                    
                                        totalPrice = Math.round(itemPrice*$('#DOPBookingSystem_NoItems'+ID).val()*100)/100;
                                        totalToPay = totalPrice;
                                        
                                        if (PaymentPayPalEnabled){
                                            depositToPay = Math.round(Deposit*totalToPay)/100;
                                        }

                                        $('#DOPBookingSystem_PaymentArrival'+ID).css('display', 'block');
                                        $('#DOPBookingSystem_PaymentPayPal'+ID).css('display', 'block');
                                        $('#DOPBookingSystem_PriceItemValue'+ID).val(itemPrice);
                                        $('#DOPBookingSystem_PriceValue'+ID).val(totalPrice);
                                        $('#DOPBookingSystem_DiscountValue'+ID).val(0);
                                        $('#DOPBookingSystem_PriceToPayValue'+ID).val(totalToPay);
                                        $('#DOPBookingSystem_PriceDepositValue'+ID).val(depositToPay);
                                        
                                        $('#DOPBookingSystem_Price'+ID+' .value').html(Currency+totalToPay);
                                    
                                        if (depositToPay != 0){
                                            $('#DOPBookingSystem_Price'+ID+' .value').append('<br /><span class="medium">'+Currency+depositToPay+' deposit ('+Deposit+'%)</span>');
                                        }
                                        $('#DOPBookingSystem_Price'+ID).css('display', 'block');
                                    }

                                    $('#DOPBookingSystem_InfoMessage'+ID).css('display', 'none');
                                    $('#DOPBookingSystem_ContactForm'+ID).css('display', 'block');                                
                                }                                
                            }
                            else{
                                methods.unavailableSidebar(NoServicesAvailableText);
                            }
                        }                  
                    },
                    hideForm:function(){
                        $('#DOPBookingSystem_NoItems'+ID).html('<option value="1">1</option>');
                        $('#DOPBookingSystem_NoItemsSelect'+ID).css('display', 'none');
                        $('#DOPBookingSystem_Price'+ID).css('display', 'none');
                        $('#DOPBookingSystem_InfoMessage'+ID).css('display', 'none');
                        $('#DOPBookingSystem_ContactForm'+ID).css('display', 'none');                        
                    },
                      
                    previousDay:function(date){
                        var previousDay = new Date(),
                        parts = date.split('-');
                        
                        previousDay.setFullYear(parts[0], parseInt(parts[1])-1, parts[2]);
                        previousDay.setTime(previousDay.getTime()-86400000);
                                                
                        return previousDay.getFullYear()+'-'+prototypes.timeLongItem(previousDay.getMonth()+1)+'-'+prototypes.timeLongItem(previousDay.getDate());                        
                    },
                    weekDay:function(year, month, day){
                        var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                        date = new Date(eval('"'+day+' '+months[parseInt(month, 10)-1]+', '+year+'"'));
                        
                        return date.getDay();
                    },
                                        
                    book:function(){
                        if (methods.validForm()){
                            var formData = new Array(), i, j, o, email = '';
                            
                            for (i=0; i<Form.length; i++){
                                formData[i] = {
                                                "id": "",
                                                "name": "",
                                                "value": ""
                                              };
                                formData[i]['id'] = Form[i]['id'];
                                formData[i]['name'] = Form[i]['translation'];
                                
                                if (Form[i]['is_email'] == 'true' && email == ''){
                                    email = $('#DOPBookingSystem_FormField'+ID+'_'+Form[i]['id']).val();
                                }
                                
                                switch (Form[i]['type']){
                                    case 'checkbox':
                                        formData[i]['value'] = $('#DOPBookingSystem_FormField'+ID+'_'+Form[i]['id']).is(':checked');
                                        break
                                    case 'select':
                                        if ($('#DOPBookingSystem_FormField'+ID+'_'+Form[i]['id']).val() != null){
                                            if (Form[i]['multiple_select'] == 'true'){
                                                var selectedOptions = $('#DOPBookingSystem_FormField'+ID+'_'+Form[i]['id']).val();
                                                formData[i]['value'] = new Array();
                                                
                                                for (j=0; j<selectedOptions.length; j++){
                                                    for (o=0; o<Form[i]['options'].length; o++){
                                                        if (Form[i]['options'][o]['id'] == selectedOptions[j]){
                                                            formData[i]['value'][j] = Form[i]['options'][o];
                                                        }
                                                    }
                                                }
                                            }
                                            else{
                                                var selectedOption = $('#DOPBookingSystem_FormField'+ID+'_'+Form[i]['id']).val();
                                                formData[i]['value'] = new Array();
                                                
                                                for (o=0; o<Form[i]['options'].length; o++){
                                                    if (Form[i]['options'][o]['id'] == selectedOption){
                                                        formData[i]['value'][0] = Form[i]['options'][o];
                                                    }
                                                }
                                            }
                                        }
                                        break
                                    default:
                                        formData[i]['value'] = $('#DOPBookingSystem_FormField'+ID+'_'+Form[i]['id']).val();
                                }
                            }
                            
                            $.post(ajaxURL, {action:'dopbs_book_request', 
                                             calendar_id: ID,
                                             check_in: $('#DOPBookingSystem_CheckIn'+ID).val(),
                                             check_out: !HoursEnabled && MultipleDaysSelect ? $('#DOPBookingSystem_CheckOut'+ID).val():'',
                                             start_hour: HoursEnabled ? $('#DOPBookingSystem_StartHour'+ID).val():'',
                                             end_hour: HoursEnabled && MultipleHoursSelect ? $('#DOPBookingSystem_EndHour'+ID).val():'',
                                             no_items: $('#DOPBookingSystem_NoItems'+ID).val(),
                                             currency: Currency,
                                             currency_code: CurrencyCode,
                                             total_price: $('#DOPBookingSystem_PriceValue'+ID).val(),
                                             discount: $('#DOPBookingSystem_DiscountValue'+ID).val(),
                                             price: $('#DOPBookingSystem_PriceToPayValue'+ID).val(),
                                             deposit: $('#DOPBookingSystem_PriceDepositValue'+ID).val(),
                                             email: email,
                                             no_people: NoPeopleEnabled ? $('#DOPBookingSystem_NoPeople'+ID).val():'',
                                             no_children: NoPeopleEnabled & NoChildrenEnabled ? $('#DOPBookingSystem_NoChildren'+ID).val():'',
                                             form: formData,
                                             payment_method: $('#DOPBookingSystem_PriceValue'+ID).val() != '' ? $('input[name=DOPBookingSystem_Payment'+ID+']').val():0}, function(data){
                                data = $.trim(data);
                                
                                var year, month,
                                currYear = $('#DOPBookingSystem_CheckIn'+ID).val().split('-')[0],
                                currMonth = $('#DOPBookingSystem_CheckIn'+ID).val().split('-')[1],
                                currDay = $('#DOPBookingSystem_CheckIn'+ID).val().split('-')[2];
                                
                                methods.resetSidebar();
                                $('#DOPBookingSystem_InfoMessage'+ID).html('<span class="success">'+(data != '' ? PaymentArrivalSuccessInstantBooking:PaymentArrivalSuccess)+'</span>');
                                $('#DOPBookingSystem_InfoMessage'+ID).css('display', 'block');
                                
                                if (data != ''){
                                    year = parseInt(data.split('-')[0]);
                                    month = parseInt(data.split('-')[1]);
                                    
                                    for (var day in Schedule){
                                        if (day.indexOf(year) != -1){                                      
                                            delete Schedule[day];
                                        }                            
                                    }

                                    $.post(ajaxURL, {action:'dopbs_load_schedule', calendar_id:ID, year:year}, function(data){
                                        if ($.trim(data) != ''){
                                            $.extend(Schedule, JSON.parse($.trim(data)));
                                        }
                                        
                                        methods.generateCalendar(StartYear, (year-StartYear)*12+month);
                                        
                                        if (HoursEnabled){
                                            $('#'+ID+'_'+currYear+'-'+currMonth+'-'+currDay).addClass('selected');
                                            methods.initHours(ID+'_'+currYear+'-'+currMonth+'-'+currDay);
                                        }
                                        methods.rpDays();
                                    });
                                }
                            });
                        }
                    },
                    validForm:function(){
                        var validForm = true, i;
                        
                        if ($('#DOPBookingSystem_CheckIn'+ID).val() != '' && ($('#DOPBookingSystem_CheckOut'+ID).val() == undefined || $('#DOPBookingSystem_CheckOut'+ID).val() != '')
                            && ($('#DOPBookingSystem_StartHour'+ID).val() == undefined || $('#DOPBookingSystem_StartHour'+ID).val() != '')
                            && ($('#DOPBookingSystem_EndHour'+ID).val() == undefined || $('#DOPBookingSystem_EndHour'+ID).val() != '')){
                            
                            for (i=0; i<Form.length; i++){
                                switch (Form[i]['type']){
                                    case 'checkbox':
                                        if (Form[i]['required'] == 'true' && $('#DOPBookingSystem_FormField'+ID+'_'+Form[i]['id']).is(':checked')){
                                            $('#DOPBookingSystem_InfoMessage'+ID).html(Form[i]['translation']+' '+FormRequired);
                                            $('#DOPBookingSystem_InfoMessage'+ID).css('display', 'block');
                                            return false;
                                        }
                                        break;
                                    case 'text':
                                        if (Form[i]['required'] == 'true' && $('#DOPBookingSystem_FormField'+ID+'_'+Form[i]['id']).val() == ''){
                                            $('#DOPBookingSystem_InfoMessage'+ID).html(Form[i]['translation']+' '+FormRequired);
                                            $('#DOPBookingSystem_InfoMessage'+ID).css('display', 'block');
                                            return false;
                                        }
                                        else if (Form[i]['is_email'] == 'true' && !prototypes.validEmail($('#DOPBookingSystem_FormField'+ID+'_'+Form[i]['id']).val())){
                                            $('#DOPBookingSystem_InfoMessage'+ID).html(Form[i]['translation']+' '+FormEmailInvalid);
                                            $('#DOPBookingSystem_InfoMessage'+ID).css('display', 'block');
                                            return false;
                                            
                                        }
                                        break;
                                    case 'select':
                                        if (Form[i]['required'] == 'true' && ($('#DOPBookingSystem_FormField'+ID+'_'+Form[i]['id']).val() == '' || $('#DOPBookingSystem_FormField'+ID+'_'+Form[i]['id']).val() == null)){
                                            $('#DOPBookingSystem_InfoMessage'+ID).html(Form[i]['translation']+' '+FormRequired);
                                            $('#DOPBookingSystem_InfoMessage'+ID).css('display', 'block');
                                            return false;
                                        }
                                        break;
                                    case 'textarea':
                                        if (Form[i]['required'] == 'true' && $('#DOPBookingSystem_FormField'+ID+'_'+Form[i]['id']).val() == ''){
                                            $('#DOPBookingSystem_InfoMessage'+ID).html(Form[i]['translation']+' '+FormRequired);
                                            $('#DOPBookingSystem_InfoMessage'+ID).css('display', 'block');
                                            return false;
                                        }
                                        break;
                                }
                            }
                            
                            if (TermsAndConditionsEnabled && !$('#DOPBookingSystem_TermsAndConditions'+ID).is(':checked')){
                                
                                $('#DOPBookingSystem_InfoMessage'+ID).html(TermsAndConditionsInvalid);
                                $('#DOPBookingSystem_InfoMessage'+ID).css('display', 'block');
                                return false;
                            }
                            else{
                                $('#DOPBookingSystem_InfoMessage'+ID).css('display', 'none');   
                                return true;
                            }
                            
                            return validForm;
                        }
                        else{
                            return false;
                        }
                    },
                    
                    nextHour:function(hour, hours){
                        var nextHour = '24:00', i;
                        
                        for (i=hours.length-1; i>=0; i--){
                            if (hours[i]['value'] > hour){
                                nextHour = hours[i]['value'];
                            }
                        }
                        
                        return nextHour;
                    }
                  },

        prototypes = {
                        resizeItem:function(parent, child, cw, ch, dw, dh, pos){// Resize & Position an item (the item is 100% visible)
                            var currW = 0, currH = 0;

                            if (dw <= cw && dh <= ch){
                                currW = dw;
                                currH = dh;
                            }
                            else{
                                currH = ch;
                                currW = (dw*ch)/dh;

                                if (currW > cw){
                                    currW = cw;
                                    currH = (dh*cw)/dw;
                                }
                            }

                            child.width(currW);
                            child.height(currH);
                            switch(pos.toLowerCase()){
                                case 'top':
                                    prototypes.topItem(parent, child, ch);
                                    break;
                                case 'bottom':
                                    prototypes.bottomItem(parent, child, ch);
                                    break;
                                case 'left':
                                    prototypes.leftItem(parent, child, cw);
                                    break;
                                case 'right':
                                    prototypes.rightItem(parent, child, cw);
                                    break;
                                case 'horizontal-center':
                                    prototypes.hCenterItem(parent, child, cw);
                                    break;
                                case 'vertical-center':
                                    prototypes.vCenterItem(parent, child, ch);
                                    break;
                                case 'center':
                                    prototypes.centerItem(parent, child, cw, ch);
                                    break;
                                case 'top-left':
                                    prototypes.tlItem(parent, child, cw, ch);
                                    break;
                                case 'top-center':
                                    prototypes.tcItem(parent, child, cw, ch);
                                    break;
                                case 'top-right':
                                    prototypes.trItem(parent, child, cw, ch);
                                    break;
                                case 'middle-left':
                                    prototypes.mlItem(parent, child, cw, ch);
                                    break;
                                case 'middle-right':
                                    prototypes.mrItem(parent, child, cw, ch);
                                    break;
                                case 'bottom-left':
                                    prototypes.blItem(parent, child, cw, ch);
                                    break;
                                case 'bottom-center':
                                    prototypes.bcItem(parent, child, cw, ch);
                                    break;
                                case 'bottom-right':
                                    prototypes.brItem(parent, child, cw, ch);
                                    break;
                            }
                        },
                        resizeItem2:function(parent, child, cw, ch, dw, dh, pos){// Resize & Position an item (the item covers all the container)
                            var currW = 0, currH = 0;

                            currH = ch;
                            currW = (dw*ch)/dh;

                            if (currW < cw){
                                currW = cw;
                                currH = (dh*cw)/dw;
                            }

                            child.width(currW);
                            child.height(currH);

                            switch(pos.toLowerCase()){
                                case 'top':
                                    prototypes.topItem(parent, child, ch);
                                    break;
                                case 'bottom':
                                    prototypes.bottomItem(parent, child, ch);
                                    break;
                                case 'left':
                                    prototypes.leftItem(parent, child, cw);
                                    break;
                                case 'right':
                                    prototypes.rightItem(parent, child, cw);
                                    break;
                                case 'horizontal-center':
                                    prototypes.hCenterItem(parent, child, cw);
                                    break;
                                case 'vertical-center':
                                    prototypes.vCenterItem(parent, child, ch);
                                    break;
                                case 'center':
                                    prototypes.centerItem(parent, child, cw, ch);
                                    break;
                                case 'top-left':
                                    prototypes.tlItem(parent, child, cw, ch);
                                    break;
                                case 'top-center':
                                    prototypes.tcItem(parent, child, cw, ch);
                                    break;
                                case 'top-right':
                                    prototypes.trItem(parent, child, cw, ch);
                                    break;
                                case 'middle-left':
                                    prototypes.mlItem(parent, child, cw, ch);
                                    break;
                                case 'middle-right':
                                    prototypes.mrItem(parent, child, cw, ch);
                                    break;
                                case 'bottom-left':
                                    prototypes.blItem(parent, child, cw, ch);
                                    break;
                                case 'bottom-center':
                                    prototypes.bcItem(parent, child, cw, ch);
                                    break;
                                case 'bottom-right':
                                    prototypes.brItem(parent, child, cw, ch);
                                    break;
                            }
                        },

                        topItem:function(parent, child, ch){// Position item on Top
                            parent.height(ch);
                            child.css('margin-top', 0);
                        },
                        bottomItem:function(parent, child, ch){// Position item on Bottom
                            parent.height(ch);
                            child.css('margin-top', ch-child.height());
                        },
                        leftItem:function(parent, child, cw){// Position item on Left
                            parent.width(cw);
                            child.css('margin-left', 0);
                        },
                        rightItem:function(parent, child, cw){// Position item on Right
                            parent.width(cw);
                            child.css('margin-left', parent.width()-child.width());
                        },
                        hCenterItem:function(parent, child, cw){// Position item on Horizontal Center
                            parent.width(cw);
                            child.css('margin-left', (cw-child.width())/2);
                        },
                        vCenterItem:function(parent, child, ch){// Position item on Vertical Center
                            parent.height(ch);
                            child.css('margin-top', (ch-child.height())/2);
                        },
                        centerItem:function(parent, child, cw, ch){// Position item on Center
                            prototypes.hCenterItem(parent, child, cw);
                            prototypes.vCenterItem(parent, child, ch);
                        },
                        tlItem:function(parent, child, cw, ch){// Position item on Top-Left
                            prototypes.topItem(parent, child, ch);
                            prototypes.leftItem(parent, child, cw);
                        },
                        tcItem:function(parent, child, cw, ch){// Position item on Top-Center
                            prototypes.topItem(parent, child, ch);
                            prototypes.hCenterItem(parent, child, cw);
                        },
                        trItem:function(parent, child, cw, ch){// Position item on Top-Right
                            prototypes.topItem(parent, child, ch);
                            prototypes.rightItem(parent, child, cw);
                        },
                        mlItem:function(parent, child, cw, ch){// Position item on Middle-Left
                            prototypes.vCenterItem(parent, child, ch);
                            prototypes.leftItem(parent, child, cw);
                        },
                        mrItem:function(parent, child, cw, ch){// Position item on Middle-Right
                            prototypes.vCenterItem(parent, child, ch);
                            prototypes.rightItem(parent, child, cw);
                        },
                        blItem:function(parent, child, cw, ch){// Position item on Bottom-Left
                            prototypes.bottomItem(parent, child, ch);
                            prototypes.leftItem(parent, child, cw);
                        },
                        bcItem:function(parent, child, cw, ch){// Position item on Bottom-Center
                            prototypes.bottomItem(parent, child, ch);
                            prototypes.hCenterItem(parent, child, cw);
                        },
                        brItem:function(parent, child, cw, ch){// Position item on Bottom-Right
                            prototypes.bottomItem(parent, child, ch);
                            prototypes.rightItem(parent, child, cw);
                        },
                        
                        touchNavigation:function(parent, child){// One finger navigation for touchscreen devices
                            var prevX, prevY, currX, currY, touch, childX, childY;
                            
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

			rgb2hex:function(rgb){// Convert RGB color to HEX
                            var hexDigits = new Array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');

                            rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);

                            return (isNaN(rgb[1]) ? '00':hexDigits[(rgb[1]-rgb[1]%16)/16]+hexDigits[rgb[1]%16])+
                                   (isNaN(rgb[2]) ? '00':hexDigits[(rgb[2]-rgb[2]%16)/16]+hexDigits[rgb[2]%16])+
                                   (isNaN(rgb[3]) ? '00':hexDigits[(rgb[3]-rgb[3]%16)/16]+hexDigits[rgb[3]%16]);
			},
			idealTextColor:function(bgColor){// Set text color depending on the background color
			    var rgb = /rgb\((\d+).*?(\d+).*?(\d+)\)/.exec(bgColor);
    
			    if (rgb != null){
			        return parseInt(rgb[1], 10)+parseInt(rgb[2], 10)+parseInt(rgb[3], 10) < 3*256/2 ? 'white' : 'black';
			    }
			    else{
			        return parseInt(bgColor.substring(0, 2), 16)+parseInt(bgColor.substring(2, 4), 16)+parseInt(bgColor.substring(4, 6), 16) < 3*256/2 ? 'white' : 'black';
			    }
			},

                        dateDiference:function(date1, date2){// Diference between 2 dates
                            var time1 = date1.getTime(),
                            time2 = date2.getTime(),
                            diff = Math.abs(time1-time2),
                            one_day = 1000*60*60*24;
                            
                            return parseInt(diff/(one_day))+1;
                        },
                        previousTime:function(time, size, type){
                            var timePieces = time.split(':'),
                            hours = parseInt(timePieces[0], 10),
                            minutes = timePieces[1] == undefined ? 0:parseInt(timePieces[1], 10),
                            seconds = timePieces[2] == undefined ? 0:parseInt(timePieces[2], 10);
                            
                            switch (type){
                                case 'seconds':
                                    seconds = seconds-size;
                                    
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
                                        minutes = minutes-size;
                                        
                                        if (minutes < 0){
                                            minutes = 60+minutes;
                                            hours = hours-1 < 0 ? 0:hours-1;
                                        }
                                    break;
                                default:
                                    hours = hours-size < 0 ? 0:hours-size;
                            }
                            
                            return prototypes.timeLongItem(hours)+(timePieces[1] == undefined ? '':':'+prototypes.timeLongItem(minutes)+(timePieces[2] == undefined ? '':':'+prototypes.timeLongItem(seconds)));
                        },
                        noDays:function(date1, date2){// Returns no of days between 2 days
                            var time1 = date1.getTime(),
                            time2 = date2.getTime(),
                            diff = Math.abs(time1-time2),
                            one_day = 1000*60*60*24;
                            
                            return Math.round(diff/(one_day))+1;
                        },
                        timeLongItem:function(item){// Return day/month with 0 in front if smaller then 10
                            if (item < 10){
                                return '0'+item;
                            }
                            else{
                                return item;
                            }
                        },
                        timeToAMPM:function(item){// Returns time in AM/PM format
                            var hour = parseInt(item.split(':')[0], 10),
                            minutes = item.split(':')[1],
                            result = '';
                            
                            if (hour == 0){
                                result = '12';
                            }
                            else if (hour > 12){
                                result = prototypes.timeLongItem(hour-12);
                            }
                            else{
                                result = prototypes.timeLongItem(hour);
                            }
                            
                            result += ':'+minutes+' '+(hour < 12 ? 'AM':'PM');
                            
                            return result;
                        },

                        stripslashes:function(str){// Remove slashes from string
                            return (str + '').replace(/\\(.?)/g, function (s, n1) {
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
                        
                        randomize:function(theArray){// Randomize the items of an array
                            theArray.sort(function(){
                                return 0.5-Math.random();
                            });
                            return theArray;
                        },
                        randomString:function(string_length){// Create a string with random elements
                            var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz",
                            random_string = '';

                            for (var i=0; i<string_length; i++){
                                var rnum = Math.floor(Math.random()*chars.length);
                                random_string += chars.substring(rnum,rnum+1);
                            }
                            return random_string;
                        },

                        isIE8Browser:function(){// Detect the browser IE8
                            var isIE8 = false,
                            agent = navigator.userAgent.toLowerCase();

                            if (agent.indexOf('msie 8') != -1){
                                isIE8 = true;
                            }
                            return isIE8;
                        },
                        isIEBrowser:function(){// Detect the browser IE
                            var isIE = false,
                            agent = navigator.userAgent.toLowerCase();

                            if (agent.indexOf('msie') != -1){
                                isIE = true;
                            }
                            return isIE;
                        },
                        isChromeMobileBrowser:function(){// Detect the browser Mobile Chrome
                            var isChromeMobile = false,
                            agent = navigator.userAgent.toLowerCase();
                            
                            if ((agent.indexOf('chrome') != -1 || agent.indexOf('crios') != -1) && prototypes.isTouchDevice()){
                                isChromeMobile = true;
                            }
                            return isChromeMobile;
                        },
                        isAndroid:function(){// Detect the browser Mobile Chrome
                            var isAndroid = false,
                            agent = navigator.userAgent.toLowerCase();

                            if (agent.indexOf('android') != -1){
                                isAndroid = true;
                            }
                            return isAndroid;
                        },
                        isTouchDevice:function(){// Detect touchscreen devices
                            var os = navigator.platform;
                            
                            if (os.toLowerCase().indexOf('win') != -1){
                                return window.navigator.msMaxTouchPoints;
                            }
                            else {
                                return 'ontouchstart' in document;
                            }
                        },

                        openLink:function(url, target){// Open a link
                            switch (target.toLowerCase()){
                                case '_blank':
                                    window.open(url);
                                    break;
                                case '_top':
                                    top.location.href = url;
                                    break;
                                case '_parent':
                                    parent.location.href = url;
                                    break;
                                default:    
                                    window.location = url;
                            }
                        },

                        validateCharacters:function(str, allowedCharacters){// Verify if a string contains allowed characters
                            var characters = str.split(''), i;

                            for (i=0; i<characters.length; i++){
                                if (allowedCharacters.indexOf(characters[i]) == -1){
                                    return false;
                                }
                            }
                            return true;
                        },
                        cleanInput:function(input, allowedCharacters, firstNotAllowed, min){// Remove characters that aren't allowed from a string
                            var characters = $(input).val().split(''),
                            returnStr = '', i, startIndex = 0;

                            if (characters.length > 1 && characters[0] == firstNotAllowed){
                                startIndex = 1;
                            }
                            
                            for (i=startIndex; i<characters.length; i++){
                                if (allowedCharacters.indexOf(characters[i]) != -1){
                                    returnStr += characters[i];
                                }
                            }
                                
                            if (min > returnStr){
                                returnStr = min;
                            }
                            
                            $(input).val(returnStr);
                        },
                        validEmail:function(email){// Validate email
                            var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                            
                            if (filter.test(email)){
                                return true;
                            }
                            return false;
                        },
                        
                        $_GET:function(variable){// Parse $_GET variables
                            var url = window.location.href.split('?')[1],
                            variables = url != undefined ? url.split('&'):[],
                            i; 
                            
                            for (i=0; i<variables.length; i++){
                                if (variables[i].indexOf(variable) != -1){
                                    return variables[i].split('=')[1];
                                    break;
                                }
                            }
                            
                            return undefined;
                        },
                        acaoBuster:function(dataURL){// Access-Control-Allow-Origin buster
                            var topURL = window.location.href,
                            pathPiece1 = '', pathPiece2 = '';
                            
                            if (dataURL.indexOf('https') != -1 || dataURL.indexOf('http') != -1){
                                if (topURL.indexOf('http://www.') != -1){
                                    pathPiece1 = prototypes.isSubdomain(dataURL) ? 'http://':'http://www.';
                                }
                                else if (topURL.indexOf('http://') != -1){
                                    pathPiece1 = 'http://';
                                }
                                else if (topURL.indexOf('https://www.') != -1){
                                    pathPiece1 = prototypes.isSubdomain(dataURL) ? 'https://':'https://www.';
                                }
                                else if (topURL.indexOf('https://') != -1){
                                    pathPiece1 = 'https://';
                                }
                                    
                                if (dataURL.indexOf('http://www.') != -1){
                                    pathPiece2 = dataURL.split('http://www.')[1];
                                }
                                else if (dataURL.indexOf('http://') != -1){
                                    pathPiece2 = dataURL.split('http://')[1];
                                }
                                else if (dataURL.indexOf('https://www.') != -1){
                                    pathPiece2 = dataURL.split('https://www.')[1];
                                }
                                else if (dataURL.indexOf('https://') != -1){
                                    pathPiece2 = dataURL.split('https://')[1];
                                }
                                
                                return pathPiece1+pathPiece2;
                            }
                            else{
                                return dataURL;
                            }
                        },
                        isSubdomain:function(url){
                            var subdomain;
 
                            url = url.replace(new RegExp(/^\s+/),""); // Remove white spaces from the begining of the url.
                            url = url.replace(new RegExp(/\s+$/),""); // Remove white spaces from the end of the url.
                            url = url.replace(new RegExp(/\\/g),"/"); // If found , convert back slashes to forward slashes.
                            url = url.replace(new RegExp(/^http\:\/\/|^https\:\/\/|^ftp\:\/\//i),""); // If there, removes 'http://', 'https://' or 'ftp://' from the begining.
                            url = url.replace(new RegExp(/^www\./i),""); // If there, removes 'www.' from the begining.
                            url = url.replace(new RegExp(/\/(.*)/),""); // Remove complete string from first forward slaash on.
 
                            if (url.match(new RegExp(/\.[a-z]{2,3}\.[a-z]{2}$/i))){ // Remove '.??.??' or '.???.??' from end - e.g. '.CO.UK', '.COM.AU'
                                url = url.replace(new RegExp(/\.[a-z]{2,3}\.[a-z]{2}$/i),"");
                            }
                            else if (url.match(new RegExp(/\.[a-z]{2,4}$/i))){ // Removes '.??' or '.???' or '.????' from end - e.g. '.US', '.COM', '.INFO'
                                url = url.replace(new RegExp(/\.[a-z]{2,4}$/i),"");
                            }
                            subdomain = (url.match(new RegExp(/\./g))) ? true : false; // Check to see if there is a dot '.' left in the string.

                            return(subdomain);
                        },
                        
                        doHideBuster:function(item){// Make all parents & current item visible
                            var parent = item.parent(),
                            items = new Array();
                                
                            if (item.prop('tagName') != undefined && item.prop('tagName').toLowerCase() != 'body'){
                                items = prototypes.doHideBuster(parent);
                            }
                            
                            if (item.css('display') == 'none'){
                                item.css('display', 'block');
                                items.push(item);
                            }
                            
                            return items;
                        },
                        undoHideBuster:function(items){// Hide items in the array
                            var i;
                            
                            for (i=0; i<items.length; i++){
                                items[i].css('display', 'none');
                            }
                        },
                       
                        setCookie:function(c_name, value, expiredays){// Set cookie (name, value, expire in no days)
                            var exdate = new Date();
                            exdate.setDate(exdate.getDate()+expiredays);

                            document.cookie = c_name+"="+escape(value)+((expiredays==null) ? "" : ";expires="+exdate.toUTCString())+";javahere=yes;path=/";
                        },
                        readCookie:function(name){// Read cookie (name) 
                            var nameEQ = name+"=",
                            ca = document.cookie.split(";");

                            for (var i=0; i<ca.length; i++){
                                var c = ca[i];

                                while (c.charAt(0)==" "){
                                    c = c.substring(1,c.length);            
                                } 

                                if (c.indexOf(nameEQ) == 0){
                                    return unescape(c.substring(nameEQ.length, c.length));
                                } 
                            }
                            return null;
                        },
                        deleteCookie:function(c_name, path, domain){// Delete cookie (name, path, domain)
                            if (readCookie(c_name)){
                                document.cookie = c_name+"="+((path) ? ";path="+path:"")+((domain) ? ";domain="+domain:"")+";expires=Thu, 01-Jan-1970 00:00:01 GMT";
                            }
                        }
                    };

        return methods.init.apply(this);
    }
})(jQuery);