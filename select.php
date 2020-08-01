      <form action="edit.php">
         <button type="submit">На главный экран</button>
      </form>
<?php 
include ("config.php");
$db = mysqli_connect('localhost', 'root', '', 'database_full');?>	

<?php 
if (isset($_GET['1'])){
	?><form><?php 
		$provider = $_GET["id"];
		$tt = mysql_query("SELECT id,name from items_for_work
			where id = $provider
			");
		$name = mysql_fetch_array($tt);
		echo "Вывести поставщиков, которые доставляют '$name[name]'";
		$record = mysql_query("SELECT items_for_work.name as name,provider.name as provider from finish_items_for_work
			join items_for_work on items_for_work.id = finish_items_for_work.name
			join provider on provider.id = finish_items_for_work.id_provider
			where finish_items_for_work.name = $provider
			order by name");
				?> 
				<table border="2" align=center >
					<thead>
						<tr>
							<th>Название</th>
							<th>Поставщик</th>
						</tr>
					</thead>
					<?php while ($data = mysql_fetch_array($record)) { ?>
						<tr>
							<td><?php echo $data['name']; ?></td>
							<td><?php echo $data['provider']; ?></td>
						</tr>
					<?php
					} ?>
				</table>
			</form>
<?php }?>

<?php 
if (isset($_GET['2'])){
		?><form><?php 
		$id = $_GET["id"];
		$tt = mysql_query("SELECT id,name_position from position_emp
			where id = $id
			");
		$name = mysql_fetch_array($tt);
		echo "Вывести сотрудников занимающих должность '$name[name_position]'";
		$record = mysql_query("SELECT shop.name_shop as shop_name, name,sname,position_emp.name_position as name_position, position_emp.salary as salary from emp
			join position_emp on position_emp.id = emp.IDD
			join shop on shop.id = emp.work_speace
			where emp.IDD = '$id'
			");
				?> 
				<table border="2" align=center >
					<thead>
						<tr>
							<th>Название магазина</th>
							<th>Имя</th>
							<th>Фамилия</th>
							<th>Должность</th>
							<th>Зарплата</th>
						</tr>
					</thead>
					<?php while ($data = mysql_fetch_array($record)) { ?>
						<tr>
							<td><?php echo $data['shop_name']; ?></td>
							<td><?php echo $data['name']; ?></td>
							<td><?php echo $data['sname']; ?></td>
							<td><?php echo $data['name_position']; ?></td>
							<td><?php echo $data['salary']; ?></td>
						</tr>
					<?php
					} ?>
				</table>
			</form>
<?php }?>
<?php 
if (isset($_GET['3'])){
	$count = $_GET['count'];
	echo "Вывести товар, который стоит больше чем $count";
	$record = mysql_query("SELECT name,price from name_items
where price > $count");
	?> 
	<table border="2" align=center >
		<thead>
			<tr>
				<th>Название</th>
				<th>Цена</th>


			</tr>
		</thead>
		<?php while ($data = mysql_fetch_array($record)) { ?>
			<tr>
				<td><?php echo $data['name']; ?></td>
				<td><?php echo $data['price']; ?></td>

			</tr>
		<?php
		} ?>

	</table>
<?php }?>

<?php 
if (isset($_GET['4'])){
	$id = $_GET['id'];
		$tt = mysql_query("SELECT id,name_shop from shop
				where id = $id
				");
			$name = mysql_fetch_array($tt);
			echo "Вывести сотрудников работающих в магазине '$name[name_shop]'";
		$record = mysql_query("SELECT shop.name_shop as name_shop, name,sname from emp
	join shop on shop.id = emp.work_speace
	where shop.id = $id");
	?> 
	<table border="2" align=center >
		<thead>
			<tr>
				<th>Название магазина</th>
				<th>Имя</th>
				<th>Фамилия</th>

			</tr>
		</thead>
		<?php while ($data = mysql_fetch_array($record)) { ?>
			<tr>
				<td><?php echo $data['name_shop']; ?></td>
				<td><?php echo $data['name']; ?></td>
				<td><?php echo $data['sname']; ?></td>
			</tr>
		<?php
		} ?>

	</table>
<?php }?>

<?php 
if (isset($_GET['5'])){
	$id = $_GET['id'];
		$tt = mysql_query("SELECT id,name_shop from shop
				where id = $id
				");
			$name = mysql_fetch_array($tt);
	echo "Вывести наличие готовой продукции находящегося в магазине '$name[name_shop]'";
	$record = mysql_query("SELECT name_items.name as name, shop.name_shop as name_shop from finish_items
		join shop on shop.id = finish_items.in_shop
		join name_items on name_items.id = finish_items.name
		where finish_items.in_shop = $id");
	?> 
	<table border="2" align=center >
		<thead>
			<tr>
				<th>Название изделия</th>
				<th>Название магазина</th>

			</tr>
		</thead>
		<?php while ($data = mysql_fetch_array($record)) { ?>
			<tr>
				<td><?php echo $data['name']; ?></td>
				<td><?php echo $data['name_shop']; ?></td>
			</tr>
		<?php
		} ?>

	</table>
<?php }?>
<?php 
if (isset($_GET['6'])){
	$id = $_GET['id'];
		$tt = mysql_query("SELECT id,name_shop from shop
				where id = $id
				");
			$name = mysql_fetch_array($tt);
	echo "Вывести наличие сырья находящегося в магазине '$name[name_shop]'";
	$record = mysql_query("SELECT items_for_work.name as name, shop.name_shop as name_shop from finish_items_for_work
		join shop on shop.id = finish_items_for_work.in_shop
		join items_for_work on items_for_work.id = finish_items_for_work.name
		where finish_items_for_work.in_shop = $id
		");
	?> 
	<table border="2" align=center >
		<thead>
			<tr>
				<th>Название сырья</th>
				<th>Название магазина</th>

			</tr>
		</thead>
		<?php while ($data = mysql_fetch_array($record)) { ?>
			<tr>
				<td><?php echo $data['name']; ?></td>
				<td><?php echo $data['name_shop']; ?></td>
			</tr>
		<?php
		} ?>

	</table>
<?php }?>


<?php 
if (isset($_GET['7'])){
	$date = date_format(date_create_from_format('Y-m-d', $_GET['date']),'Y-m-d');
	echo "Вывести сырье по дате $date ";
	$record = mysql_query("SELECT items_for_work.name as name, shop.name_shop as name_shop,date from finish_items_for_work
	join shop on shop.id = finish_items_for_work.in_shop
	join items_for_work on items_for_work.id = finish_items_for_work.name
	where finish_items_for_work.date = '$date'
			");
	?> 
	<table border="2" align=center >
		<thead>
			<tr>
				<th>Название товара</th>
				<th>Название магазина</th>
				<th>Дата</th>

			</tr>
		</thead>
		<?php while ($data = mysql_fetch_array($record)) { ?>
			<tr>
				<td><?php echo $data['name']; ?></td>
				<td><?php echo $data['name_shop']; ?></td>
				<td><?php echo $data['date']; ?></td>
	
			</tr>
		<?php
		} ?>

	</table>
<?php }?>

<?php 
if (isset($_GET['8'])){
	$count = $_GET['count'];
	echo "Вывести закупленное больше чем $count";
	$record = mysql_query("SELECT name, price_by_buy from items_for_work
		where price_by_buy > $count
		");
	?> 
	<table border="2" align=center >
		<thead>
			<tr>
				<th>Название</th>
				<th>Цена</th>

			</tr>
		</thead>
		<?php while ($data = mysql_fetch_array($record)) { ?>
			<tr>
				<td><?php echo $data['name']; ?></td>
				<td><?php echo $data['price_by_buy']; ?></td>
			</tr>
		<?php
		} ?>

	</table>
<?php }?>

<?php 
if (isset($_GET['9'])){
	echo "Вывести общую сумму у каждого магазина";
	$record = mysql_query("SELECT shop.name_shop as name_shop,sum(name_items.price) as price from finish_items
		join shop on shop.id = finish_items.in_shop
		join name_items on name_items.id = finish_items.name
		group by name_shop
		order by price DESC");
	?> 
	<table border="2" align=center >
		<thead>
			<tr>
				<th>Название магазина</th>
				<th>Сумма</th>

			</tr>
		</thead>
		<?php while ($data = mysql_fetch_array($record)) { ?>
			<tr>
				<td><?php echo $data['name_shop']; ?></td>
				<td><?php echo $data['price']; ?></td>
			</tr>
		<?php
		} ?>

	</table>
<?php }?>

<?php 
if (isset($_GET['10'])){
	echo "Вывести общее количество товара в каждом магазине";
	$record = mysql_query("SELECT name_items.name as name, shop.name_shop as name_shop,count(name_items.price) as price from finish_items
		join shop on shop.id = finish_items.in_shop
		join name_items on name_items.id = finish_items.name
		group by name_shop
		order by price DESC");
	?> 
	<table border="2" align=center >
		<thead>
			<tr>
				<th>Название магазина</th>
				<th>Сумма</th>

			</tr>
		</thead>
		<?php while ($data = mysql_fetch_array($record)) { ?>
			<tr>
				<td><?php echo $data['name_shop']; ?></td>
				<td><?php echo $data['price']; ?></td>
			</tr>
		<?php
		} ?>

	</table>
<?php }?>

<html>
   <head>
   	<body>
   		<form>
   			<div>
   				<br></br>
   				<br></br>
   				<br></br>

			<form>
				<button type="submit" name="1" >Первый запрос</button>
				<td>Вывести поставщиков, которые доставляют. </td><?php
				$array1 = array();
				$result = mysql_query("SELECT id,name from items_for_work") or die(mysql_error());
				while($row = mysql_fetch_assoc($result)){
				$array1[]= $row;
				}?>
			<select name="id" value="<?php echo $id; ?>">
			    <?php foreach($array1 as $s){?>
			    <option value="<?php echo $s['id'];?>"><?php echo $s['name'];?></option>
			    <?php } ?>
				</select>
				<br></br>
			</form>

			<form>
				<button type="submit" name="2" >Второй запрос</button>
				<td>Вывести сотрудников занимающих должность. </td><?php
				$array1 = array();
				$result = mysql_query("SELECT id,name_position from position_emp") or die(mysql_error());
				while($row = mysql_fetch_assoc($result)){
				$array1[]= $row;
				}?>
			<select name="id" value="<?php echo $id; ?>">
			    <?php foreach($array1 as $s){?>
			    <option value="<?php echo $s['id'];?>"><?php echo $s['name_position'];?></option>
			    <?php } ?>
				</select>
			</form>
			<form>
				<button type="submit" name="3" >Третий запрос</button>
				<td>Вывести товар, который стоит больше чем. </td><input type="text" name="count" value="<?php echo $count; ?>">
			</form>

			<form>
				<button type="submit" name="4" >Четвертый запрос</button>
				<td>Вывести сотрудников работающих в магазине. </td><?php
				$array1 = array();
				$result = mysql_query("SELECT id,name_shop from shop") or die(mysql_error());
				while($row = mysql_fetch_assoc($result)){
				$array1[]= $row;
				}?>
			<select name="id" value="<?php echo $id; ?>">
			    <?php foreach($array1 as $s){?>
			    <option value="<?php echo $s['id'];?>"><?php echo $s['name_shop'];?></option>
			    <?php } ?>
				</select>
			</form>

			<form>
				<button type="submit" name="5" >Пятый запрос</button>
				<td>Вывести наличие готовой продукции находящегося в магазине. </td><?php
				$array1 = array();
				$result = mysql_query("SELECT id,name_shop from shop") or die(mysql_error());
				while($row = mysql_fetch_assoc($result)){
				$array1[]= $row;
				}?>
			<select name="id" value="<?php echo $id; ?>">
			    <?php foreach($array1 as $s){?>
			    <option value="<?php echo $s['id'];?>"><?php echo $s['name_shop'];?></option>
			    <?php } ?>
				</select>
			</form>
			<form>
				<button type="submit" name="6" >Шестой запрос</button>
				<td>Вывести наличие сырья находящегося в магазине. </td><?php
				$array1 = array();
				$result = mysql_query("SELECT id,name_shop from shop") or die(mysql_error());
				while($row = mysql_fetch_assoc($result)){
				$array1[]= $row;
				}?>
			<select name="id" value="<?php echo $id; ?>">
			    <?php foreach($array1 as $s){?>
			    <option value="<?php echo $s['id'];?>"><?php echo $s['name_shop'];?></option>
			    <?php } ?>
				</select>

			</form>
			<form>
				<button type="submit" name="7" >Седьмой запрос</button>
				<td>Вывести сырье по дате.</td>
				<input type="date" name="date" value="<?php echo $date; ?>">
			</form>
			<form>
				<button type="submit" name="8" >Восьмой запрос</button>
				<td>Вывести закупленное больше чем.  </td>
				<input type="text" name="count" value="<?php echo $count; ?>">
			</form>
			<form>
				<button type="submit" name="9" >Девятый запрос</button>
				<td>Вывести общую сумму у каждого магазина. </td>
			</form>
			<form>
				<button type="submit" name="10" >Дeсятый запрос</button>
				<td>Вывести общее количество товара в каждом магазине.</td>
			</form>

		</div>
        </form>
   </body>
</html>