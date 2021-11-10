<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MainCertificateType extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'main_certificate_types';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'certificate_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function mainCertificateTypeAwpEmpDatas()
    {
        return $this->hasMany(AwpEmpData::class, 'main_certificate_type_id', 'id');
    }

    public function mainCertificateTypeSubCertificateTypes()
    {
        return $this->belongsToMany(SubCertificateType::class);
    }

    public function mainCertificateTypeAcademicFacilities()
    {
        return $this->belongsToMany(AcademicFacility::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
