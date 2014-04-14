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
		<script language="Javascript" type="text/javascript">
			<!--
				//<![CDATA[
					function valid() {
						var rasp = document.getElementById("rasp").value;
						var straw = document.getElementById("straw").value;
						var orange = document.getElementById("orange").value;
		
						if(/\D+/.test(rasp)) {
							rasp = false;
						} else if(/\D+/.test(straw)) {
							straw = false;
						} else  if(/\D+/.test(orange)) {
							orange = false;
						}

						if(rasp == false || straw == false || orange == false) {
							var msg = "You entered a non-numeric character for one of the following field or fields:";

							if(!rasp) {
								msg += " Raspbery,";
							}

							if(!straw) {
								msg += " Strawberry,";
							}

							if(!orange) {
								msg += " Orange,";
							}

							msg += " please fix this field or fields and resubmit.";

							alert(msg);
							return false;
						}
						
						document.getElementById("form").submit();
					}
				//]]>
			//-->
		</script>
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
				<tr>
					<td>Raspberry</td>
					<td>$6.00</td>
					<td>1</td>
					<td>
						<input type="text" name="rasp" id="rasp" size="10" />
					</td>
				</tr>
				<tr>
					<td>Garden Strawberry</td>
					<td>$5.00</td>
					<td>1</td>
					<td>
						<input type="text" name="straw" id="straw" size="10" />
					</td>
				</tr>
				<tr>
					<td>Orange</td>
					<td>$2.00</td>
					<td>5</td>
					<td>
						<input type="text" name="orange" id="orange" size="10" />
					</td>
				</tr>
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

				
				<label style="display: inline-block;margin-right: 20px;">State
					<select id="state" name="State">
						<?php				
							$states = array("Alabama", "Florida", "Georgia");
							
							foreach ($states as $state) {
								/*if($state === "Georgia") {
									echo "<option selected=\"selected\" value=\"$state\">","$state</option>\n";
								} else {*/
									echo '<option>'.$state'</option>';
								//}
							}
						?>
					</select>
				</label>
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
	</body>
</html>
