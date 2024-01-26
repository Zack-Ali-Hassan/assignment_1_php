<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transportation System</title>
    <!-- <link rel="shortcut icon" type="image/png" href="../../assets/images/logos/fav.png" /> -->
    <!-- Include Font Awesome library -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-behavior="fixed" data-header-behavior="fixed">
        <!-- Sidebar Start -->
        <div class="container-fluid">
            <!--  Row 1 -->
            <div class="row">
                <div class="col-lg-12 d-flex align-items-strech">
                    <div class="card w-100">
                        <div class="card-body">
                            <div class="d-sm-flex d-flex align-items-center justify-content-between mb-9" style="border-bottom : solid 2px black">
                                <div class="mb-3 mb-sm-0">
                                    <h5 class="card-title fw-semibold">Student Table</h5>
                                </div>
                                <div>
                                    <button class="btn btn-outline-primary float-left mt-4 mb-5" type="submit" id="btn_add_student">Add New Student</button>
                                </div>
                            </div>


                            <div class="table-responsive">

                                <table class="table" id="table_student">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Class</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal" tabindex="-1" role="dialog" id="modal_student">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Student Information</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="form_student">

                                                <input type="hidden" name="update_info" id="update_info">
                                                <div>
                                                    <div class="alert alert-success d-none" role="alert">
                                                        This is a success alert—check it out!
                                                    </div>
                                                    <div class="alert alert-danger d-none" role="alert">
                                                        This is a danger alert—check it out!
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                                                    <input id="name" name="name" type="text" class="form-control name" placeholder="Enter name">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Gender</label>
                                                    <select class="form-control" name="gender" id="gender">
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Mobile</label>
                                                    <input type="tel" class="form-control mobile" id="mobile" name="mobile" placeholder="Enter mobile">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Address</label>
                                                    <input type="text" class="form-control address" id="address" name="address" placeholder="Enter address">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Class</label>
                                                    <input type="text" class="form-control email" id="std_class" name="std_class" placeholder="Enter class">
                                                </div>
                                        </div>
                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Script Transportation -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="index.js"></script>



    