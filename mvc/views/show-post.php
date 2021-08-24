<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>public/css/post.css">

<div class="row content-post">
  <div class="leftcolumn">
    <div class="card">
      <h2><?php echo $data['post'][0]->title;?></h2>
      <h5>Ngày: <?php echo $data['post'][0]->created_at;?></h5>
      <img src="<?php echo $data['post'][0]->thumbnail;?>" alt="post" class="center">
      <p><?php echo $data['post'][0]->body;?></p>
    </div>
  </div>

  <div class="rightcolumn">
    <div class="card">
      <h5>Tác giả</h5>
      <h6>Tên: <?php echo $data['author']->name;?></h6>
      <h6>Email: <?php echo $data['author']->email;?></h6>
      <img src="<?php echo $data['author']->profile_photo ?? BASE_URL."public/images/user.png";?>" alt="image" class="center">
      <p>Sở thích: nghe nhạc, đọc truyện</p>
    </div>
    <div class="card">
      <div class="card">
        <h3>Bài viết khác</h3>
          <?php 
            foreach($data['related'] as $releted){ ?>
              <a href="<?php echo BASE_URL.'post/show/'.$releted->slug; ?>" style="text-decoration: none;color: black;">
                <div class="row postrelated" style="padding: 8px;">
                  <div class="col-md-8">
                    <p><?php echo $releted->title;?></p>
                  </div>
                  <div class="col-md-4">
                    <img src="<?php echo $releted->thumbnail;?>" width="100%">
                  </div>
                </div>
              </a><hr>
          <?php } ?>
        <button type="button" class="btn btn-outline-primary">Xem thêm</button>
      </div>
    </div>
  </div>
</div>