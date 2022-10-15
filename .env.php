<?php declare(strict_types=1);

return [
    "URL" => 'http://luna.de',
    "ASSET_PREFIX" => "",
    "DESC" => 'Hallo meine Name ist Marzena Stefaniak und ich bin gelernte und zertifizierte Hundefriseur. Ich bitte Pflege für kleine und grosse Hunde.',
    "TITLE" => 'Luna - Hundefriseur',
    "SUBTITLE" => 'Luna - Hundefriseur',
    "PUBLIC_FOLDER" => "httpdocs",
    "EMAIL_SECRET" => "xsw2#EDCvfr4%TGB",
    "EMAIL_USERNAME" => 'lunaweb@testdomain353.de',
    "EMAIL_HOST" => 'server1121.dmsolutionsonline.de',
    "EMAIL_PORT" => 587,
    // Review desc max 344 characters
    "CARD_GALLERY" => [
        [
            "before" => "media/assets/gallery-card/5.jpg",
            "after" =>"media/assets/gallery-card/6.jpg",
            "review" => [
                "author" => "Rocky - Anita Voisot",
            ]
        ],
        // [
        //     "before" => "media/assets/gallery-card/3.jpg",
        //     "after" => "media/assets/gallery-card/4.jpg",
        //     "review" => [
        //         "stars" => 5,
        //         "author" => "Ebbe Ritter",
        //         "desc" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. printer took a galley of type and scrambled it to make a type specimen book. a type specimen book."
        //     ]
        // ],
        // [
        //     "before" => "media/assets/gallery-card/5.jpg",
        //     "after" => "media/assets/gallery-card/6.jpg",
        //     "review" => [
        //         "stars" => 5,
        //         "author" => "Anselma Winter",
        //         "desc" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. printer took a galley of type and scrambled it to make a type specimen book. a type specimen book."
        //     ]
        // ],
    ],
    "CONTACT_FORM" => [
        [
            "label" => "Name and Surname",
            "type" => "text",
            "name" => "full_name",
            "class" => "required",
        ],
        [
            "row" => [
                [
                    "col-6" =>  [
                        "label" => "Phone number",
                        "type" => "text",
                        "name" => "phone_number",
                        "class" => "required",
                    ],
                    [
                        "col-6" =>  [
                            "label" => "Whatsapp",
                            "type" => "text",
                            "name" => "whatsapp"
                        ],
                    ]
                ]
            ],
        ],
        [
            "row" => [
                [
                    "col-6" => [
                        "label" => "Dogs name",
                        "type" => "text",
                        "name" => "dogs_name"
                    ],
                ],
                [
                    "col-6" => [
                        "label" => "Dogs age",
                        "type" => "text",
                        "name" => "dogs_age"
                    ]
                ]
            ],
        ],
        [
            "row" => [
                [
                    "col-6" => [
                        "label" => "Dogs breed",
                        "type" => "text",
                        "name" => "dogs_breed"
                    ],
                ],
                [
                    "col-6" => [
                        "label" => "Dogs weight",
                        "type" => "text",
                        "name" => "dogs_weight"
                    ]
                ]
            ]
        ],
        [
            "row" => [
                [
                    "col-6" => [
                        "label" => "Appointment date",
                        "type" => "date",
                        "name" => "appointment_date"
                    ],
                ],
                [
                    "col-6" => [
                        "row" => [
                            [
                                "col-6" => [
                                    [
                                        "label" => "Hour",
                                        "type" => "number",
                                        "name" => "appointment_hour",
                                        "min" => "0",
                                        "max" => "23"
                                    ],
                                ]
                            ],
                            "col-6" => [
                                [
                                    "label" => "Minute",
                                    "type" => "number",
                                    "name" => "appointment_minutes",
                                    "min" => "0",
                                    "max" => "59"
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ]
];
