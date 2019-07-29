<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{

    protected $table = 'tbl_delivery';

    protected $fillable = [
        'contractID',
        'requestID',
        'requestDate',
        'invitationID',
        'invitationDate',
        'commissionDate',
        'communicationDate',
        'communicationID',
        'deliveryType',
        'hasEstimate',
        'file1',
        'file2',
        'type',
    ];

    public function getAllTemporaryDelivery()
    {
        $Deliveries = self::where('type',0)->orderBy('created_at', 'DECS')->paginate(12);
        return $Deliveries;
    }

    public function getAllDefiniteDelivery()
    {
        $Deliveries = self::where('type',1)->orderBy('created_at', 'DECS')->paginate(12);
        return $Deliveries;
    }
}
