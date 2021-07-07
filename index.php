<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Insert Data using serialize method PHP Ajax</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <div id="main">
    <div id="header">
      <h1>Insert Data using serialize method PHP Ajax</h1>
    </div>


   

    <div id="table-data" class="container">
    <form id="submit_form" >
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="fullname" id="fullname">
      </div>
      <div class="mb-3">
        <label class="form-label">Age</label>
        <input type="number" name="age" id="age">
      </div>
      <div class="mb-3 form-check">
        <input class="form-check-input radioform" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
        <label class="form-check-label" for="flexRadioDefault1" type="radio" name="gender" value="male">
          Male
        </label>
        </div>
        <div class="mb-3 form-check">
          <input class="form-check-input radioform" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
          <label class="form-check-label" for="flexRadioDefault1" type="radio" name="gender" value="female">
            Female
          </label>
        </div>
        <select class="form-select" aria-label="Default select example">
  <option selected>Country</option>
  <option value="ind">India</option>
                <option value="pk">Pakistan</option>
                <option value="ban">Bangladesh</option>
                <option value="ne">Nepal</option>
                <option value="sl">Srilanka</option>
</select>
        <button type="button" name="submit" id="submit" value="Submit" class="submitbtn">Submit</button>
    </form>
      <div id="response"></div>
    </div>
  </div>
<div class="footer">
  <h2>Developed by Sourav Gupta</h2>
</div>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script>
    $(document).ready(function() {
      $("#submit").click(function() {
        var name = $("#fullname").val();
        var age = $("#age").val();

        if (name == "" || age == "" || !$('input:radio[name=gender]').is(':checked')) {
          $('#response').fadeIn();
          $('#response').removeClass('success-msg').addClass('error-msg').html('All fields are required.');
        } else {
          // $('#response').html($('#submit_form').serialize());
          $.ajax({
            url: "save-form.php",
            type: "POST",
            data: $('#submit_form').serialize(),
            beforesend: function() {
              $('#response').fadeIn();
              $('#response').removeClass('success-msg error-msg').addClass('process-msg').html('Loading response...');
            },
            success: function(data) {
              $('#submit_form').trigger("reset");
              $('#response').fadeIn();
              $('#response').removeClass('error-msg').addClass('success-msg').html(data);
              setTimeout(function() {
                $('#response').fadeOut("slow");
              }, 4000);
            }
          });
        }
      });
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>