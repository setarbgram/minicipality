<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ShenasnamePeiman extends Model
{
    protected $table = 'shenasname_peimens';

    protected $fillable = ['contractTitle',
        'docNumber', 'contractNumber', 'contractDate', 'requestNumber', 'requestDate', 'commitmentNumber', 'projectId',
        'insuranceId', 'rotbe', 'managerName', 'companyName', 'companyPhone', 'companyAdd', 'workType', 'observer',
        'projectManager', 'firstPrice', 'tazminPeriod', 'contractPeriod', 'paymentType', 'gheireNaghdi', 'naghdi',
        'peinmankarChoice', 'kargozarName', 'tavafohname', 'tavafohnameDate', 'komesionMoamelatNum', 'komesionMoamelatNumDate',
        'monagheseSessionNumber', 'monagheseSessionNumberDate', 'permissionNumber', 'permissionNumberDate', 'contractTaraf',
        'scannedFile', 'privacyFile'];

    public function getAllShenase()
    {
        $shenase = self::orderBy('created_at', 'DECS')->paginate(12);
        return $shenase;
    }

    public function getAllContractID()
    {
        $contractNumbers=self::all();
        $result=[];
        foreach ($contractNumbers as $num){
            array_push($result,$num['contractNumber']);
        }
        return $result;

    }

//    public function createShenase($request)
//    {
//        $shenase = self::create([
//            "contractTitle" => $request['contractTitle'],
//            "docNumber" => $request['docNumber'],
//            "contractNumber" => $request['contractNumber'],
//            "contractDate" => $request['contractDate'],
//            "requestNumber" => $request['requestNumber'],
//            "requestDate" => $request['requestDate'],
//            "commitmentNumber" => $request['commitmentNumber'],
//            "projectId" => $request['projectId'],
//            "insuranceId" => $request['insuranceId'],
//            "rotbe" => $request['rotbe'],
//            "managerName" => $request['managerName'],
//            "companyName" => $request['companyName'],
//            "companyPhone" => $request['companyPhone'],
//            "companyAdd" => $request['companyAdd'],
//            "workType" => $request['workType'],
//            "observer" => $request['observer'],
//            "projectManager" => $request['projectManager'],
//            "firstPrice" => $request['firstPrice'],
//            "tazminPeriod" => $request['tazminPeriod'],
//            "contractPeriod" => $request['contractPeriod'],
//            "paymentType" => $request['paymentType'],
//            "gheireNaghdi" => $request['gheireNaghdi'],
//            "naghdi" => $request['naghdi'],
//            "peinmankarChoice" => $request['peinmankarChoice'],
//            "kargozarName" => $request['kargozarName'],
//            "tavafohname" => $request['tavafohname'],
//            "tavafohnameDate" => $request['tavafohnameDate'],
//            "komesionMoamelatNum" => $request['komesionMoamelatNum'],
//            "komesionMoamelatNumDate" => $request['komesionMoamelatNumDate'],
//            "monagheseSessionNumber" => $request['monagheseSessionNumber'],
//            "monagheseSessionNumberDate" => $request['monagheseSessionNumberDate'],
//            "permissionNumber" => $request['permissionNumber'],
//            "permissionNumberDate" => $request['permissionNumberDate'],
//            "contractTaraf" => $request['contractTaraf'],
//
//        ]);
//
//        if ($request->hasFile('scannedFile')) {
//            $file = $request->file('scannedFile');
//
//            $date = date("h_i_sa");
//            $fileNameHash = $file->hashName();
//            $format = strtolower(strrchr($fileNameHash, '.'));
//
//            $info = pathinfo($fileNameHash);
//            $file_name = basename($fileNameHash, '.' . $info['extension']);
//            $fileName = "$file_name" . "_" . "$date" . "$format";
//
//            $file->move(public_path("/uploads/shenaseh"), $fileName);
//
//
//            $shenase->scannedFile = $fileName;
//
//        }
//
//        if ($request->hasFile('privacyFile')) {
//            $file = $request->file('privacyFile');
//
//            $date = date("h_i_sa");
//            $fileNameHash = $file->hashName();
//            $format = strtolower(strrchr($fileNameHash, '.'));
//
//            $info = pathinfo($fileNameHash);
//            $file_name = basename($fileNameHash, '.' . $info['extension']);
//            $fileName = "$file_name" . "_" . "$date" . "$format";
//
//            $file->move(public_path("/uploads/shenaseh"), $fileName);
//
//
//            $shenase->privacyFile = $fileName;
//
//        }
//
//
//        $shenase->save();
//        return $shenase;
//
//    }

    public function findShenase($shenaseId)
    {
        $shenase = self::where('id', $shenaseId)->first();
        return $shenase;
    }



    public function createShenase($request)
    {
        $contractDate = \App\Helper\shamsiToMiladi($request['contractDate']);
        $requestDate = \App\Helper\shamsiToMiladi($request['requestDate']);
        $tavafohnameDate = \App\Helper\shamsiToMiladi($request['tavafohnameDate']);
        $komesionMoamelatNumDate = \App\Helper\shamsiToMiladi($request['komesionMoamelatNumDate']);
        $monagheseSessionNumberDate = \App\Helper\shamsiToMiladi($request['monagheseSessionNumberDate']);
        $permissionNumberDate = \App\Helper\shamsiToMiladi($request['permissionNumberDate']);


        $shenase = self::create([
            "contractTitle" => $request['contractTitle'],
            "docNumber" => $request['docNumber'],
            "contractNumber" => $request['contractNumber'],
            "contractDate" => $contractDate,
            "requestNumber" => $request['requestNumber'],
            "requestDate" => $requestDate,
            "commitmentNumber" => $request['commitmentNumber'],
            "projectId" => $request['projectId'],
            "insuranceId" => $request['insuranceId'],
            "rotbe" => $request['rotbe'],
            "managerName" => $request['managerName'],
            "companyName" => $request['companyName'],
            "companyPhone" => $request['companyPhone'],
            "companyAdd" => $request['companyAdd'],
            "workType" => $request['workType'],
            "observer" => $request['observer'],
            "projectManager" => $request['projectManager'],
            "firstPrice" => $request['firstPrice'],
            "tazminPeriod" => $request['tazminPeriod'],
            "contractPeriod" => $request['contractPeriod'],
            "paymentType" => $request['paymentType'],
            "gheireNaghdi" => $request['gheireNaghdi'],
            "naghdi" => $request['naghdi'],
            "peinmankarChoice" => $request['peinmankarChoice'],
            "kargozarName" => $request['kargozarName'],
            "tavafohname" => $request['tavafohname'],
            "tavafohnameDate" => $tavafohnameDate,
            "komesionMoamelatNum" => $request['komesionMoamelatNum'],
            "komesionMoamelatNumDate" =>   $komesionMoamelatNumDate,
            "monagheseSessionNumber" => $request['monagheseSessionNumber'],
            "monagheseSessionNumberDate" => $monagheseSessionNumberDate,
            "permissionNumber" => $request['permissionNumber'],
            "permissionNumberDate" => $permissionNumberDate,
            "contractTaraf" => $request['contractTaraf'],
        ]);
        if ($request->hasFile('scannedFile')) {
            $file = $request->file('scannedFile');

            $date = date("h_i_sa");
            $fileNameHash = $file->hashName();
            $format = strtolower(strrchr($fileNameHash, '.'));

            $info = pathinfo($fileNameHash);
            $file_name = basename($fileNameHash, '.' . $info['extension']);
            $fileName = "$file_name" . "_" . "$date" . "$format";

            $file->move(public_path("/uploads/shenaseh"), $fileName);


            $shenase->scannedFile = $fileName;

        }

        if ($request->hasFile('privacyFile')) {
            $file = $request->file('privacyFile');

            $date = date("h_i_sa");
            $fileNameHash = $file->hashName();
            $format = strtolower(strrchr($fileNameHash, '.'));

            $info = pathinfo($fileNameHash);
            $file_name = basename($fileNameHash, '.' . $info['extension']);
            $fileName = "$file_name" . "_" . "$date" . "$format";

            $file->move(public_path("/uploads/shenaseh"), $fileName);


            $shenase->privacyFile = $fileName;

        }


        $shenase->save();
        return $shenase;

    }



    public function updateShenase($request)
    {
        $contractDate = \App\Helper\shamsiToMiladi($request['contractDate']);
        $requestDate = \App\Helper\shamsiToMiladi($request['requestDate']);
        $tavafohnameDate = \App\Helper\shamsiToMiladi($request['tavafohnameDate']);
        $komesionMoamelatNumDate = \App\Helper\shamsiToMiladi($request['komesionMoamelatNumDate']);
        $monagheseSessionNumberDate = \App\Helper\shamsiToMiladi($request['monagheseSessionNumberDate']);
        $permissionNumberDate = \App\Helper\shamsiToMiladi($request['permissionNumberDate']);

        $stationId = $request['shenaseId'];
        $shenase = self::where('id', $stationId)->first();
        $shenase->update(array(
            "contractTitle" => $request['contractTitle'],
            "docNumber" => $request['docNumber'],
            "contractNumber" => $request['contractNumber'],
            "contractDate" => $contractDate,
            "requestNumber" => $request['requestNumber'],
            "requestDate" =>  $requestDate,
            "commitmentNumber" => $request['commitmentNumber'],
            "projectId" => $request['projectId'],
            "insuranceId" => $request['insuranceId'],
            "rotbe" => $request['rotbe'],
            "managerName" => $request['managerName'],
            "companyName" => $request['companyName'],
            "companyPhone" => $request['companyPhone'],
            "companyAdd" => $request['companyAdd'],
            "workType" => $request['workType'],
            "observer" => $request['observer'],
            "projectManager" => $request['projectManager'],
            "firstPrice" => $request['firstPrice'],
            "tazminPeriod" => $request['tazminPeriod'],
            "contractPeriod" => $request['contractPeriod'],
            "paymentType" => $request['paymentType'],
            "gheireNaghdi" => $request['gheireNaghdi'],
            "naghdi" => $request['naghdi'],
            "peinmankarChoice" => $request['peinmankarChoice'],
            "kargozarName" => $request['kargozarName'],
            "tavafohname" => $request['tavafohname'],
            "tavafohnameDate" => $tavafohnameDate,
            "komesionMoamelatNum" => $request['komesionMoamelatNum'],
            "komesionMoamelatNumDate" =>   $komesionMoamelatNumDate ,
            "monagheseSessionNumber" => $request['monagheseSessionNumber'],
            "monagheseSessionNumberDate" => $monagheseSessionNumberDate,
            "permissionNumber" => $request['permissionNumber'],
            "permissionNumberDate" => $permissionNumberDate,
            "contractTaraf" => $request['contractTaraf'],
        ));


        if ($request->hasfile('scannedFile')) {

            $file = $request->file('scannedFile');
            $path = $file->store('/uploads/shenaseh', 'public');
            $fileName = File::basename($path);

            $oldName = self::where('id',$stationId )->value('scannedFile');
            File::delete(public_path() . '/uploads/shenaseh/' . $oldName);

            $shenase->update(array(
                "scannedFile" => $fileName,
            ));

        }

        if ($request->hasfile('privacyFile')) {

            $file = $request->file('privacyFile');
            $path = $file->store('/uploads/shenaseh', 'public');
            $fileName = File::basename($path);

            $oldName = self::where('id', $stationId)->value('privacyFile');
            File::delete(public_path() . '/uploads/shenaseh/' . $oldName);

            $shenase->update(array(
                "privacyFile" => $fileName,
            ));

        }

        return $shenase;

    }

    public function removeShenase($request)
    {

        foreach ($request['shenase_check'] as $shenaseId) {
            $shenase = self::where('id', $shenaseId)->first();
            $scannedFile = $shenase['scannedFile'];
            $privacyFile = $shenase['privacyFile'];
            if (strlen($scannedFile)) {
                $img_path = public_path("/uploads/shenaseh") . '/' . $scannedFile;
                if (file_exists($img_path)) {
                    unlink($img_path);
                }
            }

            if (strlen($privacyFile)) {
                $img_path = public_path("/uploads/shenaseh") . '/' . $privacyFile;
                if (file_exists($img_path)) {
                    unlink($img_path);
                }
            }


        }
        ShenasnamePeiman::destroy($request['shenase_check']); //users:name of checkbox

    }

    public function checkUniqueShenaseId($request)
    {
        $contractNumber = $request['contractNumber'];
        $shenaseId = $request['shenaseId'];
        if ($shenaseId) {
            $duplicateUsername = self::where('contractNumber', $contractNumber)->first();
            if ($duplicateUsername) {
                $currentuser = self::where('id', $shenaseId)->
                where('contractNumber', $contractNumber)->first();
                if ($currentuser) {
                    return true;
                } else {
                    return 'این شماره قرارداد قبلا وارد شده است . لطفا نام کاربری دیگری وارد کنید.';
                }
            } else {
                return true;
            }
        } else {

            $duplicateUserName = ShenasnamePeiman::where('contractNumber', $contractNumber)->first();
            if ($duplicateUserName) {
                return 'این شماره قرارداد قبلا وارد شده است . لطفا نام کاربری دیگری وارد کنید.';
            } else {
                return 'true';
            }
        }
    }



}
