<?php
namespace App\Helper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\LengthAwarePaginator;
use Datetime;
use Carbon\Carbon;
use Morilog\Jalali\Jalalian;
function serverName(){
    $servName = $_SERVER['SERVER_NAME'];
    $port = $_SERVER['SERVER_PORT'];
    $serverName = 'http://' . $servName . ':' . $port.'/';
    return $serverName;
}
function miladiToShamsi($time, $hour = null)
{
    $miladi = explode(' ', $time);
    if (count($miladi) < 1) {
        $time = date("Y-m-d H:i:s");
        $miladi = explode(' ', $time);
    }
    $miiladi = $miladi[0];
    $fMiladi = explode('-', $miiladi);
    if (count($fMiladi) < 3) {
        $time = date("Y-m-d H:i:s");
        $miladi = explode(' ', $time);
        $miiladi = $miladi[0];
        $fMiladi = explode('-', $miiladi);
    }
    $fMiladiii = \Morilog\Jalali\CalendarUtils::toJalali($fMiladi[0], $fMiladi[1], $fMiladi[2]);
    if ($fMiladiii[1] < 10) {
        $fMiladiii[1] = '0' . $fMiladiii[1];
    }
    if ($fMiladiii[2] < 10) {
        $fMiladiii[2] = '0' . $fMiladiii[2];
    }
    $shamsi = $fMiladiii[0] . '/' . $fMiladiii[1] . '/' . $fMiladiii[2];
    if ($hour) {
        $hour = $miladi[1];
        $shamsi = $fMiladiii[0] . '/' . $fMiladiii[1] . '/' . $fMiladiii[2] . ' - ' . $hour;
    }
    return $shamsi;
}
function shamsiToMiladi($time, $hour = null)
{
    $shamsi = explode('/', $time);
    if (count($shamsi) < 3) {
        if ($hour) {
            return date("Y-m-d") . ' ' . $hour . ':00.000';
        } else {
            return date("Y-m-d");
        }
    }
    try {
        $time = \Morilog\Jalali\jDateTime::toGregorian($shamsi[0], $shamsi[1], $shamsi[2]);
    } catch (\Exception $e) {
        if ($hour) {
            return date("Y-m-d") . ' ' . $hour . ':00.000';
        } else {
            return date("Y-m-d");
        }
    }
    if (count($time) < 3) {
        if ($hour) {
            return date("Y-m-d") . ' ' . $hour . ':00.000';
        } else {
            return date("Y-m-d");
        }
    }
    if ($time[1] < 10) {
        $time[1] = '0' . $time[1];
    }
    if ($time[2] < 10) {
        $time[2] = '0' . $time[2];
    }
    $miladi = $time[0] . '-' . $time[1] . '-' . $time[2];
    if ($hour) {
        $miladi = $time[0] . '-' . $time[1] . '-' . $time[2] . ' ' . $hour . ':00.000';
    }
    /* $date = strtotime($miladi);*/
    /* date('Y-m-d H:i:s', $date)*/
    return $miladi;
}
function weekday(){
    /*  $DayNames1 = array('شنبه','یکشنبه','دوشنبه','سه شنبه','چهارشنبه','پنجشنبه','جمعه');*/
    return [
        'DayNames' => [
            '0' => '1',
            '1' => '2',
            '2' => '3',
            '3' => '4',
            '4' => '5',
            '5' => '6',
            '6' => '7',
            // etc
        ]
    ];
}
/*__________________________________________ date & weekday _______________________________ */
function weekdays(){
    if (date('D')=='Sat')
        $weekday='شنبه';
    elseif (date('D')=='Sun')
        $weekday='یکشنبه';
    elseif (date('D')=='Mon')
        $weekday='دوشنبه';
    elseif (date('D')=='Tue')
        $weekday='سه شنبه';
    elseif (date('D')=='Wed')
        $weekday='چهارشنبه';
    elseif (date('D')=='Thu')
        $weekday='پنج شنبه';
    elseif (date('D')=='Fri')
        $weekday='چمعه';
    return $weekday;
}
function dateDay(){
    $arraySdateMiladi=\Morilog\Jalali\jDateTime::toJalali(date('Y'), date('m'), date('d'));
//    $arraySdateShamsi=$arraySdateMiladi[0].'/'. $arraySdateMiladi[1].'/'. $arraySdateMiladi[2];
    return $arraySdateMiladi[2];
}
function dateMonth(){
    $arraySdateMiladi=\Morilog\Jalali\jDateTime::toJalali(date('Y'), date('m'), date('d'));
    $month='فروردین';
//    $arraySdateShamsi=$arraySdateMiladi[0].'/'. $arraySdateMiladi[1].'/'. $arraySdateMiladi[2];
    if ($arraySdateMiladi[1]==2)
        $month='اردیبهشت';
    elseif ($arraySdateMiladi[1]==3)
        $month='خرداد';
    elseif ($arraySdateMiladi[1]==4)
        $month='تیر';
    elseif ($arraySdateMiladi[1]==5)
        $month='مرداد';
    elseif ($arraySdateMiladi[1]==6)
        $month='شهریور';
    elseif ($arraySdateMiladi[1]==7)
        $month='مهر';
    elseif ($arraySdateMiladi[1]==8)
        $month='آبان';
    elseif ($arraySdateMiladi[1]==9)
        $month='آذر';
    elseif ($arraySdateMiladi[1]==10)
        $month='دی';
    elseif ($arraySdateMiladi[1]==11)
        $month='بهمن';
    elseif ($arraySdateMiladi[1]==12)
        $month='اسفند';
    return $month;
}
function dateYear(){
    $arraySdateMiladi=\Morilog\Jalali\jDateTime::toJalali(date('Y'), date('m'), date('d'));
    return $arraySdateMiladi[0];
}
/*__________________________________ change date to shamsi ________________________*/
function toPersianDate($date){
    $date1=(explode(" ",$date));
    $date=$date1[0];
    $arrySDateMiladi=(explode("-",$date));
    $arraySdateMiladi=\Morilog\Jalali\jDateTime::toJalali($arrySDateMiladi[0], $arrySDateMiladi[1], $arrySDateMiladi[2]);
    $arraySdateShamsi=$arraySdateMiladi[0].'/'. $arraySdateMiladi[1].'/'. $arraySdateMiladi[2];//baraye zakhire dakhel Class
    $sDate=$arraySdateShamsi;
    return $sDate;
}
function toPersianDateByJsStore($date){
    $arrySDateMiladi=(explode("/",$date));
    $arraySdateMiladi=\Morilog\Jalali\jDateTime::toJalali($arrySDateMiladi[0], $arrySDateMiladi[1], $arrySDateMiladi[2]);
    $arraySdateShamsi=$arraySdateMiladi[0].'/'. $arraySdateMiladi[1].'/'. $arraySdateMiladi[2];//baraye zakhire dakhel Class
    $sDate=$arraySdateShamsi;
    return $sDate;
}
function toMiladiDate($date){
    $sDateShamsi=$date;
    $arrySDateShamsi=(explode("/",$sDateShamsi));
    $arraySdateMiladi=\Morilog\Jalali\jDateTime::toGregorian($arrySDateShamsi[0], $arrySDateShamsi[1], $arrySDateShamsi[2]);
    $sDateMiladiInClass=$arraySdateMiladi[0].'/'. $arraySdateMiladi[1].'/'. $arraySdateMiladi[2];//baraye zakhire dakhel Class
    $sDateMiladi = new DateTime($arraySdateMiladi[0].'-'. $arraySdateMiladi[1] .'-'. $arraySdateMiladi[2]);//baraye estefade dar jadvale events
    return $sDateMiladiInClass;
}
function toMiladiDateEvent($date){
    $sDateMiladi=$date;
    $arrySDateMiladi=(explode("/",$sDateMiladi));
    $arraySdateMiladi=\Morilog\Jalali\jDateTime::toJalali($arrySDateMiladi[0], $arrySDateMiladi[1], $arrySDateMiladi[2]);
    $arraySdateShamsi=$arraySdateMiladi[0].'/'. $arraySdateMiladi[1].'/'. $arraySdateMiladi[2];//baraye zakhire dakhel Class
    $sDate=$arraySdateShamsi;
    return $sDate;
}
function miladiDateToShmasi($date){
    $arrySDateMiladi=(explode("-",$date));
    return $arrySDateMiladi[0];
    $arraySdateMiladi=\Morilog\Jalali\jDateTime::toJalali($arrySDateMiladi[0], $arrySDateMiladi[1], $arrySDateMiladi[2]);
    $arraySdateShamsi=$arraySdateMiladi[0].'/'. $arraySdateMiladi[1].'/'. $arraySdateMiladi[2];//baraye zakhire dakhel Class
    $sDate=$arraySdateShamsi;
    return $sDate;
}
function dateOfWeek() {
    $monday = strtotime("last saturday");
    $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
    $sunday = strtotime(date("Y-m-d",$monday)." +6 days");
    $this_week_start = date("Y/m/d",$monday);
    $this_week_end = date("Y/m/d",$sunday);
    return [$this_week_start, $this_week_end];
}
function weeksOfMonth()
{
    $currentYear = date('Y');
    $currentMonth = date('m');
    //Substitue year and month
    $time = strtotime("$currentYear-$currentMonth-01");
    //Got the first week number
    $firstWeek = date("W", $time);
    if ($currentMonth == 12)
        $currentYear++;
    else
        $currentMonth++;
    $time = strtotime("$currentYear-$currentMonth-01") - 86400;
    $lastWeek = date("W", $time);
    $weekArr = array();
    $j = 1;
    for ($i = $firstWeek; $i <= $lastWeek; $i++) {
        $weekArr[$i] = 'week ' . $j;
        $j++;
    }
    return $weekArr;
}
function weekOfMonth($weekNumberClick){
    $en= Carbon::now('Asia/Tehran');
//  $en = Carbon::parse('2018-11-17');
//    $dt = Carbon::parse($en);
    $s= $en->setWeekStartsAt(6);
    $e=  $en->setWeekEndsAt(5);
// Or better
    $f=$en->setWeekStartsAt(Carbon::SATURDAY);
    $r=$en->setWeekEndsAt(Carbon::FRIDAY);
    $week=$en->weekOfMonth;
    $dd = $en->startOfWeek();
    $ownShamsiWeek= $week +2;
    if ($weekNumberClick){
        $weekcalc=($ownShamsiWeek + $weekNumberClick)%4;
        ($weekcalc == 0 )? ($weekcalc=4 ):$weekcalc;
        return($weekcalc);
//        if($weekcalc == 0){
//            return(4);
//        }else{
//        return($weekcalc);
//        }
    }else{
//    $dd=$dt->weekNumberInMont;
        return($ownShamsiWeek);
    }
}
function checkedCard($cardId,$operatorCards)
{
    $checked = '';
    $arrayCardIds = array();
    if(in_array($cardId,$operatorCards)){
        return 'checked';
    } else {
        return '';
    }
}
function dateFormat($baseDate){
    $formatDate = $baseDate->format('Y-m-d');
    return $formatDate;
}
function timeFormat($baseDate){
    $formatDate = $baseDate->format('H:i:s');
    return $formatDate;
}
function fileExist($filePath) {
    \Log::info($filePath);
    if (file_exists( public_path() . $filePath)) {
        \Log::info("true");
        return "true";
    } else {
        \Log::info("false");
        return "false";
    }
}