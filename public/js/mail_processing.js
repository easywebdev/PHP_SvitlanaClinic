async function sendMail(formID) {
    const form = document.querySelector('#'+formID);
    const formData = new FormData(form);

    let post = {
        name: formData.get('name'),
        email: formData.get('email'),
        text: formData.get('text')
    }
    
    let api = '/sendmail';
    let method = 'POST';

    let response = await fetch(api, {
        method: `${method}`,
        headers: {
            "X-CSRF-TOKEN": formData.get('_token'),
            'Content-type': 'application/json; charset=UTF-8',
        },
        body: JSON.stringify(post),
    });

    let answer = await response.json();

    alertify.alert("", answer.msg, function(){
        alertify.message(answer.msg);
    });

    return answer;
}