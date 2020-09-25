<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Vimeo\Laravel\Facades\Vimeo;

class VimeoController extends Controller
{

/*$imageName = time().'.'.$request->image->getClientOriginalExtension();
$request->image->move(public_path('images/major'), $imageName);*/
    public function index(Request $request)
    {
        // get all pictures sizes to specific video
        // https://api.vimeo.com/videos/452324413/pictures

        /********************************************************************/

        /*$uri = Vimeo::upload($request->video, array(
            "name" => 'PrivateLinkNew2',
            "description" => 'PrivateLink descriptionNew2',
            'privacy' => array(
                'view' => 'unlisted'
            )
        ));
        return $uri;
        */

        //return "Your video URI is: " . $uri;

        /********************************************************************/

       // https://api.vimeo.com/videos/{video_id}
        $uri = '/videos/452324413';

        // edit title and description
        /*Vimeo::request($uri, array(
            'name' => 'new title omar',
            'description' => 'new description omar',
        ), 'PATCH');

       return 'The title and description for ' . $uri . ' has been edited.';*/

            $response = Vimeo::request($uri . '?fields=transcode.status');
        if ($response['body']['transcode']['status'] === 'complete') {
            print 'Your video finished transcoding.';
        } elseif ($response['body']['transcode']['status'] === 'in_progress') {
            print 'Your video is still transcoding.';
        } else {
            print 'Your video encountered an error during transcoding.';
        }


        // get lecture details
        /*$response = $this->detail('452541508');
        $imageSize265 =  $response['pictures']['sizes'][2];
        $imageSize640 =  $response['pictures']['sizes'][3];*/

    }
    /*public function upload(Request $request)
    {

        $response = Vimeo::request('/me/videos', ['per_page' => 10], 'GET');
        return $response['body']['data'][0]['link'];
        return Vimeo::upload($request->video);
    }*/
}
