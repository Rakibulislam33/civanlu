<?php

namespace App\Http\Controllers\Controller;
namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;


    public function location() {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function gallery() {
        return $this->hasMany(Media::class, 'property_id');
    }

}
