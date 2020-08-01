<?php
include ("config.php");
$db = mysqli_connect('localhost', 'root', '', 'database_full');
?>

      <form action="edit.php">
         <button type="submit">Назад</button>
      </form>

<?php $record = mysql_query("SELECT finish_items_for_work.id as id, items_for_work.name as itn , date, count, provider.name as pn,shop.name_shop as ns  FROM finish_items_for_work 
	join shop on shop.id = finish_items_for_work.in_shop
	join provider on provider.id = finish_items_for_work.id_provider
	join items_for_work on items_for_work.id = finish_items_for_work.name
	order by itn"); ?>
<?php

	if (!empty($_GET["in_shop"])&&!empty($_GET["name"])&&!empty($_GET["provider"])){
		$in_shop = $_GET["in_shop"];
		$name = $_GET["name"];
		$provider = $_GET["provider"];

		$record = mysql_query("SELECT finish_items_for_work.id as id, items_for_work.name as itn , date, count, provider.name as pn,shop.name_shop as ns  FROM finish_items_for_work 
		join shop on shop.id = finish_items_for_work.in_shop
		join provider on provider.id = finish_items_for_work.id_provider
		join items_for_work on items_for_work.id = finish_items_for_work.name
		where finish_items_for_work.in_shop = $in_shop and finish_items_for_work.id_provider = $provider and finish_items_for_work.name = $name
		order by itn");
	}
	if (empty($_GET["in_shop"])&&empty($_GET["name"])&&empty($_GET["provider"])){
		$record = mysql_query("SELECT finish_items_for_work.id as id, items_for_work.name as itn , date, count, provider.name as pn,shop.name_shop as ns  FROM finish_items_for_work 
		join shop on shop.id = finish_items_for_work.in_shop
		join provider on provider.id = finish_items_for_work.id_provider
		join items_for_work on items_for_work.id = finish_items_for_work.name
		order by itn");
	}

	if (!empty($_GET["in_shop"])&&empty($_GET["name"])&&empty($_GET["provider"])){
		$in_shop = $_GET["in_shop"];
		$record = mysql_query("SELECT finish_items_for_work.id as id, items_for_work.name as itn , date, count, provider.name as pn,shop.name_shop as ns  FROM finish_items_for_work 
		join shop on shop.id = finish_items_for_work.in_shop
		join provider on provider.id = finish_items_for_work.id_provider
		join items_for_work on items_for_work.id = finish_items_for_work.name
		where finish_items_for_work.in_shop = $in_shop
		order by itn");
	}
	if (!empty($_GET["in_shop"])&&!empty($_GET["name"])&&empty($_GET["provider"])){
		$in_shop = $_GET["in_shop"];
		$name = $_GET["name"];
		$provider = $_GET["provider"];

		$record = mysql_query("SELECT finish_items_for_work.id as id, items_for_work.name as itn , date, count, provider.name as pn,shop.name_shop as ns  FROM finish_items_for_work 
		join shop on shop.id = finish_items_for_work.in_shop
		join provider on provider.id = finish_items_for_work.id_provider
		join items_for_work on items_for_work.id = finish_items_for_work.name
		where finish_items_for_work.in_shop = $in_shop and finish_items_for_work.name = $name
		order by itn");
	}
	if (!empty($_GET["in_shop"])&&empty($_GET["name"])&&!empty($_GET["provider"])){
		$in_shop = $_GET["in_shop"];
		$name = $_GET["name"];
		$provider = $_GET["provider"];

		$record = mysql_query("SELECT finish_items_for_work.id as id, items_for_work.name as itn , date, count, provider.name as pn,shop.name_shop as ns  FROM finish_items_for_work 
		join shop on shop.id = finish_items_for_work.in_shop
		join provider on provider.id = finish_items_for_work.id_provider
		join items_for_work on items_for_work.id = finish_items_for_work.name
		where finish_items_for_work.in_shop = $in_shop and finish_items_for_work.id_provider = $provider
		order by itn");
	}






	if (empty($_GET["in_shop"])&&!empty($_GET["name"])&&empty($_GET["provider"])){
		$in_shop = $_GET["in_shop"];
		$name = $_GET["name"];
		$provider = $_GET["provider"];
		$record = mysql_query("SELECT finish_items_for_work.id as id, items_for_work.name as itn , date, count, provider.name as pn,shop.name_shop as ns  FROM finish_items_for_work 
		join shop on shop.id = finish_items_for_work.in_shop
		join provider on provider.id = finish_items_for_work.id_provider
		join items_for_work on items_for_work.id = finish_items_for_work.name
		where finish_items_for_work.name = $name
		order by itn");
	}
	if (empty($_GET["in_shop"])&&!empty($_GET["name"])&&!empty($_GET["provider"])){
		$in_shop = $_GET["in_shop"];
		$name = $_GET["name"];
		$provider = $_GET["provider"];

		$record = mysql_query("SELECT finish_items_for_work.id as id, items_for_work.name as itn , date, count, provider.name as pn,shop.name_shop as ns  FROM finish_items_for_work 
		join shop on shop.id = finish_items_for_work.in_shop
		join provider on provider.id = finish_items_for_work.id_provider
		join items_for_work on items_for_work.id = finish_items_for_work.name
		where finish_items_for_work.id_provider = $provider and finish_items_for_work.name = $name
		order by itn");
	}
	if (!empty($_GET["in_shop"])&&!empty($_GET["name"])&&empty($_GET["provider"])){
		$in_shop = $_GET["in_shop"];
		$name = $_GET["name"];
		$provider = $_GET["provider"];

		$record = mysql_query("SELECT finish_items_for_work.id as id, items_for_work.name as itn , date, count, provider.name as pn,shop.name_shop as ns  FROM finish_items_for_work 
		join shop on shop.id = finish_items_for_work.in_shop
		join provider on provider.id = finish_items_for_work.id_provider
		join items_for_work on items_for_work.id = finish_items_for_work.name
		where finish_items_for_work.in_shop = $in_shop and finish_items_for_work.name = $name
		order by itn");
	}




	if (empty($_GET["in_shop"])&&empty($_GET["name"])&&!empty($_GET["provider"])){
		$in_shop = $_GET["in_shop"];
		$name = $_GET["name"];
		$provider = $_GET["provider"];
		$record = mysql_query("SELECT finish_items_for_work.id as id, items_for_work.name as itn , date, count, provider.name as pn,shop.name_shop as ns  FROM finish_items_for_work 
		join shop on shop.id = finish_items_for_work.in_shop
		join provider on provider.id = finish_items_for_work.id_provider
		join items_for_work on items_for_work.id = finish_items_for_work.name
		where finish_items_for_work.id_provider = $provider
		order by itn");
	}
		?>
<table border="2" align=center >
	<thead>
		<tr>
			<th>Наименование</th>
			<th>Количество</th>
			<th>Дата</th>
			<th>Поставщик</th>
			<th>Наличие в магазине</th>
			<th colspan="2">Действия</th>
		</tr>
	</thead>
	<?php while ($data = mysql_fetch_array($record)) { ?>
		<tr>
			<td><?php echo $data['itn']; ?></td>
			<td><?php echo $data['count']; ?></td>
			<td><?php echo $data['date']; ?></td>
			<td><?php echo $data['pn']; ?></td>
			<td><?php echo $data['ns']; ?></td>
			<td>
				<a href="finish_items.php?edit=<?php echo $data['id']; ?>"><img src="edit.png" /></a>
			</td>
			<td>
				<a href="finish_items.php?del=<?php echo $data['id']; ?>"><img src="delete.png" /></a>
			</td>
		</tr>
	<?php } ?>
			<td>
				<a href="finish_items.php?add=<?php ?>"><img src="add.png" /></a>
				<a href="finish_items.php?sel=<?php ?>"><img src="search.png" /></a>
			</td>
</table>
<form>
<?php
if (isset($_GET['sel'])) {
	?>
			<br />
		<div style="text-align:center">
			<td> Наименование </td><?php 
			$id_name = array();
			$result = mysql_query("SELECT `id`,`name` FROM `items_for_work`") or die(mysql_error());
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
		<td> Поставщик </td><?php 
		$shop_id = array();
		$result = mysql_query("SELECT `id`,`name` FROM `provider`") or die(mysql_error());
		while($row = mysql_fetch_assoc($result)){
		$shop_id[]= $row;
		}?>
		<select name="provider" value="<?php echo $provider; ?>">
			<option value="">Пусто</option>
		    <?php foreach($shop_id as $s){?>
		    <option value="<?php echo $s['id'];?>"><?php echo $s['name'];?></option>
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
	$record = mysqli_query($db,"SELECT * FROM finish_items_for_work WHERE id=$id");
	if (count($record) == 1 ) {
		$n = mysqli_fetch_array($record);
		$id = $n['id'];
		$name = $n['name'];
		$count = $n['count'];
		$date = $n['date'];
		$id_provider = $n['id_provider'];
		$in_shop = $n['in_shop'];
	}?>
	<br></br>>
	<div style="text-align:center">
		<input type="hidden" name="id" value="<?php echo $id; ?>">

		<td> Наименование </td><?php 
		$id_name = array();
		$result = mysql_query("SELECT `id`,`name` FROM `items_for_work`") or die(mysql_error());
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
		<td> Дата </td>
		<input type="date" name="date" value="<?php echo $date; ?>">
		
		<td> Поставщик </td><?php 
		$id_provider_a = array();
		$result = mysql_query("SELECT `id`,`name` FROM `provider`") or die(mysql_error());
		while($row = mysql_fetch_assoc($result)){
		$id_provider_a[]= $row;
		}?>
		<select name="id_provider" value="<?php echo $id_provider; ?>">
		    <?php foreach($id_provider_a as $s){?>
		    <option value="<?=$s['id']?>" <?php if($s['id'] == $id_provider) echo "selected";?>><?=$s['name']; ?></option>

		    <?php } ?>
		</select>


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
	mysqli_query($db, "DELETE FROM finish_items_for_work WHERE id=$id");
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=finish_items.php\">";
}?>
<?php 
if (isset($_GET['save'])) {
	$id = $_GET['id'];
	$name = $_GET['name'];
	$date = date_format(date_create_from_format('Y-m-d', $_GET['date']),'Y-m-d');
	$count = $_GET['count'];
	$id_provider = $_GET['id_provider'];
	$in_shop = $_GET['in_shop'];  
	mysqli_query($db, "UPDATE finish_items_for_work SET name='$name', count='$count', date='$date', id_provider='$id_provider', in_shop='$in_shop'  WHERE id=$id");
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=finish_items.php\">";
}?>

<?php 
if (isset($_GET['add'])) {
		?>
		<br />
		<div style="text-align:center">
			<input type="hidden" name="id" value="<?php echo $id; ?>">

			<td> Наименование </td><?php 
			$id_name = array();
			$result = mysql_query("SELECT `id`,`name` FROM `items_for_work`") or die(mysql_error());
			while($row = mysql_fetch_assoc($result)){
			$id_name[]= $row;
			}?>
			<select name="name" value="<?php echo $name; ?>">
			    <?php foreach($id_name as $s){?>
			    <option value="<?php echo $s['id'];?>"><?php echo $s['name'];?></option>
			    <?php } ?>
			</select>
			<td> Количество </td> <input type="text" name="count" value="<?php echo $count; ?>">
			<td> Дата </td>
			<input type="date" name="date" value="<?php echo $date; ?>">
			
			<td> Поставщик </td><?php 
			$id_provider_a = array();
			$result = mysql_query("SELECT `id`,`name` FROM `provider`") or die(mysql_error());
			while($row = mysql_fetch_assoc($result)){
			$id_provider_a[]= $row;
			}?>
			<select name="id_provider" value="<?php echo $id_provider; ?>">
			    <?php foreach($id_provider_a as $s){?>
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
	$date = date_format(date_create_from_format('Y-m-d', $_GET['date']),'Y-m-d');
	$count = $_GET['count'];
	$id_provider = $_GET['id_provider'];
	$in_shop = $_GET['in_shop'];
	mysqli_query($db, "INSERT INTO finish_items_for_work (name, date, count, id_provider,in_shop) VALUES ('$name', '$date', '$count', '$id_provider', '$in_shop')"); 
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=finish_items.php\">"; 
}?>