<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//
// Route::group(['prefix' => 'blogs', 'namespace' => 'Blog'], function() {
// 	Route::get('/', 'HomeController@getIndex');
// });
// @cath temp
Route::get('/gamification', 'HomeController@gamification');
Route::post('/bin', 'HomeController@bin');

Route::group(['prefix' => 'algolia-seeding'], function() {
    Route::get('/conditions', 'AlgoliaSeeder@conditions');
    Route::get('/doctors', 'AlgoliaSeeder@doctors');
    Route::get('/facilities', 'AlgoliaSeeder@facilities');
    Route::get('/medications', 'AlgoliaSeeder@medications');
    Route::get('/brandedMedications', 'AlgoliaSeeder@brandMedications');
    Route::get('/specializations', 'AlgoliaSeeder@specializations');
    Route::get('/symptoms', 'AlgoliaSeeder@symptoms');
    Route::get('/providers', 'AlgoliaSeeder@providers');
    Route::get('/clearIndex', 'AlgoliaSeeder@clearAllIndex');
    Route::get('/seedIndex', 'AlgoliaSeeder@seedAllIndex');
    Route::get('/setSettings', 'AlgoliaSeeder@setSettings');
});

Route::group(['prefix' => 'social', 'namespace' => 'Social'], function() {
    Route::get('/', 'HomeController@getIndex');
});
Route::group(['prefix' => 'terms', 'namespace' => 'Terms'], function() {
    Route::get('/advertising-policy', 'HomeController@getAdvertising');
    Route::get('/cookie-policy', 'HomeController@getCookie');
    Route::get('/hipaa-policy', 'HomeController@getHipaa');
    Route::get('/quote-policy', 'HomeController@getQuote');
    Route::get('/service', 'HomeController@getService');
    Route::get('/privacy', 'HomeController@getPrivacy');
    Route::get('/', 'HomeController@getTerms');
});

Route::group(['prefix' => 'timeline', 'namespace' => 'Timeline'], function() {
    Route::post('/{id}/reply', 'HomeController@reply');
    Route::get('{id}/edit', 'HomeController@edit');
    Route::put('{id}', 'HomeController@update');
    Route::delete('{id}', 'HomeController@delete');
    Route::get('/', 'HomeController@index');
    Route::post('/', 'HomeController@create');
});


Route::group(['prefix' => 'home', 'namespace' => 'Landing'], function() {
    Route::get('/tellme', 'HomeController@getTellme');
    Route::get('/contact', 'HomeController@getContact');
    Route::post('/contact', 'HomeController@postContact');
});

// NOTE: disable for now
// Route::group(['prefix' => 'carenow', 'namespace' => 'Carenow'], function() {
// 	Route::get('/', 'HomeController@getCarenow');
// 	Route::get('/search', 'HomeController@getSearch');
// 	Route::get('/shop', 'HomeController@getShop');
// });
//
// Route::group(['prefix' => 'shop', 'namespace' => 'Shop'], function() {
//     Route::get('/', 'HomeController@getIndex');
// });

// Route::group(['prefix' => 'concierge', 'namespace' => 'Concierge'], function() {
//     Route::get('/', 'HomeController@getIndex');
// });

Route::group(['prefix' => 'triage', 'namespace' => 'Triage'], function() {
    Route::get('/search', 'HomeController@getSearch');
    Route::get('/', 'HomeController@getIndex');
});

Route::group(['prefix' => 'directory', 'namespace' => 'Directory'], function() {
    Route::group(['prefix' => 'doctors'], function() {
        Route::get('/', 'DoctorController@getIndex');
        Route::get('/api/{id}', 'DoctorController@getProvider');
        Route::post('/', 'DoctorController@postDoctor');
        Route::get('/add-listing', 'DoctorController@createDoctor');
        // Route::post('/add-listing', 'DoctorController@storeDoctor');
        Route::post('/add-listing', 'DoctorController@storeDoctor2');
        Route::get('/checkEmail/{email}', 'DoctorController@checkEmail'); //email of co-provider (add-listing)
    });
    Route::group(['prefix' => 'facilities'], function() {
        Route::get('/', 'FacilityController@getIndex');
    });
    Route::group(['prefix' => 'support-group'], function() {
        Route::get('/', 'SupportGroupController@getIndex');
        Route::get('/new', 'SupportGroupController@new');
    });
    Route::group(['prefix' => 'agents'], function() {
        Route::get('/', 'AgentController@getIndex');
        Route::post('/', 'AgentController@postAgent');
        Route::get('/api/getAgents', 'AgentController@getAgents');
        Route::get('/api/{id}', 'AgentController@getAgent');
    });
});

