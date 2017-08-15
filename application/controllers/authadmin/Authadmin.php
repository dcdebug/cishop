<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/14
 * Time: 19:25
 */
class Authadmin extends  CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }
    function  login(){
        $this->load->view("authadmin/authlogin");
    }

    function  checkuser(){
        redirect("authadmin/authindex/index");

    }

}