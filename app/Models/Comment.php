<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable =
    [
        'comment','name','date','product_id,display,reply_comment_id'
    ];
    protected $table = 'comments';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
