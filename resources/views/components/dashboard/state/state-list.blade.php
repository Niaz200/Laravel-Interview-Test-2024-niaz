<div class="dashboard__body">
    <div class="dashboard__inner">

        <div class="dashboard__inner__header">
            <div class="dashboard__inner__header__flex">
                <div class="dashboard__inner__header__left">
                    <!-- <h4 class="dashboard__inner__header__title">Good Morning, Md Zahid</h4>
                                                    <p class="dashboard__inner__header__para">Manage your dashboard here</p> -->
                </div>
                <div class="dashboard__inner__header__right">
                    <div class="dashboard__inner__item__right recent_activities">
                        <!-- <div class="btn-wrapper">
                            <a href="javascript:void(0)" class="cmn_btn btn_small radius-5" id="activity_btn">Create Country</a>
                        </div> -->

                        <div class="align-items-center col">
                            <button data-bs-toggle="modal" data-bs-target="#create-modal" class="cmn_btn btn_small radius-5">Create State</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="dashboard__inner__item dashboard__card bg__white padding-20 radius-10 mt-3">
            <h4 class="dashboard__inner__item__header__title">State List</h4>
            <!-- Table Design One -->
            <div class="tableStyle_one mt-4">
                <div class="table_wrapper">
                    <!-- Table -->
                    <table id="tableData">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>State Name</th>
                                <th>City Name</th>
                                <th>Country Name</th>
                                <!-- <th>Customer name</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Amout</th>
                                <th>Location</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableList">
                      
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- End-of Table one -->
        </div>
    </div>
</div>



<script>




getList();

async function getList() {
   try {
       let res = await axios.get("/api/list-state", HeaderToken());

       // Select the table body where rows will be appended
       let tableList = $("#tableList");
       
       // Clear any existing rows
       tableList.empty();

       // Loop through the data and create rows
       res.data['rows'].forEach(function (item, index) {
           let row = `<tr>
                       <td>${index + 1}</td>
                       <td>${item['name']}</td>
                       <td>${item['cities'].map(city => city.name).join(', ')}</td>
                       <td>${item['country']['name']}</td>
                       <td>
                           <button data-id="${item['id']}" class="btn editBtn btn-sm btn-outline-success">Edit</button>
                           <button data-id="${item['id']}" class="btn deleteBtn btn-sm btn-outline-danger">Delete</button>
                       </td>
                    </tr>`;
           tableList.append(row);  // Append the row to the table body
       });

       // Attach click events to the Edit and Delete buttons
       $('.editBtn').on('click', async function () {
           let id = $(this).data('id');
           await FillUpUpdateForm(id);  // Call to populate update form
           $("#update-modal").modal('show');  // Show modal after form is filled
       });

       $('.deleteBtn').on('click', function () {
           let id = $(this).data('id');
           $("#delete-modal").modal('show');  // Show delete confirmation modal
           $("#deleteID").val(id);  // Set delete ID in modal
       });

   } catch (e) {
       unauthorized(e.response.status)
   }
}

</script>