<?php

class ContactsController extends Controller{
	
	protected $model;

	public function __construct($data = array()){
		
        parent::__construct($data = array());
        $this->model = new Message();

	}

    public function index(){

        if($_POST) {

            $validate = new Validate();

           if($validate->is_empty($validate::input('name'), $validate::input('submit')) ||
              $validate->min_length($validate::input('name'), 4, $validate::input('submit')) ||
              $validate->max_length($validate::input('name'), 100, $validate::input('submit')) ||
              $validate->email($validate::input('email'))) {

               return null;

            }else {

                $this->model->save($_POST);
            }
            Session::setFlash('Thank you! Your message was sent successfully');
            Session::flash();

        }

	}

	public function admin_index(){

		$this->data['messages'] = $this->model->getList();
		
	}

}
