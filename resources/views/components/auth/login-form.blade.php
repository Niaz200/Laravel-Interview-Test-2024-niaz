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
                            <div class="loginForm__wrapper__remember single_input">
                                <div class="dashboard_checkBox">
                                    <!-- <input class="dashboard_checkBox__input" id="remember" type="checkbox">
                                    <label class="dashboard_checkBox__label" for="remember">Remember me</label> -->
                                </div>
                                <!-- forgetPassword -->
                                <div class="forgotPassword">
                                    <a href="{{url('/sendOtp')}}" class="forgotPass">Forgot passwords?</a>
                                </div>
                            </div>
                            <div class="btn_wrapper single_input">
                               
                                <button onclick="SubmitLogin()" class="cmn_btn w-100 radius-5">Sign In</button>
                            </div>
                            <div class="btn-wrapper mt-4">
                                <p class="loginForm__wrapper__signup"><span>Don’t have an account ? </span> <a href="{{url('/userRegistration')}}" class="loginForm__wrapper__signup__btn">Sign Up</a></p>
                                
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

  async function SubmitLogin() {
            let email=document.getElementById('email').value;
            let password=document.getElementById('password').value;

            if(email.length===0){
                errorToast("Email is required");
            }
            else if(password.length===0){
                errorToast("Password is required");
            }
            else{
                // showLoader();
                let res=await axios.post("/api/user-login",{email:email, password:password});
                // hideLoader()
                if(res.status===200 && res.data['status']==='success'){
                    setToken(res.data['token'])
                    window.location.href="/dashboard";
                }
                else{
                    errorToast(res.data['message']);
                }
            }
    }

</script>