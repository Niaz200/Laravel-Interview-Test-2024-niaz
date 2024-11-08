<div class="dashboard__body posPadding">
    <div class="dashboard__inner">
        <div class="dashboard__inner__item">
            <div class="dashboard__inner__item__flex">
                <div class="dashboard__inner__item__left bodyItemPadding">
                    <div class="dashboard__inner__header">
                        <div class="dashboard__inner__header__flex">
                            <div class="dashboard__inner__header__left">
                                <!-- <h4 id="userName" class="dashboard__inner__header__title">Good Morning, Md Zahid</h4> -->
                                <h4 class="dashboard__inner__header__title">Good Morning, <span id="userName"></span></h4>

                                <p class="dashboard__inner__header__para">Manage your dashboard here</p>
                            </div>
                            <div class="dashboard__inner__header__right">
                                <div class="dashboard__inner__item__right recent_activities">
                                    <div class="btn-wrapper">
                                        <a href="javascript:void(0)" class="cmn_btn btn_small radius-5" id="activity_btn">Show Activities</a>
                                    </div>
                                    <div class="dashboard__recentActivities bg__white padding-20">
                                        <div class="dashboard__recentActivities__flex">
                                            <div class="dashboard__recentActivities__left">
                                                <h5 class="dashboard__recentActivities__title">Recent Activities</h5>
                                            </div>
                                            <span class="dashboard__recentActivities__close"><i class="material-symbols-outlined">close</i></span>
                                        </div>
                                        <div class="dashboard__recentActivities__inner mt-4">
                                            <div class="dashboard__recentActivities__item">
                                                <div class="dashboard__recentActivities__single">
                                                    <div class="dashboard__recentActivities__single__flex">
                                                        <div class="dashboard__recentActivities__single__thumb">
                                                            <a href="javascript:void(0)"><img src="html/assets/img/recent_activities/activities1.jpg" alt="activities"></a>
                                                        </div>
                                                        <div class="dashboard__recentActivities__single__contents">
                                                            <h6 class="dashboard__recentActivities__single__title"><a href="javascript:void(0)">Gown party wear is sold 01 piece</a></h6>
                                                            <p class="dashboard__recentActivities__single__time mt-2">10 Min ago</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dashboard__recentActivities__item">
                                                <div class="dashboard__recentActivities__single">
                                                    <div class="dashboard__recentActivities__single__flex">
                                                        <div class="dashboard__recentActivities__single__thumb">
                                                            <a href="javascript:void(0)"><img src="html/assets/img/recent_activities/activities2.jpg" alt="activities"></a>
                                                        </div>
                                                        <div class="dashboard__recentActivities__single__contents">
                                                            <h6 class="dashboard__recentActivities__single__title"><a href="javascript:void(0)">This product is running low on stock</a></h6>
                                                            <p class="dashboard__recentActivities__single__time mt-2">1 Hours ago</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dashboard__recentActivities__item">
                                                <div class="dashboard__recentActivities__single">
                                                    <div class="dashboard__recentActivities__single__flex">
                                                        <div class="dashboard__recentActivities__single__thumb">
                                                            <a href="javascript:void(0)"><img src="html/assets/img/recent_activities/activities3.jpg" alt="activities"></a>
                                                        </div>
                                                        <div class="dashboard__recentActivities__single__contents">
                                                            <h6 class="dashboard__recentActivities__single__title"><a href="javascript:void(0)">This product is added to stock</a></h6>
                                                            <p class="dashboard__recentActivities__single__time mt-2">2 Hours ago</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dashboard__recentActivities__item">
                                                <div class="dashboard__recentActivities__single">
                                                    <div class="dashboard__recentActivities__single__flex">
                                                        <div class="dashboard__recentActivities__single__thumb">
                                                            <a href="javascript:void(0)"><img src="html/assets/img/recent_activities/activities4.jpg" alt="activities"></a>
                                                        </div>
                                                        <div class="dashboard__recentActivities__single__contents">
                                                            <h6 class="dashboard__recentActivities__single__title"><a href="javascript:void(0)">Rafael is moved to Elgine St. Branch</a></h6>
                                                            <p class="dashboard__recentActivities__single__time mt-2">3 Hours ago</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dashboard__recentActivities__item">
                                                <div class="dashboard__recentActivities__single">
                                                    <div class="dashboard__recentActivities__single__flex">
                                                        <div class="dashboard__recentActivities__single__thumb">
                                                            <a href="javascript:void(0)"><img src="html/assets/img/recent_activities/activities5.jpg" alt="activities"></a>
                                                        </div>
                                                        <div class="dashboard__recentActivities__single__contents">
                                                            <h6 class="dashboard__recentActivities__single__title"><a href="javascript:void(0)">Robert F is added in Herbert St. Branch as General Staff</a></h6>
                                                            <p class="dashboard__recentActivities__single__time mt-2">4 Hours ago</p>
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

                    <div class="alert alert-danger mt-4 rounded-2 fw-bold">Please review the README file to fully understand your task.</div>

                 
                   
                </div>
            </div>
        </div>
    </div>
</div>





<script>
    getProfile();
    
    async function getProfile() {
        try {
            let res = await axios.get("/api/dashboard-details", HeaderToken());

            // Set the user’s name in the span with id `userName`
            document.getElementById('userName').innerText = res.data.name;
        } catch (e) {
            unauthorized(e.response.status);
        }
    }
</script>



   

