<div class="modal fade" id="modal-gamification" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                    
                <button type="button" class="close" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <img src="/assets/icons/gamification-logo.png" class="icon">
            </div>
            
            <div class="modal-body">
                
               <p class="points">500</p>
               <p class="lbl-points">CP Points</p>
               <p class="points-desc">For keeping your account up to date</p>

               <p class="msg">You can redeem cool freebies from Careparrot and affiliates when you reach a certain bracket</p>

               <button class="btn-orange" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>
<div class="session-values">
    <input type="hidden" v-model="points" value="{{ session()->get('Points') }}" id="Points">
    <input type="hidden" v-model="award" value="{{ session()->get('Award') }}" id="Award">
</div>