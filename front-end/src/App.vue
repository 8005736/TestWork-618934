<template>
	<div id="app">
		<div class="col-lg-8 mx-auto">
			<div class="container">
				<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
					<router-link :to="{ name: 'home' }" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
						<svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
						<span class="fs-4">Simple CRUD</span>
					</router-link>

					<ul class="nav nav-pills">
						<li class="nav-item">
							<router-link :to="{ name: 'product-create' }" class="nav-link">Добавить товар</router-link>
						</li>
					</ul>
				</header>
			</div>

			<main>
				<router-view />
			</main>
		</div>
	</div>
</template>

<style>
@import "./assets/styles/bootstrap.min.css";
</style>