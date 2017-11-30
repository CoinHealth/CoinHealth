<?php

namespace App\Http\Controllers\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\PatientLaboratory;
use App\Models\Attachment;
use App\Models\Location;
use App\Models\MedProcedure;
use Hashids\Hashids;
// use Input;

class PatientLaboratoryController extends Controller
{
	private $hashid;
    public function __construct()
    {
        $this->hashid = new Hashids(config('services.hashid.salt'), 10);
    }

    private function getPatient($id)
    {
        $patient = new Patient;
        $hash = $this->hashid->decode($id);
        if (count($hash))
            return $patient->find($hash[0]);
        else
            abort(404);
    }
    
    public function index($hashid)
    {
        $patient = $this->getPatient($hashid);
        $procedures = MedProcedure::all();
    	$data = [
    		'patient' => $patient,
    		'states' => Location::state()->get(),
            'procedures' => $procedures,
    	];
        return view('profile.patients.laboratory')->with($data);
    }

    // api
    public function getLabs($hashid)
    {
        $patient = $this->getPatient($hashid);
        $procedures = MedProcedure::all();
        $data = [
    		'laboratories' => $patient->laboratories()->orderBy('created_at', 'desc')->get(),
    		'procedures' => $procedures,
    	];
        return $data;
    }

    // post
    public function store(Request $request, $hashid) 
    {
        $patient = $this->getPatient($hashid);
        $data = json_decode( $request->get('form'), true );
        $data['patient_id'] = $patient->id;
        $data['uploaded_by'] = auth()->user()->id;
        $laboratory = PatientLaboratory::create($data);
        

        if ($request->hasFile('files')) {
            $files = $request->file('files');
            foreach ($files as $file) {
                $dest = '/uploads/laboratories/';
                $ext = $file->getClientOriginalExtension();
                $rnd = date('Y-m-d-H-i-s') . uniqid();
                $path = $dest . $rnd . '.' . $ext;
                $file2 =file_get_contents($file);
                // $file2 = $file2->orientate();
                $saveFile = file_put_contents( public_path( $path ) , $file2);

                $laboratory->attachments()->create([
                    'user_id' => auth()->user()->id,
                    'title' => $file->getClientOriginalName(),
                    'path' => $path,
                    'mime_type' => $file->getClientMimeType(),
                    'file_type' => 11,
                ]);
            }
        }

        return response()->json([
    		'success' => true,
    		'laboratory' => $laboratory->load('attachments'),
    	]);

    }

    public function update(Request $request, $hashid) 
    {
        $patient = $this->getPatient($hashid);
        $data = $request->all();
        $data['patient_id'] = $patient->id;
        $laboratory = PatientLaboratory::find($data['id']);
        $update = $laboratory->update($data);
        return response()->json([
            'success' => true,
        ]);
    }

}
