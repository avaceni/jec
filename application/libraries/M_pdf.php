<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
include_once APPPATH.'/third_party/mpdf/mpdf.php';
 
class M_pdf {
 
    public $param;
    public $pdf;
 
    public function __construct($param, $potrait)
    {
        $this->param =$param;
        $this->pdf = new mPDF("","A4",0,"",5,5,5,15,5,5,'L');
    }
}