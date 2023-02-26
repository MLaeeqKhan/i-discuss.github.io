<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
          html{
            font-size: 100%;
        }
        @media(max-width:320px){
            html{
                font-size: 30%;
            }
        }
        @media(max-width:425px){
            html{
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

    .contact {
        margin-top: 1rem;
        margin-bottom: 4rem;

    }

    .img {
        width: 50px;
        height: 50px;
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
            <center>
                <div class="inner-container">
                    <h1>ContactUs</h1>
                    <div class="contact-container">
                        <a href="https://www.facebook.com/mlaeeq.khan.5">
                            <div class="contact">
                                <div><img class="img" src="img/facebook.png" alt=""></div>
                                <div> https://www.facebook.com/mlaeeq.khan.5 </div>
                            </div>

                        </a>

                        <div class="contact-container">
                            <a href="https://www.instagram.com/mlaeeqkhan">
                                <div class="contact">
                                    <div><img class="img" src="img/instagram.jpeg" alt=""></div>
                                    <div> https://www.instagram.com/mlaeeqkhan </div>
                                </div>

                            </a>

                            <div class="contact-container">
                                <a href="https://www.linkedin.com/in/Lucky-Khan-113335247">
                                    <div class="contact">
                                        <div><img class="img" src="img/LinkedIn.png" alt=""></div>
                                        <div> https://www.linkedin.com/in/Lucky-Khan-113335247 </div>
                                    </div>

                                </a>

                                <div class="contact-container">
                                    <a href="https://www.twitter.com/MLuckyKhan1">
                                        <div class="contact">
                                            <div><img class="img" src="img/twitter.png" alt=""></div>
                                            <div>https://twitter.com/MLuckyKhan1</div>
                                        </div>

                                    </a>


                                    <div class="text">
                                        <ul>
                                        <li style="color:RED;font-weight:bold; ">CONNECT</li>
                                        <li style="color:GREEN;font-weight:bold; ">NEW</li>
                                        <li style="color:blue;font-weight:bold">WORLD</li>
                                    </ul>
                                    </div>
                                </div>
            </center>
        </div>
    </center>
</body>

</html>