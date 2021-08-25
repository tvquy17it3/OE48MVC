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
                    <li class="nav-item">
                        <a class="nav-link"  href="<?php echo BASE_URL; ?>post/create" role="tab" aria-selected="false">Tạo bài viết</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-2">
            <!-- <a href=""><button class="profile-edit-btn" >Chỉnh sửa</button></a> -->
            <!-- Timeline https://freefrontend.com/bootstrap-timelines/-->
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
                            <ul class="timeline">
                                <?php 
                                    foreach($data['posts'] as $value){ ?>
                                        <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                            <div class="timeline-arrow"></div>
                                            <a href="<?php echo BASE_URL."post/delete/".$value->id;?>" style="float: right;color: red;" onclick="return confirm_delete()">&nbsp;&nbsp;<i class="fa fa-trash" aria-hidden="true" title="Xóa"></i></a>
<<<<<<< HEAD
                                            <a href="<?php echo BASE_URL."post/edit/".$value->id;?>" style="float: right;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
=======
                                            <a href="" style="float: right;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
>>>>>>> ab9d09cea1b576fb4e80d4f17f407d5d6804d5e9
                                            <a href="<?php echo BASE_URL.'post/show/'.$value->slug; ?>" style="text-decoration: none;">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <img src="<?php echo $value->thumbnail; ?>" width="250">
                                                    </div>
                                                    <div class="col-md-7">
                                                        <h2 class="h5 mb-0"><?php echo $value->title; ?></h2>
                                                        <span class="small text-gray">
                                                            <i class="fa fa-clock-o mr-1"></i>
                                                            <?php echo $value->created_at; ?>
                                                            <?php echo $value->published ? ' | Đã duyệt' : ' | chưa duyệt'; ?>
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
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                <?php } ?>
                                <button type="button" class="btn btn-secondary" style="float:right;">Xem thêm</button>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>          
</div>