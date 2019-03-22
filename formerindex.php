<?php include('header.php');?>
<body>
  <div class="container-fluid" style="">
    <div class="row">
      <div class="col" id="phrase">
        <p style="text-align: center; padding-top: 60px;">Genuine Manufacturers.......Legitimate Pharmacies</p>
      </div>
    </div>
    <!-- <div class="col-md-3">
            <button class=" btn btn-success">Sign In</button></div> -->
    <!-- PHARMACY CARD -->

    <div class="row">
      <div class="col-md-4 card1" style="height:400px;">
        <div class="card" style="width: 18rem; margin: auto;">
          <img src="images/pharmacy.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Pharmacies</h5>
            <p class="card-text">Register your Pharmacy and be exposed to a world filled with quality and original...</p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pharmodal">
              Read more
            </button>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pharmform">
                Register
              </button>
          </div>
        </div>
      </div>

      <!-- PRODUCT CARD -->

      <div class="col-md-4" style="height:400px;">
        <div class="card" style="width: 18rem; margin: auto;">
          <img src="images/pills.jpg" class="card-img-top" alt="...">
          <div class="card-body" style="position: relative;">
            <h5 class="card-title">Products</h5>
            <p class="card-text">You could just do a quick search through a category of product you need from any...</p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#prodmodal">
              Read more
            </button>
          </div>
        </div>
      </div>

      <!-- MSR CARD -->

      <div class="col-md-4" style="height:400px;">
        <div class="card" style="width: 18rem; margin: auto;">
          <img src="images/chemist.jpg" class="card-img-top" alt="...">
          <div class="card-body" style="position: relative;">
            <h5 class="card-title">MSR</h5>
            <p class="card-text">Are you a Sales Representative? This is a one=stop-meet A grade pharmacies around the...</p>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#msrmodal">
                Read more
              </button>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#msrform">
                Register
              </button>
        </div>
      </div>
    </div>
  </div>
</div>
</body>

<!-- PHARMACY Modal -->

<div class="modal fade hideme" id="pharmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pharmodal">Pharmacies</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-target="#pharmform">Register</button>
      </div>
    </div>
  </div>
</div>
  
<!-- PHARMACY FORM Modal -->

<div class="modal fade" id="pharmform" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pharmform">New Pharmacy Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Register</button>
      </div>
    </div>
  </div>
</div>

<!-- PRODUCTS Modal -->

<div class="modal fade" id="prodmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="prodmodal">Get Products</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Register</button>
      </div>
    </div>
  </div>
</div>

<!-- MSR Modal -->

<div class="modal fade hidemodal" id="msrmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="msrmodal">Medical Sales Representative</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-toggle='modal' data-target='#msrform'>Register</button>
      </div>
    </div>
  </div>
</div>

<!-- MSR Rgistration Form Modal -->

<div class="modal fade" id="msrform" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="msrform">MSR Registration Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form style="margin-bottom: 5px;">
          <label><b>Fullname</b></label><br>
          <input type="text" placeholder="Fullname"><br><br>
          <label><b>Address</b></label><br>
          <input type="text" placeholder="Address"><br><br>
          <label><b>Email</b></label><br>
          <input type="text" placeholder="email"><br><br>
          <label><b>Reg No</b></label><br>
          <input type="text" placeholder="Registration Number"><br><br>
          <label><b>Address</b></label><br>
          <input type="text" placeholder="Address"><br><br>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" action='#'>Submit</button>
      </div>
    </div>
  </div>
</div>

<script src="jquery/jquery.js"></script>
<script src="bootstrap/popper.min.js"></script>
<script src="bootstrap/bootstrap.min.js"></script>

<script type="text/javascript">
  $(function() {
    $('.hidemodal').click(function() {
      $('#msrmodal').modal('hide');
      $('#msrform').modal('show');

  });
  

    $('.hideme').click(function() {
      $('#pharmodal').modal('hide');
      $('#pharmform').modal('show');
   
  });
  

    $('.card1').slideInRight();

  });
</script>

</html>
