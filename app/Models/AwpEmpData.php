<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AwpEmpData extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const LAST_CERTIFICATE_COUNTRY_RADIO = [
        '1' => 'Saudi',
        '2' => 'Other Country',
    ];

    public $table = 'awp_emp_datas';

    protected $appends = [
        'last_certificate_file',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'emp_sap_number',
        'full_name',
        'nid',
        'main_certificate_type_id',
        'sub_certificate_type_id',
        'major_id',
        'academic_facility_id',
        'last_certificate_country',
        'mobile',
        'extra',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function main_certificate_type()
    {
        return $this->belongsTo(MainCertificateType::class, 'main_certificate_type_id');
    }

    public function sub_certificate_type()
    {
        return $this->belongsTo(SubCertificateType::class, 'sub_certificate_type_id');
    }

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }

    public function academic_facility()
    {
        return $this->belongsTo(AcademicFacility::class, 'academic_facility_id');
    }

    public function getLastCertificateFileAttribute()
    {
        return $this->getMedia('last_certificate_file');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
