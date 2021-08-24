<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>public/css/post.css">

<div class="row content-post">
  <div class="leftcolumn">
    <?php
    foreach($data['posts'] as $value){ ?>
      <a href="<?php echo BASE_URL.'post/show/'.$value->slug; ?>" style="text-decoration: none;color: black;">
        <div class="card">
          <h2><?php echo $value->title;?></h2>
          <h6>Ngày: <?php echo $value->created_at;?></h6>
          <h6>Bởi:  <?php echo $value->name;?></h6>
          <img src="<?php echo $value->thumbnail;?>" alt="post" class="center">
          <?php  
          if (strlen($value->body) > 300){
            echo substr($value->body, 0, 300) . " ...<span class='card-link' style='color:blue;'>Xem thêm</span>";
          }else {
            echo $value->body;
          }
          ?>
        </div>
      </a>
    <?php } ?>
    <br><br>
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-end">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>
  </div>

  <div class="rightcolumn">
    <div class="card">
      <h3>Popular Post</h3>
      <?php 
        foreach($data['related'] as $releted){ ?>
          <a href="<?php echo BASE_URL.'post/show/'.$releted->slug; ?>" style="text-decoration: none;color: black;">
            <div class="row postrelated">
              <div class="col-md-6">
                <p><?php echo $releted->title;?></p>
              </div>
              <div class="col-md-6">
                <img src="<?php echo $releted->thumbnail;?>" width="100%">
              </div>
            </div>
          </a><hr>
      <?php } ?>
      <button type="button" class="btn btn-outline-primary">Xem thêm</button>
    </div>
  </div>
</div>
