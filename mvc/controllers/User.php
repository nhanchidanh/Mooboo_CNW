<?php
class User extends Controller
{
    private $group;
    private $user;
    public function __construct()
    {
        $this->group = $this->model('GroupUserModel');
        $this->user = $this->model('UserModel');
    }
    public function index()
    {
        $keyword = '';
        $gr_id = 0;
        if (isset($_POST['search']) && ($_POST['search'] != '')) {
            $keyword = $_POST['keyword_user'];
            $_POST['search'] = '';
            if(!empty($_POST['group'])){
                $gr_id = $_POST['group'];

            }
        }
        $users = $this->user->getAll($keyword, 0, (int)$gr_id);
        $groups = $this->group->getAll();
        return $this->view("admin", [
            'page' => 'users/list',
            'users' => $users,
            'groups' => $groups,
            'js' => ['deletedata', 'search'],
            'title'=> 'USERS'
        ]);
    }

    function add_user()
    {
        $msg = '';
        $type = '';
        $groups = $this->group->getAll();
        if (isset($_POST['add_user']) && ($_POST['add_user'])) {
            $name = $_POST['username'];
            $avatar = $this->processImg();
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password = password_hash($password, PASSWORD_DEFAULT);
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $group = $_POST['group'];
            $desc = $_POST['description'];

            $created_at = date('Y-m-d H:i:s');
            $users = $this->user->getAll();
            $check = 0;
            foreach ($users as $user) {
                if ($user['name'] == $name) {
                    $check = 1;
                    break;
                } else {
                    $check = 0;
                }
            }

            if ($check == 1) {
                $type = 'danger';
                $msg = 'User name already exists';
            } else {
                $status = $this->user->insert($name, $avatar, $group, $email, $password, $phone, $address, $desc, $created_at);
                if ($status) {
                    $type = 'success';
                    $msg = 'Added user successfully';
                    $_SESSION['msg'] = $msg;
                    header('Location: ' . _WEB_ROOT_PATH . '/user/list');
                } else {
                    $type = 'danger';
                    $msg = 'System error';
                }
            }
        }
        return $this->view('admin', [
            'page' => 'users/add',
            'groups' => $groups,
            'msg' => $msg,
            'type' => $type,
            'title' => 'User',
            'js' => ['uploadimg']
        ]);
    }

    function update_user($id)
    {
        $user = $this->user->SelectUser($id);
        $groups = $this->group->getAll();
        if (isset($_POST['update_user']) && ($_POST['update_user'])) {

            $name = $_POST['username'];
            $avatar = $this->processImg();            
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (!empty($password)) {
                $password = password_hash($password, PASSWORD_DEFAULT);
            }
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $group = $_POST['group'];
            $desc = $_POST['description'];
            $updated_at = date('Y-m-d H:i:s');
            $users = $this->user->getAll('', $id);
            $check = 0;

            foreach ($users as $user) {
                if ($user['name'] == $name) {
                    $check = 1;
                    break;
                } else {
                    $check = 0;
                }
            }
            $header = 0;
            if ($check == 1) {
                $header = 0;
                $type = 'danger';
                $msg = 'User user name already exists';
            } else {
                $status = $this->user->updateUser($id, $name, $avatar, $group, $email, $password, $phone, $address, $desc, $updated_at);
                if ($status) {
                    $header = 1;
                    $type = 'success';
                    $msg = 'Update user successfully';
                } else {
                    $header = 0;
                    $type = 'danger';
                    $msg = 'System error';
                }
            }

            if ($header === 0) {
                return $this->view('admin', [
                    'page' => 'users/update',
                    'user' => $user,
                    'msg' => $msg,
                    'type' => $type,
                    'js' => ['uploadimg']
                ]);
            } else {
                $_SESSION['msg'] = $msg;
                header('Location: ' . _WEB_ROOT_PATH . '/user/list_user');
                return;
            }
        }
        if (!empty($user)) {
            return $this->view('admin', [
                'page' => 'users/update',
                'user' => $user,
                'groups' => $groups,
                'js' => ['uploadimg']
            ]);
        }
    }

    function delete_user($id)
    {
        $status = $this->user->deleteUser($id);
        if ($status) {
            echo -1;
        } else {
            echo -2;
        }
    }

    function processImg() {
        if(isset($_FILES['avatar'])) {
            $date = new DateTimeImmutable();
            $fileNameArr = explode(".", $_FILES['avatar']['name']);
            $target_file = _UPLOAD_PATH . '/avt/' .  basename($date->getTimestamp() . "." . $fileNameArr[1]);

            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file)) {
                return $date->getTimestamp() . "." . $fileNameArr[1];
            }
        }
    }
}
