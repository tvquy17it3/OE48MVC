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
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
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
                    <form action="<?php echo BASE_URL; ?>profile/upload" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Chọn ảnh:</label>
                            </div>
                            <div class="col-md-6">
                                <input accept="image/*" type='file' id="file" name="image"/>
                                <img id="frame" src="#" alt="." height="260"/>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-6">
                                 <button type="submit" name="update"  class="btn btn-primary">Tải lên</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>          
</div>