<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileDetails extends Model
{
    use HasFactory;
    protected $table = 'file_details';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tool_id',
        'api_document_path',
        'updated_by',
        'is_deleted',

    ];
}
