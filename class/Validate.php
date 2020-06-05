<?php
class Validate
{
    /**
     * dichiarazione di un metodo statico 
     * un metodo statico non ha bisogno di un istanza
     * non si può usare la parola chiave $this dentro un metodo statico
     */
    public static function required($value)
    {
        $value = strip_tags($value); // "   ciao    "
        $value = trim($value); // "ciao"
        // se $value non è vuota  
        if (!empty($value)) {

            return $value;
        } else {

            return false;
        }
    }

    public static function email($value)
    {
        //<script>
        $value = strip_tags($value); // "   ciao    "
        $value = trim($value);
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    /**
     * questo metodo non l'ho capito 
     */

    public static function is_maggiorenne($age)
    {   
        return filter_var($age, FILTER_VALIDATE_INT, array(
            "options" => array(
                "min_range" => 18,
                "max_range" => 110
            )
        ));
    }

    public static function isName($value)
    {
        $value = strip_tags($value); // "   ciao    "
        $value = trim($value);

        if(preg_match("/^([a-zA-Z \'\,\.\-]+)$/",$value)){
           return $value;
        }else{
           return false;
        }
    }
    
    public static function radioRequired($value)
    {
     
        return Validate::required($value);
        
    }
}
