<?php
require_once '../models/User.php';
require_once '../helpers/session.php';

class Users
{
    private $users_first_name;
    private $users_last_name;
    private $users_login;
    private $users_email;
    private $users_password;
    private $users_password_repeat;

    /**
     * @return mixed
     */
    public function getUsersPasswordRepeat()
    {
        return $this->users_password_repeat;
    }

    /**
     * @param mixed $users_password_repeat
     */
    public function setUsersPasswordRepeat($users_password_repeat): void
    {
        $this->users_password_repeat = $users_password_repeat;
    }
    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * @return mixed
     */
    public function getUsersFirstName()
    {
        return $this->users_first_name;
    }

    /**
     * @param mixed $users_first_name
     */
    public function setUsersFirstName($users_first_name): void
    {
        $this->users_first_name = $users_first_name;
    }

    /**
     * @return mixed
     */
    public function getUsersLastName()
    {
        return $this->users_last_name;
    }

    /**
     * @param mixed $users_last_name
     */
    public function setUsersLastName($users_last_name): void
    {
        $this->users_last_name = $users_last_name;
    }

    /**
     * @return mixed
     */
    public function getUsersLogin()
    {
        return $this->users_login;
    }

    /**
     * @param mixed $users_login
     */
    public function setUsersLogin($users_login): void
    {
        $this->users_login = $users_login;
    }

    /**
     * @return mixed
     */
    public function getUsersEmail()
    {
        return $this->users_email;
    }

    /**
     * @param mixed $users_email
     */
    public function setUsersEmail($users_email): void
    {
        $this->users_email = $users_email;
    }

    /**
     * @return mixed
     */
    public function getUsersPassword()
    {
        return $this->users_password;
    }

    /**
     * @param mixed $users_password
     */
    public function setUsersPassword($users_password): void
    {
        $this->users_password = $users_password;
    }



