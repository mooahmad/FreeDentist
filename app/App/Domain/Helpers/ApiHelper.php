<?php


namespace App\App\Domain\Helpers;


use App\Users\Domain\Models\UserNotification;
use Edujugon\PushNotification\PushNotification;
use http\Message;
use Illuminate\Contracts\Support\MessageBag;

/**
 * Class ApiHelper
 * @package App\App\Domain\Helpers
 */
class ApiHelper
{

    public static function pushNotification($serverApiKey, $tokens, $data)
    {
        $push = new PushNotification('fcm');
        $push->setUrl(env('FIREBASE_URL', 'https://fcm.googleapis.com/fcm/send'));
        $push->setApiKey($serverApiKey);
        $push->setMessage($data);
        $push->setDevicesToken($tokens);
        return $push->send()->getFeedback();
    }

    public static function buildNotification($title, $message, $arrCustomData)
    {
        $arrCustomData['title'] = $title;
        $arrCustomData['body'] = $message;
        return [
            'notification' => [
                'title' => $title,
                'body' => $message,
                //"badge" => $badge,
                'sound' => 'default'
            ],
            'data' => $arrCustomData
        ];
    }

    public static function saveNotification($data, $title, $message)
    {
        $notify = new UserNotification();
        $notify->dentist_id = isset($data['dentist_id'])?  $data['dentist_id'] : 0;
        $notify->user_id = isset($data['user_id']) ? $data['user_id'] :  0;
        $notify->service_id = $data['treatment_id'];
        $notify->event_id = $data['id'];
        $notify->title = $title;
        $notify->mesg = $message;
        $notify->save();
        return $notify;
    }

    /**
     * @param $data
     * @param null $message
     * @return \Illuminate\Http\JsonResponse
     */
    public static function responseSuccess($message=null,$status=200)
    {
        return response()->json(array("message"=>$message,"status" =>$status));
    }

    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public static function responseFail($message,$status = 401)
    {
        return response()->json(array("message" => $message ,'status'=>$status));
    }

    /**
     * @param MessageBag $message
     * @return \Illuminate\Http\JsonResponse
     */
    public static function responseValidationFail(MessageBag $message)
    {
        return response()->json(array("status" => config('api_constant.response_validation_fail'), "message" => $message));
    }

    /**
     * @param MessageBag $message
     * @return \Illuminate\Http\JsonResponse
     */
    public static function responseCustomerValidationFail(MessageBag $message)
    {
        return response()->json(array("status" => config('api_constant.response_validation_fail'), "message" => $message->first()));
    }
}