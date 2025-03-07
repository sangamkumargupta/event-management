
<?php 
    #var_dump($_REQUEST);
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Booking Form</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  
</head>
<body>
  <main style="background:#e9eef3ad">
    <div class="container" >
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <div class="card mb-3">
                  <div class="card-body" >
                    <a href="index.php" class="cancle" ><i style="float:right;font-size:30px;color:black;" class="bi bi-x"></i></a>
                    <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Feedback Form</h5>
                    </div>
                    <form class="row g-3 needs-validation" method="" enctype="multipart/form-data">
                        <div class="col-lg-12 col-md-12">
                            <label for="Description" class="form-label">Description</label>
                            <textarea name="Description" id="Description" class="form-control"></textarea>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <label for="uploadCelebrate" class="form-label">Upload Celebration Picture</label>
                            <input type="file" name="uploadCelebrate" class="form-control" id="uploadCelebrate"  >
                        </div>
                        <div class="col-lg-12 col-md-12 text-center">
                            <input type="submit" name="Submit" class="btn btn-success btn-sm" value="Submit">
                            <input type="submit" name="Cancle" class="btn btn-danger btn-sm" value="Cancle">
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </section>
    </div>
  </main>
