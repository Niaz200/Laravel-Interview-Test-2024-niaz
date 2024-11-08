<section class="loginForm">
        <div class="loginForm__flex">
            <div class="loginForm__left">
                <div class="loginForm__left__inner desktop-center">
                    <div class="loginForm__header">
                        <h2 class="loginForm__header__title">Forgot Password</h2>
                        <p class="loginForm__header__para mt-3">Login with your data that you entered during registration.</p>
                    </div>
                    <div class="loginForm__wrapper mt-4">
                        <!-- Form -->
                        <form action="#" class="custom_form">
                            <div class="single_input">
                                <label class="label_title">Enter Email</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" type="email" id="email" placeholder="Enter email or phone">
                                    <div class="icon"><span class="material-symbols-outlined">mail</span></div>
                                </div>
                            </div>
                            <div class="btn_wrapper single_input d-flex gap-2">
                                <!-- <a href="mail_varification.html" class="cmn_btn w-100 radius-5">Submit</a> -->
                                <button onclick="SentOTP()"  class="cmn_btn w-100 radius-5">Submit</button>
                                <a href="{{url('/userLogin')}}" class="cmn_btn outline_btn w-100 radius-5">Cancel</a>
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
   async function SentOTP() {

       let postBody={"email":document.getElementById('email').value,}
    //    showLoader();
       let res=await axios.post("/api/send-otp",postBody);
    //    hideLoader()
       if(res.status===200 && res.data['status']==='success'){
           sessionStorage.setItem("email",document.getElementById('email').value);
           window.location.href="/verifyOtp";
       }
       else{
           errorToast(res.data['message']);
       }
    }
</script>