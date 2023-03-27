<html>
    <head>
        <title>Sign Up</title>
    </head>

    <body>
        <h1 align="center">MechTech</h1>
        <form align="center" menthod="POST" action="../controllers/signup_check.php" enctype="">
            <fieldset>
                <legend>Sign Up</legend>
                <table align="center">
                    <tr align="left">
                        <th align="right">
                            <label for="username">Username:</label>
                        </th>
                        <th>
                            <input type="text" name="username" id="username" value=""/>
                        </th>
                    </tr>

                    <tr align="left">
                        <th align="right">
                            <label for="email">Email:</label>
                        </th>
                        
                        <th>
                            <input type="email" name="email" id="email" value=""/>
                        </th>
                    </tr>

                    <tr align="left">
                        <th align="right">
                            <label for="password">Password:</label> <br/>
                        </th>

                        <th>
                            <input type="password" name="password" id="password" value=""/>
                        </th>
                    </tr>

                    <tr align="left">
                        <th align="right">
                            <label for="retypepassword">Retype-Password:</label> <br/>
                        </th>

                        <th>
                            <input type="password" name="retypepassword" id="retypepassword" value=""/>
                        </th>
                    </tr>
                </table>
                <br/><br/>
                <input type="submit" name="submit" value="Sign Up"/>
                <br/> <br/>
                <?php

                    if(isset($_REQUEST['msg']))
                    {
                        if($_REQUEST['msg'] == 'nullInputs')
                        {
                            echo("<b>Please fillup all the required fields.</b>");
                        }
                        elseif($_REQUEST['msg'] == 'invalidEmail')
                        {
                            echo("<b>Invalid email format. Please provide a valid email.</b>");
                        }
                        elseif($_REQUEST['msg'] == 'invalidPassword')
                        {
                            echo("<b>1. Passwords should be at least 8 characters long.<br/>
                            2. Should contain atleast one symbol.<br/>
                            3. Should contain at least one number.<br/>
                            4. Password can not contain '|' charcter.</b>");
                        }
                        elseif($_REQUEST['msg'] == 'mismatchPass')
                        {
                            echo("<b>Password mismatch.</b>");
                        }
                        elseif($_REQUEST['msg'] == 'signupFailed')
                        {
                            echo("<b>Unable to Sign Up.</b>");
                        }
                    }

                ?>
            </fieldset>
        </form>
    </body>
</html>