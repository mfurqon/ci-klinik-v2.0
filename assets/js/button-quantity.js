document.addEventListener("DOMContentLoaded", function () {
	const minusButtons = document.querySelectorAll(".minus-btn");
	const plusButtons = document.querySelectorAll(".plus-btn");

	minusButtons.forEach((button) => {
		button.addEventListener("click", function () {
			const id = this.dataset.id;
			const input = document.querySelector(`.quantity-input[data-id="${id}"]`);
			let quantity = parseInt(input.value);
			if (quantity > 1) { // Minimum nilai 1
				quantity--;
				input.value = quantity;
				updateQuantity(id, quantity);
			}
		});
	});

	plusButtons.forEach((button) => {
		button.addEventListener("click", function () {
			const id = this.dataset.id;
			const stok = this.dataset.stok;
			const input = document.querySelector(`.quantity-input[data-id="${id}"]`);
			let quantity = parseInt(input.value);
			if (quantity < stok) {
				quantity++;
				input.value = quantity;
				updateQuantity(id, quantity);
			}
		});
	});

	function updateQuantity(id, quantity) {
		fetch(`${base_url}home/update_keranjang`, {
			method: "POST",
			headers: {
				"Content-Type": "application/json",
			},
			body: JSON.stringify({ id: id, quantity: quantity }),
		})
			.then((response) => response.json())
			.then((data) => {
				if (data.success) {
					console.log("Quantity updated successfully");
				} else {
					console.error("Failed to update quantity");
				}
			})
			.catch((error) => console.error("Error:", error));
	}
});
