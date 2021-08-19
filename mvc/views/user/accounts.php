
<div class="row" style="display: inline-block;" >
  <!-- <h1>THÊM SẢN PHẨM</h1> -->
</div>
<!-- /top tiles -->

<div class="row" style="margin: 50px 50px 0px 50px;">
  <div class="col-md-12 col-sm-12 " >
    <div style="text-align: center;font-size: 26px">
      <p><h1><?php echo $data['title']; ?></h1></p>
    </div>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Tên</th>
          <th scope="col">Email</th>
          <th scope="col">Số điện thoại</th>
          <th scope="col">Role</th>
          <th scope="col">Ngày tạo</th>
          <th scope="col">XÓA/SỬA</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($data['user'] as $value) {
            echo "<tr>";
            echo "<th scope='row'>$value->id</th>";
            echo "<td>$value->name</td>";
            echo "<td>$value->email</td>";
            echo "<td>$value->phone</td>";
            echo "<td><h5><span class='badge badge-secondary'>".$this->name_role($value->role)."</span></h5></td>";
            echo "<td>$value->created_at</td>";
            echo "<td>
                   <a href='".BASE_URL."user/delete/".$value->id."'><button type='button' class='btn btn-danger' onclick='return confirm_delete()'>Xóa</button></a>
                    <a href='".BASE_URL."user/role_user/".$value->id."/0'><button type='button' class='btn btn-warning' onclick='return confirm_block()'>Khóa</button></a>
                    <a href='".BASE_URL."user/edit/".$value->id."'><button type='button' class='btn btn-primary'>Sửa</button></a>
                </td>";

            echo "</tr>";
          }
          ?>
      </tbody>
    </table>
  </div>