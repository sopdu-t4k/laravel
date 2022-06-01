let form;

function sendRequestServer(url, formdata) {
    fetch(url, {
        method: 'POST',
        headers: {
            'Accept': 'application/json, text-plain, */*'
        },
        body: formdata
    })
    .then(response => response.json()
            .then(data => ({
                success: response.ok, body: data
            })
        )
    )
    .then(obj => {
        if (obj.success) {
            showConfirm(obj.body);
        } else {
            showErrors(obj.body);
        }
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

function createTextElement(message) {
    let element = document.createElement('div');
    element.innerHTML = message;
    return element;
}

function showErrors(data) {
    let alert = createAlert('danger');
    let errors = data.errors;

    if(typeof errors !== 'undefined') {
        for (let field in errors) {
            errors[field].forEach(message => {
                alert.append(createTextElement(message));
            });
        }
    } else {
        alert.append(data.message);
    }

    form.prepend(alert);
}

function showConfirm(data) {
    let alert = createAlert('success');
    alert.append(data.message);
    form.reset();
    form.prepend(alert);

    let review = creteReview(data.item);
    document.getElementById('reviews').prepend(review);
}

function creteReview(item) {
    let header = createTextElement(`${item.created_at} <b>${item.name}</b>`);
    header.className = 'review-header';

    let body = createTextElement(item.message);
    body.className = 'review-body';

    let element = document.createElement('div');
    element.className = 'review';
    element.append(header, body);
    return element;
}

document.addEventListener('DOMContentLoaded', () => {
    form = document.getElementById('reviewForm');

    if (form !== null) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            let formdata = new FormData(this);
            sendRequestServer(this.action, formdata);
        });
    }
});
