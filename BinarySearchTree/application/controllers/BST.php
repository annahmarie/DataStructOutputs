<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BST extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('BST_model');
		$this->load->helper('url');

	}

	public function index()
	{
		$this->load->view('bst/BST_homepage');
	}

	public function UseInput()
	{
		$whattodo = $this->input->post("whattodo");
		$input = $this->input->post("input");

		if ($whattodo=="Insert")
		{
			$q = $this->db->get_where('tblnumberlist', array('Value' => $input));
			if ($q->num_rows()) {

				$this->session->set_flashdata('error', "duplicate key ($input)");
				redirect('BST');				
			}
			$this->InsertInput($input);
			redirect('BST');
		}

		if ($whattodo=="Delete")
		{
			$this->DeleteInput($input);
		}

		if ($whattodo=="Search")
		{
			$row = $this->BST_model->getrootnode();
			$this->SearchInput($input, $row);
		}
	}

	public function InsertInput($input)
	{
		$data = $this->BST_model->isdbempty();
		
		if ($data == "true")
		{
			$this->BST_model->insertfirstinputtodb($input);
		} 

		else 
		{
			$data = $this->BST_model->getrootnode();
			$root = $data['Value'];
		}

		do  
		{
		
		if ($input<$root)
			{
			$side = "left";
			$parentchildless = $this->BST_model->isparentchildless($root, $side);
			}

		else
			{
			$side = "right";
			$parentchildless = $this->BST_model->isparentchildless($root, $side);	
			}
				
				if ($parentchildless <> "true")
				{
					$root = $parentchildless['Value'];
				}
			
		}while ($parentchildless <> "true");	
		$this->BST_model->insertinputtodb($input, $root, $side);				

	}

	public function DeleteInput()
	{
		// do something
	}

	public function SearchInput($input, $root)
	{
		$currentNode = $root;
		
		$level = 0;
		while (true)
		{
			$nodeValue = $currentNode['Value'];
			if ($input == $currentNode['Value'] || $level > 500) // limit, 500 loops
			{
				print "found $nodeValue at level $level<br>";
				break;
			}
			else if ($input < $nodeValue)
			{
				$row = $this->findValue($currentNode, 'left');
			}
			else
			{
				$row = $this->findValue($currentNode, 'right');
			}

			if ($row == null)
			{
				print "$input not found!";
				break;
			}

			print "$nodeValue at level $level<br>";


			$currentNode = $row;
			$level++;
		}
	}

	private function findValue($node, $side) {
		$q = $this->db->get_where('tblnumberlist', array('ParentID' => $node['ID'], 
			'Side' => $side));

		$row = $q->row_array();

		if (!empty($row))
			return $row;
		else
			return null;
	}




}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */