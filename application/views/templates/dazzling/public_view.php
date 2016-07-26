<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/dazzling/_parts/public_header_view'); ?>
<?php /*
<div class="container">
    <div class="main-content" style="padding-top:40px;">
    </div>
</div>
*/ ?>
<?php echo $the_view_content; ?>
<?php $this->load->view('templates/dazzling/_parts/public_footer_view');?>