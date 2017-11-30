<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use App\Models\Patient;
use App\Models\PatientCondition;
use App\Models\MedCondition;
use Hashids\Hashids;

class PatientProblemController extends Controller
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
        $conditions = MedCondition::all();
        $med_conditions = [];

        foreach($conditions as $condition)
        {
            array_push($med_conditions, array(
                'id' => $condition->uid,
                'name' => $condition->icd->icd9 . ' ' . $condition->name,
            ) );
        }

        $data = [
            'patient' => $patient,
            'med_conditions' => new Collection($med_conditions),
        ];
        // dd($data);
        return view('profile.patients.problems')->with($data);
    }

    // api
    public function getProblems($hashid) {
        $patient = $this->getPatient($hashid);
        $problems = $patient->conditions()->orderBy('created_at', 'desc')->get();
        return $problems;
    }


    // post
    public function store(Request $request, $hashid)
    {
        $patient = $this->getPatient($hashid);
        $data = $request->all();
        $data['patient_id'] = $patient->id;
        $data['problem_id'] = $data['problem']['id']; 
        $data['name'] = $data['problem']['name'];

        $problem = PatientCondition::create($data);

        return response()->json([
            'success' => true,
            'problem' => $problem,
        ]);
    }

    public function update(Request $request, $hashid) 
    {
        $patient = $this->getPatient($hashid);
        $data = $request->all();
        // $data['problem_id'] = $data['problem']['id']; 
        // $data['name'] = $data['problem']['name'];
        // dd($data);
        $problem = PatientCondition::find($data['id']);
        $update = $problem->update($data);
        return response()->json([
            'success' => true,
        ]);
    }

}
