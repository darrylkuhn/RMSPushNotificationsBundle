<?php namespace RMS\PushNotificationsBundle\Message

use RMS\PushNotificationsBundle\Message\AndroidMessage;
use RMS\PushNotificationsBundle\Message\AppleMessage;
use RMS\PushNotificationsBundle\Message\BlackberryMessage;
use RMS\PushNotificationsBundle\Message\IOSMessage;
use RMS\PushNotificationsBundle\Message\MacMessage;

class Factory
{
	public static function build( $message, $target )
    {
    	$method = $target['platform'] . 'Message';
        return self::$method( $message, $target );
    }

    public static function iosMessge( $message, $target )
    {
        $message = new iOSMessage();
        $message->setMessage( $message );
        $message->setDeviceIdentifier( $target['id'] );

        return $message
    }

    public static function androidMessage( $message, $target )
    {
    	$message = new AndroidMessage();
		$message->setGCM(true);
		$message->setMessage( $message );
        $message->setDeviceIdentifier( $target['id'] );

        return $message;
    }
}