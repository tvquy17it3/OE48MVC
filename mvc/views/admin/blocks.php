<!-- page content -->
<div class="content">
  <div class="page-title">
    <div class="title_left">
      <h3>Quản lý tài khoản đã khóa<small></small></h3>
    </div>
    <div class="title_right">
      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="row">
            <div class="col-sm-12">
              <div class="card-box table-responsive">
                <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Tên</th>
                      <th scope="col">Email</th>
                      <th scope="col">Số điện thoại</th>
                      <th scope="col">Ngày tạo</th>
                      <th scope="col">XÓA/SỬA</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    foreach ($data['user'] as $value) { ?>
                      <tr>
                        <td><?php echo $value->id;?></td>
                        <td><?php echo $value->name;?></td>
                        <td><?php echo $value->email;?></td>
                        <td><?php echo $value->phone;?></td>
                        <td><?php echo $value->created_at;?></td>
                      </td>
                      <td>
                        <a href="<?php echo BASE_URL."admin/delete_user/".$value->id;?>"><button type="button" class="btn btn-danger" onclick="return confirm_delete()"><i class="fa fa-trash" aria-hidden="true"></i></button></a>


                        <?php if ($value->role != 0 ) { ?>
                          <a href="<?php echo BASE_URL.'admin/role_user/'.$value->id.'/0';?>"><button type="button" class="btn btn-warning" onclick="return confirm_block()"><i class="fa fa-ban" aria-hidden="true" data-toggle="tooltip" title="Khóa"></i></button></a>
                        <?php }else{ ?>
                          <a href="<?php echo BASE_URL.'admin/role_user/'.$value->id.'/3';?>"><button type="button" class="btn btn-warning" onclick="return confirm_block()"><i class="fa fa-reply" aria-hidden="true" data-toggle="tooltip" title="Khôi phục"></i></button></a>
                        <?php    } ?>
                        <button type="button" class="btn btn-primary open-modal" data-toggle="modal" 
                        onclick="event.preventDefault();editRoleForm('<?php echo $value->id.",".$value->role;?>')"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" title="Edit Role"></i></button>
                      </td>
                    </tr>
                  <?php }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Edit Role Modal -->
<div class="modal fade" id="editRoleModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="frmEditRole" method="POST" action="<?php echo BASE_URL; ?>admin/update_role">
        <div class="modal-header">
          <h4 class="modal-title">
            Chỉnh sửa quyền
          </h4>
          <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
            ×
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>
              Chọn các quyền
            </label>
            <input id="user_id" name="user_id" type="hidden" value="0">
            <div id="containerRole">
              <input type="radio" name="role_user" id="role1" value="1"> Admin<br>
              <input type="radio" name="role_user" id="role2" value="2"> Editor<br>
              <input type="radio" name="role_user" id="role3" value="3"> User<br>
              <input type="radio" name="role_user" id="role0" value="0"> Block<br>
            </div>
          </div>
          <div class="modal-footer">
            <input id="task_id" name="task_id" type="hidden" value="0">
            <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancel">
            <button class="btn btn-info" id="btn-edit" type="submit" name="update_role">
              Cập nhập
            </button>
          </input>
        </input>
      </div>
    </form>
  </div>
</div>
</div>
<script type="text/javascript">
  function editRoleForm(user_id,role_user) {
    $('#editRoleModal').modal('show');
    $("#frmEditRole input[name=user_id]").val(user_id);
    document.getElementById("role"+role_user).checked = true;
  }
</script>