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
    public function findDelivery($deliveryId)
    {
        $delivery = self::where('id', $deliveryId)->first();
        return $delivery;
    }


    public function createdelivery($request)
    {
        $hasEstimate=($request['dtype']==0)?-1:$request['dtype'];
        $delivery = self::create([
            "contractID" => $request['contractID'],
            "requestID" => $request['requestID'],
            "requestDate" => $request['requestDate'],
            "invitationID" => $request['invitationID'],
            "invitationDate" => $request['invitationDate'],
            "commissionDate" => $request['commissionDate'],
            "communicationDate" => $request['communicationDate'],
            "communicationID" => $request['communicationID'],
            "hasEstimate" => $hasEstimate,
            "deliveryType" => $request['deliveryType'],
            "type" => $request['dtype'],

        ]);

        if ($request->hasFile('file1')) {
            $file = $request->file('file1');

            $date = date("h_i_sa");
            $fileNameHash = $file->hashName();
            $format = strtolower(strrchr($fileNameHash, '.'));

            $info = pathinfo($fileNameHash);
            $file_name = basename($fileNameHash, '.' . $info['extension']);
            $fileName = "$file_name" . "_" . "$date" . "$format";

            $file->move(public_path("/uploads/deliveryInfo"), $fileName);


            $delivery->file1 = $fileName;

        }

        if ($request->hasFile('file2')) {
            $file = $request->file('file2');

            $date = date("h_i_sa");
            $fileNameHash = $file->hashName();
            $format = strtolower(strrchr($fileNameHash, '.'));

            $info = pathinfo($fileNameHash);
            $file_name = basename($fileNameHash, '.' . $info['extension']);
            $fileName = "$file_name" . "_" . "$date" . "$format";

            $file->move(public_path("/uploads/deliveryInfo"), $fileName);


            $delivery->file2 = $fileName;

        }


        $delivery->save();
        return $delivery;

    }
}
