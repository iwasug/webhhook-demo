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
			$faq = fread($myfile,filesize("faq.txt"));
			echo $faq;
			break;

		case 'jawaban1':
			$speech = "Program loyalty yang dipersembahkan sebagai apresiasi bagi Anda yang memberikan nutrisi terbaik dari Nestlé. Untuk saat ini yang dapat mengikuti program loyalty adalah Ibu & Ayah yang memiliki anak berusia > 1 tahun dan mengkonsumsi susu LACTOGROW 3 dan LACTOGROW 4.";
			$response = new \stdClass();
			$response->fulfillmentText = $speech;
			echo json_encode($response);
			break;

		case 'jawaban2':
			$speech = "Periode program tahun 2018 dimulai dari 4 Januari 2018 sampai dengan batas waktu yang belum ditentukan. Informasi terkait periode program akan diinformasikan via website Sahabat Nestlé Rewards";
			$response = new \stdClass();
			$response->fulfillmentText = $speech;
			echo json_encode($response);
			break;
		case 'jawaban3':
			$speech = "Jumlah poin yang didapatkan tidak sama dari masing-masing produk.";
			$response = new \stdClass();
			$response->fulfillmentText = $speech;
			echo json_encode($response);
			break;	
		case 'jawaban4':
			$speech = "Jika Anda ingin melakukan penggantian alamat email, silahkan hubungi call center Sahabat Nestlé Rewards 1500626 atau 08001821028 (tekan 2) pada hari Senin - Minggu pukul 08.00 - 17.00 WIB atau kirim email ke info.rewards@id.nestle.com";
			$response = new \stdClass();
			$response->fulfillmentText = $speech;
			echo json_encode($response);
			break;	
		case 'jawaban5':
			$speech = "Hadiah bisa dilihat melalui website Sahabat Nestlé Rewards: Rewards.SahabatNestle.co.id.
			Info lebih lanjut silakan hubungi Call Center di 1500 626 atau 080018-21028 (tekan 2) atau 0818150012 (WhatsApp) pada hari Senin- Minggu pukul 08.00 - 17.00 WIB";
			$response = new \stdClass();
			$response->fulfillmentText = $speech;
			echo json_encode($response);
			break;	
		case 'product':
			$myfile = fopen("product.txt", "r") or die("Unable to open file!");
			$product = fread($myfile,filesize("product.txt"));
			echo $product;
			break;
		case 'produk':
			$myfile = fopen("product.txt", "r") or die("Unable to open file!");
			$product = fread($myfile,filesize("product.txt"));
			echo $product;
			break;	
		case 'detail':
			$speech = "Susu bubuk untuk pertumbuhan anak usia 1-3 tahun yang diperkaya dengan 12 vitamin, 7 mineral, minyak ikan dan Lactobacillus reuteri tanpa perasa.
			Tersedia dalam kemasan: 750gr, 350gr. ";
			$response = new \stdClass();
			$response->fulfillmentText = $speech;
			echo json_encode($response);
			break;
		default:
			$speech = "Saya Belum mengerti :(";
			$response = new \stdClass();
			$response->fulfillmentText = $speech;
			echo json_encode($response);
			break;
	}
}
else
{
	echo "Method not allowed";
}

?>
