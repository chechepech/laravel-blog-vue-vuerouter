<template>
	<nav class="custom-wrapper" id="menu">
		<div class="pure-menu"><a href="#" class="custom-toggle btn-bar" id="toggle"></a></div>
		<ul class="container-flex list-unstyled">
			<li>
				<router-link class="text-uppercase" :to="{name: 'home'}">HOME</router-link>
			</li>
			<li>
				<router-link class="text-uppercase" :to="{name: 'about'}">ABOUT</router-link>
			</li>
			<li>
				<router-link class="text-uppercase" :to="{name: 'archive'}">ARCHIVE</router-link>
			</li>
			<li>
				<router-link class="text-uppercase" :to="{name: 'contact'}">CONTACT</router-link>
			</li>
		</ul>
	</nav>
</template>