<?php

class PagesController extends Controller
{

    protected $model;

    public function __construct($data = array())
    {

        parent::__construct($data = array());
        $this->model = new Page();

    }

    public function index()
    {

        $this->data['pages_list'] = $this->model->getList();

    }

    public function view()
    {

        if (isset($this->params[0])) {

            $alias = strtolower($this->params[0]);
            $this->data['columns'] = $this->model->getByAlias($alias);

        }
    }

    public function admin_index()
    {

        $this->data['admin_zone'] = $this->model->getList();

    }

    public function admin_add(){

        if ($_POST) {

            $result = $this->model->save($_POST);
            $result ? Session::setFlash('Page was saved') : Session::setFlash('Error.');

        }
    }

	public function admin_edit(){

	    if(isset($this->params[0])){

		    $this->data['edit_pages'] = $this->model->getById($this->params[0]);
            $result = $this->model->save($_POST, $this->params[0]);

            if($_POST) {

               $result ? Session::setFlash('Page was saved') : Session::setFlash('Error.');

            }

	    }else{

		     Session::setFlash('Wrong page id.');
             Router::redirect('/admin/pages/');

	    }
	}

    public function admin_delete(){

        if(isset($this->params[0])) {

            $this->model->delete($this->params[0]);
            Session::setFlash('Page was deleted');

        }
    }
}
