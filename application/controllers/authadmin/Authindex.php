<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/14
 * Time: 20:06
 */

class  Authindex extends  CI_Controller{



    public  function __construct()
    {
        parent::__construct();
    }


    public  function  index(){
        $this->load->view("authadmin/home");
    }


}