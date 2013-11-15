<?php namespace RMS\PushNotificationsBundle\Service;

use RMS\PushNotificationsBundle\Service\OS\AppleNotification;
use RMS\PushNotificationsBundle\Service\OS\AndroidGCMNotification;
use RMS\PushNotificationsBundle\Device\Types;

class Factory 
{
    public static function build( $service, $configuration )
    {
        return self::$service($configuration);
    }

    private static function apns( $arguments )
    {
        $handler = new AppleNotification(
            $arguments['sandbox'], 
            $arguments['pem'], 
            $arguments['passphrase'], 
            $arguments['jsonUnescapedUnicode']
        );

        return [ 'type' => Types::OS_IOS, 'handler' => $handler ];
    }

    private static function gcm( $arguments )
    {
        $handler = new AndroidGCMNotification( $arguments['api_key'] );

        return [ 'type' => Types::OS_ANDROID_GCM , 'handler' => $handler ];
    }
}