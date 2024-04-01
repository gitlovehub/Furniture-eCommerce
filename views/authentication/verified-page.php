<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Font-awesome here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Title bar here-->
    <title>Verified</title>
    <style>
        body {
			font-family: "Oswald", sans-serif;
			display: flex;
            justify-content: center;
            align-items: center;
		}
        .container {
            margin-top: 100px;
            padding: 80px 150px;
            display: grid;
            place-items: center;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
            background-color: #fff;
            border-radius: 15px;
        }
        .fa-circle-check {
            font-size: 8em;
            color: #409fff;
        }
        p {
            font-size: 24px;
            margin: 0 0 20px;
        }
        .button {
            background: #409fff;
            border-radius: 999px;
            box-shadow: #409fff 0 10px 20px -10px;
            box-sizing: border-box;
            color: #FFFFFF;
            cursor: pointer;
            font-family: Inter,Helvetica,"Apple Color Emoji","Segoe UI Emoji",NotoColorEmoji,"Noto Color Emoji","Segoe UI Symbol","Android Emoji",EmojiSymbols,-apple-system,system-ui,"Segoe UI",Roboto,"Helvetica Neue","Noto Sans",sans-serif;
            font-size: 16px;
            font-weight: 700;
            line-height: 24px;
            opacity: 1;
            outline: 0 solid transparent;
            padding: 8px 18px;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            width: fit-content;
            word-break: break-word;
            border: 0;
            text-decoration: none;
            transition: all ease 0.3s;
        }
        .button:hover {
            box-shadow: #409fff 0 0px 20px;
            letter-spacing: 2px;
        }
    </style>
</head>
<body>
    <div class="container">
        <i class="fa-solid fa-circle-check"></i>
        <h1 class="title">Verified!</h1>
        <p>You have successfully verified account.</p>
        <a href="?act=login" class="button">Login</a>
    </div>
</body>
</html>