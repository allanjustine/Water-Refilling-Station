<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" href="css1/styles.css">
    <style>
        .prev {
            text-align: center;
        }

        .left {
            border-collapse: collapse;
            width: 40%;
            margin-left: 5%;
        }
        
        .right {
            border-collapse: collapse;
            width: 40%;
            margin-right: 90%;
        }

        table {
            border: 1px solid black;
            inline-size: 100%;
            height: 400px;
            border-width: 2px;
        }

        th{
            border: 1px solid black;
            padding: 8px;
            text-align: center;
            background-color: #f2f2f2;
        }

        .color {
            background-color: grey;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .aqua {
            background-image: url('./images/aquapoint.jpg');
            background-size: 100% 100%;
            background-color: aqua;
        }

        .zaza {
            background-image: url('./images/Zaza.jpg');
            background-size: 100% 100%;
            background-color: #ffcc00;
        }

        /* CSS */
        .button-54 {
        font-family: "Open Sans", sans-serif;
        font-size: 16px;
        letter-spacing: 2px;
        text-decoration: none;
        text-transform: uppercase;
        color: #000;
        cursor: pointer;
        border: 3px solid;
        padding: 0.25em 0.5em;
        box-shadow: 1px 1px 0px 0px, 2px 2px 0px 0px, 3px 3px 0px 0px, 4px 4px 0px 0px, 5px 5px 0px 0px;
        position: relative;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        }

        .button-54:active {
        box-shadow: 0px 0px 0px 0px;
        top: 5px;
        left: 5px;
        }

        @media (min-width: 768px) {
        .button-54 {
            padding: 0.25em 0.75em;
        }
        }


    </style>
</head>
<body class="color">

        <h1 class="prev"><strong>WATER REFILLING STATIONS</strong></h1>
        <marquee behavior="scroll" direction="left" scrollamount="5">Group 5 Project Development</marquee>

        <a style="color: white; text-decoration: none;" href="{{ url('/') }}" class="bn5">GO BACK</a>
<br><br>
    <table>
            <th class="aqua">
                <!--- WRS1 --->
                <a style="color: white; text-decoration: none;" href="{{ url('/register') }}" class="bn53">REGISTER</a>\
                <a style="color: white; text-decoration: none;" href="{{ url('/login') }}" class="bn53">LOGIN</a><br><br>
                <a style="color: yellow;" class="button-54" role="button">Location Bito, Abuyog, Leyte</a>
            </th>
               
            <th class="zaza">
                <!--- WRS2 --->
                <a style="color: white; text-decoration: none;" href="{{ url('/register') }}" class="bn53">REGISTER</a>
                <a style="color: white; text-decoration: none;" href="{{ url('/login') }}" class="bn53">LOGIN</a><br><br>
                <a style="color: yellow;" class="button-54" role="button">Location Batug, Javier, Leyte</a>
            </th>
    </table>

</body>
</html>