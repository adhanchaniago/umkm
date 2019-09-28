<section class="blog_wthree py-5">
    <p id="notification" data-message="<?php echo $notification; ?>"></p>
    <div class="container">
        <!-- blog row -->
        <div class="row card-columns py-lg-5">
        <?php if (!empty($blogs)): ?>
        <?php foreach($blogs as $blog): ?>
            <div class="col-md-4 p-0 ml-3">
                <div class="card">
                    <a href="<?php echo base_url('blog/'.$blog->slug.'/detail'); ?>">
                        <img class="card-img-top" src="<?php echo base_url('uploads/blog/'.$blog->tumbnail) ?>" alt="Card image cap" width="250px" height="250px">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title blg_w3ls">
                            <a href="<?php echo base_url('blog/'.$blog->slug.'/detail'); ?>"><?php echo $blog->title; ?></a>
                        </h5>
                        <p class="card-text"><?php echo substr($blog->content,0,100); ?>...</p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
        <?php else: ?>
            <p class="text-capitalize">belum ada blog yang di post</p>
        <?php endif ?>
        </div>
        <?php 
            echo $this->pagination->create_links();
        ?>
    </div>
</section>
<!-- //blog row -->