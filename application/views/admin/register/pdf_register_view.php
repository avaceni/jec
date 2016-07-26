<?php
$CI =& get_instance();
?>
    <div style="text-align: center">
        <p>
            Berikut ini daftar pendaftar yang tersimpan dalam sistem JEC sejak
            <span style="font-size: 16px; font-weight: bold">
                <span id="c-month-recite"><?=$this->data['date_from']?></span> - <span id="c-year-recite"><?=$this->data['date_to']?></span>.
            </span>
        </p>
        <p>

        </p>    
    </div>
<table cellspacing="0" class="table table-bordered table-condensed c-pdf-table">
    <thead>
        <tr>
            <th> # </th>
            <th>Name</th>
            <th>Photo</th>
            <th>Address</th>
            <th>Phone</th>                
            <th>Email</th>
            <th>School</th>
            <th>Majoring</th>
            <th>Parent Name</th>
            <th>Parent Job</th>
            <th>Parent Phone</th>
            <th>Course</th>
            <th>Program</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if($this->data['count'] != 0) {
            $no=1;
            foreach($this->data['data']->result() as $key => $rowContent){
                ?>
                <tr>
                <td><?=$no?></td>
                <td><?=$rowContent->name?></td>
                <td><img width="150px" src="<?
                  !empty($rowContent->photo)&&file_exists(FCPATH.$rowContent->photo)?printf(base_url().ltrim($rowContent->photo,'/')):printf(base_url().'assets/default/no_image_small.png')
                  ?>"></td>
                <td><?=$rowContent->address?></td>
                <td><?=$rowContent->phone?></td>
                <td><?=$rowContent->email?></td>
                <td><?=$rowContent->school?></td>
                <td><?=$rowContent->majoring?></td>
                <td><?=$rowContent->parent_name?></td>
                <td><?=$rowContent->parent_job?></td>
                <td><?=$rowContent->parent_phone?></td>
                <td><? echo $CI->general_function->getCourse($rowContent->course) ?></td>
                <td><? $rowContent->program==1?print('General'):print('Exclusive') ?></td>
                <td><?=$rowContent->createdAt?></td>
                <?
                $no++;
            }
        } else {
            ?>
            <tr>
                <td colspan="13">
                    <i>Tidak ada data.</i>
                </td>
            </tr>
            <?php
        }
         ?>
    </tbody>
</table>
 