Route::group(['prefix' => 'careconnect', 'namespace' => 'Careconnect'], function() {
    Route::get('/', 'HomeController@getCareconnect');
    Route::get('/facility', 'HomeController@getFacility');
    Route::get('/support-group', 'HomeController@getSupport');
    Route::get('/partnerships', 'HomeController@getPartnerships');
    Route::get('/shop', 'HomeController@getShop');
    Route::get('/search', 'HomeController@getSearch');
    Route::get('/shopping', 'HomeController@getShopping');
    Route::get('/shop-item', 'HomeController@getShopitem');
    Route::get('/checkout', 'HomeController@getCheckout');
    Route::get('/payment', 'HomeController@getPayment');
    Route::get('/income-calculator', 'HomeController@getIncomeCalculator');
    Route::get('/doctor-search', 'HomeController@getDoctorSearch');
    Route::get('/facility-search', 'HomeController@getFacilitySearch');
    Route::get('/support-search', 'HomeController@getSupportGroup');
    // Route::post('/doctor-search', 'HomeController@postDoctorSearch');
    Route::get('/create-doctor', 'HomeController@getDoctorCreate');
    Route::post('/create-doctor', 'HomeController@postDoctorCreate');
    Route::get('/agent-finder', 'HomeController@getAgentFinder');
    Route::get('/create-agent', 'HomeController@getAgentCreate');
    Route::post('/create-agent', 'HomeController@postAgentCreate');

    //validation for agent-finder
    Route::get('/checkValidate', 'HomeController@checkValidate');

    //rx
    Route::get('/register', 'HomeController@getRegister');
    Route::get('/medication', 'HomeController@getMedications');
    Route::get('/medication-single', 'HomeController@getMedicationsingle');
    Route::get('/chat', 'HomeController@getChat');
    Route::get('/history', 'HomeController@getHistory');
    Route::get('/history2', 'HomeController@getHistory2');
    Route::get('/history3', 'HomeController@getHistory3');
    Route::get('/history4', 'HomeController@getHistory4');
    Route::get('/history5', 'HomeController@getHistory5');
    Route::get('/history6', 'HomeController@getHistory6');
    Route::get('/history7', 'HomeController@getHistory7');
    Route::get('/history8', 'HomeController@getHistory8');
    Route::get('/history9', 'HomeController@getHistory9');
    Route::get('/history10', 'HomeController@getHistory10');
    Route::get('/history11', 'HomeController@getHistory11');
    Route::get('/clinic', 'HomeController@getClinic');
    Route::get('/clinic-single', 'HomeController@getClinicsingle');
    Route::get('/doctor', 'HomeController@getDoctor');
    Route::get('/doctor-single', 'HomeController@getDoctorsingle');
    Route::get('/chat2', 'HomeController@getChat2');
    Route::get('/history12', 'HomeController@getHistory12');
});

Route::group(['prefix' => 'resource-center', 'namespace' => 'ResourceCenter'], function() {
    Route::get('/calendar', 'HomeController@getCalendar');
    Route::get('/losing-health', 'HomeController@getLosingHealth');
    Route::get('/residence', 'HomeController@getResidence');
    Route::get('/qualifyingchanges', 'HomeController@getQualifying');
});

Route::group(['prefix' => 'error', 'namespace' => 'Error'], function() {
    Route::get('/', 'HomeController@getError');
});

Route::group(['prefix' => 'under-construction', 'namespace' => 'Construction'], function() {
    Route::get('/', 'HomeController@getIndex');
});

