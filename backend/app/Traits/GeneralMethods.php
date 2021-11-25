<?php
/*****************************************************/
# Purpose : for global use
/*****************************************************/

namespace App\Traits;

trait GeneralMethods
{
    /*
        * Function Name : assignBreadcrumb
        * Purpose       : Assign breadcrumb
        * Author        : 
        * Created Date  : 
        * Modified date :          
        * Input Params  : Void
        * Return Value  : Mixed
    */
    public function assignBreadcrumb() {
        $this->breadcrumb = $breadcrumb = [
            'LISTPAGE' =>
            [
                ['label' => $this->management . ' '.trans('custom_admin.label_list'), 'url' => '']
            ],
            'CREATEPAGE' =>
            [
                ['label' => $this->management . ' '.trans('custom_admin.label_list'), 'url' => $this->listUrl ? \URL::route($this->routePrefix.'.'.$this->listUrl) : ''],
                ['label' => trans('custom_admin.label_add'), 'url' => '']
            ],
            'EDITPAGE' =>
            [
                ['label' => $this->management . ' '.trans('custom_admin.label_list'), 'url' => $this->listUrl ? \URL::route($this->routePrefix.'.'.$this->listUrl) : ''],
                ['label' => trans('custom_admin.label_edit'), 'url' => '']
            ],
            'VIEWPAGE' =>
            [
                ['label' => $this->management . ' '.trans('custom_admin.label_list'), 'url' => $this->listUrl ? \URL::route($this->routePrefix.'.'.$this->listUrl) : ''],
                ['label' => $this->management . ' '.trans('custom_admin.label_view'), 'url' => '']
            ],
            'SORTPAGE' =>
            [
                ['label' => $this->management . ' '.trans('custom_admin.label_list'), 'url' => $this->listUrl ? \URL::route($this->routePrefix.'.'.$this->listUrl) : ''],
                ['label' => trans('custom_admin.label_sort'), 'url' => '']
            ],
            'DETAILPAGE' =>
            [
                ['label' => $this->management . ' '.trans('custom_admin.label_list'), 'url' => $this->listUrl ? \URL::route($this->routePrefix.'.'.$this->listUrl) : ''],
                ['label' => $this->management . ' '.trans('custom_admin.label_details'), 'url' => '']
            ],
            'GALLERYPAGE' =>
            [
                ['label' => $this->management . ' '.trans('custom_admin.label_list'), 'url' => $this->listUrl ? \URL::route($this->routePrefix.'.'.$this->listUrl) : ''],
                ['label' => trans('custom_admin.label_gallery'), 'url' => '']
            ],
            // 'CHANGEPASSWORDPAGE' =>
            // [
            //     ['label' => $this->management . ' List', 'url' => $this->listUrl ? \URL::route($this->listUrl) : ''],
            //     ['label' => $this->management . ' Change Password', 'url' => 'THIS']
            // ]
        ];
    }


    /*
        * Function Name : assignShareVariables
        * Purpose       : Assign common variable to use in views
        * Author        : 
        * Created Date  : 
        * Modified date :          
        * Input Params  : Void
        * Return Value  : Mixed
    */
    public function assignShareVariables() {
        \View::share([
            'management'    => $this->management,
            'modelName'     => $this->modelName,
            'breadcrumb'    => $this->breadcrumb,
            'routePrefix'   => $this->routePrefix,
            'pageRoute'     => $this->pageRoute,
            'urlPrefix'     => $this->urlPrefix ?? '',
            'listUrl'       => $this->listUrl ?? '',
            'listRequestUrl'=> $this->listRequestUrl ?? '',
            'addUrl'        => $this->addUrl ?? '',
            'editUrl'       => $this->editUrl ?? '',
            'viewUrl'       => $this->viewUrl ?? '',
            'statusUrl'     => $this->statusUrl ?? '',
            'deleteUrl'     => $this->deleteUrl ?? '',
            'sortUrl'       => $this->sortUrl ?? '',
            'detailsUrl'    => $this->detailsUrl ?? '',
            'galleryListUrl'=> $this->galleryListUrl ?? '',
            'controllerName'=> $this->controllerName
        ]);
        // // Declare variables as per current method
        // if (\Route::current()->getActionMethod() == 'index') {
        //     \View::share(['pageType' => 'List']);
        // } elseif (\Route::current()->getActionMethod() == 'add') {
        //     \View::share(['pageType' => 'Add']);
        // } elseif (\Route::current()->getActionMethod() == 'edit') {
        //     \View::share(['pageType' => 'Edit']);
        // } elseif (\Route::current()->getActionMethod() == 'import' || \Route::current()->getActionMethod() == 'storecsv') {
        //     \View::share(['pageType' => 'List']);
        // } elseif (\Route::current()->getActionMethod() == 'view') {
        //     \View::share(['pageType' => 'View']);
        // } elseif (\Route::current()->getActionMethod() == 'changePassword') {
        //     \View::share(['pageType' => 'Change Password']);
        // }
    }

}
