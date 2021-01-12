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
            'authorization: key=' . 'AAAAsxK-WA8:APA91bGXpVuo4uLf4ZXj0ioQev05bZ9DLuPP2NjCCm7jg4mePlgqjb6KyJeh6znV_18aJQ7bd_PWnAivdTdeCa8uIIy7rCwAn_mGiJmIQaVhzaE4ldoAk8gqy8tqlXRrG3wPkbuGwtIi',
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
    
        return $result;
        
    }
}
