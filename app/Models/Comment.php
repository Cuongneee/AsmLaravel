<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $primaryKey = 'id_comment';

    protected $fillable = [
        'content',
        'user_id',
        'shoe_id',
        'created_at',
        'updated_at',
        'active',

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

    public function shoe()
    {
        return $this->belongsTo(Shoe::class, 'shoe_id', 'id_shoe');
    }
}