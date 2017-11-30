<?php

use Illuminate\Database\Seeder;
use App\Models\MedProcedure;
use Hashids\Hashids;

class MedProceduresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // MedProcedure::truncate();

	    $data = [
	        [
	            "id"=> 1,
	            "name"=> "Abdominal hysterectomy (remove uterus)"
	        ],
	        [
	            "id"=> 530,
	            "name"=> "Abdominal pelvic CT (CAT) scan with dye"
	        ],
	        [
	            "id"=> 529,
	            "name"=> "Abdominal pelvic CT (CAT) scan without intravenous dye"
	        ],
	        [
	            "id"=> 2,
	            "name"=> "Abdominal ultrasound (imaging procedure)"
	        ],
	        [
	            "id"=> 467,
	            "name"=> "AC joint separation repair (acromioclavicular, shoulder joint repair)"
	        ],
	        [
	            "id"=> 271,
	            "name"=> "Acetaminophen (Tylenol) level"
	        ],
	        [
	            "id"=> 3,
	            "name"=> "ACTH stimulation test (evaluate adrenal glands)"
	        ],
	        [
	            "id"=> 272,
	            "name"=> "Activated partial thromboplastin (PTT)"
	        ],
	        [
	            "id"=> 4,
	            "name"=> "Adenoidectomy (removal of adenoids)"
	        ],
	        [
	            "id"=> 273,
	            "name"=> "Air contrast enema (x-ray study of the colon)"
	        ],
	        [
	            "id"=> 274,
	            "name"=> "Allergy testing"
	        ],
	        [
	            "id"=> 660,
	            "name"=> "Alveoloplasty"
	        ],
	        [
	            "id"=> 5,
	            "name"=> "Amniocentesis (sample amniotic fluid)"
	        ],
	        [
	            "id"=> 6,
	            "name"=> "Amputation (remove limb)"
	        ],
	        [
	            "id"=> 276,
	            "name"=> "Analysis of joint fluid (synovial fluid)"
	        ],
	        [
	            "id"=> 7,
	            "name"=> "Anastomosis (connect two structures)"
	        ],
	        [
	            "id"=> 277,
	            "name"=> "Androgen (male sex hormone)"
	        ],
	        [
	            "id"=> 8,
	            "name"=> "Anesthesia (make numb or unconscious)"
	        ],
	        [
	            "id"=> 364,
	            "name"=> "Angiogram, arm (x-ray of upper extremity blood vessels)"
	        ],
	        [
	            "id"=> 523,
	            "name"=> "Angiogram, leg (x-ray of lower extremity blood vessels)"
	        ],
	        [
	            "id"=> 9,
	            "name"=> "Angiography (x-ray blood vessels)"
	        ],
	        [
	            "id"=> 10,
	            "name"=> "Angioplasty (open blocked artery)"
	        ],
	        [
	            "id"=> 278,
	            "name"=> "Anoscopy (tube to view the anus, rectum)"
	        ],
	        [
	            "id"=> 380,
	            "name"=> "Anterior cervical corpectomy (removal of neck bone, disc)"
	        ],
	        [
	            "id"=> 453,
	            "name"=> "Anterior cervical discectomy (neck disc surgery)"
	        ],
	        [
	            "id"=> 373,
	            "name"=> "Anterior cervical fusion (neck fusion)"
	        ],
	        [
	            "id"=> 645,
	            "name"=> "Anterior cruciate ligament (ACL) reconstruction"
	        ],
	        [
	            "id"=> 376,
	            "name"=> "Anterior lumbar interbody fusion (ALIF, fusion of back bones)"
	        ],
	        [
	            "id"=> 377,
	            "name"=> "Anterior posterior spinal fusion (fusion of front, back of spine)"
	        ],
	        [
	            "id"=> 279,
	            "name"=> "Antibody (immune system blood test)"
	        ],
	        [
	            "id"=> 11,
	            "name"=> "Antibody therapy for cancer (kill tumor cells)"
	        ],
	        [
	            "id"=> 275,
	            "name"=> "Antinuclear antibody (ANA, blood test for autoimmune disease)"
	        ],
	        [
	            "id"=> 280,
	            "name"=> "Aortography (x-ray of aorta)"
	        ],
	        [
	            "id"=> 696,
	            "name"=> "Apicoectomy"
	        ],
	        [
	            "id"=> 12,
	            "name"=> "Appendectomy (remove appendix)"
	        ],
	        [
	            "id"=> 270,
	            "name"=> "Arterial blood gas (ABG, analysis of arterial blood)"
	        ],
	        [
	            "id"=> 13,
	            "name"=> "Arteriography (x-ray arteries)"
	        ],
	        [
	            "id"=> 281,
	            "name"=> "Arthrocentesis (joint fluid removal)"
	        ],
	        [
	            "id"=> 580,
	            "name"=> "Arthrodesis (joint fusion)"
	        ],
	        [
	            "id"=> 390,
	            "name"=> "Arthrography (x-ray of joint)"
	        ],
	        [
	            "id"=> 396,
	            "name"=> "Arthroplasty (joint surgery)"
	        ],
	        [
	            "id"=> 400,
	            "name"=> "Arthroscopic surgery (joint surgery using camera)"
	        ],
	        [
	            "id"=> 14,
	            "name"=> "Arthroscopy (joint examination using camera)"
	        ],
	        [
	            "id"=> 15,
	            "name"=> "Aspiration (remove fluid with a needle)"
	        ],
	        [
	            "id"=> 282,
	            "name"=> "Aspirin (salicylate) level"
	        ],
	        [
	            "id"=> 505,
	            "name"=> "Audiology test (hearing test)"
	        ],
	        [
	            "id"=> 16,
	            "name"=> "Autologous bone marrow transplantation (use patient's own bone marrow)"
	        ],
	        [
	            "id"=> 283,
	            "name"=> "B12 test (blood test for vitamin)"
	        ],
	        [
	            "id"=> 534,
	            "name"=> "Back MRI without dye"
	        ],
	        [
	            "id"=> 17,
	            "name"=> "Balloon angioplasty (open artery)"
	        ],
	        [
	            "id"=> 408,
	            "name"=> "Bankart procedure (shoulder stabilization surgery)"
	        ],
	        [
	            "id"=> 261,
	            "name"=> "Bariatric surgery (weight loss surgery)"
	        ],
	        [
	            "id"=> 18,
	            "name"=> "Barium enema (lower GI series, x-ray colon)"
	        ],
	        [
	            "id"=> 19,
	            "name"=> "Barium swallow (upper GI series, x-ray upper GI tract)"
	        ],
	        [
	            "id"=> 643,
	            "name"=> "Basic metabolic panel (BMP, Chem-7)"
	        ],
	        [
	            "id"=> 284,
	            "name"=> "Beta human chorionic gonadotropin (BHCG, pregnancy hormone)"
	        ],
	        [
	            "id"=> 20,
	            "name"=> "Biological therapy (immune system modification to treat disease)"
	        ],
	        [
	            "id"=> 21,
	            "name"=> "Biopsy (remove cells or tissue)"
	        ],
	        [
	            "id"=> 285,
	            "name"=> "Bladder biopsy (bladder sample)"
	        ],
	        [
	            "id"=> 286,
	            "name"=> "Bleeding time (clotting blood test)"
	        ],
	        [
	            "id"=> 22,
	            "name"=> "Blepharoplasty (eye lift)"
	        ],
	        [
	            "id"=> 287,
	            "name"=> "Blood alcohol level (ethanol level)"
	        ],
	        [
	            "id"=> 493,
	            "name"=> "Blood cell count (reticulocyte count)"
	        ],
	        [
	            "id"=> 288,
	            "name"=> "Blood culture (test for infection in blood)"
	        ],
	        [
	            "id"=> 593,
	            "name"=> "Blood pressure screening"
	        ],
	        [
	            "id"=> 289,
	            "name"=> "Blood smear (microscopic blood evaluation)"
	        ],
	        [
	            "id"=> 362,
	            "name"=> "Blood test for heart damage (troponin test)"
	        ],
	        [
	            "id"=> 23,
	            "name"=> "Blood transfusion (replace blood)"
	        ],
	        [
	            "id"=> 291,
	            "name"=> "Blood type"
	        ],
	        [
	            "id"=> 621,
	            "name"=> "Blood type, screen, and crossmatch"
	        ],
	        [
	            "id"=> 423,
	            "name"=> "Blue light acne treatment (light therapy)"
	        ],
	        [
	            "id"=> 688,
	            "name"=> "Bonding"
	        ],
	        [
	            "id"=> 24,
	            "name"=> "Bone density scan (test of bone strength)"
	        ],
	        [
	            "id"=> 407,
	            "name"=> "Bone grafting (bone replacement)"
	        ],
	        [
	            "id"=> 678,
	            "name"=> "Bone Grafts (Dental)"
	        ],
	        [
	            "id"=> 25,
	            "name"=> "Bone marrow biopsy (bone marrow sample)"
	        ],
	        [
	            "id"=> 26,
	            "name"=> "Bone marrow transplantation (replace bone marrow)"
	        ],
	        [
	            "id"=> 27,
	            "name"=> "Bone scan (image of bones)"
	        ],
	        [
	            "id"=> 391,
	            "name"=> "Bone scintigraphy (bone scan)"
	        ],
	        [
	            "id"=> 28,
	            "name"=> "Botox injections (skin injection of small amount of toxin)"
	        ],
	        [
	            "id"=> 290,
	            "name"=> "Botulism toxin assay (blood test to diagnose botulism)"
	        ],
	        [
	            "id"=> 29,
	            "name"=> "Brachytherapy (cancer treatment)"
	        ],
	        [
	            "id"=> 566,
	            "name"=> "Brain CT (CAT) scan with dye"
	        ],
	        [
	            "id"=> 565,
	            "name"=> "Brain CT (CAT) scan without dye"
	        ],
	        [
	            "id"=> 564,
	            "name"=> "Brain CTA (CT angiogram)"
	        ],
	        [
	            "id"=> 532,
	            "name"=> "Brain MRI (magnetic resonance imaging) with and without dye"
	        ],
	        [
	            "id"=> 560,
	            "name"=> "Brain MRI with dye"
	        ],
	        [
	            "id"=> 561,
	            "name"=> "Brain MRI without dye"
	        ],
	        [
	            "id"=> 292,
	            "name"=> "Brain natriuretic peptide (BNP, blood test for heart failure)"
	        ],
	        [
	            "id"=> 339,
	            "name"=> "Brazilian butt lift (cosmetic buttocks surgery)"
	        ],
	        [
	            "id"=> 30,
	            "name"=> "Breast augmentation or enlargement (implant)"
	        ],
	        [
	            "id"=> 541,
	            "name"=> "Breast biopsy (breast tissue removal)"
	        ],
	        [
	            "id"=> 34,
	            "name"=> "Breast conserving surgery (removal of part of the breast)"
	        ],
	        [
	            "id"=> 31,
	            "name"=> "Breast implant removal"
	        ],
	        [
	            "id"=> 32,
	            "name"=> "Breast lift (mastopexy)"
	        ],
	        [
	            "id"=> 33,
	            "name"=> "Breast reduction (reduction mammaplasty)"
	        ],
	        [
	            "id"=> 536,
	            "name"=> "Breast ultrasound"
	        ],
	        [
	            "id"=> 596,
	            "name"=> "Breathing treatment with nebulizer"
	        ],
	        [
	            "id"=> 35,
	            "name"=> "Bronchoscopy (camera images of lung)"
	        ],
	        [
	            "id"=> 477,
	            "name"=> "Bunionectomy (surgical removal of bunion)"
	        ],
	        [
	            "id"=> 340,
	            "name"=> "Buttocks lift"
	        ],
	        [
	            "id"=> 36,
	            "name"=> "Bypass (create new pathway for blood)"
	        ],
	        [
	            "id"=> 454,
	            "name"=> "C section (surgical delivery of baby)"
	        ],
	        [
	            "id"=> 293,
	            "name"=> "Caloric stimulation (test of ear and brain connection)"
	        ],
	        [
	            "id"=> 590,
	            "name"=> "Camp physical"
	        ],
	        [
	            "id"=> 651,
	            "name"=> "Cancer antigen 125 (CA-125)"
	        ],
	        [
	            "id"=> 37,
	            "name"=> "Capsule endoscopy (camera in a swallowed capsule)"
	        ],
	        [
	            "id"=> 294,
	            "name"=> "Carboxyhemoglobin level (carbon monoxide blood test)"
	        ],
	        [
	            "id"=> 38,
	            "name"=> "Cardiac catheterization (heart artery pictures)"
	        ],
	        [
	            "id"=> 295,
	            "name"=> "Cardiac event monitor (recording of heart's electrical activity)"
	        ],
	        [
	            "id"=> 268,
	            "name"=> "Cardiopulmonary resuscitation (CPR)"
	        ],
	        [
	            "id"=> 39,
	            "name"=> "Cardioversion (convert to normal heart rhythm)"
	        ],
	        [
	            "id"=> 40,
	            "name"=> "Carotid endarterectomy (unclog carotid artery)"
	        ],
	        [
	            "id"=> 41,
	            "name"=> "Carotid ultrasound exam (neck artery imaging)"
	        ],
	        [
	            "id"=> 394,
	            "name"=> "Carpal tunnel release (mini open technique, wrist nerve)"
	        ],
	        [
	            "id"=> 360,
	            "name"=> "Carpal tunnel surgery  (open release surgery, wrist nerve)"
	        ],
	        [
	            "id"=> 42,
	            "name"=> "Castration (removal of testicles or ovaries)"
	        ],
	        [
	            "id"=> 43,
	            "name"=> "Cataract surgery (remove cataract from eye)"
	        ],
	        [
	            "id"=> 44,
	            "name"=> "Catheterization (insertion of hollow tube)"
	        ],
	        [
	            "id"=> 45,
	            "name"=> "Cauterization (stops bleeding)"
	        ],
	        [
	            "id"=> 46,
	            "name"=> "Celioscopy (camera exam of abdominal cavity)"
	        ],
	        [
	            "id"=> 47,
	            "name"=> "Central line placement (place large IV into a vein)"
	        ],
	        [
	            "id"=> 48,
	            "name"=> "Cerebral angiography (brain blood vessel images)"
	        ],
	        [
	            "id"=> 297,
	            "name"=> "Cervical culture (test for infection in female organ)"
	        ],
	        [
	            "id"=> 369,
	            "name"=> "Cervical discectomy (neck disc surgery)"
	        ],
	        [
	            "id"=> 576,
	            "name"=> "Cervical facet joint injection (neck joint injection for pain)"
	        ],
	        [
	            "id"=> 557,
	            "name"=> "Cervical spine CT with dye (neck CAT scan)"
	        ],
	        [
	            "id"=> 556,
	            "name"=> "Cervical spine CT without dye (neck CAT scan)"
	        ],
	        [
	            "id"=> 552,
	            "name"=> "Cervical spine MRI with dye (neck MRI)"
	        ],
	        [
	            "id"=> 549,
	            "name"=> "Cervical spine MRI without dye (neck MRI)"
	        ],
	        [
	            "id"=> 49,
	            "name"=> "Cesarean section (surgical delivery of baby)"
	        ],
	        [
	            "id"=> 298,
	            "name"=> "Chem-12 (comprehensive metabolic panel, blood test)"
	        ],
	        [
	            "id"=> 50,
	            "name"=> "Chemical peel (improve texture of facial skin)"
	        ],
	        [
	            "id"=> 51,
	            "name"=> "Chemoembolization (treatment for liver cancer)"
	        ],
	        [
	            "id"=> 52,
	            "name"=> "Chemotherapy (cancer treatment)"
	        ],
	        [
	            "id"=> 527,
	            "name"=> "Chest CT (CAT) scan with dye"
	        ],
	        [
	            "id"=> 528,
	            "name"=> "Chest CT (CAT) scan without dye"
	        ],
	        [
	            "id"=> 563,
	            "name"=> "Chest MRI with dye"
	        ],
	        [
	            "id"=> 562,
	            "name"=> "Chest MRI without dye"
	        ],
	        [
	            "id"=> 633,
	            "name"=> "Chest x-ray"
	        ],
	        [
	            "id"=> 587,
	            "name"=> "Chicken pox (varicella) vaccine"
	        ],
	        [
	            "id"=> 53,
	            "name"=> "Chin implant (change shape of chin)"
	        ],
	        [
	            "id"=> 54,
	            "name"=> "Cholecystectomy (remove gallbladder)"
	        ],
	        [
	            "id"=> 336,
	            "name"=> "Cholesterol (HDL, LDL, blood fat tests)"
	        ],
	        [
	            "id"=> 55,
	            "name"=> "Chorionic villus sampling or CVS (detects birth defects)"
	        ],
	        [
	            "id"=> 299,
	            "name"=> "Clotting studies (blood clot tests)"
	        ],
	        [
	            "id"=> 343,
	            "name"=> "Cochlear implant (implanted hearing device)"
	        ],
	        [
	            "id"=> 641,
	            "name"=> "Cold agglutinins"
	        ],
	        [
	            "id"=> 56,
	            "name"=> "Colectomy (remove large intestine)"
	        ],
	        [
	            "id"=> 300,
	            "name"=> "Colon biopsy (tissue sample large intestine)"
	        ],
	        [
	            "id"=> 57,
	            "name"=> "Colonoscopy (large intestine camera exam)"
	        ],
	        [
	            "id"=> 58,
	            "name"=> "Colostomy (colon attached to abdominal wall)"
	        ],
	        [
	            "id"=> 59,
	            "name"=> "Colposcopy (examination of cervix)"
	        ],
	        [
	            "id"=> 60,
	            "name"=> "Combination chemotherapy (cancer treatment)"
	        ],
	        [
	            "id"=> 302,
	            "name"=> "Compartment pressure measurement (measures inner muscle pressure)"
	        ],
	        [
	            "id"=> 458,
	            "name"=> "Complete blood count (CBC)"
	        ],
	        [
	            "id"=> 62,
	            "name"=> "Complete hysterectomy (remove uterus)"
	        ],
	        [
	            "id"=> 455,
	            "name"=> "Comprehensive metabolic panel (CMP, blood test)"
	        ],
	        [
	            "id"=> 63,
	            "name"=> "Computed tomography (CT or CAT scan)"
	        ],
	        [
	            "id"=> 459,
	            "name"=> "Computed tomography angiogram (CTA, CT image of arteries)"
	        ],
	        [
	            "id"=> 65,
	            "name"=> "Cone biopsy (sample of cervix)"
	        ],
	        [
	            "id"=> 301,
	            "name"=> "Coombs test (test for autoimmune cause of anemia)"
	        ],
	        [
	            "id"=> 649,
	            "name"=> "Core biopsy"
	        ],
	        [
	            "id"=> 66,
	            "name"=> "Coronary angiogram (x-ray heart arteries)"
	        ],
	        [
	            "id"=> 67,
	            "name"=> "Coronary angioplasty (unclog heart arteries)"
	        ],
	        [
	            "id"=> 460,
	            "name"=> "Coronary artery bypass graft (CABG, surgery to improve heart blood flow)"
	        ],
	        [
	            "id"=> 68,
	            "name"=> "Coronary artery bypass operation (bypass blocked heart artery)"
	        ],
	        [
	            "id"=> 498,
	            "name"=> "Corticotropin releasing hormone test (CRH test, blood test)"
	        ],
	        [
	            "id"=> 504,
	            "name"=> "Cortisol (24 hour urine test of hormone level)"
	        ],
	        [
	            "id"=> 338,
	            "name"=> "Cosmetic cheek surgery (cheek implant)"
	        ],
	        [
	            "id"=> 337,
	            "name"=> "Cosmetic ear surgery (otoplasty)"
	        ],
	        [
	            "id"=> 69,
	            "name"=> "Craniotomy (hole in the head)"
	        ],
	        [
	            "id"=> 662,
	            "name"=> "Crown Lengthening"
	        ],
	        [
	            "id"=> 70,
	            "name"=> "Cryosurgery (freeze tissue)"
	        ],
	        [
	            "id"=> 71,
	            "name"=> "Cryotherapy (cold treatment)"
	        ],
	        [
	            "id"=> 303,
	            "name"=> "CSF culture (test for infection in brain fluid)"
	        ],
	        [
	            "id"=> 304,
	            "name"=> "CT angiogram of the neck (x-ray images of neck)"
	        ],
	        [
	            "id"=> 72,
	            "name"=> "CT or CAT scan (computed tomography)"
	        ],
	        [
	            "id"=> 73,
	            "name"=> "Curettage (remove tissue)"
	        ],
	        [
	            "id"=> 74,
	            "name"=> "Cystectomy (remove bladder)"
	        ],
	        [
	            "id"=> 358,
	            "name"=> "Cystometrogram (CMG, bladder function test)"
	        ],
	        [
	            "id"=> 75,
	            "name"=> "Cystoscopy (camera examination of the bladder)"
	        ],
	        [
	            "id"=> 353,
	            "name"=> "Cystoscopy with retrograde pyelography (x-ray evaluation of urinary system)"
	        ],
	        [
	            "id"=> 305,
	            "name"=> "D-Dimer (blood test for blood clots )"
	        ],
	        [
	            "id"=> 76,
	            "name"=> "Da Vinci Robotic Surgery (minimally invasive robotic surgery)"
	        ],
	        [
	            "id"=> 370,
	            "name"=> "Decompression laminectomy (removal of back of spinal bones)"
	        ],
	        [
	            "id"=> 379,
	            "name"=> "Deep Brain Stimulation (DBS, electrode implantation in brain)"
	        ],
	        [
	            "id"=> 77,
	            "name"=> "Defibrillation (start normal heart rhythm using electricity)"
	        ],
	        [
	            "id"=> 710,
	            "name"=> "Dental Implants"
	        ],
	        [
	            "id"=> 698,
	            "name"=> "Dental Sealants"
	        ],
	        [
	            "id"=> 79,
	            "name"=> "Dermabrasion (refinish skin)"
	        ],
	        [
	            "id"=> 345,
	            "name"=> "Deviated septum (septoplasty)"
	        ],
	        [
	            "id"=> 306,
	            "name"=> "Dexamethasone suppression test (blood test for hormonal abnormality)"
	        ],
	        [
	            "id"=> 600,
	            "name"=> "Diabetes screening"
	        ],
	        [
	            "id"=> 80,
	            "name"=> "Dialysis (filter and clean blood)"
	        ],
	        [
	            "id"=> 502,
	            "name"=> "Dialysis catheter insertion"
	        ],
	        [
	            "id"=> 81,
	            "name"=> "Diathermy (cauterization)"
	        ],
	        [
	            "id"=> 82,
	            "name"=> "Digital rectal examination (finger examination of rectum)"
	        ],
	        [
	            "id"=> 83,
	            "name"=> "Dilation and curettage (D and C, tissue removal inside uterus)"
	        ],
	        [
	            "id"=> 539,
	            "name"=> "Diphtheria, tetanus and pertussis vaccine (DTaP, Tdap and Td)"
	        ],
	        [
	            "id"=> 378,
	            "name"=> "Disc replacement (spinal disc replacement)"
	        ],
	        [
	            "id"=> 84,
	            "name"=> "Discectomy (remove herniated disk)"
	        ],
	        [
	            "id"=> 404,
	            "name"=> "Disk removal (spinal disk removal)"
	        ],
	        [
	            "id"=> 307,
	            "name"=> "Dix Hallpike maneuver (test for vertigo)"
	        ],
	        [
	            "id"=> 308,
	            "name"=> "Doppler ultrasound (ultrasound for blood vessels)"
	        ],
	        [
	            "id"=> 309,
	            "name"=> "Drug screen"
	        ],
	        [
	            "id"=> 85,
	            "name"=> "Ductal lavage (collect cells from milk ducts in breast)"
	        ],
	        [
	            "id"=> 597,
	            "name"=> "Ear wax removal"
	        ],
	        [
	            "id"=> 86,
	            "name"=> "Echocardiography (ultrasound of the heart, echocardiogram)"
	        ],
	        [
	            "id"=> 87,
	            "name"=> "Electrocardiogram (EKG or ECG, recording of heart electricity)"
	        ],
	        [
	            "id"=> 88,
	            "name"=> "Electroencephalogram (EEG, recording of brain electricity)"
	        ],
	        [
	            "id"=> 392,
	            "name"=> "Electromyogram (EMG, recording of muscle electricity)"
	        ],
	        [
	            "id"=> 90,
	            "name"=> "Electron beam computed tomography (Coronary calcium heart scan)"
	        ],
	        [
	            "id"=> 91,
	            "name"=> "Electronystagmogram (electronystagmography, ENG, inner ear test)"
	        ],
	        [
	            "id"=> 92,
	            "name"=> "Embolization (block an artery)"
	        ],
	        [
	            "id"=> 450,
	            "name"=> "Embryo cryopreservation (freezing and storage)"
	        ],
	        [
	            "id"=> 595,
	            "name"=> "Employment physical"
	        ],
	        [
	            "id"=> 93,
	            "name"=> "Endocrine therapy (hormone therapy)"
	        ],
	        [
	            "id"=> 427,
	            "name"=> "Endoluminal gastroplication (ELGP, minimally invasive GERD treatment)"
	        ],
	        [
	            "id"=> 94,
	            "name"=> "Endometrial ablation (remove lining of uterus)"
	        ],
	        [
	            "id"=> 310,
	            "name"=> "Endometrial biopsy (uterine biopsy)"
	        ],
	        [
	            "id"=> 367,
	            "name"=> "Endoscopic carpal tunnel surgery (minimally invasive wrist surgery)"
	        ],
	        [
	            "id"=> 481,
	            "name"=> "Endoscopic plantar fasciotomy (minimally invasive foot surgery)"
	        ],
	        [
	            "id"=> 95,
	            "name"=> "Endoscopic retrograde cholangiopancreatography (ERCP)"
	        ],
	        [
	            "id"=> 96,
	            "name"=> "Endoscopic ultrasound (internal imaging procedure)"
	        ],
	        [
	            "id"=> 97,
	            "name"=> "Endoscopy (flexible tube with camera)"
	        ],
	        [
	            "id"=> 98,
	            "name"=> "Enema (insertion of liquid into rectum)"
	        ],
	        [
	            "id"=> 99,
	            "name"=> "Epidural block (spinal cord anesthesia)"
	        ],
	        [
	            "id"=> 389,
	            "name"=> "Epidural steroid injection (ESI, injection into space around spinal cord)"
	        ],
	        [
	            "id"=> 100,
	            "name"=> "Episiotomy (vaginal incision during childbirth)"
	        ],
	        [
	            "id"=> 312,
	            "name"=> "Erythrocyte sedimentation rate (ESR, blood test for inflammation )"
	        ],
	        [
	            "id"=> 311,
	            "name"=> "Esophageal manometry (esophageal pressure measurement)"
	        ],
	        [
	            "id"=> 428,
	            "name"=> "Esophageal pH test (measurement of esophageal acid)"
	        ],
	        [
	            "id"=> 101,
	            "name"=> "Esophagogastroduodenoscopy (EGD, camera examination of upper digestive tract)"
	        ],
	        [
	            "id"=> 102,
	            "name"=> "Esophagoscopy (camera examination of esophagus)"
	        ],
	        [
	            "id"=> 103,
	            "name"=> "Esophagram (x-ray images of esophagus)"
	        ],
	        [
	            "id"=> 104,
	            "name"=> "Excisional biopsy (removal of tissue for evaluation)"
	        ],
	        [
	            "id"=> 266,
	            "name"=> "Exercise stress test (heart test during exercise)"
	        ],
	        [
	            "id"=> 105,
	            "name"=> "External beam radiation (radiation cancer treatment)"
	        ],
	        [
	            "id"=> 106,
	            "name"=> "Extracorporeal shock wave lithotripsy (noninvasive kidney stone treatment)"
	        ],
	        [
	            "id"=> 107,
	            "name"=> "Facelift (rhytidectomy)"
	        ],
	        [
	            "id"=> 577,
	            "name"=> "Facet joint injection (spinal injection for pain)"
	        ],
	        [
	            "id"=> 531,
	            "name"=> "Facial CT (CAT) scan without dye"
	        ],
	        [
	            "id"=> 635,
	            "name"=> "Fasting blood sugar (glucose)"
	        ],
	        [
	            "id"=> 432,
	            "name"=> "Fecal fat (stool fat measurement)"
	        ],
	        [
	            "id"=> 108,
	            "name"=> "Fecal occult blood test (blood in stool)"
	        ],
	        [
	            "id"=> 313,
	            "name"=> "Fibrin degradation products (blood test for clotting disorder)"
	        ],
	        [
	            "id"=> 109,
	            "name"=> "Fine needle aspiration (needle biopsy)"
	        ],
	        [
	            "id"=> 413,
	            "name"=> "Finger reattachment"
	        ],
	        [
	            "id"=> 429,
	            "name"=> "Flexible sigmoidoscopy (camera examination of colon)"
	        ],
	        [
	            "id"=> 581,
	            "name"=> "Flu (influenza) vaccine"
	        ],
	        [
	            "id"=> 314,
	            "name"=> "Fluorescein staining of cornea (eye)"
	        ],
	        [
	            "id"=> 690,
	            "name"=> "Fluoride Treatments and Supplements"
	        ],
	        [
	            "id"=> 110,
	            "name"=> "Fluoroscopy (x-ray videos of body)"
	        ],
	        [
	            "id"=> 315,
	            "name"=> "Follicle stimulating hormone (FSH, female hormone blood test)"
	        ],
	        [
	            "id"=> 371,
	            "name"=> "Foraminotomy (spinal nerve decompression)"
	        ],
	        [
	            "id"=> 111,
	            "name"=> "Forehead lift (plastic surgery of face)"
	        ],
	        [
	            "id"=> 664,
	            "name"=> "Frenectomy"
	        ],
	        [
	            "id"=> 112,
	            "name"=> "Fulguration (remove tissue with electric current)"
	        ],
	        [
	            "id"=> 113,
	            "name"=> "Functional magnetic resonance imaging (fMRI, MRI that measures brain activity)"
	        ],
	        [
	            "id"=> 316,
	            "name"=> "Fungal culture (test to detect fungus)"
	        ],
	        [
	            "id"=> 613,
	            "name"=> "Fungal test (KOH Prep)"
	        ],
	        [
	            "id"=> 440,
	            "name"=> "Gamete intrafallopian transfer (GIFT, infertility treatment)"
	        ],
	        [
	            "id"=> 265,
	            "name"=> "Gamma knife radiosurgery (noninvasive brain surgery)"
	        ],
	        [
	            "id"=> 406,
	            "name"=> "Ganglion cyst removal"
	        ],
	        [
	            "id"=> 114,
	            "name"=> "Gastrectomy (surgical removal of stomach)"
	        ],
	        [
	            "id"=> 262,
	            "name"=> "Gastric banding (stomach stapling)"
	        ],
	        [
	            "id"=> 115,
	            "name"=> "Gene therapy (use of DNA to treat disease)"
	        ],
	        [
	            "id"=> 116,
	            "name"=> "General anesthesia (make unconscious)"
	        ],
	        [
	            "id"=> 117,
	            "name"=> "Genetic testing (analyze DNA)"
	        ],
	        [
	            "id"=> 666,
	            "name"=> "Gingival Flap Surgery"
	        ],
	        [
	            "id"=> 668,
	            "name"=> "Gingivectomy and Gingivoplasty"
	        ],
	        [
	            "id"=> 317,
	            "name"=> "Glucose tolerance test (diabetes screening test)"
	        ],
	        [
	            "id"=> 444,
	            "name"=> "Gradient sperm washing, filtration and improvement (infertility treatment)"
	        ],
	        [
	            "id"=> 118,
	            "name"=> "Grading (cancer classification system)"
	        ],
	        [
	            "id"=> 609,
	            "name"=> "Gram Stain"
	        ],
	        [
	            "id"=> 356,
	            "name"=> "GreenLight PVPTM (Photo-selective Vaporization of the Prostate, laser)"
	        ],
	        [
	            "id"=> 348,
	            "name"=> "Grommet insertion (eardrum tube insertion)"
	        ],
	        [
	            "id"=> 347,
	            "name"=> "Grommet removal (eardrum tube removal)"
	        ],
	        [
	            "id"=> 680,
	            "name"=> "Gum Graft"
	        ],
	        [
	            "id"=> 652,
	            "name"=> "H. pylori blood antibody test"
	        ],
	        [
	            "id"=> 607,
	            "name"=> "Haemophilus influenza type B (Hib) vaccine"
	        ],
	        [
	            "id"=> 119,
	            "name"=> "Hair replacement (transplantation)"
	        ],
	        [
	            "id"=> 478,
	            "name"=> "Hammer toe repair"
	        ],
	        [
	            "id"=> 318,
	            "name"=> "Haptoglobin (measure of red blood cell destruction)"
	        ],
	        [
	            "id"=> 456,
	            "name"=> "HDL cholesterol (high-density lipoprotein, good cholesterol)"
	        ],
	        [
	            "id"=> 526,
	            "name"=> "Head CT (CAT scan)"
	        ],
	        [
	            "id"=> 594,
	            "name"=> "Health screening"
	        ],
	        [
	            "id"=> 120,
	            "name"=> "Helical computed tomography (CT scan)"
	        ],
	        [
	            "id"=> 670,
	            "name"=> "Hemisection"
	        ],
	        [
	            "id"=> 503,
	            "name"=> "Hemodialysis (filter and clean blood)"
	        ],
	        [
	            "id"=> 319,
	            "name"=> "Hemoglobin A1C (Hb A1C, measures blood glucose over time)"
	        ],
	        [
	            "id"=> 121,
	            "name"=> "Hemorrhoidectomy (remove hemorrhoid)"
	        ],
	        [
	            "id"=> 547,
	            "name"=> "Hep lock (saline lock, IV catheter)"
	        ],
	        [
	            "id"=> 583,
	            "name"=> "Hepatitis A vaccine"
	        ],
	        [
	            "id"=> 584,
	            "name"=> "Hepatitis B vaccine"
	        ],
	        [
	            "id"=> 320,
	            "name"=> "Hepatitis profile (viral hepatitis blood test)"
	        ],
	        [
	            "id"=> 122,
	            "name"=> "Herniorrhaphy (hernia repair)"
	        ],
	        [
	            "id"=> 321,
	            "name"=> "HIDA scan (hepatobiliary iminodiacetic acid scan, gallbladder function test)"
	        ],
	        [
	            "id"=> 399,
	            "name"=> "Hip arthroplasty (hip replacement)"
	        ],
	        [
	            "id"=> 410,
	            "name"=> "Hip osteotomy (hip joint reshaping)"
	        ],
	        [
	            "id"=> 411,
	            "name"=> "Hip revision surgery (artificial hip joint repair)"
	        ],
	        [
	            "id"=> 322,
	            "name"=> "HLA B27 (human leukocyte antigen B27, immune system blood test)"
	        ],
	        [
	            "id"=> 323,
	            "name"=> "Holter monitor (portable heart monitor)"
	        ],
	        [
	            "id"=> 123,
	            "name"=> "Hormone replacement therapy (post-menopausal hormone therapy or HRT)"
	        ],
	        [
	            "id"=> 582,
	            "name"=> "HPV (human papiloma virus) vaccine"
	        ],
	        [
	            "id"=> 324,
	            "name"=> "HSV culture (herpes simplex virus)"
	        ],
	        [
	            "id"=> 430,
	            "name"=> "Hydrogen breath test (test for bacterial overgrowth)"
	        ],
	        [
	            "id"=> 124,
	            "name"=> "Hyperthermic perfusion (late stage cancer treatment)"
	        ],
	        [
	            "id"=> 125,
	            "name"=> "Hysterectomy (removal of the uterus)"
	        ],
	        [
	            "id"=> 436,
	            "name"=> "Hysterosalpingography (x-ray of uterus and fallopian tubes)"
	        ],
	        [
	            "id"=> 325,
	            "name"=> "Hysteroscopy (camera examination of the uterus)"
	        ],
	        [
	            "id"=> 127,
	            "name"=> "ICD implantation (implant to monitor heart rhythm)"
	        ],
	        [
	            "id"=> 128,
	            "name"=> "Ileostomy (external opening to the small intestine)"
	        ],
	        [
	            "id"=> 129,
	            "name"=> "Immunization (shots)"
	        ],
	        [
	            "id"=> 130,
	            "name"=> "Immunosuppressant (reduce immune system response)"
	        ],
	        [
	            "id"=> 131,
	            "name"=> "Immunotherapy (modify immune system)"
	        ],
	        [
	            "id"=> 132,
	            "name"=> "Implant radiation (implant radioactive material)"
	        ],
	        [
	            "id"=> 438,
	            "name"=> "In vitro fertilization (IVF, infertility treatment)"
	        ],
	        [
	            "id"=> 133,
	            "name"=> "Incisional biopsy (remove cells or tissue)"
	        ],
	        [
	            "id"=> 134,
	            "name"=> "Infusion (into the bloodstream)"
	        ],
	        [
	            "id"=> 542,
	            "name"=> "Inguinal hernia repair (groin hernia surgery)"
	        ],
	        [
	            "id"=> 135,
	            "name"=> "Inguinal orchiectomy (remove testicle through groin)"
	        ],
	        [
	            "id"=> 692,
	            "name"=> "Inlays and Onlays"
	        ],
	        [
	            "id"=> 441,
	            "name"=> "Intra cytoplasmic sperm injection (ICSI, infertility treatment)"
	        ],
	        [
	            "id"=> 136,
	            "name"=> "Intramuscular injection (into a muscle)"
	        ],
	        [
	            "id"=> 579,
	            "name"=> "Intrauterine device (IUD, birth control device )"
	        ],
	        [
	            "id"=> 437,
	            "name"=> "Intrauterine insemination (IUI, infertility treatment)"
	        ],
	        [
	            "id"=> 137,
	            "name"=> "Intravenous (IV, through the vein)"
	        ],
	        [
	            "id"=> 138,
	            "name"=> "Intravenous pyelography IVP (x-rays of kidneys, ureters and bladder)"
	        ],
	        [
	            "id"=> 139,
	            "name"=> "Intubation (insert breathing tube)"
	        ],
	        [
	            "id"=> 611,
	            "name"=> "Iron level"
	        ],
	        [
	            "id"=> 140,
	            "name"=> "Irradiation (radiation treatment)"
	        ],
	        [
	            "id"=> 326,
	            "name"=> "Joint fluid analysis (synovial fluid analysis)"
	        ],
	        [
	            "id"=> 397,
	            "name"=> "Joint fusion (arthrodesis)"
	        ],
	        [
	            "id"=> 141,
	            "name"=> "Joint replacement surgery"
	        ],
	        [
	            "id"=> 142,
	            "name"=> "Keratectomy (remove tissue from eye)"
	        ],
	        [
	            "id"=> 143,
	            "name"=> "Keratotomy (incision on the cornea)"
	        ],
	        [
	            "id"=> 327,
	            "name"=> "Ketones (fat breakdown measurement)"
	        ],
	        [
	            "id"=> 398,
	            "name"=> "Knee arthroplasty (knee replacement)"
	        ],
	        [
	            "id"=> 546,
	            "name"=> "Knee arthroscopy (camera knee joint examination)"
	        ],
	        [
	            "id"=> 412,
	            "name"=> "Knee revision surgery (artificial knee joint repair)"
	        ],
	        [
	            "id"=> 415,
	            "name"=> "Kneecap removal (patellectomy)"
	        ],
	        [
	            "id"=> 349,
	            "name"=> "KUB (x-ray of abdomen)"
	        ],
	        [
	            "id"=> 267,
	            "name"=> "Kyphoplasty (spinal fracture treatment)"
	        ],
	        [
	            "id"=> 144,
	            "name"=> "Laboratory test (lab work)"
	        ],
	        [
	            "id"=> 145,
	            "name"=> "Laceration repair (stitches)"
	        ],
	        [
	            "id"=> 328,
	            "name"=> "Lactate (blood test for lactic acid)"
	        ],
	        [
	            "id"=> 433,
	            "name"=> "Lactose tolerance test (test for lactose intolerance)"
	        ],
	        [
	            "id"=> 146,
	            "name"=> "Laminectomy (remove back of vertebrae)"
	        ],
	        [
	            "id"=> 147,
	            "name"=> "Laminoplasty (remove pressure from spinal cord in neck)"
	        ],
	        [
	            "id"=> 148,
	            "name"=> "Laminotomy (make hole in back of vertebrae)"
	        ],
	        [
	            "id"=> 403,
	            "name"=> "Laparoscopic banding (weight loss surgery)"
	        ],
	        [
	            "id"=> 149,
	            "name"=> "Laparoscopic cholecystectomy (minimally invasive gallbladder removal)"
	        ],
	        [
	            "id"=> 543,
	            "name"=> "Laparoscopic vaginal hysterectomy (minimally invasive uterus removal)"
	        ],
	        [
	            "id"=> 150,
	            "name"=> "Laparoscopy (camera examination inside abdomen)"
	        ],
	        [
	            "id"=> 151,
	            "name"=> "Laparotomy  (surgically open the abdomen)"
	        ],
	        [
	            "id"=> 152,
	            "name"=> "Laryngoscopy (camera examination inside throat)"
	        ],
	        [
	            "id"=> 153,
	            "name"=> "Laser (concentrated light therapy)"
	        ],
	        [
	            "id"=> 154,
	            "name"=> "Laser skin resurfacing (cosmetic procedure)"
	        ],
	        [
	            "id"=> 155,
	            "name"=> "Laser treatment of  spider veins"
	        ],
	        [
	            "id"=> 156,
	            "name"=> "LASIK (reshape cornea)"
	        ],
	        [
	            "id"=> 457,
	            "name"=> "LDL cholesterol (low-density lipoprotein, bad cholesterol)"
	        ],
	        [
	            "id"=> 417,
	            "name"=> "Leg lengthening and shortening"
	        ],
	        [
	            "id"=> 157,
	            "name"=> "Lip augmentation (enlarge lips)"
	        ],
	        [
	            "id"=> 330,
	            "name"=> "Lipase (pancreatic blood test)"
	        ],
	        [
	            "id"=> 159,
	            "name"=> "Liposuction (lipoplasty, fat removal)"
	        ],
	        [
	            "id"=> 160,
	            "name"=> "Lithotripsy (shock wave therapy for kidney stones)"
	        ],
	        [
	            "id"=> 431,
	            "name"=> "Liver biopsy (liver tissue removal)"
	        ],
	        [
	            "id"=> 161,
	            "name"=> "Lobectomy (removal of part of an organ)"
	        ],
	        [
	            "id"=> 706,
	            "name"=> "Local Anesthesia"
	        ],
	        [
	            "id"=> 162,
	            "name"=> "Loop electrosurgical excision procedure (LEEP, surgical tissue removal from cervix)"
	        ],
	        [
	            "id"=> 163,
	            "name"=> "Lower body lift (body recontouring)"
	        ],
	        [
	            "id"=> 574,
	            "name"=> "Lower extremity CT scan with dye (leg CAT scan)"
	        ],
	        [
	            "id"=> 573,
	            "name"=> "Lower extremity CT scan without dye (leg CAT scan)"
	        ],
	        [
	            "id"=> 568,
	            "name"=> "Lower extremity joint MRI with dye (leg MRI)"
	        ],
	        [
	            "id"=> 535,
	            "name"=> "Lower extremity joint MRI without dye (leg MRI)"
	        ],
	        [
	            "id"=> 164,
	            "name"=> "Lower GI series (barium enema)"
	        ],
	        [
	            "id"=> 555,
	            "name"=> "Lumbar CT scan with dye (lower back CAT scan)"
	        ],
	        [
	            "id"=> 554,
	            "name"=> "Lumbar CT scan without dye (lower back CAT scan)"
	        ],
	        [
	            "id"=> 388,
	            "name"=> "Lumbar facet joint injection (low back joint injection for pain)"
	        ],
	        [
	            "id"=> 387,
	            "name"=> "Lumbar facet rhizotomy (deadening of spinal nerves with heat)"
	        ],
	        [
	            "id"=> 372,
	            "name"=> "Lumbar fusion (surgical fusion of lower spine vertebrae)"
	        ],
	        [
	            "id"=> 551,
	            "name"=> "Lumbar MRI with dye (lower back MRI)"
	        ],
	        [
	            "id"=> 548,
	            "name"=> "Lumbar MRI without dye (lower back MRI)"
	        ],
	        [
	            "id"=> 165,
	            "name"=> "Lumbar puncture (spinal tap)"
	        ],
	        [
	            "id"=> 464,
	            "name"=> "Lumbar sympathetic block (lower back injection for pain)"
	        ],
	        [
	            "id"=> 166,
	            "name"=> "Lumpectomy (surgery to remove tumor from breast)"
	        ],
	        [
	            "id"=> 329,
	            "name"=> "Luteinizing hormone (LH, pituitary gland hormone measurement)"
	        ],
	        [
	            "id"=> 331,
	            "name"=> "Lymph node biopsy (remove sample of lymph node)"
	        ],
	        [
	            "id"=> 167,
	            "name"=> "Lymphadenectomy (remove lymph node)"
	        ],
	        [
	            "id"=> 168,
	            "name"=> "Lymphangiography (diagnose lymphoma)"
	        ],
	        [
	            "id"=> 169,
	            "name"=> "Magnetic resonance angiography (MRA, MRI image of arteries)"
	        ],
	        [
	            "id"=> 333,
	            "name"=> "Magnetic resonance cholangiopancreatography (MRCP, MRI image of bile ducts)"
	        ],
	        [
	            "id"=> 170,
	            "name"=> "Magnetic resonance imaging (MRI)"
	        ],
	        [
	            "id"=> 171,
	            "name"=> "Mammogram (x-ray of the breast)"
	        ],
	        [
	            "id"=> 172,
	            "name"=> "Mastectomy (remove breast)"
	        ],
	        [
	            "id"=> 540,
	            "name"=> "Measles, mumps, rubella vaccine (MMR)"
	        ],
	        [
	            "id"=> 463,
	            "name"=> "Medial branch block (spinal nerve block)"
	        ],
	        [
	            "id"=> 173,
	            "name"=> "Mediastinoscopy (view space between lungs and heart)"
	        ],
	        [
	            "id"=> 601,
	            "name"=> "Medication renewal"
	        ],
	        [
	            "id"=> 585,
	            "name"=> "Meningitis (meningococcal) vaccine"
	        ],
	        [
	            "id"=> 424,
	            "name"=> "Microcurrent facial (non-invasive electrical face lift)"
	        ],
	        [
	            "id"=> 381,
	            "name"=> "Microdiscectomy (removal of small portion of disk, bone in spine)"
	        ],
	        [
	            "id"=> 451,
	            "name"=> "Micromanipulation (assisted fertilization)"
	        ],
	        [
	            "id"=> 445,
	            "name"=> "Microsurgical epididymal sperm aspiration (MESA, surgical sperm removal)"
	        ],
	        [
	            "id"=> 174,
	            "name"=> "Microwave therapy (destroy tissue with heat)"
	        ],
	        [
	            "id"=> 422,
	            "name"=> "Mohs micrographic surgery (skin cancer removal surgery)"
	        ],
	        [
	            "id"=> 672,
	            "name"=> "Molar Uprighting"
	        ],
	        [
	            "id"=> 332,
	            "name"=> "Mono spot (blood test for mononucleosis)"
	        ],
	        [
	            "id"=> 264,
	            "name"=> "Myectomy surgery (removal of muscle)"
	        ],
	        [
	            "id"=> 176,
	            "name"=> "Myelogram (dye injected into the spinal canal)"
	        ],
	        [
	            "id"=> 177,
	            "name"=> "Myolysis (shrink uterine growths)"
	        ],
	        [
	            "id"=> 178,
	            "name"=> "Myomectomy (surgical removal of uterine growths)"
	        ],
	        [
	            "id"=> 344,
	            "name"=> "Myringotomy and tympanostomy (ear tubes)"
	        ],
	        [
	            "id"=> 567,
	            "name"=> "Neck CTA (CT image of neck arteries)"
	        ],
	        [
	            "id"=> 533,
	            "name"=> "Neck MRI without dye"
	        ],
	        [
	            "id"=> 395,
	            "name"=> "Needle aponeurotomy (minimally invasive treatment of bent fingers)"
	        ],
	        [
	            "id"=> 179,
	            "name"=> "Needle biopsy (remove fluid or tissue sample with a needle)"
	        ],
	        [
	            "id"=> 180,
	            "name"=> "Nephrectomy (remove kidney)"
	        ],
	        [
	            "id"=> 181,
	            "name"=> "Nerve block (block pain)"
	        ],
	        [
	            "id"=> 479,
	            "name"=> "Neuroma excision (surgical removal of a swollen nerve)"
	        ],
	        [
	            "id"=> 182,
	            "name"=> "Neurosurgery (surgery of the nervous system)"
	        ],
	        [
	            "id"=> 704,
	            "name"=> "Nitrous Oxide"
	        ],
	        [
	            "id"=> 334,
	            "name"=> "Noninvasive vascular assessment (NIVA, ultrasound of blood vessels)"
	        ],
	        [
	            "id"=> 183,
	            "name"=> "Nuclear medicine scan (scan with injected radioactive substances)"
	        ],
	        [
	            "id"=> 184,
	            "name"=> "Oophorectomy (remove ovaries)"
	        ],
	        [
	            "id"=> 185,
	            "name"=> "Open heart surgery (cardiac surgery)"
	        ],
	        [
	            "id"=> 682,
	            "name"=> "Osseous Surgery"
	        ],
	        [
	            "id"=> 186,
	            "name"=> "Ostomy (opening in body)"
	        ],
	        [
	            "id"=> 187,
	            "name"=> "Ovarian ablation (shut down ovaries)"
	        ],
	        [
	            "id"=> 188,
	            "name"=> "Palliative therapy (care given to improve quality of life)"
	        ],
	        [
	            "id"=> 189,
	            "name"=> "Pancreaticoduodenectomy (remove pancreas and duodenum)"
	        ],
	        [
	            "id"=> 486,
	            "name"=> "Panorex (dental x-ray of upper and lower jaw)"
	        ],
	        [
	            "id"=> 190,
	            "name"=> "Pap test (screening exam for cervical cancer)"
	        ],
	        [
	            "id"=> 191,
	            "name"=> "Patient controlled anesthesia (PCA pump, self-administered pain pump)"
	        ],
	        [
	            "id"=> 487,
	            "name"=> "Peak expiratory flow rate (PEFR, measurement of airflow through lungs)"
	        ],
	        [
	            "id"=> 192,
	            "name"=> "Pelvic laparoscopy (camera examination inside lower abdomen)"
	        ],
	        [
	            "id"=> 537,
	            "name"=> "Pelvic ultrasound"
	        ],
	        [
	            "id"=> 382,
	            "name"=> "Percutaneous discectomy (minimally invasive removal of spinal disk)"
	        ],
	        [
	            "id"=> 383,
	            "name"=> "Percutaneous endoscopic laser discectomy (minimally invasive laser removal of spinal disk)"
	        ],
	        [
	            "id"=> 384,
	            "name"=> "Percutaneous pedicle screws (minimally invasive spinal stabilization)"
	        ],
	        [
	            "id"=> 193,
	            "name"=> "Percutaneous transhepatic cholangiography (PTC, x-ray of the bile ducts)"
	        ],
	        [
	            "id"=> 194,
	            "name"=> "Percutaneous transluminal coronary angioplasty (PTCA, minimally invasive therapy to open up blocked heart arteries)"
	        ],
	        [
	            "id"=> 501,
	            "name"=> "Peritoneal dialysis (blood filtering)"
	        ],
	        [
	            "id"=> 195,
	            "name"=> "PET CT scan (positron emission tomography and computed tomography)"
	        ],
	        [
	            "id"=> 197,
	            "name"=> "Photodynamic therapy (PDT, cancer therapy using light)"
	        ],
	        [
	            "id"=> 198,
	            "name"=> "Photorefractive keratectomy (remove surface layer of cornea)"
	        ],
	        [
	            "id"=> 524,
	            "name"=> "PICC line (long term IV catheter)"
	        ],
	        [
	            "id"=> 480,
	            "name"=> "Plantar fasciotomy (surgical cutting of foot ligament)"
	        ],
	        [
	            "id"=> 196,
	            "name"=> "Plasmapheresis (replacement of the liquid in blood)"
	        ],
	        [
	            "id"=> 491,
	            "name"=> "Platelet aggregation test (blood clotting test)"
	        ],
	        [
	            "id"=> 586,
	            "name"=> "Pneumococcal (pneumonia) vaccine"
	        ],
	        [
	            "id"=> 199,
	            "name"=> "Pneumonectomy (remove lung)"
	        ],
	        [
	            "id"=> 605,
	            "name"=> "Polio vaccine"
	        ],
	        [
	            "id"=> 488,
	            "name"=> "Polysomnography (sleep study)"
	        ],
	        [
	            "id"=> 200,
	            "name"=> "Port (medical appliance installed beneath skin)"
	        ],
	        [
	            "id"=> 201,
	            "name"=> "Positron emission tomography scan (PET scan)"
	        ],
	        [
	            "id"=> 375,
	            "name"=> "Posterior lumbar interbody fusion (PLIF, fusion of lower spinal bones)"
	        ],
	        [
	            "id"=> 374,
	            "name"=> "Posterolateral gutter fusion (surgical fusion of spinal bones)"
	        ],
	        [
	            "id"=> 442,
	            "name"=> "Preimplantation genetic screening (identification of genetic defects)"
	        ],
	        [
	            "id"=> 202,
	            "name"=> "Proctosigmoidoscopy (lower colon diagnostic test)"
	        ],
	        [
	            "id"=> 492,
	            "name"=> "Progesterone level (blood test measurement of female hormone)"
	        ],
	        [
	            "id"=> 357,
	            "name"=> "Prostate needle biopsy (needle tissue sample of prostate)"
	        ],
	        [
	            "id"=> 359,
	            "name"=> "Prostate specific antigen (PSA, prostate cancer screening blood test)"
	        ],
	        [
	            "id"=> 203,
	            "name"=> "Prostatectomy (remove prostate)"
	        ],
	        [
	            "id"=> 490,
	            "name"=> "Prothrombin time (PT, blood clotting test)"
	        ],
	        [
	            "id"=> 204,
	            "name"=> "Proton magnetic resonance spectroscopic imaging (imaging test that measures cell activity)"
	        ],
	        [
	            "id"=> 483,
	            "name"=> "Pulmonary function tests (PFTs, measurement of how lungs are working)"
	        ],
	        [
	            "id"=> 421,
	            "name"=> "PUVA treatment (UVA and psoralen, light therapy)"
	        ],
	        [
	            "id"=> 205,
	            "name"=> "Radial keratotomy (RK, correct nearsightedness)"
	        ],
	        [
	            "id"=> 206,
	            "name"=> "Radiation surgery (radiosurgery)"
	        ],
	        [
	            "id"=> 207,
	            "name"=> "Radiation therapy (radiotherapy)"
	        ],
	        [
	            "id"=> 208,
	            "name"=> "Radical cystectomy (complete bladder removal)"
	        ],
	        [
	            "id"=> 209,
	            "name"=> "Radical lymph node dissection (surgical removal of lymph nodes and surrounding tissue)"
	        ],
	        [
	            "id"=> 210,
	            "name"=> "Radical mastectomy (remove breast, chest muscles and lymph nodes)"
	        ],
	        [
	            "id"=> 211,
	            "name"=> "Radical prostatectomy (surgical removal of prostate and surrounding tissue)"
	        ],
	        [
	            "id"=> 212,
	            "name"=> "Radiofrequency ablation (destroy tissue with heat)"
	        ],
	        [
	            "id"=> 465,
	            "name"=> "Radiofrequency nerve ablation (nerve block with radio waves)"
	        ],
	        [
	            "id"=> 213,
	            "name"=> "Radionuclide scanning (body part imaging with small amounts of radioactive material)"
	        ],
	        [
	            "id"=> 484,
	            "name"=> "Rapid flu test"
	        ],
	        [
	            "id"=> 485,
	            "name"=> "Rapid strep test"
	        ],
	        [
	            "id"=> 214,
	            "name"=> "Reconstructive surgery (reshape body part)"
	        ],
	        [
	            "id"=> 694,
	            "name"=> "Recontouring"
	        ],
	        [
	            "id"=> 434,
	            "name"=> "Rectal biopsy (tissue sample of the rectum)"
	        ],
	        [
	            "id"=> 215,
	            "name"=> "Refractive surgery (vision correction surgery)"
	        ],
	        [
	            "id"=> 350,
	            "name"=> "Renal ultrasound (kidney ultrasound)"
	        ],
	        [
	            "id"=> 495,
	            "name"=> "Renal vascular ultrasound (ultrasound of kidney blood vessels)"
	        ],
	        [
	            "id"=> 216,
	            "name"=> "Resection (remove tissue)"
	        ],
	        [
	            "id"=> 494,
	            "name"=> "Rheumatoid factor (blood test for autoimmune disease)"
	        ],
	        [
	            "id"=> 217,
	            "name"=> "Rhinoplasty (nose job)"
	        ],
	        [
	            "id"=> 218,
	            "name"=> "Robotic surgery (robot assisted surgery)"
	        ],
	        [
	            "id"=> 708,
	            "name"=> "Root Canal Treatment"
	        ],
	        [
	            "id"=> 684,
	            "name"=> "Root Resection"
	        ],
	        [
	            "id"=> 401,
	            "name"=> "Rotator cuff repair (shoulder muscle repair)"
	        ],
	        [
	            "id"=> 603,
	            "name"=> "Rotavirus vaccine"
	        ],
	        [
	            "id"=> 538,
	            "name"=> "Rubella titer (German measles blood test)"
	        ],
	        [
	            "id"=> 461,
	            "name"=> "Sacroiliac joint injection (lower back joint injection)"
	        ],
	        [
	            "id"=> 219,
	            "name"=> "Salpingectomy (remove fallopian tubes)"
	        ],
	        [
	            "id"=> 220,
	            "name"=> "Salpingo oophorectomy (remove fallopian tubes and ovaries)"
	        ],
	        [
	            "id"=> 686,
	            "name"=> "Scaling and Root Planing"
	        ],
	        [
	            "id"=> 591,
	            "name"=> "School physical"
	        ],
	        [
	            "id"=> 221,
	            "name"=> "Sclerotherapy (collapse varicose veins)"
	        ],
	        [
	            "id"=> 351,
	            "name"=> "Scrotal ultrasound (ultrasound of contents of testicle sac)"
	        ],
	        [
	            "id"=> 639,
	            "name"=> "Semen analysis"
	        ],
	        [
	            "id"=> 589,
	            "name"=> "Shingles vaccine"
	        ],
	        [
	            "id"=> 409,
	            "name"=> "Shoulder joint replacement"
	        ],
	        [
	            "id"=> 416,
	            "name"=> "Shoulder resection arthroplasty (shoulder joint surgical repair)"
	        ],
	        [
	            "id"=> 222,
	            "name"=> "Sigmoidoscopy (camera examination of the lower colon)"
	        ],
	        [
	            "id"=> 674,
	            "name"=> "Sinus Lift"
	        ],
	        [
	            "id"=> 496,
	            "name"=> "Skin biopsy (skin sample)"
	        ],
	        [
	            "id"=> 497,
	            "name"=> "Slit lamp exam (specialized eye exam)"
	        ],
	        [
	            "id"=> 223,
	            "name"=> "Sonogram (imaging test using sound waves)"
	        ],
	        [
	            "id"=> 507,
	            "name"=> "Spinal fluid analysis"
	        ],
	        [
	            "id"=> 224,
	            "name"=> "Spinal fusion (fusing vertebra)"
	        ],
	        [
	            "id"=> 225,
	            "name"=> "Splenectomy (remove spleen)"
	        ],
	        [
	            "id"=> 598,
	            "name"=> "Splinter removal"
	        ],
	        [
	            "id"=> 592,
	            "name"=> "Sports physical"
	        ],
	        [
	            "id"=> 508,
	            "name"=> "Sputum culture (test for infection in lung mucous)"
	        ],
	        [
	            "id"=> 342,
	            "name"=> "Stapedectomy (removal of middle ear bone)"
	        ],
	        [
	            "id"=> 599,
	            "name"=> "Staple or suture removal"
	        ],
	        [
	            "id"=> 466,
	            "name"=> "Stellate ganglion block (nerve block in the neck)"
	        ],
	        [
	            "id"=> 226,
	            "name"=> "Stent (mesh tube to treat narrow or weak blood vessels)"
	        ],
	        [
	            "id"=> 227,
	            "name"=> "Stereotactic biopsy (removal of tissue aided by computer and scanner)"
	        ],
	        [
	            "id"=> 228,
	            "name"=> "Stereotactic radiosurgery (brain tumor treatment)"
	        ],
	        [
	            "id"=> 509,
	            "name"=> "Stool culture (test of stool for infection)"
	        ],
	        [
	            "id"=> 510,
	            "name"=> "Stool for clostridium difficile (test of stool for bacteria)"
	        ],
	        [
	            "id"=> 511,
	            "name"=> "Stool ova and parasite exam (test of stool for parasites)"
	        ],
	        [
	            "id"=> 512,
	            "name"=> "Stool WBCs (white blood cells, test of stool for infection)"
	        ],
	        [
	            "id"=> 229,
	            "name"=> "Stress test (test for heart disease)"
	        ],
	        [
	            "id"=> 230,
	            "name"=> "Surgery (invasive treatment or diagnostic procedure)"
	        ],
	        [
	            "id"=> 231,
	            "name"=> "Swan Ganz catheter placement (tube in jugular vein to measure heart pressures)"
	        ],
	        [
	            "id"=> 435,
	            "name"=> "Sweat test (chloride sweat test, screening test for cystic fibrosis)"
	        ],
	        [
	            "id"=> 405,
	            "name"=> "Tenotomy (cutting of a tendon)"
	        ],
	        [
	            "id"=> 447,
	            "name"=> "Testicular sperm aspiration (TESA, surgical sperm removal)"
	        ],
	        [
	            "id"=> 446,
	            "name"=> "Testicular sperm extraction (TESE, surgical sperm removal)"
	        ],
	        [
	            "id"=> 449,
	            "name"=> "Testis microdissection (surgical sperm removal)"
	        ],
	        [
	            "id"=> 448,
	            "name"=> "Testis percutaneous biopsy (tissue sample of testicle)"
	        ],
	        [
	            "id"=> 588,
	            "name"=> "Tetanus vaccine (Td vaccine)"
	        ],
	        [
	            "id"=> 232,
	            "name"=> "Thallium stress test (chemical test for heart disease)"
	        ],
	        [
	            "id"=> 425,
	            "name"=> "Thermage (noninvasive cosmetic skin procedure)"
	        ],
	        [
	            "id"=> 233,
	            "name"=> "Thermal ablation (heat to remove tissue)"
	        ],
	        [
	            "id"=> 234,
	            "name"=> "Thigh lift (remove skin and fat from thighs)"
	        ],
	        [
	            "id"=> 514,
	            "name"=> "Thoracentesis (remove fluid from lung)"
	        ],
	        [
	            "id"=> 578,
	            "name"=> "Thoracic facet joint injection (upper back injection for pain)"
	        ],
	        [
	            "id"=> 559,
	            "name"=> "Thoracic spine CT scan with dye (upper back CAT)"
	        ],
	        [
	            "id"=> 558,
	            "name"=> "Thoracic spine CT scan without dye (upper back CAT)"
	        ],
	        [
	            "id"=> 553,
	            "name"=> "Thoracic spine MRI with dye (upper back MRI)"
	        ],
	        [
	            "id"=> 550,
	            "name"=> "Thoracic spine MRI without dye (upper back MRI)"
	        ],
	        [
	            "id"=> 235,
	            "name"=> "Thoracoscopy (camera examination inside chest)"
	        ],
	        [
	            "id"=> 236,
	            "name"=> "Thoracotomy (invasive surgery to examine inside the chest)"
	        ],
	        [
	            "id"=> 617,
	            "name"=> "Throat culture"
	        ],
	        [
	            "id"=> 500,
	            "name"=> "Thyroid blood tests"
	        ],
	        [
	            "id"=> 499,
	            "name"=> "Thyroid scan (image of thyroid using radioactive material)"
	        ],
	        [
	            "id"=> 515,
	            "name"=> "Thyroid stimulating hormone (TSH, blood test to detect thyroid problems)"
	        ],
	        [
	            "id"=> 623,
	            "name"=> "Thyroid ultrasound"
	        ],
	        [
	            "id"=> 237,
	            "name"=> "Thyroidectomy (remove thyroid)"
	        ],
	        [
	            "id"=> 238,
	            "name"=> "Tilt table test (evaluates fainting spells)"
	        ],
	        [
	            "id"=> 489,
	            "name"=> "Tonometry (test to measure pressure inside eye)"
	        ],
	        [
	            "id"=> 346,
	            "name"=> "Tonsillectomy (removal of tonsils)"
	        ],
	        [
	            "id"=> 263,
	            "name"=> "Tooth extraction (remove tooth)"
	        ],
	        [
	            "id"=> 239,
	            "name"=> "Total hip replacement"
	        ],
	        [
	            "id"=> 240,
	            "name"=> "Total knee replacement"
	        ],
	        [
	            "id"=> 516,
	            "name"=> "Toxicology screen (drug test)"
	        ],
	        [
	            "id"=> 241,
	            "name"=> "Tracheostomy (tracheotomy, opening in windpipe)"
	        ],
	        [
	            "id"=> 242,
	            "name"=> "Transabdominal ultrasound (ultrasound image of abdomen)"
	        ],
	        [
	            "id"=> 243,
	            "name"=> "Transcutaneous electric nerve stimulation (TENS, pain management)"
	        ],
	        [
	            "id"=> 619,
	            "name"=> "Transesophageal echocardiogram (TEE)"
	        ],
	        [
	            "id"=> 385,
	            "name"=> "Transforaminal lumbar interbody fusion (TLIF, lower back spinal fusion)"
	        ],
	        [
	            "id"=> 244,
	            "name"=> "Transfusion (blood replacement through a vein)"
	        ],
	        [
	            "id"=> 245,
	            "name"=> "Transplantation (replace organ)"
	        ],
	        [
	            "id"=> 246,
	            "name"=> "Transrectal ultrasound (ultrasound image through rectum)"
	        ],
	        [
	            "id"=> 355,
	            "name"=> "Transrectal ultrasound with prostate biopsy (ultrasound guided prostate tissue sample)"
	        ],
	        [
	            "id"=> 247,
	            "name"=> "Transurethral resection (TURP, removal of part or all of prostate)"
	        ],
	        [
	            "id"=> 248,
	            "name"=> "Transvaginal ultrasound (ultrasound image through vagina)"
	        ],
	        [
	            "id"=> 575,
	            "name"=> "Triangular fibrocartilage complex repair (wrist cartilage surgical repair)"
	        ],
	        [
	            "id"=> 462,
	            "name"=> "Trigger point injections (pain management treatment using muscle injections)"
	        ],
	        [
	            "id"=> 452,
	            "name"=> "Tubal ligation (surgical female sterilization)"
	        ],
	        [
	            "id"=> 513,
	            "name"=> "Tuberculosis skin test (PPD skin test)"
	        ],
	        [
	            "id"=> 249,
	            "name"=> "Tummy tuck (abdominoplasty)"
	        ],
	        [
	            "id"=> 545,
	            "name"=> "Tympanometry (ear drum testing)"
	        ],
	        [
	            "id"=> 341,
	            "name"=> "Tympanoplasty (ear drum repair)"
	        ],
	        [
	            "id"=> 250,
	            "name"=> "Ultrasound test (imaging test using sound waves)"
	        ],
	        [
	            "id"=> 420,
	            "name"=> "Ultraviolet light B (UVB, skin disease light treatment)"
	        ],
	        [
	            "id"=> 251,
	            "name"=> "Upper arm lift (remove skin and fat from arm)"
	        ],
	        [
	            "id"=> 572,
	            "name"=> "Upper extremity CT scan with dye (arm CAT scan)"
	        ],
	        [
	            "id"=> 571,
	            "name"=> "Upper extremity CT scan without dye (arm CAT scan)"
	        ],
	        [
	            "id"=> 569,
	            "name"=> "Upper extremity joint MRI with dye (arm MRI)"
	        ],
	        [
	            "id"=> 570,
	            "name"=> "Upper extremity joint MRI without dye (arm MRI)"
	        ],
	        [
	            "id"=> 252,
	            "name"=> "Upper GI series (x-ray image of upper digestive tract)"
	        ],
	        [
	            "id"=> 654,
	            "name"=> "Urea breath test (H. pylori)"
	        ],
	        [
	            "id"=> 354,
	            "name"=> "Ureteroscopy (camera examination of tubes between kidney and bladder)"
	        ],
	        [
	            "id"=> 625,
	            "name"=> "Uric acid level"
	        ],
	        [
	            "id"=> 361,
	            "name"=> "Urinalysis (UA, microscopic examination of urine)"
	        ],
	        [
	            "id"=> 269,
	            "name"=> "Urine Cortisol 24 hour collection (urine test to measure hormone from adrenal gland)"
	        ],
	        [
	            "id"=> 627,
	            "name"=> "Urine culture"
	        ],
	        [
	            "id"=> 253,
	            "name"=> "Urostomy (artificial opening for the urinary system)"
	        ],
	        [
	            "id"=> 254,
	            "name"=> "Uterine ablation (remove uterus lining)"
	        ],
	        [
	            "id"=> 255,
	            "name"=> "Uterine fibroid embolization (cut blood supply to uterine growths)"
	        ],
	        [
	            "id"=> 544,
	            "name"=> "Uterine fibroid removal (surgical removal of uterine growths)"
	        ],
	        [
	            "id"=> 256,
	            "name"=> "Vaginal hysterectomy (removal of the uterus through the vagina)"
	        ],
	        [
	            "id"=> 629,
	            "name"=> "Vaginal wet prep/culture"
	        ],
	        [
	            "id"=> 656,
	            "name"=> "Valsalva's maneuver"
	        ],
	        [
	            "id"=> 335,
	            "name"=> "Vasectomy (surgical male sterilization)"
	        ],
	        [
	            "id"=> 700,
	            "name"=> "Veneers"
	        ],
	        [
	            "id"=> 386,
	            "name"=> "Vertebroplasty (minimally invasive treatment of spine fracture)"
	        ],
	        [
	            "id"=> 393,
	            "name"=> "Video fluoroscopy (x-rays that capture motion of a body part)"
	        ],
	        [
	            "id"=> 702,
	            "name"=> "Vital Pulpotomy"
	        ],
	        [
	            "id"=> 258,
	            "name"=> "Voiding cystourethrogram (x-ray of bladder function)"
	        ],
	        [
	            "id"=> 658,
	            "name"=> "VQ scan (lung ventilation perfusion scan)"
	        ],
	        [
	            "id"=> 418,
	            "name"=> "Webbed finger or toe repair"
	        ],
	        [
	            "id"=> 676,
	            "name"=> "Whitening"
	        ],
	        [
	            "id"=> 631,
	            "name"=> "Wood's light analysis"
	        ],
	        [
	            "id"=> 260,
	            "name"=> "X-ray (image bones and soft tissue)"
	        ],
	        [
	            "id"=> 259,
	            "name"=> "Xeroradiography (x-ray on paper)"
	        ],
	        [
	            "id"=> 439,
	            "name"=> "Zygote intra fallopian transfer (ZIFT, infertility treatment)"
	        ],
	    ];

	    $hashids = new Hashids('bl0ckcha1n', 10);
	    foreach ($data as $key => $value) {
		    MedProcedure::create([
		    	'uid' => $hashids->encode([8,$value['id'] ]),
		    	'name' => $value['name'],
		    ]);
	    }


    }
}
