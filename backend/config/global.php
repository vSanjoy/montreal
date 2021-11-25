<?php
/*****************************************************/
# Purpose : for global contants
/*****************************************************/

return [
    'LOADER'                            => 'loader.gif',                            // 'loader.gif' Loading image
    'TABLE_LIST_LOADER'                 => 'loading.gif',                           // 'loading.gif' Loading image
    'NO_IMAGE'                          => 'no-image.png',                          // no image
    'ADMIN_IMAGE'                       => 'avatar5.png',                           // Admin image
    'EMAIL_REGEX'                       => '/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/',   // email regex
    'PASSWORD_REGEX'                    => '/^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',   // password regex
    'MAX_UPLOAD_IMAGE_SIZE'             => '5242880',                               // 1048576 => 1 mb, maximum upload size, used in javascript
    'IMAGE_MAX_UPLOAD_SIZE'             => 5120,                                    // Image upload max size (5mb) used in php
    'IMAGE_FILE_TYPES'                  => 'jpeg,jpg,png,svg,bmp',                  // Allowed image file types
    'IMAGE_CONTAINER'                   => 300,                                     // Image container for cropping
    'THUMB_IMAGE_WIDTH'                 => [
                                            'Service'       => 94,                 // Service, Testimonial ... => This name should be same as Model name
                                            'Testimonial'   => 200,
                                            'User'          => 215,
                                            'SubAdmin'      => 215,
                                            'Portfolio'     => 527,
                                        ],
    'THUMB_IMAGE_HEIGHT'                => [
                                            'Service'       => 80,
                                            'Testimonial'   => 200,
                                            'User'          => 215,
                                            'SubAdmin'      => 215,
                                            'Portfolio'     => 507,
                                        ],
    'GALLERY_MAX_IMAGE_UPLOAD_AT_ONCE'  => 10,                                      // Number of images upload at once
    'GALLERY_MAX_IMAGE_UPLOAD_SIZE'     => 5120,                                    // Maximum upload images
    'WEBSITE_LANGUAGE'                  => ['en' => 'English', 'ar' => 'Arabic'],   // Website language



];
