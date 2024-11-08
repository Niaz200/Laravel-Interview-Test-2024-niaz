<section class="loginForm">
        <div class="loginForm__flex">
            <div class="loginForm__left">
                <div class="loginForm__left__inner desktop-center">
                    <div class="loginForm__header">
                        <h4 class="loginForm__header__title">SET NEW PASSWORD</h4>
                      
                    </div>
                    <div class="loginForm__wrapper mt-4">
                        <!-- Form -->
                        <form action="#" class="custom_form">
                            <div class="single_input">
                                <label class="label_title">New Password</label>
                                <div class="include_icon">
                                    <input id="password" name="password"  class="form--control radius-5" type="password" placeholder="Enter New Password">
                                    
                                </div>
                            </div>

                            <div class="single_input">
                                <label class="label_title">Confirm Password</label>
                                <div class="include_icon">
                                    <input name="password_confirmation" id="password_confirmation"  class="form--control radius-5" type="password" placeholder="Confirm Password">
                                    
                                </div>
                            </div>

                            <div class="btn_wrapper single_input d-flex gap-2">
                               
                                <button onclick="ResetPass()" class="cmn_btn w-100 radius-5">Submit</button>
                            
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
  async function ResetPass() {
    //   let postBody={"password":document.getElementById('password').value}
      let password = document.getElementById('password').value;
      let password_confirmation = document.getElementById('password_confirmation').value;

       // Perform client-side validation
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


        // Create the post body to be sent
        let postBody = { "password": password, "password_confirmation": password_confirmation };

      // showLoader();
      let res=await axios.post("/api/reset-password",postBody,HeaderToken());
      // hideLoader()

      if(res.status===200 && res.data['status']==='success'){
          window.location.href="/dashboard";
      }
      else{
          errorToast(res.data['message']);
      }

    }
</script>