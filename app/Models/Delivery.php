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
}
