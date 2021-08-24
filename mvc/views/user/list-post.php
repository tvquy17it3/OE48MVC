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
                        <a class="nav-link active"  href="<?php echo BASE_URL; ?>profile/post" role="tab" aria-selected="true">Bài viết</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-2">
            <!-- <a href=""><button class="profile-edit-btn" >Chỉnh sửa</button></a> -->
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
                <div class="tab-pane fade show active">
                    <div class="row">
                        <div class=" mx-auto">
                            <!-- Timeline https://freefrontend.com/bootstrap-timelines/-->
                            <ul class="timeline">
                                <?php 
                                    foreach($data['posts'] as $value){ ?>
                                        <a href="<?php echo BASE_URL.'post/show/'.$value->slug; ?>" style="text-decoration: none;">
                                            <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                                <div class="timeline-arrow"></div>
                                                <h2 class="h5 mb-0"><?php echo $value->title; ?></h2>
                                                <span class="small text-gray">
                                                    <i class="fa fa-clock-o mr-1"></i>
                                                    <?php echo $value->created_at; ?>
                                                </span>
                                                <p class="text-small mt-2" style="color:black;">
                                                    <?php  
                                                    if (strlen($value->body) > 300){
                                                        echo substr($value->body, 0, 300) . " ...<span class='card-link' style='color:blue;'>Xem thêm</span>";
                                                    }else {
                                                        echo $value->body;
                                                    }
                                                    ?>
                                                </p>
                                            </li>
                                        </a>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>          
</div>