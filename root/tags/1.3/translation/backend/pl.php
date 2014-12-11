<?php

/*
* Title                   : Booking System (WordPress Plugin)
* Version                 : 1.2
* File                    : pl.php
* File Version            : 1.0
* Created / Last Modified : 29 July 2013
* Author                  : Dot on Paper
* Copyright               : © 2013 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Polish Back End Translation.
* Translated by           : Kwasniewski Krzysztof - http://etechnologie.pl
*/

    define('DOPBS_TITLE', "Rezerwacje");

    // Loading ...
    define('DOPBS_LOAD', "Trwa pobieranie ...");

    // Save ...
    define('DOPBS_SAVE', "Zapisz dane ...");
    define('DOPBS_SAVE_SUCCESS', "Dane zostały zapisane.");
    
    // Months & Week Days
    global $DOPBS_month_names;
    $DOPBS_month_names = array('Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień');
    
    global $DOPBS_day_names;
    $DOPBS_day_names = array('Niedziela', 'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota');
    
    // Help
    define('DOPBS_CALENDARS_HELP', "Kliknij 'Plus' aby dodać kalendarz. Kliknij na wybranym kalendarzu aby edytować.");
    define('DOPBS_CALENDAR_EDIT_HELP', "Wybierz dni i godziny aby edytować. Kliknij ikonę 'ołówka' aby edytować ustawienia kalendarza. Jeśli klikniesz ikonę 'mail' zobaczysz aktualne rezerwacje. W dokumentacji znajdziesz więcej informacji.");
    define('DOPBS_CALENDAR_EDIT_SETTINGS_HELP', "Przycisk 'Zapisz' umożliwia zapisanie zmian, 'Usuń' usuwanie kalendarzy, 'Powrót' to return to the calendar.");
    
    // Form
    define('DOPBS_SUBMIT', "Zapisz");
    define('DOPBS_DELETE', "Usuń");
    define('DOPBS_BACK', "Powrót");
    define('DOPBS_BACK_SUBMIT', "Powrót do kalenadarza.");
    define('DOPBS_ENABLED', "Aktywne");
    define('DOPBS_DISABLED', "Nieaktywne");
    define('DOPBS_DATE_TYPE_AMERICAN', "Amerykański (mm dd, yyyy)");
    define('DOPBS_DATE_TYPE_EUROPEAN', "Europejski (dd mm yyyy)");

    // Calendars    
    define('DOPBS_SHOW_CALENDARS', "Kalendarze");
    define('DOPBS_CALENDARS_LOADED', "Uruchamianie listy kalendarzy.");
    define('DOPBS_CALENDAR_LOADED', "Uruchamianie kalendarza.");
    define('DOPBS_NO_CALENDARS', "Brak kalendarzy.");    
    
    // Calendar 
    define('DOPBS_ADD_MONTH_VIEW', "Dodaj widok miesiąca");
    define('DOPBS_REMOVE_MONTH_VIEW', "Usuń widok miesiąca");
    define('DOPBS_PREVIOUS_MONTH', "Poprzedni miesiąc");
    define('DOPBS_NEXT_MONTH', "Następny miesiąc");
    define('DOPBS_AVAILABLE_ONE_TEXT', "dostępne");
    define('DOPBS_AVAILABLE_TEXT', "dostępne");
    define('DOPBS_BOOKED_TEXT', "rezerwacja");
    define('DOPBS_UNAVAILABLE_TEXT', "niedostępne");
                            
    // Calendar Form 
    define('DOPBS_DATE_START_LABEL', "Data rozpoczęcia");
    define('DOPBS_DATE_END_LABEL', "Data zakończenia");    
    define('DOPBS_STATUS_LABEL', "Status");
    define('DOPBS_STATUS_AVAILABLE_TEXT', "Dostępne");
    define('DOPBS_STATUS_BOOKED_TEXT', "Rezerwacja");
    define('DOPBS_STATUS_SPECIAL_TEXT', "Specialny");
    define('DOPBS_STATUS_UNAVAILABLE_TEXT', "Niedostępne");
    define('DOPBS_PRICE_LABEL', "Cena");    
    define('DOPBS_PROMO_LABEL', "Promocja");               
    define('DOPBS_AVAILABLE_LABEL', "Dostępna ilość");         
    define('DOPBS_HOURS_DEFINITIONS_CHANGE_LABEL', "Zmień definicję godzin (zmiana nadpisze poprzednie ustawienia)");
    define('DOPBS_HOURS_DEFINITIONS_LABEL', "Ustawienia godzin(hh:mm jedna w linii). Używaj tylko formatu 24 godzinnego.");  
    define('DOPBS_HOURS_SET_DEFAULT_DATA_LABEL', "Ustaw domyślną wartość godzin dla dni. Zmiana nadpisze poprzednie ustawienia.)"); 
    define('DOPBS_HOURS_START_LABEL', "Godzina rozpoczęcia"); 
    define('DOPBS_HOURS_END_LABEL', "Godzina zakończenia");
    define('DOPBS_HOURS_INFO_LABEL', "Informacja (użytkownik zobaczy wiadomość)");
    define('DOPBS_HOURS_NOTES_LABEL', "Notatka(widoczna tylko dla Ciebie)");
    define('DOPBS_GROUP_DAYS_LABEL', "Grupuj dni");
    define('DOPBS_GROUP_HOURS_LABEL', "Grupuj godziny");
    define('DOPBS_RESET_CONFIRMATION', "Czy jesteś pewnien, że chcesz zresetować dane? Jeśli zresetujesz dni pozostałę ustawienia również zostaną zresetowane.");
    
    // Add Calendar
    define('DOPBS_ADD_CALENDAR_NAME', "Nowy kalendarz");

    // Edit Calendar
    define('DOPBS_EDIT_CALENDAR_SUBMIT', "Edytuj kalendarz");
    define('DOPBS_EDIT_CALENDAR_USERS_PERMISSIONS', "Uprawnienia użytkownika");
    define('DOPBS_EDIT_CALENDAR_SUCCESS', "Edycja kalendarza zakończona sukcesem.");
    
    // Reservations
    define('DOPBS_SHOW_RESERVATIONS', "Pokaż rezerwacje");    
    define('DOPBS_NO_RESERVATIONS', "Brak rezerwacji.");
    
    define('DOPBS_RESERVATIONS_ID', "ID Rezerwacji");
    
    define('DOPBS_RESERVATIONS_CHECK_IN_LABEL', "Check In");
    define('DOPBS_RESERVATIONS_CHECK_OUT_LABEL', "Check Out");
    define('DOPBS_RESERVATIONS_START_HOURS_LABEL', "Start o"); 
    define('DOPBS_RESERVATIONS_END_HOURS_LABEL', "Zakończenie o");
    
    define('DOPBS_RESERVATIONS_FIRST_NAME_LABEL', "Imię");
    define('DOPBS_RESERVATIONS_LAST_NAME_LABEL', "Nazwisko");
    define('DOPBS_RESERVATIONS_STATUS_LABEL', "Status");
    define('DOPBS_RESERVATIONS_STATUS_PENDING', "Oczekujące");
    define('DOPBS_RESERVATIONS_STATUS_APPROVED', "Przyjęte");        
    define('DOPBS_RESERVATIONS_DATE_CREATED_LABEL', "Data utworzenia");    
    define('DOPBS_RESERVATIONS_PAYMENT_METHOD_LABEL', 'Sposób płatności');
    define('DOPBS_RESERVATIONS_PAYMENT_METHOD_ARRIVAL', 'Po przyjeździe');
    define('DOPBS_RESERVATIONS_PAYMENT_METHOD_PAYPAL', 'PayPal');
    define('DOPBS_RESERVATIONS_PAYMENT_METHOD_PAYPAL_TRANSACTION_ID_LABEL', 'PayPal Transaction ID');   
    define('DOPBS_RESERVATIONS_TOTAL_PRICE_LABEL', "Razem:"); 
    define('DOPBS_RESERVATIONS_NO_ITEMS_LABEL', "Brak rezerwacji"); 
    define('DOPBS_RESERVATIONS_PRICE_LABEL', "Cena"); 
    define('DOPBS_RESERVATIONS_DEPOSIT_PRICE_LABEL', "Zaliczka");
    define('DOPBS_RESERVATIONS_DEPOSIT_PRICE_LEFT_LABEL', " Przejdź do płatności:");
    define('DOPBS_RESERVATIONS_DISCOUNT_PRICE_LABEL', "Aktualna cena");
    define('DOPBS_RESERVATIONS_DISCOUNT_PRICE_TEXT', "rabat");
    define('DOPBS_RESERVATIONS_EMAIL_LABEL', "Email"); 
    define('DOPBS_RESERVATIONS_PHONE_LABEL', "Telefon"); 
    define('DOPBS_RESERVATIONS_NO_PEOPLE_LABEL', "Brak osób"); 
    define('DOPBS_RESERVATIONS_NO_ADULTS_LABEL', "Brak dorosłych"); 
    define('DOPBS_RESERVATIONS_NO_CHILDREN_LABEL', "Brak dzieci"); 
    define('DOPBS_RESERVATIONS_MESSAGE_LABEL', "Wiadomość");
    
    define('DOPBS_RESERVATIONS_JUMP_TO_DAY_LABEL', 'Przejdź do dnia');
    define('DOPBS_RESERVATIONS_APPROVE_LABEL', 'Przyjęta');
    define('DOPBS_RESERVATIONS_REJECT_LABEL', 'Odrzucone');
    define('DOPBS_RESERVATIONS_CANCEL_LABEL', 'Anuluj');
    
    define('DOPBS_RESERVATIONS_APPROVE_CONFIRMATION', 'Czy na pewno chcesz przyjąć rezerwację?');
    define('DOPBS_RESERVATIONS_APPROVE_SUCCESS', 'Rezerwacja została przyjęta.');
    define('DOPBS_RESERVATIONS_REJECT_CONFIRMATION', 'Czy na pewno chcesz odrzucić rezerwację?');
    define('DOPBS_RESERVATIONS_REJECT_SUCCESS', 'Rezerwacja została odrzucona.');
    define('DOPBS_RESERVATIONS_CANCEL_CONFIRMATION', 'Czy na pewno chcesz anulować rezerwację?');
    define('DOPBS_RESERVATIONS_CANCEL_SUCCESS', 'ezerwacja została anulowana.');
    
    // TinyMCE
    define('DOPBS_TINYMCE_ADD', 'Dodaj kalendarz');
    
    // Settings
    define('DOPBS_GENERAL_STYLES_SETTINGS', "Ustawienia ogóle");
    define('DOPBS_CALENDAR_NAME', "Nazwa");
    define('DOPBS_AVAILABLE_DAYS', "Dostępne dni");
    define('DOPBS_FIRST_DAY', "Pierwszy dzień");
    define('DOPBS_CURRENCY', "Waluta");
    define('DOPBS_DATE_TYPE', "Date Type");
    define('DOPBS_PREDEFINED', "Wybierz wstępne ustawienia");
    define('DOPBS_TEMPLATE', "Szablon");
    define('DOPBS_MIN_STAY', "Minimalna ilość");
    define('DOPBS_MAX_STAY', "Maksymalna ilość");
    define('DOPBS_NO_ITEMS_ENABLED', "Pozwól na wybór ilości");
    define('DOPBS_VIEW_ONLY', "Tylko podgląd (bez rezerwacji)");
    define('DOPBS_PAGE_URL', "Adres URL");
    
    define('DOPBS_NOTIFICATIONS_STYLES_SETTINGS', "Ustawienia powiadomień");
    define('DOPBS_NOTIFICATIONS_TEMPLATE', "Szablon wiadomości email");
    define('DOPBS_NOTIFICATIONS_EMAIL', "Email z powiadomieniem");
    define('DOPBS_NOTIFICATIONS_SMTP_ENABLED', "Autoryzacja SMTP");
    define('DOPBS_NOTIFICATIONS_SMTP_HOST_NAME', "Nazwa hosta SMTP");
    define('DOPBS_NOTIFICATIONS_SMTP_HOST_PORT', "Numer portu SMTP");
    define('DOPBS_NOTIFICATIONS_SMTP_SSL', "Połączenie SMTP SSL");
    define('DOPBS_NOTIFICATIONS_SMTP_USER', "Nazwa użytkownika SMTP");
    define('DOPBS_NOTIFICATIONS_SMTP_PASSWORD', "Hasła użytkownika SMTP");
                                              
    define('DOPBS_HOURS_STYLES_SETTINGS', "Ustawienia godzin");
    define('DOPBS_MULTIPLE_DAYS_SELECT', "Użyj Check In/Check Out");
    define('DOPBS_MORNING_CHECK_OUT', "Poranne Check Out");
    define('DOPBS_HOURS_ENABLED', "Użyj godzin");
    define('DOPBS_HOURS_DEFINITIONS', "Zdefiniuj goodziny");
    define('DOPBS_MULTIPLE_HOURS_SELECT', "Użyj Start/Koniec");
    define('DOPBS_HOURS_AMPM', "Wykorzystaj format AM/PM");
    define('DOPBS_LAST_HOUR_TO_TOTAL_PRICE', "Dodaj ostatnią wybraną godzinę do podsumowania ceny");
    define('DOPBS_HOURS_INTERVAL_ENABLED', "Aktywuj interwał godzin");
    
    define('DOPBS_DISCOUNTS_NO_DAYS_SETTINGS', "Rabat za ilość");
    define('DOPBS_DISCOUNTS_NO_DAYS', "Rabat za ilość dni");
    define('DOPBS_DISCOUNTS_NO_DAYS_DAYS', "dni rezerwacji");
    
    define('DOPBS_DEPOSIT_SETTINGS', "Zaliczka");
    define('DOPBS_DEPOSIT', "Wartość zaliczki");
    
    define('DOPBS_FORM_STYLES_SETTINGS', "Ustawienia formularza rezerwacji");
    define('DOPBS_FORM', "Wybierz formularz");
    define('DOPBS_INSTANT_BOOKING_ENABLED', "Instant Booking");
    define('DOPBS_NO_PEOPLE_ENABLED', "Wybór ilości osób w rezerwacji");
    define('DOPBS_MIN_NO_PEOPLE', "Minimalna ilość osób");
    define('DOPBS_MAX_NO_PEOPLE', "Maksymalna ilość osób");
    define('DOPBS_NO_CHILDREN_ENABLED', "Wybór ilości dzieci w rezerwacji");
    define('DOPBS_MIN_NO_CHILDREN', "Minimalna ilość dzieci");
    define('DOPBS_MAX_NO_CHILDREN', "Maksymalna ilość dzieci");
    define('DOPBS_PAYMENT_ARRIVAL_ENABLED', "Płatność po przyjeździe");
    
    define('DOPBS_PAYMENT_PAYPAL_STYLES_SETTINGS', "PayPal ustawineia");
    define('DOPBS_PAYMENT_PAYPAL_ENABLED', "Enable PayPal Payment");
    define('DOPBS_PAYMENT_PAYPAL_USERNAME', "PayPal API User Name");
    define('DOPBS_PAYMENT_PAYPAL_PASSWORD', "PayPal API Password");
    define('DOPBS_PAYMENT_PAYPAL_SIGNATURE', "PayPal API Signature");
    define('DOPBS_PAYMENT_PAYPAL_CREDIT_CARD', "Aktywuj płatność kartą kredytową");
    define('DOPBS_PAYMENT_PAYPAL_SANDBOX_ENABLED', "Enable PayPal Sandbox");
    
    define('DOPBS_TERMS_AND_CONDITIONS_ENABLED', "Akceptacja regulaminu");
    define('DOPBS_TERMS_AND_CONDITIONS_LINK', "Link do strony z regulaminem");
    
    define('DOPBS_GO_TOP', "do góry");
    define('DOPBS_SHOW', "pokaż");
    define('DOPBS_HIDE', "ukryj");
    
    // Settings Info
    define('DOPBS_CALENDAR_NAME_INFO', "Zmień nazwę kalendarza.");
    define('DOPBS_AVAILABLE_DAYS_INFO', "Domyślnie: wszystkie dostępne. Wybierz dostępne dni.");
    define('DOPBS_FIRST_DAY_INFO', "Domyślnie: Poniedziałek. Wybierz pierwszy dzień w kalendarzu.");
    define('DOPBS_CURRENCY_INFO', "Domyślna waluta: USD. Wybierz walutę.");
    define('DOPBS_DATE_TYPE_INFO', "Domyślna wartość: amerykański. Wybierz format daty: Amerykański (mm dd, yyyy) lub Europejski (dd mm yyyy).");
    define('DOPBS_PREDEFINED_INFO', "Wybierz zapisz aby zaakceptować zmiany w ustawieniach.");
    define('DOPBS_TEMPLATE_INFO', "Domyślnie: default. Select styles template.");
    define('DOPBS_MIN_STAY_INFO', "Domyślnie: 1. Wybierz minimalną ilość dni, którą można rezerwować.");
    define('DOPBS_MAX_STAY_INFO', "Domyślnie: 0. Wybierz maksymalną ilość dni, którą można rezerwować. Wartość 0 oznacza brak limitu.");
    define('DOPBS_NO_ITEMS_ENABLED_INFO', "Domyślnie: aktywne. Wybierz aby wyświetlać tylko informację o dostępności bez możliowości rezerwacji.");
    define('DOPBS_VIEW_ONLY_INFO', "Domyślnie: aktywne. Ustaw aby pokazywać tylko informacje o rezerwacjach na stronie.");
    define('DOPBS_PAGE_URL_INFO', "Wpisz adres strony na której znajdzie się kalendarz. To jest obowiązkowe jeśli chcesz umożliwić wyszukiwanie w kalendarzach.");
    
    define('DOPBS_NOTIFICATIONS_TEMPLATE_INFO', "Domyślnie: default. Wybierz szablon e-maila.");
    define('DOPBS_NOTIFICATIONS_EMAIL_INFO', "Wpisz e-mail, na który zostanie wysłana informacja o rezerwacji lub zapytaniu.");
    define('DOPBS_NOTIFICATIONS_SMTP_ENABLED_INFO', "Użyj SMTP aby wysyłać e-maile.");
    define('DOPBS_NOTIFICATIONS_SMTP_HOST_NAME_INFO', "Wpisz nazwę hosta SMTP.");
    define('DOPBS_NOTIFICATIONS_SMTP_HOST_PORT_INFO', "Wpisz numer portu SMTP.");
    define('DOPBS_NOTIFICATIONS_SMTP_SSL_INFO', "Użyj połączenia SSL.");
    define('DOPBS_NOTIFICATIONS_SMTP_USER_INFO', "Wpisz nazwę użytkownika SMTP.");
    define('DOPBS_NOTIFICATIONS_SMTP_PASSWORD_INFO', "Wpisz hasło użytkownika SMTP.");
    
    define('DOPBS_MULTIPLE_DAYS_SELECT_INFO', "Domyślnie: Aktywne. Użyj Check In/Check Out lub wybierz jeden dzień.");
    define('DOPBS_MORNING_CHECK_OUT_INFO', "Domyślnie: Nieaktywne. Opcja aktywuje Check In po południu pierwszego dnia i Check Out rano ostatniego dnia.");
    define('DOPBS_HOURS_ENABLED_INFO', "Domyślnie: Nieaktywne. Aktywuj godziny dla tego kalendarza.");
    define('DOPBS_HOURS_DEFINITIONS_INFO', "Wpisz hh:mm ... jedna w linii. Ta zmiana nadpisze poprzednie ustawienia. Używaj tylko formatu 24 godzinnego.");
    define('DOPBS_MULTIPLE_HOURS_SELECT_INFO', "Domyślnie: Aktywne. Użyj Start/Koniec lub wybierz jedną godzinę.");
    define('DOPBS_HOURS_AMPM_INFO', "Domyślnie: Nieaktywne. Wyświetlaj godziny w formacie AM/PM. Uwaga: Ustawienia godzin będą nadal w formie 24 godzinnym.");
    define('DOPBS_LAST_HOUR_TO_TOTAL_PRICE_INFO', "Domyślnie: Aktywne. It calculates the total price before the last hours selected if Disabled. It calculates the total price including the last hour selected if Enabled. <br /><br /><strong>Warning: </strong> In administration area the last hours from your definitions list will not be displayed.");
    define('DOPBS_HOURS_INTERVAL_ENABLED_INFO', "Domyślnie: Nieaktywne. Show hours interval from the current hour to the next one.");
    
    define('DOPBS_DISCOUNTS_NO_DAYS_INFO', "Wybierz ilość dni dla których chcesz udzielić rabatu (max 31 dni).");
    define('DOPBS_DISCOUNTS_NO_DAYS_DAYS_INFO', "Domyślna wartość 0. Ustaw procent rabatu jaki uzyska klient rezerwując okresloną ilość dni.");
    
    define('DOPBS_DEPOSIT_INFO', "Domyślna wartość: 0. Wpisz procent wymaganej zaliczki. Zaliczka jest dośtępna tylko jest aktywny jest moduł płatności.");
    
    define('DOPBS_FORM_INFO', "Wybierz formularz rezerwacji.");
    define('DOPBS_INSTANT_BOOKING_ENABLED_INFO', "Domyślna wartość: Nieaktywne. Instantly book the data in a calendar once the request has been submitted.");
    define('DOPBS_NO_PEOPLE_ENABLED_INFO', "Domyślna wartość: Aktywne. Request number of people that will use the booked item.");
    define('DOPBS_MIN_NO_PEOPLE_INFO', "Domyślna wartość: 1. Set minimum number of allowed people per booked item.");
    define('DOPBS_MAX_NO_PEOPLE_INFO', "Domyślna wartość: 4. Set maximum number of allowed people per booked item.");
    define('DOPBS_NO_CHILDREN_ENABLED_INFO', "Domyślna wartość: Aktywne. Request number of children that will use the booked item.");
    define('DOPBS_MIN_NO_CHILDREN_INFO', "Domyślna wartość: 0. Set minimum number of allowed children per booked item.");
    define('DOPBS_MAX_NO_CHILDREN_INFO', "Domyślna wartość: 2. Set maximum number of allowed children per booked item.");
    define('DOPBS_PAYMENT_ARRIVAL_ENABLED_INFO', "Domyślna wartość: Aktywne. Allow user to pay on arrival. Need approval.");
    
    define('DOPBS_PAYMENT_PAYPAL_ENABLED_INFO', "Domyślna wartość: Nieaktywne. Pozwól na płatności PayPal. The period is instantly booked.");
    define('DOPBS_PAYMENT_PAYPAL_USERNAME_INFO', "Enter PayPal API Credentials User Name. View Help section to see from were you can get them.");
    define('DOPBS_PAYMENT_PAYPAL_PASSWORD_INFO', "Enter PayPal API Credentials Password. View Help section to see from were you can get them.");
    define('DOPBS_PAYMENT_PAYPAL_SIGNATURE_INFO', "Enter PayPal API Credentials Signature. View Help section to see from were you can get them.");
    define('DOPBS_PAYMENT_PAYPAL_CREDIT_CARD_INFO', "Default value: Disabled. Enable so that users can pay directly with their Credit Card.");
    define('DOPBS_PAYMENT_PAYPAL_SANDBOX_ENABLED_INFO', "Domyślna wartość: Nieaktywne. Enable to use PayPal Sandbox features.");
    
    define('DOPBS_TERMS_AND_CONDITIONS_ENABLED_INFO', "Domyślna wartość: Nieaktywne. Enable Terms & Conditions check box.");
    define('DOPBS_TERMS_AND_CONDITIONS_LINK_INFO', "Wpisz link do strony z regulaminem.");
    
    // Booking Forms
    define('DOPBS_TITLE_BOOKING_FORMS', "Formularze");
    define('DOPBS_BOOKING_FORMS_HELP', "Kliknij ikonę 'Plus' aby dodać formularz rezerwacji. Jeśli klikniesz na wybrany formularz będziesz mógł edytować.");
    define('DOPBS_BOOKING_FORMS_LOADED', "Lista formularzy wczytana.");
    define('DOPBS_BOOKING_FORM_SETTINGS_HELP', "Wybierz 'Zapisz' aby aktywować zmiany, 'Usuń' aby usunąć formularz.");
    define('DOPBS_BOOKING_FORM_LOADED', "Uruchamianie formularzy rezerwacji.");
    define('DOPBS_NO_BOOKING_FORMS', "Nie znaleziono formularzy.");
    
    // Add Booking Form
    define('DOPBS_ADD_BOOKING_FORM_NAME', "Nowy formularz");
    
    // Edit Booking Form
    define('DOPBS_EDIT_BOOKING_FORM_SUBMIT', "Zapisz");
    define('DOPBS_EDIT_BOOKING_FORM_SUCCESS', "Edycja formularza zakończona pomyślnie.");
    
    // Booking Form Fields
    define('DOPBS_BOOKING_FORM_NAME', "Nazwa formularza");
    define('DOPBS_BOOKING_FORM_NAME_DEFAULT', "Domyślny formularz");
    define('DOPBS_BOOKING_FORM_FIELDS_TITLE', "Pole formularza");
    define('DOPBS_BOOKING_FORM_FIELDS_SHOW_SETTINGS', "Pokaż ustawienia");
    define('DOPBS_BOOKING_FORM_FIELDS_HIDE_SETTINGS', "Ukryj ustawienia");
    define('DOPBS_BOOKING_FORM_FIELDS_TYPE_TEXT_LABEL', "Pole");
    define('DOPBS_BOOKING_FORM_FIELDS_TYPE_TEXTAREA_LABEL', "Pole tekstowe");
    define('DOPBS_BOOKING_FORM_FIELDS_TYPE_CHECKBOX_LABEL', "Pole wyboru");
    define('DOPBS_BOOKING_FORM_FIELDS_TYPE_SELECT_LABEL', "Lista rozwijalna");
    define('DOPBS_BOOKING_FORM_FIELDS_LANGUAGE_LABEL', "Język");
    define('DOPBS_BOOKING_FORM_FIELDS_NAME_LABEL', "Etykieta");
    define('DOPBS_BOOKING_FORM_FIELDS_NEW_FIELD_TEXT_LABEL', "Nowe pole");
    define('DOPBS_BOOKING_FORM_FIELDS_NEW_FIELD_TEXTAREA_LABEL', "Nowe pole tekstowe");
    define('DOPBS_BOOKING_FORM_FIELDS_NEW_FIELD_CHECKBOX_LABEL', "Nowe pole wyboru");
    define('DOPBS_BOOKING_FORM_FIELDS_NEW_FIELD_SELECT_LABEL', "Nowa lista rozwijalna");
    define('DOPBS_BOOKING_FORM_FIELDS_ALLOWED_CHARACTERS_LABEL', "Dopuszczalne znaki");
    define('DOPBS_BOOKING_FORM_FIELDS_SIZE_LABEL', "Rozmiar");
    define('DOPBS_BOOKING_FORM_FIELDS_EMAIL_LABEL', "Adres email");
    define('DOPBS_BOOKING_FORM_FIELDS_REQUIRED_LABEL', "Wymagane");
    define('DOPBS_BOOKING_FORM_FIELDS_SELECT_OPTIONS_LABEL', "Opcje");
    define('DOPBS_BOOKING_FORM_FIELDS_SELECT_ADD_OPTION', "Dodaj opcje");
    define('DOPBS_BOOKING_FORM_FIELDS_SELECT_NEW_OPTION_LABEL', "Nowa opcja");
    define('DOPBS_BOOKING_FORM_FIELDS_SELECT_DELETE_OPTION', "Usuń opcje");
    define('DOPBS_BOOKING_FORM_FIELDS_SELECT_MULTIPLE_SELECT_LABEL', "Wybór wielokrotny");
    define('DOPBS_BOOKING_FORM_CHECKED', "Wybrane");
    define('DOPBS_BOOKING_FORM_UNCHECKED', "Niewybrane");
    
    // Booking Form Fields Info
    define('DOPBS_BOOKING_FORM_NAME_INFO', "Zmień nazwę pola i zapisz.");
    define('DOPBS_BOOKING_FORM_FIELDS_INFO', "Aby utworzyć nowe pole przeciągnij i upuść. Jeśli chcesz edytować kliknij ustawienia.");
    define('DOPBS_BOOKING_FORM_FIELDS_LANGUAGE_INFO', "Wybierz język dla którego chcesz zmienić eytkietę (labels).");
    define('DOPBS_BOOKING_FORM_FIELDS_NAME_INFO', "Wpisz etykietę pola.");
    define('DOPBS_BOOKING_FORM_FIELDS_ALLOWED_CHARACTERS_INFO', "Wybierz znaki dopuszczalne w tym polu. Pozostaw puste jeśli nie ma ograniczeń.");
    define('DOPBS_BOOKING_FORM_FIELDS_SIZE_INFO', "Wpisz maksymalną liczbę znaków. Pozostaw puste jeśli nie ma ograniczeń.");
    define('DOPBS_BOOKING_FORM_FIELDS_EMAIL_INFO', "Zaznacz jeśli chcesz weryfikować poprawne wpisanie e-maila.");
    define('DOPBS_BOOKING_FORM_FIELDS_REQUIRED_INFO', "Zaznacz jeśli pole ma być obowiązkowe.");
    define('DOPBS_BOOKING_FORM_FIELDS_SELECT_OPTIONS_INFO', "Kliknij Plus aby dodać inne opcje.");
    define('DOPBS_BOOKING_FORM_FIELDS_SELECT_MULTIPLE_SELECT_INFO', "Zaznacz jeśli dopuszczalny jest wybór wielokrotny.");
    
    // Help
    define('DOPBS_HELP_DOCUMENTATION', "Dokumentacja");
    define('DOPBS_HELP_FAQ', "FAQ");

?>