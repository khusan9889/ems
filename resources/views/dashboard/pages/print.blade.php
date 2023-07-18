<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ОКС</title>

</head>

<body>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:20.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'
        align="center">
        <strong><span style="font-size:11px;">КАРТА СОБЛЮДЕНИЯ КЛИНИЧЕСКИХ ПРОТОКОЛОВ&nbsp;<br>&nbsp;при
                ОКС</span></strong><strong><span style="font-size:11px;">&nbsp;</span></strong><strong><span
                style="font-size:11px;">(</span></strong><strong><span
                style="font-size:11px;">STEMI</span></strong><strong><span
                style="font-size:11px;">/</span></strong><strong><span
                style="font-size:11px;">NSTEMI</span></strong><strong><span style="font-size:11px;">)</span></strong>
    </p>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <span style="font-size:11px;">Отделение: &nbsp;{{ $acs->department->name }}&nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Номер ИБ:
            &nbsp;{{ $acs->history_disease }}&nbsp;</span>
    </p>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <span style="font-size:11px;">Пациент&nbsp;</span><span style="font-size:11px;">(ФИО)</span><span
            style="font-size:11px;">&nbsp;{{ $acs->full_name }}&nbsp;</span>
    </p>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <span style="font-size:11px;">
            Канал госпитализации:
            <strong style='font-family:helvetica'>
                @if (mb_strtolower(trim($acs->hospitalization_channels)) == 'скорая')
                    &#10004;
                @else
                    &#9634;
                @endif
                скорая
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($acs->hospitalization_channels)) == 'самотек')
                    &#10004;
                @else
                    &#9634;
                @endif
                самотек
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($acs->hospitalization_channels)) == 'направление')
                    &#10004;
                @else
                    &#9634;
                @endif
                направление
            </strong>
        </span>
    </p>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <span style="font-size:11px;">Исход лечения:
            <strong style='font-family:helvetica'>
                &nbsp;
                @if (mb_strtolower(trim($acs->treatment_result)) == 'выписан')
                    &#10004;
                @else
                    &#9634;
                @endif
                выписан
                &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($acs->treatment_result)) == 'летальный исход')
                    &#10004;
                @else
                    &#9634;
                @endif
                летальный исход
                &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($acs->treatment_result)) == 'выписан в тяжелом состоянии')
                    &#10004;
                @else
                    &#9634;
                @endif
                выписан в тяжелом состоянии
            </strong>
        </span>
    </p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <span style="font-size:11px;">Исход:
            <strong style='font-family:helvetica'>
                &nbsp;
                @if (mb_strtolower(trim($acs->final_result)) == mb_strtolower('ОИМ с Q'))
                    &#10004;
                @else
                    &#9634;
                @endif
                ОИМ с Q
                &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($acs->final_result)) == mb_strtolower('ОИМ без Q'))
                    &#10004;
                @else
                    &#9634;
                @endif
                ОИМ без Q
                &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($acs->final_result)) == mb_strtolower('прогрессирующая стенокардия'))
                    &#10004;
                @else
                    &#9634;
                @endif
                прогрессирующая стенокардия
            </strong>
        </span>
    </p>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <span style="font-size:11px;">Срок ангинального приступа при поступлении:
            <strong style='font-family:helvetica'>
                @if (mb_strtolower(trim($acs->anginal_attack_date)) == mb_strtolower('до 6ч.'))
                    &#10004;
                @else
                    &#9634;
                @endif
                до 6 ч.
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($acs->anginal_attack_date)) == mb_strtolower('6-12ч.'))
                    &#10004;
                @else
                    &#9634;
                @endif
                6-12 ч.
                &nbsp; &nbsp;&nbsp;
                @if (mb_strtolower(trim($acs->anginal_attack_date)) == mb_strtolower('позже 12ч.'))
                    &#10004;
                @else
                    &#9634;
                @endif
                позже 12 ч.

            </strong>
        </span>
    </p>
    <div
        style='margin-top:0cm;margin-right:0cm;margin-bottom:3.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;border:solid windowtext 1.0pt;padding:1.0pt 4.0pt 1.0pt 4.0pt;background:#F2F2F2;'>
        <div style="border: 1px solid #000; padding: 5px;">
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:3.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style="font-size:11px;">Показана экстренная ЧКВ/инвазивная ангиография:
                    <strong style='font-family:helvetica'>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        @if (mb_strtolower(trim($acs->cta_invasive_angiography)) == mb_strtolower('ДА'))
                            &#10004;
                        @else
                            &#9634;
                        @endif
                        ДА
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        @if (mb_strtolower(trim($acs->cta_invasive_angiography)) == mb_strtolower('НЕТ'))
                            &#10004;
                        @else
                            &#9634;
                        @endif
                        НЕТ

                    </strong>
                </span>
            </p>

            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:3.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style="font-size:11px;">Экстренная ЧКВ выполнена <strong>в течение 90 мин:</strong>
                    <strong style='font-family:helvetica'>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        @if (mb_strtolower(trim($acs->cta_90min)) == mb_strtolower('ДА'))
                            &#10004;
                        @else
                            &#9634;
                        @endif
                        ДА
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        @if (mb_strtolower(trim($acs->cta_90min)) == mb_strtolower('НЕТ'))
                            &#10004;
                        @else
                            &#9634;
                        @endif
                        НЕТ

                    </strong>
                </span>
            </p>
        </div>
    </div>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:.3.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <span style="font-size:11px;">&nbsp;</span>
    </p>
    <div
        style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;border:solid windowtext 1.0pt;padding:1.0pt 4.0pt 1.0pt 4.0pt;background:#F2F2F2;'>
        <div style="border: 1px solid #000; padding: 5px;">
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:3.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style="font-size:11px;">Показана <strong>отсроченная</strong> ЧКВ/инвазивная ангиография:
                    <strong style='font-family:helvetica'>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        @if (mb_strtolower(trim($acs->deferred_cta_invasive)) == mb_strtolower('ДА'))
                            &#10004;
                        @else
                            &#9634;
                        @endif
                        ДА
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        @if (mb_strtolower(trim($acs->deferred_cta_invasive)) == mb_strtolower('НЕТ'))
                            &#10004;
                        @else
                            &#9634;
                        @endif
                        НЕТ
                    </strong>
                </span>
            </p>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:3.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style="font-size:11px;">Отсроченная ЧКВ выполнена:
                    <strong style='font-family:helvetica'>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp;&nbsp; &nbsp; &nbsp;
                        @if (mb_strtolower(trim($acs->deferred_cta_completed)) == mb_strtolower('ДА'))
                            &#10004;
                        @else
                            &#9634;
                        @endif
                        ДА
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        @if (mb_strtolower(trim($acs->deferred_cta_completed)) == mb_strtolower('НЕТ'))
                            &#10004;
                        @else
                            &#9634;
                        @endif
                        НЕТ
                    </strong>
                </span>
            </p>
        </div>
    </div>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <span style="font-size:11px;">Если&nbsp;</span><span style="font-size:11px;">не проведена
            ЧКВ</span><span style="font-size:11px;">, отметьте причину: <strong>
            <strong style='font-family:helvetica'>
                &nbsp;
                @if (mb_strtolower(trim($acs->reasons_not_performing_cta)) == mb_strtolower('медицинские противопоказания'))
                    &#10004;
                @else
                    &#9634;
                @endif
                медицинские противопоказания
                &nbsp; &nbsp;
                @if (mb_strtolower(trim($acs->reasons_not_performing_cta)) == mb_strtolower('отсутствие специалиста'))
                    &#10004;
                @else
                    &#9634;
                @endif
                отсутствие специалиста
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($acs->reasons_not_performing_cta)) == mb_strtolower('отсутствие оборудования'))
                    &#10004;
                @else
                    &#9634;
                @endif
                отсутствие оборудования
                &nbsp;
                @if (mb_strtolower(trim($acs->reasons_not_performing_cta)) == mb_strtolower('занятость оборудования'))
                    &#10004;
                @else
                    &#9634;
                @endif
                занятость оборудования
                &nbsp;
                @if (mb_strtolower(trim($acs->reasons_not_performing_cta)) == mb_strtolower('отсутствие расходных материалов'))
                    &#10004;
                @else
                    &#9634;
                @endif
                отсутствие расходных материалов
                &nbsp;
                @if (mb_strtolower(trim($acs->reasons_not_performing_cta)) == mb_strtolower('отказ больного'))
                    &#10004;
                @else
                    &#9634;
                @endif
                отказ больного
            </strong>
        </span>
    </p>
    <div
        style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;border:solid windowtext 1.0pt;padding:1.0pt 4.0pt 1.0pt 4.0pt;background:#F2F2F2;'>
        <div style="border: 1px solid #000; padding: 5px;">
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:3.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style="font-size:11px;">Показана ли тромболитическая терапия (ТЛТ):
                    <strong style='font-family:helvetica'>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        @if (mb_strtolower(trim($acs->thrombolytic_therapy)) == mb_strtolower('ДА'))
                            &#10004;
                        @else
                            &#9634;
                        @endif
                        ДА
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        @if (mb_strtolower(trim($acs->thrombolytic_therapy)) == mb_strtolower('НЕТ'))
                            &#10004;
                        @else
                            &#9634;
                        @endif
                        НЕТ
                    </strong>
                </span>
            </p>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:3.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style="font-size:11px;">Если &laquo;Да&raquo;, то проведена ли ТЛТ:
                    <strong style='font-family:helvetica'>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        @if (mb_strtolower(trim($acs->thrombolytic_therapy_administered)) == mb_strtolower('ДА'))
                            &#10004;
                        @else
                            &#9634;
                        @endif
                        ДА
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        @if (mb_strtolower(trim($acs->thrombolytic_therapy_administered)) == mb_strtolower('НЕТ'))
                            &#10004;
                        @else
                            &#9634;
                        @endif
                        НЕТ
                    </strong>
                </span>
            </p>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:3.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style="font-size:11px;">Если &laquo;НЕТ&raquo;, отметьте причину:
                    <strong style='font-family:helvetica'>
                        &nbsp;
                        @if (mb_strtolower(trim($acs->not_administering_tlt)) == mb_strtolower('медицинские противопоказания'))
                            &#10004;
                        @else
                            &#9634;
                        @endif
                        медицинские противопоказания
                        &nbsp; &nbsp;
                        @if (mb_strtolower(trim($acs->not_administering_tlt)) == mb_strtolower('отсутствие препарата'))
                            &#10004;
                        @else
                            &#9634;
                        @endif
                        отсутствие препарата
                        &nbsp; &nbsp;
                        @if (mb_strtolower(trim($acs->not_administering_tlt)) == mb_strtolower('отказ больного'))
                            &#10004;
                        @else
                            &#9634;
                        @endif
                        отказ больного
                    </strong>
                </span>
            </p>
        </div>
    </div>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:3.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <strong><span style="font-size:11px;">Во время госпитализации больному (-ой):</span></strong>
    </p>
    <div style='margin-top:0cm;margin-right:0cm;margin-bottom:3.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;border:none;border-bottom:solid windowtext 1.0pt;padding:0cm 0cm 1.0pt 0cm;'>
        <p
            style='margin-top:0cm;margin-right:0cm;margin-bottom:3.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;border:none;padding:0cm;border-bottom:.5pt solid windowtext;'>
            <span style="font-size:11px;">Проведено <strong>ЭКГ</strong>: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                <strong style='font-family:helvetica'>
                    &nbsp;
                    @if (mb_strtolower(trim($acs->ecg_during_hospitalization)) == mb_strtolower('Да'))
                        &#10004;
                    @else
                        &#9634;
                    @endif
                    Да
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    @if (mb_strtolower(trim($acs->ecg_during_hospitalization)) == mb_strtolower('Нет'))
                        &#10004;
                    @else
                        &#9634;
                    @endif
                    Нет
                    &nbsp; &nbsp;
                </strong>
            </span>
        </p>
        <hr style="border: 0; height: 1px; background-color: black; margin-bottom: 2px;">

        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:3.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;border:none;padding:0cm;'>
            <span style="font-size:11px;">Если проведено ЭКГ, <strong>СТ сегмента повышен</strong>: &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                <strong style='font-family:helvetica'>
                    &nbsp;
                    @if (mb_strtolower(trim($acs->st_segment)) == mb_strtolower('Да'))
                        &#10004;
                    @else
                        &#9634;
                    @endif
                    Да
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    @if (mb_strtolower(trim($acs->st_segment)) == mb_strtolower('Нет'))
                        &#10004;
                    @else
                        &#9634;
                    @endif
                    Нет
                </strong>
            </span>
        </p>
        <hr style="border: 0; height: 1px; background-color: black; margin-bottom: 2px;">
    </div>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:3.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <span style="font-size:11px;">Проведено <strong>ЭхоКГ (с&nbsp;</strong></span><strong><span
                style="font-size:11px;">оценкой ФВ ЛЖ%)</span></strong>
                <span style="font-size:11px;">: &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
            <strong style='font-family:helvetica'>
                &nbsp;
                @if (mb_strtolower(trim($acs->echocardiogram)) == mb_strtolower('Да'))
                    &#10004;
                @else
                    &#9634;
                @endif
                Да
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($acs->echocardiogram)) == mb_strtolower('Нет'))
                    &#10004;
                @else
                    &#9634;
                @endif
                Нет
            </strong>
        </span>
    </p>
    <hr style="border: 0; height: 1px; background-color: black; margin-bottom: 2px;">

    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:3.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;border-bottom:.5pt solid windowtext;'>
        <span style="font-size:11px;">Если &laquo;Да&raquo;, то время первого измерения ФВ ЛЖ%
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <strong style='font-family:helvetica'>
                &nbsp;
                @if (strcasecmp(trim($acs->first_measurement), '≤3 сутки') === 0)
                    &#10004;
                @else
                    &#9634;
                @endif
                &le;3 сутки
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (strcasecmp(trim($acs->first_measurement), '>3 суток') === 0)
                    &#10004;
                @else
                    &#9634;
                @endif
                &gt; 3 суток
            </strong>
        </span>
    </p>
    <hr style="border: 0; height: 1px; background-color: black; margin-bottom: 2px;">
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:3.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;border-bottom:.5pt solid windowtext;'>
        <span style="font-size:11px;">Проведены анализы на <strong>ЛПНП</strong>: &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <strong style='font-family:helvetica'>
                &nbsp;
                @if (mb_strtolower(trim($acs->cholestero_levels)) == mb_strtolower('Да'))
                    &#10004;
                @else
                    &#9634;
                @endif
                Да
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($acs->cholestero_levels)) == mb_strtolower('Нет'))
                    &#10004;
                @else
                    &#9634;
                @endif
                Нет
            </strong>
        </span>
    </p>
    <hr style="border: 0; height: 1px; background-color: black; margin-bottom: 2px;">
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:3.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;border-bottom:.5pt solid windowtext;'>
        <strong><span style="font-size:11px;">Проведены анализ на АЧТВ (25-36сек)</span></strong>
        <span
            style="font-size:11px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <strong style='font-family:helvetica'>
                &nbsp;
                @if (mb_strtolower(trim($acs->aptt)) == mb_strtolower('Да'))
                    &#10004;
                @else
                    &#9634;
                @endif
                Да
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($acs->aptt)) == mb_strtolower('Нет'))
                    &#10004;
                @else
                    &#9634;
                @endif
                Нет
            </strong>
        </span>
    </p>
    <hr style="border: 0; height: 1px; background-color: black; margin-bottom: 2px;">
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:3.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <span style="font-size:11px;">Проведена <strong>антикоагулянтная терапия</strong>: &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <strong style='font-family:helvetica'>
                &nbsp;
                @if (mb_strtolower(trim($acs->anticoagulant)) == mb_strtolower('Да'))
                    &#10004;
                @else
                    &#9634;
                @endif
                Да
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($acs->anticoagulant)) == mb_strtolower('Нет'))
                    &#10004;
                @else
                    &#9634;
                @endif
                Нет
            </strong>
        </span>
    </p>
    <hr style="border: 0; height: 1px; background-color: black; margin-bottom: 2px;">
    <div style='margin-top:0cm;margin-right:0cm;margin-bottom:3.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;border-top:solid windowtext 1.0pt;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:none;padding:1.0pt 0cm 1.0pt 0cm;'>
        <p
            style='margin-top:0cm;margin-right:0cm;margin-bottom:3.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;border:none;padding:0cm;'>
            <span style="font-size:11px;">Принимал&nbsp;</span><strong><span
                    style="font-size:11px;">аспирин</span></strong><span
                style="font-size:11px;">:&nbsp;&nbsp;</span>
                <span style="font-size:11px;">&nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                <strong style='font-family:helvetica'>
                    &nbsp;
                    @if (mb_strtolower(trim($acs->aspirin)) == mb_strtolower('Да'))
                        &#10004;
                    @else
                        &#9634;
                    @endif
                    Да
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    @if (mb_strtolower(trim($acs->aspirin)) == mb_strtolower('Нет'))
                        &#10004;
                    @else
                        &#9634;
                    @endif
                    Нет
                </strong>
            </span>
        </p>
        <hr style="border: 0; height: 1px; background-color: black; margin-bottom: 2px;">
    </div>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:3.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <span style="font-size:11px;">Принимал&nbsp;</span><strong><span
                style="font-size:11px;">ингибиторы&nbsp;</span></strong><strong><span
                style="font-size:11px;">P2Y12</span></strong><span style="font-size:11px;">:&nbsp;</span>
                <span
            style="font-size:11px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <strong style='font-family:helvetica'>
                &nbsp;
                @if (mb_strtolower(trim($acs->p2y12)) == mb_strtolower('Да'))
                    &#10004;
                @else
                    &#9634;
                @endif
                Да
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($acs->p2y12)) == mb_strtolower('Нет'))
                    &#10004;
                @else
                    &#9634;
                @endif
                Нет
            </strong>
        </span>
    </p>


    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:3.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <em><span style="font-size:11px;">(</span></em><em><span style="font-size:11px;">prasugrel,
                ticagrelor, или clopidogrel)</span></em>
    </p>
    <hr style="border: 0; height: 1px; background-color: black; margin-bottom: 2px;">
    <div
        style='margin-top:0cm;margin-right:0cm;margin-bottom:3.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;border-top:solid windowtext 1.0pt;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:none;padding:1.0pt 0cm 1.0pt 0cm;'>
        <p
            style='margin-top:0cm;margin-right:0cm;margin-bottom:3.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;border:none;padding:0cm;'>
            <span style="font-size:11px;">Принимал&nbsp;</span><strong><span style="font-size:11px;">статины
                    высокой интенсивности</span></strong><span style="font-size:11px;">:&nbsp;</span><span
                style="font-size:11px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                <strong style='font-family:helvetica'>
                    &nbsp;
                    @if (mb_strtolower(trim($acs->high_intensity_statins)) == mb_strtolower('Да'))
                        &#10004;
                    @else
                        &#9634;
                    @endif
                    Да
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    @if (mb_strtolower(trim($acs->high_intensity_statins)) == mb_strtolower('Нет'))
                        &#10004;
                    @else
                        &#9634;
                    @endif
                    Нет
                </strong>
            </span>
        </p>
        <p
            style='margin-top:0cm;margin-right:0cm;margin-bottom:3.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;border:none;padding:0cm;'>
            <em><span style="font-size:11px;">(</span></em><em><span
                    style="font-size:11px;">atorvastatin&nbsp;</span></em><em><span
                    style='font-size:11px;font-family:"Cambria Math",serif;'>≥</span></em><em><span
                    style="font-size:11px;">40 mg or rosuvastatin&nbsp;</span></em><em><span
                    style='font-size:11px;font-family:"Cambria Math",serif;'>≥</span></em><em><span
                    style="font-size:11px;">20 mg)</span></em>
        </p>
        <hr style="border: 0; height: 1px; background-color: black; margin-bottom: 2px;">
    </div>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:3.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <span style="font-size:11px;">Принимал </span><span style="font-size:11px;">ингибиторы <strong>АПФ
                или&nbsp;</strong></span><strong><span style="font-size:11px;">БРА</span></strong><strong><span
                style="font-size:11px;">II</span></strong><span style="font-size:11px;">:&nbsp; &nbsp;
            &nbsp;&nbsp;</span><span style="font-size:11px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <strong style='font-family:helvetica'>
                &nbsp;
                @if (mb_strtolower(trim($acs->ACE_inhibitors_ARBs)) == mb_strtolower('Да'))
                    &#10004;
                @else
                    &#9634;
                @endif
                Да
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($acs->ACE_inhibitors_ARBs)) == mb_strtolower('Нет'))
                    &#10004;
                @else
                    &#9634;
                @endif
                Нет
            </strong>
        </span>
    </p>
    <hr style="border: 0; height: 1px; background-color: black; margin-bottom: 2px;">
    <div
        style='margin-top:1cm;margin-right:6.1pt;margin-bottom:7.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;border:none;border-top:solid windowtext 1.0pt;padding:1.0pt 0cm 0cm 0cm;'>
        <p
            style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;border:none;padding:0cm;'>
            <strong><span style="font-size:11px;">ФИО лечащего врача:&nbsp;{{ $acs->physician_full_name }} &nbsp;
                    &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp;ФИО специалиста
                    стат.отдела:&nbsp;{{ $acs->stat_department_full_name }}&nbsp;</span></strong>
        </p>
    </div>
</body>

</html>
