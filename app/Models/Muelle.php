<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muelle extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];
}
