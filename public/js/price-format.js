function formatPriceInput(input) {
	// Mengambil nilai input saat ini
	let inputValue = input.value;

	// Menghilangkan semua karakter selain angka dan titik desimal
	inputValue = inputValue.replace(/[^\d.]/g, '');

	// Mengambil karakter pertama (harus berupa digit)
	const firstChar = inputValue.charAt(0);

	// Memeriksa apakah karakter pertama adalah titik desimal
	if (firstChar === '.') {
		// Jika karakter pertama adalah titik desimal, tambahkan $ di depannya
		inputValue = 'US$ ' + inputValue;
	} else if (inputValue) {
		// Jika karakter pertama adalah digit, tambahkan $ di depannya
		inputValue = 'US$ ' + inputValue;
	}

	// Setel nilai input yang telah dimodifikasi kembali ke input
	input.value = inputValue;
}

document.addEventListener('DOMContentLoaded', function () {
	const priceInput = document.getElementById('price');

	if (priceInput) {
		// Menambahkan event listener untuk input dengan id 'price'
		priceInput.addEventListener('input', function (e) {
			formatPriceInput(e.target);
		});
	}
});