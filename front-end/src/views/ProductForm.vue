<template>
	<div class="col-lg-4 mx-auto">
		<div class="mb-1">
			<label class="form-label">Title</label>
			<input type="text" class="form-control" v-model="item.title" />
		</div>
		<div class="mb-1">
			<label class="form-label">Weight</label>
			<input type="text" class="form-control" v-model="item.weight" />
		</div>
		<div class="mb-1">
			<label class="form-label">Price</label>
			<input type="text" class="form-control" v-model="item.price" />
		</div>
		<div class="mb-1">
			<label class="form-label">Info</label>
			<textarea class="form-control" rows="3" v-model="item.info"></textarea>
		</div>
		<div class="mb-1">
			<div class="text-end">
				<button type="button" class="btn btn-primary animate" :disabled="isLoading" @click="saveProduct()">
					<span class="spinner-border spinner-border-sm animate" v-if="isLoading"></span>
					<span v-else>Save</span>
				</button>
			</div>
		</div>
		<div class="mb-1" v-if="error">
			<div class="alert alert-danger" role="alert">
				{{ error }}
			</div>
		</div>
	</div>
</template>

<script>
import axios from "axios";

export default {
	name: "ProductForm",
	data() {
		return {
			isLoading: false,
			item: {
				title: null,
				weight: null,
				price: null,
				info: null,
			},
			url: "http://backend/api/product",
			error: false,
		};
	},
	methods: {
		getProduct(product_id) {
			var url = this.url + "/" + product_id;

			axios.get(url).then((response) => {
				if (response.data.id) {
					this.item = response.data;
				} else {
					this.error = "Product not found";
				}
			});
		},
		saveProduct() {
			var url, method;

			if (this.item.id) {
				url = this.url + "/" + this.item.id;
				method = "patch";
			} else {
				url = this.url;
				method = "post";
			}

			this.isLoading = true;

			axios({
				method: method,
				url: url,
				data: this.item,
			})
				.then((response) => {
					this.error = null;
					this.isLoading = false;

					if (response.data.id && !this.item.id) {
						this.$router.push({ name: "product", params: { id: response.data.id } });
					}
				})
				.catch((error) => {
					this.isLoading = false;
					this.error = error;
				});
		},
		init() {
			var product_id = this.$router.currentRoute.params.id;

			if (product_id) {
				this.getProduct(product_id);
			} else {
				this.item = {};
			}
		},
	},
	mounted() {
		this.init();
	},
	watch: {
		$route() {
			this.init();
		},
	},
};
</script>
