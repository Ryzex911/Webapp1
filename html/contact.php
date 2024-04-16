<?php
include "header.php";
include_once "template-style.php";
include_once "conction.php";
?>


<body class="contact-page">
<div class="center">
    <div class="container">

        <h1 class="title">Contact US☝️</h1>

        <div class="form form__1">
            <label for="name" class="form__label">Full name</label>
            <input type="text" class="form__input" placeholder="" id="name" required>
        </div>

        <div class="form form__2">
            <label for="email" class="form__label">Email address</label>
            <input type="email" class="form__input" placeholder="" id="email" required>
        </div>

        <div class="form form__3">
            <label for="message" class="form__label">Your message</label>
            <input type="text" class="form__input" placeholder="" id="message" required>
        </div>

        <button class="submit">Submit</button>


        <div class="container-mail">
            <div class="mail">
                <div class="mail__back"></div>
                <div class="mail__top"></div>
                <div class="mail__letter">
                    <div class="mail__letter-square">
                    </div>
                    <div class="mail__letter-lines">
                    </div>
                </div>
                <div class="mail__left"></div>
                <div class="mail__right"></div>
                <div class="mail__bottom"></div>
            </div>
        </div>

    </div>
</div>

<?
require_once "footer.php";
?>

<script>
    $('.form__btn').click(function () {
        $('.mail__letter').toggleClass('move');
        $('.mail__top').toggleClass('closed');
        $('.form__btn--invisible').toggleClass('visible');
        $('.form__btn--visible').toggleClass('invisible');
    });

    $('input').focus(function () {
        $(this).parent().addClass('active');
        $('input').focusout(function () {
            if ($(this).val() == '') {
                $(this).parent().removeClass('active');
            } else {
                $(this).parent().addClass('active');
            }
        })
    });

</script>

