<?php

include_once 'model/user_model.php';

class AuthController {
    static function auth() {
        view('auth_page/layout', ['url' => 'auth']);
    }

    static function saveLogin() {
        $post = array_map('htmlspecialchars', $_POST);

        $user = User::login([
            'username' => $post['username'], 
            'password' => $post['password']
        ]);
        if (array_key_exists('role', $user)) {
            unset($user['password']);
            $_SESSION['user'] = $user;
            header('Location: '.BASEURL.'auth?loginSuccess');
        } 
        else {
            view('auth_page/layout', [
                'url' => 'auth',
                'errorLog' => $user
            ]);
        }
    }

    static function saveRegister() {
        $post = array_map('htmlspecialchars', $_POST);

        $user = User::register([
            'email' => $post['email'], 
            'username' => $post['username'], 
            'password' => $post['password'],
            'role' => $post['role']
        ]);

        if ($user === true) {
            header('Location: '.BASEURL.'auth?registerSuccess');
        } elseif ($user === false){
            header('Location: '.BASEURL.'auth?registerFailed');
        }
        else {
            // var_dump($user);
            // header('Location: '.BASEURL.'auth');
            view('auth_page/layout', [
                'url' => 'auth',
                'errorReg' => $user
            ]);
        }
    }

    static function logout() {
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();
        header('Location: '.BASEURL);
    }

    static function forgotPassword() {}
}