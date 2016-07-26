<?php
class Image_model extends CI_Model {

	var $table = 'image';

	public $rules = array(
		'title' => array(
			'field' => 'title',
			'label' => 'Judul',
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

	function get_all_published_image($limit, $start){
		$this->db->from($this->table);
		$this->db->limit($limit,$start);
		$this->db->where('publish', 1);
		$this->db->order_by('createdAt','desc');
		return $this->db->get();
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

	function resize_image($id){
		$data = $this->get_byid($id);
		file_put_contents('iniffffffffffff', '');
		foreach($data as $rowdata){
			$image_source=$rowdata->path;
			$data_id=$rowdata->id;
		}
		file_put_contents('image_source', json_encode($image_source));
		if ($image_source != Null || $image_source != 'null') {
		file_put_contents('ggggggggggg', '');
			$array_path = explode('/',$image_source);
			$file_name = array_pop($array_path);
			$array_file_name = explode('.',$file_name);
			$extension = array_pop($array_file_name);
			$used_path = ltrim(implode('/',$array_path),'/');

			list($width,$height) = getimagesize(FCPATH.$used_path.'/'.$file_name);
			$source_path = FCPATH.$used_path.'/'.$file_name;
			$params = array('image'=>$source_path);
			
			$width_ratio = array('small'=>array(100,100));

			$this->load->library('image_lib');

			foreach ($width_ratio as $size_name => $new_size) {
				$config['image_library']    = 'gd2';
				$config['source_image']     = $source_path;
				$config['create_thumb']     = FALSE;
				$config['maintain_ratio']   = FALSE;
				$config['width']            = $width;
				$config['height']           = $height;
				$config['quality']           = 100;

				$this->image_lib->clear();
				
				${$size_name.'FileName'} = $used_path . "/{$array_file_name[0]}_{$size_name}.{$extension}";
				if($width/$height > $new_size[0]/$new_size[1]){
					$resize_width = $width;
					if($height > $new_size[1]){
						$resize_width = round($width/$height*$new_size[1]);
						$config['width']    = $resize_width;
						$config['height']   = $new_size[1];
					}
					$config['new_image'] = FCPATH.$used_path."/{$array_file_name[0]}_{$size_name}".".{$extension}";
					$this->image_lib->initialize($config);
					$this->image_lib->resize();

					$croped_width = $new_size[0]/$new_size[1]*$config['height'];
					$crop_size = ($resize_width - $croped_width)/2;

					$config['width']    = $config['width']-$crop_size;
					$config['height']   = $config['height'];
					$config['x_axis']       = $crop_size;
					$config['y_axis']       = 0;
					$config['new_image']    = FCPATH.$used_path."/{$array_file_name[0]}_{$size_name}".".{$extension}";
					$config['source_image'] = FCPATH.$used_path."/{$array_file_name[0]}_{$size_name}".".{$extension}";

					$this->image_lib->initialize($config);
					$this->image_lib->crop();

					$config['width']   = $config['width']-$crop_size;
					$config['x_axis']  = 0;

					$this->image_lib->initialize($config);
					$this->image_lib->crop();
				}
				else{
					$resize_height = $height;
					if($width > $new_size[0]){
						$resize_height = round($height/$width*$new_size[0]);
						$config['width']    = $new_size[0];
						$config['height']   = $resize_height;
					}

					$config['new_image'] = FCPATH.$used_path."/{$array_file_name[0]}_{$size_name}".".{$extension}";
					$this->image_lib->initialize($config);
					$this->image_lib->resize();

					$croped_height = $new_size[1]/$new_size[0]*$config['width'];
					$crop_size = ($resize_height - $croped_height)/2;

					$config['width']    = $config['width'];
					$config['height']   = $config['height']-$crop_size;
					$config['x_axis']       = 0;
					$config['y_axis']       = $crop_size;
					$config['new_image']    = FCPATH.$used_path."/{$array_file_name[0]}_{$size_name}".".{$extension}";
					$config['source_image'] = FCPATH.$used_path."/{$array_file_name[0]}_{$size_name}".".{$extension}";

					$this->image_lib->initialize($config);
					$this->image_lib->crop();

					$config['height']   = $config['height']-$crop_size;
					$config['y_axis']       = 0;

					$this->image_lib->initialize($config);
					$this->image_lib->crop();
					
				}
				chmod(${$size_name.'FileName'}, 0777);
			}
			
			$data = array(
				'id'                => $id,
				'image_thumbnail'   => "/".$used_path."/{$array_file_name[0]}_small".".{$extension}",
				);
			$this->update($data);
		}
		return true;
	}

	function get_small_image($id) {
		$image = file_exists(FCPATH.$rowContent->image_thumbnail)?base_url().$rowContent->image_thumbnail:base_url().'assets/default/no_image_small.png';
		return $image;
	}

}
?>