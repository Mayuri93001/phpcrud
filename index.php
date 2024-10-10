<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Sign In Form</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/7a0ac3499a.js" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="form-boxm" style=" background: #fff;
    padding: 50px 40px 70px;
    text-align: center;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);"> 
            <h1 id="title">Sign Up</h1>
            <form name="userForm" onsubmit="return validateForm()">
                <div class="input-group gridbox" style="display: grid;
    grid-template-columns: auto auto;
    gap: 10px;">
                    <!-- <div class="input-field" id="id">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="id" placeholder="ID" required>
                    </div> -->

                    <div class="input-field" id="first_name">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="first_name" placeholder="First Name" required>   
                    </div>

                    <div class="input-field" id="last_name">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="last_name" placeholder="Last Name" required>   
                    </div>

                    

                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email" required>
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>

                    

                    <!-- <div class="input-field" id="is_deleted">
                        <i class="fa-solid fa-trash"></i>
                        <input type="text" name="is_deleted" placeholder="Is Deleted" required>
                    </div>

                    <div class="input-field" id="created_date">
                        <i class="fa-solid fa-calendar-alt"></i>
                        <input type="text" name="created_date" placeholder="Created Date" required>
                    </div>

                    <div class="input-field" id="updated_date">
                        <i class="fa-solid fa-calendar-check"></i>
                        <input type="text" name="updated_date" placeholder="Updated Date" required>
                    </div> -->
                </div>
                <div class="input-field" id="address">
                        <i class="fa-solid fa-map-marker-alt"></i>
                        <input type="text" name="address" placeholder="Address" required>    
                    </div>

                <p>Forget Password <a href="#">Click Here!</a></p>

                
                <div class="btn-field">
                    <button type="submit" id="SignupBtn">Sign up</button>
                    <button type="button" id="SigninBtn" class="disable">Sign in</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js" type="text/javascript"></script>

    <script>
        let signupBtn = document.getElementById("SignupBtn");
        let signinBtn = document.getElementById("SigninBtn");
        let title = document.getElementById("title");

        function switchToSignIn() {
            document.getElementById("id").style.display = "none";
            title.innerHTML = "Sign In";
            signupBtn.classList.add("disable");
            signinBtn.classList.remove("disable");
        }

        function switchToSignUp() {
            document.getElementById("id").style.display = "block";
            title.innerHTML = "Sign Up";
            signupBtn.classList.remove("disable");
            signinBtn.classList.add("disable");
        }

        signinBtn.addEventListener("click", switchToSignIn);
        signupBtn.addEventListener("click", switchToSignUp);

        function validateForm() {
            // Placeholder for form validation logic
            return true; // Change to your validation logic
        }
    </script>
</body>
</html>

