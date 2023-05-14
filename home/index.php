<?php

    

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link rel="stylesheet" href="../assets/style/home.css">
</head>
<body>
	<header>
		<nav>
			<div class="navbar-brand">
				<img src="logo.png" alt="Logo">
				<span>PERPUSKU</span>
			</div>
			<ul class="navbar-links">
				<li><a href="#">Home</a></li>
				<li><a href="#">My Books</a></li>
				<li><a href="#">Top View</a></li>
				<li class="dropdown">
					<a href="#">Category</a>
					<div class="dropdown-content">
						<a href="#">Action</a>
						<a href="#">Adventure</a>
						<a href="#">Mystery</a>
						<a href="#">Romance</a>
					</div>
				</li>
			</ul>
            <button>Login</button>
            <button>Sign Up</button>
		</nav>
	</header>
	<main>
		<section class="hero-section">
			<div class="hero-content">
				<h1>Brand Name</h1>
				<form>
					<input type="text" placeholder="Search for books">
					<button type="submit">Search</button>
				</form>
			</div>
		</section>
	</main>
</body>
</html>

