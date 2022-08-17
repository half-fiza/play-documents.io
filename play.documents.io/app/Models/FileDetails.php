<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileDetails extends Model
{
    use HasFactory;
    protected $table = 'api_file_details';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tool_id',
        'file_path',
        'is_deleted',
        'user_id'

    ];
}
