const button = document.getElementById('logout-button');
const form = document.querySelector('#logout-form');



button.onclick = ()=>{
    form.submit();
}

function copyClip(obj){

    navigator.clipboard.writeText(obj.innerText);


}
