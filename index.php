<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Login/Register</title>
</head>
<body>
    <div class="heading">
        <h1>IIT MANDI HOSTEL MANAGEMENT SYSTEM</h1>
        <p>Welcome to IIT Mandi! <b>LOGIN/REGISTER</b> your account.</p>
    </div>
    <div class="login-page">
        <div class="form">
        <form class="login-form" action='login.php' method='POST'>
            <h2>LOGIN</h2>
            <input type="text" placeholder="Roll No" id='RollNo' name='RollNo'/>
            <input type="password" placeholder="Password" id='Password' name='Password'/>
            <button>login</button>
            <p class="message">Not registered? <a>Create an account</a></p>
        </form>
        <form class="register-form" action='register.php' method='POST'>
            <h2>REGISTER</h2>
            <input type="text" placeholder="Name" id='Name' name='Name'/>
            <input type="text" placeholder="Roll No" id='RollNo' name='RollNo'/>
            <input type="text" placeholder="Email Address" id='Email' name='Email'/>
            <select type="text" placeholder="Branch" id='Branch' name='Branch'>
                <option value='' selected disabled >Branch</option>
                <option value='CSE'>CSE</option>
                <option value='EE'>EE</option>
                <option value='ME'>ME</option>
                <option value='CIVIL'>CIVIL</option>
                <option value='BIOTECH'>BIOTECH</option>
                <option value='ENG.PHY'>ENG.PHY</option>
                <option value='DSE'>DSE</option>
                <option value='DSE'>MA</option>              
            </select>
            <input type="password" placeholder="Password" id='Password' name='Password'/>
            <button>create</button>
            <p class="message">Already Registered? <a>Sign in</a></p>
        </form>
        
        </div>
    </div>
</body>

<script>
    $(document).ready(function(){
        $('.message a').click(function() { 
                $('form').animate({ height: "toggle", opacity: "toggle" }, "slow");
            }
        );
        $('.form select').change(function(){
                $('.form select').css('color','black')
            }

        )

    })



</script>

</html>