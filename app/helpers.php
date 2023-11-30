<?php

use App\Models\Setting;
use Carbon\Carbon;



if(!function_exists('formatTime'))
{
    /**
     * format Time
     */
    function formatTime($time, $opt = "12")
    {
        return match($opt) {
            default => '',
            '12' => date('h:i A', strtotime($time)),
        };
    }

}

if(!function_exists('formatDate'))
{
    /**
     * format date
     */
    function formatDate($date, $opt="fulldate")
    {
        if(!is_null($date))
        {
            return match($opt) {
                default => '',
                'dateInput' => date('Y-m-d'),
                'fulldate' => date('F d,Y', strtotime($date)),
                'dateTime' => date('M d,Y h:iA', strtotime($date)),
                'dateTimeWithSeconds' => date('Y-m-d h:i:s', strtotime($date)),
                'dateTimeLocal' => date('Y-m-d\TH:i', strtotime($date)),
                'time' => date('h:iA', strtotime($date)),
            };
        }
        
        
    }

}

if(!function_exists('getAge'))
{
    /**
     * get the age by birth date
     */
     function getAge($birth_date)
    {
        return Carbon::parse($birth_date)->age;
    }

}


if(!function_exists('getSettings'))
{
    /**
     * get the settings
     */
    function getSettings()
    {
       return Setting::first();
    }
}



if(!function_exists('getDateDiff'))
{
    /**
     * get the difference of two dateTime
     */
    function getDateDiff($startdate,$enddate){


        if($startdate && $enddate) {

            $startTime = Carbon::parse($startdate);
            $endTime = Carbon::parse($enddate);
    
            $totalDuration =  $startTime->diff($endTime)->format('%d');
    
            return $totalDuration;
        }

        return '';
     
    }
}


if(!function_exists('handleNullAvatar'))
{
    /**
     * handle Null Avatar Image
     */
    function handleNullAvatar($img)
    {
        return $img ?? '/img/noimg.svg';
    }
}


if(!function_exists('handleNullImage'))
{
    /**
     * handle Null Image
     */
    function handleNullImage($img)
    {
        return $img ?? '/img/noimg.png';
    }
}


if(!function_exists('isLikedByAuthUser'))
{
     /**
     * check if this model is liked by authenticated user
     */
    function isLikedByAuthUser($auth_user, $likers) 
    {
        $post_likers = [];// users who likes the post

        foreach($likers as $liker) {
        $post_likers[] = $liker->user_id; // get user id 
        }

        return  (in_array($auth_user, $post_likers)) ? true : false; // check if the user has already liked the post
    }
}



if(!function_exists('isOnline'))
{
     /**
     * check if the payment method status is approved
     */
    function isOnline($bool)
    {
        return $bool  ? "<span class='badge badge-success'>Online <i class='fas fa-check-circle ml-1'></i></span>" : "<span class='badge badge-danger'>Offline</span>";
    }

}

if(!function_exists('isVerified'))
{
     /**
     * check if the user email is verified
     */
    function isVerified($bool)
    {
        return $bool  ? "<span class='badge badge-success'>Verified <i class='fas fa-check-circle ml-1'></i></span>" : "<span class='badge badge-danger'>Unverified</span>";
    }
}


if(!function_exists('isActivated'))
{
     /**
     * check if the status is approved
     */
    function isActivated($bool)
    {
        return $bool == 0 
        ? "<span class='badge bg-danger text-white'>Deactivated <i class='fas fa-times-circle ml-1'></i></span>"
        : "<span class='badge bg-success text-white'>Activated <i class='fas fa-check-circle ml-1'></i></span>";
    }

}


if(!function_exists('isApproved'))
{
     /**
     * check if the status is approved
     */
    function isApproved($bool)
    {
        if ($bool == 0) {
            return "<span class='badge bg-info p-2'>Pending <i class='fas fa-spinner ms-2'></i></span>";
        } else if($bool == 1) {
            return "<span class='badge bg-success p-2'>Approved</span>";
        } else {
            return "<span class='badge bg-danger p-2'>Declined</span>";
        }
    }

}