<html>
    <head>
        <title>Sign In</title>
    </head>

    <body>
        <h1 align="center">MechTech</h1>
        <form align="center" menthod="POST" action="../controllers/signin_check.php" enctype="">
            <fieldset>
                <legend>Sign In</legend>
                <table align="center">
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
                </table>
                <br/>
                <input type="checkbox" name="keep_me_signed_in" id="keep_me_signed_in" value="on">
                <label for="keep_me_signed_in">Keep me Signed in for 30 days.</label>
                <br/><br/>
                <input type="submit" name="submit" value="Sign In"/>
                <br/> <br/>
                <?php

                    session_start();
                    
                    if(isset($_REQUEST['msg']))
                    {
                        if($_REQUEST['msg'] == 'nullInputs')
                        {
                            echo("<b>Please fillup the login credentials.</b>");
                        }
                        elseif($_REQUEST['msg'] == 'userNotFound')
                        {
                            echo("<b>The email or the password might be wrong. Please try again.</b>");
                        }
                    }

                ?>

            </fieldset>
        </form>
    </body>
</html>