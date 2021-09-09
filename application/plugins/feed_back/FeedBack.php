<?php

use VthSupport\Classes\LangHelper as LH;


use FeedBack\Tables\Orders;


class FeedBack extends IPlugin
{

    protected $linkDoPayment = "gui-thanh-toan";


    public function install()
    {

        Orders::instance()->install();

        $this->addRoutes("Vindex/doPayment", $this->linkDoPayment);
    }


    public function uninstall()
    {


        Orders::instance()->uninstall();


        $this->removeFile();

        $this->removeRoutes($this->linkDoPayment);
    }

    public function doPayment($itemRoutes)
    {
       
        echo "1";

        $post = $this->CI->input->post();



        if (isset($post) && count($post) > 0) {

            $post = $this->CI->input->post();


            $resultHook = $this->CI->hooks->call_hook(['feed_back', 'post' => $post]);


            if (!is_bool($resultHook) && is_array($resultHook)) {

                extract($resultHook);
            }

            if (!isset($post['name']) || $post['name'] == "") {

                return echoJSON(100, LH::lang('MISS_INFO_CUSTOMER', 'Thiếu thông tin tên khách hàng!'));
            }


            if (isset($post['phone']) && empty($post['phone'])) {


                echoJSON(110, LH::lang('PLEASE_ENTER_PHONE', "Vui lòng nhập số điện thoại"));


                return;
            }


            if (!empty($post['phone'])) {


                if (!preg_match('/^\d{10}$/', $post['phone'])) {


                    echoJSON(110, LH::lang('PHONE_IS_INVALID', "Nhập sai định dạng số điện thoại!"));


                    return;
                }
            }


            if (isset($post['email']) && empty($post['email'])) {


                echoJSON(110, LH::lang('PLEASE_ENTER_EMAIL', 'Vui lòng nhập email!'));


                return;
            }


            if (isset($post['email']) && !filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {


                echoJSON(100, LH::lang('EMAIL_IS_INVALID', 'Email không hợp lệ!'));


                return;
            }


            $customer = [];


            $customer['title'] = LH::lang('CUSTOMER_INFO', 'Thông tin khách hàng');


            $customer['header'] = [


                'name'    => LH::lang('CUSTOMER_NAME', 'Khách hàng'),


                'email'    => LH::lang('CUSTOMER_EMAIL', 'Email'),


                'phone'    => LH::lang('CUSTOMER_PHONE', 'Số điện thoại'),


                'address'    => 'Địa chỉ hiện tại',


                'note'    => LH::lang('CUSTOMER_NOTE', 'Ghi chú')


            ];


            $customer['data']['name'] = isset($post['name']) ? $post['name'] : "";


            $customer['data']['email'] = isset($post['email']) ? $post['email'] : "";


            $customer['data']['phone'] = isset($post['phone']) ? $post['phone'] : "";


            $customer['data']['address'] = isset($post['address']) ? $post['address'] : "";


            $customer['data']['note'] = isset($post['note']) ? $post['note'] : "";

            echo $customer;
           
        }
    }
}
