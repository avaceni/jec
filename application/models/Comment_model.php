<?php
class Comment_model extends CI_Model {

	var $table = 'comment';

	public $rules = array(
		'name' => array(
			'field' => 'name',
			'label' => 'Nama',
			'rules' => 'trim|required',//|callback_check_is_number'
			),
		'from' => array(
			'field' => 'from',
			'label' => 'Sekolah/Alamat',
			'rules' => 'trim|required',//|callback_check_is_number'
			),
		'email' => array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required',//|callback_check_is_number'
			),
		'comment' => array(
			'field' => 'comment',
			'label' => 'Komentar',
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

	function get_all_published($limit, $start){
		$this->db->from($this->table);
		$this->db->where('publish', 1);
		$this->db->limit($limit,$start);
		$this->db->order_by('createdAt','desc');
		return $this->db->get();
	}

	function get_rows_count(){
		$this->db->from($this->table);
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