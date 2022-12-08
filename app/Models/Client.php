<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\MediaCollections\File;

class Client extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'contact_name',
        'contact_phone_number',
        'contact_email',
        'company_name',
        'company_address',
        'company_city',
        'company_zip',
        'company_vat'
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(36)
            ->height(36)
            ->sharpen(10);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logos')
            ->useFallbackUrl('storage/default-logo/anonymous-client.jpg');
    }

    public function scopeIsActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function projects()
    {
        return $this->hasMany('projects');
    }
}
