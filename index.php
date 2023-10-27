<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>

<body>
    <form action="index.php" method="post">
        <label for="phone">Введите номер телефона</label>
        <input type="text" name="phone" placeholder="Введите номер телефона">
        <button type="submit">Проверить</button>
    </form>

    <?php
    include "test1.php";
    $countryName = getCountryNameFromPhoneNumber($phoneNumber, $countryCodes);
    echo "<h1>Номер телефона $phoneNumber относится к стране: $countryName</h1>";
    ?>


    <div class="modal fade" id="cookiePopup" tabindex="-1" role="dialog" aria-labelledby="cookiePopupLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-custom" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cookiePopupLabel">Использование файлов cookie</h5>
                </div>
                <div class="modal-body">
                    <p>Мы используем файлы cookie для улучшения вашего опыта на нашем сайте. Нажимая "Принять", вы соглашаетесь с нашей политикой конфиденциальности.</p>
                </div>
                <div class="modal-footer">
                    <button id="acceptCookies" class="btn btn-success">Принять</button>
                    <button id="closeCookiePopup" class="btn btn-secondary">Закрыть</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var today = new Date().toDateString();
            var lastPopupDate = localStorage.getItem("lastPopupDate");

            if (lastPopupDate !== today) {
                var cookiePopup = document.getElementById("cookiePopup");
                if (cookiePopup) {
                    cookiePopup.classList.add("show");
                    cookiePopup.style.display = "block";
                    localStorage.setItem("lastPopupDate", today);
                }
            }

            var acceptCookiesButton = document.getElementById("acceptCookies");
            if (acceptCookiesButton) {
                acceptCookiesButton.addEventListener("click", function() {
                    if (cookiePopup) {
                        cookiePopup.style.display = "none";
                    }
                    localStorage.setItem("lastPopupDate", today);
                });
            }

            var closeCookiePopupButton = document.getElementById("closeCookiePopup");
            if (closeCookiePopupButton) {
                closeCookiePopupButton.addEventListener("click", function() {
                    if (cookiePopup) {
                        cookiePopup.style.display = "none";
                    }
                });
            }
        });
    </script>
</body>

</html>