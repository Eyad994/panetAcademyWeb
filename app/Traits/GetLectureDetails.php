<?php

namespace App\Traits;

trait GetLectureDetails
{
    public function detail($lectureId)
    {
        $url = 'https://api.vimeo.com/videos/'. $lectureId;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Accept: application/vnd.vimeo.*+json;version=3.4',
            'Authorization: Bearer d74ccd767ccd1f1a974a9478a4760f84 ',
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response, true);
        return $response_a;
    }

    public function pictures($lectureId)
    {
        $url = 'https://api.vimeo.com/videos/'. $lectureId .'/pictures';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Accept: application/vnd.vimeo.*+json;version=3.4',
            'Authorization: Bearer d74ccd767ccd1f1a974a9478a4760f84 ',
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response, true);
        return $response_a;
    }
}