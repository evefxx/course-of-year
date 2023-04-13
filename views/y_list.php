<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phonesohp Page</title>
    <!-- Link Bootstrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./src/views/style.css">
    
    <style>
      .flex-box{
        display:flex;
      }
    </style>
</head>
<body>
    <br>
    <div class="container">
        <br>
        <h6 class="text-center">Nakhonpathom Rajaphat University</h6>
        <form action="?route=search" method="POST">
            <br>
            <input class="form-control text-sm" name="search_keyword" type="text" placeholder="Search">
            <div class="d-sm-flex justify-content-between text-sm m-1">
                <p><b>Note :</b> คุณสามารถค้นหาปีที่คุณต้องการ !</p>
                <input class="btn btn-sm btn-primary" value="Search" name="search_submit" type="submit">
            </div>
        </form>
        <div class="row"> 
        <?php
            if($result > 0){
                foreach($result as $row){ 
        ?>      

              <div class="card mb-3 m-1" style="max-width: 25rem;">
              <div class="card-body text-dark">
                        <p class="card-text"><b>วัน-เดือน-ปี เกิด : </b> <?= $row['brith_day'] ?></p>
                        <p class="card-text"><b>อายุ : </b> <?= $row['age'] ?></p>
                        <p class="card-text"><small class="text-muted"></small></p>
                        </p>
                        <a class="btn btn-danger" href="?route=delete&student_id=<?=$row['student_id']?>" onclick="return confirm('คุณต้องการลบ นักเรียนคนนี้ใช่หรือไม่?')">Delete</a>
                        <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit_modal<?= $row['student_id']?>" data-bs-whatever="@getbootstrap">Edit</a>

                  <div class="modal fade" id="edit_modal<?= $row['student_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                        <button type="button" class="btn-close disabled" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="?route=edit" method="POST" enctype="multi-part/form-data">
                          <div class="mb-3">
                            <label for="message-text" class="col-form-label">Brith Day:</label>
                            <input type="date" class="form-control" id="message-text" value="<?= $row['brith_day']?>" name="brith_day"></input>
                          </div>
                          <div class="mb-3">
                            <label for="message-text" class="col-form-label">Age:</label>
                            <input type="number" class="form-control" id="message-text" value="<?= $row['age']?>" name="age"></input>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="submit_edit">Submit Edit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
        <?php
                }

            }
            
        ?>
        </div>


        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3 text-secondary"></i> New York, NY 10012, US</p>
          <p>
            <i class="fas fa-envelope me-3 text-secondary"></i>
            info@example.com
          </p>
          <p><i class="fas fa-phone me-3 text-secondary"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3 text-secondary"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
    </div>


</body>
</html>