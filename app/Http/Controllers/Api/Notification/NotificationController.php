<?php

namespace App\Http\Controllers\Api\Notification;

use App\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        // dump($result);
        curl_close($ch);
       
        
        return $result;
        
    }

    function sendPushRiderNotification($fcm_token, $title, $message, $id = null ,$res_latitude ,$res_longitude ,$user_latitude,$user_longitude,$order_id,$comission,$distance)
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
                "is_read": 0,
                "res_latitude" : "' . $res_latitude . '",
                "res_longitude" : "' . $res_longitude . '",
                "user_latitude" : "' . $user_latitude . '",
                "user_longitude" : "' . $user_longitude . '",
                "order_id" : "' . $order_id . '",
                "comission" : "' . $comission . '",
                "distance" : "' .  $distance . '",
               
               
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
        // dump($result);
        return $result;
        
    }

    public function sendNotification($type , $device_token)
    {
         $notification = Notification::where('title' , $type)->first();


        if($device_token != null)
        {
            $this->sendPushNotification($device_token,$notification->title,$notification->message);
        }

    }
    // // ! Ridder Notification 
    // public function sendRiderNotification($type , $device_token , $data=[])
    // {
    //      $notification = Notification::where('title' , $type)->first();

    //     if($device_token != null)
    //     {
    //         $this->sendPushNotification($device_token,$notification->title,$notification->message);
    //     }

    // }
}
