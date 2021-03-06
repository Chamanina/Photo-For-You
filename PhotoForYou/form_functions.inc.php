<?php
function create_form_input($name, $type, $errors, $valeurs) 
{
	
	$value = false;
	if (isset($_POST[$name])) $value = $_POST[$name];
	
	if ($value && get_magic_quotes_gpc()) $value = stripslashes($value);
	if ( ($type == 'text') || ($type == 'password') ) 
                { 
                    echo '<input type="' . $type . '" name="' . $name . '" id="' . $name . '"';
                    if ($value) echo ' value="' . htmlspecialchars($value) . '"';
                    if (array_key_exists($name, $errors)) echo 'class="error" /> <span class="error">' . $errors[$name] . '</span>';
                    else  echo ' />';		
                } 
       elseif ($type == 'textarea') 
       { 
		
                if (array_key_exists($name, $errors)) echo ' <span class="error">' . $errors[$name] . '</span>';
                echo '<textarea name="' . $name . '" id="' . $name . '" rows="5" cols="75"';
		if (array_key_exists($name, $errors)) 
                echo ' class="error">';
                else echo '>';		
		if ($value) echo $value;
		
                echo '</textarea>';
		
	} 
        elseif ($type == 'select')
        {
            echo '<select name="' .$name. '">';
                foreach($valeurs as $nom=>$nomc) 
                {
                  echo  '<option value="'.$nom.'">'.$nomc.'</OPTION>';
                }
            echo '</select>';
               
        }// Fin du IF-ELSE principal.
} // Fin de la fonction create_form_input().
?>

 <div style="display: none">
<?php
    include('./include/cotedroit.php');
?>
</div>
