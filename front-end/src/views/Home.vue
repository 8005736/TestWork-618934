<template>
	<div>
		<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Info</th>
						<th>Weight</th>
						<th>Price</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="item in items">
						<td>{{ item.id }}</td>
						<td>{{ item.title }}</td>
						<td>{{ item.info }}</td>
						<td>{{ item.weight }}</td>
						<td>{{ item.price }}</td>
						<td>
							<router-link :to="{ name: 'product', params: { id: item.id } }">Edit</router-link>
						</td>
					</tr>
				</tbody>
			</table>
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
	name: "Home",
	data() {
		return {
			error: null,
			items: [],
		};
	},
	methods: {
		init() {
			var url = "http://backend/api/product";

			axios
				.get(url)
				.then((response) => {
					this.error = null;

					this.items = response.data;
				})
				.catch((error) => {
					this.isLoading = false;
					this.error = error;
				});
		},
	},
	mounted() {
		this.init();
	},
	components: {},
};
</script>
