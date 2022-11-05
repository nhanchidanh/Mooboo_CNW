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
                'js' => ['main', 'ajax'],
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

		if(isset($_POST['add_bill']) && ($_POST['add_bill']) != "") {
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
            // echo "1";
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

    //Thanh toán vnpay
    function setSession()
    {
        $data = $_POST;
        print_r($data);
    }
    function vnPay_return()
    {
        return $this->view('vnpay_return', []);
    }
    function vnPay()
    {

        $sum = $_POST['sum'];
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = _WEB_ROOT_PATH . "/bill/vnpay_return";
        $vnp_TmnCode = "X7B5I48D"; //Mã website tại VNPAY 
        $vnp_HashSecret = "YNSQKGMIFYVHSJMAOAVKYYTKDXQUODUB"; //Chuỗi bí mật

        $vnp_TxnRef = rand(); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán đơn hàng test';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount =   (float)$sum * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        // $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing


        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            // "vnp_ExpireDate" => $vnp_ExpireDate

        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        // vui lòng tham khảo thêm tại code demo
    }

    
}
