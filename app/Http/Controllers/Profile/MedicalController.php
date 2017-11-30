<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

use App\Models\PatientVital;
use App\Models\PatientHabit;
use App\Models\PatientDiet;
use App\Models\PatientCaffeine;
use App\Models\PatientTobacco;
use App\Models\PatientAlcoholDrug;
use App\Models\PatientAbuse;
use App\Models\PatientStress;
use App\Models\PatientSurgery;
use App\Models\PatientQuestionnaire;
use App\Models\PatientFamilyHistory;
use App\Models\PatientAllergy;
use App\Models\PatientInjury;

class MedicalController extends Controller
{
    public function __construct()
    {
        $this->middleware('patient');
    }

    public function getIndex()
    {
        $problems = $this->getMedicalProblems();
        // dd($problems);
        return view('profile.medical.index');
    }

    public function getMedicalProblems()
    {
        // return response()->json([
        //     'patient' => auth()->user()->patient->load('vitals'),
        // ]);
        // return auth()->user()->patient;
        return response()->json([
            'patient' => auth()->user()->patient,
        ]);
    }

    public function postVitals(Request $request)
    {
        $patient = auth()->user()->patient;
        $data = $request->all();
        $data['patient_id'] = $patient->id;
        $data['customs'] = [];
        $update = $patient->update([
                'blood_type' => $data['blood_type'],
        ]);
        $save = PatientVital::create($data);
        return response()->json([
            'success' => true,
        ]);
    }

    public function postProblems(Request $request)
    {
        $patient = auth()->user()->patient;
        $data = $request->all();
        $update = $patient->update([
                'problems' => $data['problems'],
        ]);
       
        return response()->json([
            'success' => true,
        ]);
    }

    public function postHabits(Request $request)
    {
        $patient = auth()->user()->patient;
        $data = $request->all();
        $data['patient_id'] = $patient->id;
        if ($patient->habits) {
            $save = $patient->habits->update($data);
        } 
        else {
            $save = PatientHabit::create($data);
        }
        return response()->json([
            'success' => true,
        ]);
    }

    public function postDiets(Request $request)
    {
        $patient = auth()->user()->patient;
        $data = $request->all();
        $data['patient_id'] = $patient->id;
        if ($patient->diets) {
            $save = $patient->diets->update($data);
        } 
        else {
            $save = PatientDiet::create($data);
        }
        return response()->json([
            'success' => true,
        ]);
    }

    public function postCaffeine(Request $request)
    {
        $patient = auth()->user()->patient;
        $data = $request->except(['created_at', 'updated_at']);
        $data['patient_id'] = $patient->id;
        if ($patient->caffeine) {
            $update = $patient->caffeine->update($data);
        } 
        else {
            $save = PatientCaffeine::create($data);
        }
        return response()->json([
            'success' => true,
        ]);
    }

    public function postTobacco(Request $request)
    {
        $patient = auth()->user()->patient;
        $data = $request->except(['created_at', 'updated_at']);
        $data['patient_id'] = $patient->id;
        


        if ($patient->tobacco) {
            $update = $patient->tobacco->update($data);
        } 
        else {
            $save = PatientTobacco::create($data);
        }
        return response()->json([
            'success' => true,
        ]);
    }
    
    public function postAlcoholDrugs(Request $request)
    {
        $patient = auth()->user()->patient;
        $data = $request->except(['created_at', 'updated_at']);
        $data['patient_id'] = $patient->id;
        if ($patient->alcohol_drugs) {
            $update = $patient->alcohol_drugs->update($data);
        } 
        else {
            $save = PatientAlcoholDrug::create($data);
        }
        return response()->json([
            'success' => true,
        ]);
    }

    public function postAbuse(Request $request)
    {
        $patient = auth()->user()->patient;
        $data = $request->except(['created_at', 'updated_at']);
        $data['patient_id'] = $patient->id;
        if ($patient->abuse) {
            $update = $patient->abuse->update($data);
        } 
        else {
            $save = PatientAbuse::create($data);
        }
        return response()->json([
            'success' => true,
        ]);
    }

    public function postStress(Request $request)
    {
        $patient = auth()->user()->patient;
        $data = $request->except(['created_at', 'updated_at']);
        $data['patient_id'] = $patient->id;
        if ($patient->stress) {
            $update = $patient->stress->update($data);
        } 
        else {
            $save = PatientStress::create($data);
        }
        return response()->json([
            'success' => true,
        ]);
    }

    public function postSurgery(Request $request)
    {
        $patient = auth()->user()->patient;
        $data = $request->except(['created_at', 'updated_at']);
        $data['patient_id'] = $patient->id;
        if ($patient->surgeries) {
            $update = $patient->surgeries->update($data);
        } 
        else {
            $save = PatientSurgery::create($data);
        }
        return response()->json([
            'success' => true,
        ]);
    }

    public function postQuestionnaire(Request $request)
    {
        $patient = auth()->user()->patient;
        $data = $request->except(['created_at', 'updated_at']);
        $data['patient_id'] = $patient->id;
        if ($patient->questionnaire) {
            $update = $patient->questionnaire->update($data);
        } 
        else {
            $save = PatientQuestionnaire::create($data);
        }
        return response()->json([
            'success' => true,
        ]);
    }

    public function postFamilyHistory(Request $request)
    {
        $patient = auth()->user()->patient;
        $data = $request->except(['created_at', 'updated_at']);
        $data['patient_id'] = $patient->id;
        if ($patient->family_history) {
            $update = $patient->family_history->update($data);
        } 
        else {
            $save = PatientFamilyHistory::create($data);
        }
        return response()->json([
            'success' => true,
        ]);
    }

    public function addAllergy(Request $request)
    {
        $patient = auth()->user()->patient;
        $data = $request->all();
        $data['patient_id'] = $patient->id;
        $save = PatientAllergy::create($data);
        return response()->json([
            'success' => true,
            'allergy' => $save,
        ]);       
    }

    public function editAllergy(Request $request)
    {
        $patient = auth()->user()->patient;
        $data = $request->all();
        $patient = $patient->allergies()->find($data['id']);
        $update = $patient->update($data);
        // dd($patient);
        return response()->json([
            'success' => true,
            'allergy' => $update,
        ]);          
    }

    public function addInjury(Request $request)
    {
        $patient = auth()->user()->patient;
        $data = $request->all();
        $data['patient_id'] = $patient->id;
        $save = PatientInjury::create($data);
        return response()->json([
            'success' => true,
            'injury' => $save,
        ]);       
    }

    public function editInjury(Request $request)
    {
        $patient = auth()->user()->patient;
        $data = $request->all();
        $patient = $patient->injuries()->find($data['id']);
        $update = $patient->update($data);
        // dd($patient);
        return response()->json([
            'success' => true,
            'injury' => $update,
        ]);          
    }


}