    public function register()
    {
        $userdata = new Users();
        $userdata->setUsersFirstName($_POST['usersFirstName']);
        $userdata->setUsersLastName($_POST['usersLastName']);
        $userdata->setUsersLogin($_POST['usersLogin']);
        $userdata->setUsersEmail($_POST['usersEmail']);
        $userdata->setUsersPassword($_POST['usersPassword']);
        $userdata->setUsersPasswordRepeat($_POST['repeatUsersPassword']);
        //Mozna dodac funkcje ktora by usuwała przypadkowe spacje

        $wdf = 0; //flaga na błędy

        //Sprawdzanie czy któreś z pól jest puste
        $user_fields = [
            $userdata->getUsersFirstName(),
            $userdata->getUsersLastName(),
            $userdata->getUsersLogin(),
            $userdata->getUsersEmail(),
            $userdata->getUsersPassword(),
            $userdata->getUsersPasswordRepeat()
        ];

        foreach ($user_fields as $key => $item) {
            if (empty($user_fields[$key])) {
                echo "Wszystkie pola muszą być wypełnione"; //TODO ładne wyświeltanie
                $wdf = 1;
            }
        }

        if (preg_match('~[0-9]+~', $userdata->getUsersFirstName())) {
            var_dump($userdata->getUsersFirstName());
            echo "Nieprawidłowe imię - imię musi zawierać tylko litery";
            $wdf = 1;
        }

        if (preg_match('~[0-9]+~', $userdata->getUsersLastName())) {
            echo "Nieprawidłowe nazwisko - nazwisko musi zawierać tylko litery";
            $wdf = 1;
        }

        //Sprawdzanie czy login zawiera tylko litery i cyfry oraz czy jest dłuższy niż 3 znaki
        if (strlen($userdata->getUsersLogin()) <= 3) {
            echo "Login musi mieć więcej niż 3 znaki\n"; //TODO ładne wyświetlanie
            $wdf = 1;

        } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $userdata->getUsersLogin())) {
            echo "Login może zawierać tylko litery i cyfry\n"; //TODO ładne wyświetlanie
            $wdf = 1;
        }

        //Sprawdzanie czy hasło ma minimum TYMCZASOWO 3 znaki TODO 8
        if (strlen($userdata->getUsersPassword()) <= 3) {
            echo "Hasło musi mieć więcej niż 8 znaków\n"; //TODO ładne wyświetlanie
            $wdf = 1;
        }

        //Weryfikacja adresu email
        if (!preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,})$/", $userdata->getUsersEmail())) {
            echo "Niepoprawny adres e-mail"; //TODO ładne wyświetlanie
            $wdf = 1;
        }


        //Sprawdzanie czy powtórzone hasło jest takie same
        $check_password = strval($userdata->getUsersPasswordRepeat());
        if (!preg_match("/^" . $check_password . "$/", $userdata->getUsersPassword())) {
            echo "Hasla nie są zgodne"; //TODO ładne wyświetlanie
            $wdf = 1;
        }

        //Sprawdzanie czy user juz istnieje
        if ($this->user->checkIfUserExists($userdata->getUsersLogin(), $userdata->getUsersEmail())) {
            echo "User już istnieje";
            $wdf = 1;
        }

        //Zeby wszystkie błędy były wyświetlane, a nie tylko pierwszy napotkany
        if ($wdf == 1){
            exit();
        }

        //Haszowanie hasła
        //https://www.php.net/manual/en/function.password-hash.php
        $userpasswd = $userdata->getUsersPassword();
        $userdata->setUsersPassword(password_hash($userpasswd, PASSWORD_DEFAULT));

        //Rejestracja usera
        if ($this->user->register($userdata)) {
            $newURL = '../index.php';
            header('Location: ' . $newURL);
        } else {
            exit("Cos chyba poszlo nie tak");
        }
    }

    public function login()
    {
        $user = new Users();
        $user->setUsersLogin($_POST['usersLogin']);
        $user->setUsersPassword($_POST['usersPassword']);


        $user_fields = [
            $user->getUsersLogin(),
            $user->getUsersPassword(),
        ];

        foreach ($user_fields as $key => $item) {
            if (empty($user_fields[$key])) {
                echo "Wszystkie pola muszą być wypełnione"; //TODO ładne wyświeltanie
                $wdf = 1;
            }
        }

        //Sprawdzanie czy user istnieje
        if ($this->user->checkIfUserExists($user->getUsersLogin(), $user->getUsersPassword())) {
            echo "Użytkownik istnieje\n";
            $logged = $this->user->login($user->getUsersLogin(), $user->getUsersPassword());
            //var_dump(($logged));
            if ($logged) {
                $this->newSession($logged);
            } else {
                echo "Podano złe hasło";
                //TODO ładnie się ma wyswietlac
                exit();
            }
        } //Jeśli użytkownika nie znaleziono...
        else {
            echo "Nie ma takiego użytkownika";
            //TODO ładnie się ma wyswietlac
            exit();
        }
    }

    public function newSession($user)
    {
        $session_attrs = array(
            'usersId',
            'usersLogin',
            'usersEmail',
        );
        foreach ($session_attrs as $value) {
            $_SESSION[$value] = $user->$value;
        }
        $newURL = '../index.php';
        header('Location: ' . $newURL);
    }

    public function destroySession()
    {
        $session_attrs = array(
            'usersId',
            'usersLogin',
            'usersEmail'
        );
        foreach ($session_attrs as $value) {
            unset($_SESSION[$value]);
        }
        session_destroy();
        $newURL = '../index.php';
        header('Location: ' . $newURL);
    }
}

$user = new Users();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['type'] == 'register')
        $user->register();
    if ($_POST['type'] == 'login')
        $user->login();
}
if (isset($_SESSION['usersId'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if ($_GET['type'] == 'logout') {
            $user->destroySession();
        }
    }
}