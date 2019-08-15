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

        $requestDate =($request['requestDate'])?\App\Helper\shamsiToMiladi($request['requestDate']):null;
        $invitationDate =($request['invitationDate'])?\App\Helper\shamsiToMiladi($request['invitationDate']):null;
        $commissionDate =($request['commissionDate'])?\App\Helper\shamsiToMiladi($request['commissionDate']):null;
        $communicationDate =($request['communicationDate'])?\App\Helper\shamsiToMiladi($request['communicationDate']):null;


        $hasEstimate=($request['dtype']==0)?-1:$request['dtype'];
        $delivery = self::create([
            "contractID" => $request['contractID'],
            "requestID" => $request['requestID'],
            "requestDate" => $requestDate,
            "invitationID" => $request['invitationID'],
            "invitationDate" => $invitationDate,
            "commissionDate" => $commissionDate,
            "communicationDate" => $communicationDate,
            "communicationID" => $request['communicationID'],
            "hasEstimate" => $hasEstimate,
            "deliveryType" => $request['deliveryType'],
            "type" => $request['dtype'],

        ]);


        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $date = date("h_i_sa");
            $fileNameHash = $file->hashName();
            $format = strtolower(strrchr($fileNameHash, '.'));

            $info = pathinfo($fileNameHash);
            $file_name = basename($fileNameHash, '.' . $info['extension']);
            $fileName = "$file_name" . "_" . "$date" . "$format";

            $file->move(public_path("/uploads/deliveryInfo"), $fileName);


            $delivery->file1 = $fileName;

        }

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


    public function updateDelivery($request)
    {

        $requestDate =($request['requestDate'])?\App\Helper\shamsiToMiladi($request['requestDate']):null;
        $invitationDate =($request['invitationDate'])?\App\Helper\shamsiToMiladi($request['invitationDate']):null;
        $commissionDate =($request['commissionDate'])?\App\Helper\shamsiToMiladi($request['commissionDate']):null;
        $communicationDate =($request['communicationDate'])?\App\Helper\shamsiToMiladi($request['communicationDate']):null;

        $hasEstimate=($request['dtype']==0)?-1:$request['dtype'];
        $deliveryId = $request['deliveryId'];
        $delivery = self::where('id', $deliveryId)->first();



        $scannedFile = $request->file('file');
        $file1 = $request->file('file1');
        $file2 = $request->file('file2');


        if ($request->hasFile('file1')) {

            $file = $delivery['file1'];
            if (strlen($file)) {
                $path = public_path("/uploads/deliveryInfo") . '/' . $file;
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            $date = date("h_i_sa");
            $fileNameHash = $file1->hashName();
            $format = strtolower(strrchr($fileNameHash, '.'));

            $info = pathinfo($fileNameHash);
            $file_name = basename($fileNameHash, '.' . $info['extension']);
            $fileName = "$file_name" . "_" . "$date" . "$format";

            $file1->move(public_path("/uploads/deliveryInfo"), $fileName);


            $delivery->file1 = $fileName;
        }
        else {
            $fileName = $delivery->file1;
        }

        if ($request->hasFile('file')) {

            $file = $delivery['file1'];
            if (strlen($file)) {
                $path = public_path("/uploads/deliveryInfo") . '/' . $file;
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            $date = date("h_i_sa");
            $fileNameHash = $scannedFile->hashName();
            $format = strtolower(strrchr($fileNameHash, '.'));

            $info = pathinfo($fileNameHash);
            $file_name = basename($fileNameHash, '.' . $info['extension']);
            $fileName = "$file_name" . "_" . "$date" . "$format";

            $scannedFile->move(public_path("/uploads/deliveryInfo"), $fileName);


            $delivery->file1 = $fileName;
        }
        else {
            $fileName = $delivery->file1;
        }


        if ($request->hasFile('file2')) {

            $file = $delivery['file2'];
            if (strlen($file)) {
                $path = public_path("/uploads/deliveryInfo") . '/' . $file;
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            $date = date("h_i_sa");
            $fileNameHash = $file2->hashName();
            $format = strtolower(strrchr($fileNameHash, '.'));

            $info = pathinfo($fileNameHash);
            $file_name = basename($fileNameHash, '.' . $info['extension']);
            $fileName = "$file_name" . "_" . "$date" . "$format";

            $file2->move(public_path("/uploads/deliveryInfo"), $fileName);


            $delivery->file2 = $fileName;
        }
        else {
            $fileName = $delivery->file2;
        }


        $delivery->update(array(
            "contractID" => $request['contractID'],
            "requestID" => $request['requestID'],
            "requestDate" => $requestDate,
            "invitationID" => $request['invitationID'],
            "invitationDate" => $invitationDate,
            "commissionDate" => $commissionDate,
            "communicationDate" => $communicationDate,
            "communicationID" => $request['communicationID'],
            "hasEstimate" => $hasEstimate,
            "deliveryType" => $request['deliveryType'],
            "type" => $delivery['type'],

        ));

        return $delivery;


    }

    public function archive($deliveriesID)
    {
        foreach ($deliveriesID as $id) {
            $delivery= self::where('id', $id)->first();
            $file1 = $delivery['file1'];
            $file2 = $delivery['file2'];
            if (strlen($file1)) {
                $img_path = public_path("/uploads/deliveryInfo") . '/' . $file1;
                if (file_exists($img_path)) {
                    unlink($img_path);
                }
            }


            if (strlen($file2)) {
                $img_path = public_path("/uploads/deliveryInfo") . '/' . $file2;
                if (file_exists($img_path)) {
                    unlink($img_path);
                }
            }
        }
        self::destroy($deliveriesID); //users:name of checkbox
    }
}
