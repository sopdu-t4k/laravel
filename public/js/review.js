function sendRequestServer(url, formdata) {
    fetch(url, {
        method: 'POST',
        body: formdata
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
    })
    .catch(error => {
        console.error(error);
    });
}

document.addEventListener('DOMContentLoaded', () => {
    let form = document.getElementById('reviewForm');

    if (form !== null) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            let formdata = new FormData(this);
            sendRequestServer(this.action, formdata);
        });
    }
});
