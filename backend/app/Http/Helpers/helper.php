<?php
/*
    # Company Name      : Vishi Prem Workz
    # Author            : Sanjay Karmakar
    # Created Date      : 30-03-2021
    # Page/Class name   : helper
    # Purpose           : For global
*/

use App\Models\WebsiteSetting;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Response;
use App\Models\Service;
use App\Models\Enquiry;

/*
    * Function name : getAppName
    * Purpose       : This function is to return app name
    * Author        : Sanjay Karmakar
    * Created Date  : 30-03-2021
    * Modified Date : 
    * Input Params  : 
    * Return Value  : 
*/
function getAppName() {
    return 'Montreal Webdesign';
}

/*
    * Function name : getAppName
    * Purpose       : This function is to return app name
    * Author        : Sanjay Karmakar
    * Created Date  : 30-03-2021
    * Modified Date : 
    * Input Params  : 
    * Return Value  : 
*/
function getBaseUrl() {
    $baseUrl = url('/');
    return $baseUrl;
}

/*
    * Function name : getSiteSettings
    * Purpose       : This function is to return website settings
    * Author        : Sanjay Karmakar
    * Created Date  : 30-03-2021
    * Modified Date : 
    * Input Params  : Void
    * Return Value  : Array
*/
function getSiteSettings() {
    $siteSettingData = WebsiteSetting::first();
    return $siteSettingData;
}

/*
    * Function name : validationMessageBeautifier
    * Purpose       : This function is to beatufy validation messages
    * Author        : Sanjay Karmakar
    * Created Date  : 30-03-2021
    * Modified Date : 
    * Input Params  : $errorMessageObject
    * Return Value  : String
*/
function validationMessageBeautifier($errorMessageObject) {
    $validationFailedMessages = '';
    foreach ($errorMessageObject as $fieldName => $messages) {
        foreach($messages as $message) {
            $validationFailedMessages .= $message.'<br>';
        }
    }
    return $validationFailedMessages;
}

/*
    * Function name : getUserRoleSpecificRoutes
    * Purpose       : This function is for user speciafic routes
    * Author        : Sanjay Karmakar
    * Created Date  : 30-03-2021
    * Modified Date : 
    * Input Params  : Void
    * Return Value  : Array
*/
function getUserRoleSpecificRoutes() {
    $existingRoutes = [];
    $userExistingRoles = \Auth::guard('admin')->user()->userRoles;
    if ($userExistingRoles) {
        foreach ($userExistingRoles as $role) {
            if ($role->rolePermissionToRolePage) {
                foreach ($role->rolePermissionToRolePage as $permission) {
                    $existingRoutes[] = $permission['routeName'];
                }
            }
        }
    }
    return $existingRoutes;
}

/*
    * Function name : checkingAllowRouteToUser
    * Purpose       : This function is for allowed routes
    * Author        : Sanjay Karmakar
    * Created Date  : 30-03-2021
    * Modified Date : 
    * Input Params  : $routeToCheck without admin. alias
    * Return Value  : Array
*/
function checkingAllowRouteToUser($routePartToCheck = null) {
    $existingRoutes['is_super_admin']   = false;
    $existingRoutes['allow_routes']     = [];

    if (\Auth::guard('admin')->user()->id == 1 || \Auth::guard('admin')->user()->type == 'SA') {
        $existingRoutes['is_super_admin'] = true;
    } else {
        $userExistingRoles = \Auth::guard('admin')->user()->userRoles;
        if ($userExistingRoles) {
            foreach ($userExistingRoles as $role) {
                if ($role->rolePermissionToRolePage) {
                    foreach ($role->rolePermissionToRolePage as $permission) {
                        if (strpos($permission['routeName'], $routePartToCheck) !== false) {
                            $existingRoutes['allow_routes'][] = $permission['routeName'];
                        }
                    }
                }
            }
        }
    }
    return $existingRoutes;
}

