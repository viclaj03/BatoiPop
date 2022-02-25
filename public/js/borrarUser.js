'use strict'
window.addEventListener('load',function() {
    document.getElementById('deleteUser').addEventListener('submit', (event) => {
        if (document.getElementById('numberReport').textContent <= 3) {
            if (!confirm('Este usuario no pose el numero necesario de denuncias.\n' +
                '¿Deseas eliminar?')){
                event.preventDefault()
            }
        }
    })
})



