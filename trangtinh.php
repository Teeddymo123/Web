<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="khung-main">
        <div class="khung-anh">
            <img src="img/1.jpg" alt="picture-main">
        </div>
        <div class="time-deadline">
            <p id="countdown"></p>
        </div>
        <div class="information-exam">
            <div class="mr-24 h-5 text-center">
                <br>
                <a href="#" class="rounded-full py-2 px-10 uppercase text-lg font-bold cursor-pointer tracking-wider border-red-200 border-2 hover:bg-red-600">Vào thi</a>
            </div>
            <br>
            <br>
            <br>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "qlds_thi");
            if (!$conn) {
                die('Khong the ket noi he quan tri : ');
                exit();
            }
            if (!mysqli_select_db($conn, "qlds_thi")) {
                die('Khong the ket noi voi CSDL : ' . mysqli_error($conn));
                exit();
            }
            mysqli_set_charset($conn, "uft8mb4_unicode_ci");
            $sql = "select * from students";
            $kq = mysqli_query($conn, $sql);
            if (mysqli_num_rows(mysqli_query($conn, $sql)) <> 0) {
                echo "<div class='text-center w-4/5 h-auto ml-28'>";
                echo "<table width = '100%' height = '40' border='0' border-color:'black'>";
                echo "<tr>";
                echo "<td align='center'><h2 class='text-base'><b>Danh sách thí sinh</b></h2></td>";
                echo "</tr>";
                echo "</table>";
                echo "<table>";
                echo "<tr>";
                echo "<td width='30' height='23' align='center'>STT</td>";
                echo "<td width='120' align='center'>Mã sinh viên</td>";
                echo "<td width='250' align='center'>Họ và tên sinh viên</td>";
                echo "<td width='400' align='center'>Tên trường</td>";
                echo "<td width='450' align='center'>Địa chỉ trường</td>";
                echo "</tr>";
                $stt = 1;
                while ($row = mysqli_fetch_row($kq)) {
                    echo "<tr>";
                    echo "<td height='23' align='center'>" . $stt . "</td>";
                    echo "<td align='center'>" . $row[0] . "</td>";
                    echo "<td align='center'>" . $row[1] . "</td>";
                    echo "<td align='center'>" . $row[4] . "</td>";
                    echo "<td align='center'>" . $row[5] . "</td>";
                    echo "</tr>";
                    $stt++;
                }
                echo "<tr>";
                echo "<td float='right' width='300'>Thí sinh đã tham gia: " . mysqli_num_rows(mysqli_query($conn, $sql)) . "</td>";
                echo "</tr>";
                echo "</table>";
                echo "</div>";
            }
            ?>
        </div>
        <div class="icon-menu "><i class="fa-solid fa-bars"></i></div>
        <div class="khung-menu hide">
            <div class="icon-close">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <div class="khung-information">
                <div class="anh-dai-dien">
                    <img src="img/2.png" alt="" class="anh">
                </div>
                <div class="thong-tin">
                    <form action="POST" class="form-information">
                        <br>
                        <span>Trần Vĩnh Xuyên</span>
                        <br>
                        <span>Đại học Nông Lâm</span>
                    </form>
                    <div class="chinh-sua">
                        <a href="">
                            <p> Chỉnh sửa thông tin </p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="khung-hieu-ung" style="background-color: blue;">
                <div class="frame">
                    <div class="text">
                        <a href="">
                            <p>
                                < - - - -Thông tin điểm - - - ->
                            </p>
                        </a>
                    </div>
                </div>
                <div class="frame">
                    <div class="text">
                        <a href="">
                            <p>
                                < - - - Thông tin nhóm - - - ->
                            </p>
                        </a>
                    </div>
                </div>
                <div class="frame">
                    <div class="text">
                        <a href="">
                            <p>
                                < - - - - Danh sách thi- - - - ->
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
<script>
    const button_menu = document.querySelector('.icon-menu');
    const button_close = document.querySelector('.icon-close');
    const khung_menu = document.querySelector('.khung-menu');
    button_menu.addEventListener("click", function() {
        button_menu.classList.add("hide");
        khung_menu.classList.remove("hide");
    });
    button_close.addEventListener("click", function() {
        khung_menu.classList.add("hide");
        button_menu.classList.remove("hide");
    });

    const deadline = new Date("2024-12-31 23:59:59").getTime();

    const x = setInterval(function() {
        const now = new Date().getTime();
        const distance = deadline - now;

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor(
            (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
        );
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("countdown").innerHTML =
            days +
            " ngày " +
            hours +
            " giờ " +
            minutes +
            " phút " +
            seconds +
            " giây";

        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "Hết giờ!";
        }
    }, 1000);