/*
    * Function name : customEncryptionDecryption
    * Purpose       : This function is for encrypt/decrypt data
    * Author        : Sanjay Karmakar
    * Created Date  : 30-03-2021
    * Modified Date : 
    * Input Params  : $string, $action = encrypt/decrypt
    * Return Value  : String
*/
function customEncryptionDecryption($string, $action = 'encrypt') {
    $secretKey = 'c7tpe291z';
    $secretVal = 'GfY7r512';
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash('sha256', $secretKey);
    $iv = substr(hash('sha256', $secretVal), 0, 16);

    if ($action == 'encrypt') {
        $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}

/*
    * Function Name : generateUniqueSlug
    * Purpose       : This function is to generate unique slug
    * Author        : Sanjay Karmakar
    * Created Date  : 30-03-2021
    * Modified date :
    * Input Params  : $type, $validationFailedMessages, $extraTitle = false
    * Return Value  : Mixed
*/
function generateUniqueSlug($model, $title, $id = null) {
    $slug = Str::slug($title);
    $currentSlug = '';

    if ($id) {
        $id = customEncryptionDecryption($id, 'decrypt');
        $currentSlug = $model->where('id', '=', $id)->value('slug');
    }

    if ($currentSlug && $currentSlug === $slug) {
        return $slug;
    } else {
        $slugList = $model::where('slug', 'LIKE', $slug . '%')->whereNull('deleted_at')->pluck('slug');
        if ($slugList->count() > 0) {
            $slugList = $slugList->toArray();
            if (!in_array($slug, $slugList)) {
                return $slug;
            }
            $newSlug = '';
            for ($i = 1; $i <= count($slugList); $i++) {
                $newSlug = $slug . '-' . $i;
                if (!in_array($newSlug, $slugList)) {
                    return $newSlug;
                }
            }
            return $newSlug;
        } else {
            return $slug;
        }
    }
}

/*
    * Function Name : generateSortNumber
    * Purpose       : This function is to generate sort number
    * Author        : Sanjay Karmakar
    * Created Date  : 30-03-2021
    * Modified date :
    * Input Params  : $model, $id = null
    * Return Value  : Sort number
*/
function generateSortNumber($model = null, $id = null) {
    if ($id != null) {
        $gettingLastSortedCount = $model::select('sort')->where('id','<>',$id)->whereNull('deleted_at')->orderBy('sort','desc')->first();
    } else {
        $gettingLastSortedCount = $model::select('sort')->whereNull('deleted_at')->orderBy('sort','desc')->first();
    }        
    $newSort = isset($gettingLastSortedCount->sort) ? ($gettingLastSortedCount->sort + 1) : 0;

    return $newSort;
}

/*
    * Function Name : excerpts
    * Purpose       : This function is to show certain words
    * Author        : Sanjay Karmakar
    * Created Date  : 30-03-2021
    * Modified date :
    * Input Params  : $text, $limit = 5
    * Return Value  : Certain words
*/
function excerpts($text, $limit = 5) {
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos   = array_keys($words);
        $text  = substr($text, 0, $pos[$limit]).'...';
    }
    return $text;
}

/*
    * Function Name : getNumbersFromString
    * Purpose       : This function is to get numbers from string
    * Author        : Sanjay Karmakar
    * Created Date  : 30-03-2021
    * Modified date :
    * Input Params  : $string
    * Return Value  : Only numbers
*/
function getNumbersFromString($string) {
    $number = '';
    if ($string) {
        $number = preg_replace('/[^0-9]/', '', $string);
    }
    return $number;
}

