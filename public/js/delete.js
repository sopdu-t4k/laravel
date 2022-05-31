const each = Function.call.bind(Array.prototype.forEach);

const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

function sendRequestDelete(url) {
    fetch(url, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': token
        }
    })
    .then(response => response.json())
    .then(data => {
        document.querySelector(`[rel="${data.id}"]`).remove();
    })
    .catch(error => {
        console.error(error);
    });
}

document.addEventListener('DOMContentLoaded', () => {
    let delElems = document.querySelectorAll('.js-delete');

    if(delElems !== null) {
        each(delElems, function(elem) {
            elem.addEventListener('click', function(e) {
                e.preventDefault();
                if(confirm('Удалить выбранную запись?')) {
                    sendRequestDelete(this.href);
                }
            });
        });
    }
});
