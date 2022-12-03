<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'client_id',
        'project_id',
        'title',
        'description',
        'deadline'
    ];

    public function deadline(): Attribute
    {
        return Attribute::get(
            fn ($value) => Carbon::parse($value)->format('m-d-Y')
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
