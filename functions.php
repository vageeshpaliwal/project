<?php
    function encode($value,$value1)
    {
        $value=base64_encode($value);
        $value1=base64_encode($value1);
        $arr=[];
        $arr=[$value,$value1];
        $str=implode("," ,$arr);
        return $str;

    }


    function total_hours($value1,$value2)
    {

        $current_time=strtotime($value1);
        $future_time=strtotime($value2);
        $diff=($future_time-$current_time);
        $hours=($diff/3600);
        $minute=($diff/60%60);
        $seconds=($diff % 60);
        $all=sprintf("%02d",$hours).":".sprintf("%02d",$minute).":".sprintf("%02d",$seconds);
        return $all;
    //     $a=[];
    //     $timestamp1 = strtotime($value1);
    //     $timestamp2 = strtotime($value2);
       
    //     $hour = number_format(($timestamp2 - $timestamp1)/(60*60),2);
    //     $a=explode(".",$hour);
    //     $hours=$a[0];
    //     $min=$a[1];
    //     $minute =number_format(($min*60/100),2) ;
    //     $a=explode(".",$minute);
    //     $minutes=$a[0];
    //     $sec=$a[1];
    //     $seconds=number_format($sec*60/100) ;
    //     $a=[$hours,$minutes,$seconds];
    //    return implode(":",$a);
    } 
//    $sigin="8:34:23 AM";
//    $signOutTime="6:02:45 PM";
// //  print_r( total_hours($sigin,$signout));
//    echo total_hours($sigin,$signOutTime);
?>