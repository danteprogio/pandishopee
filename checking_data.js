$(document).ready(function () {
    oldpassword_checker();
    confirm_pass();
  });

//   checking is the password are exist
  function oldpassword_checker()
  {
      var oldpass = document.getElementById("old_pass").value;
      console.log(oldpass);
      if(oldpass)
      {
        
          $.ajax({
              type: 'post',
              url: 'php/checking_data.php',
              data: {
                 old_pass: oldpass
              },
              success: function (response) {
                  $( '#old_pass_checker' ).html(response);
              if(response == "<span style='color: green;'> Correct Password.</span>")	
              {
                  document.getElementById('old_pass').className = 'form-control is-valid';

                // enable the new password button
                  $( "#n_pass" ).prop( "disabled", false );
                  $( "#cn_pass" ).prop( "disabled", false );
                  
                  return true;	
              }
              else
              {
                  document.getElementById('old_pass').className = 'form-control is-invalid';
                  return false;	
              }}
          });
      }
   
   else
   {
    $( '#old_pass_checker' ).html("");
    document.getElementById('old_pass').className = 'form-control ';
    return false;
   }
};

// checking if the the new password isa the same in confirm passsword
function confirm_pass()
{
    var n_pass = document.getElementById("n_pass").value;
    var cn_pass = document.getElementById("cn_pass").value;

    if (cn_pass) {
        if (n_pass == "") {
            document.getElementById('n_pass').className = 'form-control is-invalid';
            document.getElementById("n_pass").placeholder = "Enter password here!!";
            
        }
        else if(cn_pass == n_pass){
            document.getElementById('n_pass').className = 'form-control is-valid';
            document.getElementById('cn_pass').className = 'form-control is-valid';
            $( "#save_new_pass" ).prop( "disabled", false );
        }else{
            document.getElementById('cn_pass').className = 'form-control is-invalid';
            
        }
    }
    else
    {
     document.getElementById('n_pass').className = 'form-control ';
     document.getElementById('cn_pass').className = 'form-control ';
    }


};