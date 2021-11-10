<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Major extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'majors';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'major',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function majorAwpEmpDatas()
    {
        return $this->hasMany(AwpEmpData::class, 'major_id', 'id');
    }

    public function sub_certificate_types()
    {
        return $this->belongsToMany(SubCertificateType::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
