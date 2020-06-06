
function addFileElement() {

	try {

		var containerDiv = document.createElement('div');
		var label = document.createElement('h4');
		var keyLabel = document.createElement('label');
		var valueLabel = document.createElement('label');
		var br = document.createElement('br');
		var keyElement = document.createElement('input');
		var valueElement = document.createElement('textarea');
		var mainDiv = document.getElementById('custom_fields_div');

		for (var i = 0; i < 100; i++) {
			if (!document.getElementById('custom_field[' + i + '][key]')) {

				containerDiv.setAttribute('class', 'form-group');
				label.innerHTML = "Custom Field " + (i + 1);
				keyLabel.setAttribute('for', ('custom_field[' + i + '][key]'));
				keyLabel.innerHTML = "Key ";
				valueLabel.setAttribute('for', ('custom_field[' + i + '][value]'));
				valueLabel.innerHTML = "Value ";

				keyElement.setAttribute('type', 'text');
				keyElement.setAttribute('id', ('custom_field[' + i +'][key]'));
				keyElement.setAttribute('class', 'form-control');
				keyElement.setAttribute('name', ('custom_field[' + i + '][key]'));
				valueElement.setAttribute('id', ('custom_field[' + i + '][value]'));
				valueElement.setAttribute('class', 'form-control');
				valueElement.setAttribute('name', ('custom_field[' + i + '][value]'));

				mainDiv.appendChild(containerDiv);
				containerDiv.appendChild(label);
				containerDiv.appendChild(keyLabel);
				containerDiv.appendChild(keyElement);
				containerDiv.appendChild(valueLabel);
				containerDiv.appendChild(valueElement);
				containerDiv.appendChild(br);

				break;
			}
		}
		return false;
	}
	catch(e) {
		console.log(e.message);
		return false;
	}
		

}