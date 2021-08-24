window.onload = getUrlLink();
window.onload = getErrors();

function getUrlLink() 
{
    if (getParameterByName("url") != null) {
        window.location.href = `php/linker.php?url=${getParameterByName("url")}`;
    }
}

function getErrors() 
{
    if (getParameterByName("error") != null) {
        if (getParameterByName("error") == 'invalidUrl') {
            window.alert("Invalid URL");
        }
    }
}

function getUrl() 
{
    var urlText = window.document.getElementById("url-input");
    var divMsg = window.document.getElementById("msg");
    if (urlText.value == '') {
        divMsg.innerHTML = "Please. Insert a URL!"
        return;
    }

    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            divMsg.innerHTML= this.responseText;
        }
    }

    httpRequest.open('GET', `php/shortener.php?url=${urlText.value}`, true);
    httpRequest.send();
}

function getParameterByName(name, url = window.location.href) 
{
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|$)'), results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}
