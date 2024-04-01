<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Waiting For</title>
	<style>
		body {
			font-family: "Oswald", sans-serif;
			display: flex;
		}

		.box {
			margin: 200px auto;
		}

		.box span {
			font-size: 3em;
			color: #F2C640;
			background: #262B37;
			display: table-cell;
			box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.3), 0 5px 0 #ccc;
			padding: 0 15px;
			line-height: 100px;
			animation: jumb 2s infinite;
		}

		@keyframes jumb {
			0% {
				transform: translateY(0px)
			}

			50% {
				transform: translateY(-30px);
				box-shadow: 0 15px 0 rgb(242, 198, 64);
			}

			100% {
				transform: translateY(0px)
			}
		}

		.box span:nth-child(1) {
			animation-delay: 0s;
		}

		.box span:nth-child(2) {
			animation-delay: .1s;
		}

		.box span:nth-child(3) {
			animation-delay: .2s;
		}

		.box span:nth-child(4) {
			animation-delay: .3s;
		}

		.box span:nth-child(5) {
			animation-delay: .4s;
		}

		.box span:nth-child(6) {
			animation-delay: .5s;
		}

		.box span:nth-child(7) {
			animation-delay: .6s;
		}
	</style>
</head>
<body>
	<span class="box">
		<span>C</span>
		<span>h</span>
		<span>e</span>
		<span>c</span>
		<span>k</span>
		<span>E</span>
		<span>m</span>
		<span>a</span>
		<span>i</span>
		<span>l</span>
	</span>
</body>
</html>

