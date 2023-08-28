<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function imageable()
    {
        return $this->morphTo();
    }

    // public function uploadedBy(){
    //     return $this->belongsTo(User::class, 'uploaded_by');
    // }
}


// class Profile extends Model
// {

//     public function images()
//     {
//         return $this->morphMany(Image::class, 'imageable');
//     }
// }
// class ReunionReport extends Model
// {

//     public function images()
//     {
//         return $this->morphMany(Image::class, 'imageable');
//     }
// }
// class WelfareReport extends Model
// {

//     public function images()
//     {
//         return $this->morphMany(Image::class, 'imageable');
//     }
// }
// class Event extends Model
// {

//     public function images()
//     {
//         return $this->morphMany(Image::class, 'imageable');
//     }
// }
// class Gallery extends Model
// {

//     public function images()
//     {
//         return $this->morphMany(Image::class, 'imageable');
//     }
// }
// class CommitteeResulation extends Model
// {

//     public function images()
//     {
//         return $this->morphMany(Image::class, 'imageable');
//     }
// }
// class Nominee extends Model
// {

//     public function images()
//     {
//         return $this->morphMany(Image::class, 'imageable');
//     }
// }