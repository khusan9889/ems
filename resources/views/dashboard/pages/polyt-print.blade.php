<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Политравма</title>
</head>
<style type="text/css">
    * {
        font-family: "DejaVu Sans", sans-serif,Helvetica;
    }
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">

<link href="/path/to/font-awesome/css/all.min.css" rel="stylesheet">

<body>
    <p style="margin-top:0cm; margin-right:0cm; margin-bottom:30.0pt; margin-left:0cm; line-height:normal; font-size:15px; font-family:'Calibri', sans-serif; text-align:center;">
        <strong><span style="font-size:11px;">КАРТА СОБЛЮДЕНИЯ КЛИНИЧЕСКИХ ПРОТОКОЛОВ<br>при ПОЛИТРАВМЕ</span></strong>
    </p>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <span style="font-size:11px;">Отделение: &nbsp;{{ $polyt->department->name }}&nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Номер ИБ:
            &nbsp;{{ $polyt->history_disease }}&nbsp;</span>
    </p>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:10pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <span style="font-size:11px;">Пациент&nbsp;</span><span style="font-size:11px;">(ФИО)</span><span
            style="font-size:11px;">&nbsp;{{ $polyt->full_name }}&nbsp;</span>
    </p>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:10pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <span style="font-size:11px;">Дата поступления: {{ $polyt->hospitalization_date }}&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Дата выписки:
            {{ $polyt->discharge_date }}&nbsp;</span></p>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:10pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <span style="font-size:11px;">Канал госпитализации:
            <strong style='font-family:helvetica'>
                @if (mb_strtolower(trim($polyt->hospitalization_channels)) == 'скорая')
                    &#10004;
                @else
                    &#9634;
                @endif
                скорая
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->hospitalization_channels)) == 'самотек')
                    &#10004;
                @else
                    &#9634;
                @endif
                самотек
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->hospitalization_channels)) == 'направление')
                    &#10004;
                @else
                    &#9634;
                @endif
                направление
            </strong>
        </span></p>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:10pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <span style="font-size:11px;">Кол-во к/дней: &nbsp; {{ $polyt->days_amount }}&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Кол-во к/дней в отд. Реанимации: &nbsp; {{ $polyt->days_in_intensive_care }}</span></p>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:10pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <span style="font-size:11px;">Исход лечения: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <strong style='font-family:helvetica'>
                &nbsp;
                @if (mb_strtolower(trim($polyt->treatment_result)) == 'выписан')
                    &#10004;
                @else
                    &#9634;
                @endif
                выписан
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->treatment_result)) == 'летальный исход')
                    &#10004;
                @else
                    &#9634;
                @endif
                летальный исход

            </strong>
        </span></p>
    <div
        style='margin-top:0cm;margin-right:0cm;margin-bottom:1.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;border:none;border-bottom:solid windowtext 1.5pt;padding:0cm 0cm 1.0pt 0cm;'>
        <p
            style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'>
            <span style="font-size:11px;">Тяжесть состояния по TS: {{ $polyt->severity_of_ts }} баллов&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Тяжесть повреждения по ISS: &nbsp;{{ $polyt->injury_of_iss }} баллов </span></p>
        <p
            style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'>
            <span style="font-size:11px;">&nbsp;</span></p>
    </div>
    <hr style="border: 0; height: 2px; background-color: black; margin-bottom: 5px;">
    <p style='margin-top:0.2cm;margin-right:0cm;margin-bottom:10pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <span style="font-size:11px;">Время поступления после получения травмы:&nbsp;<br>
            <strong style='font-family:helvetica'>
                &nbsp;
                @if (mb_strtolower(trim($polyt->arrival_after_injury)) == 'до 1ч.')
                    &#10004;
                @else
                    &#9634;
                @endif
                до 1ч.
                &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->arrival_after_injury)) == '1-3ч.')
                    &#10004;
                @else
                    &#9634;
                @endif
                1-3ч.
                &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->arrival_after_injury)) == '6-12ч.')
                    &#10004;
                @else
                    &#9634;
                @endif
                6-12ч.
                &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->arrival_after_injury)) == '12-24ч.')
                    &#10004;
                @else
                    &#9634;
                @endif
                12-24ч.
                &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->arrival_after_injury)) == 'позже 24ч.')
                    &#10004;
                @else
                    &#9634;
                @endif
                позже 24ч.
            </strong>
    </p>
    <div
        style='margin-top:0cm;margin-right:0cm;margin-bottom:3.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;border:none;border-bottom:solid windowtext 1.5pt;padding:0cm 0cm 1.0pt 0cm;'>
        <p
            style='margin-top:0cm;margin-right:0cm;margin-bottom:3.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;border:none;padding:0cm;'>
            <span style="font-size:11px;">Механизм травмы:
                <strong style='font-family:helvetica'>
                    &nbsp;
                    @if (mb_strtolower(trim($polyt->mechanism_of_injury)) == 'ДТП')
                        &#10004;
                    @else
                        &#9634;
                    @endif
                    ДТП
                    &nbsp; &nbsp; &nbsp; &nbsp;
                    @if (mb_strtolower(trim($polyt->mechanism_of_injury)) == mb_strtolower('Кататравма'))
                        &#10004;
                    @else
                        &#9634;
                    @endif
                    Кататравма
                    &nbsp; &nbsp; &nbsp; &nbsp;
                    @if (mb_strtolower(trim($polyt->mechanism_of_injury)) == mb_strtolower('Производственная'))
                        &#10004;
                    @else
                        &#9634;
                    @endif
                    Производственная
                    &nbsp; &nbsp; &nbsp; &nbsp;
                    @if (mb_strtolower(trim($polyt->mechanism_of_injury)) == mb_strtolower('Прочие'))
                        &#10004;
                    @else
                        &#9634;
                    @endif
                    Прочие
                </strong>
            </span>
        </p>
    </div>
    <hr style="border: 0; height: 2px; background-color: black; margin-bottom: 2px;">
    <p
        style='margin-top:0.2cm;margin-right:0cm;margin-bottom:10pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
        <span style="font-size:11px;">Осмотр хирурга</span><span style="font-size:11px;">:&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span style="font-size:11px;">
                <strong style='font-family:helvetica'>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    @if (mb_strtolower(trim($polyt->survey_of_surgeon)) == mb_strtolower('ДА'))
                        &#10004;
                    @else
                        &#9634;
                    @endif
                    ДА
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    @if (mb_strtolower(trim($polyt->survey_of_surgeon)) == mb_strtolower('НЕТ'))
                        &#10004;
                    @else
                        &#9634;
                    @endif
                    НЕТ
                </strong>
        </span>
    </p>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:10pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
        <span style="font-size:11px;">Осмотр нейрохирурга:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span style="font-size:11px;">
                <strong style='font-family:helvetica'>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    @if (mb_strtolower(trim($polyt->survey_of_neurosurgeon)) == mb_strtolower('ДА'))
                        &#10004;
                    @else
                        &#9634;
                    @endif
                    ДА
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    @if (mb_strtolower(trim($polyt->survey_of_neurosurgeon)) == mb_strtolower('НЕТ'))
                        &#10004;
                    @else
                        &#9634;
                    @endif
                    НЕТ
                </strong>
        </span>
    </p>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:10pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
        <span style="font-size:11px;">Осмотр травматолога:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <strong style='font-family:helvetica'>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->survey_of_traumatologist)) == mb_strtolower('ДА'))
                    &#10004;
                @else
                    &#9634;
                @endif
                ДА
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->survey_of_traumatologist)) == mb_strtolower('НЕТ'))
                    &#10004;
                @else
                    &#9634;
                @endif
                НЕТ
            </strong>
        </span>
    </p>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:10pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
        <span style="font-size:11px;">Осмотр других узких специалистов:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <strong style='font-family:helvetica'>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                @if (mb_strtolower(trim($polyt->narrow_specialists)) == mb_strtolower('ДА'))
                    &#10004;
                @else
                    &#9634;
                @endif
                ДА
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->narrow_specialists)) == mb_strtolower('НЕТ'))
                    &#10004;
                @else
                    &#9634;
                @endif
                НЕТ
            </strong>
        </span>
    </p>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:10pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <span style="font-size:11px;">Проведена&nbsp;</span><span style="font-size:11px;">R</span><span
            style="font-size:11px;">-графия (черепа, грудной клетки, костей таза, конечностей):
            <strong style='font-family:helvetica'>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->r_graphy)) == mb_strtolower('ДА'))
                    &#10004;
                @else
                    &#9634;
                @endif
                ДА
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->r_graphy)) == mb_strtolower('НЕТ'))
                    &#10004;
                @else
                    &#9634;
                @endif
                НЕТ
            </strong>
        </span>
    </p>

    <p
        style='margin-top:0.3cm;margin-right:0cm;margin-bottom:10pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <span style="font-size:11px;">Проведено УЗС (плевральных и брюшной полостей, забрюшинного
            пространства):&nbsp;
            <strong style='font-family:helvetica'>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->conducted_ultrasound)) == mb_strtolower('ДА'))
                    &#10004;
                @else
                    &#9634;
                @endif
                ДА
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->conducted_ultrasound)) == mb_strtolower('НЕТ'))
                    &#10004;
                @else
                    &#9634;
                @endif
                НЕТ
            </strong>
        </span>
    </p>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:10pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <span style="font-size:11px;">Проведена МСКТ (</span><span style="font-size:11px;">всего тела&nbsp;</span><span
            style="font-size:11px;">&ldquo;</span><span style="font-size:11px;">full</span><span
            style="font-size:11px;">&nbsp;</span><span style="font-size:11px;">body</span><span
            style="font-size:11px;">&rdquo;</span><span style="font-size:11px;">): &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <strong style='font-family:helvetica'>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->msct)) == mb_strtolower('ДА'))
                    &#10004;
                @else
                    &#9634;
                @endif
                ДА
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->msct)) == mb_strtolower('НЕТ'))
                    &#10004;
                @else
                    &#9634;
                @endif
                НЕТ
            </strong>
        </span>
    </p>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:10pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <span style="font-size:11px;">Проведена&nbsp;</span><span style="font-size:11px;">МСКТ (отдельных частей
            тела)</span><span style="font-size:11px;">:</span><span style="font-size:11px;">&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <strong style='font-family:helvetica'>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->msct_individual_parts)) == mb_strtolower('ДА'))
                    &#10004;
                @else
                    &#9634;
                @endif
                ДА
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->msct_individual_parts)) == mb_strtolower('НЕТ'))
                    &#10004;
                @else
                    &#9634;
                @endif
                НЕТ
            </strong>
        </span>
    </p>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:10pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <span style="font-size:11px;">Содержания нейтральных жиров в крови и моче</span><span style="font-size:11px;">:
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span style="font-size:11px;">
            <strong style='font-family:helvetica'>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->neutral_fats)) == mb_strtolower('ДА'))
                    &#10004;
                @else
                    &#9634;
                @endif
                ДА
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->neutral_fats)) == mb_strtolower('НЕТ'))
                    &#10004;
                @else
                    &#9634;
                @endif
                НЕТ
            </strong>
        </span>
    </p>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:10pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <span style="font-size:11px;">Проведен анализ &nbsp; Нв,&nbsp;</span><span
            style="font-size:11px;">Ht</span><span style="font-size:11px;">&nbsp;в динамике:&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp;&nbsp;</span><span style="font-size:11px;">
                <strong style='font-family:helvetica'>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp;
                    @if (mb_strtolower(trim($polyt->analysis_of_hb_ht)) == mb_strtolower('ДА'))
                        &#10004;
                    @else
                        &#9634;
                    @endif
                    ДА
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    @if (mb_strtolower(trim($polyt->analysis_of_hb_ht)) == mb_strtolower('НЕТ'))
                        &#10004;
                    @else
                        &#9634;
                    @endif
                    НЕТ
                </strong>
        </span>
    </p>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:10pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <span style="font-size:11px;">Проведено УЗС в динамике</span><span style="font-size:11px;">:&nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span style="font-size:11px;">&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp;
            <strong style='font-family:helvetica'>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->dynamic_uzs)) == mb_strtolower('ДА'))
                    &#10004;
                @else
                    &#9634;
                @endif
                ДА
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->dynamic_uzs)) == mb_strtolower('НЕТ'))
                    &#10004;
                @else
                    &#9634;
                @endif
                НЕТ
            </strong>
        </span>
    </p>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:10pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
        <span style="font-size:11px;">Диагностическая лапароскопия:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp;
            <strong style='font-family:helvetica'>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->diagnostic_laparoscopy)) == mb_strtolower('ДА'))
                    &#10004;
                @else
                    &#9634;
                @endif
                ДА
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->diagnostic_laparoscopy)) == mb_strtolower('НЕТ'))
                    &#10004;
                @else
                    &#9634;
                @endif
                НЕТ
            </strong>
        </span>
    </p>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:10pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
        <span style="font-size:11px;">Торакоцентез:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp;
            <strong style='font-family:helvetica'>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp;
                @if (mb_strtolower(trim($polyt->thoracocentesis)) == mb_strtolower('ДА'))
                    &#10004;
                @else
                    &#9634;
                @endif
                ДА
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->thoracocentesis)) == mb_strtolower('НЕТ'))
                    &#10004;
                @else
                    &#9634;
                @endif
                НЕТ
            </strong>
        </span>
    </p>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:10pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
        <span style="font-size:11px;">Лапаратомия:</span><span style="font-size:11px;">&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span style="font-size:11px;">
            <strong style='font-family:helvetica'>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp;
                @if (mb_strtolower(trim($polyt->laparotomy)) == mb_strtolower('ДА'))
                    &#10004;
                @else
                    &#9634;
                @endif
                ДА
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->laparotomy)) == mb_strtolower('НЕТ'))
                    &#10004;
                @else
                    &#9634;
                @endif
                НЕТ
            </strong>
        </span>
    </p>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:10pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
        <span style="font-size:11px;">Торакоскопия (торакотомия):&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span><span style="font-size:11px;">
            <strong style='font-family:helvetica'>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->thoracoscopy_thoracotomy)) == mb_strtolower('ДА'))
                    &#10004;
                @else
                    &#9634;
                @endif
                ДА
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->thoracoscopy_thoracotomy)) == mb_strtolower('НЕТ'))
                    &#10004;
                @else
                    &#9634;
                @endif
                НЕТ
            </strong>
        </span>
    </p>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:10pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
        <span style="font-size:11px;">Остеосинтез переломов:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <strong style='font-family:helvetica'>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->osteosynthesis_of_fractures)) == mb_strtolower('ДА'))
                    &#10004;
                @else
                    &#9634;
                @endif
                ДА
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->osteosynthesis_of_fractures)) == mb_strtolower('НЕТ'))
                    &#10004;
                @else
                    &#9634;
                @endif
                НЕТ
            </strong>
        </span>
    </p>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:10pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
        <span style="font-size:11px;">Трепанация черепа:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <strong style='font-family:helvetica'>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->skull_trepanation)) == mb_strtolower('ДА'))
                    &#10004;
                @else
                    &#9634;
                @endif
                ДА
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                @if (mb_strtolower(trim($polyt->skull_trepanation)) == mb_strtolower('НЕТ'))
                    &#10004;
                @else
                    &#9634;
                @endif
                НЕТ
            </strong>
        </span>
    </p>
    <p
        style='margin-top:1cm;margin-right:6.1pt;margin-bottom:8.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
        <span style="font-size:11px;">ФИО лечащего врача: &nbsp;{{ $polyt->physician_full_name }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ФИО специалиста
            стат.отдела: &nbsp;{{ $polyt->stat_department_full_name }}</span></p>
    <div
        style='margin-top:0cm;margin-right:6.1pt;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;border:none;border-top:solid windowtext 1.0pt;padding:1.0pt 0cm 0cm 0cm;'>
        <br></div>
</body>

</html>
