<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 02.11.2016
 * Time: 10:43
 */
namespace App;
use PolPav\DI\Service;
use PolPav\Exception\ExceptionLogin;
use PolPav\Logger;
use PolPav\Security\Session;
use PolPav\Security\Security;
use PolPav\View\Render;

class LoginController
{
    public $response;
    public $redirect;

    /**
     * LoginController construct
     * this method initialize services
     */

    public function __construct()
    {
        $this->response = Service::getService('response');
        $this->redirect = Service::getService('redirect');
    }

    /**
     * this method set user login data in session
     */

    public function setUserSession()
    {
        $session = new Session();
        $buffer = Render::view('login.template.php');
        $this->response->add($buffer);
        $session->setLoginData();
    }

    /**
     * this method check users login and password
     * @throws ExceptionLogin
     * @return mixed
     */
    public function checkUser()
    {
        $security = new Security();

        Session::sessionStart();
        $session = Session::getSession();
        if ($session['admin'] == 1) {
            $this->redirect->redirect('/admin');
        } else {
            if (empty($_POST)) {
                $buffer = Render::view('admin.template.php');
                $this->response->add($buffer);
            }
        }

        $login = strip_tags(trim($_POST['login']));
        $password = strip_tags(trim($_POST['password']));

        if ($login and $password) {
            try {
                $user = $security->checkUser($login);
                if (is_string($user)) {
                    list(, $hash) = explode(':', $user);
                    if ($security->checkPassword($password, $hash)) {
                        Session::sessionStart();
                        Session::setSession('admin', true);
                        $this->redirect->redirect('/admin');
                    }
                }
            } catch (ExceptionLogin $e) {
                Logger::passwordError('../app/admin/file.log', 'Неправильный пароль');
            }
        }
    }
}





