'use strict'
window.addEventListener('load',function() {
    document.getElementById('deleteUser').addEventListener('submit', (event) => {
        if (document.getElementById('numberReport').textContent <= '3') {
            if (!confirm('blaba')){
                event.preventDefault()
            }
        }
    })
})



