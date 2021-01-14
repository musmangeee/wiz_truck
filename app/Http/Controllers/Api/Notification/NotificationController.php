<?php

namespace App\Http\Controllers\Api\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    function sendPushNotification($fcm_token, $title, $message, $id = null)
    {

        

        
        $url = "https://fcm.googleapis.com/fcm/send";
        $header = [
            'authorization: key=' . 'AAAAsxK-WA8:APA91bGMY-aEFbCLZBKFfwaro-odnhy9ZpefruAs01QhnekvgsUgKKHySwnQH-I7GWCOJeFA1pHSZqj_9kUY9In-hclnQPE2WBvhOrgwIpgJ08ro-wZeeXPNcHGz3HiQLFO54PA2_ffL',
            'content-type: application/json'
        ];

        $postdata = '{
            "to" : "' . $fcm_token . '",
                "notification" : {
                    "title":"' . $title . '",
                    "text" : "' . $message . '"
                },
            "data" : {
                "id" : "' . $id . '",
                "title":"' . $title . '",
                "description" : "' . $message . '",
                "text" : "' . $message . '",
                "is_read": 0
              }
        }';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        $result = curl_exec($ch);
        curl_close($ch);
        dd($fcm_token, $result);
        return $result;
        
    }
}
