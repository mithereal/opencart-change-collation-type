<?php
/*

This file is auto generated from a template file

*/

class ControllerModuleChangeCollationType extends Controller {
	
	private $error = array(); 
	
	public function process() {
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			
		$this->load->model('tool/collation');
		$tables['tables']=$this->model_tool_collation->showTables();
		$tables['num_tables']=count($tables);
		$success=$this->model_tool_collation->changeDBType($this->request->post);
		$this->load->model('tool/collation');
		$tables['tables']=$this->model_tool_collation->showTables($this->request->post);
		$tables['num_tables']=count($tables['tables']);
		$success=$this->model_tool_collation->changeDBType($this->request->post);
		}
			
		echo json_encode($tables);

		
	}
	public function processCategory() {
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
		
		$this->load->model('tool/collation');
		$details=$this->model_tool_collation->changeTable($this->request->post);
		$this->session->data['success'] = $this->language->get('text_success');
		}

		echo json_encode($this->request->post);	
	}
		
		public function index() {
		$this->load->language('module/change_collation_type');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('tool/collation');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
		
			$this->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$text_strings = array(
				'heading_title',
				'button_save',
				'button_cancel',
				'entry_newcharset',
				'entry_newcollation'
		);
		
		foreach ($text_strings as $text) {
			$this->data[$text] = $this->language->get($text);
		}
		$config_data = array(
			'newcharset',
			'newcollation'
		);
		
		foreach ($config_data as $conf) {
			if (isset($this->request->post[$conf])) {
				$this->data[$conf] = $this->request->post[$conf];
			} else {
				$this->data[$conf] = $this->config->get($conf);
				if ($this->data[$conf]) {
					$this->data[$conf] = unserialize($this->data[$conf]);
				}
			}
		}
	
	
 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		
  		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_module'),
			'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('module/change_collation_type', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		$this->data['action'] = $this->url->link('module/change_collation_type', 'token=' . $this->session->data['token'], 'SSL');
		
		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');

	
		//This code handles the situation where you have multiple instances of this module, for different layouts.
		$this->data['modules'] = array();
		
		if (isset($this->request->post['change_collation_type_module'])) {
			$this->data['modules'] = $this->request->post['change_collation_type_module'];
		} elseif ($this->config->get('change_collation_type_module')) { 
			$this->data['modules'] = $this->config->get('change_collation_type_module');
		}		

		$this->load->model('design/layout');
		
		$this->data['layouts'] = $this->model_design_layout->getLayouts();
		$this->data['token'] = $this->session->data['token'];

		//Choose which template file will be used to display this request.
		$this->template = 'module/change_collation_type.tpl';
		$this->children = array(
			'common/header',
			'common/footer',
		);

		//Send the output.
		$this->response->setOutput($this->render());
	}
	
	/*
	 * 
	 * This function is called to ensure that the settings chosen by the admin user are allowed/valid.
	 * You can add checks in here of your own.
	 * 
	 */
	private function validate() {
		if (!$this->user->hasPermission('modify', 'module/change_collation_type')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		return (!$this->error);
	}


}
?>