Route::group(['prefix' => 'other-topics', 'namespace' => 'OtherTopics'], function() {
    Route::get('/', 'HomeController@getIndex');
    Route::get('/incarcerated-people', 'HomeController@getIncarcerated');
    Route::get('/american-indian', 'HomeController@getAmerican');
    Route::get('/military-veterans', 'HomeController@getMilitary');
    Route::get('/people-disabilities', 'HomeController@getDisable');
    Route::get('/people-medicare', 'HomeController@getMedicare');
    Route::get('/pregnant-women', 'HomeController@getPregnant');
    Route::get('/retirees', 'HomeController@getRetirees');
    Route::get('/same-sex', 'HomeController@getSamesex');
    Route::get('/transgender', 'HomeController@getTransgender');
    Route::get('/underage', 'HomeController@getUnderage');
});

Route::group(['prefix' => 'faq', 'namespace' => 'FAQ'], function() {
    Route::get('/', 'HomeController@getFAQ');
});

Route::group(['prefix' => 'terms-condition', 'namespace' => 'TC'], function() {
    Route::get('/', 'HomeController@getTerms');
});

Route::group(['prefix' => 'job-based', 'namespace' => 'JobBased'], function() {
    Route::get('/', 'HomeController@getJobBased');
});

Route::group(['prefix' => 'complicated-cases', 'namespace' => 'Complicated'], function() {
    Route::get('/', 'HomeController@getComplicatedCases');
});

Route::group(['prefix' => 'community', 'namespace' => 'Community'], function() {
    Route::group(['prefix' => 'forums'], function() {
        Route::get('/general/{id}/{slug}', 'ForumController@getTopic');
        Route::get('/health-wellness/{id}/{slug}', 'ForumController@getTopic');
        Route::get('/news/{id}/{slug}', 'ForumController@getTopic');
        Route::get('/support/{id}/{slug}', 'ForumController@getTopic');
        Route::get('/general', 'ForumController@getGeneral');
        Route::get('/health-wellness', 'ForumController@getHeath');
        Route::get('/news', 'ForumController@getNews');
        Route::get('/support', 'ForumController@getSupport');
        Route::get('/trigger', 'ForumController@getTrigger');
        Route::post('/{id}/create', 'ForumController@postComment');
        Route::get('/', 'ForumController@getIndex');
        Route::post('/', 'ForumController@postIndex');
    });

    Route::group(['prefix' => 'blogs'], function() {
        Route::get('/{id}', 'BlogsController@getBlowup');
        Route::get('/', 'BlogsController@getIndex');
        Route::get('/{id}/edit', 'BlogsController@getEdit');
        Route::delete('/{id}', 'BlogsController@delete');
        Route::put('/{id}', 'BlogsController@update');
        Route::post('/', 'BlogsController@postIndex');
        Route::post('/{id}/vote', 'BlogsController@postVotes');
    });

    Route::group(['prefix' => 'news'], function() {
        Route::get('/{id}', 'NewsController@getBlowup');
        Route::get('/', 'NewsController@getIndex');
        Route::post('/{id}/vote', 'NewsController@postVotes');
    });
    Route::group(['prefix' => 'public-chat'], function() {
        Route::get('/', 'WallController@getIndex');
        Route::post('{id}/vote', 'WallController@postVote');
        Route::post('/', 'WallController@post');
    });

    // forum
    Route::get('/gameon', 'HomeController@getGameon');
    Route::get('/learn-more', 'HomeController@getBadges');
    Route::get('/community-ew', 'HomeController@getCommunityEW');
    Route::get('/east', 'HomeController@getEast');
    Route::get('/west', 'HomeController@getWest');
    Route::get('/', 'HomeController@getCommunity');
    Route::get('/carecommunity', 'HomeController@getCarecommunity');
    Route::get('/community-specialization', 'HomeController@getSpecialization');
    Route::get('/community-setup', 'HomeController@getSetup');
    Route::get('/community-state', 'HomeController@getState');
    Route::get('/category', 'HomeController@getcategory');
    // Route::get('/members-list', 'HomeController@getMemberList'); // NOTE:80 removed
});

