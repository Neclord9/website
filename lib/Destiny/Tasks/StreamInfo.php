<?php
namespace Destiny\Tasks;

use Destiny\Common\Annotation\Schedule;
use Destiny\Common\Application;
use Destiny\Common\TaskInterface;
use Destiny\Twitch\TwitchApiService;

/**
 * @Schedule(frequency=1,period="minute")
 */
class StreamInfo implements TaskInterface {

    public function execute() {
        $cacheDriver = Application::instance ()->getCacheDriver ();
        $response = TwitchApiService::instance ()->getStreamInfo ()->getResponse ();
        if (! empty ( $response ))
            $cacheDriver->save ( 'streaminfo', $response );
    }

}