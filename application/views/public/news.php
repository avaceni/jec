<?php
$CI =& get_instance();
?>
<div class="top-section">
  <div class="cfa"><div class="container"><div class="col-md-8"><span class="cfa-text">Tertarik mengikuti Bimbingan Tes di Jogja Education Center?</span></div><div class="col-md-4"><a class="btn btn-lg cfa-button" href="<?=base_url().'register';?>">Daftar Sekarang</a></div></div></div>        </div>
  <div id="content" class="site-content container">

    <div class="container main-content-area">
      <div class="row pull-left">
       <div id="primary" class="content-area col-sm-12 col-md-8">
        <main id="main" class="site-main" role="main">

        <?
        if($this->data['count'] == 0) {
          ?>
          <h1>Belum ada berita</h1>
          <p>Saat ini belum tersedia berita yang dapat kami tampilkan untuk anda, silahkan buka kembali halaman ini di lain kesempatan. Terima Kasih.</p>
          <?
        }
        else{
          foreach($this->data['data']->result() as $key => $rowContent){
          ?>
          <article class="post type-post status-publish format-standard has-post-thumbnail sticky hentry category-uncategorized tag-sticky-2 tag-template">
            <header class="entry-header page-header">

              <h1 class="entry-title"><a href="#" rel="bookmark"><?=$rowContent->title?></a></h1>

              <div class="entry-meta">
                <span class="posted-on"><i class="fa fa-calendar"></i> <a href="#" rel="bookmark"><time class="entry-date published"><? echo $CI->general_function->getDateFormat($rowContent->created_time) ?></time><time class="updated"><? echo $CI->general_function->getDateFormat($rowContent->updated_time) ?></time></a></span><span class="byline"> <i class="fa fa-user"></i> <span class="author vcard"><a class="url fn n" href="#"></a></span></span>

               </div><!-- .entry-meta -->
             </header><!-- .entry-header -->

             <div class="entry-content">

              <a href="#" title="#">
              <img width="730" src="<?
                  !empty($rowContent->image_list)&&file_exists(FCPATH.$rowContent->image_list)?printf(base_url().ltrim($rowContent->image_list,'/')):printf(base_url().'assets/default/no_image_medium.png')
              ?>" class="thumbnail col-sm-6"></a>
                <div class="col-sm-6">
                <?=$rowContent->description?>
                </div>
                <p><a class="btn btn-default read-more" href="https://colorlib.com/dazzling/template-sticky/">Lanjutkan membaca<i class="fa fa-chevron-right"></i></a></p>

                <a href="#" title="#"></a>

              </div><!-- .entry-content -->

              <hr class="section-divider">
            </article>
          <?
          }
        }
        ?>
          <? /*
          <article class="post type-post status-publish format-standard has-post-thumbnail sticky hentry category-uncategorized tag-sticky-2 tag-template">
            <header class="entry-header page-header">

              <h1 class="entry-title"><a href="#" rel="bookmark">Template: Sticky</a></h1>

              <div class="entry-meta">
                <span class="posted-on"><i class="fa fa-calendar"></i> <a href="#" rel="bookmark"><time class="entry-date published">January 7, 2015</time><time class="updated">May 1, 2015</time></a></span><span class="byline"> <i class="fa fa-user"></i> <span class="author vcard"><a class="url fn n" href="#"></a></span></span>

               </div><!-- .entry-meta -->
             </header><!-- .entry-header -->

             <div class="entry-content">

              <a href="#" title="#">
              <img width="730" src="https://colorlib.com/dazzling/wp-content/uploads/sites/6/2012/01/54-730x410.jpg" class="thumbnail col-sm-6"></a>
                <div class="col-sm-6">
                #
                </div>
                <p><a class="btn btn-default read-more" href="https://colorlib.com/dazzling/template-sticky/">Continue reading <i class="fa fa-chevron-right"></i></a></p>

                <a href="#" title="#"></a>

              </div><!-- .entry-content -->

              <hr class="section-divider">
            </article>
            */ ?>
            <nav class="navigation paging-navigation" role="navigation">
              <h1 class="screen-reader-text">Posts navigation</h1>
              <div class="nav-links">

                <div class="nav-previous"> <a href="https://colorlib.com/dazzling/page/2/"><i class="fa fa-chevron-left"></i> Older posts</a></div>


              </div><!-- .nav-links -->
            </nav>
            <div><?echo $this->data['pagging'];?></div>
            <?/* <div id="infinite-handle"><span><button>Older posts</button></span></div> */ ?>
          </main><!-- #main -->
        </div>

        <?            
        $this->load->view('templates/dazzling/_parts/secondary_view');
                // echo $this->data['current_user_menu'];
        ?>
      </div><!-- close .row -->
    </div><!-- close .container -->
        </div><!-- close .site-content -->