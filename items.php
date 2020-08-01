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
		$record = mysql_query("SELECT finish_items.id as id, name_items.name as itn , count,shop.name_shop as ns  FROM finish_items 
		join shop on shop.id = finish_items.in_shop
		join name_items on name_items.id = finish_items.name
		Where finish_items.in_shop = $in_shop and finish_items.name = $name
		order by itn");
	}
	if (empty($_GET["in_shop"])&&empty($_GET["name"])){
		$in_shop = $_GET["in_shop"];
		$name = $_GET["name"];
		$record = mysql_query("SELECT finish_items.id as id, name_items.name as itn , count,shop.name_shop as ns  FROM finish_items 
		join shop on shop.id = finish_items.in_shop
		join name_items on name_items.id = finish_items.name
		order by itn");
	}
	if (!empty($_GET["in_shop"])&&empty($_GET["name"])){
		$in_shop = $_GET["in_shop"];
		$record = mysql_query("SELECT finish_items.id as id, name_items.name as itn , count,shop.name_shop as ns  FROM finish_items 
		join shop on shop.id = finish_items.in_shop
		join name_items on name_items.id = finish_items.name
		Where finish_items.in_shop = $in_shop
		order by itn");
	}
	if (empty($_GET["in_shop"])&&!empty($_GET["name"])){
		$name = $_GET["name"];
		$record = mysql_query("SELECT finish_items.id as id, name_items.name as itn , count,shop.name_shop as ns  FROM finish_items 
		join shop on shop.id = finish_items.in_shop
		join name_items on name_items.id = finish_items.name
		Where finish_items.name = $name
		order by itn");
	}
		?>



	<table border="2" align=center >
		<thead>
			<tr>

				<th>Наименование</th>
				<th>Количество</th>
				<th>Наличие в магазине</th>
				<th colspan="2">Действия</th>
			</tr>
		</thead>
		<?php while ($data = mysql_fetch_array($record)) { ?>
			<tr>
				<td><?php echo $data['itn']; ?></td>
				<td><?php echo $data['count']; ?></td>
				<td><?php echo $data['ns']; ?></td>
				<td>
					<a href="items.php?edit=<?php echo $data['id']; ?>"><img src="edit.png" /></a>
				</td>
				<td>
					<a href="items.php?del=<?php echo $data['id']; ?>"><img src="delete.png" /></a>
				</td>
			</tr>
		<?php
		} ?>
				<td>
					<a href="items.php?add=<?php ?>"><img src="add.png" /></a>
					<a href="items.php?sel=<?php ?>"><img src="search.png" /></a>
				</td>
	</table>

<form>

<?php 
if (isset($_GET['edit'])) {
	$update = true;
	$id = $_GET['edit'];
	$record = mysqli_query($db,"SELECT * FROM finish_items WHERE id=$id");
	if (count($record) == 1 ) {
		$n = mysqli_fetch_array($record);
		$id = $n['id'];
		$name = $n['name'];
		$count = $n['count'];
		$in_shop = $n['in_shop'];
	}?>
	<br></br>>
	<div style="text-align:center">
		<input type="hidden" name="id" value="<?php echo $id; ?>">

		<td> Наименование </td><?php 
		$id_name = array();
		$result = mysql_query("SELECT `id`,`name` FROM `name_items`") or die(mysql_error());
		while($row = mysql_fetch_assoc($result)){
		$id_name[]= $row;
		}?>
		<select name="name" value="<?php echo $name; ?>">
		    <?php foreach($id_name as $s){?>
		    <option value="<?=$s['id']?>" <?php if($s['id'] == $name) echo "selected";?>><?=$s['name']; ?></option>
		    <?php } ?>
		</select>
		<td> Количество </td> 
		<input type="text" name="count" value="<?php echo $count; ?>">

		<td> Наличие в магазине </td><?php 
		$shop_id = array();
		$result = mysql_query("SELECT `id`,`name_shop` FROM `shop`") or die(mysql_error());
		while($row = mysql_fetch_assoc($result)){
		$shop_id[]= $row;
		}?>
		<select name="in_shop" value="<?php echo $in_shop; ?>">
		    <?php foreach($shop_id as $s){?>
		    <option value="<?=$s['id']?>" <?php if($s['id'] == $in_shop) echo "selected";?>><?=$s['name_shop']; ?></option>
		    
		    <?php } ?>
		</select>
		<button type="submit" name="save" >Сохранить</button>	
	</div>

<?php 			
}?>

<?php 	
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM finish_items WHERE id=$id");
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=items.php\">";
}?>
<?php 
if (isset($_GET['save'])) {
	$id = $_GET['id'];
	$name = $_GET['name'];
	$count = $_GET['count'];
	$in_shop = $_GET['in_shop'];
	mysqli_query($db, "UPDATE finish_items SET name='$name', count='$count',  in_shop='$in_shop'  WHERE id=$id");
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=items.php\">";
}?>
<?php
if (isset($_GET['sel'])) {
	?>
			<br />
		<div style="text-align:center">
			<td> Наименование </td><?php 
			$id_name = array();
			$result = mysql_query("SELECT `id`,`name` FROM `name_items`") or die(mysql_error());
			while($row = mysql_fetch_assoc($result)){
			$id_name[]= $row;
			}?>
			<select name="name" value="<?php echo $id; ?>">
				<option value="">Пусто</option>
			    <?php foreach($id_name as $s){?>
			    <option value="<?php echo $s['id'];?>"><?php echo $s['name'];?></option>
			    <?php } ?>
			</select>
		<td> Наличие в магазине </td><?php 
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
if (isset($_GET['add'])) {
		?>
		<br />
		<div style="text-align:center">
			<input type="hidden" name="id" value="<?php echo $id; ?>">

			<td> Наименование </td><?php 
			$id_name = array();
			$result = mysql_query("SELECT `id`,`name` FROM `name_items`") or die(mysql_error());
			while($row = mysql_fetch_assoc($result)){
			$id_name[]= $row;
			}?>
			<select name="name" value="<?php echo $name; ?>">
			    <?php foreach($id_name as $s){?>
			    <option value="<?php echo $s['id'];?>"><?php echo $s['name'];?></option>
			    
			    <?php } ?>
			</select>
			<td> Количество </td> <input type="text" name="count" value="<?php echo $count; ?>">

			<td> Наличие в магазине </td><?php 
			$shop_id = array();
			$result = mysql_query("SELECT `id`,`name_shop` FROM `shop`") or die(mysql_error());
			while($row = mysql_fetch_assoc($result)){
			$shop_id[]= $row;
			}?>
			<select name="in_shop" value="<?php echo $in_shop; ?>">
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
	$id = $_GET['id'];
	$name = $_GET['name'];
	$count = $_GET['count'];
	$in_shop = $_GET['in_shop'];
	mysqli_query($db, "INSERT INTO finish_items (name, count,in_shop) VALUES ('$name',  '$count', '$in_shop')"); 
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=items.php\">"; 
}?>
</form>
