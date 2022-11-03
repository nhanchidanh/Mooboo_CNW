<?php
class Bill extends Controller
{
    private $bills;
    function __construct()
    {
        $this->bills = $this->model('BillModel');
    }
    public function index()
    {
        $status = '';
        if (isset($_GET['type'])) {
            $status = $_GET['type'];
        }
        // $categories = $this->categories->getAllCl();
        if(isset($_SESSION['user'])){
            $user_id = $_SESSION['user']['id'];
        }
        $getAllBill = $this->bills->getAllBill($status, $user_id);
        $billNew = [];
        foreach ($getAllBill as $bill) {
            $bill['detail'] = $this->bills->getDetailBill($bill['id']);
            array_push($billNew, $bill);
        }

        if (!isset($_SESSION['user'])) {
            redirectTo();
        } else {
            return $this->view("client", [
                'page' => 'bill',
                'title' => 'Order',
                'css' => ['base', 'main', 'responsive'],
                'js' => ['main'],
                'getAllBill' => $billNew,

            ]);
        }
    }

    public function show_bill(){
        $user_id = 0;

        $keyword = '';
        $status = -1;
        if(isset($_POST['status'])){
            $status = $_POST['status'];
        }
        if(isset($_POST['keyword_bill'])){
            $keyword = $_POST['keyword_bill'];
        }
        
		$getAllBill = $this->bills->getAllBill($status, $user_id, $keyword);
		$billsNew = [];
		foreach ($getAllBill as $bill) {
			$bill['detail'] = $this->bills->getDetailBill($bill['id']);
			array_push($billsNew, $bill);
		}

        return $this->view("admin", [
            'page' => 'bill/list',
            'title' => 'Bill',
            'js' => ['deletedata', 'search'],
            'billsNew' => $billsNew
        ]);
    }

    public function add_bill() {

		if(isset($_POST['add_bill']) && ($_POST['add_bill']) != " ") {
			$fullname = $_POST['fullname'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$address = $_POST['address'];
			$note = $_POST['note'];
			$total = $_POST['total'];
			$method = $_POST['method'];
            if (isset($_SESSION['user'])) {
				$user_id = $_SESSION['user']['id'];
			} else $user_id = 0;
			$created_at = date('Y-m-d H:i:s');
            
			$idBill = $this->bills->insertBill($fullname, $phone, $email, $address, $note, $total, $method, $user_id, $created_at);

			if ($idBill) {
            foreach ($_SESSION['cart'] as $item) {
                if (isset($item['id']) && $item['id']) {

                    $this->bills->insertDetailBill($item['id'], $item['image'], $item['name'], $item['price'], $item['number'],  $item['total'], $idBill, $created_at);
                }
            }
            unset($_SESSION['cart']);
            redirectTo('bill');
        }

		}
	}

    function update_bill($id)
	{
		$bill = $this->bills->SelectOneBill($id);
		if(!empty($bill)) {
			$updated_at = ('Y-m-d H:i:s');
			$this->bills->editStatus($id, (int)$bill['status']+1, $updated_at);
			header('Location:' . _WEB_ROOT_PATH . '/bill/show_bill');
		}
	}

    function delete_bill($id)
	{
		$status = $this->bills->deleteBill($id);
		if ($status) {
			echo -1;
		} else {
			echo -2;
		}
	}

    
}
