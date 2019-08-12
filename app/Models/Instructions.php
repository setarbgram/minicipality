<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructions extends Model
{
    protected $table = 'tbl_instructions';

    protected $fillable = [
        'contractID',
        'instructionID',
        'communicationID',
        'communicationDate',
        'file'
    ];

    public function getAllWorkOrders()
    {
        $orders = self::orderBy('created_at', 'DECS')->paginate(12);
        return $orders;

    }

    public function findOrder($orderId)
    {
        $order = self::where('id', $orderId)->first();
        return $order;
    }




    public function createWorkOrder($request)
    {

        $communicationDate = \App\Helper\shamsiToMiladi($request['communicationDate']);

        $order = self::create([
            "contractID" => $request['contractID'],
            "instructionID" => $request['instructionID'],
            "communicationID" => $request['communicationID'],
            "communicationDate" => $communicationDate,
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $date = date("h_i_sa");
            $fileNameHash = $file->hashName();
            $format = strtolower(strrchr($fileNameHash, '.'));

            $info = pathinfo($fileNameHash);
            $file_name = basename($fileNameHash, '.' . $info['extension']);
            $fileName = "$file_name" . "_" . "$date" . "$format";

            $file->move(public_path("/uploads/workOrders"), $fileName);

            $order->file = $fileName;

        }

        $order->save();
        return $order;
    }


    public function updateWorkOrder($request)
    {

        $communicationDate = \App\Helper\shamsiToMiladi($request['communicationDate']);

        $orderId = $request['orderId'];
        $order = self::where('id', $orderId)->first();

        $scannedFile = $request->file('file');

        if ($request->hasFile('file')) {

            $file = $order['file'];
            if (strlen($file)) {
                $path = public_path("/uploads/workOrders") . '/' . $file;
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

            $scannedFile->move(public_path("/uploads/workOrders"), $fileName);


            $order->file = $fileName;
        }
        else {
            $fileName = $order->file;
        }


        $order->update(array(
            "contractID" => $request['contractID'],
            "instructionID" => $request['instructionID'],
            "communicationID" => $request['communicationID'],
            "communicationDate" => $communicationDate,
            "file" => $fileName,

        ));

        return $order;



    }

    public function removeOrder($request)
    {

        foreach ($request['order_check'] as $orderId) {
            $order = self::where('id', $orderId)->first();
            $file = $order['file'];

            if (strlen($file)) {
                $img_path = public_path("/uploads/workOrders") . '/' . $file;
                if (file_exists($img_path)) {
                    unlink($img_path);
                }
            }


        }
        Instructions::destroy($request['order_check']); //users:name of checkbox

    }
}
