<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Company extends Model
{
    use HasFactory;

    public function contracted()
    {
        $clinic = Clinic::where('user_id', Auth::user()->id)->first();

        return $this->hasMany(Contracted_companies::class)->where('clinic_id', $clinic->id);
    }
}