Route::group(['prefix' => 'learn-more', 'namespace' => 'Learn'], function() {
    Route::get('/', 'HomeController@getIndex');
});

Route::group(['prefix' => 'marketplace', 'namespace' => 'Marketplace'], function() {
    Route::get('/agent', 'HomeController@getMarketplace');
});

Route::group(['prefix' => 'household', 'namespace' => 'Household'], function() {
    Route::get('/', 'HomeController@getIndex');
});

Route::group(['prefix' => 'askparrot', 'namespace' => 'Askparrot'], function() {
    Route::get('/', 'HomeController@getIndex');
    Route::post('/', 'HomeController@postIndex');
    Route::get('/marketplace', 'HomeController@getMarketplace');
    Route::get('/applyenroll', 'HomeController@getApplyEnroll');
    Route::get('/marketplace-plan', 'HomeController@getMarketplacePlan');
    Route::get('/main-specialenroll', 'HomeController@getMainspecialenroll');
    Route::get('/aboutus', 'HomeController@getAboutus');
});

Route::group(['prefix' => 'about', 'namespace' => 'About'], function() {
    Route::get('/', 'HomeController@getIndex');
    Route::get('/know', 'HomeController@getKnow');
    Route::get('/know-2', 'HomeController@getKnow2');
    Route::get('/quote', 'HomeController@getQuote');
    Route::get('/why', 'HomeController@getWhy');
    Route::get('/culture', 'HomeController@getCulture');
    Route::get('/sustainability', 'HomeController@getSustainability');
    Route::get('/aboutus', 'HomeController@getAbout');
    Route::get('/give', 'HomeController@getGive');
    Route::get('/contact', 'HomeController@getContact');
    Route::get('/privacy', 'HomeController@getPrivacy');
    // Route::get('/guidelines', 'HomeController@getGuidelines');
    Route::post('/contact', 'HomeController@postContact');
});

Route::group(['prefix' => 'team-builder', 'namespace' => 'Message'], function() {
    // TODO: allow ajax access only to these routes
    // Route::group(['middleware' => 'ajax'], function() {
    //
    // });
    Route::post('/new', 'HomeController@postNewMessage');
    Route::post('/{id}/join', 'HomeController@toggleJoin');
    Route::post('/{id}/accept', 'HomeController@toggleAccept');
    Route::post('/{id}/invite', 'HomeController@invite');
    Route::post('/{id}/remove', 'HomeController@remove');
    Route::post('/{id}', 'HomeController@postMessage');
    Route::get('/{id}/chats', 'HomeController@getMessages');

    
    Route::group(['prefix' => 'api'], function() {
        Route::get('/search/users', 'HomeController@searchUser');
    });
    // NOTE: up to here.

    Route::get('/{id}', 'HomeController@latestChat');
    Route::get('/', 'HomeController@index');
});

Route::get('/attachments/{hashed_id}/download', 'AttachmentController@download')
    ->middleware('auth');

