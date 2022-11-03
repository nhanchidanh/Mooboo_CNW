<?php
class Auth extends Controller
{
    public function login()
    {
        $this->view("client", [
            'title' => 'Login',
            'page' => 'login',
            'css' => ['base', 'main', 'responsive', 'account'],
            'js' => ['main', 'jquery.validate', 'form_validate']
        ]);
    }

    public function register()
    {
        $this->view("client", [
            'title' => 'Register',
            'page' => 'register',
            'css' => ['base', 'main', 'responsive', 'account'],
            'js' => ['main', 'jquery.validate', 'form_validate']
        ]);
    }

    private $users;
    public function __construct()
    {
        $this->users = $this->model('UserModel');
    }

    function handleRegister()
    {

        if (isset($_POST['register']) && $_POST['register'] != '') {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $name = $firstname . ' ' . $lastname;
            $email = $_POST['email'];
            $password = $_POST['password'];
            $create_at = date('Y-m-d H:i:s');
            $users = $this->users->getAll();
            $checkEmail = false;
            $message = '';
            if (!empty($users)) {
                foreach ($users as $user) {
                    if ($user['email'] == $email) {
                        $checkEmail = true;
                        break;
                    }
                }
            } else {
                $checkEmail = false;
            }
            $checkLogin = false;
            if ($checkEmail) {
                $message = 'Email already exists!';
                $checkLogin = false;
                $_SESSION['msg'] = $message;
            } else {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $status = $this->users->InsertUser($name, $email, $password, $create_at);
                if ($status) {
                    $checkLogin = true;

                    $message = 'Successful account registration';
                } else {
                    $message = 'There was a problem with the system, please try again later';
                    $checkLogin = false;
                }
            }


            if ($checkLogin) {
                $_SESSION['msg'] = $message;
                header('Location: ' . _WEB_ROOT_PATH . '/Auth/login');
            } else {

                header('Location: ' . _WEB_ROOT_PATH . '/Auth/register');
            }
        }
    }

    function handleLogin()
    {
        if (isset($_POST['login']) && $_POST['login']) {

            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->users->SelectOneUser($email);
            $message = '';

            if (!empty($user)) {
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user'] = $user;
                    if ((int)$user['gr_id'] == 1) {
                        header('Location: ' . _WEB_ROOT_PATH . '/admin');
                    } else {
                        header('Location: ' . _WEB_ROOT_PATH . '/home');
                    }
                } else {
                    $_SESSION['msglg'] = 'Incorrect password';
                    $_SESSION['typelg'] = 'danger';

                    header('Location: ' . _WEB_ROOT_PATH . '/Auth/login');
                }
            } else {
                $_SESSION['msglg'] = 'Email is incorrect';
                $_SESSION['typelg'] = 'danger';

                header('Location: ' . _WEB_ROOT_PATH . '/Auth/login');
            }
        }
    }

    function logout()
    {
        unset($_SESSION['user']);
        header('Location: ' . _WEB_ROOT_PATH);
    }
}
