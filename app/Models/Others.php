<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Others extends Model
{

    protected $table = 'tbl_others';

    protected $fillable = [
        'contractID',
        'communicationID',
        'communicationDate',
        'subject',
        'file'
    ];


    public function getAllOthers()
    {
        $Others = self::orderBy('created_at', 'DECS')->paginate(12);
        return $Others;

    }

    public function findOthers($otherId)
    {
        $other = self::where('id', $otherId)->first();
        return $other;
    }

    public function createOthers($request)
    {
        $other = self::create([
            "contractID" => $request['contractID'],
            "subject" => $request['subject'],
            "communicationID" => $request['communicationID'],
            "communicationDate" => $request['communicationDate'],
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $date = date("h_i_sa");
            $fileNameHash = $file->hashName();
            $format = strtolower(strrchr($fileNameHash, '.'));

            $info = pathinfo($fileNameHash);
            $file_name = basename($fileNameHash, '.' . $info['extension']);
            $fileName = "$file_name" . "_" . "$date" . "$format";

            $file->move(public_path("/uploads/letters"), $fileName);
            $other->file = $fileName;

        }

        $other->save();
        return $other;

    }

}
