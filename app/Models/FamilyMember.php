<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
	Panth,
	Relationship,
	BloodGroup,
	Customer,
    Surname
};

class FamilyMember extends Model
{
    use HasFactory;
    protected $table = 'family_member';

    public function panth()
    {
    	return $this->belongsTo(Panth::class, 'panth_id', 'id');
    }

    public function relationship()
    {
    	return $this->belongsTo(Relationship::class, 'relationship_id', 'id');
    }

    public function blood_group()
    {
    	return $this->belongsTo(BloodGroup::class, 'blood_group_id', 'id');
    }

    public function customer()
    {
    	return $this->belongsTo(Customer::class, 'cust_id', 'id');
    }

    public function naniyal_gautra()
    {
        return $this->belongsTo(Surname::class, 'naniyal_gautra_id', 'id');
    }
}
