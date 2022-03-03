function joinServer(id)
{
    var button = document.getElementById('join-server-' + id);
    $(button).removeClass("btn-success");
    $(button).addClass("btn-secondary");
    button.setAttribute("disabled", "disabled");
    button.innerHTML = "<i class=\"fas fa-circle-notch fa-spin\"></i> Joining...";
    $.get("/client/generate/" + id, function(data, status)
    {
        if (status == "success")
        {
            open("tadahlauncher:" + data, "_self")
        }
        else
        {
            alert("Failed to generate token. Try again later.");
        }
    });
    setTimeout(function()
    {
        $(button).removeClass("btn-secondary");
        $(button).addClass("btn-success");
        button.innerHTML = "<i class=\"fas fa-play\"></i> Play";
    }, 5000);
}