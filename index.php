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

	$template = new \stdClass();
	$type = "carousel";



	$payload = array();
	$line = new \stdClass();
	$line->type = "template";
	$line->template = $template;


	$p = new \stdClass();
	$p->payload->line = $line;
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
