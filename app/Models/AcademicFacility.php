<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicFacility extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'academic_facilities';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'academic_facility',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function academicFacilityAwpEmpDatas()
    {
        return $this->hasMany(AwpEmpData::class, 'academic_facility_id', 'id');
    }

    public function main_certificate_types()
    {
        return $this->belongsToMany(MainCertificateType::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
