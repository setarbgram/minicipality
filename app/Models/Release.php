<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Release extends Model
{

    protected $table = 'tbl_release';

    protected $fillable = [
        'contractID',
        'releaseType',
        'communicationID',
        'communicationDate',
        'file',
    ];

    public function getAllReleases()
    {
        $Releases = self::orderBy('created_at', 'DECS')->paginate(12);
        return $Releases;

    }

    public function findRelease($releaseId)
    {
        $release = self::where('id', $releaseId)->first();
        return $release;
    }

    public function createRelease($request)
    {
        $release = self::create([
            "contractID" => $request['contractID'],
            "releaseType" => $request['releaseType'],
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
            $release->file = $fileName;

        }

        $release->save();
        return $release;

    }

    public function archive($activitiesID)
    {
        foreach ($activitiesID as $id) {
            $activity = self::find($id);
            $activity->delete();
        }
        return 'true';
    }

}
