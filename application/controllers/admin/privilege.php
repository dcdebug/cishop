<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

#权限控制器
class Privilege extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper('captcha');
		$this->load->library('form_validation');
		$this->load->model('admin_model','admin');
		// $this->output->enable_profiler(true);
	}

	public function login(){
		// $vals = array(
		// 	'word' => rand(1000,9999),
		// 	'img_path' => './data/captcha/' ,
		// 	'img_url' => base_url() . 'data/captcha/',
		// );

		// $data = create_captcha($vals);
		// var_dump($data);
		$this->load->view('login.html');
	}

	#生成验证码
	public function code(){
		#调用函数生成验证码
		$vals = array(
			'word_length' => 4,
		);
		create_captcha($vals);
	}


	#处理登录
	public function signin(){
		#设置验证规则
		$this->form_validation->set_rules('username','用户名','required');
		$this->form_validation->set_rules('password','密码','required');
		$this->form_validation->set_rules('captcha','验证码','required');

		$pos = $this->input->post();
		$captcha = strtolower($this->input->post('captcha'));
		session_start();

		$code = strtolower($_SESSION['captcha_session']);

		if ($captcha === $code){
			#验证码正确，则需要验证用户名和密码
			if ($this->form_validation->run() == false){
				$data['message'] = validation_errors();
				$data['url'] = site_url('admin/privilege/login');
				$data['wait'] = 3;
				$this->load->view('message.html',$data);
			} else{
				$admin_name = $this->input->post('username',true);
				$password = $this->input->post('password',true);

				// if ($username == 'admin' && $password == '123'){
				if ($this->admin->get_admin($admin_name,$password)){
					# OK，保存session信息,然后跳转到首页
					$this->session->set_userdata('admin',$admin_name);
					redirect('admin/main/index');
				} else{
					# error
					$data['url'] = site_url('admin/privilege/login');
					$data['message'] = '用户名和密码错误，请重新填写';
					$data['wait'] = 3;
					$this->load->view('message.html',$data);
				}
			}
			
		} else {
			#验证码不正确，给出提示页面，然后返回
			die;
			$data['url'] = base_url('admin/privilege/login');
			$data['message'] = '验证码错误，请重新填写';
			$data['wait'] = 3;
			$this->load->view('message.html',$data);
		}
	}

	public function logout(){
		$this->session->unset_userdata('admin');
		$this->session->sess_destroy();
		redirect('admin/privilege/login');
	}
}