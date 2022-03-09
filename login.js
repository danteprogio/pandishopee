
// login in for users
function uselogin(){

    document.getElementById("login-form").innerHTML = `
    <!--cancel-btn---------------->
    <a href="javascript:void(0);" class="form-cancel">
        <i class="fas fa-times"></i>
    </a>
    <strong>Log In</strong>
    <!--inputs-->
    <form action="./php/login.php" method="POST">
        <input type="email" name="email" placeholder="Example@gmail.com" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false" required/>
        <input type="password" name="password" placeholder="Password" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false" required/>
        <input type="submit" name="login" value="Log In"/>
    </form>
    <!--forget-and-sign-up-btn-->
    <div class="form-btns">
        <a href="#" class="forget">Forget Your Password?</a>
        <a href="javascript:void(0);" class="sign-up-btn">Create Account</a>
    </div>
    `
    document.getElementById("sign-up-form").innerHTML = `
    <!--cancel-btn---------------->
    <a href="javascript:void(0);" class="form-cancel">
        <i class="fas fa-times"></i>
    </a>
        <strong>Sign Up</strong>
        <!--inputs-->
        <form action="./php/register.php" method="POST">
            <input type="text" name="fullname" placeholder="Full Name" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false" required/>
            <input type="email" name="email" placeholder="Example@gmail.com" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false" required/>
            <input type="password" name="password" placeholder="Password" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false" required/>
            <input list="Gender" name="gender" placeholder="Gender" required/>
            <datalist id="Gender">
            <option value="Male">
            <option value="Female">
            <option value="Other..">
            </datalist>
            <input type="number" name="number" placeholder="Number" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false" required/>
            <p>Birthday</p>
            <input type="date" name="birthday" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false" required/>
            <input type="submit" name="register" value="Sign Up"/>
        </form>
        <!--forget-and-sign-up-btn-->
        <div class="form-btns">
            <a href="javascript:void(0);" class="already-account">
                Already Have Account?</a>

        </div>
    `

}
// !login in for users


// login for admin and seller
function seller_admin(){

    document.getElementById("login-form").innerHTML = `
    <!--cancel-btn---------------->
    <a href="javascript:void(0);" class="form-cancel">
        <i class="fas fa-times"></i>
    </a>
    <strong>Log in as Seller</strong>
    <!--inputs-->
    <form action="./php/login.php" method="POST">
        <input type="email" name="email" placeholder="Example@gmail.com" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false" required/>
        <input type="password" name="password" placeholder="Password" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false" required/>
        <input type="submit" name="seller_admin" value="Log In"/>
    </form>
    <!--forget-and-sign-up-btn-->
    <div class="form-btns">
        <a href="#" class="forget">Forget Your Password?</a>
        <a href="javascript:void(0);" class="sign-up-btn">Create Account</a>
    </div>
    `
    document.getElementById("sign-up-form").innerHTML = `
    <!--cancel-btn---------------->
    <a href="javascript:void(0);" class="form-cancel">
        <i class="fas fa-times"></i>
    </a>
        <strong>Sign Up</strong>
        <!--inputs-->
        <form action="./php/register.php" method="POST">
            <input type="text" name="store_name" placeholder="Store name" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false" required/>
            <input type="text" name="fullname" placeholder="Full Name" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false" required/>
            <input type="email" name="email" placeholder="Example@gmail.com" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false" required/>
            <input type="password" name="password" placeholder="Password" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false" required/>
            <input  list="Gender" name="gender" placeholder="Gender" required/>
            <datalist id="Gender">
            <option value="Male">
            <option value="Female">
            <option value="Other..">
            </datalist>
            <input type="number" name="number" placeholder="Number" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false" required/>
            <label for="birthday" class="form-label">Birthday</label>
            <input type="date" name="birthday"  onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false" required/>
            <input type="submit" name="seller_admin" value="Sign Up"/>
        </form>
        <!--forget-and-sign-up-btn-->
        <div class="form-btns">
            <a href="javascript:void(0);" class="already-account">
                Already Have Account?</a>

        </div>
        `

}

// !login for admin and seller






/*---For Login and Sign-up----------------------------*/
$(document).on('click','.user,.already-account',function(){
    $('.form').addClass('login-active').removeClass('sign-up-active')
});

$(document).on('click','.sign-up-btn',function(){
    $('.form').addClass('sign-up-active').removeClass('login-active')
});

$(document).on('click','.form-cancel',function(){
    $('.form').removeClass('login-active').removeClass('sign-up-active')
});



