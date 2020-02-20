<?php
//画像の保存先
define( "FILE_DIR", "images/upload/");

// 変数の初期化
$page_flag = 0;
$clean = array();
$error = array();

// サニタイズ
if( !empty($_POST) ) {
	foreach( $_POST as $key => $value ) {
		$clean[$key] = htmlspecialchars( $value, ENT_QUOTES);
	}
}

if( !empty($_POST['btn_confirm']) ) {
	$error = validation($clean);

	// ファイルのアップロード
	if( !empty($_FILES['file_img']['tmp_name']) ) {
		$upload_res = move_uploaded_file( $_FILES['file_img']['tmp_name'], FILE_DIR.$_FILES['file_img']['name']);
		if( $upload_res !== true ) {
			$error[] = 'ファイルのアップロードに失敗しました。';
		} else {
			$file = FILE_DIR.$_FILES['file_img']['name'];

			//元の画像のサイズを取得する
			list($width, $hight) = getimagesize($file);
			if($width > $hight){
			
				$diff  = ($width - $hight) * 0.5; 
				$diffW = $hight;
				$diffH = $hight;
				$diffY = 0;
				$diffX = $diff;
			
			}elseif($width < $hight){
		
				$diff  = ($hight - $width) * 0.5; 
				$diffW = $width;
				$diffH = $width;
				$diffY = $diff;
				$diffX = 0;
			
			}elseif($width === $hight){

				$diffW = $width;
				$diffH = $hight;
				$diffY = 0;
				$diffX = 0;	
			}
			//サムネイルのサイズ
			$thumbW = 4032;
			$thumbH = 3024;
			//サムネイルになる土台の画像を作る
			$thumbnail = imagecreatetruecolor($thumbW, $thumbH);
			//元の画像を読み込む
			$baseImage = imagecreatefromjpeg($file);
			//サムネイルになる土台の画像に合わせて元の画像を縮小しコピーペーストする
			imagecopyresampled($thumbnail, $baseImage, 0, 0, $diffX, $diffY, $thumbW, $thumbH, $diffW, $diffH);
			imagejpeg($thumbnail, $_FILES['file_img']['name'], 100);
			$clean['file_img'] = $_FILES['file_img']['name'];
		}
}

if( empty($error) ) {
		$page_flag = 1;
	}
		// セッションの書き込み
		session_start();
		$_SESSION['page'] = true;
	}else {
		$page_flag = 0;
}

function validation($data) {
	$error = array();
	// Titleのバリデーション
	if( empty($data['title']) ) {
		$error[] = "「Title」は必ず入力してください。";
		}
		// Textのバリデーション
	if( empty($data['text']) ) {
		$error[] = "「Text」は必ず入力してください。";
		}
		// ryokannameのバリデーション
	if( empty($data['name']) ) {
		$error[] = "「Name」は必ず入力してください。";
		}
		// 添付ファイルのバリデーション
	if( $_FILES['file_img']['error'] !== UPLOAD_ERR_OK){
		$error[] = "「画像」は必ず入力してください。";
		}
	return $error;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Upload Form</title>
<style rel="stylesheet" type="text/css">
	body {
		padding: 20px;
		text-align: center;
	}

	h1 {
		margin-bottom: 20px;
		padding: 20px 0;
		color: #209eff;
		font-size: 122%;
		border-top: 1px solid #999;
		border-bottom: 1px solid #999;
	}

	input[type=text] {
		padding: 5px 10px;
		font-size: 86%;
		border: none;
		border-radius: 3px;
		background: #ddf0ff;
	}

	textarea[name=text] {
		padding: 5px 10px;
		width: 60%;
		height: 100px;
		font-size: 86%;
		border: none;
		border-radius: 3px;
		background: #ddf0ff;
	}

	select {
		padding: 5px 10px;
		font-size: 86%;
		border: none;
		border-radius: 3px;
		background: #ddf0ff;
	}

	input[name=btn_confirm],
	input[name=btn_submit],
	input[name=btn_back] {
		margin-top: 10px;
		padding: 5px 20px;
		font-size: 100%;
		color: #fff;
		cursor: pointer;
		border: none;
		border-radius: 3px;
		box-shadow: 0 3px 0 #2887d1;
		background: #4eaaf1;
	}

	input[name=btn_back] {
		margin-right: 20px;
		box-shadow: 0 3px 0 #777;
		background: #999;
	}

	.element_wrap {
		margin-bottom: 10px;
		padding: 10px 0;
		border-bottom: 1px solid #ccc;
		text-align: left;
	}

	label {
		display: inline-block;
		margin-bottom: 10px;
		font-weight: bold;
		width: 150px;
	}

	.element_wrap p {
		display: inline-block;
		margin:  0;
		text-align: left;
	}

	.error_list {
		padding: 10px 30px;
		color: #ff2e5a;
		font-size: 86%;
		text-align: left;
		border: 1px solid #ff2e5a;
		border-radius: 5px;
	}

	.btn{
		margin-top: 50px;
	}
</style>
</head>
<body>
<h1>Upload Form</h1>
<!-- 完了画面 -->

<?php if( $page_flag === 1 ): ?>
	<p>送信が完了しました。</p>
	<button class="btn"><a href='/'>戻る</a></button>
<?php
	$obj = file_get_contents('store.json');
	$data_array = json_decode($obj);
	$input = array(
				'Title' => $_POST['title'],
				'Text' => $_POST['text'],
				'RyokanName' => $_POST['name'],
				'img' => $clean['file_img']
			);
	$data_array[] = $input;
	//return to json and put contents to our file
	$data_array = json_encode($data_array, JSON_PRETTY_PRINT);
	file_put_contents('store.json', $data_array);
?>
<?php else: ?>
	<?php if( !empty($error) ): ?>
		<ul class="error_list">
		<?php foreach( $error as $value ): ?>
			<li><?php echo $value; ?></li>
		<?php endforeach; ?>
		</ul>
	<?php endif; ?>
<form method="post" action="" enctype="multipart/form-data">
<div class="element_wrap">
	<label>Title</label>
	<input type="text" name="title" value="<?php if( !empty($_POST['title']) ){ echo $_POST['title']; } ?>">
</div>
<div class="element_wrap">
	<label>Text</label>
	<textarea name="text" value=""><?php if( !empty($_POST['text']) ){ echo $_POST['text']; } ?></textarea>
	</div>
	<div class="element_wrap">
	<label>RyokanName</label>
	<select name="name" value="">
			<option>Yamatoya</option>
			<option>Dogokan</option>
			<option>Chaharu</option>
			<option>Funaya</option>
			<option>Dogo PrinceHptel</option>
		</select>
	</div>
	<div class="element_wrap">
	<label>画像ファイルの添付</label>
	<input type="file" name="file_img">
</div>
<input type="submit" name="btn_confirm" value="Upload">
</form>
	<button class="btn"><a href='/'>戻る</a></button>
<?php endif; ?>
</body>
</html>
