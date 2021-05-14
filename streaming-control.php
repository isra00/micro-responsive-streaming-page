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
<p><strong style="color: red">Do not screw things up!</strong></p>
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
		<input size="20" id="id" name="sourceid" value="<?php echo $json["sourceid"] ?>">
	</p>
	<p><small>
		Richard: <a href="javascript:void(0)" onclick="setValue(this)">YsyEUkZkhXs</a>, 
		Diocesis Roma: <a href="javascript:void(0)" onclick="setValue(this)">https://www.facebook.com/diocedisiroma/live_videos</a>
	</small></p>
	<p><small>Note: if you set an external URL, it must begin with http:// or https://</small></p>
	<p><button type="submit" name="sent">Apply</button></p>
</form>

<script>
function setValue(oLink)
{
	document.getElementById("id").setAttribute("value", oLink.innerText);
}
</script>

</body>