// START OF MIDDLEWARE
Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'profile', 'namespace' => 'Profile'], function() {

        Route::group(['prefix' => 'staff'], function() {
            Route::get('/', 'StaffController@getIndex');
            Route::get('/api/getStaff', 'StaffController@getStaff');
            Route::post('/add', 'StaffController@postAddStaff');
        });

        Route::group(['prefix' => 'directory'], function() {
            Route::get('/', 'DirectoryController@getIndex');
            Route::post('/setAppointment', 'DirectoryController@setAppointment');
        });

        Route::post('/signature', 'HomeController@saveSignature');

        Route::get('/api/doctor', 'HomeController@getDoctor');

        Route::group(['prefix' => 'payments'], function() {
            Route::get('/api/list', 'PaymentController@getList');
            Route::get('/api/getPatients', 'PaymentController@getPatients');
            Route::get('/', 'PaymentController@getIndex');
            Route::get('/{id}/pdf', 'PaymentController@generateInvoice');
            Route::post('/', 'PaymentController@addPayment');
            Route::post('/changeStatus', 'PaymentController@changeStatus');
        });

        Route::group(['prefix' => 'leads'], function() {
            Route::get('/', 'LeadController@getIndex');
            Route::post('/setPatient', 'LeadController@setPatient');
        });

        Route::group(['prefix' => 'staff'], function() {
            Route::get('/', 'StaffController@getIndex');
        });

        Route::group(['prefix' => 'leaderboards'], function() {
            Route::get('/', 'LeaderboardController@getIndex');
        });


        Route::group(['prefix' => 'patients'], function() {
            Route::get('/', 'PatientController@getIndex');
            Route::get('/{hashedid}', 'PatientController@viewPatient');
            Route::get('/{hashedid}/download', 'PatientController@download');
            // Route::get('/{hashedid}/info', 'PatientController@getPatientInfo');
            Route::post('/vitals', 'PatientController@postVitals');

            Route::group(['prefix' => 'appointments'], function() {
                Route::post('/{hashedid}/delete', 'PatientController@deleteAppointment');
                Route::get('/{hashedid}', 'PatientController@getAppointments');
                Route::post('/{hashedid}', 'PatientController@create');
                Route::post('/{hashedid}/edit', 'PatientController@updateAppointment');
            });

            Route::group(['prefix' => 'informations'], function() {
                Route::get('/{hashedid}', 'PatientController@getInformations');
                Route::get('api/{hashedid}', 'PatientInformationController@getInfo');
                Route::post('api/{hashedid}', 'PatientInformationController@postInfo');
            });
            Route::group(['prefix' => 'medications'], function() {
                Route::post('/{hashedid}', 'PatientMedicationController@create');
                Route::get('/{hashedid}', 'PatientController@getMedications');
                Route::get('api/{hashedid}', 'PatientMedicationController@getMedications');

            });
            Route::group(['prefix' => 'flags'], function() {
                Route::get('/{hashedid}', 'PatientFlagController@index');
                Route::get('/api/{hashedid}', 'PatientFlagController@get');
                Route::post('/{hashedid}/{id}/edit', 'PatientFlagController@edit');
                Route::post('/{hashedid}', 'PatientFlagController@store');
            });

            Route::group(['prefix' => 'allergies'], function() {
                Route::get('/{hashedid}', 'PatientAllergyController@index');
                Route::post('/{hashedid}', 'PatientAllergyController@store');
                Route::get('/api/{hashedid}', 'PatientAllergyController@get');
            });


            Route::group(['prefix' => 'laboratories'], function() {
                Route::get('/{hashedid}', 'PatientLaboratoryController@index');
                Route::get('api/{hashedid}', 'PatientLaboratoryController@getLabs');
                Route::post('/{hashedid}', 'PatientLaboratoryController@store');
                Route::post('/{hashedid}/update', 'PatientLaboratoryController@update');
            });

             Route::group(['prefix' => 'problems'], function() {
                Route::get('/{hashedid}', 'PatientProblemController@index');
                Route::get('api/{hashedid}', 'PatientProblemController@getProblems');
                Route::post('/{hashedid}', 'PatientProblemController@store');
                Route::post('/{hashedid}/update', 'PatientProblemController@update');
            });

            Route::group(['prefix' => 'erx'], function() {
                Route::get('/{hashed}', 'PatientErxController@index');
                Route::post('/{hashed}', 'PatientErxController@post');
                Route::get('/{hashed}/preview', 'PatientErxController@preview');
            });

            Route::post('/', 'PatientController@createPatient');
            Route::get('/api/list', 'PatientController@getList');
            Route::get('/api/appointments/{hashed}', 'PatientController@getPatientAppointments');
            Route::get('/api/get/{hashedid}', 'PatientController@getPatient');
            // Route::get('/problems/{hashedid}', 'PatientController@getProblems');
            Route::get('/labs/{hashedid}', 'PatientController@getLabs');
        });

        Route::group(['prefix' => 'appointments'], function() {
            Route::get('/', 'AppointmentController@getIndex');
            Route::get('/api/getPatient/{id}', 'AppointmentController@getPatient');
            Route::post('/status', 'AppointmentController@updateStatus');
            Route::post('/provider-approval/{status}', 'AppointmentController@providerApproval');
            Route::post('/suggest', 'AppointmentController@suggestAppointment');

        });

        Route::group(['prefix' => 'medical'], function() {
            Route::get('/api', 'MedicalController@getMedicalProblems');
            Route::get('/', 'MedicalController@getIndex');
            // post
            Route::post('/allergy/add', 'MedicalController@addAllergy');
            Route::post('/allergy/edit', 'MedicalController@editAllergy');
            Route::post('/injury/add', 'MedicalController@addInjury');
            Route::post('/injury/edit', 'MedicalController@editInjury');
            Route::post('/vitals', 'MedicalController@postVitals');
            Route::post('/problems', 'MedicalController@postProblems');
            Route::post('/habits', 'MedicalController@postHabits');
            Route::post('/diet', 'MedicalController@postDiets');
            Route::post('/caffeine', 'MedicalController@postCaffeine');
            Route::post('/tobacco', 'MedicalController@postTobacco');
            Route::post('/alcohol-drugs', 'MedicalController@postAlcoholDrugs');
            Route::post('/abuse', 'MedicalController@postAbuse');
            Route::post('/stress', 'MedicalController@postStress');
            Route::post('/surgeries', 'MedicalController@postSurgery');
            Route::post('/family-history', 'MedicalController@postFamilyHistory');
            Route::post('/questionnaire', 'MedicalController@postQuestionnaire');
        });

        Route::group(['prefix' => 'coverage', 'middleware' => 'patient'], function() {
            Route::get('/form', 'FormController@index');
            Route::post('/form', 'FormController@save');
            Route::get('/', 'CoverageController@getIndex');
            Route::delete('/', 'CoverageController@delete');
            Route::post('/', 'CoverageController@post');
            Route::get('/insurance-card', 'CoverageController@getInsuranceCard');
            Route::get('/api', 'CoverageController@getCoverage');
            Route::post('/insurance-card', 'CoverageController@postInsuranceCard');
            Route::delete('/insurance-card', 'CoverageController@deleteInsuranceCard');
        });

        Route::group(['prefix' => 'documents'], function() {
            Route::get('/', 'HomeController@getDocuments');
        });

        Route::group(['prefix' => 'permission'], function() {
            Route::post('/patient/{id}', 'PermissionController@request');
            Route::get('/patient/{id}', 'PermissionController@get');
            Route::post('/patient/{permission_id}/accept', 'PermissionController@accept');
            Route::post('/patient/{permission_id}/deny', 'PermissionController@deny');
        });

        Route::post('/update', 'HomeController@update');
        Route::post('/update-crm', 'HomeController@postUpdateCrm');
        Route::get('/get-info', 'HomeController@getCRMFields');

        Route::get('/patient-info', 'HomeController@getPatientInfo');
        Route::get('/provider-info', 'HomeController@getProviderInfo');
        Route::get('/agent-info', 'HomeController@getAgentInfo');
        Route::post('/patient-info', 'HomeController@postPatientInfo');
        Route::post('/provider-info', 'HomeController@postProviderInfo');
        Route::post('/agent-info', 'HomeController@postAgentInfo');
        Route::patch('/provider', 'HomeController@updateProvider');
        Route::delete('/provider', 'HomeController@deleteProvider');

        Route::post('/avatar', 'HomeController@postAvatar');
        Route::get('/overview/{id}', 'HomeController@getOverview');
        Route::post('/overview/{id}/follow', 'HomeController@postFollow');
        Route::post('/overview/{id}/unfollow', 'HomeController@postUnfollow');
        Route::post('/overview/{id}/thankyou', 'HomeController@postThankYou');
        Route::get('/settings', 'HomeController@getSettings');
        Route::get('/visitor', 'HomeController@getVisitor');
        Route::get('/', 'HomeController@getIndex');

        // eric
        Route::get('/activities', 'ActivityController@get');

        // cath
        Route::get('/getActivity/{id}', 'ActivityController@getActivity');
        Route::post('/postActivity', 'ActivityController@postActivity');

    });
}); //END MIDDLEWARE

