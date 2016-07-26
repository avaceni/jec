<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/sbadmin2/_parts/admin_master_header_view'); ?>
<?php /*
<div class="container">
    <div class="main-content" style="padding-top:40px;">
    </div>
</div>
*/ ?>
<?php echo $the_view_content; ?>
<?php $this->load->view('templates/sbadmin2/_parts/admin_master_footer_view');?>
