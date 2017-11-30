<html>
	<head>
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
			    background: #d84646;
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 72px;
				margin-bottom: 40px;
                font-family: 'Raleway', sans-serif;
            	font-size: 45px;
            	font-weight: 900;
            	text-align: left;
            	color: #2d2b2b;
            	background: #fff;
            	padding: 30px 20px;
            	margin-top: 50px;
            	border-radius: 8px;
			}
            .div-wrapper img{
                height: 200px;
            }
		</style>
	</head>
	<body>
        <div class="container">
			<div class="content">
				<div class="title">
                    Oops, something went wrong, you will be redirected to your profile.
                </div>
                <div class="div-wrapper">
                    <img src="/assets/icons/errorparrot.png" alt="">
                </div>
			</div>
		</div>
	</body>
    <script type="text/javascript">
    	setTimeout(() => {
            window.location = '/profile';
        },2000) ;
    </script>
</html>
