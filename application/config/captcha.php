<?php
// BotDetect PHP Captcha configuration options

$config = array(
  // Captcha configuration for example page
  'ExampleCaptcha' => array(
    'UserInputID' => 'CaptchaCode',
    'CodeLength' => CaptchaRandomization::GetRandomCodeLength(4, 6),
    'ImageWidth' => 250,
    'ImageHeight' => 50,
    'ImageStyle' => array(
      ImageStyle::Collage,
    ),
  ),

);