<?php
/*****************************************************/
# Page/Class name   : WebsiteSetting
# Purpose           : Table declaration
/*****************************************************/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    use HasFactory;

    public $timestamps    = false;

    protected $guarded    = ['id'];    // The field name inside the array is not mass-assignable
}
