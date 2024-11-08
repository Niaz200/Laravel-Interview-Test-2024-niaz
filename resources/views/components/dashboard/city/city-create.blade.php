<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Create City</h6>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">

                            <div class="col-12 p-1">
                                <label class="form-label">Country Name *</label>
                                <select type="text" class="form-control form-select" id="countryName">
                                    <option value="">Select Country</option>
                                </select>
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">State Name *</label>
                                <select type="text" class="form-control form-select" id="stateName">
                                    <option value="">Select State</option>
                                </select>
                            </div>


                            <div class="col-12 p-1">
                                <label class="form-label">City Name *</label>
                                <input type="text" class="form-control" id="cityName">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Save()" id="save-btn" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>



<script>
    FillCountryDropDown();
    async function FillCountryDropDown() {
        let res = await axios.get("/api/list-country", HeaderToken())
        res.data['rows'].forEach(function(item, i) {
            let option = `<option value="${item['id']}">${item['name']}</option>`
            $("#countryName").append(option);
        })
    }


    FillStateDropDown()
    async function FillStateDropDown() {
        let res = await axios.get("/api/list-state", HeaderToken())
        res.data['rows'].forEach(function(item, i) {
            let option = `<option value="${item['id']}">${item['name']}</option>`
            $("#stateName").append(option);
        })
    }


    async function Save() {
        try {
            let countryName = document.getElementById('countryName').value;
            let stateName = document.getElementById('stateName').value;
            let cityName = document.getElementById('cityName').value;

            document.getElementById('modal-close').click();
            let PostBody = {
                "name": cityName,
                "country_id": countryName,
                "state_id": stateName,
            }

            // Validation
            if (countryName.length === 0) {
                errorToast("Select Country Name is required");
                return;
            }


            if (stateName.length === 0) {
                errorToast("State Name is required");
                return;
            }

            if (cityName.length === 0) {
                errorToast("City Name is required");
                return;
            }

            // showLoader();
            let res = await axios.post("/api/create-city", PostBody, HeaderToken())
            document.getElementById("save-form").reset();
            // hideLoader();

            if (res.data['status'] === "success") {
                successToast(res.data['message'])
                await getList();
            } else {
                errorToast(res.data['message'])
            }

        } catch (e) {
            unauthorized(e.response.status)
        }
    }
</script>