</script>

</html>

<style>
    * {
        margin: 0px;
        padding: 0px;

    }

    .time-deadline {
        width: 700px;
        height: auto;
        position: absolute;
        z-index: 4;
        margin-left: 365px;
        margin-top: 200px;
        font-size: 50px;
    }

    .khung-main {
        width: 100%;
        height: auto;
        position: relative;
        flex-wrap: wrap;
        display: flex;

    }

    .khung-anh {
        width: 100%;
        height: 300px;
        background-color: red;
        position: absolute;
        z-index: 1;
    }

    .khung-anh img {
        width: 100%;
        height: 100%;
    }

    .icon-menu {
        width: 55px;
        height: 55px;
        background-color: yellow;
        position: fixed;
        z-index: 3;
        overflow: hidden;
        text-align: center;

    }

    .icon-menu i {
        font-size: 35px;
        margin-top: 8px;
    }

    .icon-menu i:hover {
        cursor: pointer;
        color: red;
    }

    .khung-menu {
        width: 30%;
        height: 605px;
        background-color: blue;
        position: fixed;
        z-index: 2;
        overflow: hidden;

    }

    .icon-close {
        width: 40px;
        height: 40px;
        background-color: yellow;
        margin-left: 90%;
    }

    .icon-close:hover {
        cursor: pointer;
    }

    .icon-menu:hover {
        cursor: pointer;
    }

    .hide {
        visibility: hidden;
    }

    .khung-information {
        width: 85%;
        height: 100px;
        background-color: blue;
        margin-left: 5%;
        display: flex;
        flex-wrap: wrap;
    }

    .anh-dai-dien {
        width: 32%;
        height: 100%;
        background-color: purple;
        text-align: center;
    }

    .anh-dai-dien img {
        width: 100px;
        height: 100px;
        border-radius: 50px;
    }

    .thong-tin {
        font-family: 'Times New Roman';
        font-size: 17px;
        margin-left: 5%;
        width: 60%;
    }

    .chinh-sua {

        width: 100%;
        height: auto;
        margin-left: 15%;
    }

    .chinh-sua a {
        text-decoration: none;
        color: black;
    }

    .chinh-sua a:hover {
        cursor: pointer;
        color: red;
    }

    .khung-hieu-ung {
        width: 85%;
        height: 70%;
        background-color: blue;
        margin-top: 5%;
        margin-left: 5%;
    }

    .frame {
        width: 90%;
        height: 80px;
        background-color: brown;
        margin-left: 5%;
        margin-top: 5%;
        display: flex;
        flex-wrap: wrap;

    }

    .icon {
        width: 40px;
        height: 50px;
        background-color: aqua;
        margin-left: 80%;
        margin-top: -58px;
        font-size: 50px;
        text-align: center;

    }

    .text {
        width: 90%;
        height: 50px;
        background-color: blueviolet;
        margin-left: 5%;
        margin-top: 5%;
        text-align: center;
        font-size: 20px;
    }

    .text p {
        margin-top: 12px;
    }

    .text a {
        text-decoration: none;
        color: black;
    }

    .text a:hover {
        cursor: pointer;
        color: red;
    }

    .information-exam {
        width: 100%;
        height: 400px;
        background-color: chartreuse;
        position: absolute;
        z-index: 1;
        margin-top: 300px;
    }

    .fa-xmark {
        font-size: 30px;
        margin-left: 9px;
        margin-top: 3px;
    }

    .fa-xmark:hover {
        color: red;
        transition: all 0.1s ease-in-out;
    }
</style>