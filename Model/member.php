<?php

namespace cweb;

class Member
{
    private $ds;

    function __construct()
    {
        require_once __DIR__ . '/../lib/DataSource.php';
        $this->ds = new DataSource();
    }

    /**
     * to check if the username already exists
     *
     * @param string $username
     * @return boolean
     */
    public function isUsernameExists($cedula)
    {
        $query = 'SELECT * FROM usuario where cedula = ?';
        $paramType = 's';
        $paramValue = array(
            $cedula
        );
        $resultArray = $this->ds->select($query, $paramType, $paramValue);
        $count = 0;
        if (is_array($resultArray)) {
            $count = count($resultArray);
        }
        if ($count > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    /**
     * to check if the email already exists
     *
     * @param string $email
     * @return boolean
     */
    public function isEmailExists($correo)
    {
        $query = 'SELECT * FROM usuario where correo = ?';
        $paramType = 's';
        $paramValue = array(
            $correo
        );
        $resultArray = $this->ds->select($query, $paramType, $paramValue);
        $count = 0;
        if (is_array($resultArray)) {
            $count = count($resultArray);
        }
        if ($count > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    /**
     * to signup / register a user
     *
     * @return string[] registration status message
     */

    public function registerMember()
    {
        $isUsernameExists = $this->isUsernameExists($_POST["cedula"]);
        $isEmailExists = $this->isEmailExists($_POST["correo"]);
        if ($isUsernameExists) {
            $response = array(
                "status" => "error",
                "message" => "La cédula existe en la base de datos."
            );
        } else if ($isEmailExists) {
            $response = array(
                "status" => "error",
                "message" => "El correo ya está vinculado a otra cuenta."
            );
        } else {
            $query = 'INSERT INTO usuario (cedula, nombre, apellido, correo, password) VALUES (?, ?, ?, ?, ?)';
            $paramType = 'sssss';
            $paramValue = array(
                $_POST["cedula"],
                $_POST["nombre"],
                $_POST["apellido"],
                $_POST["correo"],
                $_POST["signup-password"]
            );

            $memberId = $this->ds->insert($query, $paramType, $paramValue);
            // if (!empty($memberId)) {
            //     $response = array(
            //         "status" => "success",
            //         "message" => "¡Se ha registrado satisfactoriamente!."
            //     );
            // }
            $response = array(
                        "status" => "success",
                        "message" => "¡Se ha registrado satisfactoriamente!."
                    );
        }
        return $response;
    }

    public function getMember($cedula)
    {
        $query = 'SELECT * FROM usuario where cedula = ?';
        $paramType = 's';
        $paramValue = array(
            $cedula
        );
        $memberRecord = $this->ds->select($query, $paramType, $paramValue);
        return $memberRecord;
    }

}