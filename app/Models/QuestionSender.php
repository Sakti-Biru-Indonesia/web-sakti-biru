<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\support\Str;

class QuestionSender extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'message',
    ];

    public function getExcerptAttribute(){
      return Str::limit($this->message, 20);
    }
}
