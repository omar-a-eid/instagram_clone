<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;


class Media extends Model
{
    use HasFactory;
    protected $guarded=[];
    function mediable():MorphTo{
        return $this->MorphTo();
    }
}
