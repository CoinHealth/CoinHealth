
<div slot="view-body" class="view-form">
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>High blood pressure::</label>
        </div>
        <div class="col-md-9">
            123cm
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Heart attack:</label>
        </div>
        <div class="col-md-9">
            Father (20)
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Stroke:</label>
        </div>
        <div class="col-md-9">
            c
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Blood clots:</label>
        </div>
        <div class="col-md-9">
            20
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Bleeding tendency:</label>
        </div>
        <div class="col-md-9">
            20
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Glaucoma:</label>
        </div>
        <div class="col-md-9">
            20
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Osteoporosis:</label>
        </div>
        <div class="col-md-9">
            20
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Hip fracture:</label>
        </div>
        <div class="col-md-9">
            20
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Diabetes:</label>
        </div>
        <div class="col-md-9">
            20
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Breast Cancer:</label>
        </div>
        <div class="col-md-9">
            20
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Colorectal cancer: </label>
        </div>
        <div class="col-md-9">
            20
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Ovarian cancer:</label>
        </div>
        <div class="col-md-9">
            20
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Other type of cancer:</label>
        </div>
        <div class="col-md-9">
            20
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Depression:</label>
        </div>
        <div class="col-md-9">
            20
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Other emotional problems:</label>
        </div>
        <div class="col-md-9">
            20
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Alzheimer's disease:</label>
        </div>
        <div class="col-md-9">
            20
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Domestic violence victim:</label>
        </div>
        <div class="col-md-9">
            20
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Domestic violence person:</label>
        </div>
        <div class="col-md-9">
            20
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Sexual abuse victim:</label>
        </div>
        <div class="col-md-9">
            20
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Sexual abuse person:</label>
        </div>
        <div class="col-md-9">
            20
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Alcoholism:</label>
        </div>
        <div class="col-md-9">
            20
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Drug abuse:</label>
        </div>
        <div class="col-md-9">

        </div>
    </div>
</div>

<div slot="edit-body" class="edit-form">
    {{-- <p>Sorry under construction right now. Be right back.</p> --}}
    <p class="small">Please indicate the medications and supplements (such as vitamins, calcium, herbs, soy) you are currently using. Include prescription drugs and those purchased without a prescription. Medication / Supplement:</p>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>High blood pressure:</label>
        </div>
        <div class="col-md-9">
            <multi-select placeholder="Select member"
                :multiple="true"
                :hide-selected="true"
                :data="defaults.family_members_list">
            </multi-select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Heart Attack (indicate age):</label>
        </div>
        <div class="col-md-9">
            <family-members id="heart_attack" :members="defaults.family_members"></family-members>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Stroke (indicate age):</label>
        </div>
        <div class="col-md-9">
            <family-members id="stroke" :members="defaults.family_members"></family-members>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Blood clots:</label>
        </div>
        <div class="col-md-9">
            <multi-select placeholder="Select member"
                :multiple="true"
                :hide-selected="true"
                :data="defaults.family_members_list">
            </multi-select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Bleeding tendency:</label>
        </div>
        <div class="col-md-9">
            <multi-select placeholder="Select member"
                :multiple="true"
                :hide-selected="true"
                :data="defaults.family_members_list">
            </multi-select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Glaucoma:</label>

        </div>
        <div class="col-md-9">
            <multi-select placeholder="Select member"
                :multiple="true"
                :hide-selected="true"
                :data="defaults.family_members_list">
            </multi-select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Osteoporosis:</label>
        </div>
        <div class="col-md-9">
            <multi-select placeholder="Select member"
                :multiple="true"
                :hide-selected="true"
                :data="defaults.family_members_list">
            </multi-select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Hip fracture:</label>
        </div>
        <div class="col-md-9">
            <multi-select placeholder="Select member"
                :multiple="true"
                :hide-selected="true"
                :data="defaults.family_members_list">
            </multi-select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Diabetes:</label>
        </div>
        <div class="col-md-9">
            <multi-select placeholder="Select member"
                :multiple="true"
                :hide-selected="true"
                :data="defaults.family_members_list">
            </multi-select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Breast Cancer (indicate age):</label>
        </div>
        <div class="col-md-9">
            <family-members id="breast_cancer" :members="defaults.family_members"></family-members>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Colorectal cancer:</label>
        </div>
        <div class="col-md-9">
            <multi-select placeholder="Select member"
                :multiple="true"
                :hide-selected="true"
                :data="defaults.family_members_list">
            </multi-select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Ovarian cancer:</label>
        </div>
        <div class="col-md-9">
            <multi-select placeholder="Select member"
                :multiple="true"
                :hide-selected="true"
                :data="defaults.family_members_list">
            </multi-select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Other type of cancer:</label>
        </div>
        <div class="col-md-9">
            <multi-select placeholder="Select member"
                :multiple="true"
                :hide-selected="true"
                :data="defaults.family_members_list">
            </multi-select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Depression:</label>
        </div>
        <div class="col-md-9">
            <multi-select placeholder="Select member"
                :multiple="true"
                :hide-selected="true"
                :data="defaults.family_members_list">
            </multi-select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Other emotional problems:</label>
        </div>
        <div class="col-md-9">
            <multi-select placeholder="Select member"
                :multiple="true"
                :hide-selected="true"
                :data="defaults.family_members_list">
            </multi-select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Alzheimer's disease:</label>
        </div>
        <div class="col-md-9">
            <multi-select placeholder="Select member"
                :multiple="true"
                :hide-selected="true"
                :data="defaults.family_members_list">
            </multi-select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Domestic violence victim:</label>
        </div>
        <div class="col-md-9">
            <multi-select placeholder="Select member"
                :multiple="true"
                :hide-selected="true"
                :data="defaults.family_members_list">
            </multi-select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Domestic violence person:</label>
        </div>
        <div class="col-md-9">
            <multi-select placeholder="Select member"
                :multiple="true"
                :hide-selected="true"
                :data="defaults.family_members_list">
            </multi-select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Sexual abuse victim:</label>
        </div>
        <div class="col-md-9">
            <multi-select placeholder="Select member"
                :multiple="true"
                :hide-selected="true"
                :data="defaults.family_members_list">
            </multi-select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Sexual abuse person:</label>
        </div>
        <div class="col-md-9">
            <multi-select placeholder="Select member"
                :multiple="true"
                :hide-selected="true"
                :data="defaults.family_members_list">
            </multi-select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Alcoholism:</label>
        </div>
        <div class="col-md-9">
            <multi-select placeholder="Select member"
                :multiple="true"
                :hide-selected="true"
                :data="defaults.family_members_list">
            </multi-select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Drug abuse:</label>
        </div>
        <div class="col-md-9">
            <multi-select placeholder="Select member"
                :multiple="true"
                :hide-selected="true"
                :data="defaults.family_members_list">
            </multi-select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Any other family health history that concerns you, or that you would like to discuss?:</label>
        </div>
        <div class="col-md-9">
            <select-default match-value="Yes" classes="form-control input-sm"  :options="defaults.yesno" >
                <input slot="matched-element" placeholder type="text" class="form-control input-sm">
            </select-default>
        </div>
    </div>



</div>
