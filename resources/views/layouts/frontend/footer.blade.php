<footer class="bg-green mt-5 mt-auto">
    <div class="container">
        <div class="row justify-content-md-between pb-5">
            <div class="col-md-3 col mt-5 d-flex flex-md-column justify-content-between justify-content-md-start align-items-center">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('images/logo.png') }}" class="logo-responsive-foot" width="70" height="70">
                </div>
                <div class="d-flex mt-md-4">
                    <a href="https://www.instagram.com/" target="_blank" class="mx-3" style="text-decoration: none; color:black;">
                        <i class="fa fa-instagram fa-md-lg bg-white rounded-circle icon-sosmed-ig" style="padding: 10px 10px;" aria-hidden="true"></i>
                    </a>
                    <a href="https://www.facebook.com/" target="_blank" class="mx-3" style="text-decoration: none; color:black;">
                        <i class="fa fa-facebook fa-md-lg bg-white rounded-circle icon-sosmed-fb" style="padding: 10px 12px;" aria-hidden="true"></i>
                    </a>
                    <a href="https://twitter.com/" target="_blank" class="mx-3" style="text-decoration: none; color:black;">
                        <i class="fa fa-twitter fa-md-lg bg-white rounded-circle icon-sosmed-tw" style="padding: 10px 9px;" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

            <div class="d-flex justify-content-between text-white col-md-6 mt-5">
                <div>
                    <p class="fw-bold subtitle-1">About</p>
                    <div class="d-flex flex-column">
                        <p>
                            <a href="{{ url('/#about') }}" class="text-white subtitle-1" style="text-decoration: none;">About Us</a>
                        </p>
                    </div>
                </div>
                <div>
                    <p class="fw-bold subtitle-1">Information</p>
                    <div class="d-flex flex-column">
                        <p>
                            <a href="#" class="text-white subtitle-1" style="text-decoration: none;">Contact</a>
                        </p>
                        <p>
                            <a href="#" class="text-white subtitle-1" style="text-decoration: none;">Partnership</a>
                        </p>
                    </div>
                </div>
                <div>
                    <div class="d-flex flex-column">
                        <p class="fw-bold subtitle-1 subtitle-1">Bantuan</p>
                        <p>
                            <a href="#" class="text-white subtitle-1" style="text-decoration: none;">FAQ</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mt-5">
                <div class="text-white">
                    <p class="fw-bold subtitle-1">Feedback</p>
                    <p class="subtitle-1">Questions or suggestions,
                        can be submitted via
                        email
                        by the following column</p>
                    <div class="input-group">
                        <input type="text" name="email-send" class="form-control subtitle-1 input-email" placeholder="Email Address" style="border-radius: 25px 0 0 25px; box-shadow: none; border: none;">
                        <button class="btn bg-white border-0 input-email" type="button" id="button-addon2"  style="border-radius: 0 25px 25px 0;">
                            <img src="{{ asset('images/button-send.png') }}" alt="" class="" width="30">
                        </button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</footer>