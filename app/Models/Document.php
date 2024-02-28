<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $table = 'document';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'title_document',
        'description',
        'name_resto',
        'tahun',
    ];
}
