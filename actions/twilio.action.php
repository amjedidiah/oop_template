<?php
use Twilio\Rest\Client;

// Find your Account Sid and Auth Token at twilio.com/console
// DANGER! This is insecure. See http://twil.io/secure
$sid    = "AC300b0628e441c2a8d04b3b64fd3900b6";
$token  = "8a0203c6627f599204fa724c679d18af";
$twilio = new Client($sid, $token);