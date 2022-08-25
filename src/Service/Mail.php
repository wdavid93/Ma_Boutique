<?php
namespace App\Service;

use Mailjet\Client;
use Mailjet\Resources;

class Mail 
{
    private $api_key = "c2a1cd58ae21be0451736ab830498846";
    private $api_key_secret = "a8b58a736745704c0d59ee211014fe5c";
    

    public function send($toEmail, $toName, $subject, $content)
    {
        $mj = new Client($this->api_key, $this->api_key_secret,true,['version' => 'v3.1']);
        $body = 
        [
            'Messages' => 
            [
                [
                    'From' => 
                    [
                        'Email' => "sportif_wd@hotmail.fr",
                        'Name' => "Ma Boutique"
                    ],
                    'To' => 
                    [
                        [
                            // 'Email' => "ash.kode@gmail.com",
                            // 'Name' => "Ash"
                            'Email' => $toEmail,
                            'Name' => $toName
                        ]
                    ],
                    // 'TemplateID' => 3732103,
                    // 'TemplateLanguage' => true,
                     'Subject' => $subject,
                    // 'Variables' => ['content' => $content]
                   // 'Subject' => "My first Mailjet Email!",
                                 'TextPart' =>  $content,
                                 'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href=\"https://www.mailjet.com/\">Mailjet</a>!</h3>
                                 <br />May the delivery force be with you!"
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
     // Read the response

     $response->success(); // && var_dump($response->getData());
    }
}

// <?php
// require 'vendor/autoload.php';
// use \Mailjet\Resources;

// // Use your saved credentials, specify that you are using Send API v3.1

// $mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'),true,['version' => 'v3.1']);

// // Define your request body

// $body = [
//     'Messages' => [
//         [
//             'From' => [
//                 'Email' => "$SENDER_EMAIL",
//                 'Name' => "Me"
//             ],
//             'To' => [
//                 [
//                     'Email' => "$RECIPIENT_EMAIL",
//                     'Name' => "You"
//                 ]
//             ],
//             'Subject' => "My first Mailjet Email!",
//             'TextPart' => "Greetings from Mailjet!",
//             'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href=\"https://www.mailjet.com/\">Mailjet</a>!</h3>
//             <br />May the delivery force be with you!"
//         ]
//     ]
// ];

// // All resources are located in the Resources class

// $response = $mj->post(Resources::$Email, ['body' => $body]);

// // Read the response

// $response->success() && var_dump($response->getData());
// ?>