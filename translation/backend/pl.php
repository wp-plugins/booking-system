<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 1.1
* File                    : pl.php
* File Version            : 1.0
* Created / Last Modified : 29 July 2013
* Author                  : Dot on Paper
* Copyright               : © 2013 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Polish Back End Translation.
* Translated by           : Kwasniewski Krzysztof - http://etechnologie.pl
*/

    define('DOPBSP_TITLE', "Rezerwacje");

    // Loading ...
    define('DOPBSP_LOAD', "Trwa pobieranie ...");

    // Save ...
    define('DOPBSP_SAVE', "Zapisz dane ...");
    define('DOPBSP_SAVE_SUCCESS', "Dane zostały zapisane.");
    
    // Months & Week Days
    global $DOPBSP_month_names;
    $DOPBSP_month_names = array('Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień');
    
    global $DOPBSP_day_names;
    $DOPBSP_day_names = array('Niedziela', 'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota');
    
    // Help
    define('DOPBSP_CALENDARS_HELP', "Kliknij 'Plus' aby dodać kalendarz. Kliknij na wybranym kalendarzu aby edytować.");
    define('DOPBSP_CALENDAR_EDIT_HELP', "Wybierz dni i godziny aby edytować. Kliknij ikonę 'ołówka' aby edytować ustawienia kalendarza. Jeśli klikniesz ikonę 'mail' zobaczysz aktualne rezerwacje. W dokumentacji znajdziesz więcej informacji.");
    define('DOPBSP_CALENDAR_EDIT_SETTINGS_HELP', "Przycisk 'Zapisz' umożliwia zapisanie zmian, 'Usuń' usuwanie kalendarzy, 'Powrót' to return to the calendar.");
    
    // Form
    define('DOPBSP_SUBMIT', "Zapisz");
    define('DOPBSP_DELETE', "Usuń");
    define('DOPBSP_BACK', "Powrót");
    define('DOPBSP_BACK_SUBMIT', "Powrót do kalenadarza.");
    define('DOPBSP_ENABLED', "Aktywne");
    define('DOPBSP_DISABLED', "Nieaktywne");
    define('DOPBSP_DATE_TYPE_AMERICAN', "Amerykański (mm dd, yyyy)");
    define('DOPBSP_DATE_TYPE_EUROPEAN', "Europejski (dd mm yyyy)");

    // Calendars    
    define('DOPBSP_SHOW_CALENDARS', "Kalendarze");
    define('DOPBSP_CALENDARS_LOADED', "Uruchamianie listy kalendarzy.");
    define('DOPBSP_CALENDAR_LOADED', "Uruchamianie kalendarza.");
    define('DOPBSP_NO_CALENDARS', "Brak kalendarzy.");    
    
    // Calendar 
    define('DOPBSP_ADD_MONTH_VIEW', "Dodaj widok miesiąca");
    define('DOPBSP_REMOVE_MONTH_VIEW', "Usuń widok miesiąca");
    define('DOPBSP_PREVIOUS_MONTH', "Poprzedni miesiąc");
    define('DOPBSP_NEXT_MONTH', "Następny miesiąc");
    define('DOPBSP_AVAILABLE_ONE_TEXT', "dostępne");
    define('DOPBSP_AVAILABLE_TEXT', "dostępne");
    define('DOPBSP_BOOKED_TEXT', "rezerwacja");
    define('DOPBSP_UNAVAILABLE_TEXT', "niedostępne");
                            
    // Calendar Form 
    define('DOPBSP_DATE_START_LABEL', "Data rozpoczęcia");
    define('DOPBSP_DATE_END_LABEL', "Data zakończenia");    
    define('DOPBSP_STATUS_LABEL', "Status");
    define('DOPBSP_STATUS_AVAILABLE_TEXT', "Dostępne");
    define('DOPBSP_STATUS_BOOKED_TEXT', "Rezerwacja");
    define('DOPBSP_STATUS_SPECIAL_TEXT', "Specialny");
    define('DOPBSP_STATUS_UNAVAILABLE_TEXT', "Niedostępne");
    define('DOPBSP_PRICE_LABEL', "Cena");    
    define('DOPBSP_PROMO_LABEL', "Promocja");               
    define('DOPBSP_AVAILABLE_LABEL', "Dostępna ilość");         
    define('DOPBSP_HOURS_DEFINITIONS_CHANGE_LABEL', "Zmień definicję godzin (zmiana nadpisze poprzednie ustawienia)");
    define('DOPBSP_HOURS_DEFINITIONS_LABEL', "Ustawienia godzin(hh:mm jedna w linii). Używaj tylko formatu 24 godzinnego.");  
    define('DOPBSP_HOURS_SET_DEFAULT_DATA_LABEL', "Ustaw domyślną wartość godzin dla dni. Zmiana nadpisze poprzednie ustawienia.)"); 
    define('DOPBSP_HOURS_START_LABEL', "Godzina rozpoczęcia"); 
    define('DOPBSP_HOURS_END_LABEL', "Godzina zakończenia");
    define('DOPBSP_HOURS_INFO_LABEL', "Informacja (użytkownik zobaczy wiadomość)");
    define('DOPBSP_HOURS_NOTES_LABEL', "Notatka(widoczna tylko dla Ciebie)");
    define('DOPBSP_GROUP_DAYS_LABEL', "Grupuj dni");
    define('DOPBSP_GROUP_HOURS_LABEL', "Grupuj godziny");
    define('DOPBSP_RESET_CONFIRMATION', "Czy jesteś pewnien, że chcesz zresetować dane? Jeśli zresetujesz dni pozostałę ustawienia również zostaną zresetowane.");
    
    // Add Calendar
    define('DOPBSP_ADD_CALENDAR_NAME', "Nowy kalendarz");

    // Edit Calendar
    define('DOPBSP_EDIT_CALENDAR_SUBMIT', "Edytuj kalendarz");
    define('DOPBSP_EDIT_CALENDAR_USERS_PERMISSIONS', "Uprawnienia użytkownika");
    define('DOPBSP_EDIT_CALENDAR_SUCCESS', "Edycja kalendarza zakończona sukcesem.");
    
    // Reservations
    define('DOPBSP_SHOW_RESERVATIONS', "Pokaż rezerwacje");    
    define('DOPBSP_NO_RESERVATIONS', "Brak rezerwacji.");
    
    define('DOPBSP_RESERVATIONS_ID', "ID Rezerwacji");
    
    define('DOPBSP_RESERVATIONS_CHECK_IN_LABEL', "Check In");
    define('DOPBSP_RESERVATIONS_CHECK_OUT_LABEL', "Check Out");
    define('DOPBSP_RESERVATIONS_START_HOURS_LABEL', "Start o"); 
    define('DOPBSP_RESERVATIONS_END_HOURS_LABEL', "Zakończenie o");
    
    define('DOPBSP_RESERVATIONS_FIRST_NAME_LABEL', "Imię");
    define('DOPBSP_RESERVATIONS_LAST_NAME_LABEL', "Nazwisko");
    define('DOPBSP_RESERVATIONS_STATUS_LABEL', "Status");
    define('DOPBSP_RESERVATIONS_STATUS_PENDING', "Oczekujące");
    define('DOPBSP_RESERVATIONS_STATUS_APPROVED', "Przyjęte");        
    define('DOPBSP_RESERVATIONS_DATE_CREATED_LABEL', "Data utworzenia");    
    define('DOPBSP_RESERVATIONS_PAYMENT_METHOD_LABEL', 'Sposób płatności');
    define('DOPBSP_RESERVATIONS_PAYMENT_METHOD_ARRIVAL', 'Po przyjeździe');
    define('DOPBSP_RESERVATIONS_PAYMENT_METHOD_PAYPAL', 'PayPal');
    define('DOPBSP_RESERVATIONS_PAYMENT_METHOD_PAYPAL_TRANSACTION_ID_LABEL', 'PayPal Transaction ID');   
    define('DOPBSP_RESERVATIONS_TOTAL_PRICE_LABEL', "Razem:"); 
    define('DOPBSP_RESERVATIONS_NO_ITEMS_LABEL', "Brak rezerwacji"); 
    define('DOPBSP_RESERVATIONS_PRICE_LABEL', "Cena"); 
    define('DOPBSP_RESERVATIONS_DEPOSIT_PRICE_LABEL', "Zaliczka");
    define('DOPBSP_RESERVATIONS_DEPOSIT_PRICE_LEFT_LABEL', " Przejdź do płatności:");
    define('DOPBSP_RESERVATIONS_DISCOUNT_PRICE_LABEL', "Aktualna cena");
    define('DOPBSP_RESERVATIONS_DISCOUNT_PRICE_TEXT', "rabat");
    define('DOPBSP_RESERVATIONS_EMAIL_LABEL', "Email"); 
    define('DOPBSP_RESERVATIONS_PHONE_LABEL', "Telefon"); 
    define('DOPBSP_RESERVATIONS_NO_PEOPLE_LABEL', "Brak osób"); 
    define('DOPBSP_RESERVATIONS_NO_ADULTS_LABEL', "Brak dorosłych"); 
    define('DOPBSP_RESERVATIONS_NO_CHILDREN_LABEL', "Brak dzieci"); 
    define('DOPBSP_RESERVATIONS_MESSAGE_LABEL', "Wiadomość");
    
    define('DOPBSP_RESERVATIONS_JUMP_TO_DAY_LABEL', 'Przejdź do dnia');
    define('DOPBSP_RESERVATIONS_APPROVE_LABEL', 'Przyjęta');
    define('DOPBSP_RESERVATIONS_REJECT_LABEL', 'Odrzucone');
    define('DOPBSP_RESERVATIONS_CANCEL_LABEL', 'Anuluj');
    
    define('DOPBSP_RESERVATIONS_APPROVE_CONFIRMATION', 'Czy na pewno chcesz przyjąć rezerwację?');
    define('DOPBSP_RESERVATIONS_APPROVE_SUCCESS', 'Rezerwacja została przyjęta.');
    define('DOPBSP_RESERVATIONS_REJECT_CONFIRMATION', 'Czy na pewno chcesz odrzucić rezerwację?');
    define('DOPBSP_RESERVATIONS_REJECT_SUCCESS', 'Rezerwacja została odrzucona.');
    define('DOPBSP_RESERVATIONS_CANCEL_CONFIRMATION', 'Czy na pewno chcesz anulować rezerwację?');
    define('DOPBSP_RESERVATIONS_CANCEL_SUCCESS', 'ezerwacja została anulowana.');
    
    // TinyMCE
    define('DOPBSP_TINYMCE_ADD', 'Dodaj kalendarz');
    
    // Settings
    define('DOPBSP_GENERAL_STYLES_SETTINGS', "Ustawienia ogóle");
    define('DOPBSP_CALENDAR_NAME', "Nazwa");
    define('DOPBSP_AVAILABLE_DAYS', "Dostępne dni");
    define('DOPBSP_FIRST_DAY', "Pierwszy dzień");
    define('DOPBSP_CURRENCY', "Waluta");
    define('DOPBSP_DATE_TYPE', "Date Type");
    define('DOPBSP_PREDEFINED', "Wybierz wstępne ustawienia");
    define('DOPBSP_TEMPLATE', "Szablon");
    define('DOPBSP_MIN_STAY', "Minimalna ilość");
    define('DOPBSP_MAX_STAY', "Maksymalna ilość");
    define('DOPBSP_NO_ITEMS_ENABLED', "Pozwól na wybór ilości");
    define('DOPBSP_VIEW_ONLY', "Tylko podgląd (bez rezerwacji)");
    define('DOPBSP_PAGE_URL', "Adres URL");
    
    define('DOPBSP_NOTIFICATIONS_STYLES_SETTINGS', "Ustawienia powiadomień");
    define('DOPBSP_NOTIFICATIONS_TEMPLATE', "Szablon wiadomości email");
    define('DOPBSP_NOTIFICATIONS_EMAIL', "Email z powiadomieniem");
    define('DOPBSP_NOTIFICATIONS_SMTP_ENABLED', "Autoryzacja SMTP");
    define('DOPBSP_NOTIFICATIONS_SMTP_HOST_NAME', "Nazwa hosta SMTP");
    define('DOPBSP_NOTIFICATIONS_SMTP_HOST_PORT', "Numer portu SMTP");
    define('DOPBSP_NOTIFICATIONS_SMTP_SSL', "Połączenie SMTP SSL");
    define('DOPBSP_NOTIFICATIONS_SMTP_USER', "Nazwa użytkownika SMTP");
    define('DOPBSP_NOTIFICATIONS_SMTP_PASSWORD', "Hasła użytkownika SMTP");
                                              
    define('DOPBSP_HOURS_STYLES_SETTINGS', "Ustawienia godzin");
    define('DOPBSP_MULTIPLE_DAYS_SELECT', "Użyj Check In/Check Out");
    define('DOPBSP_MORNING_CHECK_OUT', "Poranne Check Out");
    define('DOPBSP_HOURS_ENABLED', "Użyj godzin");
    define('DOPBSP_HOURS_DEFINITIONS', "Zdefiniuj goodziny");
    define('DOPBSP_MULTIPLE_HOURS_SELECT', "Użyj Start/Koniec");
    define('DOPBSP_HOURS_AMPM', "Wykorzystaj format AM/PM");
    define('DOPBSP_LAST_HOUR_TO_TOTAL_PRICE', "Dodaj ostatnią wybraną godzinę do podsumowania ceny");
    define('DOPBSP_HOURS_INTERVAL_ENABLED', "Aktywuj interwał godzin");
    
    define('DOPBSP_DISCOUNTS_NO_DAYS_SETTINGS', "Rabat za ilość");
    define('DOPBSP_DISCOUNTS_NO_DAYS', "Rabat za ilość dni");
    define('DOPBSP_DISCOUNTS_NO_DAYS_DAYS', "dni rezerwacji");
    
    define('DOPBSP_DEPOSIT_SETTINGS', "Zaliczka");
    define('DOPBSP_DEPOSIT', "Wartość zaliczki");
    
    define('DOPBSP_FORM_STYLES_SETTINGS', "Ustawienia formularza rezerwacji");
    define('DOPBSP_FORM', "Wybierz formularz");
    define('DOPBSP_INSTANT_BOOKING_ENABLED', "Instant Booking");
    define('DOPBSP_NO_PEOPLE_ENABLED', "Wybór ilości osób w rezerwacji");
    define('DOPBSP_MIN_NO_PEOPLE', "Minimalna ilość osób");
    define('DOPBSP_MAX_NO_PEOPLE', "Maksymalna ilość osób");
    define('DOPBSP_NO_CHILDREN_ENABLED', "Wybór ilości dzieci w rezerwacji");
    define('DOPBSP_MIN_NO_CHILDREN', "Minimalna ilość dzieci");
    define('DOPBSP_MAX_NO_CHILDREN', "Maksymalna ilość dzieci");
    define('DOPBSP_PAYMENT_ARRIVAL_ENABLED', "Płatność po przyjeździe");
    
    define('DOPBSP_PAYMENT_PAYPAL_STYLES_SETTINGS', "PayPal ustawineia");
    define('DOPBSP_PAYMENT_PAYPAL_ENABLED', "Enable PayPal Payment");
    define('DOPBSP_PAYMENT_PAYPAL_USERNAME', "PayPal API User Name");
    define('DOPBSP_PAYMENT_PAYPAL_PASSWORD', "PayPal API Password");
    define('DOPBSP_PAYMENT_PAYPAL_SIGNATURE', "PayPal API Signature");
    define('DOPBSP_PAYMENT_PAYPAL_CREDIT_CARD', "Aktywuj płatność kartą kredytową");
    define('DOPBSP_PAYMENT_PAYPAL_SANDBOX_ENABLED', "Enable PayPal Sandbox");
    
    define('DOPBSP_TERMS_AND_CONDITIONS_ENABLED', "Akceptacja regulaminu");
    define('DOPBSP_TERMS_AND_CONDITIONS_LINK', "Link do strony z regulaminem");
    
    define('DOPBSP_GO_TOP', "do góry");
    define('DOPBSP_SHOW', "pokaż");
    define('DOPBSP_HIDE', "ukryj");
    
    // Settings Info
    define('DOPBSP_CALENDAR_NAME_INFO', "Zmień nazwę kalendarza.");
    define('DOPBSP_AVAILABLE_DAYS_INFO', "Domyślnie: wszystkie dostępne. Wybierz dostępne dni.");
    define('DOPBSP_FIRST_DAY_INFO', "Domyślnie: Poniedziałek. Wybierz pierwszy dzień w kalendarzu.");
    define('DOPBSP_CURRENCY_INFO', "Domyślna waluta: USD. Wybierz walutę.");
    define('DOPBSP_DATE_TYPE_INFO', "Domyślna wartość: amerykański. Wybierz format daty: Amerykański (mm dd, yyyy) lub Europejski (dd mm yyyy).");
    define('DOPBSP_PREDEFINED_INFO', "Wybierz zapisz aby zaakceptować zmiany w ustawieniach.");
    define('DOPBSP_TEMPLATE_INFO', "Domyślnie: default. Select styles template.");
    define('DOPBSP_MIN_STAY_INFO', "Domyślnie: 1. Wybierz minimalną ilość dni, którą można rezerwować.");
    define('DOPBSP_MAX_STAY_INFO', "Domyślnie: 0. Wybierz maksymalną ilość dni, którą można rezerwować. Wartość 0 oznacza brak limitu.");
    define('DOPBSP_NO_ITEMS_ENABLED_INFO', "Domyślnie: aktywne. Wybierz aby wyświetlać tylko informację o dostępności bez możliowości rezerwacji.");
    define('DOPBSP_VIEW_ONLY_INFO', "Domyślnie: aktywne. Ustaw aby pokazywać tylko informacje o rezerwacjach na stronie.");
    define('DOPBSP_PAGE_URL_INFO', "Wpisz adres strony na której znajdzie się kalendarz. To jest obowiązkowe jeśli chcesz umożliwić wyszukiwanie w kalendarzach.");
    
    define('DOPBSP_NOTIFICATIONS_TEMPLATE_INFO', "Domyślnie: default. Wybierz szablon e-maila.");
    define('DOPBSP_NOTIFICATIONS_EMAIL_INFO', "Wpisz e-mail, na który zostanie wysłana informacja o rezerwacji lub zapytaniu.");
    define('DOPBSP_NOTIFICATIONS_SMTP_ENABLED_INFO', "Użyj SMTP aby wysyłać e-maile.");
    define('DOPBSP_NOTIFICATIONS_SMTP_HOST_NAME_INFO', "Wpisz nazwę hosta SMTP.");
    define('DOPBSP_NOTIFICATIONS_SMTP_HOST_PORT_INFO', "Wpisz numer portu SMTP.");
    define('DOPBSP_NOTIFICATIONS_SMTP_SSL_INFO', "Użyj połączenia SSL.");
    define('DOPBSP_NOTIFICATIONS_SMTP_USER_INFO', "Wpisz nazwę użytkownika SMTP.");
    define('DOPBSP_NOTIFICATIONS_SMTP_PASSWORD_INFO', "Wpisz hasło użytkownika SMTP.");
    
    define('DOPBSP_MULTIPLE_DAYS_SELECT_INFO', "Domyślnie: Aktywne. Użyj Check In/Check Out lub wybierz jeden dzień.");
    define('DOPBSP_MORNING_CHECK_OUT_INFO', "Domyślnie: Nieaktywne. Opcja aktywuje Check In po południu pierwszego dnia i Check Out rano ostatniego dnia.");
    define('DOPBSP_HOURS_ENABLED_INFO', "Domyślnie: Nieaktywne. Aktywuj godziny dla tego kalendarza.");
    define('DOPBSP_HOURS_DEFINITIONS_INFO', "Wpisz hh:mm ... jedna w linii. Ta zmiana nadpisze poprzednie ustawienia. Używaj tylko formatu 24 godzinnego.");
    define('DOPBSP_MULTIPLE_HOURS_SELECT_INFO', "Domyślnie: Aktywne. Użyj Start/Koniec lub wybierz jedną godzinę.");
    define('DOPBSP_HOURS_AMPM_INFO', "Domyślnie: Nieaktywne. Wyświetlaj godziny w formacie AM/PM. Uwaga: Ustawienia godzin będą nadal w formie 24 godzinnym.");
    define('DOPBSP_LAST_HOUR_TO_TOTAL_PRICE_INFO', "Domyślnie: Aktywne. It calculates the total price before the last hours selected if Disabled. It calculates the total price including the last hour selected if Enabled. <br /><br /><strong>Warning: </strong> In administration area the last hours from your definitions list will not be displayed.");
    define('DOPBSP_HOURS_INTERVAL_ENABLED_INFO', "Domyślnie: Nieaktywne. Show hours interval from the current hour to the next one.");
    
    define('DOPBSP_DISCOUNTS_NO_DAYS_INFO', "Wybierz ilość dni dla których chcesz udzielić rabatu (max 31 dni).");
    define('DOPBSP_DISCOUNTS_NO_DAYS_DAYS_INFO', "Domyślna wartość 0. Ustaw procent rabatu jaki uzyska klient rezerwując okresloną ilość dni.");
    
    define('DOPBSP_DEPOSIT_INFO', "Domyślna wartość: 0. Wpisz procent wymaganej zaliczki. Zaliczka jest dośtępna tylko jest aktywny jest moduł płatności.");
    
    define('DOPBSP_FORM_INFO', "Wybierz formularz rezerwacji.");
    define('DOPBSP_INSTANT_BOOKING_ENABLED_INFO', "Domyślna wartość: Nieaktywne. Instantly book the data in a calendar once the request has been submitted.");
    define('DOPBSP_NO_PEOPLE_ENABLED_INFO', "Domyślna wartość: Aktywne. Request number of people that will use the booked item.");
    define('DOPBSP_MIN_NO_PEOPLE_INFO', "Domyślna wartość: 1. Set minimum number of allowed people per booked item.");
    define('DOPBSP_MAX_NO_PEOPLE_INFO', "Domyślna wartość: 4. Set maximum number of allowed people per booked item.");
    define('DOPBSP_NO_CHILDREN_ENABLED_INFO', "Domyślna wartość: Aktywne. Request number of children that will use the booked item.");
    define('DOPBSP_MIN_NO_CHILDREN_INFO', "Domyślna wartość: 0. Set minimum number of allowed children per booked item.");
    define('DOPBSP_MAX_NO_CHILDREN_INFO', "Domyślna wartość: 2. Set maximum number of allowed children per booked item.");
    define('DOPBSP_PAYMENT_ARRIVAL_ENABLED_INFO', "Domyślna wartość: Aktywne. Allow user to pay on arrival. Need approval.");
    
    define('DOPBSP_PAYMENT_PAYPAL_ENABLED_INFO', "Domyślna wartość: Nieaktywne. Pozwól na płatności PayPal. The period is instantly booked.");
    define('DOPBSP_PAYMENT_PAYPAL_USERNAME_INFO', "Enter PayPal API Credentials User Name. View Help section to see from were you can get them.");
    define('DOPBSP_PAYMENT_PAYPAL_PASSWORD_INFO', "Enter PayPal API Credentials Password. View Help section to see from were you can get them.");
    define('DOPBSP_PAYMENT_PAYPAL_SIGNATURE_INFO', "Enter PayPal API Credentials Signature. View Help section to see from were you can get them.");
    define('DOPBSP_PAYMENT_PAYPAL_CREDIT_CARD_INFO', "Default value: Disabled. Enable so that users can pay directly with their Credit Card.");
    define('DOPBSP_PAYMENT_PAYPAL_SANDBOX_ENABLED_INFO', "Domyślna wartość: Nieaktywne. Enable to use PayPal Sandbox features.");
    
    define('DOPBSP_TERMS_AND_CONDITIONS_ENABLED_INFO', "Domyślna wartość: Nieaktywne. Enable Terms & Conditions check box.");
    define('DOPBSP_TERMS_AND_CONDITIONS_LINK_INFO', "Wpisz link do strony z regulaminem.");
    
    // Booking Forms
    define('DOPBSP_TITLE_BOOKING_FORMS', "Formularze");
    define('DOPBSP_BOOKING_FORMS_HELP', "Kliknij ikonę 'Plus' aby dodać formularz rezerwacji. Jeśli klikniesz na wybrany formularz będziesz mógł edytować.");
    define('DOPBSP_BOOKING_FORMS_LOADED', "Lista formularzy wczytana.");
    define('DOPBSP_BOOKING_FORM_SETTINGS_HELP', "Wybierz 'Zapisz' aby aktywować zmiany, 'Usuń' aby usunąć formularz.");
    define('DOPBSP_BOOKING_FORM_LOADED', "Uruchamianie formularzy rezerwacji.");
    define('DOPBSP_NO_BOOKING_FORMS', "Nie znaleziono formularzy.");
    
    // Add Booking Form
    define('DOPBSP_ADD_BOOKING_FORM_NAME', "Nowy formularz");
    
    // Edit Booking Form
    define('DOPBSP_EDIT_BOOKING_FORM_SUBMIT', "Zapisz");
    define('DOPBSP_EDIT_BOOKING_FORM_SUCCESS', "Edycja formularza zakończona pomyślnie.");
    
    // Booking Form Fields
    define('DOPBSP_BOOKING_FORM_NAME', "Nazwa formularza");
    define('DOPBSP_BOOKING_FORM_NAME_DEFAULT', "Domyślny formularz");
    define('DOPBSP_BOOKING_FORM_FIELDS_TITLE', "Pole formularza");
    define('DOPBSP_BOOKING_FORM_FIELDS_SHOW_SETTINGS', "Pokaż ustawienia");
    define('DOPBSP_BOOKING_FORM_FIELDS_HIDE_SETTINGS', "Ukryj ustawienia");
    define('DOPBSP_BOOKING_FORM_FIELDS_TYPE_TEXT_LABEL', "Pole");
    define('DOPBSP_BOOKING_FORM_FIELDS_TYPE_TEXTAREA_LABEL', "Pole tekstowe");
    define('DOPBSP_BOOKING_FORM_FIELDS_TYPE_CHECKBOX_LABEL', "Pole wyboru");
    define('DOPBSP_BOOKING_FORM_FIELDS_TYPE_SELECT_LABEL', "Lista rozwijalna");
    define('DOPBSP_BOOKING_FORM_FIELDS_LANGUAGE_LABEL', "Język");
    define('DOPBSP_BOOKING_FORM_FIELDS_NAME_LABEL', "Etykieta");
    define('DOPBSP_BOOKING_FORM_FIELDS_NEW_FIELD_TEXT_LABEL', "Nowe pole");
    define('DOPBSP_BOOKING_FORM_FIELDS_NEW_FIELD_TEXTAREA_LABEL', "Nowe pole tekstowe");
    define('DOPBSP_BOOKING_FORM_FIELDS_NEW_FIELD_CHECKBOX_LABEL', "Nowe pole wyboru");
    define('DOPBSP_BOOKING_FORM_FIELDS_NEW_FIELD_SELECT_LABEL', "Nowa lista rozwijalna");
    define('DOPBSP_BOOKING_FORM_FIELDS_ALLOWED_CHARACTERS_LABEL', "Dopuszczalne znaki");
    define('DOPBSP_BOOKING_FORM_FIELDS_SIZE_LABEL', "Rozmiar");
    define('DOPBSP_BOOKING_FORM_FIELDS_EMAIL_LABEL', "Adres email");
    define('DOPBSP_BOOKING_FORM_FIELDS_REQUIRED_LABEL', "Wymagane");
    define('DOPBSP_BOOKING_FORM_FIELDS_SELECT_OPTIONS_LABEL', "Opcje");
    define('DOPBSP_BOOKING_FORM_FIELDS_SELECT_ADD_OPTION', "Dodaj opcje");
    define('DOPBSP_BOOKING_FORM_FIELDS_SELECT_NEW_OPTION_LABEL', "Nowa opcja");
    define('DOPBSP_BOOKING_FORM_FIELDS_SELECT_DELETE_OPTION', "Usuń opcje");
    define('DOPBSP_BOOKING_FORM_FIELDS_SELECT_MULTIPLE_SELECT_LABEL', "Wybór wielokrotny");
    define('DOPBSP_BOOKING_FORM_CHECKED', "Wybrane");
    define('DOPBSP_BOOKING_FORM_UNCHECKED', "Niewybrane");
    
    // Booking Form Fields Info
    define('DOPBSP_BOOKING_FORM_NAME_INFO', "Zmień nazwę pola i zapisz.");
    define('DOPBSP_BOOKING_FORM_FIELDS_INFO', "Aby utworzyć nowe pole przeciągnij i upuść. Jeśli chcesz edytować kliknij ustawienia.");
    define('DOPBSP_BOOKING_FORM_FIELDS_LANGUAGE_INFO', "Wybierz język dla którego chcesz zmienić eytkietę (labels).");
    define('DOPBSP_BOOKING_FORM_FIELDS_NAME_INFO', "Wpisz etykietę pola.");
    define('DOPBSP_BOOKING_FORM_FIELDS_ALLOWED_CHARACTERS_INFO', "Wybierz znaki dopuszczalne w tym polu. Pozostaw puste jeśli nie ma ograniczeń.");
    define('DOPBSP_BOOKING_FORM_FIELDS_SIZE_INFO', "Wpisz maksymalną liczbę znaków. Pozostaw puste jeśli nie ma ograniczeń.");
    define('DOPBSP_BOOKING_FORM_FIELDS_EMAIL_INFO', "Zaznacz jeśli chcesz weryfikować poprawne wpisanie e-maila.");
    define('DOPBSP_BOOKING_FORM_FIELDS_REQUIRED_INFO', "Zaznacz jeśli pole ma być obowiązkowe.");
    define('DOPBSP_BOOKING_FORM_FIELDS_SELECT_OPTIONS_INFO', "Kliknij Plus aby dodać inne opcje.");
    define('DOPBSP_BOOKING_FORM_FIELDS_SELECT_MULTIPLE_SELECT_INFO', "Zaznacz jeśli dopuszczalny jest wybór wielokrotny.");
    
    // Help
    define('DOPBSP_HELP_DOCUMENTATION', "Dokumentacja");
    define('DOPBSP_HELP_FAQ', "FAQ");

?>