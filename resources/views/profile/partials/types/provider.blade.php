<div class="provider-container" v-if="">
    <div class="row mt-5">
        <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
            <p>Job Title:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-7 ans" v-if="providers.user">
            <p v-show="!editMode" v-cloak>@{{ providers.user.job_title }}</p>
            <div class="form-group" v-cloak v-show="editMode">
                <select
                    v-model="providers.user.job_title"
                    class="form-control">
                    <option>Provider/Staff (Hospital)</option>
                    <option>Provider/Staff (Private)</option>
                    <option>Patients/Interview Candidate</option>
                    <option>Educator/Student</option>
                    <option>API/Developer</option>
                    <option>Other</option>
                </select>
            </div>
        </div>
    </div>


    <div class="branches-container" v-if="providers.providers">

        <div class="row">
            <div class="col-md-12">

                <clinic @clinic-save="saveClinic" v-if="!seeAll" :data="providers.providers[0]"></clinic>
                <transition-group name="popup">
                    <clinic v-if="seeAll" @clinic-save="saveClinic" :data="provider" :key="provider.id" v-for="provider in providers.providers"></clinic>
                </transition-group>
                <p><a href="#" @click.prevent="toggleSeeMore" class="small btn-link">@{{ seemore }}</a></p>

            </div>
        </div>

    </div>
</div>
