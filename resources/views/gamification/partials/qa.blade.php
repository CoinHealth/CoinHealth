<div class="modal fade" id="modal-questions" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                    
                <button type="button" class="close" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <img src="/assets/icons/gamification-logo.png" class="icon">
                <p class="modal-title">What blood pressure reading is considered optimal or favorable?</p>
            </div>
            
            <div class="modal-body">
              <div class="row">
              
                <div class="choice-wrapper">
                  <div class="choice-template wrong">
                    <p class="choices">100/85</p>
                  </div>
                  <div class="choice-template">
                    <p class="choices">140/60</p>
                  </div>
                  <div class="choice-template right">
                    <p class="choices">120/80</p>
                  </div>
                  <div class="choice-template">
                    <p class="choices">130/90</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <div class="answer-wrapper">
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                    <circle class="path circle" fill="none" stroke="#ff8a00" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
                    <polyline class="path check" fill="none" stroke="#ff8a00" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
                  </svg>
                  <!-- <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                    <circle class="path circle" fill="none" stroke="#D06079" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
                    <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3"/>
                    <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2"/>
                  </svg> -->
                  <p class="answer">120/80</p>
                </div>
                <div class="trivia-wrapper">
                  <p class="tips">Tips on how to maintain normal blood pressure: </p>
                  <ul>
                    <li>Keep your weight at a healthy level</li>
                    <li>Go easy on the salt</li>
                    <li>Get 30 minutes of physical activity each day</li>
                    <li>Don't smoke tobacco and minimize exposure to seconhand smoke</li>
                  </ul>
                </div>
                <div>
                  <button type="button" class="btn btn-warning">Claim 100 points</button>
                </div>
            </div>


        </div>
    </div>
</div>
<div class="session-values">
    <input type="hidden" v-model="points" value="{{ session()->get('Points') }}" id="Points">
    <input type="hidden" v-model="award" value="{{ session()->get('Award') }}" id="Award">
</div>