/*
    * Function name : singleImageUpload
    * Purpose       : This function is for image upload
    * Author        : Sanjay Karmakar
    * Created Date  : 30-03-2021
    * Modified Date : 
    * Input Params  : $modelName, $originalImage, $imageName, $uploadedFolder, $thumbImage = false,
    *                   $previousFileName = null, $unlinkStatus = false
    * Return Value  : Uploaded file name
*/
function singleImageUpload($modelName, $originalImage, $imageName, $uploadedFolder, $thumbImage = false, $previousFileName = null, $unlinkStatus = false) {
    $originalFileName   = $originalImage->getClientOriginalName();
    $extension          = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $fileName           = $imageName.'_'.strtotime(date('Y-m-d H:i:s')).'.'.$extension;
    $imageResize        = Image::make($originalImage->getRealPath());

    // Checking if folder already existed and if not create a new folder
    $directoryPath      = public_path('images/uploads/'.$uploadedFolder);
    $thumbDirectoryPath = public_path('images/uploads/'.$uploadedFolder.'/thumbs');
    if (!File::isDirectory($directoryPath)) {
        File::makeDirectory($directoryPath);    // make the directory because it doesn't exists
    }
    $imageResize->save($directoryPath.'/'.$fileName);

    if ($thumbImage) {
        if (!File::isDirectory($thumbDirectoryPath)) {
            File::makeDirectory($thumbDirectoryPath);    // make the Thumbs directory because it doesn't exists
        }

        $thumbImageWidth    = config('global.THUMB_IMAGE_WIDTH');   // Getting data from global file (global.php)
        $thumbImageHeight   = config('global.THUMB_IMAGE_HEIGHT');  // Getting data from global file (global.php)

        $imageResize->resize($thumbImageWidth[$modelName], $thumbImageHeight[$modelName], function ($constraint) {
            $constraint->aspectRatio();
        });
        $imageResize->save($thumbDirectoryPath.'/'.$fileName);
    }
    
    if ($unlinkStatus && $previousFileName != null) {
        if (file_exists($directoryPath.'/'.$previousFileName)) {
            $largeImagePath = $directoryPath.'/'.$previousFileName;
            @unlink($largeImagePath);
            if ($thumbImage) {
                $thumbImagePath = $thumbDirectoryPath.'/'.$previousFileName;
                @unlink($thumbImagePath);
            }
        }
    }
    return $fileName;
}

/*
    * Function name : singleImageUploadWithCropperTool
    * Purpose       : This function is for image upload with cropper tool
    * Author        : Sanjay Karmakar
    * Created Date  : 30-03-2021
    * Modified Date : 
    * Input Params  : $originalImage, $croppedImage = base64 format,  $imageName,
    *                   $uploadedFolder, $thumbImage = false, $previousFileName = null, $unlinkStatus = false
    * Return Value  : Uploaded file name
*/
function singleImageUploadWithCropperTool($originalImage, $croppedImage, $imageName, $uploadedFolder, $thumbImage = false, $previousFileName = null, $unlinkStatus = false) {
    $originalFileName   = $originalImage->getClientOriginalName();
    $extension          = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $fileName           = $imageName.'_'.strtotime(date('Y-m-d H:i:s')).'.'.$extension;
    $imageResize        = Image::make($originalImage->getRealPath());

    // Checking if folder already existed and if not create a new folder
    $directoryPath      = public_path('images/uploads/'.$uploadedFolder);
    $thumbDirectoryPath = public_path('images/uploads/'.$uploadedFolder.'/thumbs');
    if (!File::isDirectory($directoryPath)) {
        File::makeDirectory($directoryPath);    // make the directory because it doesn't exists
    }
    $imageResize->save($directoryPath.'/'.$fileName);

    if ($thumbImage) {
        if (!File::isDirectory($thumbDirectoryPath)) {
            File::makeDirectory($thumbDirectoryPath);    // make the Thumbs directory because it doesn't exists
        }

        // Cropped file upload
        $base64DecodedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $croppedImage));
        $uploadedPath       = $thumbDirectoryPath.'/'.$fileName;
        file_put_contents($uploadedPath, $base64DecodedImage);
    }
    
    if ($unlinkStatus && $previousFileName != null) {
        if (file_exists($directoryPath.'/'.$previousFileName)) {
            $largeImagePath = $directoryPath.'/'.$previousFileName;
            @unlink($largeImagePath);
            if ($thumbImage) {
                $thumbImagePath = $thumbDirectoryPath.'/'.$previousFileName;
                @unlink($thumbImagePath);
            }
        }
    }
    return $fileName;
}

