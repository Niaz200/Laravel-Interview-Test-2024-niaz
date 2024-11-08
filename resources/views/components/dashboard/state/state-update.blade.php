<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update State</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Country</label>
                                <select type="text" class="form-control form-select" id="stateCountryUpdate">
                                    <option value="">Select Country</option>
                                </select>
                                <label class="form-label mt-2">Name</label>
                                <input type="text" class="form-control" id="stateNameUpdate">
                                <input type="text" class="d-none" id="updateID">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="update()" id="update-btn" class="btn bg-gradient-success" >Update</button>
            </div>

        </div>
    </div>
</div>




<script>


    async function UpdateFillCountryDropDown(){

        let stateCountryDropdown = $("#stateCountryUpdate");

        // Clear existing options to prevent duplication
        stateCountryDropdown.empty();

          // Add a default placeholder option
          stateCountryDropdown.append('<option value="">Select Country</option>');

        let res = await axios.get("/api/list-country",HeaderToken())

        res.data['rows'].forEach(function (item,i) {
            let option=`<option value="${item['id']}">${item['name']}</option>`
            $("#stateCountryUpdate").append(option);
        })
    }


    async function FillUpUpdateForm(id){
        try {
            document.getElementById('updateID').value=id;
            // showLoader();
            await UpdateFillCountryDropDown();
            let res=await axios.post("/api/state-by-id",{id:id.toString()},HeaderToken())
            // hideLoader();
            document.getElementById('stateNameUpdate').value=res.data['rows']['name'];
            document.getElementById('stateCountryUpdate').value=res.data['rows']['country_id'];
        }catch (e) {
            unauthorized(e.response.status)
        }
    }



    async function update() {

        try {
            let stateCountryUpdate=document.getElementById('stateCountryUpdate').value;
            let stateNameUpdate=document.getElementById('stateNameUpdate').value;
       
            let updateID=document.getElementById('updateID').value;
            document.getElementById('update-modal-close').click();

            let PostBody= {
                "name":stateNameUpdate,
                "country_id":stateCountryUpdate,
                "id":updateID
            }


                // Validation
                if (stateCountryUpdate.length === 0) {
                errorToast("Select Country Name is required");
                return;
            }

                 
            if (stateNameUpdate.length === 0) {
                errorToast("State Name is required");
                return;
            }

            // showLoader();
            let res = await axios.post("/api/update-state",PostBody,HeaderToken())
            // hideLoader();
            if(res.data['status']==="success"){
                successToast(res.data['message'])
                await getList();
            }
            else{
                errorToast(res.data['message'])
            }

        }catch (e) {
            unauthorized(e.response.status)
        }

    }
</script>