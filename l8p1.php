<!DOCTYPE html>
<!--
	Created by Shade Alabsa
-->
<html>
	<head>
		<title>Lab 7 Part 1</title>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="http://webdev.spsu.edu/favicon.ico" type="image/x-icon"  />
		<link rel="stylesheet" type="text/css" href="l2p4.css" />
	</head>
	<body>
		<h1>Fruit for Sale!</h1>
		<h2>Price is based on unit weight</h2>
		<form action="http://webdev.spsu.edu/formtest.php" method="post" id="form" onsubmit="return valid();">
			<table>
				<tr>
					<th>Fruit</th>
					<th>Price per Pound ($/lb)</th>
					<th>Weight</th>
					<th>Quantity</th>
				</tr>
				<?php
					$db=pg_connect("dbname=webdev");
					$query = "select fruit_item_no, fruit_name, fruit_price, fruit_weight";
					$query .= " from fruit_t order";
					$query .= " by fruit_name;"				
					$dbResult = pg_query($query);

					if(!$dbResult){
						die("Database error....");
					}
						
					$num = pg_num_rows($dbResult);

					if($num == 0) {
						echo '<tr><td colspan="2">';
						echo 'Database query retrieved nothing!</td></tr>';
					}

					$i = 0;
					while($i < $num) {
						$fruit_item_no = pg_Result($dbResult, $i, 'fruit_item_no');
						$name = pg_Result($dbResult, $i, 'fruit_name');
						$price = pg_Result($dbResult, $i, 'fruit_price');
						$weight = pg_Result($dbResult, $i, 'fruit_weight');

						echo '<tr><td>$name</td><td>$price</td><td>$weight</td><td>';
						echo '<input type="text" name="$fruit_item_no" id="$fruit_item_no" size="10" /></td></tr>';
						$i++;
					}
				?>
			</table>

			<divi class="custInfo">
				<label style="display: inline-block;margin-right: 20px;">First Name
					<input type="text" id="fname" name="firstName" size="30" />
				</label>
				<label>Last Name
					<input type="text" id="lname" name="lastName" size="30" />
				</label>
	
				<br />			
	
				<label>Street Address
					<input type="text" id="streetAdr" name="streetAddress" size="45" />
				</label>

				<br  />

				<label style="display: inline-block;margin-right: 20px;">City
					<input type="text" id="city" name="City" size="30" />
				</label>

				
				<label style="display: inline-block;margin-right: 20px;">State</label>
				
				<select id="state" name="State">
					<?php
						$db=pg_connect("dbname=webdev");
						$query = "select state_abbr, state_name from state_t order by state_name"				
						$dbResult = pg_query($query);

						if(!$dbResult){
							die("Database error....");
						}
						
						$num = pg_num_rows($dbResult);

						if($num == 0) {
							echo '<p>';
							echo 'Database query retrieved nothing!</p>';
						}

						$i = 0;
						while($i < $num) {
							$state = pg_Result($dbResult, $i, 'state_name');
							$abbr = pg_Result($dbResult, $i, 'state_abbr');

							if($state == "Georgia") {
								echo '<option value="'.$abbr.'" selected="selected">'.$state.'</option>';
								echo "\n";
							} else {
								echo '<option value="'.$abbr.'">'.$state.'</option>';
								echo "\n";
							}
							$i++;
						}
					?>
				</select>
				<label>Zip Code
						<input type="text" id="zip" name="zipCode" size="10" />
				</label>

				
				<br  />
				
				<label>Payment:
					<br  />
					<input type="radio" name="radio" name="payment" value="visa" />Visa
					<input type="radio" name="radio" name="payment" value="master" />Mastercard
					<input type="radio" name="radio" name="payment" value="discover" />Discover
					<input type="radio" name="radio" name="payment" value="amex" />American Express
				</label>

				<br  />
				<br  />
				<input type="submit" value="Submit"  />
			</div>
		</form>

		<br /><br  />
		<p>Part 3:</p>
		<p>I used it for my name and id field for the text box. This way when I go to look up the fruit again later on I already have the primary key and thus have to supply less information. 
			I can send back the primary key and the quantity and everything else I can look up. Now if prices change frequently this may not be a good way to do it initially since then I could possibly give them
			the wrong price but only fairly staticly priced items it should be fine.
		</p>

		<p>Part 4:</p>
		<p>To get the validation to work I would have to connect to the database and figure out what possible fields I have, based on how many unique ID's I have. From there it wouldn't require much to change, put the various ID's into an
			array. Then loop over them and check to make sure it's a number.
		</p>

		<p>Part 5:</p>
		<p>The small time I was in your course I had no problems with it. I was hoping to learn more PHP than what we did but I know this wasn't meant to be an advanced web programming course and thus basics have to be covered. 
			I know you would like a list but overall this was my only complaint which isn't much of one to begin with. Hope you have a great summer!
		</p>
	</body>
</html>
