<!-- <?php
    require("./mysql.php");
    $hash = $_COOKIE['hash'];
    $id = $_COOKIE['id'];
    
    if (empty($id) || empty($hash) || !$bd->auth($id, $hash)) {
        $data = $bd->generateHash();
        setcookie('hash', $data["hash"], time() + 30 * 24 * 60 * 60, "/");
        setcookie("id", $data["id"], time() + 30 * 24 * 60 * 60, "/");
    
    }
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/Banka_Credit.ico" type="image/ico">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <title>Заполнение заявки</title>
</head>
<body class="uns">
    <header id="top" class="abs">
        <div class="container">
            <div class="row nav">
                <div class="logo"><img src="img/Banka_Credit_green.png" alt=""></div>
                <div class="timer">
                    <div class="timer_time">
                        <label>Осталось</label>
                        <div class="second-my timerhello timerhello_631">
                            <div class="second-my-content">
                                <p class="result">
                                    <span class="result-minute items">17</span>
                                    <span class="dot">:</span>
                                    <span class="result-second items">48</span> 
                                </p> 
                                <div class="clearf"></div>
                            </div>
                        </div>
                    </div>
                    <div class="timer_text">
                        <h3>Займ от 0.01%</h3>
                        <label class="hide">Успей заполнить форму</label>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="profile">
        <div class="container">
            <div class="row">
                <div class="profile_cont">
                    <form id="profileForm">
                        <div class="part step_1" data-name="contacts">
                            <div class="form_head">
                                <h3>Контактная информация</h3>
                                <p>Шаг первый</p>
                            </div>
                            <div class="flex_row form_block">
                                <div class="step_inner">
                                    <label>Номер телефона <sup>*</sup></label>
                                    <input type="tel" name="phone" required>
                                </div>
                                <div class="step_inner">
                                    <label>Email <sup>*</sup></label>
                                    <input type="email" name="email" required>
                                </div>
                            </div>
                            <div>
                                <label>
                                    <input type="checkbox" name="agreement" value="0" required>
                                    Согласен с <a href="offerta.pdf" target="_blank">условиями публичной оферты</a>, <a href="tariff.pdf" target="_blank">тарифам сервиса</a>, даю свое <a href="personal_data_processing.pdf" target="_blank">согласие на обработку персональных данных</a> и получения рекламных материалов, осознаю что оплата услуг не гарантирует получение займа
                                </label>
                            </div>
                            <div class="step_btn">
                                <label><sup>*</sup> Информация обязательна для заполнения</label>
                                <button type="button" data-current="contacts" data-next="personal" class="btn-submit">Продолжить</button>
                            </div>
                        </div>
                        <div class="part step_2" data-name="personal" style="display: none;">
                            <div class="form_head">
                                <h3>Персональные данные</h3>
                                <p>Шаг второй</p>
                            </div>
                            <div class="form_block">
                                <div class="flex_row">
                                    <div class="step_inner">
                                        <label>Имя <sup>*</sup></label>
                                        <input type="text" name="name" required>
                                    </div>
                                    <div class="step_inner">
                                        <label>Фамилия <sup>*</sup></label>
                                        <input type="text" name="surname" required>
                                    </div>
                                    <div class="step_inner">
                                        <label>Отчество (если есть)</label>
                                        <input type="text" name="patronymic" required>
                                    </div>
                                </div>
                                <div class="flex_row">
                                    <div class="step_inner">
                                        <label>Дата рождения <sup>*</sup></label>
                                        <input type="date" name="birthday" required>
                                    </div>
                                    <div class="step_inner">
                                        <label>Пол <sup>*</sup></label>
                                        <div class="form_choice">
                                            <input type="radio" name="gender" value="man" checked><label>М</label>
                                            <input type="radio" name="gender" value="woman"><label>Ж</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex_row">
                                <div class="step_inner">
                                    <label>Сумма займа</label>
                                    <input type="number" name="sum" required>
                                </div>
                                <div class="step_inner">
                                    <label>Цель займа</label>
                                    <select name="target">
                                        <option value="Не выбрано" selected>Не выбрано</option>
                                        <option value="Ремонт / покупка техники, мебели">Ремонт / покупка техники, мебели</option>
                                        <option value="На лечение">На лечение</option>
                                        <option value="Погасить другой кредит">Погасить другой кредит</option>
                                        <option value="Деньги до зарплаты">Деньги до зарплаты</option>
                                        <option value="Другое">Другое</option>
                                    </select>
                                </div>
                            </div>
                            <div class="step_btn">
                                <label><sup>*</sup> Информация обязательна для заполнения</label>
                                <button type="button" data-current="personal" data-next="document" class="btn-submit">Продолжить</button>
                            </div>
                        </div>
                        <div class="part step_3" data-name="document" style="display: none;">
                            <div class="form_head">
                                <h3>Паспортные данные</h3>
                                <p>Шаг третий</p>
                            </div>
                            <div class="flex_row form_choice">
                                <div><input type="radio" name="document_type" value="passport" checked><label>Паспорт</label></div>
                                <div><input type="radio" name="document_type" value="id_card"><label>Id карта</label></div>
                            </div>
                            <div class="flex_row document">
                                <div data-type="passport" class="step_inner">
                                    <label>Серия/номер <sup>*</sup></label>
                                    <input type="text" name="document_number" maxlength="8" required>
                                </div>
                                <div data-type="id_card" class="step_inner">
                                    <label>Номер документа <sup>*</sup></label>
                                    <input type="number" name="document_number" maxlength="9" required>
                                </div>
                                <div data-type="id_card" class="step_inner">
                                    <label>Действителен до <sup>*</sup></label>
                                    <input type="date" name="valid" required>
                                </div>
                                <div class="step_inner">
                                    <label>ИНН <sup>*</sup></label>
                                    <input type="number" name="inn" maxlength="10" required>
                                </div>
                            </div>
                            <div class="flex_row">
                                <div class="step_inner">
                                    <label>Область <sup>*</sup></label>
                                    <input type="text" name="region" required>
                                </div>
                                <div class="step_inner">
                                    <label>Населенный пункт <sup>*</sup></label>
                                    <input type="text" name="city" required>
                                </div>
                            </div>
                            <div class="flex_row form_choice">
                                <div class="step_inner">
                                    <label>Имеете ли Вы кредитную историю <sup>*</sup></label>
                                    <div style="margin-top: 30px;">
                                        <input type="radio" name="credit_history" value="1" checked><label>Да</label>
                                        <input type="radio" name="credit_history" value="0"><label>Нет</label>
                                    </div>
                                </div>
                                <div class="step_inner">
                                    <label>Трудоустройство <sup>*</sup></label>
                                    <select name="employment">
                                        <option value="Не трудоустроен">Не трудоустроен</option>
                                        <option value="Работаю официально">Работаю официально</option>
                                        <option value="Предприниматель">Предприниматель</option>
                                        <option value="Работаю неофициально">Работаю неофициально</option>
                                        <option value="Декретный отпуск">Декретный отпуск</option>
                                        <option value="Пенсионер">Пенсионер</option>
                                        <option value="Студент">Студент</option>
                                    </select>
                                </div>
                            </div>
                            <div class="step_btn">
                                <label><sup>*</sup> Информация обязательна для заполнения</label>
                                <button type="button" id="send" class="btn-submit">Продолжить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer class="uns">
        <div class="container">
            <div class="row">
            <div class="footer_title">Заполните заявку сейчас, и наличные у вас</div>
                <div class="footer_text">
                    <p>Услугу подбора предложений "БанкаКредит" предоставляет ФОП И.А.Медведев ИНН 3192810157. Сайт предоставляет платные услуги подбора кредитных продуктов для клинтов, а именно предлагает клиенту список предложений кредитных организаций, к которым клиент может обратиться с целью оформления заявки на кредитный продукт. Проект не является банком или кредитором, не относится к кредитным организациям и не несет ответственности за подписание каких-либо договоров кредитования или же поручительства по ним. Минимальная процентная ставка у некоторых партнеров составляет 0,01%. Для того, чтобы оформить заявку на получение займа, необходимо заполнить анкету на сайте проекта. Совершая любые действия на сайте, вам необходимо дать согласие на <a href="personal_data_processing.pdf" target="_blank">Обработку персональных данных</a> и <a href="info_agreement.pdf" target="_blank">Согласие на получение рекламных материалов</a>. Вы ознакомились и соглашаетесь с <a href="offerta.pdf" target="_blank">Договором публичной оферты</a> и <a href="tariff.pdf" target="_blank">Тарифами сервиса</a>. Сервис "БанкаКредит" использует куки для предоставления услуг. Условия хранения или доступа к куки Вы можете самостоятельно настроить в своем браузере. Сервис предназначен для использования лицами, достигшими возраста 18 лет. Расчет в калькуляторах, предоставленный на сайте, базируется на среднем показателе процентной ставки, которая будет предложена вам финансовыми организациями.</p>
                    <p>По любым вопросам вы можете связаться со специалистами сервиса по почте <a href="mailto:info@banka.credit">info@banka.credit</a>. Обработка заявки платная: стоимость услуги (далее по сайту — Активация сервиса) составляет 169 (сто шестдесят девять) гривен. Стоимость подписки составляет 169 (сто шестдесят девять) гривен каждые пять дней. Оплата услуг сервиса не гарантирует Вам получение займа. Если услуга перестала быть актуальна для вас (вы получили займ или более не нуждаетесь в займах), вы можете самостоятельно отписаться от услуги в любой момент - <a href="unsubscribe.html" target="_blank">Отменить подписку.</a></p>
                </div>
                <div class="footer_info">
                    <div class="contacts">
                        <p>"БанкаКредит" г.Красноград, 3 Микрорайон, д. 21, Код 3192810157</p>
                        <a href="mailto:info@banka.credit">info@banka.credit</a>
                        <a href="sms-unsubscribe.html" target="_blank">Отказаться от sms-рассылки.</a></p>
                    </div>
                    <div class="payments">
                        <img src="img/visa.png" alt="">
                        <img src="img/mc.png" alt="">
                    </div>
                </div>
                <div class="footer_text">&#169; 2020 БанкаКредит</div>
            </div>
        </div>
    </footer>

    <script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="js/script.js"></script>
    <script src="js/form.js"></script>
</body>
</html>