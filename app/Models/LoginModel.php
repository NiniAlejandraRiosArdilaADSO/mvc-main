<?php

class LoginModel
{
    protected $db;
    protected $connection;

    function __construct()
    {
        $this->db           = new Database();
        $this->connection   = $this->db->getConnection();
    }

    function validarEmail($email)
    {
        try {
            $sql = "SELECT * FROM admon WHERE correo = :email";
            $stm = $this->connection->prepare($sql);
            $stm->bindValue(":email", $email);
            $stm->execute();
            $data = $stm->rowCount();
            return ($data == 1) ? true : false;
        } catch (PDOException $e) {
            return [];
        }
    }

    function enviarCorreo($email)
    {
        $data = array();
        if ($email == "") {
            return false;
        } else {
            $data = $this->getUsuarioCorreo($email);
            $id     = $data['id'];
            $nombre = $data['nombre'];
            $correo = $data['correo'];
            //
            $msg = $nombre. " Ingresa al siguiente link para recuperar su contraseña <br>";
            $msg .= "<a href=' ". URL. "/login/recuperarIngreso/". $id ."'> Recuperar contraseña </a>" ;

            $headers  = "MINE-Version: 1.0\r\n";
            $headers .= "Content-type:text/html; charset=UTF-8\r\n";
            $headers .= "From: ADSO\r\n";
            $headers .= "Reply-to: jfbecerra@sena.edu.co\r\n";

            $asunto = "Recuperar contraseña";

            var_dump($msg);

            return @mail($correo, $asunto, $msg, $headers);

            if (!empty($data)) {
                # code...
            } else {
                return false;
            }
        }
    }

    function getUsuarioCorreo($email)
    {
        $baja = 0;
        $sql = "SELECT * FROM admon WHERE correo = :email AND baja = :baja";
        $stm = $this->connection->prepare($sql);
        $stm->bindValue(":email", $email);
        $stm->bindValue(":baja", $baja);
        $stm->execute();
        return $stm->fetch();
    }
}
