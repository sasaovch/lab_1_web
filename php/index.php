<?php
    session_start();
    $themeClass = '';
    if (empty($_COOKIE['theme'])) {
        $themeClass = 'light-theme';
    } else {
        $themeClass = $_COOKIE['theme'];
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="desctiption" content="ITMO 3 sem laboratory work Web 1">
        <meta name="keywords" content="ITMO, lab, web">
        <meta name="author" content="yt">
        <link rel="shortcut icon" href="../icon/favicon.ico" type="image/x-icon">
        <title>Lab 1 Web</title>
        <style>
            body.light-theme {
                --font-color:#333;
                --bg-color: #fff;
                --main-color: rgba(0,234,255,1);
                --sub-color: rgba(7,217,242,1);
                --last-color: rgba(0,255,209,1);
                --first-shadow: #919191;
                --second-shadow: rgba(16,16,16,0.4);
                --third-shadow: rgba(16,16,16,0.2);
                --border-color: royalblue;
                --button-first-color: rgba(0,234,255,1);
                --button-second-color:rgba(7,217,242,1);
                --button-third-color: rgba(0,255,209,1);
                --form-color:#fff;
            }
            body.dark-theme {
                --font-color:#fff;
                --bg-color: #161625;
                --main-color: #020024;
                --sub-color: #090979;
                --last-color: #299eb6;
                --first-shadow: #b8b8b8;
                --second-shadow: rgba(197, 197, 197, 0.4);
                --third-shadow: rgba(255, 255, 255, 0.2);
                --border-color: #a29eff;
                --button-first-color: rgb(2, 168, 184);
                --button-second-color:rgb(2, 83, 175);
                --button-third-color: rgb(28, 6, 223);
                --form-color: rgb(123, 122, 131);
            }
            body {
                overflow: auto;
                margin: 0px;
                padding: 0px;
                font-family: monospace;
                width: 100%;
                background-color: var(--bg-color);
                color: var(--font-color);
            }
            table {
                border-collapse: collapse;
                width: 100%;
                /* не наследуется */
            }
            button {
                background: var(--button-first-color); 
                border-radius: 14px;
            }
            button:hover {
                background: var(--button-second-color); 
            }
            th {
                border-right: solid 1px var(--border-color); 
                border-left: solid 1px var(--border-color);
                border-top: solid 1px var(--border-color);
                border-bottom:  solid 1px var(--border-color);
            } 
            button {
                padding:1%;
            }
            p {
                margin: 0;
                padding:1%;
            }
            p:onclick
            input:valid {
                /* outline: 1px solid var(--button-first-color); */
                accent-color: var(--main-color);
                /* border-radius: 5px;
                border: none; */
            }
            input:invalid {
                outline : 1px solid red;
                accent-color: var(--main-color);
                /* border-radius: 5px; */
                /* border: none; */
            }
            input:checked + .slider {
                background-color: var(--last-color);
            }
            input:checked + .slider:before {
                -webkit-transform: translateX(26px);
                -ms-transform: translateX(26px);
                transform: translateX(26px);
            }
            .gradient {
                background: linear-gradient(90deg, var(--main-color) 0%, var(--sub-color) 48%, var(--last-color) 100%);
            }
            .select-table {
                text-align: left;
                padding: 1%;
                font-size: 14px;
                font-weight: blod;
            }
            .switch {
                position: relative;
                display: inline-block;
                width: 60px;
                height: 34px;
            }
            .switch input {
                opacity: 0;
                width: 0;
                height: 0;
            }
            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: var(--second-shadow);
                -webkit-transition: .4s;
                transition: .4s;
            }
            .slider:before {
                position: absolute;
                content: "";
                height: 26px;
                width: 26px;
                left: 4px;
                bottom: 4px;
                background-color: var(--bg-color);
                -webkit-transition: .4s;
                transition: .4s;
            }
            .slider.round {
                border-radius: 34px;
            }
            .slider.round:before {
                border-radius: 50%;
            }
            #header {
                height: 10%;
                font-size: 16px;
                text-transform: uppercase;
                text-align: center;
                transition: 0.3s;
            }
            #header:hover {
                text-shadow: 1px 1px 1px var(--first-shadow),
                1px 2px 1px var(--first-shadow),
                    1px 3px 1px var(--first-shadow),
                    1px 4px 1px var(--first-shadow),
                    1px 18px 6px var(--second-shadow),
                    1px 22px 10px var(--third-shadow),
                1px 25px 35px var(--third-shadow),
                1px 30px 60px var(--second-shadow);
                opacity: 1;
                transition: 0.3s;
            }
            #menu {
                text-align: center;
                vertical-align: top;
                width: 9%;
                padding:1%;
                background: linear-gradient(180deg, var(--main-color) 0%, var(--bg-color) 30%);
            }
            #group {
                background: var(--main-color); 
                padding:1%;
                width: 9%;
            }
            #name {
                background: linear-gradient(90deg, var(--main-color) 0%, var(--sub-color) 48%, var(--last-color) 100%);
                width: 90%;
            }
            #graph-style {
                padding: 1%;
                text-align: center;
                background: linear-gradient(180deg, var(--main-color) 0%, var(--bg-color) 30%);
            }
            #warning {
                color: red;
            }
            #results {
                padding:1%;
                border-collapse: unset ;
                text-align: center;
                font-size: 16px;
            }
            #results td {
                border-right: solid 1px var(--border-color); 
                border-left: solid 1px var(--border-color);
                border-top: solid 1px var(--border-color);
                border-bottom:  solid 1px var(--border-color);

            }
        </style>
    </head>
    <body class="<?=$themeClass?>">
        <table>
            <tr id="header" class="gradient">
                <td id="group">
                    <h2>P32301<br></h2>
                    <h3>3212</h3>
                </td>
                <td id="name">
                    <h1>Ovcharenko Aleksandr</h1>
                    <h2>
                    laboratory Work Web 1
                    </h2>
                </td>
            </tr>
            <tr>
                <td id="menu">
                    <h3>Dark<br>mode</h3>
                    <label class="switch">
                        <input type="checkbox" id="switcher" class="<?=$themeClass?>">
                        <span class="slider round"></span>
                    </label>
                </td>
                <td id="graph-style">
                    <canvas id="graph" width="400%" alt="Graph" height="400%" style="border: 3px solid var(--border-color);"></canvas>
                </td>
            <tr>
                <td></td>
                <td>
                    <form id="form" action="server.php" method="get">
                        <!-- onsubmit="return checkAndSendForm(this)" -->
                        <table class="select-table">
                            <tr>
                                <td>
                                    <label class="select-text">select X</label>
                                </td>
                                <td>
                                    <input type="radio" name="x" id="x-1" value="-2">
                                    <label for="x-1">-2</label>
                                </td>
                                <td>
                                    <input type="radio" name="x" id="x-2" value="-1.5">
                                    <label for="x-2">-1.5</label>
                                </td>
                                <td>
                                    <input type="radio" name="x" id="x-3" value="-1">
                                    <label for="x-3">-1</label>
                                </td>
                                <td>
                                    <input type="radio" name="x" id="x-4" value="-0.5">
                                    <label for="x-4">-0.5</label>
                                </td>
                                <td>
                                    <input type="radio" name="x" id="x-5" value="0">
                                    <label for="x-5">0</label>
                                </td>
                                <td>
                                    <input type="radio" name="x" id="x-6" value="0.5">
                                    <label for="x-6">0.5</label>                                            
                                </td>
                                <td>
                                    <input type="radio" name="x" id="x-7" value="1">
                                    <label for="x-7">1</label>
                                </td>
                                <td>
                                    <input type="radio" name="x" id="x-8" value="1.5">
                                    <label for="x-8">1.5</label>
                                </td>
                                <td>
                                    <input type="radio" name="x" id="x-9" value="2">
                                    <label for="x-8">2</label>
                                </td>
                                <td>
                                    <input type="radio" name="x" id="x-10" value="" hidden disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="input-y">Y from -3 to 5</label>
                                </td>
                                <td colspan="3">
                                    <input type="text" name="y" id="input-y" placeholder="0" pattern="(-?[1,2](\.\d*)?)|([0,4](\.\d*)?)|([5](\.[0]*)?)|(-[3](\.[0]*)?)" maxlength="14">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Choose R</label>
                                </td>
                                <td>
                                    <input type="checkbox" id="r-1" name="r" value="1">
                                    <label for="r-1">1</label><br>
                                </td>
                                <td>
                                    <input type="checkbox" id="r-2" name="r" value="2">
                                    <label for="r-2">2</label><br>
                                </td>
                                <td>
                                    <input type="checkbox" id="r-3" name="r" value="3">
                                    <label for="r-3">3</label><br>
                                </td>
                                <td>
                                    <input type="checkbox" id="r-4" name="r" value="4">
                                    <label for="r-4">4</label><br>                                            
                                </td>
                                <td>
                                    <input type="checkbox" id="r-5" name="r" value="5">
                                    <label for="r-5">5</label><br>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button id="form-submit" type="submit" class="row-fill">Send</button>
                                </td>
                                <td colspan="4">
                                    <p id="warning"></p>
                                </td>
                                <td colspan="2">
                                    <p>
                                        <?php
                                            if (isset($_SESSION['hit'])) {
                                                echo $_SESSION['hit'];
                                                unset($_SESSION['hit']);
                                            }
                                        ?>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
            </tr>
            <tr>
                <td style="padding:1%; text-align:center;">
                    <h2>Results</h2>
                </td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2" style="padding:1%">
                    <table id="results">
                        <tr>
                            <th>Attempt #</th>
                            <th>X</th>
                            <th>Y</th>
                            <th>R</th>
                            <th>Result</th>
                            <th>Attempt time</th>
                            <th>Processing time</th>
                        </tr>
                        <?php
                            if (isset($_SESSION['attempts'])) {
                                foreach($_SESSION['attempts'] as $index=>$attempt) {
                                    echo('<tr>');
                                    printf('<td>%s</td>', $index+1);
                                    printf('<td>%s</td>', $attempt['x']);
                                    printf('<td>%s</td>', $attempt['y']);
                                    printf('<td>%s</td>', $attempt['r']);
                                    if ($attempt['hit']) {
                                        echo('<td>HIT</td>');
                                    } else {
                                        echo('<td class="warning">MISS</td>');
                                    }
                                    printf('<td>%s</td>', date('Y-m-d H:i:s', $attempt['attempt_time']) . ' UTC');
                                    printf('<td>%s ms</td>', $attempt['process_time']);
                                    echo('</tr>');
                                }
                            }
                        ?>
                    </table>
                </td>
            </tr>
        </table>
        <script src="../js/main.js"></script>
    </body>
</html>