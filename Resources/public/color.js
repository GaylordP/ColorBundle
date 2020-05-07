import $ from 'jquery'

$(document).ready(function () {
    $('.form-color-select').click(function () {
        $(this).find('input').prop('checked', true)
    })
})
