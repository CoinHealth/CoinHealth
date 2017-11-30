<template>
    <div class="family-history-form">
        <editable-panel :data="form" v-cloak  model="family-history" @save:family-history="save($event, 'family-history')">
            <span slot="panel-header">Family History</span>
            
            <div slot="view-body" class="view-form">
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>High blood pressure:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-for="(item, index) in patient.high_blood">
                            <span>{{ item }}</span><span v-if="index < patient.high_blood.length - 1">,&nbsp;</span>
                        </span>

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Heart attack:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text=""></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Stroke:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text=""></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Blood clots:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-for="(item, index) in patient.blood_clots">
                            <span>{{ item }}</span><span v-if="index < patient.blood_clots.length - 1">,&nbsp;</span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Bleeding tendency:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-for="(item, index) in patient.bleeding_tendency">
                            <span>{{ item }}</span><span v-if="index < patient.bleeding_tendency.length - 1">,&nbsp;</span>
                        </span>    
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Glaucoma:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-for="(item, index) in patient.glaucoma">
                            <span>{{ item }}</span><span v-if="index < patient.glaucoma.length - 1">,&nbsp;</span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Osteoporosis:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-for="(item, index) in patient.osteoporosis">
                            <span>{{ item }}</span><span v-if="index < patient.osteoporosis.length - 1">,&nbsp;</span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Hip fracture:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-for="(item, index) in patient.hip_fracture">
                            <span>{{ item }}</span><span v-if="index < patient.hip_fracture.length - 1">,&nbsp;</span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Diabetes:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-for="(item, index) in patient.diabetes">
                            <span>{{ item }}</span><span v-if="index < patient.diabetes.length - 1">,&nbsp;</span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Breast Cancer:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text=""></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Colorectal cancer: </label>
                    </div>
                    <div class="col-md-9">
                        <span v-for="(item, index) in patient.colorectal_cancer">
                            <span>{{ item }}</span><span v-if="index < patient.colorectal_cancer.length - 1">,&nbsp;</span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Ovarian cancer:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-for="(item, index) in patient.ovarian_cancer">
                            <span>{{ item }}</span><span v-if="index < patient.ovarian_cancer.length - 1">,&nbsp;</span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Other type of cancer:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-for="(item, index) in patient.other_type_of_cancer">
                            <span>{{ item }}</span><span v-if="index < patient.other_type_of_cancer.length - 1">,&nbsp;</span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Depression:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-for="(item, index) in patient.depression">
                            <span>{{ item }}</span><span v-if="index < patient.depression.length - 1">,&nbsp;</span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Other emotional problems:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-for="(item, index) in patient.other_emotional_problems">
                            <span>{{ item }}</span><span v-if="index < patient.other_emotional_problems.length - 1">,&nbsp;</span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Alzheimer's disease:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-for="(item, index) in patient.alzheimer_disease">
                            <span>{{ item }}</span><span v-if="index < patient.alzheimer_disease.length - 1">,&nbsp;</span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Domestic violence victim:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-for="(item, index) in patient.violence_victim">
                            <span>{{ item }}</span><span v-if="index < patient.violence_victim.length - 1">,&nbsp;</span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Domestic violence person:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-for="(item, index) in patient.violence_person">
                            <span>{{ item }}</span><span v-if="index < patient.violence_person.length - 1">,&nbsp;</span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Sexual abuse victim:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-for="(item, index) in patient.sexual_abuse_victim">
                            <span>{{ item }}</span><span v-if="index < patient.sexual_abuse_victim.length - 1">,&nbsp;</span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Sexual abuse person:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-for="(item, index) in patient.sexual_abuse_person">
                            <span>{{ item }}</span><span v-if="index < patient.sexual_abuse_person.length - 1">,&nbsp;</span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Alcoholism:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-for="(item, index) in patient.alcoholism">
                            <span>{{ item }}</span><span v-if="index < patient.alcoholism.length - 1">,&nbsp;</span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Drug abuse:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-for="(item, index) in patient.drug_abuse">
                            <span>{{ item }}</span><span v-if="index < patient.drug_abuse.length - 1">,&nbsp;</span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Other concern:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.other_concern"></span>
                    </div>
                </div>
            </div>

            <div slot="edit-body" class="edit-form">
                <p class="small">Please indicate the medications and supplements (such as vitamins, calcium, herbs, soy) you are currently using. Include prescription drugs and those purchased without a prescription. Medication / Supplement:</p>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>High blood pressure:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select placeholder="Select member"
                            v-model="form.high_blood"
                            @input="change(form.high_blood, 'high_blood')"
                            :multiple="true"
                            :hide-selected="true"
                            :options="defaults.family_members_list">
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Heart Attack (indicate age):</label>
                    </div>
                    <div class="col-md-9">
                        <family-members id="heart_attack" 
                            @checked="test($event)"
                            :members="defaults.defaultMembers" 
                            v-model="form.heart_attack">
                            <!-- v-model should be members -->
                        </family-members>
                        <!-- <checkbox-toggle :checked="member.age" :input-value="member.age" :key="member.id" v-for="member in data">{{ member.member }}</checkbox-toggle> -->
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Stroke (indicate age):</label>
                    </div>
                    <div class="col-md-9">
                        <family-members 
                            id="stroke" 
                            :members="defaults.defaultMembers">
                        </family-members>

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Blood clots:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select placeholder="Select member"
                            v-model="form.blood_clots"
                            @input="change(form.blood_clots, 'blood_clots')"
                            :multiple="true"
                            :hide-selected="true"
                            :options="defaults.family_members_list">
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Bleeding tendency:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select placeholder="Select member"
                            v-model="form.bleeding_tendency"
                            @input="change(form.bleeding_tendency, 'bleeding_tendency')"
                            :multiple="true"
                            :hide-selected="true"
                            :options="defaults.family_members_list">
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Glaucoma:</label>

                    </div>
                    <div class="col-md-9">
                        <multi-select placeholder="Select member"
                            v-model="form.glaucoma"
                            @input="change(form.glaucoma, 'glaucoma')"
                            :multiple="true"
                            :hide-selected="true"
                            :options="defaults.family_members_list">
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Osteoporosis:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select placeholder="Select member"
                            v-model="form.osteoporosis"
                            @input="change(form.osteoporosis, 'osteoporosis')"
                            :multiple="true"
                            :hide-selected="true"
                            :options="defaults.family_members_list">
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Hip fracture:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select placeholder="Select member"
                            v-model="form.hip_fracture"
                            @input="change(form.hip_fracture, 'hip_fracture')"
                            :multiple="true"
                            :hide-selected="true"
                            :options="defaults.family_members_list">
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Diabetes:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select placeholder="Select member"
                            v-model="form.diabetes"
                            @input="change(form.diabetes, 'diabetes')"
                            :multiple="true"
                            :hide-selected="true"
                            :options="defaults.family_members_list">
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Breast Cancer (indicate age):</label>
                    </div>
                    <div class="col-md-9">
                        <family-members 
                            id="breast_cancer" 
                            :members="defaults.defaultMembers">
                        </family-members>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Colorectal cancer:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select placeholder="Select member"
                            v-model="form.colorectal_cancer"
                            @input="change(form.colorectal_cancer, 'colorectal_cancer')"
                            :multiple="true"
                            :hide-selected="true"
                            :options="defaults.family_members_list">
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Ovarian cancer:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select placeholder="Select member"
                            v-model="form.ovarian_cancer"
                            @input="change(form.ovarian_cancer, 'ovarian_cancer')"
                            :multiple="true"
                            :hide-selected="true"
                            :options="defaults.family_members_list">
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Other type of cancer:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select placeholder="Select member"
                            v-model="form.other_type_of_cancer"
                            @input="change(form.other_type_of_cancer, 'other_type_of_cancer')"
                            :multiple="true"
                            :hide-selected="true"
                            :options="defaults.family_members_list">
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Depression:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select placeholder="Select member"
                            v-model="form.depression"
                            @input="change(form.depression, 'depression')"
                            :multiple="true"
                            :hide-selected="true"
                            :options="defaults.family_members_list">
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Other emotional problems:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select placeholder="Select member"
                            v-model="form.other_emotional_problems"
                            @input="change(form.other_emotional_problems, 'other_emotional_problems')"
                            :multiple="true"
                            :hide-selected="true"
                            :options="defaults.family_members_list">
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Alzheimer's disease:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select placeholder="Select member"
                            v-model="form.alzheimer_disease"
                            @input="change(form.alzheimer_disease, 'alzheimer_disease')"
                            :multiple="true"
                            :hide-selected="true"
                            :options="defaults.family_members_list">
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Domestic violence victim:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select placeholder="Select member"
                            v-model="form.violence_victim"
                            @input="change(form.violence_victim, 'violence_victim')"
                            :multiple="true"
                            :hide-selected="true"
                            :options="defaults.family_members_list">
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Domestic violence person:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select placeholder="Select member"
                            v-model="form.violence_person"
                            @input="change(form.violence_person, 'violence_person')"
                            :multiple="true"
                            :hide-selected="true"
                            :options="defaults.family_members_list">
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Sexual abuse victim:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select placeholder="Select member"
                            v-model="form.sexual_abuse_victim"
                            @input="change(form.sexual_abuse_victim, 'sexual_abuse_victim')"
                            :multiple="true"
                            :hide-selected="true"
                            :options="defaults.family_members_list">
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Sexual abuse person:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select placeholder="Select member"
                            v-model="form.sexual_abuse_person"
                            @input="change(form.sexual_abuse_person, 'sexual_abuse_person')"
                            :multiple="true"
                            :hide-selected="true"
                            :options="defaults.family_members_list">
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Alcoholism:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select placeholder="Select member"
                            v-model="form.alcoholism"
                            @input="change(form.alcoholism, 'alcoholism')"
                            :multiple="true"
                            :hide-selected="true"
                            :options="defaults.family_members_list">
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Drug abuse:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select placeholder="Select member"
                            v-model="form.drug_abuse"
                            @input="change(form.drug_abuse, 'drug_abuse')"
                            :multiple="true"
                            :hide-selected="true"
                            :options="defaults.family_members_list">
                        </multi-select>
                        <!-- @input="change" -->
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Any other family health history that concerns you, or that you would like to discuss?:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select placeholder="Select option"
                            v-model="form.other_concern"
                            :hide-selected="true"
                            :options="defaults.yesno">
                        </multi-select>
                    </div>
                </div>
            </div>
        </editable-panel>
    </div>
