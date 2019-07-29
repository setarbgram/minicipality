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

}
