<?php 
 $conn=mysqli_connect("localhost","root","","test");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
        <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    />

    <title>QR & Bar Code Generator</title>
    <style>
        body {
            background-color: #92a8d1;
        }

        .card {
            box-shadow: 2px 2px 2px 2px;
        }

        .card-body {
            font-size: 20px;
            background-color: #F3B8B8;
        }
        .error
        {
             color:red;
        }
    </style>
</head>

<body>
    <!-- Student Input Data -->
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header h4 text-white bg-success">
                    Student Details
                </div>
                <div class="card-body">
                    <form id="formData">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dateofbirth">DOB</label>
                                    <input type="date" class="form-control" id="dob" name="dob" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dateofbirth">Ph No</label>
                                    <input type="number" class="form-control" id="ph_number" name="ph_number" minlength="10" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dateofbirth">E-Mail</label>
                                    <input type="email" class="form-control" id="email" name="e_mail" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Address</label>
                                    <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center mt-2">
                                <input type="submit" class="btn btn-primary" name="submit" value="Submit" id="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Student Info Data -->
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header h4 text-white bg-success">
                    All Student Details
                </div>
                <div class="card-body bg-secondary text-white">
                <table class="table table-borderd">
                    <thead>
                        <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Name</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Ph No</th>
                        <th scope="col">Email</th>
                        <th scope="col">options</th>
                        </tr>
                    </thead>
                     <tbody>
                        <?php 
                        $sql="SELECT * FROM `qr`";
                        $data=mysqli_query($conn,$sql);
                        $sl=1;
                        foreach($data as $row)
                        {
                        ?>
                          <tr>
                          <td><?php echo $sl;?></td>
                          <td><?php echo $row['name'];?></td>
                          <td><?php echo $row['dob'];?></td>
                          <td><?php echo $row['ph_no'];?></td>
                          <td><?php echo $row['e_mail'];?></td>
                          <td>
                            <button class="btn-success qrGenerate" id="qrCode_<?php echo $row['id']; ?>" data-value="<?php echo $row['id'];?>"><div class="spinner-border text-danger d-none" id="showSpiner_<?php echo $row['id'];?>" role="status">
                            <span class="sr-only">Loading...</span>
                            </div>Get QR</button>
                            <button class="btn-info barGenerate" id="barCode_<?php echo $row['id']; ?>" data-value="<?php echo $row['id'];?>">Get Bar</button>
                          </td>
                          </tr>
                        <?php 
                        $sl++;
                        }
                        ?>
                    </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"
        integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>
</html>
