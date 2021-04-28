<?php

define("FILE", "streaming.json");

if (isset($_POST["sent"]))
{
	file_put_contents(FILE, json_encode([
		"sourcetype" => $_POST["sourcetype"],
		"sourceid"   => $_POST["sourceid"]
	]));
}


$json = json_decode(file_get_contents(FILE), true);

?>
<body style="font-family: sans-serif">
<h1>Control</h1>
<form method="post" action="streaming-control.php">
	<p>
		<label for="type">Streaming source:</label>
		<br>
		<select id="type" name="sourcetype">
			<option value="youtube" <?php if ("youtube" == $json["sourcetype"]) echo "selected" ?>>YouTube</option>
			<option value="url" <?php if ("url" == $json["sourcetype"]) echo "selected" ?>>External URL</option>
		</select>
	</p>
	<p>
		<label for="id">YouTube Video ID or external URL:</label>
		<br>
		<input size="20" name="sourceid" value="<?php echo $json["sourceid"] ?>">
	</p>
	<p><button type="submit" name="sent">Apply</button></p>
</form>