<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReunionReport extends Model
{
    use HasFactory;
    protected $table = "reunion_reports";
    protected $guarded = [];

    public function payment(){
        return $this->morphOne(Payment::class, 'paymentable');
    }
}
