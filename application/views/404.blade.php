<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        body {
            padding: 0;
            margin: 0;
        }
        #notfound {
            position: relative;
            height: 100vh;
        }
        #notfound .notfound {
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        .notfound {
            max-width: 520px;
            width: 100%;
            line-height: 1.4;
            text-align: center;
        }
        .notfound .notfound-404 {
            position: relative;
            height: 240px;
        }
        .notfound .notfound-404 h1 {
            font-family: sans-serif;
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            font-size: 252px;
            font-weight: 900;
            margin: 0px;
            color: #262626;
            text-transform: uppercase;
            letter-spacing: -40px;
            margin-left: -20px;
        }
        .notfound .notfound-404 h1>span {
            text-shadow: -8px 0px 0px #fff;
        }
        .notfound .notfound-404 h3 {
            font-family: sans-serif;
            position: relative;
            font-size: 16px;
            font-weight: 700;
            text-transform: uppercase;
            color: #262626;
            margin: 0px 0px 20px 0px;
            letter-spacing: 3px;
            padding-left: 6px;
        }
        .notfound h2 {
            font-family: sans-serif;
            font-size: 20px;
            font-weight: 400;
            text-transform: uppercase;
            color: #000;
            margin-top: 0px;
            margin-bottom: 25px;
        }
        .notfound h4 {
            font-family: sans-serif;
            font-size: 20px;
            font-weight: 400;
            text-transform: uppercase;
            color: #000;
            margin-top: 0px;
            margin-bottom: 25px;
        }
        .notfound h4 a{
            text-decoration: none;
        }
        #countdown{
            color: #17a2b8!important;
        }
        @media only screen and (max-width: 767px) {
            .notfound .notfound-404 {
                height: 200px;
            }
            .notfound .notfound-404 h1 {
                font-size: 200px;
            }
        }
        @media only screen and (max-width: 480px) {
            .notfound .notfound-404 {
                height: 162px;
            }
            .notfound .notfound-404 h1 {
                font-size: 132px;
                height: 100px;
                line-height: 132px;
            }
            .notfound h2 {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h3>Ôi không! Không tìm thấy trang này</h3>
                <h1><span>4</span><span>0</span><span>4</span></h1>
            </div>
            <h2>Chúng tôi xin lỗi, nhưng không tìm thấy trang bạn yêu cầu</h2>
            <h4>Đếm ngược <span id="countdown" dt-value ="5">5</span>s để về <a href="{{base_url()}}" class="home" id="base">Trang chủ</a></h4>
        </div>
    </div>
    <script type="text/javascript">
        var inter = setInterval(function(){
            var e = document.getElementById('countdown');
            var send = e.getAttribute("dt-value");
            if(send-2<0){
                clearInterval(inter);
                window.location.href = document.getElementById('base').getAttribute("href");
            }
            e.innerHTML = (send-1);
            e.setAttribute("dt-value",send-1);
        },1000)
    </script>
</body>
</html>
