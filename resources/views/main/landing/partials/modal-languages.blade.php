<div class="modal fade" id="languagesModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
        <!-- <div class="modal-header">
          <h3>Select your language</h3>
        </div> -->
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 languages-wrapper" align="center">
              <!-- <label>{{ session('locale') }}</label> -->
               <h4>
                <a href="/lang/{{ session('locale') === 'ar' ? 'en' : 'ar' }}" class="{{ session('locale') === 'ar' ? 'used' : '' }}">أربيك</a>
              </h4>
              <h4>
                <a href="/lang/{{ session('locale') === 'zh' ? 'en' : 'zh' }}" class="{{ session('locale') === 'zh' ? 'used' : '' }}">汉语</a>
              </h4>
              <h4>
                <a href="/lang/{{ session('locale') === 'en' ? 'en' : 'en' }}" class="{{ session('locale') === 'en' ? 'used' : '' }}">English</a>
              </h4>
              <h4>
                <a href="/lang/{{ session('locale') === 'es' ? 'en' : 'es' }}"  class="{{ session('locale') === 'es' ? 'used' : '' }}">Español</a>
              </h4>
              <h4>
                <a href="/lang/{{ session('locale') === 'fr' ? 'en' : 'fr' }}"  class="{{ session('locale') === 'fr' ? 'used' : '' }}">Français</a>
              </h4>
            </div>
          </div>
        </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>
