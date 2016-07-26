<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
$CI =& get_instance();
?>
        <li class="treeview <? strtolower($this->uri->segment(2))=='groups'||strtolower($this->uri->segment(2))=='users'?printf('active'):'' ?>">
          <a href="#">
            <i class="fa fa-users"></i> <span>Accounts</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="<? strtolower($this->uri->segment(2))=='groups'?printf('active'):'' ?>"><a href="<?php echo base_url().'admin/groups';?>"><i class="fa fa-circle-o"></i> Groups</a></li>
            <li class="<? strtolower($this->uri->segment(2))=='users'?printf('active'):'' ?>"><a href="<?php echo base_url().'admin/users';?>"><i class="fa fa-circle-o"></i> Users</a></li>
          </ul>
        </li>