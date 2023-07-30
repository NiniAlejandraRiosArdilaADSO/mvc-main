<?php

/**
 * Controla el manejador de las URI y lanza los procesos
 * 1 Atributo. Controlador
 * 2 Atributo. Método
 * 3 Atributo para los parametros. []
 */
class Main
{
    # Declaramos los atributos de la clase
    private $controlador    = "Bienvenido";
    private $metodo         = "Ingreso";
    private $parametros     = [];
    function __construct()
    {
        
        # LLamamos la función para tratar los datos que nos llegan por la URL
        $url = $this->separaURL();

            // echo "<pre>";
            // print_r($url);
            // echo "</pre>";
            // die();


        # preguntamos si el atributo url tiene algun valor y si el archivo existe en el sistema
        if($url != "" &&  file_exists("../app/Controllers/".ucwords($url[0])."Controller.php"))
        {
            # Igualamos el atributo controlador al valor de la primera posición del array ($url[0])
            $this->controlador = ucwords($url[0])."Controller";
            # Eliminamos la primera posición del arreglo
            unset($url[0]);
            // var_dump($url);
        }
        # Cargamos la clase controladora
        require_once("../app/Controllers/".ucwords($this->controlador).".php");
        # Creamos la instancia
        $this->controlador = new $this->controlador;
        # Metodo del controlador por URL que nos llega en la segunda posición del array ($url[1])
        if(isset($url[1]))
        {
            # validamos que el metodo exista en la clase instanciada | el metodo fue pasado por la url en la segunda posición
            if (method_exists($this->controlador, $url[1])) {
                # asignamos el metodo al atributo de la clase
                $this->metodo = $url[1];
            }
        }
        # Parametros
        # array_values() = regresa un arreglo con indices,
        # eliminando las llaves del arreglo asociativo
        $this->parametros = $url ? array_values($url) : [];

        # call_user_func_array(funcion, parametros) 
        # llama una funcion definida por el usuario
        # pasa los parametros a la funcion definida por el usuario
        call_user_func_array(
            [$this->controlador, $this->metodo],
            $this->parametros
        );

        // print "<br> Método: ".$this->metodo. "</br>";
        // var_dump($this->parametros);
    }

    public function separaURL()
    {
        # definimos la variable url y la igualamos a vacío o sin ningun dato
        $url = "";
        if (isset($_GET['url'])) {
            # Eliminamos el caracter final
            $url = rtrim($_GET['url'], "/");
            # tambien en algunas ocaciones eliminamos la barra invertida, 
            # pero como estab barra representa un escpa en php tenemos que introducir una segunda barra para evitar el escape
            $url = rtrim($_GET['url'], "\\");
            # Sanitizamos la variable $url (eliminamos algunos carcteres especiales que pueden llegar por la url $-_.+!*'(),{}|\\^~[]`"><#%;/?:@&=)
            $url = filter_var($url, FILTER_SANITIZE_URL);
            # Definimos la URL como un arreglo (se encarga de dividir o convertir la cadena en un Array)
            $url = explode("/", $url);
        }
        # retornamos la url, ya sea modificada despues del la condición o el string vacio
        return $url;
    }
}
