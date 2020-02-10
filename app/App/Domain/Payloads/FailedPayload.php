<?php
/**
 * Created by PhpStorm.
 * User: ahmad
 * Date: 1/15/2020
 * Time: 2:44 PM
 */

namespace App\App\Domain\Payloads;


class FailedPayload extends Payload
{
    protected $status = 401;
    protected $data = 'sorry ,the process is failed!';

}