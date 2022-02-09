<div class="container emp-profile">
    <div class="row">
        <div class="col-md-4">
            <div class="profile-img">
                <img src=" <?php echo $data['user']->profile_photo;?>" alt=""/>
                <form action="<?php echo BASE_URL; ?>profile/upload" method="post" enctype="multipart/form-data">
                    <div class="file btn btn-lg btn-primary">
                        <!-- <input type="file" name="file" id="file" /> -->
                        <a href="<?php echo BASE_URL; ?>profile/avatar" style="text-decoration: none;color: white;">Change Photo</a>
                    </div><br>
            	</form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="profile-head">
                        <h5>
                            <?php echo $data['user']->name;?>
                        </h5>
                        <h6>
                            <?php echo $data['user']->address;?>
                        </h6>
                        <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>profile" role="tab"  aria-selected="false">Thông tin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="<?php echo BASE_URL; ?>profile/post" role="tab" aria-selected="false">Bài viết</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active"  href="<?php echo BASE_URL; ?>post/create" role="tab" aria-selected="true">Tạo bài viết</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="profile-work">
                <p>WORK LINK</p>
                <a href="">Website Link</a><br/>
                <a href="">Bootsnipp Profile</a><br/>
                <a href="">Bootply Profile</a>
            </div>
        </div>
        <div class="col-md-8">
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="x_content">
                        <?php
                            if (isset($data['noti'])) {
                                foreach($data['noti'] as $noti){
                                    echo  "<div class='alert alert-secondary' role='alert'>".$noti."</div>";
                                }
                            }
                        ?>
                        <form class="form-horizontal" role="form" method="POST" action="<?php echo BASE_URL; ?>post/store" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title" class="control-label">Tiêu đề</label>
                                <input id="title" type="text" class="form-control" name="title" value="" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="title">Thumbnail</label>
                                <div class="input-group">
                                  <div class="row">
                                    <div class="col-md-2">
                                        <input accept="image/*" type='file' id="file" name="image" required="" />
                                        <img id="frame" src="#" alt="." height="260"/>
                                    </div>
                                  </div><br>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Contents</label>
                                <textarea class="form-control" id="ckeditorContemt" rows="3" name="body" minlength=5 required></textarea>
                            </div>

                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <button type="submit" class="btn btn-success" name="store">
                                        Tạo bài viết
                                    </button>
                                    <a href="<?php echo BASE_URL; ?>profile/post" class="btn btn-danger">
                                        Hủy bỏ
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>          
</div>