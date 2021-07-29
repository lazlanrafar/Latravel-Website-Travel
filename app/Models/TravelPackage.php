<?php

namespace App\Models;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TravelPackage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'location', 'about', 'featured_event', 'language',
        'food', 'departure_date', 'duration', 'type', 'price'
    ];

    protected $hidden = [

    ];

    public function galleries(){
        return $this->hasMany(Gallery::class, 'travel_package_id', 'id');
    }
}
