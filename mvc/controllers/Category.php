<?php
class Category extends Controller{

    private $categories;
    function __construct()
    {
        $this->categories = $this->model('CategoryModel');
    }

    public function index(){
        $keyword = '';
        if(isset($_POST['search']) && ($_POST['search'] != '')) {
            $keyword = $_POST['keyword_category'];
            $_POST['search'] = '';
        }

        $categories = $this->categories->getAll($keyword);
        return $this->view("admin", [
            'page' => 'category/list',
            'categories' => $categories,
            'js' => ['deletedata', 'search'],
            'title' => 'Category'
        ]);
    }

    function add_category()
    {
        $msg = '';
        $type = '';
        if (isset($_POST['add_category']) && $_POST['add_category']) {
            $name = $_POST['categoryname'];
            $created_at = date('Y-m-d H:i:s');
            $categories = $this->categories->getAll();
            $check = 0;
            foreach ($categories as $category) {
                if ($category['name'] == $name) {
                    $check = 1;
                    break;
                } else {
                    $check = 0;
                }
            }

            if ($check == 1) {
                $type = 'danger';
                $msg = 'Category name already exists';
            } else {
                $status = $this->categories->insertCate($name, $created_at);
                if ($status) {
                    $type = 'success';
                    $msg = 'Added category successfully';
                    $_SESSION['msg'] = $msg;
                    header('Location:' . _WEB_ROOT_PATH . '/category/list_category');
                    return;
                } else {
                    $type = 'danger';
                    $msg = 'System error';
                }
            }
        }
        return $this->view('admin', [
            'page' => 'category/add',
            'title' => 'Add Category',
            'msg' => $msg,
            'type' => $type
        ]);
    }

    function update_category($id)
    {
        $msg = '';
        $type = '';
        $category = $this->categories->selectOneCate($id);

        if (isset($_POST['update_category']) && ($_POST['update_category'])) {
            $name = $_POST['categoryname'];
            $updated_at = date('Y-m.d H:i:s');
            $categories = $this->categories->getAll();

            $check = 0;
            foreach ($categories as $category) {
                if ($category['name'] == $name) {
                    $check = 1;
                    break;
                } else {
                    $check = 0;
                }
            }
            if ($check == 1) {
                $type = 'danger';
                $msg = 'Category name already exists';
            } else {
                $status = $this->categories->updateCate($id, $name, $updated_at);
                if ($status) {
                    $type = 'success';
                    $msg = 'Updated category successfully';
                    $_SESSION['msg'] = $msg;
                    header('Location:' . _WEB_ROOT_PATH . '/category/list_category');
                    return;
                } else {
                    $type = 'danger';
                    $msg = 'System error';
                }
            }
        }
        return $this->view('admin', [
            'page' => 'category/update',
            'title' => 'Update category',
            'category' => $category,
            'msg' => $msg,
            'type' => $type
        ]);
    }

    function delete_category($id) {
        $status = $this->categories->deleteCate($id);
        if($status) {
            echo -1;
        }
        else {
            echo -2;
        }
    }
}