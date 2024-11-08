<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update City</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">

                            <div class="col-12 p-1">
                                <label class="form-label">Country Name *</label>
                                <select type="text" class="form-control form-select" id="cityCountryUpdate">
                                    <!-- <option value="">Select Country</option> -->
                                </select>

                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">State</label>
                                <select type="text" class="form-control form-select" id="cityStateUpdate">
                                    <!-- <option value="">Select State</option> -->
                                </select>

                            </div>

                            <div class="col-12 p-1">

                                <label class="form-label mt-2">Name</label>
                                <input type="text" class="form-control" id="cityNameUpdate">
                                <input type="text" class="d-none" id="updateID">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="update()" id="update-btn" class="btn bg-gradient-success">Update</button>
            </div>

        </div>
    </div>
</div>




<script>
    async function UpdateFillCountryDropDown() {

        let cityCountryDropdown = $("#cityCountryUpdate");

        // Clear existing options to prevent duplication
        cityCountryDropdown.empty();

        // Add a default placeholder option
        cityCountryDropdown.append('<option value="">Select Country</option>');



        let res = await axios.get("/api/list-country", HeaderToken())

        res.data['rows'].forEach(function(item, i) {
            let option = `<option value="${item['id']}">${item['name']}</option>`
            $("#cityCountryUpdate").append(option);
        })
    }



    async function UpdateFillStateDropDown() {

        let cityStateDropdown = $("#cityStateUpdate");

        // Clear existing options to prevent duplication
        cityStateDropdown.empty();

        // Add a default placeholder option
        cityStateDropdown.append('<option value="">Select Country</option>');

        let res = await axios.get("/api/list-state", HeaderToken())

        res.data['rows'].forEach(function(item, i) {
            let option = `<option value="${item['id']}">${item['name']}</option>`
            $("#cityStateUpdate").append(option);
        })
    }


    async function FillUpUpdateForm(id) {
        try {
            document.getElementById('updateID').value = id;
            // showLoader();
            await UpdateFillCountryDropDown();
            await UpdateFillStateDropDown()
            let res = await axios.post("/api/city-by-id", {
                id: id.toString()
            }, HeaderToken())
            // hideLoader();
            document.getElementById('cityNameUpdate').value = res.data['rows']['name'];
            document.getElementById('cityCountryUpdate').value = res.data['rows']['country_id'];
            document.getElementById('cityStateUpdate').value = res.data['rows']['state_id'];
        } catch (e) {
            unauthorized(e.response.status)
        }
    }



    async function update() {

        try {
            let cityCountryUpdate = document.getElementById('cityCountryUpdate').value;
            let cityStateUpdate = document.getElementById('cityStateUpdate').value;
            let cityNameUpdate = document.getElementById('cityNameUpdate').value;

            let updateID = document.getElementById('updateID').value;
            document.getElementById('update-modal-close').click();

            let PostBody = {
                "name": cityNameUpdate,
                "state_id": cityStateUpdate,
                "country_id": cityCountryUpdate,
                "id": updateID
            }


            // Validation
            if (cityCountryUpdate.length === 0) {
                errorToast("Select Country Name is required");
                return;
            }


            if (cityStateUpdate.length === 0) {
                errorToast("Select State Name is required");
                return;
            }

            if (cityNameUpdate.length === 0) {
                errorToast("City Name is required");
                return;
            }

            // showLoader();
            let res = await axios.post("/api/update-city", PostBody, HeaderToken())
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