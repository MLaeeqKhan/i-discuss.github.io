<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    html {
        font-size: 100%;
    }

    @media(max-width:320px) {
        html {
            font-size: 45%;
        }
    }

    @media(max-width:425px) {
        html {
            font-size: 45%;
        }
    }

    body {
        background-color: hsl(206, 92%, 94%);
    }

    .inner-container {
        margin-top: 7rem;
        width: 76vw;
        background-color: #fff;
        padding: 3rem 8rem;
        border-radius: 1rem;
        box-shadow: 0 1rem 1rem -0.7rem rgba(0, 0, 0, 0.4);
    }
    .text ul{
        display: flex;
        justify-content: center;
        list-style-type: none;
    }
    .text ul li{
            margin: 3rem;
        }
    </style>
    <title></title>

</head>

<body>
    <?php include '_header.php'?>
    <center>
        <div class="about-section">
            <div class="inner-container">
                <h1>iDiscus</h1>
                <p class="text">
                    iDicuss is the IT Forum website where IT community members can share their problems related to IT.
                    And they can build the good connection. iDiscuss provide the different categories. There user can
                    post a question and discuss the question by pass the comments.
                </p>
                <div class="text">
                    <ul>
                        <li style="color:RED;font-weight:bold; ">CONNECT</li>
                        <li style="color:GREEN;font-weight:bold; ">NEW</li>
                        <li style="color:blue;font-weight:bold">WORLD</li>
                    </ul>
                </div>
            </div>
        </div>
    </center>
</body>

</html>