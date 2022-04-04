<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Hash;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Author extends Model implements HasMedia
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use InteractsWithMedia;

    public const YESNO_RADIO = [
        'yes' => 'yes',
        'no'  => 'no',
    ];

    public const MULTIPLECHOICE_SELECT = [
        'choice1' => 'choix 1',
        'choice2' => 'choix 2',
    ];

    public $table = 'authors';

    public $filterable = [
        'id',
        'name',
        'email',
        'desc',
        'yesno',
        'multiplechoice',
        'counter',
        'bignum',
        'budget',
        'birthday',
        'birthtime',
        'alarm',
    ];

    public $orderable = [
        'id',
        'name',
        'email',
        'desc',
        'yesno',
        'multiplechoice',
        'switch',
        'counter',
        'bignum',
        'budget',
        'birthday',
        'birthtime',
        'alarm',
    ];

    protected $hidden = [
        'pass',
    ];

    protected $casts = [
        'switch' => 'boolean',
    ];

    protected $appends = [
        'simplefile',
        'profilepic',
    ];

    protected $dates = [
        'birthday',
        'birthtime',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'desc',
        'pass',
        'yesno',
        'multiplechoice',
        'switch',
        'counter',
        'bignum',
        'budget',
        'birthday',
        'birthtime',
        'alarm',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $thumbnailWidth  = 50;
        $thumbnailHeight = 50;

        $thumbnailPreviewWidth  = 120;
        $thumbnailPreviewHeight = 120;

        $this->addMediaConversion('thumbnail')
            ->width($thumbnailWidth)
            ->height($thumbnailHeight)
            ->fit('crop', $thumbnailWidth, $thumbnailHeight);
        $this->addMediaConversion('preview_thumbnail')
            ->width($thumbnailPreviewWidth)
            ->height($thumbnailPreviewHeight)
            ->fit('crop', $thumbnailPreviewWidth, $thumbnailPreviewHeight);
    }

    public function setPassAttribute($input)
    {
        if ($input) {
            $this->attributes['pass'] = Hash::needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function getYesnoLabelAttribute($value)
    {
        return static::YESNO_RADIO[$this->yesno] ?? null;
    }

    public function getMultiplechoiceLabelAttribute($value)
    {
        return static::MULTIPLECHOICE_SELECT[$this->multiplechoice] ?? null;
    }

    public function getBirthdayAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setBirthdayAttribute($value)
    {
        $this->attributes['birthday'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getBirthtimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setBirthtimeAttribute($value)
    {
        $this->attributes['birthtime'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getSimplefileAttribute()
    {
        return $this->getMedia('author_simplefile')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function getProfilepicAttribute()
    {
        return $this->getMedia('author_profilepic')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();
            $media['thumbnail'] = $item->getUrl('thumbnail');
            $media['preview_thumbnail'] = $item->getUrl('preview_thumbnail');

            return $media;
        });
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
