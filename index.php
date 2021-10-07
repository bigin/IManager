<?php

include('imanager.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>IManager Tests</title>

	<meta name="description" content="This file is only used for testing, once you have checked it, you can delete it.">

	<!-- Mobile-friendly viewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Style sheet link – when upload is used -->
	<!-- <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css"> -->
	<!-- js stuff – when upload is used -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->

</head>
<body>

<header role="banner">

	<a class="brand">Site Title or Logo</a>

	<nav role="navigation">
		<ul class="navbar">
			<li><a href="#">Page 1</a></li>
			<li><a href="#">Page 2</a></li>
			<li><a href="#">Page 3</a></li>
			<li><a href="#">Page 4</a></li>
		</ul>
	</nav>

</header>
<main role="main">
	<?php
	////////////////////////////////////////////////
	// IManager 3.2.2
	////////////////////////////////////////////////

	/**
	 * ex.0001
	 * 
	 * Create a category with fields if it does not already exist.
	 * Note, however, that setting the field attribute 'name-bug' 
	 * on the second field will cause an exception.
	 */
	/* $myCategory = $imanager->getCategory('name=Testcategory');
	if(! $myCategory) {
		$myCategory = new \Imanager\Category();
		if($myCategory->set('name', 'Testcategory')
			->set('slug', 'Just for test')
			->save()) {

			$field = new \Imanager\Field($myCategory->id);
			$field->set('type', 'text')
				->set('name', 'my-field')
				->set('label', 'Nur ein Test')
				->save();

			$field = new \Imanager\Field($myCategory->id);
			$field->set('type', 'text')
				->set('name-bug', 'blabla')
				->set('label', 'error Illegal field attribute')
				->save();
		}

	} */

	/**
	 * ex. 0002
	 * 
	 * This is the addition to the example 0001
	 */
	/* $myCategory = $imanager->getCategory('name=Testcategory');
	$field = new \Imanager\Field($myCategory->id);
	$field->set('type', 'text')
		->set('name', 'blabla')
		->save();

	$myItem = new \Imanager\Item($myCategory->id);
	$myItem->set('my_field', "I don't know.")
		->set('blabla', "<script>alert('xss');</script>")
		->save();

	// This causes an error: "Uncaught Error: Call to a member function save() on null",
	// cause value cannot contain a space.
	$myItem = new \Imanager\Item($myCategory->id);
	$myItem->set('my_field', "I don't know.")
		->set('blabla', " ")
		->save(); */
	

	////////////////////////////////////////////////
	// IManager 3.1
	////////////////////////////////////////////////

	/**
	 * Create new categorie mit 2 fields: text, password
	 */
	/*$category = new \Imanager\Category();
	$category->set('name', 'Testcategory');
	$category->save();
	$newField = new \Imanager\Field($category->id);
	$newField->set('type', 'text')
		->set('name', 'content')
		->set('label', 'My Text')
		->save();
	$newField = new \Imanager\Field($category->id);
	$newField->set('type', 'password')
		->set('name', 'password')
		->set('label', 'Enter your password')
		->save();*/

	/**
	 * Create new item in the "Testcategory"
	 */
	/*$item = new \Imanager\Item(1);
	$item->set('name', 'Test User')
		->set('content', 'This is BCRYPTed item')
		->set('password', ['password' => 'gT5nLazzyBob', 'confirm_password' => 'gT5nLazzyBob'])
		->save();*/

	/**
	 * Load an Item and compare the passwords (simulates login)
	 */
	/*$category = $imanager->getCategory(1);
	$item = $category->getItem('name=Test User');
	$enteredPass = 'NtBz39Äö';
	\Imanager\Util::preformat($item->password->compare($enteredPass));*/

	/**
	 * Chained Item Select
	 */
	/*$item = $imanager->getCategory('name=Testcategory')->getItem('name=Test User');
	\Imanager\Util::preformat($item);*/



	////////////////////////////////////////////////
	// IManager 3.0
	////////////////////////////////////////////////

	/*$category = $imanager->getCategory(1);
	if($category) {
		$item = $category->getItem(3);
		$bool = $category->remove($item);
	}
	// let your result pass through the filter again
	\Imanager\Util::preformat($item);
	\Imanager\Util::preformat($bool);*/


	/*$category = $imanager->getCategory('name=My Bla Category');
	if(!$category) {
		$category = new \Imanager\Category();
		$category->set('name', 'My Bla Category');
		$category->save();
	} else {
		Imanager\Util::preformat($category);
	}*/

	/**
	 * Working with config
	 */
	//var_dump($imanager->config);
	//echo imanager('config')->maxFieldNameLength;


	// If categories are not available yet, create one
	/*if(!$imanager->categoryMapper->categories) {
		$category = new \Imanager\Category();
		$category->set('name', 'My Fucking Test-Category');
		$category->set('slug', 'My Fucking Test-Category');
		$category->save();
	}*/

	/*$category = $imanager->getCategory('name=My Fucking Test-Category');
	$newField = new \Imanager\Field($category->id);
	$newField->set('type', 'text');
	$newField->set('name', 'data');
	$newField->set('label', 'Data field');
	$newField->save();
	\Imanager\Util::preformat('Just a test');*/

	//\Imanager\Util::preformat($category);

	// Creating new categories
	/*$category = new \Imanager\Category();
	$category->set('name', 'A Test Category');
	$category->save();*/

	// Creating multiple categories in a loop
	/*$number = 20;
	for($i = 0; $i < $number; $i++) {
		$ran = rand(4, 1000000);
		$category = new \Imanager\Category();
		$category->set('name', 'My Category '.$ran);
		$category->set('slug', 'My Category '.$ran);
		$category->save();
	}*/

	// Get an existing category by id and related items
	/*$catMapper = $imanager->categoryMapper;
	$catMapper->init();
	$secondCategory = $catMapper->getCategory(1);
	$items = $secondCategory->getItems('test_field=');
	Imanager\Util::preformat($items);*/

	// Get several Categories
	/*$categories = $imanager->getCategories('position>10&&position<=16');
	\Imanager\Util::preformat($categories);*/

	// Update an existing category
	/*$catMapper = $imanager->categoryMapper;
	$catMapper->init();
	$secondCategory = $catMapper->getCategory(3);
	$secondCategory->name = 'My Third Category';
	$secondCategory->save();*/

	// Remove a Category, with throwing an Exception
	/*$category = $imanager->getCategory(1);
	if($category) {
		try {
			$imanager->remove($category);
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		\Imanager\Util::preformat($category);
	}*/


	/**
	 * Working with fields
	 */
	// Create a single fields for a category
	/*$category = $imanager->getCategory(1);
	$newField = new \Imanager\Field($category->id);
	$newField->set('type', 'password');
	$newField->set('name', 'password');
	$newField->set('label', 'Enter your password');
	$newField->save();
	Imanager\Util::preformat($newField);*/
	// Another example, create decimal field
	/*$category = $imanager->getCategory(1);
	$newField = new \Imanager\Field($category->id);
	$newField->set('name', 'money');
	$newField->set('type', 'decimal');
	$newField->set('label', 'Enter a decimal number');
	$newField->save();
	Imanager\Util::preformat($newField);*/
	// Anpther example creating an image field
	/*$category = $imanager->getCategory(1);
	$newField = new \Imanager\Field($category->id);
	$newField->set('name', 'files');
	$newField->set('type', 'fileupload');
	$newField->set('label', 'Files');
	$configs = new \Imanager\FieldConfigs();
	$configs->accept_types = 'gif|jpe?g|png';
	$newField->set('configs', $configs);
	$newField->save();*/


	// Update a field of a category
	/*$category = $imanager->categoryMapper->getCategory(1);
	$field = $category->getField('name=files');
	$configs = new \Imanager\FieldConfigs();
	$configs->accept_types = 'gif|jpe?g|png';
	$field->set('configs', $configs);
	$field->save();
	Imanager\Util::preformat($field);*/

	// Remove a field of the category 1, with throwing an Exception
	/*$category = $imanager->getCategory(1);
	$field = $category->getField('name=test_field');
	if($field) {
		try {
			$category->remove($field);
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		\Imanager\Util::preformat($field);
	}*/


	/**
	 * Working with items
	 */
	// Create an item with complex field
	/*$item = new \Imanager\Item(1);
	$item->set('data', 'This is BCRYPTed item');
	$result = $item->set('password', array('password' => 'NtBz39Äö', 'confirm_password' => 'NtBz39Äö'));
	if($result !== true) {
		echo 'Error code: '.$result;
	} else {
		$item->save();
	}*/

	//\Imanager\Util::preformat($item);

	// Setting the password field value with error catching
	/*$category = $imanager->getCategory(1);
	$item = $category->getItem(1);
	$result = $item->set('password', array('password' => 'NtBz39Äö', 'confirm_password' => 'NtBz39Äg'));
	if($result === true) {
		$item->save();
	} else {
		switch($result) {
			case (-5):
				echo 'The password you entered does not match the password you confirmed with';
				break;
			case (-4):
				echo 'The password field value is formatted incorrectly';
				break;
			case (-3):
				echo 'The password is too long';
				break;
			case (-2):
				echo 'The password is too short';
				break;
			case (-1):
				echo 'Password or the password confirmation field is empty';
				break;
			default:
				echo 'Password field value could not be set';
		}
	}*/

	// Load an item
	/*$category = $imanager->getCategory(1);
	$item = $category->getItem(1);
	Imanager\Util::preformat($item);*/

	/*$category = $imanager->getCategory(1);
	$item = $category->getItem(2);

	$result = $item->set('money', '100.345,35');
	if($result === true) {
		$item->save();
	} else {
		switch($result){
			case (-5):
				echo 'The password you entered does not match the password you confirmed with';
				break;
			case (-4):
				echo 'The password field value is formatted incorrectly';
				break;
			case (-3):
				echo 'The password is too long';
				break;
			case (-2):
				echo 'The password is too short';
				break;
			case (-1):
				echo 'Password or the password confirmation field is empty';
				break;
			default:
				echo 'Password field value could not be set';
		}
	}
	Imanager\Util::preformat(gettype($item->money));*/

	// Load an Item and compare the passwords (simulates login)
	/*$category = $imanager->getCategory(1);
	$item = $category->getItem(2);
	$enteredPass = 'NtBz39Äö';
	var_dump($item->password->compare($enteredPass));*/


	// Update item
	/*$category = $imanager->getCategory(1);
	$item = $category->getItem(1);
	$result = $item->set('data', 'Data wurde aktualisiert '.time());
	if($result === true) {
		$item->save();
	} else {
		\Imanager\Util::preformat('Error: '. $result);
	}
	Imanager\Util::preformat($item);*/

	// Creating multiple items in a loop
	/*$number = 200;
	for($i = 0; $i < $number; $i++) {
		$ran = rand(4, 1000000);
		$item = new \Imanager\Item(1);
		$item->set('name', 'Automatically added item '.$ran);
		$item->set('label', 'Automatically added item '.$ran);
		$item->set('data', 'Automatically added data field value '.$ran);
		$item->save();
	}
	$msgs = \Imanager\MsgReporter::getMessages();
	if($msgs) {
		echo '<ul>';
		foreach($msgs as $msg) {
			echo $msg->text;
		}
		echo '</ul>';
	}*/

	// Outputing items of a category with pagination
	/*$category = $imanager->getCategory(1);
	$items = $category->getItems('active='.false);
	$result = $category->sort('position', 'asc',  0, $imanager->config->maxItemsPerPage, $items);
	foreach($result as $item) {
		echo 'ID: '.$item->id .'  Name: '. $item->name.'<br>';
	}
	$pagination = $imanager->paginate($items);
	echo $pagination;*/

	// Remove an item with throwing an Exception
	/*$category = $imanager->getCategory(1);
	$item = $category->getItem(179);
	if($item) {
		try {
			$category->remove($item);
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		\Imanager\Util::preformat($item);
	}*/

	// Markup Cache is used for caching specific parts of your templates
	/*if(!$output = $imanager->sectionCache->get('index')) {
		$category = $imanager->getCategory(1);
		$output = '';
		if($category->items) {
			foreach($category->items as $item) {
				$output .= "Item Name: {$item->name}<br>";
			}
		}
		$imanager->sectionCache->save($output);
	}
	echo $output;*/


	/**
	 * Create new image with images
	 */
	/*$category = $imanager->getCategory(1);
	$field = $category->getField('name=images');
	$fieldMarkup = new \Imanager\FieldFileupload();
	$timestamp_images = time();

	if(!$imanager->input->get->itemid) {
		$item = new \Imanager\Item($category->id);
	} else {
		$item = $category->getItem((int) $imanager->input->get->itemid);
	}

	if($item && $imanager->input->post->action == 'save')
	{
		// Intercept timestamp in order to identify the temporary folder later
		if($imanager->input->post->timestamp_images) {
			$timestamp_images = (int) $imanager->input->post->timestamp_images;
		}
		// Save it first if it's a new item
		if(!$item->id) {
			$item->set('name', 'Autogenerated Item');
			$item->save();
		}
		// We can only save images if item already exists
		if($item->id) {
			// Prepare input value
			$dataSent = array(
				'file' => $imanager->input->post->position_images,
				'title' => $imanager->input->post->title_images,
				'timestamp' => $timestamp_images
			);
			$result = $item->set('images', $dataSent);
			if($result !== true) {
				echo 'Error: field value could not be set';
			} else {
				$item->save();
			}
		}
	}

	echo '<form action="./" method="post">';

	$fieldMarkup->set('url', '');
	$fieldMarkup->set('action', 'imanager/upload/server/php/index.php');
	$fieldMarkup->set('id', $field->name);
	$fieldMarkup->set('categoryid', $field->categoryid);
	$fieldMarkup->set('itemid', $item->id);
	$fieldMarkup->set('timestamp', $timestamp_images);
	$fieldMarkup->set('fieldid', $field->id);
	$fieldMarkup->set('configs', $field->configs, false);
	$fieldMarkup->set('name', $field->name);

	echo $fieldMarkup->render();
	echo $fieldMarkup->renderJsLibs();

	echo '<input type="hidden" name="action" value="save">';
	echo '<button type="submit">Save</button>';

	echo '</form>';*/

	/**
	 * Imanager's file upload form with multiple upload fields, example:
	 */
	/*if($imanager->input->post->action == 'save')
	{
		// Insert file field value
		$category = $imanager->getCategory(1);
		$item = $category->getItem(2);
		// Prepare input value
		$dataSent = array(
			'file' => $imanager->input->post->position_images,
			'title' => $imanager->input->post->title_images,
			'timestamp' => $timestamp_images
		);
		$result = $item->set('images', $dataSent);
		if($result !== true) {
			echo 'Error: field value could not be set';
		}

		$dataSent = array(
			'file' => $imanager->input->post->position_files,
			'title' => $imanager->input->post->title_files
		);
		$result = $item->set('files', $dataSent);
		if($result === true) {
			$item->save();
		} else {
			echo 'Error: field value could not be set';
		}
	}
	*/?><!--
<form action="./" method="post">
<?php
	/*$category = $imanager->categoryMapper->getCategory(1);
	$field = $category->getField('name=images');

	$fieldMarkup = new \Imanager\FieldFileupload();

	$fieldMarkup->set('url', '');
	$fieldMarkup->set('action', 'imanager/upload/server/php/index.php');
	$fieldMarkup->set('id', $field->name);
	$fieldMarkup->set('categoryid', $field->categoryid);
	$fieldMarkup->set('itemid', 2);
	$fieldMarkup->set('fieldid', $field->id);
	$fieldMarkup->set('configs', $field->configs, false);
	$fieldMarkup->set('name', $field->name);

	echo $fieldMarkup->render();

	$field = $category->getField('name=files');

	$fieldMarkup = new \Imanager\FieldFileupload();

	$fieldMarkup->set('url', '');
	$fieldMarkup->set('action', 'imanager/upload/server/php/index.php');
	$fieldMarkup->set('id', $field->name);
	$fieldMarkup->set('categoryid', $field->categoryid);
	$fieldMarkup->set('itemid', 2);
	$fieldMarkup->set('fieldid', $field->id);
	$fieldMarkup->set('configs', $field->configs, false);
	$fieldMarkup->set('name', $field->name);

	echo $fieldMarkup->render();
	echo $fieldMarkup->renderJsLibs();
	*/?>
	<input type="hidden" name="action" value="save">
	<button type="submit">Save</button>
</form>-->
	<?php
	/**
	 * Outputting resized images
	 */
	/*$category = $imanager->getCategory(1);
	$item = $category->getItem(2);
	if($item->images) {
		foreach($item->images as $image) {
			if(!$image->name) continue;
			$resized = $image->resize(300);
			echo '<img src="' . $resized->url . '" width="300">';
		}
	}
	if($item->files) {
		foreach($item->files as $image) {
			if(!$image->name) continue;
			$resized = $image->resize(300);
			echo '<img src="' . $resized->url . '" width="300">';
		}
	}*/

	// Creating input field markup automaticlly
	/*$category = $imanager->getCategory('name=My Test Category');
	if($category) {
		foreach($category->fields as $field) {

			$fieldType = '\Imanager\Field'.ucfirst($field->type);
			$fieldMarkup = new $fieldType();
			$fieldMarkup->set('name', $field->name);
			$fieldMarkup->set('value', '');

			echo $fieldMarkup->render();
		}
	}*/

	?>
</main>
<footer role="contentinfo">
	<div>Page footer content</div>
	<small>Copyright &copy; <time datetime="2019">2019</time> Ehret Studio</small>
</footer>
</body>
</html>