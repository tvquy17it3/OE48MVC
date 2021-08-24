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
                        <h5><?php echo $data['user']->name;?></h5>
                        <h6><?php echo $data['user']->address;?></h6>
                        <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo BASE_URL; ?>profile" role="tab"  aria-selected="true">Thông tin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="<?php echo BASE_URL; ?>profile/post" role="tab" aria-selected="false">Bài viết</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-2">
            <a href="<?php echo BASE_URL; ?>profile"><button class="profile-edit-btn" >Quay lại</button></a>
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
                    <?php
                        if (isset($data['noti'])) {
                            echo  "<div class='alert alert-secondary' role='alert'>".$data['noti']."</div>";
                        }
                    ?>
                    <form action="<?php echo BASE_URL; ?>profile/update" method="POST">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Email</label>
                            </div>
                            <div class="col-md-8">
                                <p> <?php echo $data['user']->email;?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Tên</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="name" value="<?php echo $data['user']->name;?>" required>
                            </div>
                        </div><br>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <label>Giới tính</label>
                            </div>
                            <div class="col-md-8">
                                <select name="gender">
                                  <option value="0"  <?php echo $data['user']->gender == 0 ? "selected='selected'" : "" ?>>Nữ</option>
                                  <option value="1"  <?php echo $data['user']->gender == 1 ? "selected='selected'" : ""?>>Nam</option>
                                  <option value="2"  <?php echo $data['user']->gender== 2 ? "selected='selected'" : "" ?>>Khác</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Điện Thoại</label>
                            </div>
                            <div class="col-md-8">
                                 <input type="text" name="phone" value="<?php echo $data['user']->phone;?>">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Địa chỉ</label>
                            </div>
                            <div class="col-md-8">
                                 <input type="text" name="address" value="<?php echo $data['user']->address;?>">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-8">
                                 <button type="submit" name="update"  class="btn btn-primary">Cập nhật</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>          
</div>