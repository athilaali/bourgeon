<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferToken extends Model
{
    use HasFactory;

    protected $table="refer_tokens";

    protected $fillable = ['from_user_email', 'to_user_email', 'refer_token'];

}
