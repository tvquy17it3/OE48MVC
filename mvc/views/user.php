<div>
	<h1>
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Name</th>
		      <th scope="col">Email</th>
		      <th scope="col">Phone</th>
		      <th scope="col">Created at</th>
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
					echo "<td>$value->created_at</td>";
					echo "</tr>";
				}
			?>
		  </tbody>
		</table>
	</h1>
</div>