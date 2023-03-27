<?php
    function validatePassword($password) 
    {
        // Checking if the password is at least 8 characters long
        if (strlen($password) < 8) 
        {
            return 0;
        } 
        else 
        {
            $hasNumber = false;
            $hasSymbol = false;

            // Loop through each character of the password and checking if it is a number or a symbol
            for ($i = 0; $i < strlen($password); $i++) 
            {
                $char = $password[$i];

                if ($char == '|') 
                {
                    return 0; // The password contains the '|' symbol, so return 0 immediately
                } 
                else if (is_numeric($char)) 
                {
                    $hasNumber = true;
                } 
                else if (!ctype_alpha($char) && !is_numeric($char)) 
                {
                    $hasSymbol = true;
                }
            }

            // Check if the password contains at least one number and one symbol
            if (!$hasNumber) 
            {
                return 0;
            } 
            else if (!$hasSymbol) 
            {
                return 0;
            } 
            else 
            {
                return 1;
            }
        }
    }

    function validateEmail($email) 
    {
      if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) 
      {
        return 0;
      } 
      else 
      {
        return 1;
      }
    }

    function validateURL($url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === false) 
        {
            return 0;
        } 
        else 
        {
            return 1;
        }
    }

  
    function generateProjectManagerCode() 
    {
      $characters = '0123456789';
      $code = '';
        
      // Loop 6 times to generate a 6-digit code
      for ($i = 0; $i < 13; $i++) 
      {
        // Generate a random index to select a character from the $characters string
        $index = rand(0, strlen($characters) - 1);
        // Append the selected character to the $code string
        $code .= $characters[$index];
      }

      $code = 'MTPM-' . $code;
      return $code;
    }

    function generateProjectCode() 
    {
      $characters = '0123456789';
      $code = '';
        
      // Loop 6 times to generate a 6-digit code
      for ($i = 0; $i < 13; $i++) 
      {
        // Generate a random index to select a character from the $characters string
        $index = rand(0, strlen($characters) - 1);
        // Append the selected character to the $code string
        $code .= $characters[$index];
      }

      $code = 'MTPJ-' . $code;
      return $code;
    }

    function generateFeatureCode() 
    {
      $characters = '0123456789';
      $code = '';
        
      // Loop 6 times to generate a 6-digit code
      for ($i = 0; $i < 13; $i++) 
      {
        // Generate a random index to select a character from the $characters string
        $index = rand(0, strlen($characters) - 1);
        // Append the selected character to the $code string
        $code .= $characters[$index];
      }

      $code = 'MTF-' . $code;
      return $code;
    }

    function generateSpecCode() 
    {
      $characters = '0123456789';
      $code = '';
        
      // Loop 6 times to generate a 6-digit code
      for ($i = 0; $i < 13; $i++) 
      {
        // Generate a random index to select a character from the $characters string
        $index = rand(0, strlen($characters) - 1);
        // Append the selected character to the $code string
        $code .= $characters[$index];
      }

      $code = 'MTS-' . $code;
      return $code;
    }
      
?>
