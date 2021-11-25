<?php
/*
    # Company Name      : Vishi Prem Workz
    # Author            : Sanjay Karmakar
    # Created Date      : 06-04-2021
    # Page/Class name   : HomeController
    # Purpose           : Api responses for frontend
*/

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use \Validator;
use App\Models\WebsiteSetting;
use App\Models\Cms;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Enquiry;
use App\Models\User;

class HomeController extends Controller
{
    /*
        * Function name : index
        * Purpose       : Api for root url
        * Author        : Sanjay Karmakar
        * Created Date  : 06-04-2021
        * Modified Date : 
        * Input Params  : 
        * Return Value  : Returns data in json format
    */
    public function index() {
        return response()->json(generateResponseBody('MWD-0001#welcome', 'Api for Montreal Webdesign'), Response::HTTP_OK);
    }

    /*
        * Function name : headerDetails
        * Purpose       : Api to get header details
        * Author        : Sanjay Karmakar
        * Created Date  : 06-04-2021
        * Modified Date : 
        * Input Params  : 
        * Return Value  : Returns data in json format like logo and other pages
    */
    public function headerDetails() {
        $data['image_source']       = 'account/';        
        $data['site_settings']      = $siteSetting = WebsiteSetting::where('id', 1)->first();
        $data['services']['list']   = Service::select('title','slug')
                                                ->where(['status' => '1'])
                                                ->whereNull('deleted_at')
                                                ->orderBy('sort','ASC')
                                                ->get();

        return response()->json(generateResponseBody('MWD-0002#header_details', $data, true), Response::HTTP_OK);
    }

    /*
        * Function name : homePageDetails
        * Purpose       : To get the home page details
        * Author        : Sanjay Karmakar
        * Created Date  : 06-04-2021
        * Modified Date : 
        * Input Params  : 
        * Return Value  : Returns home page data
    */
    public function homePageDetails() {
        $data['cms_page']['image_source'] = 'cms/';
        
        $data['cms_page']['list']       = Cms::select('title','short_title','short_description','description','other_description','banner_title','banner_short_title','banner_short_description','banner_image','featured_image','other_image')
                                                ->whereIn('id', [1,2])
                                                ->get();
        $data['service']['image_source']= 'service/';
        $data['service']['list']        = Service::select('id','title','slug','short_title','short_description','image')
                                            ->where(['is_featured' => 'Y', 'status' => '1'])
                                            ->whereNull('deleted_at')
                                            ->orderBy('sort','ASC')
                                            ->take(6)
                                            ->get();
        $portfolioList                  = Portfolio::select('id','title','slug','short_title','image')
                                                    ->with(['portfolioServiceMappingDetails'])
                                                    ->where(['is_featured' => 'Y', 'status' => '1'])
                                                    ->whereNull('deleted_at')
                                                    ->orderBy('sort','ASC')
                                                    ->get();
        $data['site_setting']           = $siteSetting = WebsiteSetting::select('website_title','phone_no','facebook_link','twitter_link','linkedin_link','address','tag_line')
                                                                        ->where('id', 1)
                                                                        ->first();
        if ($siteSetting) {
            $data['phone_number']       = getNumbersFromString($siteSetting->phone_no);
        } else {
            $data['phone_number']       = '';
        }
        $portfolio = [];
        if ($portfolioList != null) {
            foreach ($portfolioList as $keyPortfolio => $valPortfolio) {
                $portfolio[$keyPortfolio]['title']          = $valPortfolio->title;
                $portfolio[$keyPortfolio]['slug']           = $valPortfolio->slug;
                $portfolio[$keyPortfolio]['short_title']    = $valPortfolio->short_title;
                $portfolio[$keyPortfolio]['image']          = $valPortfolio->image;                
                $i = 1; $services = '';
                if ($valPortfolio->portfolioServiceMappingDetails->count()) {
                    foreach ($valPortfolio->portfolioServiceMappingDetails as $keyService => $valService) {
                        $services .= $valService->serviceTitle->title ?? null;
                        if ($i < $valPortfolio->portfolioServiceMappingDetails->count()) {
                            $services .= ', ';
                        }
                        $i++;
                    }
                }
                $portfolio[$keyPortfolio]['services']       = $services;
            }
        }
        $data['portfolio']['image_source']= 'portfolio/';
        $data['portfolio']['list']        = $portfolio;

        return response()->json(generateResponseBody('MWD-0003#home_page_details', $data, true), Response::HTTP_OK);
    }

    /*
        * Function name : enquiry
        * Purpose       : To submit the registration form
        * Author        : Sanjay Karmakar
        * Created Date  : 08-04-2021
        * Modified Date : 
        * Input Params  : Request $request
        * Return Value  : Returns success or false
    */
    public function enquiry(Request $request) {
        if ($request->isMethod('POST')) {
            $details                = new Enquiry;
            $details->name          = $request->name ?? null;
            $details->phone_number  = $request->phone_number ?? null;
            $details->email         = $request->email ?? null;
            $details->message       = $request->message ?? null;

            if ($details->save()) {
                $siteSetting = getSiteSettings();                                    
                // Mail for reset password link
                \Mail::send('emails.api.enquiry_details_to_admin',
                [
                    'details'       => $details,
                    'siteSetting'   => $siteSetting,
                ], function ($m) use ($details, $siteSetting) {
                    $m->from($siteSetting->from_email, $siteSetting->website_title);
                    $m->to($siteSetting->to_email, $siteSetting->website_title)->subject(trans('custom_admin.label_enquiry_form').' - '.$siteSetting->website_title);
                });

                $responseCode = Response::HTTP_OK;
            } else {
                $responseCode = Response::HTTP_FORBIDDEN;
            }
        } else {
            $responseCode = Response::HTTP_FORBIDDEN;
        }       
        
        return response()->json(generateResponseBody('MWD-0004#enquiry_form_details', 'Enquiry', true), Response::HTTP_OK);
    }

    /*
        * Function name : footerDetails
        * Purpose       : Api to get footer details
        * Author        : Sanjay Karmakar
        * Created Date  : 08-04-2021
        * Modified Date : 
        * Input Params  : 
        * Return Value  : Returns data in json format like logo and other pages
    */
    public function footerDetails() {
        $data['image_source']       = 'account/';        
        $data['site_settings']      = WebsiteSetting::select('website_title','facebook_link','twitter_link','linkedin_link','copyright_text','footer_logo')
                                                    ->where('id', 1)
                                                    ->first();
        $data['service']['list']    = Service::select('title','slug')
                                                ->where(['status' => '1'])
                                                ->whereNull('deleted_at')
                                                ->orderBy('sort','ASC')
                                                ->get();

        return response()->json(generateResponseBody('MWD-0005#footer_details', $data, true), Response::HTTP_OK);
    }

}