Route::group(['prefix'=>'auth', 'namespace' => 'Auth'], function() {
    Route::get('/login', 'LoginController@getIndex');
    Route::get('/register', 'RegisterController@getIndex');
    Route::post('/register', 'RegisterController@postIndex');
    Route::post('/login', 'LoginController@postIndex');
    Route::get('/welcome', 'LoginController@getWelcome');
    Route::post('/prevent', 'LoginController@postPrevent');
    Route::get('/forgot-password', 'ForgotController@getIndex');
    Route::post('/forgot-password', 'ForgotController@postIndex');

    Route::get('/login/{provider?}',[
        'uses' => 'LoginController@getSocialAuth',
        'as'   => 'auth.getSocialAuth'
    ]);
    Route::get('/login/callback/{provider?}',[
        'uses' => 'LoginController@getSocialAuthCallback',
        'as'   => 'auth.getSocialAuthCallback'
    ]);
    // validation
    Route::get('/checkValidate', 'RegisterController@checkValidate');

    Route::get('/logout', 'LoginController@getLogout');
});

Route::get('/quote-finished', 'HomeController@finished');
Route::post('/quote-finished', 'HomeController@postFinished');

Route::group(['namespace' => 'Resource'], function() {
    Route::get('/quote', [
        'as' => 'plans',
        'uses' => 'PlanController@getIndex'
    ]);
});

