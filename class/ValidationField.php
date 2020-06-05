<?php

/**
 * Classe per la validazione dei campi di un form
 */
class ValidationField {

    private static $errors = false;

    /** @var String attributo name del campo del form da validare */
    private $name;

    /** @var String valore compilato d'utente */ 
    private $value;

    /** @var String valore iniziale del campo nel form */
    private $defaultValue = "";

    /** @var String Messaggio di errore che verrà visualizzato se la validazione fallisce */
    private $errorMessage ;
    
    /** @var Boolean indica che il campo è obbligastorio*/
    private $isRequired;

    /** @var Boolean indica  se il campo è valido se vale true la validazione è passata
     * se vale false la validazione è fallita (ValifationField::validationType)  */ 
    private $isValid;

    /** @var String tipo di validazione utilizzata */
    private $validationType;


    public function __construct(
                                string $name,
                                string $validationType,
                                string $errorMessage,
                                array $options = []
                                ) {
        $this->name = $name;
        $this->validationType = $validationType;
        $this->errorMessage = $errorMessage;
        $this->options = $options;

        $this->init();
        $this->validate();
    }


    public function init()
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET' && (!isset($_POST[$this->name]))){

            $this->value = '';
        }
    }


    public function is_required()
    {
        if(isset($this->options['required']) &&  $this->options['required'] == true ){
            return true;
        }else{
            return false;
        }
    }


    public function isIsset()
    {
        return isset($_POST[$this->name]);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function validate(){

        // echo "----------------------------------------\n";


        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $val = isset($_POST[$this->name]) ? $_POST[$this->name] : '';
           

            $is_null = !Validate::required($val);
            $is_required = $this->is_required();

            $method = $this->validationType; // required
            

           // var_dump($val);
            $test = call_user_func("Validate::$method",$val);

        

            if($test !=  false){
                $this->isValid = true;
                $this->value = $test;
            }else{

                if($is_null && !$is_required){
                    $this->isValid = true;
                    $this->value = '';
                }else{
                    $this->isValid = false;
                    $this->value = '';
                    self::$errors = true;
                }

  
            }


        }



        
    }

    public static function formIsValid()
    {
        if($_SERVER['REQUEST_METHOD'] === "GET"){
            return false;
        }
        return !self::$errors;
    }

    /**
     * controlla se il valore presente nel $_POST (la proprieta ValidationField::value dell istanza)
     * corrisponde al valore di $chkval
     * restituisce "checked" quando il valore corrisponde e '' quando non corrisponde
     * @example <input class="form-check-input" name="qualification" type="radio" <?php echo $qualification->isChecked() ?> value="cuoco" id="chk_1">
     * @param string $chkval
     * @return string
     */
    public function isChecked(string $chkval):string
    {
        // $_POST['qualification'] === $chkval
        //  return $_POST[$this->name] === $chkval ? ' checked ' : '';
         return $this->getValue() === $chkval ? ' checked ' : '';
    }




    public function getIsValid()
    {
        return $this->isValid;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getErrorMessage(){
        return $this->errorMessage;
    }
}

?>