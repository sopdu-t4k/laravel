const each = Function.call.bind(Array.prototype.forEach);

const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

let form;

function sendRequestServer(url, formdata) {
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify(formdata)
    })
    .then(response => response.json())
    .then(data => {
        let alert = createAlert(Object.keys(data)[0]);
        alert.append(Object.values(data)[0]);
        form.prepend(alert);
    })
    .catch(error => {
        console.error(error);
    });
}

function createAlert(type) {
    removeAlert();
    let element = document.createElement('div');
    element.className = `alert alert-${type}`;
    return element;
}

function removeAlert() {
    let alert = form.querySelector('.alert');
    if (alert !== null) {
        alert.remove();
    }
}

document.addEventListener('DOMContentLoaded', () => {
    let formdata = {};

    let checkElems = document.querySelectorAll('.js-check');

    if(checkElems !== null) {
        each(checkElems, function(elem) {
            elem.addEventListener('change', function() {
                formdata[this.value] = this.checked;
            });

        });
    }

    form = document.getElementById('usersForm');

    if (form !== null) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            if (Object.keys(formdata).length) {
                sendRequestServer(this.action, formdata);
                formdata = {};
            }
        });
    }
});
