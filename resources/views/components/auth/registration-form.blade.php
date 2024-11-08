<section class="loginForm">
        <div class="loginForm__flex">
            <div class="loginForm__left">
                <div class="loginForm__left__inner desktop-center">
                    <div class="loginForm__header">
                        <h2 class="loginForm__header__title">Welcome Back</h2>
                        <p class="loginForm__header__para mt-3">Login with your data that you entered during registration.</p>
                    </div>
                    <div class="loginForm__wrapper mt-4">
                        <!-- Form -->
                        <form action="#" class="custom_form">
                            <div class="single_input">
                                <label class="label_title">Name</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" type="text" name="name" id="name" placeholder="Enter your Full Name">
                                    <div class="icon"><span class="material-symbols-outlined">person</span></div>
                                </div>
                            </div>
                            <div class="single_input">
                                <label class="label_title">Email</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" type="email" name="email" id="email" placeholder="Enter your email address">
                                    <div class="icon"><span class="material-symbols-outlined">mail</span></div>
                                </div>
                            </div>
                            <div class="single_input">
                                <label class="label_title">Password</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" type="password" name="password" id="password" placeholder="Enter your password">
                                    <div class="icon"><span class="material-symbols-outlined">lock</span></div>
                                </div>
                            </div>
                            <div class="single_input">
                                <label class="label_title">Confirm Password</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" type="password" name="password_confirmation" id="password_confirmation" placeholder="confirm password">
                                    <div class="icon"><span class="material-symbols-outlined">lock</span></div>
                                </div>
                            </div>
                            <div class="btn_wrapper single_input">
                             
                                <button onclick="onRegistration()" class="cmn_btn w-100 radius-5">Sign Up</button>
                            </div>
                            <div class="btn-wrapper mt-4">
                                <p class="loginForm__wrapper__signup"><span>Already have an Account?  </span> <a href="{{url('/userLogin')}}" class="loginForm__wrapper__signup__btn">Sign In</a></p>
                                <div class="loginForm__wrapper__another d-flex flex-column gap-2 mt-3">
                                    <a href="javascript:void(0)" class="loginForm__wrapper__another__btn radius-5 w-100"><img src="html/assets/img/icon/googleIocn.svg" alt="" class="icon"> Login With Google</a>
                                    <a href="javascript:void(0)" class="loginForm__wrapper__another__btn radius-5 w-100"><img src="html/assets/img/icon/fbIcon.svg" alt="" class="icon">Login With Facebook</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="loginForm__right loginForm__bg " style="background-image: url(html/assets/img/login.jpg);">
                <div class="loginForm__right__logo">
                    <div class="loginForm__logo">
                        <a href="index.html"><img src="html/assets/img/logo.webp" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <script>

  async function onRegistration() {


            let name = document.getElementById('name').value;
            let email = document.getElementById('email').value;
            let password = document.getElementById('password').value;
            let password_confirmation = document.getElementById('password_confirmation').value;

          // Validation
            if (name.length === 0) {
                errorToast("Name is required");
                return;
            }
             if (email.length === 0) {
                errorToast("Email is required");
                return;
            }
             if (password.length === 0) {
                errorToast("Password is required");
                return;
            }
             if (password_confirmation.length === 0) {
                errorToast("Confirm password is required");
                return;
            }
             if (password !== password_confirmation) {
                errorToast("Passwords do not match");
                return;
            }


                let postBody = {
                    name: name,
                    email: email,
                    password: password,
                    password_confirmation: password_confirmation
                };

                    //   showLoader();
                let res=await axios.post("/api/user-registration",postBody);
                //   hideLoader()
                if(res.status===200 && res.data['status']==='success'){
                    window.location.href="/userLogin";
                }
                else{
                    errorToast(res.data['message']);
                }

            
           

  }


</script>