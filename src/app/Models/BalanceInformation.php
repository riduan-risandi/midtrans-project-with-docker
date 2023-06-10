<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
use App\Traits\Id;

class BalanceInformation extends Model
{
    use HasFactory ,Id;
    
    protected $guarded = [];
    public function getIncrementing()
    {
        return false;
    }
 
    public function getKeyType()
    {
        return 'string';
    } 
}
