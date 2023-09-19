@if ($message = Session::get('success'))
    <div class="position-relative container" style="z-index: 1">
        <div class="row">
            <div class="position-absolute">
                <div class="mt-5 d-flex justify-content-center">
                    <div class="col-md-8">
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="position-relative container" style="z-index: 1">
        <div class="row">
            <div class="position-absolute">
                <div class="mt-5 d-flex justify-content-center">
                    <div class="col-md-8">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="position-relative container" style="z-index: 1">
        <div class="row">
            <div class="position-absolute">
                <div class="mt-5 d-flex justify-content-center">
                    <div class="col-md-8">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Ada request yang kurang tepat! {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif