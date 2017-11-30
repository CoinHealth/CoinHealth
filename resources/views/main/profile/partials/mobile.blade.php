<ul class="nav nav-tabs" id="myTabmobile">
  <li class="active">
    <a data-target="#mobiledocuments" data-toggle="tab">
      <img src="/assets/icons/folder.png" alt=""><br>
      <span>DOCUMENTS</span>
    </a>
  </li>
  <li>
    <a data-target="#mobileactivity" data-toggle="tab" href="#activity">
      <img src="/assets/icons/ok.png" alt=""><br>
      <span>ACTIVITY</span>
    </a>
  </li>
</ul>

<div class="tab-content">
  <div class="tab-pane active" id="mobiledocuments">
    <div class="row">
      <div class="logomobile">
        <img src="/assets/icons/mobile-logo.png" alt="">
      </div>
      <div class="name">
        <p class="name">
          JOHN SMITH
        </p>
        <p class="state">
          Los Angeles, CA
        </p>
      </div>
      <div class="pull-right">
        <div id="dl-menu" class="dl-menuwrapper">
          <button class="dl-trigger"><i class="fa fa-lg fa-cog" aria-hidden="true"></i><i class="fa fa-caret-down" aria-hidden="true"></i></button>
          <ul class="dl-menu">
            <li>
              <a href="#">Settings 1</a>
            </li>
            <li>
              <a href="#">Settings 2</a>
            </li>
            <li>
              <a href="#">Settings 3</a>
            </li>
            <li>
              <a href="#">Settings 4</a>
            </li>
          </ul>
        </div><!-- /dl-menuwrapper -->
      </div>
    </div>

    <div class="row upload-image">
      <a href="#">
        <img src="/assets/icons/upmobile.png" alt="" class="img-circle">
      </a>
    </div>
    <div class="sc-container">
      <div class="row">
        <div class="col-sm-4 col-xs-4">
          <div class="status-box">
            <p class="s-number">2,027 Total</p>
            <p class="s-cat">Total Contributions</p>
          </div>
        </div>
        <div class="col-sm-4 col-xs-4 sc-middle">
          <div class="status-box">
            <p class="s-number">162 Days</p>
            <p class="s-cat">Days Active</p>
          </div>
        </div>
        <div class="col-sm-4 col-xs-4">
          <div class="status-box">
            <p class="s-number">13 People</p>
            <p class="s-cat">Referred Users</p>
          </div>
        </div>
      </div>
    </div>

    <div class="viewing-container">
      <div class="col-sm-12 col-xs-12">
        <div class="view-doc-row">
          <div class="panel panel-default">
            <div class="panel-heading">View</div>
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                  <div class="box">
                    <img src="/assets/icons/doc.png" alt="">
                    <div class="box-cat">
                      Receipts
                    </div>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                  <div class="box">
                    <img src="/assets/icons/doc.png" alt="">
                    <div class="box-cat">
                      Receipts
                    </div>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                  <div class="box">
                    <img src="/assets/icons/doc.png" alt="">
                    <div class="box-cat">
                      Receipts
                    </div>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                  <div class="box">
                    <img src="/assets/icons/doc.png" alt="">
                    <div class="box-cat">
                      Receipts
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="upload-doc-row">
          <div class="panel panel-default">
            <div class="panel-heading">Upload</div>
            <div class="panel-body">
              <div class="row row-doc">
                <div class="col-sm-4 col-xs-4">
                  <span class="doc">Document 1</span>
                </div>
                <div class="col-sm-4 col-xs-4">
                  <span class="success">Attached</span>
                </div>
                <div class="col-sm-4 col-xs-4">
                  <a href="javascript:void(0)" class="close-x">x</a>
                </div>
              </div>

              <div class="row row-doc">
                <div class="col-sm-4 col-xs-4">
                  <span class="doc">Document 2</span>
                </div>
                <div class="col-sm-4 col-xs-4">
                  <span class="success">Attached</span>
                </div>
                <div class="col-sm-4 col-xs-4">
                  <a href="javascript:void(0)" class="close-x">x</a>
                </div>
              </div>

              <div class="row row-doc">
                <div class="col-sm-4 col-xs-4">
                  <span class="doc">Document 3</span>
                </div>
                <div class="col-sm-4 col-xs-4">
                  <span class="process">Attaching...</span>
                </div>
                <div class="col-sm-4 col-xs-4">
                  <a href="javascript:void(0)" class="close-x">x</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Application Form</h4>
              </div>

              <!-- START OF MODAL BODY-->

              <div class="modal-body">
                <p>
                  <a href="#" data-toggle="modal" data-target="#upload-avatar" class="button"><i class="fa fa-plus"></i> Upload new avatar</a>
                </p>
              </div>

              <!-- END OF APPLICATION FORM MODAL BODY -->

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->


          <!--Modal for uploading photo-->
          <div class="modal" id="upload-avatar" tabindex="-1" role="dialog" aria-labelledby="upload-avatar-title" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title" id="upload-avatar-title">Upload new avatar</h4>
                </div>
                <div class="modal-body">
                  <p>Please choose a file to upload. JPG, PNG, GIF only.</p>
                  <form role="form">
                    <div class="form-group">
                      <label for="file">File input</label>
                      <input type="file" id="file">
                      <p class="help-block">Files up to 5Mb only.</p>
                    </div>
                    <button type="button" class="hl-btn hl-btn-default" id="btnUploadCancel">Cancel</button>
                    <button type="button" class="hl-btn hl-btn-green">Upload</button>
                  </form>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div>
        </div>
        <div id="push"></div>
      </div>
    </div>

    <div class="button-container">
      <div class="row">
        <div class="col-sm-6 col-xs-6 pad-right">
          <a href="javascript:void(0);" class="btn-upload form-control" data-toggle="modal" data-target="#myModal">UPLOAD</a>
        </div>
        <div class="col-sm-6 col-xs-6 pad-left">
          <a href="javascript:void(0);" class="btn-view form-control">VIEW DOCUMENTS</a>
        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane" id="mobileactivity">
    <div class="row">
      <div class="logomobile">
        <img src="/assets/icons/mobile-logo.png" alt="">
      </div>
      <div class="name">
        <p class="name">
          JOHN SMITH
        </p>
        <p class="state">
          Los Angeles, CA
        </p>
      </div>
      <div class="pull-right">
        <div id="dl-menu" class="dl-menuwrapper">
          <button class="dl-trigger"><i class="fa fa-lg fa-cog" aria-hidden="true"></i><i class="fa fa-caret-down" aria-hidden="true"></i></button>
          <ul class="dl-menu">
            <li>
              <a href="#">Settings 1</a>
            </li>
            <li>
              <a href="#">Settings 2</a>
            </li>
            <li>
              <a href="#">Settings 3</a>
            </li>
            <li>
              <a href="#">Settings 4</a>
            </li>
          </ul>
        </div><!-- /dl-menuwrapper -->
      </div>
    </div>

    <div class="row upload-image">
      <a href="#">
        <img src="/assets/icons/upmobile.png" alt="" class="img-circle">
      </a>
    </div>
    <div class="sc-container">
      <div class="row">
        <div class="col-sm-4 col-xs-4">
          <div class="status-box">
            <p class="s-number">2,027 Total</p>
            <p class="s-cat">Total Contributions</p>
          </div>
        </div>
        <div class="col-sm-4 col-xs-4 sc-middle">
          <div class="status-box">
            <p class="s-number">162 Days</p>
            <p class="s-cat">Days Active</p>
          </div>
        </div>
        <div class="col-sm-4 col-xs-4">
          <div class="status-box">
            <p class="s-number">13 People</p>
            <p class="s-cat">Referred Users</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row-panel-activity">
      <div class="col-md-6">
        <div class="panel panel-default panel-auto">
          <div class="panel-heading panel-grey">
            Recent Activities
          </div>
          <div class="panel-body">
            <div class="row row-activities">
              <div class="col-md-12">
                <div class="act-title">
                  <p>quote engine</p>
                </div>
                <div class="act-desc">
                  <p>application submitted, pending approval</p>
                </div>
              </div>
            </div>
            <div class="row row-activities">
              <div class="col-md-12">
                <div class="act-title">
                  <p>news / blog</p>
                </div>
                <div class="act-desc">
                  <p>shared article <a href="#">www.health.com</a></p>
                </div>
              </div>
            </div>
            <div class="row row-activities">
              <div class="col-md-12">
                <div class="act-title">
                  <p>social media</p>
                </div>
                <div class="act-desc">
                  <p>shared blog <a href="#">www.facebook.com/careparrot</a></p>
                </div>
              </div>
            </div>
            <div class="row row-activities">
              <div class="col-md-12">
                <div class="act-title">
                  <p>community</p>
                </div>
                <div class="act-desc">
                  <p>added friend <a href="#">www.careparrot.com/janedoe</a></p>
                </div>
              </div>
            </div>
            <div class="row row-activities">
              <div class="col-md-12">
                <div class="act-title">
                  <p>uploads</p>
                </div>
                <div class="act-desc">
                  <p>medical certificate <a href="#">more...</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
