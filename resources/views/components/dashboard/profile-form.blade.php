<div class="dashboard__body">
    <div class="dashboard__inner">
        <div class="row g-4">
            <div class="col-xxl-6 col-lg-12">
                <div class="dashboard__card bg__white padding-20 radius-10">
                    <div class="dashboard__card__header">
                        <h4 class="dashboard__card__header__title">User Profile</h4>
                    </div>
                    <div class="dashboard__card__inner mt-4">
                        <div class="form__input">
                            <form action="#">
                                <div class="form__input__flex">
                                    <div class="container-fluid m-0 p-0">


                                        <div class="form__input__single">
                                            <label for="email" class="form__input__single__label">Type Email</label>
                                            <input readonly id="email" type="text" id="email" class="form__control radius-5">
                                        </div>

                                        <div class="form__input__single mt-3">
                                            <label for="name" class="form__input__single__label "> Name</label>
                                            <input type="text" id="name" class="form__control radius-5">
                                        </div>

                                        <div class="form__input__single mt-3">
                                            <label for="password" class="form__input__single__label">Type Password</label>
                                            <input type="password" id="password" class="form__control radius-5">
                                        </div>


                                        


                                    </div>


                                    <div class="form__input__single">
                                        <div class="col-md-4 p-2 mt-2">
                                            <!-- Make sure to add type="button" to prevent form submission -->
                                            <button type="button" onclick="onUpdate()" class="btn mt-3 w-100 bg-gradient-primary">Update</button>
                                        </div>
                                    </div>




                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>



<script>
    getProfile();
    async function getProfile() {
        try {
            // showLoader();
            let res = await axios.get("/api/user-profile", HeaderToken());
            // hideLoader();
            document.getElementById('email').value = res.data['email'];
            document.getElementById('name').value = res.data['name'];
            document.getElementById('password').value = res.data['password'];

        } catch (e) {
            unauthorized(e.response.status)
        }
    }

    async function onUpdate(){
        let PostBody={
            "name":document.getElementById('name').value,
            "password":document.getElementById('password').value,
  
        }

        
        // showLoader();
        let res=await axios.post("/api/user-update",PostBody,HeaderToken());
        // hideLoader();
        if(res.data['status']==="success"){
            successToast(res.data['message'])
            await getProfile();
        }
        else {
            successToast(res.data['message'])
        }


    }
</script>