Route::group(['namespace' => 'Api', 'prefix' => 'api'], function() {
    Route::get('/doctorhospital', 'HomeController@getDoctorHospital');
    Route::get('/members', 'HomeController@getMembers');
    Route::get('/agents', 'HomeController@getAgents');
    Route::get('/get', 'HomeController@getDoctorHospital');
    Route::get('/getLocations/{zip}', 'HomeController@getLocationDetails');
    Route::get('/getNewInvoice', 'HomeCOntroller@getNewInvoiceNumber');
    Route::get('/doctors', 'DoctorController@getDoctors');
    Route::get('/providers/{id}', 'DoctorController@getProviders');
    Route::get('/providers/checkSubscription/{provider_id}', 'DoctorController@checkSubscription');
    Route::post('/getRatings', 'HomeController@getPlanRating');
    Route::post('/postRatings', 'HomeController@postPlanRating');
    Route::post('/postEligibility', 'HomeController@postEligibility');
    Route::post('/getPlans', 'HomeController@getPlans');
    Route::post('/postDoctor', 'HomeController@postDoctor');

    Route::post('/bookmark/medication', 'BookmarkController@medication');
    Route::post('/bookmark/facility', 'BookmarkController@facility');
    Route::post('/bookmark/doctor', 'BookmarkController@doctor');

    Route::group(['prefix' => 'subscriptions'], function() {
        Route::post('/premium-listing', 'PaymentController@postPremium');
        Route::post('/ehr', 'PaymentController@postEhr');
        Route::post('/crm', 'PaymentController@postCrm');
        // @cath
        Route::get('/getPlans/{subscriptions}', 'SubscriptionController@getPlans');
    });

    Route::group(['prefix' => 'auth'], function() {
        Route::post('/login', 'AuthController@postLogin');
        Route::get('/check', 'AuthController@checkAuth');
    });
    Route::group(['prefix' => 'search'], function() {
        Route::get('/users', 'UserController@search');
    });
    Route::get('/sig', 'MedicationController@getSig');
});

Route::get('/coming-soon', 'HomeController@coming');

Route::group(['prefix' => '/'], function() {
    Route::get('/zip_code', 'HomeController@getZipcode');
    Route::get('/lang/{locale}', 'HomeController@setLocale');
    Route::get('/', 'HomeController@getIndex');
});
// Socialite Routes

//health gamification
Route::group(['prefix' => 'health', 'namespace' => 'Health'], function() {
    Route::post('/', 'HomeController@postHealth');
});

//recent Activities
Route::group(['prefix' => 'activity', 'namespace' => 'Activity'], function() {
    Route::post('/', 'HomeController@postActivity');
});

// redirects
Route::get('/find-plans', 'HomeController@redirectQuote');
Route::get('/quotes', 'HomeController@redirectQuote');
Route::get('/news', 'HomeController@redirectNews');
Route::get('/blogs', 'HomeController@redirectBlogs');
