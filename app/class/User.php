<?php

class User
{
    private $_firstName;
    private $_lastName;
    private $_email;
    private $_password;


    /**
     * User constructor.
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $password
     */
    public function __construct($firstName, $lastName, $email, $password)
    {
        $this->_firstName = $firstName;
        $this->_lastName = $lastName;
        $this->_email = $email;
        $this->_password = $password;
    }

    public static function checkAccess($role) {
        if ($role != 'a') {
            Utils::redirect('accueil');
        }
    }

    public function addUser(){
        Database::exec("INSERT INTO user(firstName, lastName, email, password, role) VALUES(?, ?, ?, ?, 'm')",
        [$this->_firstName, $this->_lastName, $this->_email, sha1($this->_password)]);
    }

    /**
     * @param string $email
     * @param string $password
     */
    public static function login($email, $password){
        $user = Database::queryFirst('SELECT * FROM user WHERE email = ? AND password = ?',
            [$email, sha1($password)]);

        if ($user == null){
            Utils::redirect('connexion?error=true');
        }
        else {
            $_SESSION['user'] = [
                'id'=>$user->id,
                'email'=> $user->email,
                'role'=> $user->role
            ];

            Utils::redirect('accueil');
        }
    }
}