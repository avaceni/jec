<?php
class Register_model extends CI_Model {

	var $table = 'registration';

	public $rules = array(
		'name' => array(
			'field' => 'name',
			'label' => 'Nama',
			'rules' => 'trim|required',//|callback_check_is_number'
			),
		'address' => array(
			'field' => 'address',
			'label' => 'Alamat',
			'rules' => 'trim|required',//|callback_check_is_number'
			),
		'phone' => array(
			'field' => 'phone',
			'label' => 'Telepon/HP',
			'rules' => 'trim|required',//|callback_check_is_number'
			),
		'school' => array(
			'field' => 'school',
			'label' => 'Sekolah',
			'rules' => 'trim|required',//|callback_check_is_number'
			),
		'majoring' => array(
			'field' => 'majoring',
			'label' => 'Jurusan',
			'rules' => 'trim|required',//|callback_check_is_number'
			),
		'parent_name' => array(
			'field' => 'parent_name',
			'label' => 'Nama Orang Tua',
			'rules' => 'trim|required',//|callback_check_is_number'
			),
		'parent_job' => array(
			'field' => 'parent_job',
			'label' => 'Pekerjaan Orang Tua',
			'rules' => 'trim|required',//|callback_check_is_number'
			),
		'parent_phone' => array(
			'field' => 'parent_phone',
			'label' => 'Telepon Orang Tua',
			'rules' => 'trim|required',//|callback_check_is_number'
			),
		'program' => array(
			'field' => 'program',
			'label' => 'Program',
			'rules' => 'trim|required',//|callback_check_is_number'
			),
		);

	public $messages = array(
		'required' => '%s harus diisi'
		);

	function __construct() {
		parent::__construct();
	}

	function get_all_limit($limit, $start){
		$this->db->from($this->table);
		$this->db->limit($limit,$start);
		$this->db->order_by('createdAt','desc');
		return $this->db->get();
	}

	function get_pdf_register($from, $to){
		$this->db->from($this->table);
		$this->db->where('DATE(createdAt) >=',$from);
		$this->db->where('DATE(createdAt) <=',$to);
		$this->db->order_by('createdAt','desc');
		return $this->db->get();
	}

	function get_pdf_single($id){
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		}
	}

	function count_pdf_register($from, $to){
		$this->db->from($this->table);
		$this->db->where('DATE(createdAt) >=',$from);
		$this->db->where('DATE(createdAt) <=',$to);
		return $this->db->count_all_results();
	}


	function get_rows_count(){
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	function get_published_count(){
		$this->db->from($this->table);
		$this->db->where('publish', 1);
		return $this->db->count_all_results();
	}

	function get_byid($id) {
		$this->db->from($this->table);
		$this->db->where('id', $id);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		}
	}

	function insert($data){
		$this->db->insert($this->table, $data);
		return TRUE;
	}

	function last_insert_id(){
		return $this->db->insert_id();
	}

	function update($data) {
		$this->db->where('id', $data['id']);
		$this->db->update($this->table, $data);
		return TRUE;
	}

	function delete_byid($id) {
		$this->db->where('id', $id);
		$this->db->delete($this->table);
		if ($this->db->affected_rows() == 1) { 
			return TRUE;
		}
		return FALSE;
	}

}
?>