</template>

<script>
import FamilyMembers from '../../components/FamilyMembers.vue';
import CheckboxToggle from '../../helpers/CheckboxToggle.vue';
import EditablePanel from '../../helpers/EditablePanel2.vue';
import SelectDefault from '../../helpers/SelectDefault.vue';
import MultiSelect from 'vue-multiselect';
import axios from 'axios';
import Bus from '../../Bus.js';
export default {
    components: {
        'editable-panel': EditablePanel,
        'select-default': SelectDefault,
        'multi-select': MultiSelect,
        'family-members': FamilyMembers,
        'checkbox-toggle': CheckboxToggle,

    },

    props: {
        data: {
            type: Object,
            required: true,
        },

    },
   
    data () {
        return {
            patient: {
                high_blood: '',
                heart_attack: [],
                stroke: [],
                blood_clots: '',
                bleeding_tendency: '',
                glaucoma: '',
                osteoporosis: '',
                hip_fracture: '',
                diabetes: '',
                breast_cancer: [],
                colorectal_cancer: '',
                ovarian_cancer: '',
                other_type_of_cancer: '',
                depression: '',
                other_emotional_problems: '',
                alzheimer_disease: '',
                violence_victim: '',
                violence_person: '',
                sexual_abuse_victim: '',
                sexual_abuse_person: '',
                alcoholism: '',
                drug_abuse: '',
                other_concern: '',
            },
            form: {
                high_blood: '',
                heart_attack: [],
                stroke: [],
                blood_clots: '',
                bleeding_tendency: '',
                glaucoma: '',
                osteoporosis: '',
                hip_fracture: '',
                diabetes: '',
                breast_cancer: [],
                colorectal_cancer: '',
                ovarian_cancer: '',
                other_type_of_cancer: '',
                depression: '',
                other_emotional_problems: '',
                alzheimer_disease: '',
                violence_victim: '',
                violence_person: '',
                sexual_abuse_victim: '',
                sexual_abuse_person: '',
                alcoholism: '',
                drug_abuse: '',
                other_concern: '',
            },

           defaults: {
                family_members_list: "N/A,Father,Mother,Brother,Sister,Grandfather,Grandmother,Uncle,Aunt".split(','),
                family_members: [],
                yesno: "Yes,No".split(','),
                defaultMembers: [
                    {
                        member: 'Father',
                        age: 0,
                    },
                    {
                        member: 'Mother',
                        age: 0,
                    },
                    {
                        member: 'Brother',
                        age: 0,
                    },
                    {
                        member: 'Sister',
                        age: 0,
                    },
                    {
                        member: 'Grandfather',
                        age: 0,
                    },
                    {
                        member: 'Grandmother',
                        age: 0,
                    },
                    {
                        member: 'Uncle',
                        age: 0,
                    },
                    {
                        member: 'Auntie',
                        age: 0,
                    },
                ],
              
           },

        }
    },
    mounted () {
        Bus.$on('family-history-data', this.fill);
    },
    methods: {
        fill (data) {
            if ((typeof(data) !== 'undefined') && (data !== null)) {
                this.patient = data;
                this.form = _.clone(data);
            }
        },
        save (data, model) {
            let self = this;
            console.log(self.form);
            axios.post(`/profile/medical/${model}`, data)
                .then(response => {
                    if (response.data.success) {
                        this.patient = _.clone(this.form);
                        Bus.$emit(`form-saved:${model}`);
                    }
                })
                .catch(response => {
                    console.error(response);
                });

        } ,

        change (data, model) {
            var last = data.slice(-1)[0];
            var $vm0 = this.form[`${model}`];
            if(last == 'N/A') 
            {
                $vm0.length = 0;
                $vm0[0] = 'N/A';
            }
            else
            {
                if ( $.inArray('N/A', $vm0) >= 0) {
                    this.$delete($vm0, $vm0.indexOf('N/A') );
                }
            }
        },

    },
    computed: {
      
    },
    watch: {
        
    },
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
