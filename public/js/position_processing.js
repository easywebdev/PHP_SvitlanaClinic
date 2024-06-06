/**
 * 
 * @param {int} id 
 * @param {int} position 
 * @param {string} token 
 * @param {string} tbl 
 * @param {*} val 
 */
async function movePosition(id, position, token, tbl, val = undefined) {
    let post = {
        id: id,
        position: position,
        tbl: tbl,
        val: val
    }
    
    let api = '/changeposition';
    let method = 'POST';

    let response = await fetch(api, {
        method: `${method}`,
        headers: {
            "X-CSRF-TOKEN": token,
            'Content-type': 'application/json; charset=UTF-8',
        },
        body: JSON.stringify(post),
    });

    let answer = await response.json();

    window.location.href = answer.url;
}