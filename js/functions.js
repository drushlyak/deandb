function textInfoBlock ($textOfInfoBlock){
	document.getElementById('message').innerHTML = "<div class=\"alert alert-warning\"> <span class=\"close\" data-dismiss=\"alert\">×</span> "+$textOfInfoBlock+"</div>";
	document.getElementById('resultText').innerHTML = "";
}

function clearBlock ($typeOfBlock){
	document.getElementById($typeOfBlock).innerHTML = "";
}

function select(){
	var $selectedAcc = document.getElementById("blockIdAccount"); // Получаем список
	
	var $indexAcc = document.getElementById("blockIdAccount").options.selectedIndex;
	
	if ($indexAcc == -1){
		textInfoBlock ('Пожалуйста, выберите счет!');
	}

	var $valueAcc = $selectedAcc.options[$selectedAcc.selectedIndex].value; // Получаем индекс выделенного элемента

	var $typeOfCorrespondence = $('input[name=correspondence]:checked').val();//получаем значение радиокнопки

	$resultTitle = "";
	$resultText = "";


	$valueAcc = $valueAcc.slice(0,-1);

	clearBlock('message');
	
	switch($typeOfCorrespondence) {
		case 'debit':
			
			if (typeof ($debit [$valueAcc]) != "undefined") {
			
			var $length = $debit [$valueAcc].length;

			for (var $i=0;$i<$length;$i++) {
			$resultText = $resultText + "<p class=\"lead\">" + $debit [$valueAcc][$i] + " " + $allAccounts [($debit [$valueAcc][$i])+" "] + "</p>";
			};

			var $resultTitle = "<p class=\"lead\"><b>Cчет " + $valueAcc + " " + $allAccounts [$valueAcc+" "] + " корреспондирует по дебету с кредитом счетов:</b></p>";}
			
			else {
				textInfoBlock('Двойная запись (оборот одновременно по дебеду и кредиту счетов) при операциях с забалансовыми счетами не используется!') ();
							}

		break;
		case 'credit':
		if (typeof ($credit [$valueAcc]) != "undefined") {
		var $length = $credit [$valueAcc].length;

			for (var $i=0;$i<$length;$i++) {
			$resultText = $resultText + "<p class=\"lead\">" + $credit [$valueAcc][$i] + " " + $allAccounts [($credit [$valueAcc][$i])+" "] + "</p>";
			};
		var $resultTitle = "<p class=\"lead\"><b>Cчет " + $valueAcc + " " + $allAccounts [$valueAcc+" "] + " корреспондирует по кредиту с дебетом счетов:</b></p>";
		}

		else {
				textInfoBlock('Двойная запись (оборот одновременно по дебеду и кредиту счетов) при операциях с забалансовыми счетами не используется!') ();
			}
		
		break;
	}

	document.getElementById('resultText').innerHTML = "<div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\" >" + $resultTitle + $resultText + "</div>";
						
}

function subAccounts(){

	clearBlock('message');
	clearBlock('resultText');

	var $selectedAcc = document.getElementById("blockIdAccount");
	var $indexAcc = document.getElementById("blockIdAccount").options.selectedIndex;

	if ($indexAcc == -1){
		textInfoBlock('Пожалуйста, выберите счет!') ();
	}

	var $valueAcc = $selectedAcc.options[$selectedAcc.selectedIndex].value;
	
	$valueAcc = $valueAcc.slice(0,-1);

	if (typeof ($subAccounts [$valueAcc]) != "undefined") {


	$resultText = "<p class=\"lead\"><b>Субсчета в к счету " +  $valueAcc + " " + $allAccounts [$valueAcc+" "]+ ":</b></p>";

	var $length = $subAccounts [$valueAcc].length;


	for (var $i=0;$i<$length;$i++) {
		$resultText = $resultText + "<p class=\"lead\">" + $subAccounts [$valueAcc][$i] + "</p>";
	};

	document.getElementById('resultText').innerHTML = "<div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\" >" + $resultText + "</div>";
	}

	else	{
		document.getElementById('message').innerHTML = "<div class=\"alert alert-warning\"> <span class=\"close\" data-dismiss=\"alert\">×</span>У выбранного счета нет субсчетов!</div>";
	}
}