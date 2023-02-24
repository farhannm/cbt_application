<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Exams extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'time', 'total_question', 'question_type', 'start', 'end', 'created_by'
    ];

    public function oleh() : BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
