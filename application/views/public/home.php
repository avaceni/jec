<?php
$CI =& get_instance();
foreach($this->data['data'] as $rowdata){
  $row_id=$rowdata->id;
  $row_title=$rowdata->title;
  $row_image_popular=$rowdata->image_popular;
  $row_description=$rowdata->description;
  $row_content=$rowdata->content;
  $row_publish=$rowdata->publish;
  $row_meta=$rowdata->meta;
}
?>
<div class="top-section">
<? if($this->uri->segment(1)==''){ ?>
  <div class="flexslider"><ul class="slides"><li><img width="1920" height="550" src="<?php echo $CI->general_function->siteURL().'/assets/dazzling/images/slideshow/1.jpg';?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="homev_updated1_02" srcset="<?php echo $CI->general_function->siteURL().'/assets/dazzling/images/slideshow/1.jpg';?> 1920w, <?php echo $CI->general_function->siteURL().'/assets/dazzling/images/slideshow/1.jpg';?> 300w, <?php echo $CI->general_function->siteURL().'/assets/dazzling/images/slideshow/1.jpg';?> 1024w, <?php echo $CI->general_function->siteURL().'/assets/dazzling/images/slideshow/1.jpg';?> 350w" sizes="(max-width: 1920px) 100vw, 1920px" data-attachment-id="1743" data-orig-file="<?php echo $CI->general_function->siteURL().'/assets/dazzling/images/slideshow/1.jpg';?>" data-orig-size="1920,550" data-comments-opened="1" data-image-meta="{&quot;aperture&quot;:&quot;0&quot;,&quot;credit&quot;:&quot;&quot;,&quot;camera&quot;:&quot;&quot;,&quot;caption&quot;:&quot;&quot;,&quot;created_timestamp&quot;:&quot;0&quot;,&quot;copyright&quot;:&quot;&quot;,&quot;focal_length&quot;:&quot;0&quot;,&quot;iso&quot;:&quot;0&quot;,&quot;shutter_speed&quot;:&quot;0&quot;,&quot;title&quot;:&quot;&quot;}" data-image-title="homev_updated1_02" data-image-description="" data-medium-file="<?php echo $CI->general_function->siteURL().'/assets/dazzling/images/slideshow/1.jpg';?>" data-large-file="<?php echo $CI->general_function->siteURL().'/assets/dazzling/images/slideshow/1.jpg';?>" /><div class="flex-caption"><a href="https://colorlib.com/dazzling/title-with-special-characters/"><h2 class="entry-title">Pusat Bimbingan Khusus dan Kedinasan</h2><div class="excerpt">Jogja Education Center, We are The Real Solution. Dibimbing oleh Tutor berpengalaman dan profesional di bidangnya. Siswa dibekali dengan latihan soal-soal prediksi yang DIJAMIN hampir sama/ mirip dengan soal yang keluar saat Tes Perguruan Tinggi.</div></a></div><li><img width="1920" height="550" src="<?php echo $CI->general_function->siteURL().'/assets/dazzling/images/slideshow/2.jpg';?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="slide03" srcset="<?php echo $CI->general_function->siteURL().'/assets/dazzling/images/slideshow/2.jpg';?> 1920w, <?php echo $CI->general_function->siteURL().'/assets/dazzling/images/slideshow/2.jpg';?> 300w, <?php echo $CI->general_function->siteURL().'/assets/dazzling/images/slideshow/2.jpg';?> 1024w, <?php echo $CI->general_function->siteURL().'/assets/dazzling/images/slideshow/2.jpg';?> 350w" sizes="(max-width: 1920px) 100vw, 1920px" data-attachment-id="1742" data-orig-file="<?php echo $CI->general_function->siteURL().'/assets/dazzling/images/slideshow/2.jpg';?>" data-orig-size="1920,550" data-comments-opened="1" data-image-meta="{&quot;aperture&quot;:&quot;0&quot;,&quot;credit&quot;:&quot;&quot;,&quot;camera&quot;:&quot;&quot;,&quot;caption&quot;:&quot;&quot;,&quot;created_timestamp&quot;:&quot;0&quot;,&quot;copyright&quot;:&quot;&quot;,&quot;focal_length&quot;:&quot;0&quot;,&quot;iso&quot;:&quot;0&quot;,&quot;shutter_speed&quot;:&quot;0&quot;,&quot;title&quot;:&quot;&quot;}" data-image-title="slide03" data-image-description="" data-medium-file="<?php echo $CI->general_function->siteURL().'/assets/dazzling/images/slideshow/2.jpg';?>" data-large-file="<?php echo $CI->general_function->siteURL().'/assets/dazzling/images/slideshow/2.jpg';?>" /><div class="flex-caption"><a href="https://colorlib.com/dazzling/markup-html-tags-and-formatting/"><h2 class="entry-title">Pusat Bimbingan Khusus Kedinasan dan Kesehatan</h2><div class="excerpt">Terlengkap dan Berpengalaman di Jogja. Kami merupakan institusi yang menyediakan bimbingan persiapan Tes Perguruan Tinggi</div></a></div><li><img width="1920" height="550" src="<?php echo $CI->general_function->siteURL().'/assets/dazzling/images/slideshow/3.jpg';?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="slide02" srcset="<?php echo $CI->general_function->siteURL().'/assets/dazzling/images/slideshow/3.jpg';?> 1920w, <?php echo $CI->general_function->siteURL().'/assets/dazzling/images/slideshow/3.jpg';?> 300w, <?php echo $CI->general_function->siteURL().'/assets/dazzling/images/slideshow/3.jpg';?> 1024w, <?php echo $CI->general_function->siteURL().'/assets/dazzling/images/slideshow/3.jpg';?> 350w" sizes="(max-width: 1920px) 100vw, 1920px" data-attachment-id="1741" data-orig-file="<?php echo $CI->general_function->siteURL().'/assets/dazzling/images/slideshow/3.jpg';?>" data-orig-size="1920,550" data-comments-opened="1" data-image-meta="{&quot;aperture&quot;:&quot;0&quot;,&quot;credit&quot;:&quot;&quot;,&quot;camera&quot;:&quot;&quot;,&quot;caption&quot;:&quot;&quot;,&quot;created_timestamp&quot;:&quot;0&quot;,&quot;copyright&quot;:&quot;&quot;,&quot;focal_length&quot;:&quot;0&quot;,&quot;iso&quot;:&quot;0&quot;,&quot;shutter_speed&quot;:&quot;0&quot;,&quot;title&quot;:&quot;&quot;}" data-image-title="slide02" data-image-description="" data-medium-file="<?php echo $CI->general_function->siteURL().'/assets/dazzling/images/slideshow/3.jpg';?>" data-large-file="<?php echo $CI->general_function->siteURL().'/assets/dazzling/images/slideshow/3.jpg';?>" /><div class="flex-caption"><a href="https://colorlib.com/dazzling/markup-image-alignment/"><h2 class="entry-title">Bimbingan yang Berkualitas</h2><div class="excerpt">Kualitas dan pengalaman kami bertahun-tahun telah mengantarkan lebih dari 200 siswa masuk ke Perguruan Tinggi favorit setiap tahunnya.</div></a></div></li></ul> </div>
  <? } ?>
  <div class="cfa"><div class="container"><div class="col-md-8"><span class="cfa-text">Tertarik mengikuti Bimbingan Tes di Jogja Education Center?</span></div><div class="col-md-4"><a class="btn btn-lg cfa-button" href="<?=base_url().'register';?>">Daftar Sekarang</a></div></div></div>        </div>
  <div id="content" class="site-content container">

  <div class="container main-content-area">
      <div class="row pull-left">
       <div id="primary" class="content-area col-sm-12 col-md-8">
        <main id="main" class="site-main" role="main">

          <article class="post type-post status-publish format-standard has-post-thumbnail hentry category-uncategorized tag-sticky-2 tag-template">
            <header class="entry-header page-header">

            <?
              if(!empty($row_image_popular)&&file_exists(FCPATH.$row_image_popular)){
                ?>
              <img width="730" height="410" src="<? echo base_url().ltrim($row_image_popular,'/'); ?>" class="thumbnail" alt="54" sizes="(max-width: 730px) 100vw, 730px">
                <?
              }
            ?>

              <h1 class="entry-title "><?=$row_title?></h1>

            </header><!-- .entry-header -->

            <div class="entry-content">
              <?=stripslashes($row_content)?>
            </div>

          </article><!-- #post-## -->
        </main><!-- #main -->
      </div>

      <?            
      $this->load->view('templates/dazzling/_parts/secondary_view');
                // echo $this->data['current_user_menu'];
      ?>
    </div><!-- close .row -->
  </div><!-- close .container -->
        </div><!-- close .site-content -->