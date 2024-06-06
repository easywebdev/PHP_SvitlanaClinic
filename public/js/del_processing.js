function delInstance(route, instanse, value) {
    alertify.confirm("Confirm delete", "Are you sure You want to delete " + instanse + " " + value,
        async function(){
            let api = route;
            let method = 'GET';
        
            let response = await fetch(api, {
                method: `${method}`
            });
        
            let answer = await response.json();
        
            //console.log(answer);
            window.location.href = answer.url;
            //alertify.success('Ok');
        },
        function(){
            //alertify.error('Cancel');
        });
}
