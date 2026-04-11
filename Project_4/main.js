const form = document.getElementById('converterForm');
const amountInput = document.getElementById('amount');
const currencySelect = document.getElementById('currency');
const rateInput = document.getElementById('rate');
const resultText = document.getElementById('resultText');

function formatNumber(value) {
	return new Intl.NumberFormat('en-US', {
		minimumFractionDigits: 2,
		maximumFractionDigits: 2
	}).format(value);
}

form.addEventListener('submit', function (event) {
	event.preventDefault();

	const amountFRW = Number(amountInput.value);
	const selectedCurrency = currencySelect.value;
	const rateFRWPerCurrency = Number(rateInput.value);

	if (!amountFRW || amountFRW <= 0) {
		resultText.textContent = 'Please enter a valid FRW amount.';
		return;
	}

	if (!selectedCurrency) {
		resultText.textContent = 'Please select a currency.';
		return;
	}

	if (!rateFRWPerCurrency || rateFRWPerCurrency <= 0) {
		resultText.textContent = 'Please enter a valid exchange rate.';
		return;
	}

	const converted = amountFRW / rateFRWPerCurrency;

	resultText.textContent =
		formatNumber(amountFRW) +
		' FRW = ' +
		formatNumber(converted) +
		' ' +
		selectedCurrency;
});
