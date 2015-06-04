
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html style="width: 100%;height: 100%" xmlns="http://www.w3.org/1999/html">
    
    <head>
        <!--<link rel="stylesheet" type="text/css" href="demo.css"/>-->
        <link rel="stylesheet" type="text/css" href="newcss.css"/>
        <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//www.parsecdn.com/js/parse-1.4.2.min.js"></script>
        <script type="text/javascript" src="LoginScript.js"></script>

        <title>ChooseWisely</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


    </head>

    <body >

    <div id="content">
        <div id="header" style="display: inline-block">
            <div style = "float: left">            <img src="ChooseWisely.png" id = "Logo"></div>
            <div id = "loginbox" style = "float: right">
                Login Here <br>

                <input type="text" name="loginusername" id="username1" placeholder="Username">
                <input type="password" id="loginpassword" placeholder="Password"><br>

                <button name="Submit"  onclick="OnUSerLogin()">Submit</button>

                <p id = "error"></p>


            </div>



        </div>
            <div id = "signupbox">
                <div id ="signupform">
                    <form  >
                    <h1 id = "maintitle">Sign up! its free </h1>
                    <input type="text" name="firstname" id="fname" placeholder="First Name">
                    <input type="text" name="lastname" id="lname" placeholder="Last Name"><br>
                        <input type="text" name="username" id="username" placeholder="User Name"><br>
                    <input type="text" name="email" id="email" placeholder="SCU E-mail"><br>
                    <input type="password" name="password" id="pass" placeholder="Password"><br>
                    <input type="password" name="retypepass" id="retypepass" placeholder="Retype password"><br>
                    <input type="submit" id="submit1" name="submitbtn">
                    <p id="successmsg"></p>
                    </form>

                    <script>


                            $("#submit1").click(function(){
                                var fname = $("#fname").val();

                                var lname = $("#lname").val();
                                var username = $("#username").val();
                                var email = $("#email").val();
                                var password = $("#pass").val();
                                var retypepass = $("#retypepass").val();
// Returns successful data submission message when the entered information is stored in database.
                                var dataString = 'firstname='+ fname +'&lastname='+ lname+ '&email='+ email + '&password='+ password +'&username='+ username ;
                                if(fname==''||email==''||password==''||lname==''||retypepass==''|| username=='')
                                {
                                    $("#successmsg").html("Please fill up all the fields!");
                                }
                                else if(password!==retypepass){
                                    $("#successmsg").html("Password and retype password doesnt match");
                                }
                                else
                                {
// AJAX Code To Submit Form.
                                    var user = new Parse.User();
                                    user.set("username", username);
                                    user.set("password", password);
                                    user.set("email", email);

// other fields can be set just like with Parse.Object
                                    user.set("first_name", fname);
                                    user.set("last_name",lname);


                                    user.signUp(null, {
                                        success: function(user) {

                                            $("#successmsg").html("Signup Successfull");

                                        },
                                        error: function(user, error) {
                                            // Show the error message somewhere and let the user try again.
                                            alert("Error: " + error.code + " " + error.message);
                                        }
                                    });
                                }

                            });


                    </script>
                </div>
            </div>
            </div>
    </body>
</html>
