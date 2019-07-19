<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	$action = $json->queryResult->action;
	$text = $json->queryResult->parameters->text;

	switch ($text) {
		case 'hi':
			$speech = "Hi, Nice to meet you";
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

	$action = new \stdClass();
	$action->type = "postback";
	$action->label = "TES";
	$action->data = "action=buy&itemid=111";

	$colums_array = array();
	$actions_array = array();

	$default_action = new \stdClass();
	$default_action->type = "uri";
	$default_action->label = "View";
	$default_action->data = "action=buy&itemid=111";

	$columns = new \stdClass();
	$columns->thumbnailImageUrl = "https://example.com/bot/images/item1.jpg";
	$columns->imageBackgroundColor = "#FFFFFF";
	$columns->title = "Apakah Sahabat Nestle Rewards?";
	$columns->altText = "Nestle";
	$columns->defaultAction = $default_action;

	$columns->actions = $actions_array;

	array_push($colums_array, $columns);

	$template = new \stdClass();
	$template->type = "carousel";
	$template->columns = $colums_array;



	$payload = array();
	$line = new \stdClass();
	$line->type = "template";
	$line->template = $template;


	$p = new \stdClass();
	$p->payload->line = $line;
	$p->platform = "LINE";
	array_push($payload, $p);

	$response = new \stdClass();
	$response->fulfillmentMessages = $payload;
	$response->action = $action;
	$response->text = $text;
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>
