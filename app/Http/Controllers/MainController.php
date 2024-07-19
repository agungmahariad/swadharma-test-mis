<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Models\{LOBModel, LOBSecondModel, LogActivityModel, RecordDataActivityModel};
use App\Http\Resources\LOBResource;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function index() 
    {
        // variable data
        $lob = LOBModel::selectRaw('lob, claim_reason, sum(amount_of_customer) as customers, sum(load_value) as total_value')
            ->groupBy('lob', 'claim_reason')
            ->get();

        LogActivityModel::create([
            'title' => 'Membuka beranda',
            'activity_date' => Carbon::now()
        ]);

        return view('dashboard', compact('lob'));
    }

    public function createLob() 
    {
        LogActivityModel::create([
            'title' => 'Membuka formulir LOB',
            'activity_date' => Carbon::now()
        ]);

        return view('create');
    }

    public function storeLob(Request $request) 
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'lob'                => 'required',
            'claim_reason'       => 'required',
            'amount_of_customer' => 'required',
            'load_value'         => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return back()->with('fail', 'Gagal menambahkan data');
        }

        // merge load_value with decimal
        $load_value = Str::remove(',', $request->load_value).".".$request->decimal;
        
        // create data
        LOBModel::create([
            'lob' => $request->lob,
            'claim_reason' => $request->claim_reason,
            'amount_of_customer' => $request->amount_of_customer,
            'load_value' => $load_value,
            'periode' => Carbon::now(),
            'sended' => false,
        ]);

        LogActivityModel::create([
            'title' => 'Menambah data LOB',
            'activity_date' => Carbon::now()
        ]);

        return redirect()->route('dashboard')->with('success', 'Berhasil menambah data');
    }

    public function sendLob() 
    {
        // variable data
        $dataLOB = LOBModel::whereIn('lob', ['KUR', 'PEN'])->where('sended', false)->get();
        $batch = RecordDataActivityModel::get()->count();
        
        // check if LOB empty
        if ($dataLOB->isEmpty()) {
            return new LOBResource(200, 'Tidak ada data yang bisa dikirim', $batch); // return with message
        } else {
            $batch += 1; // update new batch
        }

        $successCount = 0;
        $failCount = 0;
        // multiple insert data LOB
        foreach ($dataLOB as $key => $value) {
            try {
                // create data
                $response = LOBSecondModel::create([
                    'lob' => $value->lob,
                    'claim_reason' => $value->claim_reason,
                    'amount_of_customer' => $value->amount_of_customer,
                    'load_value' => $value->load_value,
                    'periode' => $value->periode,
                    'send_date' => Carbon::now()
                ]);

                // check if created
                if ($response->exists()) {
                    $value->update(['sended' => true]); // then update status sended
                    $successCount++;
                }else{
                    $failCount++;
                }
            } catch (\Throwable $th) {
                $failCount++;
            }
            
        }

        // save batch
        $this->logDataActivity($batch, $successCount, true); // save succeed batch data
        if ($failCount > 0) {
            $this->logDataActivity($batch++, $failCount, false); // save failed batch data
        }

        $batch++; // update to the next batch

        LogActivityModel::create([
            'title' => 'Mengirim data LOB KUR & PEN',
            'activity_date' => Carbon::now()
        ]);

        return new LOBResource(200, 'Berhasil menambah data', $dataLOB);
    }

    protected function logDataActivity($batch, $amountData, $status)
    {
        // create data
        RecordDataActivityModel::create([
            'batch' => $batch,
            'send_date' => Carbon::now(),
            'amount_data' => $amountData,
            'send_status' => $status
        ]);
    }
}
