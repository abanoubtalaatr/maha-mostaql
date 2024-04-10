<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }

    public function getPriceToAttribute($value)
    {
        if($value == 0){
            return "اكثر";
        }
        return $value;
    }

    public function favoritable()
    {
        return $this->morphMany(Favorite::class, 'favoritable');
    }

    public function getStatus($value)
    {
        if($value == 1){
            return "قيد المراجعة";
        }
        elseif ($value == 2){
            return "في مرحلة تلقي العروض";
        }elseif ($value == 3){
            return "في مرحلة التنفيذ";
        }elseif($value == 4){
            return "في مرحلة التسليم";
        }elseif ($value == 5){
            return "مغلق";
        }
        return 0;
    }
}
