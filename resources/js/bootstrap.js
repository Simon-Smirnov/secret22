console.log('YAUUUUUUUUU');

//simple code
//fetch('/api/todos', {headers: {'Accept': 'application/json'}}).then(r=>r.text()).then(console.log)

(async function(){
    //let response = await fetch('/api/todos', {
    let response = await fetch(`${window.appData.apiRoot}todos`, {
        headers: {
            'Accept': 'application/json'
        }
    });

    let data = await response.json();
    console.log(data);
})();
