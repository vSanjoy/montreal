<?php
/*****************************************************/
# Page/Class name   : HomeController
/*****************************************************/
namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Traits\GeneralMethods;
use App\Models\Banner;

class HomeController extends Controller
{
    /*****************************************************/
    # Function name : index
    # Params        : 
    /*****************************************************/
    public function index()
    {
        $currentLang    = \App::getLocale();
        $bannerList     = Banner::where(['status' => '1'])
									->whereNull('deleted_at')
									->orderBy('sort', 'asc')->get();
        
        return view('site.home', [
            'title'         => 'Test',
            'keywords'      => 'test 1',
            'description'   => 'test 2',
            'bannerList'    => $bannerList,
            ]);
    }

    /*****************************************************/
    # Function name : pinCodeAvailability
    # Params        : Request $request
    /*****************************************************/
    public function pinCodeAvailability(Request $request)
    {
        $title              = trans('custom.error');
        $message            = trans('custom.error_unavailability');
        $type               = 'error';
        $sessionPinCodeId   = '';
        
        if ($request->isMethod('POST')) {
            $pinCode = isset($request->pinCode) ? $request->pinCode : '';            

            if ($pinCode != '') {
                $siteSettings = Helper::getSiteSettings();
                if ($siteSettings->is_shop_close == 'N') {
                    $exist = PinCode::where('code', $pinCode)->first();
                    if ($exist != null) {
                        // $sessionPinCodeId = Session::put('pincode', $pinCode);
                        // Session::put('minimum_order_amount', $exist->minimum_order_amount);

                        $pinCodeExpiryTime = isset($siteSettings->pincode_expiry_time) ? $siteSettings->pincode_expiry_time : env('COOKIE_EXPIRY_TIME');
                        
                        Cookie::queue('pincode', $pinCode, $pinCodeExpiryTime);
                        Cookie::queue('minimum_order_amount', $exist->minimum_order_amount, $pinCodeExpiryTime);
                        Cookie::queue('delivery_charge', $exist->delivery_charge, $pinCodeExpiryTime);
                        
                        $title      = trans('custom.success');
                        $message    = trans('custom.success_pin_code_available');
                        $type       = 'success';
                    }
                } else {
                    $title      = trans('custom.error');
                    $message    = trans('custom.message_we_are_not_accepting_order_now');
                    $type       = 'error';
                }
            } else {
                $title      = trans('custom.error');
                $message    = trans('custom.error_enter_pin_code');
                $type       = 'error';
            }
        }

        return json_encode([
            'title'             => $title,
            'message'           => $message,
            'type'              => $type,
            'sessionPinCodeId'  => $sessionPinCodeId,
        ]);
    }

    /*****************************************************/
    # Function name : info
    # Params        : 
    /*****************************************************/
    public function info()
    {
		$currentLang = $lang = App::getLocale();
        $cmsData = $metaData = Helper::getMetaData('cms','info');

        $availableList  = DeliverySlot::orderBy('id', 'asc')->get();
        $pinCodeList    = PinCode::where(['status' => '1'])
                                    ->orderBy('id', 'desc')
                                    ->get();

        $getCartData = Helper::getCartItemDetails();
		
		return view('site.info',[
            'title'             => $metaData['title'],
            'keyword'           => $metaData['keyword'],
            'description'       => $metaData['description'],
            'cmsData'           => $cmsData,
            'availableList'     => $availableList,
            'pinCodeList'       => $pinCodeList,
            'getCartData'       => $getCartData,
        ]);
    }

    /*****************************************************/
    # Function name : help
    # Params        : 
    /*****************************************************/
    public function help()
    {
		$currentLang = $lang = App::getLocale();
        $cmsData = $metaData = Helper::getMetaData('cms','help');

        $faqList  = Faq::where(['status' => '1'])
                        ->whereNull('deleted_at')
                        ->with([
                            'local'=> function($query) use ($currentLang) {
                                $query->where('lang_code','=', $currentLang);
                            }
                        ])
                        ->orderBy('sort', 'desc')->get();
        $helpList = Help::where(['status' => '1'])
                        ->whereNull('deleted_at')
                        ->with([
                            'local'=> function($query) use ($currentLang) {
                                $query->where('lang_code','=', $currentLang);
                            }
                        ])
                        ->orderBy('sort', 'asc')->get();

        $siteSettings = Helper::getSiteSettings();

        return view('site.help',[
            'title'         => $metaData['title'],
            'keyword'       => $metaData['keyword'],
            'description'   => $metaData['description'],
            'cmsData'       => $cmsData,
            'faqList'       => $faqList,
            'helpList'      => $helpList,
            'siteSettings'  => $siteSettings,
            ]);
    }

    /*****************************************************/
    # Function name : helpDetails
    # Params        : 
    /*****************************************************/
    public function helpDetails($id)
    {
		$currentLang = $lang = App::getLocale();
        $cmsData = $metaData = Helper::getMetaData('cms','help');

        $helpDetails = Help::where(['id' => Helper::customEncryptionDecryption($id,'decrypt')])
                        ->with([
                            'local'=> function($query) use ($currentLang) {
                                $query->where('lang_code','=', $currentLang);
                            }
                        ])
                        ->first();
        
        return view('site.help_details',[
            'title'         => $metaData['title'],
            'keyword'       => $metaData['keyword'],
            'description'   => $metaData['description'],
            'cmsData'       => $cmsData,
            'helpDetails'   => $helpDetails,
            ]);
    }

    /*****************************************************/
    # Function name : reviews
    # Params        : 
    /*****************************************************/
    public function reviews()
    {
        $getAllReviewDetails = Helper::gettingReviews();

        $currentLang = $lang = App::getLocale();
        $cmsData = $metaData = Helper::getMetaData('cms','review');

        return view('site.reviews',[
            'title'                 => $metaData['title'],
            'keyword'               => $metaData['keyword'],
            'description'           => $metaData['description'],
            'cmsData'               => $cmsData,
            'getAllReviewDetails'   => $getAllReviewDetails,
            ]);
    }
   
}