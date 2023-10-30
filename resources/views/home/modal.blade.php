  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 100%; width: 80%;" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                  <div class="card mb-4">
                    <div class="card-header"><strong>@yield('modal_head')</strong></div>
                    <div class="card-body">
                      <div class="example">
                        <div class="tab-content rounded-bottom">
                           @yield('modal_body')
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>

      </div>
    </div>
  </div>
