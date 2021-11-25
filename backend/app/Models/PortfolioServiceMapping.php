<?php
/*****************************************************/
# Company Name      : Vishi Prem Workz
# Author            : Sanjay Karmakar
# Created Date      : 07-04-2021
# Page/Class name   : PortfolioServiceMapping
# Purpose           : Table declaration
/*****************************************************/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioServiceMapping extends Model
{
    use HasFactory;

    public $timestamps = false;

    /*
        * Function name : serviceTitle
        * Purpose       : To get service title
        * Author        :
        * Created Date  :
        * Modified Date : 
        * Input Params  : 
        * Return Value  : 
    */
	public function serviceTitle() {
		return $this->belongsTo('App\Models\Service', 'service_id')->select('title');
	}

}
