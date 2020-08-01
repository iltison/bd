<?php
include ("config.php");
$db = mysqli_connect('localhost', 'root', '', 'database_full');
?>
      <form action="edit.php">
         <button type="submit">Назад</button>
      </form>
<?php

	if (!empty($_GET["in_shop"])&&!empty($_GET["name"])){
		$in_shop = $_GET["in_shop"];
		$name = $_GET["name"];
		$record = mysql_query("SELECT emp.id,name, sname,position_emp.name_position as pe, shop.name_shop as si FROM emp 
		join position_emp on position_emp.id = emp.IDD
		join shop on shop.id = emp.work_speace
		where emp.IDD = $name and emp.work_speac = $in_shop
		ORDER BY si");
	}
	if (empty($_GET["in_shop"])&&empty($_GET["name"])){
		$in_shop = $_GET["in_shop"];
		$name = $_GET["name"];
		$record = mysql_query("SELECT emp.id,name, sname,position_emp.name_position as pe, shop.name_shop as si FROM emp 
		join position_emp on position_emp.id = emp.IDD
		join shop on shop.id = emp.work_speace
		ORDER BY si");
	}
	if (!empty($_GET["in_shop"])&&empty($_GET["name"])){
		$in_shop = $_GET["in_shop"];
		$name = $_GET["name"];
		$record = mysql_query("SELECT emp.id,name, sname,position_emp.name_position as pe, shop.name_shop as si FROM emp 
		join position_emp on position_emp.id = emp.IDD
		join shop on shop.id = emp.work_speace
		emp.work_speac = $in_shop
		ORDER BY si");
	}
	if (empty($_GET["in_shop"])&&!empty($_GET["name"])){
		$in_shop = $_GET["in_shop"];
		$name = $_GET["name"];
		$record = mysql_query("SELECT emp.id,name, sname,position_emp.name_position as pe, shop.name_shop as si FROM emp 
		join position_emp on position_emp.id = emp.IDD
		join shop on shop.id = emp.work_speace
		where emp.IDD = $name
		ORDER BY si");
	}
		?>

<table border="2" align=center >
	<thead>
		<tr>

			<th>Имя</th>
			<th>Фамилия</th>
			<th>Должность</th>
			<th>Рабочее место</th>
			
			<th colspan="2">Действия</th>
		</tr>
	</thead>

	<?php while ($data = mysql_fetch_array($record)) { ?>
		<tr>
			
			<td><?php echo $data['name']; ?></td>
			<td><?php echo $data['sname']; ?></td>
			<td><?php echo $data['pe']; ?></td>
			<td><?php echo $data['si']; ?></td>
			
			<td>
				<a href="emp1.php?edit=<?php echo $data['id']; ?>"><img src="edit.png" /></a>
			</td>
			<td>
				<a href="emp1.php?del=<?php echo $data['id']; ?>"><img src="delete.png" /></a>
			</td>
		</tr>
	<?php } ?>
			<td>
				<a href="emp1.php?add=<?php ?>"><img src="add.png" /></a>
				<a href="emp1.php?sel=<?php ?>"><img src="search.png" /></a>
			</td>
</table>

<form>
<?php
if (isset($_GET['sel'])) {
	?>
			<br />
		<div style="text-align:center">
			<td> Должность </td><?php 
			$id_name = array();
			$result = mysql_query("SELECT `id`,`name_position` FROM `position_emp`") or die(mysql_error());
			while($row = mysql_fetch_assoc($result)){
			$id_name[]= $row;
			}?>
			<select name="name" value="<?php echo $id; ?>">
				<option value="">Пусто</option>
			    <?php foreach($id_name as $s){?>
			    <option value="<?php echo $s['id'];?>"><?php echo $s['name_position'];?></option>
			    <?php } ?>
			</select>
		<td> МЕсто работы </td><?php 
		$shop_id = array();
		$result = mysql_query("SELECT `id`,`name_shop` FROM `shop`") or die(mysql_error());
		while($row = mysql_fetch_assoc($result)){
		$shop_id[]= $row;
		}?>
		<select name="in_shop" value="<?php echo $in_shop; ?>">
			<option value="">Пусто</option>
		    <?php foreach($shop_id as $s){?>
		    <option value="<?php echo $s['id'];?>"><?php echo $s['name_shop'];?></option>
		    <?php } ?>
		</select>
			<button type="submit" >Поиск</button>
		</div>
	<?php
}?>



<?php 
	if (isset($_GET['edit'])) {
		$update = true;
		$id = $_GET['edit'];
		$record = mysqli_query($db,"SELECT * FROM emp WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$id = $n['id'];
			$name = $n['name'];
			$IDD = $n['IDD'];
			$work_speace = $n['work_speace'];
			$sname = $n['sname'];


		}?>
		<br />
		<div style="text-align:center">

		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<td> Имя </td> <input type="text" name="name" value="<?php echo $name; ?>">

		<td> Фамилия </td> <input type="text" name="sname" value="<?php echo $sname; ?>">

		<?php 
		$emp_p = array();
		$result = mysql_query("SELECT `id`,`name_position` FROM `position_emp`") or die(mysql_error());
		while($row = mysql_fetch_assoc($result)){
		$emp_p[]= $row;
		}?>
		<td> Должность </td> <select name="IDD" value="<?php echo $IDD; ?>">
		    <?php foreach($emp_p as $s){?>
		    <option value="<?=$s['id']?>" <?php if($s['id'] == $IDD) echo "selected";?>><?=$s['name_position']; ?></option>
		    <?php } ?>
			</select>

		<?php 
		$shop_id = array();
		$result = mysql_query("SELECT `id`,`name_shop` FROM `shop`") or die(mysql_error());
		while($row = mysql_fetch_assoc($result)){
		$shop_id[]= $row;
		}?>
		<td> Рабочее место </td> <select name="work_speace" value="<?php echo $work_speace; ?>">
		    <?php foreach($shop_id as $s){?>
		    <option value="<?=$s['id']?>" <?php if($s['id'] == $work_speace) echo "selected";?>><?=$s['name_shop']; ?></option>
		    <?php } ?>
			</select>

		<button type="submit" name="save" >Сохранить</button>	
</div>

<?php 			
}?>

<?php 	
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM emp WHERE id=$id");
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=emp1.php\">";
}?>

<?php 
if (isset($_GET['save'])) {
	$id = $_GET['id'];
	$name = $_GET['name'];
	$IDD = $_GET['IDD'];
	$work_speace = $_GET['work_speace'];
	$sname = $_GET['sname'];
	mysqli_query($db, "UPDATE emp SET name='$name', IDD='$IDD', work_speace='$work_speace', sname='$sname' WHERE id=$id");
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=emp1.php\">";
}?>
<?php 
if (isset($_GET['add'])) {
		?>
		<br />
		<div style="text-align:center">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<td> Имя </td> <input type="text" name="name" value="<?php echo $name; ?>">

		<td> Фамилия </td> <input type="text" name="sname" value="<?php echo $sname; ?>">
		

		<?php 
		$emp_p = array();
		$result = mysql_query("SELECT `id`,`name_position` FROM `position_emp`") or die(mysql_error());
		while($row = mysql_fetch_assoc($result)){
		$emp_p[]= $row;
		}?>
		<td> Должность </td> <select name="IDD" value="<?php echo $IDD; ?>">
		    <?php foreach($emp_p as $s){?>
		    <option value="<?php echo $s['id'];?>"><?php echo $s['name_position'];?></option>
		    <?php } ?>
			</select>

		<?php 
		$shop_id = array();
		$result = mysql_query("SELECT `id`,`name_shop` FROM `shop`") or die(mysql_error());
		while($row = mysql_fetch_assoc($result)){
		$shop_id[]= $row;
		}?>
		<td> Рабочее место </td> <select name="work_speace" value="<?php echo $work_speace; ?>">
		    <?php foreach($shop_id as $s){?>
		    <option value="<?php echo $s['id'];?>"><?php echo $s['name_shop'];?></option>
		    <?php } ?>
			</select>


		<button type="submit" name="add_save" >Добавить</button>
			</div>

		
<?php		
	}?>
<?php 
if (isset($_GET['add_save'])) {
	$name = $_GET['name'];
	$IDD = $_GET['IDD'];
	$work_speace = $_GET['work_speace'];
	$sname = $_GET['sname'];
	mysqli_query($db, "INSERT INTO emp (name, IDD, work_speace, sname) VALUES ('$name', '$IDD', '$work_speace', '$sname')"); 
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=emp1.php\">"; 
}?>