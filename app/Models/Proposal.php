<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function getStatus($value)
    {
        if($value == 1){
            return "في انتظار القبول";
        }
        elseif ($value == 2){
            return "تم قبول العرض";
        }

        return "مستبعد";
    }
}
