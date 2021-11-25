<?php
/*****************************************************/
# Company Name      : Vishi Prem Workz
# Author            : Sanjay Karmakar
# Created Date      : 29-04-2021
# Page/Class name   : PortfolioCategory
# Purpose           : Table declaration
/*****************************************************/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PortfolioCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];    // The field name inside the array is not mass-assignable
}
