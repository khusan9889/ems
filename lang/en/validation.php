<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute must be accepted.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute must only contain letters.',
    'alpha_dash' => 'The :attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute must only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'array' => 'The :attribute must have between :min and :max items.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'numeric' => 'The :attribute must be between :min and :max.',
        'string' => 'The :attribute must be between :min and :max characters.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'current_password' => 'The password is incorrect.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'declined' => 'The :attribute must be declined.',
    'declined_if' => 'The :attribute must be declined when :other is :value.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'doesnt_end_with' => 'The :attribute may not end with one of the following: :values.',
    'doesnt_start_with' => 'The :attribute may not start with one of the following: :values.',
    'email' => 'The :attribute must be a valid email address.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'array' => 'The :attribute must have more than :value items.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'numeric' => 'The :attribute must be greater than :value.',
        'string' => 'The :attribute must be greater than :value characters.',
    ],
    'gte' => [
        'array' => 'The :attribute must have :value items or more.',
        'file' => 'The :attribute must be greater than or equal to :value kilobytes.',
        'numeric' => 'The :attribute must be greater than or equal to :value.',
        'string' => 'The :attribute must be greater than or equal to :value characters.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'array' => 'The :attribute must have less than :value items.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'numeric' => 'The :attribute must be less than :value.',
        'string' => 'The :attribute must be less than :value characters.',
    ],
    'lte' => [
        'array' => 'The :attribute must not have more than :value items.',
        'file' => 'The :attribute must be less than or equal to :value kilobytes.',
        'numeric' => 'The :attribute must be less than or equal to :value.',
        'string' => 'The :attribute must be less than or equal to :value characters.',
    ],
    'mac_address' => 'The :attribute must be a valid MAC address.',
    'max' => [
        'array' => 'The :attribute must not have more than :max items.',
        'file' => 'The :attribute must not be greater than :max kilobytes.',
        'numeric' => 'The :attribute must not be greater than :max.',
        'string' => 'The :attribute must not be greater than :max characters.',
    ],
    'max_digits' => 'The :attribute must not have more than :max digits.',
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'array' => 'The :attribute must have at least :min items.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'numeric' => 'The :attribute must be at least :min.',
        'string' => 'The :attribute must be at least :min characters.',
    ],
    'min_digits' => 'The :attribute must have at least :min digits.',
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => [
        'letters' => 'The :attribute must contain at least one letter.',
        'mixed' => 'The :attribute must contain at least one uppercase and one lowercase letter.',
        'numbers' => 'The :attribute must contain at least one number.',
        'symbols' => 'The :attribute must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'The :attribute field must be present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_array_keys' => 'The :attribute field must contain entries for: :values.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'array' => 'The :attribute must contain :size items.',
        'file' => 'The :attribute must be :size kilobytes.',
        'numeric' => 'The :attribute must be :size.',
        'string' => 'The :attribute must be :size characters.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid timezone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute must be a valid URL.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'branch_id' => 'Субъект',
        'department_id' => 'Отделение',
        'history_disease' => 'Номер ИБ',
        'full_name' => 'Пациент ФИО',
        'hospitalization_date' => 'Дата поступления',
        'discharge_date' => 'Дата выписки',
        'hospitalization_channels' => 'Канал госпитализации',
        'physician_full_name' => 'ФИО лечащего врача',
        'stat_department_full_name' => 'ФИО специалиста стат.отдела',
        'treatment_result' => 'Исход лечения',
        'final_result' => 'Исход',
        'anginal_attack_date' => 'Срок ангинального приступа при поступлении',
        'cta_invasive_angiography' => 'Показана экстренная ЧКВ/инвазивная ангиография',
        'cta_90min' => 'Экстренная ЧКВ выполнена в течение 90 мин',
        'deferred_cta_invasive' => 'Показана отсроченная ЧКВ/инвазивная ангиография',
        'deferred_cta_completed' => 'Отсроченная ЧКВ выполнена',
        'reasons_not_performing_cta' => 'Если не проведена ЧКВ, отметьте причину:',
        'thrombolytic_therapy' => 'Показана ли тромболитическая терапия (ТЛТ)',
        'thrombolytic_therapy_administered' => 'Если «Да», то проведена ли ТЛТ',
        'not_administering_tlt' => 'Если «НЕТ», отметьте причину',
        'ecg_during_hospitalization' => 'Проведено ЭКГ',
        'st_segment' => 'Если проведено ЭКГ, СТ сегмента повышен',
        'echocardiogram' => 'Проведено ЭхоКГ (с оценкой ФВ ЛЖ%)',
        'first_measurement' => 'Если «Да», то время первого измерения ФВ ЛЖ%',
        'cholestero_levels' => 'Проведены анализы на ЛПНП',
        'aptt' => 'Проведены анализ на АЧТВ (25-36сек)',
        'anticoagulant' => 'Проведена антикоагулянтная терапия',
        'aspirin' => 'Принимал аспирин',
        'p2y12' => 'Принимал ингибиторы P2Y12',
        'high_intensity_statins' => 'Принимал статины высокой интенсивности',
        'ACE_inhibitors_ARBs' => 'Принимал ингибиторы АПФ или БРАII',
        'days_amount' => 'Кол-во к/дней',
        'days_in_intensive_care' => 'Кол-во к/дней в отд. Реанимации',
        'severity_of_ts' => 'Тяжесть состояния по TS',
        'injury_of_iss' => 'Тяжесть состояния по ISS',
        'arrival_after_injury' => 'Время поступления после получения травмы',
        'mechanism_of_injury' => 'Механизм травмы',
        'survey_of_surgeon' => 'Осмотр хирурга',
        'survey_of_neurosurgeon' => 'Осмотр нейрохирурга',
        'survey_of_traumatologist' => 'Осмотр травматолога',
        'narrow_specialists' => 'Осмотр других узких специалистов',
        'r_graphy' => 'Проведена R-графия',
        'conducted_ultrasound' => 'Проведено УЗС',
        'msct' => 'Проведено МКСТ',
        'msct_individual_parts' => 'Проведено МКСТ (отдельных частей тела;)',
        'neutral_fats' => 'Содержание нейтральный жиров в крови и моче',
        'analysis_of_hb_ht' => 'Проведен анализ Нв, Ht в динамике',
        'dynamic_uzs' => 'Проведено УЗС в динамике',
        'diagnostic_laparoscopy' => 'Диагностическая лапароскопия',
        'thoracocentesis' => 'Торакоцентез',
        'laparotomy' => 'Лапаратомия',
        'thoracoscopy_thoracotomy' => 'Торакоскопия (торакотомия)',
        'osteosynthesis_of_fractures' => 'Остеосинтез переломов',
        'skull_trepanation' => 'Трепанация черепа',
        'oblast_vyzova'=>'Область вызова',
        'coato_raion_vyzova'=>'COATO Район вызова',
        'coato_oblast_vyzova'=>'COATO Область вызова',
        'raion_vyzova'=>'Район вызова',
        'podstanciia_priniatiia_vyzova'=>'Подстанция принятия вызова',
        'zapolnenie_karty_vyzova_kv'=>'Заполнение карты вызова (КВ)',
        'tip_vyzova'=>'Тип вызова',
        'nomer_kv'=>'Номер КВ',
        'data_priema_vyzova'=>'Дата приема вызова',
        'vremia_priema_vyzova'=>'Время приема вызова',
        'vremia_nacaly_formirovaniia_kartocki_transportirovki_kt'=>'Время началы формирования Карточки транспортировки (КТ)',
        'vremia_zaverseniia_formirovaniia_kt'=>'Время завершения формирования КТ',
        'vremia_peredaci_vyzova_brigade'=>'Время передачи вызова Бригаде',
        'vremia_vyezda_brigady'=>'Время выезда Бригады',
        'pribytie_brigady_na_mesto_vyzova'=>'Прибытие Бригады на место вызова',
        'vremia_nacaly_transportirovki'=>'Время началы транспортировки',
        'vremia_pribytiia_na_med_ucrezdenie'=>'Время прибытия на мед. Учреждение',
        'vremia_zaverseniia_vyzova'=>'Время завершения вызова',
        'vremia_vozvraseniia_na_podstanciiu'=>'Время возврашения на подстанцию',
        'nazvanie_brigady'=>'Название бригады',
        'podrobnyi_adres_vyzova'=>'Подробный адрес вызова',
        'pricina_vyzova'=>'Причина вызова',
        'pol_pacienta'=>'Пол пациента',
        'vozrast_pacienta'=>'Возраст пациента',
        'oblast_prozivaniia_pacienta'=>'Область проживания пациента',
        'coato_oblast_prozivaniia_pacienta'=>'COATO Область проживания пациента',
        'raion_prozivaniia_pacienta'=>'Район проживания пациента',
        'coato_raion_prozivaniia_pacienta'=>'COATO Район проживания пациента',
        'diagnoz_po_mkb10'=>'Диагноз по МКБ10',
        'rezultat_vyezda'=>'Результат выезда ',
        'mesto_gospitalizacii'=>'Место госпитализации',
        'rezultat_gospitalizacii'=>'Результат госпитализации',
        'kto_vyzval'=>'Кто вызвал',
        'mesto_vyzova'=>'Место вызова',
    ],

];