/*
    * Function name : gallerySingleImageUpload
    * Purpose       : This function is for image upload
    * Author        : Sanjay Karmakar
    * Created Date  : 30-03-2021
    * Modified Date : 
    * Input Params  : $modelName, $originalImage, $imageName, $uploadedFolder, $albumId, $thumbImage = false,
    *                   $previousFileName = null, $unlinkStatus = false
    * Return Value  : Uploaded file name
*/
function gallerySingleImageUpload($modelName, $originalImage, $imageName, $uploadedFolder, $thumbImage = false) {
    $originalFileName   = $originalImage->getClientOriginalName();
    $extension          = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $fileName           = $imageName.'_'.rand(1000,9999).'_'.strtotime(date('Y-m-d H:i:s')).'.'.$extension;
    $imageResize        = Image::make($originalImage->getRealPath());

    // Checking if folder already existed and if not create a new folder
    $directoryPath      = public_path('images/uploads/gallery');
    $subDirectoryPath   = public_path('images/uploads/gallery/'.$uploadedFolder);
    $thumbDirectoryPath = public_path('images/uploads/gallery/'.$uploadedFolder.'/thumbs');
    if (!File::isDirectory($directoryPath)) {
        File::makeDirectory($directoryPath);        // make the main directory (gallery) because it doesn't exists
        File::makeDirectory($subDirectoryPath);    // make the directory because it doesn't exists
    }
    $imageResize->save($subDirectoryPath.'/'.$fileName);

    if ($thumbImage) {
        if (!File::isDirectory($thumbDirectoryPath)) {
            File::makeDirectory($thumbDirectoryPath);    // make the Thumbs directory because it doesn't exists
        }

        $thumbImageWidth    = config('global.THUMB_IMAGE_WIDTH');   // Getting data from global file (global.php)
        $thumbImageHeight   = config('global.THUMB_IMAGE_HEIGHT');  // Getting data from global file (global.php)

        $imageResize->resize($thumbImageWidth[$modelName], $thumbImageHeight[$modelName], function ($constraint) {
            $constraint->aspectRatio();
        });
        $imageResize->save($thumbDirectoryPath.'/'.$fileName);
    }
    return $fileName;
}

/*
    * Function name : unlinkFiles
    * Purpose       : This function is for unlinking files
    * Author        : Sanjay Karmakar
    * Created Date  : 30-03-2021
    * Modified Date : 
    * Input Params  : $fileName, $uploadedFolder, $thumbFile = false
    * Return Value  : True
*/
function unlinkFiles($fileName, $uploadedFolder, $thumbFile = false) {
    if ($fileName != '') {
        $directoryPath      = public_path('images/uploads/'.$uploadedFolder);
        $thumbDirectoryPath = public_path('images/uploads/'.$uploadedFolder.'/thumbs');
        
        if (file_exists($directoryPath.'/'.$fileName)) {
            $largeFilePath = $directoryPath.'/'.$fileName;
            @unlink($largeFilePath);
            if ($thumbFile) {
                $thumbFilePath = $thumbDirectoryPath.'/'.$fileName;
                @unlink($thumbFilePath);
            }
        }
    }    
    return true;
}

/*
    * Function name : getCurrentDateTime
    * Purpose       : This function is to get current date time
    * Author        : Sanjay Karmakar
    * Created Date  : 08-04-2021
    * Modified Date : 
    * Input Params  : 
    * Return Value  : Date and Time
*/
function getCurrentDateTime() {
    return Carbon::now()->format('Y-m-d h:i A');
}

/*
    * Function name : changeDateFormat
    * Purpose       : This function is for formatting date
    * Author        : Sanjay Karmakar
    * Created Date  : 30-03-2021
    * Modified Date : 
    * Input Params  : $fieldName, $dateFormat = false
    * Return Value  : Formatted date
*/
function changeDateFormat($fieldName, $dateFormat = false) {
    if ($dateFormat) {
        return Carbon::createFromFormat('Y-m-d H:i:s', $fieldName)->format($dateFormat);
    } else {
        return Carbon::createFromFormat('Y-m-d H:i:s', $fieldName)->format('Y-m-d H:i');
    }    
}

/*
    * Function name : changeDateFormatFromUnixTimestamp
    * Purpose       : This function is for formatting date
    * Author        : Sanjay Karmakar
    * Created Date  : 30-03-2021
    * Modified Date : 
    * Input Params  : $dateValue, $dateFormat = false
    * Return Value  : True
*/
function changeDateFormatFromUnixTimestamp($dateValue, $dateFormat = false) {
    if ($dateFormat) {
        return Carbon::createFromTimestamp($dateValue)->format($dateFormat);
    } else {
        return Carbon::createFromTimestamp($dateValue)->format('Y-m-d H:i');
    }    
}

