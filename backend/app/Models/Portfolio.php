<?php
/*****************************************************/
# Company Name      : Vishi Prem Workz
# Author            : Sanjay Karmakar
# Created Date      : 07-04-2021
# Page/Class name   : Portfolio
# Purpose           : Table declaration
/*****************************************************/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];    // The field name inside the array is not mass-assignable

    /*
        * Function name : portfolioServiceMapping
        * Purpose       : To get portfolio services
        * Author        :
        * Created Date  :
        * Modified Date : 
        * Input Params  : 
        * Return Value  : 
    */
	public function portfolioServiceMapping() {
		return $this->hasMany('App\Models\PortfolioServiceMapping', 'portfolio_id');
	}

    /*
        * Function name : portfolioServiceMappingDetails
        * Purpose       : To get portfolio services
        * Author        :
        * Created Date  :
        * Modified Date : 
        * Input Params  : 
        * Return Value  : 
    */
	public function portfolioServiceMappingDetails() {
		return $this->hasMany('App\Models\PortfolioServiceMapping', 'portfolio_id');
	}
}
