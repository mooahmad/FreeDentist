<?php

namespace App\App\Domain\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

trait Helper
{
    /**
     * this function add and delete image
     *
     * @param $file
     * @param $path
     * @param null $old_image_path
     * @param string $disk
     * @return mixed
     */
    public function UploadFile($file, $path, $old_image_path = null, $disk = 'public')
    {
        //Delete old image
        if (!empty($old_image_path))
            self::DeleteFile($old_image_path);
        return $file->store($path, $disk);
    }

    /**
     *  this function take image path and cut string by storage as default
     * @param $image_path
     * @param string $disk
     * @return bool
     */
    public function DeleteFile($image_path, $disk = 'public')
    {
        if (!empty($image_path)) {
            if (Storage::disk($disk)->exists($image_path)) {
                Storage::disk($disk)->delete($image_path);
                return true;
            }
        }
        return false;
    }

    /**
     * @param null $fullFilePath
     * @param int $temporaryTimeMinutes
     * @param string $disk
     * @param bool $isStatic
     * @return null|string
     */
    public function getFileUrl($fullFilePath = null, $temporaryTimeMinutes = null, $disk = 'public', $isStatic = false)
    {
        if (empty($fullFilePath) || $isStatic)
            return $fullFilePath;
        $exists = Storage::disk($disk)->exists($fullFilePath);
        if (!$exists)
            return "";
        if ($temporaryTimeMinutes)
            $url = Storage::temporaryUrl(
                $fullFilePath, now()->addMinutes($temporaryTimeMinutes)
            );
        else
            $url = Storage::url($fullFilePath);
        return URL::to('/public/') . $url;
    }

    public function generateDateRange($start_date, $end_date)
    {
        $dates = [];
        $start = Carbon::createFromDate($start_date);
        $end = Carbon::createFromDate($end_date);
        for ($date = $start; $date->lte($end); $date->addDay()) {
            $dates[] = $date->format('Y-m-d');
        }
        return $dates;
    }

}