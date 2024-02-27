<?php

use App\Models\Branch;
use App\Models\FilialSubWeek;
use App\Models\Language;
use App\Models\SubFilial;
use App\Models\Week;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Nette\Utils\DateTime;

function requestOrder()
{
    $order = request()->get('order', '-id');
    if ($order[0] == '-') {
        $result = [
            'key' => substr($order, 1),
            'value' => 'desc'
        ];
    } else {
        $result = [
            'key' => $order,
            'value' => 'asc'
        ];
    }
    return $result;
}

function filterPhone($phone)
{
    return str_replace(['(', ')', ' ', '-'], '', $phone);
}

function uploadFile($file, $path, $old = null): ?string
{
    $result = null;
    deleteFile($old);
    deleteFile($old);
    if ($file != null) {
        $names = explode(".", $file->getClientOriginalName());
        $model = time() . '.' . $names[count($names) - 1];
        $file->storeAs("public/$path", $model);
        $result = "/storage/$path/" . $model;
    }
    return $result;
}

function uploadFilePublic($file, $path, $old = null): ?string
{
    $filename = time() . '_' . $file->getClientOriginalName();
    $file->move($path, $filename);
    return "/$path/" . $filename;

}

function deleteFile($path): void
{
    if ($path != null && file_exists(public_path() . $path)) {
        unlink(public_path() . $path);
    }
}

function nudePhone($phone)
{
    if (strlen($phone) > 0)
        $phone = str_replace(['(', ')', ' ', '-', '+'], '', $phone);
    if (strlen($phone) > 0) {
        if ($phone[0] == '7') {
            $phone = substr($phone, 1);
        }
    }
    return $phone;
}

function buildPhone($phone): string
{
    $phone = nudePhone($phone);
    return '+7 ' . '(' . substr($phone, 0, 3) . ') '
        . substr($phone, 3, 3) . '-'
        . substr($phone, 6, 2) . '-'
        . substr($phone, 8, 2);
}

function getKey()
{
    $key = explode('.', request()->route()->getName());
    array_pop($key);
    $key = implode('.', $key);
    return $key;
}

function getRequest($request = null)
{
    return $request ?? request();
}


function defaultLocale()
{
    return Language::where('default', true)->first();
}

function allLanguage()
{
    return Language::all();
}

function defaultLocaleCode()
{
    return optional(defaultLocale())->url;
}

function paginate($items, $perPage = 15, $page = null, $options = [])
{
    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

    $items = $items instanceof Collection ? $items : Collection::make($items);

    return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
}

function localDatetime($date, $timezone = 'Asia/Tashkent')
{
    if ($date)
        $date = Carbon::parse($date)->setTimezone($timezone)->format('Y-m-d H:i:s');
    return $date;
}

function weekGenerate()
{
    $d = new DateTime();
    $v=Week::orderBy('start_date', 'DESC')->first()->start_date;
    $date =  new DateTime($v);
    $d->modify("-14 day");
    for ($i = 7; $date < $d;) {
        $week = new Week();
        $week->start_date = $date->modify("+$i day")->format('Y-m-d');
        $week->end_date = $date->modify("+$i day")->format('Y-m-d');
        $week->name = date('d.m.Y', strtotime($week->start_date)) . '-' . date('d.m.Y', strtotime($week->end_date));
        $week->save();
        $date->modify("-$i day");
        $branches = Branch::all();
        foreach ($branches as $index => $item) {
            FilialSubWeek::create([
                'week_id' => $week->id,
                'branch_id' => $item->id
            ]);
            $sub_filials = SubFilial::where('branch_id', $item->id)->get();
            foreach ($sub_filials as $index => $data) {
                FilialSubWeek::create([
                    'week_id' => $week->id,
                    'branch_id' => $item->id,
                    'sub_filial_id' => $data->id
                ]);
            }

        }

    }
}
