<?php
class Group extends Controller{
    private $group;
    public function __construct()
    {
        $this->group = $this->model('GroupUserModel');
    }
    public function index(){
        $keyword = '';
        if(isset($_POST['search']) && ($_POST['search'] != '')) {
            $keyword = $_POST['keyword_group'];
            $_POST['search'] = '';
        }
        $groups = $this->group->getAll($keyword);
        return $this->view("admin",[
            'page' => 'groups/list',
            'groups' => $groups,
            'js' => ['deletedata','search'],
            'title' => 'USER GROUP'
        ]);
    }

    function add_group()
    {
        $msg = '';
        $type = '';
        if (isset($_POST['add_group']) && ($_POST['add_group'])) {
            $name = $_POST['groupname'];
            $created_at = date('Y-m-d H:i:s');
            $groups = $this->group->getAll();
            $check = 0;
            foreach ($groups as $group) {
                if ($group['name'] == $name) {
                    $check = 1;
                    break;
                } else {
                    $check = 0;
                }
            }

            if ($check == 1) {
                $type = 'danger';
                $msg = 'User group name already exists';
            } else {
                $status = $this->group->insertGroup($name, $created_at);
                if ($status) {
                    $type = 'success';
                    $msg = 'Added user group successfully';
                    $_SESSION['msg'] = $msg;
                    header('Location: ' . _WEB_ROOT_PATH . '/group');
                } else {
                    $type = 'danger';
                    $msg = 'System error';
                }
            }
        }
        return $this->view('admin', [
            'page' => 'groups/add',
            'msg' => $msg,
            'type' => $type
        ]);
    }

    function delete_group($id)
    {
    
            $status = $this->group->deleteGroup($id);
            if ($status) {
                echo -1;
            } else {
                echo -2;
            }
    }

    function update_group($id)
    {
        $group = $this->group->SelectOneGroup($id);
        if (isset($_POST['update_group']) && ($_POST['update_group'])) {
            $name = $_POST['groupname'];
            $updated_at = date('Y-m-d H:i:s');
            $groups = $this->group->getAll();
            $check = 0;
            foreach ($groups as $group) {
                if ($group['name'] == $name) {
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
                $msg = 'User group name already exists';
            } else {
                $status = $this->group->updateGroup($id, $name, $updated_at);
                if ($status) {  
                    $header = 1;
                    $type = 'success';
                    $msg = 'Updated user group successfully';
                } else {
                    $header = 0;
                    $type = 'danger';
                    $msg = 'System error';
                }
            }

            if ($header === 0) {
                return $this->view('admin', [
                    'page' => 'groups/update',
                    'group' => $group,
                    'msg' => $msg,
                    'type' => $type
                ]);
            } else {
                $_SESSION['msg'] = $msg;
                header('Location: ' . _WEB_ROOT_PATH . '/group');
                return;
            }
        }
        // Tại sao lại check thêm điều kiện dưới này?
        if (!empty($group)) {
            return $this->view('admin', [
                'page' => 'groups/update',
                'group' => $group,
            ]);
        }
    }
}