<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	$action_intent = $json->queryResult->action;
	$text = $json->queryResult->parameters->text;
	switch (strtolower($text)) {
		case 'faq':
			$myfile = fopen("faq.txt", "r") or die("Unable to open file!");
			$ec = fread($myfile,filesize("faq.txt"));
			break;

		case 'bye':
			$speech = "Bye, good night";
			break;

		case 'anything':
			$speech = "Yes, you can type anything here.";
			break;
		
		default:
			$speech = "Sorry, I didnt get that. Please ask me something else.---";
			break;
	}

	/* $action = new \stdClass();
	$action->type = "postback";
	$action->label = "TES";
	$action->data = "action=buy&itemid=111";

	$colums_array = array();
	$actions_array = array();

	array_push($actions_array, $action);

	$default_action = new \stdClass();
	$default_action->type = "uri";
	$default_action->label = "View";
	$default_action->uri = "action=buy&itemid=111";

	$columns = new \stdClass();
	$columns->thumbnailImageUrl = "https://example.com/bot/images/item1.jpg";
	$columns->imageBackgroundColor = "#FFFFFF";
	$columns->title = "Apakah Sahabat Nestle Rewards?";
	
	$columns->defaultAction = $default_action;

	$columns->actions = $actions_array;

	array_push($colums_array, $columns);

	$template = new \stdClass();
	$template->type = "carousel";
	

	$template->columns = $colums_array;
	$template->imageAspectRatio = "rectangle";
	$template->imageSize = "cover";


	$payload = array();
	$line = new \stdClass();
	$line->type = "template";
	$line->altText = "Nestle";
	$line->template = $template;


	$p = new \stdClass();
	$p->payload->line = $line;
	$p->platform = "LINE";
	array_push($payload, $p);

	$response = new \stdClass();
	$response->fulfillmentMessages = $payload;
	//$response->action = $action;
	//$response->text = $text;
	echo json_encode($response); */
	echo $ec;
}
else
{
	echo "Method not allowed";
}

?>
