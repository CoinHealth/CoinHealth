<div class="search-view-box" :class="{ opaque: busy }" infinite-scroll-immediate-check="false" v-infinite-scroll="loadMore" infinite-scroll-disabled="busy" infinite-scroll-distance="0">

    <div v-show="!searchInput && isDirect" v-cloak class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>CareNow</strong> <br>start searching by selecting category and typing what you're looking for.
    </div>

    <div v-cloak v-show="!data.length && searchInput && !isDirect" class="alert alert-info alert-dismissible" role="alert">
        <strong>CareNow</strong> <br>No data found.
    </div>

    <div v-cloak v-show="searchCategory == 'Medication'" class="alert alert-info alert-dismissible" role="alert">
        <strong>CareNow</strong> <br>It is recommended to search from the symtoms category to get accurate results down to medications.
    </div>

    <div class="inner" v-show="!isDirect">

        <div v-if="dataSymptoms.length" class="condition-wrapper">
            <p class="search-title">Possible Symptoms</p>
            <ul class="condition data-list" :id="symptomData.letter" v-if="symptomData.data.length" v-for="symptomData in dataSymptoms">
                <li class="letter-header">@{{ symptomData.letter }}</li>
                <li v-for="symptom in symptomData.data">
                    <a href="#" @click.prevent="symptomModal(symptom)">
                        <i class="fa fa-lightbulb-o"></i>
                    </a>
                    <a href="#"
                        v-html="symptom._highlightResult.name.value"
                        v-on:click.prevent="showConditions(symptom,$event)"
                        data-next="condition">
                    </a>
                </li>
            </ul>
        </div>

        <div v-if="dataConditions.length" class="condition-wrapper">
            <p class="search-title">Possible Conditions</p>
            <ul class="condition data-list" :id="conditionData.letter" v-if="conditionData.data.length" v-for="conditionData in dataConditions">
                <li class="letter-header">@{{ conditionData.letter }}</li>
                <li v-for="condition in conditionData.data">
                    <a href="#"  @click.prevent="conditionModal(condition)">
                        <i class="fa fa-lightbulb-o"></i>
                    </a>
                    <a href="#"
                        v-html="condition._highlightResult ? condition._highlightResult.name.value : condition.name"
                        v-on:click.prevent="showDetails(condition,$event)">
                    </a>
                </li>
            </ul>
        </div>

        <div v-if="dataMedications.length && !suggestion" class="medications-wrapper">
            <p class="search-title">Possible Medications</p>
            <ul class="condition data-list" :id="medicationData.letter" v-if="medicationData.data.length" v-for="medicationData in dataMedications">
                <li class="letter-header">@{{ medicationData.letter }}</li>
                <li v-for="medication in medicationData.data">
                    <a href="#"
                        v-html="medication._highlightResult.generic_name.value"
                        v-on:click.prevent="medicationModal(medication,$event)">
                    </a>
                </li>
            </ul>
        </div>

        <div class="suggestion-wrapper" v-if="suggestion">
            <div class="treatment-wrapper">
                <p class="search-title">Suggested Treatment</p>
                <p class="search-content" v-html="suggestion.treatment"></p>
            </div>
            <div class="tests-wrapper" v-if="Array.isArray(suggestion.tests.tests) && suggestion.tests.tests.length">
                <p class="search-title">Suggested Tests</p>
                <ul class="search-tests">
                    <li v-for="test in suggestion.tests.tests" v-if="test">
                        @{{ test }}
                    </li>
                </ul>
            </div>
            <div class="doctors-wrapper">
                <div class="panel-group" role="tablist">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="collapseListGroupHeadingDoctor">
                            <h4 class="panel-title">
                                <a href="#collapseListGroupDoctor" class="" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="collapseListGroupDoctor">
                                    Suggested Doctors
                                </a>
                            </h4>
                        </div>
                        <div class="panel-collapse collapse" role="tabpanel" id="collapseListGroupDoctor" aria-labelledby="collapseListGroupHeadingDoctor" aria-expanded="true">
                            <div class="list-group"  v-for="specialistName in suggestion.tests.specialists">
                                <specialists v-on:showmodaldoctor="doctorModal" v-bind:name="specialistName"></specialists>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="facility-wrapper">
                <div class="panel-group" role="tablist">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="collapseListGroupHeadingFacility">
                            <h4 class="panel-title">
                                <a href="#collapseListGroupFacility" class="" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseListGroupFacility">
                                    Suggested Facilities
                                </a>
                            </h4>
                        </div>
                        <div class="panel-collapse collapse" role="tabpanel" id="collapseListGroupFacility" aria-labelledby="collapseListGroupHeadingFacility" aria-expanded="false">
                            <div class="list-group" v-for="facilityCategory in suggestion.facilities">
                                <facilitiies v-bind:location="location.state_code" v-on:showmodalfacility="facilityModal" v-bind:name="facilityCategory"></facilitiies>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="medications-wrapper">
                <div class="panel-group" role="tablist">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="collapseListGroupHeadingMedication">
                            <h4 class="panel-title">
                                <a href="#collapseListGroupMedication" class="" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseListGroupMedication">
                                    Suggested Medications
                                </a>
                            </h4>
                        </div>
                        <div class="panel-collapse collapse" role="tabpanel" id="collapseListGroupMedication" aria-labelledby="collapseListGroupHeadingMedication" aria-expanded="false">
                            <div class="list-group" v-for="(medications,category) in suggestion.medications">
                                <medications v-on:showmodalmedication="medicationModal" v-bind:names="medications" v-bind:category="category"></medications>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div v-show="endOfData" class="alert alert-info alert-dismissible" role="alert">
            <strong>CareNow</strong> <br>End of list
        </div>
        <div class="pulse-container" v-show="busy">
            <div id="busy-loader" class="loading-pulse"></div>
        </div>
    </div>
</div>
