<?php
	$functions = ['english_number_translator','fibonacci','kaprekar','alien_numbers','happy_numbers','greplin'];
	if($_POST['function']){
		@include $_POST['function'].".php";
		$test = trim(strip_tags($_POST['test']));
		$result = false;
		if(function_exists('solution')){
			$result = solution($test);
		}
			
		$result = is_bool($result) ? ($result ? 'true' : 'false') : $result;
	}
?>
<html>
	<head>
	</head>
	<body>
		<form method="post">
			<select name="function">
				<option> Select function </option>
				<?php foreach ($functions as $function): ?>
					<option value="<?php echo $function?>" <?php echo ($_POST['function'] == $function) ? 'selected' : ''?>> <?php echo $function?> </option>
				<?php endforeach; ?>
			</select>
			<br>
			<br>
			<input type="text" name="test" maxlength="100" style="width:30%" placeholder="test case" value="">
			<br>
			<br>
			<input type="submit" value="Submit">
		</form>
		<br>
		<?php if($result): ?>
			Function:  <?php echo $_POST['function'];?>
			<br>
			Input: <?php echo $_POST['test'];?>
			<br>
			Result: <?php echo $result;?>
		<?php endif; ?>
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				var testCase = {
					'english_number_translator': 'one million one hundred one',
					'fibonacci': 11,
					'kaprekar': 297,
					'alien_numbers': 'alien_number source_language target_language',
					'happy_numbers': '1,2,3,4,5,6,7,8,9,10',
					'greplin':'Fourscoreandsevenyearsagoourfaathersbroughtforthonthiscontainentanewnationconceiv edinzLibertyanddedicatedtothepropositionthatallmenarecreatedequalNowweareengagedi nagreahtcivilwartestingwhetherthatnaptionoranynartionsoconceivedandsodedicatedcanlo ngendureWeareqmetonagreatbattlefiemldoftzhatwarWehavecometodedicpateaportionoft hatfieldasafinalrestingplaceforthosewhoheregavetheirlivesthatthatnationmightliveItisalto getherfangandproperthatweshoulddothisButinalargersensewecannotdedicatewecannotco nsecratewecannothallowthisgroundThebravelmenlivinganddeadwhostruggledherehaveco nsecrateditfaraboveourpoorponwertoaddordetractTgheworldadswfilllittlenotlenorlongre memberwhatwesayherebutitcanneverforgetwhattheydidhereItisforusthelivingrathertobed edicatedheretotheulnfinishedworkwhichtheywhofoughtherehavethusfarsonoblyadvancedI tisratherforustobeherededicatedtothegreattdafskremainingbeforeusthatfromthesehonore ddeadwetakeincreaseddevotiontothatcauseforwhichtheygavethelastpfullmeasureofdevoti onthatweherehighlyresolvethatthesedeadshallnothavediedinvainthatthisnationunsderGod shallhaveanewbirthoffreedomandthatgovernmentofthepeoplebythepeopleforthepeoplesh allnotperishfromtheearth'
				}

				function setTestCase(){
					var func =  $('select[name="function"]').val();
					$('input[name="test"]').val(testCase[func]);
				}
				
				$('select[name="function"]').on('change',function(){
					setTestCase();
				});
			});
		</script>
	</body>
</html>