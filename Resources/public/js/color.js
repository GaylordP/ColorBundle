document.addEventListener('click', (e) => {
    let color = e.target.closest('.form-color-select')

    if (null !== color) {
        color.querySelector('input').checked = true
    }
})