/*
    * Function name : serviceDropdownMenu
    * Purpose       : This function is service drop down menu
    * Author        : Sanjay Karmakar
    * Created Date  : 30-03-2021
    * Modified Date : 
    * Input Params  : 
    * Return Value  : drop down structure
*/
function serviceDropdownMenu() {
    $serviceList    = [];
    $services       = Service::select('id','title')->where(['status' => '1'])->whereNull(['deleted_at'])->orderBy('sort', 'asc')->get();
    if ($services->count()) {
        foreach ($services as $serviceKey => $serviceVal) {
            $serviceList[$serviceVal->id] = $serviceVal->title;
        }
    }
    return $serviceList;
}

/*
    * Function name : generateResponseBody
    * Purpose       : This function is organize json response
    * Author        : Sanjay Karmakar
    * Created Date  : 30-03-2021
    * Modified Date : 
    * Input Params  : 
    * Return Value  : JSON response
*/
function generateResponseBody($code, $data, $responseStatus = true, $responseCode = null) {
    $result         = [];
    $collectedData  = [];
    $finalCode      = $code;

    $functionName   = null;
    
    if (strpos($code, '#') !== false) {
        $explodedCode   = explode('#',$code);
        $finalCode      = $explodedCode[0];
        $functionName   = $explodedCode[1];
    }

    $collectedData['code'] = $finalCode;
    if ($responseStatus) {
        $collectedData['status'] = Response::HTTP_OK;     // for success
    } else {
        $collectedData['status'] = $responseCode;     // for error
    }

    if (gettype($data) === 'string') {
        $collectedData['data'] = $data;
    } else if(gettype($data) === 'array' && array_key_exists('errors',$data)){
        $collectedData['data'] = implode(",",$data['errors']);
    }else {
        $collectedData['data'] = $data;
    }

    if ($functionName != null) {
        $result[$functionName] = $collectedData;
    } else {
        $result = $collectedData;
    }    

    return $result;
}
    
/*
    * Function name : replaceNulltoEmptyStringAndIntToString
    * Purpose       : This function is organize json response
    * Author        : Sanjay Karmakar
    * Created Date  : 30-03-2021
    * Modified Date : 
    * Input Params  : 
    * Return Value  : JSON response
*/
function replaceNulltoEmptyStringAndIntToString($arr) {
    array_walk_recursive($arr, function (&$item, $key) {
        $item = null === $item ? '' : $item;
        if ($key != 'id') {
            $item = (gettype($item) == 'integer' || gettype($item) == 'double') ? (string)$item : $item;
        }
        $item = self::cleanString($item);
    });
    return $arr;
}

/*
    * Function name : cleanString
    * Purpose       : This function is to remove unwanted characters
    * Author        : Sanjay Karmakar
    * Created Date  : 30-03-2021
    * Modified Date : 
    * Input Params  : $content
    * Return Value  : organized data
*/
function cleanString($content) {
    $content = preg_replace("/&#?[a-z0-9]+;/i","",$content); 
    $content = preg_replace("/[\n\r]/","",$content);
    $content = strip_tags($content);
    return $content;
}

/*
    * Function name : getEnquiryList
    * Purpose       : This function is to get enquiry list
    * Author        : Sanjay Karmakar
    * Created Date  : 08-04-2021
    * Modified Date : 
    * Input Params  : 
    * Return Value  : organized data
*/
function getEnquiryList() {
    $enquiryList = Enquiry::orderBy('id','desc')->take(5)->get();
    return $enquiryList;
}

/*
    * Function name : dayParts
    * Purpose       : This function is to get morning/afternoon/evening
    * Author        : Sanjay Karmakar
    * Created Date  : 08-04-2021
    * Modified Date : 
    * Input Params  : 
    * Return Value  : Data
*/
function dayParts() {
    if (date("H") < 12) {
        return "Good Morning";
    } elseif (date("H") > 11 && date("H") < 18) {
        return "Good Afternoon";
    } elseif (date("H") > 17) {
        return "Good Evening";
    }
}
