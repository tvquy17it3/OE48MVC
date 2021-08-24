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
      <h5>Thông tin</h5>
      <h6>Tên: <?php echo $data['author']->name;?></h6>
      <h6>Email: <?php echo $data['author']->email;?></h6>
      <img src="<?php echo $data['author']->profile_photo ?? BASE_URL."public/images/user.png";?>" alt="image" class="center">
      <p>Sở thích: nghe nhạc, đọc truyện</p>
    </div>
    <div class="card">
      <h3>Popular Post</h3>
      <div class="fakeimg">Image</div><br>
      <div class="fakeimg">Image</div><br>
      <div class="fakeimg">Image</div>
    </div>
  </div>
</div>