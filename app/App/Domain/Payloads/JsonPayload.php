<?php
/**
 * Created by PhpStorm.
 * User: ahmad
 * Date: 1/15/2020
 * Time: 2:44 PM
 */

namespace App\App\Domain\Payloads;


class JsonPayload extends Payload
{
    protected $status = 202;
    protected $data = ['message' => 'Sorry Data is Exist'];

}