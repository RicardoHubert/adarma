@if ($message = Session::get('success'))
    <div class="position-relative">
        <div class="position-absolute">
            <div class="row">
                <div class="col-lg-8 mx-auto fixed-top mt-5">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert" style="z-index: 1;">
                        <strong>Success!</strong> {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="position-relative">
        <div class="position-absolute">
            <div class="row">
                <div class="col-lg-8 mx-auto fixed-top mt-5">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="z-index: 1;">
                        <strong>Error!</strong> {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if ($message = Session::get('forbidden'))
    <div class="position-relative">
        <div class="position-absolute">
            <div class="row">
                <div class="col-lg-8 mx-auto fixed-top mt-5">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="z-index: 1;">
                        <strong>403</strong> {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="position-relative">
        <div class="position-absolute">
            <div class="row">
                <div class="col-lg-8 mx-auto fixed-top mt-5">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="z-index: 1;">
                        <strong>Error!</strong> Ada request yang kurang tepat! {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif