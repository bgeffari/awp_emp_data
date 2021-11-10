<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCertificateType extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'sub_certificate_types';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'sub_certificate_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function subCertificateTypeAwpEmpDatas()
    {
        return $this->hasMany(AwpEmpData::class, 'sub_certificate_type_id', 'id');
    }

    public function subCertificateTypeMajors()
    {
        return $this->belongsToMany(Major::class);
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
