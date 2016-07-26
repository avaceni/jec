<?php defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'/third_party/mpdf/mpdf.php';
class Register extends Admin_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('register_model');
		$this->load->helper('form','url');
		$this->load->library('form_validation');
	}

	public function index()
	{
		  		$this->data['title'] = 'CRUD Content';
		$this->load->library('pagination');

		$config = array();

		$config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
		$config['full_tag_close'] ="</ul>";
		$config['base_url']     =   base_url().'admin/register/index';
		$config['total_rows']   =   $this->register_model->get_rows_count();
		$config['per_page']     =   $per_page = 5;
		$config['uri_segment']  =   4;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
		$config['first_link']   =   'First';
		$config['last_link']    =   'Last';
		$config['next_link']    =   'Next';
		$config['prev_link']    =   'Prev';
		$config['cur_tag_open'] =   "<li class='active'><a>";
		$config['cur_tag_close']=   "</a></li>";
		$config['num_links'] = 9;

		$this->pagination->initialize($config);
		$this->data['pagging'] = $this->pagination->create_links();
		$page = ($this->uri->segment(4)) ? ($this->uri->segment(4)) : 0;
		$this->data['data'] = $this->register_model->get_all_limit($per_page, $page);
		$this->data['count'] = $this->register_model->get_rows_count();

		$this->render('admin/register/list_register_view');
	}

	public function delete($id){
		$this->register_model->delete_byid($id);
				$message = <<<EOF
					<div class="alert alert-success alert-dismissible">
			            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			            <h4><i class="icon fa fa-check"></i> Success!</h4>
			            Data successfully deleted.
			        </div>
EOF;
					$this->session->set_flashdata("pesan", $message);
		redirect('admin/register/index');
	}

	public function detail($id){
		$data['title'] = 'Detail';
		$this->data['data']  = $this->register_model->get_byid($id);
		$this->render('admin/register/detail_register_view');
	}

    public function Registerpdf()
    {
        $data = [];
        if($this->input->get('date',null) != null){
			$array_date = explode(" - ", $this->input->get('date',''));
			$from = date('Y-m-d',strtotime($array_date[0]));
			$to = date('Y-m-d',strtotime($array_date[1]));
        }
		else{
			$from = date('Y-m-d',time());
			$to = date('Y-m-d',time());
		}
		$this->data['data'] = $this->register_model->get_pdf_register($from, $to);
		$this->data['count'] = $this->register_model->count_pdf_register($from, $to);

		// file_put_contents('count', $data['count']);
		// if($data['count'] > 0){
		// 	foreach($data['data']->result() as $key => $rowContent){

		// 	}
		// }
		$this->data['date_from'] = General_function::getDateFormat($from);
		$this->data['date_to'] = General_function::getDateFormat($to);
        $html=$this->load->view('admin/register/pdf_register_view', '', true);
        $pdfFilePath = "pendaftar_"."{$from}_sd_{$to}".".pdf";
        $param = array('params' => '', 'potrait' => false);
        $this->load->library('m_pdf', $param);
        $css = file_get_contents(base_url().'/assets/adminlte/bootstrap/css/bootstrap.min.css');
        $this->m_pdf->pdf->WriteHTML($css, 1);
        $css = file_get_contents(base_url().'/assets/adminlte/dist/css/pdf.css');
        // $this->m_pdf->pdf->SetHeader("Jogja Education Center | Pendaftar dari {$this->data['date_from']} hingga {$this->data['date_to']} | JEC");
        $this->m_pdf->pdf->setFooter('{PAGENO}');
        $this->m_pdf->pdf->WriteHTML($css, 1);
        $this->m_pdf->pdf->WriteHTML($html);
        $this->m_pdf->pdf->Output($pdfFilePath, "I");        
    }

    public function Singlepdf()
    {
        $data = [];
        if($this->input->get('id',null) != null){
			$this->data['data'] = $this->register_model->get_pdf_single($this->input->get('id',null));
			// $this->data['count'] = $this->register_model->count_pdf_register($from, $to);
	        $html=$this->load->view('admin/register/pdf_single_view', '', true);
	        $pdfFilePath = "pendaftar".".pdf";
	        $param = array('params'=>'','potrait'=> true);
	        $this->load->library('m_pdf',$param);
	        $css = file_get_contents(base_url().'/assets/adminlte/bootstrap/css/bootstrap.min.css');
	        $this->m_pdf->pdf->WriteHTML($css, 1);
	        // $css = file_get_contents(base_url().'/assets/adminlte/dist/css/pdf.css');
	        // $this->m_pdf->pdf->SetHeader("Jogja Education Center | Pendaftar dari {$this->data['date_from']} hingga {$this->data['date_to']} | JEC");
	        $this->m_pdf->pdf->setFooter('{PAGENO}');
	        // $this->m_pdf->pdf->WriteHTML($css, 1);
	        $this->m_pdf->pdf->WriteHTML($html);
	        $this->m_pdf->pdf->Output($pdfFilePath, "I");
        }		
    }

}