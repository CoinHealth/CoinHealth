<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Hashids\Hashids;
class Payment extends Model
{
    protected $fillable = [
        'invoice_no',
        'company_id',
        'user_id',
        'patient_id',
        'fees',
        'total_charges',
        'total_discounts',
        'patient_paid',
        'insurance_paid',
        'patient_balance_due',
        'billed_to',
        'status',
    ];

    protected $casts = [
        'fees' => 'object',
    ];

    protected $with = [
        'patient',
        'created_by',
    ];

    protected $appends = [
        'payment_status',
        'hashed_id',
    ];

    public function patient() 
    {
        return $this->belongsTo(\App\Models\Patient::class);
    }

    public function provider()
    {
        // temporary (should be in providers table)
        return $this->belongsTo(\App\Models\User::class, 'company_id');
    }

    public function created_by()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function getPaymentStatusAttribute()
    {

        switch ($this->status) {
            case 0:
                $status = 'Unpaid';
                break;
            case 1:
                $status = 'Paid';
                break;
            case 2:
                $status = 'Cancelled';
                break;
            default:
                $status = '';
                break;
        }
        return $status;

    }

    public function getHashedIdAttribute()
    {
        $hashids = new Hashids(config('services.hashid.salt'), 8);
        $id = $hashids->encode([$this->id]);
        return $id;
    }

}
